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
            <div class="w-full flex flex-col md:w-1/2 lg:w-1/4 p-4 mb-6">
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
                    <a
                        href="/product-detail/{{ $product->id }}/{{ Str::of($product->name)->replace(' ', '-') }}">
                        <div class="bg-cover h-48"
                            style="background-image: url('{{ asset('storage/photos/products/' . $product->id . '/' . $product->image[0]->name) }}');">
                        </div>
                    </a>
                    <div class="p-4 flex-1 flex flex-col">
                        <h3 class="mb-4 text-sm flex-1">{{ $product->name }}
                        </h3>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="w-full mx-auto mt-10 rounded-lg">
            {{ $products->links('livewire.pagination', ['is_livewire' => true]) }}
        </div>
    </div>
</div>
@push('script')
    <script>
        Livewire.on('SideFilter',(data) => {
            Livewire.emit('filter',data)
            console.log('FILTER ' + data)
        })
    </script>
@endpush