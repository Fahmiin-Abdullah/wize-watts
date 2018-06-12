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
}
