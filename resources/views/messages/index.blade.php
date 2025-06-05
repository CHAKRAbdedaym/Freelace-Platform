{{-- resources/views/messages/index.blade.php --}}
<x-app-layout >



<div class="max-w-6xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-6">Your Conversations</h2>

    <div class="grid gap-4">
        @forelse ($conversations as $conv)
            @php
                $other = $conv->sender_id === auth()->id() ? $conv->receiver : $conv->sender;
                $last = $conv->messages->first();
            @endphp

            <a href="{{ route('messages.show', $conv->id) }}" class="bg-white p-4 rounded-lg shadow hover:bg-gray-100 flex items-center justify-between">
                <div>
                    <div class="font-semibold">{{ $other->name }}</div>
                    <div class="text-sm text-gray-600">{{ Str::limit($last->body ?? 'No messages yet.', 50) }}</div>
                </div>
                <div class="text-xs text-gray-500">
                    {{ $last ? $last->created_at->diffForHumans() : '' }}
                </div>
            </a>
        @empty
            <p class="text-gray-600">No conversations yet.</p>
        @endforelse
    </div>
</div>
</x-app-layout>