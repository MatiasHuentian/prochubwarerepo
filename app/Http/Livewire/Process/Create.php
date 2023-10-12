<?php

namespace App\Http\Livewire\Process;

use App\Models\Dependency;
use App\Models\Glossary;
use App\Models\Input;
use App\Models\ObejctivesGroup;
use App\Models\Output;
use App\Models\Process;
use App\Models\ProcessesState;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public Process $process;

    public array $input = [];

    public array $output = [];

    public array $glosary = [];

    public array $listsForFields = [];

    public array $objective_group = [];

    public function mount(Process $process)
    {
        $this->process = $process;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.process.create');
    }

    public function submit()
    {
        $this->validate();

        $this->process->save();
        $this->process->glosary()->sync($this->glosary);
        $this->process->input()->sync($this->input);
        $this->process->output()->sync($this->output);
        $this->process->objectiveGroup()->sync($this->objective_group);

        return redirect()->route('admin.processes.index');
    }

    protected function rules(): array
    {
        return [
            'process.name' => [
                'string',
                'required',
            ],
            'process.owner_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'process.objective' => [
                'string',
                'nullable',
            ],
            'process.dependency_id' => [
                'integer',
                'exists:dependencies,id',
                'required',
            ],
            'process.state_id' => [
                'integer',
                'exists:processes_states,id',
                'required',
            ],
            'process.introduction' => [
                'string',
                'nullable',
            ],
            'process.contextual_memo' => [
                'string',
                'nullable',
            ],
            'process.start_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'process.end_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'glosary' => [
                'array',
            ],
            'glosary.*.id' => [
                'integer',
                'exists:glossaries,id',
            ],
            'input' => [
                'array',
            ],
            'input.*.id' => [
                'integer',
                'exists:inputs,id',
            ],
            'output' => [
                'array',
            ],
            'output.*.id' => [
                'integer',
                'exists:outputs,id',
            ],
            'objective_group' => [
                'array',
            ],
            'objective_group.*.id' => [
                'integer',
                'exists:obejctives_groups,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['owner']           = User::pluck('name', 'id')->toArray();
        $this->listsForFields['dependency']      = Dependency::pluck('name', 'id')->toArray();
        $this->listsForFields['state']           = ProcessesState::pluck('name', 'id')->toArray();
        $this->listsForFields['glosary']         = Glossary::pluck('term', 'id')->toArray();
        $this->listsForFields['input']           = Input::pluck('name', 'id')->toArray();
        $this->listsForFields['output']          = Output::pluck('name', 'id')->toArray();
        $this->listsForFields['objective_group'] = ObejctivesGroup::pluck('name', 'id')->toArray();
    }
}
