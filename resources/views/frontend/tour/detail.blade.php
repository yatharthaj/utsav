@inject('countries','App\Http\Utilities\Country')
@extends('layouts.frontend')
@section('content')
<main id="main">
    <!-- main tour information -->
    <section class="container-fluid trip-info">
        <div class="same-height two-columns row">
            <div class="height col-md-6">
                <!-- top image slideshow -->
                <div id="tour-slide">
                    @foreach($tour->slides as $slide)
                    <div class="slide">
                        <div class="bg-stretch">
                            <img src="{{ asset($slide->path) }}" alt="image descriprion" height="1104" width="966">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="height col-md-6 text-col">
                <div class="holder">
                    <h1 class="small-size">{{ $tour->title }}</h1>
                    <div class="price">
                        from <strong>US
                            $ @if(!empty($tour->price2)) {{$tour->price2}} @else {{$tour->price}} @endif</strong>
                        </div>
                        <div class="description">
                            {!! $tour->description !!}
                        </div>
                        <ul class="reviews-info">
                            @if($tour->reviews()->approved()->count() > 0)
                            <li>
                                <div class="info-left">
                                    <strong class="title">{{$tour->reviews()->approved()->count()}} Reviews</strong>
                                </div>
                                @if($tour->rating_cache > 0 && $tour->rating_count > 0)
                                <div class="info-right">
                                    <div class="star-rating">
                                        @for ($i=1; $i <=5 ; $i++)
                                        <span class="{{$i > $tour->rating_cache?'disable': ''}}"><span
                                            class="icon-star"></span></span>
                                            @endfor
                                            ({{$tour->rating_cache}}/5)
                                        </div>
                                    </div>
                                    @endif
                                </li>
                                @endif
                                <li>
                                    <div class="info-left">
                                        <strong class="title">Span</strong>
                                    </div>
                                    <div class="info-right">
                                        <ul class="ico-list">
                                            <li>
                                                <span>{{$tour->days}} Days</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="info-left">
                                        <strong class="title">Travel Style</strong>
                                    </div>
                                    <div class="info-right">
                                        <ul class="ico-list">
                                            <li>
                                                <span>{{$tour->category->name}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="info-left">
                                        <strong class="title">Activity Level</strong>
                                    </div>
                                    <div class="info-right">
                                        <ul class="ico-list">
                                            <li>
                                                <span>{{$tour->difficulty->name}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="info-left">
                                        <strong class="title">Group Size</strong>
                                    </div>
                                    <div class="info-right">
                                        <ul class="ico-list">
                                            <li>
                                                <span>{{$tour->group->name}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="info-left">
                                        <strong class="title">Country</strong>
                                    </div>
                                    <div class="info-right">
                                        <ul class="ico-list">
                                            <li>
                                                <span>{{$tour->country->name}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="info-left">
                                        <strong class="title">Start location</strong>
                                    </div>
                                    <div class="info-right">
                                        <ul class="ico-list">
                                            <li>
                                                <span>{{$tour->locationStart->name}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="info-left">
                                        <strong class="title">Location End</strong>
                                    </div>
                                    <div class="info-right">
                                        <ul class="ico-list">
                                            <li>
                                                <span>{{$tour->locationEnd->name}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="info-left">
                                        <strong class="title">Lodging</strong>
                                    </div>
                                    <div class="info-right">
                                        <ul class="ico-list">
                                            <li>
                                                <span>{{$tour->accommodation->name}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="info-left">
                                        <strong class="title">Meal Plan</strong>
                                    </div>
                                    <div class="info-right">
                                        <ul class="ico-list">
                                            <li>
                                                <span>{{$tour->meal->name}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <div class="btn-holder">
                                <a href="{{ route('frontend-bookStep1',$tour->slug) }}" class="btn btn-md btn-info">BOOK NOW</a>
                                
                            </div>
                            <ul class="social-networks social-share">
                                <li>
                                    <a href="#" class="facebook">
                                     <span class="ico">
                                        <span class="icon-facebook"></span>
                                    </span>
                                    <span class="text">Share</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="twitter">
                                 <span class="ico">
                                    <span class="icon-twitter"></span>
                                </span>
                                <span class="text">Tweet</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="google">
                             <span class="ico">
                                <span class="icon-google-plus"></span>
                            </span>
                            <span class="text">+1</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="pin">
                         <span class="ico">
                            <span class="icon-pin"></span>
                        </span>
                        <span class="text">Pin it</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
</section>

<div class="tab-container">
    <nav class="nav-wrap" id="sticky-tab">
        <div class="container">
            <!-- nav tabs -->
            <ul class="nav nav-tabs text-center" role="tablist"  id="tabMenu">
                <li role="presentation" class="active"><a href="#tab01" aria-controls="tab01" role="tab"
                  data-toggle="tab">Overview</a></li>
                  <li role="presentation"><a href="#tab02" aria-controls="tab02" role="tab" data-toggle="tab">Itinerary</a>
                  </li>
                  <li role="presentation"><a href="#tab03" aria-controls="tab03" role="tab" data-toggle="tab">Dates
                  &amp; Price</a></li>
                  <li role="presentation"><a href="#tab04" aria-controls="tab04" role="tab" data-toggle="tab">Reviews</a>
                  </li>
                  <li role="presentation"><a href="#tab05" aria-controls="tab05" role="tab" data-toggle="tab">Gallery</a>
                  </li>
              </ul>
          </div>
      </nav>
      <!-- tab panes -->
      <div class="container tab-content trip-detail">
        <!-- overview tab content -->
        <div role="tabpanel" class="tab-pane active" id="tab01">
            <div class="row">
                <div class="col-md-6">
                    <strong class="header-box">All about {{$tour->title}}</strong>
                    <div class="detail">
                        {{$tour->overview}}
                        <br>
                        <br>
                        @if($tour->itinerary->count() > 0)
                        <strong class="title">Outline Itinerary</strong>
                        <ul class="outline-itinerary">
                            @foreach($tour->itinerary as $itinerary)
                            <li>
                                <span class="badge trending">Day: {{sprintf("%02d", $itinerary->day)}}</span> {{$itinerary->title}}
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <div class="inquiry-form-wrapper">
                        <h3><strong>Send A Quick Inquiry</strong></h3>
                        @include('frontend.partials._messages')
                        <form class="contact-form " method="POST" action="{{route('frontend-postInquiry')}}" data-parsley-validate>
                            @csrf
                            <fieldset>
                                <input type="hidden" name="tourName" value="{{$tour->title}}">
                                <div class="form-group">
                                    <label for="fname">First name</label>
                                    <div class="input-wrap">
                                        <input type="text" class="form-control" id="fname" name="fname" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lname">Last name</label>
                                    <div class="input-wrap">
                                        <input type="text" class="form-control" id="lname" name="lname" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-wrap">
                                        <input type="email" class="form-control" id="email" name="email" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile no.</label>
                                    <div class="input-wrap">
                                        <input type="text" class="form-control" id="mobile" name="mobile" required="">
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <div class="input-wrap">
                                        <textarea name="message" id="message" cols="30" rows="10"
                                        class="form-control" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6Lf-EWgUAAAAAPrL8AkSiLt6uDcIoUooBu21OZG_"></div>
                                </div>
                                <div class="form-group btn-holder review-btn-holder">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <div class="input-wrap">
                                            <input type="submit" id="btn_sent" value="Submit"
                                            class="btn btn-white">
                                            <p id="error_message"></p>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>                        
                    </div>                         

                </div>
                <div class="col-md-6">
                    <strong class="header-box">The tour package inclusions and exclusions at a glance</strong>
                    <div class="text-box">
                        <div class="holder">
                            <strong class="title">Whats included in this tour</strong>
                            <span class="sub-title">Items that are covered in the cost of tour price.</span>
                            <ul class="content-list tick-list">
                                @foreach($tour->includes as $include)
                                <li>{{$include->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="text-box not-included">
                        <div class="holder">
                            <strong class="title">Whats not included in this tour</strong>
                            <span class="sub-title">Items that are covered in the cost of tour price.</span>
                            <ul class="content-list cross-list">
                                @foreach($tour->excludes as $exclude)
                                <li>{{$exclude->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- itinerary tab content -->
        <div role="tabpanel" class="tab-pane" id="tab02">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <ol class="detail-accordion">
                        @foreach($tour->itinerary as $itinerary)
                        <li class="{{ $loop->first ? 'active' : ' ' }}">
                            <a href="#">
                                <strong class="title">Day {{sprintf("%02d", $itinerary->day)}}</strong>
                                <span>{{$itinerary->title}}</span>
                            </a>
                            <div class="slide">
                                <div class="slide-holder">
                                    {!! $itinerary->plan !!}
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
        <!-- dates and prices tab content -->
        <div role="tabpanel" class="tab-pane" id="tab03">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <h5>Please Check Available Dates for The Year of:</h5>
                </div>
                <form action="#">
                    <input type="hidden" id="tour-id" value="{{ $tour->id }}"/>
                    <div class="col-xs-12 col-sm-2">
                        <div class="holder">
                            <label for="date1">Select Month</label>
                            <div class="select-holder">
                                <select class="trip dark" id="travel-month">
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
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <div class="form-group">
                            <div class="holder">
                                <label for="date1">Select Year</label>
                                <div class="select-holder">
                                    <select class="trip dark" id="travel-year">
                                        @for($i=date('Y');$i<=date('Y')+2;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <div class="holder serarch-button-holder">
                            <a href="#" class="btn btn-trip" id="fetch-dates">Search</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-container" id="ajax-action">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <strong class="date-text">Start Dates</strong>
                                </th>
                                <th>
                                    <strong class="date-text">End Dates</strong>
                                </th>
                                <th>
                                    <strong class="date-text">Trip Status</strong>
                                    <span class="sub-text">Avaibality</span>
                                </th>
                                <th>
                                    <strong class="date-text">Price (PP)</strong>
                                    <span class="sub-text">1 Person</span>
                                </th>
                                <th>
                                    <strong class="date-text">Price (PP)</strong>
                                    <span class="sub-text">2-5 Person</span>
                                </th>
                                <th>
                                    <strong class="date-text">Price (PP)</strong>
                                    <span class="sub-text">5+ Person</span>
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                        <tbody class="ajaxloadmoredeparture">
                            @foreach($departures as $departure)
                            <tr>
                                <td>
                                    <div class="cell">
                                        <div class="middle">
                                            {{ date('jS M, Y', strtotime($departure->start))}}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="cell">
                                        <div class="middle">
                                            {{ date('jS M, Y', strtotime($departure->end))}}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="cell">
                                        <div class="middle">{{$departure->slot}} Spaces</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="cell">
                                        <div class="middle">${{$departure->price}}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="cell">
                                        <div class="middle">${{$departure->price2}}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="cell">
                                        <div class="middle">${{$departure->price3}}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="cell">
                                        <div class="middle">
                                            <form action="{{ route('frontend-joinStep1',$tour->slug) }}">
                                                @csrf
                                                <input type="hidden" name="start_date" value="{{ $departure->start }}">
                                                <input type="hidden" name="end_date" value="{{ $departure->end }}">
                                                <input type="submit" class="btn btn-default" value="Join">
                                            </form>
                                        </button> 
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="ajaxloader" style="display: none; text-align: center">
                <i class="fa fa-spinner fa-spin" style="font-size:36px;"></i>
                <h4>Loading</h4>
            </div>
        </div>
        <!-- faq and review tab content -->
        <div role="tabpanel" class="tab-pane" id="tab04">
            <div class="row">
                <div class="col-md-6">
                    @if($tour->reviews->count() > 0)
                    <div class="header-box">
                        <span class="link-right">Based on {{$tour->reviews()->approved()->count()}}</span>
                        @if($tour->reviews()->approved()->count() > 0)
                        <span class="rate-left">
                         <strong class="title">Overall Rating</strong>
                         @if($tour->rating_cache > 0 && $tour->rating_count > 0)
                         <span class="star-rating">
                            @for ($i=1; $i <=5 ; $i++)
                            <span class="{{$i > $tour->rating_cache?'disable': ''}}"><span
                                class="icon-star"></span></span>
                                @endfor
                            </span>
                            <span class="value">{{$tour->rating_cache}}/5</span>
                            @endif
                        </span>
                        @endif
                    </div>
                    <div class="comments reviews-body">
                        <div class="comment-holder">
                            @foreach($tour->reviews as $review)
                            <div class="comment-slot">
                                <div class="thumb">
                                    <a href="#"><img src="{{$review->thumbnail}}" height="50"
                                       width="50"
                                       alt="image description"></a>
                                   </div>
                                   <div class="text">
                                    <header class="comment-head">
                                        <div class="left">
                                            <strong class="name">
                                                <a href="#">{{$review->title}}</a>
                                            </strong>
                                            <div class="meta">
                                                {{$review->fname.' '. $review->lname}} - Spain
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="star-rating">
                                                @for ($i=1; $i <=5 ; $i++)
                                                <span class="{{$i > $review->rating?'disable': ''}}"><span
                                                    class="icon-star"></span></span>
                                                    @endfor
                                                </div>
                                                <span class="value">{{$review->rating}}/5</span>
                                            </div>
                                        </header>
                                        <div class="des">
                                            {!! $review->content !!}
                                            <div class="link-holder">
                                                <span><p>Reviewed on {{ date('M j, Y', strtotime($review->created_at)) }}</p></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="link-more text-center">
                                @if($tour->reviews->count() > 3)
                                <a href="#">Show More Reviews</a>  
                                @endif
                            </div>
                        </div>                        
                        @else
                        <div class="header-box text-center">
                            <h4>No Reviews Found</h4>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        @include('frontend.partials._messages')
                        <form class="contact-form " method="POST" action="{{route('frontend-reviews.store')}}" data-parsley-validate>
                            @csrf
                            <fieldset>
                                <input type="hidden" name="tour_id" value="{{$tour->id}}">
                                <div class="form-group">
                                    <label for="fname">First name</label>
                                    <div class="input-wrap">
                                        <input type="text" class="form-control" id="fname" name="fname" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lname">Last name</label>
                                    <div class="input-wrap">
                                        <input type="text" class="form-control" id="lname" name="lname" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-wrap">
                                        <input type="text" class="form-control" id="email" name="email" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="holder">
                                        <label for="date1">Country</label>
                                        <div class="select-holder">
                                            <select class="trip dark"  name="country">
                                                @foreach($countries->all() as $country => $code)
                                                <option value="{{$code}}">{{$country}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Rating</label>
                                    <div class='starrr'></div>
                                    <br>
                                    <input type="hidden" name="rating" id="rating">
                                </div>
                                <div class="form-group">
                                    <label>Avatar</label>
                                    <input type="file" value="1" name="image" id="image"
                                    required>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <div class="input-wrap">
                                        <input type="text" class="form-control" id="title" name="title" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <div class="input-wrap">
                                        <textarea name="message" id="message" cols="30" rows="10"
                                        class="form-control" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6Lf-EWgUAAAAAPrL8AkSiLt6uDcIoUooBu21OZG_"></div>
                                </div>
                                <div class="form-group btn-holder review-btn-holder">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <div class="input-wrap">
                                            <input type="submit" id="btn_sent" value="Submit"
                                            class="btn btn-white">
                                            <p id="error_message"></p>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <!-- gallery tab content -->
            <div role="tabpanel" class="tab-pane" id="tab05">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        @foreach ($tour->slides->chunk(3) as $row)
                        <div class="row gallery-row">
                            @foreach($row as $slide)
                            <a href="{{ asset($slide->path1) }}" data-toggle="lightbox" data-height="450" data-width="750" data-gallery="example-gallery" class="col-sm-4">
                                <img src="{{ asset($slide->thumb) }}" class="img-fluid">
                            </a>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- recent block -->
    <aside class="recent-block recent-gray recent-wide-thumbnail">
        <div class="container">
            <h2 class="text-center text-uppercase">RECENTLY VIEWED</h2>
            <div class="row">
                @foreach($similars as $similar)
                <article class="col-sm-6 col-md-3 article">
                    <div class="thumbnail">
                        <h3 class="no-space"><a href="{{ route('frontend-tourDetail',$similar->slug) }}">{{ $similar->title }}</a></h3>
                        <strong class="info-title">@if(!empty($similar->region->name)), @endif {{ $similar->country->name }}</strong>
                        <div class="img-wrap">
                            <img src="{{ asset('$similar->featuredImage->path') }}" height="210" width="250"
                            alt="{{ $similar->title }}">    
                        </div>
                        <footer>
                            <div class="sub-info">
                                <span>{{ $similar->days }} Days</span>
                                <span>$ @if(!empty($similar->price3)) ${{ $similar->price3 }} @else {{ $similar->price1 }} @endif</span>
                            </div>

              </footer>
          </div>
      </article>
      @endforeach


  </div>
</div>
</aside>

</main>
@stop
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
@stop
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script src="{{asset('js/starrr.js')}}"></script>
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
            }),
            $('.starrr').starrr({
                change: function(e, value){
                    $("#rating").val(value);
                }
            }),
            $('#tabMenu a[href="#{{ old('tab') }}"]').tab('show'),
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    showArrows:true,
                    wrapping:false
                });
            })
        });
    }();
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js"></script>
@stop
