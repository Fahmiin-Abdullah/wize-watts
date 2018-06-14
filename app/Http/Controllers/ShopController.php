<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Favorite;
use Auth;

class ShopController extends Controller
{
	public function showPage()
	{
		$products = Product::paginate(15);

		return view('users.shop')
				->with('products', $products);
	}

	public function createFav($id)
	{
		$product = Product::find($id);
		$faved = Favorite::where('product_id', $product->id)->first();

		if (!$faved) {
			$user = Auth::user();
			$fav = new Favorite;
			$fav->product_id = $id;
			$user->favorites()->save($fav);

			return response(1);
		}
		
		$faved->delete();
		return response(0);
	}
}
