@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <a href="{{ route('team.create') }}"
               class="btn ink-reaction btn-raised btn-lg btn-primary btn-block">Add</a>
        </div>
        <hr>
    </div>
    <section class="style-default-bright">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="sort-alpha">Name</th>
                            <th class="sort-alpha">Type</th>
                            <th class="sort-alpha">Designation</th>
                            <th data-orderable="false">Image</th>
                            <th data-orderable="false">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teams as $team)
                            <tr>
                                <th>{{$team->name}}</th>
                                <th>{{$team->type}}</th>
                                <th>{{$team->position}}</th>

                                <th>
                                    @if(!$team->image)
                                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                    @else
                                        <span><i class="fa fa-close" aria-hidden="true"></i></span>
                                        @endif
                                </th>
                                <th>
                                    <a href="{{ route('team.edit',$team->id)}}"
                                       class="btn btn-block btn-sm ink-reaction btn-info">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                    </a>

                                    {!!  Form::open( array('route'=>array('team.destroy', $team->id),'method'=>'DELETE')) !!}
                                    <button type="submit" class="btn btn-block btn-sm ink-reaction btn-danger form-delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                    </button>
                                    {!! Form::close() !!}
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!--end .table-responsive -->
            </div><!--end .col -->
        </div><!--end .row -->
    </section>
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
@stop