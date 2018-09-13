@extends('layouts.backend')
@section('styles')
    <style>
        .review-delete {
            float: right;
        }
    </style>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @foreach($reviews as $review)
                <div class="card">
                    <div class="card-head style-primary">
                        <header>{{$review->title}}</header>
                    </div>
                    <div class="card-body">
                        <blockquote class="{{$loop->iteration%2?'blockquote-reverse':' '}}">
                            {!! $review->content !!}
                            <footer><strong>{{$review->fname." ". $review->lname}}</strong></footer>
                            <footer>{{$review->tour->title}}</footer>
                        </blockquote>

                    </div><!--end .card-body -->
                    <div class="card-actionbar">
                        <div class="card-actionbar-row">
                            @if(!$review->status)
                                <a href="{{ route('approve',[$review->id]) }}"
                                   class="btn btn-flat btn-success ink-reaction">Approve</a>
                            @endif
                            {!!  Form::open( array('route'=>array('reviews.destroy', $review->id),'method'=>'DELETE','review-delete')) !!}
                            <button class="btn btn-flat btn-danger ink-reaction">
                                Delete
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </div><!--end .card-actionbar -->
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                {{ $reviews->links() }}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@stop