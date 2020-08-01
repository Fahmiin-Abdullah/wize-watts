<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function mailList()
    {
        return $this->hasOne(MailingList::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function role()
    {
        return $this->hasOne(Role::class);
    }

    /** Methods */
    public function addFavorite(Product $product)
    {
        return $this->favorites()->save(
            new Favorite(['product_id' => $product->id])
        );
    }

    public function isFavorite(Product $product)
    {
        return Favorite::where('user_id', $this->id)
            ->where('product_id', $product->id)
            ->exists();
    }

    public function removeFavorite(Product $product)
    {
        return Favorite::where('user_id', $this->id)
            ->where('product_id', $product->id)
            ->delete();
    }
}
