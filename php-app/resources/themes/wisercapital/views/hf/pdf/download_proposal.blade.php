<html>
    <head>
    @include('hf.pdf.partial.style')
    </head>
    <body>
        <div class="row" style='margin-right: 20px;'>
            <div class="padB8">
                <div class="logo pull-right" style="height: 70px">
                    <img src="{{public_path('/assets/themes/wisercapital/img/Wiser-Capital-logo.png')}}" width="400" height="70"/>
                </div>
            </div>
            <div class="sec">
                <div class="col-md-12">
                    <div class="sec-header1 sec-header row add-marginL30">
                        <h2>{{$site->name}}<br/>
                            <?php echo $site->isFIT() ? 'Electricity Budget Overview Feed In Tariff (FIT) Analysis * <br/>' .
                                        date('m-d-Y') : 'Power Purchase Agreement (PPA) Analysis *'; ?> 
                        </h2>
                    </div>  
                    <div class="resultpanel add-marginL30">
                        <div class="marT20">
                            @include('hf.pdf.partial.' . $type . '-description')
                        </div>
                        <div class="resultpanel resultpanel1 clearfix padB8" id='panel2'>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="title-box grey-title-box">
                                        <h3 class="title-box-heading">
                                            System Details
                                        </h3>
                                        <div class="title-box-entry" id="system-details">
                                            <table class="result-list">
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <span>System Size</span>
                                                            <span class="pull-right">{{$system_size }}<small> kW DC</small> </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <span>Annual Production</span>
                                                            <span class="pull-right">{{$year_one_production }} <small>kWh/Yr</small> </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <span>Type</span>
                                                            <span class="pull-right" style="float: right">
                                                                {{  $site->getSystemLocation() }}
                                                            </span>   
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="last">
                                                        <div>
                                                            <span>Off Taker</span>
                                                            <span class="pull-right">{{$site->name}}</span>  
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="title-box grey-title-box">
                                        @include('hf.pdf.partial.' . $type . '-details')
                                    </div>
                                </div>
                                <div class="marT20">
                                    @include('hf.pdf.partial.' . $type . '-cost-saving')
                                </div>
                            </div>
                        </div>

                        <small>
                            * NOTE: The terms in this document are based on 2017 tax-values, 
                            information provided by the integrator, and reasonable
                            interpretation of trends in the PV and financial industry. 
                            They are offered as preliminary values pending further analysis, and are
                            subject to changes in market conditions and tax-rules.
                        </small>
                        <hr class="border-hr">
                        <?php echo $site->isFIT() ? '<div class="padB8"></div>' : ''; ?>
                        <div class="row footer">
                            <div class="col-md-12">
                                <span class="company-name">Wiser Capital</span>
                                <span class="pull-right">{{$site->name}} &nbsp;&nbsp;&nbsp;&nbsp; {{date('m/d/Y')}}</span>
                            </div>
                        </div>
                        <hr class="page-break"/>
                        
                        <div class="padB8">
                            <div class="logo pull-right" style="height: 70px">
                                <img src="{{public_path('/assets/themes/wisercapital/img/Wiser-Capital-logo.png')}}" width="400" height="70"/>
                            </div>
                        </div>
                        <h2 class="table-head">Annual Electricity Savings Analysis</h2>
                        <div class="table-responsive" style="overflow-x: visible;margin-right: 15px;">
                            <table class="table table-chart-25-year" style="width: 100%">
                                @include('hf.pdf.partial.' . $type . '-table')
                            </table>
                        </div> <!-- table-responsive -->
                        <br/>
                        <br/>
                        <div class="row footer">
                            <div class="col-md-12">
                                <span class="company-name">Wiser Capital</span>
                                <span class="pull-right">{{$site->name}} &nbsp;&nbsp;&nbsp;&nbsp; {{date('m/d/Y')}}</span>
                            </div>
                        </div>
                        <hr class="page-break"/>
                        <div class="padB8">
                            <div class="logo pull-right" style="height: 70px">
                                <img src="{{public_path('/assets/themes/wisercapital/img/Wiser-Capital-logo.png')}}" width="400" height="70"/>
                            </div>
                        </div>
                        <div class="resultpanel chartpanel add-marginL30">
                            <div class="wsar-score-panel">
                                <div class="panel-title clearfix">
                                    <div class='annual-price col-sm-8 col-md-9'><h2 class="table-head"><div class='annual-price col-sm-8 col-md-9'><h2 class="table-head">
                                        {{$site->isFIT() ? 'FIT REVENUE' : 'Annual Electric Bill Comparison'}}</h2></div>
                                </div>
                            </div>
                        </div>
                        <div style="margin-bottom:85%; padding-top: 10%">
                        <img src='{{$chart}}' style='width: 100%'/>
                        </div>
                        <div class="row footer">
                            <div class="col-md-12">
                                <span class="company-name">Wiser Capital</span>
                                <span class="pull-right">{{$site->name}} &nbsp;&nbsp;&nbsp;&nbsp; {{date('m/d/Y')}}</span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div> 
    </body>
</html>