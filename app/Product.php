<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class Product extends Model implements Buyable
{
	public function reviews()
	{
		return $this->hasMany(Review::class);
	}

	public function favorites()
	{
		return $this->hasMany(Favorite::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function subcategory()
	{
		return $this->belongsTo(Subcategory::class);
	}

	public function orders()
	{
		return $this->belongsToMany(Order::class);
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
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
