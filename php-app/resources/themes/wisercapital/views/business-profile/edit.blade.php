@extends('layouts.master')

@section('content')
@if(session('status'))
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4>
        <i class="icon fa fa-ban"></i> Errors
    </h4>
    <li>{{ session('status') }}</li>
</div>
@endif
    
<div class="row">
	<div class="col-lg-8">
		<h2>{!! 'Business '. trans('general.tabs.details') !!}</h2>
	</div>
	<div class="col-lg-4  pull-right">
		<a href="{!! route('business_profile.skip') !!}" title="Skip" class='btn btn-primary pull-right-md'>Skip</a>
	</div>
</div>

<hr />

{!! Form::open(array('route' => array('business_profile.update'), 'method' => 'PATCH', 'files' => true)) !!}
@include('business-profile.'.$user_role_name)
 
<div class="row">
    <div class="col-lg-12">
    	<div class="form-group">
			{!! Form::submit( Auth::user()->is_complete_profile ? trans('general.button.update') : 'Create Profile', ['class' => 'btn btn-primary', 'id' => 'btn-submits'] ) !!}
			<a href="{!! route('business_profile.skip') !!}" title="Skip" class='btn btn-default'>Skip</a>
    	</div>
    </div>
</div>
{!! Form::close() !!}
       
@endsection

