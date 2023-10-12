<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('process.objective') ? 'invalid' : '' }}">
        <label class="form-label" for="objective">{{ trans('cruds.process.fields.objective') }}</label>
        <textarea class="form-control" name="objective" id="objective" wire:model.defer="process.objective" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('process.objective') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.process.fields.objective_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('glosary') ? 'invalid' : '' }}">
        <label class="form-label" for="glosary">{{ trans('cruds.process.fields.glosary') }}</label>
        @include('admin.recipes.partials.glossaries')
        <div class="validation-message">
            {{ $errors->first('glosary') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.process.fields.glosary_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.processes.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
