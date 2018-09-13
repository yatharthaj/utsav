@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="table-responsive">
            <table id="datatable1" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr class="item{{$category->id}}">
                        <td><h4>{{$loop->iteration}}</h4></td>
                        <td><h4>{{$category->name}}</h4></td>
                        <td>
                            <h4>
                                @if($category->path) 
                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i> 
                                @else 
                                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> 
                                @endif
                            </h4>
                        </td>
                        <td>
                            <a href="{{ route('tour-category.edit',$category->id) }}" class="btn ink-reaction btn-floating-action btn-sm btn-info "><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            
                            <button type="button" class="btn ink-reaction btn-floating-action btn-sm  btn-danger" data-id="{{$category->id}}" data-toggle="modal"
                                data-target="#deleteModal" id="delete-modal">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!--end .table-responsive -->
    </div><!--end .col -->
    <div class="col-lg-4">
        <form class="form" method="POST" action="{{ route('tour-category.store') }}">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-head style-primary">
                    <header>Create new category</header>
                </div>
                <div class="card-body floating-label">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name">
                                <label for="name">Name</label>
                                @if ($errors->has('image'))
                                <span class="help-block">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group floating-label {{$errors->has('image') ? 'has-error' : ''}}">
                                <input name="image" type="file"
                                id="image {{$errors->has('image')? 'inputError' : ''}}"
                                value="{{ old('image') }}" required/>
                                {{ Form::label('image', 'Featured Image') }}
                                @if ($errors->has('image'))
                                <span class="help-block">{{$errors->first('image')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <button type="submit" class="btn btn-block btn-success ink-reaction">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div><!--end .row -->
<!-- BEGIN EDIT MODAL MARKUP -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="formModalLabel">Edit</h4>
        </div>
        <form class="form-horizontal" role="form">
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="edit-id">
                    <div class="col-sm-3">
                        <label for="name" class="control-label">Name</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="name" id="edit-name" class="form-control">
                    </div>
                    <div class="col-sm-3">
                        <label for="name" class="control-label">Image</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="file" name="image" id="edit-image" class="form-control">
                    </div>                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary save">Update</button>
            </div>
        </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END EDIT MODAL MARKUP -->
<!-- BEGIN Delete MODAL MARKUP -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="formModalLabel">Delete</h4>
        </div>
        <form class="form-horizontal" role="form">
            <div class="modal-body text-center">
                <input type="hidden" id="id-delete">
                <h4>Are you sure you want to delete ?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary delete">Delete</button>
            </div>
        </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END Delete MODAL MARKUP -->
@stop
@section('scripts')
<script>
    $(document).ready(function () {
            //edit
            $(document).on('click', '#edit-modal', function () {
                $('#edit-id').val($(this).data('id'));
                $('#edit-name').val($(this).data('name'));
                $('#edit-image').val($(this).data('image'));
            });

            $('.modal-footer').on('click', '.save', function () {
                var id = $('#edit-id').val();
                $.ajax({
                    type: 'PUT',
                    url: '/manage/tour-category/' + id,
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'id': $("#edit-id").val(),
                        'name': $('#edit-name').val(),
                        'image': $('#edit-image').val()
                    },
                    success: function (data) {
                        $('#formModal').modal('hide');
                        toastr.success('Item update success!', 'Info Alert');
                        location.reload();
                    }

                });
            });
            //delete
            $(document).on('click', '#delete-modal', function () {
                $('#id-delete').val($(this).data('id'));
                var id = $('#id-delete').val();
                console.log(id);
            });

            $('.modal-footer').on('click', '.delete', function () {
                var id = $('#id-delete').val();
                console.log(id);
                $.ajax({
                    type: 'DELETE',
                    url: '/manage/tour-category/' + id,
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'id': $("#id-delete").val()
                    },
                    success: function (data) {
                        $('#deleteModal').modal('hide');
                        toastr.success('Page deleted sucessfully!', 'Success Alert');
                        $('.item' + data['id']).remove();
                    }

                });
            });

        });
    </script>
    @stop