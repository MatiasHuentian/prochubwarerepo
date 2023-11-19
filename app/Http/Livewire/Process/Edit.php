<?php

namespace App\Http\Livewire\Process;

use App\Models\User;
use App\Models\Input;
use App\Models\Output;
use App\Models\Process;
use Livewire\Component;
use App\Models\Glossary;
use App\Models\Dependency;
use App\Models\RisksControl;
use App\Models\ProcessesState;
use App\Models\ObejctivesGroup;
use App\Models\RisksControlsType;
use App\Models\RisksControlsMethod;
use App\Models\ActivitiesRisksCause;
use App\Models\ActivitiesRisksImpact;
use App\Models\ActivitiesRisksPolitic;
use App\Models\RisksControlsFrecuency;
use App\Models\ActivitiesRisksConsequence;
use App\Models\ActivitiesRisksProbability;

class Edit extends Component
{
    public Process $process;

    public array $input = [];
    public array $inputs = [];

    public array $output = [];
    public array $outputs = [];

    public array $glosary = [];
    public array $glossaries = [];

    public array $objective_group = [];
    public array $objectives_groups = [];

    public array $listsForFields = [];

    public array $activities = [];


    public function mount(Process $process)
    {
        $this->process         = $process;
        $this->glosary         = $this->process->glosary()->pluck('id')->toArray();
        $this->input           = $this->process->input()->pluck('id')->toArray();
        $this->output          = $this->process->output()->pluck('id')->toArray();
        $this->objective_group = $this->process->objectiveGroup()->pluck('id')->toArray();

        $this->process = $this->process->load(['activities' => function ($query) {
            return $query->with(['risks' => function ($query) {
                return $query->with(
                    'causes',
                    'consequences',
                    'controls'
                );
            }]);
        }]);

        $this->activities = $this->process->activities->toArray();

        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.process.edit');
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
        $this->process->activities()->delete();
        foreach ($this->activities as $activity) {
            $activities = $this->process->activities()->create($activity);

            $activities->risks()->delete();
            foreach ($activity['risks'] as $risk) {
                $activitiesRisk = $activities->risks()->create($risk);

                foreach (($risk['causes'] ?? []) as $causeData) {
                    // Evitar agregar causas vacías
                    if (!empty($causeData['name'])) {
                        $cause = new ActivitiesRisksCause($causeData);
                        $activitiesRisk->causes()->save($cause);
                    }
                }

                $activitiesRisk->consequences()->delete();
                foreach (($risk['consequences'] ?? []) as $consequencesData) {
                    // Evitar agregar causas vacías
                    if (!empty($consequencesData['name'])) {
                        $consequences = new ActivitiesRisksConsequence($consequencesData);
                        $activitiesRisk->consequences()->save($consequences);
                    }
                }

                $activitiesRisk->controls()->delete();
                foreach (($risk['controls'] ?? []) as $controlsData) {
                    // Evitar agregar causas vacías
                    if (!empty($controlsData['name'])) {
                        $controls = new RisksControl($controlsData);
                        $activitiesRisk->controls()->save($controls);
                    }
                }
            }
        }

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

        $this->listsForFields['politic']            = ActivitiesRisksPolitic::pluck('name', 'id')->toArray();
        $this->listsForFields['probability']        = ActivitiesRisksProbability::pluck('name', 'id')->toArray();
        $this->listsForFields['impact']             = ActivitiesRisksImpact::pluck('name', 'id')->toArray();
        $this->listsForFields['frecuency']          = RisksControlsFrecuency::pluck('name', 'id')->toArray();
        $this->listsForFields['method']             = RisksControlsMethod::pluck('name', 'id')->toArray();
        $this->listsForFields['type']               = RisksControlsType::pluck('name', 'id')->toArray();
    }


    protected function contiene_palabra(string $cadena, string $palabra): bool
    {
        return strpos($cadena, $palabra) !== false;
    }

    /**
     * Convierte una notación de puntos en una representación de array en PHP.
     *
     * @param string $notacion La cadena en notación de puntos a convertir.
     * @return string La cadena en notación de array resultante.
     */
    function dotToArray($notacion)
    {
        $containsDot = strpos($notacion, '.') !== false;
        if ($containsDot) {
            $segmentos = explode('.', $notacion);
            $resultado = '';

            foreach ($segmentos as $index => $segmento) {
                if ($index % 2 == 0) {
                    $resultado .= ($index > 1 ? '"]["' : '') . $segmento;
                } else {
                    $resultado .= ($index != 1 ? '"]["' : '["') . $segmento;
                }
            }
            $resultado = $resultado . '"]'; // Terminando uniendo el array
        } else {
            $resultado = $notacion;
        }
        return $resultado;
    }

    public function add_to_model($model)
    {
        // Busco si contiene las palabras claves activities al mismo tiempo
        $containsActivities = preg_match('/\bactivitiesRisk\b/', $model);
        $containsDot = strpos($model, '.') !== false;

        if (count($model_explode = explode('.', $model)) == 3 and (
            ($containsActivities and $containsDot) || ($this->contiene_palabra($model, "activities") &&
                $this->contiene_palabra($model, "risks"))
        )) {
            $model_explode = explode('.', $model);
            $last_model =  end($model_explode);
            $first_model =  $model_explode[0];
            $this->{$first_model}[$model_explode[1]][$last_model][] =
                ['name' => '', 'description' => ""];
        } else if ($this->contiene_palabra($model, "activities.") && $this->contiene_palabra($model, 'risks.')) {
            $model_explode = explode('.', $model);
            $last_model =  end($model_explode);
            $first_model =  $model_explode[0];
            // dd($model_explode);
            $this->{$first_model}[$model_explode[1]][$model_explode[2]][$model_explode[3]][$last_model][] = [
                ['name' => '', 'description' => ""]
            ];
        } else {
            $notacionArray = $this->dotToArray($model); //$activities["0"]["risks"]["0"]["causes"]
            $this->{$notacionArray}[] = ['name' => '', 'description' => ""];
        }
    }

    public function remove_to_model($model, $index)
    {
        $containsActivities = preg_match('/\bactivitiesRisk\b/', $model);
        $containsDot = strpos($model, '.') !== false;

        if (count($model_explode = explode('.', $model)) == 3 and (
            ($containsActivities and $containsDot) || ($this->contiene_palabra($model, "activities") &&
                $this->contiene_palabra($model, "risks"))
        )) {
            $model_explode = explode('.', $model);
            $last_model =  end($model_explode);
            $first_model =  $model_explode[0];
            unset($this->{$first_model}[$model_explode[1]][$last_model][$index]);
            $this->{$first_model}[$model_explode[1]][$last_model] = array_values($this->{$first_model}[$model_explode[1]][$last_model]);
        } else if ($this->contiene_palabra($model, "activities.") && $this->contiene_palabra($model, 'risks.')) {
            $model_explode = explode('.', $model);
            $last_model =  end($model_explode);
            $first_model =  $model_explode[0];
            // dd($model_explode);
            unset($this->{$first_model}[$model_explode[1]][$model_explode[2]][$model_explode[3]][$last_model][$index]);
            $this->{$first_model}[$model_explode[1]][$model_explode[2]][$model_explode[3]][$last_model] = array_values($this->{$first_model}[$model_explode[1]][$model_explode[2]][$model_explode[3]][$last_model]);
        } else {
            unset($this->{$model}[$index]);
            $this->{$model} = array_values($this->{$model});
        }
    }
}
