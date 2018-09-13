<?php

namespace App\Http\Controllers;

use App\Difficulty;
use Illuminate\Http\Request;
use Session;

class DifficultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Difficulty::all();
        return view('backend.tour.difficulty.index')->withLevels($levels);
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
        $level = new Difficulty();
        $level->name = $request->name;
        $level->save();
        Session::flash('success', 'New item added sucessfully.');
        return redirect()->route('difficulty.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Difficulty  $difficulty
     * @return \Illuminate\Http\Response
     */
    public function show(Difficulty $difficulty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Difficulty  $difficulty
     * @return \Illuminate\Http\Response
     */
    public function edit(Difficulty $difficulty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Difficulty  $difficulty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:244',
        ]);
        $level = Difficulty::find($request->id);
        $level->name = $request->name;

        $level->save();

        return response()->json($level);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Difficulty  $difficulty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = Difficulty::findOrFail($id);
        $level->delete();
        return response()->json($level);
    }
}
