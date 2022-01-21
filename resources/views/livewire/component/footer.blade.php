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
        <div class="w-full md:w-1/2 lg:w-1/4 flex mt-6 md:lg-0">
            <div class="bg-white rounded-lg w-8 h-8 overflow-hidden p-1 mr-3">
                <img src="{{ asset('storage/photos/icons/facebook.svg') }}"
                    alt="" width="100">
            </div>
            <div class="bg-white rounded-lg w-8 h-8 overflow-hidden p-1 mr-3">
                <img src="{{ asset('storage/photos/icons/instagram.svg') }}"
                    alt="" width="100">
            </div>
            <div class="bg-white rounded-lg w-8 h-8 overflow-hidden p-1 mr-3">
                <img src="{{ asset('storage/photos/icons/shopee.svg') }}"
                    alt="" width="100">
            </div>
            <div class="bg-white rounded-lg w-8 h-8 overflow-hidden p-1 mr-3">
                <img src="{{ asset('storage/photos/icons/tokopedia.svg') }}"
                    alt="" width="100">
            </div>
        </div>
    </div>
</div>
