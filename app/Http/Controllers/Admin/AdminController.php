<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\MailingList;
use App\Category;
use App\Subcategory;

class AdminController extends Controller
{
	public function showProducts()
	{
		$products = Product::paginate(15);
		$categories = Category::all();
		$subcategories = Subcategory::all();

		return view('admin.products')
					->with('products', $products)
					->with('categories', $categories)
					->with('subcategories', $subcategories);
	}

	public function showCustomers()
	{
		$customers = User::paginate(20);

		return view('admin.customers')
					->with('customers', $customers);
	}

	public function showMailList()
	{
		$mailingList = MailingList::paginate(20);

		return view('admin.mailingList')
					->with('mailingList', $mailingList);
	}

	public function getCustomer($id)
	{
		$customer = User::find($id);

		return response(json_encode($customer));
	}

	public function addMailingList(Request $request, $id = null)
	{
		$request->validate([
			'mailList' => 'required|email'
		]);

		$subscriber = new MailingList;

		if ($id) {
			$user = User::find($id);
			$isSubscribed = MailingList::where('user_id', $user->id)->first();
			if ($isSubscribed) {
				$isSubscribed->mailList = $request->input('mailList');
				$isSubscribed->save();

				return back()->with('session_code', 'mailUpdate');
			}

			$subscriber->user_id = $user->id;
			$subscriber->mailList = $request->input('mailList');
			$user->mailList()->save($subscriber);

			return back()->with('session_code', 'mailSubscribed');
		}

		$subscriber->mailList = $request->input('mailList');
		$subscriber->save();

		return back()->with('session_code', 'mailSubscribed');
	}

	public function deleteMail($id)
	{
		$mail = MailingList::find($id);
		$mail->delete();

		return back()->with('session_code', 'deleteMail');
	}
}
