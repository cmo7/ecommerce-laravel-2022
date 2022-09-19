<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function new_form(Request $request) {
        return view('admin.new-product-form', [
            "categories" => Category::all(),
            "tags" => Tag::all(),
        ]);
    }

    public function create(Request $request) {
        return redirect('/');
    }
}
