<!--table2 start-->

@foreach($departures as $departure)
    <tr>
        <td>{{ date("jS M, Y", strtotime($departure->start))}}</td>
        <td>{{ date("jS M, Y", strtotime($departure->end))}}</td>
        <td>{{$departure->slot}} space left</td>
        <td>USD {{$departure->price}}</td>
        <td><a class="waves-effect waves-light btn"
               href="{{route('frontend-bookStep1',$tour->slug)}}">Book</a></td>
    </tr>
@endforeach
