<div x-show="open" @click.away="open = false"
    class="w-1/2 fixed bottom-20 right-5 md:w-1/5 bg-white rounded-lg overflow-hidden z-30 shadow-xl transform transition-all sm:w-full "
    x-transition:enter="ease-out"
    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
    x-transition:leave="ease-in"
    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
    <div class="w-full relative">
        <div class="w-full bg-blue-500 p-3 text-white text-center">Hi, i can help
            you !!</div>
        @if ($success || Cookie::get('visitor'))
            <div class="px-6 py-2 h-64 overflow-auto" wire:poll.keep.alive>
                @foreach ($chats as $chat)
                    <div
                        class="flex {{ Cookie::get('visitor') === $chat->visitor_id ? 'justify-start' : 'justify-end' }}">
                        <p
                            class="w-fit {{ $chat->visitor_id === '1' ? 'bg-gray-200 text-gray-900' : 'bg-blue-500 text-white' }} px-2 py-1 rounded-lg mb-3">
                            {{ $chat->chat }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <form wire:submit.prevent="register" class="w-full px-4 py-3 4">
                <div class="mb-2">
                    <input type="text"
                        class="w-full px-4 py-3 bg-white rounded ring-1 shadow-lg text-gray-500 focus:outline-none"
                        placeholder="Name" wire:model.defer="name">
                    @error('name')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <input type="text"
                        class="w-full px-4 py-3 bg-white rounded ring-1 shadow-lg text-gray-500 focus:outline-none"
                        placeholder="Email" wire:model.defer="email">
                    @error('name')
                        <span class="error text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full bg-blue-500 px-4 py-2 rounded shadow text-white">Start
                    Chat</button>
            </form>
        @endif
    </div>
    @if ($success || Cookie::get('visitor'))
        <div class="w-full px-3 py-2">
            <textarea
                class="w-full rounded-lg ring-1 focus:outline-none px-3 py-2 @error('message') ring-red-700 @enderror"
                wire:model.defer="message" cols="5" rows="2"></textarea>
            <button wire:click="send"
                class="w-full bg-blue-500 px-4 py-2 rounded shadow text-white">Send</button>
        </div>
    @endif
</div>
