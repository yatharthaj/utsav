@extends('layouts.backend')

@section('content')
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
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <br/>
                        <span class="text-lg text-bold text-primary">FORGOT PASSWORD</span>
                        <br/><br/>
                        <form class="form floating-label" action="{{ route('password.email') }}" accept-charset="utf-8" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" class="form-control" id="email {{$errors->has('email') ? 'inputError' : ''}}" name="email" value="{{ old('email') }}">
                                <label for="email">Email</label>
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger" id="danger-alert" role="alert">
                                        <strong>Oh snap!</strong> {{$errors->first('email')}}
                                    </div>
                                @endif
                            </div>

                            <br/>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-raised btn-block" type="submit">Send Password Reset Link</button>
                                </div><!--end .col -->
                                <p class="help-block"><a href="{{ route('login') }}"><i class="fa fa-caret-left"></i> Back to login page</a></p>
                            </div><!--end .row -->
                        </form>
                    </div><!--end .col -->
                    <div class="col-sm-1"></div>
                </div><!--end .row -->
            </div><!--end .card-body -->
        </div><!--end .card -->
    </section>
@endsection
@section('scripts')

@stop