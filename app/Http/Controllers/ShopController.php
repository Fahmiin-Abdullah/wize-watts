<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Favorite;
use App\Category;
use App\Subcategory;
use App\Cart;
use Auth;
use Session;

class ShopController extends Controller
{
	public function showPage()
	{
		$products = Product::paginate(15);

		return view('users.shop')
				->with('products', $products);
	}

	public function getCatalog($cat, $subcat)
	{
		$products = Product::where('category_id', $cat)
							->where('subcategory_id', $subcat)
							->get();

		return view('users.shop')->with('products', $products);
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
