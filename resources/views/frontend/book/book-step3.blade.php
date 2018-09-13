@inject('countries','App\Http\Utilities\Country')
@extends('layouts.frontend')
@section('content')
<main id="main">
	<!-- top information area -->
	<div class="inner-top">
		<div class="container">
			<h1 class="inner-main-heading">Book | {{ $tour->title.'-'.$tour->days }} Days</h1>
			<!-- breadcrumb -->
			<nav class="breadcrumbs">
				<ul>
					<li><p>Step 3 of 3</p></li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="inner-main common-spacing container">
		<div class="demo-wrapper col-sm-10 col-sm-offset-1">
			<p> Thank you for submitting the booking form. Your necessary information has been forwarded to
				operations team and you will receive confirmation of recipient with trekking preparation guide
				and
				other necessary information like visa advice, medical requirements, equipments, payment detail,
				insurance and others. You will then be requested to provide us your flight and insurance detail
				soon.
				Required minimum deposit amount must be paid in advance to confirm your reservation.
				Confirmation
			will be shared when the deposited amount is entered in our bank account.</p>
		</div>
	</div>
	@php
	header( "refresh:10;url=/" );
	@endphp
</main>
@stop