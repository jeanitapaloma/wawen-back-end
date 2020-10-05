<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $guarded = [];

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}
