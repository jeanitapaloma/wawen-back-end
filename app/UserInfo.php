<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'account_details';
    protected $primaryKey = 'account_id';

    public function user()
    {
        return $this->belongsTo(User::class,'account_id','id');
    }
}
