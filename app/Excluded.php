<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excluded extends Model
{
    public function tours()
    {
        return $this->belongsToMany('App\Tour');
    }
}
