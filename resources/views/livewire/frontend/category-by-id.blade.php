<div class="w-full flex flex-wrap mt-4 lg:mt-10 px-10">
    <div class="w-full lg:w-1/5 py-4" id="side">
        <div class="px-5 block lg:hidden">
            <button
                class="bg-gray-800 px-4 py-2 rounded-lg shadow-lg flex items-center text-gray-100"
                id="btn-filter">
                <svg class="w-6 h-6 " fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                    </path>
                </svg>
                <span class="ml-2">Filter</span>
            </button>
        </div>
        <livewire:component.side-categorie />
    </div>

    <div class="w-full md:w-4/5 flex flex-wrap">
        @foreach ($products as $product)
            <div class="w-full flex flex-col md:w-1/2 lg:w-1/4 p-4">
                <a href="/product-detail/{{ $product->id }}/{{ Str::of($product->name)->replace(' ', '-') }}"
                    class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden h-80">
                    <div class="relative pb-48 overflow-hidden">
                        <img class="absolute inset-0 h-full w-full object-contain lg:object-cover"
                            src="{{ asset('storage/photos/products/' . $product->id . '/' . $product->image[0]->name) }}"
                            alt="{{ $product->name }}">
                    </div>
                    <div class="p-4 flex-1">
                        <span
                            class="flex-1 inline-block py-1 leading-4 bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs">{{ $product->name }}</span>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="w-full mx-auto mt-10 rounded-lg">
        {{ $products->links('livewire.pagination', ['is_livewire' => true]) }}
    </div>
</div>
