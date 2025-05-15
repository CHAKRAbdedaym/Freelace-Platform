<x-app-layout title="Admin Dashboard">
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8 space-y-10">
        <!-- Title -->
        <h1 class="text-5xl py-3 font-extrabold text-center mb-10 tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-purple-500">
      Admin Dashboard
    </h1>

        

        <!-- Stats Cards -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <x-admin.card title="Total Users" :value="$users->total()" link="{{ route('admin.users.index') }}" />
    <x-admin.card title="Total Gigs" :value="$gigs->total()" link="{{ route('admin.gigs.index') }}" />
    <x-admin.card title="Total Orders" :value="$orders->total()" link="{{ route('admin.orders.index') }}" />
</div>


        <!-- Charts Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <x-admin.chart title="Weekly New Users" chart-id="newUsersChart" />
            <x-admin.chart title="Most Popular Gigs" chart-id="popularGigsChart" />
            <x-admin.chart title="Revenue from Orders" chart-id="revenueChart" />
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Weekly New Users
        new Chart(document.getElementById('newUsersChart'), {
            type: 'line',
            data: {
                labels: @json($weeklyNewUsers->keys()),
                datasets: [{
                    label: 'New Users',
                    data: @json($weeklyNewUsers->values()),
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: { responsive: true,
    scales: {
        y: {
            ticks: {
                precision: 0, // No decimals
                callback: function(value) {
                    if (Number.isInteger(value)) return value;
                }
            }
        }
    },
    plugins: {
        legend: { display: false }
    }
            }
        });

        // Most Popular Gigs
        new Chart(document.getElementById('popularGigsChart'), {
            type: 'bar',
            data: {
                labels: @json($popularGigs->pluck('title')),
                datasets: [{
                    label: 'Orders',
                    data: @json($popularGigs->pluck('orders_count')),
                    backgroundColor: '#6366f1'
                }]
            },
            options: { responsive: true,
    scales: {
        y: {
            ticks: {
                precision: 0, // No decimals
                callback: function(value) {
                    if (Number.isInteger(value)) return value;
                }
            }
        }
    },
    plugins: {
        legend: { display: false }
    } }
        });

        // Revenue Chart
        new Chart(document.getElementById('revenueChart'), {
            type: 'bar',
            data: {
                labels: ['Total Revenue'],
                datasets: [{
                    label: 'Revenue ($)',
                    data: [@json($revenue)],
                    backgroundColor: '#f59e0b'
                }]
            },
            options: { responsive: true }
        });
    </script>
</x-app-layout>
