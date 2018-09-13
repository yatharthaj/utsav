@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-tiles style-default-light">

                <!-- BEGIN BLOG POST HEADER -->
                <div class="row">
                    <div class="col-sm-9">
                        <div class="card-body style-default-dark">
                            <h2>{{ $page->title}}</h2>
                            <div class="text-default-light">
                                Status:
                                @if($page->published == 0)
                                    Unpublished
                                @else
                                    Published
                                @endif
                            </div>
                            <div class="text-default-light">
                                Position:
                                @if(!$page->main)
                                    <span class="label label-info">{{$page->parent->name}}</span>  <i class="fa fa-arrow-circle-right"></i>
                                @endif
                                    <span class="label label-primary f-s-12">{{ $page->position }}</span>
                            </div>
                        </div>
                    </div><!--end .col -->
                    <div class="col-sm-3">
                        <div class="card-body">
                            <div class="hidden-xs">
                                <a href="{{ route('pages.index') }}"
                                   class="btn btn-block ink-reaction btn-primary">Save</a>
                                <a href="{{ route('pages.edit',$page->id) }}"
                                   class="btn btn-block ink-reaction btn-info">Edit</a>
                            </div>
                            <div class="visible-xs">
                                <a href="{{ route('pages.index') }}"
                                   class="btn btn-block ink-reaction btn-primary">Save</a>
                                <a href="{{ route('pages.edit',$page->id) }}"
                                   class="btn btn-block ink-reaction btn-info">Edit</a>
                            </div>
                        </div>
                    </div><!--end .col -->
                </div><!--end .row -->
                <!-- END BLOG POST HEADER -->

                <div class="row">

                    <!-- BEGIN BLOG POST TEXT -->
                    <div class="col-md-9">
                        <article class="style-default-bright">
                            <div class="card-body">
                                <p class="lead">
                                    {!! $page->page_content !!}
                                </p>
                            </div><!--end .card-body -->
                        </article>
                    </div><!--end .col -->
                    <!-- END BLOG POST TEXT -->
                </div><!--end .row -->
            </div><!--end .card -->
        </div><!--end .col -->
    </div><!--end .row -->
@stop
