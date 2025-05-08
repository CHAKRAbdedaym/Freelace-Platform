<x-app-layout title="My Orders">
    <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-6 text-center">My Orders</h2>

        @if($orders->isEmpty())
            <p class="text-center text-gray-500">You haven't placed any orders yet.</p>
        @else
            <div class="overflow-hidden shadow-xl sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gig Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($orders as $order)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $order->gig->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $order->quantity }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $order->total_price }} MAD</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($order->status) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $orders->links() }}  <!-- Pagination links -->
            </div>
        @endif
    </div>
</x-app-layout>
