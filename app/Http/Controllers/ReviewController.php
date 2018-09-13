<?php

namespace App\Http\Controllers;

use App\Review;
use App\Tour;
use Illuminate\Http\Request;
use Image;
use Session;
use DB;

class ReviewController extends Controller
{
    private $client = "uploads/images/reviews/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.tour.review.index')
            ->withReviews($reviews);
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
        $token = $request->input('g-recaptcha-response');
        if(strlen($token) > 0)
        {
            $this->validate($request,[
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required',
                'image' => 'sometimes',
                'title' => 'required',
                'message' => 'required'
            ]);

            $review = new Review;
            $review->fname = $request->fname;
            $review->lname= $request->lname;
            $review->email = $request->email;
            $review->country= $request->country;
            $review->title = $request->title;
            $review->content = $request->message;
            $review->rating = $request->rating;
            $review->tour_id = $request->tour_id;
            if($request->hasFile('image')){
                if (!File::exists($this->client)) {
                    File::makeDirectory($this->client);
                }
                $image = $request->file('image');
                $filename = 'thumb'.time().'.'.$image->getClientOriginalExtension();
                $location = $this->client.$filename;
                Image::make($image)->resize(100, 100)->save($location);
                $review->thumbnail = $location;
            }
            else{
                $url="https://www.gravatar.com/avatar/";
                $review->thumbnail = $url.md5(strtolower(trim($review->email)))."?s=64&d=monsterid";
            }
            $review->save();
            Session::flash('success', 'Thank you for your kind words.');
            return back()->withInput(['tab'=>'tab04']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
     public  function approve($id)
     {
         $review = Review::find($id);
         $review->status = 1;
         $review->save();

         $review->tour->recalculateRating($review->rating);
         Session::flash('success', 'Review has been approved.');
         return back();
     }
}
