<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use File;
use Session;
use Image;
use DB;
use ImageOptimizer;
class TeamController extends Controller
{
    private $photo = "images/team";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('backend.team.index')->withTeams($teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $this->validate($request, [
                'name' => 'required',
                'details' => 'required',
                'image' => 'required'
            ]);

            $team = new Team;
            $team ->name = $request->name;
            $team ->type = $request->type;
            $team ->position = $request->position;
            $team->description = $request->details;
            $team->fb = $request->fb;
            $team->insta = $request->insta;
            $team->linked = $request->linked;

            if ($request->hasFile('image')) {
                if (!File::exists($this->photo)) {
                    File::makeDirectory($this->photo);
                }
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $photo = $this->photo . $filename;
                Image::make($image)->resize(400,300)->save($photo);
                ImageOptimizer::optimize($photo);
                $team->photo= $photo;
//                dd($photo);
            }

            $team->save();

            Session::flash('success', 'Team added sucessfully !');
        }catch (QueryException $e)
        {
            return $e->getMessage();
        }
        return redirect()->route('team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('backend.team.edit')->withTeam($team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        try{
            $this->validate($request, [
                'name' => 'required',
                'details' => 'required',
            ]);

            $team ->name = $request->name;
            $team ->type = $request->type;
            $team ->position = $request->position;
            $team->description = $request->details;
            $team->fb = $request->fb;
            $team->insta = $request->insta;
            $team->linked = $request->linked;

            if ($request->hasFile('image')) {
                if (!File::exists($this->photo)) {
                    File::makeDirectory($this->photo);
                }
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $photo = $this->photo . $filename;
                Image::make($image)->resize(400,300)->save($photo);
                ImageOptimizer::optimize($photo);
                $team->photo= $photo;
//                dd($photo);
            }

            $team->save();

            Session::flash('success', 'Team edited sucessfully !');
        }catch (QueryException $e)
        {
            return $e->getMessage();
        }
        return redirect()->route('team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        File::delete(public_path($team->banner));
        $team->delete();
    }
}
