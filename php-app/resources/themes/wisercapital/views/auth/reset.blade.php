@extends('layouts.dialog')

@section('content')
<p class="login-box-msg">Reset Password</p>
<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

        <div class="col-md-12">
            <input id="user_email" type="email" class="form-control" placeholder="E-Mail Address" name="user_email" value="{{ $email or old('email') }}" disabled>
            <input id="email" type="hidden" class="form-control" placeholder="E-Mail Address" name="email" value="{{ $email or old('email') }}">
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

        <div class="col-md-12">
            <input id="password" type="password" class="form-control" name="password" placeholder="Password">

            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <div class="col-md-12">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">

            @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-flat">
                <i class="fa fa-btn fa-refresh"></i> Reset Password
            </button>
        </div>
    </div>
</form>

@endsection
