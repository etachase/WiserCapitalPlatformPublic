@section('body_bottom')
@parent

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script language="JavaScript">
    var popup = false;
    var steps = [
        '{{\App\Support\Dropdown::CREATE_PROJECT_STEP_1}}', 
        '{{\App\Support\Dropdown::CREATE_PROJECT_STEP_2}}', 
        '{{\App\Support\Dropdown::CREATE_PROJECT_STEP_3}}', 
        '{{\App\Support\Dropdown::CREATE_PROJECT_STEP_4}}'
    ];
    $('input[type=radio][name=tenants]').change(function () {
        if (this.value == 1) {
            $('#tenants-container').removeClass('hide').show();
        } else if (this.value == 0) {
            $('#tenants-container').hide();
        }
    });

    $("#preliminary-project-information").collapse('show');
    
     $(".roof-building-select-multiple").select2();
     
     
    var selected_system_location = function () {
        var only_roof = false;
        $('input[name^=system_location]:checked').each(function () {
            only_roof = ($(this).val() == 10) ? true : false;
        });
        $('.hide_if_roof').removeClass('hide');
            only_roof ? $('.hide_if_roof').addClass('hide') : '';
    }
    $('.input_system_location_checked').on('click', selected_system_location);
    
    function showotherfacility() {
        value = $('#facility-type').val();
        if (value == {{ \App\Support\Dropdown::FACILITY_OTHER }}){
            $('#facility_type_other').show();
        } else {
        // something else
            $('#facility_type_other').hide();
        }
    }
    
    // on create project disable or unable next button
    function disableUnableNextButton(status) {
        if (submit_button_id == 'create') {
            $('a.next').attr('disabled', status);
        } else {
            $('input[type=submit]').attr('disabled', status);
        }
    }
    
    
     $('#financials-audited').on('change', function() {
	 	$( '#financial-reports' ).toggle( this.value == 0 );
	 });  
	 $('#financials-audited').change();
	 
	 
	 $('#baloon-payments').on('change', function() {
	 	$( '#cash-flow-sufficient' ).toggle( this.value == 1 );
	 });  
	 $('#baloon-payments').change();
	 
	 
	 
	  $('#derogatory-findings').on('change', function() {
	 	$( '#derogatory-finding-b-or-better' ).toggle( this.value == 1 );
	 });  
	 $('#derogatory-findings').change();
	 
	 	     
	     
    $('#utility_provider').on('change', function() {
        value = $(this).val();
        $("select[name=utility_schedule]").parent().addClass('hide');
        $('.utility_schedule_loader').show();
        disableUnableNextButton(true);
        $('.green_button').hide();
        $('.utility_bill').hide();
        $.ajax({
            url: "{{url('/utility_providers')}}" + '/' + value,
            dataType: 'json',
            success : function (response) {
                if (response.name) {
                    if (response.is_green_button == 1) {
                        $('.green_button').show();
                    } else {
                        $('.utility_bill').show();
                    }
                    getUtilitySchedule(response.name, "{{csrf_token()}}", "{{old('utility_schedule') ? old('utility_schedule') : (isset($metas['utility_schedule']) ? $metas['utility_schedule'] : '')}}");
                } else {
                    $('.utility_schedule_loader').hide();
                    disableUnableNextButton(false);
                }
            },
            error : function (respone) {
                $('.utility_schedule_loader').hide();
                disableUnableNextButton(false);
            }
        });
    });
    
    function showrent(value) {
        value = $('#interest_in_property').val();
        if (value == {{ \App\Support\Dropdown::INTEREST_RENT }}){
            $('#property_rent_term').show();
        } else {
        // something else
            $('#property_rent_term').hide();
        }
        if (value == {{ \App\Support\Dropdown::INTEREST_OWN_LEASE }}){
            $('#property_lease_term').show();
        } else {
        // something else
            $('#property_lease_term').hide();
        }
    }
    function showIncentive() {
        value = $('.incentive_select').val();
        if (value == {{ \App\Support\Dropdown::INCENTIVE_NO }}) {
            $('.incentive_ac_section').hide();
            $('.incentive_dc_section').hide();
            $('.incentive_dc_value').val('');
            $('.incentive_ac_value').val('');
        } else if ( (value == {{ \App\Support\Dropdown::INCENTIVE_KWDC }}) || (value == {{ \App\Support\Dropdown::INCENTIVE_KWAC }}) ) {
            $('.incentive_dc_section').show();
            $('.incentive_ac_section').hide();
            $('.incentive_ac_value').val('');
        } else if ((value == {{ \App\Support\Dropdown::INCENTIVE_KWHAC }}) || ( value == {{ \App\Support\Dropdown::INCENTIVE_KWHDC }} ) ) {
            $('.incentive_ac_section').show();
            $('.incentive_dc_section').hide();
            $('.incentive_year_ac_kwh').text('$/kWh');
            $('.incentive_dc_value').val('');
            for (var index = 1; index <= 10; index++) {
                $('input[name="incentive_year[' + index + ']"]').attr('readonly', false);
            };
        } else if (value) {
            $('.incentive_loader').show();
            $('.incentive_ac_section').hide();
            $('.incentive_dc_section').hide();
            $.ajax({
                url : '{{url("/api/global") . "/"}}' + value + '/input',
                method : 'GET',
                success : function (response) {
                    $('.incentive_loader').hide();
                    $.each(response.years, function (index, value) {
                        $('input[name="incentive_year[' + index + ']"]').val(value);
                        $('input[name="incentive_year[' + index + ']"]').attr('readonly', true);
                    });
                    $('.incentive_ac_section').show();
                    $('.incentive_dc_section').hide();
                    $('.incentive_year_ac_kwh').text('$/MW');
                    $('.incentive_dc_value').val('');
                }
            });
        }
    }
    function showOngoingSystem(node) {
        $('.ongoing').each(function() {
            if ((node && $(node).hasClass('none'))
                    && $(node).is(':checked')) {
                $('.other').removeAttr('checked');
                $(".ongoing_system_other_field").hide();
                $(".ongoing_system_other_field").val('');
                return false;
            }
            var relatedElementClass = $(this).data('related-element');
            if ($(this).is(':checked') && $(this).val() != {{ \App\Support\Dropdown::ONGOING_NONE }}
                    && (!node || (node && (node.id == this.id)))) {
                $('.none').removeAttr('checked');
                $("." + relatedElementClass).show();
                
                if (($('[name=interconnection_type]').val() == {{ \App\Support\Dropdown::INTERCONNECTION_FIT }})
                    && ($(this).val() == {{ \App\Support\Dropdown::ONGOING_LANDLEASE }})) {
                    $("." + relatedElementClass + '_fit_land_lease').show();
                } else {
                    $("." + relatedElementClass + '_fit_land_lease').hide();
                }
            } else {
                if (!node || (node && (node.id == this.id))) {
                    $("." + relatedElementClass).hide();
                    $("." + relatedElementClass).val('');
                }
            }


            if ($('[name=interconnection_type]').val() == {{ \App\Support\Dropdown::INTERCONNECTION_OTHER }}) {
                $('.interconnection_type').show();
            } else {
                $('.interconnection_type').hide();
            }
        });
    }
    
    $('[name=interconnection_type]').on('change', function () {
        showOngoingSystem();
    });
    
    function formatRepo (repo) {
      if (repo.loading) return repo.text;
      
      var markup = "<div class='select2-result-repository__title'>" + repo.name+ "</div>";

      if (repo.is_green_button && repo.is_green_button == 1) {
        markup += "<div class='select2-result-repository__description'>(Green Button)</div>";
      }

      return markup;
    }

    function formatRepoSelection (repo) {
        return repo.name ? (repo.name + ((repo.is_green_button && repo.is_green_button == 1) 
                ? '(Green Button)' : '')) : repo.text;
    }
     
    function getUtilitySchedule(utility_name, token, selection) {
        $.ajax({
            url : '{{url("/hf/get-utility-schedule")}}',
            data : {'utility_name' : utility_name, '_token' : token},
            method : 'GET', 
            success : function (response) {
                html = '';
                if (response.items.length > 0) {
                    html = '<option value="">[Select Tariff]</option><option value="' + 
                            "{{\App\Support\Dropdown::UTILITY_DONT_KNOW}}" + '"';
                    if (selection == "{{\App\Support\Dropdown::UTILITY_DONT_KNOW}}") {
                        html += " selected='selected'"
                    }
                    html += '>' + "{{\App\Support\Dropdown::$utility_dont_know[\App\Support\Dropdown::UTILITY_DONT_KNOW]}}" 
                            + '</option>';
                    $("select[name=utility_schedule]").html(html);
                    $.each(response.items, function (index, value) {
                        html = '<option value="' + value.label + '" ';
                        if (selection == value.label) {
                            html += "selected='selected' "
                        };
                        html += '>' + value.name + (value.approved ? ' (Approved)' : "") + '</option>'
                        $("select[name=utility_schedule]").append(html);
                    });
                    $("select[name=utility_schedule]").parent().removeClass('hide');
                    $("select[name=utility_schedule]").select2();
                }
                $('.utility_schedule_loader').hide();
                disableUnableNextButton(false);
            }
        });
    }
    $(document).ready(function() {
        $.validator.addMethod("current_electric_pricing", function(value, element) {
            var fit = {{ \App\Support\Dropdown::INTERCONNECTION_FIT }};
            if ($('.connection').val() != fit) {
                if (value.slice(0, 1) == '-') {
                    return false;
                }
                value = value.replace(/[^0-9.]/g,'');
                if (!value || (value && ((value < 0.04) || (value > 0.40)))) 
                    return false;
            }
            return true;
        }, "Please enter a valid cost between $0.04-$0.40");
        
//        $.validator.addMethod("utility_schedule", function(value, element) {
//            if(($(element).children('option').length > 1) && !value) {
//                return false;
//            }
//            return true;
//        }, "Please select utility schedule");
//        
        $.validator.addMethod("fit_rate", function(value, element) {
            var fit = {{ \App\Support\Dropdown::INTERCONNECTION_FIT }};
            if (($('.connection').val() == fit)  && !value) {
                return false;
            }
            return true;
        }, "This field is required.");
        $.validator.addMethod("fit_term", function(value, element) {
            var fit = {{ \App\Support\Dropdown::INTERCONNECTION_FIT }};
            if (($('.connection').val() == fit)  && !value) {
                return false;
            }
            return true;
        }, "This field is required.");
        $.validator.addMethod("ppa", function(value, element) {
            var yes = {{ \App\Support\Dropdown::YES }};
            if (($('[name=signed_power_purchase_agreement]').val() == yes) && !value) {
                return false;
            }
            return true;
        }, "This field is required.");
        $.validator.addMethod("fit", function(value, element) {
            var yes = {{ \App\Support\Dropdown::YES }};
            if (($('[name=fit_signed_power_purchase_agreement]').val() == yes) && !value) {
                return false;
            }
            return true;
        }, "This field is required.");
        $.validator.addMethod("zipcode", function(value, element) {
            if (!value) {
                return false;
            }
            return true;
        }, "This field is required.");
        $.validator.addMethod("valid_zipcode", function(value, element) {
            if (value && value.length < 5) {
                return false;
            }
            return !isNaN(parseFloat(value)) && isFinite(value);
        }, "Please enter the valid zipcode.");

        $('.validate').validate();
		

        var validator = $("#" + submit_button_id).validate({
            rules: {
                address_search: {
                    required: true
                },
                facility_type: {
                    required: true
                },
                interest_in_property: {
                    required: true
                },
                property_rent_term: {
                    required: true,
                    min: 1
                },
                current_electric_pricing: {
                    current_electric_pricing: true
                },
                fit_rate: {
                    fit_rate: true
                },
                fit_term: {
                    fit_term: true
                },
                signed_power_purchase_agreement : {
                    required : true
                },
                fit_signed_power_purchase_agreement : {
                    required : true
                },
                agreement_ppa_rate: {
                    ppa: true
                },
                agreement_ppa_esc: {
                    ppa: true,
                    min : 0,
                    max : 4
                },
                agreement_ppa_term: {
                    ppa: true,
                    min : 5,
                    max : 30
                },
                agreement_fit_rate: {
                    fit: true
                },
                agreement_fit_esc: {
                    fit : true,
                    min : 0,
                    max : 4
                },
                agreement_fit_term: {
                    fit: true,
                    min : 5,
                    max : 30
                },
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
                'system_location[]': {
                    required: true
                },
                'ongoing_system_cost[]': {
                    required: true
                },
                interconnection_type: {
                    required: true
                },
                interconnection_type_other: {
                    required: true
                },
                renewable_incentive_program: {
                    required: true
                },
                zip_code: {
                    zipcode: true,
                    valid_zipcode : true
                },
                utility_provider: {
                    required: true
                },
                tenants: {
                    required: true
                },
                signed_site_lease: {
                    required: true
                },
                fit_signed_site_lease: {
                    required: true
                },
                epc_cost: {
                    required: true
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
                $('.priceFormatter').each(function() {
                    if ($(this).val()) {
                        var unmasked = $(this).maskMoney('unmasked'); 
                        $(this).val(unmasked[0]); 
                    }
                });
                submitForm(form);
            }
        });
        $.validator.setDefaults({
            debug: true,
            success: "valid"
        });
        
        var freeNextSteps = function (number) {
            for(var i = number + 1; i <= 4; i++) {
                $('.step-' + i).removeClass('active');
                $('.step-' + i).removeClass('pass');
            }
        }
        var activeCurrentStep = function (number) {
            $('.step-' + number).addClass('active');
        }
        var inactivePreviousSteps = function (number) {
            for(var i = 1; i < number; i++) {
                $('.step-' + i).removeClass('active');
                $('.step-' + i).addClass('pass');
            }
        }
    
        var changeStep = function (step, previous) {
            updateLoginStatus();
            $('#step-number').html(step);
            $('#step-name').html(steps[step - 1]);
            inactivePreviousSteps(step);
            freeNextSteps(step);
            activeCurrentStep(step);
        }
        
        
        if (submit_button_id == 'create') {
            
            //jQuery time
            var current_fs, next_fs, previous_fs; //fieldsets

            $("body").on('click', '.next', function () {
                if (validator.form()) {
                    current_fs = $(this).parents('.process-sec');
                    next_fs = $(this).parents('.process-sec').next();
                    previous_fs = $(this).parents('.process-sec').prev();
                    
                    changeStep(parseInt(current_fs.attr('data-step')) + 1);
                    
                    
                    //activate next step on progressbar using the index of next_fs
                    //hide the current fieldset with style
    //                current_fs.css({visibility: "visible", display: 'none'}).animate({
    //                    opacity: 0
    //                }, 1000);
                    current_fs.addClass('active');
                    //show the next fieldset
                    // next_fs.show("slide", { direction: "left" }, 1000);;
    //                next_fs.css({visibility: "visible", display: 'block'}).animate({
    //                    opacity: 1
    //                }, 1000);

                    if ((current_fs.attr('data-step') == 2) && 
                            ($('.connection').val() == "{{ \App\Support\Dropdown::INTERCONNECTION_FIT }}")) {
                        current_fs.css({visibility: "visible", display: 'none'});
                        next_fs.css({visibility: "visible", display: 'block'});
                        $('.process-sec-3 .next').trigger('click');
                        return;
                    } else {
                        current_fs.hide("slide", {direction: "left"}, 400, function () {
                            //$("html,body").animate({ scrollTop: 0 }, "slow");
                            next_fs.show("slide", {direction: "right"}, 600, function () {
                                $('#map-form .fa-question-circle').tooltip({placement: 'top', container: '.fa-question-circle', trigger: 'hover'}).tooltip('show');


                            });
                        });
                        $('#map-form .fa-question-circle').tooltip({placement: 'top', trigger: 'manual'}).tooltip('hide');
                    }
                    
                }
            });
            $("body").on('click', '.previous', function () {
                current_fs = $(this).parents('.process-sec');
                next_fs = $(this).parents('.process-sec').next();
                previous_fs = $(this).parents('.process-sec').prev();
                
                
                changeStep(parseInt(current_fs.attr('data-step')) - 1, true);
                
                if ((current_fs.attr('data-step') == 4) && 
                        ($('.connection').val() == "{{ \App\Support\Dropdown::INTERCONNECTION_FIT }}")) {

                    current_fs.css({visibility: "visible", display: 'none'});
                    previous_fs.css({visibility: "visible", display: 'block'});
                    $('.process-sec-3 .previous').trigger('click');
                    return;
                } else {
                    //de-activate current step on progressbar
                    current_fs.hide("slide", {direction: "right"}, 400, function () {
                        previous_fs.show("slide", {direction: "left"}, 600, function () {
                            $('#map-form .fa-question-circle').tooltip({placement: 'top', container: '.fa-question-circle', trigger: 'hover'}).tooltip('show');

                        });
                    });
                }

                $('#map-form .fa-question-circle').tooltip({placement: 'top', trigger: 'manual'}).tooltip('hide');
                

            });
            if ($('input[name="current_electric_pricing"]').val()) {
                var value = parseFloat($('input[name="current_electric_pricing"]').val());
                $('input[name="current_electric_pricing"]').val(value.toFixed(4));
            }
            if ($('input[name="epc_cost"]').val()) {
                var value = parseFloat($('input[name="epc_cost"]').val());
                $('input[name="epc_cost"]').val(value.toFixed(2));
            }
            
            $('#map-form .fa-question-circle').tooltip({placement: 'top', trigger: 'manual'}).tooltip('show');
        }
        
        $('form').bind("keypress", function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
        });
        
        if (formatted_address) {
            fillRenewableIncentiveField(formatted_address, renewable_program);
        }
        showotherfacility();
        showrent();
        showIncentive();
        showOngoingSystem(false);
        selected_system_location();
        $(".ongoing").click(function(){
            showOngoingSystem(this);
        });
        $(".incentive_select").change(function() {
            showIncentive();
        });
        function changeElectrictyField (value) {
            var fit = {{ \App\Support\Dropdown::INTERCONNECTION_FIT }};
            updatePrice();
            if (value == fit) {
                $('.type_of_project').hide();
                fitUpdatePrice();
                $('.non_fit_agreement').hide();
                $('.fit_agreement').show();
                $('.renewable_incentive_program_section').hide();
                $('.utility_paid_price_div').show();
                $('.utility_data').hide();
                $('.current_electric_pricing_div').hide();
            } else {
                $('.type_of_project').show();
                $('.fit_agreement').hide();
                $('.non_fit_agreement').show();
                $('.renewable_incentive_program_section').show();
                $('.utility_paid_price_div').hide();
                $('.utility_data').hide();
                $('.current_electric_pricing_div').show();
            }
        } 
        
        function showHide(showField) {
            $('.' + showField).show();
        }
        function hideFields(hideFields) {
            $.each(hideFields, function (i, value) {
                $('.' + value).hide();
            });
        }
        
        $('.connection').change(function () {
            changeElectrictyField($(this).val());
        });
        var signed_value = '';
        var fit_signed = '';
        
        function fitUpdatePrice () {
            if (fit_signed == '{{ \App\Support\Dropdown::YES }}') {
                hideFields(['price_per_kwh', 'fit_rate_non_agreement_div']);
            } else {
                showHide('fit_rate_non_agreement_div');
                hideFields(['price_per_kwh']);
            }
        }
        function updatePrice() {   
            hideFields(['price_per_kwh', 'fit_rate_non_agreement_div']);
        }
        function signedPowerPurchaseAgreement(signed = '') {
            signed_value = signed;
            updatePrice();
            if (signed == '{{ \App\Support\Dropdown::YES }}') {
                $('.signed_power_purchase_agreement_section').show();
            } else {
                $('.signed_power_purchase_agreement_section').hide();
            }
        }
        function fitSignedPowerPurchaseAgreement(signed = '') {
            fit_signed = signed;
            fitUpdatePrice();
            if (signed == '{{ \App\Support\Dropdown::YES }}') {
                $('.fit_signed_power_purchase_agreement_section').show();
            } else {
                $('.fit_signed_power_purchase_agreement_section').hide();
            }
        }
        function signedSiteLease(signed = '') {
            if (signed == '{{ \App\Support\Dropdown::YES }}') {
                $('.signed_site_lease_section').show();
            } else {
                $('.signed_site_lease_section').hide();
            }
        }
        function fitSignedSiteLease(signed = '') {
            if (signed == '{{ \App\Support\Dropdown::YES }}') {
                $('.fit_signed_site_lease_section').show();
            } else {
                $('.fit_signed_site_lease_section').hide();
            }
        }
        
        changeElectrictyField("{{(empty($metas['interconnection_type']) ? '' : $metas['interconnection_type'])}}");
        
        
        $('[name=signed_power_purchase_agreement]').change(function () {
            signedPowerPurchaseAgreement($(this).val());
        });
        $('[name=fit_signed_power_purchase_agreement]').change(function () {
            fitSignedPowerPurchaseAgreement($(this).val());
        });
        $('[name=signed_site_lease]').change(function () {
            signedSiteLease($(this).val());
        });
        $('[name=fit_signed_site_lease]').change(function () {
            fitSignedSiteLease($(this).val());
        });
        <?php if (isset($metas['interconnection_type']) && ($metas['interconnection_type'] == \App\Support\Dropdown::INTERCONNECTION_FIT)) : ?>
            fitSignedPowerPurchaseAgreement("{{isset($metas['fit_signed_power_purchase_agreement']) ? $metas['fit_signed_power_purchase_agreement'] : ''}}"); 
            fitSignedSiteLease("{{isset($metas['fit_signed_site_lease']) ? $metas['fit_signed_site_lease'] : ''}}"); 
        <?php else : ?>
            signedPowerPurchaseAgreement("{{isset($metas['signed_power_purchase_agreement']) ? $metas['signed_power_purchase_agreement'] : ''}}");
            signedSiteLease("{{isset($metas['signed_site_lease']) ? $metas['signed_site_lease'] : ''}}");
        <?php endif; ?>
        
        var initials = [];
        <?php if (old('utility_provider') || (!empty($metas) && !empty($metas['utility_provider']))) : ?>
            value = "{{old('utility_provider') ? old('utility_provider') : ((!empty($metas) && !empty($metas['utility_provider'])) ? $metas['utility_provider'] : '')}}";
            initials.push({
                id : value
            });
            utilityProviderSelect(initials, "{{isset($site) && $site->zip_code ? $site->zip_code : ''}}");
        <?php else : ?>
            utilityProviderSelect(initials, "{{isset($site) && $site->zip_code ? $site->zip_code : ''}}");
        <?php endif; ?>
    });
    
    
    
    $('#zipCode').on('keyup', function () {
        var value = $(this).val();
        if (value.length == 5) {
            $('.utility_provider_row').show();
            utilityProviderSelect([], value);
        } else {
            $('.utility_provider_row').hide();
        }
    });
    
    
</script>
@endsection
