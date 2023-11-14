<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('activitiesRisk.activity_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="activity">{{ trans('cruds.activitiesRisk.fields.activity') }}</label>
        <x-select-list class="form-control" required id="activity" name="activity" :options="$this->listsForFields['activity']"
            wire:model="activitiesRisk.activity_id" />
        <div class="validation-message">
            {{ $errors->first('activitiesRisk.activity_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.activitiesRisk.fields.activity_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('activitiesRisk.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.activitiesRisk.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required
            wire:model.defer="activitiesRisk.name">
        <div class="validation-message">
            {{ $errors->first('activitiesRisk.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.activitiesRisk.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('activitiesRisk.politic_id') ? 'invalid' : '' }}">
        <label class="form-label" for="politic">{{ trans('cruds.activitiesRisk.fields.politic') }}</label>
        <x-select-list class="form-control" id="politic" name="politic" :options="$this->listsForFields['politic']"
            wire:model="activitiesRisk.politic_id" />
        <div class="validation-message">
            {{ $errors->first('activitiesRisk.politic_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.activitiesRisk.fields.politic_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('activitiesRisk.probability_id') ? 'invalid' : '' }}">
        <label class="form-label required"
            for="probability">{{ trans('cruds.activitiesRisk.fields.probability') }}</label>
        <x-select-list class="form-control" required id="probability" name="probability" :options="$this->listsForFields['probability']"
            wire:model="activitiesRisk.probability_id" />
        <div class="validation-message">
            {{ $errors->first('activitiesRisk.probability_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.activitiesRisk.fields.probability_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('activitiesRisk.impact_id') ? 'invalid' : '' }}">
        <label class="form-label" for="impact">{{ trans('cruds.activitiesRisk.fields.impact') }}</label>
        <x-select-list class="form-control" id="impact" name="impact" :options="$this->listsForFields['impact']"
            wire:model="activitiesRisk.impact_id" />
        <div class="validation-message">
            {{ $errors->first('activitiesRisk.impact_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.activitiesRisk.fields.impact_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('activitiesRisk.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.activitiesRisk.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="activitiesRisk.description"
            rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('activitiesRisk.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.activitiesRisk.fields.description_helper') }}
        </div>
    </div>

    {{-- <div class="card">
        <div class="card-header">
            {{ "Causa" . ($plural_name ?? 's') }}
        </div>

        <div class="card-body">
            @foreach ($activitiesRisk->causes as $index => $element)
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="flex items-center {{ $errors->has("activitiesRisk.causes.$index.name") ? 'invalid' : '' }}">
                            <label class="text-gray-600 pr-2" for="activitiesRisk[causes][{{ $index }}][name]">{{ "Causa" }}
                                N°{{ $index + 1 }}</label>
                            <input type="text" name="activitiesRisk[causes][{{ $index }}][name]"
                                class="w-full py-2 px-3 text-gray-700 border rounded focus:outline-none focus:border-blue-400 focus:ring focus:ring-blue-400"
                                wire:model.defer="activitiesRisk.causes.{{ $index }}.name"
                                placeholder="Ingrese nombre de la {{ "Causa" }}" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group {{ $errors->has("activitiesRisk.causes.$index.description") ? 'invalid' : '' }}">
                            <label class="form-label" for="activitiesRisk[causes][{{ $index }}][description]">Descripción</label>
                            <textarea class="form-control" name="activitiesRisk[causes][{{ $index }}][description]"
                                wire:model.defer="activitiesRisk.causes.{{ $index }}.description" rows="4"></textarea>
                            <div class="validation-message">
                                {{ $errors->first("activitiesRisk.causes.$index.description") }}
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center m-2 {{ $errors->has("activitiesRisk.causes.$index.name") ? 'invalid' : '' }}">
                        <a href="#" class="btn btn-danger m-2"
                        wire:click.prevent="remove_to_model( causes , {{ $index }})">Eliminar {{ "Causa" }}</a>
                    </div>
                </div>
                @endforeach
            </div>
        <div class="mt-4">
            <button class="px-4 py-2 text-sm font-medium btn btn-indigo" wire:click.prevent="add_to_model( 'causes' )">+ Agregar
                {{ "Causa" }}</button>
        </div>
    </div> --}}

    @include('livewire.activities-risk.partials.has-many',
        [
            'name' => 'Causa',
            'list_name' => 'causes',
            'list' => $causes,
        ])

    @include('livewire.activities-risk.partials.has-many',
        [
            'name' => 'Consecuencia',
            'list_name' => 'consequences',
            'list' => $consequences,
        ])

    @include('admin.risks-control.partials.clean',
        [
            'name' => 'Control',
            'plural_name' => 'es',
            'list_name' => 'controls',
            'list' => $controls,
        ])

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.activities-risks.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
