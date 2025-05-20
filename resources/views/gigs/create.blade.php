<x-app-layout :title="$title = 'Create GIG | ' . config('app.name')">
    <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-4xl bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl border border-gray-200 dark:border-gray-700 shadow-xl rounded-3xl p-10">

            <!-- Title -->
            <h2 class="py-3 text-4xl font-extrabold text-center text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 mb-8">
                Create a New Gig
            </h2>

            <form action="{{ route('gigs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-200">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                        class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                    @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-200">Description</label>
                    <textarea name="description" rows="5" required
                        class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-300 focus:ring-opacity-50">{{ old('description') }}</textarea>
                    @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Price -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-200">Price (USD)</label>
                    <input type="number" name="price" value="{{ old('price') }}" required min="5"
                        class="w-full mt-1 rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                    @error('price') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Thumbnail -->
                <div class="mb-6">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-200">Thumbnail (optional)</label>
                    <input type="file" name="thumbnail"
                        class="block w-full mt-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                    @error('thumbnail') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Submit -->
                <div class="flex justify-end">
                    <x-primary-button>
                        {{ __('Publish Gig') }}
                    </x-primary-button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
