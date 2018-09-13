@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            @if(empty($month))
                <div class="card">
                    <div class="card-body">
                        {!! Form::open( ['route'=> 'trip-of-the-month.store', 'method' =>'POST','class'=>'form'] ) !!}
                        <div class="form-group">
                            <select class="form-control select2-list" name="tour" data-placeholder="Select a tour">
                                @foreach($tours as $tour)
                                    <option value="{{$tour->id}}">{{$tour->title}}</option>
                                @endforeach
                            </select>
                            <label>Tours</label>
                            @if ($errors->has('tour'))
                                <span class="help-block">{{$errors->first('tour')}}</span>
                            @endif
                        </div>
                        {{ Form::submit('Set as trip of the month', ['class' =>'btn btn-primary btn-block add']) }}

                        {!! Form::close() !!}
                    </div><!--end .card-body -->
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Trip Name</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$month->tour->title}}</td>
                                <td class="text-right">
                                    {!!  Form::open( array('route'=>array('trip-of-the-month.destroy', $month->id),'method'=>'DELETE')) !!}
                                    <button type="sumbit" class="btn btn-icon-toggle"><i
                                                class="fa fa-trash-o"></i></button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        @endif
    </div>
@stop
@section('styles')
    <link rel="stylesheet" href="{{asset('css/theme-default/libs/select2/select2.css')}}">
@stop
@section('scripts')
    <script src="{{ asset('js/libs/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{asset('js/libs/select2/select2.min.js')}}"></script>
    <script src="{{ asset('js/core/demo/DemoFormComponents.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js"></script>
@stop