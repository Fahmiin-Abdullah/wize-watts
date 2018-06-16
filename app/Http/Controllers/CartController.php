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

		return view('users.cart')->with('cartItems', $cartItems);
	}

	public function addToCart(Request $request, $id)
	{
		$product = Product::find($id);
		$qty = $request->input('qty');
		$cartItem = Cart::add([
			'id' => $id,
			'name' => $product->name,
			'qty' => $qty,
			'price' => $product->pricing
		]);
		$cartItem->associate('App\Product');

		return back()->with('session_code', 'cartAdded');
	}

	public function deleteItem($id)
	{
		$item = Cart::remove($id);

		return back()->with('session_code', 'itemDeleted');
	}
}
