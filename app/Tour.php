<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Intervention\Image\Facades\Image;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
class Tour extends Model
{
    protected $table = 'tours';
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo('App\TourCategory', 'category_id');
    }

    public function meal() //Works perfectly
    {
        return $this->belongsTo('App\Meal');
    }

    public function group() //Works perfectly
    {
        return $this->belongsTo('App\Group');
    }

    public function difficulty() //Works perfectly
    {
        return $this->belongsTo('App\Difficulty');
    }

    public function locationStart()
    {
        return $this->belongsTo('App\Location', 'start', 'id');
    }

    public function locationEnd()
    {
        return $this->belongsTo('App\Location', 'end', 'id');
    }

    public function country()  //Works perfectly
    {
        return $this->belongsTo('App\Country');
    }

    public function region()  //Works perfectly
    {
        return $this->belongsTo('App\Region');
    }

    public function accommodation() //Works perfectly
    {
        return $this->belongsTo('App\Accommodation');
    }

    public function slides()
    {
        return $this->belongsToMany('App\Media','media_tour', 'tour_id', 'media_id');
    }

    public function includes()
    {
        return $this->belongsToMany('App\Included','includes_tour', 'tour_id', 'included_id');
    }

    public function excludes()
    {
        return $this->belongsToMany('App\Excluded','excludes_tour', 'tour_id', 'excluded_id');
    }

    public function itinerary()
    {
        return $this->hasMany('App\Itinerary', 'tour_id')->orderBy('day', 'asc');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review')->orderBy('created_at','desc')->limit(1);
    }

    public function recalculateRating($rating)
    {
        $reviews = $this->reviews()->approved();
        $avgRating = $reviews->avg('rating');
        $this->rating_cache = round($avgRating,1);
        $this->rating_count = $reviews->count();
        $this->save();
    }

    public function departure()
    {
        return $this->hasMany('App\Departure', 'tour_id');
    }

    public static function  uploadImage($path, $image,$width,$height)
    {
        $filename = time() .'.'. $image->getClientOriginalExtension();
        $location = $path . $filename;
        Image::make($image)->fit($width, $height)->save($location);
        ImageOptimizer::optimize($location);
        return $location;
    }

    public function monthTrip()
    {
        return $this->hasOne('App\MonthTrip');
    }

    public function featuredImage()
    {
        return $this->hasOne('App\FeaturedImage');
    }
}
