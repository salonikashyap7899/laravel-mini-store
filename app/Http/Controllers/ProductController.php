<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['category', 'min_price', 'max_price']);
        $products = Product::filter($filters)->paginate(10);
        $categories = Product::distinct('category')->pluck('category');

        return view('products.index', compact('products', 'categories', 'filters'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}