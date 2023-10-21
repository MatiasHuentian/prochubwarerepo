<?php

namespace App\Http\Livewire\ProcessesActivity;

use App\Models\Process;
use App\Models\ProcessesActivity;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public ProcessesActivity $processesActivity;

    public function mount(ProcessesActivity $processesActivity)
    {
        $this->processesActivity = $processesActivity;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.processes-activity.create');
    }

    public function submit()
    {
        $this->validate();

        $this->processesActivity->save();

        return redirect()->route('admin.processes-activities.index');
    }

    protected function rules(): array
    {
        return [
            'processesActivity.name' => [
                'string',
                'max:100',
                'required',
            ],
            'processesActivity.process_id' => [
                'integer',
                'exists:processes,id',
                'required',
            ],
            'processesActivity.description' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['process'] = Process::pluck('name', 'id')->toArray();
    }
}
