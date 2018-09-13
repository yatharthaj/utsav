<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
class Media extends Model
{
    protected $fillable = ['path','thumb','name'];

    public function tours()
    {
        return $this->belongsToMany('App\Tour');
    }

    public static function  uploadImage($path, $image,$width,$height)
    {
        $filename = time() .'.'. $image->getClientOriginalExtension();
        $location = $path . $filename;
        Image::make($image)->resize($width, $height)->save($location);
        ImageOptimizer::optimize($location);
        return $location;
    }
}
