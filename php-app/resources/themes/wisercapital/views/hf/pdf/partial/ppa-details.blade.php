<h3 class="title-box-heading">
    PPA Details
</h3>
<div class="title-box-entry" id="proposed-ppa-results">
    <table class="result-list">
        <tr>
            <td>
                <span>Total PPA Rate Yr 1</span>
                <span class="pull-right">{{preg_replace("/(\.\d*)/", "", $site->totalPPAPriceYearOne())}}</span>
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <span>PPA Rate Yr 1</span>
                    <span class="pull-right">$ {{number_format($site->getPrice(), 3)}} /kWh</span>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <span class="text-muted">PPA Escalation Rate</span>
                    <span class="pull-right">{{ number_format($site->getEsc(), 2) }} <small>&#37;</small></span>
                </div>
            </td>
        </tr>
        <tr>
            <td class="last">
                <span class="text-muted">Term</span>
                <span class="pull-right">{{ $site->getTerm() }} yr</span>
            </td>
        </tr>  
    </table>
</div>