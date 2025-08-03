@extends('layouts.master')
@section('content')

<div id="wsar-score-wrapper">
    
    <div class="row">
        <div class="sec">
            <div class="col-md-12">
                <div class="sec-header sec-header1 clearfix">
                    @include('hf.project_menu')
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">

        <div class="col-md-8">
	     
            @foreach($wsar_score as $key => $section)
            <div class="title-box no-shadow">
                <h3 class="title-box-heading">{{ ($key) }}
                    
                    <span class="glyphicon glyphicon-question-sign wsar-info" data-toggle="tooltip" data-placement="right" title="{{  $section['tooltip'] or '' }}" aria-hidden="true"></span>
                    
                    <div class="pull-right wiser-points">{{  $section['score'] or ''  }}<small>/{{ $section['total_score'] or '' }}</small</div>
                    
                </h3>  
                <div class="title-box-entry">
                    @foreach($section['items'] as $item)
                    <div class="list-item ">
                        <div class="row">
                            <div class="col-xs-7 col-lg-9 wsar-description">
                                {{ $item['title'] or '' }} 
                            </div>
                            <div class="col-xs-1 col-lg-1 wsar-info">
                                <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="{{ $item['tooltip'] or '' }}" aria-hidden="true"></span>
                            </div>
                            <div class="col-xs-2 col-lg-2">
	                            @if ((!\Auth::user()->hasRole('solar-installer')))
	                             <div class="wiser-points text-right"><span>{{ $item['score'] or '' }}</span></div>
	                            @endif
	                               
                                
                            </div>		 		
                        </div>		 		
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
            <div class="title-box add-margin30">
                <h3 class="title-box-heading total-score">
                    <span class="bold">WSAR SCORE</span> TOTAL <div class="pull-right wiser-points ">{{ $WSAR->totalScore()  }}<small>/1000</small></div> 
                </h3>
            </div>
            <a href="{{ URL::previous() }}" class="btn btn-sm btn-primary">Back</a>
        </div>
        <div class="col-md-4 hidden-xs">
            <div class="wiserscore-content">
                <figure class="image-holder">{!! Html::image('assets/themes/wisercapital/img/wsar-l.png', 'WSAR Score', array('width' => 70 , 'width' => 290)) !!}</figure>
                <ul>
                    <li> Wiser’s unique rating system illuminates the quality of the sustainable energy investment by quantifying its risk and reward.</li>

                </ul>
            </div>
        </div>


    </div><!-- /.row -->
</div>



@endsection


<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
<script language="JavaScript">
    $('.glyphicon-question-sign').tooltip();

</script>
@endsection
