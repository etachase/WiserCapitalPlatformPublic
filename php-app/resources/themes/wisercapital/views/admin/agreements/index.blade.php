@extends('layouts.master')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
                <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('admin/agreements/general.page.index.table-title') }}</h3>
                    &nbsp;
                    <a class="btn btn-default btn-sm" href="{!! route('admin.agreements.create') !!}" title="{{ trans('admin/agreements/general.button.create') }}">
                        <i class="fa fa-plus-square"></i>
                    </a>

                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">

                    <div class="table-responsive">
                        <table class="table table-hover f15" style="color: #505050" id="agreement-datatable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>
                                        <a class="btn pad0" href="#" onclick="toggleCheckbox(); return false;" title="{{ trans('general.button.toggle-select') }}">
                                            <i class="fa fa-check-square-o"></i>
                                        </a>
                                    </th>
                                    <th>{{ trans('admin/agreements/general.columns.name') }}</th>
                                    <th>{{ trans('admin/agreements/general.columns.project_title') }}</th>
                                    <th>{{ trans('admin/agreements/general.columns.agreements') }}</th>
                                    <th>{{ trans('admin/agreements/general.columns.position_index') }}</th>
                                    <th>{{ trans('admin/agreements/general.columns.actions') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>
                                        <a class="btn pad0" href="#" onclick="toggleCheckbox(); return false;" title="{{ trans('general.button.toggle-select') }}">
                                            <i class="fa fa-check-square-o"></i>
                                        </a>
                                    </th>
                                    <th>{{ trans('admin/agreements/general.columns.name') }}</th>
                                    <th>{{ trans('admin/agreements/general.columns.project_title') }}</th>
                                    <th>{{ trans('admin/agreements/general.columns.agreements') }}</th>
                                    <th>{{ trans('admin/agreements/general.columns.position_index') }}</th>
                                    <th>{{ trans('admin/agreements/general.columns.actions') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div> <!-- table-responsive -->

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->
    <div class="modal" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-body">
            <div id="ajax_loader" class="text-center" style="margin-top: 19%">
                <img src="{{ url('/assets/themes/wisercapital/img/ajax-loader.gif')}}">
            </div>
        </div>
    </div>
@endsection


            <!-- Optional bottom section for modals etc... -->
@section('body_bottom')
    <script language="JavaScript">
        function toggleCheckbox() {
            checkboxes = document.getElementsByName('chkAgreement[]');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = !checkboxes[i].checked;
            }
        }
        
        @if(count($agreements))
            table2 = $('#agreement-datatable').DataTable({
                processing  : true,
                serverSide  : true,
                pageLength  : 100,
                scrollX     : false,
                bSort       : false,
                paging      : false,
                info        : false,
                bFilter     : false,
                ajax        : '{!! route("admin.agreements.datatable") !!}',
                "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $(nRow).children().each(function (index, td) {
                        if(index ==0)
                            $(this).addClass('agreement-details-control');
                    });
                },
                columns     : [
                    {data : 'extend'},
                    {data : 'checkbox'},
                    {data : 'name'},
                    {data : 'project_name'},
                    {data : 'agreements'},
                    {data : 'agreement_position'},
                    {data : 'action'}
                ]
            });
        @endif
        
        $('#agreement-datatable tbody').on('click', 'td.agreement-details-control', function () {
	    var tr = $(this).closest('tr');
            var row = table2.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child(formatPortfolio(row.data())).show();
                tr.addClass('shown');
            }
        });
        
        
        function formatPortfolio(d) {
            if (d.all_files.length) {
                var html = '<div class="margin"><span class="box-title f22 font-bold">Files in Agreement ' +
                            '</span>&nbsp;<a class="btn btn-default btn-sm marT-10"' +
                            'href="' + "{!! url('/admin/agreement-files') !!}" + '/' + d.id + '/create"' +
                            'title="{{ trans('admin/agreement-file/general.button.create') }}">' +
                            '<i class="fa fa-plus-square"></i></a><a class="btn btn-default btn-sm"'+
                            'href="' + "{!! url('/admin/agreement-files') !!}" + '/' + d.id + '/enabledAll"' +
                            'title="{{ trans('general.button.enable') }}">' +
                            '<i class="fa fa-check-circle-o"></i></a><a class="btn btn-default btn-sm"' +
                            'href="' + "{!! url('/admin/agreement-files') !!}" + '/' + d.id + '/disabledAll"' +
                            'title="{{ trans('general.button.disable') }}">' +
                            '<i class="fa fa-ban"></i></a></div>' +
                        '<table class="table table-hover uni-table table-condensed" '+
                        'style="border: 1px solid #f4f4f4; padding-left:50px;">'+
                        '<thead><tr><th>Name</th><th>Document</th><th>Actions</th></tr></thead>';

                for (var i = 0; i < d.all_files.length; i++) {
                    html = html + '<tbody><tr><td>'  + d.all_files[i].name + '</td>' +
                            '<td>'  + d.all_files[i].file_name + '</td><td>' +
                                '<a href="' + "{{url('admin/agreement-files')}}/" + d.all_files[i].id + '/edit' + 
                                    '" title="' + "{{trans('general.button.edit')}}" + 
                                    '"><i class="fa fa-pencil-square-o"></i></a> ' +
                                '<a class="download-file" data-id="' + d.all_files[i].id + '" title="' + 
                                    "{{trans('admin/agreement-file/general.button.download')}}" + 
                                    '"><i class="fa fa-download text-primary"></i></a> ';
                            
                    if (d.all_files[i].is_enabled) {
                        html = html + '<a href="' + "{{url('admin/agreement-files')}}/" + 
                                d.all_files[i].id + '/disable" title="' + 
                                "{{trans('general.button.disable')}}" + 
                                '"><i class="fa fa-check-circle-o enabled"></i></a> ';
                    } else {
                        html = html + '<a href="' + "{{url('admin/agreement-files')}}/" + 
                                    d.all_files[i].id + '/enable" title="' + 
                                    "{{trans('general.button.enable')}}" + 
                                    '"><i class="fa fa-ban disabled"></i></a> ';
                    }
                    html = html + '<a href="' + "{{url('admin/agreement-files')}}/"
                                    + d.all_files[i].id + '/confirm-delete' + 
                                    '" data-toggle="modal" data-target="#modal_dialog"' +
                                    ' title="' + "{{trans('general.button.delete')}}" + 
                                    '"><i class="fa fa-trash-o deletable"></i></a>' +
                                    '</td></tr></tbody>';
                }

                return html + "</table>";
            } else {
                window.location.href = "/admin/agreement-files/" + d.id + '/create';
            }
        }
        
        
        $('#agreement-datatable').on('click', '.download-file', function () {
            $('#pleaseWaitDialog').modal('show');
            $.ajax({
                url: "/admin/agreement-files/" + $(this).data('id') + '/download',
                type:'GET',
                success:function(response){
                    $('#pleaseWaitDialog').modal('hide');
                    if (response.error) {
                        window.location.reload();
                        return;
                    }
                    $("<a class='hide download-anchor'>").attr("href", response.path)[0].click();
                    $('.download-anchor').remove();

                }
            });
        });

    </script>
@endsection
