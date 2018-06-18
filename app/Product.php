<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class Product extends Model implements Buyable
{
	public function reviews()
	{
		return $this->hasMany('App\Review');
	}

	public function favorites()
	{
		return $this->hasMany('App\Favorite');
	}

	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function subcategory()
	{
		return $this->belongsTo('App\Subcategory');
	}

	public function orders()
	{
		return $this->belongsToMany('App\Order');
	}

	public function tags()
	{
		return $this->belongsToMany('App\Tag');
	}



	// SHOPPING CART BUYABLES
	public function getBuyableIdentifier($options = NULL){
        return $this->id;
    }

    public function getBuyableDescription($options = NULL){
        return $this->name;
    }

    public function getBuyablePrice($options = NULL){
        return $this->pricing;
    }

    public function getBuyableShipping($options = NULL){
    	return $this->shipping;
    }
}
