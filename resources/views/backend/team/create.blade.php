@extends('layouts.backend')
@section('content')
@if ($errors->any())
@foreach ($errors->all() as $error)
<h1>{{$error}}</h1>
@endforeach
@endif
<div class="row">
    <div class="col-lg-offset-1 col-md-10">
        {!! Form::open(['route' => 'team.store' , 'class'=>'form form-validate','files'=> true ]) !!}
        <div class="card">
            <div class="card-head style-primary">
                <header>Add team member</header>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
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
                    <div class="col-sm-3">
                        <div class="form-group floating-label">
                            <select name="type" id="type" class="form-control" required>
                                <option value=""></option>
                                <option value="executive team">Executive Team</option>
                                <option value="Ski Guide">Ski Guide</option>
                                <option value="Guide"> Guide</option>
                            </select>
                            <label for="type">Type</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group floating-label {{$errors->has('position') ? 'has-error' : ''}}">
                            <input type="text" class="form-control"
                            id="position {{$errors->has('position') ? 'inputError' : ''}}" name="position"
                            value="{{ old('position') }}" required>
                            @if($errors->has('position'))
                            <span class="help-block">{{ $errors->first('position') }}</span>
                            @endif
                            {{ Form::label('position', 'Position ') }}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group floating-label {{$errors->has('image') ? 'has-error' : ''}}">
                            <input name="image" type="file"
                            id="image {{$errors->has('image')? 'inputError' : ''}}"
                            value="{{ old('image') }}" required/>
                            <label for="image">Image (400x300)</label>
                            @if ($errors->has('image'))
                            <span class="help-block">{{$errors->first('image')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group floating-label {{$errors->has('fb') ? 'has-error' : ''}}">
                            <input type="text" class="form-control"
                            id="fb {{$errors->has('fb') ? 'inputError' : ''}}" name="fb"
                            value="{{ old('fb') }}" >
                            @if($errors->has('fb'))
                            <span class="help-block">{{ $errors->first('fb') }}</span>
                            @endif
                            {{ Form::label('fb', 'Facebook ') }}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group floating-label {{$errors->has('insta') ? 'has-error' : ''}}">
                            <input type="text" class="form-control"
                            id="insta {{$errors->has('insta') ? 'inputError' : ''}}" name="insta"
                            value="{{ old('name') }}" >
                            @if($errors->has('insta'))
                            <span class="help-block">{{ $errors->first('insta') }}</span>
                            @endif
                            {{ Form::label('insta', 'Instagram ') }}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group floating-label {{$errors->has('linked') ? 'has-error' : ''}}">
                            <input type="text" class="form-control"
                            id="linked {{$errors->has('linked') ? 'inputError' : ''}}" name="linked"
                            value="{{ old('linked') }}" >
                            @if($errors->has('linked'))
                            <span class="help-block">{{ $errors->first('linked') }}</span>
                            @endif
                            {{ Form::label('linked', 'Linkedin ') }}
                        </div>
                    </div>
                </div>
                {{--Title --}}

                <div class="row">
                    <div class="form-group">
                        <h4>Description</h4>
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
