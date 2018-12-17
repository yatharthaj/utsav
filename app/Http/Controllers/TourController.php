<?php

namespace App\Http\Controllers;

use App\Accommodation;
use App\Country;
use App\Difficulty;
use App\Excluded;
use App\Group;
use App\Included;
use App\Location;
use App\Meal;
use App\Media;
use App\Region;
use App\Tour;
use App\TourCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use File;
use DB;
use Session;
use App\FeaturedImage;
class TourController extends Controller
{
    private $featured = "uploads/images/featured/";
    private $thumbnail = "uploads/images/featured/thumbnail";
    private $map = "uploads/images/map/";
    private $elevation = "uploads/images/altitude/";

    function __construct()
    {
        $this->categories = TourCategory::all();
        $this->regions = Region::all();
        $this->groups = Group::all();
        $this->medias = Media::all();
        $this->includes = Included::all();
        $this->excludes = Excluded::all();
        $this->countries = Country::all();
        $this->locations = Location::all();
        $this->meals = Meal::all();
        $this->accomodations = Accommodation::all();
        $this->difficulties = Difficulty::all();
        $this->includes = Included::all();
        $this->excludes = Excluded::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::all();
        return view('backend.tour.index')->withTours($tours);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tour.create')
            ->withCategories($this->categories)
            ->withRegions($this->regions)
            ->withGroups($this->groups)
            ->withmedias($this->medias)
            ->withIncludes($this->includes)
            ->withExcludes($this->excludes)
            ->withCountries($this->countries)
            ->withLocations($this->locations)
            ->withMeals($this->meals)
            ->withAccommodations($this->accomodations)
            ->withDifficulties($this->difficulties)
            ->withIncludes($this->includes)
            ->withExcludes($this->excludes)
            ->withMedias($this->medias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        try {
            $this->validate($request, [
                'title' => 'required|max:255',
                'days' => 'required|numeric|max:90',
                'price' => 'required|numeric',
                'price1' => 'sometimes',
                'price2' => 'sometimes',
                'altitude' => 'required|numeric',
                'difficulty' => 'required',
                'group' => 'required',
                'country' => 'required',
                'region' => 'sometimes',
                'accommodation' => 'required',
                'meal' => 'required',
                'start' => 'required',
                'end' => 'required',
                'includes'  => 'required|array|min:1',
                'excludes'  => 'required|array|min:1',
                'overview' => 'required',
                'mtitle' => 'required',
                'description' => 'required',
                'featured_image' => 'required|image|max:20000',
                'map' => 'sometimes|image|max:20000',
                'elevation' => 'sometimes|image|max:20000',
            ]);

            $tour = new Tour;
            $tour->title = $request->title;
            $tour->days = $request->days;
            $tour->price = $request->price;
            if (!empty($request->price1)) {
                $tour->price1 = $request->price1;
            }
            if (!empty($request->price2)) {
                $tour->price2 = $request->price2;
            }
            $tour->max_altitude = $request->altitude;
            $tour->difficulty_id = $request->difficulty;
            $tour->group_id = $request->group;

            $tour->country_id = $request->country;
            $tour->category_id = $request->category;
            if (!empty($request->region)) {
                $tour->region_id = $request->region;
            }
            $tour->accommodation_id = $request->accommodation;
            $tour->meal_id = $request->meal;

            $tour->start = $request->start;
            $tour->end = $request->end;

            if ($request->hasFile('map')) {
                if (!File::exists($this->map)) {
                    File::makeDirectory($this->map);
                }
                $tour->map = Tour::uploadImage($this->map, $request->file('map'), 370, 270);
            }

            if ($request->hasFile('elevation')) {
                if (!File::exists($this->elevation)) {
                    File::makeDirectory($this->elevation);
                }
                $tour->elevation = Tour::uploadImage($this->elevation, $request->file('elevation'), 370, 270);
            }
            $tour->status = $request->status;
            $tour->overview = $request->overview;
            $tour->mtitle = $request->mtitle;
            $tour->description = $request->description;

            $tour->save();
            if (isset($request->includes) ) {
                $tour->includes()->sync($request->includes, false);
            }

            if (isset($request->excludes)) {
                $tour->excludes()->sync($request->excludes, false);
            }

            if (isset($request->slides)) {
                $tour->slides()->sync($request->slides, false);
            }

            if ($request->hasFile('featured_image')) {
                if (!File::exists($this->featured)) {
                    // File::makeDirectory(public_path().'/'.$path,0777,true);
                    File::makeDirectory($this->featured,0777,true);
                }

                $tour->featuredImage()->save(new FeaturedImage([
                    'thumbnail' => Tour::uploadImage($this->thumbnail, $request->file('featured_image'), 960, 720),
                    'path' => Tour::uploadImage($this->featured, $request->file('featured_image'), 960, 720)
                ]));
            }

        } catch (QueryException $e) {
            DB::rollback();
            return $e->getMessage();
        }
        Session::flash('success', 'Tour created sucessfully !');
        return redirect()->route('tour.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tour $tour
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tour $tour
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour)
    {
        return view('backend.tour.edit')
            ->withCategories($this->categories)
            ->withRegions($this->regions)
            ->withGroups($this->groups)
            ->withmedias($this->medias)
            ->withIncludes($this->includes)
            ->withExcludes($this->excludes)
            ->withCountries($this->countries)
            ->withLocations($this->locations)
            ->withMeals($this->meals)
            ->withAccommodations($this->accomodations)
            ->withDifficulties($this->difficulties)
            ->withIncludes($this->includes)
            ->withExcludes($this->excludes)
            ->withMedias($this->medias)
            ->withTour($tour);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Tour $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tour $tour)
    {
        try {
            $this->validate($request, [
                'title' => 'required|max:255',
                'days' => 'required|numeric|max:90',
                'price' => 'required|numeric',
                'price1' => 'sometimes|numeric',
                'price2' => 'sometimes|numeric',
                'max_altitude' => 'required|numeric',
                'difficulty' => 'required',
                'group' => 'required',
                'country' => 'required',
                'region' => 'sometimes',
                'accommodation' => 'required',
                'meal' => 'required',
                'start' => 'required',
                'end' => 'required',
                'includes'  => 'required|array|min:1',
                'excludes'  => 'required|array|min:1',
                'overview' => 'required',
                'mtitle' => 'required',
                'description' => 'required',
                'featured_image' => 'sometimes|image|max:20000',
                'map' => 'sometimes|image|max:20000',
                'elevation' => 'sometimes|image|max:20000',
            ]);

            $tour->title = $request->title;
            $tour->days = $request->days;
            $tour->price = $request->price;
            if (!empty($request->price1)) {
                $tour->price1 = $request->price1;
            }
            if (!empty($request->price2)) {
                $tour->price2 = $request->price2;
            }
            $tour->max_altitude = $request->max_altitude;
            $tour->difficulty_id = $request->difficulty;
            $tour->group_id = $request->group;

            $tour->country_id = $request->country;
            $tour->category_id = $request->category;
            if (!empty($request->region)) {
                $tour->region_id = $request->region;
            }
            $tour->accommodation_id = $request->accommodation;
            $tour->meal_id = $request->meal;

            $tour->start = $request->start;
            $tour->end = $request->end;

            if ($request->hasFile('featured_image')) {
                if (!File::exists($this->featured)) {
                    File::makeDirectory($this->featured);
                }
                $oldPath = $tour->featuredImage->path;
                $oldThumb = $tour->featuredImage->thumbnail;

                $featuredImage = $tour->featuredImage;
                $featuredImage->path = Tour::uploadImage($this->featured, $request->file('featured_image'), 960, 720);
                $featuredImage->thumbnail = Tour::uploadImage($this->featured, $request->file('featured_image'),960, 640);
                $tour->featuredImage()->save($featuredImage);

                File::delete(public_path($oldPath));
                File::delete(public_path($oldThumb));
            }

            if ($request->hasFile('map')) {
                if (!File::exists($this->map)) {
                    File::makeDirectory($this->map);
                }
                $oldMap = $tour->map;
                $tour->map = Tour::uploadImage($this->map, $request->file('map'), 370, 270);
                File::delete(public_path($oldMap));
            }

            if ($request->hasFile('elevation')) {
                if (!File::exists($this->elevation)) {
                    File::makeDirectory($this->elevation);
                }
                $oldElevation = $tour->elevation;
                $tour->elevation = Tour::uploadImage($this->elevation, $request->file('elevation'), 370, 270);
                File::delete(public_path($oldElevation));
            }
            $tour->status = $request->status;
            $tour->overview = $request->overview;
            $tour->mtitle = $request->mtitle;
            $tour->description = $request->description;

            $tour->save();
            if (isset($request->includes) ) {
                $tour->includes()->sync($request->includes);
            }

            if (isset($request->excludes)) {
                $tour->excludes()->sync($request->excludes);
            }

            if (isset($request->slides)) {
                $tour->slides()->sync($request->slides);
            }

        } catch (QueryException $e) {
            DB::rollback();
            return $e->getMessage();
        }
        Session::flash('success', 'Tour created sucessfully !');
        return redirect()->route('tour.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tour $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {

        File::delete(public_path($tour->path));
        File::delete(public_path($tour->banner));
        $tour->slides()->detach();

        if ($test = $tour->includes()->count() != null) {
            $tour->includes()->detach();
        }
        if ($test = $tour->excludes()->count() != null) {
            $tour->excludes()->detach();
        }

        $tour->delete();

        Session::flash('success', 'Tour deleted sucessfully !');
        return redirect()
            ->route('tour.index');
    }

    public function publish($id)
    {
        DB::table('tours')
            ->where('id', $id)
            ->update(['status' => 1]);
        Session::flash('success', 'Tour set as published!');
        return redirect()
            ->route('tour.index');
    }

    public function unpublish($id)
    {
        DB::table('tours')
            ->where('id', $id)
            ->update(['status' => 0]);
        Session::flash('success', 'Tour set as published!');
        return redirect()
            ->route('tour.index');
    }

    public function setAsfeatured($id){
        DB::table('tours')
            ->where('id', $id)
            ->update(['featured' => 1]);

        Session::flash('success', 'Tour set as unpublished!');
        return redirect()
            ->route('tour.index');
    }

    public function removeAsfeatured($id)
    {
        DB::table('tours')
            ->where('id', $id)
            ->update(['featured' => 0]);

        Session::flash('success', 'Tour removed from featured list sucessfully !');
        return redirect()
            ->route('tour.index');

    }

    public  function  featuredTours()
    {
        $tours= Tour::where('featured',1)->get();
         return view('backend.tour.featured')->withTours($tours);
    }
}
