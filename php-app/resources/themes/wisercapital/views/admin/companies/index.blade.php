@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <p><a href="{{ route('companies.create') }}"><button type="button" class="btn  btn-primary"> Add Company</button></a></p>

        </div>
    </div>
    <div class="row">
        {{--<div class="col-lg-3">

        </div>--}}
        <div class="col-lg-12">
            <div class="box box-default">


                <div class="box-body">
                    <div class="table-responsive" style="overflow-x: visible ">
                        <table  id="companies-table" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Entity Type</th>
                                <th>Facility Information Shared</th>
                                <th>EXECUTED AGREEMENTS</th>
                                <th width="30">Action</th>
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
            $('#companies-table').DataTable({
                processing: true,
                serverSide: true,
                "pageLength": 100,
                "scrollX": false,
                ajax: '{!! route('companies.datatable') !!}',
                columns: [
                    { data: 'name' },
                    { data: 'entity_type' },
                    { data: 'is_shared'},
                    { data: 'executed_agreement'},
                    { data: 'action' }

                ]
            });
        });
    </script>
@endsection
