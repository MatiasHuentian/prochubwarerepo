<?php

namespace App\Http\Livewire\Input;

use App\Models\Admin\Input;
use Livewire\Component;

class Create extends Component
{
    public Input $input;

    public function mount(Input $input)
    {
        $this->input = $input;
    }

    public function render()
    {
        return view('livewire.input.create');
    }

    public function submit()
    {
        $this->validate();

        $this->input->save();

        return redirect()->route('admin.inputs.index');
    }

    protected function rules(): array
    {
        return [
            'input.name' => [
                'string',
                'max:100',
                'required',
            ],
        ];
    }
}
