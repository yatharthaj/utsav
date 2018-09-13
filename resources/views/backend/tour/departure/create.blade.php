@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="card">
                <div class="card-body">
                    {!! Form::open( ['route'=> 'departure.store', 'method' =>'POST','class'=>'form'] ) !!}
                    <div class="form-group">
                        <label for="tincluded">Tours</label>
                        <select class="form-control" id="tours" multiple="multiple" name="tours[]"
                                value="{{ old('tours[]') }}">
                            @foreach($tours as $tour)
                                <option value="{{ $tour->id }}">{{ $tour->title }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('tours'))
                            <span class="help-block">{{$errors->first('tours')}}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-daterange input-group" id="demo-date-range">
                                    <div class="input-group-content">
                                        <input type="text" class="form-control" name="start">
                                        <label>Date range</label>
                                    </div>
                                    <span class="input-group-addon">to</span>
                                    <div class="input-group-content">
                                        <input type="text" class="form-control" name="end">
                                        <div class="form-control-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group floating-label {{$errors->has('gap') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="gap {{$errors->has('gap') ? 'inputError' : ''}}" name="gap"
                                       value="{{ old('gap') }}" required>
                                @if($errors->has('gap'))
                                    <span class="help-block">{{ $errors->first('gap') }}</span>
                                @endif
                                {{ Form::label('gap', 'Gap Days ') }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group" >
                                <label>Slot Available</label>
                                <input type="hidden" id="slot" name="slot">
                                <div id="price-slider" class="slot-wrapper"></div>
                                <div id="min" class="pull-left"></div>
                                <div id="max" class="pull-right"></div>
                            </div>
                        </div>
                    </div>
                    {{ Form::submit('Create', ['class' =>'btn btn-primary btn-block add']) }}

                    {!! Form::close() !!}
                </div><!--end .card-body -->
            </div>
        </div>
    </div>
@stop
@section('styles')
    <link type="text/css" rel="stylesheet" href="{{asset('css/theme-default/libs/jquery-ui/jquery-ui-theme.css')}}" />
    <link type="text/css" rel="stylesheet"
          href="{{ asset('css/theme-default/libs/bootstrap-datepicker/datepicker3.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
@stop
@section('scripts')
    <script src="{{ asset('js/libs/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/core/demo/DemoFormComponents.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tours').multiselect({
                includeSelectAllOption: true,
                selectAllJustVisible: false,
                enableFiltering: true,
                numberDisplayed: 1,
                maxHeight: 400,
                buttonWidth: '100%'
            });
        });
    </script>
    <script>
        ! function() {
            "use strict";
            $(document).ready(function(e) {
                var a = e("#price-slider");
                a.slider({
                    range: !0,
                    min: 0,
                    max: 20,
                    values: [2, 12],
                    slide: function(a, l) {
                        e("#min").html( l.values[0]), e("#max").html( l.values[1]), e("#slot").val(l.values[0] + "-" + l.values[1])
                    }
                }), e("#min").html( e("#price-slider").slider("values", 0)), e("#max").html( e("#price-slider").slider("values", 1))

            })
        }()
    </script>

@stop