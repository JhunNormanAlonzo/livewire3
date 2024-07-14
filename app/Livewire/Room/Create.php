<?php

namespace App\Livewire\Room;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{
    use Toast;

    public bool $showCreateModal = false;

    #[Validate('required|unique:room_statuses')]
    public string $name = '';

    public function save() : void
    {
        $this->validate();
//        $this->success('Success', "Room status created successfully", 'toast-top');
    }

    public function render()
    {
        return view('livewire.room.create');
    }
}
