<x-app-layout :title="$title = 'Create GIG | ' . config('app.name')">
    
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white ">
            Create a New Gig
        </h2>
    

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <form action="{{ route('gigs.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf

                    <!-- Title -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-200">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" required
                            class="w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-200">Description</label>
                        <textarea name="description" rows="5" required
                            class="w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description') }}</textarea>
                        @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Price -->
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-200">Price (USD)</label>
                        <input type="number" name="price" value="{{ old('price') }}" required min="5"
                            class="w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('price') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Thumbnail (Optional) -->
                    <div class="mb-6">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-200">Thumbnail (optional)</label>
                        <input type="file" name="thumbnail"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                        @error('thumbnail') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
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
    </div>
</x-app-layout>
