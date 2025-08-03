<div class="process-sec process-sec-3" data-step="3">
    <div class="row col-xs-12 process-sec-entry process-project-info">
        
        <div class="col-md-6 col-md-offset-3 renewable_incentive_program_section">

            <div class="wrap form-group required">

                {!! Form::label('renewable_incentive_program', 'Renewable Incentive Program') !!}
                                        {!! Form::select('renewable_incentive_program', $renewable_incentive, (empty($metas['renewable_incentive_program']) ? '' : $metas['renewable_incentive_program']), array('placeholder' => '[Select]',  'class' => 'incentive_select form-control')) !!}
                                </div>

            <div class="wrap incentive_dc_section" style="display: none;">
                <div class="form-group">
                    {!! Form::label('incentive_dc', '$/kW') !!}
                    {!! Form::text('incentive_dc', (isset($metas['incentive_dc']) && is_numeric($metas['incentive_dc']) ? round($metas['incentive_dc'], 2)  : ''), array('class' => 'incentive_dc_value form-control priceFormatter')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('length_of_incentive', 'Length of Incentive (Years)?') !!}
                    {!! Form::number('length_of_incentive', (isset($metas['length_of_incentive']) ? $metas['length_of_incentive'] : ''), array('class' => 'length_of_incentive_value form-control', 'min' => 0)) !!}
                </div>

            </div>
            <?php $incentive_data = !empty(old('incentive_year')) ? old('incentive_year') : (isset($metas['incentive_year']) ? $metas['incentive_year'] : []); ?>
            <span title="Loading.." class="incentive_loader fa fa-lg fa-refresh fa-spin" style="display: none;"></span>
            <div class="form-group incentive_ac_section" style="display:none">
                <p class="add-margin30">Enter 
                    <span class="incentive_year_ac_kwh">$/kWh</span> for each relevant year of the incentive program.</p>
                <ul class="incentive_ac_section_table">
                    @for ($year = 1; $year <= 10 ;$year++ )
                    <li>
                        <span class="num"> {{$year}}</span>

                        {!! Form::text('incentive_year[' . $year . ']', (isset($incentive_data[$year]) && is_numeric($incentive_data[$year]) ? round($incentive_data[$year], 2) : ''), array('class' => 'incentive_ac_value form-control priceFormatter')) !!}
                    </li>
                    @endfor
                </ul>
            </div>
        </div>
        
    </div>
    <p class="info"><span class="txt-1">*</span> Required fields</p>
    <hr>
                    
    <div class="row text-center btn-holder" >
        <a class="btn btn-primary previous" href="#">Previous Step</a>
        <a class="btn btn-primary next" href="javascript:void(0);">Next Step</a>
    </div>

</div>
