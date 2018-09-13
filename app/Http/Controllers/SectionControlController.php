<?php

namespace App\Http\Controllers;

use App\SectionControl;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Session;

class SectionControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = SectionControl::all();
        return view('backend.section.index')->withSections($sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.section.create');
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
                'display_name' => 'required',
                'details' => 'required',
            ]);

            $section = new SectionControl;
            $section->name = $request->name;
            $section->display_name = $request->display_name;
            $section->details = $request->details;
            $section->status = $request->status;
            $section->save();
            Session::flash('success', 'Tour created sucessfully !');
        }catch (QueryException $e)
        {
            return $e->getMessage();
        }
        return redirect()->route('section-control.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SectionControl  $sectionControl
     * @return \Illuminate\Http\Response
     */
    public function show(SectionControl $sectionControl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SectionControl  $sectionControl
     * @return \Illuminate\Http\Response
     */
    public function edit(SectionControl $sectionControl)
    {
        return view('backend.section.edit')->withStuff($sectionControl);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SectionControl  $sectionControl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SectionControl $sectionControl)
    {
        try{
            $this->validate($request, [
                'name' => 'required',
                'display_name' => 'required',
                'details' => 'required',
            ]);

            $sectionControl->name = $request->name;
            $sectionControl->display_name = $request->display_name;
            $sectionControl->details = $request->details;
            $sectionControl->status = $request->status;
            $sectionControl->save();
            Session::flash('success', 'Tour created sucessfully !');
        }catch (QueryException $e)
        {
            return $e->getMessage();
        }
        return redirect()->route('section-control.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SectionControl  $sectionControl
     * @return \Illuminate\Http\Response
     */
    public function destroy(SectionControl $sectionControl)
    {
        //
    }

    public function publish($id)
    {
        DB::table('section_controls')
            ->where('id', $id)
            ->update(['status' => 1]);
        Session::flash('success', 'Section published!');
        return redirect()
            ->route('tour.index');
    }

    public function unpublish($id)
    {
        DB::table('section_controls')
            ->where('id', $id)
            ->update(['status' => 0]);
        Session::flash('success', 'Section set as published!');
        return redirect()
            ->route('tour.index');
    }
}
