<div class="tab-heading" role="tab" id="creditworthiness-heading">
    <h2 class="panel-title">  
        <img src="{{url('/assets/themes/wisercapital/img/wsar.png')}}" /> Offtaker Creditworthiness
        <div class="title-meta"><span>{{  $WSAR->offtakerCreditworthiness()  }}</span>/400</div>
    </h2>
</div>
<div id="creditworthiness"  aria-labelledby="creditworthiness-heading">
    <?php 
    $business = $site->getMeta('type_of_business');
    $businessTypes = \App\Support\Dropdown::$type_of_business;
    $business_type = !empty($businessTypes[$business]) ? $businessTypes[$business] : ''; ?>
    {!! Form::open(array('route' => array('hf.update', $site->id), 'method' => 'put', 'id' => 'creditworthiness_form')) !!}
    <ul class="checklist">
        <li>
            <span class="score">  <span class="accordion-wsar-score">{{ $WSAR->businessFinancialStrength() }}</span>/200</span>
           
            Business Financial Strength	
        </li>
    </ul>
	
	<div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('type_of_business', 'Type of business') !!}

                {!! Form::select('type_of_business', $type_of_business, (empty($metas['type_of_business']) ? '' : $metas['type_of_business']), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}

            </div>
        </div>			      
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('years_in_operation', 'How many years has the current business been operational?') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('years_in_operation', range(0,200), (empty($metas['years_in_operation']) ? '' : $metas['years_in_operation']), array('placeholder' => '[Select]', 'class' => 'input-sm form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>			      
    </div>
    
    
    <hr />
   

	
	@if( ($site->getMeta('has_public_debt_rating') == 0) || (intval($site->getMeta('has_public_debt_rating')) == 1 && intval($site->getMeta('public_debt_rating')) == 5) )
		
	
	
    <div class="row">
        <div class="col-lg-12">
            {!! Form::label('yr_1_income_before_tax', 'Profitability (Year 1 is most current year)') !!} 
        </div>
        <div class="col-lg-2"> 
            <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->profitability()) ? 0 : $v) }}</span>/40</span>
            @if ((!empty($metas['yr_1_income_before_tax']) && !empty($metas['yr_2_income_before_tax']) 
                    && !empty($metas['yr_3_income_before_tax'])) && ($WSAR->profitability() < 40))
                <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true"
                    title="Your Net Income Yr 1 as compared to the average of years 2 and 3 is {{$WSAR->profitability()}}.% Full points are awarded for {{$business_type}} Entities when Increasing Net Assets are greater than {{in_array($type_of_business, [8,9]) ? '-' : ''}}3% by comparing year 1 net income to the average of years 2 and 3. " />
            @endif
        </div>	
        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_1_income_before_tax', (isset($metas['yr_1_income_before_tax']) && is_numeric($metas['yr_1_income_before_tax']) ? round($metas['yr_1_income_before_tax'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Yr 1 Net Income Before Tax</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_2_income_before_tax', (isset($metas['yr_2_income_before_tax']) && is_numeric($metas['yr_2_income_before_tax']) ? round($metas['yr_2_income_before_tax'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Yr 2 Net Income Before Tax</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_3_income_before_tax', (isset($metas['yr_3_income_before_tax']) && is_numeric($metas['yr_3_income_before_tax']) ? round($metas['yr_3_income_before_tax'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Yr 3 Net Income Before Tax</span>
            </div>
        </div>




    </div>


    <div class="row">

        <div class="col-lg-12">
            {!! Form::label('yr_1_total_liabilities', 'Debt/Equity Ratio') !!}
        </div>
        <div class="col-lg-2">
            <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->debtEquityRatio()) ? 0 : $v) }}</span>/40</span> 
            @if (is_numeric($site->getMeta('yr_1_total_liabilities')) 
                    && is_numeric($site->getMeta('yr_1_total_equity')) && ($WSAR->debtEquityRatio() < 40))
            <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true"
                    title="Your debt/equity ratio is {{$WSAR->debtEquityRatio()}}. Full points are awarded for {{$business_type}} Entities when Debt/Equity ratio is less than {{($type_of_business == 1) ? '4:1' : (in_array($type_of_business, [2,3,4,5]) ? '2:1' : '1:1')}}. " />
            
            @endif
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_1_total_liabilities', (isset($metas['yr_1_total_liabilities']) && is_numeric($metas['yr_1_total_liabilities']) ? round($metas['yr_1_total_liabilities'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Yr 1 Total Liabilities</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_1_total_equity', (isset($metas['yr_1_total_equity']) && is_numeric($metas['yr_1_total_equity']) ? round($metas['yr_1_total_equity'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Yr 1 Total Equity</span>
            </div>
        </div>

        <div class="col-lg-3">
            &nbsp;
        </div>




    </div>


 

    <hr />

    <div class="row">
        <div class="col-lg-12">
            {!! Form::label('yr_1_current_asset', 'Liquidity') !!}
        </div>
        <div class="col-lg-2">
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->liquidity()) ? 0 : $v) }}</span>/40</span> 
            @if (!empty($site->getMeta('yr_1_current_assets')) && !empty($site->getMeta('yr_1_current_liabilities')) 
                    && !empty($site->getMeta('3_month_operating_expenses')) && ($WSAR->liquidity() < 40))
            <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true"
                    title="WSAR Points Awarded: <br/> Your current assets compared to current liabilities plus 3 months operating expenses is {{$WSAR->liquidity()}}. For full points, current assets compared to current liabilities plus 3 months operating expenses needs to be greater than1.5." />
            
            @endif
        </div>				    

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_1_current_assets', (isset($metas['yr_1_current_assets']) && is_numeric($metas['yr_1_current_assets']) ? round($metas['yr_1_current_assets'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Yr 1 Current Assets</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_1_current_liabilities', (isset($metas['yr_1_current_liabilities']) && is_numeric($metas['yr_1_current_liabilities']) ? round($metas['yr_1_current_liabilities'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Yr 1 Current Liabilities</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('3_month_operating_expenses', (isset($metas['3_month_operating_expenses']) && is_numeric($metas['3_month_operating_expenses']) ? round($metas['3_month_operating_expenses'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">3 Months Operating Expenses</span>
            </div>
        </div>

    </div>
    <hr />

    <div class="row">
        <div class="col-lg-12">
            {!! Form::label('null', 'Debt Services Ratio') !!} 
            @if (!empty($site->getMeta('taxes')) && !empty($site->getMeta('depreciation')) && !empty($site->getMeta('principle'))
                     && !empty($site->getMeta('yr_1_income_before_tax')) && !empty($site->getMeta('interest')) 
                    && !empty($site->getMeta('amortization')) && ($WSAR->debtServicesRatio() < 40))
            <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true"
                    title="Your EBITDA compared to debt service plus fixed charges is {{$WSAR->debtServicesRatio()}}. For full points, your EBITDA compared to debt service plus fixed charges needs to be greater than 1.75." />
            
            @endif
        </div>
        <div class="col-lg-2">
            <span class="score"><span class="accordion-wsar-score">{{ (($v = $WSAR->debtServicesRatio()) ? $v : 0) }}</span>/40</span>
        </div>	
        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('principle', (isset($metas['principle']) && is_numeric($metas['principle']) ? round($metas['principle'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Principle</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_1_income_before_tax', (isset($metas['yr_1_income_before_tax']) && is_numeric($metas['yr_1_income_before_tax']) ? round($metas['yr_1_income_before_tax'], 3) : ''), array('disabled' => 'disabled', 'class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Net Income</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('interest', (isset($metas['interest']) && is_numeric($metas['interest']) ? round($metas['interest'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Interest</span>
            </div>
        </div>

    </div>
    
    
    
    
       <div class="row">
       
        <div class="col-lg-2">
        </div>	
      
        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('taxes', (isset($metas['taxes']) && is_numeric($metas['taxes']) ? round($metas['taxes'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Taxes</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('depreciation', (isset($metas['depreciation']) && is_numeric($metas['depreciation']) ? round($metas['depreciation'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Depreciation</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('amortization', (isset($metas['amortization']) && is_numeric($metas['amortization']) ? round($metas['amortization'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Amortization</span>
            </div>
        </div>

    </div>
    
    
    
    

    <hr />



    <div class="row">
        <div class="col-lg-12">
            {!! Form::label('yr_1_general_admin_expenses', '3 Year Trend (Year 1 is most current year)') !!} 
        </div>
        <div class="col-lg-2">
        </div>	
       
        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_1_general_admin_expenses', (isset($metas['yr_1_general_admin_expenses']) && is_numeric($metas['yr_1_general_admin_expenses']) ? round($metas['yr_1_general_admin_expenses'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Yr1 General & Admin Expenses</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_2_general_admin_expenses', (isset($metas['yr_2_general_admin_expenses']) && is_numeric($metas['yr_2_general_admin_expenses']) ? round($metas['yr_2_general_admin_expenses'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Yr2 General & Admin Expenses</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_3_general_admin_expenses', (isset($metas['yr_3_general_admin_expenses']) && is_numeric($metas['yr_3_general_admin_expenses']) ? round($metas['yr_3_general_admin_expenses'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Yr3 General & Admin Expenses</span>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-2">
        </div>	
      
        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_1_gross_sales', (isset($metas['yr_1_gross_sales']) && is_numeric($metas['yr_1_gross_sales']) ? round($metas['yr_1_gross_sales'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Yr1 Gross Sales</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_2_gross_sales', (isset($metas['yr_2_gross_sales']) && is_numeric($metas['yr_2_gross_sales']) ? round($metas['yr_2_gross_sales'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Yr2 Gross Sales</span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_3_gross_sales', (isset($metas['yr_3_gross_sales']) && is_numeric($metas['yr_3_gross_sales']) ? round($metas['yr_3_gross_sales'], 2) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Yr3 Gross Sales</span>
            </div>
        </div>
    </div>


    <div class="row">
         <div class="col-lg-2">
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_1_cost_of_goods', (isset($metas['yr_1_cost_of_goods']) && is_numeric($metas['yr_1_cost_of_goods']) ? round($metas['yr_1_cost_of_goods'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Yr1 Cost of Goods</span>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_2_cost_of_goods', (isset($metas['yr_2_cost_of_goods']) && is_numeric($metas['yr_2_cost_of_goods']) ? round($metas['yr_2_cost_of_goods'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Yr2 Cost of Goods</span>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                {!! Form::text('yr_3_cost_of_goods', (isset($metas['yr_3_cost_of_goods']) && is_numeric($metas['yr_3_cost_of_goods']) ? round($metas['yr_3_cost_of_goods'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                <span class="help-block">Yr3 Cost of Goods</span>
            </div>
        </div>
	</div>
    
    
    <ul class="checklist">
        <li>
            <?php $profitTrend = $WSAR->profitTrend();
                  $calProfitTrend = $WSAR->calculateProfitTrend();
                  $profitTrend = is_null($profitTrend) ? 0 : $profitTrend; 
            ?>
            <span class="score">  <span class="accordion-wsar-score">{{ $profitTrend }}</span>/20</span>

            @if ($profitTrend < 20)
            <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true"
                    title="Your profit trend is {{ is_null($calProfitTrend) ? 0 : $calProfitTrend }}% as compared to year 1 revenue. For full points, your profit trend needs to be at least 20% as compared to year 1 revenue." />
            
            @endif
            Profit Trend
        </li>
    </ul>
    
    <ul class="checklist">
        <li>
            <?php $grossMarginComparison = $WSAR->grossMarginComparison();
                  $calGrossMarginComparison = $WSAR->calculateGrossMargin();
                  $grossMarginComparison = is_null($grossMarginComparison) ? 0 : $grossMarginComparison;  ?>
            <span class="score">  <span class="accordion-wsar-score">{{ $grossMarginComparison }}</span>/10</span>
            @if ($grossMarginComparison < 10)
            <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true"
                    title="Your gross margin is {{ is_null($calGrossMarginComparison) ? 0 : $calGrossMarginComparison }}% as compared to year 1 gross margin. For full points, your gross margin needs to greater than 3% as compared to year 1 gross margin." />
            
            @endif
            Gross Margin Comparison
        </li>
    </ul>
    
    <ul class="checklist">
        <li>
            <?php $operationExpenditurestoSales = $WSAR->operationExpenditurestoSales();
                  $calOperationExpenditurestoSales = $WSAR->calculateOperationExpenditurestoSales();
                  $operationExpenditurestoSales = is_null($operationExpenditurestoSales) ? 0 : $operationExpenditurestoSales;  ?>
            <span class="score">  <span class="accordion-wsar-score">{{ $operationExpenditurestoSales }}</span>/10</span>
            @if ($operationExpenditurestoSales < 10)
            <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true"
                    title="Your average operating expenses to sales as compared to year 1 operating expenses  to sales is {{ is_null($calOperationExpenditurestoSales) ? 0 : $calOperationExpenditurestoSales }}%. For full points, your average operating expenses to sales as compared to year 1 operating expenses to sales needs to be greater than 3%." />
            
            @endif
            Operation Expenditures to Sales
        </li>
    </ul>
    <hr />
    
    @endif
	
        
  
    <ul class="checklist">
        <li>
            <span class="score">  <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->historyLongTermViability()) ? 0 : $v) }}</span>/175</span>
            History & Long Term Viability
        </li>
    </ul>

	<div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('financial_reports_audited', 'Are Financial Reports Audited?') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('financial_reports_audited', $yes_no, (isset($metas['financial_reports_audited']) ? $metas['financial_reports_audited'] : false), array('id' => 'financials-audited', 'placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>			      
    </div> 
    
    
    <div id="financial-reports">
    
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="form-group">
	                {!! Form::label('financial_reports_reviewed_audited_compiled_by_outside_cpa', 'Were Financial Reports reviewed or compiled by an outside CPA?') !!}
	                <div class="row">
	                    <div class="col-lg-6">
	                        {!! Form::select('financial_reports_reviewed_audited_compiled_by_outside_cpa', $yes_no, (isset($metas['financial_reports_reviewed_audited_compiled_by_outside_cpa']) ? $metas['financial_reports_reviewed_audited_compiled_by_outside_cpa'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}		  				</div>				  			
	                </div>
	            </div>
	        </div>			      
	    </div>
	    
	     
	    
	
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="form-group">
	                {!! Form::label('tax_returns_obtained_through_4506_process_vetted', 'Have the “As filed” tax returns been obtained from the IRS through the 4506 process and vetted against the client prepared financial reports?') !!}
	                <div class="row">
	                    <div class="col-lg-6">
	                        {!! Form::select('tax_returns_obtained_through_4506_process_vetted', $yes_no, (isset($metas['tax_returns_obtained_through_4506_process_vetted']) ? $metas['tax_returns_obtained_through_4506_process_vetted'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
	                    </div>				  			
	                </div>
	            </div>
	        </div>			      
	    </div>
	    
	    
	   
	      
	      
	
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="form-group">
	                {!! Form::label('acceptable_ar_audit_with_aging_chargeoffs', 'Is there an acceptable AR audit with aging and chargeoffs?') !!}
	                <div class="row">
	                    <div class="col-lg-6">
	                        {!! Form::select('acceptable_ar_audit_with_aging_chargeoffs', $yes_no, (isset($metas['acceptable_ar_audit_with_aging_chargeoffs']) ? $metas['acceptable_ar_audit_with_aging_chargeoffs'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
	                    </div>				  			
	                </div>
	            </div>
	        </div>			      
	    </div>
	
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="form-group">
	                {!! Form::label('acceptable_payable_audit', 'Is there an acceptable Payables Audit?') !!}
	                <div class="row">
	                    <div class="col-lg-6">
	                        {!! Form::select('acceptable_payable_audit', $yes_no, (isset($metas['acceptable_payable_audit']) ? $metas['acceptable_payable_audit'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
	                    </div>				  			
	                </div>
	            </div>
	        </div>			      
	    </div>
	
	   
	
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="form-group">
	                {!! Form::label('statement_of_pending_legal_issues_provided', 'Has a statement of Pending Legal Issues been provided?') !!}
	                <div class="row">
	                    <div class="col-lg-6">
	                        {!! Form::select('statement_of_pending_legal_issues_provided', $yes_no, (isset($metas['statement_of_pending_legal_issues_provided']) ? $metas['statement_of_pending_legal_issues_provided'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
	                    </div>				  			
	                </div>
	            </div>
	        </div>			      
	    </div>
	
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="form-group">
	                {!! Form::label('liabilities_callable_or_subject_to_baloon_payments', 'Are any of the liabilities callable or subject to balloon payments?') !!}
	                <div class="row">
	                    <div class="col-lg-6">
	                        {!! Form::select('liabilities_callable_or_subject_to_baloon_payments', $yes_no, (isset($metas['liabilities_callable_or_subject_to_baloon_payments']) ? $metas['liabilities_callable_or_subject_to_baloon_payments'] : false), array('placeholder' => '[Select]', 'id' => 'baloon-payments', 'class' => 'form-control')) !!}
	                    </div>				  			
	                </div>
	            </div>
	        </div>			      
	    </div>
	
	
	    <div class="row" id="cash-flow-sufficient">
	        <div class="col-lg-12">
	            <div class="form-group">
	                {!! Form::label('cash_flow_sufficient_to_pay_off_liabilities', 'If so are reserves and cash flow sufficient to pay off these liabilities if they are unable to be refinanced?') !!}
	                <div class="row">
	                    <div class="col-lg-6">
	                        {!! Form::select('cash_flow_sufficient_to_pay_off_liabilities', $yes_no, (isset($metas['cash_flow_sufficient_to_pay_off_liabilities']) ? $metas['cash_flow_sufficient_to_pay_off_liabilities'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
	                    </div>				  			
	                </div>
	            </div>
	        </div>			      
	    </div>

 </div><!-- financial report hide/show -->
    

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('60_percent_or_fewer_than_5_large_clients_or_short_term_contracts', '60% or more of revenue is dependent on five or more large clients or short term contracts?') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('60_percent_or_fewer_than_5_large_clients_or_short_term_contracts', $yes_no, (isset($metas['60_percent_or_fewer_than_5_large_clients_or_short_term_contracts']) ? $metas['60_percent_or_fewer_than_5_large_clients_or_short_term_contracts'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>			      
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('exposed_to_dependancy_or_commodity_price_increase_or_other_potential_volatility', 'Is the company exposed to a dependency on a major supplier or to unpredictable commodity price increases or other potential volatility in expenses?') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('exposed_to_dependancy_or_commodity_price_increase_or_other_potential_volatility', $yes_no, (isset($metas['exposed_to_dependancy_or_commodity_price_increase_or_other_potential_volatility']) ? $metas['exposed_to_dependancy_or_commodity_price_increase_or_other_potential_volatility'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>			      
    </div>





    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('host_compliance_term_conditions_current_credit_facilities', 'Is Host in compliance with terms & conditions of current credit facilities?') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('host_compliance_term_conditions_current_credit_facilities', $yes_no, (isset($metas['host_compliance_term_conditions_current_credit_facilities']) ? $metas['host_compliance_term_conditions_current_credit_facilities'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>			      
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('company_in_good_standing', 'Is the Company in Good Standing relative to the Secretary of State Listing?') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('company_in_good_standing', $yes_no, (isset($metas['company_in_good_standing']) ? $metas['company_in_good_standing'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>			      
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('derogatory_findings_public_search_record', 'Any Derogatory findings in Public Record search with Better Business Bureau?') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('derogatory_findings_public_search_record', $yes_no, (isset($metas['derogatory_findings_public_search_record']) ? $metas['derogatory_findings_public_search_record'] : false), array('placeholder' => '[Select]', 'class' => 'form-control', 'id' => 'derogatory-findings')) !!}
                    </div>				  			
                </div>
            </div>
        </div>			      
    </div>
	
	
	<div class="row" id="derogatory-finding-b-or-better">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('derogatory_finding_b_or_better', 'Derogatory finding B or Better?') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('derogatory_finding_b_or_better', $yes_no, (isset($metas['derogatory_finding_b_or_better']) ? $metas['derogatory_finding_b_or_better'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>			      
    </div>
    	
	<div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('volatility_of_industry', 'Volatility of the industry sector, performance in last five years') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('volatility_of_industry', $volatility_of_industry, (isset($metas['volatility_of_industry']) ? $metas['volatility_of_industry'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>			      
    </div>
    
    
	
	<ul class="checklist">
        <li>
            <span class="score">  <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->offtakerEconomicGains()) ? 0 : $v) }}</span>/25</span>
            Host Facility Economic Gains
        </li>
    </ul>
    
    
    
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('agreement_saves_money_year_one', 'Agreement saves money year one') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('agreement_saves_money_year_one', $yes_no, (isset($metas['agreement_saves_money_year_one']) ? $metas['agreement_saves_money_year_one'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>			      
    </div> 
    
    
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('fit_lease_payments', 'FIT/lease payments') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('fit_lease_payments', $yes_no, (isset($metas['fit_lease_payments']) ? $metas['fit_lease_payments'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>			      
    </div> 
    
    
     
    
    <hr>
    @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
		{!! Form::button('Save & Proceed', array("class" => "btn btn-default", 'id' => 'creditworthiness_submit_form')) !!}
    @endif
	{!! Form::close() !!}



</div>



<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
@parent
<script>
     $(document).ready(function () {
        $('#creditworthiness_submit_form').on('click', function () {
            $('.priceFormatter2').each(function() {
                if ($(this).val()) {
                    var unmasked = $(this).maskMoney('unmasked'); 
                    $(this).val(unmasked[0]); 
                }
            });
            $('#creditworthiness_form').submit();
        });
    });
</script>
@endsection


