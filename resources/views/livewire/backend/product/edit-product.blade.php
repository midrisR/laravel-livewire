<div class="bg-white shadow rounded p-5">
    <p>lorem</p>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="edit">
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
                <select wire:model.debounce.500ms="categorie_id"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                    <option value="">Select Type</option>
                    @foreach ($categories as $categorie)
                        @if ($categorie->id === $categorie_id)
                            <option value="{{ $categorie->id }}" selected>
                                {{ $categorie->name }}</option>
                        @else
                            <option value="{{ $categorie->id }}">
                                {{ $categorie->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('categorie_id') <span
                        class="error text-sm italic text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <div class="mb-3 pt-0">
                <span class="text-sm text-indigo-700">Type</span>
                <select wire:model.debounce.500ms="type_id"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                    <option value="">Select Type</option>
                    @foreach ($types as $ty)
                        @if ($ty->id === $type_id)
                            <option value="{{ $ty->id }}" selected>
                                {{ $ty->name }}</option>
                        @else
                            <option value="{{ $ty->id }}">
                                {{ $ty->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('type_id') <span
                        class="error text-sm italic text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 pt-0">
                <span class="text-sm text-indigo-700">Brand</span>
                <select wire:model.debounce.500ms="brand_id"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                    <option value="">Select Brand</option>
                    @foreach ($brands as $brand)
                        @if ($brand->id === $brand_id)
                            <option value="{{ $brand->id }}" selected>
                                {{ $brand->name }}</option>
                        @else
                            <option value="{{ $brand->id }}">
                                {{ $brand->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('brand_id') <span
                        class="error text-sm italic text-red-500">{{ $message }}</span>
                @enderror
            </div>
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
        <div class="mb-3 pt-0 grid grid-cols-1">
            <div wire:ignore>
                <span class="text-sm text-indigo-700">Description</span>
                <textarea wire:model.debounce.500ms="description"
                    name="description"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full"
                    id="editor1" rows="10" cols="80">
                {!! $description !!}
                </textarea>
                @error('description')
                    <span
                        class="error text-sm italic text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="w-full lg:w-1/3 mb-3 py-5">
            <span class="text-sm text-indigo-700">Image</span>
            <div
                class="relative rounded py-1 bg-black flex justify-center items-center ">
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
                    wire:model.debounce.500ms="image" multiple>
            </div>
            <div class="w-full flex mt-4">
                @if ($image)
                    @foreach ($image as $photo)
                        <div
                            class="shadow-lg bg-white rounded overflow-hidden mr-4 relative">
                            <img src="{{ $photo->temporaryUrl() }}"
                                width="180">
                        </div>
                    @endforeach
                @endif
                @foreach ($product->image as $img)
                    <div
                        class="shadow-lg bg-white rounded overflow-hidden mr-4 relative">
                        <img src="{{ asset('storage/photos/products/' . $img->product_id . '/' . $img->name) }}"
                            alt="{{ $img->name }}" width="180">
                        <button type="button"
                            wire:click="deleteImage('{{ $img->id }}','{{ $img->name }}')"
                            class="bg-white p-2 rounded-lg text-red-500 absolute bottom-0 right-0 focus:outline-none">
                            <x-feathericon-trash width="18" />
                        </button>
                    </div>
                @endforeach
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
            class="inline-block w-1/4 rounded px-3 py-3 bg-indigo-500 focus:outline-none text-white">edit
            Prodcut
        </button>
    </form>
</div>

@push('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor1', {
            language: 'en',
            removePlugins: ['easyimage, cloudservices',
                'exportpdf'
            ],
            filebrowserUploadUrl: "{{ route('ckupload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        }).on('change', function(e) {
            @this.set('description', e.editor.getData());
        });
        window.addEventListener('editProduct', event => {
            CKEDITOR.instances['editor1'].setData(event.detail.description)
        });
    </script>
@endpush
