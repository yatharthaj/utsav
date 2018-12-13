<div class="container">
    @foreach($itineraries as $itinerary)
    <div class="row">
        <h6 class="itinerary-title"> <b>Day {{ $itinerary->day}} : {{$itinerary->title}}</b></h6>
        <p>{{$itinerary->plan}}</p>
    </div>
        @endforeach
</div>
