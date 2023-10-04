@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.proposalsUpgradesState.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('proposals_upgrades_state_create')
                    <a class="btn btn-indigo" href="{{ route('admin.proposals-upgrades-states.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.proposalsUpgradesState.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('proposals-upgrades-state.index')

    </div>
</div>
@endsection