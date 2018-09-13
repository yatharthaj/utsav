@extends('layouts.backend')
@section('styles')
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
@stop
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <h1>{{$error}}</h1>
        @endforeach
    @endif
    <div class="row">
        <div class="col-lg-offset-1 col-md-10">
            {!! Form::open(['route' => 'section-control.store' , 'class'=>'form form-validate','files'=> true ]) !!}
            <div class="card">
                <div class="card-head style-primary">
                    <header>Create new section</header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group floating-label {{$errors->has('name') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="name {{$errors->has('name') ? 'inputError' : ''}}" name="name"
                                       value="{{ old('name') }}" required>
                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                                {{ Form::label('name', 'Name ') }}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group floating-label {{$errors->has('display_name') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="display_name {{$errors->has('display_name') ? 'inputError' : ''}}" name="display_name"
                                       value="{{ old('display_name') }}" required>
                                @if($errors->has('display_name'))
                                    <span class="help-block">{{ $errors->first('display_name') }}</span>
                                @endif
                                {{ Form::label('display_name', 'Display Name ') }}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group {{$errors->has('status') ? 'has-error' : ''}}">
                                <label class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-9">
                                    <label class="radio-inline radio-styled radio-success">
                                        <input type="radio" value="1" name="status" checked><span>Publish</span>
                                    </label>
                                    <label class="radio-inline radio-styled radio-warning">
                                        <input type="radio" value="0" name="status"><span>Draft</span>
                                    </label>
                                </div>
                                @if($errors->has('status'))
                                    <span class="help-block">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{--Title --}}

                    <div class="row">
                        <div class="form-group">
                            <h4>Overview</h4>
                            <textarea name="details"> </textarea>
                        </div>
                    </div>
                    {{--Overview --}}
                </div><!--end .card body-->
                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        {{ Form::submit('Create', ['class' => 'btn btn-lg btn-flat btn-primary ink-reaction'] )}}
                    </div>
                </div>

                {!! Form::close() !!}
            </div><!--end .col -->
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('js/core/demo/DemoFormComponents.js') }}"></script>
    <script src="{{ asset('js/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/libs/ckeditor/adapters/jquery.js') }}"></script>
    <script src="{{ asset('js/core/demo/DemoFormEditors.js') }}"></script>
    <script>
        CKEDITOR.replace('details', {
            height: 250
        });
    </script>
@stop
