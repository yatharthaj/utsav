<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    public function tour()
    {
        return $this->belongsTo('App\Tour', 'tour_id');
    }

}
