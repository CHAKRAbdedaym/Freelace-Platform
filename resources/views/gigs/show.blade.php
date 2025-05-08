<x-app-layout :title="$gig->title . ' | ' . config('app.name')">

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Gig Title -->
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    {{ $gig->title }}
                </h1>

                <!-- Gig Thumbnail -->
                @if ($gig->thumbnail)
                    <div class="mb-6">
                        <img 
                            src="{{ asset('storage/' . $gig->thumbnail) }}" 
                            alt="Gig Thumbnail" 
                            style="max-width: 150px; height: auto; border-radius: 8px;"
                        >
                    </div>
                @endif

                <!-- Gig Description -->
                <div class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    {{ $gig->description }}
                </div>

                <!-- Price -->
                <div class="text-lg font-semibold text-indigo-600 dark:text-indigo-300 mb-4">
                    Price: ${{ number_format($gig->price, 2) }}
                </div>

                <!-- Author -->
                <p class="text-sm text-gray-500 mb-6">
                    Posted by: {{ $gig->user->name ?? 'Unknown' }}
                </p>

                <!-- Order Form (if user is authenticated) -->
                @auth
                    <form action="{{ route('orders.store') }}" method="POST" class="mt-6">
                        @csrf
                        <input type="hidden" name="gig_id" value="{{ $gig->id }}">

                        <!-- Quantity Input -->
                        <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <button type="submit" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                            Place Order
                        </button>
                    </form>
                @endauth

                <!-- Owner-only actions (Edit and Delete) -->
                @auth
                    @if (auth()->id() === $gig->user_id)
                        <div class="flex space-x-4 mt-6">
                            <a 
                                href="{{ route('gigs.edit', $gig) }}" 
                                class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition"
                            >
                                Edit
                            </a>

                            <!-- Delete Form -->
                            <form 
                                action="{{ route('gigs.destroy', $gig) }}" 
                                method="POST" 
                                onsubmit="return confirm('Are you sure you want to delete this gig?');"
                            >
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
                                >
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                @endauth

            </div>
        </div>
    </div>

</x-app-layout>
