<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Contact;
use App\Mail\Inquiry;
use App\Mail\Booking;
use App\Mail\Join;
use App\Tour;
use Session;

class PostFrontendController extends Controller
{
    public function postContact(Request $request)
    {
//        dd($request->all());
        $token = $request->input('g-recaptcha-response');
        if (strlen($token) > 0) {
            $this->validate($request, [
                'fullName' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'contactMessage' => 'min:10']);
//                    dd($request->all());
            $userIP = $request->ip();
            $IPdata = file_get_contents("http://api.ipstack.com/{$userIP}?access_key=dbdffe40fc5408f1272a7a972a312548");
            $IPdata = json_decode($IPdata);
            $user_info = "IP: {$IPdata->ip} <br> [ Country: <b>{$IPdata->country_name}</b> | City: {$IPdata->city} ]";
            $data = array(
                'name' => $request->fullName,
                'subject' => $request->subject,
                'email' => $request->email,
                'bodyMessage' => $request->contactMessage,
                'user_info' => $user_info,
            );
//            dd($data);
            Mail::send(new Contact($data));

            Session::flash('success', 'Email sent sucessfully!');
            return redirect()->route('frontend-contact');
        }
    }

    public function postInquiry(Request $request)
    {
        $token = $request->input('g-recaptcha-response');
        if (strlen($token) > 0) {
            $this->validate($request, [
                'fullName' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'enquiryMessage' => 'required'
            ]);
            $userIP = $request->ip();
            $IPdata = file_get_contents("http://api.ipstack.com/{$userIP}?access_key=dbdffe40fc5408f1272a7a972a312548");
            $IPdata = json_decode($IPdata);
            $user_info = "IP: {$IPdata->ip} <br> [ Country: <b>{$IPdata->country_name}</b> | City: {$IPdata->city} ]";

            $data["fullName"] = $request->fullName;
            $data["subject"] = 'New enquiry for '.$request->tourName;
            $data["email"] = $request->email;
            $data["mobile"] = $request->mobile;
            $data["enquiryMessage"] = $request->enquiryMessage;
            $data["user_info"] = $user_info;

            Mail::send(new Inquiry($data));

            Session::flash('success', 'Thank you for your inquiry. We will get back to you shortly.');
            return redirect()->back();
        }
    }

    public function postBooking(Request $request)
    {
        $this->validate($request, [
            'suffix.*' => 'required',
            'fname.*' => 'required',
            'lname.*' => 'required',
            'country.*' => 'required',
            'address' => 'required',
            'email.*' => 'required',
            'mobile' => 'required',
            'DOB.*' => 'required',
            'pNo.*' => 'required',
            'expiry.*' => 'required'
        ]);
        $userIP = $request->ip();
        $IPdata = file_get_contents("http://api.ipstack.com/{$userIP}?access_key=dbdffe40fc5408f1272a7a972a312548");
        $IPdata = json_decode($IPdata);
        $user_info = "IP: {$IPdata->ip} <br> [ Country: <b>{$IPdata->country_name}</b> | City: {$IPdata->city} ]";

        $tour = Tour::where('id', $request->tour_id)->first();
        $data['subject'] = '!! New Booking !! for ' . $tour->title . ' | ' . $tour->days . ' Days';
        $data["trip_name"] = $tour->title;
        $data["address"] = $request->address;
        $data["mobile"] = $request->mobile;
        $data["start_date"] = $request->trip_start;
        $data["pax"] = $request->pax;
        $data["user_info"] = $user_info;
        $data["email"] = $request->email;
        $data["suffix"] = $request->suffix;
        $data["fname"] = $request->fname;
        $data["lname"] = $request->lname;
        $data["country"] = $request->country;
        $data["email"] = $request->email;
        $data["DOB"] = $request->dob;
        $data["passport"] = $request->pNo;
        $data["expiry"] = $request->expiry;
        Mail::send(new Booking($data));
        return view('frontend.book.book-step3')->withTour($tour);

    }

    public function postJoin(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'mobile' => 'required',
            'pNo' => 'required']);

        $userIP = $request->ip();
        $IPdata = file_get_contents("http://api.ipstack.com/{$userIP}?access_key=dbdffe40fc5408f1272a7a972a312548");
        $IPdata = json_decode($IPdata);
        $user_info = "IP: {$IPdata->ip} <br> [ Country: <b>{$IPdata->country_name}</b> | City: {$IPdata->city} ]";
        $tour = Tour::where('id', $request->tour_id)->first();
        // dd($tour);
        $data = array(
            'fname' => $request->fname,
            'lname' => $request->lname,
            'subject' => '!! Group Join Request !! for ' . $tour->title . ' | ' . $tour->days . ' Days',
            'pax' => $request->pax,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'country' => $request->country,
            'address' => $request->address,
            'start' => $request->start,
            'end' => $request->end,
            'DOB' => $request->DOB,
            'pNo' => $request->pNo,
            'expiry' => $request->expiry,
            'user_info' => $user_info,
        );
        Mail::send(new Join($data));

        Session::flash('success', 'Thank you for your inquiry. We will get back to you shortly.');
        return view('frontend.book.join-step3')->withTour($tour);
    }
}
