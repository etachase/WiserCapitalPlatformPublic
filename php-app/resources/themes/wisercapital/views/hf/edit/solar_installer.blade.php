<div class="tab-heading" role="tab" >
    <h2 class="panel-title"><img src="{{url('/assets/themes/wisercapital/img/wsar.png')}}" />  EPC Creditworthiness
	     <div class="title-meta"><span>{{ (is_null($v = $WSAR->EPCCreditworthiness()) ? 0 : $v) }}</span>/50</div>
	     
    </h2>
</div>
<div id="solar-installer">
    {!! Form::open(array('route' => array('hf.update', $site->id), 'method' => 'put', 'files' => true)) !!}

	@if (Auth::user()->hasRole(['admins', 'solar-installer']) )
    	<!-- div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('installer_work_experience_status', 'Status (Installer work experience, financial standing and insurance)') !!}
                <div class="row">
                    <div class="col-lg-4">
                        {!! Form::select('installer_work_experience_status', $wsar_status, (empty($metas['installer_work_experience_status']) ? '' : $metas['installer_work_experience_status']), array('placeholder' => '[Select]', 'class' => 'input-sm form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>			      
    </div -->
    	<div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('solar_installer', 'Solar Installer') !!}
                <div class="row">
                    <div class="col-lg-5">
                        {!! Form::select('solar_installer_id', $solar_installer, (empty($metas['solar_installer_id']) ? '' : $metas['solar_installer_id']), array('placeholder' => '[Select]', 'class' => 'input-sm form-control')) !!}
                        @if (\Auth::user()->hasRole('admins'))
                        <br/>
                        <a href="{{!empty($metas['solar_installer_id']) ? 
                            route('admin.solar-installers.edit', ['id' => $metas['solar_installer_id']]) : ''}}" 
                            class="btn btn-sm btn-primary" target="_blank" id='solar_button'
                            {{empty($metas['solar_installer_id']) ? 'disabled' : ''}}>Solar Profile</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 hide solar_detail_panel">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div class="col-xs-10">
                        Solar Installer Details
                    </div>
                    <div class="col-xs-2 text-right">
                        <a href="#" id="edit-solar-installer"class="btn btn-xs btn-default">Edit</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <label>Address  </label>
                        <span id="solar_installer_address"></span>
                    </div>
                    <div class="col-md-6">
                        <label>Phone Number </label>
                        <span id="solar_installer_phone_number"></span>
                    </div>
                    <div class="col-md-6">
                        <label>No of Projects  </label>
                        <span id="solar_installer_projects"></span>
                    </div>
                    <div class="col-md-6">
                        <label>Total KW Installed  </label>
                        <span id="solar_installer_total_kw_installed"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @else
	<div class="row">
		<div class="col-lg-12">
		<h5>EPC</h5>
		@if (isset($solar_installer) && isset($metas['solar_installer_id']) )
		<p>{{ ($solar_installer[$metas['solar_installer_id']]) }}</p>
		@else
			<p>An EPC has not been assigned.</p>
		@endif
		
		</div>
	
	</div>
	
	@endif
	
	
	<hr>
	<ul class="checklist">
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->pastTwoYearsAuditedFinancials()) ? 0 : $v) }}</span>/25</span>
            <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true" 
                    title="WSAR Points Awarded: <br />Requested Financials Uploaded? <br />Yes worth 25 points <br />No worth 0 points" />
            SI Profile - Past Two Years Financials
        </li>
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->pastProjectMegaWattInstalled()) ? 0 : $v) }}</span>/10</span>
            <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true" 
                    title="WSAR Points Awarded: <br />Total MW Installed: <br />> 5 MW worth 10 points <br />> 1.5 MW to < 5 MW worth 5 points <br />< 1.5 MW worth 0 points" />
            Total Commercial MW Installed
        </li>
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->certificateGoodStanding()) ? 0 : $v) }}</span>/5</span>
            <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true" 
                    title="WSAR Points Awarded: <br />Certificate of Good Standing Uploaded worth 5 points <br />Not uploaded worth 0 points" />
            Certificate of Good Standing
        </li>
        
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->workersCompensation()) ? 0 : $v) }}</span>/4</span>
            <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true" 
                    title="WSAR Points Awarded: <br />Workers Compensation <br />Greater than $1,000,000 worth 4 points <br />Not covered or less than $1,000,000 worth 0 points" />
            Minimum Workers Compensation
        </li>
        
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->GeneralLiability()) ? 0 : $v) }}</span>/4</span>
            <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    title="WSAR Points Awarded: <br />General Liability <br />Greater than $1,000,000 worth 4 points <br />Not covered or less than $1,000,000 worth 0 points" />
            General Liability
        </li>
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->bondingCapability()) ? 0 : $v) }}</span>/2</span>
            <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true" 
                    title="WSAR Points Awarded: <br />Bonding capability <br />Yes worth 2 points <br />No worth 0 points" />
            Bonding Capability
        </li>
    </ul>


		
	<hr>
	@if (Auth::user()->hasRole(['admins', 'solar-installer']) )
		{!! Form::submit('Save & Proceed', array("class" => "btn btn-primary")) !!}
	@endif
	{!! Form::close() !!}

</div>

@section('body_bottom')
@parent

<script>

/*
    var getSolarInstaller = function (id) {
    if (!id) {
    $('.solar_detail_panel').hasClass('hide') ? '' :
            $('.solar_detail_panel').addClass('hide');
    return;
    }
    $.ajax({
    url : '/admin/solar-installers/' + id + '/edit',
            method : 'GET',
            success : function (data) {
            if (data.status) {
            $('.solar_detail_panel').removeClass('hide');
            metas = data.solar_installer.meta_data;
            $('#solar_installer_address').html(metas.business_add1);
            $('#solar_installer_phone_number').html(data.solar_installer.phone);
            $('#solar_installer_projects').html(data.projects);
            $('#solar_installer_total_kw_installed').html(data.total_kw);
            $('#edit-solar-installer').attr('href', "{{url('/admin/solar-installers')}}" + '/' + id + '/edit');
            } else {
            $('.solar_detail_panel').hasClass('hide') ? '' :
                    $('.solar_detail_panel').addClass('hide');
            }
            }
    });
    }
    
    $('select[name=solar_installer_id]').on('change', function () {
    	getSolarInstaller($(this).val());
    });
    
    getSolarInstaller({{empty($metas['solar_installer_id']) ? '' : $metas['solar_installer_id']}});
  */  	
    	
    $(document).ready(function() {
        $('[name=solar_installer_id]').change(function () {
            <?php if (\Auth::user()->hasRole('admins')) : ?>
                if ($(this).val()) {
                    $('#solar_button').attr('href', "{{url('/admin/solar-installers')}}/" + $(this).val() + "/edit");
                    $('#solar_button').removeAttr('disabled');
                } else {
                    $("#solar_button").attr('disabled', 'disabled');
                    $('#solar_button').attr('href', "");
                }
            <?php endif; ?>
        });
    })
    	
</script>

@endsection
