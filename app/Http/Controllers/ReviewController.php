<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Review;
use Auth;

class ReviewController extends Controller
{
    public function writeReview(Request $request, $id)
    {
    	$request->validate([
    		'title' => 'required|max:199',
    		'body' => 'required'
    	]);

    	$product = Product::find($id);
    	$review = new Review;
    	$user = Auth::user();
    	$review->user_id = $user->id;
    	$review->title = $request->input('title');
    	$review->body = $request->input('body');
    	$product->reviews()->save($review);

    	return back()->with('session_code', 'reviewSuccess');
    }

    public function editReview(Request $request, $id)
    {
    	$request->validate([
    		'title' => 'required|max:199',
    		'body' => 'required'
    	]);

    	$review = Review::find($id);
    	$review->title = $request->input('title');
    	$review->body = $request->input('body');
    	$review->save();

    	return back()->with('session_code', 'editReview');
    }

    public function deleteReview($id)
    {
    	$review = Review::find($id);
    	$review->delete();

    	return back()->with('session_code', 'deleteReview');
    }
}
