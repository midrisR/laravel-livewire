@if ($paginator->hasPages())
<div class="w-full flex items-center justify-center my-2 ">

    @if ( ! $paginator->onFirstPage())
    {{-- First Page Link --}}
    <a class="mx-1 p-2 bg-blue-700 border-2 border-blue-300 text-white font-bold text-center hover:bg-blue-400 hover:border-blue-300 rounded-lg  cursor-pointer"
        wire:click="gotoPage(1)">
        <x-feathericon-chevrons-left />
    </a>
    @if($paginator->currentPage() > 1)
    {{-- Previous Page Link --}}
    <a class="mx-1 p-2 bg-blue-700 border-2 border-blue-300 text-white font-bold text-center hover:bg-blue-400 hover:border-blue-300 rounded-lg  cursor-pointer"
        wire:click="previousPage">
        <x-feathericon-chevron-left />
    </a>
    @endif
    @endif
    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    {{--  Show active page two pages before and after it.  --}}
    @if ($page == $paginator->currentPage())
    <span
        class="mx-1 px-4 py-2 border-2 border-blue-300 bg-blue-200 text-blue-500 font-bold text-center hover:bg-blue-300 hover:border-blue-300 rounded-lg cursor-pointer">{{ $page }}</span>
    @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page ===
    $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2)
    <a class="mx-1 px-4 py-2 border-2 border-blue-300 text-blue-500 font-bold text-center hover:text-blue-800 rounded-lg cursor-pointer"
        wire:click="gotoPage({{$page}})">{{ $page }}</a>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}

    @if ($paginator->hasMorePages())
    @if($paginator->lastPage() - $paginator->currentPage() >= 1)
    <a class="mx-1 p-2 bg-blue-700 border-2 border-blue-300 text-white font-bold text-center hover:bg-blue-400 hover:border-blue-300 rounded-lg  cursor-pointer"
        wire:click="nextPage" rel="next">

        <x-feathericon-chevron-right />
    </a>
    @endif
    <a class="mx-1 p-2 bg-blue-700 border-2 border-blue-300 text-white font-bold text-center hover:bg-blue-400 hover:border-blue-300 rounded-lg  cursor-pointer"
        wire:click="gotoPage({{ $paginator->lastPage() }})">
        <x-feathericon-chevrons-right />
    </a>
    @endif
</div>
@endif