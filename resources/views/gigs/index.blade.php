<x-app-layout>
    <!DOCTYPE html>
    <html lang="en" class="dark">
    <head>
        <meta charset="UTF-8">
        <title>Browse Gigs | Spark</title>
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Line clamp plugin for Tailwind -->
        <script>
            tailwind.config = {
                theme: {
                    extend: {},
                },
                plugins: [tailwindcssLineClamp],
            };
        </script>
    </head>
    <body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white">

        <div class="max-w-7xl mx-auto px-4 py-14">
    <h1 class="text-5xl py-2 font-extrabold text-center mb-10 tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-purple-500">
      Browse Gigs
    </h1>

    <!-- Search & Sort -->
    <form method="GET" action="{{ route('gigs.index') }}" class="mb-12">
      <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
        <input 
          type="text" 
          name="search" 
          value="{{ request('search') }}" 
          placeholder="🔍 Search gigs..." 
          class="w-full sm:w-80 px-5 py-3 bg-white/30 backdrop-blur-md dark:bg-gray-800/50 border border-gray-300 dark:border-gray-700 rounded-2xl shadow-inner text-sm focus:ring-2 focus:ring-indigo-500 transition"
        />

        <select 
          name="sort_price" 
          class="w-full sm:w-52 px-4 py-3 bg-white/30 backdrop-blur-md dark:bg-gray-800/50 border border-gray-300 dark:border-gray-700 rounded-2xl text-sm shadow-inner focus:ring-2 focus:ring-indigo-500 transition"
        >
          
          <option value="asc" {{ request('sort_price') == 'asc' ? 'selected' : '' }}>Low to High</option>
          <option value="desc" {{ request('sort_price') == 'desc' ? 'selected' : '' }}>High to Low</option>
        </select>

        <button 
          type="submit" 
          class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-semibold rounded-2xl hover:from-indigo-600 hover:to-purple-600 shadow-lg transition"
        >
          Search
        </button>
      </div>
    </form>
            <!-- Gigs Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @forelse ($gigs as $gig)
                    <a href="{{ route('gigs.show', $gig->slug) }}" 
                       class="block bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-md hover:shadow-xl hover:scale-[1.02] transition duration-200"
                    >
                        @if ($gig->thumbnail)
                            <!-- Show gig thumbnail -->
                            <img src="{{ asset('storage/' . $gig->thumbnail) }}" alt="{{ $gig->title }}" class="w-full h-48 object-cover">
                        @else
                            <!-- Placeholder if no thumbnail -->
                            <div class="w-full h-48 flex items-center justify-center bg-gradient-to-br from-indigo-500 to-purple-600 text-white text-3xl font-semibold">
                                {{ strtoupper(substr($gig->title, 0, 2)) }}
                            </div>
                        @endif

                        <div class="p-5">
                            <h2 class="text-lg font-bold mb-2">{{ $gig->title }}</h2>

                            <!-- Description with margin and word-break -->
                            <p class="text-sm text-gray-600 dark:text-gray-300 break-words line-clamp-3 mb-4" style="margin-top: 0.5rem;">
                                {{ $gig->description }}
                            </p>

                            <!-- Rating -->
                            <div class="text-yellow-500 text-sm mb-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= round($gig->average_rating)) ★ @else ☆ @endif
                                @endfor
                                <span class="text-gray-500 dark:text-gray-400 ml-1">({{ number_format($gig->average_rating, 1) }})</span>
                            </div>

                            <!-- Price & View Link -->
                            <div class="flex justify-between items-center">
                                <span class="text-base font-bold text-green-600">${{ number_format($gig->price, 2) }}</span>
                                <span class="text-indigo-600 font-medium text-sm">View →</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="col-span-3 text-center text-gray-500 dark:text-gray-300">No gigs found.</p>
                @endforelse
            </div>
        </div>

    </body>
    </html>
</x-app-layout>
