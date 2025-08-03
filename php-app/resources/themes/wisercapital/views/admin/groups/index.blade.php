@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <p><a href="{{ route('groups.create') }}"><button type="button" class="btn  btn-primary"> Add Group</button></a></p>

        </div>
    </div>
    <div class="row">
        {{--<div class="col-lg-3">

        </div>--}}
        <div class="col-lg-12">
            <div class="box box-default">


                <div class="box-body">
                    <div class="table-responsive" style="overflow-x: visible ">
                        <table  id="groups-table" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Is Shared</th>
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
            $('#groups-table').DataTable({
                processing: true,
                serverSide: true,
                "pageLength": 25,
                "scrollX": false,
                ajax: '{!! route('groups.datatable') !!}',
                columns: [
                    { data: 'name' },
                    { data: 'is_shared'},
                    { data: 'action' }

                ]
            });
        });
    </script>
@endsection
