<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::instance('cart') ->content();
        return view("cart", ["cartItems"=> $cartItems]);
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $price = $product->price;
        Cart::instance('cart')->add($product->id, $product->name, $request->quantity, $price)->associate('App\Models\Product');
        return redirect()->back()->with('massage','success ! item has been added successfully');
    }

    public function updateCart(Request $request)
    {
        Cart::instance('cart')->update($request->rowId, $request->quantity);
        return redirect()->route('cart.index');
    }

    public function removeItem(Request $request)
    {
        $rowId=$request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('cart.index');       
    }

    public function clearCart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->route('cart.index'); 
    }
}
