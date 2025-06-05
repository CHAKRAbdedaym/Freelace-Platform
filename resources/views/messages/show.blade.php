{{-- resources/views/messages/show.blade.php --}}
<x-app-layout >

<div class="max-w-4xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-6">Conversation</h2>

    <div class="bg-white shadow rounded-lg p-6 space-y-4 max-h-[500px] overflow-y-auto">
        @foreach ($conversation->messages as $msg)
            <div class="{{ $msg->user_id === auth()->id() ? 'text-right' : 'text-left' }}">
                <div class="inline-block p-3 rounded-lg {{ $msg->user_id === auth()->id() ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">
                    {{ $msg->body }}
                </div>
                <div class="text-xs text-gray-500 mt-1">
                    {{ $msg->user->name }} • {{ $msg->created_at->diffForHumans() }}
                </div>
            </div>
        @endforeach
    </div>

    {{-- Send message form --}}
    <form action="{{ route('messages.store') }}" method="POST" class="mt-6 flex gap-3">
        @csrf
        <input type="hidden" name="conversation_id" value="{{ $conversation->id }}">

        <input type="text" name="body" placeholder="Type your message..." required
            class="flex-grow border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200" />

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Send
        </button>
    </form>
</div>
</x-app-layout>
