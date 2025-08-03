<div class="tab-heading" role="tab" id="legal-policy-heading">
    <h2 class="panel-title">
        <img src="{{url('/assets/themes/wisercapital/img/wsar.png')}}" /> Legal & Policy
        <div class="title-meta"><span>{{ $WSAR->legalPolicy() }}</span>/200</div>
    </h2>
</div>
<div id="legal-policy" aria-labelledby="legal-policy-heading">

    {!! Form::open(array('route' => array('hf.update', $site->id), 'method' => 'put', 'files' => true)) !!}
   
   
    
   
	 
	 <ul class="checklist">
		 <li>
          	 <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->standardizedDocuments()) ? 0 : $v) }}</span>/25</span>
            
            Standardized Documents
        </li>
    </ul>
    
    
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('standardized_documents', 'Standardized Documents') !!}
                <div class="row">
                    <div class="col-lg-6">
						{!! Form::select('standardized_documents', $standardized_documents, (empty($metas['standardized_documents']) ? '' : $metas['standardized_documents']), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>
    </div>
    
           		
        
    
   

  
    
    <hr />

	
	 <ul class="checklist">
		 <li>
            <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->projectPermitting()) ? 0 : $v) }}</span>/15</span>
            
            Project Permitting
        </li>
        </ul>
        
        
	<div class="row">
		
        <div class="col-lg-12">
            {!! Form::label('status_project_permit', 
            'What is the status of the project permits?') !!}
            @foreach($status_project_permit as $key => $value)
            <div class="checkbox">
                    {!! Form::radio('status_project_permit', $key, 
                    (isset($metas['status_project_permit']) && 
                    $key == $metas['status_project_permit'] ), ['class' => 'radio-custom','id' => 'status_project_permit_'.$key]) !!} 

                 <label class="radio-custom-label" for="status_project_permit_{{$key}}">{{ $value }}</label>
            </div>
            @endforeach	
        </div>
    </div>
    
    <hr />
    
    
    <ul class="checklist">
        
       
        <li>
            <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->interconnectionStudyStatus()) ? 0 : $v) }}</span>/15</span>
            
            Utility Interconnection Process
        </li>
      
         

    </ul>
    
    
    <div class="row">
        <div class="col-lg-12">
            {!! Form::label('interconnection_study_status', 'What is the status of the interconnection study or agreement?') !!}
            @foreach($interconnection_study_status as $key => $value)
            <div class="checkbox">
                    {!! Form::radio('interconnection_study_status', $key, (isset($metas['interconnection_study_status']) && $key == $metas['interconnection_study_status'] ), ['class' => 'radio-custom','id' => 'interconnection_study_status_'.$key]) !!}
                    <label class="radio-custom-label" for="interconnection_study_status_{{$key}}">{{ $value }}</label>
                </label>
            </div>
            @endforeach
        </div>
    </div>
    
    <hr />
    
    
    <ul class="checklist">
        
        <li>
            <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->interestInProperty()) ? 0 : $v) }}</span>/20</span>
            
            Interest in Property		
        </li>
    </ul>
    
    <hr />
    
     <ul class="checklist">
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->projectFireCasualtyRisk()) ? 0 : $v) }}</span>/5</span>
            
            Project Fire and Casualty Risk	
        </li>
    </ul>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('rebuilt_if_casualty', 'Can project be rebuilt if it suffers a casualty?') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('rebuilt_if_casualty', $yes_no, (isset($metas['rebuilt_if_casualty']) ? $metas['rebuilt_if_casualty'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>
    </div>
    <hr>

    <ul class="checklist">
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->offtakerFireCasualtyRisk()) ? 0 : $v) }}</span>/5 </span>
            
            Offtaker Fire and Casualty Insurance	
        </li>
    </ul>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('host_maintain_casualty_insurance', 'Does host maintain fire and casualty insurance with replacement cost & zoning code endorsement?') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('host_maintain_casualty_insurance', $yes_no, (isset($metas['host_maintain_casualty_insurance']) ? $metas['host_maintain_casualty_insurance'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>
    </div>


	<hr />
	
	
	<ul class="checklist">
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->SNDAReviwedWaived()) ? 0 : $v) }}</span>/50</span>
            
            Subordination and Non Disturbance Agreement
        </li>
    </ul>


    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('file_subordination_non_disturbance_agreement', 'Subordination and Non Disturbance Agreement (Max size 64MB)') !!}
                <div class="row">
                    <div class="col-lg-12 ">
						@if (Auth::user()->hasRole(['admins', 'solar-installer']) )	
                        	<p>{!! Form::label('file_subordination_non_disturbance_agreement[]', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file']) !!} </p>
                        @endif
                        {!! Form::file('file_subordination_non_disturbance_agreement[]', ['class' => 'no-visibility upload_button_track', "multiple" => 'multiple']) !!}
                        @if (isset($metas['legal_policy_permitting_18']))
                        @foreach ($metas['legal_policy_permitting_18'] as $key => $snda)
                        <span class="file_ops">
                            {{ $key }}
                            <a data-href="{{$snda['filePath']}}" class="dr-file-download" title="View"><i class="fa fa-toggle-up "></i></a>
                            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                            	<a href="#" class='delete_uploaded_file' data-file="delete_file_subordination_non_disturbance_agreement[]" data-value="{{$key}}" title="Delete"><i class="fa fa-trash-o "></i></a>
                            @endif
                        </span><br/>
                        @endforeach
                        @else
                        	<p class="text-muted">No File Uploaded Yet</p>
                        @endif
                        <p class="text-muted">We accept the following file types gif, jpg, png, jpeg, doc, docx, xls, xlsx, pdf, zip</p>

                    </div>				  			
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('requirements_for_snda_reviewed_waived_by_wc', 'Requirement for SNDA has been:') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('requirements_for_snda_reviewed_waived_by_wc', $SDNA, (isset($metas['requirements_for_snda_reviewed_waived_by_wc']) ? $metas['requirements_for_snda_reviewed_waived_by_wc'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>
    </div>
    
    <hr />
    
    
     <ul class="checklist">
        <li>
            <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->titleInsuranceRoofPenetrationInsurance()) ? 0 : $v) }}</span>/20</span>
            
            Title Insurance, Lien Rights, Roof Penetration Insurance
        </li>
    </ul>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('file_title_insurance', 'Title Insurance (Max upload size 64MB)') !!}
                <div class="row">
                    <div class="col-lg-12">
						@if (Auth::user()->hasRole(['admins', 'solar-installer']) )	
                        	<p>{!! Form::label('file_title_insurance[]', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file']) !!} </p>
                        @endif
                        {!! Form::file('file_title_insurance[]', ['class' => 'no-visibility upload_button_track', 'multiple' => 'multiple']) !!}
                        @if (isset($metas['offtaker_creditworthiness_insurance_2']))
                        @foreach ($metas['offtaker_creditworthiness_insurance_2'] as $key => $host_facility_insurance)
                        <span class="file_ops">
                            {{ $key }}
                            <a data-href="{{$host_facility_insurance['filePath']}}" class="dr-file-download" title="View"><i class="fa fa-toggle-up "></i></a>
                            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )	
                            	<a href="#" class='delete_uploaded_file' data-file="delete_file_title_insurance[]" data-value="{{$key}}" title="Delete"><i class="fa fa-trash-o "></i></a>
							@endif
                        </span><br/>
                        @endforeach
                        @else
                        	<p class="text-muted">No File Uploaded Yet</p>
                        @endif
                        <p class="text-muted">We accept the following file types gif, jpg, png, jpeg, doc, docx, xls, xlsx, pdf, zip</p>

                    </div>				  			
                </div>
            </div>
        </div>
    </div>
    


    <hr>

    <ul class="checklist">
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->publicPolicyRateRisks()) ? 0 : $v) }}</span>/20</span>
            
            Public Policy & Rate Risks
        </li>
    </ul>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('policy_or_rate_change_could_threaten_ppa_cash_flow', 'Are there Proposed Policy or Rate Changes from State or Local Regulators or Utility that could change or threaten PPA cash flow economics?') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('policy_or_rate_change_could_threaten_ppa_cash_flow', $yes_no, (isset($metas['policy_or_rate_change_could_threaten_ppa_cash_flow']) ? $metas['policy_or_rate_change_could_threaten_ppa_cash_flow'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>
    </div>
    
    
     <div class="row">
	 	<div class="col-lg-12">
			<p>
			{!! Form::label('', 'Regulation Risks') !!}
    		</p>
		</div>
		<div class="col-lg-6">
		<ul>
			<li>Risks of rate changes   {!! Form::text('risk_of_rate_change', (isset($metas['risk_of_rate_change']) ? $metas['risk_of_rate_change'] : ''), 
                array('class' =>  'input-sm form-control'))  !!}</li>
			<li>NEM policy or Interconnection Risk  {!! Form::text('nem_policy_interconnection_risk', (isset($metas['nem_policy_interconnection_risk']) ? $metas['nem_policy_interconnection_risk'] : ''), 
                array('class' =>  'input-sm form-control'))  !!}</li>
			<li>Project specific incentive risk  {!! Form::text('project_specific_incentive_risk', (isset($metas['project_specific_incentive_risk']) ? $metas['project_specific_incentive_risk'] : ''), 
                array('class' =>  'input-sm form-control'))  !!}</li>
		</ul>
		</div>
	</div>


	
    <hr/>
    
	<ul class="checklist">
        
        @if( isset($metas['system_location']) && is_array($metas['system_location']) && in_array(10,  $metas['system_location']))
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->certifiedRoofingStudyRemainingLifeYears()) ? 0 : $v) }}</span>/10</span> 
            
            Certified Roofing Study	
        </li>
        @endif
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->structuralDrawingsorPlans()) ? 0 : $v) }}</span>/15</span> 
            
            Structural Engineering 
        </li>
          <li class=" ">
            <p> {!! Form::label('waive_structural_review', 'Structural Engineering - Waive Structural Review') !!}</p>

            <div class="form-group row">
                <div class="col-md-6">
                    {!! Form::select('waive_structural_review', $yes_no, (isset($metas['waive_structural_review']) ? $metas['waive_structural_review'] : false), array('placeholder' => '[Select]', 'class' => 'form-control ')) !!}
                </div>
            </div>
        </li>
		  <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->soilType()) ? 0 : $v) }}</span>/10</span>
            
            Soil conditions and potential risks		
        </li>
    </ul>
    
    <hr />
     
	
	
    @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
		{!! Form::submit('Save & Proceed', array("class" => "btn btn-primary")) !!}
    @endif
    
    {!! Form::close() !!}
</div>

