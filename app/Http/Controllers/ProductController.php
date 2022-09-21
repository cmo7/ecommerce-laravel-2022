<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            "category_id" => "required|exists:categories,id",
        ]);

        $picture = $request->file('picture');

        $picture_file_name = time() . $picture->getClientOriginalName();
        $picture->move(public_path('images'), $picture_file_name);

        $validated["picture"] = "/images/" . $picture_file_name;
        $validated["slug"] = Str::slug($validated["name"] . time());

        $product = Product::create($validated);

        $tags = $request->input('tags');

        $product->tags()->attach($tags);

        return redirect(route('admin-page'));
    }
    public function show($slug) {
        $product = Product::where('slug', $slug)->get()->firstOrFail();
        $related_products = $product
            ->category
            ->products
            ->where('id', '!=', $product->id)
            ->shuffle()
            ->take(3);
        return view('public.single-product', [
            "product" => $product,
            "related_products" => $related_products,
        ]);
    }
}
