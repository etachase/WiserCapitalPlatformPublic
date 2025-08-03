
<div class="tab-heading" role="tab" id="financials-heading">
    <h2 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#financials" aria-expanded="false" aria-controls="financials">
            Financials
        </a>
    </h2>
</div>
<div id="financials" >
    {!! Form::open(array('route' => array('hf.update', $site->id), 'method' => 'put', 'files' => true )) !!}
    
    <div class="row">
		<div class="col-lg-12">
			<ul class="checklist">
		        <li>
		            <span class="score">  <span class="accordion-wsar-score">{{ $WSAR->businessFinancialStrength() }}</span>/200</span>
		           
		            Business Financial Strength	
		        </li>
		    </ul>
		    	<hr />
		</div>
	</div>
	
	

    <div class="row">
        <div class="col-lg-12">
            <p class="text-muted">Business Longevity</p>
            <div class="form-group">
                {!! Form::label('years_in_business', 'How many years has the current business been operational?') !!}
                <div class="row">
                    <div class="col-lg-5">
                        {!! Form::select('years_in_business', $years_in_business, (empty($metas['years_in_business']) ? '' : $metas['years_in_business']), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>			      
        <!--					<div class="col-lg-6">
                                                        <p class="text-muted">&nbsp;</p>
                                                        <div class="form-group">
                                                                {!! Form::label('years_in_lease_term', 'How many years in Lease Term?') !!}
                                                                <div class="row">
                                                                        <div class="col-lg-5">
                                                                                {!! Form::number('years_in_lease_term', (isset($metas['years_in_lease_term']) ? $metas['years_in_lease_term'] : ''), array('class' => 'form-control')) !!}
                                                                        </div>				  			
                                                                </div>
                                                        </div>	
                                                </div>-->
    </div>
    <hr />
    
    <div class="row">
        <div class="col-lg-12">
            <p class="text-muted">Public Debt Rating</p>
            {!! Form::hidden('has_public_debt_rating', null) !!} 
            {!! Form::label('has_public_debt_rating', 'Does the offtaker have a public debt rating at or above BBB or BAA by any nationally recognized rating agencies?') !!}
            @foreach($yes_no as $key => $value)
            <div class="checkbox">

                {!! Form::radio('has_public_debt_rating', $key, (isset($metas['has_public_debt_rating']) && !is_array($metas['has_public_debt_rating']) && ($key == $metas['has_public_debt_rating'])), 
                ['class' => 'radio-custom', 'id' => 'select-has-public-debt-rating-'.$key]) !!} 
                <label for="select-has-public-debt-rating-{{ $key }}" class='radio-custom-label'>
                    {{ $value }}
                </label>

            </div>
            @endforeach
        </div>
    </div>
    
  
    
    
    <div class="row" id="public-debt-rating-container" {{((intval($site->getMeta('has_public_debt_rating')) == 0) ? 'style=display:none;' : "")}}>
		<div class="form-group">
	    	<div class="col-lg-6">
            	{!! Form::label('public_debt_rating', 'Public Debt Rating') !!}
				{!! Form::select('public_debt_rating', $public_debt_rating, (empty($metas['public_debt_rating']) ? '' : $metas['public_debt_rating']), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
        	</div>
			<div class="col-lg-6">
        		<div id="public-debt-rating-other" {{((intval($site->getMeta('public_debt_rating')) == 5) ? '' : 'style=display:none;')}}>
                	{!! Form::label('public_debt_rating_other', 'Describe') !!}
                	{!! Form::text('public_debt_rating_other', (isset($metas['public_debt_rating_other']) ? $metas['public_debt_rating_other'] : ''), 
					array('placeholder' => "Rating Info",  'class' =>  'input-sm form-control'))  !!}
            	</div>
        	</div>
        </div>
	</div>
    

    <hr />
    <div class="row">
        <div class="col-md-12">
            <p class="text-muted">Financials & Tax Returns</p>
            <div class="row">
                <div class="col-lg-6">

                    <div class="form-group">
						
                        
                        <label for="file_3_years_financials[]">
                        	Please upload the past two years of financials. (Max size 64MB)
							<a href='#'>
			                	<i class='fa fa-question-circle' data-toggle="tooltip" data-placement="top"
			                   title='If audited financials are provided, tax returns are not required'>
							   </i>
			            	</a>
                        </label>
                        
                        
                        @if (Auth::user()->hasRole(['admins', 'solar-installer']) )

                        <p>{!! Form::label('file_3_years_financials[]', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file ']) !!} </p>
                        @endif
                        {!! Form::file('file_3_years_financials[]', ['class' => 'no-visibility upload_button_track', "multiple" => 'multiple']) !!}
                        @if (isset($metas['offtaker_creditworthiness_financials_financials_30']))
                        @foreach ($metas['offtaker_creditworthiness_financials_financials_30'] as $key => $financials)
                        <span class="file_ops">
                            {{ $key }}
                            <a data-href="{{$financials['filePath']}}" class="dr-file-download" title="View"><i class="fa fa-toggle-up "></i></a>
                            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                            <a href="#" class='delete_uploaded_file' data-file="delete_file_3_years_financials[]" data-value="{{$key}}" title="Delete"><i class="fa fa-trash-o "></i></a>
                            @endif
                        </span><br/>
                        @endforeach
                        @else
							<p class="text-muted">No File Uploaded Yet</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
						<label for="file_2_years_tax_return[]">
							Upload 2 years of tax returns or form 990 (Max  size 64MB)
							<a href='#'>
			                	<i class='fa fa-question-circle' data-toggle="tooltip" data-placement="top"
			                   title='If audited Finanicals are not available company prepared financials and tax returns can be submitted'>
							   </i>
			            	</a>
						</label>
			            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                        <p>{!! Form::label('file_2_years_tax_return[]', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file']) !!} </p>
                        @endif
                        {!! Form::file('file_2_years_tax_return[]', ['class' => 'no-visibility upload_button_track', "multiple" => 'multiple']) !!}
                        @if (isset($metas['offtaker_creditworthiness_financials_tax_return_31']))
                        @foreach ($metas['offtaker_creditworthiness_financials_tax_return_31'] as $key => $tax_returns)
                        <span class="file_ops">
                            {{ $key }}
                            <a data-href="{{$tax_returns['filePath']}}" class="dr-file-download" title="View"><i class="fa fa-toggle-up "></i></a>
                            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                            <a href="#" class='delete_uploaded_file' data-file="delete_file_2_years_tax_return[]" data-value="{{$key}}" title="Delete"><i class="fa fa-trash-o "></i></a>
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
    <hr />
    <div class="row">
        <div class="col-lg-6">
            <p class="text-muted">&nbsp;</p>
            <div class="form-group">
                {!! Form::label('mortgage_amount', 'Mortgage Amount') !!}

                {!! Form::select('mortgage_amount', $mortgage_amount, (empty($metas['mortgage_amount']) ? '' : $metas['mortgage_amount']), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
            </div>				  			

        </div>			      
        <div class="col-lg-6">
            <p class="text-muted">&nbsp;</p>
            <div class="form-group">
                {!! Form::label('bank', 'Bank') !!}

                {!! Form::text('bank', (!empty($metas['bank']) ? $metas['bank'] : ''), array('class' => 'form-control')) !!}

            </div>	
        </div>
    </div>


    <!--				<div class="row">
                                    <div class="col-lg-4">
                                            <p class="text-muted">Tenants</p>
                                            {!! Form::label('tenants', 'Do you have tenants?') !!}
                                            @foreach($yes_no as $key => $value)
                                                    <div class="checkbox">
                                                                    <label>
                                                                    {!! Form::radio('tenants', $key, (isset($metas['tenants']) && $key == $metas['tenants'] )) !!} {{ $value }}
                                                                    </label>
                                                            </div>
                                            @endforeach
                                    </div>
                                    </div>-->


    <hr />

    <div id="tenants-container" class="{!! (isset($metas['tenants']) && $metas['tenants'] == 1 ? '' : 'hide' ) !!}">
        <div class=" row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('how_many_tenants', 'How Many Tenants?') !!}
                    <div class="row">
                        <div class="col-lg-8">
                            {!! Form::number('how_many_tenants', (isset($metas['how_many_tenants']) ? $metas['how_many_tenants'] : ''), array('class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                {!! Form::label('tentant_meter_in_your_name', 'Is the meter in your name?') !!}
                @foreach($yes_no as $key => $value)
                <div class="checkbox">
                    <label>
                        {!! Form::radio('tentant_meter_in_your_name', $key, (isset($metas['tentant_meter_in_your_name']) && $key == $metas['tentant_meter_in_your_name'] )) !!} {{ $value }}
                    </label>
                </div>
                @endforeach
            </div>
            <div class="col-lg-4">
                {!! Form::label('tenant_multiple_meters', 'Are there multiple meters?') !!}
                @foreach($yes_no as $key => $value)
                <div class="checkbox">
                    <label>
                        {!! Form::radio('tenant_multiple_meters', $key, (isset($metas['tenant_multiple_meters']) && $key == $metas['tenant_multiple_meters'] )) !!} {{ $value }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>
        <hr>
    </div>
    @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
    {!! Form::submit('Save & Proceed', array("class" => "btn btn-primary")) !!}
	@endif
    {!! Form::close() !!}
</div>


