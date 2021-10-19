<div class="bg-white shadow rounded p-5">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="edit">
        @if (session()->has('message'))
            <div
                class="w-full bg-green-500 text-white text-center px-4 py-3 my-4">
                {{ session('message') }}
            </div>
        @endif
        <div class="grid grid-cols-3 gap-3">
            <div class="mb-3 pt-0">
                <span class="text-sm text-indigo-700">Name</span>
                <input type="text" wire:model.debounce.500ms="name"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                @error('name') <span
                        class="error text-sm italic text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 pt-0">
                <span class="text-sm text-indigo-700">Status</span>
                <select wire:model.debounce.500ms="status"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                    <option value="1">active</option>
                    <option value="0">dedactive</option>
                </select>
                @error('status') <span
                        class="error text-sm italic text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 pt-0">
                <span class="text-sm text-indigo-700">Category</span>
                <select wire:model.debounce.500ms="CategoryId"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                    <option value="">Select Type</option>
                    @foreach ($categories as $categorie)
                        @if ($categorie->id === $CategoryId)
                            <option value="{{ $categorie->id }}" selected>
                                {{ $categorie->name }}</option>
                        @else
                            <option value="{{ $categorie->id }}">
                                {{ $categorie->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('CategoryId') <span
                        class="error text-sm italic text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-3 gap-3">
            <div class="mb-3 pt-0">
                <span class="text-sm text-indigo-700">Type</span>
                <select wire:model.debounce.500ms="type"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                    <option value="">Select Type</option>
                    @foreach ($types as $ty)
                        @if ($ty->id === $type)
                            <option value="{{ $ty->id }}" selected>
                                {{ $ty->name }}</option>
                        @else
                            <option value="{{ $ty->id }}">
                                {{ $ty->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('type') <span
                        class="error text-sm italic text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 pt-0">
                <span class="text-sm text-indigo-700">Meta Description</span>
                <input type="text" wire:model.debounce.500ms="meta_description"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                @error('meta_description')
                    <span
                        class="error text-sm italic text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 pt-0">
                <span class="text-sm text-indigo-700">Meta Keywords</span>
                <input type="text" wire:model.debounce.500ms="meta_keywords"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                @error('meta_keywords')
                    <span
                        class="error text-sm italic text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 pt-0 grid grid-cols-1">
            <div wire:ignore>
                <span class="text-sm text-indigo-700">Description</span>
                <textarea wire:model.debounce.500ms="description"
                    name="description"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full"
                    id="editor1" rows="10" cols="80">
                            {!! $description !!}
                </textarea>
            </div>
            @error('description')
                <span
                    class="error text-sm italic text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full lg:w-1/3 mb-3 pt-0">
            <span class="text-sm text-indigo-700">Image</span>
            <div
                class="relative rounded py-1 bg-indigo-700 flex justify-center items-center ">
                <div class="absolute">
                    <div class="flex items-center">
                        <x-feathericon-upload class="text-white mr-4"
                            width="20" />
                        <span class="block text-white font-normal">Browse
                            you files here</span>
                    </div>
                </div>
                <input type="file"
                    class="h-full w-full opacity-0 cursor-pointer" name="image"
                    wire:model.debounce.500ms="image">
            </div>
            @error('image')
                <span
                    class="error text-sm italic text-red-500">{{ $message }}</span>
            @enderror
            @error('image.*')
                <span
                    class="error text-sm italic text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit"
            class="inline-block w-1/4 rounded px-3 py-3 bg-indigo-500 focus:outline-none text-white">Save
            Prodcut
        </button>
    </form>
</div>

@push('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor1', {
            language: 'en',
            removePlugins: ['easyimage, cloudservices', 'exportpdf'],
            filebrowserUploadUrl: "{{ route('ckupload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        }).on('change', function(e) {
            @this.set('description', e.editor.getData());
        });

        window.addEventListener('product-created', event => {
            CKEDITOR.instances['editor1'].setData(null)
        });
        window.addEventListener('editProduct', event => {
            CKEDITOR.instances['editor1'].setData(event.detail.description)
        });
    </script>
@endpush
