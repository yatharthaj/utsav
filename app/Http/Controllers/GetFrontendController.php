<?php

namespace App\Http\Controllers;

use App\Departure;
use App\Insta;
use App\Partner;
use Illuminate\Http\Request;
use App\Tour;
use App\MonthTrip;
use App\Carousel;
use App\Review;
use App\Offer;
use App\Page;
use App\TourCategory;
use App\ContactDetail;
use App\Team;
use App\Itinerary;
use Vinkla\Instagram\Instagram;

class GetFrontendController extends Controller
{
    public function getIndex()
    {
        $slides = Carousel::where('status', 1)->get();
        $tours = Tour::where('status', 1)->where('featured', 1)->limit(6)->get();
        $month = MonthTrip::first();
        $offer = Offer::firstOrFail();
        $categories = TourCategory::all();
        $instaPosts = Insta::take(6)->get();
        $partners = Partner::all();
        return view('frontend.index')
        ->withFeatured($tours)
        ->withOffer($offer)
        ->withMonth($month)
        ->withCategories($categories)
        ->withSlides($slides)
        ->withFeeds($instaPosts)
        ->withPartners($partners);
    }

    public function tourDetail($slug)
    {
        $tour = Tour::where('slug', $slug)->first();
        $itineraries = Itinerary::where('tour_id','=', $tour->id)
        ->orderBy('id', 'asc')->get();
        $departures = $tour->departure()->FixedDates($tour->id, date('m'), date('Y'))->get();

//        $similars = Tour::whereHas('category', function ($r) use ($tour) {
//            $r->where('tour_categories.name', '=', $tour->category->name);
//        })
//            ->orderByRaw('RAND()')
//            ->take(4)
//            ->get();
//        dd($tour);
        return view('frontend.tour.detail')
        ->withTour($tour)
        ->withItineraries($itineraries)
        ->withDepartures($departures);
    }

    public function ajaxsearchdeparture(Request $request)
    {
        $tour = Tour::find($request->tour_id);
        $departures = Departure::where('tour_id', '=', $request->tour_id)
        ->whereMonth('start', '=', $request->month)
        ->whereYear('start', '=', $request->year)
        ->get();

        return view('frontend.tour.dates', compact('departures', 'tour'));
    }

    public function getContact()
    {
        $contact = ContactDetail::first();
        return view('frontend.contact')->withContact($contact);
    }

    public function getPage($pcatslug, $pslug)
    {
        $datas = Page::whereHas('category', function ($r) use ($pcatslug) {
            $r->where('page_categories.slug', '=', $pcatslug);
        })->where('slug', '=', $pslug)->first();
        return view('frontend.page')->withDatas($datas);
    }

    // public function getChildpage($slug)
    // {
    //     $datas = Page::where('slug','=', $slug)->first();
    //     return view('frontend.page')->withDatas($datas);
    // }
    public function bookStep1($slug)
    {
        $tour = Tour::where('slug', '=', $slug)->first();
        return view('frontend.book.book-step1')->withTour($tour);
    }

    public function bookStep2(Request $request)
    {
        $tour = Tour::where('id', $request->tour_id)->first();
        return view('frontend.book.book-step2')
        ->withRequest($request)
        ->withTour($tour);
    }

    public function joinStep1(Request $request, $slug)
    {
        // dd($request->all());
        $tour = Tour::where('slug', '=', $slug)->first();
        return view('frontend.book.join-step1')
        ->withTour($tour)
        ->withRequest($request);
    }

    public function joinStep2(Request $request)
    {
        $tour = Tour::where('id', $request->tour_id)->first();
        return view('frontend.book.join-step2')
        ->withRequest($request)
        ->withTour($tour);
    }

    public function team()
    {
        $members = Team::orderBy('id','asc')->get();
        return view('frontend.team')
        ->withMembers($members);
    }

    public function templateAbout()
    {
        return view('frontend.page');
    }

    public function instagram()
    {
       $instafeeds = new Instagram('5365129520.1677ed0.9a5ea6d9ae654821a210484962ecc42c');
       $posts = $instafeeds->media();

    // $fromDBs = Insta::orderBy('id', 'desc')->take(20)->get(); //get last 20 rows from table
    foreach( $posts as $post)
    {
        // dd($post->images->low_resolution->url);
        Insta::firstOrCreate([
            'thumb' => $post->images->low_resolution->url,
            'link' => $post->link
        ]);

    }
         //    foreach ($feeds as $feed) {
         //     $instagram = new Insta;
         //     $instagram->link = $feed->images->standard_resolution->url;
         //     $instagram->caption = $feed->caption->text;
         //     $instagram->save();
         // }
    return 'Done';
}
}
