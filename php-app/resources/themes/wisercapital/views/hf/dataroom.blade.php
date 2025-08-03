@extends('layouts.master')

@section('head_extra')
@include('partials._head_extra_jstree_css')
@include('partials._head_extra_select2_css')
<style>
    .jstree-default .jstree-custom-root-theme-icon.jstree-themeicon-custom {
        background-image: url("/jstree/src/themes/default/folder.png");
    }
    .jstree-default .jstree-custom-system-theme-icon.jstree-themeicon-custom {
        background-image: url("/jstree/src/themes/default/system-folder.png");
    }
    .jstree-default .jstree-custom-default-theme-icon.jstree-themeicon-custom {
        background-image: url("/jstree/src/themes/default/sub-folder.png");
    }
    .jstree-anchor{
        width: 100%
    }
    div.row.tree-row {
        white-space: initial !important;
        margin: 0;
    }
    .jstree-default .jstree-anchor {
        height: 100%;
        padding: 5px 0px;
    }
    #jstree {
        min-width: 250px;
        max-width: 1050px;
    }
    .dropdown-menu {
        border-color: #B6B6B6 !important;
    }
    .dropdown-menu>li>a {
        color: #2E2E2E !important;
    }
    
    .jstree-icon.jstree-file{
        margin-top: -5px !important;
    }
</style>
@endsection

@section('content')
@if (Auth::user()->hasRole('admins') || Auth::user()->hasRole('Investors'))

<div class="row margin-bottom">
    <div class="sec">

        <div class="sec-header1 sec-header row">
            @include('hf.project_menu')
        </div>
    </div>
</div>

<div class="row margin-bottom">
    <div class="sec clearfix">
        <div class='row margin-5'>
            <div class='panel panel-default no-border-radius'>
                <div class='panel-body'>
                    <div class='row margin margin-bottom'>
                        <span class="project-summary"> Project Summary</span>
                    </div>
                    <div class='row'>
                        <div class='col-sm-4 summary_panel'>
                            <div class='row col-xs-12'>
                                Project Title
                            </div>

                            <div class='row col-xs-12 margin-bottom'>
                                <h4>{{$site->name}}</h4>
                            </div>
                            <div class='row col-xs-12 marT5'>
                                Project Address
                            </div>

                            <div class='row col-xs-12'>
                                <h4>{{$site->address ? $site->address : '--'}} <br />{{$site->city ? $site->city : '--'}}, {{$site->state ? $site->state : '--'}} {{$site->zip_code ? $site->zip_code : '--'}}</h4>
                            </div>
                        </div>
                        <div class='col-sm-7'>
                            <div class='row'>
                                <div class='col-sm-12 summary_panel'>
                                    <div class='col-sm-4'>
                                        <div class='row'>System Size (kW DC)</div>
                                        <div class='row'><h4>{{$site->getSystemSize() ? $site->getSystemSize() : '--'}}</h4></div>
                                    </div>
                                    <div class='col-sm-4'>
                                        <div class='row'>Production (kWh/yr 1)</div>
                                        <div class='row'><h4>{{$site->getEnergyYield() ? $site->getEnergyYield() : '--'}}</h4></div>
                                    </div>
                                    <div class='col-sm-4'>
                                        @if (Auth::user()->hasRole(['solar-installer', 'admins']) )
                                        	<div class='row'>EPC Cost ($/kW)</div>
                                        	<div class='row'><h4><small>&#36;</small>{{ number_format($site->getEPCCost(),2) }}</h4></div>
                                        @endif
                                        @if (Auth::user()->hasRole(['Investors']) )
                                        	<div class='row'>All In Cost ($/kW)</div>
                                        	<div class='row'><h4><small>&#36;</small>{{ number_format($site->getAllInCost(),2) }}</h4></div>
                                        @endif
                                        
                                        
                                        
                                    </div>
                                </div>
                                <div class='col-sm-12 summary_panel'>
                                    <div class='col-sm-4'>
	                                    @if($site->isFIT())
                                        	<div class='row'>FIT Rate ($/kWh)</div>
                                                    <div class='row'><h4>{{ (isset($site_meta['fit_rate']) ? number_format($site_meta['fit_rate']*100, 2) : 0)  }} <small>&cent;</small></h4></div>
                                        @else
                                        	<div class='row'>PPA Price ($/kWh)</div>
											<div class='row'><h4>{{ number_format($site->getPPAPrice(), 2)  }} <small>&cent;</small></h4></div>
                                        @endif
                                    </div>
                                    @if(!($site->isFIT()))
                                     
                                    <div class='col-sm-4'>
                                        <div class='row'>PPA Escalator (%)</div>
                                        <div class='row'><h4>{{ ((float)$site->getEsc()) }} <small>&#37;</small></h4></div>
                                    </div>
                                    @endif
                                    <div class='col-sm-4'>
                                        <div class='row'>PPA Term (Years)</div>
                                        <div class='row'><h4>{{ $site->getTerm() }}</h4></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr />

