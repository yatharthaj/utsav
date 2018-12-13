@section('product-meta')
    @include('backend.partials._meta-product')
@stop
@inject('countries','App\Http\Utilities\Country')
@extends('layouts.frontend')
@section('content')
    <!-- image start -->
    <div class="row uk-margin-remove-bottom">
        <div class="col sm12 m12 l6 uk-padding-remove-horizontal">
            <img class="responsive-img" src="{{asset($tour->featuredImage->path)}}" alt="{{$tour->title}}">
        </div>
        <div class="col sm12 m12 l6  center-align product ">
            <h3 class="uk-padding product-img-content uk-margin-remove">{{$tour->title}}</h3>
            <h6 class="uk-padding uk-padding-remove-vertical"><i>STARTING FROM USD</i></h6>
            <h3 class="uk-margin-remove">
                <sup>$</sup>@if(!empty($tour->price2)) {{$tour->price2}} @else {{$tour->price}} @endif</h3>
            <p>{!! $tour->description !!}</p>
            <div class="row uk-margin-remove-bottom">
                <div class="col s12 m6 l6">
                    <table>
                        <tbody>
                        <tr>
                            <td>Span</td>
                            <td class="right">{{$tour->days}} Days</td>
                        </tr>
                        <tr>
                            <td>Group Size</td>
                            <td class="right">{{$tour->group->name}}</td>
                        </tr>
                        <tr>
                            <td>Meal Plan</td>
                            <td class="right">{{$tour->meal->name}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col s12 m6 l6">
                    <table>
                        <tbody>
                        <tr>
                            <td>Travel Style</td>
                            <td class="right">{{$tour->category->name}}</td>
                        </tr>
                        <tr>
                            <td>Difficulty</td>
                            <td class="right">{{$tour->difficulty->name}}</td>
                        </tr>
                        <tr>
                            <td>Lodging</td>
                            <td class="right">{{$tour->accommodation->name}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <a class="waves-effect waves-light btn-large book uk-margin-small "
                   href="{{ route('frontend-bookStep1',$tour->slug) }}">Book Now</a>
            </div>
            <div class="row uk-margin-remove-bottom" id="social-wrapper">
                <div class="col s3 m3 l3 center ">
                    <a href="http://www.facebook.com/sharer.php?u={{url()->current()}}"
                       onclick="window.open(this.href, 'facebookwindow','left=20,top=20,width=600,height=700,toolbar=0,resizable=1'); return false;" title="Facebook">
                        <i class="fab fa-facebook"></i>
                        <span>Share</span>
                    </a>
                </div>
                <div class="col s3 m3 l3 center ">
                    <a href="#"
                       onclick="window.open('http://twitter.com/intent/tweet?url={{ url()->current()}};text=&amp;via=ascent_treks', '', 'width=626,height=436');
                               return false;" target="_blank" title="Twitter">
                        <i class="fab fa-twitter"></i>
                        <span>Tweet</span>
                    </a>
                </div>
                <div class="col s3 m3 l3 center ">
                    <a href="#" target="_blank"
                       onclick="window.open('https://plus.google.com/share?url={{url()->current()}}', '', 'width=626,height=436');
                               return false;" title="Google">
                        <i class="fab fa-google-plus-g"></i>
                        <span>G+</span>
                    </a>
                </div>
                <div class="col s3 m3 l3 center ">
                    <a href="https://www.instagram.com/skiguidesnepal/" target="_blank" title="Instagram">
                    <i class="fab fa-instagram"></i>
                    <span>Instagram</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!-- image end -->
    <!-- tab start -->

    <div class="row">
        <div class="col s12">
            <ul class="tabs tabs-fixed-width row" id="product-tab">
                <li class="tab col s2 m2 l2"><a href="#overview" class="active"><i class="fas fa-eye"></i><span
                                class="hide-on-med-and-down uk-margin-left">Overview</span> </a></li>
                <li class="tab col s2 m2 l2"><a href="#itinerary"><i class="far fa-map"></i><span
                                class="hide-on-med-and-down uk-margin-left">Itinerary</span></a></li>
                @if($tour->departure->count() > 0)
                    <li class="tab col s2 m2 l2 "><a href="#availability"><i class="fas fa-search"></i><span
                                    class="hide-on-med-and-down uk-margin-left">Availability</span></a></li>
                @endif
                <li class="tab col s2 m2 l2"><a href="#reviews"><i class="far fa-comments"></i><span
                                class="hide-on-med-and-down uk-margin-left">Review</span></a></li>
                <li class="tab col s2 m2 l2 "><a href="#gallery"><i class="far fa-clock"></i><span
                                class="hide-on-med-and-down uk-margin-left">Gallery</span></a></li>
            </ul>
        </div>
    </div>

    <!-- tab end -->
    <!-- product start  -->
    <div id="overview" class="col s12">
        <div class="container-fluid uk-padding-small">
            <div class="row">
                <div class="col s12 m12 l6">
                    <blockquote>All about {{$tour->title}}</blockquote>
                    {!! $tour->overview !!}
                    @if($tour->itinerary->count() > 0)
                        <ul class="outline-itinerary">
                            <h5 class="uk-margin-remove-top uk-padding-remove-horizontal">Itinerary</h5>
                            @foreach($itineraries as $itinerary)
                                <li>
                                    <span class="new badge left   center"
                                          data-badge-caption="{{ $itinerary->day}}:">Day</span>
                                    <span class="itinerary-title uk-margin-left">{{$itinerary->title}}</span>
                                </li>
                            @endforeach
                            @endif
                        </ul>
                </div>
                <div class="col s12 m12 l6">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <ul>
                                <li><h6>What's included ?</h6></li>
                            </ul>
                            @foreach($tour->includes as $includes)
                                <ul>
                                    <li><i class="material-icons left green-text">check</i>{{$includes->name}}
                                    </li>
                                </ul>
                            @endforeach
                            <div class="col s12 m12 l12">
                                <ul>
                                    <li><h6>What's excluded ?</h6></li>
                                </ul>
                                @foreach($tour->excludes as $excludes)
                                    <ul>
                                        <li><i class="material-icons left red-text">close</i>{{$excludes->name}}
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('frontend.partials._enquiry')
        </div>
    </div>

    <!-- itinerary start -->
    <div id="itinerary" class="col s12">
        @include ('frontend.partials._itinerary')
    </div>
    <!-- itinerary end -->

    {{--date and price start--}}
    @if($tour->departure->count() > 0)
        <div id="availability" class="col s12">
            <div class="container-fluid uk-padding-small">
                <div class="card">
                    <div class="card-title">
                        <div class="row">
                            <div class="col s12 m6 l5">
                                <p class="uk-margin-left">Please Check Available Dates for The Year of:</p>
                                <input type="hidden" value="{{$tour->id}}" id="tour-id">
                            </div>
                            <div class="col s12 m6 l7">
                                <div class="input-field col s12  m4 l4">
                                    <select id="travel-month">
                                        <option value="" disabled selected>Select Month</option>
                                        <option value="1">Jan</option>
                                        <option value="2">Feb</option>
                                        <option value="3">Mar</option>
                                        <option value="4">Apr</option>
                                        <option value="5">May</option>
                                        <option value="6">Jun</option>
                                        <option value="7">Jul</option>
                                        <option value="8">Aug</option>
                                        <option value="9">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                    </select>
                                </div>
                                <div class="input-field col s12  m4 l4">
                                    <select id="travel-year">
                                        <option value="" disabled selected>Select Year</option>
                                        @for($i=date('Y');$i<=date('Y')+2;$i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col s12 m4 l4">
                                    <a class="waves-effect waves-light btn center uk-margin-top uk-margin-left search"
                                       id="fetch-dates">search</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ajaxloader" style="display: none;">Loading...</div>
                <div class="row">
                    <div class="col s12">
                        <table class="centered responsive-table ">
                            <thead>
                            <tr>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>1 person</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="ajaxloadmoredeparture">
                            @include('frontend.partials._single-price')
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--@else--}}
                {{--@include('frontend.partials._group-price')--}}
                {{--@endif--}}
            </div>
        </div>
    @endif
    {{--date and price end--}}

    {{-- review start --}}
    <div id="reviews" class="col s12">
        <div class="container-fluid">
            <div class="row">
                <div class="col s12 m12 l6">
                    @foreach($tour->reviews as $review)
                        <div class="row">
                            <div class="col s3 m3 l3">
                                <img src="{{asset($review->thumbnail)}}" alt="" class="circle responsive-img">
                            </div>
                            <div class="col s9 m9 l9">
                                <h4 class="review-title">{{$review->title}}</h4>
                                <p class="uk-margin-remove-top">{{$review->fname.' '. $review->lname}}</p>
                                <span class="rating">
                            <i class="material-icons yellow-text">star</i>
                            <i class="material-icons yellow-text">star</i>
                            <i class="material-icons yellow-text">star</i>
                            <i class="material-icons yellow-text">star</i>
                            <i class="material-icons yellow-text">star</i>
                        </span>
                                <p class="review-content">{{$review->content}}</p>
                            </div>
                        </div>
                    @endforeach
                    <a class="waves-effect waves-light btn">Read More</a>
                </div>
                <div class="col s12 m12 l6">
                    <div class="collection">
                        <form method="POST" action="{{route('frontend-reviews.store')}}">
                            @csrf
                            <div class="row uk-margin-left uk-padding-small uk-padding-remove-vertical">
                                <div class="input-field col s12 uk-margin-remove-top uk-padding-remove-vertical  uk-margin-small uk-margin-bottom">
                                    <input id="hidden" type="hidden" class="validate" name="tour-id"
                                           value="{{$tour->id}}">
                                    <label for="hidden">LEAVE A REVIEW</label>
                                </div>
                            </div>
                            <div class="row uk-margin-left uk-margin-right uk-padding-small uk-padding-remove-vertical">
                                <div class="input-field col s6 uk-margin-remove-top uk-padding-remove-vertical">
                                    <input id="first_name" type="text" class="validate" name="fname">
                                    <label for="first_name">First Name</label>
                                </div>
                                <div class="input-field col s6 uk-margin-remove-top uk-padding-remove-vertical">
                                    <input id="last_name" type="text" class="validate" name="lname">
                                    <label for="last_name">Last Name</label>
                                </div>
                            </div>
                            <div class="row uk-margin-left uk-margin-right uk-margin-right uk-padding-small uk-padding-remove-vertical">
                                <div class="input-field col s12 uk-margin-remove-top uk-padding-remove-vertical">
                                    <input id="email" type="email" class="validate" name="email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="row uk-margin-left uk-margin-right uk-margin-right uk-padding-small uk-padding-remove-vertical uk-padding-remove-top">
                                <div class="input-field col s12 uk-margin-remove-top uk-padding-remove-vertical">
                                    <select name="country">
                                        <option value="" disabled selected>Country</option>
                                        @foreach($countries->all() as $country => $code)
                                            <option value="{{$code}}">{{$country}}</option>
                                        @endforeach
                                    </select>
                                    <label>Country</label>
                                </div>
                            </div>

                            <div class="row uk-margin-left uk-margin-right uk-padding-small uk-padding-remove-vertical uk-padding-remove-top">
                                <div class="file-field input-field col s12 uk-margin-remove-top uk-padding-remove-vertical">
                                    <div class="btn">
                                        <span>Image Upload</span>
                                        <input type="file" name="image" accept="image/*" multiple>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text"
                                               placeholder="Upload one or more files">
                                    </div>
                                </div>
                            </div>
                            <div class="row uk-margin-left uk-margin-right uk-padding-small uk-padding-remove-vertical uk-padding-remove-top">
                                <div class="input-field col s12 uk-margin-remove-top uk-padding-remove-vertical">
                                    <input id="text" type="text" class="validate" name="title">
                                    <label for="text">Title</label>
                                </div>
                            </div>
                            <div class="row uk-margin-left uk-margin-right uk-padding-small uk-padding-remove-vertical uk-padding-remove-top">
                                <div class="input-field col s12 uk-margin-remove-top uk-padding-remove-vertical">
                                    <textarea id="product-review-textarea" class="materialize-textarea" name="message"
                                              placeholder="Write your message here..."></textarea>
                                </div>
                            </div>

                            <div class="row uk-margin-left uk-margin-right uk-padding-small uk-padding-remove-vertical uk-padding-remove-top">
                                <div class="input-field col s12 uk-margin-remove-top uk-padding-remove-vertical">
                                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- review end -->
    {{--gallery start--}}
    @if($tour->slides->count() > 0)
        <div id="gallery" class="col s12">
            <div class="container-fluid uk-padding-small">
                <div class="row">
                    @foreach($tour->slides as $slide)
                        <div class="col s12 m6 l4">
                            <a href="{{asset($slide->path)}}" data-lity>
                                <img src="{{asset($slide->thumb)}}" alt="" class="responsive-img">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    {{--gallery end--}}
    <!-- product ebd -->

@stop
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.min.css">
@stop
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript">
        !function () {
            "use strict";
            $(document).ready(function () {
                $("#fetch-dates").click(function (a) {
                    a.preventDefault();
                    var t = $("#tour-id").val(),
                        e = $("#travel-year").val(),
                        o = $("#travel-month").val();
                    $('#ajax-action').hide(), $("#ajaxloader").show(), $.ajax({
                        type: "GET",
                        url: "/fetch-departures",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                        },
                        data: {
                            tour_id: t,
                            year: e,
                            month: o
                        },
                        success: function (a) {
                            $(".ajaxloadmoredeparture").html(a), $("#ajaxloader").hide(), $('#ajax-action').show()
                        }
                    })
                })
            });
        }();
    </script>
@stop