<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfileController extends Controller
{
	public function showProfile()
	{
		return view('users.profile');
	}

	public function editInfo(Request $request, $id)
	{
		$user = User::find($id);
		$user->name = $request->input('name');
		$user->firstname = $request->input('firstname');
		$user->lastname = $request->input('lastname');
		$user->email = $request->input('email');
		$user->bday = $request->input('bday');
		$user->phone = $request->input('phone');
		$user->save();

		return back()->with('session_code', 'infoUpdate');
	}

	public function editAddress(Request $request, $id)
	{
		$user = User::find($id);
		$user->address = $request->input('address');
		$user->save();

		return back()->with('session_code', 'addressUpdate');
	}
}
