@props(['title', 'value', 'link' => null])

<a @if($link) href="{{ $link }}" @endif class="block bg-white dark:bg-gray-800 rounded-2xl shadow p-6 hover:shadow-xl transition duration-200 hover:ring-2 hover:ring-indigo-500 cursor-pointer">
    <h2 class="text-sm font-medium text-gray-500 dark:text-gray-300 mb-1">{{ $title }}</h2>
    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $value }}</p>
</a>
