<?php

namespace App\Http\Livewire\Dependency;

use App\Models\Admin\Dependency;
use App\Models\Admin\Direction;
use Livewire\Component;

class Edit extends Component
{
    public Dependency $dependency;

    public array $listsForFields = [];

    public function mount(Dependency $dependency)
    {
        $this->dependency = $dependency;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.dependency.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->dependency->save();

        return redirect()->route('admin.dependencies.index');
    }

    protected function rules(): array
    {
        return [
            'dependency.name' => [
                'string',
                'max:100',
                'required',
            ],
            'dependency.direction_id' => [
                'integer',
                'exists:directions,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['direction'] = Direction::pluck('name', 'id')->toArray();
    }
}
