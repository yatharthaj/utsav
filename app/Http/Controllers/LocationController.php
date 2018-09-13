<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Session;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Location::all();
        return view('backend.tour.location.index')
            ->withPlaces($places);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        $group = new Location();
        $group->name = $request->name;
        $group->save();
        Session::flash('success', 'New place added sucessfully.');
        return redirect()->route('locations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Location $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:244',
        ]);
        $group = Location::find($request->id);
        $group->name = $request->name;

        $group->save();

        return response()->json($group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Location::findOrFail($id);
        $group->delete();
        return response()->json($group);
    }
}
