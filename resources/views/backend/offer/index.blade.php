@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            @if(empty($offer))
                <div class="card">
                    <div class="card-body">
                        {!! Form::open( ['route'=> 'offers.store', 'method' =>'POST','class'=>'form'] ) !!}
                        <div class="form-group">
                            <div class="form-group floating-label {{$errors->has('message') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="message {{$errors->has('message') ? 'inputError' : ''}}" name="message"
                                       value="{{ old('message') }}" required>
                                @if($errors->has('message'))
                                    <span class="help-block">{{ $errors->first('message') }}</span>
                                @endif
                                {{ Form::label('message', 'Message ') }}
                            </div>
                        </div>
                        {{ Form::submit('Save', ['class' =>'btn btn-primary btn-block add']) }}

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
                                <td>{{$offer->message}}</td>
                                <td class="text-right">
                                    {!!  Form::open( array('route'=>array('offers.destroy', $offer->id),'method'=>'DELETE')) !!}
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
@stop
@section('scripts')
    <script src="{{ asset('js/libs/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/core/demo/DemoFormComponents.js') }}"></script>

@stop