<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function showMain()
    {
    	$user = Auth::user();

    	return view('main')->with('user', $user);
    }
}
