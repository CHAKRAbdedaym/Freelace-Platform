@props(['title', 'chartId'])

<div class="bg-white dark:bg-gray-900 rounded-2xl shadow p-5">
    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">{{ $title }}</h3>
    <canvas id="{{ $chartId }}" class="w-full h-60"></canvas>
</div>