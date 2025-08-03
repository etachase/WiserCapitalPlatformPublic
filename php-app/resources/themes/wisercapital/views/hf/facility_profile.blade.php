@extends('layouts.master')


@section('content')
<div class="row">
    <div class="sec">
        <div class="col-xs-12">
            <div class="sec-header1 sec-header row">
                @include('hf.project_menu')
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="sec">
        <div class="col-md-12">
            <div class="resultpanel clearfix">
                <div class="title-box">
                    <h3 class="title-box-heading">
                        Map
                        <span class="pull-right-md"><small>Address: {{$site->address}} {{$site->city}}, {{$site->state}} {{$site->zip_code}}</small></span>
                    </h3>
                    <div class="title-box-entry">
                        <div id="map-wrapper">
			                <div id="gMap"></div>
			            </div>
                        <ul class="result-list">
                            <li>
                            	@if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                                <a href="{{ route('hf.map-edit', $site->id)}}" data-toggle="modal">
                                    <button type="button" class="btn btn-xs btn-edit">Edit</button>
                                </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="resultpanel resultpanel1 clearfix">
    <div class="row">
        <div class="col-lg-6">
            <div class="title-box grey-title-box add-margin30">
                <h3 class="title-box-heading">
                    Basic Information 
                </h3>
 
                <div class="title-box-entry">
                    <ul class="result-list">
                        <li>
                     
                            <p>Facility/Project Name</p>
                            <span class="meta">{{$site->name}}</span>
                            <br>
                            <br>
                        </li>
                        <li>
                            <p>Type of Facility</p>
 
                            @if($site->getFacilityType())
                            <span class="meta"> {{ $site->getFacilityType()}} </span>
                            @else
                            <span class="meta">  n/a</span>
                            @endif
                        </li>
                        <li>
                            <p>Energy Yield kWh/kW/year</p>
                            <span class="meta"> {{$site->getEnergyYield() ? $site->getEnergyYield() : 'n/a'}} </span>
                            <br>
                        </li>
                        <li>
                            <p>System Size (kW DC)</p>
                            <span class="meta"> {{$site->getSystemSize() ? $site->getSystemSize() : 'n/a'}} </span>
                        </li>
                        <li>
                            <p>Year 1 Annual Production (kWh/year)</p>
                            <span class="meta"> {{ number_format($site->getProduction()) }} </span>
                            <br>
                        </li>
                        <li>
                            <p>System Type</p>
                            @if( isset($system_locations) && is_array($system_locations) && count($system_locations))
                            <span class="meta">  {{ implode($system_locations, ', ')}}</span>
                            @else
                            <span class="meta">  n/a</span>
                            @endif
                        </li>
                        <li>
                            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
                            <a href="{{ route('hf.edit', $site->id)}}">
                                <button type="button" class="btn btn-xs btn-edit">Edit</button>
                            </a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="title-box add-margin30">
                <h3 class="title-box-heading">
                    PPA Summary
                </h3>
                <div class="title-box-entry">
                    <ul class="result-list">
                        <li>
                            <div class="row">
                                <div class="col-md-6">
                                    @if($site->isFIT())
									     <p>Utility Paid kW Price</p>
	                                    <span class="meta">{{number_format($site->getFITRate(),2)}} &cent;</span>
									@else
										<p>Solar cost per kWh</p>
										<span class="meta">{{ number_format($site->getPPAPrice(), 3)+0 }}&cent;</span>
									@endif
                                </div>
                                <div class="col-md-6">
                                    <p>Term (years)</p>
                                    @if($site->isFIT())
                                    	<span class="meta">25</span>
									@else
                                    	<span class="meta">{{ $site->getTerm() }}</span>
									@endif
                                </div>
                            </div>
                        </li>
	                            
                        @if(!$site->isFIT())
                        <li>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Avoided Utility Cost per kWh</p>
                                <span class="meta">{{$site->getAvoidedElectricCost()*100}}&cent;</span>
                            </div>
                            <div class="col-md-6">
                                <p>PPA Esclation Rate</p>
                                <span class="meta">{{ ((float)$site->getEsc() ) }}&#37;</span>
                            </div>
                        </div>
                        </li>
                         <li>
                            <p>Year 1 Savings</p>
                            <span class="meta">&#36;{{ number_format($ppa_result['first_year_savings']) }}</span>
                        </li>
	                    @endif
	                    <li>
                            @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
	                        <a href="{{ route('hf.edit', $site->id)}}">
                                <button type="button" class="btn btn-xs btn-edit">Edit</button>
                            </a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <div class="title-box">
                <h3 class="title-box-heading">
                    WSAR Score
                </h3>
                <div class="title-box-entry padding-around30">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="wsar-score"><span>{{ $WSAR->totalScore() }}</span>/1000</div>
                            <a href="{{ route('hf.wsar-score', $site->id)}}"><button type="button" class="btn btn-edit btn-lg">Score Breakdown</button></a>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            {!! Html::image('assets/themes/wisercapital/img/wsar_1.png', 'WSAR Score') !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection


<!-- Optional bottom section for modals etc... -->
@section('body_bottom')

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDa9z8c1zmIQfYOlvT6Wnq9Tzr3ZlpXTRs&libraries=drawing,places,geometry"></script>
<script type="text/javascript" src="/js/map.js"></script>



<script language="JavaScript">
$(document).ready(function () {

	loadMap('{!! ($site->map_json) !!}');

    $('form').bind("keypress", function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });
});


</script>
@endsection
