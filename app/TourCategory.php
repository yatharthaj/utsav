<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class TourCategory extends Model
{
    protected $table = 'tour_categories';
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function tours()
    {
        return $this->hasMany('App\Tour', 'category_id');
    }
}
