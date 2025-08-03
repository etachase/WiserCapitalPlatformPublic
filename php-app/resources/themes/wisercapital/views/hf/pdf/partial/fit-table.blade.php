<thead>
    <tr>
        <td>Year</td>
        <td>Solar Output (kWh/Year)</td>
        <td>FIT Rate ($/kWh)</td>
        <td>FIT Revenue ($)</td>
        <td class="bg-yellow" style='color: black'>Cumulative Savings ($)</td> 
    </tr>
</thead>
<tbody id="chart-table-body">
    @foreach ($table_data as $table)
    <?php 
    foreach ($table as $key => $tableData) {
        $table[$key] = str_replace(" ", "", (string) $tableData);
    }
    ?>
    <tr>
        <td>{{str_replace("/", "/ ", $table[0])}}</td>
        <td>{{$table[2]}}</td>
        <td>{{$table[4]}}</td>
        <td>{{$table[6]}}</td>
        <td class="bg-yellow">{{$table[7]}}</td>
    </tr>
    @endforeach
</tbody>