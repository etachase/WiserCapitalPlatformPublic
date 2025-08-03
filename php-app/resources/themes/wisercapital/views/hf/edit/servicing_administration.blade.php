<div class="tab-heading"  id="servicing-administration-heading">   
    <h2 class="panel-title">
        <img src="{{url('/assets/themes/wisercapital/img/wsar.png')}}" /> Servicing and Administration
        <div class="title-meta"><span>{{ $WSAR->servicingAdministration() }}</span>/50</div>
    </h2>
</div>
<div id="servicing-administration" aria-labelledby="servicing-administration-heading">

    {!! Form::open(array('route' => array('hf.update', $site->id), 'method' => 'put')) !!}



    <ul class="checklist">
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->OM()) ? 0 : $v) }}</span>/15</span>
            
            O&M
        </li>
    </ul>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('o&m_experience', 'Does O&M provider have adequate experience maintaining and servicing solar arrays?') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('o&m_experience', $yes_no, (isset($metas['o&m_experience']) ? $metas['o&m_experience'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>
    </div>
    <hr>

    <ul class="checklist">
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->servicingRisk()) ? 0 : $v) }}</span>/15</span>
            
            Servicing Risk
        </li>
    </ul>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('servicing_risk', 'The servicer, cash manager, accounting reporter & contract manager are experienced.') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('servicing_risk', $yes_no, (isset($metas['servicing_risk']) ? $metas['servicing_risk'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>
    </div>
    <hr>

    <ul class="checklist">
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->sequesteredAccount()) ? 0 : $v) }}</span>/10</span>
            
            Sequestered Account
        </li>
    </ul>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('sequestered_account', 'Is there a lock box account established for payment processing and administration of payments to investors?') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('sequestered_account', $yes_no, (isset($metas['sequestered_account']) ? $metas['sequestered_account'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>
    </div>
    <hr>

    <ul class="checklist">
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->businessInteruptionInsurance()) ? 0 : $v) }}</span>/10</span>
            
            Business Interruption Insurance
        </li>
    </ul>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {!! Form::label('business_interruption_insurance', 'Has Business interruption insurance been secured on behalf of the project investors?') !!}
                <div class="row">
                    <div class="col-lg-6">
                        {!! Form::select('business_interruption_insurance', $yes_no, (isset($metas['business_interruption_insurance']) ? $metas['business_interruption_insurance'] : false), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                    </div>				  			
                </div>
            </div>
        </div>
    </div>
    <hr>
	
	@if (Auth::user()->hasRole(['admins', 'solar-installer']) )
		{!! Form::submit('Save & Proceed', array("class" => "btn btn-primary")) !!}
    @endif
	{!! Form::close() !!}
</div>
