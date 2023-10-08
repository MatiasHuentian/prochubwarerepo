@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.attachmentsType.title_singular') }}:
                    {{ trans('cruds.attachmentsType.fields.id') }}
                    {{ $attachmentsType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.attachmentsType.fields.id') }}
                            </th>
                            <td>
                                {{ $attachmentsType->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.attachmentsType.fields.name') }}
                            </th>
                            <td>
                                {{ $attachmentsType->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.attachmentsType.fields.active') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $attachmentsType->active ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('attachments_type_edit')
                    <a href="{{ route('admin.attachments-types.edit', $attachmentsType) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.attachments-types.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection