<aside
    class="transform top-0 left-0 w-64 md:w-auto bg-white fixed lg:relative h-full lg:h-auto overflow-auto ease-in-out transition-all duration-300 z-30 -translate-x-full lg:translate-x-0 px-2 py-4 rounded-lg"
    id='side-filter'>
    <div class="filter-category">
        <div class="flex px-10 py-4">
            <h5 class="text-sm font-black text-blue-500 text-xl mb-2">
                List Categories
            </h5>
        </div>
        <div class="list-categorie px-8 overflow-auto h-80">
            @foreach ($categories as $categorie)
                <x-side-link
                    href="/products/{{ $categorie->id }}/{{ str_replace(' ', '-', $categorie->name) }}"
                    class="mb-3" :active="$currentUrl"
                    id="{{ str_replace(' ', '-', $categorie->name) }}">
                    <span>{{ $categorie->name }}</span>
                </x-side-link>
            @endforeach
        </div>
    </div>
    <div class="type mt-0 lg:mt-8 px-10">
        <div class="flex py-4">
            <h5 class="text-sm font-black text-blue-500 text-xl mb-2">
                Type
            </h5>
        </div>
        @foreach ($types as $type)
            <div class="flex items-center mb-5 cursor-pointer list"
                wire:click="filter('{{ $type->name }}')">
                <div class="w-5 h-5 border border-gray-400 border-opcaity-10 rounded checkbox"
                    id="{{ str_replace(' ', '-', $type->name) }}"></div>
                <span
                    class="text-sm ml-2 text-gray-500">{{ $type->name }}</span>
            </div>
        @endforeach
    </div>
</aside>

@push('styles')
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

        .checked::after {
            position: absolute;
            content: "\f00c";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            color: rgba(30, 58, 138, 1);
            line-height: 1;
        }

    </style>
@endpush

@push('script')
    <script>
        const links = document.querySelectorAll(".checkbox");
        for (let i = 0; i < links.length; i++) {
            const link = links[i];
            link.addEventListener('click', e => {
                Livewire.on('sort', () => {
                    link.classList.toggle("checked")
                    for (let j = 0; j < links.length; ++j) {
                        if (links[j] !== e.target) {
                            links[j].classList.remove("checked")
                        }
                    }
                })

            })
        }

        let x = document.getElementsByClassName('list-categorie')[0]
        const lastURL = window.location.pathname
        const GetLastURL = lastURL.split('/').pop();
        const element = document.getElementById(GetLastURL)
        if (GetLastURL !== 'products') {
            x.scrollTop += element.offsetTop - 20
        }

        const button = document.getElementById("btn-filter")
        const aside = document.getElementById("side-filter")
        const el = document.createElement("div");
        el.classList.add("z-10", "fixed", "inset-0",
            "transition-opacity")
        const n = document.createElement("div");
        n.classList.add("absolute", "bg-black", "inset-0",
            "opacity-50")
        n.innerHTML =
            ' <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute top-5 right-5 z-40 text-white text-opacity-90" fill="none" viewBox="0 0 24 24" stroke="currentColor" onclick="Myclose()"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>'

        function Myclose() {
            aside.classList.add("-translate-x-full")
            document.getElementById("side").removeChild(el)
        }

        button.addEventListener('click', () => {
            aside.classList.toggle("-translate-x-full")
            el.appendChild(n)
            document.getElementById("side").appendChild(el)
        })
    </script>
@endpush
