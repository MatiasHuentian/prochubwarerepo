@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.attachmentsCategory.title_singular') }}:
                    {{ trans('cruds.attachmentsCategory.fields.id') }}
                    {{ $attachmentsCategory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.attachmentsCategory.fields.id') }}
                            </th>
                            <td>
                                {{ $attachmentsCategory->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.attachmentsCategory.fields.name') }}
                            </th>
                            <td>
                                {{ $attachmentsCategory->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('attachments_category_edit')
                    <a href="{{ route('admin.attachments-categories.edit', $attachmentsCategory) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.attachments-categories.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection