@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-10">
            {{--{{$departures->tour->count()}}--}}
        </div>
        <div class="col-md-2">
            <a href="{{ route('departure.create') }}"
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
                            {{-- <th class="sort-numeric">Departure Dates</th> --}}

                            <th data-orderable="false">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departures as $departure)
                            <tr>
                                <th>{{$departure->tour->title}}</th>
                                {{-- <th>{{$departure->unique()->count()}}</th> --}}
                                <th>
                                    <a href="{{route('departure.show',$departure->tour->id)}}" class="btn ink-reaction btn-raised btn-sm btn-info"><i class="fa fa-list-ul"></i> Show</a>
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
