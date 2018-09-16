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
class FrontendComposer
{
  public function partners(View $view)
  {
    $view->with('partners',
      $partners = Partner::all());
  }

  public function menus( View $view)
  {
    // $view->with('pcategories',
    //   PageCategory::all());   	
  }

  public function trekRegions( View $view)
  {
    // $category = TourCategory::where('slug','=','trekking')->first();
    // $tours = $category->tours()->with('region')->get(['region_id']);
    // $regions = $tours->pluck('region')->unique();
    // $view->with('tregions',$regions);     
  }

  public function climbRegions( View $view)
  {
    // $category = TourCategory::where('slug','=','climbing')->first();
    // $tours = $category->tours()->with('region')->get(['region_id']);
    // $regions = $tours->pluck('region')->unique();
    // $view->with('cregions',$regions);     
  }  

  public function skis( View $view)
  {
    // $category = TourCategory::where('slug','=','ski')->first();
    // $tours = $category->tours()->with('region')->get(['region_id']);
    // $regions = $tours->pluck('region')->unique();
    // $view->with('skis',$regions);     
  }  

  public function tours( View $view)
  {
    // $category = TourCategory::where('slug','=','ski')->first();
    // $tours = $category->tours()->with('region')->get(['region_id']);
    // $regions = $tours->pluck('region')->unique();
    // $view->with('tours',$regions);     
  }   
  public function countries( View $view)
  {
    $countries = Country::all();
    $view->with('fcountries',$countries);     
  } 

  public function pages( View $view)
  {
    $pages = Page::where('status',1)->get();
    $view->with('fpages',$pages);     
  }  

  public function activity( View $view)
  {
    $activity = TourCategory::all();
    $view->with('factivities',$activity);     
  }    

  public function contact(View $view)
  {
    $contact = ContactDetail::first();
    $view->with('fcontact', $contact);
  }
}