<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('proposals_upgrades_state_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="ProposalsUpgradesState" format="csv" />
                <livewire:excel-export model="ProposalsUpgradesState" format="xlsx" />
                <livewire:excel-export model="ProposalsUpgradesState" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.proposalsUpgradesState.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.proposalsUpgradesState.fields.prueba_1') }}
                            @include('components.table.sort', ['field' => 'prueba_1'])
                        </th>
                        <th>
                            {{ trans('cruds.proposalsUpgradesState.fields.probando_el_textarea') }}
                            @include('components.table.sort', ['field' => 'probando_el_textarea'])
                        </th>
                        <th>
                            {{ trans('cruds.proposalsUpgradesState.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                            @include('components.table.sort', ['field' => 'user.email'])
                        </th>
                        <th>
                            {{ trans('cruds.proposalsUpgradesState.fields.fecha_inicio') }}
                            @include('components.table.sort', ['field' => 'fecha_inicio'])
                        </th>
                        <th>
                            {{ trans('cruds.proposalsUpgradesState.fields.archivo') }}
                        </th>
                        <th>
                            {{ trans('cruds.proposalsUpgradesState.fields.photo') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($proposalsUpgradesStates as $proposalsUpgradesState)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $proposalsUpgradesState->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $proposalsUpgradesState->id }}
                            </td>
                            <td>
                                {{ $proposalsUpgradesState->prueba_1 }}
                            </td>
                            <td>
                                {{ $proposalsUpgradesState->probando_el_textarea }}
                            </td>
                            <td>
                                @if($proposalsUpgradesState->user)
                                    <span class="badge badge-relationship">{{ $proposalsUpgradesState->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($proposalsUpgradesState->user)
                                    <a class="link-light-blue" href="mailto:{{ $proposalsUpgradesState->user->email ?? '' }}">
                                        <i class="far fa-envelope fa-fw">
                                        </i>
                                        {{ $proposalsUpgradesState->user->email ?? '' }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $proposalsUpgradesState->fecha_inicio }}
                            </td>
                            <td>
                                @foreach($proposalsUpgradesState->archivo as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($proposalsUpgradesState->photo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('proposals_upgrades_state_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.proposals-upgrades-states.show', $proposalsUpgradesState) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('proposals_upgrades_state_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.proposals-upgrades-states.edit', $proposalsUpgradesState) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('proposals_upgrades_state_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $proposalsUpgradesState->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $proposalsUpgradesStates->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush