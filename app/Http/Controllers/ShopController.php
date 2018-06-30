<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Favorite;
use App\Category;
use App\Subcategory;
use App\Cart;
use App\Tag;
use Auth;
use Session;

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
		$products = Product::where('name', 'LIKE', "%$search%")->limit(5)->get();
		$output = '';

		if (count($products) > 0) {
			foreach ($products as $product) {
				$output .= '
					<a href="/products/view/'.$product->id.'" class="collection-item darkGrey white-text paddingAll10">
						<div class="row margin0">
							<div class="col s8 m8 left-align">
								<p>'.$product->name.'</p>
							</div>
							<div class="col s4 m4 right-align">
								<p>'.$product->pricing.'</p>
							</div>
						</div>
					</a>';
			}
		} else {
			$output .= '
				<a class="collection-item darkGrey white-text"><span>No products found! Try another search</span></a>
			';
		}

		return response($output);
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
		$products = Product::where('category_id', $id)->get()->paginate(15);

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
