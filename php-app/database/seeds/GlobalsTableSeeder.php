<?php

use Illuminate\Database\Seeder;

class GlobalsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('globals')->delete();
        
        \DB::table('globals')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'kwhft',
                'description' => 'kW/100 sqft',
                'low' => '1.40000',
                'high' => '1.40000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'derate',
                'description' => 'DC->AC Derate factor',
                'low' => '0.78000',
                'high' => '0.80000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => '8',
                'name' => 'a58',
                'description' => 'Roof condition: New',
                'low' => '-0.02000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            3 => 
            array (
                'id' => '9',
                'name' => 'a60',
                'description' => 'Roof condition: Average',
                'low' => '0.02000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            4 => 
            array (
                'id' => '10',
                'name' => 'a61',
                'description' => 'Roof condition: Bad',
                'low' => '0.10000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            5 => 
            array (
                'id' => '11',
                'name' => 'a62',
                'description' => 'Roof condition: Leaky',
                'low' => '0.15000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            6 => 
            array (
                'id' => '12',
                'name' => 'a63',
                'description' => 'Pitch: Flat',
                'low' => '-0.02000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            7 => 
            array (
                'id' => '13',
                'name' => 'a65',
                'description' => 'Pitch: Pitch greater than 45º',
                'low' => '0.03000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            8 => 
            array (
                'id' => '14',
                'name' => 'a66',
                'description' => 'Do you know the structural capacity: Yes',
                'low' => '-0.02000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            9 => 
            array (
                'id' => '15',
                'name' => 'a67',
                'description' => 'Do you know the structural capacity: Not sure, need a structural engineering review',
                'low' => '0.02000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            10 => 
            array (
                'id' => '16',
                'name' => 'a69',
                'description' => 'Do you have structural drawings or plans: Yes, both',
                'low' => '-0.02000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            11 => 
            array (
                'id' => '17',
                'name' => 'a72',
                'description' => 'Do you have structural drawings or plans: None',
                'low' => '0.02000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            12 => 
            array (
                'id' => '18',
                'name' => 'a16-w',
            'description' => 'System Location - where will the system go: Ground (per watt)',
                'low' => '0.50000',
                'high' => '0.50000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            13 => 
            array (
                'id' => '19',
                'name' => 'a77',
                'description' => 'Soil Type: Sandy/Clay',
                'low' => '0.05000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            14 => 
            array (
                'id' => '20',
                'name' => 'a78',
                'description' => 'Soil Type: Rocky/Unknown',
                'low' => '0.06000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            15 => 
            array (
                'id' => '21',
                'name' => 'a79',
                'description' => 'Soil Type: Bedrock %',
                'low' => '0.07000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            16 => 
            array (
                'id' => '22',
                'name' => 'a80-w',
            'description' => 'Hydrology required: Yes (per watt)',
                'low' => '0.01000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            17 => 
            array (
                'id' => '23',
                'name' => 'a81-w',
            'description' => 'Hydrology required: No (per watt)',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            18 => 
            array (
                'id' => '24',
                'name' => 'a17-w',
            'description' => 'System Location - where will the system go: Car Port (per watt)',
                'low' => '0.75000',
                'high' => '0.75000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            19 => 
            array (
                'id' => '25',
                'name' => 'a85-w',
            'description' => 'Vehicle type: Commercial (per watt)',
                'low' => '0.10000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            20 => 
            array (
                'id' => '26',
                'name' => 'a86-w',
            'description' => 'Does this structure currently exist: Yes (per watt)',
                'low' => '-0.10000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            21 => 
            array (
                'id' => '27',
                'name' => 'a91-w',
            'description' => 'Are there aesthetic or community limitations: Yes (per watt)',
                'low' => '0.05000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            22 => 
            array (
                'id' => '28',
                'name' => 'a92-w',
            'description' => 'How many meters does your facility have in total: 1 (per watt)',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            23 => 
            array (
                'id' => '29',
                'name' => 'a93-w',
            'description' => 'How many meters does your facility have in total: 2 (per watt)',
                'low' => '0.03000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            24 => 
            array (
                'id' => '30',
                'name' => 'a94-w',
            'description' => 'How many meters does your facility have in total: 3 (per watt)',
                'low' => '0.06000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            25 => 
            array (
                'id' => '31',
                'name' => 'a95-w',
            'description' => 'How many meters does your facility have in total: 4 (per watt)',
                'low' => '0.09000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            26 => 
            array (
                'id' => '32',
                'name' => 'ppa-itc',
            'description' => 'Investment Tax Credit (ITC)',
                'low' => '0.30000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            27 => 
            array (
                'id' => '33',
                'name' => 'ppa-tedr',
                'description' => 'Tax Equity Discount Rate',
                'low' => '0.14000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            28 => 
            array (
                'id' => '34',
                'name' => 'ppa-irr',
                'description' => 'Preferred IRR',
                'low' => '0.10000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            29 => 
            array (
                'id' => '35',
                'name' => 'ppa-db',
                'description' => 'Depreciation Basis',
                'low' => '0.85000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            30 => 
            array (
                'id' => '36',
                'name' => 'ppa-bdw',
                'description' => 'Bonus depreciation worth',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            31 => 
            array (
                'id' => '37',
                'name' => 'ppa-fedtax',
                'description' => 'Fed tax rate',
                'low' => '0.34000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            32 => 
            array (
                'id' => '38',
                'name' => 'ppa-statax',
                'description' => 'CA-State Surcharge per kwh',
                'low' => '0.00029',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            33 => 
            array (
                'id' => '41',
                'name' => 'ppa-omkwdc',
            'description' => 'O&M/kw (DC)',
                'low' => '15.50000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            34 => 
            array (
                'id' => '42',
                'name' => 'ppa-degrad',
                'description' => 'Degradation',
                'low' => '0.00400',
                'high' => '0.00400',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            35 => 
            array (
                'id' => '43',
                'name' => 'ppa-omesc',
                'description' => 'O&M escalator',
                'low' => '0.01000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            36 => 
            array (
                'id' => '44',
                'name' => 'ppa-disbuy',
                'description' => 'Discount Rate Buyout %',
                'low' => '0.10000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            37 => 
            array (
                'id' => '46',
                'name' => 'ppa-devfee',
                'description' => 'Gross Transaction Fee %',
                'low' => '0.15000',
                'high' => '0.15000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            38 => 
            array (
                'id' => '47',
                'name' => 'ppa-macrs-1',
                'description' => 'MACRS schedule - 1',
                'low' => '0.20000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            39 => 
            array (
                'id' => '48',
                'name' => 'ppa-macrs-2',
                'description' => 'MACRS schedule - 2',
                'low' => '0.32000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            40 => 
            array (
                'id' => '49',
                'name' => 'ppa-macrs-3',
                'description' => 'MACRS schedule - 3',
                'low' => '0.19200',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            41 => 
            array (
                'id' => '50',
                'name' => 'ppa-macrs-4',
                'description' => 'MACRS schedule - 4',
                'low' => '0.11520',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            42 => 
            array (
                'id' => '51',
                'name' => 'ppa-macrs-5',
                'description' => 'MACRS schedule - 5',
                'low' => '0.11520',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            43 => 
            array (
                'id' => '52',
                'name' => 'ppa-macrs-6',
                'description' => 'MACRS schedule - 6',
                'low' => '0.05760',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            44 => 
            array (
                'id' => '53',
                'name' => 'ppa-tax-table-4',
                'description' => 'Tax Equity Discount Rate Table - 4',
                'low' => '0.96150',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            45 => 
            array (
                'id' => '54',
                'name' => 'ppa-tax-table-5',
                'description' => 'Tax Equity Discount Rate Table - 5',
                'low' => '0.95240',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            46 => 
            array (
                'id' => '55',
                'name' => 'ppa-tax-table-6',
                'description' => 'Tax Equity Discount Rate Table - 6',
                'low' => '0.94340',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            47 => 
            array (
                'id' => '56',
                'name' => 'ppa-tax-table-7',
                'description' => 'Tax Equity Discount Rate Table - 7',
                'low' => '0.93460',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            48 => 
            array (
                'id' => '57',
                'name' => 'ppa-tax-table-8',
                'description' => 'Tax Equity Discount Rate Table - 8',
                'low' => '0.92590',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            49 => 
            array (
                'id' => '58',
                'name' => 'ppa-tax-table-9',
                'description' => 'Tax Equity Discount Rate Table - 9',
                'low' => '0.91740',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            50 => 
            array (
                'id' => '59',
                'name' => 'ppa-tax-table-10',
                'description' => 'Tax Equity Discount Rate Table - 10',
                'low' => '0.90910',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            51 => 
            array (
                'id' => '60',
                'name' => 'ppa-tax-table-11',
                'description' => 'Tax Equity Discount Rate Table - 11',
                'low' => '0.90090',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            52 => 
            array (
                'id' => '61',
                'name' => 'ppa-tax-table-12',
                'description' => 'Tax Equity Discount Rate Table - 12',
                'low' => '0.89290',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            53 => 
            array (
                'id' => '62',
                'name' => 'ppa-tax-table-13',
                'description' => 'Tax Equity Discount Rate Table - 13',
                'low' => '0.88500',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            54 => 
            array (
                'id' => '63',
                'name' => 'ppa-tax-table-14',
                'description' => 'Tax Equity Discount Rate Table - 14',
                'low' => '0.87720',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            55 => 
            array (
                'id' => '64',
                'name' => 'ppa-tax-table-15',
                'description' => 'Tax Equity Discount Rate Table - 15',
                'low' => '0.86960',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            56 => 
            array (
                'id' => '65',
                'name' => 'ppa-tax-table-16',
                'description' => 'Tax Equity Discount Rate Table - 16',
                'low' => '0.86210',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            57 => 
            array (
                'id' => '66',
                'name' => 'ppa-tax-table-17',
                'description' => 'Tax Equity Discount Rate Table - 17',
                'low' => '0.85470',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            58 => 
            array (
                'id' => '67',
                'name' => 'ppa-tax-table-18',
                'description' => 'Tax Equity Discount Rate Table - 18',
                'low' => '0.84750',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            59 => 
            array (
                'id' => '68',
                'name' => 'ppa-tax-table-19',
                'description' => 'Tax Equity Discount Rate Table - 19',
                'low' => '0.84030',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            60 => 
            array (
                'id' => '69',
                'name' => 'ppa-tax-table-20',
                'description' => 'Tax Equity Discount Rate Table - 20',
                'low' => '0.83330',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            61 => 
            array (
                'id' => '70',
                'name' => 'ppa-loan-lev',
                'description' => 'Leverage',
                'low' => '0.00000',
                'high' => '0.00000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            62 => 
            array (
                'id' => '71',
                'name' => 'ppa-loan-int',
                'description' => 'Interest Rate',
                'low' => '0.00000',
                'high' => '0.00000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            63 => 
            array (
                'id' => '72',
                'name' => 'ppa-loan-term',
                'description' => 'Term',
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            64 => 
            array (
                'id' => '73',
                'name' => 'ppa-loan-debt-rat',
                'description' => 'Debt Service Ratio',
                'low' => '0.75000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            65 => 
            array (
                'id' => '74',
                'name' => 'ppa-caeb',
                'description' => 'Current Annual Energy Budget',
                'low' => '1.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            66 => 
            array (
                'id' => '75',
                'name' => 'ppa-unoffset',
                'description' => 'Unoffsetable',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            67 => 
            array (
                'id' => '76',
                'name' => 'ppa-cashupfront',
                'description' => 'HF cash up front',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            68 => 
            array (
                'id' => '77',
                'name' => 'ppa-ownityear',
                'description' => 'HF own it sooner year',
                'low' => '15.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            69 => 
            array (
                'id' => '78',
                'name' => 'ppa-ownitamt',
                'description' => 'HF own it sooner amount',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            70 => 
            array (
                'id' => '79',
                'name' => 'ppa-ownitesc',
                'description' => 'HF escalator',
                'low' => '0.50000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            71 => 
            array (
                'id' => '80',
                'name' => 'ppa-ommin',
                'description' => 'O&M Minimum',
                'low' => '3000.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            72 => 
            array (
                'id' => '591',
                'name' => 'system-cap-7',
                'description' => 'SCE System Size Cap %',
                'low' => '0.80000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            73 => 
            array (
                'id' => '592',
                'name' => 'system-cap-8',
                'description' => 'PGE System Size Cap %',
                'low' => '0.80000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            74 => 
            array (
                'id' => '593',
                'name' => 'system-cap-9',
                'description' => 'LADWP System Size Cap %',
                'low' => '0.80000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            75 => 
            array (
                'id' => '594',
                'name' => 'system-cap-10',
                'description' => 'SMUD System Size Cap %',
                'low' => '0.80000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            76 => 
            array (
                'id' => '595',
                'name' => 'system-cap-11',
                'description' => 'SDG&E System Size Cap %',
                'low' => '0.80000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            77 => 
            array (
                'id' => '596',
                'name' => 'system-cap-205',
                'description' => 'Hawaii System Size Cap %',
                'low' => '0.90000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            78 => 
            array (
                'id' => '597',
                'name' => 'ppa-omcost',
                'description' => 'O&M as % of Avoided Util Costs',
                'low' => '0.01000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            79 => 
            array (
                'id' => '598',
                'name' => 'ppa-omincr',
                'description' => 'O&M Increase Per Year',
                'low' => '0.01000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            80 => 
            array (
                'id' => '599',
                'name' => 'ppa-deprcost',
                'description' => '% of Total Cost to Depreciate',
                'low' => '0.85000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            81 => 
            array (
                'id' => '600',
                'name' => 'ppa-invcostrepl',
            'description' => 'Inverter Replacement Cost (% of Gross)
',
                'low' => '0.06000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            82 => 
            array (
                'id' => '601',
                'name' => 'ppa-invreplyr',
                'description' => 'Inverter Replacement Year',
                'low' => '12.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            83 => 
            array (
                'id' => '602',
                'name' => 'ppa-extwarr',
                'description' => 'Extended Warranty',
                'low' => '0.10000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            84 => 
            array (
                'id' => '603',
                'name' => 'ppa-invrepl',
                'description' => 'Inverter Replacement One-Time or Annualized',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            85 => 
            array (
                'id' => '604',
                'name' => 'ppa-staitc',
                'description' => 'State ITC Rate',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            86 => 
            array (
                'id' => '605',
                'name' => 'ppa-feditc',
                'description' => 'Fed ITC Rate',
                'low' => '0.30000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            87 => 
            array (
                'id' => '606',
                'name' => 'ppa-annualutilincr',
                'description' => 'Annual % Increase in Utility Rates',
                'low' => '0.02000',
                'high' => '0.04000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            88 => 
            array (
                'id' => '607',
                'name' => 'chart-escalation',
            'description' => 'Utility Energy Escalation Trend Reference (Chart)',
                'low' => '3.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            89 => 
            array (
                'id' => '672',
                'name' => 'ppa-year-ca',
                'description' => 'CA - PBI Years',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            90 => 
            array (
                'id' => '673',
                'name' => 'ppa-year-hi',
                'description' => 'HI - PBI Years',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            91 => 
            array (
                'id' => '674',
                'name' => 'ppa-one-sce-ca',
                'description' => 'CA - SCE - One time incentive',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            92 => 
            array (
                'id' => '675',
                'name' => 'ppa-prod-sce-ca',
                'description' => 'CA - SCE - Production based incentive',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            93 => 
            array (
                'id' => '676',
                'name' => 'ppa-one-pge-ca',
                'description' => 'CA - PGE - One time incentive',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            94 => 
            array (
                'id' => '677',
                'name' => 'ppa-prod-pge-ca',
                'description' => 'CA - PGE - Production based incentive',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            95 => 
            array (
                'id' => '678',
                'name' => 'ppa-one-ladwp-ca',
                'description' => 'CA - LADWP - One time incentive',
                'low' => '0.70000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            96 => 
            array (
                'id' => '679',
                'name' => 'ppa-prod-ladwp-ca',
                'description' => 'CA - LADWP - Production based incentive',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            97 => 
            array (
                'id' => '680',
                'name' => 'ppa-one-smud-ca',
                'description' => 'CA - SMUD - One time incentive',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            98 => 
            array (
                'id' => '681',
                'name' => 'ppa-prod-smud-ca',
                'description' => 'CA - SMUD - Production based incentive',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            99 => 
            array (
                'id' => '682',
                'name' => 'ppa-one-sdg&e-ca',
                'description' => 'CA - SDG&E - One time incentive',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            100 => 
            array (
                'id' => '683',
                'name' => 'ppa-prod-sdg&e-ca',
                'description' => 'CA - SDG&E - Production based incentive',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            101 => 
            array (
                'id' => '684',
                'name' => 'ppa-one-lodi-ca',
                'description' => 'CA - Lodi - One time incentive',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            102 => 
            array (
                'id' => '685',
                'name' => 'ppa-prod-lodi-ca',
                'description' => 'CA - Lodi - Production based incentive',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            103 => 
            array (
                'id' => '686',
                'name' => 'ppa-one-hawaii-ca',
                'description' => 'CA - Hawaii - One time incentive',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            104 => 
            array (
                'id' => '687',
                'name' => 'ppa-prod-hawaii-ca',
                'description' => 'CA - Hawaii - Production based incentive',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            105 => 
            array (
                'id' => '700',
                'name' => 'ppa-one-hawaii-hi',
                'description' => 'HI - Hawaii - One time incentive',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            106 => 
            array (
                'id' => '701',
                'name' => 'ppa-prod-hawaii-hi',
                'description' => 'HI - Hawaii - Production based incentive',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            107 => 
            array (
                'id' => '716',
                'name' => 'sta-tax-ca',
                'description' => 'CA - California - State Tax',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            108 => 
            array (
                'id' => '717',
                'name' => 'sta-tax-hi',
                'description' => 'HI - Hawaii - State Tax',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            109 => 
            array (
                'id' => '718',
                'name' => 'ppa-def-bal-yr',
                'description' => 'PPA Default Balance Year',
                'low' => '25.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            110 => 
            array (
                'id' => '719',
                'name' => 'fac_usg_sum_on_com_7',
                'description' => 'SCE - Facility Usage Assessment - Summer On - Commercial',
                'low' => '0.33000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            111 => 
            array (
                'id' => '720',
                'name' => 'fac_usg_sum_part_com_7',
                'description' => 'SCE - Facility Usage Assessment - Summer Part - Commercial',
                'low' => '0.34000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            112 => 
            array (
                'id' => '721',
                'name' => 'fac_usg_sum_off_com_7',
                'description' => 'SCE - Facility Usage Assessment - Summer Off - Commercial',
                'low' => '0.33000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            113 => 
            array (
                'id' => '723',
                'name' => 'fac_usg_win_part_com_7',
                'description' => 'SCE - Facility Usage Assessment - Winter Part - Commercial',
                'low' => '0.50000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            114 => 
            array (
                'id' => '724',
                'name' => 'fac_usg_win_off_com_7',
                'description' => 'SCE - Facility Usage Assessment - Winter Off - Commercial',
                'low' => '0.50000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            115 => 
            array (
                'id' => '725',
                'name' => 'fac_usg_sum_on_res_7',
                'description' => 'SCE - Facility Usage Assessment - Summer On - Residential',
                'low' => '0.50000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            116 => 
            array (
                'id' => '727',
                'name' => 'fac_usg_sum_off_res_7',
                'description' => 'SCE - Facility Usage Assessment - Summer Off - Residential',
                'low' => '0.50000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            117 => 
            array (
                'id' => '728',
                'name' => 'fac_usg_win_on_res_7',
                'description' => 'SCE - Facility Usage Assessment - Winter On - Residential',
                'low' => '0.50000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            118 => 
            array (
                'id' => '730',
                'name' => 'fac_usg_win_off_res_7',
                'description' => 'SCE - Facility Usage Assessment - Winter Off - Residential',
                'low' => '0.50000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            119 => 
            array (
                'id' => '731',
                'name' => 'fac_usg_sum_on_com_8',
                'description' => 'PGE - Facility Usage Assessment - Summer On - Commercial',
                'low' => '0.33000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            120 => 
            array (
                'id' => '732',
                'name' => 'fac_usg_sum_part_com_8',
                'description' => 'PGE - Facility Usage Assessment - Summer Part - Commercial',
                'low' => '0.34000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            121 => 
            array (
                'id' => '733',
                'name' => 'fac_usg_sum_off_com_8',
                'description' => 'PGE - Facility Usage Assessment - Summer Off - Commercial',
                'low' => '0.33000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            122 => 
            array (
                'id' => '735',
                'name' => 'fac_usg_win_part_com_8',
                'description' => 'PGE - Facility Usage Assessment - Winter Part - Commercial',
                'low' => '0.50000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            123 => 
            array (
                'id' => '736',
                'name' => 'fac_usg_win_off_com_8',
                'description' => 'PGE - Facility Usage Assessment - Winter Off - Commercial',
                'low' => '0.50000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            124 => 
            array (
                'id' => '737',
                'name' => 'fac_usg_sum_on_res_8',
                'description' => 'PGE - Facility Usage Assessment - Summer On - Residential',
                'low' => '0.15000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            125 => 
            array (
                'id' => '738',
                'name' => 'fac_usg_sum_part_res_8',
                'description' => 'PGE - Facility Usage Assessment - Summer Part - Residential',
                'low' => '0.60000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            126 => 
            array (
                'id' => '739',
                'name' => 'fac_usg_sum_off_res_8',
                'description' => 'PGE - Facility Usage Assessment - Summer Off - Residential',
                'low' => '0.25000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            127 => 
            array (
                'id' => '741',
                'name' => 'fac_usg_win_part_res_8',
                'description' => 'PGE - Facility Usage Assessment - Winter Part - Residential',
                'low' => '0.35000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            128 => 
            array (
                'id' => '742',
                'name' => 'fac_usg_win_off_res_8',
                'description' => 'PGE - Facility Usage Assessment - Winter Off - Residential',
                'low' => '0.65000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            129 => 
            array (
                'id' => '749',
                'name' => 'fac_usg_sum_on_res_11',
                'description' => 'SDG&E - Facility Usage Assessment - Summer On - Residential',
                'low' => '0.15000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            130 => 
            array (
                'id' => '750',
                'name' => 'fac_usg_sum_part_res_11',
                'description' => 'SDG&E - Facility Usage Assessment - Summer Part - Residential',
                'low' => '0.60000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            131 => 
            array (
                'id' => '751',
                'name' => 'fac_usg_sum_off_res_11',
                'description' => 'SDG&E - Facility Usage Assessment - Summer Off - Residential',
                'low' => '0.25000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            132 => 
            array (
                'id' => '752',
                'name' => 'fac_usg_win_on_res_11',
                'description' => 'SDG&E - Facility Usage Assessment - Winter On - Residential',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            133 => 
            array (
                'id' => '753',
                'name' => 'fac_usg_win_part_res_11',
                'description' => 'SDG&E - Facility Usage Assessment - Winter Part - Residential',
                'low' => '0.35000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            134 => 
            array (
                'id' => '754',
                'name' => 'fac_usg_win_off_res_11',
                'description' => 'SDG&E - Facility Usage Assessment - Winter Off - Residential',
                'low' => '0.65000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            135 => 
            array (
                'id' => '755',
                'name' => 'fac_usg_sum_on_com_9',
                'description' => 'LADWP - Facility Usage Assessment - Summer High - Commercial',
                'low' => '0.33000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            136 => 
            array (
                'id' => '756',
                'name' => 'fac_usg_sum_part_com_9',
                'description' => 'LADWP - Facility Usage Assessment - Summer Low - Commercial',
                'low' => '0.34000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            137 => 
            array (
                'id' => '757',
                'name' => 'fac_usg_sum_off_com_9',
                'description' => 'LADWP - Facility Usage Assessment - Summer Base - Commercial',
                'low' => '0.33000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            138 => 
            array (
                'id' => '758',
                'name' => 'fac_usg_win_on_com_9',
                'description' => 'LADWP - Facility Usage Assessment - Winter High - Commercial',
                'low' => '0.33000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            139 => 
            array (
                'id' => '759',
                'name' => 'fac_usg_win_part_com_9',
                'description' => 'LADWP - Facility Usage Assessment - Winter Low - Commercial',
                'low' => '0.34000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            140 => 
            array (
                'id' => '760',
                'name' => 'fac_usg_win_off_com_9',
                'description' => 'LADWP - Facility Usage Assessment - Winter Base - Commercial',
                'low' => '0.33000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            141 => 
            array (
                'id' => '761',
                'name' => 'fac_usg_sum_on_res_9',
                'description' => 'LADWP - Facility Usage Assessment - Summer On - Residential',
                'low' => '0.15000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            142 => 
            array (
                'id' => '762',
                'name' => 'fac_usg_sum_part_res_9',
                'description' => 'LADWP - Facility Usage Assessment - Summer Part - Residential',
                'low' => '0.60000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            143 => 
            array (
                'id' => '763',
                'name' => 'fac_usg_sum_off_res_9',
                'description' => 'LADWP - Facility Usage Assessment - Summer Off - Residential',
                'low' => '0.25000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            144 => 
            array (
                'id' => '764',
                'name' => 'fac_usg_win_on_res_9',
                'description' => 'LADWP - Facility Usage Assessment - Winter On - Residential',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            145 => 
            array (
                'id' => '765',
                'name' => 'fac_usg_win_part_res_9',
                'description' => 'LADWP - Facility Usage Assessment - Winter Part - Residential',
                'low' => '0.35000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            146 => 
            array (
                'id' => '766',
                'name' => 'fac_usg_win_off_res_9',
                'description' => 'LADWP - Facility Usage Assessment - Winter Off - Residential',
                'low' => '0.65000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            147 => 
            array (
                'id' => '791',
                'name' => 'lease-down',
                'description' => 'Lease Down Payment %',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            148 => 
            array (
                'id' => '792',
                'name' => 'lease-int',
                'description' => 'Lease Interest Rate %',
                'low' => '0.09000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            149 => 
            array (
                'id' => '793',
                'name' => 'lease-price',
                'description' => 'Lease Residual Purchase Price %',
                'low' => '0.20000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            150 => 
            array (
                'id' => '794',
                'name' => 'lease-term',
            'description' => 'Lease Term (years)',
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            151 => 
            array (
                'id' => '795',
                'name' => 'ppa-esccapyr',
                'description' => 'PPA Escalator cap years',
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            152 => 
            array (
                'id' => '796',
                'name' => 'license-fee-annual-comm',
                'description' => 'license-fee-annual-comm',
                'low' => '3000.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            153 => 
            array (
                'id' => '797',
                'name' => 'license-fee-annual-res',
                'description' => 'license-fee-annual-res',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            154 => 
            array (
                'id' => '798',
                'name' => 'license-fee-annual-both',
                'description' => 'license-fee-annual-both',
                'low' => '0.13000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            155 => 
            array (
                'id' => '799',
                'name' => 'license-fee-monthly-comm',
                'description' => 'license-fee-monthly-comm',
                'low' => '250.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            156 => 
            array (
                'id' => '800',
                'name' => 'license-fee-monthly-res',
                'description' => 'license-fee-monthly-res',
                'low' => '100.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            157 => 
            array (
                'id' => '801',
                'name' => 'license-fee-monthly-both',
                'description' => 'license-fee-monthly-both',
                'low' => '350.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            158 => 
            array (
                'id' => '802',
                'name' => 'deposit-comm',
                'description' => 'deposit-comm',
                'low' => '0.02000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            159 => 
            array (
                'id' => '803',
                'name' => 'deposit-res',
                'description' => 'deposit-res',
                'low' => '0.01000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            160 => 
            array (
                'id' => '804',
                'name' => 'deposit-both',
                'description' => 'deposit-both',
                'low' => '0.03000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            161 => 
            array (
                'id' => '805',
                'name' => 'ppa-mindevfee',
                'description' => 'Minimum Gross Transaction Fee',
                'low' => '50000.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            162 => 
            array (
                'id' => '806',
                'name' => 'res-kw-1000.01',
                'description' => 'Cost per kW 1000.01 and up',
                'low' => '1.90000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            163 => 
            array (
                'id' => '807',
                'name' => 'res-kw-300.01-1000',
                'description' => 'Cost per kW 300.01-1000',
                'low' => '2.20000',
                'high' => '1.90000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            164 => 
            array (
                'id' => '808',
                'name' => 'res-kw-100.01-300',
                'description' => 'Cost per kW 100.01-300',
                'low' => '2.60000',
                'high' => '2.20000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            165 => 
            array (
                'id' => '809',
                'name' => 'res-kw-50.01-100',
                'description' => 'Cost per kW 50.01-100',
                'low' => '3.00000',
                'high' => '2.60000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            166 => 
            array (
                'id' => '810',
                'name' => 'res-kw-12.01-50',
                'description' => 'Cost per kW 12.01-50',
                'low' => '3.50000',
                'high' => '3.00000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            167 => 
            array (
                'id' => '811',
                'name' => 'res-kw-6.01-12',
                'description' => 'Cost per kW 6.01-12',
                'low' => '4.75000',
                'high' => '3.75000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            168 => 
            array (
                'id' => '812',
                'name' => 'res-kw-3.01-6',
                'description' => 'Cost per kW 3.01-6',
                'low' => '5.25000',
                'high' => '4.00000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            169 => 
            array (
                'id' => '813',
                'name' => 'res-kw-0-3',
                'description' => 'Cost per kW 0-3',
                'low' => '6.00000',
                'high' => '4.50000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            170 => 
            array (
                'id' => '814',
                'name' => 'tei-num-yr',
                'description' => 'TEI # of Years',
                'low' => '7.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            171 => 
            array (
                'id' => '815',
                'name' => 'tei-ret',
                'description' => 'Tax Equity Investor Return %',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            172 => 
            array (
                'id' => '816',
                'name' => 'tei-buyout',
                'description' => 'TEI Buyout Discount %',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            173 => 
            array (
                'id' => '817',
                'name' => 'shade-5',
                'description' => 'Shading - 5%',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            174 => 
            array (
                'id' => '818',
                'name' => 'shade-10',
                'description' => 'Shading - 10%',
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            175 => 
            array (
                'id' => '819',
                'name' => 'shade-15',
                'description' => 'Shading - 15%',
                'low' => '15.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            176 => 
            array (
                'id' => '820',
                'name' => 'shade-20',
                'description' => 'Shading - 20%',
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            177 => 
            array (
                'id' => '821',
                'name' => 'shade-25',
                'description' => 'Shading - 25%',
                'low' => '25.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            178 => 
            array (
                'id' => '822',
                'name' => 'shade-30',
                'description' => 'Shading - 30%',
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            179 => 
            array (
                'id' => '823',
                'name' => 'shade-35',
                'description' => 'Shading - 35%',
                'low' => '35.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            180 => 
            array (
                'id' => '824',
                'name' => 'shade-40',
                'description' => 'Shading - 40%',
                'low' => '40.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            181 => 
            array (
                'id' => '825',
                'name' => 'shade-45',
                'description' => 'Shading - 45%',
                'low' => '45.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            182 => 
            array (
                'id' => '826',
                'name' => 'shade-50',
                'description' => 'Shading - 50%',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            183 => 
            array (
                'id' => '827',
                'name' => 'shade-55',
                'description' => 'Shading - 55%',
                'low' => '55.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            184 => 
            array (
                'id' => '828',
                'name' => 'shade-60',
                'description' => 'Shading - 60%',
                'low' => '60.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            185 => 
            array (
                'id' => '829',
                'name' => 'shade-65',
                'description' => 'Shading - 65%',
                'low' => '65.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            186 => 
            array (
                'id' => '830',
                'name' => 'shade-70',
                'description' => 'Shading - 70%',
                'low' => '70.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            187 => 
            array (
                'id' => '831',
                'name' => 'shade-75',
                'description' => 'Shading - 75%',
                'low' => '75.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            188 => 
            array (
                'id' => '832',
                'name' => 'shade-80',
                'description' => 'Shading - 80%',
                'low' => '80.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            189 => 
            array (
                'id' => '833',
                'name' => 'shade-85',
                'description' => 'Shading - 85%',
                'low' => '85.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            190 => 
            array (
                'id' => '834',
                'name' => 'shade-90',
                'description' => 'Shading - 90%',
                'low' => '90.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            191 => 
            array (
                'id' => '835',
                'name' => 'shade-95',
                'description' => 'Shading - 95%',
                'low' => '95.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            192 => 
            array (
                'id' => '836',
                'name' => 'shade-100',
                'description' => 'Shading - 100%',
                'low' => '100.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            193 => 
            array (
                'id' => '837',
                'name' => 'feec-esc',
                'description' => 'Future Expected Electricity Cost +- Esc',
                'low' => '2.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            194 => 
            array (
                'id' => '838',
                'name' => 'tilt-5',
                'description' => 'Tilt - 5°',
                'low' => '0.04000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            195 => 
            array (
                'id' => '839',
                'name' => 'tilt-10',
                'description' => 'Tilt - 10°',
                'low' => '0.07100',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            196 => 
            array (
                'id' => '840',
                'name' => 'tilt-15',
                'description' => 'Tilt - 15°',
                'low' => '0.09500',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            197 => 
            array (
                'id' => '841',
                'name' => 'tilt-20',
                'description' => 'Tilt - 20°',
                'low' => '0.11000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            198 => 
            array (
                'id' => '842',
                'name' => 'tilt-25',
                'description' => 'Tilt - 25°',
                'low' => '0.12000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            199 => 
            array (
                'id' => '843',
                'name' => 'tilt-30',
                'description' => 'Tilt - 30°',
                'low' => '0.12200',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            200 => 
            array (
                'id' => '844',
                'name' => 'inv-enh',
                'description' => 'Micro-Inverter Production Enhancement %',
                'low' => '0.04250',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            201 => 
            array (
                'id' => '845',
                'name' => 'micro-cpw',
                'description' => 'Micro Inverter Cost per watt',
                'low' => '0.20000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            202 => 
            array (
                'id' => '846',
                'name' => 'lease-offset',
                'description' => 'Lease Payment Schedule Initial Offset',
                'low' => '0.43000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            203 => 
            array (
                'id' => '847',
                'name' => 'ladwp-uut',
                'description' => 'LADWP City Tax',
                'low' => '12.50000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            204 => 
            array (
                'id' => '848',
                'name' => 'lease-amgo',
                'description' => 'Lease AMGO',
                'low' => '95.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            205 => 
            array (
                'id' => '849',
                'name' => 'license-fee-triennial-both',
                'description' => 'license-fee-triennial-both',
                'low' => '9000.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            206 => 
            array (
                'id' => '850',
                'name' => 'deposit-annual-comm',
                'description' => 'deposit-annual-comm',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            207 => 
            array (
                'id' => '851',
                'name' => 'deposit-annual-res',
                'description' => 'deposit-annual-res',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            208 => 
            array (
                'id' => '852',
                'name' => 'deposit-triennial-both',
                'description' => 'deposit-triennial-both',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            209 => 
            array (
                'id' => '853',
                'name' => 'lease-rent',
                'description' => 'Site Lease Rent',
                'low' => '1.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            210 => 
            array (
                'id' => '854',
                'name' => 'ppa-hawaiitei',
                'description' => 'In State Hawaii Tax Equity Investor',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            211 => 
            array (
                'id' => '855',
                'name' => 'ppa-hawaiitci',
                'description' => 'Hawaii State Tax Credit %',
                'low' => '0.35000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            212 => 
            array (
                'id' => '856',
                'name' => 'ppa-hawaiinonres',
                'description' => 'Hawaii Non Resident State Tax Incentive %',
                'low' => '0.70000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            213 => 
            array (
                'id' => '857',
                'name' => 'ppa-prod-sdg&e-ca-nonprof',
                'description' => 'CA - SDGE - Production based incentive: govt/nonprofit',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            214 => 
            array (
                'id' => '858',
                'name' => 'ppa-prod-sce-ca-nonprof',
                'description' => 'CA - SCE - Production based incentive: govt/nonprofit',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            215 => 
            array (
                'id' => '859',
                'name' => 'wsar-project-development-points',
                'description' => 'wsar-project-development-points',
                'low' => '100.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            216 => 
            array (
                'id' => '860',
                'name' => 'wsar-242',
                'description' => 'wsar-242',
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            217 => 
            array (
                'id' => '861',
                'name' => 'wsar-243',
                'description' => 'wsar-243',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            218 => 
            array (
                'id' => '862',
                'name' => 'wsar-244',
                'description' => 'wsar-244',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            219 => 
            array (
                'id' => '863',
                'name' => 'wsar-228',
                'description' => 'wsar-228',
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            220 => 
            array (
                'id' => '864',
                'name' => 'wsar-229',
                'description' => 'wsar-229',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            221 => 
            array (
                'id' => '865',
                'name' => 'wsar-230',
                'description' => 'wsar-230',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            222 => 
            array (
                'id' => '866',
                'name' => 'wsar-231',
                'description' => 'wsar-231',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            223 => 
            array (
                'id' => '867',
                'name' => 'wsar-232',
                'description' => 'wsar-232',
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            224 => 
            array (
                'id' => '868',
                'name' => 'wsar-233',
                'description' => 'wsar-233',
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            225 => 
            array (
                'id' => '869',
                'name' => 'wsar-234',
                'description' => 'wsar-234',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            226 => 
            array (
                'id' => '870',
                'name' => 'wsar-work-exp-0',
                'description' => 'wsar-work-exp-0',
                'low' => '25.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            227 => 
            array (
                'id' => '871',
                'name' => 'wsar-work-exp-1',
                'description' => 'wsar-work-exp-1',
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            228 => 
            array (
                'id' => '872',
                'name' => 'wsar-work-exp-2',
                'description' => 'wsar-work-exp-2',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            229 => 
            array (
                'id' => '873',
                'name' => 'wsar-work-exp-3',
                'description' => 'wsar-work-exp-3',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            230 => 
            array (
                'id' => '874',
                'name' => 'wsar-work-exp-4',
                'description' => 'wsar-work-exp-4',
                'low' => '4.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            231 => 
            array (
                'id' => '875',
                'name' => 'wsar-roof-study-1',
                'description' => 'wsar-roof-study-1',
                'low' => '7.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            232 => 
            array (
                'id' => '876',
                'name' => 'wsar-66',
                'description' => 'wsar-66',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            233 => 
            array (
                'id' => '877',
                'name' => 'wsar-67',
                'description' => 'wsar-67',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            234 => 
            array (
                'id' => '878',
                'name' => 'wsar-68',
                'description' => 'wsar-68',
                'low' => '3.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            235 => 
            array (
                'id' => '879',
                'name' => 'wsar-soil-cond-1',
                'description' => 'wsar-soil-cond-1',
                'low' => '7.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            236 => 
            array (
                'id' => '880',
                'name' => 'wsar-soil-cond-2',
                'description' => 'wsar-soil-cond-2',
                'low' => '3.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            237 => 
            array (
                'id' => '881',
                'name' => 'wsar-14',
                'description' => 'wsar-14',
                'low' => '1.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            238 => 
            array (
                'id' => '882',
                'name' => 'wsar-int-prop',
                'description' => 'wsar-int-prop',
                'low' => '1.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            239 => 
            array (
                'id' => '883',
                'name' => 'wsar-system-performance-points',
                'description' => 'wsar-system-performance-points',
                'low' => '300.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            240 => 
            array (
                'id' => '884',
                'name' => 'wsar-panel-mfr-warr-1',
                'description' => 'wsar-panel-mfr-warr-1',
                'low' => '45.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            241 => 
            array (
                'id' => '885',
                'name' => 'wsar-panel-mfr-warr-2',
                'description' => 'wsar-panel-mfr-warr-2',
                'low' => '40.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            242 => 
            array (
                'id' => '886',
                'name' => 'wsar-panel-mfr-warr-3',
                'description' => 'wsar-panel-mfr-warr-3',
                'low' => '35.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            243 => 
            array (
                'id' => '887',
                'name' => 'wsar-panel-mfr-warr-4',
                'description' => 'wsar-panel-mfr-warr-4',
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            244 => 
            array (
                'id' => '888',
                'name' => 'wsar-panel-mfr-warr-5',
                'description' => 'wsar-panel-mfr-warr-5',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            245 => 
            array (
                'id' => '889',
                'name' => 'wsar-panel-mfr-fin-1',
                'description' => 'wsar-panel-mfr-fin-1',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            246 => 
            array (
                'id' => '890',
                'name' => 'wsar-245',
                'description' => 'wsar-245',
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            247 => 
            array (
                'id' => '891',
                'name' => 'wsar-247',
                'description' => 'wsar-247',
                'low' => '40.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            248 => 
            array (
                'id' => '892',
                'name' => 'wsar-inv-mfr-warr-1',
                'description' => 'wsar-inv-mfr-warr-1',
                'low' => '70.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            249 => 
            array (
                'id' => '893',
                'name' => 'wsar-249',
                'description' => 'wsar-249',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            250 => 
            array (
                'id' => '894',
                'name' => 'wsar-host-fac-credit-points',
                'description' => 'wsar-host-fac-credit-points',
                'low' => '400.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            251 => 
            array (
                'id' => '895',
                'name' => 'wsar-rack-serv-1',
                'description' => 'wsar-rack-serv-1',
                'low' => '80.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            252 => 
            array (
                'id' => '896',
                'name' => 'wsar-236',
                'description' => 'wsar-236',
                'low' => '200.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            253 => 
            array (
                'id' => '897',
                'name' => 'wsar-237',
                'description' => 'wsar-237',
                'low' => '200.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            254 => 
            array (
                'id' => '898',
                'name' => 'wsar-238',
                'description' => 'wsar-238',
                'low' => '200.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            255 => 
            array (
                'id' => '899',
                'name' => 'wsar-239',
                'description' => 'wsar-239',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            256 => 
            array (
                'id' => '900',
                'name' => 'wsar-legal-pol-points',
                'description' => 'wsar-legal-pol-points',
                'low' => '100.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            257 => 
            array (
                'id' => '901',
                'name' => 'wsar-251',
                'description' => 'wsar-251',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            258 => 
            array (
                'id' => '902',
                'name' => 'wsar-252',
                'description' => 'wsar-252',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            259 => 
            array (
                'id' => '903',
                'name' => 'wsar-254',
                'description' => 'wsar-254',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            260 => 
            array (
                'id' => '904',
                'name' => 'wsar-255',
                'description' => 'wsar-255',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            261 => 
            array (
                'id' => '905',
                'name' => 'wsar-subord-agr-1',
                'description' => 'wsar-subord-agr-1',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            262 => 
            array (
                'id' => '906',
                'name' => 'wsar-256',
                'description' => 'wsar-256',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            263 => 
            array (
                'id' => '907',
                'name' => 'wsar-257',
                'description' => 'wsar-257',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            264 => 
            array (
                'id' => '908',
                'name' => 'wsar-title-insur-1',
                'description' => 'wsar-title-insur-1',
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            265 => 
            array (
                'id' => '909',
                'name' => 'wsar-title-insur-2',
                'description' => 'wsar-title-insur-2',
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            266 => 
            array (
                'id' => '910',
                'name' => 'wsar-258',
                'description' => 'wsar-258',
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            267 => 
            array (
                'id' => '911',
                'name' => 'wsar-259',
                'description' => 'wsar-259',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            268 => 
            array (
                'id' => '912',
                'name' => 'wsar-serv-admin-points',
                'description' => 'wsar-serv-admin-points',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            269 => 
            array (
                'id' => '913',
                'name' => 'wsar-260',
                'description' => 'wsar-260',
                'low' => '15.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            270 => 
            array (
                'id' => '914',
                'name' => 'wsar-261',
                'description' => 'wsar-261',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            271 => 
            array (
                'id' => '915',
                'name' => 'wsar-262',
                'description' => 'wsar-262',
                'low' => '15.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            272 => 
            array (
                'id' => '916',
                'name' => 'wsar-263',
                'description' => 'wsar-263',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            273 => 
            array (
                'id' => '917',
                'name' => 'wsar-264',
                'description' => 'wsar-264',
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            274 => 
            array (
                'id' => '918',
                'name' => 'wsar-265',
                'description' => 'wsar-265',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            275 => 
            array (
                'id' => '919',
                'name' => 'wsar-266',
                'description' => 'wsar-266',
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            276 => 
            array (
                'id' => '920',
                'name' => 'wsar-267',
                'description' => 'wsar-267',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            277 => 
            array (
                'id' => '921',
                'name' => 'wsar-first-loss-points',
                'description' => 'wsar-first-loss-points',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            278 => 
            array (
                'id' => '922',
                'name' => 'wsar-268',
                'description' => 'wsar-268',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            279 => 
            array (
                'id' => '923',
                'name' => 'wsar-269',
                'description' => 'wsar-269',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            280 => 
            array (
                'id' => '924',
                'name' => 'wsar-total-points',
                'description' => 'wsar-total-points',
                'low' => '1000.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            281 => 
            array (
                'id' => '925',
                'name' => 'hawaii-cpw',
                'description' => 'Hawaii State Adder',
                'low' => '0.75000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            282 => 
            array (
                'id' => '926',
                'name' => 'ppa-one-ladwp-ca-nonprof',
                'description' => 'CA - LADWP - One time incentive: govt/nonprofit',
                'low' => '1.45000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            283 => 
            array (
                'id' => '927',
                'name' => 'const_fin',
                'description' => 'Construction Financing',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            284 => 
            array (
                'id' => '928',
                'name' => 'sales_fee',
                'description' => 'Sales/ Referral Fee',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            285 => 
            array (
                'id' => '929',
                'name' => 'te_fee',
                'description' => 'TE Fee',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            286 => 
            array (
                'id' => '930',
                'name' => 'llc_fee',
                'description' => 'LLC Management Fee',
                'low' => '0.00250',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            287 => 
            array (
                'id' => '931',
                'name' => 'fyas_min',
                'description' => 'First Year Annual Savings minimum threshold',
                'low' => '1000.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            288 => 
            array (
                'id' => '932',
                'name' => 'wiser_fee_z1',
                'description' => 'Wiser Fee reduction for PPA optimizations - Z1',
                'low' => '1.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            289 => 
            array (
                'id' => '933',
                'name' => 'wiser_fee_z2',
                'description' => 'Wiser Fee reduction for PPA optimizations - Z2',
                'low' => '2.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            290 => 
            array (
                'id' => '934',
                'name' => 'wiser_fee_z3',
                'description' => 'Wiser Fee reduction for PPA optimizations - Z3',
                'low' => '3.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            291 => 
            array (
                'id' => '935',
                'name' => 'ppa-te-cap',
                'description' => 'TE% of Cap Stack',
                'low' => '1.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            292 => 
            array (
                'id' => '936',
                'name' => 'ppa-wc-leave',
                'description' => 'WC leaves in',
                'low' => '0.01000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            293 => 
            array (
                'id' => '937',
                'name' => 'ppa-min-cash-avail',
                'description' => 'Minimum Cash Available',
                'low' => '-1000.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            294 => 
            array (
                'id' => '939',
                'name' => 'ppa-wc-leave-new',
                'description' => 'WC leaves in - New PPA',
                'low' => '0.10000',
                'high' => '0.20000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            295 => 
            array (
                'id' => '941',
                'name' => 'willis-panels',
                'description' => '% total project value to panels',
                'low' => '0.50000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            296 => 
            array (
                'id' => '942',
                'name' => 'willis-rack',
                'description' => '% total project value to racking',
                'low' => '0.10000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            297 => 
            array (
                'id' => '943',
                'name' => 'willis-bos',
                'description' => '% total project value to BOS',
                'low' => '0.20000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            298 => 
            array (
                'id' => '944',
                'name' => 'willis-inv',
                'description' => '% total project value to Inverters',
                'low' => '0.19000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            299 => 
            array (
                'id' => '945',
                'name' => 'willis-fence',
                'description' => '% total project value to Fence',
                'low' => '0.01000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            300 => 
            array (
                'id' => '946',
                'name' => 'willis-trailer',
                'description' => '% total project value to Buildings/Trailers?',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            301 => 
            array (
                'id' => '947',
                'name' => 'wsar-standard-docs-points',
                'description' => 'wsar-standard-docs-points',
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            302 => 
            array (
                'id' => '948',
                'name' => 'wsar-project-permit-points',
                'description' => 'wsar-project-permit-points',
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            303 => 
            array (
                'id' => '949',
                'name' => 'wsar-util-intercon-points',
                'description' => 'wsar-util-intercon-points',
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            304 => 
            array (
                'id' => '950',
                'name' => 'wsar-work-exp-points',
                'description' => 'wsar-work-exp-points',
                'low' => '49.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            305 => 
            array (
                'id' => '951',
                'name' => 'wsar-roof-study-points',
                'description' => 'wsar-roof-study-points',
                'low' => '7.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            306 => 
            array (
                'id' => '952',
                'name' => 'wsar-struct-eng-points',
                'description' => 'wsar-struct-eng-points',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            307 => 
            array (
                'id' => '953',
                'name' => 'wsar-soil-cond-points',
                'description' => 'wsar-soil-cond-points',
                'low' => '7.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            308 => 
            array (
                'id' => '954',
                'name' => 'wsar-int-prop-points',
                'description' => 'wsar-int-prop-points',
                'low' => '1.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            309 => 
            array (
                'id' => '955',
                'name' => 'wsar-panel-mfr-warr-points',
                'description' => 'wsar-panel-mfr-warr-points',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            310 => 
            array (
                'id' => '956',
                'name' => 'wsar-panel-mfr-fin-points',
                'description' => 'wsar-panel-mfr-fin-points',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            311 => 
            array (
                'id' => '957',
                'name' => 'wsar-panel-mfr-hist-points',
                'description' => 'wsar-panel-mfr-hist-points',
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            312 => 
            array (
                'id' => '958',
                'name' => 'wsar-inv-mfr-fin-points',
                'description' => 'wsar-inv-mfr-fin-points',
                'low' => '60.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            313 => 
            array (
                'id' => '959',
                'name' => 'wsar-inv-mfr-warr-points',
                'description' => 'wsar-inv-mfr-warr-points',
                'low' => '70.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            314 => 
            array (
                'id' => '960',
                'name' => 'wsar-project-insur-points',
                'description' => 'wsar-project-insur-points',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            315 => 
            array (
                'id' => '961',
                'name' => 'wsar-rack-serv-points',
                'description' => 'wsar-rack-serv-points',
                'low' => '40.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            316 => 
            array (
                'id' => '962',
                'name' => 'wsar-public-debt-points',
                'description' => 'wsar-public-debt-points',
                'low' => '200.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            317 => 
            array (
                'id' => '963',
                'name' => 'wsar-public-debt-no-points',
                'description' => 'wsar-public-debt-no-points',
                'low' => '175.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            318 => 
            array (
                'id' => '964',
                'name' => 'wsar-proj-risk-points',
                'description' => 'wsar-proj-risk-points',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            319 => 
            array (
                'id' => '965',
                'name' => 'wsar-fire-insur-points',
                'description' => 'wsar-fire-insur-points',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            320 => 
            array (
                'id' => '966',
                'name' => 'wsar-subord-agr-points',
                'description' => 'wsar-subord-agr-points',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            321 => 
            array (
                'id' => '967',
                'name' => 'wsar-title-insur-points',
                'description' => 'wsar-title-insur-points',
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            322 => 
            array (
                'id' => '968',
                'name' => 'wsar-public-risk-points',
                'description' => 'wsar-public-risk-points',
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            323 => 
            array (
                'id' => '969',
                'name' => 'wsar-om-points',
                'description' => 'wsar-om-points',
                'low' => '15.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            324 => 
            array (
                'id' => '970',
                'name' => 'wsar-serv-risk-points',
                'description' => 'wsar-serv-risk-points',
                'low' => '15.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            325 => 
            array (
                'id' => '971',
                'name' => 'wsar-sequest-acnt-points',
                'description' => 'wsar-sequest-acnt-points',
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            326 => 
            array (
                'id' => '972',
                'name' => 'wsar-bus-int-insur-points',
                'description' => 'wsar-bus-int-insur-points',
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            327 => 
            array (
                'id' => '973',
                'name' => 'wsar-first-loss-5-points',
                'description' => 'wsar-first-loss-5-points',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            328 => 
            array (
                'id' => '974',
                'name' => 'Hyundai-wsar-panel-mfr-fin-points',
                'description' => 'Hyundai-wsar-panel-mfr-fin-points',
                'low' => '40.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            329 => 
            array (
                'id' => '975',
                'name' => 'Hyundai-wsar-panel-mfr-hist-points',
                'description' => 'Hyundai-wsar-panel-mfr-hist-points',
                'low' => '25.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            330 => 
            array (
                'id' => '976',
                'name' => 'Hyundai Solar-wsar-panel-mfr-fin-points',
                'description' => 'Hyundai Solar-wsar-panel-mfr-fin-points',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            331 => 
            array (
                'id' => '977',
                'name' => 'Hyundai Solar-wsar-panel-mfr-hist-points',
                'description' => 'Hyundai Solar-wsar-panel-mfr-hist-points',
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            332 => 
            array (
                'id' => '978',
                'name' => 'SMA America-wsar-inv-mfr-fin-points',
                'description' => 'SMA America-wsar-inv-mfr-fin-points',
                'low' => '60.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            333 => 
            array (
                'id' => '979',
                'name' => 'Solectria Renewables -wsar-inv-mfr-fin-points',
                'description' => 'Solectria Renewables -wsar-inv-mfr-fin-points',
                'low' => '60.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            334 => 
            array (
                'id' => '980',
                'name' => 'LG Electric MONO X NEON 300W-wsar-panel-mfr-fin-po',
                'description' => 'LG Electric MONO X NEON 300W-wsar-panel-mfr-fin-po',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            335 => 
            array (
                'id' => '981',
                'name' => 'LG Electric MONO X NEON 300W-wsar-panel-mfr-hist-p',
                'description' => 'LG Electric MONO X NEON 300W-wsar-panel-mfr-hist-p',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            336 => 
            array (
                'id' => '982',
                'name' => 'LG Electronics-wsar-panel-mfr-fin-points',
                'description' => 'LG Electronics-wsar-panel-mfr-fin-points',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            337 => 
            array (
                'id' => '983',
                'name' => 'LG Electronics-wsar-panel-mfr-hist-points',
                'description' => 'LG Electronics-wsar-panel-mfr-hist-points',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            338 => 
            array (
                'id' => '984',
                'name' => 'SunPower-wsar-panel-mfr-fin-points',
                'description' => 'SunPower-wsar-panel-mfr-fin-points',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            339 => 
            array (
                'id' => '985',
                'name' => 'SunPower-wsar-panel-mfr-hist-points',
                'description' => 'SunPower-wsar-panel-mfr-hist-points',
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            340 => 
            array (
                'id' => '986',
                'name' => 'SunEdison-wsar-panel-mfr-fin-points',
                'description' => 'SunEdison-wsar-panel-mfr-fin-points',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            341 => 
            array (
                'id' => '987',
                'name' => 'SunEdison-wsar-panel-mfr-hist-points',
                'description' => 'SunEdison-wsar-panel-mfr-hist-points',
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            342 => 
            array (
                'id' => '988',
                'name' => 'Silfab-wsar-panel-mfr-fin-points',
                'description' => 'Silfab-wsar-panel-mfr-fin-points',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            343 => 
            array (
                'id' => '989',
                'name' => 'Silfab-wsar-panel-mfr-hist-points',
                'description' => 'Silfab-wsar-panel-mfr-hist-points',
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            344 => 
            array (
                'id' => '990',
                'name' => 'LG Electronics -wsar-panel-mfr-fin-points',
                'description' => 'LG Electronics -wsar-panel-mfr-fin-points',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            345 => 
            array (
                'id' => '991',
                'name' => 'LG Electronics -wsar-panel-mfr-hist-points',
                'description' => 'LG Electronics -wsar-panel-mfr-hist-points',
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            346 => 
            array (
                'id' => '992',
                'name' => 'ET Solar-wsar-panel-mfr-fin-points',
                'description' => 'ET Solar-wsar-panel-mfr-fin-points',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            347 => 
            array (
                'id' => '993',
                'name' => 'ET Solar-wsar-panel-mfr-hist-points',
                'description' => 'ET Solar-wsar-panel-mfr-hist-points',
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            348 => 
            array (
                'id' => '994',
                'name' => 'Canadian Solar-wsar-panel-mfr-fin-points',
                'description' => 'Canadian Solar-wsar-panel-mfr-fin-points',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            349 => 
            array (
                'id' => '995',
                'name' => 'Canadian Solar-wsar-panel-mfr-hist-points',
                'description' => 'Canadian Solar-wsar-panel-mfr-hist-points',
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            350 => 
            array (
                'id' => '996',
                'name' => 'ABB-wsar-inv-mfr-fin-points',
                'description' => 'ABB-wsar-inv-mfr-fin-points',
                'low' => '60.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            351 => 
            array (
                'id' => '997',
                'name' => 'Advanced Energy-wsar-inv-mfr-fin-points',
                'description' => 'Advanced Energy-wsar-inv-mfr-fin-points',
                'low' => '60.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            352 => 
            array (
                'id' => '998',
                'name' => 'Chint-wsar-inv-mfr-fin-points',
                'description' => 'Chint-wsar-inv-mfr-fin-points',
                'low' => '60.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            353 => 
            array (
                'id' => '999',
                'name' => 'Enphase-wsar-inv-mfr-fin-points',
                'description' => 'Enphase-wsar-inv-mfr-fin-points',
                'low' => '60.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            354 => 
            array (
                'id' => '1000',
                'name' => 'Fronius USA-wsar-inv-mfr-fin-points',
                'description' => 'Fronius USA-wsar-inv-mfr-fin-points',
                'low' => '60.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            355 => 
            array (
                'id' => '1001',
                'name' => 'SolarEdge-wsar-inv-mfr-fin-points',
                'description' => 'SolarEdge-wsar-inv-mfr-fin-points',
                'low' => '60.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            356 => 
            array (
                'id' => '1002',
                'name' => 'Hanwha-wsar-panel-mfr-fin-points',
                'description' => 'Hanwha-wsar-panel-mfr-fin-points',
                'low' => '25.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            357 => 
            array (
                'id' => '1003',
                'name' => 'Hanwha-wsar-panel-mfr-hist-points',
                'description' => 'Hanwha-wsar-panel-mfr-hist-points',
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            358 => 
            array (
                'id' => '1004',
                'name' => 'Canadian Solar -wsar-panel-mfr-fin-points',
                'description' => 'Canadian Solar -wsar-panel-mfr-fin-points',
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            359 => 
            array (
                'id' => '1005',
                'name' => 'Canadian Solar -wsar-panel-mfr-hist-points',
                'description' => 'Canadian Solar -wsar-panel-mfr-hist-points',
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            360 => 
            array (
                'id' => '1006',
                'name' => 'wsar-69',
                'description' => 'wsar-69',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            361 => 
            array (
                'id' => '1007',
                'name' => 'wsar-70',
                'description' => 'wsar-70',
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            362 => 
            array (
                'id' => '1008',
                'name' => 'wsar-71',
                'description' => 'wsar-71',
                'low' => '3.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            363 => 
            array (
                'id' => '1009',
                'name' => 'wsar-72',
                'description' => 'wsar-72',
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            364 => 
            array (
                'id' => '1010',
                'name' => 'Solectria Renewables-wsar-inv-mfr-fin-points',
                'description' => 'Solectria Renewables-wsar-inv-mfr-fin-points',
                'low' => '60.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            365 => 
            array (
                'id' => '1011',
                'name' => 'system-cap-206',
                'description' => 'Lodi System Size Cap %',
                'low' => '0.80000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            366 => 
            array (
                'id' => '1012',
                'name' => 'Z_JS_Linear TEST-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            367 => 
            array (
                'id' => '1013',
                'name' => 'Z_JS_Linear TEST-wsar-panel-mfr-hist-points',
                'description' => NULL,
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            368 => 
            array (
                'id' => '1014',
                'name' => 'Z_JS_Linear TEST_25_80-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            369 => 
            array (
                'id' => '1015',
                'name' => 'Z_JS_Linear TEST_25_80-wsar-panel-mfr-hist-points',
                'description' => NULL,
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            370 => 
            array (
                'id' => '1016',
                'name' => 'Z_JS_Linear TEST_25_85-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            371 => 
            array (
                'id' => '1017',
                'name' => 'Z_JS_Linear TEST_25_85-wsar-panel-mfr-hist-points',
                'description' => NULL,
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            372 => 
            array (
                'id' => '1018',
                'name' => 'Z_JS_Linear TEST_30_80-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            373 => 
            array (
                'id' => '1019',
                'name' => 'Z_JS_Linear TEST_30_80-wsar-panel-mfr-hist-points',
                'description' => NULL,
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            374 => 
            array (
                'id' => '1020',
                'name' => 'Z_JS_Linear TEST_20_80-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            375 => 
            array (
                'id' => '1021',
                'name' => 'Z_JS_Linear TEST_20_80-wsar-panel-mfr-hist-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            376 => 
            array (
                'id' => '1022',
                'name' => 'Z_JS_Standard TEST_20_80-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            377 => 
            array (
                'id' => '1023',
                'name' => 'Z_JS_Standard TEST_20_80-wsar-panel-mfr-hist-point',
                'description' => NULL,
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            378 => 
            array (
                'id' => '1024',
                'name' => 'Z_JS_Standard_TEST_20_80-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            379 => 
            array (
                'id' => '1026',
                'name' => 'Z_JS_Standard_TEST_25_80-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            380 => 
            array (
                'id' => '1028',
                'name' => 'Z_JS_Standard_TEST_30_80-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            381 => 
            array (
                'id' => '1030',
                'name' => 'Z_JS_Standard_TEST_25_85-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            382 => 
            array (
                'id' => '1032',
                'name' => 'Z_JS_Standard_TEST_25_85-wsar-panel-mfr-hist-point',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            383 => 
            array (
                'id' => '1033',
                'name' => 'Z_JS_Standard_TEST_30_80-wsar-panel-mfr-hist-point',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            384 => 
            array (
                'id' => '1035',
                'name' => 'Z_JS_Standard_TEST_20_80-wsar-panel-mfr-hist-point',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            385 => 
            array (
                'id' => '1036',
                'name' => 'Z_JS_Standard_TEST_30_80-wsar-panel-mfr-hist-point',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            386 => 
            array (
                'id' => '1037',
                'name' => 'Z_JS_Standard_TEST_25_80-wsar-panel-mfr-hist-point',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            387 => 
            array (
                'id' => '1038',
                'name' => 'wsar-inv-mfr-warr-2',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            388 => 
            array (
                'id' => '1039',
                'name' => 'wsar-hist-via-points',
                'description' => NULL,
                'low' => '100.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            389 => 
            array (
                'id' => '1040',
                'name' => 'wsar-host-sav-points',
                'description' => NULL,
                'low' => '100.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            390 => 
            array (
                'id' => '1041',
                'name' => 'Chint Power-wsar-inv-mfr-fin-points',
                'description' => NULL,
                'low' => '60.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            391 => 
            array (
                'id' => '1042',
                'name' => 'Fronius-wsar-inv-mfr-fin-points',
                'description' => NULL,
                'low' => '60.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            392 => 
            array (
                'id' => '1043',
                'name' => 'KACO-wsar-inv-mfr-fin-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            393 => 
            array (
                'id' => '1044',
                'name' => 'Nextronex-wsar-inv-mfr-fin-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            394 => 
            array (
                'id' => '1045',
                'name' => 'Satcon-wsar-inv-mfr-fin-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            395 => 
            array (
                'id' => '1046',
                'name' => 'Schneider Electric-wsar-inv-mfr-fin-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            396 => 
            array (
                'id' => '1047',
                'name' => 'Solectria-wsar-inv-mfr-fin-points',
                'description' => NULL,
                'low' => '60.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            397 => 
            array (
                'id' => '1048',
                'name' => 'SMA America--wsar-inv-mfr-fin-points',
                'description' => NULL,
                'low' => '60.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            398 => 
            array (
                'id' => '1049',
                'name' => 'Hanwha SolarOne-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '40.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            399 => 
            array (
                'id' => '1050',
                'name' => 'Hanwha SolarOne-wsar-panel-mfr-hist-points',
                'description' => NULL,
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            400 => 
            array (
                'id' => '1051',
                'name' => 'Jinko Solar-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            401 => 
            array (
                'id' => '1052',
                'name' => 'Jinko Solar-wsar-panel-mfr-hist-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            402 => 
            array (
                'id' => '1053',
                'name' => 'Kyocera Solar-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            403 => 
            array (
                'id' => '1054',
                'name' => 'Kyocera Solar-wsar-panel-mfr-hist-points',
                'description' => NULL,
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            404 => 
            array (
                'id' => '1055',
                'name' => 'REC Group-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            405 => 
            array (
                'id' => '1056',
                'name' => 'REC Group-wsar-panel-mfr-hist-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            406 => 
            array (
                'id' => '1057',
                'name' => 'ReneSola-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            407 => 
            array (
                'id' => '1058',
                'name' => 'ReneSola-wsar-panel-mfr-hist-points',
                'description' => NULL,
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            408 => 
            array (
                'id' => '1059',
                'name' => 'Sharp-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            409 => 
            array (
                'id' => '1060',
                'name' => 'Sharp-wsar-panel-mfr-hist-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            410 => 
            array (
                'id' => '1061',
                'name' => 'Silfab Solar-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            411 => 
            array (
                'id' => '1062',
                'name' => 'Silfab Solar-wsar-panel-mfr-hist-points',
                'description' => NULL,
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            412 => 
            array (
                'id' => '1063',
                'name' => 'Yingli Green Energy-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            413 => 
            array (
                'id' => '1064',
                'name' => 'Yingli Green Energy-wsar-panel-mfr-hist-points',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            414 => 
            array (
                'id' => '1065',
                'name' => 'wsar-324',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            415 => 
            array (
                'id' => '1066',
                'name' => 'wsar-325',
                'description' => NULL,
                'low' => '-40.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            416 => 
            array (
                'id' => '1067',
                'name' => 'wsar-326',
                'description' => NULL,
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            417 => 
            array (
                'id' => '1068',
                'name' => 'wsar-327',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            418 => 
            array (
                'id' => '1069',
                'name' => 'wsar-328',
                'description' => NULL,
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            419 => 
            array (
                'id' => '1070',
                'name' => 'wsar-329',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            420 => 
            array (
                'id' => '1071',
                'name' => 'wsar-330',
                'description' => NULL,
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            421 => 
            array (
                'id' => '1072',
                'name' => 'wsar-331',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            422 => 
            array (
                'id' => '1073',
                'name' => 'wsar-332',
                'description' => NULL,
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            423 => 
            array (
                'id' => '1074',
                'name' => 'wsar-333',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            424 => 
            array (
                'id' => '1075',
                'name' => 'wsar-334',
                'description' => NULL,
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            425 => 
            array (
                'id' => '1076',
                'name' => 'wsar-335',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            426 => 
            array (
                'id' => '1077',
                'name' => 'wsar-336',
                'description' => NULL,
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            427 => 
            array (
                'id' => '1078',
                'name' => 'wsar-337',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            428 => 
            array (
                'id' => '1079',
                'name' => 'wsar-338',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            429 => 
            array (
                'id' => '1080',
                'name' => 'wsar-339',
                'description' => NULL,
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            430 => 
            array (
                'id' => '1081',
                'name' => 'wsar-340',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            431 => 
            array (
                'id' => '1082',
                'name' => 'wsar-341',
                'description' => NULL,
                'low' => '-20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            432 => 
            array (
                'id' => '1083',
                'name' => 'wsar-342',
                'description' => NULL,
                'low' => '-20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            433 => 
            array (
                'id' => '1084',
                'name' => 'wsar-343',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            434 => 
            array (
                'id' => '1085',
                'name' => 'wsar-344',
                'description' => NULL,
                'low' => '-20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            435 => 
            array (
                'id' => '1086',
                'name' => 'wsar-345',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            436 => 
            array (
                'id' => '1087',
                'name' => 'wsar-346',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            437 => 
            array (
                'id' => '1088',
                'name' => 'wsar-347',
                'description' => NULL,
                'low' => '-40.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            438 => 
            array (
                'id' => '1089',
                'name' => 'wsar-348',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            439 => 
            array (
                'id' => '1090',
                'name' => 'wsar-349',
                'description' => NULL,
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            440 => 
            array (
                'id' => '1091',
                'name' => 'wsar-profit-gov-decline',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            441 => 
            array (
                'id' => '1092',
                'name' => 'wsar-profit-gov-stable',
                'description' => NULL,
                'low' => '40.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            442 => 
            array (
                'id' => '1093',
                'name' => 'wsar-profit-gov-increase',
                'description' => NULL,
                'low' => '40.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            443 => 
            array (
                'id' => '1094',
                'name' => 'wsar-profit-decline',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            444 => 
            array (
                'id' => '1095',
                'name' => 'wsar-profit-stable',
                'description' => NULL,
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            445 => 
            array (
                'id' => '1096',
                'name' => 'wsar-profit-increase',
                'description' => NULL,
                'low' => '40.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            446 => 
            array (
                'id' => '1097',
                'name' => 'wsar-debt-ratio-real-estate',
                'description' => NULL,
                'low' => '40.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            447 => 
            array (
                'id' => '1098',
                'name' => 'wsar-debt-ratio-manufacture',
                'description' => NULL,
                'low' => '40.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            448 => 
            array (
                'id' => '1099',
                'name' => 'wsar-debt-ratio-construction',
                'description' => NULL,
                'low' => '40.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            449 => 
            array (
                'id' => '1100',
                'name' => 'wsar-liquidity-1',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            450 => 
            array (
                'id' => '1101',
                'name' => 'wsar-liquidity-2',
                'description' => NULL,
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            451 => 
            array (
                'id' => '1102',
                'name' => 'wsar-liquidity-3',
                'description' => NULL,
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            452 => 
            array (
                'id' => '1103',
                'name' => 'wsar-debt-ratio-1',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            453 => 
            array (
                'id' => '1104',
                'name' => 'wsar-debt-ratio-2',
                'description' => NULL,
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            454 => 
            array (
                'id' => '1105',
                'name' => 'wsar-debt-ratio-3',
                'description' => NULL,
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            455 => 
            array (
                'id' => '1106',
                'name' => 'wsar-3yr-calc1-gov',
                'description' => NULL,
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            456 => 
            array (
                'id' => '1107',
                'name' => 'wsar-3yr-calc1-other',
                'description' => NULL,
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            457 => 
            array (
                'id' => '1108',
                'name' => 'wsar-3yr-calc2-other-decline',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            458 => 
            array (
                'id' => '1109',
                'name' => 'wsar-3yr-calc2-other-stable',
                'description' => NULL,
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            459 => 
            array (
                'id' => '1110',
                'name' => 'wsar-3yr-calc2-other-increase',
                'description' => NULL,
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            460 => 
            array (
                'id' => '1111',
                'name' => 'wsar-3yr-calc3-gov-decline',
                'description' => NULL,
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            461 => 
            array (
                'id' => '1112',
                'name' => 'wsar-3yr-calc3-gov-stable',
                'description' => NULL,
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            462 => 
            array (
                'id' => '1113',
                'name' => 'wsar-3yr-calc3-gov-increase',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            463 => 
            array (
                'id' => '1114',
                'name' => 'wsar-3yr-calc3-other-decline',
                'description' => NULL,
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            464 => 
            array (
                'id' => '1115',
                'name' => 'wsar-3yr-calc3-other-stable',
                'description' => NULL,
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            465 => 
            array (
                'id' => '1116',
                'name' => 'wsar-3yr-calc3-other-increase',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            466 => 
            array (
                'id' => '1117',
                'name' => 'wsar-service-ratio-1',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            467 => 
            array (
                'id' => '1118',
                'name' => 'wsar-service-ratio-2',
                'description' => NULL,
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            468 => 
            array (
                'id' => '1119',
                'name' => 'wsar-service-ratio-3',
                'description' => NULL,
                'low' => '40.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            469 => 
            array (
                'id' => '1120',
                'name' => 'wsar-nist-under2',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            470 => 
            array (
                'id' => '1121',
                'name' => 'wsar-nist-over2',
                'description' => NULL,
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            471 => 
            array (
                'id' => '1122',
                'name' => 'wsar-nist-over3',
                'description' => NULL,
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            472 => 
            array (
                'id' => '1123',
                'name' => 'wsar-years-in-business-under5',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            473 => 
            array (
                'id' => '1124',
                'name' => 'wsar-years-in-business-5-9',
                'description' => NULL,
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            474 => 
            array (
                'id' => '1125',
                'name' => 'wsar-years-in-business-over9',
                'description' => NULL,
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            475 => 
            array (
                'id' => '1126',
                'name' => 'wsar-3yr-calc1-gov-decline',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            476 => 
            array (
                'id' => '1127',
                'name' => 'wsar-3yr-calc1-gov-stable',
                'description' => NULL,
                'low' => '5.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            477 => 
            array (
                'id' => '1128',
                'name' => 'wsar-3yr-calc1-gov-increase',
                'description' => NULL,
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            478 => 
            array (
                'id' => '1129',
                'name' => 'wsar-3yr-calc1-other-decline',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            479 => 
            array (
                'id' => '1130',
                'name' => 'wsar-3yr-calc1-other-stable',
                'description' => NULL,
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            480 => 
            array (
                'id' => '1131',
                'name' => 'wsar-3yr-calc1-other-increase',
                'description' => NULL,
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            481 => 
            array (
                'id' => '1132',
                'name' => 'wsar-350',
                'description' => NULL,
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            482 => 
            array (
                'id' => '1133',
                'name' => 'wsar-351',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            483 => 
            array (
                'id' => '1134',
                'name' => 'wsar-profit-total',
                'description' => NULL,
                'low' => '40.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            484 => 
            array (
                'id' => '1135',
                'name' => 'wsar-3yr-calc1-gov-total',
                'description' => NULL,
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            485 => 
            array (
                'id' => '1136',
                'name' => 'wsar-3yr-calc1-other-total',
                'description' => NULL,
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            486 => 
            array (
                'id' => '1137',
                'name' => 'wsar-3yr-calc2-increase',
                'description' => NULL,
                'low' => '0.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            487 => 
            array (
                'id' => '1138',
                'name' => 'wsar-3yr-calc3-gov-total',
                'description' => NULL,
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            488 => 
            array (
                'id' => '1139',
                'name' => 'wsar-3yr-calc3-other-total',
                'description' => NULL,
                'low' => '10.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            489 => 
            array (
                'id' => '1140',
                'name' => 'wsar-3yr-calc2-total',
                'description' => NULL,
                'low' => '20.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            490 => 
            array (
                'id' => '1141',
                'name' => 'Test 0119-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '1.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            491 => 
            array (
                'id' => '1142',
                'name' => 'Test 0119-wsar-panel-mfr-hist-points',
                'description' => NULL,
                'low' => '1.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            492 => 
            array (
                'id' => '1143',
                'name' => 'a355',
                'description' => '1',
                'low' => '1.00000',
                'high' => '1.00000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            493 => 
            array (
                'id' => '1144',
                'name' => 'a355-w',
                'description' => '2',
                'low' => '2.00000',
                'high' => '2.00000',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            494 => 
            array (
                'id' => '1145',
                'name' => 'Astronergy-wsar-panel-mfr-fin-points',
                'description' => NULL,
                'low' => '50.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            495 => 
            array (
                'id' => '1146',
                'name' => 'Astronergy-wsar-panel-mfr-hist-points',
                'description' => NULL,
                'low' => '30.00000',
                'high' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}
