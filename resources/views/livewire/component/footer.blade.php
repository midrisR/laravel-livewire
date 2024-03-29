<div class="w-full bg-gray-800 px-20 py-5">
    <div class="flex flex-wrap mt-8">
        @foreach ($employes as $employe)
            <div class="w-full mb-6 lg:mt-0 md:w-1/2 lg:w-1/4 ">
                <div class="footer">
                    <p class="text-gray-200 font-semibold uppercase">
                        {{ $employe->name }}
                    </p>
                    <span class="text-xs text-gray-200 uppercase">
                        {{ $employe->role->name }}
                    </span>
                    <p class="text-sm text-gray-200 my-2">
                        {{ $employe->email }}
                    </p>
                    <p class="text-gray-200 uppercase">
                        {{ $employe->phone }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="flex flex-wrap mt-10">
        <div class="w-full md:w-1/2 lg:w-1/4 flex justify-center">
            <div class="address text-gray-200">
                <h4 class="font-semibold">CV. GRAVINDO BERKATI SUKSES</h4>
                <p class="mt-3">
                    Jl. Anggrek 3 No 1C RT 08 RW 02
                    Kel. Tugu Utara, Kec. Koja
                    Jakarta utara 14260
                </p>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4 px-0 lg:px-12">
            <h4 class="font-semibold text-white mb-5">FOLLOW ME</h4>
            <div class="flex">
                <div
                    class="bg-white rounded-lg w-8 h-8 overflow-hidden p-1 mr-3">
                    <img src="{{ asset('storage/photos/icons/facebook.svg') }}"
                        alt="" width="100">
                </div>
                <div
                    class="bg-white rounded-lg w-8 h-8 overflow-hidden p-1 mr-3">
                    <img src="{{ asset('storage/photos/icons/instagram.svg') }}"
                        alt="" width="100">
                </div>
                <div
                    class="bg-white rounded-lg w-8 h-8 overflow-hidden p-1 mr-3">
                    <img src="{{ asset('storage/photos/icons/shopee.svg') }}"
                        alt="" width="100">
                </div>
                <div
                    class="bg-white rounded-lg w-8 h-8 overflow-hidden p-1 mr-3">
                    <img src="{{ asset('storage/photos/icons/tokopedia.svg') }}"
                        alt="" width="100">
                </div>
            </div>
        </div>
    </div>
</div>


{{-- wa --}}
<div x-data="{ open: false }" x-on:click="show = false"
    x-transition:enter="ease-out" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="ease-in"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <button @click="open = true"
        class="fixed bottom-5 right-5 z-20 p-3 bg-green-500 rounded-full cursor-pointer"
        id="whatsaap" wire:click="openChat">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
            class="w-8 h-8 fill-current text-white">
            <path
                d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
        </svg>
    </button>
    <livewire:chat />
</div>
