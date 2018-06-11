<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use Auth;

class ShopController extends Controller
{
	public function showPage()
	{
		$products = Product::paginate(15);

		return view('users.shop')
				->with('products', $products);
	}
}
