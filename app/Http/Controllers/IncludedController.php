<?php

namespace App\Http\Controllers;

use App\Included;
use Illuminate\Http\Request;
use Session;

class IncludedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $includeds = Included::all();
        return view('backend.tour.includes.index')->withIncludeds($includeds);
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
            'name' => 'required|max:255'
        ));
        $includes = new Included();
        $includes->name = $request->name;
        $includes->save();
        Session::flash('success', 'New item added sucessfully.');
        return redirect()->route('includes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Included  $included
     * @return \Illuminate\Http\Response
     */
    public function show(Included $included)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Included  $included
     * @return \Illuminate\Http\Response
     */
    public function edit(Included $included)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Included  $included
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:244',
        ]);
        $includes = Included::find($request->id);
        $includes->name = $request->name;

        $includes->save();

        return response()->json($includes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Included  $included
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incudes = Included::findOrFail($id);
        $incudes->delete();
        return response()->json($incudes);
    }
}