@endif
<div class="row">
    <div class="col-lg-12">
        <div class="box box-default">
            <div class="box-body">
                <div class="">
                    <div class="box-header with-border margin-bottom">
                        <span class="f22">Agreements</span>
                        @if (Auth::user()->hasRole('admins'))
                        <form method="POST" action="{{url('/admin/agreements/create')}}"
                              style="display: inline-block !important;" class=" pull-right">
                            {{csrf_field()}}
                            <input type="hidden" value="{{Request::url()}}" name="redirect-url"/>
                            <button class="btn btn-sm btn-primary">Add a new document</button>
                        </form>
                        @endif
                    </div>

                    <table  id="host-facilities-table" class="table table-responsive uni-table">
                        <thead>
                            <tr>
                                <th class="pad15 f15-5">Folder Name</th>
                                <th class="pad15 f15-5">Total Agreements</th>
                                <th class="pad15 f15-5">Status</th>
                                <th class="pad15 f15-5">Action</th>
                            </tr>
                        </thead>
                        @forelse($document_list as $key => $file)
                        <tbody>
                            <tr class="font-bold f15">
                                <td>{{ $file['name']}}</td>
                                <td>{{ count($file['files']) . ' '. \App\Models\Agreement::AGREEMENT . 
                                        (count($file['files']) > 1 ? 's' : '')}}</td>
                                <td>{{ $file['status']}}</td>
                                <td>
                                    <i class='glyphicon glyphicon-menu-down' 
                                       id='agreement_show_file_{{$key}}'
                                       data-key='agreement_file_{{$key}}'></i>
                                </td>
                            </tr>
                        </tbody>
                        <tbody class='agreement_file_{{$key}}' style='display: none;'>
                            <tr style="background: #f1f1f1">
                                <th class="pad15I f15">Name</th>
                                <th class="pad15I f15">File Name</th>
                                <th class="pad15I f15"></th>
                                <th class="pad15I f15"></th>
                                
                            </tr>
                            @foreach($file['files'] as $agreementFile)
                            <tr>
                                <td>{{$agreementFile['name']}}</td>
                                <td>{{$agreementFile['title']}}</td>
                                <td>
                                    @if (Auth::user()->hasRole('admins'))
                                    <select class='form-control status' id='status' 
                                            value='{{$agreementFile['status']}}' style='width: 60%'
                                            data-name='{{$agreementFile['metaKey']}}'>
                                        @foreach ($statusValues as $skey => $stat)
                                        <option {{$agreementFile['status'] && ($skey == $agreementFile['status']) ? 'selected="selected"' : ''}} value='{{$skey}}'>{{$stat}}</option>
                                        @endforeach
                                    </select> 
                                    @else 
                                    {{$statusValues[$agreementFile['status']]}}
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class=" dropdown-toggle" id="dropdownMenu1'.$agreementFile->id.'" 
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <i class='glyphicon glyphicon-menu-down'></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1'.$agreementFile->id.'">
                                            @if (Auth::user()->hasRole('admins'))
                                            <li>
                                                <a href="{{url('/hf/' . $id . '/agreement/' . $agreementFile['id'] . '/hide')}}">Hide</a>
                                            </li>
                                            <li>
                                                <a class='dr-file-upload' data-id='{{$agreementFile['metaKey']}}' data-dir='agreements'> Upload</a>
                                            </li>
                                            @endif
                                            @if (!empty($agreementFile['path']))
                                                <?php
                                                    $docArray = explode('.', $agreementFile['path']);
                                                    $extention = $docArray[count($docArray) - 1];
                                                ?>
                                                @if ($extention == 'docx')
                                                    <li><a href="{{ route('hf.download-document', [$id, $agreementFile['metaKey'],'doc'])}}" target="_blank">Download Doc</a></li>
                                                    <li>
                                                        <a href="{{ route('hf.download-document', [$id, $agreementFile['metaKey'],'pdf'])}}" target="_blank">Download PDF</a>
                                                    </li>
                                                @else
                                                    <li><a class='dr-file-download' data-href='{{$agreementFile['path']}}' target="_blank">Download</a></li>
                                                @endif
                                            @endif
                                        </ul>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @foreach($file['hidden_files'] as $agreementFile)
                            <tr class="bg-danger">
                                <td>{{$agreementFile['name']}}</td>
                                <td>{{$agreementFile['title']}}</td>
                                <td>
                                    @if (Auth::user()->hasRole('admins'))
                                    <select class='form-control status' id='status' 
                                            value='{{$agreementFile['status']}}' style='width: 60%'
                                            data-name='{{$agreementFile['metaKey']}}'>
                                        @foreach ($statusValues as $skey => $stat)
                                        <option {{$agreementFile['status'] && ($skey == $agreementFile['status']) ? 'selected="selected"' : ''}} value='{{$skey}}'>{{$stat}}</option>
                                        @endforeach
                                    </select> 
                                    @else 
                                    {{$statusValues[$agreementFile['status']]}}
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class=" dropdown-toggle" id="dropdownMenu1'.$agreementFile->id.'" 
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <i class='glyphicon glyphicon-menu-down'></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1'.$agreementFile->id.'">
                                            @if (Auth::user()->hasRole('admins'))
                                            <li>
                                                <a href="{{url('/hf/' . $id . '/agreement/' . $agreementFile['id'] . '/show')}}">Show</a>
                                            </li>
                                            <li>
                                                <a class='dr-file-upload' data-id='{{$agreementFile['metaKey']}}' data-dir='agreements'> Upload</a>
                                            </li>
                                            @endif
                                            @if (!empty($agreementFile['path']))
                                                <?php
                                                    $docArray = explode('.', $agreementFile['path']);
                                                    $extention = $docArray[count($docArray) - 1];
                                                ?>
                                                @if ($extention == 'docx')
                                                    <li><a href="{{ route('hf.download-document', [$id, $agreementFile['metaKey'],'doc'])}}" target="_blank">Download Doc</a></li>
                                                    <li>
                                                        <a href="{{ route('hf.download-document', [$id, $agreementFile['metaKey'],'pdf'])}}" target="_blank">Download PDF</a>
                                                    </li>
                                                @else
                                                    <li><a class='dr-file-download' data-href='{{$agreementFile['path']}}' data-key='{{$agreementFile['title']}}' target="_blank">Download</a></li>
                                                @endif
                                            @endif
                                        </ul>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @empty
                        @endforelse
                        @if (!count($document_list))
                        <tbody>
                            <tr>
                                <td colspan="4">No agreement available</td>
                            </tr>
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<hr />


