<?php

namespace App\Http\Controllers;

use App\Departure;
use Illuminate\Http\Request;
use App\Tour;
use App\MonthTrip;
use App\Review;
use App\Offer;
use App\Page;
use App\TourCategory;
use App\ContactDetail;

class GetFrontendController extends Controller
{
    public function getIndex()
    {
        $tours = Tour::where('status', 1)->where('featured', 1)->limit(6)->get();
        $month = MonthTrip::first();
        $offer = Offer::first();
        $categories = TourCategory::all();
        return view('frontend.index')
        ->withTours($tours)
        ->withOffer($offer)
        ->withMonth($month)
        ->withCategories($categories);
    }

    public function tourDetail($slug)
    {
        $tour = Tour::where('slug', $slug)->first();
        $departures = $tour->departure()->FixedDates($tour->id, date('m'), date('Y'))->get();

        $similars = Tour::whereHas('category', function ($r) use ($tour) {
            $r->where('tour_categories.name', '=', $tour->category->name);
        })
            ->orderByRaw('RAND()')
            ->take(4)
            ->get();

        return view('frontend.tour.detail')
        ->withTour($tour)
        ->withDepartures($departures)
        ->withSimilars($similars);
    }

    public function ajaxsearchdeparture(Request $request){
        $tour = Tour::find($request->tour_id);
        $departures = Departure::where('tour_id','=',$request->tour_id)
        ->whereMonth('start','=',$request->month)
        ->whereYear('start','=',$request->year)
        ->get();

        return view('frontend.tour.dates',compact('departures','tour'));
    }

    public function getContact()
    {
        $contact = ContactDetail::first();
        return view('frontend.contact')->withContact($contact);
    }

    public function getPage($pcatslug,$pslug)
    {
        $datas = Page::whereHas('category', function ($r) use ($pcatslug) {
            $r->where('page_categories.slug', '=', $pcatslug);
        })->where('slug','=', $pslug)->first();
        return view('frontend.page')->withDatas($datas);
    }

    // public function getChildpage($slug)
    // {
    //     $datas = Page::where('slug','=', $slug)->first();
    //     return view('frontend.page')->withDatas($datas);
    // }  
    public function bookStep1($slug)
    {
        $tour=Tour::where('slug','=', $slug)->first();
        return view('frontend.book.book-step1')->withTour($tour);
    }      

    public function bookStep2(Request $request)
    {
        $tour=Tour::where('id',$request->tour_id)->first();
        return view('frontend.book.book-step2')
        ->withRequest($request)
        ->withTour($tour);
    }        

    public function joinStep1(Request $request,$slug)
    {
        // dd($request->all());
        $tour=Tour::where('slug','=', $slug)->first();
        return view('frontend.book.join-step1')
        ->withTour($tour)
        ->withRequest($request);
    }   

    public function joinStep2(Request $request)
    {
        // dd($request->all());
        $tour=Tour::where('id',$request->tour_id)->first();
        return view('frontend.book.join-step2')
        ->withRequest($request)
        ->withTour($tour);
    } 
}
