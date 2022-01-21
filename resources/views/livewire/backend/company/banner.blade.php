<div>
    <h1 class="btn">HALAMAN BENNER</h1>
    <button class="bg-black text-white px-4 py-2 rounded mb-8"
        wire:click="openModal">
        Add Banner
    </button>
    <div class="flex flex-wrap">
        @foreach ($banners as $banner)
            <div class="w-1/2 px-4 relative">
                <div class="flex justify-start items-center">
                    <x-feathericon-edit width="32" class="text-green-500"
                        wire:click="openModalEdit({{ $banner->id }})" />
                    <x-feathericon-trash width="32" class="text-red-500"
                        wire:click="openModalDelete({{ $banner->id }})" />
                </div>
                <div class="w-full bg-white rounded p-5 shadow-lg">
                    <img
                        src="{{ asset('storage/photos/banners/' . $banner->image) }}">
                </div>
            </div>
        @endforeach
    </div>
    {{-- MODAL --}}
    <x-jet-modal wire:model="openModal" maxWidth="lg">
        <x-slot name="slot">
            <div class="p-5">
                <form class="w-full">
                    <div class="mb-3">
                        <span class="text-sm text-gray-800">Status</span>
                        <select wire:model="status"
                            class="w-full px-3 py-2 rounded focus:outlie-none relative bg-white">
                            <option value="1" selected>active</option>
                            <option value="0">not active</option>
                        </select>
                    </div>
                    @error('status') <span
                            class="error text-sm italic text-red-500">{{ $message }}</span>
                    @enderror
                    <x-upload name="Image" model="image" />
                    @if ($type === 'create')
                        @if ($image)
                            <div class="rounded-xl">
                                <img src="{{ $image->temporaryUrl() }}"
                                    width="100">
                            </div>
                        @endif
                    @elseif($type === 'update')
                        @if ($image)
                            <div class="rounded-xl">
                                <img src="{{ $image->temporaryUrl() }}"
                                    width="100">
                            </div>
                        @else
                            <div class="rounded-xl">
                                <img
                                    src="{{ asset('storage/photos/banners/' . $oldImage) }}">
                            </div>
                        @endif

                    @endif
                </form>
            </div>
            <div class="px-6 py-4 bg-gray-100 text-right">
                @if ($type === 'create')
                    <button type="button"
                        class="bg-indigo-500 px-4 py-2 text-sm rounded text-white focus:outline-none"
                        wire:click="store">Create</button>
                @else
                    <button type="button"
                        class="bg-indigo-500 px-4 py-2 rounded text-xs text-white focus:outline-none"
                        wire:click="">UPDATE</button>
                @endif
                <x-jet-secondary-button wire:click="$set('openModal', false)"
                    wire:loading.attr="disabled">
                    {{ __('Cencel') }}
                </x-jet-secondary-button>
            </div>
        </x-slot>
    </x-jet-modal>

    {{-- MODAL DELETE --}}
    <x-jet-confirmation-modal wire:model="confirmDetele">
        <x-slot name="title">
            {{ __('Delete Item') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete Item? ') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmDetele', false)"
                wire:loading.attr="disabled">
                {{ __('Cencel') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-2"
                wire:click="destroy({{ $confirmDetele }})"
                wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
