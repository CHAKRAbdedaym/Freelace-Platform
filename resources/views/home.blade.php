<x-app-layout>
    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold mb-4">Welcome to Your Freelance Platform</h1>
                    <p class="text-lg">Connect with freelancers or post your own gigs.</p>

                    <div class="mt-6 flex space-x-4">
                        <a href="{{ route('gigs.index') }}" class="px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
                            Browse Gigs
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
