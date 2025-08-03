@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <p><a href="{{ route('inputs.add') }}"><button type="button" class="btn  btn-primary"> Add Global Input</button></a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-default">


                <div class="box-body">
                    <div class="table-responsive" style="overflow-x: visible ">
                        <table  id="globals-inputs-table" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Low</th>
                                <th>High</th>
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
            $('#globals-inputs-table').DataTable({
                processing: true,
                serverSide: true,
                "pageLength": 25,
                "scrollX": false,
                ajax: '{!! route('inputs.datatable') !!}',
                columns: [
                    { data: 'name' },
                    { data: 'description' },
                    { data: 'low'},
                    { data: 'high' },
                    { data: 'action' }

                ]
            });
        });
    </script>
@endsection
