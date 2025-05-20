<x-app-layout title="My Orders">
    <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-6xl bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl border border-gray-200 dark:border-gray-700 shadow-xl rounded-3xl p-10">

            <!-- Title -->
            <h2 class="text-4xl font-extrabold text-center text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 mb-8 py-3" >
                My Orders
            </h2>

            @if($orders->isEmpty())
                <p class="text-center text-gray-500 dark:text-gray-300">You haven't placed any orders yet.</p>
            @else
                <div class="overflow-x-auto rounded-xl shadow-md">
                    <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-200">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-xs uppercase text-gray-600 dark:text-gray-300">
                            <tr>
                                <th class="px-6 py-3">Gig Title</th>
                                <th class="px-6 py-3">Quantity</th>
                                <th class="px-6 py-3">Total Price</th>
                                <th class="px-6 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($orders as $order)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-6 py-4 font-medium">{{ $order->gig->title }}</td>
                                    <td class="px-6 py-4">{{ $order->quantity }}</td>
                                    <td class="px-6 py-4">{{ $order->total_price }} MAD</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-block px-3 py-1 rounded-full 
                                            {{ $order->status === 'completed' ? 'bg-green-100 text-green-800 dark:bg-green-700 dark:text-white' : 
                                               ($order->status === 'pending' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-700 dark:text-white' : 
                                               'bg-gray-200 text-gray-800 dark:bg-gray-600 dark:text-white') }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6 text-center">
                    {{ $orders->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
