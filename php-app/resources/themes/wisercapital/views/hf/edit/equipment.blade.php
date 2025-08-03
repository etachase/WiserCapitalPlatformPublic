<div class="tab-heading" role="tab" >
    <h2 class="panel-title">Equipment</h2>
</div>
    <div id="equipment" >

			{!! Form::open(array('route' => array('hf.update', $site->id), 'method' => 'put')) !!}
                
            <div class="row">
                <div class="col-lg-4">
                    <p class="text-muted">Module</p>
                    <a id="asset_module_{{\App\Support\HFHelper::ASSET_MODULE}}" data-asset="{{\App\Support\HFHelper::ASSET_MODULE}}" class="pointer">
                        {{trans('hf/general.asset.add.link-text', ['asset' => \App\Support\HFHelper::ASSET_MODULE])}}</a>
                           
                    <div class="form-group">
                       {!! Form::label('module_type', 'Type') !!}
                       <div class="row">
                           <div class="col-lg-12">
                               {!! Form::select('module_type', $modules, (empty($metas['module_type']) ? '' : $metas['module_type']), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                           </div>				  			
                       </div>
                   </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                     <div class="form-group">
                       {!! Form::label('module_quantity', 'Quantity') !!}
                       <div class="row">
                           <div class="col-lg-12">
                               {!! Form::number('module_quantity', (empty($metas['module_quantity']) ? '' : $metas['module_quantity']), array('placeholder' => 'Please enter quantity of panel', 'class' => 'form-control col-xs-12', 'min' => 1, 'max' => 10000)) !!}
                           </div>				  			
                       </div>
                   </div>
                </div>
            </div>
            
            <hr /> 
            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
            <div class="row inverter_section">
                    <div class="col-lg-12">
                        <p class="text-muted">Inverter <button type="button" id="toggle-secondary-contact" class="btn btn-primary btn-xs pull-right add_inverter"> Add additional Inverter</button></p>
                      <a id="asset_module_{{\App\Support\HFHelper::ASSET_INVERTER}}" data-asset="{{\App\Support\HFHelper::ASSET_INVERTER}}" class="pointer">
                                        {{trans('hf/general.asset.add.link-text', ['asset' => \App\Support\HFHelper::ASSET_INVERTER])}}</a>
                    </div>
            </div>
            @endif
             <hr /> 
            
             
            
             <div class="row">
                <div class="col-lg-4">
                    <p class="text-muted">Other Major Equipment</p>
                    <div class="form-group">
                       {!! Form::label('racking_type', 'Racking') !!}
                       <div class="row">
                           <div class="col-lg-12">
                             {!! Form::select('racking_type', $racking, (empty($metas['racking_type']) ? '' : $metas['racking_type']), array('placeholder' => '[Select]', 'class' => 'form-control')) !!}
                           </div>				  			
                       </div>
                   </div>
                </div>
                <div class="col-lg-4">
                    <p class="text-muted"> &nbsp;</p>
                    <div class="form-group">
                       {!! Form::label('tracking', 'Tracking') !!}
                       <div class="row">
                           <div class="col-lg-12">
                               {!! Form::select('tracking', $tracking, (empty($metas['tracking']) ? '' : $metas['tracking']), array('placeholder' => '[Select]', 'class' => 'col-lg-8 form-control margin-bottom', 'onchange' => 'selected_tracking_system(this)')) !!}
                               {!! Form::text('tracking_manufacturer_input', (!empty($metas['tracking_manufacturer_input']) ? $metas['tracking_manufacturer_input'] : ''), ['class' => 'hide col-lg-12 form-control margin-bottom', 'id' => 'tracking_manufacturer_input', 'placeholder' => 'Tracking Manufacturer'])!!}
                           </div>				  			
                       </div>
                   </div>
                </div>
                <div class="col-lg-4">
                    <p class="text-muted"> &nbsp;</p>
                    <div class="form-group">
                        <label>Monitoring System</label>
                        {!! Form::select('monitoring_system', $monitoring_system, (!empty($metas['monitoring_system']) ? $metas['monitoring_system'] : ''), ['placeholder' => '[Select]','class' => ' col-lg-8 form-control margin-bottom', 'onchange' => 'selected_monitoring_system(this)']) !!}
                        {!! Form::text('monitoring_system_input', (!empty($metas['monitoring_system_input']) ? $metas['monitoring_system_input'] : ''), ['class' => 'hide col-lg-8 form-control margin-bottom', 'id' => 'monitoring_system_input']) !!}
                    </div>
                </div>	
            </div>
            <hr>
            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
            {!! Form::submit('Save & Proceed', array("class" => "btn btn-primary")) !!}
			@endif
			{!! Form::close() !!}
			
    	</div>
 
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="asset_module">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">{{trans('hf/general.asset.add.title')}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="module-content" class="col-xs-12 margin-top-10"></div>
                    <div class="col-xs-12 margin-top-10">
                        <form method="POST" action="{{route('hf.asset-mail', 
                                ['id' => $site->id])}}" id="asset_model_form">
                            {{csrf_field()}}
                            <input type="hidden" name="project_active_tab">
                            <input type="hidden" name="asset">
                            <div class="form-group">
                                <div class="row margin-top-10">
                                    <div class="col-md-4 col-sm-12">
                                        <label>{{trans('hf/general.asset.fields.manufacturer_name')}}</label>
                                    </div>
                                    <div class="col-md-8 col-sm-12">   
                                        <input type="text" class="form-control" name="manufacturer_name" required="" minlength="2">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row margin-top-10">
                                    <div class="col-md-4 col-sm-12">
                                        <label>{{trans('hf/general.asset.fields.model_name')}}</label>
                                    </div>
                                    <div class="col-md-8 col-sm-12">   
                                        <input type="text" class="form-control" name="model_name" required="" minlength="2">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 pad-v-10">
                                    <div class="col-xs-12">
                                        <div class="row pull-right">
                                            <button class="btn btn-sm btn-primary" type="submit" 
                                                id="asset_model_button">{{trans('hf/general.asset.add.button')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
@section('body_bottom')
@parent
<script>
    var inverterCount, inverterKey = 0
    
    //create the inverter section
    function initInverters(data) {
        inverterCount = inverterKey = data.length
        for (var i in data) {
          data[i]['key'] = i;
          data[i]['currentInvCount'] = i;
          $('.inverter_section').last().after(tmpl('tmpl-inverter', data[i]))  
          $('#si_type_' + i).val(data[i]['type']);
          $('#si_qty_' + i).val(data[i]['quantity']);
        }
    }
    var selected_monitoring_system = function (element) {
        element ? $('#monitoring_system_input').val('') : '';
        value = element ? $(element).val() : "{{(!empty($metas['monitoring_system']) 
                    ? $metas['monitoring_system'] : '')}}";
        if (value == {{\App\Support\Dropdown::MONITORING_SYSTEM_OTHER}}) {
            $('#monitoring_system_input').removeClass('hide');
        } else if (!$('#monitoring_system_input').hasClass('hide')) {
            $('#monitoring_system_input').addClass('hide')
        }
    }
    
    
   
    
    var selected_tracking_system = function (element) {
        value = element ? $(element).val() : "{{(!empty($metas['tracking']) 
                    ? $metas['tracking'] : '')}}";
        if (value && (value != {{\App\Support\Dropdown::TRACKING_NONE}})) {
            $('#tracking_manufacturer_input').removeClass('hide');
        } else if (!$('#tracking_manufacturer_input').hasClass('hide')) {
            $('#tracking_manufacturer_input').val('');
            $('#tracking_manufacturer_input').addClass('hide');
        }
    }
    
    $(document).ready(function() {
        //check if there are inverters else send blank
        initInverters({!! json_encode(!empty($metas['inverter']) ? $metas['inverter'] : [["type"=>"", "quantity"=>""]] ) !!});
        
        //delete a inverter section
        $('#equipment').on('click', '.delete_inverter', function() {
            $(this).parents('.inverter_type').next('.inverter_section').remove();
            $(this).parents('.inverter_type').remove();
            inverterCount = $('.inverter_type').length;
        })
        
        //add another section
         $('#equipment').on('click', '.add_inverter', function() {
            $('.inverter_section').last().after(tmpl('tmpl-inverter', {type:'', quantity:'',currentInvCount: inverterCount, key: inverterKey}));
            inverterKey++;
            inverterCount = $('.inverter_type').length;
        })
        selected_monitoring_system();
   
        selected_tracking_system();
        
        $('[id^=asset_module_]').on('click', function () {
            var asset = $(this).data('asset');
            if (asset == '{{\App\Support\HFHelper::ASSET_MODULE}}') {
                $('#module-content').html('{{trans("hf/general.asset.add.body", ["asset" => \App\Support\HFHelper::ASSET_MODULE])}}');
            } else {
                $('#module-content').html('{{trans("hf/general.asset.add.body", ["asset" => \App\Support\HFHelper::ASSET_INVERTER])}}');
            }
            $('input[name=asset]').val(asset);
            console.log($('.tab-content').find('.active').attr('id'));
            $('input[name=project_active_tab]').val($('.tab-content').find('.active').attr('id'));
            $('#asset_module').modal('show');
        });
    })
