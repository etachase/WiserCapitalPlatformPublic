<div class="tab-heading" role="tab" id="roof-building-heading">
    <h2 class="panel-title">

        System Information
    </h2>
</div>
<div id="roof-building" >
    {!! Form::open(array('route' => array('hf.update', $site->id), 'method' => 'put', 'files' => true)) !!}
    
    
    
    @if( isset($metas['system_location']) && is_array($metas['system_location']) && in_array(10,  $metas['system_location']))
    
	
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('roof_material', 'Roof Material') !!}
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::select('roof_material[]', $roof_material, (empty($metas['roof_material']) ? '' : $metas['roof_material']), array('class' => 'form-control roof-building-select-multiple margin-bottom', 'multiple' => 'multiple', 'size' => 4)) !!}
<!--                        <span class="help-block">*command click to select multiple items</span>-->

                    </div>				  			
                </div>
            </div>	
        </div>			      
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('roof_condition', 'Roof Condition') !!}
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::select('roof_condition', $roof_condition, (empty($metas['roof_condition']) ? '' : $metas['roof_condition']), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>	
        </div>
    </div>
	
	<hr />
	@endif
	
<div class="row">
        <div class="col-lg-12">

            {!! Form::label('support_solar_array', 'Do you have structural drawings or plans to show that the building or structure has the structural integrity to support a solar array?') !!}
            <div class="col-xs-12 marT-10 marB10 marL-5">
                <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->structuralDrawingsorPlans()) ? 0 : $v) }}</span>/15</span> &nbsp;
                <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true" 
                    title="WSAR Points Awarded: <br />Yes, both worth 15 points <br />I have structural drawings only worth 10 points <br />I have plans only worth 10 points <br />None worth 0 points" />
            </div>
            @foreach($support_solar_array as $key => $value)
            <div class="checkbox">
                {!! Form::radio('support_solar_array', $key, (isset($metas['support_solar_array']) && $key == $metas['support_solar_array'] ), ['class' => 'radio-custom','id' => 'support_solar_array_'.$key]) !!} 
                <label class="radio-custom-label" for="support_solar_array_{{$key}}">{{ $value }}</label>
            </div>
            @endforeach


        </div>
    </div>



	 @if( isset($metas['system_location']) && is_array($metas['system_location']) && in_array(10,  $metas['system_location']))
	 <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('file_support_solar_array[]', 'Structural Drawings or Plans (Max upload size 64MB)') !!}
                <div class="row">
                    <div class="col-lg-12">
						@if (Auth::user()->hasRole(['admins', 'solar-installer']) )	
                        	<p>{!! Form::label('file_support_solar_array[]', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file']) !!} </p>
                        @endif
                        {!! Form::file('file_support_solar_array[]', ['class' => 'no-visibility upload_button_track', 'multiple' => 'multiple']) !!}
                        @if (isset($metas['uploaded_files_structural_drawings_or_plans_28']))
                        @foreach ($metas['uploaded_files_structural_drawings_or_plans_28'] as $key => $root_user_upload)
                        <span class="file_ops">
                            {{ $key }}
                            <a data-href="{{$root_user_upload['filePath']}}" class="dr-file-download" title="View"><i class="fa fa-toggle-up "></i></a>
                            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )	
                            	<a href="#" class='delete_uploaded_file' data-file="delete_file_support_solar_array[]" data-value="{{$key}}" title="Delete"><i class="fa fa-trash-o "></i></a>
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
    
    
    	 <hr />
    
    
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('roof_installed_year', 'When was the roof installed?') !!}
                {!! Form::select('roof_installed_year', $roof_year, (empty($metas['roof_installed_year']) ? '' : $metas['roof_installed_year']), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('roof_work_done_year', 'When was any roof work last done?') !!}
                {!! Form::select('roof_work_done_year', $roof_year, (empty($metas['roof_installed_year']) ? '' : $metas['roof_installed_year']), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
            </div>
        </div>
    </div>


 


    <div class="row">
        <div class="col-lg-4">
            {!! Form::label('roof_warranty', 'Is there a warranty on the roof?') !!}
            @foreach($yes_no as $key => $value)
            <div class="checkbox">

                {!! Form::radio('roof_warranty', $key, (isset($metas['roof_warranty']) && $key == $metas['roof_warranty'] ), ['class' => 'radio-custom','id' => 'roof_warranty_'.$key]) !!} 
                <label class="radio-custom-label" for="roof_warranty_{{$key}}">{{ $value }}</label>
            </div>
            @endforeach
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            {!! Form::label('roof_warranty_years', 'Warranty good to year?') !!}
            {!! Form::select('roof_warranty_years', range(2015,2045), (empty($metas['roof_warranty_years']) ? '' : $metas['roof_warranty_years']), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
	    	  </div>
        </div>
    </div>
    
    <div class="row">
    	<div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('file_roof_warranty[]', 'Roof Warranty (Max upload size 64MB)') !!}
                <div class="row">
                    <div class="col-lg-12">
						@if (Auth::user()->hasRole(['admins', 'solar-installer']) )	
                        	<p>{!! Form::label('file_roof_warranty[]', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file']) !!} </p>
                        @endif
                        {!! Form::file('file_roof_warranty[]', ['class' => 'no-visibility upload_button_track', 'multiple' => 'multiple']) !!}
                        @if (isset($metas['uploaded_files_roof_warranty_29']))
                        @foreach ($metas['uploaded_files_roof_warranty_29'] as $key => $root_user_upload)
                        <span class="file_ops">
                            {{ $key }}
                            <a data-href="{{$root_user_upload['filePath']}}" class="dr-file-download" title="View"><i class="fa fa-toggle-up "></i></a>
                            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )	
                            	<a href="#" class='delete_uploaded_file' data-file="delete_file_support_solar_array[]" data-value="{{$key}}" title="Delete"><i class="fa fa-trash-o "></i></a>
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
    
    <hr/>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('certified_roofing_study_remaining_life_year', 'Certified Roofing study indicates remaining life of roof to be?') !!}

                <div class="col-xs-12 marT-10 marB10 marL-5">
                    <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->certifiedRoofingStudyRemainingLifeYears()) ? 0 : $v) }}</span>/10</span> &nbsp;
                    <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                        data-toggle="tooltip" data-placement="top" data-html="true" 
                        title="WSAR Points Awarded: <br />>= to PPA term worth 10 points <br />< than PPA term worth 0 points" />
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        {!! Form::number('certified_roofing_study_remaining_life_year', (isset($metas['certified_roofing_study_remaining_life_year']) ? $metas['certified_roofing_study_remaining_life_year'] : ''), ['id'=> 'certified-roofing-study', 'class' => 'form-control']) !!}
                    </div>
                    <div class="col-lg-5">
                        {!! Form::checkbox('certified_roofing_study_remaining_life_year', 'not_yet_completed', (isset($metas['certified_roofing_study_remaining_life_year']) && $metas['certified_roofing_study_remaining_life_year'] == 'not_yet_completed'), ['id'=> 'certified-roofing-study-checkbox','class'=>'checkbox-custom']) !!}
                        <label for="certified-roofing-study-checkbox" class='checkbox-custom-label'>
                            Not Yet Completed
                        </label>
                    </div>
                    <div class="col-lg-2">
                        @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                        <p>{!! Form::label('file_certified_roofing_study_remaining_life_year[]', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file ']) !!} </p>
                        @endif
                        {!! Form::file('file_certified_roofing_study_remaining_life_year[]', ['class' => 'no-visibility upload_button_track', 'multiple' => 'multiple']) !!}
                        @if (isset($metas['facility_information_file_certified_roofing_study_remaining_life_year']))
                        @foreach ($metas['facility_information_file_certified_roofing_study_remaining_life_year'] as $key => $file_certified_roofing_study_remaining_life_year)
                        <span class="file_ops">
                            {{ $key }}
                            <a data-href="{{$file_certified_roofing_study_remaining_life_year}}" class="dr-file-download" title="View"><i class="fa fa-toggle-up "></i></a>
                            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                            <a href="#" class='delete_uploaded_file' data-file="delete_file_certified_roofing_study_remaining_life_year[]" data-value="{{$key}}" title="Delete"><i class="fa fa-trash-o "></i></a>
                            @endif
                        </span><br/>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>		      	 
    </div>
    
    
        
	@endif    
    
    
    
    <hr />
     @if( isset($metas['system_location']) && is_array($metas['system_location']) && ( 
   	 in_array(20,  $metas['system_location']) || in_array(30,  $metas['system_location']) || in_array(40,  $metas['system_location']) || in_array(50,  $metas['system_location'])
   	 ) 
    )
    
    
    <div class="row">
        <div class="col-xs-12">
            <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->soilType()) ? 0 : $v) }}</span>/10</span> 
        </div>
        <div class="col-lg-4">
            {!! Form::label('soil_type', 'Soil Type') !!}

            <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true" 
                    title="WSAR Points Awarded: <br />Sandy/Clay worth 4 points <br />Rocky worth 2 points <br />Bedrock worth 1 points <br />Unknown worth 0 points" />
            {!! Form::select('soil_type', $soil_type, (empty($metas['soil_type']) ? '' : $metas['soil_type']), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('hydrology_required', 'Hydrology required?') !!}
            <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true" 
                    title="WSAR Points Awarded: <br />Hydrology not required worth 3  points <br />Hydrology required worth 0 points" />
            @foreach($yes_no as $key => $value)
            <div class="checkbox">
                {!! Form::radio('hydrology_required', $key, (isset($metas['hydrology_required']) && $key == $metas['hydrology_required'] ), ['class' => 'radio-custom','id' => 'hydrology_required_'.$key]) !!}
                <label class="radio-custom-label" for="hydrology_required_{{$key}}">{{ $value }}</label>
                
            </div>
            @endforeach
        </div>
        <div class="col-lg-4">
            {!! Form::label('eir_required', 'EIR required?') !!}
            <img src="{{url('/assets/themes/wisercapital/img/wsar-icon.png')}}" 
                    data-toggle="tooltip" data-placement="top" data-html="true" 
                    title="WSAR Points Awarded: <br />EIR not required worth 3 points <br />EIR required worth 0 points" />
            @foreach($yes_no as $key => $value)
            <div class="checkbox">
                    {!! Form::radio('eir_required', $key, (isset($metas['eir_required']) && $key == $metas['eir_required'] ), ['class' => 'radio-custom','id' => 'eir_required_'.$key]) !!}
                <label class="radio-custom-label" for="eir_required_{{$key}}">{{ $value }}</label>
            </div>
            @endforeach
        </div>
    </div>
	<hr />
	@endif
	
	
     
	@if (Auth::user()->hasRole(['admins', 'solar-installer']) )
    {!! Form::submit('Save & Proceed', array("class" => "btn btn-primary")) !!}
	@endif
    {!! Form::close() !!}
</div>


@section('body_bottom')
@parent


@endsection

