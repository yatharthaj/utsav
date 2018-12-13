@extends('layouts.frontend')
@section('content')

    <!-- steps start -->
    <section class="white">
        <div class="title-wrapper">
            <h4 class="step-title center uk-margin">Book {{$tour->title}}</h4>
        </div>
        <div class="row uk-margin-medium uk-margin-remove-horizontal">
            <div class="col s4 m4 l4">
                <div class="active-step circle-text">
                    Step 1

                </div>
                <h2 class="center" style="font-size:14px;">Choose Your Trip</h2>
            </div>
            <div class="col s4 m4 l4">
                <div class="circle-text">
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
            <div class="row uk-margin-remove-bottom uk-padding uk-margin-remove-horizontal">
                <div class="col m2 l2">
                </div>
                <div class="col s12 m8 l8 card card-default">
                    <form action="{{ route('frontend-bookStep2',$tour->slug) }}" method="POST" data-parsley-validate>
                        @csrf
                        <input type="hidden" name="tour_id" value="{{$tour->id}}">
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" class="tripStart">
                                <label for="tripStart">Trip Start Date</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <select name="pax">
                                    <option value="" disabled selected>Choose your option</option>
                                    @for($i=1; $i<=10; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <label>No. of travellers</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Proceed Booking
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col m2 l2">
            </div>
        </div>
        </div>
    </section>
    <!-- booking process end -->
@stop
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js"></script>
@stop
