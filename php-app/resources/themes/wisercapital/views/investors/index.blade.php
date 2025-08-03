@extends('layouts.master')

@section('content')


<div class="row block-header">
	<div class="col-lg-6">
		<button id="create-project-btn" type="button" class="btn btn-sm btn-edit" data-toggle="modal" data-target="#myModal">
		  Create Portfolio
		</button>
	</div>
	<div class="col-lg-6">
		<div class="select-view pull-right">
	        {!! Form::open(array('route' => array('user.project.list.view'),
	        'method' => 'post', 'id' => 'update_list')) !!}
	        <input type='hidden' name='view' />
	        {{csrf_field()}}
	        <a href='#' class="fa fa-th{{($view == 'grid' ? ' active' : '')}} view_update"
	           data-value='grid'></a>
	        <a href='#' class="fa fa-bars{{($view == 'list' ? ' active' : '')}} view_update"
	           data-value='list'></a>
	        {!! Form::close() !!}
	    </div>
	</div>
</div>

 



@include('investors.index_'. $view)




<!-- Modal -->
@include('investors.create_modal')




<div class="modal fade" id="modal-delete-dialog" tabindex="-1" role="dialog" aria-labelledby="modal_dialog_title" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
        </div>
    </div>
</div>



@endsection


<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
<script language="JavaScript">
    $('.view_update').on('click', function () {
        var view = $(this).data('value');
        $('input[name=view]').val(view);
        $('#update_list').submit();
    });
    var addFavorite = function () {
        $('input[name=_token]').val('{{csrf_token()}}');
        $('#favorite-site-' + $(this).data('id')).submit();
    }
    
    $('#portfolio-table input').on('change', function(){
	    //$('#portfolio-table .wsar-score').
	    var wsar_score = [];
	    var irr = [];
	    var system_size = [];
	    $('#portfolio-table').find('input[type="checkbox"]:checked').each(function () {
			wsar_score.push($(this).parent().parent().parent().find('.wsar-score').text());
			irr.push($(this).parent().parent().parent().find('.irr').text());
			system_size.push($(this).parent().parent().parent().find('.system-size').text());
		});
		
		if(wsar_score.length && irr.length)
		{
			var sum = 0;
			for (var i = 0; i < wsar_score.length; i++) {
				sum += wsar_score[i] << 0;
			}
	
			var avg = sum/wsar_score.length;
			$('#avg-wsar-score').text(Math.round(avg));
			
			
			var sum = 0;
			for (var i = 0; i < irr.length; i++) {
				sum += irr[i] << 0;
			}	
			var avg = sum/irr.length;
			$('#avg-irr').text(avg.toFixed(2) + "%");
			
			
			var sum = 0;
			for (var i = 0; i < system_size.length; i++) {
				sum += system_size[i] << 0;
			}
				
			$('#total-size').text(sum);
			
		}
		else
		{
			$('#avg-irr').text("");
			$('#avg-wsar-score').text("");
			$('#total-size').text("");
		}
		
    
    });
    
     $("#create-portfolio-modal-form").validate({
	            rules: {
	                name: "required"
	            },
	            submitHandler: function (form) {
	                form.submit();
	            }
	});


   


    
</script>
@endsection
