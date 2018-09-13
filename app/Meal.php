<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public function tour()
    {
        return $this->hasMany('App\Tour');
    }
}
