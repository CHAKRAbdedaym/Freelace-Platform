<x-app-layout :title="$gig->title . ' | ' . config('app.name')">
    <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-3xl bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl border border-gray-200 dark:border-gray-700 shadow-xl rounded-3xl p-10">

            <!-- Header -->
            <h2 class="text-3xl font-extrabold text-center text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 mb-8">
                Edit Gig
            </h2>

            <!-- Form -->
            <form action="{{ route('gigs.update', $gig) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        value="{{ old('title', $gig->title) }}" 
                        class="mt-1 w-full rounded-lg shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 transition"
                        required
                    >
                    @error('title') 
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="5" 
                        class="mt-1 w-full rounded-lg shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 transition"
                        required
                    >{{ old('description', $gig->description) }}</textarea>
                    @error('description') 
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price ($)</label>
                    <input 
                        type="number" 
                        name="price" 
                        id="price" 
                        value="{{ old('price', $gig->price) }}" 
                        min="5" 
                        class="mt-1 w-full rounded-lg shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 transition"
                        required
                    >
                    @error('price') 
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Current Thumbnail -->
                @if($gig->thumbnail)
                    <div>
                        <p class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Old Photo:</p>
                        <img 
                            src="{{ asset('storage/' . $gig->thumbnail) }}" 
                            alt="Current Thumbnail" 
                            class="h-32 w-32 object-cover rounded-lg shadow-md"
                        >
                    </div>
                @endif

                <!-- Upload New Thumbnail -->
                <div>
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Change Photo</label>
                    <input 
                        type="file" 
                        name="thumbnail" 
                        id="thumbnail" 
                        class="mt-1 w-full text-sm text-gray-600 dark:text-gray-300"
                    >
                    @error('thumbnail') 
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Submit -->
                <div class="pt-4 text-center">
                    <x-primary-button class="px-6 py-2 text-base">
                        {{ __('Update Gig') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
