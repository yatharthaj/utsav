<!-- BEGIN HEADER-->
<header id="header">
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand">
                    <div class="brand-holder">
                        <a href="{{route('dashboard')}}">
                            <span class="text-lg text-bold text-primary">Ski Nepal CMS</span>
                        </a>
                    </div>
                </li>
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
            <ul class="header-nav header-nav-options">
                <li class="dropdown hidden-xs">
                    <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        @if($reviews->count() > 0)<sup class="badge style-danger">{{$reviews->count()}}</sup> @endif
                    </a>
                    <ul class="dropdown-menu animation-expand">
                        @foreach($reviews as $review)
                        <li>
                            <a class="alert alert-callout alert-info" href="javascript:void(0);">
                                <img class="pull-right img-circle dropdown-avatar"
                                     src="{{$review->thumbnail}}" alt=""/>
                                <strong>{{$review->title}}</strong><br/>
                                <small>{!!  str_limit(strip_tags($review->content), 30, '...') !!}</small>
                            </a>
                        </li>
                        @endforeach
                        <li class="dropdown-header">Options</li>
                        <li><a href="{{route('reviews.index')}}">View all reviews <span class="pull-right"><i
                                            class="fa fa-arrow-right"></i></span></a></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-options -->
            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                        <img src="../../assets/img/avatar1.jpg?1403934956" alt=""/>
                        <span class="profile-info">
									{{auth()->user()->name}}
								</span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li><a href="{{route('logout')}}"><i class="fa fa-fw fa-power-off text-danger"></i>
                                Logout</a></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-profile -->
        </div><!--end #header-navbar-collapse -->
    </div>
</header>
<!-- END HEADER-->
<!-- BEGIN BASE-->
<div id="base">

    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->
    <!-- BEGIN CONTENT-->
    <div id="content">
        <section>
            <div class="section-body">
                @yield('content')
            </div>
        </section>
    </div>
    <!-- BEGIN MENUBAR-->
    <div id="menubar" class="menubar-inverse ">
        <div class="menubar-fixed-panel">
            <div>
                <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar"
                   href="javascript:void(0);">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="expanded">
                <a href="{{route('dashboard')}}}">
                    <span class="text-lg text-bold text-primary ">Ski Nepal CMS</span>
                </a>
            </div>
        </div>
        <div class="menubar-scroll-panel">

            <!-- BEGIN MAIN MENU -->
            <ul id="main-menu" class="gui-controls">

                <!-- BEGIN DASHBOARD -->
                <li>
                    <a href="{{route('dashboard')}}" class="active">
                        <div class="gui-icon"><i class="md md-home"></i></div>
                        <span class="title">Dashboard</span>
                    </a>
                </li><!--end /menu-li -->
                <li>
                    <a href="{{route('trip-of-the-month.index')}}">
                        <div class="gui-icon"><i class="fa fa-trophy"></i></div>
                        <span class="title">Trip of The Month</span>
                    </a>
                </li><!--end /menu-li -->
                <li>
                    <a href="{{route('offers.index')}}">
                        <div class="gui-icon"><i class="fa fa-gift"></i></div>
                        <span class="title">Offers</span>
                    </a>
                </li>                
                <!-- END DASHBOARD -->
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="md md-insert-drive-file"></i></div>
                        <span class="title">Pages</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="{{route('pages.index')}}"><span class="title">All pages</span></a></li>
                        <li><a href="{{ route('page-category.index') }}"><span class="title">Category</span></a></li>
                        <!--end /submenu-li -->
                    </ul><!--end /submenu -->
                </li>
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="fa fa-suitcase"></i></div>
                        <span class="title">Tours</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="{{ route('tour.index') }}"><span class="title">All tours</span></a></li>
                        <li><a href="{{ route('featureds') }}"><span class="title">Featured</span></a></li>
                        <li><a href="{{ route('tour-category.index') }}"><span class="title">Category</span></a></li>
                        <li><a href="{{ route('meals.index') }}"><span class="title">Meal</span></a></li>
                        <li><a href="{{ route('group.index') }}"><span class="title">Group Size</span></a></li>
                        <li><a href="{{ route('difficulty.index') }}"><span class="title">Difficulty</span></a></li>
                        <li><a href="{{ route('accommodation.index') }}"><span class="title">Accommodation</span></a>
                        </li>
                        <li><a href="{{ route('locations.index') }}"><span class="title">Start & End Location</span></a>
                        </li>
                        <li><a href="{{ route('country.index') }}"><span class="title">Country</span></a></li>
                        <li><a href="{{ route('regions.index') }}"><span class="title">Region</span></a></li>
                        <li><a href="{{ route('includes.index') }}"><span class="title">Includes</span></a></li>
                        <li><a href="{{ route('excludes.index') }}"><span class="title">Excludes</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('departure.index') }}">
                        <div class="gui-icon"><i class="fa fa-calendar"></i></div>
                        <span class="title">Departure</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('media.index') }}">
                        <div class="gui-icon"><i class="fa fa-picture-o"></i></div>
                        <span class="title">Media</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('partner.index') }}">
                        <div class="gui-icon"><i class="md md-extension"></i></div>
                        <span class="title">Partners</span>
                    </a>
                </li>                
                <li>
                    <a href="{{ route('reviews.index') }}">
                        <div class="gui-icon"><i class="fa fa-comments-o"></i></div>
                        <span class="title">Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('carousel.index') }}">
                        <div class="gui-icon"><i class="md md-web"></i></div>
                        <span class="title">Carousel</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('section-control.index') }}">
                        <div class="gui-icon"><i class="fa fa-th-list"></i></div>
                        <span class="title">Home Page</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('setting.index') }}">
                        <div class="gui-icon"><i class="fa fa-cogs"></i></div>
                        <span class="title">Settings</span>
                    </a>
                </li>
            </ul><!--end .main-menu -->
            <!-- END MAIN MENU -->

            <div class="menubar-foot-panel">
                <small class="no-linebreak hidden-folded">
                </small>
            </div>
        </div><!--end .menubar-scroll-panel-->
    </div><!--end #menubar-->
    <!-- END MENUBAR -->

</div><!--end #base-->
<!-- END BASE -->