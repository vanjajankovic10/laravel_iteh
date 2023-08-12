<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrandCollection;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return new BrandCollection($brands);
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
        $brand = Brand::create([
            'name' => $request->name,
            'CEO' => $request->CEO,
            'year' => $request->year,
            'country' => $request->country,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return new BrandResource($brand);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'requred|string|max:50',
            'CEO' => 'required|string|max:50',
            'year' => 'required',
            'country' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $brand->name = $request->name;
        $brand->CEO = $request->CEO;
        $brand->year = $request->year;
        $brand->country = $request->country;

        $brand->update();
        return response()->json(['Brand update successfuly', new BrandResource($brand)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return response()->json('Brand deleted successfully');
    }
}
