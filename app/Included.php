<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Included extends Model
{
    public function tours()
    {
        return $this->belongsToMany('App\Tour');
    }
}
