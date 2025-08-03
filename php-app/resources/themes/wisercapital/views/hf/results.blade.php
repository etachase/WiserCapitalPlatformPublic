@extends('layouts.master')



<style>
    .panel-heading {
        background: rgba(0, 0, 0, 0) linear-gradient(to bottom, #587f94 0%, #7793a5 100%) repeat scroll 0 0;
        color:white !important;
        border-color: #587f94 !important;

    }
    .resultpanel .panel {
        border-color: #587f94 !important;
    }

    .resultpanel .panel {min-height: 355px;}

    .resultpanel .panel.panel-top-message {
        min-height: auto;
    }
    .what-is-next h2
    {
        margin-left: 5px;
    }

    .what-is-next ol li
    {
        font-size: 22px;
        padding: 10px;
        list-style: none;
    }

    .resultpanel .panel-body p
    {
        margin-bottom: 40px;
    }
    
    #ajax_loader{
        /*height: 595px; */
        background-color: white;
    }
    
    .progress{
        border: 1px solid #e6e3e3;
        height: 30px !important;
    }
    
    .bottom-progress-bar{
        position: absolute;
        bottom: 0;
        width: 100%;
    }
    
    #ppa-optimizer-message img {
        width: 20px !important;
    }
    
    .blank-icon {
        padding-left: 18px;
    }


</style> 






@section('content')

<div class="row"> <!-- row -->
    <div class="col-md-12">
            <div class="sec-header1 sec-header row">
                @include('hf.project_menu')
            </div>
            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
            <div class="resultpanel clearfix ">
                <div class="row">
                    <div class="col-md-8">
                        @if (isset($site->status) && ($site->status !=  \App\Support\Dropdown::PRELIMINARY_PPA_QUOTE))
                            <p>This project has been assigned a Wiser Capital representative and is currently under review.</p>
                        @else
                            <p>Review and edit Results. Submit to Wiser for a Preliminary Review.</p>
                        @endif
                    </div>
                    <div class="col-md-4 margin-bottom">
                        <a href="{!! route('hf.confirm-assessment', $site->id) !!}" 
                           data-toggle="modal" data-target="#modal_dialog" 
                           class='btn btn-primary btn-lg pull-right-md'
                           title="Submit to Wiser for a Preliminary Review" 
                           {{$site->status == \App\Support\Dropdown::PRELIMINARY_PPA_QUOTE 
                            ? '' : 'disabled'}}>Submit</a>
                    </div>
                </div>
                @if (!$site->isFIT() || ($site->isFIT() && Auth::user()->hasRole('admins')))
                <form action='{{route('hf.download-proposal', $site->id) }}' method='POST' style="display: inline-block">
                    {{csrf_field()}}
                    <input type='hidden' name='canvasChart'/>
                    <button class='btn btn-primary btn-md'>Download Proposal</button>
                </form>
                @endif
                @if (Auth::user()->hasRole('admins'))
                    <a href="{{route('hf.download-excel', $site->id) }}" 
                       class='btn btn-primary btn-md pull-right'>Download Excel</a>
                @endif
            </div>
            @else
            <div class="row" style="margin:30px 0;">
            
            </div>
            @endif
 </div> <!-- row -->
</div> <!-- row -->

   
            
<div class="row">
          
	<div class="resultpanel chartpanel clearfix hidden-xs">
	    <div class="wsar-score-panel">
	        <h2 class="panel-title clearfix">
	            <div class='annual-price col-sm-8 col-md-9'>
                        <span class="f28">{{$site->isFIT() ? 'FIT Revenue' : 'Cost Comparison'}}</span></div>
	            <a style="margin-left:40px;" data-target="#chart-table" data-toggle="modal">
	                <button type="button" class="btn  btn-edit pull-right-md">Detailed Schedule</button>
	            </a>
	        </h2>
	        <div class="panel-body ">
	            <div> 
	                <div class="text-center">
	                    <canvas id="myChart"  style="margin-left: -10px;" width="1080" height="400"></canvas>
	                </div>
	                <div class="chart-meta">
	                
	                    <div class="annual-price margin-bottom">
	                        <span>FIRST YEAR<small>{{$site->isFIT() ? 'FIT Revenue' : 'ANNUAL SAVINGS'}}</small></span>  
							<span class="chart-digital-results" id="annual-price"></span>
	                    </div>
	                      
	                    <div class="annual-price margin-bottom">
	                       	<span>TOTAL {{$site->isFIT() ? 'FIT Revenue' : 'SAVINGS'}}<small>OVER {{ $ppa_term }} YEARS</small></span>  
	                       	<span class="chart-digital-results" id="total-saving"></span>
	                    </div>
	                
	                </div>
	            </div>
	
	        </div>
	    </div>
	</div> <!-- Annual bill comparison -->
