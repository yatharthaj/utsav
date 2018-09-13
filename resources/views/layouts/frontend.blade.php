<!DOCTYPE html>
<html>
@include('frontend.partials._head')
<body class="default-page">
<!-- main wrapper -->
<div id="wrapper">
    <div class="page-wrapper">
        <!-- main header -->
    @include('frontend.partials._nav')
    <!-- main banner -->
        @yield('content')
    </div>
    <!-- main footer -->
    @include('frontend.partials._footer')
</div>
<!-- scroll to top -->
<div class="scroll-holder text-center">
    <a href="javascript:" id="scroll-to-top"><i class="icon-arrow-down"></i></a>
</div>
</body>
<!-- jquery library -->
@include('frontend.partials._javascripts')
@yield('scripts')
</html>