
<div class="form-group">
    {!! Form::label('cell_type', 'Cell type: *') !!}
    {!! Form::text('cell_type', $asset->getMeta('cell_type'), array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('power_wattage', 'Power Wattage: *') !!}
    {!! Form::input('number','power_wattage', $asset->getMeta('power_wattage'), array('class' => 'form-control')) !!}
</div>
<fieldset>
    <legend>Warranty</legend>
    <div class="form-group">
        {!! Form::label('power_output_warranty', 'Power Output Warranty: *') !!}
        {!! Form::select('power_output_warranty', ['Standard'=>'Standard', 'Linear' => 'Linear'], $asset->getMeta('power_output_warranty'), ['placeholder' => '[Select]', 'id' => 'warranty-dropdown', 'class' => 'form-control']) !!}
    </div>
    <fieldset>
        <legend>Phase 1</legend>
        <div class="form-group">
            {!! Form::label('warranty_phase_1_years', 'Years: *') !!}
            {!! Form::input('number', 'warranty_phase_1_years', $asset->getMeta('warranty_phase_1_years'), array('class' => 'form-control', "step" => "0.01")) !!}
        </div>
        <div class="form-group">
            {!! Form::label('warranty_phase_1_percent', 'Percent: *') !!}
            {!! Form::input('number', 'warranty_phase_1_percent', $asset->getMeta('warranty_phase_1_percent'), array('class' => 'form-control', "step" => "0.01")) !!}
        </div>
    </fieldset>
    <fieldset>
        <legend>Phase 2</legend>
        <div class="form-group standard-warranty">
            {!! Form::label('warranty_phase_2_years', 'Years: *') !!}
            {!! Form::input('number', 'warranty_phase_2_years', $asset->getMeta('warranty_phase_2_years'), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group standard-warranty">
            {!! Form::label('warranty_phase_2_percent', 'Percent: *') !!}
            {!! Form::input('number', 'warranty_phase_2_percent', $asset->getMeta('warranty_phase_2_percent'), array('class' => 'form-control')) !!}
        </div>
        
       
        
 </fieldset>
	</fieldset>
	
	<fieldset>
        <legend>Additional Data</legend>
        
        
	<div class="form-group">
	    {!! Form::label('length', 'Length (in.): *') !!}
	    {!! Form::input('number','length', $asset->getMeta('length'), array('class' => 'form-control', "step" => "0.01")) !!}
	</div>
	<div class="form-group">
	    {!! Form::label('width', 'Width (in.): *') !!}
	    {!! Form::input('number', 'width', $asset->getMeta('width'), array('class' => 'form-control', "step" => "0.01")) !!}
	</div>
	<div class="form-group">
	    {!! Form::label('depth', 'Depth (in.): *') !!}
	    {!! Form::input('number', 'depth', $asset->getMeta('depth'), array('class' => 'form-control', "step" => "0.01")) !!}
	</div>
	<div class="form-group">
	    {!! Form::label('weight', 'Weight (lbs): *') !!}
	    {!! Form::input('number', 'weight', $asset->getMeta('weight'), array('class' => 'form-control', "step" => "0.01")) !!}
	</div>
	
 </fieldset>
	</fieldset>

@section('body_bottom')
    <script type="application/javascript">
        
        $(document).ready(function() {
            
           
           
            
        });
    </script>
@endsection


