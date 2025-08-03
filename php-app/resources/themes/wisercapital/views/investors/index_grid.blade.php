@section('head_extra')
@parent
<style>
    .delete-portfolio {
        position: absolute;
		margin-left: 89%;
    	margin-top: -22%;
        z-index: 20;
		color:red;
    }
    .project-grid-container .delete-portfolio{
        visibility:hidden;
    }
    
    .project-grid-container:hover .delete-portfolio {
       visibility:visible;
    }
    
    .favorite {
	    background: #3d464c !important;
    }
    .delete-portfolio i {
	     color:rgba(85, 96, 104, 0.59) ;
    }
    
    .project-grid-container {margin-bottom: 30px; }
    
     tabls small {vertical-align: center; }
   
	.popover{
    	width:450px !important;
		max-width: 100%;
	}
	
	
	.portfolio-row .popover {
		width:580px !important;
		max-width: 100%;
	}
	

	
	.popover-summary {  
		background-color: rgba(249, 249, 249, .5);
		padding: 10px 20px;
		margin: 5px;
	}
	
	
	.popover-title {font-weight: lighter !important; }
	
	
	
	.list-inline {margin-left: 0px !important; }
	.list-inline li {padding: 0 !important; }
	 
	
	 .project-status
	 {
		 padding: 0px !important;
	 }
	 
	
	
	 
	 .project-data-container .tag {
		 color: #707070;
		 font-family: 'Futura-Heavy';
		 font-size: 12px !important;
	 }
	 
	 .project-data-container ul li {
		margin-right: 15px;
		font-size: 16px;
	 }

	 
	 .project-grid-wrapper
	 {
	
	    -moz-box-shadow: 0 2px 2px -1px #7f7f7f;
	    -webkit-box-shadow: 0 2px 2px -1px #7f7f7f;
	    box-shadow: 0 2px 2px -1px #7f7f7f;
	    position: relative;
		background: white;
	 }
	 
	 .project-data-wrapper
	 {
		background: #fcfcfc;	 
		border-top: 1px solid #E2E2E0;
		border-bottom: 1px solid #E2E2E0;
		padding: 10px 20px;
	 }
	 .project-data-wrapper p {
		 margin-bottom: 5px !important;
	 }
	 
	 .project-data-container-ext {
		 padding: 10px 20px;
	 }
	
</style>


@endsection

               


@if(count($portfolios))

<div class="row space-block">
	<div class="col-lg-12">
    	<h4 style="color: #7e7e7e;">Portfolios</h4>
	</div>
</div>     


<div class="row portfolio-row">
	
	@foreach($portfolios as $key => $portfolio)
		
		<div class="col-lg-3 project-grid-container" data-toggle="portfolio-popover" title="" data-original-title="Projects in Portfolio">
			
			<div class="row">
				<div class="col-lg-12">
					<h2 style="background: #3d464c;" class="project-title">
						<a href="#"> {{ Helper::strLength($portfolio->name, 23) }} </a>
					</h2>
					<a data-toggle="modal" class="delete-portfolio" data-placement="auto right" data-target="#modal-delete-dialog" title="Delete" href="{{ url(route('portfolio.confirm-delete', ['id' => $portfolio->id])) }}">
	            		<i class="fa fa-times-circle-o fa-2x"></i>
	        		</a>
	        	</div>
			</div>
			
			<div class="project-grid-wrapper">
			
				<div class="row project-data-container-ext">
					<div class="col-lg-12">
						Project in Portfolio: {{ count($portfolio->sites) }}
		            </div>
				</div>
			
				<div class="project-data-wrapper">
					<div class="row project-data-container">
						<div class="col-lg-12">
							<ul class="list-inline">
			                	<li><span class="tag">Size (kW)</span> <br> {{ number_format($portfolio->totalSystemSize(),0) }}</li>
								<li><span class="tag">Paid Price</span> <br>{{ $portfolio->avgPaidPrice() }}<small>¢</small></li>
								<li><span class="tag">Escalator</span> <br>{{ $portfolio->avgEsc() }}<small>%</small></li>
				        	</ul>
			            </div>
					</div>	
				    <div class="row project-data-container">
						<div class="col-lg-12">
				            	<div class="project-status"><span class="tag light">All In Cost ($/kW)</span> 
					            	<p><small>$</small>{{ $portfolio->getAvgAllInCost() }}</p>
					            </div>
			            	</div>
			            	<div class="col-lg-12">
				            	<div class="project-status"><span class="tag light">Term (Years)</span> 
					            	<p> {{ $portfolio->totalTerm() }} </p>
					            </div>
			            	</div>
			            	<div class="col-lg-12">
				            	<div  class="project-status"><span class="tag light">Total Production</span> 
									<p>{{ number_format($portfolio->totalProduction()) }} <small>kWh/Year</small></p>
					            </div>
			            	</div>
					</div>		   
			    </div>
			  
		        <div class="row project-data-container-ext">
						<div class="col-lg-12">
						
						<a href=" {{ route('hf.download-document', [$portfolio->id, (isset($termSheet->key) ? $termSheet->key : 0).'_'.$termSheet->id, 'pdf', 1]) }}" target="_BLANK">
			   				<span style="color: #91a1ad;" class="glyphicon glyphicon-file" aria-hidden="true"></span>
			   				Term Sheet
						</a>
						
						</div>
				</div>
	        </div>
	        
	        
	        <div class="popper-content hidden">
		        	<div class="row">
	           		
	           			 <table class="table table-hover table-condensed"> 
					    	<thead> 
						    	<tr> 
							    	<th>Project <br />Name</th>
							    	<th>System Size (kW)</th>
							    	<th>Utility/PPA Price</th>
							    	<th>Esc.</th>
							    	<th>All In Cost ($/W)</th>
							    	<th>Term (Years)</th>
							    	<th>WSAR Score</th>
							    </tr>
							</thead> 
							<tbody>
								@foreach ($portfolio->sites as $s)
								<tr>
									<td><a href="{{ url(route('hf.facility-profile', ['id' => $s->id])) }}">{{ $s->name }}</a></td>
									<td>{{ $s->getMeta('system_size') }}</td>
									<td>{{ $s->getFITPPARate() }}&cent;</td>
									<td>{{ $s->getEsc() }}<small>%</small></td>
									<td><small>$</small>{{ $s->getAllInCost() }}</td>
									<td>{{ $s->getTerm() }}</td>
									<td>{{ $s->getWSARPoints() }}<small>/1000</small></td>
								</tr>
								@endforeach
							</tbody>
						</table>
						
			   		</div> <!-- row -->	
			   	</div> <!-- pop over -->	
	    </div> <!-- col -->
	@endforeach	
