<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    public $timestamps = false;
    public function tour()
    {
        return $this->belongsTo('App\Tour', 'tour_id');
    }

    public function scopeFixedDates($query, $id,$month, $year)
    {
        return $query->where('tour_id', '=' , $id )
            -> whereMonth('start','=',$month)
            ->whereYear('start', '=' , $year);
    }
//    public function scopeUpdatePrice($query, $id, $price)
//    {
//        return $query->where('tour_id', '=' , $id )
//            ->update(['price' => $price]);
//    }
}
