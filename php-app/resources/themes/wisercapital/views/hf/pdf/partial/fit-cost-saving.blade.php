<div class="full-table-result">
    <div class="title-box grey-title-box">
        <h3 class="title-box-heading">
            FIT Revenue Summary
        </h3>
        <div class="title-box-entry" id="proposed-ppa-results">
            <table class="result-list">
                <tr>
                    <td class="last">
                        <span>Yr 1 FIT Revenue</span>
                        <span class="pull-right">$  {{ number_format($site->getAnnualFITRevenue(),0) }} </span>
                    </td>
                </tr> 
                <tr>
                    <td class="last">
                        <span>Total FIT Revenue over FIT Term</span>
                        <span class="pull-right">$ {{ number_format($site->getCummulativeFITRevenue(),0) }}</span>
                    </td>
                </tr> 
                <tr>
                    <td class="last">
                        <span>Annual Land Lease Revenue</span>
                        <span class="pull-right">$ {{ number_format($site->getAnnualLandLeaseRateRevenue(), 0) }}</span>
                    </td>
                </tr> 
                <tr>
                    <td class="last">
                        <span>Land Lease Term Years</span>
                        <span class="pull-right">{{ $site->getLandLeaseYears() }}</span>
                    </td>
                </tr> 
            </table>
        </div>
    </div>
</div>