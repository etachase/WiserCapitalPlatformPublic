<div class="tab-heading" role="tab" id="system-performancet-heading">
    <h2 class="panel-title">  
        <img src="{{url('/assets/themes/wisercapital/img/wsar.png')}}" /> System Performance
        <div class="title-meta"><span>{{  $WSAR->systemPerformance()  }}</span>/200</div>
    </h2>
</div>

<div id="system-performance"  aria-labelledby="system-performancet-heading">
    {!! Form::open(array('route' => array('hf.update', $site->id), 'method' => 'put', 'id' => "system_performance_form")) !!}
    <ul class="checklist">
        <li>
            <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->panelWarranty()) ? 0 : $v) }}</span>/60</span>
            
            Panel Manufacturer Warranty	
        </li>
        <li>
            <span class="score">  <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->panelManufacturerFinancialStrength()) ? 0 : $v) }}</span>/50</span>
            
            Panel Manufacturer Financial Strength
            <hr />	
        </li>
        <li>
            <span class="score"><span class="accordion-wsar-score">{{ (is_null($v = $WSAR->inverterWarranty()) ? 0 : $v) }}</span>/25</span>
            
            Inverter Warranty	
        </li>
       <li>
            <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->inverterManufacturerFinancialStrength()) ? 0 : $v) }}</span>/20</span>
            
            Inverter Manufacturer Financial Strength	
            <hr />
        </li>
        <li>
            <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->rackingTrackingManufacturerWarranty()) ? 0 : $v) }}</span>/10</span>
            
            Racking	or Tracking System Warranty
        </li>
        <li>
            <span class="score">  <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->rackingTrackingManufacturerFinancialStrength()) ? 0 : $v) }}</span>/10</span>
            
            Racking	and Tracking System Financial Strength	
            <hr />
        </li>
	<li>
            <span class="score"> <span class="accordion-wsar-score">{{ (is_null($v = $WSAR->MonitoringServices()) ? 0 : $v) }}</span>/25</span>
            
           Monitoring	
        </li>
        @if (Auth::user()->hasRole(['admins']) )
        <li>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        {!! Form::label('wiser_discretionary_assessment', 'Monitoring Discretionary Assessment') !!}
                        {!! Form::number('wiser_discretionary_assessment', (!empty($metas['wiser_discretionary_assessment']) ? $metas['wiser_discretionary_assessment'] : ''), array('min' => 1, 'max' => '25', 'class' => 'form-control')) !!}
                    </div>

                </div>
            </div>
       	</li>
        @endif 
    </ul>
    <hr>
    @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
        {!! Form::submit('Save & Proceed', array("class" => "btn btn-primary", 'id' => 'system_performance_submit_form')) !!}
    @endif
    {!! Form::close() !!}
</div>


<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
@parent
<script>
     $(document).ready(function () {
        $('#system_performance_submit_form').on('click', function () {
            $('.priceFormatter2').each(function() {
                if ($(this).val()) {
                    var unmasked = $(this).maskMoney('unmasked'); 
                    $(this).val(unmasked[0]); 
                }
            });
            $('#system_performance_form').submit();
        });
    });
</script>
@endsection


