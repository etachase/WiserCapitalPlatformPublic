    <div class="tab-heading"  id="first-loss-surety-heading">   
        <h2 class="panel-title">
            <img src="{{url('/assets/themes/wisercapital/img/wsar.png')}}" /> Transactional Overview
            <div class="title-meta"><span>{{ (is_null($v = $WSAR->transactionalOverview()) ? 0 : $v) }}</span>/100</div>
        </h2>
    </div>
    <div id="first-loss-surety"  aria-labelledby="first-loss-surety-heading">

        {!! Form::open(array('route' => array('hf.update', $site->id), 'method' => 'put', 'id' => 'transactional_overview_form')) !!}

		
	
	
		
		
	
		
		
	<div class="row">
        <div class="col-lg-12">
            {!! Form::label('null', 'SPE Debt Services Ratio (DSCR)') !!} 
        </div>
        <div class="col-lg-2"> 
            <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->DSCR()) ? 0 : $v) }}</span>/30</span>
        </div>	
        <div class="col-lg-1">
            
        </div>	
        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('spe_net_income', (isset($metas['spe_net_income']) && is_numeric($metas['spe_net_income']) ? round($metas['spe_net_income'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">SPE Net Income</span>
            </div>
        </div>

         <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('spe_interest', (isset($metas['spe_interest']) && is_numeric($metas['spe_interest']) ? round($metas['spe_interest'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">SPE Interest</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('spe_taxes', (isset($metas['spe_taxes']) && is_numeric($metas['spe_taxes']) ? round($metas['spe_taxes'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">SPE Taxes</span>
            </div>
        </div>
        
        <div class="col-lg-3">
         
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('spe_depreciation', (isset($metas['spe_depreciation']) && is_numeric($metas['spe_depreciation']) ? round($metas['spe_depreciation'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">SPE Depreciation</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('spe_amortization', (isset($metas['spe_amortization']) && is_numeric($metas['spe_amortization']) ? round($metas['spe_amortization'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">SPE Amortization</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('spe_debt_obligation', (isset($metas['spe_debt_obligation']) && is_numeric($metas['spe_debt_obligation']) ? round($metas['spe_debt_obligation'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">SPE Debt Obligation (Principle & Interest)</span>
            </div>
        </div>
	</div>
    
    
    
    <div class="row">
        <div class="col-lg-12">
            {!! Form::label('null', 'Debt to Project Value') !!} 
        </div>
        <div class="col-lg-2"> 
            <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->debtToProjectValue()) ? 0 : $v) }}</span>/40</span>
        </div>	
        <div class="col-lg-1">
            
        </div>	
        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('spe_debt_for_transaction', (isset($metas['spe_debt_for_transaction']) && is_numeric($metas['spe_debt_for_transaction']) ? round($metas['spe_debt_for_transaction'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">SPE Debt for Transaction</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group"> 
                {!! Form::text('spe_total_projected_investment', (isset($metas['spe_total_projected_investment']) && is_numeric($metas['spe_total_projected_investment']) ? round($metas['spe_total_projected_investment'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">SPE Total Project Investment</span>
            </div>
        </div>
	</div>
    
    
        <ul class="checklist">
            <li>
                <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->debtAmmortization()) ? 0 : $v) }}</span>/10</span>
                
                Debt Ammortization
            </li>
        </ul>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('debt_ammortization', 'Debt Ammortization') !!}
                    <div class="row">
                        <div class="col-lg-6">
                            {!! Form::select('debt_ammortization', [1 => "Fully Ammortized Debt", 2 => "50% Amortization", 3 => "Refinance Required"], (isset($metas['debt_ammortization']) ? $metas['debt_ammortization'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                        </div>				  			
                    </div>
                </div>
            </div>

        </div>
        
        
        
        <ul class="checklist">
            <li>
                <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->interestRateRisk()) ? 0 : $v) }}</span>/20</span>
                
                Interest Rate Risk
            </li>
        </ul>
        
        
        
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('interest_rate_risk', 'Interest Rate Risk') !!}
                    <div class="row">
                        <div class="col-lg-6">
                            {!! Form::select('interest_rate_risk', [1 => "Fixed rate for the life of the loan", 2 => "Fixed rate for >50% of the life of the loan", 3 => "Variable Interest Rate"], (isset($metas['interest_rate_risk']) ? $metas['interest_rate_risk'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                        </div>				  			
                    </div>
                </div>
            </div>

        </div>
        
        
        
        <hr>
        
		@if (Auth::user()->hasRole(['admins', 'solar-installer']) )
			{!! Form::submit('Save & Proceed', array("class" => "btn btn-primary", 'id' => 'transactional_overview_submit_form')) !!}
        @endif
		{!! Form::close() !!}
    </div>
    
    
    
    <!-- Optional bottom section for modals etc... -->
@section('body_bottom')
@parent
<script>
     $(document).ready(function () {
        $('#transactional_overview_submit_form').on('click', function () {
            $('.priceFormatter2').each(function() {
                if ($(this).val()) {
                    var unmasked = $(this).maskMoney('unmasked'); 
                    $(this).val(unmasked[0]); 
                }
            });
            $('#transactional_overview_form').submit();
        });
    });
</script>
@endsection




