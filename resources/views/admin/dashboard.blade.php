<x-app-layout title="Admin Dashboard">
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6">
                <h2 class="text-gray-600 dark:text-gray-300 text-sm font-medium mb-2">Total Users</h2>
                <p class="text-3xl font-semibold text-gray-900 dark:text-white">{{ $users->total() }}</p>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6">
                <h2 class="text-gray-600 dark:text-gray-300 text-sm font-medium mb-2">Total Freelancers</h2>
                <p class="text-3xl font-semibold text-gray-900 dark:text-white">{{ $users->where('role', 'freelancer')->count() }}</p>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6">
                <h2 class="text-gray-600 dark:text-gray-300 text-sm font-medium mb-2">Total Gigs</h2>
                <p class="text-3xl font-semibold text-gray-900 dark:text-white">{{ $gigs->total() }}</p>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6">
                <h2 class="text-gray-600 dark:text-gray-300 text-sm font-medium mb-2">Total Orders</h2>
                <p class="text-3xl font-semibold text-gray-900 dark:text-white">{{ $orders->total() }}</p>
            </div>
        </div>

        <!-- Users Table -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 mb-10">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Users</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                        <tr>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Role</th>
                            <th class="px-4 py-2">Joined</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 dark:text-gray-200">
                        @foreach ($users as $user)
                            <tr class="border-b border-gray-200 dark:border-gray-600">
                                <td class="px-4 py-2">{{ $user->name }}</td>
                                <td class="px-4 py-2">{{ $user->email }}</td>
                                <td class="px-4 py-2 capitalize">{{ $user->role }}</td>
                                <td class="px-4 py-2">{{ $user->created_at->format('Y-m-d') }}</td>
                                <td class="px-4 py-2">
                                    @if ($user->role !== 'admin')
                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Delete this user?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-800">Delete</button>
                                        </form>
                                    @else
                                        <span class="text-gray-400">Admin</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>

        <!-- Gigs Table -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 mb-10">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Gigs</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                        <tr>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Freelancer</th>
                            <th class="px-4 py-2">Created</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 dark:text-gray-200">
                        @foreach ($gigs as $gig)
                            <tr class="border-b border-gray-200 dark:border-gray-600">
                                <td class="px-4 py-2">{{ $gig->title }}</td>
                                <td class="px-4 py-2">${{ number_format($gig->price, 2) }}</td>
                                <td class="px-4 py-2">{{ $gig->user->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $gig->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $gigs->links() }}
                </div>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Orders</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                        <tr>
                            <th class="px-4 py-2">Order ID</th>
                            <th class="px-4 py-2">Gig</th>
                            <th class="px-4 py-2">Client</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 dark:text-gray-200">
                        @foreach ($orders as $order)
                            <tr class="border-b border-gray-200 dark:border-gray-600">
                                <td class="px-4 py-2">#{{ $order->id }}</td>
                                <td class="px-4 py-2">{{ $order->gig->title ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $order->user->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2 capitalize">{{ $order->status }}</td>
                                <td class="px-4 py-2">{{ $order->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
