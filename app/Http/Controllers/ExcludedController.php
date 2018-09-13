<?php

namespace App\Http\Controllers;

use App\Excluded;
use Illuminate\Http\Request;
use Session;
class ExcludedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $excludeds = Excluded::all();
      return view('backend.tour.excludes.index')->withExcludeds($excludeds);
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
        $excluded = new Excluded();
        $excluded->name = $request->name;
        $excluded->save();
        Session::flash('success', 'New item added sucessfully.');
        return redirect()->route('excludes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Excluded  $excluded
     * @return \Illuminate\Http\Response
     */
    public function show(Excluded $excluded)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Excluded  $excluded
     * @return \Illuminate\Http\Response
     */
    public function edit(Excluded $excluded)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Excluded  $excluded
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:244',
        ]);
        $excludes = Excluded::find($request->id);
        $excludes->name = $request->name;

        $excludes->save();

        return response()->json($excludes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Excluded  $excluded
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $excludes = Excluded::findOrFail($id);
        $excludes->delete();
        return response()->json($excludes);
    }
}
