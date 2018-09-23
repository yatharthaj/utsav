<header id="header" >
    <div class="container-fluid">
        <!-- logo -->
        <div class="logo">
            <a href="/">
                <img class="normal" src="{{asset('img/logos/logo1.png')}}" alt="Nepal Ski Guides">
                <img class="gray-logo" src="{{asset('img/logos/logo-gray.svg')}}" alt="Nepal Ski Guides">
            </a>
        </div>
        <!-- main navigation -->
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle nav-opener" data-toggle="collapse" data-target="#nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- main menu items and drop for mobile -->
            <div class="collapse navbar-collapse" id="nav">
                <!-- main navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li class="dropdown has-mega-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Trekking <b class="icon-angle-down"></b></a>
                        <div class="dropdown-menu">
                            <div class="drop-wrap">
                                <div class="five-col">
                                    @if(!empty($tregions))
                                    @foreach($tregions as $region)
                                    <div class="column">
                                        <strong class="title sub-link-opener">{{ $region->name }}</strong>
                                        <ul class="header-link">
                                            @foreach($region->tours as $tour)
                                            <li>
                                                <a href="{{ route('frontend-tourDetail',[$tour->slug]) }}">{{ $tour->title }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown has-mega-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Climbing <b class="icon-angle-down"></b></a>
                        <div class="dropdown-menu">
                            <div class="drop-wrap">
                                <div class="five-col">
                                    @if(!empty($cregions))
                                    @foreach($cregions as $region)
                                    <div class="column">
                                        <strong class="title sub-link-opener">{{ $region->name }}</strong>
                                        <ul class="header-link">
                                            @foreach($region->tours as $tour)
                                            <li>
                                                <a href="{{ route('frontend-tourDetail',[$tour->slug]) }}">{{ $tour->title }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>     
                    <li class="dropdown has-mega-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ski in Nepal <b class="icon-angle-down"></b></a>
                        <div class="dropdown-menu">
                            <div class="drop-wrap">
                                <div class="five-col">
                                    @if(!empty($ski))
                                    @foreach($skis as $region)
                                    <div class="column">
                                        <strong class="title sub-link-opener">{{ $region->name }}</strong>
                                        <ul class="header-link">
                                            @foreach($region->tours as $tour)
                                            <li>
                                                <a href="{{ route('frontend-tourDetail',[$tour->slug]) }}">{{ $tour->title }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>      
                    <li class="dropdown has-mega-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tours <b class="icon-angle-down"></b></a>
                        <div class="dropdown-menu">
                            <div class="drop-wrap">
                                <div class="five-col">
                                    @if(!empty($tours))
                                    @foreach($tours as $region)
                                    <div class="column">
                                        <strong class="title sub-link-opener">{{ $region->name }}</strong>
                                        <ul class="header-link">
                                            @foreach($region->tours as $tour)
                                            <li>
                                                <a href="{{ route('frontend-tourDetail',[$tour->slug]) }}">{{ $tour->title }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>                                                  
                    @if(!empty($pcategories))
                    @foreach($pcategories as $category)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $category->name }}<b class="icon-angle-down"></b></a>
                        @if($category->page->count())
                        @foreach($pcategories as $category)
                        <div class="dropdown-menu">
                          <ul>
                            @foreach($category->page as $page)
                            <li>
                             <a href="{{ route('frontend-page',[$category->slug,$page->slug]) }}">{{ $page->title }}</a>
                         </li>
                         @endforeach
                     </ul>
                 </div>
                 @endforeach                      
                 @endif
             </li>
             @endforeach
             @endif

             <li><a href="{{ route('frontend-contact') }}">Contact</a></li>
             <li class="visible-md visible-lg nav-visible v-divider"><a href="#" class="search-opener"><span class="icon icon-search"></span></a></li>
         </ul>
     </div>
 </nav>
</div>
<!-- search form -->
<form class="search-form" action="#">
    <fieldset>
        <a href="#" class="search-opener hidden-md hidden-lg">
            <span class="icon-search"></span>
        </a>
        <div class="search-wrap">
            <a href="#" class="search-opener close">
                <span class="icon-cross"></span>
            </a>
            <div class="trip-form trip-form-v2 trip-search-main">
                <div class="trip-form-wrap">
                    <div class="holder">
                        <label>Departing</label>
                        <div class='select-holder'>
                            <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                                <input class="form-control" type="text" readonly />
                                <span class="input-group-addon"><i class="icon-drop"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="holder">
                        <label>Returning</label>
                        <div class='select-holder'>
                            <div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy">
                                <input class="form-control" type="text" readonly />
                                <span class="input-group-addon"><i class="icon-drop"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="holder">
                        <label for="select-region">Select Region</label>
                        <div class='select-holder'>
                            <select class="trip-select trip-select-v2 region" name="region" id="select-region">
                                <option value="select">Africa</option>
                                <option value="select">Arctic</option>
                                <option value="select">Asia</option>
                                <option value="select">Europe</option>
                                <option value="select">Oceanaia</option>
                                <option value="select">Polar</option>
                            </select>
                        </div>
                    </div>
                    <div class="holder">
                        <label for="select-activity">Select Activity</label>
                        <div class='select-holder'>
                            <select class="trip-select trip-select-v2 acitvity" name="activity" id="select-activity">
                                <option value="Holiday Type">Holiday Type</option>
                                <option value="Holiday Type">Beach Holidays</option>
                                <option value="Holiday Type">Weekend Trips</option>
                                <option value="Holiday Type">Summer and Sun</option>
                                <option value="Holiday Type">Water Sports</option>
                                <option value="Holiday Type">Scuba Diving</option>
                            </select>
                        </div>
                    </div>
                    <div class="holder">
                        <label for="price-range">Price Range</label>
                        <div class='select-holder'>
                            <select class="trip-select trip-select-v2 price" name="activity" id="price-range">
                                <option value="Price Range">Price Range</option>
                                <option value="Price Range">$1 - $499</option>
                                <option value="Price Range">$500 - $999</option>
                                <option value="Price Range">$1000 - $1499</option>
                                <option value="Price Range">$1500 - $2999</option>
                                <option value="Price Range">$3000+</option>
                            </select>
                        </div>
                    </div>
                    <div class="holder">
                        <button class="btn btn-trip btn-trip-v2" type="submit">Find Tours</button>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</form>
</header>