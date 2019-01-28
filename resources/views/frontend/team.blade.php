@extends('layouts.frontend')
@section('content')
    <!--image start  -->
    <div class="team-parallax" style="background-image: url('https://source.unsplash.com/1200x640/?mail');">
    </div>
    <!-- image end -->
    <!-- content start -->
    <div class="container">
        <h2 class="content-title center">About Us</h2>
        <p>We don't make our team, we make our team better"
            Being Nepal's only Most Eco-Friendly Ski tour operator we are able to bring you with
            the most exciting outdoor adventure for the first time in Nepal. We believe our success
            should remain at Home so we want your time spent the most ideal way that is possible.
            Our dedicated team of professionals always try to go an extra mile to help get most out
            form Skiing in Nepal. We can proudly say no company has more first-hand knowledge of
            skiing & its potential in Nepal.</p>
        <p>
            We strongly promote our collection of adventure experience to millions of customers out
            there who want to get their hands-on Backcountry skiing. With the right pricing &
            options available we are pretty sure our tours will suit your needs.
            We have world-class ski instructor to achieve success gliding down the slopes of Nepal
            so we assure that our plans are complete- just keep your heads up while our team will
            sort a perfect outdoor activity for you.</p>
    </div>
    <!-- content end -->

    <!-- Our Team START -->
    {{--     <div id="team" class="col s12">
            <div class="container uk-padding">
                <h5 class="center-align">Our Team</h5>
                @foreach($members as $member)
                    <div class="row review-wrapper">
                        <div class="col s3 m3 l3">
                            <img src="{{asset($member->photo)}}" alt="" class="responsive-img">
                        </div>
                        <div class="col s9 m9 l9">
                            <span class="review-title"><b>{{$member->name}}</b>, </span><i>{{$member->position}}</i><span></span>
                            <p class="review-content">
                                {!! $member->description !!}
                            </p>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div> --}}
    <!-- REVIEW END -->
    <div class="container">
        <div class="row uk-padding uk-padding-bottom">
            <h5 class="center-align">Our Team</h5>
            @foreach($members as $member)
                <div class="col s12 m4 l4 ">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{asset($member->photo)}}" class="responsive-img">

                        </div>
                        <div class="card-content">
                            <span class="review-title"><b>{{$member->name}}</b>, </span>
                            <span><i>{{$member->position}}</i></span>
                        </div>
                        <div class="card-action center-align">
                    <span class="" style="font-size: 24px;">
                        @if(!empty($member->fb))
                            <a href="{{$member->fb}}"  target="_blank" class="fab fa-facebook"></a>
                        @endif
                        @if(!empty($member->insta))
                            <a href="{{$member->insta}}"  target="_blank" class="fab fa-instagram"></a>
                        @endif
                        @if(!empty($member->linked))
                            <a href="{{$member->linked}}"  target="_blank" class="fab fa-linkedin"></a>
                        @endif
                    </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('frontend.partials._media')
@stop