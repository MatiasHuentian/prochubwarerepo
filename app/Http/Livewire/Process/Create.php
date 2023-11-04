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
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public Process $process;

    public array $input = [];
    public array $inputs = [];

    public array $output = [];

    public array $glosary = [];
    public array $glossaries = [];
    // public array $selected_glossaries_Descriptions = [];

    public array $objective_group = [];

    public array $listsForFields = [];

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
        $this->listsForFields['glosaries']       = Glossary::with('processes')->get();
        $this->listsForFields['glosary']         = $this->listsForFields['glosaries']->pluck('term', 'id')->toArray();

        $this->listsForFields['inputs']           = Input::with('processes')->get();
        $this->listsForFields['input']           = $this->listsForFields['inputs']->pluck('name', 'id')->toArray();
        $this->listsForFields['output']          = Output::pluck('name', 'id')->toArray();
        $this->listsForFields['objective_group'] = ObejctivesGroup::pluck('name', 'id')->toArray();
    }

    public function select_glosary()
    {
        // Filtrar $glossaries
        $glossaries = array_filter($this->glossaries, function ($glossary) {
            return in_array($glossary['id'], $this->glosary);
        });

        // Crear elementos faltantes
        $existingIds = array_column($this->glossaries, 'id');
        $missingIds = array_diff($this->glosary, $existingIds);
        $descriptions = [];
        foreach ($missingIds as $missingId) {
            if ($this->listsForFields['glosary'][$missingId] ?? false) {
                // En caso de que exista el id
                $name = $this->listsForFields['glosary'][$missingId];
                $descriptions = Glossary::with('processes')->find($missingId)
                    ->processes
                    ->unique() // Filtra descripciones únicas
                    ->mapWithKeys(function ($process) {
                        return [$process->pivot->description => $process->pivot->description];
                    })
                    ->toArray();
            } else {
                // en caso de que no exista el id
                array_push($this->listsForFields['glosary'],  $missingId);
                $name = $missingId;
                $missingId =  $missingId;
            }

            $glossaries[] = [
                'id' => $missingId,
                'name' => $name,
                'description' => "",
                'descriptions' => $descriptions,
            ];
        }

        $this->glossaries = $glossaries;
        $this->dispatchBrowserEvent('apply_select2');
    }

    public function select_input()
    {
        // Filtrar $inputs
        $inputs = array_filter($this->inputs, function ($input) {
            return in_array($input['id'], $this->input);
        });

        // Crear elementos faltantes
        $existingIds = array_column($this->inputs, 'id');
        $missingIds = array_diff($this->input, $existingIds);
        $descriptions = [];
        foreach ($missingIds as $missingId) {
            if ($this->listsForFields['input'][$missingId] ?? false) {
                // En caso de que exista el id
                $name = $this->listsForFields['input'][$missingId];
                $descriptions = input::with('processes')->find($missingId)
                    ->processes
                    ->unique() // Filtra descripciones únicas
                    ->mapWithKeys(function ($process) {
                        return [$process->pivot->description => $process->pivot->description];
                    })
                    ->toArray();
            } else {
                // en caso de que no exista el id
                array_push($this->listsForFields['input'],  $missingId);
                $name = $missingId;
                $missingId =  $missingId;
            }

            $inputs[] = [
                'id' => $missingId,
                'name' => $name,
                'description' => "",
                'descriptions' => $descriptions,
            ];
        }

        $this->inputs = $inputs;
        $this->dispatchBrowserEvent('apply_select2');
    }
}
