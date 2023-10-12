@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.risksControlsType.title_singular') }}:
                    {{ trans('cruds.risksControlsType.fields.id') }}
                    {{ $risksControlsType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.risksControlsType.fields.id') }}
                            </th>
                            <td>
                                {{ $risksControlsType->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.risksControlsType.fields.name') }}
                            </th>
                            <td>
                                {{ $risksControlsType->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('risks_controls_type_edit')
                    <a href="{{ route('admin.risks-controls-types.edit', $risksControlsType) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.risks-controls-types.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection