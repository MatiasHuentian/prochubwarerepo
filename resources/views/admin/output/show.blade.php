@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.output.title_singular') }}:
                    {{ trans('cruds.output.fields.id') }}
                    {{ $output->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.output.fields.id') }}
                            </th>
                            <td>
                                {{ $output->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.output.fields.name') }}
                            </th>
                            <td>
                                {{ $output->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('output_edit')
                    <a href="{{ route('admin.outputs.edit', $output) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.outputs.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection