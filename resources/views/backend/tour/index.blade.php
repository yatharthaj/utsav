@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <a href="{{ route('tour.create') }}"
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
                            <th class="sort-alpha">Title</th>
                            <th class="sort-numeric">Days</th>
                            <th class="sort-alpha">Category</th>
                            <th data-orderable="false">Meta Title</th>
                            <th data-orderable="false">Meta Description</th>
                            <th class="sort-alpha">Status</th>
                            <th data-orderable="false">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tours as $tour)
                            <tr>
                            <th>{{$tour->title}}</th>
                            <th>{{$tour->days}}</th>
                            <th>{{$tour->category->name}}</th>
                            <th>
                                @if($tour->mtitle)
                                    <i class="fa fa-check-circle-o text-success"></i>
                                @else
                                    <i class="fa fa-times-circle-o text-danger"></i>
                                @endif
                            </th>
                            <th>
                                @if($tour->description)
                                    <i class="fa fa-check-circle-o text-success"></i>
                                @else
                                    <i class="fa fa-times-circle-o text-danger"></i>
                                @endif
                            </th>
                            <th>
                                @if($tour->status)
                                    <span class="label label-success">Published</span>
                                @else
                                    <span class="label label-warning">Unpublished</span
                                @endif
                            </th>
                            <th>
                                <a href="{{ route('tour.edit',$tour->id)}}"
                                   class="btn btn-block btn-sm ink-reaction btn-info">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                </a>
                                <a href="{{ route('itinerary-create',$tour->id)}}" class="btn btn-block ink-reaction btn-primary btn-sm">
                                    <i class="fa fa-list-ol" aria-hidden="true"></i> Itinerary
                                </a>
                                @if(!$tour->status)
                                    <a href="{{ route('tour.publish',$tour->id)}}"
                                       class="btn btn-block btn-sm ink-reaction btn-success">
                                        <i class="fa fa-print" aria-hidden="true"></i> Publish
                                    </a>
                                @else
                                    <a href="{{ route('tour.unpublish',$tour->id)}}"
                                       class="btn btn-block btn-sm ink-reaction btn-warning">
                                        <i class="fa fa-print" aria-hidden="true"></i> Unpublish
                                    </a>
                                @endif

                                @if(!$tour->featured )
                                    <a href="{{ route('feature.tour',$tour->id)}}"
                                       class="btn btn-block btn-sm ink-reaction btn-primary">
                                        <i class="fa fa-star" aria-hidden="true"></i> Set as Featured
                                    </a>
                                    @else
                                    <a href="{{ route('remove.feature',$tour->id)}}"
                                       class="btn btn-block btn-sm ink-reaction btn-warning">
                                        <i class="fa fa-star" aria-hidden="true"></i> Remove as Featured
                                    </a>
                                @endif

                                {!!  Form::open( array('route'=>array('tour.destroy', $tour->id),'method'=>'DELETE')) !!}
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