<x-app-layout title="All Orders">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Title -->
        <h1 class="text-4xl font-extrabold text-center mb-10 tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-purple-500">
            All Orders
        </h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="mb-6 px-4 py-3 rounded-md bg-green-100 text-green-800 font-medium">
                {{ session('success') }}
            </div>
        @endif

        <!-- Orders Table -->
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-3xl overflow-hidden">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold uppercase">Order ID</th>
                                <th class="px-6 py-3 text-left font-semibold uppercase">Buyer</th>
                                <th class="px-6 py-3 text-left font-semibold uppercase">Gig</th>
                                <th class="px-6 py-3 text-left font-semibold uppercase">Total Price</th>
                                <th class="px-6 py-3 text-left font-semibold uppercase">Status</th>
                                <th class="px-6 py-3 text-left font-semibold uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700 text-gray-800 dark:text-gray-200">
                            @foreach ($orders as $order)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-6 py-4 whitespace-nowrap font-medium">#{{ $order->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->user->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $order->gig->title ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($order->total_price, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-block px-2 py-1 rounded-full text-xs font-medium
                                            @if ($order->status === 'completed') bg-green-100 text-green-700
                                            @elseif ($order->status === 'pending') bg-yellow-100 text-yellow-700
                                            @elseif ($order->status === 'cancelled') bg-red-100 text-red-700
                                            @else bg-gray-200 text-gray-700 @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-800 font-semibold">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $orders->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
