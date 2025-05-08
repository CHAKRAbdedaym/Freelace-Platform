<x-app-layout title="My Gigs">
    <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-6 text-center">My Gigs</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
            @forelse ($gigs as $gig)
                <div class="gig-card bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <!-- Gig Image -->
                    <div class="flex justify-center items-center p-4">
                        <img src="{{ asset('storage/' . $gig->thumbnail) }}" alt="Gig Thumbnail" class="gig-image">
                    </div>

                    <div class="px-4 pb-4">
                        <h3 class="font-semibold text-xl text-gray-800">{{ $gig->title }}</h3>
                        <p class="text-gray-600 text-sm">{{ Str::limit($gig->description, 80) }}</p>
                        <div class="mt-4 flex justify-center gap-4 action-buttons">
                            <a href="{{ route('gigs.show', $gig->slug) }}" class="text-indigo-600 font-semibold">View</a>
                            <a href="{{ route('gigs.edit', $gig) }}" class="text-gray-600 font-semibold">Edit</a>
                            <form method="POST" action="{{ route('gigs.destroy', $gig) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:text-red-700 font-semibold">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 w-full">You haven't created any gigs yet. Start by creating one!</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            {{ $gigs->links() }}
        </div>
    </div>
</x-app-layout>

<style>
    /* Gig Card Image */
    .gig-image {
        width: auto;
        height: auto;
        max-width: 150px;
        max-height: 150px;
        object-fit: cover;
        border-radius: 8px;
    }

    /* Action Buttons Spacing */
    .action-buttons a,
    .action-buttons button {
        margin-right: 10px;
    }

    /* Gig Card Styles */
    .gig-card {
        transition: all 0.3s ease;
        border-radius: 10px;
    }

    .gig-card:hover {
        transform: scale(1.02);
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
</style>
