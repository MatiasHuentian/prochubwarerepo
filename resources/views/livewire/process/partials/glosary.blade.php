<div class="form-group {{ $errors->has('glosary') ? 'invalid' : '' }}">
    <label class="form-label" for="glosary">{{ trans('cruds.process.fields.glosary') }}</label>
    {{-- <x-select-list class="form-control" id="glosary" name="glosary" wire:model="glosary" :options="$this->listsForFields['glosary']"  /> --}}
    <x-select-with-pivot class="form-control" id="glosary" name="glosary" wire:model="glosary" :options="$this->listsForFields['glosary']" multiple
        :changefunction="'miFuncion'" />
    <div class="validation-message">
        {{ $errors->first('glosary') }}
    </div>
    <div class="help-block">
        {{ trans('cruds.process.fields.glosary_helper') }}
    </div>
</div>
<div class="w-full max-w-lg">
    @foreach ($glossaries as $i => $glosary)
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <div class="flex flex-row items-center mb-2">
                    <label class="block w-1/4 text-gray-700 text-xs font-bold" for="grid-password">
                        {{ $glosary['name'] ?? 'name' }}
                    </label>
                    <div class="block w-1/2">
                        <x-select-list class="form-control" id="input" name="input" wire:model="input" :options="$this->listsForFields['input']" style="height: 2rem; padding-top: 0.3rem; padding-bottom: 0.3rem;" />
                        {{-- <x-select-list class="form-control" id="aa" name="vv" :options="$this->listsForFields['glosary']"  style="height: 2rem; padding-top: 0.3rem; padding-bottom: 0.3rem;" /> --}}
                    </div>
                </div>
                <textarea
                    class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"
                    name="description_{{ $i }}" id="description_{{ $i }}"
                    wire:model.defer="glossaries.{{ $i }}.description" rows="4"></textarea>
            </div>
        </div>
    @endforeach
</div>

<hr>
<hr>
<hr>
{{-- <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
        <div class="flex flex-row items-center mb-2">
            <label class="block w-1/2 text-gray-700 text-xs font-bold" for="grid-password">
                LABEL!
            </label>
            <label class="block w-1/2 text-right text-gray-700 text-xs font-bold" for="grid-password">
                LABEL 2
            </label>
        </div>
        <textarea
            class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"
            name="description_123123" id="description_123123" wire:model.defer="glossaries.123123.description" rows="4"></textarea>
    </div>
</div> --}}


<hr>
<hr>
<hr>
