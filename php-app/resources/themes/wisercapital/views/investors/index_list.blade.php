@section('head_extra')
@parent
<style>
.dataTable > thead > tr > th[class*="sort"]:after{
    content: "" !important;
}
</style>


@endsection


@if(count($portfolios))

<div class="row space-block">
	<div class="col-lg-12">
    	<h4 style="color: #7e7e7e;">Portfolios</h4>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="box box-default">
		    <div class="box-body">
		        <div class="table-responsive table-condensed" style="overflow-x: visible">
		            <table id="portfolio-datatable" class="table table-hover uni-table table-condensed">
		                <thead style="background: #3d464c;">
		                    <tr>
								<th></th>
		                        <th>Portfolio Name</th>
		                        <th>Total System Size</th>
		                        <th>Paid Price</th>
		                        <th>Esc.</th>
		                        <th>All in Cost <small>($/W)</small></th>
		                        <th>Total Production</th>
		                        <th>Total Term</th>
		                        <th></th>
		                </thead>
		                <tbody>
		                </tbody>
		            </table>
		
		        </div> <!-- table-responsive -->
		    </div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>

<hr />


@endif


<div class="row space-block">
	<div class="col-lg-12">
    	<h4 style="color: #7e7e7e;">All Projects</h4>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="box box-default">
		    <div class="box-body">
		        <div class="table-responsive" style="overflow-x: visible">
		            <table id="host-facilities-table" class="table table-hover uni-table table-condensed">
		                <thead>
		                    <tr>
		                        <th></th>
		                        <th>Favorite</th>
		                        <th>Name</th>
		                        <th>Location</th>
		                        <th>System Size</th>
		                        <th>Paid Price</th>
		                        <th>Esc.</th>
		                        <th>All in Cost <small>($/W)</small></th>
		                        <th>Term</th>
		                        <th>WSAR Score</th>
		                        <th>Status</th>
		                    </tr>
		                </thead>
		                <tbody>
		                </tbody>
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
	    
	   
	   @if(count($portfolios))
	   
	   table2 = $('#portfolio-datatable').DataTable({
            processing  : true,
            serverSide  : true,
            pageLength  : 100,
            scrollX     : false,
            bSort 		: false,
            paging 		: false,
            info		: false,
            bFilter		: false,
            ajax        : '{!! route('investor.datatable-portfolio') !!}',
            "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
		        $(nRow).children().each(function (index, td) {
			    	if(index ==0)
			        	$(this).addClass('portfolio-details-control');
				});
		     },
            columns     : [
                {data : 'extend'},
                {data:	'name'},
                {data : 'total_system_size'},
                {data : 'paid_price'},
                {data : 'esc'},
                {data : 'all_in_epc_cost'},
                 {data : 'total_production'},
                {data : 'term'},
                {data : 'delete'}
            ]
        });
        
        @endif
        
	    
       table = $('#host-facilities-table').DataTable({
            order       : [[ 2, "desc" ], [ 1, "desc" ]],
            processing  : true,
            serverSide  : true,
            pageLength  : 25,
            scrollX     : false,
            ajax        : '{!! route('investor.datatable') !!}',
            "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
		      	$(nRow).children().each(function (index, td) {
			    	if(index ==0)
			        	$(this).addClass('details-control');
				});
		     },
            columns     : [
                {data : 'extend'},
                {data : 'favorite'},
                {data : 'name'},
                {data : 'address',
                    "render" : function (field, type, data, meta) {
                        return data.address + ", " + data.city + ", " + data.state + " " + data.zip_code;
                    }
                },
                {data : 'system_size',
                    "render" : function (field, type, data, meta) {
                        return data.meta_data.system_size + ' kW';
                    }
                },
                {data : 'paid_price'},
                {data : 'esc'},
                {data : 'all_in_epc_cost'},
                {data : 'term'},
                {data : 'wsar_score'},
                {data : 'status'}
            ]
        });
    
        
    
    });
    
    
    $('#host-facilities-table tbody').on('click', 'td.details-control', function () {
	    var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );


function format ( d ) {
  
   
    return '<h4>Project Summary</h4><table width="300" class="table table-hover uni-table" style="  border: 1px solid #f4f4f4; padding-left:50px;">'+
        '<tr>'+
            '<th width="120">Production</th>'+
            '<td> '+d.production+' </td>'+
       '</tr>'+
            '<th>Facility Type</th>'+
            '<td> '+d.facility_type+' </td>'+
        '</tr>'+    
            '<th>System Type</th>'+
            '<td> '+d.system_location+' </td>'+
       '</tr>'+     
           '<th>Agreement Type</th>'+
            '<td> '+d.agreement_type+' </td>'+
        '</tr>'+
            '</table>';
}



	$('#portfolio-datatable tbody').on('click', 'td.portfolio-details-control', function () {
	    var tr = $(this).closest('tr');
        var row = table2.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( formatPortfolio(row.data()) ).show();
            tr.addClass('shown');
        }
    } );


function formatPortfolio ( d ) {
    var html;
    html = '<h4>Projects in Portfolio</h4><table class="table table-hover uni-table table-condensed" style="border: 1px solid #f4f4f4; padding-left:50px;">'+
        '<thead><tr>'+
            '<th>Project Name</th>'+
            '<th>System Size</th>'+
            '<th>Paid Price/PPA Price</th>'+
            '<th>All In Cost <small>($/W)</small></th>'+
            '<th>Term</th>'+
            '<th>WSAR Score</th>'+
        '</tr></thead>';
        
    
     
	for (var i = 0; i < d.sites.length; i++) {
		//d.sites[i].id;
	   
	    html=html + 
	    '<tbody><tr>'+
            '<td>'  + d.sites[i].name + '</td>' +
            '<td>'  + d.sites[i].system_size + ' kW</td>' +
            '<td>'  + d.sites[i].paid_price+ '</td>' +
            '<td>'  + d.sites[i].all_in_epc_cost + '</td>' +
            '<td>'  + d.sites[i].term + '</td>' +
            '<td>'  + d.sites[i].wsar_score + '</td>' +
        '</tr></tbody>';
        
        
	    //Do something
	}
	
	 $html=html + "</table>";
	 return html;

    
}




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
