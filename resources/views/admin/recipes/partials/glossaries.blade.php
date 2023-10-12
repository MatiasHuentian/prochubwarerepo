@foreach ($selectedGlossaries as $index => $glossary)
    <div class="mb-4">
        <div class="flex mb-4">
            <select name="selectedGlossaries[{{ $index }}][glossary_id]"
                wire:model="selectedGlossaries.{{ $index }}.glossary_id" class="w-full py-2 px-3 border rounded-lg">
                <option value="">-- Escriba Palabra --</option>
                @foreach ($allGlossaries as $glossarie)
                    <option value="{{ $glossarie->id }}">
                        {{ $glossarie->term }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="flex mb-4">
            <label class="mr-2" for="objective" wire:model="selectedGlossaries.{{ $index }}.term">Término</label>
            <input type="text" name="selectedGlossaries[{{ $index }}][description]" class="w-full py-2 px-3 border rounded-lg"
                wire:model="selectedGlossaries.{{ $index }}.description" />
        </div>
        <div class="flex mb-4">
            <a href="#" wire:click.prevent="removeGlossary({{ $index }})" class="text-blue-500">Eliminar</a>
        </div>
    </div>
@endforeach
<div class="mb-4">
    <div class="col-span-12">
        <button class="py-2 px-4 btn btn-sm btn-secondary text-white rounded-lg" wire:click.prevent="addGlossary">+ Agegar palabra al
            glosario</button>
    </div>
</div>

{{-- @foreach ($selectedGlossaries as $index => $glossarie)
    <div class="form-group">
        <div class="row">
            <select name="selectedGlossaries[{{ $index }}][glossary_id]"
                wire:model="selectedGlossaries.{{ $index }}.glossary_id" class="form-control">
                <option value="">-- Escriba Palabra --</option>
                @foreach ($allGlossaries as $glossarie)
                    <option value="{{ $glossarie->id }}">
                        {{ $glossarie->term }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <label class="form-label" for="objective"
                wire:model="selectedGlossaries.{{ $index }}.term">Término
            </label>
            <input type="text" name="selectedGlossaries[{{ $index }}][description]" class="form-control"
                wire:model="selectedGlossaries.{{ $index }}.description" />
        </div>
        <div class="row">
            <a href="#" wire:click.prevent="removeGlossary({{ $index }})">Delete</a>
        </div>
@endforeach
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-sm btn-secondary" wire:click.prevent="addGlossary">+ Agegar palabra al
            glosario</button>
    </div>
</div> --}}
