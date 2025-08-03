<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="ppa_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit {{ $site->isFIT() ? "FIT" : "PPA"}} Terms</h4>
            </div>
            <form action="/hf/{{$site->id}}/update-meta" method="POST" id='ppa_form'>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="type" value="ppa" />
                    
                    
                    <div class="form-group">
		                    {!! Form::label("ppa_rate", 'Fixed '. ( $site->isFIT() ? "FIT" : "PPA"). ' Rate ($/kWh)') !!}
		                     <input class="form-control priceFormatter" type="text" name="fixed_ppa_rate" id="fixed-ppa-rate" {{  Auth::user()->hasRole('admins') ? '' : 'readonly' }}>
		            </div>
		            
		           
		      
		            
                    <div class="form-group required">
                        <label for="energy_yield">{{$site->isFIT() ? "FIT" : "PPA"}} Escalation Rate (%)</label>
                        <input class="form-control" name="fixed_ppa_esc" type="number" id="fixed-ppa-esc">
                    </div>
				
                    <div class="form-group required">
                        <label>Term (Years)</label>
                        <input class="form-control" type="number" min="15" max="30" id="fixed-ppa-term" name="fixed_ppa_term" {{  Auth::user()->hasRole('admins') ? '' : 'readonly' }}>
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
