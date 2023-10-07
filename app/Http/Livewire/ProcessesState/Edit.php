<?php

namespace App\Http\Livewire\ProcessesState;

use App\Models\Admin\ProcessesState;
use Livewire\Component;

class Edit extends Component
{
    public ProcessesState $processesState;

    public function mount(ProcessesState $processesState)
    {
        $this->processesState = $processesState;
    }

    public function render()
    {
        return view('livewire.processes-state.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->processesState->save();

        return redirect()->route('admin.processes-states.index');
    }

    protected function rules(): array
    {
        return [
            'processesState.name' => [
                'string',
                'max:100',
                'required',
            ],
            'processesState.color' => [
                'string',
                'min:6',
                'max:8',
                'required',
            ],
        ];
    }
}
