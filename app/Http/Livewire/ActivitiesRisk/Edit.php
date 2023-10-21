<?php

namespace App\Http\Livewire\ActivitiesRisk;

use App\Models\ActivitiesRisk;
use App\Models\ActivitiesRisksImpact;
use App\Models\ActivitiesRisksPolitic;
use App\Models\ActivitiesRisksProbability;
use App\Models\ProcessesActivity;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public ActivitiesRisk $activitiesRisk;

    public function mount(ActivitiesRisk $activitiesRisk)
    {
        $this->activitiesRisk = $activitiesRisk;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.activities-risk.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->activitiesRisk->save();

        return redirect()->route('admin.activities-risks.index');
    }

    protected function rules(): array
    {
        return [
            'activitiesRisk.activity_id' => [
                'integer',
                'exists:processes_activities,id',
                'required',
            ],
            'activitiesRisk.name' => [
                'string',
                'max:100',
                'required',
            ],
            'activitiesRisk.politic_id' => [
                'integer',
                'exists:activities_risks_politics,id',
                'nullable',
            ],
            'activitiesRisk.probability_id' => [
                'integer',
                'exists:activities_risks_probabilities,id',
                'required',
            ],
            'activitiesRisk.impact_id' => [
                'integer',
                'exists:activities_risks_impacts,id',
                'nullable',
            ],
            'activitiesRisk.description' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['activity']    = ProcessesActivity::pluck('name', 'id')->toArray();
        $this->listsForFields['politic']     = ActivitiesRisksPolitic::pluck('name', 'id')->toArray();
        $this->listsForFields['probability'] = ActivitiesRisksProbability::pluck('name', 'id')->toArray();
        $this->listsForFields['impact']      = ActivitiesRisksImpact::pluck('name', 'id')->toArray();
    }
}
