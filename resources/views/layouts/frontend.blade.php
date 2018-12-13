{{--<!doctype html>--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" itemscope itemtype="http://schema.org/Product">
@include('frontend.partials._head')
<body>
<a id="button"></a>
@include('frontend.partials._nav')
@yield('content')
@include('frontend.partials._footer')
</body>
<!-- Compiled and minified JavaScript -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('js/mega-menu.js')}}"></script>
@yield('scripts')
@include('frontend.partials._message')
</html>
