@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.proposalsUpgradesState.title_singular') }}:
                    {{ trans('cruds.proposalsUpgradesState.fields.id') }}
                    {{ $proposalsUpgradesState->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.proposalsUpgradesState.fields.id') }}
                            </th>
                            <td>
                                {{ $proposalsUpgradesState->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.proposalsUpgradesState.fields.prueba_1') }}
                            </th>
                            <td>
                                {{ $proposalsUpgradesState->prueba_1 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.proposalsUpgradesState.fields.probando_el_textarea') }}
                            </th>
                            <td>
                                {{ $proposalsUpgradesState->probando_el_textarea }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.proposalsUpgradesState.fields.user') }}
                            </th>
                            <td>
                                @if($proposalsUpgradesState->user)
                                    <span class="badge badge-relationship">{{ $proposalsUpgradesState->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.proposalsUpgradesState.fields.fecha_inicio') }}
                            </th>
                            <td>
                                {{ $proposalsUpgradesState->fecha_inicio }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.proposalsUpgradesState.fields.archivo') }}
                            </th>
                            <td>
                                @foreach($proposalsUpgradesState->archivo as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.proposalsUpgradesState.fields.photo') }}
                            </th>
                            <td>
                                @foreach($proposalsUpgradesState->photo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('proposals_upgrades_state_edit')
                    <a href="{{ route('admin.proposals-upgrades-states.edit', $proposalsUpgradesState) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.proposals-upgrades-states.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection