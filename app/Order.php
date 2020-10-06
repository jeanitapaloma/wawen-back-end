<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function scopeStatus($query,$status)
    {
        return $query->where('status',$status);
    }

   public function products()
   {
       return $this->belongsToMany(Product::class,'order_product_details')
                    ->withPivot('sub_quantity', 'sub_total');
   }


}
