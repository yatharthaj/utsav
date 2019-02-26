
<footer class="page-footer scooter darken-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m4 l4">
                <h6 class="white-text">Contact Ski Guides Nepal</h6>
                <ul class="footer-contact">
                    <li><i class="fas fa-phone"></i>{{ $fcontact->phone }}</li>
                    <li><i class="fas fa-mobile-alt"></i> {{ $fcontact->mobile }}</li>
                    <li><i class="fas fa-envelope-open"></i>{{ $fcontact->email }}</li>
                    <li><i class="fas fa-home"></i>{{ $fcontact->address .','. $fcontact->city }}</li>
                </ul>
            </div>

            <div class="col s12 m4 l4">
                <h6 class="white-text">About</h6>
                <ul class="footer-links">
                    @if(!empty($fpages))
                    @foreach($fpages as $page)
                    <li><a href="{{route('frontend-page',[$page->category->slug,$page->slug])}}" class="white-text">{{ $page->title }}</a></li>
                    @endforeach
                    @endif
                </ul>
            </div>
            <div class="col  s12 m4 l4">
                <div class="row">
                    <h6>We are affliated to:</h6>
                    <div class="col s6 m6 l3">
                        <img  width="62" src="{{ asset('img/govski.png') }}">
                    </div>
                    <div class="col s6 m6 l3">
                        <img  width="62" src="{{ asset('img/ctaan.jpg') }}">
                    </div>
                    <div class="col s6 m6 l3">
                        <img  width="62" src="{{ asset('img/nmaski.png') }}">
                    </div>
                    <div class="col s6 m6 l3">
                        <img  width="62" src="{{ asset('img/ntbski.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <a class="grey-text text-lighten-4 left uk-margin-left" target="_blank" href="{{$fcontact->facebook}}"><i class="fab fa-facebook"></i></a>
            <a class="grey-text text-lighten-4 left uk-margin-left"  target="_blank"  href="{{$fcontact->twitter}}"><i class="fab fa-twitter"></i></a>
            <a class="grey-text text-lighten-4 left uk-margin-left"   target="_blank" href="{{$fcontact->instagram}}"><i class="fab fa-instagram"></i></a>
            <a class="grey-text text-lighten-4 right uk-margin-right" >   ©  Copyright 2018  Ski Guides Nepal</a>
        </div>
    </div>


</footer>

<!-- footer end -->