</div> <!-- row -->
 

<div class="row">
	<div id="result_proposal">
	    <div class="resultpanel resultpanel2 clearfix" id='panel1'>
	        
	        <div class="row">
	           <div class="col-lg-6">
	                <div class="title-box grey-title-box">
	                    <h3 class="title-box-heading">
		                    @if( $site->isFIT() )
		                    
		                       Proposed FIT Results
		                    @else
		                    Proposed PPA Results
		                    @endif
	                     
	                    </h3>
	                    <div class="title-box-entry" id="proposed-ppa-results">
	                    </div>
	                </div>
	            </div>
	        	
	        	<div class="col-lg-6">
	                <div class="title-box grey-title-box">
	                    <h3 class="title-box-heading">
	                        System Details
	                    </h3>
	                    <div class="title-box-entry" id="system-details">
	                    </div>
	                </div>
	            </div>    
	        </div> <!-- row -->
	    </div> <!-- utility expenses -->
	    
	    @if(!$site->isFIT())
	    
	    <div class="resultpanel resultpanel1 clearfix" id='panel2'>
	    	<div class="row">
	        	<div class="col-lg-6">
	                <div class="title-box">
	                    <h3 class="title-box-heading">
	                       Utility Expense Incurred the Past 12 Months
	                    </h3>
	                    <div class="title-box-entry">
	                        <ul class="result-list">
	                            <li>
	                                <p>Utility Expense Incurred the Past 12 Months</p>
	                                data  pending uploading utility bills
	                            </li>
	                            <li>
	                                <p>Current Blending Electricity Cost per kWh</p>
	                               data  pending uploading utility bills
	                            </li>
	                            <li class="bg-white">
	                                <p>Current Annual Utility Bill</p>
	                                data  pending uploading utility bills
	                            </li>
	                        </ul>
	                    </div>
	                </div>
	            </div>
                <div class="col-lg-6">
	                <div class="title-box">
	                    <h3 class="title-box-heading">
	                        Electricity Price Assumptions
	                    </h3>
	                    <div class="title-box-entry" id="electricity-price-assumption"></div>
	                </div>
	            </div>
	            
	        </div>
	    </div> <!-- system details -->
	                
	    <hr>
	    @endif
	    
	    <div class="resultpanel clearfix add-margin30">
	        <p style="line-height:1.6;">*Above includes our preliminary system savings and price for solar electricity (PPA Rate/FIT Rate) based upon the initial information provided and basic assumptions. Before providing a final PPA/FIT Rate, Wiser will request financials of the off-taker and perform initial underwriting to confirm the PPA/FIT supports the relative project creditworthiness. </p>
	    </div>
            
	</div>

</div> <!-- row -->
 

 


 
<div class="row">
    @include('hf.modal.system_detail')
    @include('hf.modal.electricity_price_assumption')
    @include('hf.modal.ppa')
</div><!-- /.row -->




@include('hf.modal.loading_animation')
    
    
<div class="modal" id="loaderDialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-body">
        <div class="text-center" style="margin-top: 19%">
            <img src="{{ url('/assets/themes/wisercapital/img/ajax-loader.gif')}}">
        </div>
    </div>