<div class="row">
    <div class="col-lg-12">
        <div class="box box-default">
            <div class="box-body">
                <div class="">
                    <div class="box-header with-border margin-bottom">
                        <span class="f22">Data Room</span>
                        @if(Auth::user()->hasRole('admins') && 1==2)
                        <a data-toggle="modal" data-target="#messageInvestor" 
                           class="btn btn-sm cu-btn-sm btn-primary marL15">Message Investor</a>
                        @endif
                        <a href="{{url('/hf/') . '/' . $site->id . '/full-download'}}" 
                           class="btn btn-sm btn-primary pull-right" target="_blank">Download All</a>
                        
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body padL30">
                            <form id="jstree-form">
                                <input type="file" id="upload_file" name="upload_file" class="no-visibility" multiple="">
                                <input type="text" id="data-room-id" class="hide" name="data-room-id">
                                <input type="text" id="data-room-dir" class="hide" name="data-room-dir">
                            </form>
                            <div class="col-xs-12">
                                    
                                <button class='btn btn-sm btn-primary' id='expand_collapse' 
                                        data-key='expand' style="display: none;">Expand</button>
                                <div class="row pull-right">
                                    <div id="host-facilities-table_filter" class="dataTables_filter">
                                        <label>Search:
                                            <input type="search" class="search-input input-sm" placeholder="" aria-controls="host-facilities-table">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="jstree" style="margin-top: 55px;">
                                <div class="text-center">
                                    <i class="fa fa-spinner fa-spin fa-3x"></i> <br/> 
                                    <span class="f22"> Loading ...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title" id='modal-header'></h4>
            </div>
            <div class="modal-body" id='modal-body'>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="messageInvestor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Message Investor</h4>
            </div>
            <div class="modal-body">
                @if(count($project_users->toArray()))
                    <div class="alert alert-danger error-message-investor" style="display: none;"></div>
                    <p> Please select the investors you want to send a message to below</p>
                    <form class="form-horizontal table-responsive" id="messageInvestorForm" method="post"
                            action="{{route('hf.investor.send-message', ['id' => $site->id])}}">
                        <table class="table">
                            <tr>
                                <td>
                                    <input type="checkbox" name="select_all" id="select-all-users">
                                </td>
                                <td colspan="4">
                                    Select All
                                </td>
                            </tr>
                            @foreach($project_users as $user)

                            <tr>
                                <td>
                                    <input type="checkbox" name="users[]" class="select-user" value="{{$user->id}}">
                                </td>
                                <td>
                                    {{$user->first_name}}
                                </td>
                                <td>
                                    {{$user->last_name}} 
                                </td>
                                <td>
                                    {{$user->email}} 
                                </td>
                                <td>{{$user->company ? $user->company->name : ''}}</td>
                            </tr>
                            @endforeach
                        </table>
                        <div class="col-xs-12 form-group">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" class="form-control">
                        </div>
                        <div class="col-xs-12 form-group">
                            <label for="message">Message</label>
                            <textarea rows="4" name="message" class="form-control"></textarea>
                        </div>
                    </form>
                @else 
                No investors assigned to this project
                @endif
            </div>
            @if(count($project_users->toArray()))
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('general.button.cancel') }}</button>
                    <button type="button" id="sendMessage" class="btn btn-primary">Submit</button>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="modal" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-body">
        <div id="ajax_loader" class="text-center" style="margin-top: 19%">
            <img src="{{ url('/assets/themes/wisercapital/img/ajax-loader.gif')}}">
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="preview-file">
    <div class="modal-dialog" id="preview-file-modal-body">
        
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="confirm-delete-file-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">{{trans('hf/dialog.delete-file-confirm.title')}}</h4>
            </div>
            <div class="modal-body" id='modal-body'>
                {{trans('hf/dialog.delete-file-confirm.body')}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('general.button.cancel') }}</button>
                <button type="button" class="btn btn-danger file-delete">{{ trans('general.button.ok') }}</button>
            </div>
        </div>
    </div>
