@extends('layouts.backend')
@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/theme-default/libs/dropzone/dropzone-theme.css') }}" />
@stop
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <div class="card-head style-primary">
                    <header>Drag and drop uploader</header>
                </div>
                <div class="card-body no-padding">
                    <form
                            method="POST"
                            action="{{route('partner.store')}}"
                            class="dropzone"
                            id="addPhotosForm">
                        {{ csrf_field() }}
                        <div class="dz-message">
                            <h3>Drop files here or click to upload.</h3>
                            <h4>Resolution: 165x155</h4>
                        </div>
                    </form>
                </div><!--end .card-body -->
            </div><!--end .card -->

            <a href="{{ route('partner.index') }}" class="col-md-6 col-md-offset-3 btn ink-reaction btn-success">Save</a>
        </div><!--end .col -->
    </div>
    @endsection
@section('scripts')
<script src="{{ asset('js/libs/dropzone/dropzone.min.js') }}"></script>
<script type="text/javascript">
    Dropzone.options.addPhotosForm = {
        paramName: 'photo',
        maxFileSize: 20,
        acceptedFiles: '.jpg, .jpeg, .PNG, .png, .bmp',
        dictDefaultMessage: "Drop images here to upload",
    };
</script>
@stop