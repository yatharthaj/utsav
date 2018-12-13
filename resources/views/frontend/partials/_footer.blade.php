{{--<footer id="footer">--}}
    {{--<div class="container">--}}
        {{--<!-- footer links -->--}}
        {{--<div class="row footer-holder">--}}
            {{--<nav class="col-sm-4 col-lg-3 footer-nav">--}}
                {{--<h3>Destinations</h3>--}}
                {{--<ul class="slide">--}}
                    {{--@if(!empty($fcountries))--}}
                    {{--@foreach($fcountries as $country)--}}
                    {{--<li><a href="#">{{ $country->name }}</a></li>--}}
                    {{--@endforeach--}}
                    {{--@endif--}}
                {{--</ul>--}}
            {{--</nav>      --}}
            {{--<nav class="col-sm-4 col-lg-3 footer-nav">--}}
                {{--<h3>Activities</h3>--}}
                {{--<ul class="slide">--}}
                    {{--@if(!empty($factivities))--}}
                    {{--@foreach($factivities as $activity)--}}
                    {{--<li><a href="#">{{ $activity->name }}</a></li>--}}
                    {{--@endforeach--}}
                    {{--@endif--}}
                {{--</ul>--}}
            {{--</nav>                  --}}
            {{--<nav class="col-sm-4 col-lg-3 footer-nav active">--}}
                {{--<h3>About</h3>--}}
                {{--<ul class="slide">--}}
                    {{--@if(!empty($fpages))--}}
                    {{--@foreach($fpages as $page)--}}
                    {{--<li><a href="#">{{ $page->title }}</a></li>--}}
                    {{--@endforeach--}}
                    {{--@endif--}}
                {{--</ul>--}}
            {{--</nav>--}}
            {{--<nav class="col-sm-4 col-lg-3 footer-nav last">--}}
                 {{--@if(!empty($fcontact))--}}
                {{--<h3>contact {{ $fcontact->site_name}}</h3>--}}
                {{--<ul class="slide address-block">--}}
                    {{--<li class="wrap-text"><span class="icon-tel"></span> <a href="tel:{{ $fcontact->phone }}">{{ $fcontact->phone }}</a></li>--}}
                    {{--<li class="wrap-text"><span class="icon-fax"></span> <a href="tel:{{ $fcontact->mobile }}">{{ $fcontact->mobile }}</a></li>--}}
                    {{--<li class="wrap-text"><span class="icon-email"></span> <a href="mailto:{{ $fcontact->email }}">{{ $fcontact->email }}</a></li>--}}
                    {{--<li><span class="icon-home"></span> <address>{{ $fcontact->address .','. $fcontact->city }}</address></li>--}}
                {{--</ul>--}}
                {{--@endif--}}
            {{--</nav>--}}
        {{--</div>--}}
        {{--<!-- social wrap -->--}}
        {{--<ul class="social-wrap">--}}
            {{--<li class="facebook"><a href="{{$fcontact->facebook}}">--}}
                    {{--<span class="icon-facebook"></span>--}}
                    {{--<strong class="txt">Like Us</strong>--}}
                {{--</a></li>--}}
            {{--<li class="twitter"><a href="{{$fcontact->twitter}}">--}}
                    {{--<span class="icon-twitter"></span>--}}
                    {{--<strong class="txt">Follow On</strong>--}}
                {{--</a></li>--}}
            {{--<li class="insta"><a href="{{$fcontact->instagram}}">--}}
                    {{--<span class="fa fa-instagram"></span>--}}
                    {{--<strong class="txt">Follow Us</strong>--}}
                {{--</a></li>--}}
            {{--<li class="youtube"><a href="{{$fcontact->youtube}}">--}}
                    {{--<span class="fa fa-youtube"></span>--}}
                    {{--<strong class="txt">Subscribe on Youtube</strong>--}}
                {{--</a></li>--}}
            {{--<li class="google-plus"><a href="{{$fcontact->googleplus}}">--}}
                    {{--<span class="icon-google-plus"></span>--}}
                    {{--<strong class="txt">+1 On Google</strong>--}}
                {{--</a></li>--}}
            {{--<li class="pin"><a href="#">--}}
                    {{--<span class="icon-pin"></span>--}}
                    {{--<strong class="txt">Pin It</strong>--}}
                {{--</a></li>--}}
        {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="footer-bottom">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-6">--}}
                    {{--<!-- copyright -->--}}
                    {{--<strong class="copyright"><i class="fa fa-copyright"></i> Copyright {{ date('Y') }}</strong>--}}
                    {{--Nepal Ski Guides--}}
                {{--</div>--}}
                {{--<div class="col-lg-6">--}}
                    {{--<ul class="payment-option">--}}
                        {{--<li>--}}
                            {{--<img src="{{ asset('img/footer/visa.png') }}" alt="visa">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<img src="{{ asset('img/footer/mastercard.png') }}" height="20" width="33" alt="master card">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<img src="{{ asset('img/footer/paypal.png') }}" height="20" width="72" alt="paypal">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<img src="{{ asset('img/footer/maestro.png') }}" height="20" width="33" alt="maestro">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<img src="{{ asset('img/footer/bank-transfer.png') }}" height="20" width="55" alt="bank transfer">--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</footer>--}}
<!-- footer start -->
<footer class="page-footer scooter darken-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col  s12 m3 l3">
                <h6 class="white-text">Destinations</h6>
                <ul class="footer-links">
                    @if(!empty($fcountries))
                    @foreach($fcountries as $country)
                    <li><a href="#" class="white-text">{{ $country->name }}</a></li>
                    @endforeach
                    @endif
                </ul>
            </div>
            <div class="col s12 m3 l3">
                <h6 class="white-text">Activities</h6>
                <ul class="footer-links">
                    @if(!empty($factivities))
                    @foreach($factivities as $activity)
                    <li><a href="#" class="white-text">{{ $activity->name }}</a></li>
                    @endforeach
                    @endif
                </ul>
            </div>
            <div class="col s12 m3 l3">
                <h6 class="white-text">About</h6>
                <ul class="footer-links">
                    @if(!empty($fpages))
                    @foreach($fpages as $page)
                    <li><a href="{{route('frontend-page',[$page->category->slug,$page->slug])}}" class="white-text">{{ $page->title }}</a></li>
                    @endforeach
                    @endif
                </ul>
            </div>
            <div class="col s12 m3 l3">
                <h6 class="white-text">Contact Nepal Ski Guides</h6>
                <ul class="footer-contact">
                    <li><i class="fas fa-phone"></i><a class="grey-text text-lighten-3 " href="#!">{{ $fcontact->phone }}</a></li>
                    <li><i class="fas fa-mobile-alt"></i><a class="grey-text text-lighten-3 " href="#!"> {{ $fcontact->mobile }}</a></li>
                    <li><i class="fas fa-envelope-open"></i><a class="grey-text text-lighten-3 " href="#!">{{ $fcontact->email }}</a></li>
                    <li><i class="fas fa-home"></i><a class="grey-text text-lighten-3 " href="#!">{{ $fcontact->address .','. $fcontact->city }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <a class="grey-text text-lighten-4 left uk-margin-left" href="{{$fcontact->facebook}}"><i class="fab fa-facebook"></i></a>
            <a class="grey-text text-lighten-4 left uk-margin-left" href="{{$fcontact->twitter}}"><i class="fab fa-twitter"></i></a>
            <a class="grey-text text-lighten-4 left uk-margin-left" href="{{$fcontact->instagram}}"><i class="fab fa-instagram"></i></a>
            <a class="grey-text text-lighten-4 right uk-margin-right" >   ©  Copyright 2018 Nepal Ski Guides</a>
        </div>
    </div>


</footer>

<!-- footer end -->