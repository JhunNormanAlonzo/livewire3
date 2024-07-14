<div>
    <x-modal wire:model="showCreateModal" class="backdrop-blur">
        <div class="grid grid-cols-12">
            <div class="col-span-12 my-2">
                <x-input wire:keydown.enter="save" wire:model="name" placeholder="Room Status" icon="o-home" />
            </div>
            <div class="col-span-12 my-2">
                <x-button label="Save" class="btn-info float-end mx-2" wire:click="save"  />
                <x-button label="Cancel" class="btn-error float-end " @click="$wire.clear; $wire.$set('showCreateModal', false); " />
            </div>
        </div>
    </x-modal>

    <x-button label="Add" icon="o-plus" @click="$wire.$set('showCreateModal', true);"  spinner class="btn-info" />

</div>
