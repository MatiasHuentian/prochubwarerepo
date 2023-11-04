<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('process.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.process.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name"
        wire:model.defer="process.name">
        <div class="validation-message">
            {{ $errors->first('process.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.process.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('process.owner_id') ? 'invalid' : '' }}">
        <label class="form-label" for="owner">{{ trans('cruds.process.fields.owner') }}</label>
        <x-select-list class="form-control" id="owner" name="owner" :options="$this->listsForFields['owner']" wire:model="process.owner_id" />
        <div class="validation-message">
            {{ $errors->first('process.owner_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.process.fields.owner_helper') }}
        </div>
    </div>
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
    <div class="form-group {{ $errors->has('process.dependency_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="dependency">{{ trans('cruds.process.fields.dependency') }}</label>
        <x-select-list class="form-control" required id="dependency" name="dependency" :options="$this->listsForFields['dependency']" wire:model="process.dependency_id" />
        <div class="validation-message">
            {{ $errors->first('process.dependency_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.process.fields.dependency_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('process.state_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="state">{{ trans('cruds.process.fields.state') }}</label>
        <x-select-list class="form-control" required id="state" name="state" :options="$this->listsForFields['state']" wire:model="process.state_id" />
        <div class="validation-message">
            {{ $errors->first('process.state_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.process.fields.state_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('process.introduction') ? 'invalid' : '' }}">
        <label class="form-label" for="introduction">{{ trans('cruds.process.fields.introduction') }}</label>
        <textarea class="form-control" name="introduction" id="introduction" wire:model.defer="process.introduction" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('process.introduction') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.process.fields.introduction_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('process.contextual_memo') ? 'invalid' : '' }}">
        <label class="form-label" for="contextual_memo">{{ trans('cruds.process.fields.contextual_memo') }}</label>
        <textarea class="form-control" name="contextual_memo" id="contextual_memo" wire:model.defer="process.contextual_memo" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('process.contextual_memo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.process.fields.contextual_memo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('process.start_date') ? 'invalid' : '' }}">
        <label class="form-label" for="start_date">{{ trans('cruds.process.fields.start_date') }}</label>
        <x-date-picker class="form-control" wire:model="process.start_date" id="start_date" name="start_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('process.start_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.process.fields.start_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('process.end_date') ? 'invalid' : '' }}">
        <label class="form-label" for="end_date">{{ trans('cruds.process.fields.end_date') }}</label>
        <x-date-picker class="form-control" wire:model="process.end_date" id="end_date" name="end_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('process.end_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.process.fields.end_date_helper') }}
        </div>
    </div>

    {{-- @include('livewire.process.partials.glosary') --}}
    @include('livewire.process.partials.pivot-select' , [ 'singular_item' => 'glosary' , 'plural_item' => 'glossaries' , 'items' => $this->glossaries])

    <div class="form-group {{ $errors->has('input') ? 'invalid' : '' }}">
        <label class="form-label" for="input">{{ trans('cruds.process.fields.input') }}</label>
        <x-select-list class="form-control" id="input" name="input" wire:model="input" :options="$this->listsForFields['input']" multiple />
        <div class="validation-message">
            {{ $errors->first('input') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.process.fields.input_helper') }}
        </div>
    </div>
    {{-- @include('livewire.process.partials.pivot-select' , [ 'singular_item' => 'input' , 'plural_item' => 'inputs' , 'items' => $inputs]) --}}

    <div class="form-group {{ $errors->has('output') ? 'invalid' : '' }}">
        <label class="form-label" for="output">{{ trans('cruds.process.fields.output') }}</label>
        <x-select-list class="form-control" id="output" name="output" wire:model="output" :options="$this->listsForFields['output']" multiple />
        <div class="validation-message">
            {{ $errors->first('output') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.process.fields.output_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('objective_group') ? 'invalid' : '' }}">
        <label class="form-label" for="objective_group">{{ trans('cruds.process.fields.objective_group') }}</label>
        <x-select-list class="form-control" id="objective_group" name="objective_group" wire:model="objective_group" :options="$this->listsForFields['objective_group']" multiple />
        <div class="validation-message">
            {{ $errors->first('objective_group') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.process.fields.objective_group_helper') }}
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
