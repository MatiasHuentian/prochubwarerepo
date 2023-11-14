<?php

namespace App\Http\Livewire\Process;

use App\Models\ActivitiesRisk;
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
    public array $inputs = [];

    public array $output = [];
    public array $outputs = [];

    public array $glosary = [];
    public array $glossaries = [];
    // public array $selected_glossaries_Descriptions = [];

    public array $objective_group = [];
    public array $objectives_groups = [];

    public array $activities = [];

    public function addActivity()
    {
        $this->activities[] = ['name' => '', 'description' => "" , 'activitiesRisks' => [] ];
    }

    public function addRisk( $i  )
    {
        $this->activities[$i]["activitiesRisks"][] = [ 'risk' => new ActivitiesRisk() ] ;
    }

    public function removeActivity( $index )
    {
        unset($this->activities[$index]);
        $this->activities = array_values($this->activities);
    }

    public array $listsForFields = [];

    public function mount(Process $process)
    {
        // $this->activities[] = [
        //     'name' => "",
        //     'description' => "",
        //     'activitiesRisks' => new ActivitiesRisk() ,
        // ];

        $this->process = $process;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.process.create');
    }

    private function refactor_many_to_many($collection)
    {
        $syncData = [];
        foreach ($collection as $item) {
            $id = $item['id'];
            $description = $item['description'];
            $syncData[$id] = ['description' => $description];
        }
        return $syncData;
    }

    public function submit()
    {
        $this->validate();
        $this->process->save();
        $this->process->input()->sync(
            $this->refactor_many_to_many($this->inputs)
        );
        $this->process->glosary()->sync(
            $this->refactor_many_to_many($this->glossaries)
        );
        $this->process->output()->sync(
            $this->refactor_many_to_many($this->outputs)
        );
        $this->process->objectiveGroup()->sync(
            $this->refactor_many_to_many($this->objectives_groups)
        );
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
        $this->listsForFields['input']            = $this->listsForFields['inputs']->pluck('name', 'id')->toArray();

        $this->listsForFields['outputs']          = Output::with('processes')->get();
        $this->listsForFields['output']           = $this->listsForFields['outputs']->pluck('name', 'id')->toArray();

        $this->listsForFields['objectives_groups'] = ObejctivesGroup::with('processes')->get();
        $this->listsForFields['objective_group']  = $this->listsForFields['objectives_groups']->pluck('name', 'id')->toArray();
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
                $descriptions = Input::with('processes')->find($missingId)
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

    public function select_output()
    {
        // Filtrar $outputs
        $outputs = array_filter($this->outputs, function ($output) {
            return in_array($output['id'], $this->output);
        });

        // Crear elementos faltantes
        $existingIds = array_column($this->outputs, 'id');
        $missingIds = array_diff($this->output, $existingIds);
        $descriptions = [];
        foreach ($missingIds as $missingId) {
            if ($this->listsForFields['output'][$missingId] ?? false) {
                // En caso de que exista el id
                $name = $this->listsForFields['output'][$missingId];
                $descriptions = output::with('processes')->find($missingId)
                    ->processes
                    ->unique() // Filtra descripciones únicas
                    ->mapWithKeys(function ($process) {
                        return [$process->pivot->description => $process->pivot->description];
                    })
                    ->toArray();
            } else {
                // en caso de que no exista el id
                array_push($this->listsForFields['output'],  $missingId);
                $name = $missingId;
                $missingId =  $missingId;
            }

            $outputs[] = [
                'id' => $missingId,
                'name' => $name,
                'description' => "",
                'descriptions' => $descriptions,
            ];
        }

        $this->outputs = $outputs;
        $this->dispatchBrowserEvent('apply_select2');
    }

    public function select_objective_group()
    {
        // Filtrar $objectives_groups
        $objectives_groups = array_filter($this->objectives_groups, function ($objective_group) {
            return in_array($objective_group['id'], $this->objective_group);
        });

        // Crear elementos faltantes
        $existingIds = array_column($this->objectives_groups, 'id');
        $missingIds = array_diff($this->objective_group, $existingIds);
        $descriptions = [];
        foreach ($missingIds as $missingId) {
            if ($this->listsForFields['objective_group'][$missingId] ?? false) {
                // En caso de que exista el id
                $name = $this->listsForFields['objective_group'][$missingId];
                $descriptions = ObejctivesGroup::with('processes')->find($missingId)
                    ->processes
                    ->unique() // Filtra descripciones únicas
                    ->mapWithKeys(function ($process) {
                        return [$process->pivot->description => $process->pivot->description];
                    })
                    ->toArray();
            } else {
                // en caso de que no exista el id
                array_push($this->listsForFields['objective_group'],  $missingId);
                $name = $missingId;
                $missingId =  $missingId;
            }

            $objectives_groups[] = [
                'id' => $missingId,
                'name' => $name,
                'description' => "",
                'descriptions' => $descriptions,
            ];
        }

        $this->objectives_groups = $objectives_groups;
        $this->dispatchBrowserEvent('apply_select2');
    }
}
