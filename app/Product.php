<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model

{

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the product's image.
     */
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product_details')
                    ->withPivot('sub_quantity', 'sub_total');
    }

    public function cart()
    {
        return $this->belongsToMany(Cart::class);
    }
}
