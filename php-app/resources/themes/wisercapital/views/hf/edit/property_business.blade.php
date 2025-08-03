<div class="tab-heading" role="tab" id="property-business-heading">
    <h2 class="panel-title">Property / Business</h2>
</div>
<div id="property-business">

    {!! Form::open(array('route' => array('hf.update', $site->id), 'method' => 'put', "id" => "property_business_form")) !!}

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('parcel_number', 'Parcel Number') !!}
                {!! Form::text('parcel_number', (!empty($metas['parcel_number']) ? $metas['parcel_number'] : ''), array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                
                <label for="legal_description">
                	Legal Description of Property
                	<a href="#">
		                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Enter the legal description from either (i) as shown on vesting deed, or (ii) as provided in Title Policy.">
		                </i>
		            </a>
                </label>
                
                
                
                {!! Form::textarea('legal_description', (!empty($metas['legal_description']) ? $metas['legal_description'] : ''), array('class' => 'form-control', 'rows' => 3)) !!}
            </div>
        </div>
    </div>


	 <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('host_facility_company_name', 'Host Facility Company Name') !!}
                {!! Form::text('host_facility_company_name', (!empty($metas['host_facility_company_name']) ? $metas['host_facility_company_name'] : ''), array('class' => 'form-control')) !!}
            </div>
        </div>
	   <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('host_facility_entity_type', 'Host Facility Entity Type') !!}
                {!! Form::text('host_facility_entity_type', (!empty($metas['host_facility_entity_type']) ? $metas['host_facility_entity_type'] : ''), array('placeholder' => 'Partnership, LLC, etc', 'class' => 'form-control')) !!}
            </div>
        </div>
	 
	 </div>
	 
	 
	 
	
	
    <hr />
    <div class="row">
        <div class="col-md-6">
            <h4>Host Facility Primary Contact</h4>
        </div>
        <div class="col-md-6">
            <h4>Host Facility Secondary Contact</h4>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('host_facility_primary_contact_name', 'Full Name') !!}
                {!! Form::text('host_facility_primary_contact_name', (!empty($metas['host_facility_primary_contact_name']) ? $metas['host_facility_primary_contact_name'] : ''), array('class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('host_facility_primary_contact_title', 'Title') !!}
                {!! Form::text('host_facility_primary_contact_title', (!empty($metas['host_facility_primary_contact_title']) ? $metas['host_facility_primary_contact_title'] : ''), array('class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('host_facility_primary_contact_email', 'Email') !!}
                {!! Form::text('host_facility_primary_contact_email', (!empty($metas['host_facility_primary_contact_email']) ? $metas['host_facility_primary_contact_email'] : ''), array('class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('host_facility_primary_contact_phone', 'Phone') !!}
                {!! Form::text('host_facility_primary_contact_phone', (!empty($metas['host_facility_primary_contact_phone']) ? $metas['host_facility_primary_contact_phone'] : ''), array('class' => 'form-control phoneNumberFormatter')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('host_facility_primary_contact_fax', 'Fax') !!}
                {!! Form::text('host_facility_primary_contact_fax', (!empty($metas['host_facility_primary_contact_fax']) ? $metas['host_facility_primary_contact_fax'] : ''), array('class' => 'form-control phoneNumberFormatter')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('host_facility_primary_contact_address', 'Address') !!}
                {!! Form::textarea('host_facility_primary_contact_address', (!empty($metas['host_facility_primary_contact_address']) ? $metas['host_facility_primary_contact_address'] : ''), array('class' => 'form-control', "rows" => 3)) !!}
            </div>

            <div class="form-group">
                <p class="text-muted">Tenants</p>
                {!! Form::label('tenants', 'Do you have tenants?') !!}
                @foreach($yes_no as $key => $value)
                <div class="checkbox">
                    
                        {!! Form::radio('tenants', $key, (isset($metas['tenants']) && $key == $metas['tenants'] ), ['class' => 'radio-custom','id' => 'tenant_'.$key]) !!}
                    <label class="radio-custom-label" for="tenant_{{$key}}">{{ $value }}</label>
                </div>
                @endforeach
            </div>
            <div id="tenant_group" class="{{(isset($metas['tenants']) && ($metas['tenants'] == 1)) ? '' : 'hide'}}">
                <div class="form-group">
                    {!! Form::label('tenants', 'How many tenants?') !!}
                    {!! Form::text('no_of_tenants', (isset($metas['no_of_tenants']) ? $metas['no_of_tenants'] : ''), ['class' => 'form-control']) !!}
                    
                </div>
                <div class="form-group">
                    {!! Form::label('tenant_meter_on_your_name', 'If you have tenants, is the meter in your name?') !!}
                    @foreach($yes_no as $key => $value)
                    <div class="checkbox">

                            {!! Form::radio('tenant_meter_on_your_name', $key, (isset($metas['tenant_meter_on_your_name']) && $key == $metas['tenant_meter_on_your_name'] ), ['class' => 'radio-custom','id' => 'tenant_meter_on_your_name_'.$key]) !!}
                        <label class="radio-custom-label" for="tenant_meter_on_your_name_{{$key}}">{{ $value }}</label>
                    </div>
                    @endforeach
                </div>
                <div class="form-group">
                    {!! Form::label('tenant_multiple_meter', 'If you have tenants, are there multiple meters?') !!}
                    @foreach($yes_no as $key => $value)
                    <div class="checkbox">

                            {!! Form::radio('tenant_multiple_meter', $key, (isset($metas['tenant_multiple_meter']) && $key == $metas['tenant_multiple_meter'] ), ['class' => 'radio-custom','id' => 'tenant_multiple_meter_'.$key]) !!}
                        <label class="radio-custom-label" for="tenant_multiple_meter_{{$key}}">{{ $value }}</label>
                    </div>
                    @endforeach
                </div>
            </div>					
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('host_facility_secondary_contact_name', 'Full Name') !!}
                {!! Form::text('host_facility_secondary_contact_name', (!empty($metas['host_facility_secondary_contact_name']) ? $metas['host_facility_secondary_contact_name'] : ''), array('class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('host_facility_secondary_contact_title', 'Title') !!}
                {!! Form::text('host_facility_secondary_contact_title', (!empty($metas['host_facility_secondary_contact_title']) ? $metas['host_facility_secondary_contact_title'] : ''), array('class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('host_facility_secondary_contact_email', 'Email') !!}
                {!! Form::text('host_facility_secondary_contact_email', (!empty($metas['host_facility_secondary_contact_email']) ? $metas['host_facility_secondary_contact_email'] : ''), array('class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('host_facility_secondary_contact_phone', 'Phone') !!}
                {!! Form::text('host_facility_secondary_contact_phone', (!empty($metas['host_facility_secondary_contact_phone']) ? $metas['host_facility_secondary_contact_phone'] : ''), array('class' => 'form-control phoneNumberFormatter')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('host_facility_secondary_contact_fax', 'Fax') !!}
                {!! Form::text('host_facility_secondary_contact_fax', (!empty($metas['host_facility_secondary_contact_fax']) ? $metas['host_facility_secondary_contact_fax'] : ''), array('class' => 'form-control phoneNumberFormatter')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('host_facility_secondary_contact_address', 'Address') !!}
                {!! Form::textarea('host_facility_secondary_contact_address', (!empty($metas['host_facility_secondary_contact_address']) ? $metas['host_facility_secondary_contact_address'] : ''), array('class' => 'form-control', "rows" => 3)) !!}
            </div>
        </div>
    </div>
    <hr>
    @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
    {!! Form::submit('Save & Proceed', array("class" => "btn btn-primary")) !!}
    @endif
    {!! Form::close() !!}
    
</div>




<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
@parent
<script>
    $(document).ready(function () {
        $('body').on('click', '#property_business_submit_button', function () {
            $('.phoneNumberFormatter').unmask();
            $('#property_business_form').submit();
        });
        
        $('input[name=tenants]').on('change', function () {
            console.log($(this).val() == 1);
            if ($(this).val() == 1) {
                $('#tenant_group').removeClass('hide');
            } else {
                $('#tenant_group').addClass('hide');
            }
        })
    });

</script>
@endsection
