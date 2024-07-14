<?php

namespace App\Livewire\RoomStatus;

use App\Models\RoomStatus;
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
        $roomStatus = RoomStatus::create([
            'name' => $this->name
        ]);
        if($roomStatus){
            $this->dispatch('created');
            $this->clear();
            $this->showCreateModal = false;
            $this->success('Success', "Room status created successfully", 'toast-top');
        }
    }



    public function clear() : void {
        $this->name = '';
    }

    public function render()
    {
        return view('livewire.room-status.create');
    }
}
