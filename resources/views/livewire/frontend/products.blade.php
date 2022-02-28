@section('title', 'Products')
<div class="w-full flex flex-wrap mt-4 lg:mt-10 px-10">
    <div class="w-full lg:w-1/5 py-4" id="side">
        <div class="px-5 block lg:hidden">
            <button class="bg-blue-400 px-4 py2 rounded" id="btn-filter">
                <span class="text-white">Filter</span>
            </button>
        </div>
        <livewire:component.side-categorie />
    </div>
    <div class="w-full lg:w-4/5 flex flex-wrap">
        @foreach ($products as $product)
        <div class="w-full flex flex-col lg:w-1/4 p-5">
            <a href="/product-detail/{{ $product->id }}/{{ Str::of($product->name)->replace(' ', '-') }}"
                class="p-5 block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden h-72">
                <div class="relative pb-48 overflow-hidden">
                    <img class="absolute inset-0 h-full w-full object-contain lg:object-cover"
                        src="{{ asset('storage/photos/products/' . $product->id . '/' . $product->image[0]->name) }}"
                        alt="Stub End Stainless Steel 304 304L 2 inch" alt="{{ $product->name }}">
                </div>
                <div class="p-4 flex-1">
                    <span class="mb-4 text-sm text-gray-700 uppercase">{{ $product->name }}</span>
                </div>
            </a>
        </div>
        @endforeach
        <div class="w-full mx-auto mt-10 rounded-lg">
            {{ $products->links('livewire.pagination', ['is_livewire' => true]) }}
        </div>
    </div>
</div>
