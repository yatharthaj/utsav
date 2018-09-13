<footer id="footer">
    <div class="container">
        <!-- footer links -->
        <div class="row footer-holder">
            <nav class="col-sm-4 col-lg-3 footer-nav">
                <h3>Destinations</h3>
                <ul class="slide">
                    @foreach($fcountries as $country)
                    <li><a href="#">{{ $country->name }}</a></li>
                    @endforeach
                </ul>
            </nav>      
            <nav class="col-sm-4 col-lg-3 footer-nav">
                <h3>Activities</h3>
                <ul class="slide">
                    @foreach($factivities as $activity)
                    <li><a href="#">{{ $activity->name }}</a></li>
                    @endforeach
                </ul>
            </nav>                  
            <nav class="col-sm-4 col-lg-3 footer-nav active">
                <h3>About</h3>
                <ul class="slide">
                    @foreach($fpages as $page)
                    <li><a href="#">{{ $page->title }}</a></li>
                    @endforeach
                </ul>
            </nav>
            <nav class="col-sm-4 col-lg-3 footer-nav last">
                <h3>contact {{ $fcontact->site_name}}</h3>
                <ul class="slide address-block">
                    <li class="wrap-text"><span class="icon-tel"></span> <a href="tel:{{ $fcontact->phone }}">{{ $fcontact->phone }}</a></li>
                    <li class="wrap-text"><span class="icon-fax"></span> <a href="tel:{{ $fcontact->mobile }}">{{ $fcontact->mobile }}</a></li>
                    <li class="wrap-text"><span class="icon-email"></span> <a href="mailto:{{ $fcontact->email }}">{{ $fcontact->email }}</a></li>
                    <li><span class="icon-home"></span> <address>{{ $fcontact->address .','. $fcontact->city }}</address></li>
                </ul>
            </nav>
        </div>
        <!-- social wrap -->
        <ul class="social-wrap">
            <li class="facebook"><a href="#">
                    <span class="icon-facebook"></span>
                    <strong class="txt">Like Us</strong>
                </a></li>
            <li class="twitter"><a href="#">
                    <span class="icon-twitter"></span>
                    <strong class="txt">Follow On</strong>
                </a></li>
            <li class="google-plus"><a href="#">
                    <span class="icon-google-plus"></span>
                    <strong class="txt">+1 On Google</strong>
                </a></li>
            <li class="insta"><a href="#">
                    <span class="fa fa-instagram"></span>
                    <strong class="txt">Share At</strong>
                </a></li>
            <li class="pin"><a href="#">
                    <span class="icon-pin"></span>
                    <strong class="txt">Pin It</strong>
                </a></li>
            <li class="dribble"><a href="#">
                    <span class="icon-dribble"></span>
                    <strong class="txt">Dribbble</strong>
                </a></li>
        </ul>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- copyright -->
                    <strong class="copyright"><i class="fa fa-copyright"></i> Copyright 2016 - Entrada - An Adventure Theme - by  <a href="#">Waituk</a></strong>
                </div>
                <div class="col-lg-6">
                    <ul class="payment-option">
                        <li>
                            <img src="{{ asset('img/footer/visa.png') }}" alt="visa">
                        </li>
                        <li>
                            <img src="{{ asset('img/footer/mastercard.png') }}" height="20" width="33" alt="master card">
                        </li>
                        <li>
                            <img src="{{ asset('img/footer/paypal.png') }}" height="20" width="72" alt="paypal">
                        </li>
                        <li>
                            <img src="{{ asset('img/footer/maestro.png') }}" height="20" width="33" alt="maestro">
                        </li>
                        <li>
                            <img src="{{ asset('img/footer/bank-transfer.png') }}" height="20" width="55" alt="bank transfer">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>