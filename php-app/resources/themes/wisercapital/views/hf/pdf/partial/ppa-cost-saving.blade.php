<div class="col-lg-6">
    <div class="title-box grey-title-box">
        <h3 class="title-box-heading">
            Utility Cost
        </h3>
        <div class="title-box-entry" id="system-details">
            <table class="result-list">
                <tr>
                    <td>
                        <span>Avoided Utility Cost</span>
                        <span class="pull-right">
                            $ {{$site->getAvoidedElectricCost() ? number_format($site->getAvoidedElectricCost(), 2) : '0' }}  
                        </span>
                    </td>
                </tr> 
                <tr>
                    <td class="last">
                        <span>Local Utility Escalator</span>
                        <span class="pull-right">3<small>%</small> </span>
                    </td>
                </tr> 
            </table>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="title-box grey-title-box">
        <h3 class="title-box-heading">
            Savings Summary
        </h3>
        <div class="title-box-entry" id="proposed-ppa-results">
            <table class="result-list">
                <tr>
                    <td class="last">
                        <span>Yr 1 Savings</span>
                        <span class="pull-right">$ {{number_format($site->firstYearSavings(),0) }} </span>
                    </td>
                </tr> 
            </table>
        </div>
    </div>
</div>