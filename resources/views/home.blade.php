<x-app-layout title="Home Page">
    <section class="relative overflow-hidden bg-gradient-to-br from-indigo-600 via-purple-700 to-pink-600 text-white py-28">
        <!-- Lottie Animation Background -->
        <div class="absolute inset-0 z-0 opacity-20 pointer-events-none">
            <div id="lottie-bg" class="w-full h-full"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 leading-tight backdrop-blur-md bg-white/10 px-4 py-2 rounded-xl shadow-xl">
                Unleash Your Potential with <span class="text-yellow-300">Spark Freelance</span>
            </h1>
            <p class="text-lg md:text-xl text-white/90 mb-8 backdrop-blur-md bg-white/10 px-4 py-2 rounded-lg shadow-md">
                Connect with expert freelancers or showcase your talent. Where opportunity meets skill.
            </p>
            <a href="{{ route('gigs.index') }}"
               class="inline-block bg-white text-indigo-700 hover:bg-gray-100 px-8 py-4 rounded-full font-semibold shadow-xl transition duration-300">
                🚀 Explore Gigs
            </a>
        </div>
    </section>

    <!-- Featured Gigs -->
    <section class="bg-gray-50 dark:bg-gray-900 py-20">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-gray-900 dark:text-white mb-12"> Featured Gigs</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse ($featuredGigs as $gig)
                    <a href="{{ route('gigs.show', $gig->slug) }}"
                       class="group bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg border border-gray-200 dark:border-gray-700 rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transform transition hover:-translate-y-1">
                        <!-- Image or initials -->
                        <div class="h-48 w-full relative">
                            @if ($gig->thumbnail)
                                <img src="{{ asset('storage/' . $gig->thumbnail) }}"
                                     alt="{{ $gig->title }}"
                                     class="w-full h-full object-cover rounded-t-2xl">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-indigo-500 to-purple-600 text-white text-4xl font-bold">
                                    {{ strtoupper(substr($gig->title, 0, 2)) }}
                                </div>
                            @endif
                        </div>

                        <div class="p-6 space-y-3">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white truncate">{{ $gig->title }}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-3">{{ $gig->description }}</p>

                            <!-- Ratings -->
                            <div class="flex items-center text-yellow-400">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span>{{ $i <= round($gig->average_rating) ? '★' : '☆' }}</span>
                                @endfor
                                <span class="text-gray-500 dark:text-gray-400 ml-2 text-sm">({{ number_format($gig->average_rating, 1) }})</span>
                            </div>

                            <!-- Price + CTA -->
                            <div class="flex justify-between items-center pt-3">
                                <span class="text-green-600 font-bold text-lg">${{ number_format($gig->price, 2) }}</span>
                                <span class="text-indigo-600 font-medium group-hover:underline">View →</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="col-span-4 text-center text-gray-500 dark:text-gray-300">
                        No featured gigs available at the moment.
                    </p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Lottie Script -->
    <script src="https://cdn.jsdelivr.net/npm/lottie-web@5.7.8/build/player/lottie.min.js"></script>
    <script>
        lottie.loadAnimation({
            container: document.getElementById('lottie-bg'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://assets7.lottiefiles.com/datafiles/KITnDjcZjDR5Tu5/data.json'
        });
    </script>
</x-app-layout>
