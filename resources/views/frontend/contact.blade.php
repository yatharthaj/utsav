@extends('layouts.frontend')
@section('content')
<!-- main banner -->
<section class="banner banner-inner parallax" data-stellar-background-ratio="0.5" id="banner-contact">
	<div class="banner-text">
		<div class="center-text">
			<div class="container">
				<h1>Contact Us</h1>
				<strong class="subtitle">The most detailed and modern Adventure theme!</strong>
				<!-- breadcrumb -->
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">HOME</a></li>
						<li><span>contact US</span></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- main container -->
<main id="main">
	<!-- main contact information block -->
	<div class="content-block bg-white">
		<div class="container">
			<header class="content-heading">
				<h2 class="main-heading">get in touch</h2>
				<strong class="main-subtitle">Contact us by email, phone or through our web form below.</strong>
				<div class="seperator"></div>
			</header>
			<div class="contact-info row">
				<div class="col-sm-4">
					<span class="tel has-border">
						<span class="icon-tel-big"></span>
						<a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
					</span>								
				</div>
				<div class="col-sm-4">
					<span class="tel has-border bg-blue add-icon">
						<i class="fa fa-mobile"></i>
						<a href="tel:{{ $contact->mobile }}">{{ $contact->mobile }}</a>
					</span>								
				</div>
				<div class="col-sm-4">
					<span class="tel has-border add-icon">
						<i class="fa fa-whatsapp"></i>
						<a href="tel:{{ $contact->mobile }}">{{ $contact->mobile }}</a>
					</span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 wow fadeInLeft">
					@include('frontend.partials._messages')
					<!-- main contact form -->
					<form class="contact-form has-border" id="contact_form" method="POST" action="{{ route('frontend-postContact') }}" data-parsley-validate>
						@csrf
						<fieldset>
							<div class="form-group">
								<div class="col-sm-4">
									<strong class="form-title"><label for="fname">First name</label></strong>
								</div>
								<div class="col-sm-8">
									<div class="input-wrap">
										<input type="text" class="form-control" id="fname" name="fname" required="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<strong class="form-title"><label for="lname">Last name</label></strong>
								</div>
								<div class="col-sm-8">
									<div class="input-wrap">
										<input type="text" class="form-control" id="lname" name="lname" required="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<strong class="form-title"><label for="con_email">Email</label></strong>
								</div>
								<div class="col-sm-8">
									<div class="input-wrap">
										<input type="email" class="form-control" id="con_email" name="email" required="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<strong class="form-title"><label for="subject">Subject</label></strong>
								</div>
								<div class="col-sm-8">
									<div class="input-wrap">
										<input type="text" class="form-control" id="subject" name="subject" required="">
									</div>
								</div>
							</div>							
							<div class="form-group">
								<div class="col-sm-4">
									<strong class="form-title"><label for="con_message">Message</label></strong>
								</div>
								<div class="col-sm-8">
									<div class="input-wrap">
										<textarea cols="30" rows="10" class="form-control" id="con_message" name="message" required=""></textarea>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-8 col-sm-offset-2">
									<div class="g-recaptcha" data-sitekey="6Lf-EWgUAAAAAPrL8AkSiLt6uDcIoUooBu21OZG_"></div>
								</div>
							</div>
							<div class="form-group btn-holder">
								<div class="col-sm-4">&nbsp;</div>
								<div class="col-sm-8">
									<div class="input-wrap">
										<input type="submit" id="btn_sent" value="Send enquiry" class="btn btn-white">
										<p id="error_message"> </p>
									</div>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
				<div class="col-md-6 map-col-main wow fadeInRight">
					<!-- google map  -->
					<div class="map-holder">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5465.157030628598!2d-73.96073921239335!3d40.77310095275902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c258957b88f9ed%3A0xac6ddf195a5da77a!2s77+St!5e0!3m2!1sne!2snp!4v1449890237045" width="600" height="670" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- partner list -->
	@include('frontend.partials._partners')
</main>
@stop
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
@stop