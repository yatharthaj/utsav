
<footer class="page-footer scooter darken-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col s12 m4 l4">
                <h6 class="white-text">Contact Ski Guides Nepal</h6>
                <ul class="footer-contact">
                    <li><i class="fas fa-phone"></i><a class="grey-text text-lighten-3 " href="#!">{{ $fcontact->phone }}</a></li>
                    <li><i class="fas fa-mobile-alt"></i><a class="grey-text text-lighten-3 " href="#!"> {{ $fcontact->mobile }}</a></li>
                    <li><i class="fas fa-envelope-open"></i><a class="grey-text text-lighten-3 " href="#!">{{ $fcontact->email }}</a></li>
                    <li><i class="fas fa-home"></i><a class="grey-text text-lighten-3 " href="#!">{{ $fcontact->address .','. $fcontact->city }}</a></li>
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
         {{--        <h6 class="white-text">Destinations</h6>
                <ul class="footer-links">
                    @if(!empty($fcountries))
                    @foreach($fcountries as $country)
                    <li><a href="#" class="white-text">{{ $country->name }}</a></li>
                    @endforeach
                    @endif
                </ul> --}}
                <div class="row">
                    <div class="col s12 m6 l3">
                        <img  width="80" src="{{ asset('img/Nepal-Toursim-Board.jpg') }}">
                    </div>
                    <div class="col s12 m6 l3">
                        <img  width="80" src="{{ asset('img/nsff.jpg') }}">
                    </div>
                    <div class="col s12 m6 l3">
                        <img  width="80" src="{{ asset('img/NMA.png') }}">
                    </div>
                    <div class="col s12 m6 l3">
                        <img  width="80" src="{{ asset('img/nep-gov.png') }}">
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <a class="grey-text text-lighten-4 left uk-margin-left" href="{{$fcontact->facebook}}"><i class="fab fa-facebook"></i></a>
            <a class="grey-text text-lighten-4 left uk-margin-left" href="{{$fcontact->twitter}}"><i class="fab fa-twitter"></i></a>
            <a class="grey-text text-lighten-4 left uk-margin-left" href="{{$fcontact->instagram}}"><i class="fab fa-instagram"></i></a>
            <a class="grey-text text-lighten-4 right uk-margin-right" >   ©  Copyright 2018  Ski Guides Nepal</a>
        </div>
    </div>


</footer>

<!-- footer end -->