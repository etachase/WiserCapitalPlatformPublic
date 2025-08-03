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

    <div class="box-body">
        {!! Form::open(array('route' => array('profile.update'), 'method' => 'PATCH', 'files' => true)) !!}

        <h2>{!! trans('general.tabs.info') !!}</h2><hr/>
        @include('profile.info')

        <div class="form-group">
            {!! Form::submit( trans('general.button.update'), ['class' => 'btn btn-primary', 'id' => 'btn-submits'] ) !!}
            <a href="{!! route('welcome') !!}" title="{{ trans('general.button.cancel') }}" class='btn btn-default'>{{ trans('general.button.cancel') }}</a>
        </div>



    </div>

@endsection

