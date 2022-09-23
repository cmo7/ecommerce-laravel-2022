<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class StoreController extends Controller
{
    public function front_page(Request $request)
    {
        return view('public.front-page', [
            'products' => Product::all(),
        ]);
    }
    public function checkout_page(Request $request) {

        return view('public.checkout-page');
    }
}
