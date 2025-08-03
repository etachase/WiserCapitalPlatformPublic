<style>

</style>

@extends('layouts.dialog')

@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
@if(session('session-out-alert'))
<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session('session-out-alert') }}
</div>
@endif
<p class="login-box-msg">Sign in to start your session</p>
<form class="form-signin" method="POST" action="/auth/login" >
    {!! csrf_field() !!}

    <div class="form-group has-feedback">
        <input type="text" id="username" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" required autofocus/>
        <span class="ion ion-ios-email-outline form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required/>
        <span class="ion ion-ios-locked-outline form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <div class="checkbox icheck">
                <label>
                    <input type="checkbox" id="remember" name="remember"> Remember Me
                </label>
            </div>
        </div><!-- /.col -->
        <div class="col-sm-5">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div><!-- /.col -->
    </div>
</form>
<div class="clearfix">
    {!! link_to_route('recover_password', 'I forgot my password', [], ['class' => "text-center pull-left"]) !!}
    {!! link_to_route('register', 'Sign Up', [], ['class' => "text-center pull-right"]) !!}
</div>
@endsection