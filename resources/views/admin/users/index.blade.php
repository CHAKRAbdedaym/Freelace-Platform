<x-app-layout title="All Users">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <h1 class="text-4xl font-extrabold text-center mb-10 tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-purple-500">
            All Users
        </h1>

        <!-- Users Table Card -->
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-3xl overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Users List</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Role</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Joined</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700 text-gray-700 dark:text-gray-200">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap capitalize">{{ $user->role }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->created_at->format('Y-m-d') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($user->role !== 'admin')
                                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Delete this user?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 hover:text-red-800 font-medium transition">Delete</button>
                                            </form>
                                        @else
                                            <span class="text-gray-400">Admin</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $users->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
