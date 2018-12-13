<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturedImage extends Model
{
    protected $fillable = ['path','thumbnail'];
    public function tour()
    {
        return $this->belongsTo('App\Tour');
    }
}
