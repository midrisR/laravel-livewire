<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','CV. GRAVINDO BERKATI SUKSES')</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    @stack('style')
    @livewireStyles
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        * {
            font-family: 'Roboto', sans-serif;
        }

    </style>
    <meta name="description" content="@yield('description','Jual pipa,fitting,flange dengan berbgai jenis dan tipe')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="Cv. Gravindo Berkati Sukses">
    <meta property=og:site_name content="@yield('site_name','CV. GRAVINDO BERKATI SUKSES')" />
    <meta property="og:url" content="@yield('url','https://www.gravindoberkatisukses.co.id/')" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('og:title','CV. GRAVINDO BERKATI SUKSES')" />
    <meta property="og:description"
        content="@yield('og:description','Jual pipa,fitting,flange dengan berbgai jenis dan tipe')" />
    <meta property="og:image" content="@yield('image','')" />
</head>

<body style="background:#f3f7f9;">
    <x-header />
    <div class="py-10 lg:py-4">
        {{ $slot }}
    </div>
    <livewire:component.footer />
    @livewireScripts
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    @stack('script')
</body>

</html>
