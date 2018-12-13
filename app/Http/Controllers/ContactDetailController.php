<?php

namespace App\Http\Controllers;

use App\ContactDetail;
use Illuminate\Http\Request;
use Session;
class ContactDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact= ContactDetail::first();
        if ( is_null($contact))
        {
            return view('backend.contact.create');
        }
        else{
            return view('backend.contact.edit')->withContact($contact);
        }
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
        try{
            $contact = new ContactDetail;
            $contact->site_name = $request->site_name;
            $contact->address = $request->address;
            $contact->city = $request->city;
            $contact->mobile = $request->mobile;
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            $contact->website = $request->website;
            $contact->facebook = $request->facebook;
            $contact->twitter = $request->twitter;
            $contact->instagram = $request->instagram;
            $contact->googleplus = $request->googleplus;
            $contact->youtube = $request->youtube;
            $contact->tumbler = $request->tumbler;
            $contact->linkedin = $request->linkedin;
            $contact->google_map_link = $request->google_map_link;
            $contact->whats_app = $request->whats_app;
            $contact->skype = $request->skype;
            $contact->save();
            Session::flash('success', 'Tour created sucessfully !');
        }catch (QueryException $e)
        {
            return $e->getMessage();
        }
        return redirect()->route('setting.edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactDetail  $contactDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ContactDetail $contactDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactDetail  $contactDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactDetail $contactDetail)
    {
//        $data['contact_detail'] = ContactDetail::findOrFail($id);

//        return view('backend.contact.contact_details.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactDetail  $contactDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try {
            $contactDetail = ContactDetail::findOrFail($id);
            $contactDetail->site_name = $request->site_name;
            $contactDetail->address = $request->address;
            $contactDetail->city = $request->city;
            $contactDetail->mobile = $request->mobile;
            $contactDetail->phone = $request->phone;
            $contactDetail->email = $request->email;
            $contactDetail->website = $request->website;
            $contactDetail->facebook = $request->facebook;
            $contactDetail->twitter = $request->twitter;
            $contactDetail->instagram = $request->instagram;
            $contactDetail->googleplus = $request->googleplus;
            $contactDetail->youtube = $request->youtube;
            $contactDetail->tumbler = $request->tumbler;
            $contactDetail->linkedin = $request->linkedin;
            $contactDetail->google_map_link = $request->google_map_link;
            $contactDetail->whats_app = $request->whats_app;
            $contactDetail->skype = $request->skype;
            $contactDetail->save();

            Session::flash('success', 'Settings savedsucessfully !');
        } catch (QueryException $e) {
            return $e->getMessage();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactDetail  $contactDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactDetail $contactDetail)
    {
        //
    }
}
