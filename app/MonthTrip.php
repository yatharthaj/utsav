<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthTrip extends Model
{
    public function tour() //Works perfectly
    {
        return $this->belongsTo('App\Tour');
    }
}
