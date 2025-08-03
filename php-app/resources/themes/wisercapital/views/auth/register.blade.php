@extends('layouts.dialog')

@section('content')
    <p class="login-box-msg">Enter your information to register</p>
        <form class="form-signin" method="POST" action="/auth/register" >
            {!! csrf_field() !!}

            <div class="form-group has-feedback">
                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name" value="{{ old('first_name') }}" required autofocus/>
                <span class="ion ion-ios-person-outline form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name" value="{{ old('last_name') }}" required/>
                <span class="ion ion-ios-person-outline form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required/>
                <span class="ion ion-ios-email-outline form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required/>
                <span class="ion ion-ios-locked-outline form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Password" required/>
                <span class="ion ion-ios-locked-outline form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::select('role', $roles, null, ['placeholder' => 'Select a role...', 'class' => 'form-control select2','id'=>'role','required'=>true, 'onchange' => "$('#remember').iCheck('uncheck')"]) !!}
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" id="remember" name="remember" required=""> I agree to the <a href="javascript://" onclick="return terms()">terms</a>
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div><!-- /.col -->
            </div>
        </form>

        {!! link_to_route('login', 'Sign in', [], ['class' => "text-center pull-left"]) !!}
        {!! link_to_route('recover_password', 'I forgot my password', [], ['class' => "text-center pull-right"]) !!}
@endsection
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="termsModal">
    <div class="modal-dialog">
        <div class="modal-content"><div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Terms & Conditions</h4>
            </div>
            <div id="modal-body" style="padding: 30px;text-align: justify;">

            </div>
        </div>
    </div>
</div>