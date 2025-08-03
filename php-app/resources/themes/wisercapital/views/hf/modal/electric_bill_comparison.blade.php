<div class="modal" id="chart-table">
    <div class="modal-content" style="width: 85%; margin: 4% 7% 4% 8%;">
        <div class="pull-right" style="margin-right: 15px;margin-top: -9px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                    style="position: absolute">×</button>
        </div>
        <div class="table-responsive" style="overflow-x: visible ">
            <table class="table table-hover uni-table" id="25-year-table-chart">
                <thead>
                    <tr>
                        <th>Year</th>
                        @if ($site->isFIT())
                        <th>Annual Solar Output (kWh)</th>
                        <th>FIT Rate ($/kWh)</th>
                        <th>FIT Revenue ($)</th>
                        <th>Cumulative FIT Revenue ($)</th> 
                        @else 
                        <th>Effective Utility Rate ($/kWh)</th>
                        <th>Annual Solar Output (kWh)</th>
                        <th>Utility Cost Avoided ($)</th>
                        <th>PPA Rate ($/kWh)</th>
                        <th>PPA Cost ($)</th>
                        <th>Annual Utility Savings ($)</th>
                        <th>Cumulative Savings ($)</th> 
                        <th>Buy Out Cost ($)</th>
                        @endif
                    </tr>
                </thead>
                <tbody id="chart-table-body">
                </tbody>
            </table>

        </div> <!-- table-responsive -->
    </div>
</div>