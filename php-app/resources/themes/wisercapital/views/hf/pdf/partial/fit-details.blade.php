<h3 class="title-box-heading">
    FIT Details
</h3>
<div class="title-box-entry" id="proposed-ppa-results">
    <table class="result-list">
        <tr>
            <td>
                <div>
                    <span>FIT Price</span>
                    <span class="pull-right">$ {{number_format($site->getPrice(), 3)}} /kWh</span>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <span class="text-muted">FIT Escalation Rate</span>
                    <span class="pull-right">{{ number_format($site->getEsc(), 2) }} <small>&#37;</small></span>
                </div>
            </td>
        </tr>
        <tr>
            <td class="last">
                <span class="text-muted">FIT Term Yr</span>
                <span class="pull-right">{{ $site->getTerm() }}</span>
            </td>
        </tr>  
    </table>
</div>