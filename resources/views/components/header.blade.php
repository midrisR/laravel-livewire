<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button"
                    class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <svg class="block h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div
                class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <img class="block lg:hidden h-8 w-auto"
                        src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg"
                        alt="Workflow">
                    <img class="hidden lg:block h-8 w-auto"
                        src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg"
                        alt="Workflow">
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <x-header-link href="/"
                            :active="request()->routeIs('Home')">Home
                        </x-header-link>

                        <x-header-link href="/products"
                            :active="request()->routeIs('Products')">
                            Products</x-header-link>

                        <x-header-link href="/about"
                            :active="request()->routeIs('About')">
                            Abouts</x-header-link>

                        <x-header-link href="/contacs"
                            :active="request()->routeIs('Contacs')">Contacs
                        </x-header-link>
                    </div>
                </div>
            </div>
            <livewire:component.input-search />
        </div>
    </div>
</nav>
<div class="menu bg-gray-800 px-2 pt-2 pb-3 space-y-1 hidden">
    <a href="#"
        class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium"
        aria-current="page">Dashboard</a>

    <a href="#"
        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>

    <a href="#"
        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>

    <a href="#"
        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
</div>

<!-- Mobile menu, show/hide based on menu state. -->
@push('script')
    <script>
        const btn = document.querySelector(".mobile-menu-button");
        const sidebar = document.querySelector(".menu");

        // add our event listener for the click
        btn.addEventListener("click", () => {
            sidebar.classList.toggle("hidden");
        });
        Livewire.emit('search')
    </script>
@endpush
