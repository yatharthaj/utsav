<?php

namespace App\Http\Controllers;

use App\Page;
use App\PageCategory;
use File;
use Session;
use Image;
use DB;
use ImageOptimizer;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    private $banner = "images/banner";
    function __construct() {
        $this->pages =  Page::all();
        $this->categories = PageCategory::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.page.index')->withPages($this->pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.create')
            ->withCategories($this->categories)
            ->withPages($this->pages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        try {
            $this->validate($request, [
                'title' => 'required|max:255',
                'page_content' => 'required',
                'mtitle' => 'required',
                'description' => 'required',
                'banner' => 'required'
            ]);

            $page = new Page;
            $page->title = $request->title;
            $page->status = $request->status;
            $page->page_content = $request->page_content;
            $page->description = $request->description;
            $page->mtitle = $request->mtitle;
            $page->main = $request->main;
            $page->position = $request->position;
            $page->parent_id = $request->parent_id;
            if (!empty($request->category_id)) {
                $page->category_id = $request->category_id;
            }
            if ($request->hasFile('banner')) {
                if (!File::exists($this->banner)) {
                    File::makeDirectory($this->banner);
                }
                $image = $request->file('banner');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $banner = $this->banner . $filename;
                Image::make($image)->fit(1920,675)->save($banner);
                ImageOptimizer::optimize($banner);
                $page->banner = $banner;
            }
            $page->save();
            Session::flash('success', 'Page created sucessfully !');
        } catch (QueryException $e) {
            $err = $e->getMessage();
            DB::rollback();
            Session::flash('danger', $err);
        }
        return redirect()->route('pages.show', $page->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('backend.page.show')->withPage($page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('backend.page.edit')
            ->withPage($page)
            ->withPages($this->pages)
            ->withCategories($this->categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
//        dd($request->all());
        try {
            $this->validate($request, [
                'title' => 'required|max:255',
                'page_content' => 'required',
                'description' => 'required',
                'banner' => 'sometimes',
                'position' => 'required|numeric'
            ]);

            $page->title = $request->title;
            $page->status = $request->status;
            $page->page_content = $request->page_content;
            $page->main = $request->main;
            $page->position = $request->position;
            $page->parent_id = $request->parent_id;
            $page->mtitle = $request->mtitle;
            $page->description = $request->description;
            if (!empty($request->category_id)) {
                $page->category_id = $request->category_id;
            }
            if ($request->hasFile('banner')) {
                if (!is_dir($this->featured)) {
                    mkdir($this->featured, 0755, true);
                }
                $image = $request->file('banner');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $banner = $this->featured . $filename;
                Image::make($image)->fit(1920,675)->save($banner);
                ImageOptimizer::optimize($banner);
                $page->banner = $banner;
            }
            $page->save();
            Session::flash('success', 'Page updated sucessfully !');
        } catch (QueryException $e) {
            return $e->getMessage();
            DB::rollback();
            Session::flash('danger', 'Failed to update new page.');
        }

        return redirect()->route('pages.show', $page->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        File::delete(public_path($page->banner));
        $page->delete();
        return redirect()->route('pages.index');
    }

    public function publish($id)
    {
        DB::table('pages')
            ->where('id', $id)
            ->update(['status' => 1]);

        Session::flash('success', 'Page published!');
        return redirect()
            ->route('pages.index');

    }

    public function unpublish($id)
    {
        DB::table('pages')
            ->where('id', $id)
            ->update(['status' => 0]);

        Session::flash('success', 'Page published!');
        return redirect()
            ->route('pages.index');
    }
}
