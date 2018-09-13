<?php

namespace App\Http\Composers;

use App\Award;
use App\Gallery;
use App\Page;
use App\Reviews;
use App\Setting;
use Hamcrest\Core\Set;
use Illuminate\Contracts\View\View;
use App\Room;
use App\Review;
class BackendComposer
{
    public function navBar(View $view)
    {
        $view->with('reviews',
            $reviews = Review::where('status','=', 0)->get());
    }

}