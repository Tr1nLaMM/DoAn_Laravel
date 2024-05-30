<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Gloudemans\Shoppingcart\Facades\Cart;


class CheckoutController extends Controller
{
    public function index() {
        $cartItems = Cart::content(); // This should be `content()` not `getContent()`
        $total = Cart::total();
    
        return view('checkout', compact('cartItems', 'total'));
    }
    public function showCheckoutForm()
    {
        // Return the checkout form view
        return view('checkout.form');
    }

    public function processCheckout(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'country' => 'required|string|max:255',
            'payment_method' => 'required|string', // e.g., 'credit_card', 'paypal', etc.
        ]);

        if ($validator->fails()) {
            return redirect()->route('checkout.form')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Process the payment
        // (You'll integrate with a payment gateway here)

        // Assuming payment is successful, proceed with order processing

        // Example: Save order details to the database

        // Redirect to a success page or show a success message
        return redirect()->route('checkout.success');
    }

    public function success()
    {
        // Return a success view
        return view('checkout.success');
    }
}
