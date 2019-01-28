<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favion -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/img/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <title>Ski Guides Nepal</title>
    <meta name="description" content="Striving to be the Nepal's only most Eco-Friendly Ski Touring and splitboarding company !"/>
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@skiguidesnepal">
    <meta name="twitter:title" content="@yield('title','Ski Guides Nepal | The Spirit Of Ski Touring ')">
    <meta name="twitter:description" content="@yield('description','Striving to be the Nepal\'s only most Eco-Friendly Ski Touring and splitboarding company !')">
    <meta name="twitter:creator" content="@skiguidesnepal">
    <meta name="twitter:image" content="{{ asset('assets/img/apple-icon-180x180.png') }}">
    @yield('twitter')
    <!-- Open Graph data -->
    <meta property="og:title" content="@yield('title','Ski Guides Nepal | The Spirit Of Ski Touring')" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('assets/img/apple-icon-180x180.png') }}" />
    <meta property="og:description" content="@yield('description','Striving to be the Nepal\'s only most Eco-Friendly Ski Touring and splitboarding company !')" />
    <meta property="og:site_name" content="Ski Guides Nepal" />
    @yield('og')
    <meta property="fb:admins" content="1866005243639101" /> {{-- twitter card end --}}
    @yield('page-meta')
    @yield('product-meta')

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css"
          integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('styles')
</head>