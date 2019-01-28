@extends('layouts.frontend')
@section('content')
    <!-- parallex-image start -->
    <div class="contact-parallax" style="background-image: url('https://source.unsplash.com/1200x640/?mail');">
    </div>

    <!-- parallex image end -->
    <!-- title start -->
    <div class="container center">
        <h2>GET IN TOUCH</h2>
        <p><i>Contact us by email, phone or through our web form below.</i></p>
    </div>
    <!-- title end -->
    <!-- form start -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col s12 m8 l8">
                    <form method="POST" action="{{ route('frontend-postContact') }}">
                        @csrf
                        <div class="row">
                            <div class="form-field col s12"
                            ">
                            <label for="full_name">Full Name</label>
                            <input type="text" id="full_name" name="fullName" required>
                        </div>
                        <div class="row">
                            <div class="form-field col s12"
                            ">
                            <label for="email">Email</label>
                            <input type="email" id="email" required name="email">
                        </div>
                        <div class="row">
                            <div class="form-field col s12"
                            ">
                            <label for="number">Phone Number</label>
                            <input type="text" id="number" class="phone">
                        </div>
                        <div class="row">
                            <div class="form-field col s12"
                            ">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" required name="subject">
                        </div>
                        <div class="row">
                            <div class="form-field col s12"
                            ">
                            <label for="message">Message</label>
                            <textarea id="textarea1" class="materialize-textarea" cols="30" rows="10" required
                                      name="contactMessage"></textarea>
                        </div>
                        {{--gcaptcha start--}}
                        <div class="row">
                            <div class="form-field col s12">
                                <div class="g-recaptcha" data-sitekey="6Lfg0oUUAAAAAIWHzy2gRUwf7WgtoXToFt7HW24N"></div>
                            </div>
                        </div>
                        {{--gcaptcha end--}}
                        <div class="row">
                            <div class="form-field col s12">
                                <button class="btn-large waves-effect book" type="submit">Send <i class="material-icons right">send</i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col s12 m4 l4">
                    <h6 class="white-text"> Ski Guides Nepal</h6>
                    <ul class="footer-contact">
                        <li><i class="fas fa-phone"></i><a class="grey-text text-lighten-3 " href="#!">{{ $fcontact->phone }}</a></li>
                        <li><i class="fas fa-mobile-alt"></i><a class="grey-text text-lighten-3 " href="#!"> {{ $fcontact->mobile }}</a></li>
                        <li><i class="fas fa-envelope-open"></i><a class="grey-text text-lighten-3 " href="#!">{{ $fcontact->email }}</a></li>
                        <li><i class="fas fa-home"></i><a class="grey-text text-lighten-3 " href="#!">{{ $fcontact->address .','. $fcontact->city }}</a></li>
                    </ul>
                </div>
            </div>
           
        </div>
    </section>
    <!-- form end -->
    <!-- google map start -->
    <div class="map-wrapper">
        <div style="width: 100%">
            <iframe width="100%" height="600"
                    src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=ski%20guides%20nepal+(Nepal%20Ski%20Guides)&amp;ie=UTF8&amp;t=&amp;z=15&amp;iwloc=B&amp;output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
    </div>
    <!-- googlr map end -->
@stop
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
@stop