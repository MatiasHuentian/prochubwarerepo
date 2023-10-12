@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.risksControlsMethod.title_singular') }}:
                    {{ trans('cruds.risksControlsMethod.fields.id') }}
                    {{ $risksControlsMethod->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.risksControlsMethod.fields.id') }}
                            </th>
                            <td>
                                {{ $risksControlsMethod->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.risksControlsMethod.fields.name') }}
                            </th>
                            <td>
                                {{ $risksControlsMethod->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('risks_controls_method_edit')
                    <a href="{{ route('admin.risks-controls-methods.edit', $risksControlsMethod) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.risks-controls-methods.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection