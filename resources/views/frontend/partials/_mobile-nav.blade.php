{{--side nav start--}}
<ul id="mobile-menu" class="sidenav">
    <li class="no-padding"><a href="/">Home</a></li>
    @if(!empty($skis))
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a href="#" class="collapsible-header">Ski /Splitboard <i class="material-icons right">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            @foreach($skis as $ski)
                                <li>
                                    <a href="{{ route('frontend-tourDetail',[$ski->slug]) }}">{{ $ski->title }} ({{$ski->max_altitude}}m)</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
    @endif
    @if($heliSkis->count() > 0)
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a href="#" class="collapsible-header">Heli Ski <i class="material-icons right">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            @foreach($heliSkis as $heliSki)
                                <li>
                                    <a href="{{ route('frontend-tourDetail',[$heliSki->slug]) }}">{{ $heliSki->title }}  </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
    @endif
    @if(!empty($climbs))
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a href="#" class="collapsible-header">Climb <i class="material-icons right">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            @foreach($climbs as $climb)
                                <li>
                                    <a href="{{ route('frontend-tourDetail',[$climb->slug]) }}">{{ $climb->title }}  </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
    @endif
    @if(!empty($treks))
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a href="#" class="collapsible-header">Trek <i class="material-icons right">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>
                        @foreach($treks as $trek)
                            <li><a href="{{ route('frontend-tourDetail',[$trek->slug]) }}">{{ $trek->title }}  </a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    @endif
    @if(!empty($weeks))
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a href="#" class="collapsible-header">Weekend Tours <i class="material-icons right">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            @foreach($weeks as $week)
                                <li><a href="{{ route('frontend-tourDetail',[$week->slug]) }}">{{ $week->title }}  </a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
    @endif
    @if(!empty($pcategories))
        @foreach($pcategories as $category)
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a href="#" class="collapsible-header">{{$category->name}} <i class="material-icons right">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="/our-team">Our Team</a></li>
                            @foreach($category->page as $page)
                                <li>
                                    <a href="{{ route('frontend-page',[$category->slug,$page->slug]) }}">{{ $page->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        @endforeach
    @endif
    <li><a href="/contact-us">Contact</a></li>
</ul>
{{--side nav end--}}