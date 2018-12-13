@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <a href="{{ route('section-control.create') }}"
               class="btn ink-reaction btn-raised btn-lg btn-primary btn-block">Create</a>
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
                            <th class="sort-numeric">Display Name</th>
                            <th class="sort-alpha">Details</th>
                            <th class="sort-alpha">Status</th>
                            <th data-orderable="false">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sections as $section)
                            <tr>
                            <th>{{$section->name}}</th>
                            <th>{{$section->display_name}}</th>
                            <th>{!!  str_limit(strip_tags($section->details), 50, '...') !!}</th>
                            <th>
                                @if($section->status)
                                    <span class="label label-success">Published</span>
                                @else
                                    <span class="label label-warning">Unpublished</span>
                                @endif
                            </th>
                            <th>
                                <a href="{{ route('section-control.edit',$section->id)}}"
                                   class="btn btn-block btn-sm ink-reaction btn-info">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                </a>
                                @if(!$section->status)
                                    <a href="{{ route('section-control.publish',$section->id)}}"
                                       class="btn btn-block btn-sm ink-reaction btn-success">
                                        <i class="fa fa-print" aria-hidden="true"></i> Publish
                                    </a>
                                @else
                                    <a href="{{ route('section-control.unpublish',$section->id)}}"
                                       class="btn btn-block btn-sm ink-reaction btn-warning">
                                        <i class="fa fa-print" aria-hidden="true"></i> Unpublish
                                    </a>
                                @endif
                                {!!  Form::open( array('route'=>array('section-control.destroy', $section->id),'method'=>'DELETE')) !!}
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