</div>
<hr />
@endif

<div class="row space-block">
	<div class="col-lg-6">
    	<h4 style="color: #7e7e7e;">All Projects</h4>
	</div>
	<div class="col-lg-6">
    	{!! Form::open(['method'=>'GET','url'=> url('investor'),'class'=>'pull-right','role'=>'search', 'id' => 'form-search'])  !!}
    	<div class="input-group custom-search-form">
        	{!! Form::text('search', $search, ['class'=>'form-control pull-right', 'placeholder' => 'Search...', 'id' => 'search-input']); !!}
		</div>
    	{!! Form::close() !!}
	</div>
</div>     


<div class="row">
	@foreach($site as $s)
		<div class="col-lg-3 project-grid-container" data-toggle="popover" data-placement="auto right" title="" data-original-title="Project Summary">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="project-title{{ ($s->favorite) ? ' favorite' : "" }}">
						<a href="{{ url(route('hf.dataroom', ['id' => $s->id])) }}"> {{ Helper::strLength($s->name, 23) }} </a>
		            	@if($s->favorite)
		            		<a href="{{ url(route('user.favorite.projects.delete', ['id' => $s->favorite_id])) }}" title="" class='pull-right'>
			            		<i class="fa fa-star"></i>
			            	</a>
		            	@else
		            		<form action="{{ url(route('user.favorite.projects.store', ['id' => $s->id])) }}" method="POST" id="favorite-site-{{$s->id}}" class='pull-right'>
			                	<input type="hidden" name="_token" /><i class="fa fa-star-o" data-id='{{$s->id}}' id="favorite-site-icon-{{$s->id}}" style="cursor:pointer"></i>
			                </form> 
			            @endif
					</h2>
	        	</div>
			</div>
			<div class="project-grid-wrapper">
			
				<div class="row project-data-container-ext">
					<div class="col-lg-12">
						{{ $s->address }} 
							<br />
						{{ $s->city }}, {{ $s->state }}  {{ $s->zip_code }} 
		            </div>
				</div>
			
				<div class="project-data-wrapper">
					<div class="row project-data-container">
						<div class="col-lg-12">
							<ul class="list-inline">
			                	 <li><span class="tag">Size (kW)</span> <br> {{ number_format($s->getMeta('system_size'),0) }}</li>
				                @if($s->isFIT())
					            	<li><span class="tag">Utility Price</span> <br>{{ $s->getFITPPARate()  }}<small>&cent;</small></li>
					            @else
					            	<li><span class="tag">PPA Price</span> <br>{{ $s->getPPAPrice() }}<small>¢</small></li>
								@endif
								<li><span class="tag">Escalator</span> <br>{{ (  $s->getEsc() ) }}<small>%</small></li>
				        	</ul>
			            </div>
					</div>	
				    <div class="row project-data-container">
						<div class="col-lg-6">
			            	<div class="project-status"><span class="tag light">All In Cost</span> 
				            	<p><small>$</small>{{ $s->getAllInCost() }}<small> /W </small></p>
				            </div>
		            	</div>
		            	<div class="col-lg-6">
			            	<div class="project-status"><span class="tag light">Term (Years)</span> 
				            	<p> {{ !empty($s->getTerm()) ? $s->getTerm(): '25' }}</p>
				            </div>
		            	</div>
		            	<div class="col-lg-12">
			            	<div  class="project-status"><span class="tag light">Production</span> 
								<p>{{ number_format($s->getProduction()) }} <small>kWh/Year</small></p>
				            </div>
		            	</div>
		            	<div class="col-lg-12">
			            	<div  class="project-status"><span class="tag light">Project Status</span> 
								<p>{{ $s->getProjectStatus() }}</p>
				            </div>
		            	</div>
		            	
		            	
		            	
		            	
					</div>		   
			    </div>
			  
		        <div class="row project-data-container-ext">
					<div class="col-lg-6">
					
						<a href=" {{ route('hf.download-document', [$s->id, (isset($termSheet->key) ? $termSheet->key : 0).'_'.$termSheet->id, 'pdf']) }}" target="_BLANK">
			   				<span style="color: #91a1ad;" class="glyphicon glyphicon-file" aria-hidden="true"></span>
			   				Term Sheet
						</a>
						
					</div>
					<div class="col-lg-6">
						@if (Auth::user()->hasRole(['admins']) )
						 	<a href="#" target="_BLANK">
			   					<span style="color: #91a1ad;"  class="glyphicon glyphicon-file" aria-hidden="true"></span>
			   						Financials
							</a>
						@endif
					</div>		
							
							
							
							
						
						
				</div>
	        </div>
	        <div class="popper-content hidden">
	        	
	        	
           		<div class="row popover-summary">
           				<div class="col-lg-6 project-data-title">
		           			Facility Type
           				</div> 
           				<div class="col-lg-6 project-data-title">
           					System Type
           				</div>
           			<div class="col-lg-6 project-data">
		           		<h4>{{ $s->getFacilityType() }}</h4>
           			</div>
           			<div class="col-lg-6 project-data">
           				<h4>{{ $s->getSystemLocation() }}</h4>
           			</div>
		   		</div> <!-- row -->	



           		<div class="row popover-summary">
           				<div class="col-lg-6 project-data-title">
		           			WSAR Score
           				</div>
           				<div class="col-lg-6 project-data-title">
           					Agreement Type
           				</div>
           			<div class="col-lg-6 project-data">
	           			<a href="{{ url(route('hf.wsar-score', ['id' => $s->id])) }}">
		           			<h4> {{$s->getWSARPoints()}} <small> / 1000</small></h4>
	           			</a>
           			</div>
           			<div class="col-lg-6 project-data">
           				<h4>{{$s->getAgreementType() }}</h4>
           			</div>
		   		</div> <!-- row -->
		   		
           		
		   		
           		 
           	</div> <!-- pop over -->	
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
$( document ).ready(function() {
 	
 	var addFavorite = function () {
        $('input[name=_token]').val('{{csrf_token()}}');
        $('#favorite-site-' + $(this).data('id')).submit();
    }
    
 	$(".project-grid-container").on('click', '[id^=favorite-site-icon]', addFavorite);
        
    
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
    
    
    
    
    
   $('[data-toggle="popover"]').popover({ trigger: "manual" , html: true, animation:false, content: function(){
		return $(this).find('.popper-content').html();
	}})
	.on("mouseenter", function () {
	    var _this = this;
	    $('.popover').not(this).hide();
	    $(this).popover("show");
	    $(".popover").on("mouseleave", function () {
	        $(_this).popover('hide');
	    });
	}).on("mouseleave", function () {
	    var _this = this;
	    setTimeout(function () {
	        if (!$(".popover:hover").length) {
	            $(_this).popover("hide");
	        }
	    }, 300);
	});
	
	$('[data-toggle="portfolio-popover"]').popover({ trigger: "manual" , html: true, placement: "auto left", animation:false, content: function(){
		return $(this).find('.popper-content').html();
	}})
	.on("mouseenter", function () {
	    var _this = this;
	    $('.popover').not(this).hide();
	    $(this).popover("show");
	    $(".popover").on("mouseleave", function () {
	        $(_this).popover('hide');
	    });
	}).on("mouseleave", function () {
	    var _this = this;
	    setTimeout(function () {
	        if (!$(".popover:hover").length) {
	            $(_this).popover("hide");
	        }
	    }, 300);
	});
	
	

	
	
});	
</script>
@endsection
