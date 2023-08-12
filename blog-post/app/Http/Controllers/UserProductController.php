<?php

namespace App\Http\Controllers;

use App\Models\Product;

class UserProductController extends Controller
{
    public function index($user_id)
    {
        $books = Product::get()->where('user_id', $user_id);
        if (is_null($books)) {
            return response()->json('Data not found', 404);
        }
        return response()->json($books);
    }
}
