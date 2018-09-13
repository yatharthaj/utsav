<?php

namespace App\Http\Controllers;

use App\Itinerary;
use Illuminate\Http\Request;
use App\Tour;
use Session;

class ItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $tour = Tour::find($id);
        $itineraries = Itinerary::where('tour_id', '=', $id)
            ->orderBy('id', 'asc')->get();
        return view('backend.tour.itinerary.index')
            ->withTour($tour)
            ->withItineraries($itineraries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $this->validate($request, [
            'day' => 'required',
            'title' => 'required|max:255',
            'plan' => 'required'
        ]);

        $itinerary = new Itinerary;
        $itinerary->tour_id = $request->id;
        $itinerary->day = $request->day;
        $itinerary->title = ucfirst($request->title);
        $itinerary->plan = $request->plan;

        $itinerary->save();

        Session::flash('success', 'New plan added sucessfully.');
        return redirect()
            ->route('itinerary-create', $request->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Itinerary $itinerary
     * @return \Illuminate\Http\Response
     */
    public function show(Itinerary $itinerary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Itinerary $itinerary
     * @return \Illuminate\Http\Response
     */
    public function edit(Itinerary $itinerary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Itinerary $itinerary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Itinerary $itinerary)
    {
        $data = Itinerary::find($request->id);
        $data->day = $request->day;
        $data->title = $request->title;
        $data->plan = $request->plan;
        $data->save();

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Itinerary $itinerary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Itinerary $itinerary)
    {
        $itinerary->delete();

        Session::flash('success', 'Plan deleted sucessfully.');
        return redirect()
            ->route('itinerary-create',$request->id);
    }
}
