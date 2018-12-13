@forelse($departures as $departure)
    <tr>
        <td>{{ date("jS M, Y", strtotime($departure->start))}}</td>
        <td>{{ date("jS M, Y", strtotime($departure->end))}}</td>
        <td>{{$departure->slot}} space left</td>
        <td>USD {{$departure->price}}</td>
        <td><a class="waves-effect waves-light btn"
               href="{{route('frontend-bookStep1',$tour->slug)}}">Book</a></td>
    </tr>
@empty
<tr>
    <td colspan="6">
        <div class="alert alert-danger">
            <h4><strong>Sorry!</strong> No dates found.</h4>
        </div>
    </td>
</tr>
@endforelse