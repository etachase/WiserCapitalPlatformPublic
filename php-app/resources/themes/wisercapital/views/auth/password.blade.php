@extends('layouts.dialog')

@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<p class="login-box-msg">Enter your email to reset your password</p>
<form class="form-signin add-margin30" method="POST" action="/password/email" >
    {!! csrf_field() !!}

    <div class="form-group has-feedback">
        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus/>
        <span class="ion ion-ios-locked-outline form-control-feedback"></span>
    </div>
    <div class="row ">
        <div class="col-xs-5 pull-right">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
        </div><!-- /.col -->
    </div>
</form>
<div class="clearfix">
    {!! link_to_route('login', 'Sign in', [], ['class' => "text-center pull-left"]) !!}
    {!! link_to_route('register', 'Register a new membership', [], ['class' => "text-center pull-right"]) !!}
</div>

@endsection