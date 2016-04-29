@extends('layouts.app')

@section('content')
    <div class="row" style="position: relative; top: 100px;">
        <div class="col-lg-4 col-md-offset-4">
            <h1 style="margin-bottom: 25px; font-family: Arvo; font-size: 24px; font-weight: 600; color: #666666; ">
                Login To Dingo</h1>
            <form role="form" method="POST" action="{{ url('/login') }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="account-email" class="control-label"><span class="glyphicon glyphicon-envelope"
                                                                           aria-hidden="true"
                                                                           style="padding-right: 5px;"></span> E-Mail
                        Address</label>
                    <input type="email" id="account-email" class="form-control" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="account-password" class="control-label"><span class="glyphicon glyphicon-lock"
                                                                              aria-hidden="true"
                                                                              style="padding-right: 5px;"></span>
                        Password</label>
                    <input type="password" id="account-password" class="form-control" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input class="magic-checkbox" type="checkbox" name="layout" id="remember-me" value="option">
                    <label for="remember-me">Remeber Me</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login
                    </button>
                    <a class="btn btn-link" href="{{ url('password/email') }}">Forgot Your Password?</a>
                </div>
                <div class="form-group">
                    Don't have an account? <a href="{{ url('/register') }}"><u>Create a Dingo account</u>.</a>
                </div>
            </form>
        </div>
    </div>
@endsection
