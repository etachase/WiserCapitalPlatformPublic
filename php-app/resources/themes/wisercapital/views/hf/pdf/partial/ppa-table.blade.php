<thead>
    <tr>
        <td>Year</td>
        <td>Effective Utility Rate ($/kWh)</td>
        <td>Annual Solar Output (kWh)</td>
        <td>Avoided Utility Cost ($)</td>
        <td>PPA Rate ($/kWh)</td>
        <td>PPA Cost ($)</td>
        <td>Annual Utility Savings ($)</td>
        <td class="bg-yellow" style='color: black'>Cumulative Savings ($)</td> 
        <td>Buy Out Cost ($)</td>
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
        <td>{{$table[1]}}</td>
        <td>{{$table[2]}}</td>
        <td>{{$table[3]}}</td>
        <td>{{$table[4]}}</td>
        <td>{{$table[5]}}</td>
        <td>{{$table[6]}}</td>
        <td class="bg-yellow">{{$table[7]}}</td>
        <td>{{(!is_numeric($table[0]) || (is_numeric($table[0]) && ($table[0] > 6))) ? $table[8] : ''}}</td>
    </tr>
    @endforeach
</tbody>