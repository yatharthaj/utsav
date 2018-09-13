@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Departure dates for {{$tour->title}}</h3>
        </div>

        <hr>
    </div>
    <section class="style-default-bright">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th data-orderable="false">Start Date</th>
                            <th data-orderable="false">End Date</th>

                            <th class="sort-numeric">Slot</th>

                            <th class="sort-numeric">Price</th>

                            <th data-orderable="false">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tour->departure as $date)
                            <tr class=" item{{$date->id}}">
                                <th>{{ date("jS M, Y", strtotime($date->start))}}</th>
                                <th>{{ date("jS M, Y", strtotime($date->end))}}</th>
                                <th>{{$date->slot}} Spaces Left</th>
                                <th>USD {{$date->price}}</th>
                                <th>
                                    <button type="button" class="btn ink-reaction btn-floating-action btn-sm  btn-danger" data-id="{{$date->id}}" data-toggle="modal"
                                            data-target="#deleteModal" id="delete-modal">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!--end .table-responsive -->
            </div><!--end .col -->
        </div><!--end .row -->
    </section>
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
@endsection
@section('styles')
    <link type="text/css" rel="stylesheet"
          href="{{ asset('css/theme-default/libs/DataTables/jquery.dataTables.css') }}"/>
    <link type="text/css" rel="stylesheet"
          href="{{ asset('css/theme-default/libs/DataTables/extensions/dataTables.colVis.css') }}"/>
    <link type="text/css" rel="stylesheet"
          href="{{ asset('css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css') }}"/>
@stop
@section('scripts')
    <script src="{{ asset('js/libs/DataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js') }}"></script>
    <script src="{{ asset('js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ asset('js/core/demo/DemoTableDynamic.js') }}"></script>
    <script>
        $(document).ready(function () {
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
                    url: '/manage/departure/' + id,
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'id': $("#id-delete").val()
                    },
                    success: function (data) {
                        $('#deleteModal').modal('hide');
                        toastr.success('Item deleted sucessfully!', 'Success Alert');
                        $('.item' + data['id']).remove();
                    }

                });
            });

        });
    </script>
@stop