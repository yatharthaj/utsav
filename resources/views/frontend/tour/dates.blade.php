@foreach($departures as $departure)
    <tr>
        <td>
            <div class="cell">
                <div class="middle">
                    {{ date('jS M, Y', strtotime($departure->start))}}
                </div>
            </div>
        </td>
        <td>
            <div class="cell">
                <div class="middle">
                    {{ date('jS M, Y', strtotime($departure->end))}}
                </div>
            </div>
        </td>
        <td>
            <div class="cell">
                <div class="middle">{{$departure->slot}} Seats Available</div>
            </div>
        </td>
        <td>
            <div class="cell">
                <div class="middle">${{$departure->price}}</div>
            </div>
        </td>
        <td>
            <div class="cell">
                <div class="middle">${{$departure->price2}}</div>
            </div>
        </td>
        <td>
            <div class="cell">
                <div class="middle">${{$departure->price3}}</div>
            </div>
        </td>
        <td>
            <div class="cell">
                <div class="middle">
                    <a href="#" class="btn btn-default">BOOK NOW</a>
                </div>
            </div>
        </td>
    </tr>
@endforeach
<tr class="text-center">
    <td colspan="6">
        <div class="alert alert-danger">
            <h4><strong>Sorry!</strong> No dates found.</h4>
        </div>
    </td>
</tr>