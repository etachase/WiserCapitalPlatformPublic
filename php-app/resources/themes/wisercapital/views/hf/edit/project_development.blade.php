<div class="tab-heading" role="tab" id="project-development-heading">
    <h2 class="panel-title">  
        <img src="{{url('/assets/themes/wisercapital/img/wsar.png')}}" /> Project Development 
        <div class="title-meta"><span>{{  $WSAR->projectDevelopment()  }}</span>/100</div>
    </h2>
</div>
<div id="project-development" aria-labelledby="project-development-heading">

    {!! Form::open(array('route' => array('hf.update', $site->id), 'method' => 'put')) !!}
    <ul class="checklist">
        <li class="">
            {!! Form::label('standardized_documents', 'Standardized Documents') !!}
            <div class=" row">
                <div class="col-xs-3">
                    <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->standardizedDocuments()) ? 0 : $v) }}</span>/10</span>

                    
                </div>
                <div class="col-md-6">
                    {!! Form::select('standardized_documents', $standardized_documents, (empty($metas['standardized_documents']) ? '' : $metas['standardized_documents']), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                </div>
            </div>
        </li>
        <li>
            <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->projectPermitting()) ? 0 : $v) }}</span>/10</span>
            
            Project Permitting
        </li>
        <li>
            <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->interconnectionStudyStatus()) ? 0 : $v) }}</span>/10</span>
            
            Utility Interconnection Process
        </li>
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->installerWorkExperienceStatus()) ? 0 : $v) }}</span>/49</span> 
            
            Installer Work Experience, Financial Standing and Insurance	
        </li>
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->certifiedRoofingStudyRemainingLifeYears()) ? 0 : $v) }}</span>/7</span> 
            
            Certified Roofing Study	
        </li>
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->structuralEngineering()) ? 0 : $v) }}</span>/5</span> 
            
            Structural Engineering 
        </li>

    </ul>

    <hr>


    <ul class="checklist">
        <li class=" ">
            <p> {!! Form::label('waive_structural_review', 'Structural Engineering - Waive Structural Review') !!}</p>

            <div class="form-group row">
                <div class="col-md-6">
                    {!! Form::select('waive_structural_review', $yes_no, (isset($metas['waive_structural_review']) ? $metas['waive_structural_review'] : false), array('placeholder' => '[Select]', 'class' => 'form-control ')) !!}
                </div>
            </div>
        </li>
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->soilType()) ? 0 : $v) }}</span>/7</span>
            
            Soil conditions and potential risks		
        </li>
        <li>
            <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->interestInProperty()) ? 0 : $v) }}</span>/1</span>
            
            Interest in Property		
        </li>
    </ul>

    <hr>



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
    <hr>

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
    <hr/>
    @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
    	{!! Form::submit('Save & Proceed', array("class" => "btn btn-primary")) !!}
	@endif
	
    {!! Form::close() !!}
</div>
