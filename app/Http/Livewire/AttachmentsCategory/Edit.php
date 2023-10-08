<?php

namespace App\Http\Livewire\AttachmentsCategory;

use App\Models\Admin\AttachmentsCategory;
use Livewire\Component;

class Edit extends Component
{
    public AttachmentsCategory $attachmentsCategory;

    public function mount(AttachmentsCategory $attachmentsCategory)
    {
        $this->attachmentsCategory = $attachmentsCategory;
    }

    public function render()
    {
        return view('livewire.attachments-category.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->attachmentsCategory->save();

        return redirect()->route('admin.attachments-categories.index');
    }

    protected function rules(): array
    {
        return [
            'attachmentsCategory.name' => [
                'string',
                'max:100',
                'required',
            ],
        ];
    }
}
