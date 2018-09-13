<?php

namespace App\Http\Controllers;

use App\PageCategory;
use Illuminate\Http\Request;
use Session;
class PageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PageCategory::all();
        return view('backend.page.category.index')
                    ->withCategories($categories);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        $categories = new PageCategory;
        $categories->name = $request->name;
        $categories->save();
        Session::flash('success', 'New item added sucessfully.');
        return redirect()->route('page-category.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\PageCategory $pageCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PageCategory $pageCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PageCategory $pageCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PageCategory $pageCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\PageCategory $pageCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:244',
        ]);
        $pageCategory = PageCategory::find($request->id);
        $pageCategory->name = $request->name;

        $pageCategory->save();

        return response()->json($pageCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PageCategory $pageCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pageCategory = PageCategory::findOrFail($id);
        $pageCategory->delete();
        return response()->json($pageCategory);
    }
}
