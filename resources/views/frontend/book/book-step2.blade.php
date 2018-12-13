@inject('countries','App\Http\Utilities\Country')
@extends('layouts.frontend')
@section('content')
    <!-- steps start -->
    <section>
        <div class="title-wrapper">
            <h4 class="step-title center uk-margin">Book {{$tour->title}}</h4>
        </div>
        <div class="row uk-margin-medium uk-margin-remove-horizontal">
            <div class="col s4 m4 l4">
                <div class="circle-text">
                    <i class="medium material-icons">check</i>
                </div>
                <h2 class="center" style="font-size:14px;">Choose Your Trip</h2>
            </div>
            <div class="col s4 m4 l4">
                <div class="circle-text active-step">
                    Step 2
                </div>
                <h2 class="center" style="font-size:14px;">Traveller's Details</h2>
            </div>
            <div class="col s4 m4 l4">
                <div class="circle-text">
                    Step 3
                </div>
                <h2 class="center" style="font-size:14px;">Booking Complete</h2>
            </div>
        </div>

    </section>
    <!-- steps end -->
    <!-- booking process start -->
    <section class="white">
        <div class="container">
            <form action="{{ route('frontend-bookStep3',$tour->slug) }}" method="POST" data-parsley-validate>
                @csrf
                <input type="hidden" name="tour_id" value="{{$tour->id}}">
                <input type="hidden" name="trip_start" value="{{$request->tripStart}}">
                <input type="hidden" name="pax" value="{{$request->pax}}">
                <div class="row">
                    <div class="col m2 l2">
                    </div>
                    <div class="col s12 m8 l8">
                        <h4 class="center-align">Lead Traveller</h4>

                        <div class="row uk-margin-remove-bottom">
                            <div class="input-field col s12 m2 l2">
                                <select name="initial">
                                    <option value="" disabled selected>Suffix</option>
                                    <option value="1">Mr.</option>
                                    <option value="2">Mrs.</option>
                                    <option value="3">Ms.</option>
                                </select>
                            </div>

                            <div class="input-field col s12 m5 l5">
                                <input id="fname" type="text" class="validate" name="fname" required>
                                <label for="fname">First Name</label>
                            </div>
                            <div class="input-field col s12 m5 l5">
                                <input id="lname" type="text" class="validate" name="lname" required>
                                <label for="lname">Last Name</label>
                            </div>
                        </div>
                        <div class="row uk-margin-remove-bottom">
                            <div class="input-field col s12">
                                <select class="trip dark" name="country" id="country">
                                    <option value="" disabled selected>Select your country</option>
                                    @foreach($countries->all() as $country => $code)
                                        <option value="{{$country}}">{{$country}}</option>
                                    @endforeach
                                </select>
                                <label for="country">Country</label>
                            </div>
                        </div>
                        <div class="row uk-margin-remove-bottom">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="email" required>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row uk-margin-remove-bottom">
                            <div class="input-field col s12">
                                <textarea id="address" cols="30" rows="10" class="materialize-textarea"
                                          name="address" required></textarea>
                                <label for="address">Address</label>
                            </div>
                        </div>
                        <div class="row uk-margin-remove-bottom">
                            <div class="input-field col s12">
                                <input id="mobile" type="text" class="validate" placeholder="Mobile no."
                                       name="mobile" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="far fa-calendar-alt prefix"></i>
                                <input id="dob" type="text" class="validate" name="DOB" required>
                                <label for="dob">Date of Birth</label>
                            </div>
                        </div>
                        <div class="row uk-margin-remove-bottom">
                            <div class="input-field col s6">
                                <i class="far fa-calendar-alt prefix"></i>
                                <input id="exp" type="text" class="validate" name="pNo" required>
                                <label for="exp">Passport Expiry</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="text" type="text" class="validate" name="expiry" required>
                                <label for="text">Passport no.</label>
                            </div>
                        </div>
                        <div class="row uk-margin-medium-bottom">
                            <div class="input-field col s12 ">
                                <label>
                                    <input type="checkbox" class="filled-in" checked="checked" required/>
                                    <span>By selecting to complete this booking I acknowledge that I have read and accept the terms & conditions, and privacy policy.</span>
                                </label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <div class="input-field col s12 ">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Proceed
                                    Booking
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col m2 l2">
                    </div>
                </div>

            </form>
        </div>
    </section>
    <!-- booking process end -->
@stop
@section('styles')
    {{--<link rel="stylesheet" href="{{asset('css/intlTelInput.min.css')}}">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/14.0.3/css/intlTelInput.css">
@stop
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/14.0.3/js/intlTelInput-jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/14.0.3/js/intlTelInput.min.js"></script>
    {{--<script src="{{asset('js/intlTelInput-jquery.min.js')}}"></script>--}}
    {{--<script src="{{asset('js/intlTelInput.min.js')}}"></script>--}}
    <script>
        $(function () {
            $("#mobile").intlTelInput({
                allowDropdown: true,
            });
        });
    </script>
@stop
