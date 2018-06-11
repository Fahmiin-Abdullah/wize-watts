<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class AdminController extends Controller
{
	public function showProducts()
	{
		$products = Product::paginate(15);

		return view('admin.products')
					->with('products', $products);
	}
}
