<div class="bg-white shadow rounded p-5">
    <form wire:submit.prevent="store">
        @if (session()->has('message'))
        <div class="w-full bg-green-500 text-white text-center px-4 py-3 my-4">
            {{ session('message') }}
        </div>
        @endif
        <div class="grid grid-cols-3 gap-3">
            <div class="mb-3 pt-0">
                <span class="text-sm text-indigo-700">Name</span>
                <input type="text" wire:model.debounce.500ms="name"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                @error('name') <span class="error text-sm italic text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 pt-0">
                <span class="text-sm text-indigo-700">Status</span>
                <select wire:model.debounce.500ms="status"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                    <option value="1">active</option>
                    <option value="0">dedactive</option>
                </select>
                @error('status') <span class="error text-sm italic text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 pt-0">
                <span class="text-sm text-indigo-700">Category</span>
                <select wire:model.debounce.500ms="categorie_id"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                    <option value="">Select Categorie</option>
                    @foreach($categories as $categorie)
                    @if($categorie->id === $categorie_id)
                    <option value="{{$categorie->id}}" selected>{{$categorie->name}}</option>
                    @else
                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                    @endif
                    @endforeach
                </select>
                @error('categorie_id') <span class="error text-sm italic text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-3 gap-3">
            <div class="mb-3 pt-0">
                <span class="text-sm text-indigo-700">Type</span>
                <select wire:model.debounce.500ms="type"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                    <option value="">Select Type</option>
                    @foreach($types as $ty)
                    @if($ty->id === $type)
                    <option value="{{$ty->id}}" selected>{{$ty->name}}</option>
                    @else
                    <option value="{{$ty->id}}">{{$ty->name}}</option>
                    @endif
                    @endforeach
                </select>
                @error('type') <span class="error text-sm italic text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 pt-0">
                <span class="text-sm text-indigo-700">Meta Description</span>
                <input type="text" wire:model.debounce.500ms="meta_description"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                @error('meta_description')
                <span class="error text-sm italic text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3 pt-0">
                <span class="text-sm text-indigo-700">Meta Keywords</span>
                <input type="text" wire:model.debounce.500ms="meta_keywords"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full">
                @error('meta_keywords')
                <span class="error text-sm italic text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3 pt-0 grid grid-cols-1">
            <div wire:ignore>
                <span class="text-sm text-indigo-700">Description</span>
                <textarea wire:model.debounce.500ms="description" name="description"
                    class="px-3 py-2 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border-gray-200 border outline-none focus:outline-none focus:ring-1 w-full"
                    id="editor1" rows="10" cols="80">
                            {!! $description !!}
                </textarea>
            </div>
            @error('description')
            <span class="error text-sm italic text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 pt-0 grid grid-cols-1">
            <div
                class="relative h-40 rounded-lg border-dashed border-2 border-gray-200 bg-white flex justify-center items-center hover:cursor-pointer">
                <div class="absolute">
                    <div class="flex flex-col items-center "> <i class="fa fa-cloud-upload fa-3x text-gray-200"></i>
                        <span class="block text-gray-400 font-normal">Attach you files here</span> <span
                            class="block text-gray-400 font-normal">or</span> <span
                            class="block text-blue-400 font-normal">Browse files</span>
                    </div>
                </div>
                <input type="file" class="h-full w-full opacity-0" name="image" wire:model.debounce.500ms="image"
                    multiple>
            </div>
            @error('image')
            <span class="error text-sm italic text-red-500">{{ $message }}</span>
            @enderror
            @error('image.*')
            <span class="error text-sm italic text-red-500">{{ $message }}</span>
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
    filebrowserUploadUrl: "{{route('ckupload', ['_token' => csrf_token() ])}}",
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