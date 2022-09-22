<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class StoreController extends Controller
{
    public function front_page(Request $request)
    {
        $user = auth()->user();

        if ($user != null) {
            $cart = $user->orders
                ->sortByDesc('created_at')
                ->firstWhere('status', 'cart');

            if ($cart == null) {
                $cart = Order::create([
                    "user_id" => $user->id,
                    "total_price" => 0,
                    "status" => "cart",
                ]);
            }
        } else {
            $cart = null;
        }
        return view('public.front-page', [
            'products' => Product::all(),
            'cart' => $cart,
        ]);
    }

    public function checkout_page(Request $request) {

        return view('public.checkout-page', [
            'cart' => $cart,
        ]);
    }
}
