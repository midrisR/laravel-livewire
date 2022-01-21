@section('title', $product->name)
@section('keywords', $product->meta_keywords ? $product->meta_keywords :
    $product->name)
@section('site_name', $product->name)
@section('og:title', $product->name)
@section('description', $product->meta_description ? $product->meta_description
    : $product->description)
@section('og:description', $product->description ? $product->meta_description :
    $product->name)
@section('url', url()->current())
@section('image', asset('storage/photos/products/' . $product->image[0]['id'] .
    '/' . $product->image[0]['name']))

    <div class="flex flex-wrap my-20 px-4 lg:px-20">
        <div class="w-full lg:w-2/6 lg:pr-10">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($product->image as $image)
                        <div class="swiper-slide overflow-hidden shadow-lg">
                            <img src="{{ asset('storage/photos/products/' . $image->product_id . '/' . $image->name) }}"
                                class="w-full rounded-lg"
                                alt="{{ $product->name }}">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <div class="w-full lg:w-4/6 mt-8 lg:mt-0">
            <h1 class="text-3xl text-semibold">{{ $product->name }}</h1>
            <p class="text-xs italic mt-2">{{ $product->meta_keywords }}</p>
            <span class="text-bse mt-3">SKU : {{ $product->code }} </span>
            <p class="mt-6">
                {!! $product->description !!}
            </p>
        </div>
    </div>

    @push('script')
        <script>
            let ns = new Swiper(".mySwiper", {
                pagination: {
                    el: ".swiper-pagination",
                },
            });
        </script>
    @endpush
