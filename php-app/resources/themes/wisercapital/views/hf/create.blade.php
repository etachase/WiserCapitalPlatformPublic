@extends('layouts.master')

@section('content')
@include('hf.style')	






    {!! Form::open(array('route' => array('hf.store'), 'files' => true, 'id' => 'create')) !!}
    <div class="process-wrapper">

        <div class="sec">
            <div class="process-entry">
                <div class="sec-header sec-header1">
                    <h3>{{ $name }}</h3>
                    <span class="step-info pull-right"><strong>Step <span id="step-number">1</span>: </strong><span id="step-name">Map</span></span>
                    <hr>
                </div>
                <div class="process-entry-section">
                    @include('hf.wizard._map')
                    @include('hf.wizard._system_information')
                    @include('hf.wizard._project_information')
                    @include('hf.wizard._system_model')
                </div>
            </div>

            <div class="steps">
                <div class="js-step step-1 active" >
                    <i class="hero-ico"></i>
                    <span class="step-head">Step 1</span>
                    <span class="step-title">{{\App\Support\Dropdown::CREATE_PROJECT_STEP_1}}</span>
                </div>
                <div  class="js-step step-2">
                    <i class="hero-ico"></i>
                    <span class="step-head">Step 2</span>
                    <span class="step-title">{{\App\Support\Dropdown::CREATE_PROJECT_STEP_2}}</span>
                </div>
                <div class="js-step step-3">
                    <i class="hero-ico"></i>
                    <span class="step-head">Step 3</span>
                    <span class="step-title">{{\App\Support\Dropdown::CREATE_PROJECT_STEP_3}}</span>
                </div>
                <div class="js-step step-4">
                    <i class="hero-ico"></i>
                    <span class="step-head">Step 4</span>
                    <span class="step-title">{{\App\Support\Dropdown::CREATE_PROJECT_STEP_4}}</span>
                </div>
            </div>

        </div>
    </div>


    {!! Form::close() !!}




<!-- Modal -->
<div class="modal modal-default fade" id="green-button-modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                System Message
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body f15-5">
                GreenButton integration is in Beta and only available to selected users. Please contact Wiser Capital for more information.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>
        </div>

    </div>
</div>


<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content"><div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Information</h4>
            </div>
            <div class="modal-body">
                <b>Contact us at <a href="mailto:projects@wisercapital.com">projects@wisercapital.com</a> or 805-899-3400</b>
                . <br/>To ensure proper modeling of this project, a Wiser representative will review your inputs and follow up with additional questions as needed.
            </div>
        </div>
    </div>
</div>
@endsection

@include('hf.partial._preliminary_information_script')
<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
@parent


<script type="text/javascript" src="/js/html2canvas.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDa9z8c1zmIQfYOlvT6Wnq9Tzr3ZlpXTRs&libraries=drawing,places,geometry"></script>
<script type="text/javascript" src="/js/map.js"></script>


<script>
    var formatted_address = $('input[name="address_search"]').val();
    var renewable_program = "{{old('renewable_incentive_program')}}";
    var submit_button_id = "create";

    function submitForm(form) {
        $('#txtJson').val(saveMap());
        $('#area').val($('#spnTotalArea').text());
        e.preventDefault();
        createScreenshot(function () {
            form.submit();
        });
    }
</script>
@endsection