<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gig;
use App\Models\Order;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Stats (optional)
        $users = User::latest()->paginate(10);
        $gigs = Gig::latest()->paginate(10);
        $orders = Order::latest()->paginate(10);
        

        return view('admin.dashboard', compact('users', 'gigs', 'orders'));
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