</script>

<script src="{{asset('/js/template.js')}}" type="text/javascript"> </script>
<script type="text/x-tmpl" id="tmpl-inverter">
    
        <div class="row inverter_type">
            <div class="col-lg-12">
                <div class="form-group">
                   {!! Form::label('inverter[{%=o.key%}][type]', 'Type') !!} 
           
                   {% if (o.currentInvCount >= 1) { %} 
                        <button type="button" id="toggle-secondary-contact" class="btn btn-danger btn-xs pull-right delete_inverter"> Delete Inverter</button>
                    {% } %}
                   <div class="row">
                       <div class="col-lg-4">
                           {!! Form::select('inverter[{%=o.key%}][type]', $inverters, null, array('placeholder' => '[Select]', 'class' => 'form-control', 'id'=>'si_type_{%=o.key%}')) !!}
                       </div>				  			
                   </div>
               </div>
            </div>
        </div>
        <div class="row inverter_section">
            <div class="col-lg-4">
                 <div class="form-group">
                   {!! Form::label('inverter[{%=o.key%}][quantity]', 'Quantity') !!}
                   <div class="row">
                       <div class="col-lg-12">
                           {!! Form::number('inverter[{%=o.key%}][quantity]', null, array('placeholder' => 'Please enter the quantity of inverter', 'class' => 'form-control', 'id'=>'si_qty_{%=o.key%}', 'min' => 1, 'max' => 10000)) !!}
                       </div>				  			
                   </div>
               </div>
            </div>
        </div>
    
</script>
@endsection