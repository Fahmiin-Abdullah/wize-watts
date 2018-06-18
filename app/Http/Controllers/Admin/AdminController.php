<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Order;
use App\MailingList;
use App\Category;
use App\Subcategory;
use App\Tag;

class AdminController extends Controller
{
	public function showProducts()
	{
		$products = Product::paginate(15);
		$categories = Category::all();
		$subcategories = Subcategory::all();
		$tags = Tag::all();

		return view('admin.products')
					->with('products', $products)
					->with('categories', $categories)
					->with('subcategories', $subcategories)
					->with('tags', $tags);
	}

	public function showCustomers()
	{
		$customers = User::paginate(20);
		$orders = Order::all();

		return view('admin.customers')
					->with('customers', $customers)
					->with('orders', $orders);
	}

	public function showOrders()
	{
		$orders = Order::orderByRaw("FIELD(status, 'Pending...', 'Processing...', 'Delivering...', 'Closed!', 'Error!')ASC")->paginate(20);

		return view('admin.orders')
					->with('orders', $orders);
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
		$orders = Order::where('user_id', $customer->id)->orderByRaw("FIELD(status, 'Pending...', 'Processing...', 'Delivering...', 'Closed!', 'Error!')ASC")->get();

		return response(json_encode($orders));
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
