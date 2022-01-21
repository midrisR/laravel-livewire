<div class="">
    <button type="button"
        class=" inline-flex items-center px-4 py-2 rounded bg-black text-white focus:outline-none border-transparent"
        wire:click="openModal">
        <x-feathericon-plus width="18" />
        <span class="ml-2 text-sm">Create</span>
    </button>
    <table class="min-w-full divide-y divide-gray-200 mt-4">
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
                    Role
                </th>
                <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    status
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($employes as $employe)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 text-left">
                            {{ $loop->iteration }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 text-left">
                            {{ $employe->name }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 text-left">
                            @foreach ($roles as $role)
                                @if ($role->id === $employe->role_id)
                                    {{ $role->name }}
                                @endif
                            @endforeach
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 text-left">
                            {{ $employe->status > 0 ? 'Active' : 'Not Active' }}
                        </div>
                    </td>
                    <td class="py-4 whitespace-nowrap flex">
                        <button
                            class="bg-green-200 rounded w-8 h-8 text-green-700 inline-flex items-center justify-center focus:outline-none focus:ring-1 focus:ring-green-600 mr-5"
                            wire:click="modalEdit({{ $employe->id }})">
                            <x-feathericon-edit width="18" />
                        </button>
                        <button
                            class="bg-red-200 rounded w-8 h-8 text-red-700 inline-flex items-center justify-center focus:outline-none focus:ring-1 focus:ring-red-600"
                            wire:click="$set('delete',{{ $employe->id }})"
                            wire:loading.attr="disabled">
                            <x-feathericon-trash width="18" />
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-jet-modal wire:model="open" maxWidth="lg">
        <x-slot name="slot">
            <div class="p-5">
                <form class="w-full">
                    <x-input model="name" name="Name" />
                    <x-input model="phone" name="Phone" />
                    <x-input model="email" name="Email" />
                    <div class="mb-3 pt-0">
                        <span class="text-sm text-indigo-700">Role</span>
                        <select wire:model.debounce.500ms="role_id"
                            class="px-3 py-2 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                            <option></option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id') <span
                                class="error text-sm italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 pt-0">
                        <span class="text-sm text-indigo-700">Status</span>
                        <select wire:model.debounce.500ms="status"
                            class="px-3 py-2 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                            <option></option>
                            <option value="0">Not Active</option>
                            <option value="1">Active</option>
                        </select>
                        @error('status') <span
                                class="error text-sm italic text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 bg-gray-100 text-right">
                @if ($action === 'create')
                    <button type="button"
                        class="bg-indigo-500 px-4 py-2 text-sm rounded text-white focus:outline-none"
                        wire:click="store">Create</button>
                @else
                    <button type="button"
                        class="bg-indigo-500 px-4 py-2 rounded text-xs text-white focus:outline-none"
                        wire:click="update({{ $open }})">UPDATE</button>
                @endif
                <x-jet-secondary-button wire:click="$set('open', false)"
                    wire:loading.attr="disabled">
                    {{ __('Cencel') }}
                </x-jet-secondary-button>
            </div>
        </x-slot>
    </x-jet-modal>

    <x-jet-confirmation-modal wire:model="delete">
        <x-slot name="title">
            {{ __('Delete Item') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete Item? ') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('delete', false)"
                wire:loading.attr="disabled">
                {{ __('Cencel') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-2"
                wire:click="destroy({{ $delete }})"
                wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
