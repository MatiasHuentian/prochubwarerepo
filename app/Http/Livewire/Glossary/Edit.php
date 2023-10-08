<?php

namespace App\Http\Livewire\Glossary;

use App\Models\Admin\Glossary;
use Livewire\Component;

class Edit extends Component
{
    public Glossary $glossary;

    public function mount(Glossary $glossary)
    {
        $this->glossary = $glossary;
    }

    public function render()
    {
        return view('livewire.glossary.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->glossary->save();

        return redirect()->route('admin.glossaries.index');
    }

    protected function rules(): array
    {
        return [
            'glossary.term' => [
                'string',
                'max:100',
                'required',
            ],
        ];
    }
}
