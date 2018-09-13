<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;
use Session;
use File;
use App\Media;
class PartnerController extends Controller
{
    private $path = "uploads/images/partner/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        return view('backend.partner.index')->withPartners($partners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $partner = new Partner();

        if (!is_dir($this->path) ) {
            mkdir($this->path, 666, true);
        }
        // if (!file_exists($this->path)) {
        //     mkdir($this->path, 666, true);
        // }        

        $partner->path = Media::uploadImage($this->path, $request->file('photo'), 165, 155);

        $partner->save();
        return 'Success';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $this->validate($request, [
            'name' => 'required|max:244'
        ]);
        $partner = Partner::find($request->id);
        $partner->name = $request->name;

        $partner->save();

        return response()->json($partner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        File::delete(public_path($partner->path));
        $partner->delete();
        return response()->json($partner);
    }
}
