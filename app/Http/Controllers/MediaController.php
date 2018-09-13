<?php

namespace App\Http\Controllers;

use App\Media;
use Session;
use File;
use Image;
use ImageOptimizer;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    private $path = "uploads/images/media/slide/";
    private $path1 = "uploads/images/media/gallery/";
    private $thumb = "uploads/images/media/thumb/";
//    private $thumb1 = "uploads/images/thumb500";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::all();
        return view('backend.media.index')->withMedias($medias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'photo' => 'required|mimes:jpg,jpeg,png,bmp|max:20000'
//        ]);

        $media = new Media();

        if (!is_dir($this->path) ) {
            mkdir($this->path, 0755, true);
        }
        if (!is_dir($this->thumb) ) {
            mkdir($this->thumb, 0755, true);
        }

        $media->path = Media::uploadImage($this->path, $request->file('photo'), 966, 1104);
        $media->path1 = Media::uploadImage($this->path1, $request->file('photo'), 750, 450);
        $media->thumb = Media::uploadImage($this->thumb, $request->file('photo'), 370, 270);

        $media->save();
        return 'Success';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        $this->validate($request, [
            'name' => 'required|max:244'
        ]);
        $gallery = Media::find($request->id);
        $gallery->name = $request->name;

        $gallery->save();

        return response()->json($gallery);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Media::findOrFail($id);
        File::delete(public_path($gallery->path));
        File::delete(public_path($gallery->path1));
        File::delete(public_path($gallery->thumb));
        $gallery->delete();
        return response()->json($gallery);
    }
}
