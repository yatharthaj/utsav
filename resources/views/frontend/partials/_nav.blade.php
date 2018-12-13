{{--{{dd($weeks)}}--}}
<nav>
    <div class="nav-wrapper scooter">
        <a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <div class="container-fluid">
            <a href="/" class="brand-logo">
                <img class="normal" src="{{asset('img/logos/logo1.png')}}" alt="Nepal Ski Guides">
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="/">Home</a></li>
                @if(!empty($skis))
                    <li><a class="dropdown-trigger" href="#!" data-target="ski-dropdown">Ski/SplitBoard<i
                                    class="material-icons right">arrow_drop_down</i></a></li>
                @endif
                @if($heliSkis->count() > 0)
                    <li><a class="dropdown-trigger" href="#!" data-target="heliski-dropdown">Heli Ski<i
                                    class="material-icons right">arrow_drop_down</i></a></li>
                @endif
                @if(!empty($climbs))
                    <li><a class="dropdown-trigger" href="#!" data-target="climb-dropdown">Climb<i
                                    class="material-icons right">arrow_drop_down</i></a></li>
                @endif
                @if(!empty($treks))
                        <li><a class="dropdown-trigger" href="#!" data-target="trek-dropdown">Trek<i
                                        class="material-icons right">arrow_drop_down</i></a></li>
                @endif
                @if(!empty($weeks))
                    <li><a class="dropdown-trigger" href="#!" data-target="week-dropdown">Weekend Tours<i
                                    class="material-icons right">arrow_drop_down</i></a></li>
                @endif
                @if(!empty($pcategories))
                    @foreach($pcategories as $category)
                        <li><a class="dropdown-trigger" href="#!" data-target="single-dropdown">{{ $category->name }}<i
                                        class="material-icons right">arrow_drop_down</i></a></li>
                    @endforeach
                @endif
                <li><a href="/contact-us">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
{{--dropdown content start--}}
<ul id="ski-dropdown" class="dropdown-content">
    @if(!empty($skis))
        @foreach($skis as $ski)
            <li>
                <a href="{{ route('frontend-tourDetail',[$ski->slug]) }}">{{ $ski->title }} ({{$ski->max_altitude}}m)</a>
            </li>
        @endforeach
    @endif
</ul>
<ul id="climb-dropdown" class="dropdown-content">
    @if(!empty($climbs))
        @foreach($climbs as $climb)
            <li>
                <a href="{{ route('frontend-tourDetail',[$climb->slug]) }}">{{ $climb->title }}  </a>
            </li>
        @endforeach
    @endif
</ul>
<ul id="trek-dropdown" class="dropdown-content">
    @if(!empty($treks))
        @foreach($treks as $trek)
            <li>
                <a href="{{ route('frontend-tourDetail',[$trek->slug]) }}">{{ $trek->title }}  </a>
            </li>
        @endforeach
    @endif
</ul>

<ul id="heliski-dropdown" class="dropdown-content">
    @if(!empty($heliSkis))
        @foreach($heliSkis as $heliSki)
            <li>
                <a href="{{ route('frontend-tourDetail',[$heliSki->slug]) }}">{{ $heliSki->title }}  </a>
            </li>
        @endforeach
    @endif
</ul>

<ul id="week-dropdown" class="dropdown-content">
    @if(!empty($weeks))
        @foreach($weeks as $week)
            <li>
                <a href="{{ route('frontend-tourDetail',[$week->slug]) }}">{{ $week->title }}  </a>
            </li>
        @endforeach
    @endif
</ul>

<ul id="single-dropdown" class="dropdown-content">
    <li><a href="/our-team">Our Team</a></li>
    @if(!empty($pcategories))
        @foreach($pcategories as $category)
            @foreach($category->page as $page)
                <li>
                    <a href="{{ route('frontend-page',[$category->slug,$page->slug]) }}">{{ $page->title }}</a>
                </li>
            @endforeach
        @endforeach
    @endif
</ul>
{{--dropdown content end--}}
@include('frontend.partials._mobile-nav')
