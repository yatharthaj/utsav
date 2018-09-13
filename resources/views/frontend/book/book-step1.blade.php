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
					<li><p>Step 1 of 3</p></li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="inner-main common-spacing container">
		<div class="demo-wrapper col-sm-6 col-sm-offset-3 well">
			<form action="{{ route('frontend-bookStep2',$tour->slug) }}" method="POST" data-parsley-validate>
				@csrf
				<fieldset>
					<input type="hidden" name="tour_id" value="{{$tour->id}}">
					<div class="form-group">
						<label for="fname">Trip Start Date</label>
						<div class="input-wrap">
							<div id="datepicker12" class="input-group date" data-date-format="yyyy/mm/dd">
								<input class="form-control" type="text" name="tripStart" readonly="" style="color: #000;">
								<span class="input-group-addon"><i class="icon-drop"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="pax">No. of Traveller</label>
						<div class="input-wrap">
							<input type="text" class="form-control" id="pax" name="pax" placeholder="No. of travellers" required="">
						</div>
					</div>		
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-3">
							<input type="submit" class="btn btn-md btn-default" value="Proceed">
						</div>						
					</div>		

				</fieldset>
			</form>
		</div>
	</div>
</main>
@stop
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js"></script>
@stop