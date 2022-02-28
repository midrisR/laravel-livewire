<div class="fixed bottom-20 h-96 right-5 w-1/5 bg-white rounded-lg overflow-hidden z-30 shadow-md hidden" id="dialog">
    <div class="w-full">
        <div class="w-full bg-blue-500 p-3 text-white text-center">Hi, i can help you !!</div>
        @if ($success || Cookie::get('visitor'))
        <div class="px-6 py-2 h-64 overflow-auto">
            @foreach ($chats as $chat)
            <div class="flex {{ Cookie::get('visitor') === $chat->visitor_id ? 'justify-start':'justify-end'}}"
                wire:poll.keep-alive>
                <p class="w-fit bg-blue-500 px-3 py-1 text-white rounded-full mb-3">
                    {{$chat->chat}}</p>
            </div>
            @endforeach
        </div>
        <div class="w-full fixed bottom-0 px-3 py-2">
            <textarea class="w-full rounded-lg ring-1 focus:outline-none px-3 py-2" wire:model.defer="message" cols="5"
                rows="1"></textarea>
            <button wire:click="send" class="w-full bg-blue-500 px-4 py-2 rounded shadow text-white">Send</button>
        </div>
        @else
        <form wire:submit.prevent="register" class="w-full px-4 py-3 mt-16">
            <div class="mb-2">
                <input type="text"
                    class="w-full px-4 py-3 bg-white rounded ring-1 shadow-lg text-gray-500 focus:outline-none"
                    placeholder="Name" wire:model.defer="name">
                @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-2">
                <input type="text"
                    class="w-full px-4 py-3 bg-white rounded ring-1 shadow-lg text-gray-500 focus:outline-none"
                    placeholder="Email" wire:model.defer="email">
                @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 px-4 py-2 rounded shadow text-white">Start Chat</button>
        </form>
        @endif
    </div>
</div>
