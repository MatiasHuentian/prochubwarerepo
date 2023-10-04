<?php

namespace App\Http\Livewire\ProposalsUpgradesState;

use App\Models\ProposalsUpgradesState;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public ProposalsUpgradesState $proposalsUpgradesState;

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->proposalsUpgradesState->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(ProposalsUpgradesState $proposalsUpgradesState)
    {
        $this->proposalsUpgradesState = $proposalsUpgradesState;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.proposals-upgrades-state.create');
    }

    public function submit()
    {
        $this->validate();

        $this->proposalsUpgradesState->save();
        $this->syncMedia();

        return redirect()->route('admin.proposals-upgrades-states.index');
    }

    protected function rules(): array
    {
        return [
            'proposalsUpgradesState.prueba_1' => [
                'string',
                'nullable',
            ],
            'proposalsUpgradesState.probando_el_textarea' => [
                'string',
                'required',
            ],
            'proposalsUpgradesState.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'proposalsUpgradesState.fecha_inicio' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'mediaCollections.proposals_upgrades_state_archivo' => [
                'array',
                'required',
            ],
            'mediaCollections.proposals_upgrades_state_archivo.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.proposals_upgrades_state_photo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.proposals_upgrades_state_photo.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
    }
}
