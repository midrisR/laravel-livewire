<div class="w-full flex flex-wrap mt-4 lg:mt-10 px-10">
    <div class="w-full lg:w-1/5 py-4" id="side">
        <div class="px-5 block lg:hidden">
            <button class="bg-blue-400 px-4 py2 rounded" id="btn-filter">
                <span class="text-white">Filter</span>
            </button>
        </div>
        <x-side-categorie />
    </div>
    <div class="w-full lg:w-4/5 flex flex-wrap">
        @foreach ($products as $product)
            <div class="w-full flex flex-col md:w-1/2 lg:w-1/4 p-4 mb-6">
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
                    <div class="bg-cover h-48"
                        style="background-image: url('{{ asset('storage/photos/products/' . $product->id . '/' . $product->image[0]->name) }}');">
                    </div>
                    <div class="p-4 flex-1 flex flex-col">
                        <h3 class="mb-4 text-sm flex-1">{{ $product->name }}
                        </h3>
                        <a href="/product-detail/{{ $product->id }}/{{ Str::of($product->name)->replace(' ', '-') }}"
                            class="border-t border-blue-light pt-2 text-xs text-blue-500 hover:text-red uppercase no-underline tracking-wide">view</a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="w-full mx-auto mt-10 rounded-lg">
            {{ $products->links('livewire.pagination', ['is_livewire' => true]) }}
        </div>
    </div>
</div>
