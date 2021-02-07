<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Order extends Model
{
	protected $fillable = [
        'shipping', 'total', 'payment', 'proof'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function products()
    {
    	return $this->belongsToMany(Product::class)->withPivot('qty', 'total');;
    }
}
