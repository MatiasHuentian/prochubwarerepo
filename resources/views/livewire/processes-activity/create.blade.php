<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('processesActivity.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.processesActivity.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="processesActivity.name">
        <div class="validation-message">
            {{ $errors->first('processesActivity.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.processesActivity.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('processesActivity.process_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="process">{{ trans('cruds.processesActivity.fields.process') }}</label>
        <x-select-list class="form-control" required id="process" name="process" :options="$this->listsForFields['process']" wire:model="processesActivity.process_id" />
        <div class="validation-message">
            {{ $errors->first('processesActivity.process_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.processesActivity.fields.process_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('processesActivity.description') ? 'invalid' : '' }}">
        <label class="form-label required" for="description">{{ trans('cruds.processesActivity.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" required wire:model.defer="processesActivity.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('processesActivity.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.processesActivity.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.processes-activities.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>