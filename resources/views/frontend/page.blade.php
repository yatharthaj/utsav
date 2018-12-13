@section('page-meta')
	@include('backend.partials._page-meta')
@stop
@section('title')Nepal Ski Guides | {!! $datas->title !!}@endsection
@section('desscription'){{$datas->description}}@endsection
@extends('layouts.frontend')
@section('content')
	<!-- image start -->
	<div class="about-parallax" style="background-image: url('https://source.unsplash.com/1200x640/?mail');">

	</div>



	<!-- image end -->
	<!-- content start -->
	<div class="container">
		<h2 class="content-title center">{{$datas->title}}</h2>
		{!! $datas->page_content !!}
	</div>

	<!-- content end -->
	<script>
        $(document).ready(function(){
            $('.parallax').parallax();
        });
	</script>

@stop