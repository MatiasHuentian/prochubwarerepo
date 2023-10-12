<?php

namespace App\Http\Livewire\Process;

use App\Models\Glossary;
use App\Models\Process;
use Illuminate\Support\Collection;
use Livewire\Component;

class Edit extends Component
{
    public Process $process;

    public $selectedGlossaries = [];
    public $allGlossaries = [];

    public function mount(Process $process)
    {
        $this->process = $process->load('glossaries');
        $this->allGlossaries = Glossary::all();
        $this->mapGlossary();
    }

    public function render()
    {
        return view('livewire.process.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->process->save();
        $this->process->glosary()->sync( $this->selectedGlossaries);

        return redirect()->route('admin.processes.index');
    }

    public function addGlossary()
    {
        $this->selectedGlossaries[] = ['glossary_id' => '', 'description' => ""];
    }

    public function removeGlossary($index)
    {
        unset($this->selectedGlossaries[$index]);
        $this->selectedGlossaries = array_values($this->selectedGlossaries);
    }

    protected function rules(): array
    {
        return [
            'process.objective' => [
                'string',
                'nullable',
            ],
            'selectedGlossaries' => [
                'array',
            ],
            'selectedGlossaries.*.glossary_id' => [
                'integer',
                'exists:glossaries,id'
            ],
            'selectedGlossaries.*.description' => [
                'string'
            ],
        ];
    }

    public function mapGlossary()
    {
        $this->selectedGlossaries = $this->process->glossaries->map(function ($item) {
            return [
                'glossary_id' => $item->pivot->glossary_id,
                // 'term' => $item->term,
                'description' => $item->pivot->description,
            ];
        });
    }

}
