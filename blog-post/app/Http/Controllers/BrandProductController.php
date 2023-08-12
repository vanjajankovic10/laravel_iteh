<?php

namespace App\Http\Controllers;

use App\Models\Product;

class BrandProductController extends Controller
{
    public function index($brand_id)
    {
        $products = Product::get()->where('brand_id', $brand_id);
        if (is_null($products)) {
            return response()->json('Data not found', 404);
        }
        return response()->json($products);
    }
}
