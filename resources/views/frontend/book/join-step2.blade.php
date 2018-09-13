@inject('countries','App\Http\Utilities\Country')
@extends('layouts.frontend')
@section('content')
<main id="main">
	<!-- top information area -->
	<div class="inner-top">
		<div class="container">
			<h1 class="inner-main-heading">Join | {{ $tour->title.'-'.$tour->days }} Days</h1>
			<!-- breadcrumb -->
			<nav class="breadcrumbs">
				<ul>
					<li><p>Step 2 of 3</p></li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="inner-main common-spacing container">
		<div class="demo-wrapper col-sm-8 col-sm-offset-2 well">
			@include('frontend.partials._messages')
			<h4>Book {{ $tour->title }} for {{ $request->pax }} people</h4>
			<h2 style="margin-bottom: 15px;">Lead Traveller Details</h2>
			<form action="{{ route('frontend-joinStep3',$tour->slug) }}" method="POST" data-parsley-validate>
				@csrf
				<fieldset>
					<input type="hidden" name="tour_id" value="{{$tour->id}}">
					<input type="hidden" name="start" value="{{$request->start}}">
					<input type="hidden" name="end" value="{{$request->end}}">
					<input type="hidden" name="pax" value="{{$request->pax}}">
					<div class="form-group">
						<label for="fname">First name</label>
						<div class="input-wrap">
							<input type="text" class="form-control" id="fname" name="fname" required>
						</div>
					</div>
					<div class="form-group">
						<label for="lname">Last name</label>
						<div class="input-wrap">
							<input type="text" class="form-control" id="lname" name="lname" required>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<div class="input-wrap">
							<input type="email" class="form-control" id="email" name="email" required>
						</div>
					</div>
					<div class="form-group">
						<div class="holder">
							<label for="date1">Country</label>
							<div class="select-holder">
								<select class="trip dark"  name="country">
									@foreach($countries->all() as $country => $code)
									<option value="{{$country}}">{{$country}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>                           
					<div class="form-group">
						<label for="address">Detailed Address</label>
						<div class="input-wrap">
							<textarea name="address" id="address" cols="30" rows="5"
							class="form-control" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="mobile">Mobile no.</label>
						<div class="input-wrap">
							<input type="text" class="form-control" id="mobile" name="mobile" required>
						</div>
					</div> 
					<div class="form-group">
						<label for="fname">Date of birth</label>
						<div class="input-wrap">
							<div id="datepicker12" class="input-group date" data-date-format="yyyy/mm/dd">
								<input class="form-control" type="text" name="DOB" readonly="" style="color: #000;">
								<span class="input-group-addon"><i class="icon-drop"></i></span>
							</div>
						</div>
					</div>	
					<div class="form-group">
						<label for="pNo">Passport no.</label>
						<div class="input-wrap">
							<input type="text" class="form-control" id="pNo" name="pNo" required>
						</div>
					</div>
					<div class="form-group">
						<label for="expiry">Passport expiry</label>
						<div class="input-wrap">
							<div id="datepicker123" class="input-group date" data-date-format="yyyy/mm/dd">
								<input class="form-control" type="text" name="expiry" readonly="" style="color: #000;">
								<span class="input-group-addon"><i class="icon-drop"></i></span>
							</div>
						</div>
					</div>	
					<div class="form-group">
						<label class="checkbox-inline">
							<input type="checkbox" value="1">By selecting to complete this booking I acknowledge that I have read and accept the terms & conditions, and privacy policy.
						</label>
					</div>
						<input type="submit" class="btn btn-md btn-default col-sm-6 col-sm-offset-3" value="Proceed">
					
				</fieldset>
			</form>
		</div>
	</div>
</main>
@stop
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js"></script>
@stop