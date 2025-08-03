@section('head_extra')
@parent
<style>
     
    .project-block .delete_project{
        visibility:hidden;
        position: absolute;
        margin-left: 99.5%;
        margin-top: -8.5%;
        z-index: 20;
        color: rgba(85, 96, 104, 0.59);
    }
    .project-block:hover .delete_project {
       visibility:visible;
    }
    
      
   .project-block {margin-bottom: 30px !important; }
   
</style>


@endsection


<div class="row space-block">
	<div class="col-lg-6">
    	<h4 style="color: #7e7e7e;">All Projects</h4>
	</div>
	<div class="col-md-6">
    	{!! Form::open(['method'=>'GET','url'=> url('hf'),'class'=>'pull-right','role'=>'search', 'id' => 'form-search'])  !!}
    	<div class="input-group custom-search-form">
        	{!! Form::text('search', $search, ['class'=>'form-control pull-right', 'placeholder' => 'Search...', 'id' => 'search-input']); !!}
		</div>
    	{!! Form::close() !!}
	</div>
</div>     


<div class="row project-grid-container" style="margin-bottom: 80px;">
	@foreach($site as $s)
		<div class="col-lg-3" data-toggle="popover" data-placement="auto right" title="" data-original-title="Project Summary">
			<div class="project-block">
				
				<a data-toggle="modal" data-target="#modal_dialog" class="delete_project" title="" href="{{ url(route('hf.confirm-delete', ['id' => $s->id])) }}">
					<i class="fa fa-times-circle-o fa-2x"></i>
				</a>
        
        
				<h2 class="project-title">
					<a href="{{ url(route('hf.facility-profile', ['id' => $s->id])) }}"> {{ Helper::strLength($s->name, 23) }} </a>
		                             
            	
            	@if($s->favorite)
            		<a href="{{ url(route('user.favorite.projects.delete', ['id' => $s->favorite_id])) }}" title="" class='pull-right' style='color: white !important;'>
	            		<i class="fa fa-star"></i>
	            	</a>
            	@else
            		<form action="{{ url(route('user.favorite.projects.store', ['id' => $s->id])) }}" method="POST" id="favorite-site-{{$s->id}}" class='pull-right'>
	                	<input type="hidden" name="_token" /><i class="fa fa-star-o" data-id='{{$s->id}}' id="favorite-site-icon-{{$s->id}}" style="cursor:pointer"></i>
	                </form> 
	            @endif
            	
            
	            
            
            	</h2>
            	
			<div class="project-entry">
            	<div class="project-address">
                	{{ $s->address }} 
                <br />
                {{ $s->city }}, {{ $s->state }}  {{ $s->zip_code }} 
            	</div>
            
            <ul class="project-data-list">
                <li><span class="tag">Size (kW)</span> <br> {{ $s->getMeta('system_size') }}</li>
                @if(!$s->isFIT())
                	<li><span class="tag">kWh</span> <br><small>$</small>{{ $s->getMeta('current_electric_pricing') }}</li>
                @endif
                <li><span class="tag">Utility</span> <br> {{ $s->getUtility() }}</li>
            </ul>
            
            <div class="row project-detail-wrapper">
            	<div class="col-lg-12">
	            	<div class="project-status"><span class="tag light">WISER STATUS</span> 
		            	<p> {{$s->getProjectStatus()}} </p>
		            </div>
            	</div>
            </div>
            
            <div class="project-edited-date">Last updated on {{ date_format($s->updated_at, 'F d') }}</div>
            
           
        </div>
    </div>
</div>
	@endforeach
</div>
 
@if(count($site) == 0)
<div class="row">
	<div class="col-lg-12">
    	<p>No projects found based on your search term...</p>
	</div>
</div>     
@endif


<div class="row">
	<div class="col-lg-12">
		{!! $site->render() !!}
	</div>	
</div>









<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
@parent



<script language="JavaScript">
	
$(document).ready(function () {
    
    var addFavorite = function () {
        $('input[name=_token]').val('{{csrf_token()}}');
        $('#favorite-site-' + $(this).data('id')).submit();
    }
    
 	$(".project-block").on('click', '[id^=favorite-site-icon]', addFavorite);
        
    
   $('.project-grid-container').each(function(){  
      
      // Cache the highest
      var highestBox = 0;
      
      // Select and loop the elements you want to equalise
      $('.project-detail-wrapper', this).each(function(){
        
        // If this box is higher than the cached highest then store it
        if($(this).height() > highestBox) {
          highestBox = $(this).height(); 
        }
      
      });  
            
      // Set the height of all those children to whichever was highest 
      $('.project-detail-wrapper',this).height(highestBox);
                    
    });
    
    $('#search-input').keypress(function (e) {
        var key = e.which;
        if(key == 13) {
           $('#form-search').submit();
           return false;  
        }
    }); 
    
    $(".project-list").on('click', '[id^=favorite-site-icon]', addFavorite);
    
    
});
    


</script>


@endsection
