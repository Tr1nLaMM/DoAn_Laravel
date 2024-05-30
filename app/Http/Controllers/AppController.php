<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class AppController extends Controller

{
    //
    public function index()
    {
        $products = Product::all(); // Fetch products from your database
        return view('index', compact('products')); // Pass products to your view
    }
}
