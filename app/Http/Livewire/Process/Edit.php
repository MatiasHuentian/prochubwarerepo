<?php

namespace App\Http\Livewire\Process;

use App\Models\Glossary;
use App\Models\Process;
use Livewire\Component;

class Edit extends Component
{
    public Process $process;

    public array $glosary = [];

    public array $listsForFields = [];

    public function mount(Process $process)
    {
        $this->process = $process;
        $this->glosary = $this->process->glosary()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.process.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->process->save();
        $this->process->glosary()->sync($this->glosary);

        return redirect()->route('admin.processes.index');
    }

    protected function rules(): array
    {
        return [
            'process.objective' => [
                'string',
                'nullable',
            ],
            'glosary' => [
                'array',
            ],
            'glosary.*.id' => [
                'integer',
                'exists:glossaries,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['glosary'] = Glossary::pluck('term', 'id')->toArray();
    }
}
