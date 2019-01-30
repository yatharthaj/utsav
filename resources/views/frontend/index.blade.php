@extends('layouts.frontend')
@section('content')
@if(!empty($slides))
<div class="owl-carousel owl-theme home-slider">
    @foreach($slides as $slide)
    <img class="item responsive-img" src="{{ asset($slide->path) }}" alt="">
    @endforeach
</div>
@endif

<!-- heading start -->
<div class="container-fluid heading-wrapper">
    <h3 class="center-align heading-title">SPLASH RESPONSIBLE TRAVEL ALL OVER</h3>
    <p class="center-align uk-margin-medium-bottom heading-para"><i>Striving to be the Nepal's only most Eco-Friendly Ski
    Touring Experience !</i></p>
</div>
<!--heading end  -->
<!-- content start -->
<div class="container-fluid">
    <div class="row symbol">
        <div class="col s12 m4 l4 center-align feature-wrapper">
            <div class="featured-sustain"></div>
            <h5 class="center-align">Sustainable Tourism</h5>
            <p class="center-align">We believe a small effort towards the betterment of community can contribute a
                lot to environment. As a responsible operator we strongly emphasis on cultural and economic
            sustainability.</p>

        </div>
        <div class="col s12 m4 l4 center-align feature-wrapper">
            <div class="featured-adventure"></div>
            <h5 class="center-align">Adventure Tourism</h5>
            <p class="center-align">We try to go extra miles & redefine the dimension of adventure tourism in Nepal.
            We bing the trend of the outdoors ski tourism in Nepal.</p>

        </div>
        <div class="col s12 m4 l4 center-align feature-wrapper">
            <div class="featured-ski"></div>
            <h5 class="center-align">Authentic Ski Tours</h5>
            <p class="center-align">We believe tourism should be experience locally.
            We offered Ski touring in the landscape of High Altitude Himalayas.</p>
        </div>

    </div>
</div>
<div class="container-fluid trip-wrapper">
    <div class="row">
        <div class="col s12 m6 l6 cat">
            @include('frontend.partials._tripadvisor')
        </div>
        <div class="col s12 m6 l6 intro Uk-margin-remove">
            <h3 class="center-align">Crafted Ski Tours - Lasting Memories</h3>
            <p>We seek to promote the skiing culture in Nepal in days to come. apart from mainstream treks, Skiing
                Is complete new recreation activity in Nepal however, we have witnessed professional skiers who
                successfully accomplished skiing activity in the Himalayas. Nepal and its Himalayas have good
                potential to attract passionate travelers, who wish to hit slopes of Nepal once in a lifetime.
                Realizing The possibility of new adventure sports to the Native land of Himalayas, Ski Guides Nepal
            Is Formed.</p>
            <div class="center-align">
                <a class="waves-effect waves-light btn-large intro-button" href="/about/hear-our-story">Read more..</a>
            </div>
        </div>
    </div>
</div>
<!-- content end -->
<!-- Special block start -->
{{-- @if(!empty($offer->message)) --}}
<div class="parallax-container center valign-wrapper" id="offer">
    <div class="parallax"><img
        src="{{asset('img/banner/annapurna.jpg')}}">
    </div>

    <div class="container white-text">
        <div class="row">
            <div class="col s12">
                <h5>{{$offer->message}}</h5>
            </div>
        </div>
    </div>
</div>
{{-- @endif --}}
<!-- Special block start -->
<div class="container-fluid  heading-wrapper">
    <h3 class="center-align heading-title">TOP ADVENTURES</h3>
    <p class="center-align heading-para">Our collection of the most popular adventures in 2018</p>
    <hr>
