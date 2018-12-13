<?php

namespace App\Http\Composers;

// use Hamcrest\Core\Set;
use Illuminate\Contracts\View\View;
use App\Partner;
use App\PageCategory;
use App\ContactDetail;
use App\TourCategory;
use App\Region;
use App\Country;
use App\Page;
use App\Tour;

class FrontendComposer
{
    public function partners(View $view)
    {
        $view->with('partners',
            $partners = Partner::all());
    }

    public function menus(View $view)
    {
        $view->with('pcategories',
            PageCategory::all());
    }

    public function trekRegions(View $view)
    {
        $treks = Tour::whereHas('category', function ($q) {
            $q->where('tour_categories.slug', '=', 'trekking');
        })->where('status',1)->orderBy('title', 'asc')->get();
//      $regions = Region::whereHas('tours', function ($tourQuery) {
//          $tourQuery->whereHas('category', function ($categoryQuery) {
//              $categoryQuery->where('name', 'trekking');
//          });
//      }) // filter to match your requirements.
//      ->with([
//          'tours' => function ($toursQuery) {
//              $toursQuery->where('status', 1)->whereHas('category', function ($categoryQuery) {
//                  $categoryQuery->where('name', 'trekking');
//              });
//          }
//      ]) // load matching tours.
//      ->get();

        $view->with('treks', $treks);
    }

    public function climbRegions(View $view)
    {
        $climb = Tour::whereHas('category', function ($q) {
            $q->where('tour_categories.slug', '=', 'climbing');
        })->where('status',1)->orderBy('title', 'asc')->get();
//      $regions = Region::whereHas('tours', function ($tourQuery) {
//          $tourQuery->where('status', 1)->whereHas('category', function ($categoryQuery) {
//              $categoryQuery->where('name', 'climbing');
//          });
//      }) // filter to match your requirements.
//      ->with([
//          'tours' => function ($toursQuery) {
//              $toursQuery->whereHas('category', function ($categoryQuery) {
//                  $categoryQuery->where('name', 'climbing');
//              });
//          }
//      ]) // load matching tours.
//      ->get();
        $view->with('climbs', $climb);
    }

    public function skis(View $view)
    {
        $ski = Tour::whereHas('category', function ($q) {
            $q->where('tour_categories.slug', '=', 'ski');
        })->where('status',1)->orderBy('max_altitude', 'desc')->get();
//      $regions = Region::whereHas('tours', function ($tourQuery) {
//          $tourQuery->where('status', 1)->whereHas('category', function ($categoryQuery) {
//              $categoryQuery->where('name', 'ski');
//          });
//      }) // filter to match your requirements.
//      ->with([
//          'tours' => function ($toursQuery) {
//              $toursQuery->whereHas('category', function ($categoryQuery) {
//                  $categoryQuery->where('name', 'ski');
//              });
//          }
//      ]) // load matching tours.
//      ->get();
        $view->with('skis', $ski);
    }
    public function heliSki(View $view)
    {
        $heliSki = Tour::whereHas('category', function ($q) {
            $q->where('tour_categories.slug', '=', 'heli-ski');
        })->where('status',1)->orderBy('max_altitude', 'desc')->get();
//      $regions = Region::whereHas('tours', function ($tourQuery) {
//          $tourQuery->where('status', 1)->whereHas('category', function ($categoryQuery) {
//              $categoryQuery->where('name', 'ski');
//          });
//      }) // filter to match your requirements.
//      ->with([
//          'tours' => function ($toursQuery) {
//              $toursQuery->whereHas('category', function ($categoryQuery) {
//                  $categoryQuery->where('name', 'ski');
//              });
//          }
//      ]) // load matching tours.
//      ->get();
        $view->with('heliSkis', $heliSki);
    }
    public function tours(View $view)
    {
        $weeks = Tour::whereHas('category', function ($r) {
            $r->where('tour_categories.slug', 'weekend-tour');
        })->where('status',1)->get();
        $cultures = Tour::whereHas('category', function ($r) {
            $r->where('tour_categories.slug', 'cultural-tour');
        })->where('status',1)->get();
//      $packages = Tour:: all();
        $view->withWeeks($weeks)->withCultures($cultures);
    }

    public function countries(View $view)
    {
        $countries = Country::all();
        $view->with('fcountries', $countries);
    }

    public function pages(View $view)
    {
        $pages = Page::where('status', 1)->get();
        $view->with('fpages', $pages);
    }

    public function activity(View $view)
    {
        $activity = TourCategory::all();
        $view->with('factivities', $activity);
    }

    public function contact(View $view)
    {
        $contact = ContactDetail::first();
        $view->with('fcontact', $contact);
    }
}