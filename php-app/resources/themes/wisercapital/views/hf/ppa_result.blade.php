<ul class="result-list">			
    <li>
        <p class="text-muted">Year 1 Savings</p>
        <span class="meta"><small>&#36;</small>{{ number_format($ppa_result['first_year_savings']) }}</span>
    </li>
    <li>
        <p class="text-muted">Term (Years)</p>
        <span class="meta">25</span>
    </li>
    <li>
        <p class="text-muted">Solar Cost per kWh</p>
        <span class="meta">{{ (float)$ppa_result['price_per_kwh']  }}<small>&cent;</small></span>
    </li>
    <li>
        <p class="text-muted">PPA Escalation Rate</p>
        <span class="meta">{{ ((float)$ppa_result['esc'] * 100 ) }}<small>&#37;</small></span>
    </li>
</ul>
