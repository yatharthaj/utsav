<?php

namespace App\Http\Controllers;

use App\Departure;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Session;
use DB;
use App\Tour;

class DepartureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$collection = Departure::distinct()->select('tour_id')->get();
    	$departures = $collection->unique();
    	return view('backend.tour.departure.index')->withDepartures($departures);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$tours = Tour::where('status', '=', 1)->get();
    	return view('backend.tour.departure.create')->withTours($tours);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if (strtotime($request->start) < strtotime($request->end)) {
                foreach ($request->tours as $id) {
                    $start = $request->start;
                    $end = $request->end;
                    $tour = Tour::find($id);
                    date_default_timezone_set('Asia/Kathmandu');
                    while (strtotime($start) <= strtotime($end)) {
                        $slot = explode('-', $request->slot);
                        $departure = new Departure;
                        $departure->tour_id = $tour->id;
                        $departure->start = $start;
                        $departure->end = date("Y-m-d", strtotime("+" . $tour->days . " days", strtotime($start)));
                        $departure->slot = rand($slot[0], $slot[1]);
                        $departure->price = $tour->price;
                        $departure->save();
                        $start = date("Y-m-d", strtotime("+" . $request->gap . " days", strtotime($start)));
                    }
                }
            }
            else{
                Session::flash('danger', 'End date must be greater than start date. ');
                return redirect()->back();
            }
        } catch (QueryException $e) {
            return $e->getMessage();
        }
        Session::flash('success', 'Departure dates created with success.');
        return redirect()->route('departure.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departure $departure
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$tour = Tour::find($id);
    	return view('backend.tour.departure.show')->withTour($tour);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departure $departure
     * @return \Illuminate\Http\Response
     */
    public function edit(Departure $departure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Departure $departure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departure $departure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departure $departure
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$departure = Departure::findOrFail($id);
    	$departure->delete();
    	return response()->json($departure);
    }
}
