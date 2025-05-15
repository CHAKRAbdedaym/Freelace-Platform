<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gig;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Stats (optional)
        $users = User::latest()->paginate(10);
        $gigs = Gig::latest()->paginate(10);
        $orders = Order::latest()->paginate(10);

        $weeklyNewUsers = User::where('created_at', '>=', now()->subWeek())
        ->get()
        ->groupBy(fn ($user) => $user->created_at->format('l'))
        ->map(fn ($group) => $group->count());

    // Top 5 most popular gigs
    $popularGigs = Gig::withCount('orders')
        ->orderByDesc('orders_count')
        ->take(5)
        ->get();

    // Revenue
    $revenue = (int) Order::sum('total_price');

        return view('admin.dashboard', compact('users', 'gigs', 'orders', 'weeklyNewUsers', 'popularGigs', 'revenue'));
    }

    public function destroyUser(User $user)
    {
        if ($user->role === 'admin') {
            return back()->with('error', 'You cannot delete another admin.');
        }

        $user->delete(); // or $user->forceDelete(); if you don’t use SoftDeletes

        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
    }
}

