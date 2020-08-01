<?php

namespace App\Http\Controllers;

use Auth;
use App\Tag;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product\ProductSearchResource;

class ShopController extends Controller
{
	public function showPage()
	{
		$products = Product::paginate(15);
		$tags = Tag::all();

		return view('users.shop')
				->with('products', $products)
				->with('tags', $tags);
	}

	public function search(Request $request)
	{
		$search = $request->get('value');
		$products = Product::searchName($search)->limit(5)->get();
		return ProductSearchResource::collection($products);
	}

	public function getCatalog($cat, $subcat)
	{
		$products = Product::where('category_id', $cat)
							->where('subcategory_id', $subcat)
							->paginate(15);

		return view('users.shop')->with('products', $products);
	}

	public function getCategory($id)
	{
		$products = Product::where('category_id', $id)->paginate(15);

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
