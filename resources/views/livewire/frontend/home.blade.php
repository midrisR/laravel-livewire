<div class="w-full">
    <x-frontend.banner :banners="$banners" />
    <div class="mt-10 text-center text-gray-700 text-3xl font-bold uppercase">
        <span>Category Products</span>
    </div>
    <div class="w-full lg:w-5/6 flex flex-wrap mt-8 mx-auto mb-12">
        @foreach ($categories as $categorie)
        <div class="w-full lg:w-1/4 p-4">
            <a href="/products/{{ $categorie->id }}/{{ str_replace(' ', '-', $categorie->name) }}">
                <div class="bg-white shadow-lg rounded-xl overflow-hidden card relative">
                    <img class="w-full"
                        src="{{ asset('storage/photos/categories/' . $categorie->id . '/' . $categorie->image) }}"
                        alt="{{ $categorie->name }}" width="300">

                    <div class="info py-4">
                        <p class="text-lg text-center uppercase font-semibold text-gray-700">
                            {{ $categorie->name }}
                        </p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="w-5/6 mb-8 mx-auto py-10 overflow-hidden">
        <div class="merek">
            <div class="swiper-wrapper">
                @foreach ($brands as $brand)
                <div class="swiper-slide">
                    <img class="mx-auto" src="{{ asset('storage/photos/brand/' . $brand->image) }}" width="200" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    new Swiper('.merek', {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });

</script>
@endpush
