<div class="mb-3 pt-0">
    <span class="text-sm text-indigo-700">{{ $name }}</span>
    <input type="text" wire:model.debounce.500ms="{{ $model }}"
        class="px-3 py-2 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
    @error($model) <span
            class="error text-sm italic text-red-500">{{ $message }}</span>
    @enderror
</div>
