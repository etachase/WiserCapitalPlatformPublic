<div class="process-sec process-sec-2" data-step="2">
    <div class="process-sec-entry row">
        <div class="col-md-5">
            <div class="form-group required">
                {!! Form::label('interconnection_type', 'Interconnection Type') !!}
                {!! Form::select('interconnection_type', $interconnection_type, (empty($metas['interconnection_type']) ? '' : $metas['interconnection_type']), array('placeholder' => '[Select]', 'class' => 'form-control connection')) !!}
            </div>
            <div class="form-group required interconnection_type" style="display: none;">
                {!! Form::text('interconnection_type_other', (empty($metas['interconnection_type_other']) ? '' : 
                    $metas['interconnection_type_other']), array('placeholder' => 'Interconnection Type *', 'class' => 'form-control')) !!}
            </div>
            <div class="form-group required type_of_project">
                {!! Form::label('facility_type', 'Type of Project') !!}
                {!! Form::select('facility_type', $facility_types, (empty($metas['facility_type']) ? '' : $metas['facility_type']), array('placeholder' => '[Select]', 'id' => 'facility-type', 'class' => 'form-control','onchange' => 'return showotherfacility()')) !!}
            </div>
            <div class="form-group wrap required" id="facility_type_other" style="display: none;">
                {!! Form::label('facility_type_other', 'Type of Project') !!}
                {!! Form::text('facility_type_other', (isset($metas['facility_type_other']) ? $metas['facility_type_other'] : ''), array('class' => 'form-control')) !!}
            </div>
            <div class="">
                <p>To receive funding from Wiser Capital we require all project documents signed on our standardized agreements.</p>
            </div>
            <div class="non_fit_agreement">
                <div class="form-group required">
                    {!! Form::label('signed_power_purchase_agreement', \App\Support\Dropdown::NON_FIT_SIGNED_POWER_PURCHASE_AGREEMENT) !!}

                    @foreach($yes_no as $key => $value)
                    <div class="checkbox">
                        {!! Form::radio('signed_power_purchase_agreement', $key, (isset($metas['signed_power_purchase_agreement']) && $key == $metas['signed_power_purchase_agreement'] ),['class' => 'agreement radio-custom','id' => 'signed_power_purchase_agreement_'.$key]) !!} 

                        <label for="signed_power_purchase_agreement_{{$key}}" class="radio-custom-label">{{ $value }}</label>
                    </div>
                    @endforeach

                </div>
                <div class="signed_power_purchase_agreement_section" style="display: none;">
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
            <div class="fit_agreement" style="display: none;">
                <div class="form-group required">
                    {!! Form::label('fit_signed_power_purchase_agreement', \App\Support\Dropdown::FIT_SIGNED_POWER_PURCHASE_AGREEMENT) !!}

                    @foreach($yes_no as $key => $value)
                    <div class="checkbox">
                        {!! Form::radio('fit_signed_power_purchase_agreement', $key, (isset($metas['fit_signed_power_purchase_agreement']) && $key == $metas['fit_signed_power_purchase_agreement'] ),['class' => 'agreement radio-custom','id' => 'fit_signed_power_purchase_agreement_'.$key]) !!} 
                        <label for="fit_signed_power_purchase_agreement_{{$key}}" class="radio-custom-label">{{ $value }}</label>
                    </div>
                    @endforeach

                </div>
                <div class="fit_signed_power_purchase_agreement_section" style="display: none;">
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
            
            <div class="row">
                
                <div class="col-md-6">
                    <div class="required">
                        {!! Form::label('system_location', 'System Type') !!}
                        <p><i>(select all that apply)</i></p>
                        @foreach($system_location as $key => $value)
                        <div class="checkbox ">
                            {!! Form::checkbox('system_location[]', $key, (isset($metas['system_location']) && in_array($key, $metas['system_location'])), ['class' => 'input_system_location_checked checkbox-custom','id' => 'select-'.$key]) !!} 
                            <label for="select-{{ $key }}" class='checkbox-custom-label'>
                                {{ $value }}
                            </label>

                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="required">
                        {!! Form::label('ongoing_system_cost', 'Property Cost') !!}
                        <p><i>(select all that apply)</i></p>
                        @foreach($ongoing_system_cost as $key => $value)
                        <div class="checkbox clearfix">

                            {!! Form::checkbox('ongoing_system_cost[]', $key, (isset($metas['ongoing_system_cost']) && in_array($key, $metas['ongoing_system_cost'])),['class'=>($key != \App\Support\Dropdown::ONGOING_NONE)? 'ongoing other checkbox-custom':'ongoing none checkbox-custom','id'=>'ongoing_system_cost_' . $key,'data-related-element'=>'ongoing_system_cost_'.$key]) !!} 
                            <label for="ongoing_system_cost_{{ $key }}" class='checkbox-custom-label'>
                                {{ $value }}
                            </label>
                            @if( $key != \App\Support\Dropdown::ONGOING_NONE)
                            @if( $key == \App\Support\Dropdown::ONGOING_OTHER)
                            {!! Form::text('ongoing_system_cost_'.$key.'_description', (isset($metas['ongoing_system_cost_'.$key.'_description']) ? $metas['ongoing_system_cost_'.$key.'_description'] : ''), array('class' => 'form-control ongoing_system_other_field ongoing_system_cost_'.$key, 'placeholder'=>'Description','style'=>'display:none','id'=>'ongoing_system_cost_'.$key.'_description')) !!}
                            {!! Form::select('ongoing_system_cost_'.$key.'_type',$ongoing_other_type, (isset($metas['ongoing_system_cost_'.$key.'_type']) ? $metas['ongoing_system_cost_'.$key.'_type'] : ''), array('class' => 'form-control marT5 ongoing_system_other_field ongoing_system_cost_'.$key, 'placeholder'=>'[Select Type]','style'=>'display:none','id'=>'ongoing_system_cost_'.$key.'_type')) !!}
                            {!! Form::text('ongoing_system_cost_'.$key.'_value', (isset($metas['ongoing_system_cost_'.$key.'_value']) ? $metas['ongoing_system_cost_'.$key.'_value'] : ''), array('class' => 'form-control priceFormatter2 ongoing_system_other_field ongoing_system_cost_'.$key, 'placeholder'=>'Value','style'=>'display:none','id'=>'ongoing_system_cost_'.$key.'_value')) !!}
                            @endif

                            @if( !in_array($key, [\App\Support\Dropdown::ONGOING_PROPERTYTAX, \App\Support\Dropdown::ONGOING_OTHER]))
                                <div class='margin-top'>
                                {!! Form::label('ongoing_system_cost_'.$key . '_year_label', 'Land Lease Term (years)', ['style'=>'display:none', 'class' => 'ongoing_system_other_field ongoing_system_cost_'.$key]) !!}
                                {!! Form::text('ongoing_system_cost_'.$key . '_year', (isset($metas['ongoing_system_cost_'.$key. '_year']) ? $metas['ongoing_system_cost_'.$key. '_year'] : ''), array('class' => 'form-control ongoing_system_other_field ongoing_system_cost_'.$key, 'placeholder'=>'Land Lease Term (years)','style'=>'display:none','id'=>'ongoing_system_cost_'.$key . '_year')) !!}
                                </div>
                                <div class='margin-top'>
                                {!! Form::label('ongoing_system_cost_'.$key . '_amount_label', 'Amount ($/Year)', ['style'=>'display:none', 'class' => 'ongoing_system_other_field ongoing_system_cost_'.$key]) !!}
                                {!! Form::text('ongoing_system_cost_'.$key . '_amount', (isset($metas['ongoing_system_cost_'.$key. '_amount']) ? $metas['ongoing_system_cost_'.$key. '_amount'] : 0), array('class' => 'form-control priceFormatter2 ongoing_system_other_field ongoing_system_cost_'.$key, 'placeholder'=>'Amount ($)','style'=>'display:none','id'=>'ongoing_system_cost_'.$key . '_amount')) !!}
                                </div>
                                <div class='margin-top'>
                                {!! Form::label('ongoing_system_cost_'.$key . '_rate_label', 'OR Land Lease Rate (%/W/yr)', ['style'=>'display:none', 'class' => 'ongoing_system_other_field ongoing_system_cost_'.$key]) !!}
                                {!! Form::text('ongoing_system_cost_'.$key . '_rate', (isset($metas['ongoing_system_cost_'.$key. '_rate']) ? $metas['ongoing_system_cost_'.$key. '_rate'] : 0), array('class' => 'form-control ongoing_system_other_field ongoing_system_cost_'.$key, 'placeholder'=>'Land Lease Rate (%/W/yr)','style'=>'display:none','id'=>'ongoing_system_cost_'.$key . '_rate')) !!}
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
        <div class="col-md-4  col-md-offset-2">
            
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="wrap form-group required   add-margin30">

                        {!! Form::label('energy_yield', 'Energy Yield (kWh/kW/yr AC)') !!}

                        {!! Form::text('energy_yield', (isset($metas['energy_yield']) ? $metas['energy_yield'] : ''), array('class' => 'form-control')) !!}

                    </div>
                </div>
                <div class="col-md-12">
                    
                    <div class="wrap form-group required   add-margin30">

                        {!! Form::label('system_size', 'System Size (kW DC)') !!}

                        {!! Form::text('system_size', (isset($metas['system_size']) ? $metas['system_size'] : ''), array('class' => 'form-control small')) !!}

                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    
                    
                    <div class="wrap form-group required add-margin30 current_electric_pricing_div">
                        {!! Form::label('current_electric_pricing', 'Avoided Electric Cost ($/kWh Rate)') !!}
                        <a href='#'>
                            <i class='fa fa-question-circle' data-toggle="tooltip" data-placement="top"
                               title='Enter the electricity cost/kWh excluding fixed fees and demand charges that solar will not offset'>
                            </i>
                        </a>
                        {!! Form::text('current_electric_pricing', (isset($metas['current_electric_pricing']) && is_numeric($metas['current_electric_pricing']) ? round($metas['current_electric_pricing'], 4) : ''), array('data-rule-current_electric_pricing' => 'true', 'class' => 'form-control priceFormatter small')) !!}

                    </div>
                    <div class="wrap form-group required  add-margin30 price_per_kwh" style='display: none;'>
                        {!! Form::label('utility_paid_price', 'Price per kWh') !!}
                        {!! Form::text('utility_paid_price', (isset($metas['utility_paid_price']) && is_numeric($metas['utility_paid_price']) ? round($metas['utility_paid_price'], 4) : ''), array('class' => 'form-control priceFormatter')) !!}
                    </div>
                    <div class="wrap form-group required  add-margin30 fit_rate_non_agreement_div" style='display: none;'>
                        {!! Form::label('fit_rate', 'FIT Rate ($/kWh)') !!}
                        {!! Form::text('fit_rate', (isset($metas['fit_rate']) && is_numeric($metas['fit_rate']) ? round($metas['fit_rate'], 4) : ''), array('class' => 'form-control priceFormatter')) !!}
                    </div>
                    
                    <div class="wrap  form-group required">
                        {!! Form::label('epc_cost', 'EPC Cost ($/W)') !!}
                        <i class='fa fa-question-circle' data-toggle="tooltip" data-placement="top"
                           title='Set your EPC cost. If this project does not solve, our PPA Optimizer will attempt to lower your EPC Cost to make the project solvable.'>
                        </i>
                        {!! Form::text('epc_cost', (isset($metas['epc_cost']) && is_numeric($metas['epc_cost']) ? round($metas['epc_cost'], 2) : ''), array('class' => 'form-control priceFormatter')) !!}

                    </div>
                    <p> Cost should be inclusive of extended inverter warranties, monitoring and all applicable taxes and fees. </p>
                </div>
            </div>
            

            <!---div>
                <p style="line-height:1.5;">The Wiser Capital platform identifies critical components of solar development, putting you in control of key business drivers. Integrated tools evaluate a projects economic viability and quickly determines if a project is fundable, ensuring you bid on high quality projects.</p>
            </div--->
        </div>
        <div class="col-xs-12">
            <p class="info"><span class="txt-1">*</span> Required fields</p>
            <hr>
        </div>
    </div>
                    
    <div class="text-center btn-holder" >
        <a class="btn btn-primary previous" href="#">Previous Step</a>
        <a class="btn btn-primary next" href="javascript:void(0);">Next Step</a>
    </div>
</div>