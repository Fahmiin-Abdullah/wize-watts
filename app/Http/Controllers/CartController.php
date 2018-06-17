<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{
	public function showCart()
	{
		$cartItems = Cart::content();
		$shippingTotal = 0;

		foreach ($cartItems as $item) {
			$shippingTotal += $item->shipping;
		}

		if (Cart::subtotal() >= 50.00) {
			$shippingTotal = 9.99;
		}

		$cartTotal = Cart::subtotal() + $shippingTotal;

		return view('users.cart')
				->with('cartItems', $cartItems)
				->with('shippingTotal', $shippingTotal)
				->with('cartTotal', $cartTotal);
	}

	public function addToCart(Request $request, $id)
	{
		$product = Product::find($id);
		$qty = $request->input('qty');
		$cartItem = Cart::add([
			'id' => $id,
			'name' => $product->name,
			'qty' => $qty,
			'price' => $product->pricing,
			'shipping' => $product->shipping * $qty
		])->associate('App\Product');
		
		return back()->with('session_code', 'cartAdded');
	}

	public function deleteItem($id)
	{
		$item = Cart::remove($id);

		return back()->with('session_code', 'itemDeleted');
	}
}
