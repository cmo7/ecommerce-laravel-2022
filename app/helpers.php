<?php

use App\Models\Order;

function get_cart () {
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
        return $cart;
}
