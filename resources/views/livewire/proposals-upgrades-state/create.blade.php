<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('proposalsUpgradesState.prueba_1') ? 'invalid' : '' }}">
        <label class="form-label" for="prueba_1">{{ trans('cruds.proposalsUpgradesState.fields.prueba_1') }}</label>
        <input class="form-control" type="text" name="prueba_1" id="prueba_1" wire:model.defer="proposalsUpgradesState.prueba_1">
        <div class="validation-message">
            {{ $errors->first('proposalsUpgradesState.prueba_1') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.proposalsUpgradesState.fields.prueba_1_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('proposalsUpgradesState.probando_el_textarea') ? 'invalid' : '' }}">
        <label class="form-label required" for="probando_el_textarea">{{ trans('cruds.proposalsUpgradesState.fields.probando_el_textarea') }}</label>
        <textarea class="form-control" name="probando_el_textarea" id="probando_el_textarea" required wire:model.defer="proposalsUpgradesState.probando_el_textarea" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('proposalsUpgradesState.probando_el_textarea') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.proposalsUpgradesState.fields.probando_el_textarea_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('proposalsUpgradesState.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.proposalsUpgradesState.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="proposalsUpgradesState.user_id" />
        <div class="validation-message">
            {{ $errors->first('proposalsUpgradesState.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.proposalsUpgradesState.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('proposalsUpgradesState.fecha_inicio') ? 'invalid' : '' }}">
        <label class="form-label required" for="fecha_inicio">{{ trans('cruds.proposalsUpgradesState.fields.fecha_inicio') }}</label>
        <x-date-picker class="form-control" required wire:model="proposalsUpgradesState.fecha_inicio" id="fecha_inicio" name="fecha_inicio" picker="date" />
        <div class="validation-message">
            {{ $errors->first('proposalsUpgradesState.fecha_inicio') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.proposalsUpgradesState.fields.fecha_inicio_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.proposals_upgrades_state_archivo') ? 'invalid' : '' }}">
        <label class="form-label required" for="archivo">{{ trans('cruds.proposalsUpgradesState.fields.archivo') }}</label>
        <x-dropzone id="archivo" name="archivo" action="{{ route('admin.proposals-upgrades-states.storeMedia') }}" collection-name="proposals_upgrades_state_archivo" max-file-size="2" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.proposals_upgrades_state_archivo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.proposalsUpgradesState.fields.archivo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.proposals_upgrades_state_photo') ? 'invalid' : '' }}">
        <label class="form-label" for="photo">{{ trans('cruds.proposalsUpgradesState.fields.photo') }}</label>
        <x-dropzone id="photo" name="photo" action="{{ route('admin.proposals-upgrades-states.storeMedia') }}" collection-name="proposals_upgrades_state_photo" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.proposals_upgrades_state_photo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.proposalsUpgradesState.fields.photo_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.proposals-upgrades-states.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>