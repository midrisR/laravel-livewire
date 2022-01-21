<div class="mb-3 pt-0 grid grid-cols-1">
    <span class="text-sm text-indigo-700">{{ $name }}</span>
    <div
        class="relative rounded py-1 border-gray-200 border bg-white flex justify-center items-center">
        <div class="absolute cursor-pointer">
            <div class="flex items-center">
                <x-feathericon-upload class="text-gray-400 mr-4" width="20" />
                <span class="block text-gray-400 font-normal">Browse
                    you files here</span>
            </div>
        </div>
        <input type="file" class="h-full w-full opacity-0"
            name="{{ $name }}" wire:model="{{ $model }}">
    </div>

    @error($model)
        <span class="error text-sm italic text-red-500">{{ $message }}</span>
    @enderror
</div>
