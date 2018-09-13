<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function tours()
    {
        return $this->hasMany('App\Tour');
    }
}