</div>
    
    
<!-- Modal -->
<div class="modal modal-default fade" id="warning_epc_cost_modal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                System Message
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body f15-5">
               We were unable to identify first year savings with your given EPC $/W. However, decreasing the EPC cost from <strong class="epc_cpw"></strong> to <strong class="cpw"></strong> does result in first year savings.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
            </div>
        </div>

    </div>
</div>

@include('hf.modal.electric_bill_comparison')


@if (isset($submit_assessment))
<div class="modal fade" id="submit_assessment_modal">
    <div class="modal-dialog">
        <div class="modal-content"><div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Information</h4>
            </div>
            <div class="modal-body">
                Your project has been submitted and a Wiser Capital representative has been 
                assigned to your project. Our assigned representative will contact shortly.
            </div>
        </div>
    </div>
</div>
@endif

@endsection

<!-- Optional bottom section for modals etc... -->
@section('body_bottom')

<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<script src='//html2canvas.hertzen.com/build/html2canvas.js'></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.0.35/jspdf.plugin.autotable.js"></script>
<script>
$(document).ready(function () {
    <?php if (isset($submit_assessment) && ($submit_assessment == true)) : ?>
        $('#submit_assessment_modal').modal('show');
    <?php endif; ?>
    var timestamp = new Date().getUTCMilliseconds();
    var data = '';
    var current_phase = processing_phase = 'phase_1';
    var complete = 'complete';
    var loading_phases = {!! json_encode(\App\Support\Dropdown::$ppa_optimization_loading_phases)!!};
    var current_list = '';
    var current_message = $('.ppa-loader-message').text();
    var finishAllRemainingPhases = false;
    
    host = "{{env('WEB_SOCKET_FRONTEND', 'wss://wcp.dev/wss2/NNN')}}";
    socket = null;
    var sendMsg = function (chatId) {
        try {
            //Send the message to the socket
            socket.send(JSON.stringify({id: chatId}));
        } catch (e) {
            console.log(e);
        }
    }

    var print = function (message) {
        return;
    };
    var changeContent = function (final) {
        if (!loading_phases.loading_messages.length && !final) {
            return false;
        }
        if (current_phase != processing_phase || finishAllRemainingPhases) {
            current_list.find('i').removeClass();
            current_list.find('i').addClass('text-success glyphicon glyphicon-ok');
            current_list.find('span').html(loading_phases.completed_messages[0]);
            current_list = current_list.next('li');
            loading_phases.completed_messages.shift();
            $('#progressBar').width(loading_phases.percentage[0]);
            loading_phases.percentage.shift();
            current_phase = processing_phase;
        }
        if (current_phase != processing_phase && !final || finishAllRemainingPhases) {
            current_list.find('i').removeClass();
            current_list.find('i').addClass('fa fa-spinner fa-spin');
            current_list.find('span').html(loading_phases.loading_messages[0]);
            loading_phases.loading_messages.shift();
        }
        return true;
    }
    
    var loadAnimationCycle = function () {
        finishAllRemainingPhases  = true;
        if (changeContent(false)) {
            setTimeout(loadAnimationCycle, 1000);
        }
    }
    var socketRunning = false;
    var nonSocketRunning = false;
    try {
        socket = new WebSocket(host);
        //Manages the open event within your client code
        socket.onopen = function () {
            console.log('Connection Opened');
            $('#ppa-optimizer-message').html($('.loader-modal').html());
            current_list = $('.ppa-otimization-loader li').first();
            return;
        };
        //Manages the message event within your client code
        socket.onmessage = function (msg) {
            if (!msg.data) {
                return;
            }
            data = JSON.parse(msg.data);
            if (data.id != timestamp) {
                return;
            }
            if (!socketRunning && !nonSocketRunning) {
                socketRunning = true;
                $('#pleaseWaitDialog').modal('show');
            }
            //status contains the phase
            if (data.status) {
                processing_phase = data.status;
            }
            
            if (data.message) {
                current_message = data.message;
                $('.ppa-loader-message').text(current_message);
            }
             
            if (data.status === complete) {
                loadAnimationCycle();
            } else {
                changeContent(false);
            }
            return;
        };
        //Manages the close event within your client code
        socket.onclose = function () {
            console.log('Connection Closed');
            return;
        };
    } catch (e) {
        console.log(e);
    }

    $('#system-details').on('click', "#edit-system-details", function () {
        $('#system_detail_modal').modal('show');
    });
    $('#electricity-price-assumption').on('click', "#edit-electricity-price-assumptions", function () {
        $('#electricity_price_assumption_modal').modal('show');
    });
    
     $('#proposed-ppa-results').on('click', "#edit-ppa", function () {
        $('#ppa_modal').modal('show');
    });
    
    
    
    
    $.validator.addMethod("current_electric_pricing", function(value, element) {

        value = value.replace(/\$/g,'');

        if((value) > 0.04 && (value) < 0.41)
         return true;
    }, "Please enter a valid cost between $0.04-$0.40");

    $('.validate').validate();
    $("#electricity_price_assumption_form").validate({
        rules: {
            current_electric_pricing: {
                current_electric_pricing: true,
            },
        },
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            if (element.prop("type") === "checkbox" || element.prop("type") === "radio") {
                error.insertBefore(element.parent());
                error.addClass("check-error");
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).parent().addClass("has-error").removeClass("has-success");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parent().addClass("has-success").removeClass("has-error");
        },
        submitHandler: function (form) {
            value = $('#current_electric_pricing').maskMoney('unmasked')[0];
            $('#current_electric_pricing').val(value === 0 ? '' : value);
            
                        
            form.submit();

        }
    });
    
    
    
    $("#ppa_form").validate({
        rules: {
            ppa_term: {
                required: true,
                min: 15,
                max: 35
            }
        },
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            if (element.prop("type") === "checkbox" || element.prop("type") === "radio") {
                error.insertBefore(element.parent());
                error.addClass("check-error");
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).parent().addClass("has-error").removeClass("has-success");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parent().addClass("has-success").removeClass("has-error");
        },
        submitHandler: function (form) {
            value = $('#fixed-ppa-rate').maskMoney('unmasked')[0];
            $('#fixed-ppa-rate').val(value === 0 ? '' : value);
            
            
            form.submit();
        }
    });
    
    
    $("#system_detail_form").validate({
        rules: {
            energy_yield: {
                required: true,
                min: 1000,
                max: 2200
            },
            system_size: {
                required: true,
                min: 50,
                max: 10000
            },
            epc_cost: {
                required: true,
            },
        },
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            if (element.prop("type") === "checkbox" || element.prop("type") === "radio") {
                error.insertBefore(element.parent());
                error.addClass("check-error");
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).parent().addClass("has-error").removeClass("has-success");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parent().addClass("has-success").removeClass("has-error");
        },
        submitHandler: function (form) {
            value = $('#epc_cost').maskMoney('unmasked')[0];
            $('#epc_cost').val(value === 0 ? '' : value);
            form.submit();
        }
    });
    
    
    var getFormattedNumber = function (number) {
        return '$' + parseFloat(number).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
    }
    var getFormattedNumberWithoutDollar = function (number) {
        return parseFloat(number).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
    }
    var getNumberWithoutDollar = function (number) {
        if (!number) {
            return number;
        }
        number = number.replace("$", "");
        number = number.replace(/,/g, "");
        
        return number.replace(/\s/g, "");
    }

    
    var chartMaking = function (ppa_result, esc, term, accepted_epc_cost, 
                                epc_cost, annual_utility_savings, is_fit) {
        
        var accepted_epc_cost     = parseFloat(accepted_epc_cost);
        var epc_cost = parseFloat(epc_cost);
        var labels  = [];
        var index   = 1;
        
        var percent_savings = '';
        var solar_dataset   = [];
        var utility_dataset = [];
        
        var first_year_savings = '';
        var total_saving       = '';
        $.each(annual_utility_savings, function (index, value) {
            if (index < {{ $site->getTerm() }}) {
                var solar_yearly_cost = parseInt(getNumberWithoutDollar(value[5]));
                var utility_yearly_cost = parseInt(getNumberWithoutDollar((!is_fit) ? value[3] : value[7]));
                solar_dataset.push(solar_yearly_cost);
                utility_dataset.push(utility_yearly_cost);
                !first_year_savings ? (first_year_savings = value[6]) : '';
                var mean_percentage   = (solar_yearly_cost + utility_yearly_cost) / 2;
                var profit_percentage = ((getNumberWithoutDollar(value[6]) / mean_percentage) * 100).toFixed(2);
                !percent_savings ? (percent_savings = profit_percentage) : '';

                index++;
                labels.push('Year ' + index  + (!is_fit ? (" (" + profit_percentage + "%)") : ''));
            } else {
                total_saving = value[6];
            }
            var table = '<tr>'+ '<td>' + (value[0] ? value[0].toString().replace(" ", "") : '')  + '</td>';
            if (!is_fit) {
                table += '<td>' + (value[1] ? value[1].toString().replace(" ", "") : '')  + '</td>';
            }
            table += '<td>' + (value[2] ? value[2].toString().replace(" ", "") : '')  + '</td>';
            if (!is_fit) {
                table += '<td>' + (value[3] ? value[3].toString().replace(" ", "") : '')  + '</td>';
            }
            table += '<td>' + (value[4] ? value[4].toString().replace(" ", "") : '')  + '</td>';
            if (!is_fit) {
                table += '<td>' + (value[5] ? value[5].toString().replace(" ", "") : '')  + '</td>';
            }
            table +=  '<td>' + (value[6] ? value[6].toString().replace(" ", "") : '')  + '</td>' +
                '<td>' + (value[7] ? value[7].toString().replace(" ", "") : '')  + '</td>';
            if (!is_fit) {
                table += '<td>' + (value[8] ? ((parseInt(value[0]) && value[0] < 7) ? '' : 
                                    value[8].toString().replace(" ", "")) : '')  + '</td>';
            }
         // add values in table as per the years
            $('#chart-table-body').append(table + '</tr>');
        });  
        
        if (parseInt(getNumberWithoutDollar(first_year_savings)) <= 0) {
            $('#annual-price').css('color', 'red');
            $('#annual-price').html(first_year_savings);
        }	

        // append the proposed ppa results block
        $('#proposed-ppa-results').html(tmpl('tmpl-proposed-ppa-results',
		{
			'annual_price': getFormattedNumberWithoutDollar(first_year_savings),
			'price_per_kwh': parseFloat(ppa_result.price_per_kwh*100).toFixed(2),
			'total_saving': getFormattedNumberWithoutDollar(total_saving),
			'esc' : parseFloat(esc).toFixed(2),
			'percent_savings': percent_savings,
			'accepted_epc_cost': accepted_epc_cost.toFixed(2),
			'term' : parseFloat(term)
		}));



        $('#annual-price').html(first_year_savings);
        $('#total-saving').html(total_saving);
        $('#chart-img-div').addClass('hide');
        $('#chart-div').removeClass('hide');
        //Get the context of the canvas element we want to select
        
        var ct = document.getElementById('myChart').getContext('2d');
        
        /*************************************************************************/
        
        if (is_fit) {
            var datasets = [
                { 
                    label: "Cummulative FIT Revenue",
                    backgroundColor: "rgba(105, 225, 101, 0.75)",
                    borderColor: "#30ea51",
                    pointBackgroundColor: "#30ea51",
                    data: utility_dataset,
                }
            ];
        } else {
            var datasets = [{
                label: "PPA Cost ($)",
                backgroundColor: "rgba(244, 0, 60, 0.3)",
                pointBackgroundColor: "rgba(244, 0, 60,1)",
                borderColor: "rgba(244, 0, 60, .7)",
                data: solar_dataset,
            },
            { 
                label: "Savings ($)",
                backgroundColor: "rgba(105, 225, 101, 0.75)",
                borderColor: "#30ea51",
                pointBackgroundColor: "#30ea51",
                fill: 0,
                data: utility_dataset,
            }];
        }
        myNewChart = new Chart(ct, {
            type: 'line',
            data: {
                labels: labels,
                datasets: datasets
            }, 
            options: {
                showTooltip : true,
                tooltipTemplate: "<%= value %>",
                multiTooltipTemplate: "<%= value %>",
                tooltips: {
                    displayColors : false,
                    callbacks: {
                        label: function (tooltipItem, data) {
                            var multivaluedTooltip = [];
                            <?php if (!$site->isFIT()) : ?>
                            if (tooltipItem.datasetIndex == 0) {
                                multivaluedTooltip.push('PPA Cost ($) : ' + tooltipItem.yLabel);
                                multivaluedTooltip.push('Savings ($) : ' + utility_dataset[solar_dataset.indexOf(tooltipItem.yLabel)]);
                            } else {
                                multivaluedTooltip.push('PPA Cost ($) : ' + solar_dataset[utility_dataset.indexOf(tooltipItem.yLabel)]);
                                multivaluedTooltip.push('Savings ($) : ' + tooltipItem.yLabel);
                            }
                            <?php else : ?>
                            if (tooltipItem.datasetIndex == 0) {
                                multivaluedTooltip.push('Cummulative FIT Revenue ($) : ' + utility_dataset[utility_dataset.indexOf(tooltipItem.yLabel)]);
                            } else {
                                multivaluedTooltip.push('Cummulative FIT Revenue ($) : ' + tooltipItem.yLabel);
                            }
                            <?php endif; ?>
                            return multivaluedTooltip;
                        }
                    }
                },
                responsive: true,
                animation : {
                    onComplete : function () {
                        setTimeout(function () {
                            changeContent(true);
                        }, 1000)
                        setTimeout(function () {
                            $('input[name=canvasChart]').val($("#myChart").get(0).toDataURL('image/png'));
                            if (!socketRunning) {
                                $('#loaderDialog').modal('hide');
                            } else if (!nonSocketRunning) {
                                $('#pleaseWaitDialog').modal('hide');
                                if (epc_cost > accepted_epc_cost) {
                                    $('.epc_cpw').html(getFormattedNumber(epc_cost));
                                    $('.cpw').html(getFormattedNumber(accepted_epc_cost));
                                    $('#warning_epc_cost_modal').modal('show');
                                }
                            }

                        }, 1800);
                    }
                }
            }
        });
        
        
    }


    $.ajax({
        method: 'GET',
        url: '{{URL::route( "hf.results", array( $site->id ))}}',
        data: {'_token': '{{csrf_token()}}', 'id': timestamp},
        success: function (response) {
            if (!socketRunning && !nonSocketRunning) {
                nonSocketRunning = true;
                $('#loaderDialog').modal('show');
            }
            
            var electricity_price = parseFloat(response.current_electric_pricing);
            if(response.metas.fixed_ppa_rate > 0) {
                    var fixed_ppa_rate = parseFloat(response.metas.fixed_ppa_rate);
                    $('#fixed-ppa-rate').val(fixed_ppa_rate.toFixed(4));
            }
            
             if(response.metas.fixed_ppa_esc > 0 || response.metas.fixed_ppa_esc == 0) {
                    var fixed_ppa_esc = parseFloat(response.metas.fixed_ppa_esc);
                    $('#fixed-ppa-esc').val(fixed_ppa_esc);
            }
             if(response.metas.fixed_ppa_term > 0 || response.metas.fixed_ppa_term == 0) {
                    var fixed_ppa_term = parseFloat(response.metas.fixed_ppa_term);
                    $('#fixed-ppa-term').val(fixed_ppa_term);
            }
            
            

            var epc_cost 	  = parseFloat(response.epc_cost).toFixed(2);
            var accepted_epc_cost = parseFloat(response.accepted_epc_cost).toFixed(2);
            var esc      	  = parseFloat(response.esc);          
	    
            $('#system-details').html(tmpl('tmpl-system-details',
            {
            	system_size: response.system_size,
                year_one_production: response.year_one_production,
                accepted_epc_cost: accepted_epc_cost,
                'all_in_cost' : response.all_in_cost
            }));
            
            $('#electricity-price-assumption').html(tmpl('tmpl-electricity-price-assumption',
            {
                current_utility_escalation_rate: '3',
                current_electric_pricing: response.current_electric_pricing
            }));
            
            $('#current_electric_pricing').val(electricity_price.toFixed(4));
            $('#energy_yield').val(response.energy_yield);
            $('#system_size').val(response.system_size);
            $('#ppa_escalation_rate').val(parseFloat(response.ppa_result.esc * 100).toFixed(2));
            $('#ppa_term').val(response.term);
            $('#epc_cost').val(epc_cost);
            
            chartMaking(response.ppa_result, esc, response.term, response.accepted_epc_cost, 
                    response.epc_cost, response.annual_utility_savings, response.is_fit);
        }
    })
   
});

