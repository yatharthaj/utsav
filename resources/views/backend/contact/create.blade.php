@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-offset-1 col-md-10">
            {!! Form::open(['route' => 'setting.store', 'class'=>'form form-validate','files'=> true ]) !!}
            <div class="card">
                <div class="card-head style-primary">
                    <header>Site Settings</header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group floating-label {{$errors->has('site_name') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="site_name {{$errors->has('site_name') ? 'inputError' : ''}}" name="site_name"
                                       value="{{ old('site_name') }}" required>
                                @if($errors->has('site_name'))
                                    <span class="help-block">{{ $errors->first('site_name') }}</span>
                                @endif
                                {{ Form::label('site_name', 'Site Name ') }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group floating-label {{$errors->has('facebook') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="facebook {{$errors->has('facebook') ? 'inputError' : ''}}" name="facebook"
                                       value="{{ old('facebook') }}" required>
                                @if($errors->has('facebook'))
                                    <span class="help-block">{{ $errors->first('facebook') }}</span>
                                @endif
                                {{ Form::label('facebook', 'Facebook ') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group floating-label {{$errors->has('address') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="address {{$errors->has('address') ? 'inputError' : ''}}" name="address"
                                       value="{{ old('address') }}" required>
                                @if($errors->has('address'))
                                    <span class="help-block">{{ $errors->first('address') }}</span>
                                @endif
                                {{ Form::label('address', 'Address ') }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group floating-label {{$errors->has('twitter') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="twitter {{$errors->has('twitter') ? 'inputError' : ''}}" name="twitter"
                                       value="{{ old('twitter') }}" required>
                                @if($errors->has('twitter'))
                                    <span class="help-block">{{ $errors->first('twitter') }}</span>
                                @endif
                                {{ Form::label('twitter', 'Twitter ') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group floating-label {{$errors->has('city') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="city {{$errors->has('city') ? 'inputError' : ''}}" name="city"
                                       value="{{ old('city') }}" required>
                                @if($errors->has('city'))
                                    <span class="help-block">{{ $errors->first('city') }}</span>
                                @endif
                                {{ Form::label('city', 'City ') }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group floating-label {{$errors->has('instagram') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="instagram {{$errors->has('instagram') ? 'inputError' : ''}}" name="instagram"
                                       value="{{ old('instagram') }}" required>
                                @if($errors->has('instagram'))
                                    <span class="help-block">{{ $errors->first('instagram') }}</span>
                                @endif
                                {{ Form::label('instagram', 'Instagram ') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group floating-label {{$errors->has('mobile') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="mobile {{$errors->has('mobile') ? 'inputError' : ''}}" name="mobile"
                                       value="{{ old('mobile') }}" required>
                                @if($errors->has('mobile'))
                                    <span class="help-block">{{ $errors->first('mobile') }}</span>
                                @endif
                                {{ Form::label('mobile', 'Mobile ') }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group floating-label {{$errors->has('googleplus') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="googleplus {{$errors->has('googleplus') ? 'inputError' : ''}}"
                                       name="googleplus"
                                       value="{{ old('googleplus') }}" required>
                                @if($errors->has('googleplus'))
                                    <span class="help-block">{{ $errors->first('googleplus') }}</span>
                                @endif
                                {{ Form::label('googleplus', 'Google+ ') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group floating-label {{$errors->has('phone') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="phone {{$errors->has('phone') ? 'inputError' : ''}}" name="phone"
                                       value="{{ old('phone') }}" required>
                                @if($errors->has('phone'))
                                    <span class="help-block">{{ $errors->first('phone') }}</span>
                                @endif
                                {{ Form::label('phone', 'Phone ') }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group floating-label {{$errors->has('youtube') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="youtube {{$errors->has('youtube') ? 'inputError' : ''}}" name="youtube"
                                       value="{{ old('youtube') }}" required>
                                @if($errors->has('youtube'))
                                    <span class="help-block">{{ $errors->first('youtube') }}</span>
                                @endif
                                {{ Form::label('youtube', 'Youtube ') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group floating-label {{$errors->has('email') ? 'has-error' : ''}}">
                                <input type="email" class="form-control"
                                       id="email {{$errors->has('email') ? 'inputError' : ''}}" name="email"
                                       value="{{ old('email') }}" required>
                                @if($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                                {{ Form::label('email', 'Email ') }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group floating-label {{$errors->has('tumbler') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="tumbler {{$errors->has('tumbler') ? 'inputError' : ''}}" name="tumbler"
                                       value="{{ old('tumbler') }}" required>
                                @if($errors->has('tumbler'))
                                    <span class="help-block">{{ $errors->first('tumbler') }}</span>
                                @endif
                                {{ Form::label('tumbler', 'Tumbler ') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group floating-label {{$errors->has('website') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="website {{$errors->has('website') ? 'inputError' : ''}}" name="website"
                                       value="{{ old('website') }}" required>
                                @if($errors->has('website'))
                                    <span class="help-block">{{ $errors->first('website') }}</span>
                                @endif
                                {{ Form::label('website', 'Website ') }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group floating-label {{$errors->has('linkedin') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="linkedin {{$errors->has('linkedin') ? 'inputError' : ''}}" name="linkedin"
                                       value="{{ old('linkedin') }}" required>
                                @if($errors->has('linkedin'))
                                    <span class="help-block">{{ $errors->first('linkedin') }}</span>
                                @endif
                                {{ Form::label('linkedin', 'Linked in ') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group floating-label {{$errors->has('skype') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="skype {{$errors->has('skype') ? 'inputError' : ''}}" name="skype"
                                       value="{{ old('skype') }}" required>
                                @if($errors->has('skype'))
                                    <span class="help-block">{{ $errors->first('skype') }}</span>
                                @endif
                                {{ Form::label('skype', 'Skype') }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group floating-label {{$errors->has('whats_app') ? 'has-error' : ''}}">
                                <input type="text" class="form-control"
                                       id="whats_app {{$errors->has('whats_app') ? 'inputError' : ''}}" name="whats_app"
                                       value="{{ old('whats_app') }}" required>
                                @if($errors->has('whats_app'))
                                    <span class="help-block">{{ $errors->first('whats_app') }}</span>
                                @endif
                                {{ Form::label('whats_app', 'Whats app ') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>Google Map Link</h4>
                            <div class="form-group floating-label {{$errors->has('google_map_link') ? 'has-error' : ''}}">
                                <textarea name="google_map_link"
                                          id="google_map_link {{$errors->has('google_map_link') ? 'inputError' : ''}}"
                                          cols="30" rows="5" required style="width: 100%; resize: none;"></textarea>
                                @if($errors->has('google_map_link'))
                                    <span class="help-block">{{ $errors->first('google_map_link') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                </div><!--end .card body-->
                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        {{ Form::submit('Save', ['class' => 'btn btn-lg btn-flat btn-primary ink-reaction'] )}}
                    </div>
                </div>

                {!! Form::close() !!}
            </div><!--end .col -->
        </div>
    </div>
@stop