</div>

<div id="folder-box" class="folder-main-box" style="position: fixed;display:none;">test</div>
@endsection


<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
<script src="{{ asset ("/jstree/dist/jstree.min.js") }}"></script>
<script language="JavaScript">
    var data_id   = '';
    var data_dir  = '';
    var previous  = '';
    var file_name = '';
    var selected  = '';
    var xhr;
    function uploadAction() {
        data_id  = $(this).data('id');
        data_dir = $(this).data('dir');
        selected = $('#jstree').jstree('get_selected');
        $('#upload_file').click();
    }
    
    $('[id^=agreement_show_file_]').on('click', function () {
        var key = '.' + $(this).data('key');
        !$(key).is(':visible') ? $(key).show() : $(key).hide();
    });
    
    // jstree upload function
    $('#jstree').on('click', ".dr-file-upload", uploadAction);
    // agreements upload function
    $('.dr-file-upload').click(uploadAction);
    // on click remove previous value
    $('#upload_file').on('click', function () {
        this.value = null;
    })
        // upload file function
    $('#upload_file').on('change', function () {
        $('#pleaseWaitDialog').modal('show');
        $('#data-room-id').val(data_id);
        $('#data-room-dir').val(data_dir);
        var formData = new FormData($('#jstree-form')[0]);
        $.ajax({
            'url'       : '/api/hf/{{ $id }}/upload-files',
            'data'      : formData,
            'method'    : 'POST',
            processData : false,
            contentType : false,
            dataType    : 'json',
            'success'   : function (response) {
                $('#pleaseWaitDialog').modal('hide');
                var className = '';
                var title = '';
                if (response.success) {
                    if (data_dir != '{{\App\Models\Agreement::AGREEMENTS}}') {
                        if (response.treeStructure) {
                            $('#jstree').jstree('create_node', selected, response.treeStructure, 'last');
                            $('#jstree').jstree('open_node', selected);
                        }
                    }
                    className = 'bg-success';
                    title = 'Success Message';
                } else {
                    className = 'bg-error';
                    title = 'Error Message';
                }
                $('#myModal .modal-header').addClass(className);
                $('#myModal #modal-header').html(title);
                $('#myModal #modal-body').html(response.message);
                $('#myModal').modal('show');
                if (response.success && (data_dir == '{{\App\Models\Agreement::AGREEMENTS}}')) {
                    $('#myModal').on('hidden.bs.modal', function () {
                        location.reload();
                    }); 
                }
            },
        });
    });
    function downloadAction() {
        $('.modal').modal('hide');
        $('#pleaseWaitDialog').modal('show');
        selected = $('#jstree').jstree('get_selected');
        if ($(this).data('href')) {
            $.ajax({
                url:'/hf/facility-file-download',
                data: {'file_path': $(this).data('href'), 'dir' : $(this).data('dir'), 
                        'fileName' : $(this).data('key'), 'site_id' : "{{ $id }}"},
                type:'GET',
                success:function(response){
                    $('#pleaseWaitDialog').modal('hide');
                    if (response.error) {
                        $('#myModal .modal-header').addClass('bg-error');
                        $('#myModal #modal-header').html('Error Message');
                        $('#myModal #modal-body').html(response.message);
                        $('#myModal').modal('show');
                        $('#jstree').jstree('delete_node', selected);
                        return;
                    }
                    $("<a class='hide download-anchor'>").attr("href", response.path)[0].click();
                    $('.download-anchor').remove();

                }
            });
        }
    }
    // jstree download function
    $('#jstree').on('click', ".dr-file-download", downloadAction);
    $('#preview-file-modal-body').on('click', "#download-file", downloadAction);
    // agreements download function
    $(".dr-file-download").on('click', downloadAction);
    $('#jstree').on('click', ".dr-file-delete", function () {
        data_dir  = $(this).data('dir');
        file_name = $(this).data('key');
        selected = $('#jstree').jstree('get_selected');
        $('#confirm-delete-file-modal').modal('show');
    });
    // jstree upload function
    $('#confirm-delete-file-modal').on('click', ".file-delete", function () {
        $('#confirm-delete-file-modal').modal('hide');
        $('#pleaseWaitDialog').modal('show');
        $.ajax({
            'url'       : '/hf/{{ $id }}/delete-file',
            'data'      : {'_method': 'delete', '_token' : "{{csrf_token()}}", 
                            'dir' : data_dir, 'fileName' : file_name},
            'method'    : 'POST',
            'success'   : function (response) {
                $('#pleaseWaitDialog').modal('hide');
                var className = '';
                var title = '';
                if (response.success) {
                    $('#jstree').jstree('delete_node', selected);
                    className = 'bg-success';
                    title = 'Success Message';
                } else {
                    className = 'bg-error';
                    title = 'Error Message';
                }
                $('#myModal .modal-header').addClass(className);
                $('#myModal #modal-header').html(title);
                $('#myModal #modal-body').html(response.message);
                $('#myModal').modal('show');
            },
        });
    });
    
    // capture previous status
    $('.status').on('focus', function () {
        previous = $(this).val();
    });
    // change status request
    $('.status').on('change', function () {
        $('#pleaseWaitDialog').modal('show');
        element = this;
        $(element).attr('disabled', true);
        $.ajax({
            url  :'/api/hf/{{$id}}/change-agreement-status',
            type :'POST',
            data : {'value' : $(element).val(), 'status_for' : $(element).data('name')},
            success :function(data){
                if (data.status == 'bg-danger') {
                    $('#pleaseWaitDialog').modal('hide');
                    $(element).attr('disabled', false);
                    $(element).val(previous);
                    $('#myModal .modal-header').removeClass('bg-danger');
                    $('#myModal .modal-header').removeClass('bg-success');
                    $('#myModal .modal-header').addClass(data.status);
                    $('#myModal #modal-header').html(data.title);
                    $('#myModal #modal-body').html(data.message);
                    $('#myModal').modal('show');
                    return;
                }
                location.reload();
            }
        });
    });
    $(".search-input").keyup(function() {

        var searchString = $(this).val();
        $('#jstree').jstree('search', searchString);
    });

    //fetch jstree data
    var loadJSTree = function () {
        $("#jstree").bind("loaded.jstree", function(event, data) {
            //data.instance.open_all();
        });
        $.ajax({
            "url" : '/hf/{{ $id }}/dataroom-files',
            "method" : "GET",
            "data" : {'id': "{{ $id }}", "_token" : "{{csrf_token()}}"},
            "success" : function (response) {
                $('#jstree').jstree({
                    'core' : {
                        "check_callback" : true,
                        'data' : response
                    },
                    "search" : {  
                        "case_insensitive" : true,  
                        "show_only_matches" : false,
                        "append" : false,
                    },
                    "plugins": ["search"]
                });
                
                $('#expand_collapse').show();
            }
        })
        
    }
    $('#jstree').on('mouseover', '.jstree-file', function (e) {
        var element = $(this).closest('a').find('a:first-child');
        if (!element.data('timestamp')) {
            return;
        }
        xhr = {falseXhr : true, readyState: 100};
        var left  = e.clientX  + "px";
        var top  = e.clientY  + "px";

        var div = document.getElementById('folder-box');

        div.style.left = left;
        div.style.top = top;
        $("#folder-box").html('<div class="folder-box"><div>' + 
                        element.data('timestamp') + '</div></div>');
        div.style.display = "block";
        setTimeout(function () {
            xhr = {falseXhr : true, readyState: 4};
        }, 200);
    });
    
    $('#jstree').on('click', '[id^=file-preview-]', function () {
        
        var fileName = $(this).data('key');
        $('#pleaseWaitDialog').modal('show');
        
        var splitFile = fileName.split(".");
        var extension = splitFile[splitFile.length - 1];
        var extensions = ['pdf', 'png', 'txt', 'gif', 'jpg', 'jpeg', 'doc', 'docx'];
        if (extensions.indexOf(extension) >= 0) {
            if(xhr && (xhr.readyState !== 4)) {
                xhr.abort();
            }
            xhr = $.ajax({
                url:'/hf/facility-file-preview',
                data: {'file_path': $(this).data('href'), 'dir' : $(this).data('dir'), 
                        'fileName' : fileName, 'site_id' : "{{ $id }}"},
                type:'GET',
                success:function(response){
                    $('#pleaseWaitDialog').modal('hide');
                    if (response) {
                        $('#preview-file-modal-body').html("<iframe src='" + 
                            response + "' width='" + (($(window).width() / 2) - 200) + 
                            "' height='" + ($(window).height() - 50) + "' allowfullscreen webkitallowfullscreen></iframe>");
                        $('#preview-file').modal('show');
                    }
                }
            });
        } else {
            $('#preview-file-modal-body').html('<div class="modal-content"><div ' +
                'class="modal-body"><div class="row"><button type="button" class="close marT-20"' + 
                ' data-dismiss="modal"><i class="fa fa-times-circle-o"></i></button><div class="row">' +
                '<div class="col-xs-6 text-center pad-v-30 margin-top"><img src="' + 
                '{{url("/jstree/dist/themes/file/file-icon.png")}}' + 
                '" /></div><div class="col-xs-6 pad-v-30 margin-top">' +
                '<h3 class="pad-v-30 popup-file-heading margin-top">' + fileName + 
                '</h3><a class="btn btn-sm btn-default" id="download-file"' +
                ' data-href="' + $(this).data('href') + '" data-key="' + fileName +
                '" data-dir="' + $(this).data('dir') + '">Download this file</a>' +
                '</div></div></div></div></div></div>');
                $('#pleaseWaitDialog').modal('hide');
                $('#preview-file').modal('show');
        }
    });
    $('body').on('mouseover', function(e) {
        if(!xhr || (xhr.readyState === 4)) {
            var div = document.getElementById('folder-box');
            div.style.display = "none";
        }
    });
    
    var previewFolder = function (e) {
        var element = $(this).closest('a').find('span');
        if (!element.data('key')) {
            var element = $(this).closest('a').find('a:first-child');
        }
        
        if(xhr && (xhr.readyState !== 4)) {
            xhr.falseXhr ? '' : xhr.abort();
        }
        var left  = e.clientX  + "px";
        var top  = e.clientY  + "px";

        var div = document.getElementById('folder-box');

        div.style.left = left;
        div.style.top = top;
        $("#folder-box").html("<i class='fa fa-spinner'></i>");
        xhr = $.ajax({
            url: '/api/hf/{{$id}}/get/files',
            data: {'key': element.data('key'), 'dir' : element.data('dir')},
            type:'GET',
            success: function(response) {
                html = '<div class="folder-box">';
                if (response.length) {
                    html += '<ul>';
                    $.each(response, function (index, value) {
                        html += '<li>' + value + '</li>';
                    });
                    html += '</ul>';
                } else {
                    html += '<div>Folder empty</div>';
                }
                $("#folder-box").html(html + '</div>');
                div.style.display = "block";
            }
        });
    }
    $('#jstree').on('mouseover', '.jstree-custom-default-theme-icon', previewFolder);
    $('#jstree').on('mouseover', '.jstree-custom-root-theme-icon', previewFolder);
    
    $(document).ready(function () {
        loadJSTree();
    });
    
    // Listen for click on toggle checkbox
    $('#select-all-users').click(function(event) {  
        var checkedUsers = this.checked;
        // Iterate each checkbox
        $('.select-user').each(function() {
            this.checked = checkedUsers ? true : false;                        
        });
    });
    
    var expand = 'expand';
    var contract = 'contract';
    $('#expand_collapse').on('click', function () {
        if ($(this).data('key') === expand) {
            $("#jstree").jstree('open_all');
            var string = contract;
        } else {
            $("#jstree").jstree('close_all');
            var string = expand;
        }
        $(this).data('key', string);
        $(this).html(string.charAt(0).toUpperCase() + string.slice(1));
    });
    
    $('#sendMessage').on('click', function () {
        var checked = false;
        $('.select-user').each(function() {
            checked = !checked ? this.checked : checked;                        
        });
        
        if (!checked) {
            $('.error-message-investor').html("{{trans('hf/general.messages.select-investor')}}");
            $('.error-message-investor').show();
            return;
        }
        if (!$('[name=subject]').val() || !$('[name=message]').val()) {
            $('.error-message-investor').html("{{trans('hf/general.messages.required-subject-message')}}");
            $('.error-message-investor').show();
            return;
        }
        
        $('input[name="_token"]').remove();
        $('#messageInvestorForm').append('{{csrf_field()}}');
        $('#messageInvestorForm').submit();
    });

</script>
@endsection
