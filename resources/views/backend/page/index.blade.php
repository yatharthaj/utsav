@extends('layouts.backend')
@section('styles')
    <link type="text/css" rel="stylesheet"
          href="{{ asset('css/theme-default/libs/DataTables/jquery.dataTables.css') }}"/>
    <link type="text/css" rel="stylesheet"
          href="{{ asset('css/theme-default/libs/DataTables/extensions/dataTables.colVis.css') }}"/>
    <link type="text/css" rel="stylesheet"
          href="{{ asset('css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css') }}"/>

@stop
@section('content')
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <a href="{{ route('pages.create') }}" class="btn ink-reaction btn-raised btn-lg btn-primary btn-block">Create</a>
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
                            <th class="sort-alpha">Category</th>
                            <th data-orderable="false">Position</th>
                            <th data-orderable="false">Banner</th>
                            <th data-orderable="false">Meta Title</th>
                            <th data-orderable="false">Meta Description</th>
                            <th class="sort-alpha">Status</th>
                            <th data-orderable="false">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                            <th>{{$page->title}}</th>
                            <th>{{$page->category->name}}</th>
                            <th>
                                @if(!$page->main)
                                    <span class="label label-primary f-s-12">{{ $page->parent->title }}</span> <i class="fa fa-arrow-circle-right"></i>
                                @endif
                                <span class="label label-primary f-s-12">{{ $page->position }}</span>
                            </th>
                            <th>
                                @if($page->banner !=='')
                                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                @else
                                    <span><i class="fa fa-close" aria-hidden="true"></i></span>
                                @endif
                            </th>
                            <th>
                                @if($page->meta_title !=='')
                                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                @else
                                    <span><i class="fa fa-close" aria-hidden="true"></i></span>
                                @endif
                            </th>
                            <th>
                                @if($page->description !=='')
                                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                @else
                                    <span><i class="fa fa-close" aria-hidden="true"></i></span>
                                @endif
                            </th>
                            <th>
                                @if($page->status)
                                    <span class="label label-success">Published</span>
                                    @else
                                    <span class="label label-warning">Unpublished</span>
                                @endif
                            </th>
                            <th>
                                <a href="{{ route('pages.edit',$page->id)}}" class="btn btn-block btn-sm ink-reaction btn-info">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                </a>
                                @if($page->published != 0)
                                    <a href="{{ route('page.publish',$page->id)}}" class="btn btn-block btn-sm ink-reaction btn-success">
                                        <i class="fa fa-print" aria-hidden="true"></i> Publish
                                    </a>
                                @else
                                    <a href="{{ route('page.unpublish',$page->id)}}" class="btn btn-block btn-sm ink-reaction btn-warning">
                                        <i class="fa fa-print" aria-hidden="true"></i> Unpublish
                                    </a>
                                @endif
                                {!!  Form::open( array('route'=>array('pages.destroy', $page->id),'method'=>'DELETE')) !!}
                                <button type="submit" class="btn btn-block btn-sm ink-reaction btn-danger form-delete">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                </button>
                                {!! Form::close() !!}
                            </th>
                        @endforeach
                        </tbody>
                    </table>
                </div><!--end .table-responsive -->
            </div><!--end .col -->
        </div><!--end .row -->
    </section>
@endsection