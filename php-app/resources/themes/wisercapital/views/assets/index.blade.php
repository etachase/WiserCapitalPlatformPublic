@extends('layouts.master')

@section('content')


    <div class="row">
        <div class="col-lg-3">
            @foreach($type_mappings_view as $type_mapping_key => $type_mapping)
                <div style="padding: 10px; width:100%; border: 1px solid #ccc; text-align: center; font-weight: 700; background: #f2f2f2;">
                    <a href="{{ route('assets.add',$type_mapping) }}" style="color: #404040; ">Add {{ $type_mappings[$type_mapping_key] }}</a>
                </div>
            @endforeach
        </div>
        <div class="col-lg-9">
            <div class="box box-default">


                <div class="box-body">
                    <div class="table-responsive" style="overflow-x: visible ">
                        <table  id="globals-assets-table" class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Manufacturer</th>
                                <th>Model</th>
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
                "ajax": '{!! route('assets.datatable') !!}',
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'asset_type', orderable: false, searchable: false  },
                    { data: 'manufacturer', orderable: false, searchable: false},
                    { data: 'model' },
                    { data: 'action', orderable: false, searchable: false }

                ]
            });
        });
    </script>
@endsection
