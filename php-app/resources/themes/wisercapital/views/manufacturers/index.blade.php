@extends('layouts.master')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="box box-default">

                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('manufacturers/general.page.index.title') }}</h3>
                    &nbsp;
                    <a class="btn btn-default btn-sm" href="{!! route('manufacturers.add') !!}" title="{{ trans('admin/agreements/general.button.create') }}">
                        <i class="fa fa-plus-square"></i>
                    </a>
                </div>
                <div class="box-body">
                    <div class="table-responsive" style="overflow-x: visible ">
                        <table  id="globals-assets-table" class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>

                    </div> <!-- table-responsive -->

                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection


<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
    <script language="JavaScript">


        $(function() {
            $('#globals-assets-table').DataTable({
                "processing": true,
				"serverSide": true,
                "scrollX": false,
				"pageLength": 100,
                "ajax": '{!! route("manufacturers.datatable") !!}',
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'asset_type', orderable: false, searchable: false  },
                    { data: 'action', orderable: false, searchable: false }

                ]
            });
        });
    </script>
@endsection
