<?php

namespace App\Http\Livewire\Process;

use App\Models\Glossary;
use App\Models\Process;
use Livewire\Component;

class Create extends Component
{
    public Process $process;

    public $selectedGlossaries = [];
    public $allGlossaries = [];

    public function mount(Process $process)
    {
        $this->allGlossaries = Glossary::all();
        $this->process = $process;
    }

    public function render()
    {
        return view('livewire.process.create');
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
}
