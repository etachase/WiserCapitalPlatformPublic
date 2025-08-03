@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="newproject-sec">
            <p>
                <img src="/assets/themes/wisercapital/img/logo-ico.png" alt=""/>
            </p>
            <p>You have not created a project yet. Start now.</p>
            <p>
                <a data-toggle="modal" data-target="#modal_dialog" href="{{ URL::route( "hf.confirm-create") }}" class="btn btn-1">Create New Project</a>
            </p>
        </div>
    </div>
</div>
<div class=" get-started-block">
    <div class="project-slide row">
        <div class="col-md-4 hidden-xs">
            <div class="project-block fade-block">
                <h2 class="project-title ">Project Title <a href="#" class="pull-right fa fa-star-o"></a></h2>
                <div class="project-entry">
                    <div class="project-address">
                        Address, City<br>
                        Zip Code, State
                    </div>
                    <ul class="project-data-list">
                        <li><span class="tag">Sqft:</span> 0000</li>
                        <li><span class="tag">kWt:</span> 0000</li>
                        <li><span class="tag">Utility:</span> XXX</li>
                    </ul>
                    <div class="project-status"><span class="tag light">Wiser Status:</span> XXXX</div>
                    <div class="project-edited-date">Last updated on August 26</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="project-block feature-block">
                <div class="custom-popover popover top">
                    <div class="arrow"></div>
                    <span class="close-popover">✕</span>
                    <div class="popover-content"> 
                        <h3>TIP: Star your first projects!</h3> 
                        <p>Click the star next to any project’s name, and that project
                            will show up here (it will stay in the A-Z list below, too).</p>
                    </div> 
                </div>
                <h2 class="project-title ">Project Title <a href="#" class="pull-right fa fa-star"></a></h2>
                <div class="project-entry">
                    <div class="project-address">
                        Address, City<br>
                        Zip Code, State
                    </div>
                    <ul class="project-data-list">
                        <li><span class="tag">Sqft:</span> 0000</li>
                        <li><span class="tag">kWt:</span> 0000</li>
                        <li><span class="tag">Utility:</span> XXX</li>
                    </ul>
                    <div class="project-status"><span class="tag light">Wiser Status:</span> XXXX</div>
                    <div class="project-edited-date">Last updated on August 26</div>
                </div>
            </div>
        </div>
        <div class="col-md-4 hidden-xs">
            <div class="project-block fade-block">
                <h2 class="project-title ">Project Title <a href="#" class="pull-right fa fa-star-o"></a></h2>
                <div class="project-entry">
                    <div class="project-address">
                        Address, City<br>
                        Zip Code, State
                    </div>
                    <ul class="project-data-list">
                        <li><span class="tag">Sqft:</span> 0000</li>
                        <li><span class="tag">kWh:</span> 0000</li>
                        <li><span class="tag">Utility:</span> XXX</li>
                    </ul>
                    <div class="project-status"><span class="tag light">Wiser Status:</span> XXXX</div>
                    <div class="project-edited-date">Last updated on August 26</div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            </div>
            <div class="modal-body" id='modal-body'>

            </div>
        </div>
    </div>
</div>
@endsection


<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
<script language="JavaScript">

</script>
@endsection
