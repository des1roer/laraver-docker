<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all()->where('qty', '>', 0);
    }

    public function show(int $id)
    {
        return Cache::get('product', Product::find($id));
    }
}
