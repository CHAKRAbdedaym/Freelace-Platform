<x-app-layout title="All Gigs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <h1 class="text-4xl py-3 font-extrabold text-center mb-10 tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-purple-500">
            All Gigs
        </h1>

        <!-- Gigs Table -->
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-3xl overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Gigs List</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Title</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Seller</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Price</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Created</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700 text-gray-700 dark:text-gray-200">
                            @foreach ($gigs as $gig)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $gig->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $gig->user->name ?? 'Unknown' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($gig->price, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $gig->created_at->format('Y-m-d') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form method="POST" action="{{ route('admin.gigs.destroy', $gig) }}" onsubmit="return confirm('Delete this gig?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-800 font-medium transition">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $gigs->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
