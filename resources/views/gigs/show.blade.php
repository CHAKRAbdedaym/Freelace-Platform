<x-app-layout :title="$gig->title . ' | ' . config('app.name')">

    <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-4xl mx-auto bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl border border-gray-200 dark:border-gray-700 shadow-xl rounded-3xl p-10">

            <!-- Title -->
            <h1 class="text-4xl font-extrabold text-center text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 mb-8">
                {{ $gig->title }}
            </h1>

            <!-- Gig Thumbnail -->
            @if ($gig->thumbnail)
                <div class="flex justify-center mb-8">
                    <img 
                        src="{{ asset('storage/' . $gig->thumbnail) }}" 
                        alt="Gig Thumbnail" 
                        class="rounded-xl shadow-lg max-h-64 object-cover"
                    >
                </div>
            @endif

             <!-- Gig Description -->
                <div 
    class="text-sm text-center text-gray-600 dark:text-gray-300 line-clamp-9" 
    style="margin: 1rem 0; word-break: break-word;"
>
    
    {{ $gig->description }}
</div>

            <!-- Price -->
            <div class="text-center text-xl font-semibold text-indigo-600 dark:text-indigo-400 mb-4">
                Price: ${{ number_format($gig->price, 2) }}
            </div>

            <!-- Author -->
            <p class="text-center text-sm text-gray-500 dark:text-gray-400 mb-8">
                Posted by: <span class="font-medium">{{ $gig->user->name ?? 'Unknown' }}</span>
            </p>

            <!-- Order Form -->
            @auth
                @if (auth()->id() !== $gig->user_id)
                    <form action="{{ route('orders.store') }}" method="POST" class="space-y-4 mb-10 max-w-md mx-auto">
                        @csrf
                        <input type="hidden" name="gig_id" value="{{ $gig->id }}">

                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Quantity
                            </label>
                            <input type="number" name="quantity" id="quantity" value="1" min="1"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                        </div>

                        <button type="submit"
                            class="w-full px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition">
                            Place Order
                        </button>
                    </form>
                @endif
            @endauth

            <!-- Edit / Delete for Owner -->
            @auth
                @if (auth()->id() === $gig->user_id)
                    <div class="flex justify-center space-x-4">
                        <a href="{{ route('gigs.edit', $gig) }}"
                            class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg transition">
                            Edit
                        </a>
                        <form action="{{ route('gigs.destroy', $gig) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this gig?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            @endauth

        </div>
    </div>

</x-app-layout>
