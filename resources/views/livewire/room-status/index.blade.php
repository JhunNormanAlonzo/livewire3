<div>

    <x-header title="Room Statuses" separator >
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" class="btn-primary" />
        </x-slot:actions>
    </x-header>





    <livewire:room-status.create />

    <x-card class="my-3" >
        <x-table :rows="$roomStatuses" :headers="$headers" :sort-by="$sortBy"  with-pagination>
            @scope('actions', $roomStatuses)
            <div class="flex">
                <x-button icon="o-pencil" @click="$wire.$set('showEditModal', true); $wire.edit({{$roomStatuses['id']}})"  spinner class="btn-outline btn-sm " />
                <x-button icon="o-trash" @click="$wire.$set('confirmDeleteModal', true); $wire.$set('idToDelete', {{$roomStatuses['id']}})"  spinner class="btn-ghost btn-sm text-red-500" />
            </div>
            @endscope
        </x-table>
    </x-card>



    <x-modal wire:model="showEditModal" class="backdrop-blur">
        <div class="grid grid-cols-12">
            <div class="col-span-12 my-2">
                <x-input wire:model="name" value="{{$roomStatus['name'] ?? ''}}" placeholder="Room Status" icon="o-home" />
            </div>
            <div class="col-span-12 my-2">
                <x-button label="Update" class="btn-info float-end mx-2" wire:click="update({{$roomStatus['id'] ?? ''}})"  />
                <x-button label="Cancel" class="btn-error float-end " @click="$wire.clear; $wire.$set('showEditModal', false); " />
            </div>
        </div>
    </x-modal>


    <x-modal wire:model="confirmDeleteModal" class="backdrop-blur">
        <div class="mb-5">Are you sure you want to delete room status?</div>
        <x-button label="Cancel" wire:click="$set('confirmDeleteModal', false);" />
        <x-button label="Delete" wire:click="deleteRoomStatus"  destructive />
    </x-modal>



</div>
