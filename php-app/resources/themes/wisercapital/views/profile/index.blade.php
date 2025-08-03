@extends('layouts.master')

<style>
.panel-heading {
	background: rgba(0, 0, 0, 0) linear-gradient(to bottom, #587f94 0%, #7793a5 100%) repeat scroll 0 0;
	color:white !important;
	border-color: #587f94 !important;
	
}
.panel {border-color: #587f94 !important;}
.panel-title{ font-weight: 700;}
.wsar-score {font-size: 25px;}
.wsar-score span{font-size: 40px;color: #879b6f;}
    #profile-basic-inormation-table{width:60%;position: relative}
    #changeimage{display:none;position: absolute;width: 100%;background: #000;opacity:0.3;margin: 0 auto;padding: 5px;bottom: 0;}
    #msg{text-align: center;font-weight: 700;}
    

.btn-group {
    display: inline-block;
    font-size: 0;
    position: relative;
    vertical-align: middle;
    white-space: nowrap;
}

.mobile-social-share ul {
    list-style: none outside none;
    margin: 0;
    min-width: 61px;
    padding: 0;
}


.mobile-social-share li {
    display: block;
    font-size: 18px;
    list-style: none outside none;
    margin-bottom: 3px;
    margin-left: 4px;
    margin-top: 3px;
}

.btn-twitter {
    background-color: #3399CC !important;
    width: 51px;
    color:#FFFFFF!important;
}

.btn-facebook {
    background-color: #3D5B96 !important;
    width: 51px;
    color:#FFFFFF!important;
}

.btn-google {
    background-color: #DD3F34 !important;
    width: 51px;
    color:#FFFFFF!important;
}

.btn-linkedin {
    background-color: #1884BB !important;
    width: 51px;
    color:#FFFFFF!important;
}

.btn-pinterest {
    background-color: #CC1E2D !important;
    width: 51px;
    color:#FFFFFF!important;
}
.progress{
    margin-bottom: 0px !important;
}


</style>
@section('content')

<div class='row'>
    <div class='col-sm-4 margin-bottom'>
        <div class="panel panel-default" style=''>
            <div class="panel-heading">
                <h3 class="panel-title">
                    Profile
                </h3>
            </div>
            <div class="panel-body" align="center">
                <form id="profile-frm">
                <div id="profile-basic-inormation-table">
                    <img src='/{{ $profile_photo }}' width="100%" id="profile_photo">
                    <div id="changeimage">
                        {!! Form::label('change_photo', 'Upload', ['class' => 'btn-file','style'=>'opacity:1;color:#fff;cursor:pointer;width:100%;']) !!}
                        {!! Form::file('change_photo', ['class' => 'no-visibility upload_button_track']) !!}
                    </div>
                </div>
                </form>
                <div >
                    <b>Profile Status:</b> {{ ($user && $user->is_complete_profile) ? 'Approved' : 'Not Approved'}}
                </div>
                <div style="margin-bottom: 10px;">
                    <b>WSAR Score: </b>
                    <span class='wsar-score'><span>40</span>/49</span><br/>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Quick Links
                </h3>
            </div>
            @if (Auth::user()->hasRole('admins'))
            <div class="panel-body ">
                <a href="{{ route('admin.solar-installers.edit', $solar_installer->id) }}"> Edit {{  $solar_installer->name }} Project </a>
            </div>
            @else 
            <div class="panel-body" style="border-bottom: 1px solid #587f94 !important">
                <a href="{{ URL::route( "hf.create") }}" data-toggle="modal" data-target="#modal_dialog"> {{  trans('Add New Project')}} </a>
            </div>
            <div class="panel-body ">
                <a href="{{ route('business_profile.edit') }}"> {{  trans('Edit My Profile')}} </a>
            </div>
            @endif
        </div>
    </div>
    <div class='col-sm-4 margin-bottom'>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Project Statistics
                </h3>
            </div>
            <div class="panel-body" align="center">
                <canvas id="myChart" width="200" height="200"></canvas>


                <div class="box-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            <span class="sr-only">0% Complete (success)</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-10 text-left">
                            Facility Info
                        </div>
                        <div class="col-xs-2 pull-right">
                            0%
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%">
                            <span class="sr-only">23% Complete</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-10 text-left">
                            Utilities
                        </div>
                        <div class="col-xs-2 pull-right">
                            23%
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-yellow" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                            <span class="sr-only">50% Complete (warning)</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-10 text-left">
                            Results
                        </div>
                        <div class="col-xs-2 pull-right">
                            50%
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100" style="width: 27%">
                            <span class="sr-only">27% Complete</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-10 text-left">
                            Documents
                        </div>
                        <div class="col-xs-2 pull-right">
                            27%
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class='col-sm-4 margin-bottom'>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Contact Wiser
                </h3>
            </div>
            <div id="msg"></div>
            <div class="panel-body">
                <div class='form-group'>
                    <label>Enter your email : </label>
                    <input type='email' name='email' id="email" 
                           value='{{$user ? $user->email : ''}}' class='form-control'>
                </div>
                <div class='form-group'>
                    <label>Subject : </label>
                    <input type='text' name='subject' id="subject" class='form-control'>
                </div>
                <div class='form-group'>
                    <label>Message : </label>
                    <textarea rows="6" name='message' id="message" 
                              class='form-control'></textarea>
                </div>
                <div class='form-group text-center'>
                    <button class='btn btn-primary contactwiser form-control'>
                        Send Mail</button>
                </div>
                <b>Phone : </b> 805.899.3400 ext 110
            </div>

        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-default mobile-social-share" style="">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Connect
                </h3>
            </div>
            <div class="panel-body" align="center">
                <div class="row">
                    <div class="col-md-3 margin-bottom">
                        <a data-original-title="Twitter" rel="tooltip" href="https://twitter.com/WiserCapital" class="btn btn-twitter" data-placement="left">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </div>
                    <div class="col-md-3 margin-bottom">
                        <a data-original-title="Facebook" rel="tooltip" href="https://www.facebook.com/WiserCapital" class="btn btn-facebook" data-placement="left">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </div>					
                    <div class="col-md-3 margin-bottom">
                        <a data-original-title="Google+" rel="tooltip" href="https://plus.google.com/106693469356995969967/posts" class="btn btn-google" data-placement="left">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a data-original-title="LinkedIn" rel="tooltip" href="http://www.linkedin.com/company/wiser-capital-llc" class="btn btn-linkedin" data-placement="left">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </div>
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
                <h4 class="modal-title" id='modal-header'>Profile</h4>
            </div>
            <div class="modal-body" id='modal-body'>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="wiserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title" id='modal-header'>Contact Wiser</h4>
            </div>
            <div class="modal-body" id='wiser-modal-body'>

            </div>
        </div>
    </div>
</div>
    @endsection
@section('body_bottom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    <script>
        $(document).ready(function() {
            var data = [{
                value: 22,
                color: "#606F9C"
            }, {
                value: 8,
                color: "#76A9B4"
            }

            ]

            var options = {
                animation: true
            };

            //Get the context of the canvas element we want to select
            var c = $('#myChart');
            var ct = c.get(0).getContext('2d');
            var ctx = document.getElementById("myChart").getContext("2d");
            /*************************************************************************/
            myNewChart = new Chart(ct).Doughnut(data, options);

            $("#changeimage").on('change','#change_photo',uploadFile);
        });

        $('#profile-basic-inormation-table').hover(function () {
            $('#changeimage').show();
        }, function () {
            $('#changeimage').hide();
                }
        );


        function uploadFile(element) {
            var file = this.files;
            var reader = new FileReader();
            reader.onload = function(element) {
                var formData = new FormData($('#profile-frm')[0]);
                $.ajax({
                    'url'    : '/api/profile/photo',
                    'data'   : formData,
                    'method' : 'POST',
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    'success': function (response) {
                        if (response.success) {
                            $('#profile_photo').attr('src',response.path);
                        }
                        $('#modal-body').html(response.message);
                        $('#myModal').modal('show');
                    },
                });
            }
            reader.readAsDataURL(file[0]);
        }

    $('.contactwiser').click(function () {
        var formData = {
            'email' : $('#email').val(),
            'subject' : $('#subject').val(),
            'message' : $('#message').val()
        }
        $.ajax({
            type: 'POST',
            url: 'api/wiser/contact',
            data: formData,
            dataType: 'json',
            success: function (data) {
                $('#wiser-modal-body').html(data.message);
                $('#wiserModal').modal('show');
                return false;
            },
        });
    });

    </script>
@endsection
