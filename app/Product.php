<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
}
