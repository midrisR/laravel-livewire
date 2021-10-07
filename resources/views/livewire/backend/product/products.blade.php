<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="w-full flex justify-between items-center">
                <button
                    class="inline-flex items-center px-4 py-2 rounded bg-indigo-400 text-white focus:outline-none border-transparent focus:ring-indigo-700 focus:ring-2 "
                    wire:click="goTo">
                    <x-feathericon-plus width="18" />
                    <span class="ml-2 text-sm"> Create Product</span>
                </button>
                <input type="search"
                    class="w-1/2 my-3 bg-white shadow rounded px-4 py-2 focus:outline-none border-transparent focus:ring-transparent focus:ring-0 placeholder-gray-400"
                    placeholder="search product" wire:model="search">
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                #
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Type
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date Created
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($products as $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 text-left">
                                    {{ (($products->currentPage() - 1 ) * $products->perPage() ) + $loop->iteration }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 text-left">{{$product->name}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 text-left">{{$product->type_name}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-semibold text-center">
                                @if($product->status === '1')
                                <div class="p-1 text-sm text-green-500  bg-opacity-30 text-left">
                                    @else
                                    <div class="p-1 text-sm text-red-500 bg-opacity-30 text-left">
                                        @endif
                                        @if($product->status === '1')
                                        Active
                                        @else
                                        Not Active
                                        @endif
                                    </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 text-left">{{$product->created_at}}</div>
                            </td>
                            <td class="py-4 whitespace-nowrap flex justify-around">
                                <button
                                    class="bg-green-200 rounded w-8 h-8 text-green-700 inline-flex items-center justify-center focus:outline-none focus:ring-1 focus:ring-green-600">
                                    <x-feathericon-edit width="18" />
                                </button>
                                <button
                                    class="bg-red-200 rounded w-8 h-8 text-red-700 inline-flex items-center justify-center focus:outline-none focus:ring-1 focus:ring-red-600">
                                    <x-feathericon-trash width="18" />
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-2">
                    {{ $products->links('livewire.pagination',['is_livewire' => true]) }}
                </div>
            </div>
        </div>
    </div>
</div>