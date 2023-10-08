@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.glossary.title_singular') }}:
                    {{ trans('cruds.glossary.fields.id') }}
                    {{ $glossary->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.glossary.fields.id') }}
                            </th>
                            <td>
                                {{ $glossary->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.glossary.fields.term') }}
                            </th>
                            <td>
                                {{ $glossary->term }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('glossary_edit')
                    <a href="{{ route('admin.glossaries.edit', $glossary) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.glossaries.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection