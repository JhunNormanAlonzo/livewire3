<?php

namespace App\Livewire\RoomStatus;

use App\Models\RoomStatus;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;
use mysql_xdevapi\Collection;

class Index extends Component
{

    use Toast;
    use WithPagination;



    #[Validate('required')]
    public string $search = '';

    public string $name = '';
    public string $idToDelete = '';
    public RoomStatus $roomStatus;

    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];
    public bool $confirmDeleteModal = false;
    public bool $showEditModal = false;

    public string $idToUpdate = '';

    public function deleteRoomStatus(): void
    {
        RoomStatus::find($this->idToDelete)->delete();
        $this->success('Done', 'Room status deleted successfully', position: 'toast-top');
        $this->confirmDeleteModal = false; // Hide the modal after deletion
    }


    public function edit(RoomStatus $roomStatus): void
    {
        $this->name = $roomStatus->name;
        $this->roomStatus = $roomStatus;
    }

    public function update(RoomStatus $roomStatus): void
    {
        $this->validate([
           'name' => 'required|unique:room_statuses,id,'.$roomStatus->id,
        ]);
        $roomStatus->update([
            'name' => $this->name
        ]);
        $this->dispatch('updated');
        $this->showEditModal = false;
        $this->success('Success', "Room status updated successfully", 'toast-top');
    }

    public function clear() : void {
        $this->reset();
        $this->info('Cleared', position: 'toast-top');
    }

    #[On('created')] #[On('updated')]
    public function roomStatuses()
    {g
        return RoomStatus::paginate(5);
    }

    public function headers() : array
    {
        return [
            ['key' => 'id', 'label' => '#'],
            ['key' => 'name', 'label' => 'Status'],
        ];
    }


    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.room-status.index', [
            'roomStatuses' => $this->roomStatuses(),
            'headers' => $this->headers()
        ]);
    }
}
