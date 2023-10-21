<?php

namespace App\Http\Livewire\Attachment;

use App\Models\Attachment;
use App\Models\AttachmentsCategory;
use App\Models\AttachmentsType;
use App\Models\Process;
use Livewire\Component;

class Edit extends Component
{
    public Attachment $attachment;

    public array $listsForFields = [];

    public function mount(Attachment $attachment)
    {
        $this->attachment = $attachment;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.attachment.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->attachment->save();

        return redirect()->route('admin.attachments.index');
    }

    protected function rules(): array
    {
        return [
            'attachment.process_id' => [
                'integer',
                'exists:processes,id',
                'required',
            ],
            'attachment.type_id' => [
                'integer',
                'exists:attachments_types,id',
                'required',
            ],
            'attachment.category_id' => [
                'integer',
                'exists:attachments_categories,id',
                'required',
            ],
            'attachment.description' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['process']  = Process::pluck('name', 'id')->toArray();
        $this->listsForFields['type']     = AttachmentsType::pluck('name', 'id')->toArray();
        $this->listsForFields['category'] = AttachmentsCategory::pluck('name', 'id')->toArray();
    }
}
