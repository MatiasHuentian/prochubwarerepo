    <div>
        <div class="form-group {{ $errors->has('activitiesRisk.name') ? 'invalid' : '' }}">
            <label class="form-label required" for="name">{{ trans('cruds.activitiesRisk.fields.name') }} de
                Riesgo</label>
            <input class="form-control" type="text" name="name" id="name" required
                wire:model.defer="activitiesRisk.name">
            <div class="validation-message">
                {{ $errors->first('activitiesRisk.name') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.activitiesRisk.fields.name_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('activitiesRisk.politic_id') ? 'invalid' : '' }}">
            <label class="form-label" for="politic">{{ trans('cruds.activitiesRisk.fields.politic') }}</label>
            <x-select-list class="form-control" id="politic" name="politic" :options="$this->listsForFields['politic']"
                wire:model="activitiesRisk.politic_id" />
            <div class="validation-message">
                {{ $errors->first('activitiesRisk.politic_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.activitiesRisk.fields.politic_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('activitiesRisk.probability_id') ? 'invalid' : '' }}">
            <label class="form-label required"
                for="probability">{{ trans('cruds.activitiesRisk.fields.probability') }}</label>
            <x-select-list class="form-control" required id="probability" name="probability" :options="$this->listsForFields['probability']"
                wire:model="activitiesRisk.probability_id" />
            <div class="validation-message">
                {{ $errors->first('activitiesRisk.probability_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.activitiesRisk.fields.probability_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('activitiesRisk.impact_id') ? 'invalid' : '' }}">
            <label class="form-label" for="impact">{{ trans('cruds.activitiesRisk.fields.impact') }}</label>
            <x-select-list class="form-control" id="impact" name="impact" :options="$this->listsForFields['impact']"
                wire:model="activitiesRisk.impact_id" />
            <div class="validation-message">
                {{ $errors->first('activitiesRisk.impact_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.activitiesRisk.fields.impact_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('activitiesRisk.description') ? 'invalid' : '' }}">
            <label class="form-label" for="description">{{ trans('cruds.activitiesRisk.fields.description') }}</label>
            <textarea class="form-control" name="description" id="description" wire:model.defer="activitiesRisk.description"
                rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('activitiesRisk.description') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.activitiesRisk.fields.description_helper') }}
            </div>
        </div>

        <div class="form-group">
            <a class="btn btn-secondary">
                {{ 'Eliminar riesgo' }}
            </a>
        </div>
    </div>
