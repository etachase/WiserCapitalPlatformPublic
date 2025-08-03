

<div class="row">
    <div class="col-lg-4">
    
        <div class="form-group">
            {!! Form::label('investor_meta[business_name]', 'Business Name') !!}
            {!! Form::text('investor_meta[business_name]', (!empty($investor_meta['business_name']) ? $investor_meta['v'] : ''), array('class' => 'form-control')) !!}
        </div>
    </div>
</div>       
<div class="row">
    <div class="col-lg-4">
        <p class="text-muted">Address </p>
        <div class="form-group">
            {!! Form::label('investor_meta[street]', 'Street') !!}
            {!! Form::text('investor_meta[street]', (!empty($investor_meta['street']) ? $investor_meta['street'] : ''), array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <p class="text-muted">&nbsp; </p>
        <div class="form-group">
            {!! Form::label('investor_meta[city]', 'City') !!}
            {!! Form::text('investor_meta[city]', (!empty($investor_meta['city']) ? $investor_meta['city'] : ''), array('class' => 'form-control')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('investor_meta[state]', 'State') !!}
            {!! Form::select('investor_meta[state]', $states, (!empty($investor_meta['state']) ? $investor_meta['state'] : ''), array('class' => 'form-control', "rows" => 5, 'placeholder'=>'-Select State-')) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('investor_meta[zip_code]', 'Zip Code') !!}
            {!! Form::number('investor_meta[zip_code]', (!empty($investor_meta['zip_code']) ? $investor_meta['zip_code'] : ''), array('class' => 'form-control')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('investor_meta[phone]', 'Phone') !!}
            {!! Form::text('investor_meta[phone]', (!empty($investor_meta['phone']) ? $investor_meta['phone'] : ''), array('class' => 'form-control', "rows" => 5)) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('investor_meta[contact_method]', 'Preferred Contact Method') !!}<br/>
            {!! Form::radio('investor_meta[contact_method]', 'Phone', isset($investor_meta['contact_method']) && 'Phone' == $investor_meta['contact_method']) !!} Phone
            {!! Form::radio('investor_meta[contact_method]', 'Email', isset($investor_meta['contact_method']) && 'Email' == $investor_meta['contact_method']) !!} Email
        </div>
    </div>

</div>



<hr />

<!-- 


<div class="row">
    <div class="col-lg-8">
        <p class="text-muted">Individual/Corporate Information {!! Html::image('assets/themes/wisercapital/img/wsar-icon.png', 'WSAR Score') !!}</p>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
	               
		                
	                    {!! Form::label('investor_meta[participant_type]', 'Participant Type') !!}<br/>
	                    {!! Form::radio('investor_meta[participant_type]', 'Individual', isset($investor_meta['participant_type']) && 'Individual' == $investor_meta['participant_type']
	                        ,['onclick' => 'return showdiv(this.value)']) !!} Individual: Accredited investor
	                    {!! Form::radio('investor_meta[participant_type]', 'LLC',  isset($investor_meta['participant_type']) && 'LLC' == $investor_meta['participant_type']
	                        ,['onclick' => 'return showdiv(this.value)']) !!} LLC / S-Corp
	                    {!! Form::radio('investor_meta[participant_type]', 'C-Corp', isset($investor_meta['participant_type']) && 'C-Corp' == $investor_meta['participant_type']
	                        ,['onclick' => 'return showdiv(this.value)']) !!} C-Corp
	                    {!! Form::radio('investor_meta[participant_type]', 'Trust', isset($investor_meta['participant_type']) && 'Trust' == $investor_meta['participant_type']
	                        ,['onclick' => 'return showdiv(this.value)']) !!} Trust
	                    {!! Form::radio('investor_meta[participant_type]', 'Chartered', isset($investor_meta['participant_type']) && 'Chartered' == $investor_meta['participant_type']
	                        ,['onclick' => 'return showdiv(this.value)']) !!} Chartered / Regulated Institution
	              
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="individual" style="display: none;">
    <div class="col-lg-12">
        <div class="form-group">
            {!! Form::label('investor_meta[indicate_qualification]', 'Please Indicate Your Qualification') !!}<br/>
            {!! Form::radio('investor_meta[indicate_qualification]', 'net_work_over_1000k', isset($investor_meta['indicate_qualification']) && 'net_work_over_1000k' == $investor_meta['indicate_qualification']
            ) !!} Net worth over $1,000,000 (excluding value of your primary residence)<br/>
            {!! Form::radio('investor_meta[indicate_qualification]', 'income_200k', isset($investor_meta['indicate_qualification']) && 'income_200k' == $investor_meta['indicate_qualification']
            ) !!} Income of at least $200,000 in each of the two most recent years (or $300,000 together with a spouse) and a reasonable expectation of reaching the same income level in the current year<br/>
            {!! Form::radio('investor_meta[indicate_qualification]', 'attorney_confirm', isset($investor_meta['indicate_qualification']) && 'attorney_confirm' == $investor_meta['indicate_qualification']
            ) !!} I prefer that my CPA or Attorney be contacted for written confirmation

        </div>
    </div>
</div>
<div class="row" id="llc" style="display: none;">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('investor_meta[llc_company_name]', 'Company Name') !!}
            {!! Form::text('investor_meta[llc_company_name]', (!empty($investor_meta['llc_company_name']) ? $investor_meta['llc_company_name'] : ''), array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('investor_meta[llc_your_position]', 'Your Position') !!}
            {!! Form::text('investor_meta[llc_your_position]', (!empty($investor_meta['llc_your_position']) ? $investor_meta['llc_your_position'] : ''), array('class' => 'form-control')) !!}
        </div>
    </div>
</div>
<div class="row" id="c-corp" style="display: none;">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('investor_meta[ccorp_company_name]', 'Company Name') !!}
            {!! Form::text('investor_meta[ccorp_company_name]', (!empty($investor_meta['ccorp_company_name']) ? $investor_meta['ccorp_company_name'] : ''), array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('investor_meta[ccorp_your_position]', 'Your Position') !!}
            {!! Form::text('investor_meta[ccorp_your_position]', (!empty($investor_meta['ccorp_your_position']) ? $investor_meta['ccorp_your_position'] : ''), array('class' => 'form-control')) !!}
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-8">

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('investor_meta[participate_interest]', 'Participation Interest') !!}<br/>
                    {!! Form::checkbox('investor_meta[participate_interest][]','passive', isset($investor_meta['participate_interest']) && in_array('passive',$investor_meta['participate_interest'])) !!} Individual* or corporate tax-equity investor (*with passive income)<br/>
                    {!! Form::checkbox('investor_meta[participate_interest][]','risk', isset($investor_meta['participate_interest']) && in_array('risk',$investor_meta['participate_interest'])) !!} Preferred "at Risk" Investor<br/>
                    {!! Form::checkbox('investor_meta[participate_interest][]','debt', isset($investor_meta['participate_interest']) && in_array('debt',$investor_meta['participate_interest'])) !!} Debt instrument<br/>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <p class="text-muted">Additional Information  {!! Html::image('assets/themes/wisercapital/img/wsar-icon.png', 'WSAR Score') !!}</p>
                    <label for="investor_meta[commercial_real_estate]">Do you own Commercial Real Estate?</label>
                    <div class="checkbox">
                        <label>
                            {!! Form::radio('investor_meta[commercial_real_estate]', 'yes', isset($investor_meta['commercial_real_estate']) && 'yes' == $investor_meta['commercial_real_estate']) !!} Yes
                            {!! Form::radio('investor_meta[commercial_real_estate]', 'no', isset($investor_meta['commercial_real_estate']) && 'no' == $investor_meta['commercial_real_estate']) !!} No
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->

{!! Form::hidden('type',$user_role_name, array("class" => "btn btn-default")) !!}

@section('body_bottom')
<script type="application/javascript">
    function showdiv(value) {
        //alert(obj);
        if(value == "Individual"){
            $('#individual').show();
            $('#llc').hide();
            $('#c-corp').hide();
        }else if(value == "LLC"){
            $('#individual').hide();
            $('#llc').show();
            $('#c-corp').hide();
        }else if(value == "C-Corp"){
            $('#individual').hide();
            $('#llc').hide();
            $('#c-corp').show();
        }else {
           // something else
            $('#individual').hide();
            $('#llc').hide();
            $('#c-corp').hide();
        }
    }
    $(document).ready(function() {
        @if (isset($investor_meta['participant_type']))
            showdiv('{{$investor_meta['participant_type']}}'); 
        @endif
    });
</script>
@endsection