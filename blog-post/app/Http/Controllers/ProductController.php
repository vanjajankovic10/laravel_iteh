<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return new ProductCollection($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'purpose' => 'required|string|max:20',
            'skin_type' => 'required',
            'brand_id' => 'required',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $product = Product::create([
            'name' => $request->name,
            'purpose' => $request->purpose,
            'skin_type' => $request->skin_type,
            'brand_id' => $request->brand_id,
            'user_id' => Auth::user()->id,
        ]);

        return response()->json(['Product created successfully', new ProductResource($product)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if (!is_null($request->name)) {
            $product->name = $request->name;
        }
        if (!is_null($request->purpose)) {
            $product->purpose = $request->purpose;
        }
        if (!is_null($request->skin_type)) {
            $product->skin_type = $request->skin_type;
        }

        if (!is_null($request->brand_id))
            $product->brand_id = $request->brand_id;
        $product->update();
        return response()->json(['Product updated successfully', new ProductResource($product)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json('Product delete successfully');
    }
}
