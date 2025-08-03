<div class="modal fade" tabindex="-1" role="dialog" 
     aria-labelledby="mySmallModalLabel" id="electricity_price_assumption_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Electricity Price Assumptions</h4>
            </div>
            <form action="/hf/{{$site->id}}/update-meta" method="POST" id='electricity_price_assumption_form'>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="type" value="electricity_price_assumptions" />
                    <div class="form-group required">
						<label for="current_electric_pricing">Avoided Electric Cost ($/kWh Rate)</label>
                        <a href="#">
                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Enter the electricity cost/kWh excluding fixed fees and demand charges that solar will not offset"></i>
                        </a>
                        <input class="form-control priceFormatter" type="text" name="current_electric_pricing" id="current_electric_pricing">
                    </div>
                    <div class="form-group required">
                        <label>Current Utility Escalation Rate</label>
                        <input class="form-control" type="text" value="3" readonly="">
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