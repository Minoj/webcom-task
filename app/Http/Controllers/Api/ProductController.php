<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;

class ProductController
{
    public function index()
    {
        return response()->json(
            Product::with('category')->paginate(10)
        );
    }

    public function show(Product $product)
    {
        return response()->json(
            $product->load('category')
        );
    }
}
