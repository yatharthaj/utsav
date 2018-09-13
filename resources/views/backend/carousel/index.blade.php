@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-sm-8">
            <p class="text-xxl">Home Page Slider</p>
        </div>
        <div class="col-sm-4">
            <p><a href="{{ route('carousel.create') }}" class="btn btn-block ink-reaction btn-primary">Add Images</a></p>
        </div>
    </div>
    <div class="row">
        {{-- 	@foreach ($carousels as $carousel)
            <div class="col-md-4 col-sm-6">
                <div class="thumbnail">
                    <img src="{{$carousel->path}}" alt="" class="img-responsive">
                    <div class="card-actionbar">
                        <a href="{{ route('carousel.edit',$carousel->id) }}" class="btn  ink-reaction btn-info" data-toggle="tooltip" title="Edit">
                            <i class="md-mode-edit"></i>
                        </a>
                        {!!  Form::open( array('route'=>array('carousel.destroy', $carousel->id),'method'=>'DELETE')) !!}
                        <button class="btn  ink-reaction btn-danger" data-toggle="tooltip" title="Delete">
                            <i class="md-delete"></i>
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            @endforeach --}}

        @foreach($carousels as $carousel)
            <div class="col-sm-6 col-md-6 item{{$carousel->id}}">
                <div class="thumbnail">
                    <img src="{{asset($carousel->path)}}" alt="" class="img-responsive">
                    <div class="caption">
                        @if(!empty($carousel->name))
                            <h4>{{$carousel->name}}</h4>
                        @else
                            <h4><span class="text-danger">No alt name given</span></h4>
                        @endif
                        <p>
                            <button  type="button" class="btn btn-info" data-id="{{$carousel->id}}" data-name="{{$carousel->name}}" data-header="{{$carousel->header}}" data-subheader="{{$carousel->subheader}}" data-toggle="modal"
                                     data-target="#editModal" id="edit-modal"><i class="fa fa-pencil-square-o"></i> Edit</button>
                            @if(!$carousel->status)
                            <a  href="{{route('carousel.publish', $carousel->id)}}" class="btn btn-success" ><i class="fa fa-print"></i> Publish</a>
                            @else
                            <a  href="{{route('carousel.unpublish',$carousel->id)}}" class="btn btn-success" ><i class="fa fa-print"></i> UnPublish</a>
                            @endif
                            <button type="button" class="btn btn-danger" id="delete-modal" data-id="{{$carousel->id}}"   data-toggle="modal"
                                    data-target="#myModal"><i
                                        class="fa fa-trash-o"></i> Delete</button>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit </h4>
                </div>
                <div class="modal-body text-center">
                    <input type="hidden" id="id-edit">
                    <div class="row">
                        <div class="form-group">
                            <label for="name-edit" class="col-sm-2">Name</label>
                            <input type="text" class=" col-sm-8" id="name-edit" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="header-edit" class="col-sm-2">Header</label>
                            <input type="text" class=" col-sm-8" id="header-edit" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="subheader-edit" class="col-sm-2">Sub header</label>
                            <input type="text" class=" col-sm-8" id="subheader-edit" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success save">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{--delete modal--}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Are you sure you want delete ? </h4>
                </div>
                <div class="modal-body text-center">
                    <input type="hidden" id="id-delete">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-success delete">Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            //edit
            $(document).on('click', '#edit-modal', function () {
                $('#id-edit').val($(this).data('id'));
                $('#name-edit').val($(this).data('name'));
                $('#header-edit').val($(this).data('header'));
                $('#subheader-edit').val($(this).data('subheader'));
            });

            $('.modal-footer').on('click', '.save', function () {
                var id = $('#id-edit').val();
                $.ajax({
                    type: 'PUT',
                    url: '/manage/carousel/' + id,
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'id': $("#id-edit").val(),
                        'name': $('#name-edit').val(),
                        'title': $('#header-edit').val(),
                        'subtitle': $('#subheader-edit').val()
                    },
                    success: function (data) {
                        $('#myModal').modal('hide');
                        toastr.success('Item update success!', 'Info Alert');
                        location.reload();
                    }

                });
            });
            //delete
            $(document).on('click', '#delete-modal', function () {
                $('#id-delete').val($(this).data('id'));
            });

            $('.modal-footer').on('click', '.delete', function () {
                var id = $('#id-delete').val();
                console.log(id);
                $.ajax({
                    type: 'DELETE',
                    url: '/manage/carousel/' + id,
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'id': $("#id-delete").val()
                    },
                    success: function (data) {
                        $('#myModal').modal('hide');
                        toastr.success('Page deleted sucessfully!', 'Success Alert');
                        $('.item' + data['id']).remove();
                    }

                });
            });

        });
    </script>
@stop