</script>

<script src="{{asset('/js/template.js')}}" type="text/javascript"></script>


<script type="text/x-tmpl" id="tmpl-system-details">
    <ul class="result-list">
        <li>
            <p>System Size</p>
            <span class="meta">{%=o.system_size %} <small>kW</small> </span>
        </li>
        <li>
            <p>Year 1 Production</p>
            <span class="meta">{%=o.year_one_production %} <small>kWh/Year</small> </span>
        </li>
        @if (Auth::user()->hasRole(['solar-installer', 'admins']) )
        <li>
           <p>Accepted EPC Cost ($/W)</p>
           <span class="meta"><small>&#36;</small> {%=o.accepted_epc_cost  %}</span>   
        </li>
        @endif
        @if (Auth::user()->hasRole(['admins', 'Investors']) )
        <li>
           <p>All In Cost ($/W)</p>
           <span class="meta"><small>&#36;</small> {%=o.all_in_cost  %}</span>   
        </li>
        @endif
        <li>
            <p> &nbsp; </p>
            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
            <button type="button" class="btn  btn-xs btn-edit"
                    id="edit-system-details">Edit</button>
             @endif
        </li>
	</ul>
</script>


<script type="text/x-tmpl" id="tmpl-electricity-price-assumption">
    <ul class="result-list">
        <li>
            <p>Avoided Utility Cost per kWh</p>
            <span class="meta">{%=(o.current_electric_pricing*100).toFixed(2) %} <small>&cent;</small> </span>
        </li>
        <li>
            <p>Current Utility Escalation Rate</p>
            <span class="meta"> {%=o.current_utility_escalation_rate %} <small>&#37;</small></span>
        </li>
        <li>
            <p> &nbsp; </p>
            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
            <button type="button" class="btn btn-xs btn-edit" 
                id="edit-electricity-price-assumptions">Edit</button>
            @endif
        </li>
    </ul>
</script>


<script type="text/x-tmpl" id="tmpl-proposed-ppa-results">
    <ul class="result-list">
	    <li>
	    	@if ($site->isFIT())
	    		<p>Utility Paid Price</p>
			
	    	@else
	    		<p>PPA Price per kWh</p>
			@endif
	    	<span class="meta">{%=o.price_per_kwh  %} <small>&cent;</small></span>
	    </li>
	    <li>
		    @if ($site->isFIT())
		    	<p>FIT Escalation Rate</p>
			@else
		    	<p>PPA Escalation Rate</p>
			@endif
			<span class="meta">{%=o.esc %} <small>&#37;</small></span>   
	    </li>
		
		 <li>
		 	@if ($site->isFIT())
		 		<p>FIT Term Years</p>
			@else
		    	<p>PPA Term Years</p>
			@endif
			
	    	<span class="meta"> {%=o.term  %}</span>   
	    </li>
	   <li>
	        <p> &nbsp; </p>
	        @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
	        <button type="button" class="btn btn-xs btn-edit"
	                id='edit-ppa'>Edit</button>
	         @endif
	    </li>
    </ul>
</script>

@endsection
