@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <a href="{{ route('tour.index') }}"
               class="btn ink-reaction btn-raised btn-lg btn-primary btn-block">Save</a>
        </div>
        <hr>
    </div>
    <section class="style-default">
                <div class="col-lg-8">
                    <div class="panel-group" id="accordion1">
                        @foreach($itineraries as $itinerary)
                            <div class="card panel">
                                <div class="card-head card-head-sm collapsed" data-toggle="collapse" data-parent="#accordion1"
                                     data-target="#accordion1-{{ $loop->iteration }}" aria-expanded="false">
                                    <header>Day {{ $itinerary->day }}: {{ $itinerary->title }}</header>
                                    <div class="tools">
                                        <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                                    </div>
                                </div>
                                <div id="accordion1-{{ $loop->iteration }}" class="collapse" aria-expanded="false"
                                     style="height: 0px;">
                                    <div class="card-body">
                                        <p>
                                            {{ $itinerary->plan }}
                                        </p>
                                    </div>
                                    <div class="card-actionbar">
                                        <div class="card-actionbar-row">
                                            <button class="btn btn-flat btn-info ink-reaction edit-modal"
                                                    data-toggle="modal"
                                                    data-target="#formModal"
                                                    data-id="{{$itinerary->id}}"
                                                    data-tourid="{{$itinerary->tour_id}}"
                                                    data-day="{{$itinerary->day}}"
                                                    data-title="{{$itinerary->title}}"
                                                    data-plan="{{$itinerary->plan}}">Edit
                                            </button>

                                            <form method="POST"
                                                  action="{{ route('itinerary-destroy', $itinerary->id) }}"
                                                  class="pull-right itinerary-destroy">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{$tour->id}}">
                                                <button type="submit" class="btn btn-flat btn-danger ink-reaction">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end .panel -->
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-head style-primary">
                            <header>Add new plan</header>
                        </div>
                        <div class="card-body floating-label">
                            {!! Form::open( ['route'=> 'itinerary-store', 'method' =>'POST', 'class'=>'form form-validate'] ) !!}
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="id" value="{{$tour->id}}">
                                    <div class="form-group">
                                        <div class="form-group {{$errors->has('day') ? 'has-error' : ''}}">
                                            <input type="text" class="form-control"
                                                   id="day {{$errors->has('day') ? 'inputError' : ''}}" name="day"
                                                   value="{{ old('day') }}">
                                            @if ($errors->has('day'))
                                                <span class="help-block">{{$errors->first('day')}}</span>
                                            @endif
                                            <label for="day">Day</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                                            <input type="text" class="form-control"
                                                   id="title {{$errors->has('title') ? 'inputError' : ''}}" name="title"
                                                   value="{{ old('title') }}">
                                            @if ($errors->has('title'))
                                                <span class="help-block">{{$errors->first('title')}}</span>
                                            @endif
                                            <label for="title">Title</label>
                                        </div>
                                    </div>
                                    <div class="form-group {{$errors->has('plan') ? 'has-error' : ''}}">
                                    <textarea id="plan" class="form-control" placeholder="Enter text ..."
                                              name="plan"></textarea>
                                    @if ($errors->has('plan'))
                                        <span class="help-block">{{$errors->first('plan')}}</span>
                                    @endif

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <button type="submit" class="btn btn-block btn-success ink-reaction">Add</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        <!-- BEGIN FORM MODAL MARKUP -->
        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="formModalLabel">Edit</h4>
                    </div>
                    <form class="form" role="form">
                        <div class="modal-body">
                            <input type="hidden" id="id-edit" >
                            <input type="hidden" id="tourid-edit" >
                            {{ Form::label('day-edit','Day:') }}
                            {{ Form::text('day-edit',null,['class'=>'form-control']) }}
                            {{ Form::label('title-edit','Title:') }}
                            {{ Form::text('title-edit',null,['class'=>'form-control' , 'id'=>'title-edit']) }}
                            {{ Form::label('plan','Plan:') }}
                            <textarea name="" id="plan-edit" class="form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success update">Update</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- END FORM MODAL MARKUP -->
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit-modal', function() {
                $('.modal-title').text('Edit');
                $('#id-edit').val($(this).data('id'));
                $('#tourid-edit').val($(this).data('tourid'));
                $('#day-edit').val($(this).data('day'));
                $('#title-edit').val($(this).data('title'));
                $('#plan-edit').val($(this).data('plan'));
            });

            $('.modal-footer').on('click', '.update', function() {

                $.ajax({
                    type: 'post',
                    url: '/manage/itinerary-edit',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'tour_id': $("#tourid-edit").val(),
                        'id': $("#id-edit").val(),
                        'day': $("#day-edit").val(),
                        'title': $('#title-edit').val(),
                        'plan': $('#plan-edit').val()
                    },
                    success: function(data){
                        $('#formModal').modal('hide');
                        toastr.success('Item update success!', 'Info Alert');
                        location.reload();
                    }

                });
            });

        });
    </script>
@stop