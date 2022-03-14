<div class="w-full flex flex-wrap">
    <div class="w-3/5">
        <table class="min-w-full divide-y divide-gray-200 mt-4">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        #
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($visitors as $visitor)
                    <tr class="relative">
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
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 text-left">
                                @if ($visitor->id === Cookie::get('visitor'))
                                    <span
                                        class="text-green-500 font-semibold">Active</span>
                                @else
                                    <span
                                        class="text-red-500 font-semibold">Closed</span>
                                @endif
                            </div>
                        </td>
                        <td class="py-4 flex justify-end relative">
                            <x-jet-dropdown width="48">
                                <x-slot name="trigger">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        id="action"
                                        class="h-6 w-6 text-gray-600 cursor-pointer"
                                        fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="block px-4 py-2 text-xs text-gray-400 cursor-pointer"
                                        wire:click="openChat('{{ $visitor->id }}')">
                                        View
                                    </div>
                                    <div
                                        class="block px-4 py-2 text-xs text-gray-400 cursor-pointer">
                                        Block
                                    </div>
                                    <div class="block px-4 py-2 text-xs text-gray-400 cursor-pointer"
                                        wire:click="endChat">
                                        End chat
                                    </div>
                                </x-slot>
                            </x-jet-dropdown>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- chat --}}
    <div class="w-2/6 px-4">
        @if ($chats)
            <div
                class="bg-white rounded-xl shadow-lg lg mt-4 py-8 px-12 relative">
                <div class=" h-64 overflow-auto" wire:poll="getChats">
                    @foreach ($chats as $chat)
                        <div
                            class="w-full flex {{ $chat->visitor_id === '1' ? 'justify-end' : 'justify-start' }}">
                            <p
                                class="w-fit {{ $chat->visitor_id === '1' ? 'bg-gray-200 text-gray-700' : 'bg-blue-500 text-white ' }} px-3 py-1 rounded-xl mb-3">
                                {{ $chat->chat }}</p>
                        </div>
                    @endforeach
                </div>
                @if ($from_id === Cookie::get('visitor'))
                    <div class="w-full px-3 py-2">
                        <textarea
                            class="w-full rounded-lg ring-1 focus:outline-none px-3 py-2"
                            wire:model.defer="message" cols="5" rows="3">
                        </textarea>
                        <button
                            class="w-full bg-blue-500 px-4 py-2 rounded shadow text-white"
                            wire:click="send">Send</button>
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>
