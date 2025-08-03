<div  class="modal" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title">MESSAGE FROM WISER</h4>
            </div>
                <div class="modal-body">
	            	<div class="row">
		            	<div class="col-lg-12">
		            		<p>We are optimizing for the system size, rate, & escalator ensuring that the host receives maximum savings.</p>
		            	</div>
		            	<div class="col-lg-12">
	            			<img src="{{ url('/assets/themes/wisercapital/img/graph-loader.gif')}}"/>
	            		</div>
					</div>
					<div class='row' style="margin-top:20px;">
	                <div class="row">
						<div class='col-lg-12' id='ppa-optimizer-message'></div>
					</div>
					<div class="row" style="margin-top:20px;">
						<div class="col-lg-12 text-center">
		                    <p class="ppa-loader-message">Running PPA Optimizer....</p>
		                </div>
		            </div>
		            <div class="row">
		            	<div class="col-lg-offset-2 col-lg-8">
		                	<div class='progress'>
		                    	<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" id='progressBar'></div>
		                    </div>
						</div>
						<div class='col-lg-2'>100%</div>
					</div>
				
				</div>
			
			</div>
			<!-- <div class="modal-footer"></div> -->
                    
         </div>
    </div>
 </div>
 
 
 
 <div class="loader-modal" style="display: none">
    <div class="col-sm-offset-2 col-xs-12 col-md-7 col-sm-8">
        <ul class="ppa-otimization-loader">
            <li class="margin-5 col-xs-12">
                <i id="phase_1_icon" class="fa fa-spinner fa-spin"></i>
                <img src="/assets/themes/wisercapital/img/blue-hero-ico.png" width="20"> 
                <span id="phase_1_message">Phase 1 Calculation </span>
            </li>
            <li class="margin-5 col-xs-12">
                <i id="phase_2_icon" class="blank-icon"></i>
                <img src="/assets/themes/wisercapital/img/blue-hero-ico.png" width="20"> 
                <span id="phase_2_message">Phase 2 Calculation </span>
            </li> 
            <li class="margin-5 col-xs-12">
                <i id="final_icon" class="blank-icon"></i> 
                <img src="/assets/themes/wisercapital/img/blue-hero-ico.png" width="20"> 
                <span id="final_message">Final Optimization </span>
            </li>
        </ul>
    </div>
</div>

