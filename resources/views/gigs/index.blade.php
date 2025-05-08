<x-app-layout title="Browse Gigs | spark">
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Available Gigs</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($gigs as $gig)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                    @if ($gig->image_url)
                        <img src="{{ asset('storage/' . $gig->image_url) }}" alt="{{ $gig->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-black dark:text-white">{{ $gig->title }}</h2>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">{{ Str::limit($gig->description, 100) }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-lg font-bold text-green-600">${{ number_format($gig->price, 2) }}</span>
                            <a href="{{ route('gigs.show', $gig->slug) }}" class="text-indigo-600 hover:text-indigo-800">
                                View Details
                            </a>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
