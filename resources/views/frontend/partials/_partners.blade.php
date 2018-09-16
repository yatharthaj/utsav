	<article class="partner-block bg-gray">
		<div class="container">
			<header class="content-heading">
				<h2 class="main-heading">Partner</h2>
				<span class="main-subtitle">People who always support and endorse our good work</span>
				<div class="seperator"></div>
			</header>
			<div class="partner-list" id="partner-slide">
 				@if(!empty($partners))
				@foreach($partners as $partner)
				<div class="partner">
					<a href="{{ $partner->url }}">
						<img width="130" src="{{ asset($partner->path) }}" alt="{{ $partner->name }}">
						<img class="hover" width="130" src="{{ asset($partner->path) }}" alt="{{ $partner->name }}">
					</a>
				</div>
				@endforeach
				@endif 
			</div>
		</div>
	</article>