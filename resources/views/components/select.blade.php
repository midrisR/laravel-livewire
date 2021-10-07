<div class="mb-3 pt-0 relative" wire:click="openSelect">
    <span class="text-sm text-indigo-700">{{ $name }}</span>
    <div
        class="select w-full flex items-center justify-between border border-gray-200 rounded px-3 py-2 text-gray-400">
        <span>
            @if ($value !== '')
                {{ $value === '1' ? 'active' : 'not active' }}
            @else
                Pilih Status
            @endif
        </span>
        <x-feathericon-chevron-down />
    </div>
    <div class="{{ $open ? 'w-full bg-white rounded-lg border border-gray-200 mt-2 absolute z-20 shadow transition duration-500 ease-in-out' : 'hidden' }}"
        id="list-menu">
        <div class="text-gray-500 px-3 py-2 border-b"
            wire:click="$set('status', '1')">enable</div>
        <div class="text-gray-500 px-3 py-2 border-b"
            wire:click="$set('status', '0')">disable</div>
    </div>
    @error($model) <span
            class="error text-sm italic text-red-500">{{ $message }}</span>
    @enderror
</div>
