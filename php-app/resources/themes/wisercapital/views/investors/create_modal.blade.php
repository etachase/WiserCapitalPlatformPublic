<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Portfolio</h4>
      </div>
      <div class="modal-body">
	   {!! Form::open(array('route' => array('portfolio.store'), 'method' => 'post', 'class' => 'form-horizontal', 'id' => "create-portfolio-modal-form")) !!}
	   <div class="row">
	   <div class="col-lg-12">
	   
		   <div class="form-group">
		        <label for="name" class="col-lg-offset-1 col-lg-2 control-label">Portfolio Name</label>
		        <div class="col-lg-6">
		            <input class="form-control" name="name" type="text" id="name">
		        </div>
	    	</div>
		</div>
		</div>
	   
	   <div class="row" style="margin: 20px 0;">
		   <div class="col-lg-12">
		   		<p>Select Projects to Include in Portfolio</p>
		   </div>
	   </div>
	   
	    
	   <div class="row">
		   <div class="col-lg-12">
	    	
        	<table id="portfolio-table" class="table table-striped"> 
	    	<thead> 
		    	<tr> 
			    	<th>Include</th>
			    	<th>Name</th>
			    	<th>Size</th>
			    	<th>Utility/PPA Price</th>
			    	<th>All In COST ($/W)</th>
			    	<th>Escalator</th>
			    	<th>Term</th>
			    	<th>WSAR Score</th>
			    </tr>
			</thead> 
			<tbody>
				@foreach ($site as $s)
				<tr>
					<td>
						<div class="checkbox">
							<input class="checkbox-custom" id="select-{{ $s->id }}" name="sites[]" type="checkbox" value="{{ $s->id }}">
							<label for="select-{{ $s->id }}" class="checkbox-custom-label"></label>
						</div>
					</td>
					<th scope="row">{{ $s->name }}</th>
					<td><span class="system-size">{{ $s->getMeta('system_size') }}</span></td>
					<td><span>{{ $s->getPrice() }}<small>¢</small></td>
					<td><small>$</small>{{ $s->getAllInCost() }}</td>
					<td>{{ ( $s->isFIT() ? 0 : $s->getEsc() ) }}<small>%</small></td>
					<td>{{ $s->getTerm() }}</td>         	
					<td><span class="wsar-score">{{ $s->getWSARPoints() }}</span>/1000</td>
					
				</tr>
				@endforeach
			</tbody>
		</table>
		   </div>
		</div>  
       
		<div class="row">
			<div class="col-lg-12">
	  		<table class="table"> 
			<thead> 
				<tr>
					<th></th>
					<th>Total Size (kW)</th>
					<th>Average WSAR Score</th>
				</tr>
			</thead> 
			<tbody>
				<tr>
					<td><strong>Calculated Values</strong></td>
					<td><span id="total-size"></span></td>
					<td><span id="avg-wsar-score"></span></td>
				</tr>
			</tbody>
		</table>
			</div>
		</div>  
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
        {!! Form::submit('Create Portfolio', array("class" => "btn btn-primary")) !!}
         
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>