<div class="process-sec process-sec-1" data-step="1">
    <div class="sec-header ">
        <div id="map-form" class="form-horizontal">
            <div class="map-search">
                {!! Form::label('address-search', 'Project Address', array('class' => 'control-label')) !!}
                {!! Form::text('address_search', null, array('id' => 'txtSearch', 'class' => 'form-control')) !!}
                <i class="fa fa-search"></i>
            </div>
            <i class='fa fa-question-circle' data-toggle="tooltip" data-placement="top"
               title='To get started: Start typing your facility address'>
            </i>
        </div>
    </div>
    <div class="hide" >
        <div class="col-md-12">
            <div id="toolbar_bottom" class="hide" >
                <button type="button" id="cmdSave">Save</button>
                <button type="button" id="cmdLoad">Load</button>
                <button type="button" id="cmdClear">Clear</button>
                <button type="button" id="cmdScreenshot">Screenshot</button>
            </div>
        </div>	
    </div>  
    <div id="map-wrapper">
        <div id="gMap"></div>
        <button type="button" class="navbar-toggle"  data-target="#menuModal" data-toggle="modal">
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
    <div class="map-footer">
        <p>Drop a pin, or outline the system perimeter to indicate where the system will be located.</p>
        <div id="divSquareFootDisplay" class="total-area">
            Total Area: <small><span id="spnTotalArea">0</span> Square Feet</small>
        </div>
    </div>
    <div class="hide">

        {!! Form::hidden('name', $name) !!}  
        {!! Form::hidden('address', NULL, ['id' => 'txtAddress']) !!}
        {!! Form::hidden('city', NULL, ['id' => 'txtLocality']) !!}
        {!! Form::hidden('state', NULL, ['id' => 'txtRegion']) !!}
        {!! Form::hidden('zip_code', NULL, ['id' => 'txtPostCode']) !!}
        {!! Form::hidden('country', NULL, ['id' => 'txtCountry']) !!}
        {!! Form::hidden('area', NULL, ['id' => 'area']) !!}
        {!! Form::hidden('map_json', NULL, ['id' => 'txtJson']) !!}
        {!! Form::hidden('screenshot', NULL, ['id' => 'screenshot']) !!}
    </div>
                    
    <div class="text-center btn-holder" >
        <a class="btn btn-primary next" href="javascript:void(0);">Next Step</a>
    </div>
</div>