<div class="w-full flex flex-wrap">
    <div class="w-3/5">
        <table class="min-w-full divide-y divide-gray-200 mt-4">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        #
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" wire:poll>
                @foreach ($visitors as $visitor)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 text-left">
                            {{ $loop->iteration }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 text-left">
                            {{ $visitor->name }}
                        </div>
                    </td>
                    <td class="py-4 whitespace-nowrap flex">
                        <button
                            class="bg-blue-500 rounded w-8 h-8 text-white inline-flex items-center justify-center focus:outline-none mr-5"
                            wire:click="openChat('{{$visitor->id}}')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                        <button
                            class="bg-red-200 rounded w-8 h-8 text-red-700 inline-flex items-center justify-center focus:outline-none focus:ring-1 focus:ring-red-600"
                            wire:click="" wire:loading.attr="disabled">
                            <x-feathericon-trash width="18" />
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- chat --}}
    <div class="w-2/5 px-4">
        @if($chats)
        <div class="bg-white rounded-xl shadow-lg lg mt-4 p-8 relative">
            <div class=" h-96 overflow-auto" wire:poll="getChats">
                @foreach ($chats as $chat)
                <div class="w-full flex {{ $chat->visitor_id === '1' ? 'justify-end':'justify-start'}}">
                    <p
                        class="w-fit {{ $chat->visitor_id === '1' ? 'bg-green-200':'bg-green-500'}} px-3 py-1 text-gray-700 rounded-full mb-3">
                        {{$chat->chat}}</p>
                </div>
                @endforeach
            </div>
            <div class="w-full px-3 py-2">
                <textarea class="w-full rounded-lg ring-1 focus:outline-none px-3 py-2" wire:model.defer="message"
                    cols="5" rows="3"></textarea>
                <button class="w-full bg-blue-500 px-4 py-2 rounded shadow text-white" wire:click="send">Send</button>
            </div>
        </div>
        @endif
    </div>
</div>
