@extends('layouts.app')

@section('content')
    <div class="row" style="position: relative; top: 100px;">
        <div class="col-lg-4 col-md-offset-4">
            <h1 style="margin-bottom: 25px; font-family: Arvo; font-size: 24px; font-weight: 600; color: #666666; ">Register To Dingo</h1>
            <form role="form" method="POST" action="{{ url('/register') }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="account-email" class="control-label"><span class="glyphicon glyphicon-envelope" aria-hidden="true" style="padding-right: 5px;"></span> E-Mail Address</label>
                    <input id="account-email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="user-name" class="control-label"><span class="glyphicon glyphicon-user" aria-hidden="true" style="padding-right: 5px;"></span> Name</label>
                    <input type="text" id="user-name" class="form-control" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="account-password" class="control-label"><span class="glyphicon glyphicon-lock" aria-hidden="true" style="padding-right: 5px;"></span> Password</label>
                    <input type="password" id="account-password" class="form-control" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="account-repassword" class="control-label"><span class="glyphicon glyphicon-lock" aria-hidden="true" style="padding-right: 5px;"></span> Confirm Password</label>
                    <input type="password" id="account-repassword" class="form-control" name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Register
                    </button>
                </div>
                <div class="form-group">
                    Have an account? <a href="{{ url('/login') }}"><u>Login to Dingo account</u>.</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
