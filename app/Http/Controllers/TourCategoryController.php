<?php

namespace App\Http\Controllers;

use App\TourCategory;
use Session;
use File;
use Image;
use Illuminate\Http\Request;

class TourCategoryController extends Controller
{
    private $path = "uploads/images/tour-category/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = TourCategory::all();
        return view('backend.tour.category.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:255',
            'image'=> 'required'
        ));
        $categories = new TourCategory();
        $categories->name = $request->name;
        if($request->hasFile('image')){
            if (!File::exists($this->path)) {
                File::makeDirectory($this->path);
            }
            $image = $request->file('image');
            $filename = 'thumb'.time().'.'.$image->getClientOriginalExtension();
            $location = $this->path.$filename;
            Image::make($image)->resize(170, 165)->save($location);
            $categories->path = $location;
        }        
        $categories->save();
        Session::flash('success', 'New item added sucessfully.');
        return redirect()->route('tour-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TourCategory  $tourCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TourCategory $tourCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TourCategory  $tourCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(TourCategory $tourCategory)
    {
        return view('backend.tour.category.edit')->withCategory($tourCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TourCategory  $tourCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:244',
            'image' => 'sometimes'
        ]);

        $category = TourCategory::find($request->id);
        $category->name = $request->name;
        if($request->hasFile('image')){
            if (!File::exists($this->path)) {
                File::makeDirectory($this->path);
            }
            $oldImage = $category->path;
            $image = $request->file('image');
            $filename = 'thumb'.time().'.'.$image->getClientOriginalExtension();
            $location = $this->path.$filename;
            Image::make($image)->resize(170, 165)->save($location);
            $category->path = $location;
            File::delete(public_path($oldImage));
        } 
        $category->save();

        return redirect()->route('tour-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TourCategory  $tourCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pageCategory = TourCategory::findOrFail($id);
        $pageCategory->delete();
        return response()->json($pageCategory);
    }
}
