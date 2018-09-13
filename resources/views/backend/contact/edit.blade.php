@extends('layouts.backend')
@section('content')
    <div class="col-lg-offset-1 col-md-10">
        {{ Form::model($contact, ['route' => ['setting.update', $contact->id],'class'=>'form form-validate', 'method' => 'PATCH']) }}
        <div class="card">
            <div class="card-head style-primary">
                <header>Site Settings</header>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->has('site_name') ? 'has-error' : ''}}">
                            {{ Form::text('site_name', null, ['class' => 'form-control', 'id'=>'site_name']) }}
                            @if($errors->has('site_name'))
                                <span class="help-block">{{ $errors->first('site_name') }}</span>
                            @endif
                            {{ Form::label('site_name', 'Site Name ') }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->has('facebook') ? 'has-error' : ''}}">
                            {{ Form::text('facebook', null, ['class' => 'form-control', 'id'=>'facebook']) }}
                            @if($errors->has('facebook'))
                                <span class="help-block">{{ $errors->first('facebook') }}</span>
                            @endif
                            {{ Form::label('facebook', 'Facebook ') }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->has('address') ? 'has-error' : ''}}">
                            {{ Form::text('address', null, ['class' => 'form-control', 'id'=>'address']) }}
                            @if($errors->has('address'))
                                <span class="help-block">{{ $errors->first('address') }}</span>
                            @endif
                            {{ Form::label('address', 'Address ') }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->has('twitter') ? 'has-error' : ''}}">
                            {{ Form::text('twitter', null, ['class' => 'form-control', 'id'=>'twitter']) }}
                            @if($errors->has('twitter'))
                                <span class="help-block">{{ $errors->first('twitter') }}</span>
                            @endif
                            {{ Form::label('twitter', 'Twitter ') }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->has('city') ? 'has-error' : ''}}">
                            {{ Form::text('city', null, ['class' => 'form-control', 'id'=>'city']) }}
                            @if($errors->has('city'))
                                <span class="help-block">{{ $errors->first('city') }}</span>
                            @endif
                            {{ Form::label('city', 'City ') }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->has('instagram') ? 'has-error' : ''}}">
                            {{ Form::text('instagram', null, ['class' => 'form-control', 'id'=>'instagram']) }}
                            @if($errors->has('instagram'))
                                <span class="help-block">{{ $errors->first('instagram') }}</span>
                            @endif
                            {{ Form::label('instagram', 'Instagram ') }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group  {{$errors->has('mobile') ? 'has-error' : ''}}">
                            {{ Form::text('mobile', null, ['class' => 'form-control input-md m-b-sm', 'id'=>'mobile']) }}
                            <label for="mobile">Mobile</label>
                            @if ($errors->has('mobile'))
                                <span class="help-block">{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group  {{$errors->has('googleplus') ? 'has-error' : ''}}">
                            {{ Form::text('googleplus', null, ['class' => 'form-control input-md m-b-sm', 'id'=>'googleplus']) }}
                            <label for="googleplus">Google+</label>
                            @if ($errors->has('googleplus'))
                                <span class="help-block">{{$errors->first('googleplus')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group  {{$errors->has('phone') ? 'has-error' : ''}}">
                            {{ Form::text('phone', null, ['class' => 'form-control input-md m-b-sm', 'id'=>'phone']) }}
                            <label for="phone">Phone</label>
                            @if ($errors->has('phone'))
                                <span class="help-block">{{$errors->first('phone')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group  {{$errors->has('youtube') ? 'has-error' : ''}}">
                            {{ Form::text('youtube', null, ['class' => 'form-control input-md m-b-sm', 'id'=>'youtube']) }}
                            <label for="youtube">Youtube</label>
                            @if ($errors->has('youtube'))
                                <span class="help-block">{{$errors->first('youtube')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group  {{$errors->has('email') ? 'has-error' : ''}}">
                            {{ Form::text('email', null, ['class' => 'form-control input-md m-b-sm', 'id'=>'email']) }}
                            <label for="email">Email</label>
                            @if ($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group  {{$errors->has('tumbler') ? 'has-error' : ''}}">
                            {{ Form::text('tumbler', null, ['class' => 'form-control input-md m-b-sm', 'id'=>'tumbler']) }}
                            <label for="tumbler">Position</label>
                            @if ($errors->has('tumbler'))
                                <span class="help-block">{{$errors->first('tumbler')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group  {{$errors->has('website') ? 'has-error' : ''}}">
                            {{ Form::text('website', null, ['class' => 'form-control input-md m-b-sm', 'id'=>'website']) }}
                            <label for="website">Website</label>
                            @if ($errors->has('website'))
                                <span class="help-block">{{$errors->first('website')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group  {{$errors->has('linkedin') ? 'has-error' : ''}}">
                            {{ Form::text('linkedin', null, ['class' => 'form-control input-md m-b-sm', 'id'=>'linkedin']) }}
                            <label for="linkedin">Linkedin</label>
                            @if ($errors->has('linkedin'))
                                <span class="help-block">{{$errors->first('linkedin')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group  {{$errors->has('skype') ? 'has-error' : ''}}">
                            {{ Form::text('skype', null, ['class' => 'form-control input-md m-b-sm', 'id'=>'skype']) }}
                            <label for="skype">Skype</label>
                            @if ($errors->has('skype'))
                                <span class="help-block">{{$errors->first('skype')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group  {{$errors->has('whats_app') ? 'has-error' : ''}}">
                            {{ Form::text('whats_app', null, ['class' => 'form-control input-md m-b-sm', 'id'=>'whats_app']) }}
                            <label for="whats_app">Whats app</label>
                            @if ($errors->has('whats_app'))
                                <span class="help-block">{{$errors->first('whats_app')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Google Map Link</h4>
                        <div class="form-group {{$errors->has('google_map_link') ? 'has-error' : ''}}">
                                <textarea name="google_map_link"
                                          id="google_map_link {{$errors->has('google_map_link') ? 'inputError' : ''}}"
                                          cols="30" rows="5" required style="width: 100%; resize: none;">{{$contact->google_map_link}}</textarea>
                            @if($errors->has('google_map_link'))
                                <span class="help-block">{{ $errors->first('google_map_link') }}</span>
                            @endif

                        </div>
                    </div>
                </div>
            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    {{ Form::submit('Create', ['class' => 'btn btn-lg btn-flat btn-primary ink-reaction'] )}}
                </div>
            </div>
            {!! Form::close() !!}
        </div><!--end .col -->
    </div>
    </div>
@stop