<?php

namespace App\Livewire\Room;

use App\Models\RoomStatus;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Index extends Component
{
    use Toast;

//    #[Validate('required')]
    public string $search = '';

//    #[Validate('required|unique:room_statuses')]
    public string $name = '';
    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];


    public function rules(): array
    {
        return [
            'name' => 'required|unique:room_statuses', // Define the validation rule
        ];
    }

    public function save() : void {
        $this->validate();
    }
    public function clear() : void {
        $this->reset();
        $this->info('Cleared', position: 'toast-top');
    }

    public function roomStatuses() : \Illuminate\Database\Eloquent\Collection
    {
        return RoomStatus::all();
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
        return view('livewire.room.index', [
            'roomStatuses' => $this->roomStatuses(),
            'headers' => $this->headers()
        ]);
    }
}
