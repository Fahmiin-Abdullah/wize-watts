<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Order;
use Auth;
use Cart;
use Image;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
    	$user = Auth::user();
    	$cartItems = Cart::content();
    	$shippingTotal = 0;

		foreach ($cartItems as $item) {
			$shippingTotal += $item->shipping;
		}

		if (Cart::subtotal() >= 50.00) {
			$shippingTotal = 9.99;
		}

		$cartTotal = Cart::subtotal() + $shippingTotal;
		
        if ($request->hasFile('proof')) {
        	$proof = $request->file('proof');
	        $filename = time().'.'.$proof->getClientOriginalExtension();
	        Image::make($proof)->resize(1000, 1000)->save(public_path('/uploads/proof/'.$filename));
	    } else {
	    	$filename = null;
	    }

    	$order = $user->orders()->create([
    		'shipping' => $shippingTotal,
    		'total' => $cartTotal,
    		'payment' => $request->input('payment'),
    		'proof' => $filename
    	]);

    	foreach ($cartItems as $cartItem) {
    		$order->products()->attach($cartItem->id, [
    			'qty' => $cartItem->qty,
    			'total' => $cartItem->subtotal
    		]);
    	}

    	Cart::destroy();

    	return view('users.thankyou');
    }
}
