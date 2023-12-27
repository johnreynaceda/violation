<div>
    <x-button label="Add Violation" dark icon="plus" wire:click="$set('add_modal', true)" />

    <ul class="mt-20 ">
        @foreach ($violations as $item)
            <li class="bg-gray-100 rounded-gh p-5 flex space-x-2">
                <div>
                    <h1>Name: {{ $item->name }}</h1>
                    <h1>Strand: {{ $item->strand }}</h1>
                    <h1>Violation: {{ $item->violation }}</h1>
                </div>
                <x-button label="edit" icon="pencil-alt" wire:click="edit({{ $item->id }})" positive />

            </li>
        @endforeach
    </ul>

    <x-modal wire:model.defer="add_modal">
        <x-card title="Add Modal">
            <div class="space-y-3">
                <x-input label="Name" wire:model="name" placeholder="" />
                <x-input label="strand" placeholder="" wire:model="strand" />
                <x-input label="violation" placeholder="" wire:model="violation" />
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Submit" wire:click="submit" spinner="submit" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>


    <x-modal wire:model.defer="edit_modal">
        <x-card title="Edit Model">
            <div class="space-y-3">
                <x-input label="Name" wire:model="name" placeholder="" />
                <x-input label="strand" placeholder="" wire:model="strand" />
                <x-input label="violation" placeholder="" wire:model="violation" />
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Submit" wire:click="submitEdit" spinner="submitEdit" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
