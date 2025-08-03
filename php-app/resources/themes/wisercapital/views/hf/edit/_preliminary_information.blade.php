<div class="row">
    <div class="col-md-6">
        <div class="form-group required">
            {!! Form::label('name', 'Project Name') !!}
            {!! Form::text('name', (isset($site->name) ? $site->name : ''), array('class' => 'form-control')) !!}
            {!! Form::hidden('preliminary', 1) !!}
        </div>
        <div class="form-group required type_of_project">
            {!! Form::label('facility_type', 'Type of Project') !!}
            {!! Form::select('facility_type', $facility_types, (empty($metas['facility_type']) ? '' : $metas['facility_type']), array('placeholder' => '[Select]', 'id' => 'facility-type', 'class' => 'form-control','onchange' => 'return showotherfacility()')) !!}
        </div>
        
           <div class="form-group required">
            {!! Form::label('energy_yield', 'Energy Yield (kWh/kW/yr AC)') !!}
            {!! Form::text('energy_yield', (isset($metas['energy_yield']) ? $metas['energy_yield'] : ''), array('class' => 'form-control')) !!}
        </div>
		  <div class="form-group ">
        	{!! Form::label('annual_production', 'Year 1 Annual Production (kWh/year)') !!}
            {!! Form::text(null, $site->getFirstYearProduction(), array('disabled' => 'disabled', 'class' => 'form-control')) !!}
        </div>
        
        
        <div class="form-group required">
            {!! Form::label('system_size', 'System Size (kW DC)') !!}
            {!! Form::text('system_size', (isset($metas['system_size']) ? $metas['system_size'] : ''), array('class' => 'form-control')) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('meter_number', 'Meter Number') !!}
            {!! Form::text('meter_number', (isset($metas['meter_number']) ? $metas['meter_number'] : ''), array('class' => 'form-control')) !!}
        </div>
        
        
        
        <div class="form-group required" id="facility_type_other" style="display: none;">
            {!! Form::label('facility_type_other', 'Type of Project') !!}
            {!! Form::text('facility_type_other', (isset($metas['facility_type_other']) ? $metas['facility_type_other'] : ''), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group required utility_provider_div">
            {!! Form::label('utility_provider', 'Utility Provider') !!}
            <span title="Loading.." class="utility_schedule_loader fa fa-lg fa-refresh fa-spin" style="display: none;"></span>
            <select id ="utility_provider" name="utility_provider" class="utility_provider form-control" disabled="disabled">
                <option value="">[Select Provider]</option>
            </select>
        </div>
        <div class="form-group hide utility_provider_div utility_data">
            {!! Form::label('utility_schedule', 'Utility Schedule') !!}
            {!! Form::select('utility_schedule', [],(isset($metas['utility_schedule']) ? $metas['utility_schedule'] : ''), 
            array('placeholder' => '[Select Tariff]', 'class' => 'form-control')) !!}
        </div>
        <div class="form-group current_electric_pricing_div">
            {!! Form::label('tariff_after_solar', 'Tariff After Solar') !!}
            {!! Form::text('tariff_after_solar', (isset($metas['tariff_after_solar']) ? $metas['tariff_after_solar'] : ''), array('class' => 'form-control')) !!}
        </div>
      
        
    </div>
    <div class="col-md-6">
        <div class="form-group required">
            {!! Form::label('interconnection_type', 'Interconnection Type') !!}
            {!! Form::select('interconnection_type', $interconnection_type, (empty($metas['interconnection_type']) ? '' : $metas['interconnection_type']), array('placeholder' => '[Select]', 'class' => 'form-control connection')) !!}
        </div>
        <div class="form-group required interconnection_type" style="display: none;">
            {!! Form::text('interconnection_type_other', (empty($metas['interconnection_type_other']) ? '' : 
                $metas['interconnection_type_other']), array('placeholder' => 'Interconnection Type *', 'class' => 'form-control')) !!}
        </div>
        <div class="form-group required current_electric_pricing_div">
            {!! Form::label('current_electric_pricing', 'Avoided Electric Cost ($/kWh Rate)') !!}
            <a href='#'>
                <i class='fa fa-question-circle' data-toggle="tooltip" data-placement="top"
                   title='Enter the electricity cost/kWh excluding fixed fees and demand charges that solar will not offset'>
                </i>
            </a>
            {!! Form::text('current_electric_pricing', (isset($metas['current_electric_pricing']) && is_numeric($metas['current_electric_pricing']) ? round($metas['current_electric_pricing'], 4) : ''), array('class' => 'form-control priceFormatter')) !!}
        </div>
        <div class="form-group required price_per_kwh" style='display: none;'>
            {!! Form::label('utility_paid_price', 'Price per kWh') !!}
            {!! Form::text('utility_paid_price', (isset($metas['utility_paid_price']) && is_numeric($metas['utility_paid_price']) ? round($metas['utility_paid_price'], 4) : ''), array('class' => 'form-control priceFormatter')) !!}
        </div>
        <div class="form-group required fit_rate_non_agreement_div" style='display: none;'>
            {!! Form::label('fit_rate', 'FIT Rate ($/kWh)') !!}
            {!! Form::text('fit_rate', (isset($metas['fit_rate']) && is_numeric($metas['fit_rate']) ? round($metas['fit_rate'], 4) : ''), array('class' => 'form-control priceFormatter')) !!}
        </div>
        
        
        <div class="form-group required utility_paid_price_div" style='display: none;'>
            {!! Form::label('fit_term', 'FIT Term (Years)') !!} 
            {!! Form::select('fit_term', range(5,30), (empty($metas['fit_term']) ? '' : $metas['fit_term']), array('placeholder' => '[Select]',  'class' => 'form-control')) !!}
        </div>
        
        
        <div class="form-group utility_paid_price_div" style='display: none;'>
            {!! Form::label('fit_esc', 'FIT Escalator (%)') !!} 
            {!! Form::text('fit_esc', (isset($metas['fit_esc']) && is_numeric($metas['fit_esc']) ? ($metas['fit_esc']) : ''), array('class' => 'form-control', 'min' => 0, 'max' => 3)) !!}
        </div>
        
        
        
        @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
        <div class="form-group required">
            {!! Form::label('epc_cost', 'EPC Cost ($/W)') !!}
            {!! Form::text('epc_cost', $site->getEPCCost(), array('class' => 'form-control priceFormatter')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('epc_cost', 'Accepted EPC Cost ($/W)') !!}
            {!! Form::text('null', $site->getAcceptedEPCCost(), array('disabled' => 'disabled', 'class' => 'form-control priceFormatter')) !!}
        </div>
        @endif
        
        @if (!Auth::user()->hasRole('solar-installer') )
        <div class="form-group">
            {!! Form::label('calculated_in_cost', 'Calculated All In Cost') !!}
            {!! Form::text('calculated_in_cost', $site->getAllInCost(), array('disabled' => 'disabled', 'class' => 'form-control priceFormatter')) !!}
        </div>
        @endif
        
        
        @if (Auth::user()->hasRole(['admins']) )
		<div class="form-group">
		    {!! Form::label('all_in_cost', 'Override All In Cost') !!}
		     <a href='#'>
		        <i class='fa fa-question-circle' data-toggle="tooltip" data-placement="top"
		           title='All In Cost represents the EPC Cost + Wiser Fees. This cost is auto calculated by the platform. This should be left blank unless you wish to override the platform calculated all in cost.'>
		        </i>
		    </a>
		    {!! Form::text('all_in_cost', (isset($metas['all_in_cost']) && is_numeric($metas['all_in_cost']) ? round($metas['all_in_cost'], 4) : ''), array('class' => 'form-control priceFormatter')) !!}
		</div>
		@endif
        
        
        @if (Auth::user()->hasRole(['admins']) )
        <div class="form-group">
            {!! Form::label('itc_eligibility', 'ITC Eligibility (%)') !!} 
            {!! Form::text('itc_eligibility', (isset($metas['itc_eligibility']) && is_numeric($metas['itc_eligibility']) ? ($metas['itc_eligibility']) : ''), array('class' => 'form-control', 'min' => 0, 'max' => 100)) !!}
        </div>
        
         <div class="form-group">
            {!! Form::label('state_tax_rate', 'State Tax Rate (%)') !!} 
            {!! Form::text('state_tax_rate', (isset($metas['state_tax_rate']) && is_numeric($metas['state_tax_rate']) ? ($metas['state_tax_rate']) : ''), array('class' => 'form-control', 'min' => 0, 'max' => 15)) !!}
        </div>
        @endif
        
        
        
        
       
    </div>
</div>


<hr />
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6 required">
            <div class="row">
                {!! Form::label('system_location', 'System Type') !!}
                @foreach($system_location as $key => $value)
                <div class="checkbox">

                    {!! Form::checkbox('system_location[]', $key, (isset($metas['system_location']) && in_array($key, $metas['system_location'])), ['class' => 'input_system_location_checked checkbox-custom', 'id' => 'select-'.$key]) !!}   
                    <label for="select-{{ $key }}" class='checkbox-custom-label'>
                        {{ $value }}
                    </label>

                </div>
                @endforeach
            </div>
            </div>
            <div class="col-md-6 required">
            <div class="row">
                {!! Form::label('ongoing_system_cost', 'Property Cost') !!}
                @foreach($ongoing_system_cost as $key => $value)
                <div class="checkbox">

                    {!! Form::checkbox('ongoing_system_cost[]', $key, (isset($metas['ongoing_system_cost']) && is_array($metas['ongoing_system_cost']) && in_array($key, $metas['ongoing_system_cost'])),['class'=>($key != \App\Support\Dropdown::ONGOING_NONE)? 'ongoing other checkbox-custom':'ongoing none checkbox-custom','id'=>'ongoing_system_cost_' . $key,'data-related-element'=>'ongoing_system_cost_'.$key]) !!} 

                    <label for="ongoing_system_cost_{{ $key }}" class='checkbox-custom-label'>
                        {{ $value }}
                    </label>
                    @if( $key != \App\Support\Dropdown::ONGOING_NONE)
                        @if( $key == \App\Support\Dropdown::ONGOING_OTHER)

                            {!! Form::text('ongoing_system_cost_'.$key.'_description', (isset($metas['ongoing_system_cost_'.$key.'_description']) ? $metas['ongoing_system_cost_'.$key.'_description'] : ''), array('class' => 'form-control ongoing_system_other_field ongoing_system_cost_'.$key, 'placeholder'=>'Description','style'=>'display:none','id'=>'ongoing_system_cost_'.$key.'_description')) !!}
                            {!! Form::select('ongoing_system_cost_'.$key.'_type',$ongoing_other_type, (isset($metas['ongoing_system_cost_'.$key.'_type']) ? $metas['ongoing_system_cost_'.$key.'_type'] : ''), array('class' => 'form-control marT5 ongoing_system_other_field ongoing_system_cost_'.$key, 'placeholder'=>'[Select Type]','style'=>'display:none','id'=>'ongoing_system_cost_'.$key.'_type')) !!}
                            {!! Form::text('ongoing_system_cost_'.$key.'_value', (isset($metas['ongoing_system_cost_'.$key.'_value']) ? $metas['ongoing_system_cost_'.$key.'_value'] : ''), array('class' => 'priceFormatter2 form-control ongoing_system_other_field ongoing_system_cost_'.$key, 'placeholder'=>'Value','style'=>'display:none','id'=>'ongoing_system_cost_'.$key.'_value')) !!}
                        @endif
                        
                        @if( !in_array($key, [\App\Support\Dropdown::ONGOING_PROPERTYTAX, \App\Support\Dropdown::ONGOING_OTHER]))
                            <div class='margin-top'>
                            {!! Form::label('ongoing_system_cost_'.$key . '_year_label', 'Land Lease Term (years)', ['style'=>'display:none', 'class' => 'ongoing_system_other_field ongoing_system_cost_'.$key]) !!}
                            {!! Form::text('ongoing_system_cost_'.$key . '_year', (isset($metas['ongoing_system_cost_'.$key. '_year']) ? $metas['ongoing_system_cost_'.$key. '_year'] : ''), array('class' => 'form-control ongoing_system_other_field ongoing_system_cost_'.$key, 'placeholder'=>'Land Lease Term (years)','style'=>'display:none','id'=>'ongoing_system_cost_'.$key . '_year')) !!}
                            </div>
                            <div class='margin-top'>
                            {!! Form::label('ongoing_system_cost_'.$key . '_amount_label', 'Amount ($/Year)', ['style'=>'display:none', 'class' => 'ongoing_system_other_field ongoing_system_cost_'.$key]) !!}
                            {!! Form::text('ongoing_system_cost_'.$key . '_amount', (isset($metas['ongoing_system_cost_'.$key. '_amount']) ? $metas['ongoing_system_cost_'.$key. '_amount'] : ''), array('class' => 'form-control priceFormatter2 ongoing_system_other_field ongoing_system_cost_'.$key, 'placeholder'=>'Amount ($)','style'=>'display:none','id'=>'ongoing_system_cost_'.$key . '_amount')) !!}
                            </div>
                            <div class='margin-top'>
                            {!! Form::label('ongoing_system_cost_'.$key . '_rate_label', 'OR Land Lease Rate (%/W/yr)', ['style'=>'display:none', 'class' => 'ongoing_system_other_field ongoing_system_cost_'.$key]) !!}
                            {!! Form::text('ongoing_system_cost_'.$key . '_rate', (isset($metas['ongoing_system_cost_'.$key. '_rate']) ? $metas['ongoing_system_cost_'.$key. '_rate'] : ''), array('class' => 'form-control ongoing_system_other_field ongoing_system_cost_'.$key, 'placeholder'=>'Land Lease Rate (%/W/yr)','style'=>'display:none','id'=>'ongoing_system_cost_'.$key . '_rate')) !!}
                            </div>
                        @endif

                        @if( $key == \App\Support\Dropdown::ONGOING_PROPERTYTAX)
                            {!! Form::text('ongoing_system_cost_'.$key, (isset($metas['ongoing_system_cost_'.$key]) ? $metas['ongoing_system_cost_'.$key] : ''), array('class' => 'form-control ongoing_system_other_field ongoing_system_cost_'.$key, 'placeholder'=>'Property Tax Rate (%)','style'=>'display:none','id'=>'ongoing_system_cost_'.$key)) !!}
                        @endif
                    @endif

                </div>
                @endforeach
            </div>
            </div>
        </div>

    </div>

    <div class="col-md-6 renewable_incentive_program_section">
        <div class="form-group required">
            {!! Form::label('renewable_incentive_program', 'Renewable Incentive Program') !!}<!-- span title="Loading.." class="incentive_loader glyphicon glyphicon-refresh glyphicon-refresh-animate"></span -->
            {!! Form::select('renewable_incentive_program', $renewable_incentive, (empty($metas['renewable_incentive_program']) ? '' : $metas['renewable_incentive_program']), array('placeholder' => '[Select]',  'class' => 'incentive_select form-control')) !!}
        </div>
        <?php $incentive_data = !empty(old('incentive_year')) ? old('incentive_year') : (isset($metas['incentive_year']) ? $metas['incentive_year'] : []); ?>
        
        <span title="Loading.." class="incentive_loader fa fa-lg fa-refresh fa-spin" style="display: none;"></span>
        <div class="form-group incentive_ac_section" style="display:none">
            <table class="table table-bordered table-condensed">
                <tr>
                    <th>Years</th>
                    <th class="incentive_year_ac_kwh">$/kWh</th>
                </tr>
                @for ($year = 1; $year <= 10 ;$year++ )
                <tr>
                    <th>
                        {{$year}}
                    </th>
                    <td>
                        {!! Form::text('incentive_year[' . $year . ']', (isset($incentive_data[$year]) && is_numeric($incentive_data[$year]) ? round($incentive_data[$year], 2) : ''), array('class' => 'incentive_ac_value form-control priceFormatter')) !!}
                    </td>
                </tr>
                @endfor
            </table>
        </div>

        <div class="incentive_dc_section"  style="display: none;">
            <div class="form-group">
                {!! Form::label('incentive_dc', '$/kW') !!}
                {!! Form::text('incentive_dc', (isset($metas['incentive_dc']) && is_numeric($metas['incentive_dc']) ? round($metas['incentive_dc'], 2) : ''), array('class' => 'incentive_dc_value form-control priceFormatter')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('length_of_incentive', 'Length of Incentive (Years)?') !!}
                {!! Form::number('length_of_incentive', (isset($metas['length_of_incentive']) ? $metas['length_of_incentive'] : ''), array('class' => 'length_of_incentive_value form-control', 'min' => 0)) !!}
            </div>

        </div>
      
    </div>

</div>
<hr />
<div class="row">
    <div class="col-lg-4">
        <div class="form-group required">
            {!! Form::label('interest_in_property', 'Property Ownership') !!}
            <div class="col-xs-12 marT-10 marB10 marL-5">
                <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->interestInProperty()) ? 0 : $v) }}</span>/20</span> &nbsp;
                <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true"
                    title="WSAR Points Awarded: <br/> Own worth  20 points<br/>Own,Lease or Rent >= 20 years worth 20 points <br/>Rent < 20 years worth 10 points" />
            </div>

            <div class="col-xs-9 pad0">
            {!! Form::select('interest_in_property', $interest_in_property, (empty($metas['interest_in_property']) ? '' : $metas['interest_in_property']), array('placeholder' => '[Select]', 'class' => 'form-control','onchange' => 'return showrent(this.value)')) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-4" id="property_rent_term" style="display: none;">
        <div class="form-group required">
            {!! Form::label('property_rent_term', 'Rent Term (Years)') !!}
            {!! Form::number('property_rent_term', (isset($metas['property_rent_term']) ? $metas['property_rent_term'] : ''), array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-lg-4" id="property_lease_term" style="display: none;">
        <div class="form-group required">
            {!! Form::label('property_lease_term', 'Lease Term (Years)') !!}
            {!! Form::number('property_lease_term', (isset($metas['property_lease_term']) ? $metas['property_lease_term'] : ''), array('class' => 'form-control')) !!}
        </div>
    </div>
</div>


<hr />
<div class="row">
	<div class="col-lg-12">
		<p>To receive funding from Wiser Capital we require all project documents signed on our standardized agreements.</p>
	</div>
    <div class="non_fit_agreement">
        <div class="col-md-6 required">
            {!! Form::label('signed_power_purchase_agreement', \App\Support\Dropdown::NON_FIT_SIGNED_POWER_PURCHASE_AGREEMENT) !!}

            @foreach($yes_no as $key => $value)
            <div class="checkbox">
                {!! Form::radio('signed_power_purchase_agreement', $key, (isset($metas['signed_power_purchase_agreement']) && $key == $metas['signed_power_purchase_agreement'] ),['class' => 'agreement radio-custom','id' => 'signed_power_purchase_agreement_'.$key]) !!} 
                <label for="signed_power_purchase_agreement_{{$key}}" class="radio-custom-label">{{ $value }}</label>
            </div>
            @endforeach
            <div class='signed_power_purchase_agreement_section' style="display: none;">

                <div class="row">
                    <div class="col-md-12">
                        <div class="file-upload form-group">
                            {!! Form::label('file_signed_power_purchase_agreement', 'Upload PPA Agreement') !!}
                            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                            <p>{!! Form::label('file_fit_agreement[]', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file']) !!} </p>
                            @endif
                            {!! Form::file('file_fit_agreement[]', ['class' => 'no-visibility upload_button_track', 'multiple' => 'multiple']) !!}
                            @if (isset($metas['uploaded_files_fit_agreement_32']))
                            @foreach ($metas['uploaded_files_fit_agreement_32'] as $key => $root_user_upload)
                            <span class="file_ops">
                                {{ $key }}
                                <a data-href="{{$root_user_upload['filePath']}}" class="dr-file-download" title="View"><i class="fa fa-toggle-up "></i></a>
                                @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                                <a href="#" class='delete_uploaded_file' data-file="delete_file_fit_agreement[]" data-value="{{$key}}" title="Delete"><i class="fa fa-trash-o "></i></a>
                                @endif
                            </span><br/>
                            @endforeach
                            @else
                                    <p class="text-muted">No File Uploaded Yet</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div>
                    <div class="form-group wrap required">
                        {!! Form::label('agreement_ppa_rate', 'PPA Rate ($/kWh)') !!}

                        {!! Form::text('agreement_ppa_rate', (isset($metas['agreement_ppa_rate']) && is_numeric($metas['agreement_ppa_rate']) ? round($metas['agreement_ppa_rate'], 4) : ''), array('class' => 'form-control priceFormatter small')) !!}

                    </div>
                    <div class="form-group wrap     required">
                        {!! Form::label('agreement_ppa_esc', 'Escalator (in %)') !!}

                        {!! Form::number('agreement_ppa_esc', (isset($metas['agreement_ppa_esc']) && is_numeric($metas['agreement_ppa_esc']) ? $metas['agreement_ppa_esc'] : ''), array('class' => 'form-control small')) !!}

                    </div>
                    <div class="form-group wrap required">
                        {!! Form::label('agreement_ppa_term', 'PPA Term (Years)') !!}

                        {!! Form::number('agreement_ppa_term', (isset($metas['agreement_ppa_term']) && is_numeric($metas['agreement_ppa_term']) ? $metas['agreement_ppa_term'] : ''), array('class' => 'form-control small')) !!}

                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-6 required">
            {!! Form::label('signed_site_lease', \App\Support\Dropdown::NON_FIT_SIGNED_SITE_LEASE) !!}
            @foreach($yes_no as $key => $value)
            <div class="checkbox">
                {!! Form::radio('signed_site_lease', $key, (isset($metas['signed_site_lease']) && $key == $metas['signed_site_lease'] ),['class' => 'agreement radio-custom','id' => 'signed_site_lease_'.$key]) !!} 
                <label for="signed_site_lease_{{$key}}" class="radio-custom-label">{{ $value }}</label>
            </div>
            @endforeach
            <div class='signed_site_lease_section' style="display: none;">

                <div class="row">
                    <div class="col-md-12">
                        <div class="file-upload form-group">
                            {!! Form::label('file_signed_site_lease', 'Signed Site Lease') !!}
                            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                            <p>{!! Form::label('file_signed_site_lease[]', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file']) !!} </p>
                            @endif
                            {!! Form::file('file_signed_site_lease[]', ['class' => 'no-visibility upload_button_track', 'multiple' => 'multiple']) !!}
                            @if (isset($metas['uploaded_files_signed_site_lease_33']))
                            @foreach ($metas['uploaded_files_signed_site_lease_33'] as $key => $root_user_upload)
                            <span class="file_ops">
                                {{ $key }}
                                <a data-href="{{$root_user_upload['filePath']}}" class="dr-file-download" title="View"><i class="fa fa-toggle-up "></i></a>
                                @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                                <a href="#" class='delete_uploaded_file' data-file="delete_file_signed_site_lease[]" data-value="{{$key}}" title="Delete"><i class="fa fa-trash-o "></i></a>
                                @endif
                            </span><br/>
                            @endforeach
                            @else
                                    <p class="text-muted">No File Uploaded Yet</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fit_agreement" style="display: none">
        <div class="col-md-6 required">
            {!! Form::label('fit_signed_power_purchase_agreement', \App\Support\Dropdown::FIT_SIGNED_POWER_PURCHASE_AGREEMENT) !!}

            @foreach($yes_no as $key => $value)
            <div class="checkbox">
                {!! Form::radio('fit_signed_power_purchase_agreement', $key, (isset($metas['fit_signed_power_purchase_agreement']) && $key == $metas['fit_signed_power_purchase_agreement'] ),['class' => 'agreement radio-custom','id' => 'fit_signed_power_purchase_agreement_'.$key]) !!} 
                <label for="fit_signed_power_purchase_agreement_{{$key}}" class="radio-custom-label">{{ $value }}</label>
            </div>
            @endforeach
            <div class='fit_signed_power_purchase_agreement_section' style="display: none;">

                <div class="row">
                    <div class="col-md-12">
                        <div class="file-upload form-group">
                            {!! Form::label('file_fit_signed_power_purchase_agreement', 'Upload FIT Agreement') !!}
                            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                            <p>{!! Form::label('file_fit_signed_power_purchase_agreement[]', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file']) !!} </p>
                            @endif
                            {!! Form::file('file_fit_signed_power_purchase_agreement[]', ['class' => 'no-visibility upload_button_track', 'multiple' => 'multiple']) !!}
                            @if (isset($metas['uploaded_files_fit_signed_power_purchase_agreement_32']))
                            @foreach ($metas['uploaded_files_fit_signed_power_purchase_agreement_32'] as $key => $root_user_upload)
                            <span class="file_ops">
                                {{ $key }}
                                <a data-href="{{$root_user_upload['filePath']}}" class="dr-file-download" title="View"><i class="fa fa-toggle-up "></i></a>
                                @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                                <a href="#" class='delete_uploaded_file' data-file="delete_file_fit_signed_power_purchase_agreement[]" data-value="{{$key}}" title="Delete"><i class="fa fa-trash-o "></i></a>
                                @endif
                            </span><br/>
                            @endforeach
                            @else
                                    <p class="text-muted">No File Uploaded Yet</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div>
                    <div class="form-group wrap required">
                        {!! Form::label('agreement_fit_rate', 'FIT Rate ($/kWh)') !!}
                        {!! Form::text('agreement_fit_rate', (isset($metas['agreement_fit_rate']) && is_numeric($metas['agreement_fit_rate']) ? round($metas['agreement_fit_rate'], 4) : ''), array('class' => 'form-control priceFormatter')) !!}

                    </div>
                    <div class="form-group wrap required">
                        {!! Form::label('agreement_fit_esc', 'Escalator (in %)') !!}

                        {!! Form::number('agreement_fit_esc', (isset($metas['agreement_fit_esc']) && is_numeric($metas['agreement_fit_esc']) ? $metas['agreement_fit_esc'] : ''), array('class' => 'form-control small')) !!}

                    </div>
                    <div class="form-group wrap required">
                        {!! Form::label('agreement_fit_term', 'FIT Term (Years)') !!}

                        {!! Form::number('agreement_fit_term', (isset($metas['agreement_fit_term']) && is_numeric($metas['agreement_fit_term']) ? $metas['agreement_fit_term'] : ''), array('class' => 'form-control small')) !!}

                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-6 required">
            {!! Form::label('fit_signed_site_lease', \App\Support\Dropdown::FIT_SIGNED_SITE_LEASE) !!}
            @foreach($yes_no as $key => $value)
            <div class="checkbox">
                {!! Form::radio('fit_signed_site_lease', $key, (isset($metas['fit_signed_site_lease']) && $key == $metas['fit_signed_site_lease'] ),['class' => 'agreement radio-custom','id' => 'fit_signed_site_lease_'.$key]) !!} 
                <label for="fit_signed_site_lease_{{$key}}" class="radio-custom-label">{{ $value }}</label>
            </div>
            @endforeach
            
            <div class='fit_signed_site_lease_section' style="display: none;">

                <div class="row">
                    <div class="col-md-12">
                        <div class="file-upload form-group">
                            {!! Form::label('file_fit_signed_site_lease', 'Signed Site Lease') !!}
                            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                            <p>{!! Form::label('file_fit_signed_site_lease[]', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file']) !!} </p>
                            @endif
                            {!! Form::file('file_fit_signed_site_lease[]', ['class' => 'no-visibility upload_button_track', 'multiple' => 'multiple']) !!}
                            @if (isset($metas['uploaded_files_fit_signed_site_lease_33']))
                            @foreach ($metas['uploaded_files_fit_signed_site_lease_33'] as $key => $root_user_upload)
                            <span class="file_ops">
                                {{ $key }}
                                <a data-href="{{$root_user_upload['filePath']}}" class="dr-file-download" title="View"><i class="fa fa-toggle-up "></i></a>
                                @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                                <a href="#" class='delete_uploaded_file' data-file="delete_file_fit_signed_site_lease[]" data-value="{{$key}}" title="Delete"><i class="fa fa-trash-o "></i></a>
                                @endif
                            </span><br/>
                            @endforeach
                            @else
                                    <p class="text-muted">No File Uploaded Yet</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
    </div>
</div>
<hr class='utility_data' />


<div class="row utility_data">
    <p>&nbsp;</p>
    <div class="col-lg-12">
        <div class="col-md-5 green_button" style="display: none;">
            <div class="file-upload ">
                <p>
                    <label for="file_green_button" class="download-data">
                        <i class="fa fa-upload"></i>
                        <small>Green Button</small>
                            Upload<br> My Data®
                    </label>
                </p>
                {!! Form::file('file_green_button', ['class' => 'no-visibility upload_button_track', 'id' => 'file_green_button'] ) !!}
                @if (isset($metas['facility_information_file_green_button']))
                <span class="file_ops">
                    {{ $metas['facility_information_file_green_button']['filename'] }}
                    <a data-href="{{$metas['facility_information_file_green_button']['filepath']}}" class="dr-file-download" title="View"><i class="fa fa-toggle-up "></i></a>
                    <a href="#" class='delete_uploaded_file' id='delete_file_green_button' 
                       data-file="delete_file_green_button" data-value="{{$metas['facility_information_file_green_button']['filename']}}" title="Delete"><i class="fa fa-trash-o "></i></a>
                </span>
                <br/>
                @endif
            </div>
        </div>
        <div class="col-md-5 utility_bill" style="display: none;">
            <div class="file-upload form-group">
                {!! Form::label('file_12_months_utility_bill[]', 'Utility Bills (12 months preferred) ') !!}
                @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                <p>{!! Form::label('file_12_months_utility_bill[]', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file']) !!} </p>
                @endif
                {!! Form::file('file_12_months_utility_bill[]', ['class' => 'no-visibility upload_button_track', 'multiple' => 'multiple']) !!}
                @if (isset($metas['uploaded_files_utility_bill_27']))
                @foreach ($metas['uploaded_files_utility_bill_27'] as $key => $root_user_upload)
                <span class="file_ops">
                    {{ $key }}
                    <a data-href="{{$root_user_upload['filePath']}}" class="dr-file-download" title="View"><i class="fa fa-toggle-up "></i></a>
                    @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                    <a href="#" class='delete_uploaded_file' data-file="delete_file_12_months_utility_bill[]" data-value="{{$key}}" title="Delete"><i class="fa fa-trash-o "></i></a>
                    @endif
                </span><br/>
                @endforeach
                @else
                	<p class="text-muted">No File Uploaded Yet</p>
                @endif
            </div>
        </div>
    </div>

</div>
<hr />
<div class="row">
    <p>&nbsp;</p>
    <div class="col-lg-12">
        <div class="col-md-12 form-group">
            {!! Form::label('file_system_production_modelling[]', 'System Production Modeling ') !!}
            <p class="text-muted">Example: <strong>PVsyst</strong> or <strong>Helioscope Report</strong></p>
            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
            <p>{!! Form::label('file_system_production_modelling[]', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file']) !!} </p>
            @endif
            {!! Form::file('file_system_production_modelling[]', ['class' => 'no-visibility upload_button_track', 'multiple' => 'multiple']) !!}
            @if (isset($metas['system_performance_engineering_designs_5']))
            @foreach ($metas['system_performance_engineering_designs_5'] as $key => $system_production_modelling)
            <span class="file_ops">
                {{ $key }}
                <a data-href="{{$system_production_modelling['filePath']}}" class="dr-file-download" title="View"><i class="fa fa-toggle-up "></i></a>
                @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                <a href="#" class='delete_uploaded_file' data-file="delete_file_system_production_modelling[]" data-value="{{$key}}" title="Delete"><i class="fa fa-trash-o "></i></a>
                @endif
            </span>
            <br/>
            @endforeach
            @else
            	<p class="text-muted">No File Uploaded Yet</p>
            @endif
        </div>
    </div>

</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content"><div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Information</h4>
            </div>
            <div class="modal-body">
                <b>Contact us at <a href="mailto:projects@wisercapital.com">projects@wisercapital.com</a> or 805-899-3400</b>
                . <br/>To ensure proper modeling of this project, a Wiser representative will review your inputs and follow up with additional questions as needed.
            </div>
        </div>
    </div>
</div>

@include('hf.partial._preliminary_information_script')
@section('body_bottom')
@parent
<script>
    var formatted_address = "{{$site->address . ' '. $site->city . ' ' . $site->state . ' '. $site->zip_code}}";
    var renewable_program = "{{isset($metas['renewable_incentive_program']) ? $metas['renewable_incentive_program'] : ''}}"
    var submit_button_id  = "preliminary_assessment_form";
    
    function submitForm(form) {
        form.submit();
    }
    
    function downloadAction() {
        if ($(this).data('href')) {
            $.ajax({
            url:'/hf/facility-file-download?file_path=' + $(this).data('href'),
                type:'GET',
                success:function(response){
                    window.open(response.path, '_blank');
                }
            });
        }
    }
    // jstree download function
    $('.dr-file-download').on('click', downloadAction);
</script>
@endsection
