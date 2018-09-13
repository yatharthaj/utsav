<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    // public function parent() {
    //     return $this->belongsTo('App\Page', 'parent_id');
    // }

    // public function child() {
    //     return $this->hasMany('App\Page', 'parent_id');
    // }

    public function category() 
    {
        return $this->belongsTo('App\PageCategory','category_id', 'id');
    }
}
