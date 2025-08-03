<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="system_detail_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit System Details</h4>
            </div>
            <form action="/hf/{{$site->id}}/update-meta" method="POST" id="system_detail_form">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="type" value="system_details" />
                    <div class="form-group required">
                        <label for="energy_yield">Energy Yield (kWh/kW/yr AC) *</label>
                        <input class="form-control" name="energy_yield" type="text" 
                               id="energy_yield">
                    </div>
                    <div class="form-group required">
                        <label for="system_size">System Size (kW DC) *</label>
                        <input class="form-control" name="system_size" type="text" 
                               id="system_size">
		   			</div>
                    <div class="form-group required">
                        <label for="epc_cost">EPC Cost *</label>
                        <input class="form-control priceFormatter" 
                               id="epc_cost" type="text" name="epc_cost">
		   			</div>
                
		   		   <div class="form-group row">
		                <div class="col-md-12">
			                {!! Form::label('force_epc_cost', 'Use Fixed EPC Cost') !!}
			                <p class="mute">By setting a fixed EPC Cost, our algorithm will calculate the lowest PPA rate for that EPC Cost.</p>
		                    {!! Form::select('force_epc_cost', \app\support\Dropdown::$yes_no, (isset($metas['force_epc_cost']) ? $metas['force_epc_cost'] : false), array('placeholder' => '[Select]', 'class' => 'form-control ')) !!}
		                </div>
		            </div>
                
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        {{ trans('general.button.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">
                        {{ trans('general.button.update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>