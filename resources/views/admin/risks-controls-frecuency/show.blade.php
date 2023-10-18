@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.risksControlsFrecuency.title_singular') }}:
                    {{ trans('cruds.risksControlsFrecuency.fields.id') }}
                    {{ $risksControlsFrecuency->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.risksControlsFrecuency.fields.id') }}
                            </th>
                            <td>
                                {{ $risksControlsFrecuency->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.risksControlsFrecuency.fields.name') }}
                            </th>
                            <td>
                                {{ $risksControlsFrecuency->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('risks_controls_frecuency_edit')
                    <a href="{{ route('admin.risks-controls-frecuencies.edit', $risksControlsFrecuency) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.risks-controls-frecuencies.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection