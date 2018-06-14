<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Product;

class AdminController extends Controller
{
	public function showProducts()
	{
		$products = Product::paginate(15);

		return view('admin.products')
					->with('products', $products);
	}

	public function showCustomers()
	{
		$customers = User::paginate(20);

		return view('admin.customers')
					->with('customers', $customers);
	}

	public function getCustomer($id)
	{
		$customer = User::find($id);

		return response(json_encode($customer));
	}
}
