<div>

    <x-header title="Room Statuses" separator >
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" class="btn-primary" />
        </x-slot:actions>
    </x-header>


    <x-card >
        <x-table :rows="$roomStatuses" :headers="$headers" :sort-by="$sortBy"></x-table>
    </x-card>
</div>
