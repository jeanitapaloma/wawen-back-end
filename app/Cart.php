<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'account_id','id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps()
                ->withPivot('sub_quantity', 'sub_total');;
    }
}
