<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function user()
    {
        return $this->belognsTo('App\User');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}