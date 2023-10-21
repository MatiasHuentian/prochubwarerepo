@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.activitiesRisksImpact.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('activities_risks_impact_create')
                    <a class="btn btn-indigo" href="{{ route('admin.activities-risks-impacts.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.activitiesRisksImpact.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('activities-risks-impact.index')

    </div>
</div>
@endsection