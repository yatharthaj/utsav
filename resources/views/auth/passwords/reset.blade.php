@extends('layouts.backend')

@section('logincontent')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <!-- BEGIN LOGIN SECTION -->
    <section class="section-account">
        <div class="img-backdrop" style="background-image: url('{{ asset('img/img18.jpg') }}')"></div>
        <div class="spacer"></div>
        <div class="card contain-sm style-transparent">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <br/>
                        <span class="text-lg text-bold text-primary">RESET YOUR PASSWORD</span>
                        <br/><br/>
                        <form class="form floating-label" action="{{ route('password.request') }}" accept-charset="utf-8" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <input required type="password" class="form-control" id="password {{$errors->has('password') ? 'inputError' : ''}}" name="password">
                                <label for="password">Password</label>
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger" id="danger-alert" role="alert">
                                        <strong>Oh snap!</strong> {{$errors->first('password')}}
                                    </div>
                                @endif

                            </div>
                            <div class="form-group">
                                <input required type="password" class="form-control" id="password_confirmation {{$errors->has('password_confirmation') ? 'inputError' : ''}}" name="password_confirmation">
                                <label for="password_confirmation">Confirm Password</label>
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger" id="danger-alert" role="alert">
                                        <strong>Oh snap!</strong> {{$errors->first('password_confirmation')}}
                                    </div>
                                @endif

                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-raised btn-block" type="submit">Reset Password</button>
                                    <p class="help-block"><a href="{{ route('login') }}">Already have an account ?</a></p>
                                </div><!--end .col -->
                            </div><!--end .row -->
                        </form>
                    </div><!--end .col -->
                    <div class="col-sm-2"></div>
                </div><!--end .row -->
            </div><!--end .card-body -->
        </div><!--end .card -->
    </section>
@endsection
@section('scripts')

@stop
