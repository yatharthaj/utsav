<?php

namespace App\Http\Controllers;

use App\MonthTrip;
use Illuminate\Http\Request;
use Session;
use App\Tour;

class MonthTripController extends Controller
{
    function __construct()
    {
        $this->tours = Tour::where('status', 1)->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monthTrip = MonthTrip::first();
        return view('backend.tour.trip-of-the-month.index')
            ->withTours($this->tours)
            ->withMonth($monthTrip);
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
//        dd($request->all());
        $monthTrip = MonthTrip::first();
        if (!empty($monthTrip)){
            $monthTrip->delete();
        }
        $month = new MonthTrip;
        $month->tour_id = $request->tour;
        $month->save();

        Session::flash('success', 'Tour set as trip of the month.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MonthTrip  $monthTrip
     * @return \Illuminate\Http\Response
     */
    public function show(MonthTrip $monthTrip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MonthTrip  $monthTrip
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthTrip $monthTrip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MonthTrip  $monthTrip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonthTrip $monthTrip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MonthTrip  $monthTrip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $monthTrip = MonthTrip::find($id);
        $monthTrip->delete();
        Session::flash('success', 'Tour removed from trip of the month');
        return redirect()->back();
    }
}
