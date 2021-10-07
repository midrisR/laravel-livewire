@push('styles')
    <style>
        .modal {
            transition: opacity 0.25s ease;
        }

        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }

    </style>
@endpush


<div class="div">
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div
                class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="w-full flex justify-between items-center">
                    <button type="button"
                        class=" inline-flex items-center px-4 py-2 rounded bg-indigo-400 text-white focus:outline-none border-transparent focus:ring-indigo-700 focus:ring-2 "
                        wire:click="handleModal">
                        <x-feathericon-plus width="18" />
                        <span class="ml-2 text-sm"> Create</span>
                    </button>
                    <input type="search"
                        class="w-1/2 my-3 bg-white shadow rounded px-4 py-2 focus:outline-none border-transparent focus:ring-transparent focus:ring-0 placeholder-gray-400"
                        placeholder="categorie product" wire:model="search">
                </div>
                {{-- TABLE --}}
                <div
                    class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date Created
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($categories as $categorie)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="text-sm text-gray-900 text-left">
                                            {{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="text-sm text-gray-900 text-left">
                                            {{ $categorie->name }}</div>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap font-semibold text-center">
                                        <div
                                            class="p-1 text-sm {{ $categorie->status === '1' ? 'text-green-500' : 'text-red-500' }} bg-opacity-30 text-left">
                                            {{ $categorie->status === '1' ? 'active' : 'not active' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="text-sm text-gray-900 text-left">
                                            {{ $categorie->created_at }}</div>
                                    </td>
                                    <td class="py-4 whitespace-nowrap flex">
                                        <button
                                            class="bg-green-200 rounded w-8 h-8 text-green-700 inline-flex items-center justify-center focus:outline-none focus:ring-1 focus:ring-green-600 mr-5"
                                            wire:click="confirmCategorieEdit({{ $categorie->id }})">
                                            <x-feathericon-edit width="18" />
                                        </button>
                                        <button
                                            class="bg-red-200 rounded w-8 h-8 text-red-700 inline-flex items-center justify-center focus:outline-none focus:ring-1 focus:ring-red-600"
                                            wire:click="confirmCategorieDeletion({{ $categorie->id }})"
                                            wire:loading.attr="disabled">
                                            <x-feathericon-trash width="18" />
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="p-2">
                        {{ $categories->links('livewire.pagination', ['is_livewire' => true]) }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Modal Delete --}}
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

    {{-- MODAL EDIT --}}
    <x-jet-modal wire:model="confirmEdit" maxWidth="lg">
        <x-slot name="slot">
            <form class="w-1/2">
                <x-input model="name" name="Name" />
                <x-input model="description" name="Description" />
                <x-select value="{{ $status }}" model="status"
                    name="Status" open="{{ $openSelect }}" />
                <x-upload name="Image" model="image" />

            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmEdit', false)"
                wire:loading.attr="disabled">
                {{ __('Cencel') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-2"
                wire:click="edit({{ $confirmEdit }})"
                wire:loading.attr="disabled">
                {{ __('UPDATE') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-modal>









    {{-- @if ($isOpen)
        <x-customised-modal>
            <x-slot name="content">
                <form>
                    <x-input model="name" name="Name" />
                    <x-input model="description" name="Description" />
                    <x-select value="{{ $status }}" model="status"
                        name="Status" open="{{ $openSelect }}" />
                    <x-upload name="Image" model="image" />
                    <div class="flex justify-end pt-2">
                        <button type="button" wire:click.prevent="store"
                            class="px-4 bg-indigo-500 p-2 rounded-lg text-white hover:bg-gray-100 hover:text-indigo-400 mr-2 focus:outline-none">Submit</button>
                    </div>
                </form>
            </x-slot>
        </x-customised-modal>
    @endif --}}
</div>

@push('script')
    <script>
        window.addEventListener('openSelect', event => {
            const lm = document.getElementById('list-menu')
            lm.classList.remove("hidden")
        })
    </script>
@endpush
