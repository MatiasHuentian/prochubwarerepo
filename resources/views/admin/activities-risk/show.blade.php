@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.activitiesRisk.title_singular') }}:
                    {{ trans('cruds.activitiesRisk.fields.id') }}
                    {{ $activitiesRisk->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.activitiesRisk.fields.id') }}
                            </th>
                            <td>
                                {{ $activitiesRisk->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.activitiesRisk.fields.activity') }}
                            </th>
                            <td>
                                @if($activitiesRisk->activity)
                                    <span class="badge badge-relationship">{{ $activitiesRisk->activity->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.activitiesRisk.fields.name') }}
                            </th>
                            <td>
                                {{ $activitiesRisk->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.activitiesRisk.fields.politic') }}
                            </th>
                            <td>
                                @if($activitiesRisk->politic)
                                    <span class="badge badge-relationship">{{ $activitiesRisk->politic->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.activitiesRisk.fields.probability') }}
                            </th>
                            <td>
                                @if($activitiesRisk->probability)
                                    <span class="badge badge-relationship">{{ $activitiesRisk->probability->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.activitiesRisk.fields.impact') }}
                            </th>
                            <td>
                                @if($activitiesRisk->impact)
                                    <span class="badge badge-relationship">{{ $activitiesRisk->impact->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('activities_risk_edit')
                    <a href="{{ route('admin.activities-risks.edit', $activitiesRisk) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.activities-risks.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection