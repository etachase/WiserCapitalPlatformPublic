@extends('layouts.master')

@section('content')

@include('hf.style')


<div class="row">
    <div class="sec">
        <div class="col-md-12">
            <div class="sec-header sec-header1 clearfix">
                @include('hf.project_menu')
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="sec tab-sec clearfix">
        <div class="col-md-4"> 
            <ul class="tabs margin-bottom" id="profileeditTab" role="tablist">
                <li role="presentation" id='presentation-project-tab1'><a href="#project-tab1" role="tab" data-toggle="tab">Preliminary Project Information</a></li>
                @if(Auth::user()->hasRole(['admins', 'Investors']) || Auth::user()->hasRole(['developer'], true))
                <li role="presentation" id='presentation-project-tab2'><a href="#project-tab2" role="tab" data-toggle="tab">Financials</a></li>
                @endif
                <li role="presentation" id='presentation-project-tab3'><a href="#project-tab3" role="tab" data-toggle="tab">System Information</a></li>
                <li role="presentation" id='presentation-project-tab4'><a href="#project-tab4" role="tab" data-toggle="tab">Property / Business </a></li>
                <li role="presentation" id='presentation-project-tab5'><a href="#project-tab5" role="tab" data-toggle="tab">Equipment</a></li>
                
              
			
                <li role="presentation" id='presentation-project-tab7'><a href="#project-tab7" role="tab" data-toggle="tab">O&M</a></li>
                @if(Auth::user()->hasRole(['admins', 'Investors']) || Auth::user()->hasRole(['solar-installer', 'developer'], true))
                  
                    <li role="presentation" id='presentation-project-tab10'><a href="#project-tab10" role="tab" data-toggle="tab">
	                    <img class='size-25' src='{{url('/assets/themes/wisercapital/img/blue-hero-ico.png')}}'>
                            &nbsp;Offtaker Creditworthiness</a></li>
                @endif
                @if(Auth::user()->hasRole(['admins', 'Investors']))
                    <li role="presentation" id='presentation-project-tab9'><a href="#project-tab9" role="tab" data-toggle="tab">
	                    <img class='size-25' src='{{url('/assets/themes/wisercapital/img/blue-hero-ico.png')}}'> &nbsp;System Performance</a></li>
                @endif
				@if(Auth::user()->hasRole(['admins', 'Investors']) || Auth::user()->hasRole(['solar-installer'], true) 
                        || Auth::user()->hasRole(['solar-installer', 'developer'], true))

                	<li role="presentation" id='presentation-project-tab6'><a href="#project-tab6" role="tab" data-toggle="tab">
                        <img class='size-25' src='{{url('/assets/themes/wisercapital/img/blue-hero-ico.png')}}'>

                        &nbsp; EPC Creditworthiness</a></li>
				@endif
                @if(Auth::user()->hasRole(['admins', 'Investors']))
                     <li role="presentation" id='presentation-project-tab11'><a href="#project-tab11" role="tab" data-toggle="tab">
                            <img class='size-25' src='{{url('/assets/themes/wisercapital/img/blue-hero-ico.png')}}'>
                            &nbsp;Legal & Policy</a></li>
                     
                    <li role="presentation" id='presentation-project-tab12'><a href="#project-tab12" role="tab" data-toggle="tab">
                            <img class='size-25' src='{{url('/assets/themes/wisercapital/img/blue-hero-ico.png')}}'>
                            &nbsp;Servicing and Administration</a></li>
                    @if(Auth::user()->hasRole(['admins']))
                     <li role="presentation" id='presentation-project-tab13'><a href="#project-tab13" role="tab" data-toggle="tab">
                            <img class='size-25' src='{{url('/assets/themes/wisercapital/img/blue-hero-ico.png')}}'>
                            &nbsp;Transactional Overview </a></li>
                   <li role="presentation" id='presentation-project-tab14'><a href="#project-tab14" role="tab" data-toggle="tab">Agreements & Contracts</a></li>
				   @endif
                @endif
			
                
            </ul>
            <div class="title-box title-box-edit">
                <h3 class="title-box-heading">
                    WSAR Score
                </h3>
                <div class="title-box-entry padding-around30">
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <div class="wsar-score"><span>{{ $WSAR->totalScore() }}</span>/1000</div>
                            <a href="{{ route('hf.wsar-score', $site->id)}}"><button type="button" class="btn btn-edit btn-sm">Score Breakdown</button></a>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            {!! Html::image('assets/themes/wisercapital/img/wsar-project.png', 'WSAR Score') !!}
                        </div>

                    </div>
                </div>
            </div>
            <?php $fit_interconnection = \App\Support\Dropdown::INTERCONNECTION_FIT; ?>
            @if ((isset($metas['signed_site_lease']) && ($metas['signed_site_lease'] == 1))
                || (isset($metas['signed_power_purchase_agreement']) && ($metas['signed_power_purchase_agreement'] == 1))
                 )
            <div class="panel panel-default panel-top-message margin-top" id='panel_message'>
                <div class='panel-body notification_header'>
                    <button type="button" class="close button_panel_message marT-5 f22"
                            data-target='panel_message' aria-hidden="true">×</button>
                    <span class='panel-heading-danger'>
                        {{trans('hf/general.messages.cannot-model-system-title')}}
                    </span>
                </div>
                <div class='panel-body f15-5'>
                    <span>{{trans('hf/general.messages.due-to')}}</span>
                    <ul>
                        @if (isset($metas['interconnection_type']) && 
                            ($metas['interconnection_type'] == $fit_interconnection))
                        <li>{{$error_messages['interconnection_type']}}</li>
                        @endif
                        @if ($ongoing_sys_error)
                        <li>{{$error_messages['ongoing_system_cost']}}</li>
                        @endif
                        @if (isset($metas['signed_power_purchase_agreement']) && ($metas['signed_power_purchase_agreement'] == 1))
                        <li>{{$error_messages['signed_power_purchase_agreement']}}</li>
                        @endif
                        @if (isset($metas['signed_site_lease']) && ($metas['signed_site_lease'] == 1))
                        <li>{{$error_messages['signed_site_lease']}}</li>
                        @endif
                        
                        @if (isset($metas['signed_site_lease']) && ($metas['signed_site_lease'] == 1) || isset($metas['signed_power_purchase_agreement']) && ($metas['signed_power_purchase_agreement'] == 1))
                        <li>{{$error_messages['contact_us']}}</li>
                        @endif
                        
                        
                        
                    </ul>
                </div>
            </div>
            @endif
        </div>
        <div class="col-md-8">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane" id="project-tab1">
                    @include('hf.edit.preliminary_information')
                </div>
                @if(Auth::user()->hasRole(['admins', 'Investors']) || Auth::user()->hasRole(['developer'], true))
                <div role="tabpanel" class="tab-pane" id="project-tab2">
                    @include('hf.edit.financials')
                </div>
                @endif
                <div role="tabpanel" class="tab-pane" id="project-tab3">
                    @include('hf.edit.roof_building')
                </div>
                <div role="tabpanel" class="tab-pane" id="project-tab4">
                    @include('hf.edit.property_business')
                </div>
                <div role="tabpanel" class="tab-pane" id="project-tab5">
                    @include('hf.edit.equipment')
                </div>
                <div role="tabpanel" class="tab-pane" id="project-tab7">
                    @include('hf.edit.OM')
                </div>
                @if(Auth::user()->hasRole(['admins', 'Investors']) || Auth::user()->hasRole(['solar-installer', 'developer'], true))
                
                 <div role="tabpanel" class="tab-pane" id="project-tab10">
                    @include('hf.edit.creditworthiness')
                </div>
                @endif
                @if(Auth::user()->hasRole(['admins', 'Investors']))
                <div role="tabpanel" class="tab-pane" id="project-tab9">
                    @include('hf.edit.system_performance')
                </div>
                @endif
                @if(Auth::user()->hasRole(['admins', 'Investors']) || Auth::user()->hasRole(['solar-installer'], true) 
                    || Auth::user()->hasRole(['solar-installer', 'developer'], true))
                 <div role="tabpanel" class="tab-pane" id="project-tab6">
                    @include('hf.edit.solar_installer')
                </div>
                @endif
                @if(Auth::user()->hasRole(['admins', 'Investors']))
               
                <div role="tabpanel" class="tab-pane" id="project-tab11">
                    @include('hf.edit.legal_policy')
                </div>
                <div role="tabpanel" class="tab-pane" id="project-tab12">
                    @include('hf.edit.servicing_administration')
                </div>
                <div role="tabpanel" class="tab-pane" id="project-tab13">
                    @include('hf.edit.transactional_overview')
                </div>
                @if(Auth::user()->hasRole(['admins']))
                <div role="tabpanel" class="tab-pane" id="project-tab14">
                    @include('hf.edit.agreements_contracts')
                </div>
                @endif
                @endif
                
            </div>
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->

@endsection

<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
<script language="JavaScript">

    $('[id^=presentation-project-tab]').on('click', function() {
        updateLoginStatus();
    });
	
	
    $('input[type=radio][name=tenants]').change(function () {
        if (this.value == 1) {
            $('#tenants-container').removeClass('hide').show();
        } else if (this.value == 0) {
            $('#tenants-container').hide();
        }
    });

    $('input[type=checkbox][name^=system_location]').click(function () {
        console.log($(this).val());
    })

    
    
    var anchor = window.location.hash.replace("#", "");
    if (anchor)
    {
        $("#" + anchor).collapse('show');
    }
    
    
    $( "form" ).submit(function( event ) {
		var active_tab = $('.tab-content').find('.active').next().attr('id');
		$(this).append('<input type="hidden" name="active_tab" value="'+active_tab+'" />');
	});

	
	
    $('#{{$active_tab}}').addClass('active');
    $('#presentation-{{$active_tab}}').addClass('active');

    $('#certified-roofing-study').keyup(function () {

        if (!isNaN(parseFloat(this.value)) && isFinite(this.value)) {
            $('#certified-roofing-study-checkbox').prop('checked', false);
        }

    });

    $(document).on('change', '#certified-roofing-study-checkbox', function () {
        if ($(this).prop('checked') == true)
        {
            $('#certified-roofing-study').val('');

        }
    });


    $('body').on('click', '#toggle-secondary-contact', function () {
       
        $("#host-facility-secondary-contact").toggle();
    });
            $('input[name="system_location[]"]').click(function () {
        
        if ($(this).is(':checked')) {
            console.log($(this).val());
        }
    });
    
    $(document).ready(function () {
        if ($(window).outerWidth() < 992) {
            $('#panel_message').insertBefore('#profileeditTab');
        }
          $('input[type=radio][name=has_public_debt_rating]').change(function () {
			if(this.value == 0)
			{
				$('input[type=text][name=public_debt_rating_other]').val('');
				$('select[name=public_debt_rating] option').prop('selected', false);
				
			}
			
			$( '#public-debt-rating-container' ).toggle( this.value == 1 );
		});
		
		
        $('select[name=public_debt_rating]').change(function () {
			
			if( this.value != 5 )
			{
				$('input[type=text][name=public_debt_rating_other]').val('');
			} 
			
			$('#public-debt-rating-other').toggle( this.value == 5 );
		});
	
		
		
		$('select[name=panel_manufacturer_publicly_traded]').change(function () {
			$('.panel-manufacturer-container').toggle({
				display: (this.value == 1), 
				complete: function(){ 
					if(this.value == 0)
					{
						$('.panel-manufacturer-container input').val('');
						$('select[name=panel_manufacturer_equity] option').prop('selected', false);
					}
				}
			});
		});
		
		
		$('select[name=inverter_manufacturer_publicly_traded]').change(function () {
			$('.inverter-manufacturer-container').toggle({
				display: (this.value == 1), 
				complete: function(){ 
					if(this.value == 0)
					{
						$('.inverter-manufacturer-container input').val('');
						$('select[name=inverter_manufacturer_equity] option').prop('selected', false);
					}
				}
			});
		});
	
		$('select[name=racking_tracking_manufacturer_publicly_traded]').change(function () {
			$('.racking-tracking-manufacturer-container').toggle({
				display: (this.value == 1), 
				complete: function(){ 
					if(this.value == 0)
					{
						$('.racking-tracking-manufacturer-container input').val('');
					}
				}
			});
		});
		
	});

	
	$('#trackers').change(function () {
		console.log(this.value);
		if(this.value != 40)
		{
		
			$('input[type=text][name=trackers_other]').val('');
		}
		$('#tracker-container').toggle( this.value == 40 );
	});
	
	$('#terrain').change(function () {
		console.log(this.value);
		if(this.value != 70)
		{
			$('input[type=text][name=terrain_other]').val('');
		}
		$('#terrain-container').toggle( this.value == 70 );
	});
	
	

   


</script>
@endsection
