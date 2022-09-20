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
        $validated = $request->validate([
            "name" => "required|max:255",
            "short_description" => "required|max:255",
            "content" => "required",
            "picture" => "required|image",
            "price" => "required|numeric|min:0",
            "stock" => "required|numeric|min:0",
            "category_id" => "required|exists:category,id",
        ]);
        return redirect('/');
    }
}
