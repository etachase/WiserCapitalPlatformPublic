<div class="row tiles-view space-block">
    <div class="col-md-12">
        <h4 class="add-margin30">{{$id ? 'Solar Installer' : 'All'}} Projects</h4>
    </div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="box box-default">
		    <div class="box-body">
		        <div class="table-responsive" style="overflow-x: visible ">
		            <table  id="host-facilities-table" class="table table-hover uni-table">
		                <thead>
		                    <tr>
		                        <th>Favorite</th>
		                        <th>ID</th>
		                        <th>Name</th>
		                        <th>Location</th>
		                        <th>Size (kW)</th>
		                        <th>Status</th>
		                        <th>Action</th>
		                    </tr>
		                </thead>
		            </table>
				</div> <!-- table-responsive -->
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>




<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
@parent
<script language="JavaScript">


    $(function () {

        $('#host-facilities-table').DataTable({
            order       : [[ 1, "desc" ], [ 0, "desc" ]],
            processing  : true,
            serverSide  : true,
            pageLength  : 25,
            scrollX     : false,
            ajax        : '{!! route('hf.datatable', ['solar_installer_id' => (isset($id) ? $id : 0)]) !!}',
            columns     : [
                {data : 'favorite'},
                {data : 'id'},
                {data : 'name'},
                {data : 'address',
                    "render" : function (field, type, data, meta) {
                        return data.address + ", " + data.city + ", " + data.state + " " + data.zip_code;
                    }
                },
                {data : 'address',
                    "render" : function (field, type, data, meta) {
                        return data.meta_data.system_size;
                    }
                },
                {data : 'status'},
                {data : 'action'}

            ]
        });
    });
    var previous = '';
    // capture previous status
    var statusPrevious = function (event) {
        previous = $(event).val();
    }
    // change status request
    var statusSelected = function (event) {
        $(event).attr('disabled', true);
        $.ajax({
            url: '/api/hf/' + $(event).data('id') + '/change-site-status',
            type: 'POST',
            data: {'status': $(event).val()},
            success: function (data) {
                $(event).attr('disabled', false);
                (data.status == 'bg-danger') ? $(event).val(previous) : '';
                $('.modal-header').removeClass('bg-danger');
                $('.modal-header').removeClass('bg-success');
                $('.modal-header').addClass(data.status);
                $('#modal-header').html(data.title);
                $('#modal-body').html(data.message);
                $('#myModal').modal('show');
            }
        });
    };
    $('#host-facilities-table').on('click', "[id^=favorite-site-icon]", addFavorite);

</script>
@endsection
