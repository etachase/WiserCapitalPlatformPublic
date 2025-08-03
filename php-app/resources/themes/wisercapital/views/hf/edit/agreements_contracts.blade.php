    <div class="tab-heading"  id="agreements-contracts-heading">   
        <h2 class="panel-title">
           Agreements & Contracts
        </h2>
    </div>
    <div id="agreements-contracts"  aria-labelledby="agreements-contracts-heading">

        {!! Form::open(array('route' => array('hf.update', $site->id), 'method' => 'put')) !!}


        
        <div class="row">
            <div class="col-lg-6">
		        <div class="form-group">
		            {!! Form::label('agreement_type', 'Agreement Type') !!}
		            {!! Form::select('agreement_type', $agreement_types, (empty($metas['agreement_type']) ? '' : $metas['agreement_type']), array('placeholder' => '[Select]', 'id' => 'agreement-type', 'class' => 'form-control')) !!}
		        </div>
            </div>
            <div class="col-lg-6">
		        <div class="form-group">
		            {!! Form::label('irr', 'Internal Rate Revenue (%)') !!}
		            {!! Form::select('irr', range(0,25), (empty($metas['irr']) ? '' : $metas['irr']), array('placeholder' => '[Select]', 'id' => 'irr', 'class' => 'form-control')) !!}
		        </div>
            </div>
		</div>
        
        
        <hr />
        
        <div class="row">
            <div class="col-lg-6">
		        <div class="form-group">
		            {!! Form::label('spe_name', 'SPE Name') !!}
					{!! Form::text('spe_name', (!empty($metas['spe_name']) ? $metas['spe_name'] : ''), array('class' => 'form-control')) !!}
		        </div>
            </div>
            <div class="col-lg-6">
		        <div class="form-group">
		            {!! Form::label('spe_state', 'SPE State') !!}
					{!! Form::text('spe_state', (!empty($metas['spe_state']) ? $metas['spe_state'] : ''), array('class' => 'form-control')) !!}
		        </div>
            </div>
		</div>
        
        
        <hr />
       
       
        <div class="row">
            <div class="col-lg-6">
		        <div class="form-group">
		            {!! Form::label('notice_to_proceed_date', 'Notice to Proceed (Date)') !!}
					{!! Form::date('notice_to_proceed_date', (!empty($metas['notice_to_proceed_date']) ? $metas['notice_to_proceed_date'] : ''), array('class' => 'form-control')) !!}
		        </div>
            </div>
            <div class="col-lg-6">
		        <div class="form-group">
		            {!! Form::label('commercial_operation_date', 'Commercial Operation (Date)') !!}
					{!! Form::date('commercial_operation_date', (!empty($metas['commercial_operation_date']) ? $metas['commercial_operation_date'] : ''), array('class' => 'form-control')) !!}
		        </div>
            </div>
		</div>
		
		<hr> 
        
        {!! Form::submit('Save & Proceed', array("class" => "btn btn-primary")) !!}
        {!! Form::close() !!}
    </div>
