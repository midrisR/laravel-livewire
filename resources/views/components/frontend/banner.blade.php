@props(['banners'])
<div class="banner overflow-hidden">
    <div class="swiper-wrapper">
        @foreach ($banners as $img)
            <div class="swiper-slide">
                <img
                    src="{{ asset('storage/photos/banners/' . $img->image) }}">
            </div>
        @endforeach
    </div>
</div>
@push('script')
    <script>
        let x = new Swiper('.banner', {
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        })
    </script>
@endpush
