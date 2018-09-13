<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
    public function tour()
    {
        return $this->hasMany('App\Tour');
    }
}
