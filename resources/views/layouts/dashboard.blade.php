<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Dashboard') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    @stack('styles')
    @livewireStyles
    <script src="{{ mix('js/app.js') }}" defer></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        * {
            font-family: 'Roboto', sans-serif;
        }

    </style>
</head>

<body style="background:#f3f7f9;">
    <div class="flex">
        <aside
            class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0 min-h-screen transform transition-all transition duration-350 ease-in-out">
            <ul class="px-6 mb-5">
                <li
                    class="relative px-6 py-3 text-gray-400 text-2xl font-semibold">
                    Dasboard GBS
                </li>
            </ul>
            <ul class="px-6">
                <x-nav-link href="/dashboard/product" class="mb-5"
                    :active="request()->routeIs('list-products')">
                    <div class="flex justify-between items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <span class="ml-4">
                            {{ __('Products') }}
                        </span>
                    </div>
                </x-nav-link>
                <x-nav-link href="/dashboard/categories" class="mb-5"
                    :active="request()->routeIs('list-categories')">
                    <div class="flex justify-between items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg>
                        <span class="ml-4">
                            {{ __('Categories') }}
                        </span>
                    </div>
                </x-nav-link>
                <x-nav-link href="/dashboard/type" class="mb-5"
                    :active="request()->routeIs('list-type')">
                    <div class="flex justify-between items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        <span class="ml-4"> {{ __('Type') }}</span>
                    </div>
                </x-nav-link>
                <x-nav-link href="/dashboard/brand" class="mb-5"
                    :active="request()->routeIs('create-brand')">
                    <div class="flex justify-between items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span class="ml-4"> {{ __('Brand') }}</span>
                    </div>
                </x-nav-link>
                <x-nav-link href="/dashboard/banner" class="mb-5"
                    :active="request()->routeIs('create-banner')">
                    <div class="flex justify-between items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="ml-4">
                            {{ __('Banner') }}</span>
                    </div>
                </x-nav-link>
                <x-nav-link href="/dashboard/type" class="mb-5"
                    :active="request()->routeIs('create-company')">
                    <div class="flex justify-between items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                        </svg>
                        <span class="ml-4">
                            {{ __('Company') }}</span>
                    </div>
                </x-nav-link>
                <x-nav-link href="/dashboard/employe" class="mb-5"
                    :active="request()->routeIs('create-employe')">
                    <div class="flex justify-between items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="ml-4">
                            {{ __('Employe') }}</span>
                    </div>
                </x-nav-link>
                <x-nav-link href="/dashboard/role" class="mb-5"
                    :active="request()->routeIs('create-role')">
                    <div class="flex justify-between items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                        </svg>
                        <span class="ml-4">
                            {{ __('Role') }}</span>
                    </div>
                </x-nav-link>
                <x-nav-link href="/dashboard/chats" class="mb-5"
                    :active="request()->routeIs('chats')">
                    <div class="flex justify-between items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>
                        <span class="ml-4">
                            {{ __('Chat') }}</span>
                    </div>
                </x-nav-link>
            </ul>
        </aside>
        <div class="flex-1 h-full">
            <!-- main Header -->
            <div
                class="flex items-center justify-between py-4 px-6 border-b bg-white">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 text-gray-700" fill="none" id="collapse"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <div class="font-medium text-base text-gray-800">
                    {{ Auth::user()->name }}
                </div>
            </div>
            <div class="px-6 py-4">
                {{ $slot }}
            </div>
        </div>
    </div>
    @livewireScripts
    @stack('script')
    <script>
        let collapse = document.getElementById('collapse');
        let aside = document.querySelectorAll('aside')[0];
        collapse.onclick = () => {
            if (aside.classList.contains("w-64")) {
                aside.classList.replace("w-64", "w-16");
            } else {
                aside.classList.replace("w-16", "w-64");

            }

        }
    </script>
</body>

</html>
