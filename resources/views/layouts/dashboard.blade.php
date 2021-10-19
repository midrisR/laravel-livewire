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
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap');

        * {
            font-family: 'Roboto Condensed', sans-serif;
        }

    </style>
</head>

<body style="background:#f3f7f9;">
    <div class="flex">
        <aside
            class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0 min-h-screen">
            <ul>
                <li
                    class="relative px-6 py-3 text-gray-400 text-2xl font-semibold">
                    Dasboard GBS
                </li>
            </ul>
            <ul>
                <li class="relative px-6 py-3">
                    <div class="flex justify-beetwen text-indigo-600"
                        id="products" onclick="Toggle('products')">
                        <x-feathericon-package class="font-normal" />
                        <a href="#"
                            class="inline-flex items-center w-full text-sm transition-colors duration-150 text-indigo-600 hover:text-blue-800 dark:hover:text-gray-200">
                            <i data-feather="shopping-cart" width="18"></i>
                            <span class="ml-4">Prodcuts</span>
                        </a>
                    </div>

                    <ul class="bg-indigo-100 rounded mt-4">
                        <li class="relative px-6 py-2">
                            <x-nav-link
                                class="text-indigo-600 hover:text-indigo-800 "
                                href="/dashboard/product"
                                :active="request()->routeIs('list-products')">
                                <span class="ml-4">
                                    {{ __('List Products') }}</span>
                            </x-nav-link>
                        </li>
                        <li class="relative px-6 py-2">
                            <x-nav-link
                                class="inline-flex items-center w-full text-sm transition-colors duration-150 text-indigo-600 hover:text-blue-800 dark:hover:text-gray-200"
                                href="/dashboard/list-categories"
                                :active="request()->routeIs('list-categories')">
                                <span class="ml-4">
                                    {{ __('Categories') }}</span>
                            </x-nav-link>
                        </li>
                        <li class="relative px-6 py-3">
                            <x-nav-link href="#"
                                class="inline-flex items-center w-full text-sm transition-colors duration-150 text-indigo-600 hover:text-blue-800 dark:hover:text-gray-200">
                                <span class="ml-4">Types</span>
                            </x-nav-link>
                        </li>
                    </ul>
                </li>
                <li class="relative px-6 py-3">
                    <a href="#"
                        class="inline-flex items-center w-full text-sm transition-colors duration-150 text-indigo-600 hover:text-blue-800 dark:hover:text-gray-200">
                        <x-feathericon-image class="font-normal" />
                        <span class="ml-4">Banner</span>
                    </a>
                </li>
                <li class="relative px-6 py-3 text-indigo-600 ">
                    <div class="flex justify-beetwen" id="company"
                        onclick="Toggle('company')">
                        <a href="#"
                            class="inline-flex items-center w-full text-sm transition-colors duration-150 hover:text-blue-800 dark:hover:text-gray-200">
                            <i data-feather="briefcase" width="18"></i>
                            <span class="ml-4">Company</span>
                        </a>
                        <i data-feather="chevron-down" width="18"></i>
                    </div>
                    <ul class="bg-indigo-100 rounded mt-4">
                        <li class="relative px-6 py-3">
                            <a href="#"
                                class="inline-flex items-center w-full text-sm transition-colors duration-150 text-indigo-600 hover:text-blue-800 dark:hover:text-gray-200">
                                <i data-feather="info" width="18"></i>
                                <span class="ml-4">Information</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a href="#"
                                class="inline-flex items-center w-full text-sm transition-colors duration-150 text-indigo-600 hover:text-blue-800 dark:hover:text-gray-200">
                                <i data-feather="users" width="18"></i>
                                <span class="ml-4">Employes</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a href="#"
                                class="inline-flex items-center w-full text-sm transition-colors duration-150 text-indigo-600 hover:text-blue-800 dark:hover:text-gray-200">
                                <i data-feather="shuffle" width="18"></i>
                                <span class="ml-4">Role</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
        <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
            <!-- main Header -->
            <div
                class="flex items-center justify-between py-4 px-6 border-b bg-white">
                <x-feathericon-menu class="cursor-pointer text-indigo-500" />
                <i data-feather="menu" width="20"></i>
                <div class="font-medium text-base text-gray-800">
                    {{ Auth::user()->name }}</div>
            </div>
            <div class="px-6 py-4">
                {{ $slot }}
            </div>
        </div>
    </div>
    @livewireScripts
    @stack('script')
    <script>
        function Toggle(id) {
            const button = document.getElementById(id);
        }
    </script>
</body>


</html>
