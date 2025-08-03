@extends('layouts.master')

@section('content')


<div class="row">
    <div class="sec">
        <div class="col-md-12">
            <div class="sec-header clearfix">
                <h3>{{ $site->name }}</h3>
               
                <div class=" pull-right col-md-7 row text-right" style="padding-top:5px;">
                    {!! Form::open(array('route' => ['hf.store-map',$site->id], 'class' => 'form-horizontal ', 'id' => "map-form")) !!}
                    
                    {!! Form::label('address-search', 'Project Address', array('class' => 'control-label')) !!}
					{!! Form::text('address_search', "{$site->address}, {$site->city}, {$site->state}", array('id' => 'txtSearch', 'class' => 'form-control')) !!}
                
                
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row hide" >
    <div class="col-md-12">

        <div id="toolbar_bottom" class="hide">
            <button type="button" id="cmdSave">Save</button>
            <button type="button" id="cmdLoad">Load</button>
            <button type="button" id="cmdClear">Clear</button>
            <button type="button" id="cmdScreenshot">Screenshot</button>
        </div>

    </div>	
</div>  


<div class="row">
    <div class="sec">
        <div class="col-md-12">
            <div id="map-wrapper">
                <div id="gMap"></div>
                <button type="button" id="map-toolbar-btn" class="navbar-toggle"  data-target="#menuModal" data-toggle="modal">
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
                <div id="toolbar">
                    <div class="tools-list">
                        <label class="toolbar-button" data-toggle="tooltip" title="Move">
                            <input type="radio" name="toolbar" value="move" checked > <i class="icon-move"></i>
                        </label>
                        <label class="toolbar-button" data-toggle="tooltip" title="Ploygon">
                            <input type="radio" name="toolbar" value="add"><i class="icon-polygon"></i>
                        </label>
                        <label class="toolbar-button" data-toggle="tooltip" title="Rectangle">
                            <input type="radio" name="toolbar" value="rectangle"><i class="icon-rectangle"></i>
                        </label>
                        <label class="toolbar-button" data-toggle="tooltip" title="Cut">
                            <input type="radio" name="toolbar" value="cut"><i class="icon-cut"></i>
                        </label>
                        <label class="toolbar-button"data-toggle="tooltip" title="Edit Shapes">
                            <input type="radio" name="toolbar" value="edit"><i class="icon-crop"></i>
                        </label>
                        <label class="toolbar-button" data-toggle="tooltip" title="Add Pin">
                            <input type="radio" name="toolbar" value="pin"><i class="icon-add-pin"></i>
                        </label>
                        <label class="toolbar-button" data-toggle="tooltip" title="Delete">
                            <input type="radio" name="toolbar" value="delete"><i class="icon-delete"></i>
                        </label>
                    </div>
                </div>
            </div>
            <div class="map-footer clearfix">
                <p>Drop a pin, or outline the system perimeter to indicate where the system will be located.</p>
                <div id="divSquareFootDisplay" class="total-area">
                    Total Area: <small><span id="spnTotalArea">0</span> Square Feet</small>
                </div>
            </div>

        </div>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">	 
        <div class="form-group">




            {!! Form::hidden('edit_map', 1) !!}

            {!! Form::hidden('id', $site->id) !!}	
            {!! Form::hidden('address', NULL, ['id' => 'txtAddress']) !!}
            {!! Form::hidden('city', NULL, ['id' => 'txtLocality']) !!}
            {!! Form::hidden('state', NULL, ['id' => 'txtRegion']) !!}
            {!! Form::hidden('zip_code', NULL, ['id' => 'txtPostCode']) !!}
            {!! Form::hidden('country', NULL, ['id' => 'txtCountry']) !!}
            {!! Form::hidden('area', NULL, ['id' => 'area']) !!}

            {!! Form::hidden('map_json', $site->map_json, ['id' => 'txtJson']) !!}
            {!! Form::hidden('screenshot', NULL, ['id' => 'screenshot']) !!}

            <p style="margin-top:30px;" class="text-center">

                {!!	Form::button('Update Map', array(
                'type' => 'submit',
                'id' => 'map-form-submit',
                'class'=> 'btn  btn-primary'
                )) !!}


            </p>

            {!! Form::close() !!}

        </div>
    </div>

    @endsection
    <!-- Optional bottom section for modals etc... -->
    @section('body_bottom')


	<script type="text/javascript" src="/js/html2canvas.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDa9z8c1zmIQfYOlvT6Wnq9Tzr3ZlpXTRs&libraries=drawing,places,geometry"></script>
	<script type="text/javascript" src="/js/map.js"></script>
	<script language="JavaScript">
$(document).ready(function () {

    var json = $("#txtJson").val();
    loadMap(json);

	$('#map-toolbar-btn').click();
	

    $('form').bind("keypress", function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });
});






$('#map-form-submit').click(function (e) {
    //e.preventDefault();
    //$(this).attr("disabled", true);
    //$('.gmnoprint').hide();
    $('#area').val($('#spnTotalArea').text());
    $(this).html("<span class=\"glyphicon glyphicon-refresh spinning\"></span> Saving Map...");
    $('#txtJson').val(saveMap());
    
    /*createScreenshot(function () {
        $('#map-form').submit();
    });*/
});






    </script>
    @endsection