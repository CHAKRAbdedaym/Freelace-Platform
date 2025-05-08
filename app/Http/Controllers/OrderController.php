<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Gig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // View buyer's orders
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
                       ->with('gig')
                       ->latest()
                       ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    // View seller's sales (gigs the user owns that got ordered)
    public function sales()
    {
        $orders = Order::whereHas('gig', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('gig', 'user')->latest()->paginate(10);

        return view('orders.sales', compact('orders'));
    }

    // Store a new order (place an order)
    public function store(Request $request)
    {
        $request->validate([
            'gig_id' => 'required|exists:gigs,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $gig = Gig::findOrFail($request->gig_id);
        $totalPrice = $gig->price * $request->quantity;

        $order = Order::create([
            'user_id' => Auth::id(),
            'gig_id' => $gig->id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }
}