</div>
<!-- package start -->
<div class="container-fluid package-wrapper">
    <div class="row">
        @foreach($featured as $tour)
        <div class="col s12 m4 l4">
            <div class="card">
                <div class="card-image">
                     <a href="{{ route('frontend-tourDetail',[$tour->slug]) }}"><img src="{{$tour->featuredImage->thumbnail}}" class="responsive-img"></a>
                    <div class="featured-price white-text">
                        <span><sup>USD</sup>
                            @if(!empty($tour->price2))
                            {{ $tour->price2 }}
                            @else
                            {{ $tour->price }}
                        @endif </span>
                    </div>
                </div>
                <div class="card-content package-meta">
                    <a href="{{ route('frontend-tourDetail',[$tour->slug]) }}"
                     class="card-title uk-margin-remove-vertical" id="package-title">{{$tour->title}}</a>
                     <div class="unit">
                        <span class="left"><i class="far fa-calendar-alt"></i> {{$tour->days}} Days</span>
                        <span class="rating-wrapper right">
                            <i class="material-icons review-star">star</i>
                            <i class="material-icons review-star">star</i>
                            <i class="material-icons review-star">star</i>
                            <i class="material-icons review-star">star</i>
                            <i class="material-icons review-star">star</i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
{{-- trip of the month start --}}
@if(!empty($month))
<section class="tofm-wrapper">
    <div class="container-fluid tofm-wrap ">
        <div class="row center-align heading-wrapper">
            <h3 class="uk-margin-remove heading-title">Trip of the month</h3>
        </div>
        <div class="row">
            <div class="col s12 m6 l6 uk-padding-removel" id="tofm-img-wrapper">
                <img class="responsive-img" src="{{asset($month->tour->featuredImage->path)}}"
                alt="{{$month->tour->title}}">
            </div>
            <div class="col s12 m6 l6">
                <h3 class="center-align">{{$month->tour->title}}</h3>
                <p class="flow-text uk-margin-left ">
                    {!! $month->tour->description !!}
                </p>
                <div class="show-on-medium-and-down">
                    <div class="tofm-meta-wrapper  uk-margin-remove-vertical">
                        <div class="col s12 m4 l4 uk-margin-small-top">
                            <div class="col s6 m4 l4">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                            <div class="col s6 m8 l8">
                                <p class="uk-margin-remove-vertical dodger-blue-text darken-1">Duration</p>
                                <span>
                                    {{$month->tour->days}} Days
                                </span>
                            </div>
                        </div>
                        <div class="col s12 m4 l4 uk-margin-small-top">
                            <div class="col s6 m4 l4">
                                <i class="fas fa-signal"></i>
                            </div>
                            <div class="col s6 m8 l8">
                                <p class="uk-margin-remove-vertical dodger-blue-text darken-1">Trip Level</p>
                                <span>
                                    {{$month->tour->difficulty->name}}
                                </span>
                            </div>
                        </div>
                        <div class="col s12 m4 l4 uk-margin-small-top">
                            <div class="col s6 m4 l4">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="col s6 m8 l8">
                                <p class="uk-margin-remove-vertical dodger-blue-text darken-1">Trip Price</p>
                                <span>
                                    USD
                                    @if(empty($month->tour->price2))
                                    {{$month->tour->price}}
                                    @else
                                    {{$month->tour->price2}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="center-align heading-button uk-padding-large uk-margin-medium-bottom">
                            <a class="waves-effect waves-light btn btn-large tofm-meta-wrapper-buttom"
                            href="{{ route('frontend-tourDetail',[$month->tour->slug]) }}">Discover</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
{{-- trip of the month end --}}

{{-- youtube,instagram start--}}
<section class="social">
    <div class="row social-row">
        <div class="col s12 m6 l6 uk-padding-remove heading-wrapper social-col" id="insta-wrapper">
            <h3 class="center-align heading-title">#skiguidesnepal</h3>
            @foreach(array_chunk($feeds->all() ,3) as $row)
            <div class="row insta-row">
                @foreach($row as $feed)
                <div class="col s4 m4 l4">
                    <img class="responsive-img" src="{{$feed->link}}" alt="{{$feed->caption}}">
                </div>
                @endforeach
            </div>
            @endforeach

        </div>
        <div class="col s12 m6 l6 heading-wrapper " id="youtube-wrapper">
            <h3 class="center-align heading-title"> Ski Guides Nepal Stories</h3>
            <div class="video-container">
                <iframe width="853" height="640" src="https://www.youtube.com/embed/7ZXWtxc5Xxk" frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
{{-- youtube,instagram end--}}
@include('frontend.partials._media')
@stop

