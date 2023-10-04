@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.proposalsUpgradesState.title_singular') }}:
                    {{ trans('cruds.proposalsUpgradesState.fields.id') }}
                    {{ $proposalsUpgradesState->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('proposals-upgrades-state.edit', [$proposalsUpgradesState])
        </div>
    </div>
</div>
@endsection