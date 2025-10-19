<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        return view('checkout.index', compact('cart', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $cart = session()->get('cart', []);
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        // Fake payment: Always succeed
        Order::create([
            'user_name' => $request->name,
            'email' => $request->email,
            'total' => $total,
            'items' => json_encode($cart),
        ]);

        session()->forget('cart');
        return redirect('/')->with('success', 'Order placed successfully!');
    }
}
