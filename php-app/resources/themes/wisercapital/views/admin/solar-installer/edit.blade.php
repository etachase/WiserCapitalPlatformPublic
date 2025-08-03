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
        {!! Form::open(array('route' => array('admin.solar-installers.update', $solar_installer->id), 'method' => 'PATCH', 'files' => true, 'id' => 'solar-installer-form')) !!}
        <br/><h2>{!! 'Business '. trans('general.tabs.details') !!}</h2><hr/>
        @include('business-profile.solar-installer')
        
        <div class="form-group">
            {!! Form::button( trans('general.button.update'), ['class' => 'btn btn-primary', 'id' => 'btn-submits'] ) !!}
            <a href="{!! route('welcome') !!}" title="{{ trans('general.button.cancel') }}" class='btn btn-default'>{{ trans('general.button.cancel') }}</a>
        </div>



    </div>

@endsection



<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
<script>
$(document).ready(function () {
    $('#btn-submits').on('click', function () {
        $('.phoneNumberFormatter').unmask();
        $('.priceFormatter2').each(function() {
                if ($(this).val()) {
                    var unmasked = $(this).maskMoney('unmasked'); 
                    $(this).val(unmasked[0]); 
                }
            });
        $('#solar-installer-form').submit();
    });
    
    
    
    
        
        
});

</script>


 



@endsection
  
