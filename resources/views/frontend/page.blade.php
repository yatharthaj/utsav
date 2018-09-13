@extends('layouts.frontend')
@section('content')
<!-- main banner -->
<section class="banner banner-inner parallax" data-stellar-background-ratio="0.5" id="banner-layout-rightsidebar">
	<div class="banner-text">
		<div class="center-text">
			<div class="container">
				<h1>Layout - Right Sidebar</h1>
				<strong class="subtitle">The most detailed and modern Adventure theme!</strong>
				<!-- breadcrumb -->
				<nav class="breadcrumbs">
					<ul>
						<li><a href="index.html">HOME</a></li>
						<li><span><a href="index.html">Layout</a></span></li>
						<li><span>Right Sidebar</span></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- main container -->
<main>
	<!-- content with sidebar -->
	<div class="content-with-sidebar common-spacing content-left">
		<div class="container">
			<div id="two-columns" class="row">
				<div id="content" class="col-sm-8 col-md-9">
					<h2>Content</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae enim fugiat architecto at necessitatibus maxime possimus veniam provident laborum officia laudantium, commodi, animi quisquam, eum totam? Amet tempora, dolore animi!</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae enim fugiat architecto at necessitatibus maxime possimus veniam provident laborum officia laudantium, commodi, animi quisquam, eum totam? Amet tempora, dolore animi!</p>
				</div>
				<!-- sidebar -->
				<aside id="sidebar-right" class="col-sm-4 col-md-3 sidebar sidebar-list">
					<div class="sidebar-holder">
						<header class="heading">
							<h3>FILTER</h3>
						</header>
						<!-- accordion filters in sidebar -->
						<div class="accordion">
							<div class="accordion-group">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1">SELECT REGION</a>
									</h4>
								</div>
								<div id="collapse1" class="panel-collapse collapse in" role="tabpanel">
									<div class="panel-body">
										<ul class="side-list region-list hovered-list">
											<li>
												<a href="#">
													<span class="ico-holder">
														<span class="icon-asia"></span>
													</span>
													<span class="text">Asia</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="ico-holder">
														<span class="icon-arctic"></span>
													</span>
													<span class="text">Arctic</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="ico-holder">
														<span class="icon-middle-east"></span>
													</span>
													<span class="text">Middle East</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="ico-holder">
														<span class="icon-africa"></span>
													</span>
													<span class="text">Africa</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="ico-holder">
														<span class="icon-europe"></span>
													</span>
													<span class="text">Europe</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="ico-holder">
														<span class="icon-north-america"></span>
													</span>
													<span class="text">North America</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="accordion-group">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" href="#collapse2" aria-expanded="true" aria-controls="collapse2">Activity type</a>
									</h4>
								</div>
								<div id="collapse2" class="panel-collapse collapse in" role="tabpanel">
									<div class="panel-body">
										<ul class="side-list horizontal-list hovered-list">
											<li>
												<a href="#">
													<span class="icon-hiking-camping"></span>
													<span class="popup">
														Hiking
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-wildlife"></span>
													<span class="popup">
														Wildlife
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-boating"></span>
													<span class="popup">
														Boating
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-food-wine"></span>
													<span class="popup">
														Food &amp; Wine
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-mountain-biking"></span>
													<span class="popup">
														Mountain Biking
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-scuba-diving"></span>
													<span class="popup">
														Scuba Diving
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-peak"></span>
													<span class="popup">
														Peak
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-bungee"></span>
													<span class="popup">
														Bungee
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-family"></span>
													<span class="popup">
														Family
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-budget"></span>
													<span class="popup">
														Budget
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-culture"></span>
													<span class="popup">
														Culture
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-diamond"></span>
													<span class="popup">
														Luxury
													</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="accordion-group">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" href="#collapse3" aria-expanded="true" aria-controls="collapse3">Landscape</a>
									</h4>
								</div>
								<div id="collapse3" class="panel-collapse collapse in" role="tabpanel">
									<div class="panel-body">
										<ul class="side-list horizontal-list hovered-list">
											<li>
												<a href="#">
													<span class="icon-beach"></span>
													<span class="popup">
														beach
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-jungle"></span>
													<span class="popup">
														jungle
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-desert"></span>
													<span class="popup">
														desert
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-mountain"></span>
													<span class="popup">
														mountain
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-rural"></span>
													<span class="popup">
														rural
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-urban"></span>
													<span class="popup">
														urban
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-snow-ice"></span>
													<span class="popup">
														snow ice
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-water-sea"></span>
													<span class="popup">
														water
													</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="accordion-group">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" href="#collapse4" aria-expanded="true" aria-controls="collapse4">Activity level</a>
									</h4>
								</div>
								<div id="collapse4" class="panel-collapse collapse in" role="tabpanel">
									<div class="panel-body">
										<ul class="side-list horizontal-list hovered-list">
											<li>
												<a href="#">
													<span class="icon-level1"></span>
													<span class="popup">
														Level 1
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-level2"></span>
													<span class="popup">
														Level 2
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-level3"></span>
													<span class="popup">
														Level 3
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-level4"></span>
													<span class="popup">
														Level 4
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-level5"></span>
													<span class="popup">
														Level 5
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-level6"></span>
													<span class="popup">
														Level 6
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-level7"></span>
													<span class="popup">
														Level 7
													</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="icon-level8"></span>
													<span class="popup">
														Level 8
													</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="accordion-group">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" href="#collapse5" aria-expanded="true" aria-controls="collapse5">Price range</a>
									</h4>
								</div>
								<div id="collapse5" class="panel-collapse collapse in" role="tabpanel">
									<div class="panel-body">
										<div id="slider-range"></div>
										<input type="text" id="amount" readonly class="price-input">
										<div id="ammount" class="price-input">
											
										</div>
									</div>
								</div>
							</div>
							<div class="accordion-group">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" href="#collapse6" aria-expanded="true" aria-controls="collapse6">community poll</a>
									</h4>
								</div>
								<div id="collapse6" class="panel-collapse collapse in" role="tabpanel">
									<div class="panel-body">
										<strong class="title">What shoes do your prefer on hiking trips?</strong>
										<ul class="side-list check-list">
											<li>
												<label for="check1" class="custom-checkbox">
													<input id="check1" type="checkbox">
													<span class="check-input"></span>
													<span class="check-label">Hiking Boots</span>
												</label>
											</li>
											<li>
												<label for="check2" class="custom-checkbox">
													<input id="check2" type="checkbox">
													<span class="check-input"></span>
													<span class="check-label">Hiking Boots</span>
												</label>
											</li>
											<li>
												<label for="check3" class="custom-checkbox">
													<input id="check3" type="checkbox">
													<span class="check-input"></span>
													<span class="check-label">Hiking Boots</span>
												</label>
											</li>
											<li>
												<label for="check4" class="custom-checkbox">
													<input id="check4" type="checkbox">
													<span class="check-input"></span>
													<span class="check-label">Hiking Boots</span>
												</label>
											</li>
										</ul>
										<strong class="sub-link"><a href="#">CAST YOUR VOTE</a></strong>
									</div>
								</div>
							</div>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</div>
</main>
@stop