<x-app-layout :title="$gig->title . ' | ' . config('app.name')">
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Gig') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('gigs.update', $gig) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Title</label>
                        <input 
                            type="text" 
                            name="title" 
                            id="title" 
                            value="{{ old('title', $gig->title) }}" 
                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 focus:border-indigo-500" 
                            required
                        >
                        @error('title') 
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Description</label>
                        <textarea 
                            name="description" 
                            id="description" 
                            rows="5" 
                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 focus:border-indigo-500" 
                            required
                        >{{ old('description', $gig->description) }}</textarea>
                        @error('description') 
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Price -->
                    <div class="mb-4">
                        <label for="price" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Price ($)</label>
                        <input 
                            type="number" 
                            name="price" 
                            id="price" 
                            value="{{ old('price', $gig->price) }}" 
                            min="5" 
                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 focus:border-indigo-500" 
                            required
                        >
                        @error('price') 
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Current Thumbnail Preview -->
                    @if($gig->thumbnail)
                        <div class="mb-4">
                            <p class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Current Thumbnail:</p>
                            <img 
                                src="{{ asset('storage/' . $gig->thumbnail) }}" 
                                alt="Current Thumbnail" 
                                class="h-32 w-32 object-cover rounded-md"
                            >
                        </div>
                    @endif

                    <!-- Upload New Thumbnail -->
                    <div class="mb-6">
                        <label for="thumbnail" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Change Thumbnail</label>
                        <input 
                            type="file" 
                            name="thumbnail" 
                            id="thumbnail" 
                            class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-300"
                        >
                        @error('thumbnail') 
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>
                            {{ __('Update Gig') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
