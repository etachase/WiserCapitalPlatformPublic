<?php

use Illuminate\Database\Seeder;

class AssetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('assets')->delete();
        
        \DB::table('assets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'asset_type_id' => 2,
                'name' => 'ABB MICRO-0.25-I-OUTD',
                'manufacturer' => 'ABB',
                'model' => 'MICRO-0.25-I-OUTD',
            ),
            1 => 
            array (
                'id' => 2,
                'asset_type_id' => 2,
                'name' => 'ABB MICRO-0.3-I-OUTD',
                'manufacturer' => 'ABB',
                'model' => 'MICRO-0.3-I-OUTD',
            ),
            2 => 
            array (
                'id' => 3,
                'asset_type_id' => 2,
                'name' => 'ABB MICRO-0.3HV-I-OUTD',
                'manufacturer' => 'ABB',
                'model' => 'MICRO-0.3HV-I-OUTD',
            ),
            3 => 
            array (
                'id' => 4,
                'asset_type_id' => 2,
                'name' => 'ABB PVI-10.0-I-OUTD-US',
                'manufacturer' => 'ABB',
                'model' => 'PVI-10.0-I-OUTD-US',
            ),
            4 => 
            array (
                'id' => 5,
                'asset_type_id' => 2,
                'name' => 'ABB PVI-12.0-I-OUTD-US',
                'manufacturer' => 'ABB',
                'model' => 'PVI-12.0-I-OUTD-US',
            ),
            5 => 
            array (
                'id' => 6,
                'asset_type_id' => 2,
                'name' => 'ABB PVI-3.0-OUTD-US',
                'manufacturer' => 'ABB',
                'model' => 'PVI-3.0-OUTD-US',
            ),
            6 => 
            array (
                'id' => 7,
                'asset_type_id' => 2,
                'name' => 'ABB PVI-3.6-OUTD-US',
                'manufacturer' => 'ABB',
                'model' => 'PVI-3.6-OUTD-US',
            ),
            7 => 
            array (
                'id' => 8,
                'asset_type_id' => 2,
                'name' => 'ABB PVI-3.8-OUTD-US',
                'manufacturer' => 'ABB',
                'model' => 'PVI-3.8-OUTD-US',
            ),
            8 => 
            array (
                'id' => 9,
                'asset_type_id' => 2,
                'name' => 'ABB PVI-4.2-OUTD-US',
                'manufacturer' => 'ABB',
                'model' => 'PVI-4.2-OUTD-US',
            ),
            9 => 
            array (
                'id' => 10,
                'asset_type_id' => 2,
                'name' => 'ABB PVI-5000-OUTD-US',
                'manufacturer' => 'ABB',
                'model' => 'PVI-5000-OUTD-US',
            ),
            10 => 
            array (
                'id' => 11,
                'asset_type_id' => 2,
                'name' => 'ABB PVI-6000-OUTD-US',
                'manufacturer' => 'ABB',
                'model' => 'PVI-6000-OUTD-US',
            ),
            11 => 
            array (
                'id' => 12,
                'asset_type_id' => 2,
                'name' => 'ABB PVS800-57-0100kW-A',
                'manufacturer' => 'ABB',
                'model' => 'PVS800-57-0100kW-A',
            ),
            12 => 
            array (
                'id' => 13,
                'asset_type_id' => 2,
                'name' => 'ABB PVS800-57-0250kW-A',
                'manufacturer' => 'ABB',
                'model' => 'PVS800-57-0250kW-A',
            ),
            13 => 
            array (
                'id' => 14,
                'asset_type_id' => 2,
                'name' => 'ABB PVS800-57-0315kW-B',
                'manufacturer' => 'ABB',
                'model' => 'PVS800-57-0315kW-B',
            ),
            14 => 
            array (
                'id' => 15,
                'asset_type_id' => 2,
                'name' => 'ABB PVS800-57-0500kW-A',
                'manufacturer' => 'ABB',
                'model' => 'PVS800-57-0500kW-A',
            ),
            15 => 
            array (
                'id' => 16,
                'asset_type_id' => 2,
                'name' => 'ABB PVS800-57-0630kW-B',
                'manufacturer' => 'ABB',
                'model' => 'PVS800-57-0630kW-B',
            ),
            16 => 
            array (
                'id' => 17,
                'asset_type_id' => 2,
                'name' => 'ABB PVS800-57-0875kW-B',
                'manufacturer' => 'ABB',
                'model' => 'PVS800-57-0875kW-B',
            ),
            17 => 
            array (
                'id' => 18,
                'asset_type_id' => 2,
                'name' => 'ABB PVS800-57-1000kW-C',
                'manufacturer' => 'ABB',
                'model' => 'PVS800-57-1000kW-C',
            ),
            18 => 
            array (
                'id' => 19,
                'asset_type_id' => 2,
                'name' => 'ABB PVS800-IS-1750kW-B',
                'manufacturer' => 'ABB',
                'model' => 'PVS800-IS-1750kW-B',
            ),
            19 => 
            array (
                'id' => 20,
                'asset_type_id' => 2,
                'name' => 'ABB PVS800-IS-2000kW-C',
                'manufacturer' => 'ABB',
                'model' => 'PVS800-IS-2000kW-C',
            ),
            20 => 
            array (
                'id' => 21,
                'asset_type_id' => 2,
                'name' => 'ABB PVS980',
                'manufacturer' => 'ABB',
                'model' => 'PVS980',
            ),
            21 => 
            array (
                'id' => 22,
                'asset_type_id' => 2,
                'name' => 'ABB TRIO-20.0-TL-OUTD',
                'manufacturer' => 'ABB',
                'model' => 'TRIO-20.0-TL-OUTD',
            ),
            22 => 
            array (
                'id' => 23,
                'asset_type_id' => 2,
                'name' => 'ABB TRIO-27.6-TL-OUTD',
                'manufacturer' => 'ABB',
                'model' => 'TRIO-27.6-TL-OUTD',
            ),
            23 => 
            array (
                'id' => 24,
                'asset_type_id' => 2,
                'name' => 'ABB TRIO-50.0',
                'manufacturer' => 'ABB',
                'model' => 'TRIO-50.0',
            ),
            24 => 
            array (
                'id' => 25,
                'asset_type_id' => 2,
                'name' => 'ABB ULTRA-1100-TL-OUTD-X-US-690',
                'manufacturer' => 'ABB',
                'model' => 'ULTRA-1100-TL-OUTD-X-US-690',
            ),
            25 => 
            array (
                'id' => 26,
                'asset_type_id' => 2,
                'name' => 'ABB ULTRA-1500-TL-OUTD-X-US-690',
                'manufacturer' => 'ABB',
                'model' => 'ULTRA-1500-TL-OUTD-X-US-690',
            ),
            26 => 
            array (
                'id' => 27,
                'asset_type_id' => 2,
                'name' => 'ABB ULTRA-750',
                'manufacturer' => 'ABB',
                'model' => 'ULTRA-750',
            ),
            27 => 
            array (
                'id' => 28,
                'asset_type_id' => 2,
                'name' => 'ABB UNO-2.0-I-OUTD-S-US',
                'manufacturer' => 'ABB',
                'model' => 'UNO-2.0-I-OUTD-S-US',
            ),
            28 => 
            array (
                'id' => 29,
                'asset_type_id' => 2,
                'name' => 'ABB UNO-2.5-I-OUTD-S-US',
                'manufacturer' => 'ABB',
                'model' => 'UNO-2.5-I-OUTD-S-US',
            ),
            29 => 
            array (
                'id' => 30,
                'asset_type_id' => 2,
                'name' => 'ABB UNO-7.6-TL-OUTD-S-US-A',
                'manufacturer' => 'ABB',
                'model' => 'UNO-7.6-TL-OUTD-S-US-A',
            ),
            30 => 
            array (
                'id' => 31,
                'asset_type_id' => 2,
                'name' => 'ABB UNO-8.6-TL-OUTD-S-US-A',
                'manufacturer' => 'ABB',
                'model' => 'UNO-8.6-TL-OUTD-S-US-A',
            ),
            31 => 
            array (
                'id' => 32,
                'asset_type_id' => 2,
                'name' => 'Chint Power CPS SC100KT-O/US-480',
                'manufacturer' => 'Chint Power',
                'model' => 'CPS SC100KT-O/US-480',
            ),
            32 => 
            array (
                'id' => 33,
                'asset_type_id' => 2,
                'name' => 'Chint Power CPS SC100KT-OPG/US-480',
                'manufacturer' => 'Chint Power',
                'model' => 'CPS SC100KT-OPG/US-480',
            ),
            33 => 
            array (
                'id' => 34,
                'asset_type_id' => 2,
                'name' => 'Chint Power CPS SC14KTL-DO/US-208',
                'manufacturer' => 'Chint Power',
                'model' => 'CPS SC14KTL-DO/US-208',
            ),
            34 => 
            array (
                'id' => 35,
                'asset_type_id' => 2,
                'name' => 'Chint Power CPS SC20KTL-DO/US-480',
                'manufacturer' => 'Chint Power',
                'model' => 'CPS SC20KTL-DO/US-480',
            ),
            35 => 
            array (
                'id' => 36,
                'asset_type_id' => 2,
                'name' => 'Chint Power CPS SCA23KTL-DO/US-480',
                'manufacturer' => 'Chint Power',
                'model' => 'CPS SCA23KTL-DO/US-480',
            ),
            36 => 
            array (
                'id' => 37,
                'asset_type_id' => 2,
                'name' => 'Chint Power CPS SCA28KTL-DO/US-480',
                'manufacturer' => 'Chint Power',
                'model' => 'CPS SCA28KTL-DO/US-480',
            ),
            37 => 
            array (
                'id' => 38,
                'asset_type_id' => 2,
                'name' => 'Chint Power CPS SCA36KTL-DO/US-480',
                'manufacturer' => 'Chint Power',
                'model' => 'CPS SCA36KTL-DO/US-480',
            ),
            38 => 
            array (
                'id' => 39,
                'asset_type_id' => 2,
            'name' => 'Chint Power CPS SCA36KTL-DO/US-480 (10 Input)',
                'manufacturer' => 'Chint Power',
            'model' => 'CPS SCA36KTL-DO/US-480 (10 Input)',
            ),
            39 => 
            array (
                'id' => 40,
                'asset_type_id' => 2,
            'name' => 'Chint Power CPS SCA36KTL-DO/US-480 (8 Input)',
                'manufacturer' => 'Chint Power',
            'model' => 'CPS SCA36KTL-DO/US-480 (8 Input)',
            ),
            40 => 
            array (
                'id' => 41,
                'asset_type_id' => 2,
                'name' => 'Chint Power CPS SCA50KTL-DO/US-480',
                'manufacturer' => 'Chint Power',
                'model' => 'CPS SCA50KTL-DO/US-480',
            ),
            41 => 
            array (
                'id' => 42,
                'asset_type_id' => 2,
                'name' => 'Chint Power CPS SCA60KTL-DO/US-480',
                'manufacturer' => 'Chint Power',
                'model' => 'CPS SCA60KTL-DO/US-480',
            ),
            42 => 
            array (
                'id' => 43,
                'asset_type_id' => 2,
                'name' => 'Delta  RPI M20A',
                'manufacturer' => 'Delta ',
                'model' => 'RPI M20A',
            ),
            43 => 
            array (
                'id' => 44,
                'asset_type_id' => 2,
                'name' => 'Delta M60U_120',
                'manufacturer' => 'Delta',
                'model' => 'M60U_120',
            ),
            44 => 
            array (
                'id' => 45,
                'asset_type_id' => 2,
                'name' => 'Delta M60U_121',
                'manufacturer' => 'Delta',
                'model' => 'M60U_121',
            ),
            45 => 
            array (
                'id' => 46,
                'asset_type_id' => 2,
                'name' => 'Delta M60U_122',
                'manufacturer' => 'Delta',
                'model' => 'M60U_122',
            ),
            46 => 
            array (
                'id' => 47,
                'asset_type_id' => 2,
                'name' => 'Delta M80U_120',
                'manufacturer' => 'Delta',
                'model' => 'M80U_120',
            ),
            47 => 
            array (
                'id' => 48,
                'asset_type_id' => 2,
                'name' => 'Delta M80U_121',
                'manufacturer' => 'Delta',
                'model' => 'M80U_121',
            ),
            48 => 
            array (
                'id' => 49,
                'asset_type_id' => 2,
                'name' => 'Delta M80U_122',
                'manufacturer' => 'Delta',
                'model' => 'M80U_122',
            ),
            49 => 
            array (
                'id' => 50,
                'asset_type_id' => 2,
                'name' => 'Delta RPI H3',
                'manufacturer' => 'Delta',
                'model' => 'RPI H3',
            ),
            50 => 
            array (
                'id' => 51,
                'asset_type_id' => 2,
                'name' => 'Delta RPI H4A',
                'manufacturer' => 'Delta',
                'model' => 'RPI H4A',
            ),
            51 => 
            array (
                'id' => 52,
                'asset_type_id' => 2,
                'name' => 'Delta RPI H5A',
                'manufacturer' => 'Delta',
                'model' => 'RPI H5A',
            ),
            52 => 
            array (
                'id' => 53,
                'asset_type_id' => 2,
                'name' => 'Delta RPI M10A',
                'manufacturer' => 'Delta',
                'model' => 'RPI M10A',
            ),
            53 => 
            array (
                'id' => 54,
                'asset_type_id' => 2,
                'name' => 'Delta RPI M15A',
                'manufacturer' => 'Delta',
                'model' => 'RPI M15A',
            ),
            54 => 
            array (
                'id' => 55,
                'asset_type_id' => 2,
                'name' => 'Delta RPI M20A',
                'manufacturer' => 'Delta',
                'model' => 'RPI M20A',
            ),
            55 => 
            array (
                'id' => 56,
                'asset_type_id' => 2,
                'name' => 'Delta RPI M30A',
                'manufacturer' => 'Delta',
                'model' => 'RPI M30A',
            ),
            56 => 
            array (
                'id' => 57,
                'asset_type_id' => 2,
                'name' => 'Delta RPI M50A',
                'manufacturer' => 'Delta',
                'model' => 'RPI M50A',
            ),
            57 => 
            array (
                'id' => 58,
                'asset_type_id' => 2,
                'name' => 'Delta RPI M6A',
                'manufacturer' => 'Delta',
                'model' => 'RPI M6A',
            ),
            58 => 
            array (
                'id' => 59,
                'asset_type_id' => 2,
                'name' => 'Delta RPI M8A',
                'manufacturer' => 'Delta',
                'model' => 'RPI M8A',
            ),
            59 => 
            array (
                'id' => 60,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G315EUTL',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G315EUTL',
            ),
            60 => 
            array (
                'id' => 61,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G32.0EUTL',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G32.0EUTL',
            ),
            61 => 
            array (
                'id' => 62,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G32.5EUTR',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G32.5EUTR',
            ),
            62 => 
            array (
                'id' => 63,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G33.0EUTR',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G33.0EUTR',
            ),
            63 => 
            array (
                'id' => 64,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G33.3EUTR',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G33.3EUTR',
            ),
            64 => 
            array (
                'id' => 65,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G35.0EUTR',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G35.0EUTR',
            ),
            65 => 
            array (
                'id' => 66,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G41.0EUTL',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G41.0EUTL',
            ),
            66 => 
            array (
                'id' => 67,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G41.0EUTR',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G41.0EUTR',
            ),
            67 => 
            array (
                'id' => 68,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G41.1EUTR',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G41.1EUTR',
            ),
            68 => 
            array (
                'id' => 69,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G41.2EUTL',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G41.2EUTL',
            ),
            69 => 
            array (
                'id' => 70,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G41.5EUTL',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G41.5EUTL',
            ),
            70 => 
            array (
                'id' => 71,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G42.0EUTL',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G42.0EUTL',
            ),
            71 => 
            array (
                'id' => 72,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G42.0EUTR',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G42.0EUTR',
            ),
            72 => 
            array (
                'id' => 73,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G42.5EUTR',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G42.5EUTR',
            ),
            73 => 
            array (
                'id' => 74,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G43.0EUTL',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G43.0EUTL',
            ),
            74 => 
            array (
                'id' => 75,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G43.0EUTR',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G43.0EUTR',
            ),
            75 => 
            array (
                'id' => 76,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G43.3EUTR',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G43.3EUTR',
            ),
            76 => 
            array (
                'id' => 77,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G45.0EUTR',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G45.0EUTR',
            ),
            77 => 
            array (
                'id' => 78,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G46EUTL',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G46EUTL',
            ),
            78 => 
            array (
                'id' => 79,
                'asset_type_id' => 2,
                'name' => 'Delta SOLIVIA G48EUTL',
                'manufacturer' => 'Delta',
                'model' => 'SOLIVIA G48EUTL',
            ),
            79 => 
            array (
                'id' => 80,
                'asset_type_id' => 2,
                'name' => 'Enphase C250-72-2LN-S2',
                'manufacturer' => 'Enphase',
                'model' => 'C250-72-2LN-S2',
            ),
            80 => 
            array (
                'id' => 81,
                'asset_type_id' => 2,
                'name' => 'Enphase C250-72-2LN-S5',
                'manufacturer' => 'Enphase',
                'model' => 'C250-72-2LN-S5',
            ),
            81 => 
            array (
                'id' => 82,
                'asset_type_id' => 2,
                'name' => 'Enphase D380',
                'manufacturer' => 'Enphase',
                'model' => 'D380',
            ),
            82 => 
            array (
                'id' => 83,
                'asset_type_id' => 2,
                'name' => 'Enphase M215-60-2LL-S22-IG ',
                'manufacturer' => 'Enphase',
                'model' => 'M215-60-2LL-S22-IG ',
            ),
            83 => 
            array (
                'id' => 84,
                'asset_type_id' => 2,
                'name' => 'Enphase M215-60-2LL-S25-IG ',
                'manufacturer' => 'Enphase',
                'model' => 'M215-60-2LL-S25-IG ',
            ),
            84 => 
            array (
                'id' => 85,
                'asset_type_id' => 2,
                'name' => 'Enphase M250-60-2LL-S22',
                'manufacturer' => 'Enphase',
                'model' => 'M250-60-2LL-S22',
            ),
            85 => 
            array (
                'id' => 86,
                'asset_type_id' => 2,
                'name' => 'Enphase M250-60-2LL-S25',
                'manufacturer' => 'Enphase',
                'model' => 'M250-60-2LL-S25',
            ),
            86 => 
            array (
                'id' => 87,
                'asset_type_id' => 2,
                'name' => 'Enphase S230-60-LL-2-US',
                'manufacturer' => 'Enphase',
                'model' => 'S230-60-LL-2-US',
            ),
            87 => 
            array (
                'id' => 88,
                'asset_type_id' => 2,
                'name' => 'Enphase S230-60-LL-5-US',
                'manufacturer' => 'Enphase',
                'model' => 'S230-60-LL-5-US',
            ),
            88 => 
            array (
                'id' => 89,
                'asset_type_id' => 2,
                'name' => 'Enphase S280-60-LL-2-US',
                'manufacturer' => 'Enphase',
                'model' => 'S280-60-LL-2-US',
            ),
            89 => 
            array (
                'id' => 90,
                'asset_type_id' => 2,
                'name' => 'Fronius CL 44.4 DELTA',
                'manufacturer' => 'Fronius',
                'model' => 'CL 44.4 DELTA',
            ),
            90 => 
            array (
                'id' => 91,
                'asset_type_id' => 2,
                'name' => 'Fronius GALVO-1.5-1',
                'manufacturer' => 'Fronius',
                'model' => 'GALVO-1.5-1',
            ),
            91 => 
            array (
                'id' => 92,
                'asset_type_id' => 2,
                'name' => 'Fronius GALVO-2.0-1',
                'manufacturer' => 'Fronius',
                'model' => 'GALVO-2.0-1',
            ),
            92 => 
            array (
                'id' => 93,
                'asset_type_id' => 2,
                'name' => 'Fronius GALVO-2.5-1',
                'manufacturer' => 'Fronius',
                'model' => 'GALVO-2.5-1',
            ),
            93 => 
            array (
                'id' => 94,
                'asset_type_id' => 2,
                'name' => 'Fronius GALVO-3.1-1',
                'manufacturer' => 'Fronius',
                'model' => 'GALVO-3.1-1',
            ),
            94 => 
            array (
                'id' => 95,
                'asset_type_id' => 2,
                'name' => 'Fronius IG Plus Advanced 10.0-1',
                'manufacturer' => 'Fronius',
                'model' => 'IG Plus Advanced 10.0-1',
            ),
            95 => 
            array (
                'id' => 96,
                'asset_type_id' => 2,
                'name' => 'Fronius IG Plus Advanced 10.0-3 DELTA',
                'manufacturer' => 'Fronius',
                'model' => 'IG Plus Advanced 10.0-3 DELTA',
            ),
            96 => 
            array (
                'id' => 97,
                'asset_type_id' => 2,
                'name' => 'Fronius IG Plus Advanced 11.4-1',
                'manufacturer' => 'Fronius',
                'model' => 'IG Plus Advanced 11.4-1',
            ),
            97 => 
            array (
                'id' => 98,
                'asset_type_id' => 2,
                'name' => 'Fronius IG Plus Advanced 11.4-3 DELTA',
                'manufacturer' => 'Fronius',
                'model' => 'IG Plus Advanced 11.4-3 DELTA',
            ),
            98 => 
            array (
                'id' => 99,
                'asset_type_id' => 2,
                'name' => 'Fronius IG Plus Advanced 12.0-3 WYE277',
                'manufacturer' => 'Fronius',
                'model' => 'IG Plus Advanced 12.0-3 WYE277',
            ),
            99 => 
            array (
                'id' => 100,
                'asset_type_id' => 2,
                'name' => 'Fronius IG Plus Advanced 3.0-1',
                'manufacturer' => 'Fronius',
                'model' => 'IG Plus Advanced 3.0-1',
            ),
            100 => 
            array (
                'id' => 101,
                'asset_type_id' => 2,
                'name' => 'Fronius IG Plus Advanced 3.8-1',
                'manufacturer' => 'Fronius',
                'model' => 'IG Plus Advanced 3.8-1',
            ),
            101 => 
            array (
                'id' => 102,
                'asset_type_id' => 2,
                'name' => 'Fronius IG Plus Advanced 5.0-1',
                'manufacturer' => 'Fronius',
                'model' => 'IG Plus Advanced 5.0-1',
            ),
            102 => 
            array (
                'id' => 103,
                'asset_type_id' => 2,
                'name' => 'Fronius IG Plus Advanced 6.0-1',
                'manufacturer' => 'Fronius',
                'model' => 'IG Plus Advanced 6.0-1',
            ),
            103 => 
            array (
                'id' => 104,
                'asset_type_id' => 2,
                'name' => 'Fronius IG Plus Advanced 7.5-1',
                'manufacturer' => 'Fronius',
                'model' => 'IG Plus Advanced 7.5-1',
            ),
            104 => 
            array (
                'id' => 105,
                'asset_type_id' => 2,
                'name' => 'Fronius IG-Plus-10.0-1-UNI',
                'manufacturer' => 'Fronius',
                'model' => 'IG-Plus-10.0-1-UNI',
            ),
            105 => 
            array (
                'id' => 106,
                'asset_type_id' => 2,
                'name' => 'Fronius IG-Plus-10.0-3-DELTA',
                'manufacturer' => 'Fronius',
                'model' => 'IG-Plus-10.0-3-DELTA',
            ),
            106 => 
            array (
                'id' => 107,
                'asset_type_id' => 2,
                'name' => 'Fronius IG-Plus-11.4-1-UNI',
                'manufacturer' => 'Fronius',
                'model' => 'IG-Plus-11.4-1-UNI',
            ),
            107 => 
            array (
                'id' => 108,
                'asset_type_id' => 2,
                'name' => 'Fronius IG-Plus-11.4-3-DELTA',
                'manufacturer' => 'Fronius',
                'model' => 'IG-Plus-11.4-3-DELTA',
            ),
            108 => 
            array (
                'id' => 109,
                'asset_type_id' => 2,
                'name' => 'Fronius IG-Plus-12.0-3-WYE277',
                'manufacturer' => 'Fronius',
                'model' => 'IG-Plus-12.0-3-WYE277',
            ),
            109 => 
            array (
                'id' => 110,
                'asset_type_id' => 2,
                'name' => 'Fronius IG-Plus-3.0-1-UNI',
                'manufacturer' => 'Fronius',
                'model' => 'IG-Plus-3.0-1-UNI',
            ),
            110 => 
            array (
                'id' => 111,
                'asset_type_id' => 2,
                'name' => 'Fronius IG-Plus-3.8-1-UNI',
                'manufacturer' => 'Fronius',
                'model' => 'IG-Plus-3.8-1-UNI',
            ),
            111 => 
            array (
                'id' => 112,
                'asset_type_id' => 2,
                'name' => 'Fronius IG-Plus-5.0-1-UNI',
                'manufacturer' => 'Fronius',
                'model' => 'IG-Plus-5.0-1-UNI',
            ),
            112 => 
            array (
                'id' => 113,
                'asset_type_id' => 2,
                'name' => 'Fronius IG-Plus-6.0-1-UNI',
                'manufacturer' => 'Fronius',
                'model' => 'IG-Plus-6.0-1-UNI',
            ),
            113 => 
            array (
                'id' => 114,
                'asset_type_id' => 2,
                'name' => 'Fronius IG-Plus-7.5-1-UNI',
                'manufacturer' => 'Fronius',
                'model' => 'IG-Plus-7.5-1-UNI',
            ),
            114 => 
            array (
                'id' => 115,
                'asset_type_id' => 2,
                'name' => 'Fronius Primo 10.0-1 208-240',
                'manufacturer' => 'Fronius',
                'model' => 'Primo 10.0-1 208-240',
            ),
            115 => 
            array (
                'id' => 116,
                'asset_type_id' => 2,
                'name' => 'Fronius Primo 11.4-1 208-240',
                'manufacturer' => 'Fronius',
                'model' => 'Primo 11.4-1 208-240',
            ),
            116 => 
            array (
                'id' => 117,
                'asset_type_id' => 2,
                'name' => 'Fronius Primo 12.5-1 208-240',
                'manufacturer' => 'Fronius',
                'model' => 'Primo 12.5-1 208-240',
            ),
            117 => 
            array (
                'id' => 118,
                'asset_type_id' => 2,
                'name' => 'Fronius Primo 15.0-1 208-240',
                'manufacturer' => 'Fronius',
                'model' => 'Primo 15.0-1 208-240',
            ),
            118 => 
            array (
                'id' => 119,
                'asset_type_id' => 2,
                'name' => 'Fronius Primo 3.8-1 240',
                'manufacturer' => 'Fronius',
                'model' => 'Primo 3.8-1 240',
            ),
            119 => 
            array (
                'id' => 120,
                'asset_type_id' => 2,
                'name' => 'Fronius Primo 5.0-1 240',
                'manufacturer' => 'Fronius',
                'model' => 'Primo 5.0-1 240',
            ),
            120 => 
            array (
                'id' => 121,
                'asset_type_id' => 2,
                'name' => 'Fronius Primo 6.0-1 240',
                'manufacturer' => 'Fronius',
                'model' => 'Primo 6.0-1 240',
            ),
            121 => 
            array (
                'id' => 122,
                'asset_type_id' => 2,
                'name' => 'Fronius Primo 7.6-1 240',
                'manufacturer' => 'Fronius',
                'model' => 'Primo 7.6-1 240',
            ),
            122 => 
            array (
                'id' => 123,
                'asset_type_id' => 2,
                'name' => 'Fronius Primo 8.2-1 240',
                'manufacturer' => 'Fronius',
                'model' => 'Primo 8.2-1 240',
            ),
            123 => 
            array (
                'id' => 124,
                'asset_type_id' => 2,
                'name' => 'Fronius Primo-3.8-1 208',
                'manufacturer' => 'Fronius',
                'model' => 'Primo-3.8-1 208',
            ),
            124 => 
            array (
                'id' => 125,
                'asset_type_id' => 2,
                'name' => 'Fronius Primo-5.0-1 208',
                'manufacturer' => 'Fronius',
                'model' => 'Primo-5.0-1 208',
            ),
            125 => 
            array (
                'id' => 126,
                'asset_type_id' => 2,
                'name' => 'Fronius Primo-6.0-1 208',
                'manufacturer' => 'Fronius',
                'model' => 'Primo-6.0-1 208',
            ),
            126 => 
            array (
                'id' => 127,
                'asset_type_id' => 2,
                'name' => 'Fronius Primo-7.6-1 208',
                'manufacturer' => 'Fronius',
                'model' => 'Primo-7.6-1 208',
            ),
            127 => 
            array (
                'id' => 128,
                'asset_type_id' => 2,
                'name' => 'Fronius Primo-8.2-1 208',
                'manufacturer' => 'Fronius',
                'model' => 'Primo-8.2-1 208',
            ),
            128 => 
            array (
                'id' => 129,
                'asset_type_id' => 2,
                'name' => 'Fronius Symo 10.0-3 208',
                'manufacturer' => 'Fronius',
                'model' => 'Symo 10.0-3 208',
            ),
            129 => 
            array (
                'id' => 130,
                'asset_type_id' => 2,
                'name' => 'Fronius Symo 12.0-3 208',
                'manufacturer' => 'Fronius',
                'model' => 'Symo 12.0-3 208',
            ),
            130 => 
            array (
                'id' => 131,
                'asset_type_id' => 2,
                'name' => 'Fronius Symo 15.0-3 208',
                'manufacturer' => 'Fronius',
                'model' => 'Symo 15.0-3 208',
            ),
            131 => 
            array (
                'id' => 132,
                'asset_type_id' => 2,
                'name' => 'Fronius Symo-10.0-3 240',
                'manufacturer' => 'Fronius',
                'model' => 'Symo-10.0-3 240',
            ),
            132 => 
            array (
                'id' => 133,
                'asset_type_id' => 2,
                'name' => 'Fronius Symo-10.0-3 480',
                'manufacturer' => 'Fronius',
                'model' => 'Symo-10.0-3 480',
            ),
            133 => 
            array (
                'id' => 134,
                'asset_type_id' => 2,
                'name' => 'Fronius Symo-12.0-3 240',
                'manufacturer' => 'Fronius',
                'model' => 'Symo-12.0-3 240',
            ),
            134 => 
            array (
                'id' => 135,
                'asset_type_id' => 2,
                'name' => 'Fronius Symo-12.5-3 480',
                'manufacturer' => 'Fronius',
                'model' => 'Symo-12.5-3 480',
            ),
            135 => 
            array (
                'id' => 136,
                'asset_type_id' => 2,
                'name' => 'Fronius Symo-15.0-3 480',
                'manufacturer' => 'Fronius',
                'model' => 'Symo-15.0-3 480',
            ),
            136 => 
            array (
                'id' => 137,
                'asset_type_id' => 2,
                'name' => 'Fronius Symo-17.5-3 480',
                'manufacturer' => 'Fronius',
                'model' => 'Symo-17.5-3 480',
            ),
            137 => 
            array (
                'id' => 138,
                'asset_type_id' => 2,
                'name' => 'Fronius Symo-20.0-3 480',
                'manufacturer' => 'Fronius',
                'model' => 'Symo-20.0-3 480',
            ),
            138 => 
            array (
                'id' => 139,
                'asset_type_id' => 2,
                'name' => 'Fronius Symo-22.7-3 480',
                'manufacturer' => 'Fronius',
                'model' => 'Symo-22.7-3 480',
            ),
            139 => 
            array (
                'id' => 140,
                'asset_type_id' => 2,
                'name' => 'Fronius Symo-24.0-3 480',
                'manufacturer' => 'Fronius',
                'model' => 'Symo-24.0-3 480',
            ),
            140 => 
            array (
                'id' => 141,
                'asset_type_id' => 2,
                'name' => 'Huawei SUN2000-22KTL',
                'manufacturer' => 'Huawei',
                'model' => 'SUN2000-22KTL',
            ),
            141 => 
            array (
                'id' => 142,
                'asset_type_id' => 2,
                'name' => 'Huawei SUN2000-25KTL',
                'manufacturer' => 'Huawei',
                'model' => 'SUN2000-25KTL',
            ),
            142 => 
            array (
                'id' => 143,
                'asset_type_id' => 2,
                'name' => 'Huawei SUN2000-30KTL',
                'manufacturer' => 'Huawei',
                'model' => 'SUN2000-30KTL',
            ),
            143 => 
            array (
                'id' => 144,
                'asset_type_id' => 2,
                'name' => 'Huawei SUN2000-36KTL',
                'manufacturer' => 'Huawei',
                'model' => 'SUN2000-36KTL',
            ),
            144 => 
            array (
                'id' => 145,
                'asset_type_id' => 2,
                'name' => 'Huawei SUN2000-42KTL',
                'manufacturer' => 'Huawei',
                'model' => 'SUN2000-42KTL',
            ),
            145 => 
            array (
                'id' => 146,
                'asset_type_id' => 2,
                'name' => 'Huawei SUN2000-45KTL',
                'manufacturer' => 'Huawei',
                'model' => 'SUN2000-45KTL',
            ),
            146 => 
            array (
                'id' => 147,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet 1000 TL3',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet 1000 TL3',
            ),
            147 => 
            array (
                'id' => 148,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet 20.0 TL3 INT',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet 20.0 TL3 INT',
            ),
            148 => 
            array (
                'id' => 149,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet 3.0 TL1',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet 3.0 TL1',
            ),
            149 => 
            array (
                'id' => 150,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet 3.5 TL1',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet 3.5 TL1',
            ),
            150 => 
            array (
                'id' => 151,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet 3.7 TL1',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet 3.7 TL1',
            ),
            151 => 
            array (
                'id' => 152,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet 4.0 TL1',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet 4.0 TL1',
            ),
            152 => 
            array (
                'id' => 153,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet 4.6 TL1',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet 4.6 TL1',
            ),
            153 => 
            array (
                'id' => 154,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet 5.0 TL1',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet 5.0 TL1',
            ),
            154 => 
            array (
                'id' => 155,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet 5.0 TL3',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet 5.0 TL3',
            ),
            155 => 
            array (
                'id' => 156,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet 50.0 TL3',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet 50.0 TL3',
            ),
            156 => 
            array (
                'id' => 157,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet 50.0 TL3 INT',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet 50.0 TL3 INT',
            ),
            157 => 
            array (
                'id' => 158,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet 6.5 TL3',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet 6.5 TL3',
            ),
            158 => 
            array (
                'id' => 159,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet 7.5 TL3',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet 7.5 TL3',
            ),
            159 => 
            array (
                'id' => 160,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet 750 TL3',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet 750 TL3',
            ),
            160 => 
            array (
                'id' => 161,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet 875 TL3',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet 875 TL3',
            ),
            161 => 
            array (
                'id' => 162,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet 9.0 TL3',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet 9.0 TL3',
            ),
            162 => 
            array (
                'id' => 163,
                'asset_type_id' => 2,
                'name' => 'KACO blueplanet ultraverter 250',
                'manufacturer' => 'KACO',
                'model' => 'blueplanet ultraverter 250',
            ),
            163 => 
            array (
                'id' => 164,
                'asset_type_id' => 2,
                'name' => 'KACO IPS 1.1',
                'manufacturer' => 'KACO',
                'model' => 'IPS 1.1',
            ),
            164 => 
            array (
                'id' => 165,
                'asset_type_id' => 2,
                'name' => 'KACO IPS 2.0',
                'manufacturer' => 'KACO',
                'model' => 'IPS 2.0',
            ),
            165 => 
            array (
                'id' => 166,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 12.0 TL3',
                'manufacturer' => 'KACO',
                'model' => 'Powador 12.0 TL3',
            ),
            166 => 
            array (
                'id' => 167,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 14.0 TL3',
                'manufacturer' => 'KACO',
                'model' => 'Powador 14.0 TL3',
            ),
            167 => 
            array (
                'id' => 168,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 18.0 TL3',
                'manufacturer' => 'KACO',
                'model' => 'Powador 18.0 TL3',
            ),
            168 => 
            array (
                'id' => 169,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 20.0 TL3',
                'manufacturer' => 'KACO',
                'model' => 'Powador 20.0 TL3',
            ),
            169 => 
            array (
                'id' => 170,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 2002',
                'manufacturer' => 'KACO',
                'model' => 'Powador 2002',
            ),
            170 => 
            array (
                'id' => 171,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 30.0 TL3',
                'manufacturer' => 'KACO',
                'model' => 'Powador 30.0 TL3',
            ),
            171 => 
            array (
                'id' => 172,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 3002',
                'manufacturer' => 'KACO',
                'model' => 'Powador 3002',
            ),
            172 => 
            array (
                'id' => 173,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 3200',
                'manufacturer' => 'KACO',
                'model' => 'Powador 3200',
            ),
            173 => 
            array (
                'id' => 174,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 33.0 TL3',
                'manufacturer' => 'KACO',
                'model' => 'Powador 33.0 TL3',
            ),
            174 => 
            array (
                'id' => 175,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 36.0 TL3',
                'manufacturer' => 'KACO',
                'model' => 'Powador 36.0 TL3',
            ),
            175 => 
            array (
                'id' => 176,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 36.0 TL3 M1',
                'manufacturer' => 'KACO',
                'model' => 'Powador 36.0 TL3 M1',
            ),
            176 => 
            array (
                'id' => 177,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 39.0 TL3',
                'manufacturer' => 'KACO',
                'model' => 'Powador 39.0 TL3',
            ),
            177 => 
            array (
                'id' => 178,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 39.0 TL3 M1',
                'manufacturer' => 'KACO',
                'model' => 'Powador 39.0 TL3 M1',
            ),
            178 => 
            array (
                'id' => 179,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 40.0 TL3',
                'manufacturer' => 'KACO',
                'model' => 'Powador 40.0 TL3',
            ),
            179 => 
            array (
                'id' => 180,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 4200',
                'manufacturer' => 'KACO',
                'model' => 'Powador 4200',
            ),
            180 => 
            array (
                'id' => 181,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 4202',
                'manufacturer' => 'KACO',
                'model' => 'Powador 4202',
            ),
            181 => 
            array (
                'id' => 182,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 4400',
                'manufacturer' => 'KACO',
                'model' => 'Powador 4400',
            ),
            182 => 
            array (
                'id' => 183,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 48.0 TL3 Park',
                'manufacturer' => 'KACO',
                'model' => 'Powador 48.0 TL3 Park',
            ),
            183 => 
            array (
                'id' => 184,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 5002',
                'manufacturer' => 'KACO',
                'model' => 'Powador 5002',
            ),
            184 => 
            array (
                'id' => 185,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 5300',
                'manufacturer' => 'KACO',
                'model' => 'Powador 5300',
            ),
            185 => 
            array (
                'id' => 186,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 5500',
                'manufacturer' => 'KACO',
                'model' => 'Powador 5500',
            ),
            186 => 
            array (
                'id' => 187,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 60.0 TL3',
                'manufacturer' => 'KACO',
                'model' => 'Powador 60.0 TL3',
            ),
            187 => 
            array (
                'id' => 188,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 6002',
                'manufacturer' => 'KACO',
                'model' => 'Powador 6002',
            ),
            188 => 
            array (
                'id' => 189,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 6600',
                'manufacturer' => 'KACO',
                'model' => 'Powador 6600',
            ),
            189 => 
            array (
                'id' => 190,
                'asset_type_id' => 2,
                'name' => 'KACO Powador 72.0 TL3 Park',
                'manufacturer' => 'KACO',
                'model' => 'Powador 72.0 TL3 Park',
            ),
            190 => 
            array (
                'id' => 191,
                'asset_type_id' => 2,
                'name' => 'KACO Powador XP500-HV TL',
                'manufacturer' => 'KACO',
                'model' => 'Powador XP500-HV TL',
            ),
            191 => 
            array (
                'id' => 192,
                'asset_type_id' => 2,
                'name' => 'KACO Powador XP500-HV TL Outdoor',
                'manufacturer' => 'KACO',
                'model' => 'Powador XP500-HV TL Outdoor',
            ),
            192 => 
            array (
                'id' => 193,
                'asset_type_id' => 2,
                'name' => 'KACO Powador XP550-HV TL',
                'manufacturer' => 'KACO',
                'model' => 'Powador XP550-HV TL',
            ),
            193 => 
            array (
                'id' => 194,
                'asset_type_id' => 2,
                'name' => 'KACO Powador XP550-HV TL Outdoor',
                'manufacturer' => 'KACO',
                'model' => 'Powador XP550-HV TL Outdoor',
            ),
            194 => 
            array (
                'id' => 195,
                'asset_type_id' => 2,
                'name' => 'Nextronex Ray-Max ',
                'manufacturer' => 'Nextronex',
                'model' => 'Ray-Max ',
            ),
            195 => 
            array (
                'id' => 196,
                'asset_type_id' => 2,
                'name' => 'Nextronex Ray-Max 2',
                'manufacturer' => 'Nextronex',
                'model' => 'Ray-Max 2',
            ),
            196 => 
            array (
                'id' => 197,
                'asset_type_id' => 2,
                'name' => 'Nextronex Ray-Max-1000V',
                'manufacturer' => 'Nextronex',
                'model' => 'Ray-Max-1000V',
            ),
            197 => 
            array (
                'id' => 198,
                'asset_type_id' => 2,
                'name' => 'Satcon Equinox 500 kW UL',
                'manufacturer' => 'Satcon',
                'model' => 'Equinox 500 kW UL',
            ),
            198 => 
            array (
                'id' => 199,
                'asset_type_id' => 2,
                'name' => 'Satcon Equinox 625 kW',
                'manufacturer' => 'Satcon',
                'model' => 'Equinox 625 kW',
            ),
            199 => 
            array (
                'id' => 200,
                'asset_type_id' => 2,
                'name' => 'Satcon Powergate Plus 1 MW UL',
                'manufacturer' => 'Satcon',
                'model' => 'Powergate Plus 1 MW UL',
            ),
            200 => 
            array (
                'id' => 201,
                'asset_type_id' => 2,
                'name' => 'Satcon Powergate Plus 100 kW UL',
                'manufacturer' => 'Satcon',
                'model' => 'Powergate Plus 100 kW UL',
            ),
            201 => 
            array (
                'id' => 202,
                'asset_type_id' => 2,
                'name' => 'Satcon Powergate Plus 110 kW S-Type UL',
                'manufacturer' => 'Satcon',
                'model' => 'Powergate Plus 110 kW S-Type UL',
            ),
            202 => 
            array (
                'id' => 203,
                'asset_type_id' => 2,
                'name' => 'Satcon Powergate Plus 135 kW H-Type',
                'manufacturer' => 'Satcon',
                'model' => 'Powergate Plus 135 kW H-Type',
            ),
            203 => 
            array (
                'id' => 204,
                'asset_type_id' => 2,
                'name' => 'Satcon Powergate Plus 135 kW UL',
                'manufacturer' => 'Satcon',
                'model' => 'Powergate Plus 135 kW UL',
            ),
            204 => 
            array (
                'id' => 205,
                'asset_type_id' => 2,
                'name' => 'Satcon Powergate Plus 210 kW S-Type UL',
                'manufacturer' => 'Satcon',
                'model' => 'Powergate Plus 210 kW S-Type UL',
            ),
            205 => 
            array (
                'id' => 206,
                'asset_type_id' => 2,
                'name' => 'Satcon Powergate Plus 250 kW UL',
                'manufacturer' => 'Satcon',
                'model' => 'Powergate Plus 250 kW UL',
            ),
            206 => 
            array (
                'id' => 207,
                'asset_type_id' => 2,
                'name' => 'Satcon Powergate Plus 30 kW UL',
                'manufacturer' => 'Satcon',
                'model' => 'Powergate Plus 30 kW UL',
            ),
            207 => 
            array (
                'id' => 208,
                'asset_type_id' => 2,
                'name' => 'Satcon Powergate Plus 375 kW UL',
                'manufacturer' => 'Satcon',
                'model' => 'Powergate Plus 375 kW UL',
            ),
            208 => 
            array (
                'id' => 209,
                'asset_type_id' => 2,
                'name' => 'Satcon Powergate Plus 50 kW S-Type UL',
                'manufacturer' => 'Satcon',
                'model' => 'Powergate Plus 50 kW S-Type UL',
            ),
            209 => 
            array (
                'id' => 210,
                'asset_type_id' => 2,
                'name' => 'Satcon Powergate Plus 50 kW UL',
                'manufacturer' => 'Satcon',
                'model' => 'Powergate Plus 50 kW UL',
            ),
            210 => 
            array (
                'id' => 211,
                'asset_type_id' => 2,
                'name' => 'Satcon Powergate Plus 500 kW UL',
                'manufacturer' => 'Satcon',
                'model' => 'Powergate Plus 500 kW UL',
            ),
            211 => 
            array (
                'id' => 212,
                'asset_type_id' => 2,
                'name' => 'Satcon Powergate Plus 75 kW UL',
                'manufacturer' => 'Satcon',
                'model' => 'Powergate Plus 75 kW UL',
            ),
            212 => 
            array (
                'id' => 213,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric CL20000 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'CL20000 E',
            ),
            213 => 
            array (
                'id' => 214,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric CL25000 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'CL25000 E',
            ),
            214 => 
            array (
                'id' => 215,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric GT250',
                'manufacturer' => 'Schneider Electric',
                'model' => 'GT250',
            ),
            215 => 
            array (
                'id' => 216,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric GT500',
                'manufacturer' => 'Schneider Electric',
                'model' => 'GT500',
            ),
            216 => 
            array (
                'id' => 217,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric GT500 MVX',
                'manufacturer' => 'Schneider Electric',
                'model' => 'GT500 MVX',
            ),
            217 => 
            array (
                'id' => 218,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric RL 3000 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'RL 3000 E',
            ),
            218 => 
            array (
                'id' => 219,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric RL 3000 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'RL 3000 E',
            ),
            219 => 
            array (
                'id' => 220,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric RL 4000 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'RL 4000 E',
            ),
            220 => 
            array (
                'id' => 221,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric RL 4000 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'RL 4000 E',
            ),
            221 => 
            array (
                'id' => 222,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric RL 5000 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'RL 5000 E',
            ),
            222 => 
            array (
                'id' => 223,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric RL 5000 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'RL 5000 E',
            ),
            223 => 
            array (
                'id' => 224,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric SW 2524 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'SW 2524 E',
            ),
            224 => 
            array (
                'id' => 225,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric SW 2524 NA',
                'manufacturer' => 'Schneider Electric',
                'model' => 'SW 2524 NA',
            ),
            225 => 
            array (
                'id' => 226,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric SW 4024 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'SW 4024 E',
            ),
            226 => 
            array (
                'id' => 227,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric SW 4024 NA',
                'manufacturer' => 'Schneider Electric',
                'model' => 'SW 4024 NA',
            ),
            227 => 
            array (
                'id' => 228,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric SW 4048 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'SW 4048 E',
            ),
            228 => 
            array (
                'id' => 229,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric SW 4048 NA',
                'manufacturer' => 'Schneider Electric',
                'model' => 'SW 4048 NA',
            ),
            229 => 
            array (
                'id' => 230,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric TL 10000 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'TL 10000 E',
            ),
            230 => 
            array (
                'id' => 231,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric TL 15000 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'TL 15000 E',
            ),
            231 => 
            array (
                'id' => 232,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric TL 20000 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'TL 20000 E',
            ),
            232 => 
            array (
                'id' => 233,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric TL 8000 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'TL 8000 E',
            ),
            233 => 
            array (
                'id' => 234,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric TX 2800 NA',
                'manufacturer' => 'Schneider Electric',
                'model' => 'TX 2800 NA',
            ),
            234 => 
            array (
                'id' => 235,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric TX 3300 NA',
                'manufacturer' => 'Schneider Electric',
                'model' => 'TX 3300 NA',
            ),
            235 => 
            array (
                'id' => 236,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric TX 3800 NA',
                'manufacturer' => 'Schneider Electric',
                'model' => 'TX 3800 NA',
            ),
            236 => 
            array (
                'id' => 237,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric TX 5000 NA',
                'manufacturer' => 'Schneider Electric',
                'model' => 'TX 5000 NA',
            ),
            237 => 
            array (
                'id' => 238,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric XC 540',
                'manufacturer' => 'Schneider Electric',
                'model' => 'XC 540',
            ),
            238 => 
            array (
                'id' => 239,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric XC 540-NA',
                'manufacturer' => 'Schneider Electric',
                'model' => 'XC 540-NA',
            ),
            239 => 
            array (
                'id' => 240,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric XC 630',
                'manufacturer' => 'Schneider Electric',
                'model' => 'XC 630',
            ),
            240 => 
            array (
                'id' => 241,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric XC 630-NA',
                'manufacturer' => 'Schneider Electric',
                'model' => 'XC 630-NA',
            ),
            241 => 
            array (
                'id' => 242,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric XC 680',
                'manufacturer' => 'Schneider Electric',
                'model' => 'XC 680',
            ),
            242 => 
            array (
                'id' => 243,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric XC 680-NA',
                'manufacturer' => 'Schneider Electric',
                'model' => 'XC 680-NA',
            ),
            243 => 
            array (
                'id' => 244,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric XW+ 5548 NA',
                'manufacturer' => 'Schneider Electric',
                'model' => 'XW+ 5548 NA',
            ),
            244 => 
            array (
                'id' => 245,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric XW+ 6848 NA',
                'manufacturer' => 'Schneider Electric',
                'model' => 'XW+ 6848 NA',
            ),
            245 => 
            array (
                'id' => 246,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric XW+ 7048 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'XW+ 7048 E',
            ),
            246 => 
            array (
                'id' => 247,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric XW+ 8548 E',
                'manufacturer' => 'Schneider Electric',
                'model' => 'XW+ 8548 E',
            ),
            247 => 
            array (
                'id' => 248,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric XW4024 120 240 60',
                'manufacturer' => 'Schneider Electric',
                'model' => 'XW4024 120 240 60',
            ),
            248 => 
            array (
                'id' => 249,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric XW4024 230 50',
                'manufacturer' => 'Schneider Electric',
                'model' => 'XW4024 230 50',
            ),
            249 => 
            array (
                'id' => 250,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric XW4548 120 240 60',
                'manufacturer' => 'Schneider Electric',
                'model' => 'XW4548 120 240 60',
            ),
            250 => 
            array (
                'id' => 251,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric XW4548 230 50',
                'manufacturer' => 'Schneider Electric',
                'model' => 'XW4548 230 50',
            ),
            251 => 
            array (
                'id' => 252,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric XW6048 120 240 60',
                'manufacturer' => 'Schneider Electric',
                'model' => 'XW6048 120 240 60',
            ),
            252 => 
            array (
                'id' => 253,
                'asset_type_id' => 2,
                'name' => 'Schneider Electric XW6048 230 50',
                'manufacturer' => 'Schneider Electric',
                'model' => 'XW6048 230 50',
            ),
            253 => 
            array (
                'id' => 254,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 10000TL-US 208',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 10000TL-US 208',
            ),
            254 => 
            array (
                'id' => 255,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 10000TL-US 240',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 10000TL-US 240',
            ),
            255 => 
            array (
                'id' => 256,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 11000TL-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 11000TL-US',
            ),
            256 => 
            array (
                'id' => 257,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 240-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 240-US',
            ),
            257 => 
            array (
                'id' => 258,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 3.0-1 SO-US-40',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 3.0-1 SO-US-40',
            ),
            258 => 
            array (
                'id' => 259,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 3.8-1 SO-US-40',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 3.8-1 SO-US-40',
            ),
            259 => 
            array (
                'id' => 260,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 3000-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 3000-US',
            ),
            260 => 
            array (
                'id' => 261,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 3000TL-US 208',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 3000TL-US 208',
            ),
            261 => 
            array (
                'id' => 262,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 3000TL-US 240',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 3000TL-US 240',
            ),
            262 => 
            array (
                'id' => 263,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 3400-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 3400-US',
            ),
            263 => 
            array (
                'id' => 264,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 3800-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 3800-US',
            ),
            264 => 
            array (
                'id' => 265,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 3800TL-US 208',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 3800TL-US 208',
            ),
            265 => 
            array (
                'id' => 266,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 3800TL-US 240',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 3800TL-US 240',
            ),
            266 => 
            array (
                'id' => 267,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 4000-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 4000-US',
            ),
            267 => 
            array (
                'id' => 268,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 4000TL-US 208',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 4000TL-US 208',
            ),
            268 => 
            array (
                'id' => 269,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 4000TL-US 240',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 4000TL-US 240',
            ),
            269 => 
            array (
                'id' => 270,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 5.0-1 SO-US-40',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 5.0-1 SO-US-40',
            ),
            270 => 
            array (
                'id' => 271,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 5000-US 208',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 5000-US 208',
            ),
            271 => 
            array (
                'id' => 272,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 5000-US 240',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 5000-US 240',
            ),
            272 => 
            array (
                'id' => 273,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 5000-US 277',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 5000-US 277',
            ),
            273 => 
            array (
                'id' => 274,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 5000TL-US 208',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 5000TL-US 208',
            ),
            274 => 
            array (
                'id' => 275,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 5000TL-US 240',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 5000TL-US 240',
            ),
            275 => 
            array (
                'id' => 276,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 6.0-1 SO-US-40',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 6.0-1 SO-US-40',
            ),
            276 => 
            array (
                'id' => 277,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 6000-US 208',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 6000-US 208',
            ),
            277 => 
            array (
                'id' => 278,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 6000-US 240',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 6000-US 240',
            ),
            278 => 
            array (
                'id' => 279,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 6000-US 277',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 6000-US 277',
            ),
            279 => 
            array (
                'id' => 280,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 6000TL-US 208',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 6000TL-US 208',
            ),
            280 => 
            array (
                'id' => 281,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 6000TL-US 240',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 6000TL-US 240',
            ),
            281 => 
            array (
                'id' => 282,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 7.0-1 SO-US-40',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 7.0-1 SO-US-40',
            ),
            282 => 
            array (
                'id' => 283,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 7.7-1 SO-US-40',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 7.7-1 SO-US-40',
            ),
            283 => 
            array (
                'id' => 284,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 7000-US 208',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 7000-US 208',
            ),
            284 => 
            array (
                'id' => 285,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 7000-US 240',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 7000-US 240',
            ),
            285 => 
            array (
                'id' => 286,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 7000-US 277',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 7000-US 277',
            ),
            286 => 
            array (
                'id' => 287,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 7000TL-US 208',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 7000TL-US 208',
            ),
            287 => 
            array (
                'id' => 288,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 7000TL-US 240',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 7000TL-US 240',
            ),
            288 => 
            array (
                'id' => 289,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 7700TL-US 208',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 7700TL-US 208',
            ),
            289 => 
            array (
                'id' => 290,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 7700TL-US 240',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 7700TL-US 240',
            ),
            290 => 
            array (
                'id' => 291,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 8000-US 240',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 8000-US 240',
            ),
            291 => 
            array (
                'id' => 292,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 8000-US 277',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 8000-US 277',
            ),
            292 => 
            array (
                'id' => 293,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 9000TL-US 208',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 9000TL-US 208',
            ),
            293 => 
            array (
                'id' => 294,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Boy 9000TL-US 240',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Boy 9000TL-US 240',
            ),
            294 => 
            array (
                'id' => 295,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Central 1850-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Central 1850-US',
            ),
            295 => 
            array (
                'id' => 296,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Central 2200-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Central 2200-US',
            ),
            296 => 
            array (
                'id' => 297,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Central 2500',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Central 2500',
            ),
            297 => 
            array (
                'id' => 298,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Central 500CP XT',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Central 500CP XT',
            ),
            298 => 
            array (
                'id' => 299,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Central 500CP-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Central 500CP-US',
            ),
            299 => 
            array (
                'id' => 300,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Central 500CP-US 600V',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Central 500CP-US 600V',
            ),
            300 => 
            array (
                'id' => 301,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Central 630CP XT',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Central 630CP XT',
            ),
            301 => 
            array (
                'id' => 302,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Central 630CP-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Central 630CP-US',
            ),
            302 => 
            array (
                'id' => 303,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Central 720CP XT',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Central 720CP XT',
            ),
            303 => 
            array (
                'id' => 304,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Central 720CP-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Central 720CP-US',
            ),
            304 => 
            array (
                'id' => 305,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Central 750CP-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Central 750CP-US',
            ),
            305 => 
            array (
                'id' => 306,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Central 760CP XT',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Central 760CP XT',
            ),
            306 => 
            array (
                'id' => 307,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Central 800CP-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Central 800CP-US',
            ),
            307 => 
            array (
                'id' => 308,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Central 850CP-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Central 850CP-US',
            ),
            308 => 
            array (
                'id' => 309,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Central 900CP-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Central 900CP-US',
            ),
            309 => 
            array (
                'id' => 310,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Tripower 10000TL-20',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Tripower 10000TL-20',
            ),
            310 => 
            array (
                'id' => 311,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Tripower 12000TL-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Tripower 12000TL-US',
            ),
            311 => 
            array (
                'id' => 312,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Tripower 15000TL-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Tripower 15000TL-US',
            ),
            312 => 
            array (
                'id' => 313,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Tripower 17000TL',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Tripower 17000TL',
            ),
            313 => 
            array (
                'id' => 314,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Tripower 20000TL-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Tripower 20000TL-US',
            ),
            314 => 
            array (
                'id' => 315,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Tripower 24000TL-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Tripower 24000TL-US',
            ),
            315 => 
            array (
                'id' => 316,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Tripower 25000-TL-30',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Tripower 25000-TL-30',
            ),
            316 => 
            array (
                'id' => 317,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Tripower 30000TL-US',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Tripower 30000TL-US',
            ),
            317 => 
            array (
                'id' => 318,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Tripower 50-US-40',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Tripower 50-US-40',
            ),
            318 => 
            array (
                'id' => 319,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Tripower 5000TL-20',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Tripower 5000TL-20',
            ),
            319 => 
            array (
                'id' => 320,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Tripower 60',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Tripower 60',
            ),
            320 => 
            array (
                'id' => 321,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Tripower 6000TL-20',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Tripower 6000TL-20',
            ),
            321 => 
            array (
                'id' => 322,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Tripower 75000TL-20',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Tripower 75000TL-20',
            ),
            322 => 
            array (
                'id' => 323,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Tripower 8000TL-20',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Tripower 8000TL-20',
            ),
            323 => 
            array (
                'id' => 324,
                'asset_type_id' => 2,
                'name' => 'SMA America Sunny Tripower 9000TL-20',
                'manufacturer' => 'SMA America',
                'model' => 'Sunny Tripower 9000TL-20',
            ),
            324 => 
            array (
                'id' => 325,
                'asset_type_id' => 2,
                'name' => 'SolarEdge SE10000A-US 208',
                'manufacturer' => 'SolarEdge',
                'model' => 'SE10000A-US 208',
            ),
            325 => 
            array (
                'id' => 326,
                'asset_type_id' => 2,
                'name' => 'SolarEdge SE10000A-US 2240',
                'manufacturer' => 'SolarEdge',
                'model' => 'SE10000A-US 2240',
            ),
            326 => 
            array (
                'id' => 327,
                'asset_type_id' => 2,
                'name' => 'SolarEdge SE10KUS',
                'manufacturer' => 'SolarEdge',
                'model' => 'SE10KUS',
            ),
            327 => 
            array (
                'id' => 328,
                'asset_type_id' => 2,
                'name' => 'SolarEdge SE11400A-US',
                'manufacturer' => 'SolarEdge',
                'model' => 'SE11400A-US',
            ),
            328 => 
            array (
                'id' => 329,
                'asset_type_id' => 2,
                'name' => 'SolarEdge SE14.4KUS',
                'manufacturer' => 'SolarEdge',
                'model' => 'SE14.4KUS',
            ),
            329 => 
            array (
                'id' => 330,
                'asset_type_id' => 2,
                'name' => 'SolarEdge SE20KUS',
                'manufacturer' => 'SolarEdge',
                'model' => 'SE20KUS',
            ),
            330 => 
            array (
                'id' => 331,
                'asset_type_id' => 2,
                'name' => 'SolarEdge SE3000A-US',
                'manufacturer' => 'SolarEdge',
                'model' => 'SE3000A-US',
            ),
            331 => 
            array (
                'id' => 332,
                'asset_type_id' => 2,
                'name' => 'SolarEdge SE3000H-US-SE7600H-US',
                'manufacturer' => 'SolarEdge',
                'model' => 'SE3000H-US-SE7600H-US',
            ),
            332 => 
            array (
                'id' => 333,
                'asset_type_id' => 2,
                'name' => 'SolarEdge SE33.3KUS',
                'manufacturer' => 'SolarEdge',
                'model' => 'SE33.3KUS',
            ),
            333 => 
            array (
                'id' => 334,
                'asset_type_id' => 2,
                'name' => 'SolarEdge SE3800A-US',
                'manufacturer' => 'SolarEdge',
                'model' => 'SE3800A-US',
            ),
            334 => 
            array (
                'id' => 335,
                'asset_type_id' => 2,
                'name' => 'SolarEdge SE5000A-US',
                'manufacturer' => 'SolarEdge',
                'model' => 'SE5000A-US',
            ),
            335 => 
            array (
                'id' => 336,
                'asset_type_id' => 2,
                'name' => 'SolarEdge SE6000A-US',
                'manufacturer' => 'SolarEdge',
                'model' => 'SE6000A-US',
            ),
            336 => 
            array (
                'id' => 337,
                'asset_type_id' => 2,
                'name' => 'SolarEdge SE7600A-US',
                'manufacturer' => 'SolarEdge',
                'model' => 'SE7600A-US',
            ),
            337 => 
            array (
                'id' => 338,
                'asset_type_id' => 2,
                'name' => 'SolarEdge SE9KUS',
                'manufacturer' => 'SolarEdge',
                'model' => 'SE9KUS',
            ),
            338 => 
            array (
                'id' => 339,
                'asset_type_id' => 2,
                'name' => 'Sungrow G500KTL',
                'manufacturer' => 'Sungrow',
                'model' => 'SG500KTL',
            ),
            339 => 
            array (
                'id' => 340,
                'asset_type_id' => 2,
                'name' => 'Sungrow G630KTL',
                'manufacturer' => 'Sungrow',
                'model' => 'SG630KTL',
            ),
            340 => 
            array (
                'id' => 341,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG1000KHV',
                'manufacturer' => 'Sungrow',
                'model' => 'SG1000KHV',
            ),
            341 => 
            array (
                'id' => 342,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG1000KS',
                'manufacturer' => 'Sungrow',
                'model' => 'SG1000KS',
            ),
            342 => 
            array (
                'id' => 343,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG1000TS',
                'manufacturer' => 'Sungrow',
                'model' => 'SG1000TS',
            ),
            343 => 
            array (
                'id' => 344,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG100K3',
                'manufacturer' => 'Sungrow',
                'model' => 'SG100K3',
            ),
            344 => 
            array (
                'id' => 345,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG100KC',
                'manufacturer' => 'Sungrow',
                'model' => 'SG100KC',
            ),
            345 => 
            array (
                'id' => 346,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG100KLV',
                'manufacturer' => 'Sungrow',
                'model' => 'SG100KLV',
            ),
            346 => 
            array (
                'id' => 347,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG10K3',
                'manufacturer' => 'Sungrow',
                'model' => 'SG10K3',
            ),
            347 => 
            array (
                'id' => 348,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG10KTL',
                'manufacturer' => 'Sungrow',
                'model' => 'SG10KTL',
            ),
            348 => 
            array (
                'id' => 349,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG1260KS',
                'manufacturer' => 'Sungrow',
                'model' => 'SG1260KS',
            ),
            349 => 
            array (
                'id' => 350,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG12KTL',
                'manufacturer' => 'Sungrow',
                'model' => 'SG12KTL',
            ),
            350 => 
            array (
                'id' => 351,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG15KTL',
                'manufacturer' => 'Sungrow',
                'model' => 'SG15KTL',
            ),
            351 => 
            array (
                'id' => 352,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG1K5TL',
                'manufacturer' => 'Sungrow',
                'model' => 'SG1K5TL',
            ),
            352 => 
            array (
                'id' => 353,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG20KTL',
                'manufacturer' => 'Sungrow',
                'model' => 'SG20KTL',
            ),
            353 => 
            array (
                'id' => 354,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG250K3',
                'manufacturer' => 'Sungrow',
                'model' => 'SG250K3',
            ),
            354 => 
            array (
                'id' => 355,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG250KC',
                'manufacturer' => 'Sungrow',
                'model' => 'SG250KC',
            ),
            355 => 
            array (
                'id' => 356,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG250KLV',
                'manufacturer' => 'Sungrow',
                'model' => 'SG250KLV',
            ),
            356 => 
            array (
                'id' => 357,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG2K5TL',
                'manufacturer' => 'Sungrow',
                'model' => 'SG2K5TL',
            ),
            357 => 
            array (
                'id' => 358,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG30K3',
                'manufacturer' => 'Sungrow',
                'model' => 'SG30K3',
            ),
            358 => 
            array (
                'id' => 359,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG30KTL',
                'manufacturer' => 'Sungrow',
                'model' => 'SG30KTL',
            ),
            359 => 
            array (
                'id' => 360,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG330KTL',
                'manufacturer' => 'Sungrow',
                'model' => 'SG330KTL',
            ),
            360 => 
            array (
                'id' => 361,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG3K',
                'manufacturer' => 'Sungrow',
                'model' => 'SG3K',
            ),
            361 => 
            array (
                'id' => 362,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG3KTL',
                'manufacturer' => 'Sungrow',
                'model' => 'SG3KTL',
            ),
            362 => 
            array (
                'id' => 363,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG4KTL',
                'manufacturer' => 'Sungrow',
                'model' => 'SG4KTL',
            ),
            363 => 
            array (
                'id' => 364,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG500K3',
                'manufacturer' => 'Sungrow',
                'model' => 'SG500K3',
            ),
            364 => 
            array (
                'id' => 365,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG500MX',
                'manufacturer' => 'Sungrow',
                'model' => 'SG500MX',
            ),
            365 => 
            array (
                'id' => 366,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG50K3',
                'manufacturer' => 'Sungrow',
                'model' => 'SG50K3',
            ),
            366 => 
            array (
                'id' => 367,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG50KC',
                'manufacturer' => 'Sungrow',
                'model' => 'SG50KC',
            ),
            367 => 
            array (
                'id' => 368,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG5K',
                'manufacturer' => 'Sungrow',
                'model' => 'SG5K',
            ),
            368 => 
            array (
                'id' => 369,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG5KTL',
                'manufacturer' => 'Sungrow',
                'model' => 'SG5KTL',
            ),
            369 => 
            array (
                'id' => 370,
                'asset_type_id' => 2,
                'name' => 'SunGrow SG60KU-M',
                'manufacturer' => 'SunGrow',
                'model' => 'SG60KU-M',
            ),
            370 => 
            array (
                'id' => 371,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG630MX',
                'manufacturer' => 'Sungrow',
                'model' => 'SG630MX',
            ),
            371 => 
            array (
                'id' => 372,
                'asset_type_id' => 2,
                'name' => 'Sungrow SG6K',
                'manufacturer' => 'Sungrow',
                'model' => 'SG6K',
            ),
            372 => 
            array (
                'id' => 373,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 100KW',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 100KW',
            ),
            373 => 
            array (
                'id' => 374,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 10KW',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 10KW',
            ),
            374 => 
            array (
                'id' => 375,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 13KW',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 13KW',
            ),
            375 => 
            array (
                'id' => 376,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 14TL',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 14TL',
            ),
            376 => 
            array (
                'id' => 377,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 15KW',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 15KW',
            ),
            377 => 
            array (
                'id' => 378,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 1800',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 1800',
            ),
            378 => 
            array (
                'id' => 379,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 20TL',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 20TL',
            ),
            379 => 
            array (
                'id' => 380,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 23TL',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 23TL',
            ),
            380 => 
            array (
                'id' => 381,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 2500',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 2500',
            ),
            381 => 
            array (
                'id' => 382,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 28TL',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 28TL',
            ),
            382 => 
            array (
                'id' => 383,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 3000S',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 3000S',
            ),
            383 => 
            array (
                'id' => 384,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 36TL',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 36TL',
            ),
            384 => 
            array (
                'id' => 385,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 3800TL',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 3800TL',
            ),
            385 => 
            array (
                'id' => 386,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 4000S',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 4000S',
            ),
            386 => 
            array (
                'id' => 387,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 5000S',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 5000S',
            ),
            387 => 
            array (
                'id' => 388,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 50KW',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 50KW',
            ),
            388 => 
            array (
                'id' => 389,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 50TL',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 50TL',
            ),
            389 => 
            array (
                'id' => 390,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 5200TL',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 5200TL',
            ),
            390 => 
            array (
                'id' => 391,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 5300',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 5300',
            ),
            391 => 
            array (
                'id' => 392,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 60KW',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 60KW',
            ),
            392 => 
            array (
                'id' => 393,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 60TL',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 60TL',
            ),
            393 => 
            array (
                'id' => 394,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 6500',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 6500',
            ),
            394 => 
            array (
                'id' => 395,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 6600TL',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 6600TL',
            ),
            395 => 
            array (
                'id' => 396,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 7500',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 7500',
            ),
            396 => 
            array (
                'id' => 397,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 75KW',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 75KW',
            ),
            397 => 
            array (
                'id' => 398,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 7600TL',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 7600TL',
            ),
            398 => 
            array (
                'id' => 399,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria PVI 85KW',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'PVI 85KW',
            ),
            399 => 
            array (
                'id' => 400,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria SGI 225',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'SGI 225',
            ),
            400 => 
            array (
                'id' => 401,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria SGI 250',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'SGI 250',
            ),
            401 => 
            array (
                'id' => 402,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria SGI 266',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'SGI 266',
            ),
            402 => 
            array (
                'id' => 403,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria SGI 300',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'SGI 300',
            ),
            403 => 
            array (
                'id' => 404,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria SGI 500',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'SGI 500',
            ),
            404 => 
            array (
                'id' => 405,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria SGI 500PE',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'SGI 500PE',
            ),
            405 => 
            array (
                'id' => 406,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria SGI 500XT',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'SGI 500XT',
            ),
            406 => 
            array (
                'id' => 407,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria SGI 500XTM',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'SGI 500XTM',
            ),
            407 => 
            array (
                'id' => 408,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria SGI 750XTM',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'SGI 750XTM',
            ),
            408 => 
            array (
                'id' => 409,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria SGI225',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'SGI225',
            ),
            409 => 
            array (
                'id' => 410,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria SGI250',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'SGI250',
            ),
            410 => 
            array (
                'id' => 411,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria SGI266',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'SGI266',
            ),
            411 => 
            array (
                'id' => 412,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria SGI300',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'SGI300',
            ),
            412 => 
            array (
                'id' => 413,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria SGI500',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'SGI500',
            ),
            413 => 
            array (
                'id' => 414,
                'asset_type_id' => 2,
                'name' => 'Yaskawa Solectria SGI500PE',
                'manufacturer' => 'Yaskawa Solectria',
                'model' => 'SGI500PE',
            ),
            414 => 
            array (
                'id' => 415,
                'asset_type_id' => 5,
                'name' => 'Astronergy ASM6610P 250W',
                'manufacturer' => 'Astronergy',
                'model' => 'ASM6610P 250W',
            ),
            415 => 
            array (
                'id' => 416,
                'asset_type_id' => 5,
                'name' => 'Astronergy ASM6610P 255W',
                'manufacturer' => 'Astronergy',
                'model' => 'ASM6610P 255W',
            ),
            416 => 
            array (
                'id' => 417,
                'asset_type_id' => 5,
                'name' => 'Astronergy ASM6610P 260W',
                'manufacturer' => 'Astronergy',
                'model' => 'ASM6610P 260W',
            ),
            417 => 
            array (
                'id' => 418,
                'asset_type_id' => 5,
                'name' => 'Astronergy ASM6610P 265W',
                'manufacturer' => 'Astronergy',
                'model' => 'ASM6610P 265W',
            ),
            418 => 
            array (
                'id' => 419,
                'asset_type_id' => 5,
                'name' => 'Astronergy ASM6610P 270W',
                'manufacturer' => 'Astronergy',
                'model' => 'ASM6610P 270W',
            ),
            419 => 
            array (
                'id' => 420,
                'asset_type_id' => 5,
                'name' => 'Astronergy ASM6610P 275W',
                'manufacturer' => 'Astronergy',
                'model' => 'ASM6610P 275W',
            ),
            420 => 
            array (
                'id' => 421,
                'asset_type_id' => 5,
            'name' => 'Astronergy ASM66610P(BF) 240W',
                'manufacturer' => 'Astronergy',
            'model' => 'ASM66610P(BF) 240W',
            ),
            421 => 
            array (
                'id' => 422,
                'asset_type_id' => 5,
            'name' => 'Astronergy ASM66610P(BF) 245W',
                'manufacturer' => 'Astronergy',
            'model' => 'ASM66610P(BF) 245W',
            ),
            422 => 
            array (
                'id' => 423,
                'asset_type_id' => 5,
            'name' => 'Astronergy ASM66610P(BF) 250W',
                'manufacturer' => 'Astronergy',
            'model' => 'ASM66610P(BF) 250W',
            ),
            423 => 
            array (
                'id' => 424,
                'asset_type_id' => 5,
            'name' => 'Astronergy ASM66610P(BF) 255W',
                'manufacturer' => 'Astronergy',
            'model' => 'ASM66610P(BF) 255W',
            ),
            424 => 
            array (
                'id' => 425,
                'asset_type_id' => 5,
            'name' => 'Astronergy ASM66610P(BF) 260W',
                'manufacturer' => 'Astronergy',
            'model' => 'ASM66610P(BF) 260W',
            ),
            425 => 
            array (
                'id' => 426,
                'asset_type_id' => 5,
            'name' => 'Astronergy ASM66610P(BF) 265W',
                'manufacturer' => 'Astronergy',
            'model' => 'ASM66610P(BF) 265W',
            ),
            426 => 
            array (
                'id' => 427,
                'asset_type_id' => 5,
            'name' => 'Astronergy ASM66610P(BL) 250W',
                'manufacturer' => 'Astronergy',
            'model' => 'ASM66610P(BL) 250W',
            ),
            427 => 
            array (
                'id' => 428,
                'asset_type_id' => 5,
            'name' => 'Astronergy ASM66610P(BL) 255W',
                'manufacturer' => 'Astronergy',
            'model' => 'ASM66610P(BL) 255W',
            ),
            428 => 
            array (
                'id' => 429,
                'asset_type_id' => 5,
            'name' => 'Astronergy ASM66610P(BL) 260W',
                'manufacturer' => 'Astronergy',
            'model' => 'ASM66610P(BL) 260W',
            ),
            429 => 
            array (
                'id' => 430,
                'asset_type_id' => 5,
            'name' => 'Astronergy ASM66610P(BL) 265W',
                'manufacturer' => 'Astronergy',
            'model' => 'ASM66610P(BL) 265W',
            ),
            430 => 
            array (
                'id' => 431,
                'asset_type_id' => 5,
            'name' => 'Astronergy ASM66610P(BL) 270W',
                'manufacturer' => 'Astronergy',
            'model' => 'ASM66610P(BL) 270W',
            ),
            431 => 
            array (
                'id' => 432,
                'asset_type_id' => 5,
            'name' => 'Astronergy ASM66610P(BL) 275W',
                'manufacturer' => 'Astronergy',
            'model' => 'ASM66610P(BL) 275W',
            ),
            432 => 
            array (
                'id' => 433,
                'asset_type_id' => 5,
                'name' => 'Astronergy ASM66612P 305W',
                'manufacturer' => 'Astronergy',
                'model' => 'ASM66612P 305W',
            ),
            433 => 
            array (
                'id' => 434,
                'asset_type_id' => 5,
                'name' => 'Astronergy ASM66612P 310W',
                'manufacturer' => 'Astronergy',
                'model' => 'ASM66612P 310W',
            ),
            434 => 
            array (
                'id' => 435,
                'asset_type_id' => 5,
                'name' => 'Astronergy ASM66612P 315W',
                'manufacturer' => 'Astronergy',
                'model' => 'ASM66612P 315W',
            ),
            435 => 
            array (
                'id' => 436,
                'asset_type_id' => 5,
                'name' => 'Astronergy ASM66612P 320W',
                'manufacturer' => 'Astronergy',
                'model' => 'ASM66612P 320W',
            ),
            436 => 
            array (
                'id' => 437,
                'asset_type_id' => 5,
                'name' => 'Astronergy ASM66612P 325W',
                'manufacturer' => 'Astronergy',
                'model' => 'ASM66612P 325W',
            ),
            437 => 
            array (
                'id' => 438,
                'asset_type_id' => 5,
                'name' => 'Astronergy DIAMOND CHSM6612P 305W',
                'manufacturer' => 'Astronergy',
                'model' => 'DIAMOND CHSM6612P 305W',
            ),
            438 => 
            array (
                'id' => 439,
                'asset_type_id' => 5,
                'name' => 'Astronergy DIAMOND CHSM6612P 305W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'DIAMOND CHSM6612P 305W HV',
            ),
            439 => 
            array (
                'id' => 440,
                'asset_type_id' => 5,
                'name' => 'Astronergy DIAMOND CHSM6612P 310W',
                'manufacturer' => 'Astronergy',
                'model' => 'DIAMOND CHSM6612P 310W',
            ),
            440 => 
            array (
                'id' => 441,
                'asset_type_id' => 5,
                'name' => 'Astronergy DIAMOND CHSM6612P 310W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'DIAMOND CHSM6612P 310W HV',
            ),
            441 => 
            array (
                'id' => 442,
                'asset_type_id' => 5,
                'name' => 'Astronergy DIAMOND CHSM6612P 315W',
                'manufacturer' => 'Astronergy',
                'model' => 'DIAMOND CHSM6612P 315W',
            ),
            442 => 
            array (
                'id' => 443,
                'asset_type_id' => 5,
                'name' => 'Astronergy DIAMOND CHSM6612P 315W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'DIAMOND CHSM6612P 315W HV',
            ),
            443 => 
            array (
                'id' => 444,
                'asset_type_id' => 5,
                'name' => 'Astronergy DIAMOND CHSM6612P 320W',
                'manufacturer' => 'Astronergy',
                'model' => 'DIAMOND CHSM6612P 320W',
            ),
            444 => 
            array (
                'id' => 445,
                'asset_type_id' => 5,
                'name' => 'Astronergy DIAMOND CHSM6612P 320W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'DIAMOND CHSM6612P 320W HV',
            ),
            445 => 
            array (
                'id' => 446,
                'asset_type_id' => 5,
                'name' => 'Astronergy DIAMOND CHSM6612P 325W',
                'manufacturer' => 'Astronergy',
                'model' => 'DIAMOND CHSM6612P 325W',
            ),
            446 => 
            array (
                'id' => 447,
                'asset_type_id' => 5,
                'name' => 'Astronergy DIAMOND CHSM6612P 325W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'DIAMOND CHSM6612P 325W HV',
            ),
            447 => 
            array (
                'id' => 448,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P 250W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P 250W',
            ),
            448 => 
            array (
                'id' => 449,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P 250W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P 250W HV',
            ),
            449 => 
            array (
                'id' => 450,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P 255W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P 255W',
            ),
            450 => 
            array (
                'id' => 451,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P 255W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P 255W HV',
            ),
            451 => 
            array (
                'id' => 452,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P 260W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P 260W',
            ),
            452 => 
            array (
                'id' => 453,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P 260W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P 260W HV',
            ),
            453 => 
            array (
                'id' => 454,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P 265W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P 265W',
            ),
            454 => 
            array (
                'id' => 455,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P 265W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P 265W HV',
            ),
            455 => 
            array (
                'id' => 456,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P 270W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P 270W',
            ),
            456 => 
            array (
                'id' => 457,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P 270W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P 270W HV',
            ),
            457 => 
            array (
                'id' => 458,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN ICHSM6610P Baseline 250W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN ICHSM6610P Baseline 250W',
            ),
            458 => 
            array (
                'id' => 459,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P Baseline 250W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P Baseline 250W HV',
            ),
            459 => 
            array (
                'id' => 460,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P Baseline 255W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P Baseline 255W',
            ),
            460 => 
            array (
                'id' => 461,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P Baseline 255W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P Baseline 255W HV',
            ),
            461 => 
            array (
                'id' => 462,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P Baseline 260W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P Baseline 260W',
            ),
            462 => 
            array (
                'id' => 463,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P Baseline 260W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P Baseline 260W HV',
            ),
            463 => 
            array (
                'id' => 464,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P Baseline 265W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P Baseline 265W',
            ),
            464 => 
            array (
                'id' => 465,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P Baseline 265W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P Baseline 265W HV',
            ),
            465 => 
            array (
                'id' => 466,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P Baseline 270W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P Baseline 270W',
            ),
            466 => 
            array (
                'id' => 467,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6610P Baseline 270W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6610P Baseline 270W HV',
            ),
            467 => 
            array (
                'id' => 468,
                'asset_type_id' => 5,
            'name' => 'Astronergy VIOLIN CHSM6610P(BL) 250W',
                'manufacturer' => 'Astronergy',
            'model' => 'VIOLIN CHSM6610P(BL) 250W',
            ),
            468 => 
            array (
                'id' => 469,
                'asset_type_id' => 5,
            'name' => 'Astronergy VIOLIN CHSM6610P(BL) 255W',
                'manufacturer' => 'Astronergy',
            'model' => 'VIOLIN CHSM6610P(BL) 255W',
            ),
            469 => 
            array (
                'id' => 470,
                'asset_type_id' => 5,
            'name' => 'Astronergy VIOLIN CHSM6610P(BL) 260W',
                'manufacturer' => 'Astronergy',
            'model' => 'VIOLIN CHSM6610P(BL) 260W',
            ),
            470 => 
            array (
                'id' => 471,
                'asset_type_id' => 5,
            'name' => 'Astronergy VIOLIN CHSM6610P(BL) 265W',
                'manufacturer' => 'Astronergy',
            'model' => 'VIOLIN CHSM6610P(BL) 265W',
            ),
            471 => 
            array (
                'id' => 472,
                'asset_type_id' => 5,
            'name' => 'Astronergy VIOLIN CHSM6610P(BL) 270W',
                'manufacturer' => 'Astronergy',
            'model' => 'VIOLIN CHSM6610P(BL) 270W',
            ),
            472 => 
            array (
                'id' => 473,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P 315W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P 315W',
            ),
            473 => 
            array (
                'id' => 474,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P 315W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P 315W HV',
            ),
            474 => 
            array (
                'id' => 475,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P 320W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P 320W',
            ),
            475 => 
            array (
                'id' => 476,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P 320W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P 320W HV',
            ),
            476 => 
            array (
                'id' => 477,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P 325W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P 325W',
            ),
            477 => 
            array (
                'id' => 478,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P 325W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P 325W HV',
            ),
            478 => 
            array (
                'id' => 479,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P 330W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P 330W',
            ),
            479 => 
            array (
                'id' => 480,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P 330W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P 330W HV',
            ),
            480 => 
            array (
                'id' => 481,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P 335W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P 335W',
            ),
            481 => 
            array (
                'id' => 482,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P 335W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P 335W HV',
            ),
            482 => 
            array (
                'id' => 483,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P Baseline 305W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P Baseline 305W',
            ),
            483 => 
            array (
                'id' => 484,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P Baseline 305W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P Baseline 305W HV',
            ),
            484 => 
            array (
                'id' => 485,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P Baseline 310W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P Baseline 310W',
            ),
            485 => 
            array (
                'id' => 486,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P Baseline 310W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P Baseline 310W HV',
            ),
            486 => 
            array (
                'id' => 487,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P Baseline 315W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P Baseline 315W',
            ),
            487 => 
            array (
                'id' => 488,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P Baseline 315W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P Baseline 315W HV',
            ),
            488 => 
            array (
                'id' => 489,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P Baseline 320W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P Baseline 320W',
            ),
            489 => 
            array (
                'id' => 490,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P Baseline 320W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P Baseline 320W HV',
            ),
            490 => 
            array (
                'id' => 491,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P Baseline 325W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P Baseline 325W',
            ),
            491 => 
            array (
                'id' => 492,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN CHSM6612P Baseline 325W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN CHSM6612P Baseline 325W HV',
            ),
            492 => 
            array (
                'id' => 493,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6610P 260W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6610P 260W',
            ),
            493 => 
            array (
                'id' => 494,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6610P 260W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6610P 260W HV',
            ),
            494 => 
            array (
                'id' => 495,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6610P 265W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6610P 265W',
            ),
            495 => 
            array (
                'id' => 496,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6610P 265W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6610P 265W HV',
            ),
            496 => 
            array (
                'id' => 497,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6610P 270W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6610P 270W',
            ),
            497 => 
            array (
                'id' => 498,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6610P 270W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6610P 270W HV',
            ),
            498 => 
            array (
                'id' => 499,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6610P 275W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6610P 275W',
            ),
            499 => 
            array (
                'id' => 500,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6610P 275W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6610P 275W HV',
            ),
        ));
        \DB::table('assets')->insert(array (
            0 => 
            array (
                'id' => 501,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6610P 280W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6610P 280W',
            ),
            1 => 
            array (
                'id' => 502,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6610P 280W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6610P 280W HV',
            ),
            2 => 
            array (
                'id' => 503,
                'asset_type_id' => 5,
            'name' => 'Astronergy VIOLIN II CHSM6610P(DG) 260W',
                'manufacturer' => 'Astronergy',
            'model' => 'VIOLIN II CHSM6610P(DG) 260W',
            ),
            3 => 
            array (
                'id' => 504,
                'asset_type_id' => 5,
            'name' => 'Astronergy VIOLIN II CHSM6610P(DG) 265W',
                'manufacturer' => 'Astronergy',
            'model' => 'VIOLIN II CHSM6610P(DG) 265W',
            ),
            4 => 
            array (
                'id' => 505,
                'asset_type_id' => 5,
            'name' => 'Astronergy VIOLIN II CHSM6610P(DG) 270W',
                'manufacturer' => 'Astronergy',
            'model' => 'VIOLIN II CHSM6610P(DG) 270W',
            ),
            5 => 
            array (
                'id' => 506,
                'asset_type_id' => 5,
            'name' => 'Astronergy VIOLIN II CHSM6610P(DG) 275W',
                'manufacturer' => 'Astronergy',
            'model' => 'VIOLIN II CHSM6610P(DG) 275W',
            ),
            6 => 
            array (
                'id' => 507,
                'asset_type_id' => 5,
            'name' => 'Astronergy VIOLIN II CHSM6610P(DG) 280W',
                'manufacturer' => 'Astronergy',
            'model' => 'VIOLIN II CHSM6610P(DG) 280W',
            ),
            7 => 
            array (
                'id' => 508,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6612P 305W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6612P 305W',
            ),
            8 => 
            array (
                'id' => 509,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6612P 305W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6612P 305W HV',
            ),
            9 => 
            array (
                'id' => 510,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6612P 310W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6612P 310W',
            ),
            10 => 
            array (
                'id' => 511,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6612P 310W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6612P 310W HV',
            ),
            11 => 
            array (
                'id' => 512,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6612P 315W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6612P 315W',
            ),
            12 => 
            array (
                'id' => 513,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6612P 315W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6612P 315W HV',
            ),
            13 => 
            array (
                'id' => 514,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6612P 320W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6612P 320W',
            ),
            14 => 
            array (
                'id' => 515,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6612P 320W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6612P 320W HV',
            ),
            15 => 
            array (
                'id' => 516,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6612P 325W',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6612P 325W',
            ),
            16 => 
            array (
                'id' => 517,
                'asset_type_id' => 5,
                'name' => 'Astronergy VIOLIN II CHSM6612P 325W HV',
                'manufacturer' => 'Astronergy',
                'model' => 'VIOLIN II CHSM6612P 325W HV',
            ),
            17 => 
            array (
                'id' => 518,
                'asset_type_id' => 5,
                'name' => 'BYD 120P6C-18',
                'manufacturer' => 'BYD',
                'model' => '120P6C-18',
            ),
            18 => 
            array (
                'id' => 519,
                'asset_type_id' => 5,
                'name' => 'BYD 125P6C-18',
                'manufacturer' => 'BYD',
                'model' => '125P6C-18',
            ),
            19 => 
            array (
                'id' => 520,
                'asset_type_id' => 5,
                'name' => 'BYD 130P6C-18',
                'manufacturer' => 'BYD',
                'model' => '130P6C-18',
            ),
            20 => 
            array (
                'id' => 521,
                'asset_type_id' => 5,
                'name' => 'BYD 135P6C-18',
                'manufacturer' => 'BYD',
                'model' => '135P6C-18',
            ),
            21 => 
            array (
                'id' => 522,
                'asset_type_id' => 5,
                'name' => 'BYD 140P6C-18',
                'manufacturer' => 'BYD',
                'model' => '140P6C-18',
            ),
            22 => 
            array (
                'id' => 523,
                'asset_type_id' => 5,
                'name' => 'BYD 145P6C-18',
                'manufacturer' => 'BYD',
                'model' => '145P6C-18',
            ),
            23 => 
            array (
                'id' => 524,
                'asset_type_id' => 5,
                'name' => 'BYD 150P6C-18',
                'manufacturer' => 'BYD',
                'model' => '150P6C-18',
            ),
            24 => 
            array (
                'id' => 525,
                'asset_type_id' => 5,
                'name' => 'BYD 155P6C-18',
                'manufacturer' => 'BYD',
                'model' => '155P6C-18',
            ),
            25 => 
            array (
                'id' => 526,
                'asset_type_id' => 5,
                'name' => 'BYD 160P6C-18',
                'manufacturer' => 'BYD',
                'model' => '160P6C-18',
            ),
            26 => 
            array (
                'id' => 527,
                'asset_type_id' => 5,
                'name' => 'BYD 160P6C-24',
                'manufacturer' => 'BYD',
                'model' => '160P6C-24',
            ),
            27 => 
            array (
                'id' => 528,
                'asset_type_id' => 5,
                'name' => 'BYD 165P6C-18',
                'manufacturer' => 'BYD',
                'model' => '165P6C-18',
            ),
            28 => 
            array (
                'id' => 529,
                'asset_type_id' => 5,
                'name' => 'BYD 165P6C-24',
                'manufacturer' => 'BYD',
                'model' => '165P6C-24',
            ),
            29 => 
            array (
                'id' => 530,
                'asset_type_id' => 5,
                'name' => 'BYD 170P6C-18',
                'manufacturer' => 'BYD',
                'model' => '170P6C-18',
            ),
            30 => 
            array (
                'id' => 531,
                'asset_type_id' => 5,
                'name' => 'BYD 170P6C-24',
                'manufacturer' => 'BYD',
                'model' => '170P6C-24',
            ),
            31 => 
            array (
                'id' => 532,
                'asset_type_id' => 5,
                'name' => 'BYD 175P6C-24',
                'manufacturer' => 'BYD',
                'model' => '175P6C-24',
            ),
            32 => 
            array (
                'id' => 533,
                'asset_type_id' => 5,
                'name' => 'BYD 180P6C-24',
                'manufacturer' => 'BYD',
                'model' => '180P6C-24',
            ),
            33 => 
            array (
                'id' => 534,
                'asset_type_id' => 5,
                'name' => 'BYD 180P6C-27',
                'manufacturer' => 'BYD',
                'model' => '180P6C-27',
            ),
            34 => 
            array (
                'id' => 535,
                'asset_type_id' => 5,
                'name' => 'BYD 185P6C-24',
                'manufacturer' => 'BYD',
                'model' => '185P6C-24',
            ),
            35 => 
            array (
                'id' => 536,
                'asset_type_id' => 5,
                'name' => 'BYD 185P6C-27',
                'manufacturer' => 'BYD',
                'model' => '185P6C-27',
            ),
            36 => 
            array (
                'id' => 537,
                'asset_type_id' => 5,
                'name' => 'BYD 190P6C-24',
                'manufacturer' => 'BYD',
                'model' => '190P6C-24',
            ),
            37 => 
            array (
                'id' => 538,
                'asset_type_id' => 5,
                'name' => 'BYD 190P6C-27',
                'manufacturer' => 'BYD',
                'model' => '190P6C-27',
            ),
            38 => 
            array (
                'id' => 539,
                'asset_type_id' => 5,
                'name' => 'BYD 195P6C-24',
                'manufacturer' => 'BYD',
                'model' => '195P6C-24',
            ),
            39 => 
            array (
                'id' => 540,
                'asset_type_id' => 5,
                'name' => 'BYD 195P6C-27',
                'manufacturer' => 'BYD',
                'model' => '195P6C-27',
            ),
            40 => 
            array (
                'id' => 541,
                'asset_type_id' => 5,
                'name' => 'BYD 200P6C-24',
                'manufacturer' => 'BYD',
                'model' => '200P6C-24',
            ),
            41 => 
            array (
                'id' => 542,
                'asset_type_id' => 5,
                'name' => 'BYD 200P6C-27',
                'manufacturer' => 'BYD',
                'model' => '200P6C-27',
            ),
            42 => 
            array (
                'id' => 543,
                'asset_type_id' => 5,
                'name' => 'BYD 200P6C-30',
                'manufacturer' => 'BYD',
                'model' => '200P6C-30',
            ),
            43 => 
            array (
                'id' => 544,
                'asset_type_id' => 5,
                'name' => 'BYD 205P6C-24',
                'manufacturer' => 'BYD',
                'model' => '205P6C-24',
            ),
            44 => 
            array (
                'id' => 545,
                'asset_type_id' => 5,
                'name' => 'BYD 205P6C-27',
                'manufacturer' => 'BYD',
                'model' => '205P6C-27',
            ),
            45 => 
            array (
                'id' => 546,
                'asset_type_id' => 5,
                'name' => 'BYD 205P6C-30',
                'manufacturer' => 'BYD',
                'model' => '205P6C-30',
            ),
            46 => 
            array (
                'id' => 547,
                'asset_type_id' => 5,
                'name' => 'BYD 210P6C-24',
                'manufacturer' => 'BYD',
                'model' => '210P6C-24',
            ),
            47 => 
            array (
                'id' => 548,
                'asset_type_id' => 5,
                'name' => 'BYD 210P6C-27',
                'manufacturer' => 'BYD',
                'model' => '210P6C-27',
            ),
            48 => 
            array (
                'id' => 549,
                'asset_type_id' => 5,
                'name' => 'BYD 210P6C-30',
                'manufacturer' => 'BYD',
                'model' => '210P6C-30',
            ),
            49 => 
            array (
                'id' => 550,
                'asset_type_id' => 5,
                'name' => 'BYD 215P6C-24',
                'manufacturer' => 'BYD',
                'model' => '215P6C-24',
            ),
            50 => 
            array (
                'id' => 551,
                'asset_type_id' => 5,
                'name' => 'BYD 215P6C-27',
                'manufacturer' => 'BYD',
                'model' => '215P6C-27',
            ),
            51 => 
            array (
                'id' => 552,
                'asset_type_id' => 5,
                'name' => 'BYD 215P6C-30',
                'manufacturer' => 'BYD',
                'model' => '215P6C-30',
            ),
            52 => 
            array (
                'id' => 553,
                'asset_type_id' => 5,
                'name' => 'BYD 220P6C-24',
                'manufacturer' => 'BYD',
                'model' => '220P6C-24',
            ),
            53 => 
            array (
                'id' => 554,
                'asset_type_id' => 5,
                'name' => 'BYD 220P6C-27',
                'manufacturer' => 'BYD',
                'model' => '220P6C-27',
            ),
            54 => 
            array (
                'id' => 555,
                'asset_type_id' => 5,
                'name' => 'BYD 220P6C-30',
                'manufacturer' => 'BYD',
                'model' => '220P6C-30',
            ),
            55 => 
            array (
                'id' => 556,
                'asset_type_id' => 5,
                'name' => 'BYD 225P6C-24',
                'manufacturer' => 'BYD',
                'model' => '225P6C-24',
            ),
            56 => 
            array (
                'id' => 557,
                'asset_type_id' => 5,
                'name' => 'BYD 225P6C-27',
                'manufacturer' => 'BYD',
                'model' => '225P6C-27',
            ),
            57 => 
            array (
                'id' => 558,
                'asset_type_id' => 5,
                'name' => 'BYD 225P6C-30',
                'manufacturer' => 'BYD',
                'model' => '225P6C-30',
            ),
            58 => 
            array (
                'id' => 559,
                'asset_type_id' => 5,
                'name' => 'BYD 230P6C-27',
                'manufacturer' => 'BYD',
                'model' => '230P6C-27',
            ),
            59 => 
            array (
                'id' => 560,
                'asset_type_id' => 5,
                'name' => 'BYD 230P6C-30',
                'manufacturer' => 'BYD',
                'model' => '230P6C-30',
            ),
            60 => 
            array (
                'id' => 561,
                'asset_type_id' => 5,
                'name' => 'BYD 235P6C-27',
                'manufacturer' => 'BYD',
                'model' => '235P6C-27',
            ),
            61 => 
            array (
                'id' => 562,
                'asset_type_id' => 5,
                'name' => 'BYD 235P6C-30',
                'manufacturer' => 'BYD',
                'model' => '235P6C-30',
            ),
            62 => 
            array (
                'id' => 563,
                'asset_type_id' => 5,
                'name' => 'BYD 240P6C-27',
                'manufacturer' => 'BYD',
                'model' => '240P6C-27',
            ),
            63 => 
            array (
                'id' => 564,
                'asset_type_id' => 5,
                'name' => 'BYD 240P6C-30',
                'manufacturer' => 'BYD',
                'model' => '240P6C-30',
            ),
            64 => 
            array (
                'id' => 565,
                'asset_type_id' => 5,
                'name' => 'BYD 240P6C-36',
                'manufacturer' => 'BYD',
                'model' => '240P6C-36',
            ),
            65 => 
            array (
                'id' => 566,
                'asset_type_id' => 5,
                'name' => 'BYD 245P6C-27',
                'manufacturer' => 'BYD',
                'model' => '245P6C-27',
            ),
            66 => 
            array (
                'id' => 567,
                'asset_type_id' => 5,
                'name' => 'BYD 245P6C-30',
                'manufacturer' => 'BYD',
                'model' => '245P6C-30',
            ),
            67 => 
            array (
                'id' => 568,
                'asset_type_id' => 5,
                'name' => 'BYD 245P6C-36',
                'manufacturer' => 'BYD',
                'model' => '245P6C-36',
            ),
            68 => 
            array (
                'id' => 569,
                'asset_type_id' => 5,
                'name' => 'BYD 250P6C-27',
                'manufacturer' => 'BYD',
                'model' => '250P6C-27',
            ),
            69 => 
            array (
                'id' => 570,
                'asset_type_id' => 5,
                'name' => 'BYD 250P6C-30',
                'manufacturer' => 'BYD',
                'model' => '250P6C-30',
            ),
            70 => 
            array (
                'id' => 571,
                'asset_type_id' => 5,
                'name' => 'BYD 250P6C-36',
                'manufacturer' => 'BYD',
                'model' => '250P6C-36',
            ),
            71 => 
            array (
                'id' => 572,
                'asset_type_id' => 5,
                'name' => 'BYD 255P6C-27',
                'manufacturer' => 'BYD',
                'model' => '255P6C-27',
            ),
            72 => 
            array (
                'id' => 573,
                'asset_type_id' => 5,
                'name' => 'BYD 255P6C-30',
                'manufacturer' => 'BYD',
                'model' => '255P6C-30',
            ),
            73 => 
            array (
                'id' => 574,
                'asset_type_id' => 5,
                'name' => 'BYD 255P6C-36',
                'manufacturer' => 'BYD',
                'model' => '255P6C-36',
            ),
            74 => 
            array (
                'id' => 575,
                'asset_type_id' => 5,
                'name' => 'BYD 260P6C-30',
                'manufacturer' => 'BYD',
                'model' => '260P6C-30',
            ),
            75 => 
            array (
                'id' => 576,
                'asset_type_id' => 5,
                'name' => 'BYD 260P6C-36',
                'manufacturer' => 'BYD',
                'model' => '260P6C-36',
            ),
            76 => 
            array (
                'id' => 577,
                'asset_type_id' => 5,
                'name' => 'BYD 265P6C-30',
                'manufacturer' => 'BYD',
                'model' => '265P6C-30',
            ),
            77 => 
            array (
                'id' => 578,
                'asset_type_id' => 5,
                'name' => 'BYD 265P6C-36',
                'manufacturer' => 'BYD',
                'model' => '265P6C-36',
            ),
            78 => 
            array (
                'id' => 579,
                'asset_type_id' => 5,
                'name' => 'BYD 270P6C-30',
                'manufacturer' => 'BYD',
                'model' => '270P6C-30',
            ),
            79 => 
            array (
                'id' => 580,
                'asset_type_id' => 5,
                'name' => 'BYD 270P6C-36',
                'manufacturer' => 'BYD',
                'model' => '270P6C-36',
            ),
            80 => 
            array (
                'id' => 581,
                'asset_type_id' => 5,
                'name' => 'BYD 275P6C-30',
                'manufacturer' => 'BYD',
                'model' => '275P6C-30',
            ),
            81 => 
            array (
                'id' => 582,
                'asset_type_id' => 5,
                'name' => 'BYD 275P6C-36',
                'manufacturer' => 'BYD',
                'model' => '275P6C-36',
            ),
            82 => 
            array (
                'id' => 583,
                'asset_type_id' => 5,
                'name' => 'BYD 280P6C-30',
                'manufacturer' => 'BYD',
                'model' => '280P6C-30',
            ),
            83 => 
            array (
                'id' => 584,
                'asset_type_id' => 5,
                'name' => 'BYD 280P6C-36',
                'manufacturer' => 'BYD',
                'model' => '280P6C-36',
            ),
            84 => 
            array (
                'id' => 585,
                'asset_type_id' => 5,
                'name' => 'BYD 285P6C-36',
                'manufacturer' => 'BYD',
                'model' => '285P6C-36',
            ),
            85 => 
            array (
                'id' => 586,
                'asset_type_id' => 5,
                'name' => 'BYD 290P6C-36',
                'manufacturer' => 'BYD',
                'model' => '290P6C-36',
            ),
            86 => 
            array (
                'id' => 587,
                'asset_type_id' => 5,
                'name' => 'BYD 295P6C-36',
                'manufacturer' => 'BYD',
                'model' => '295P6C-36',
            ),
            87 => 
            array (
                'id' => 588,
                'asset_type_id' => 5,
                'name' => 'BYD 300P6C-36',
                'manufacturer' => 'BYD',
                'model' => '300P6C-36',
            ),
            88 => 
            array (
                'id' => 589,
                'asset_type_id' => 5,
                'name' => 'BYD 305P6C-36',
                'manufacturer' => 'BYD',
                'model' => '305P6C-36',
            ),
            89 => 
            array (
                'id' => 590,
                'asset_type_id' => 5,
                'name' => 'BYD 310P6C-36',
                'manufacturer' => 'BYD',
                'model' => '310P6C-36',
            ),
            90 => 
            array (
                'id' => 591,
                'asset_type_id' => 5,
                'name' => 'BYD 315P6C-36',
                'manufacturer' => 'BYD',
                'model' => '315P6C-36',
            ),
            91 => 
            array (
                'id' => 592,
                'asset_type_id' => 5,
                'name' => 'BYD 320P6C-36',
                'manufacturer' => 'BYD',
                'model' => '320P6C-36',
            ),
            92 => 
            array (
                'id' => 593,
                'asset_type_id' => 5,
                'name' => 'BYD 325P6C-36',
                'manufacturer' => 'BYD',
                'model' => '325P6C-36',
            ),
            93 => 
            array (
                'id' => 594,
                'asset_type_id' => 5,
                'name' => 'BYD 330P6C-36',
                'manufacturer' => 'BYD',
                'model' => '330P6C-36',
            ),
            94 => 
            array (
                'id' => 595,
                'asset_type_id' => 5,
                'name' => 'BYD 335P6C-36',
                'manufacturer' => 'BYD',
                'model' => '335P6C-36',
            ),
            95 => 
            array (
                'id' => 596,
                'asset_type_id' => 5,
                'name' => 'BYD 340P6C-36',
                'manufacturer' => 'BYD',
                'model' => '340P6C-36',
            ),
            96 => 
            array (
                'id' => 597,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS5A-M',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS5A-M',
            ),
            97 => 
            array (
                'id' => 598,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS5A-MF (SunTuile)',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS5A-MF (SunTuile)',
            ),
            98 => 
            array (
                'id' => 599,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS5A-MX (NewEdge)',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS5A-MX (NewEdge)',
            ),
            99 => 
            array (
                'id' => 600,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS5A-P',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS5A-P',
            ),
            100 => 
            array (
                'id' => 601,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS5AH-M',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS5AH-M',
            ),
            101 => 
            array (
                'id' => 602,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS5P-M',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS5P-M',
            ),
            102 => 
            array (
                'id' => 603,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS5P-P',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS5P-P',
            ),
            103 => 
            array (
                'id' => 604,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS5T-M',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS5T-M',
            ),
            104 => 
            array (
                'id' => 605,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6A-M',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6A-M',
            ),
            105 => 
            array (
                'id' => 606,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6A-MM (ELPS)',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6A-MM (ELPS)',
            ),
            106 => 
            array (
                'id' => 607,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6A-P',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6A-P',
            ),
            107 => 
            array (
                'id' => 608,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6A-PE',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6A-PE',
            ),
            108 => 
            array (
                'id' => 609,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6A-PF (SunTuile)',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6A-PF (SunTuile)',
            ),
            109 => 
            array (
                'id' => 610,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6A-PM (ELPS)',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6A-PM (ELPS)',
            ),
            110 => 
            array (
                'id' => 611,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6A-PX (NewEdge)',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6A-PX (NewEdge)',
            ),
            111 => 
            array (
                'id' => 612,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6C-M',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6C-M',
            ),
            112 => 
            array (
                'id' => 613,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6C-P',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6C-P',
            ),
            113 => 
            array (
                'id' => 614,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-260P-FG',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-260P-FG',
            ),
            114 => 
            array (
                'id' => 615,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-265M',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-265M',
            ),
            115 => 
            array (
                'id' => 616,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-265P-FG',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-265P-FG',
            ),
            116 => 
            array (
                'id' => 617,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-270M',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-270M',
            ),
            117 => 
            array (
                'id' => 618,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-M 270W All Black',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-M 270W All Black',
            ),
            118 => 
            array (
                'id' => 619,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-M 275W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-M 275W',
            ),
            119 => 
            array (
                'id' => 620,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-M 275W 1500V',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-M 275W 1500V',
            ),
            120 => 
            array (
                'id' => 621,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-M 275W All Black',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-M 275W All Black',
            ),
            121 => 
            array (
                'id' => 622,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-M 280W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-M 280W',
            ),
            122 => 
            array (
                'id' => 623,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-M 280W 1500V',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-M 280W 1500V',
            ),
            123 => 
            array (
                'id' => 624,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-M 280W All Black',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-M 280W All Black',
            ),
            124 => 
            array (
                'id' => 625,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-M 285W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-M 285W',
            ),
            125 => 
            array (
                'id' => 626,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-M 285W 1500V',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-M 285W 1500V',
            ),
            126 => 
            array (
                'id' => 627,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-M-FG 275W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-M-FG 275W',
            ),
            127 => 
            array (
                'id' => 628,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-M-FG 280W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-M-FG 280W',
            ),
            128 => 
            array (
                'id' => 629,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-M-FG 285W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-M-FG 285W',
            ),
            129 => 
            array (
                'id' => 630,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6K-MS (SuperPower) 285W All Black',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6K-MS (SuperPower) 285W All Black',
            ),
            130 => 
            array (
                'id' => 631,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6K-MS (SuperPower) 290W',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6K-MS (SuperPower) 290W',
            ),
            131 => 
            array (
                'id' => 632,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6K-MS (SuperPower) 290W All Black',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6K-MS (SuperPower) 290W All Black',
            ),
            132 => 
            array (
                'id' => 633,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6K-MS (SuperPower) 295W',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6K-MS (SuperPower) 295W',
            ),
            133 => 
            array (
                'id' => 634,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6K-MS (SuperPower) 295W All Black',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6K-MS (SuperPower) 295W All Black',
            ),
            134 => 
            array (
                'id' => 635,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6K-MS (SuperPower) 300W',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6K-MS (SuperPower) 300W',
            ),
            135 => 
            array (
                'id' => 636,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-P 260W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-P 260W',
            ),
            136 => 
            array (
                'id' => 637,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-P 265W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-P 265W',
            ),
            137 => 
            array (
                'id' => 638,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-P 265W 1500V',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-P 265W 1500V',
            ),
            138 => 
            array (
                'id' => 639,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-P 270W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-P 270W',
            ),
            139 => 
            array (
                'id' => 640,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-P 270W 1500V',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-P 270W 1500V',
            ),
            140 => 
            array (
                'id' => 641,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-P 275W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-P 275W',
            ),
            141 => 
            array (
                'id' => 642,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-P 275W 1500V',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-P 275W 1500V',
            ),
            142 => 
            array (
                'id' => 643,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-P-FG 260W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-P-FG 260W',
            ),
            143 => 
            array (
                'id' => 644,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-P-FG 265W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-P-FG 265W',
            ),
            144 => 
            array (
                'id' => 645,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-P-FG 270W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-P-FG 270W',
            ),
            145 => 
            array (
                'id' => 646,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6K-P-FG 275W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6K-P-FG 275W',
            ),
            146 => 
            array (
                'id' => 647,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6K-P-SD (Smart Module)',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6K-P-SD (Smart Module)',
            ),
            147 => 
            array (
                'id' => 648,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6P-255P',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6P-255P',
            ),
            148 => 
            array (
                'id' => 649,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6P-260M',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6P-260M',
            ),
            149 => 
            array (
                'id' => 650,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6P-260P',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6P-260P',
            ),
            150 => 
            array (
                'id' => 651,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6P-265M',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6P-265M',
            ),
            151 => 
            array (
                'id' => 652,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6P-265P',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6P-265P',
            ),
            152 => 
            array (
                'id' => 653,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6P-M',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6P-M',
            ),
            153 => 
            array (
                'id' => 654,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6P-M (ELPS)',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6P-M (ELPS)',
            ),
            154 => 
            array (
                'id' => 655,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6P-MX (NewEdge)',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6P-MX (NewEdge)',
            ),
            155 => 
            array (
                'id' => 656,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6P-P 260W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6P-P 260W',
            ),
            156 => 
            array (
                'id' => 657,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6P-P 265W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6P-P 265W',
            ),
            157 => 
            array (
                'id' => 658,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6P-P 270W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6P-P 270W',
            ),
            158 => 
            array (
                'id' => 659,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6P-P-SD (Smart Module)',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6P-P-SD (Smart Module)',
            ),
            159 => 
            array (
                'id' => 660,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6P-PE',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6P-PE',
            ),
            160 => 
            array (
                'id' => 661,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6P-PM (ELPX)',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6P-PM (ELPX)',
            ),
            161 => 
            array (
                'id' => 662,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6P-PN',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6P-PN',
            ),
            162 => 
            array (
                'id' => 663,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6P-PT',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6P-PT',
            ),
            163 => 
            array (
                'id' => 664,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6P-PX (NewEdge)',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6P-PX (NewEdge)',
            ),
            164 => 
            array (
                'id' => 665,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6U-M (MaxPower) 325W',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6U-M (MaxPower) 325W',
            ),
            165 => 
            array (
                'id' => 666,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6U-M (MaxPower) 325W 1500V',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6U-M (MaxPower) 325W 1500V',
            ),
            166 => 
            array (
                'id' => 667,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6U-M (MaxPower) 330W',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6U-M (MaxPower) 330W',
            ),
            167 => 
            array (
                'id' => 668,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6U-M (MaxPower) 330W 1500V',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6U-M (MaxPower) 330W 1500V',
            ),
            168 => 
            array (
                'id' => 669,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6U-M (MaxPower) 335W',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6U-M (MaxPower) 335W',
            ),
            169 => 
            array (
                'id' => 670,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6U-M (MaxPower) 335W 1500V',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6U-M (MaxPower) 335W 1500V',
            ),
            170 => 
            array (
                'id' => 671,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6U-M (MaxPower) 340W',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6U-M (MaxPower) 340W',
            ),
            171 => 
            array (
                'id' => 672,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6U-M (MaxPower) 340W 1500V',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6U-M (MaxPower) 340W 1500V',
            ),
            172 => 
            array (
                'id' => 673,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6U-P (MaxPower) 315W',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6U-P (MaxPower) 315W',
            ),
            173 => 
            array (
                'id' => 674,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6U-P (MaxPower) 315W 1500V',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6U-P (MaxPower) 315W 1500V',
            ),
            174 => 
            array (
                'id' => 675,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6U-P (MaxPower) 320W',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6U-P (MaxPower) 320W',
            ),
            175 => 
            array (
                'id' => 676,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6U-P (MaxPower) 320W 1500V',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6U-P (MaxPower) 320W 1500V',
            ),
            176 => 
            array (
                'id' => 677,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6U-P (MaxPower) 325W',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6U-P (MaxPower) 325W',
            ),
            177 => 
            array (
                'id' => 678,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6U-P (MaxPower) 325W 1500V',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6U-P (MaxPower) 325W 1500V',
            ),
            178 => 
            array (
                'id' => 679,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6U-P (MaxPower) 330W',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6U-P (MaxPower) 330W',
            ),
            179 => 
            array (
                'id' => 680,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6U-P (MaxPower) 330W 1500V',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6U-P (MaxPower) 330W 1500V',
            ),
            180 => 
            array (
                'id' => 681,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6V-210P',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6V-210P',
            ),
            181 => 
            array (
                'id' => 682,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6V-215P',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6V-215P',
            ),
            182 => 
            array (
                'id' => 683,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6V-220M',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6V-220M',
            ),
            183 => 
            array (
                'id' => 684,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6V-225M',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6V-225M',
            ),
            184 => 
            array (
                'id' => 685,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6V-MM (ELPS)',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6V-MM (ELPS)',
            ),
            185 => 
            array (
                'id' => 686,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6V-MS',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6V-MS',
            ),
            186 => 
            array (
                'id' => 687,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6V-P',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6V-P',
            ),
            187 => 
            array (
                'id' => 688,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6VH-M',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6VH-M',
            ),
            188 => 
            array (
                'id' => 689,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6VH-MM (ELPS)',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6VH-MM (ELPS)',
            ),
            189 => 
            array (
                'id' => 690,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6VH-P',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6VH-P',
            ),
            190 => 
            array (
                'id' => 691,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6X-300M',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6X-300M',
            ),
            191 => 
            array (
                'id' => 692,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6X-305M',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6X-305M',
            ),
            192 => 
            array (
                'id' => 693,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6X-310P',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6X-310P',
            ),
            193 => 
            array (
                'id' => 694,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6X-315P',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6X-315P',
            ),
            194 => 
            array (
                'id' => 695,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6X-320P',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6X-320P',
            ),
            195 => 
            array (
                'id' => 696,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6X-M-FG 330W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6X-M-FG 330W',
            ),
            196 => 
            array (
                'id' => 697,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6X-M-FG 335W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6X-M-FG 335W',
            ),
            197 => 
            array (
                'id' => 698,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6X-M-FG 340W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6X-M-FG 340W',
            ),
            198 => 
            array (
                'id' => 699,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6X-P (MaxPower) 310W',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6X-P (MaxPower) 310W',
            ),
            199 => 
            array (
                'id' => 700,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6X-P (MaxPower) 315W',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6X-P (MaxPower) 315W',
            ),
            200 => 
            array (
                'id' => 701,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6X-P (MaxPower) 320W',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6X-P (MaxPower) 320W',
            ),
            201 => 
            array (
                'id' => 702,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6X-P (MaxPower) 325W',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6X-P (MaxPower) 325W',
            ),
            202 => 
            array (
                'id' => 703,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6X-P-FG 315W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6X-P-FG 315W',
            ),
            203 => 
            array (
                'id' => 704,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6X-P-FG 320W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6X-P-FG 320W',
            ),
            204 => 
            array (
                'id' => 705,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6X-P-FG 325W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6X-P-FG 325W',
            ),
            205 => 
            array (
                'id' => 706,
                'asset_type_id' => 5,
                'name' => 'Canadian Solar CS6X-P-FG 330W',
                'manufacturer' => 'Canadian Solar',
                'model' => 'CS6X-P-FG 330W',
            ),
            206 => 
            array (
                'id' => 707,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6X-PM (ELPS)',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6X-PM (ELPS)',
            ),
            207 => 
            array (
                'id' => 708,
                'asset_type_id' => 5,
            'name' => 'Canadian Solar CS6X-PX (NewEdge)',
                'manufacturer' => 'Canadian Solar',
            'model' => 'CS6X-PX (NewEdge)',
            ),
            208 => 
            array (
                'id' => 709,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN245-60M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN245-60M',
            ),
            209 => 
            array (
                'id' => 710,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN245-60P-BB',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN245-60P-BB',
            ),
            210 => 
            array (
                'id' => 711,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN245-60P-DG',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN245-60P-DG',
            ),
            211 => 
            array (
                'id' => 712,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN250-60M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN250-60M',
            ),
            212 => 
            array (
                'id' => 713,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN250-60P-DG',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN250-60P-DG',
            ),
            213 => 
            array (
                'id' => 714,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN250-60P-MM',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN250-60P-MM',
            ),
            214 => 
            array (
                'id' => 715,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN250-60P-SMART',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN250-60P-SMART',
            ),
            215 => 
            array (
                'id' => 716,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN255-60M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN255-60M',
            ),
            216 => 
            array (
                'id' => 717,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN255-60M-BB',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN255-60M-BB',
            ),
            217 => 
            array (
                'id' => 718,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN255-60M-DG',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN255-60M-DG',
            ),
            218 => 
            array (
                'id' => 719,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN255-60P',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN255-60P',
            ),
            219 => 
            array (
                'id' => 720,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN255-60P-DG',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN255-60P-DG',
            ),
            220 => 
            array (
                'id' => 721,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN255-60P-MM',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN255-60P-MM',
            ),
            221 => 
            array (
                'id' => 722,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN255-60P-SMART',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN255-60P-SMART',
            ),
            222 => 
            array (
                'id' => 723,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN255-60P-WARATAH',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN255-60P-WARATAH',
            ),
            223 => 
            array (
                'id' => 724,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN257-60P',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN257-60P',
            ),
            224 => 
            array (
                'id' => 725,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN260-60M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN260-60M',
            ),
            225 => 
            array (
                'id' => 726,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN260-60M-BB',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN260-60M-BB',
            ),
            226 => 
            array (
                'id' => 727,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN260-60M-DG',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN260-60M-DG',
            ),
            227 => 
            array (
                'id' => 728,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN260-60P',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN260-60P',
            ),
            228 => 
            array (
                'id' => 729,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN260-60P-DG',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN260-60P-DG',
            ),
            229 => 
            array (
                'id' => 730,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN260-60P-MM',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN260-60P-MM',
            ),
            230 => 
            array (
                'id' => 731,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN260-60P-SMART',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN260-60P-SMART',
            ),
            231 => 
            array (
                'id' => 732,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN260-60P-WARATAH',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN260-60P-WARATAH',
            ),
            232 => 
            array (
                'id' => 733,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN265-60M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN265-60M',
            ),
            233 => 
            array (
                'id' => 734,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN265-60M-BB',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN265-60M-BB',
            ),
            234 => 
            array (
                'id' => 735,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN265-60M-DG',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN265-60M-DG',
            ),
            235 => 
            array (
                'id' => 736,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN265-60M-QSAR',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN265-60M-QSAR',
            ),
            236 => 
            array (
                'id' => 737,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN265-60M-SMART',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN265-60M-SMART',
            ),
            237 => 
            array (
                'id' => 738,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN265-60P',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN265-60P',
            ),
            238 => 
            array (
                'id' => 739,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN265-60P-DG',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN265-60P-DG',
            ),
            239 => 
            array (
                'id' => 740,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN265-60P-SMART',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN265-60P-SMART',
            ),
            240 => 
            array (
                'id' => 741,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN265-60P-WARATAH',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN265-60P-WARATAH',
            ),
            241 => 
            array (
                'id' => 742,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN270-60M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN270-60M',
            ),
            242 => 
            array (
                'id' => 743,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN270-60M-BB',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN270-60M-BB',
            ),
            243 => 
            array (
                'id' => 744,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN270-60M-DG',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN270-60M-DG',
            ),
            244 => 
            array (
                'id' => 745,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN270-60M-QSAR',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN270-60M-QSAR',
            ),
            245 => 
            array (
                'id' => 746,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN270-60M-SMART',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN270-60M-SMART',
            ),
            246 => 
            array (
                'id' => 747,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN270-60P',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN270-60P',
            ),
            247 => 
            array (
                'id' => 748,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN275-60M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN275-60M',
            ),
            248 => 
            array (
                'id' => 749,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN275-60M-QSAR',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN275-60M-QSAR',
            ),
            249 => 
            array (
                'id' => 750,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN275-60M-SMART',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN275-60M-SMART',
            ),
            250 => 
            array (
                'id' => 751,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN280-60M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN280-60M',
            ),
            251 => 
            array (
                'id' => 752,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN280-60M-BW',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN280-60M-BW',
            ),
            252 => 
            array (
                'id' => 753,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN280-60M-SMART',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN280-60M-SMART',
            ),
            253 => 
            array (
                'id' => 754,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN280-60P',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN280-60P',
            ),
            254 => 
            array (
                'id' => 755,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN285-60M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN285-60M',
            ),
            255 => 
            array (
                'id' => 756,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN285-60M-BW',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN285-60M-BW',
            ),
            256 => 
            array (
                'id' => 757,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN285-60P',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN285-60P',
            ),
            257 => 
            array (
                'id' => 758,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN290-120P',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN290-120P',
            ),
            258 => 
            array (
                'id' => 759,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN290-60M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN290-60M',
            ),
            259 => 
            array (
                'id' => 760,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN290-60M-BW',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN290-60M-BW',
            ),
            260 => 
            array (
                'id' => 761,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN290-72P',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN290-72P',
            ),
            261 => 
            array (
                'id' => 762,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN295-72P',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN295-72P',
            ),
            262 => 
            array (
                'id' => 763,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN300-72P',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN300-72P',
            ),
            263 => 
            array (
                'id' => 764,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN305-72P',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN305-72P',
            ),
            264 => 
            array (
                'id' => 765,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN305-72P-WARATAH',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN305-72P-WARATAH',
            ),
            265 => 
            array (
                'id' => 766,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN310-72P',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN310-72P',
            ),
            266 => 
            array (
                'id' => 767,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN310-72P-WARATAH',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN310-72P-WARATAH',
            ),
            267 => 
            array (
                'id' => 768,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN315-72M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN315-72M',
            ),
            268 => 
            array (
                'id' => 769,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN315-72M-QSAR',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN315-72M-QSAR',
            ),
            269 => 
            array (
                'id' => 770,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN315-72P',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN315-72P',
            ),
            270 => 
            array (
                'id' => 771,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN315-72P-WARATAH',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN315-72P-WARATAH',
            ),
            271 => 
            array (
                'id' => 772,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN320-72M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN320-72M',
            ),
            272 => 
            array (
                'id' => 773,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN320-72M-QSAR',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN320-72M-QSAR',
            ),
            273 => 
            array (
                'id' => 774,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN320-72P',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN320-72P',
            ),
            274 => 
            array (
                'id' => 775,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN325-72M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN325-72M',
            ),
            275 => 
            array (
                'id' => 776,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN325-72M-QSAR',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN325-72M-QSAR',
            ),
            276 => 
            array (
                'id' => 777,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN330-72M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN330-72M',
            ),
            277 => 
            array (
                'id' => 778,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN330-72M-DG',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN330-72M-DG',
            ),
            278 => 
            array (
                'id' => 779,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN335-72M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN335-72M',
            ),
            279 => 
            array (
                'id' => 780,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN335-72M-DG',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN335-72M-DG',
            ),
            280 => 
            array (
                'id' => 781,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN340-72M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN340-72M',
            ),
            281 => 
            array (
                'id' => 782,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN340-72M-DG',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN340-72M-DG',
            ),
            282 => 
            array (
                'id' => 783,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN340-72M-SMART',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN340-72M-SMART',
            ),
            283 => 
            array (
                'id' => 784,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN345-72M',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN345-72M',
            ),
            284 => 
            array (
                'id' => 785,
                'asset_type_id' => 5,
                'name' => 'CSUN CSUN345-72M-DG',
                'manufacturer' => 'CSUN',
                'model' => 'CSUN345-72M-DG',
            ),
            285 => 
            array (
                'id' => 786,
                'asset_type_id' => 5,
                'name' => 'CSUN VSUN145-36P',
                'manufacturer' => 'CSUN',
                'model' => 'VSUN145-36P',
            ),
            286 => 
            array (
                'id' => 787,
                'asset_type_id' => 5,
                'name' => 'CSUN VSUN150-36P',
                'manufacturer' => 'CSUN',
                'model' => 'VSUN150-36P',
            ),
            287 => 
            array (
                'id' => 788,
                'asset_type_id' => 5,
                'name' => 'CSUN VSUN155-36P',
                'manufacturer' => 'CSUN',
                'model' => 'VSUN155-36P',
            ),
            288 => 
            array (
                'id' => 789,
                'asset_type_id' => 5,
                'name' => 'CSUN VSUN160-36P',
                'manufacturer' => 'CSUN',
                'model' => 'VSUN160-36P',
            ),
            289 => 
            array (
                'id' => 790,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M648BB 210W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M648BB 210W',
            ),
            290 => 
            array (
                'id' => 791,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M648BB 215W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M648BB 215W',
            ),
            291 => 
            array (
                'id' => 792,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M648BB 220W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M648BB 220W',
            ),
            292 => 
            array (
                'id' => 793,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M648BB 225W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M648BB 225W',
            ),
            293 => 
            array (
                'id' => 794,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M660BB 265W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M660BB 265W',
            ),
            294 => 
            array (
                'id' => 795,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M660BB 270W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M660BB 270W',
            ),
            295 => 
            array (
                'id' => 796,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M660BB 275W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M660BB 275W',
            ),
            296 => 
            array (
                'id' => 797,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M660BB 280W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M660BB 280W',
            ),
            297 => 
            array (
                'id' => 798,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M660BB 285W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M660BB 285W',
            ),
            298 => 
            array (
                'id' => 799,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M672BB 320W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M672BB 320W',
            ),
            299 => 
            array (
                'id' => 800,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M672BB 325W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M672BB 325W',
            ),
            300 => 
            array (
                'id' => 801,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M672BB 330W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M672BB 330W',
            ),
            301 => 
            array (
                'id' => 802,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M672BB 335W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M672BB 335W',
            ),
            302 => 
            array (
                'id' => 803,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M672BB 340W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M672BB 340W',
            ),
            303 => 
            array (
                'id' => 804,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P660BB 265W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P660BB 265W',
            ),
            304 => 
            array (
                'id' => 805,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672BB 310W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672BB 310W',
            ),
            305 => 
            array (
                'id' => 806,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672BB 315W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672BB 315W',
            ),
            306 => 
            array (
                'id' => 807,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672BB 320W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672BB 320W',
            ),
            307 => 
            array (
                'id' => 808,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M648WW 215W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M648WW 215W',
            ),
            308 => 
            array (
                'id' => 809,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M648WW 220W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M648WW 220W',
            ),
            309 => 
            array (
                'id' => 810,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M648WW 225W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M648WW 225W',
            ),
            310 => 
            array (
                'id' => 811,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M648WW 230W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M648WW 230W',
            ),
            311 => 
            array (
                'id' => 812,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M660WW 270W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M660WW 270W',
            ),
            312 => 
            array (
                'id' => 813,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M660WW 275W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M660WW 275W',
            ),
            313 => 
            array (
                'id' => 814,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M660WW 280W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M660WW 280W',
            ),
            314 => 
            array (
                'id' => 815,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M660WW 285W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M660WW 285W',
            ),
            315 => 
            array (
                'id' => 816,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M660WW 290W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M660WW 290W',
            ),
            316 => 
            array (
                'id' => 817,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M672WW 325W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M672WW 325W',
            ),
            317 => 
            array (
                'id' => 818,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M672WW 330W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M672WW 330W',
            ),
            318 => 
            array (
                'id' => 819,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M672WW 335W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M672WW 335W',
            ),
            319 => 
            array (
                'id' => 820,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M672WW 340W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M672WW 340W',
            ),
            320 => 
            array (
                'id' => 821,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M672WW 345W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M672WW 345W',
            ),
            321 => 
            array (
                'id' => 822,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P648WW 205W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P648WW 205W',
            ),
            322 => 
            array (
                'id' => 823,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P648WW 210W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P648WW 210W',
            ),
            323 => 
            array (
                'id' => 824,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P648WW 215W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P648WW 215W',
            ),
            324 => 
            array (
                'id' => 825,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P660WW 270W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P660WW 270W',
            ),
            325 => 
            array (
                'id' => 826,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672WW 320W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672WW 320W',
            ),
            326 => 
            array (
                'id' => 827,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672WW 325W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672WW 325W',
            ),
            327 => 
            array (
                'id' => 828,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET Double-Glass 255W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET Double-Glass 255W',
            ),
            328 => 
            array (
                'id' => 829,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET Double-Glass 260W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET Double-Glass 260W',
            ),
            329 => 
            array (
                'id' => 830,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET Double-Glass 265W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET Double-Glass 265W',
            ),
            330 => 
            array (
                'id' => 831,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M572BB 195W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M572BB 195W',
            ),
            331 => 
            array (
                'id' => 832,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M572BB 200W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M572BB 200W',
            ),
            332 => 
            array (
                'id' => 833,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M572WW 200W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M572WW 200W',
            ),
            333 => 
            array (
                'id' => 834,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-M572WW 205W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-M572WW 205W',
            ),
            334 => 
            array (
                'id' => 835,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P648WW 195W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P648WW 195W',
            ),
            335 => 
            array (
                'id' => 836,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P648WW 200W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P648WW 200W',
            ),
            336 => 
            array (
                'id' => 837,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P660BB 235W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P660BB 235W',
            ),
            337 => 
            array (
                'id' => 838,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P660BB 245W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P660BB 245W',
            ),
            338 => 
            array (
                'id' => 839,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P660BB 250W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P660BB 250W',
            ),
            339 => 
            array (
                'id' => 840,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P660WB 250W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P660WB 250W',
            ),
            340 => 
            array (
                'id' => 841,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P660WW 250W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P660WW 250W',
            ),
            341 => 
            array (
                'id' => 842,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P660BB 255W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P660BB 255W',
            ),
            342 => 
            array (
                'id' => 843,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P660WB 255W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P660WB 255W',
            ),
            343 => 
            array (
                'id' => 844,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P660WW 255W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P660WW 255W',
            ),
            344 => 
            array (
                'id' => 845,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P660BB 260W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P660BB 260W',
            ),
            345 => 
            array (
                'id' => 846,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P660WB 260W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P660WB 260W',
            ),
            346 => 
            array (
                'id' => 847,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P660WW 260W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P660WW 260W',
            ),
            347 => 
            array (
                'id' => 848,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P660WB 265W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P660WB 265W',
            ),
            348 => 
            array (
                'id' => 849,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P660WW 265W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P660WW 265W',
            ),
            349 => 
            array (
                'id' => 850,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672BB 290W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672BB 290W',
            ),
            350 => 
            array (
                'id' => 851,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672BB 295W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672BB 295W',
            ),
            351 => 
            array (
                'id' => 852,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672BB 300W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672BB 300W',
            ),
            352 => 
            array (
                'id' => 853,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672WB 300W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672WB 300W',
            ),
            353 => 
            array (
                'id' => 854,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672WW 300W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672WW 300W',
            ),
            354 => 
            array (
                'id' => 855,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672BB 305W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672BB 305W',
            ),
            355 => 
            array (
                'id' => 856,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672WB 305W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672WB 305W',
            ),
            356 => 
            array (
                'id' => 857,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672WW 305W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672WW 305W',
            ),
            357 => 
            array (
                'id' => 858,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672WB 310W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672WB 310W',
            ),
            358 => 
            array (
                'id' => 859,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672WW 310W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672WW 310W',
            ),
            359 => 
            array (
                'id' => 860,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672WB 315W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672WB 315W',
            ),
            360 => 
            array (
                'id' => 861,
                'asset_type_id' => 5,
                'name' => 'ET Solar ET-P672WW 315W',
                'manufacturer' => 'ET Solar',
                'model' => 'ET-P672WW 315W',
            ),
            361 => 
            array (
                'id' => 862,
                'asset_type_id' => 5,
                'name' => 'ET Solar Smart Flex ET-P660 260-270W',
                'manufacturer' => 'ET Solar',
                'model' => 'Smart Flex ET-P660 260-270W',
            ),
            362 => 
            array (
                'id' => 863,
                'asset_type_id' => 5,
                'name' => 'ET Solar Smart Flex ET-P672 310-325W',
                'manufacturer' => 'ET Solar',
                'model' => 'Smart Flex ET-P672 310-325W',
            ),
            363 => 
            array (
                'id' => 864,
                'asset_type_id' => 5,
                'name' => 'Hanwha HSL60P6-245',
                'manufacturer' => 'Hanwha',
                'model' => 'HSL60P6-245',
            ),
            364 => 
            array (
                'id' => 865,
                'asset_type_id' => 5,
                'name' => 'Hanwha HSL60P6-250',
                'manufacturer' => 'Hanwha',
                'model' => 'HSL60P6-250',
            ),
            365 => 
            array (
                'id' => 866,
                'asset_type_id' => 5,
                'name' => 'Hanwha HSL60P6-255',
                'manufacturer' => 'Hanwha',
                'model' => 'HSL60P6-255',
            ),
            366 => 
            array (
                'id' => 867,
                'asset_type_id' => 5,
                'name' => 'Hanwha HSL60P6-260',
                'manufacturer' => 'Hanwha',
                'model' => 'HSL60P6-260',
            ),
            367 => 
            array (
                'id' => 868,
                'asset_type_id' => 5,
                'name' => 'Hanwha HSL60P6-265',
                'manufacturer' => 'Hanwha',
                'model' => 'HSL60P6-265',
            ),
            368 => 
            array (
                'id' => 869,
                'asset_type_id' => 5,
                'name' => 'Hanwha HSL60P6-270',
                'manufacturer' => 'Hanwha',
                'model' => 'HSL60P6-270',
            ),
            369 => 
            array (
                'id' => 870,
                'asset_type_id' => 5,
                'name' => 'Hanwha HSL72P6-290',
                'manufacturer' => 'Hanwha',
                'model' => 'HSL72P6-290',
            ),
            370 => 
            array (
                'id' => 871,
                'asset_type_id' => 5,
                'name' => 'Hanwha HSL72P6-295',
                'manufacturer' => 'Hanwha',
                'model' => 'HSL72P6-295',
            ),
            371 => 
            array (
                'id' => 872,
                'asset_type_id' => 5,
                'name' => 'Hanwha HSL72P6-300',
                'manufacturer' => 'Hanwha',
                'model' => 'HSL72P6-300',
            ),
            372 => 
            array (
                'id' => 873,
                'asset_type_id' => 5,
                'name' => 'Hanwha HSL72P6-305',
                'manufacturer' => 'Hanwha',
                'model' => 'HSL72P6-305',
            ),
            373 => 
            array (
                'id' => 874,
                'asset_type_id' => 5,
                'name' => 'Hanwha HSL72P6-310',
                'manufacturer' => 'Hanwha',
                'model' => 'HSL72P6-310',
            ),
            374 => 
            array (
                'id' => 875,
                'asset_type_id' => 5,
                'name' => 'Hanwha HSL72P6-315',
                'manufacturer' => 'Hanwha',
                'model' => 'HSL72P6-315',
            ),
            375 => 
            array (
                'id' => 876,
                'asset_type_id' => 5,
                'name' => 'Hanwha Q.PEAK-G4.1 295W',
                'manufacturer' => 'Hanwha',
                'model' => 'Q.PEAK-G4.1 295W',
            ),
            376 => 
            array (
                'id' => 877,
                'asset_type_id' => 5,
                'name' => 'Hanwha Q.PEAK-G4.1 300W',
                'manufacturer' => 'Hanwha',
                'model' => 'Q.PEAK-G4.1 300W',
            ),
            377 => 
            array (
                'id' => 878,
                'asset_type_id' => 5,
                'name' => 'Hanwha Q.PEAK-G4.1 305W',
                'manufacturer' => 'Hanwha',
                'model' => 'Q.PEAK-G4.1 305W',
            ),
            378 => 
            array (
                'id' => 879,
                'asset_type_id' => 5,
                'name' => 'Hanwha Q.PLUS BFR-G4.1 270W',
                'manufacturer' => 'Hanwha',
                'model' => 'Q.PLUS BFR-G4.1 270W',
            ),
            379 => 
            array (
                'id' => 880,
                'asset_type_id' => 5,
                'name' => 'Hanwha Q.PLUS BFR-G4.1 275W',
                'manufacturer' => 'Hanwha',
                'model' => 'Q.PLUS BFR-G4.1 275W',
            ),
            380 => 
            array (
                'id' => 881,
                'asset_type_id' => 5,
                'name' => 'Hanwha Q.PLUS BFR-G4.1 280W',
                'manufacturer' => 'Hanwha',
                'model' => 'Q.PLUS BFR-G4.1 280W',
            ),
            381 => 
            array (
                'id' => 882,
                'asset_type_id' => 5,
                'name' => 'Hanwha Q.PLUS L-G4.1 330W',
                'manufacturer' => 'Hanwha',
                'model' => 'Q.PLUS L-G4.1 330W',
            ),
            382 => 
            array (
                'id' => 883,
                'asset_type_id' => 5,
                'name' => 'Hanwha Q.PLUS L-G4.1 335W',
                'manufacturer' => 'Hanwha',
                'model' => 'Q.PLUS L-G4.1 335W',
            ),
            383 => 
            array (
                'id' => 884,
                'asset_type_id' => 5,
                'name' => 'Hanwha Q.PLUS L-G4.1 340W',
                'manufacturer' => 'Hanwha',
                'model' => 'Q.PLUS L-G4.1 340W',
            ),
            384 => 
            array (
                'id' => 885,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M220MF',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M220MF',
            ),
            385 => 
            array (
                'id' => 886,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M230MG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M230MG',
            ),
            386 => 
            array (
                'id' => 887,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M233MG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M233MG',
            ),
            387 => 
            array (
                'id' => 888,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M235MG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M235MG',
            ),
            388 => 
            array (
                'id' => 889,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M240MG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M240MG',
            ),
            389 => 
            array (
                'id' => 890,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M245MG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M245MG',
            ),
            390 => 
            array (
                'id' => 891,
                'asset_type_id' => 5,
            'name' => 'Hyundai Solar HiS-M245RG (BK)',
                'manufacturer' => 'Hyundai Solar',
            'model' => 'HiS-M245RG (BK)',
            ),
            391 => 
            array (
                'id' => 892,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M250MG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M250MG',
            ),
            392 => 
            array (
                'id' => 893,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M250RG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M250RG',
            ),
            393 => 
            array (
                'id' => 894,
                'asset_type_id' => 5,
            'name' => 'Hyundai Solar HiS-M250RG (BK)',
                'manufacturer' => 'Hyundai Solar',
            'model' => 'HiS-M250RG (BK)',
            ),
            394 => 
            array (
                'id' => 895,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M250TG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M250TG',
            ),
            395 => 
            array (
                'id' => 896,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M255MG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M255MG',
            ),
            396 => 
            array (
                'id' => 897,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M255RG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M255RG',
            ),
            397 => 
            array (
                'id' => 898,
                'asset_type_id' => 5,
            'name' => 'Hyundai Solar HiS-M255RG (BK)',
                'manufacturer' => 'Hyundai Solar',
            'model' => 'HiS-M255RG (BK)',
            ),
            398 => 
            array (
                'id' => 899,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M255TG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M255TG',
            ),
            399 => 
            array (
                'id' => 900,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M260MG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M260MG',
            ),
            400 => 
            array (
                'id' => 901,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M260RG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M260RG',
            ),
            401 => 
            array (
                'id' => 902,
                'asset_type_id' => 5,
            'name' => 'Hyundai Solar HiS-M260RG (BK)',
                'manufacturer' => 'Hyundai Solar',
            'model' => 'HiS-M260RG (BK)',
            ),
            402 => 
            array (
                'id' => 903,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M260TG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M260TG',
            ),
            403 => 
            array (
                'id' => 904,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M265MG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M265MG',
            ),
            404 => 
            array (
                'id' => 905,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M265RG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M265RG',
            ),
            405 => 
            array (
                'id' => 906,
                'asset_type_id' => 5,
            'name' => 'Hyundai Solar HiS-M265RG (BK)',
                'manufacturer' => 'Hyundai Solar',
            'model' => 'HiS-M265RG (BK)',
            ),
            406 => 
            array (
                'id' => 907,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M265TG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M265TG',
            ),
            407 => 
            array (
                'id' => 908,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M270RG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M270RG',
            ),
            408 => 
            array (
                'id' => 909,
                'asset_type_id' => 5,
            'name' => 'Hyundai Solar HiS-M270RG (BK)',
                'manufacturer' => 'Hyundai Solar',
            'model' => 'HiS-M270RG (BK)',
            ),
            409 => 
            array (
                'id' => 910,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M275MI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M275MI',
            ),
            410 => 
            array (
                'id' => 911,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M275RG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M275RG',
            ),
            411 => 
            array (
                'id' => 912,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M275TG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M275TG',
            ),
            412 => 
            array (
                'id' => 913,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M280MI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M280MI',
            ),
            413 => 
            array (
                'id' => 914,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M285MI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M285MI',
            ),
            414 => 
            array (
                'id' => 915,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M290MI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M290MI',
            ),
            415 => 
            array (
                'id' => 916,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M295MI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M295MI',
            ),
            416 => 
            array (
                'id' => 917,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M295RI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M295RI',
            ),
            417 => 
            array (
                'id' => 918,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M300MI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M300MI',
            ),
            418 => 
            array (
                'id' => 919,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M300RI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M300RI',
            ),
            419 => 
            array (
                'id' => 920,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M300TI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M300TI',
            ),
            420 => 
            array (
                'id' => 921,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M305MI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M305MI',
            ),
            421 => 
            array (
                'id' => 922,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M305RI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M305RI',
            ),
            422 => 
            array (
                'id' => 923,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M305TI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M305TI',
            ),
            423 => 
            array (
                'id' => 924,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M310TI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M310TI',
            ),
            424 => 
            array (
                'id' => 925,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M315TI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M315TI',
            ),
            425 => 
            array (
                'id' => 926,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M320TI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M320TI',
            ),
            426 => 
            array (
                'id' => 927,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M325TI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M325TI',
            ),
            427 => 
            array (
                'id' => 928,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-M700TG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-M700TG',
            ),
            428 => 
            array (
                'id' => 929,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S215SF',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S215SF',
            ),
            429 => 
            array (
                'id' => 930,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S220MF',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S220MF',
            ),
            430 => 
            array (
                'id' => 931,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S225MF',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S225MF',
            ),
            431 => 
            array (
                'id' => 932,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S230MF',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S230MF',
            ),
            432 => 
            array (
                'id' => 933,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S235MF',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S235MF',
            ),
            433 => 
            array (
                'id' => 934,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S240MF',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S240MF',
            ),
            434 => 
            array (
                'id' => 935,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S260RG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S260RG',
            ),
            435 => 
            array (
                'id' => 936,
                'asset_type_id' => 5,
            'name' => 'Hyundai Solar HiS-S260RG (BK)',
                'manufacturer' => 'Hyundai Solar',
            'model' => 'HiS-S260RG (BK)',
            ),
            436 => 
            array (
                'id' => 937,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S265RG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S265RG',
            ),
            437 => 
            array (
                'id' => 938,
                'asset_type_id' => 5,
            'name' => 'Hyundai Solar HiS-S265RG (BK)',
                'manufacturer' => 'Hyundai Solar',
            'model' => 'HiS-S265RG (BK)',
            ),
            438 => 
            array (
                'id' => 939,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S265TG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S265TG',
            ),
            439 => 
            array (
                'id' => 940,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S270RG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S270RG',
            ),
            440 => 
            array (
                'id' => 941,
                'asset_type_id' => 5,
            'name' => 'Hyundai Solar HiS-S270RG (BK)',
                'manufacturer' => 'Hyundai Solar',
            'model' => 'HiS-S270RG (BK)',
            ),
            441 => 
            array (
                'id' => 942,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S270TG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S270TG',
            ),
            442 => 
            array (
                'id' => 943,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S275RG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S275RG',
            ),
            443 => 
            array (
                'id' => 944,
                'asset_type_id' => 5,
            'name' => 'Hyundai Solar HiS-S275RG (BK)',
                'manufacturer' => 'Hyundai Solar',
            'model' => 'HiS-S275RG (BK)',
            ),
            444 => 
            array (
                'id' => 945,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S275TG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S275TG',
            ),
            445 => 
            array (
                'id' => 946,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S280RG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S280RG',
            ),
            446 => 
            array (
                'id' => 947,
                'asset_type_id' => 5,
            'name' => 'Hyundai Solar HiS-S280RG (BK)',
                'manufacturer' => 'Hyundai Solar',
            'model' => 'HiS-S280RG (BK)',
            ),
            447 => 
            array (
                'id' => 948,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S280TG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S280TG',
            ),
            448 => 
            array (
                'id' => 949,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S285RG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S285RG',
            ),
            449 => 
            array (
                'id' => 950,
                'asset_type_id' => 5,
            'name' => 'Hyundai Solar HiS-S285RG (BK)',
                'manufacturer' => 'Hyundai Solar',
            'model' => 'HiS-S285RG (BK)',
            ),
            450 => 
            array (
                'id' => 951,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S285TG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S285TG',
            ),
            451 => 
            array (
                'id' => 952,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S290RG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S290RG',
            ),
            452 => 
            array (
                'id' => 953,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S290TG',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S290TG',
            ),
            453 => 
            array (
                'id' => 954,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S325TI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S325TI',
            ),
            454 => 
            array (
                'id' => 955,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S330TI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S330TI',
            ),
            455 => 
            array (
                'id' => 956,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S335TI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S335TI',
            ),
            456 => 
            array (
                'id' => 957,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S340TI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S340TI',
            ),
            457 => 
            array (
                'id' => 958,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S345TI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S345TI',
            ),
            458 => 
            array (
                'id' => 959,
                'asset_type_id' => 5,
                'name' => 'Hyundai Solar HiS-S350TI',
                'manufacturer' => 'Hyundai Solar',
                'model' => 'HiS-S350TI',
            ),
            459 => 
            array (
                'id' => 960,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM195M-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM195M-72',
            ),
            460 => 
            array (
                'id' => 961,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM200M-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM200M-72',
            ),
            461 => 
            array (
                'id' => 962,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM205M-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM205M-72',
            ),
            462 => 
            array (
                'id' => 963,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM205PP-48',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM205PP-48',
            ),
            463 => 
            array (
                'id' => 964,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM205PP-48 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM205PP-48 (Plus)',
            ),
            464 => 
            array (
                'id' => 965,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM210M-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM210M-72',
            ),
            465 => 
            array (
                'id' => 966,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM210PP-48',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM210PP-48',
            ),
            466 => 
            array (
                'id' => 967,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM210PP-48 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM210PP-48 (Plus)',
            ),
            467 => 
            array (
                'id' => 968,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM215M-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM215M-72',
            ),
            468 => 
            array (
                'id' => 969,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM215PP-48',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM215PP-48',
            ),
            469 => 
            array (
                'id' => 970,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM215PP-48 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM215PP-48 (Plus)',
            ),
            470 => 
            array (
                'id' => 971,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM220M-48 PERC',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM220M-48 PERC',
            ),
            471 => 
            array (
                'id' => 972,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM220PP-48',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM220PP-48',
            ),
            472 => 
            array (
                'id' => 973,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM220PP-48 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM220PP-48 (Plus)',
            ),
            473 => 
            array (
                'id' => 974,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM225M-48 PERC',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM225M-48 PERC',
            ),
            474 => 
            array (
                'id' => 975,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM225PP-48',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM225PP-48',
            ),
            475 => 
            array (
                'id' => 976,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM225PP-48 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM225PP-48 (Plus)',
            ),
            476 => 
            array (
                'id' => 977,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM230M-48 PERC',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM230M-48 PERC',
            ),
            477 => 
            array (
                'id' => 978,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM235M-48 PERC',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM235M-48 PERC',
            ),
            478 => 
            array (
                'id' => 979,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM240M-48 PERC',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM240M-48 PERC',
            ),
            479 => 
            array (
                'id' => 980,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM245P-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM245P-60',
            ),
            480 => 
            array (
                'id' => 981,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM250P-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM250P-60',
            ),
            481 => 
            array (
                'id' => 982,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM255M-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM255M-60',
            ),
            482 => 
            array (
                'id' => 983,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM255P-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM255P-60',
            ),
            483 => 
            array (
                'id' => 984,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM255PP-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM255PP-60',
            ),
            484 => 
            array (
                'id' => 985,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM255PP-60-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM255PP-60-DV',
            ),
            485 => 
            array (
                'id' => 986,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM260M-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM260M-60',
            ),
            486 => 
            array (
                'id' => 987,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM260P-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM260P-60',
            ),
            487 => 
            array (
                'id' => 988,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM260PP-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM260PP-60',
            ),
            488 => 
            array (
                'id' => 989,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM260PP-60 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM260PP-60 (Plus)',
            ),
            489 => 
            array (
                'id' => 990,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM260PP-60-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM260PP-60-DV',
            ),
            490 => 
            array (
                'id' => 991,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM260PP-J4',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM260PP-J4',
            ),
            491 => 
            array (
                'id' => 992,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM265M-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM265M-60',
            ),
            492 => 
            array (
                'id' => 993,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM265P-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM265P-60',
            ),
            493 => 
            array (
                'id' => 994,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM265PP-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM265PP-60',
            ),
            494 => 
            array (
                'id' => 995,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM265PP-60 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM265PP-60 (Plus)',
            ),
            495 => 
            array (
                'id' => 996,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM265PP-60-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM265PP-60-DV',
            ),
            496 => 
            array (
                'id' => 997,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM265PP-J4',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM265PP-J4',
            ),
            497 => 
            array (
                'id' => 998,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM270M-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM270M-60',
            ),
            498 => 
            array (
                'id' => 999,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM270PP-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM270PP-60',
            ),
            499 => 
            array (
                'id' => 1000,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM270PP-60 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM270PP-60 (Plus)',
            ),
        ));
        \DB::table('assets')->insert(array (
            0 => 
            array (
                'id' => 1001,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM270PP-60-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM270PP-60-DV',
            ),
            1 => 
            array (
                'id' => 1002,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM270PP-J4',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM270PP-J4',
            ),
            2 => 
            array (
                'id' => 1003,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM275M-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM275M-60',
            ),
            3 => 
            array (
                'id' => 1004,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM275PP-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM275PP-60',
            ),
            4 => 
            array (
                'id' => 1005,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM275PP-60 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM275PP-60 (Plus)',
            ),
            5 => 
            array (
                'id' => 1006,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM275PP-60-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM275PP-60-DV',
            ),
            6 => 
            array (
                'id' => 1007,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM275PP-J4',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM275PP-J4',
            ),
            7 => 
            array (
                'id' => 1008,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM280M-60 PERC',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM280M-60 PERC',
            ),
            8 => 
            array (
                'id' => 1009,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM280M-60(Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM280M-60(Plus)',
            ),
            9 => 
            array (
                'id' => 1010,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM280PP-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM280PP-60',
            ),
            10 => 
            array (
                'id' => 1011,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM280PP-60 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM280PP-60 (Plus)',
            ),
            11 => 
            array (
                'id' => 1012,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM280PP-60-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM280PP-60-DV',
            ),
            12 => 
            array (
                'id' => 1013,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM280PP-J4',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM280PP-J4',
            ),
            13 => 
            array (
                'id' => 1014,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM285M-60 PERC',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM285M-60 PERC',
            ),
            14 => 
            array (
                'id' => 1015,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM285M-60(Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM285M-60(Plus)',
            ),
            15 => 
            array (
                'id' => 1016,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM290M-60 PERC',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM290M-60 PERC',
            ),
            16 => 
            array (
                'id' => 1017,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM290M-60(Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM290M-60(Plus)',
            ),
            17 => 
            array (
                'id' => 1018,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM295M-60 PERC',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM295M-60 PERC',
            ),
            18 => 
            array (
                'id' => 1019,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM295M-60(Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM295M-60(Plus)',
            ),
            19 => 
            array (
                'id' => 1020,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM295P-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM295P-72',
            ),
            20 => 
            array (
                'id' => 1021,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM300M-60 PERC',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM300M-60 PERC',
            ),
            21 => 
            array (
                'id' => 1022,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM300M-60(Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM300M-60(Plus)',
            ),
            22 => 
            array (
                'id' => 1023,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM300M-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM300M-72',
            ),
            23 => 
            array (
                'id' => 1024,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM300P-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM300P-72',
            ),
            24 => 
            array (
                'id' => 1025,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM305M-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM305M-72',
            ),
            25 => 
            array (
                'id' => 1026,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM305P-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM305P-72',
            ),
            26 => 
            array (
                'id' => 1027,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM305PP-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM305PP-72',
            ),
            27 => 
            array (
                'id' => 1028,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM310M-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM310M-72',
            ),
            28 => 
            array (
                'id' => 1029,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM310P-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM310P-72',
            ),
            29 => 
            array (
                'id' => 1030,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM310PP-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM310PP-72',
            ),
            30 => 
            array (
                'id' => 1031,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM310PP-72-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM310PP-72-DV',
            ),
            31 => 
            array (
                'id' => 1032,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM315M-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM315M-72',
            ),
            32 => 
            array (
                'id' => 1033,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM315P-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM315P-72',
            ),
            33 => 
            array (
                'id' => 1034,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM315PP-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM315PP-72',
            ),
            34 => 
            array (
                'id' => 1035,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM315PP-72 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM315PP-72 (Plus)',
            ),
            35 => 
            array (
                'id' => 1036,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM315PP-72-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM315PP-72-DV',
            ),
            36 => 
            array (
                'id' => 1037,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM315PP-J4',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM315PP-J4',
            ),
            37 => 
            array (
                'id' => 1038,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM320M-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM320M-72',
            ),
            38 => 
            array (
                'id' => 1039,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM320PP-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM320PP-72',
            ),
            39 => 
            array (
                'id' => 1040,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM320PP-72 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM320PP-72 (Plus)',
            ),
            40 => 
            array (
                'id' => 1041,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM320PP-72-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM320PP-72-DV',
            ),
            41 => 
            array (
                'id' => 1042,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM320PP-J4',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM320PP-J4',
            ),
            42 => 
            array (
                'id' => 1043,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM325PP-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM325PP-72',
            ),
            43 => 
            array (
                'id' => 1044,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM325PP-72 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM325PP-72 (Plus)',
            ),
            44 => 
            array (
                'id' => 1045,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM325PP-72-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM325PP-72-DV',
            ),
            45 => 
            array (
                'id' => 1046,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM325PP-J4',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM325PP-J4',
            ),
            46 => 
            array (
                'id' => 1047,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM330PP-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM330PP-72',
            ),
            47 => 
            array (
                'id' => 1048,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM330PP-72 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM330PP-72 (Plus)',
            ),
            48 => 
            array (
                'id' => 1049,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM330PP-72-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM330PP-72-DV',
            ),
            49 => 
            array (
                'id' => 1050,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM330PP-J4',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM330PP-J4',
            ),
            50 => 
            array (
                'id' => 1051,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM335PP-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM335PP-72',
            ),
            51 => 
            array (
                'id' => 1052,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM335PP-72 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM335PP-72 (Plus)',
            ),
            52 => 
            array (
                'id' => 1053,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM335PP-72-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM335PP-72-DV',
            ),
            53 => 
            array (
                'id' => 1054,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM335PP-J4',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM335PP-J4',
            ),
            54 => 
            array (
                'id' => 1055,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM340M-72 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM340M-72 (Plus)',
            ),
            55 => 
            array (
                'id' => 1056,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM340M-72 PERC',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM340M-72 PERC',
            ),
            56 => 
            array (
                'id' => 1057,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM340M-72-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM340M-72-DV',
            ),
            57 => 
            array (
                'id' => 1058,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM345M-72 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM345M-72 (Plus)',
            ),
            58 => 
            array (
                'id' => 1059,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM345M-72 PERC',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM345M-72 PERC',
            ),
            59 => 
            array (
                'id' => 1060,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM345M-72-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM345M-72-DV',
            ),
            60 => 
            array (
                'id' => 1061,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM350M-72 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM350M-72 (Plus)',
            ),
            61 => 
            array (
                'id' => 1062,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM350M-72 PERC',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM350M-72 PERC',
            ),
            62 => 
            array (
                'id' => 1063,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM350M-72-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM350M-72-DV',
            ),
            63 => 
            array (
                'id' => 1064,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM355M-72 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM355M-72 (Plus)',
            ),
            64 => 
            array (
                'id' => 1065,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM355M-72 PERC',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM355M-72 PERC',
            ),
            65 => 
            array (
                'id' => 1066,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM355M-72-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM355M-72-DV',
            ),
            66 => 
            array (
                'id' => 1067,
                'asset_type_id' => 5,
            'name' => 'Jinko Solar JKM360M-72 (Plus)',
                'manufacturer' => 'Jinko Solar',
            'model' => 'JKM360M-72 (Plus)',
            ),
            67 => 
            array (
                'id' => 1068,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM360M-72 PERC',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM360M-72 PERC',
            ),
            68 => 
            array (
                'id' => 1069,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKM360M-72-DV',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKM360M-72-DV',
            ),
            69 => 
            array (
                'id' => 1070,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKMS255P',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKMS255P',
            ),
            70 => 
            array (
                'id' => 1071,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKMS255PP-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKMS255PP-60',
            ),
            71 => 
            array (
                'id' => 1072,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKMS260P',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKMS260P',
            ),
            72 => 
            array (
                'id' => 1073,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKMS260PP-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKMS260PP-60',
            ),
            73 => 
            array (
                'id' => 1074,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKMS265P',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKMS265P',
            ),
            74 => 
            array (
                'id' => 1075,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKMS265PP-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKMS265PP-60',
            ),
            75 => 
            array (
                'id' => 1076,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKMS270P',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKMS270P',
            ),
            76 => 
            array (
                'id' => 1077,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKMS270PP-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKMS270PP-60',
            ),
            77 => 
            array (
                'id' => 1078,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKMS275PP-60',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKMS275PP-60',
            ),
            78 => 
            array (
                'id' => 1079,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKMS310PP-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKMS310PP-72',
            ),
            79 => 
            array (
                'id' => 1080,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKMS315PP-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKMS315PP-72',
            ),
            80 => 
            array (
                'id' => 1081,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKMS320PP-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKMS320PP-72',
            ),
            81 => 
            array (
                'id' => 1082,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKMS325PP-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKMS325PP-72',
            ),
            82 => 
            array (
                'id' => 1083,
                'asset_type_id' => 5,
                'name' => 'Jinko Solar JKMS330PP-72',
                'manufacturer' => 'Jinko Solar',
                'model' => 'JKMS330PP-72',
            ),
            83 => 
            array (
                'id' => 1084,
                'asset_type_id' => 5,
                'name' => 'Kyocera Solar KD140GX-LFBS',
                'manufacturer' => 'Kyocera Solar',
                'model' => 'KD140GX-LFBS',
            ),
            84 => 
            array (
                'id' => 1085,
                'asset_type_id' => 5,
                'name' => 'Kyocera Solar KD140SX-UFBS',
                'manufacturer' => 'Kyocera Solar',
                'model' => 'KD140SX-UFBS',
            ),
            85 => 
            array (
                'id' => 1086,
                'asset_type_id' => 5,
                'name' => 'Kyocera Solar KD145SX-UFU',
                'manufacturer' => 'Kyocera Solar',
                'model' => 'KD145SX-UFU',
            ),
            86 => 
            array (
                'id' => 1087,
                'asset_type_id' => 5,
                'name' => 'Kyocera Solar KD150GX-LFU',
                'manufacturer' => 'Kyocera Solar',
                'model' => 'KD150GX-LFU',
            ),
            87 => 
            array (
                'id' => 1088,
                'asset_type_id' => 5,
                'name' => 'Kyocera Solar KD150SX-UFU',
                'manufacturer' => 'Kyocera Solar',
                'model' => 'KD150SX-UFU',
            ),
            88 => 
            array (
                'id' => 1089,
                'asset_type_id' => 5,
                'name' => 'Kyocera Solar KD260GX-LFB2',
                'manufacturer' => 'Kyocera Solar',
                'model' => 'KD260GX-LFB2',
            ),
            89 => 
            array (
                'id' => 1090,
                'asset_type_id' => 5,
                'name' => 'Kyocera Solar KD265GX-LFB2',
                'manufacturer' => 'Kyocera Solar',
                'model' => 'KD265GX-LFB2',
            ),
            90 => 
            array (
                'id' => 1091,
                'asset_type_id' => 5,
                'name' => 'Kyocera Solar KD325GX-LFB',
                'manufacturer' => 'Kyocera Solar',
                'model' => 'KD325GX-LFB',
            ),
            91 => 
            array (
                'id' => 1092,
                'asset_type_id' => 5,
                'name' => 'Kyocera Solar KD330GX-LFB',
                'manufacturer' => 'Kyocera Solar',
                'model' => 'KD330GX-LFB',
            ),
            92 => 
            array (
                'id' => 1093,
                'asset_type_id' => 5,
                'name' => 'Kyocera Solar KU260-6MCA',
                'manufacturer' => 'Kyocera Solar',
                'model' => 'KU260-6MCA',
            ),
            93 => 
            array (
                'id' => 1094,
                'asset_type_id' => 5,
                'name' => 'Kyocera Solar KU265-6MCA',
                'manufacturer' => 'Kyocera Solar',
                'model' => 'KU265-6MCA',
            ),
            94 => 
            array (
                'id' => 1095,
                'asset_type_id' => 5,
                'name' => 'Kyocera Solar KU315-7ZPA',
                'manufacturer' => 'Kyocera Solar',
                'model' => 'KU315-7ZPA',
            ),
            95 => 
            array (
                'id' => 1096,
                'asset_type_id' => 5,
                'name' => 'Kyocera Solar KU320-7ZPA',
                'manufacturer' => 'Kyocera Solar',
                'model' => 'KU320-7ZPA',
            ),
            96 => 
            array (
                'id' => 1097,
                'asset_type_id' => 5,
                'name' => 'Kyocera Solar KU325-8BCA',
                'manufacturer' => 'Kyocera Solar',
                'model' => 'KU325-8BCA',
            ),
            97 => 
            array (
                'id' => 1098,
                'asset_type_id' => 5,
                'name' => 'Kyocera Solar KU330-8BCA',
                'manufacturer' => 'Kyocera Solar',
                'model' => 'KU330-8BCA',
            ),
            98 => 
            array (
                'id' => 1099,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG260S1C-B3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG260S1C-B3',
            ),
            99 => 
            array (
                'id' => 1100,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG260S1K-B3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG260S1K-B3',
            ),
            100 => 
            array (
                'id' => 1101,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG265S1C-B3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG265S1C-B3',
            ),
            101 => 
            array (
                'id' => 1102,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG265S1K-B3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG265S1K-B3',
            ),
            102 => 
            array (
                'id' => 1103,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG270S1C-B3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG270S1C-B3',
            ),
            103 => 
            array (
                'id' => 1104,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG270S1K-B3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG270S1K-B3',
            ),
            104 => 
            array (
                'id' => 1105,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG275S1C-B3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG275S1C-B3',
            ),
            105 => 
            array (
                'id' => 1106,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG275S1C-G4',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG275S1C-G4',
            ),
            106 => 
            array (
                'id' => 1107,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG280S1C-B3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG280S1C-B3',
            ),
            107 => 
            array (
                'id' => 1108,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG280S1C-G4',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG280S1C-G4',
            ),
            108 => 
            array (
                'id' => 1109,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG285N1C-A3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG285N1C-A3',
            ),
            109 => 
            array (
                'id' => 1110,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG285S1C-G4',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG285S1C-G4',
            ),
            110 => 
            array (
                'id' => 1111,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG290N1C-A3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG290N1C-A3',
            ),
            111 => 
            array (
                'id' => 1112,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG290N1C-B3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG290N1C-B3',
            ),
            112 => 
            array (
                'id' => 1113,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG295N1C-A3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG295N1C-A3',
            ),
            113 => 
            array (
                'id' => 1114,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG295N1C-B3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG295N1C-B3',
            ),
            114 => 
            array (
                'id' => 1115,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG300A1C-B3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG300A1C-B3',
            ),
            115 => 
            array (
                'id' => 1116,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG300N1C-A3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG300N1C-A3',
            ),
            116 => 
            array (
                'id' => 1117,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG300N1C-B3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG300N1C-B3',
            ),
            117 => 
            array (
                'id' => 1118,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG300N1K-G4',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG300N1K-G4',
            ),
            118 => 
            array (
                'id' => 1119,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG305N1C-B3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG305N1C-B3',
            ),
            119 => 
            array (
                'id' => 1120,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG305N1C-G4',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG305N1C-G4',
            ),
            120 => 
            array (
                'id' => 1121,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG305N1K-G4 Black',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG305N1K-G4 Black',
            ),
            121 => 
            array (
                'id' => 1122,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG310N1C-G4',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG310N1C-G4',
            ),
            122 => 
            array (
                'id' => 1123,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG315N1C-G4',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG315N1C-G4',
            ),
            123 => 
            array (
                'id' => 1124,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG320N1C-G4',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG320N1C-G4',
            ),
            124 => 
            array (
                'id' => 1125,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG335S2W-G4',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG335S2W-G4',
            ),
            125 => 
            array (
                'id' => 1126,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG340S2W-G4',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG340S2W-G4',
            ),
            126 => 
            array (
                'id' => 1127,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG360N2W-B3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG360N2W-B3',
            ),
            127 => 
            array (
                'id' => 1128,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG365N2W-B3',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG365N2W-B3',
            ),
            128 => 
            array (
                'id' => 1129,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG365N2W-G4',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG365N2W-G4',
            ),
            129 => 
            array (
                'id' => 1130,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG370N2W-G4',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG370N2W-G4',
            ),
            130 => 
            array (
                'id' => 1131,
                'asset_type_id' => 5,
                'name' => 'LG Electronics LG375N2W-G4',
                'manufacturer' => 'LG Electronics',
                'model' => 'LG375N2W-G4',
            ),
            131 => 
            array (
                'id' => 1132,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6F290E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6F290E3A',
            ),
            132 => 
            array (
                'id' => 1133,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6F295E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6F295E3A',
            ),
            133 => 
            array (
                'id' => 1134,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6F300E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6F300E3A',
            ),
            134 => 
            array (
                'id' => 1135,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6H305E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6H305E3A',
            ),
            135 => 
            array (
                'id' => 1136,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6H310E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6H310E3A',
            ),
            136 => 
            array (
                'id' => 1137,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6H315E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6H315E3A',
            ),
            137 => 
            array (
                'id' => 1138,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6H320E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6H320E3A',
            ),
            138 => 
            array (
                'id' => 1139,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6H325E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6H325E3A',
            ),
            139 => 
            array (
                'id' => 1140,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6H365E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6H365E4A',
            ),
            140 => 
            array (
                'id' => 1141,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6H370E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6H370E4A',
            ),
            141 => 
            array (
                'id' => 1142,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6H375E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6H375E4A',
            ),
            142 => 
            array (
                'id' => 1143,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6H380E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6H380E4A',
            ),
            143 => 
            array (
                'id' => 1144,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6J290E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6J290E3A',
            ),
            144 => 
            array (
                'id' => 1145,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6J295E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6J295E3A',
            ),
            145 => 
            array (
                'id' => 1146,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6J300E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6J300E3A',
            ),
            146 => 
            array (
                'id' => 1147,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6J305E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6J305E3A',
            ),
            147 => 
            array (
                'id' => 1148,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6J310E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6J310E3A',
            ),
            148 => 
            array (
                'id' => 1149,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6J315E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6J315E3A',
            ),
            149 => 
            array (
                'id' => 1150,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6J320E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6J320E3A',
            ),
            150 => 
            array (
                'id' => 1151,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6J325E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6J325E3A',
            ),
            151 => 
            array (
                'id' => 1152,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M275B3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M275B3A',
            ),
            152 => 
            array (
                'id' => 1153,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M275E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M275E3A',
            ),
            153 => 
            array (
                'id' => 1154,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M280B3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M280B3A',
            ),
            154 => 
            array (
                'id' => 1155,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M280E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M280E3A',
            ),
            155 => 
            array (
                'id' => 1156,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M285B3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M285B3A',
            ),
            156 => 
            array (
                'id' => 1157,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M285E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M285E3A',
            ),
            157 => 
            array (
                'id' => 1158,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M290B3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M290B3A',
            ),
            158 => 
            array (
                'id' => 1159,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M290E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M290E3A',
            ),
            159 => 
            array (
                'id' => 1160,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M295B3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M295B3A',
            ),
            160 => 
            array (
                'id' => 1161,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M295E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M295E3A',
            ),
            161 => 
            array (
                'id' => 1162,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M300B3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M300B3A',
            ),
            162 => 
            array (
                'id' => 1163,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M300E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M300E3A',
            ),
            163 => 
            array (
                'id' => 1164,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M305B3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M305B3A',
            ),
            164 => 
            array (
                'id' => 1165,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M305E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M305E3A',
            ),
            165 => 
            array (
                'id' => 1166,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M310E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M310E3A',
            ),
            166 => 
            array (
                'id' => 1167,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M330B4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M330B4A',
            ),
            167 => 
            array (
                'id' => 1168,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M335B4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M335B4A',
            ),
            168 => 
            array (
                'id' => 1169,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M335E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M335E4A',
            ),
            169 => 
            array (
                'id' => 1170,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M340B4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M340B4A',
            ),
            170 => 
            array (
                'id' => 1171,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M340E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M340E4A',
            ),
            171 => 
            array (
                'id' => 1172,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M340E4A_WS',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M340E4A_WS',
            ),
            172 => 
            array (
                'id' => 1173,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M345B4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M345B4A',
            ),
            173 => 
            array (
                'id' => 1174,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M345E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M345E4A',
            ),
            174 => 
            array (
                'id' => 1175,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M350B4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M350B4A',
            ),
            175 => 
            array (
                'id' => 1176,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M350E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M350E4A',
            ),
            176 => 
            array (
                'id' => 1177,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M355B4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M355B4A',
            ),
            177 => 
            array (
                'id' => 1178,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M355E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M355E4A',
            ),
            178 => 
            array (
                'id' => 1179,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M360B4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M360B4A',
            ),
            179 => 
            array (
                'id' => 1180,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M360E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M360E4A',
            ),
            180 => 
            array (
                'id' => 1181,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M365B4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M365B4A',
            ),
            181 => 
            array (
                'id' => 1182,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M365E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M365E4A',
            ),
            182 => 
            array (
                'id' => 1183,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6M370E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6M370E4A',
            ),
            183 => 
            array (
                'id' => 1184,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P250B3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P250B3A',
            ),
            184 => 
            array (
                'id' => 1185,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P255B3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P255B3A',
            ),
            185 => 
            array (
                'id' => 1186,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P260B3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P260B3A',
            ),
            186 => 
            array (
                'id' => 1187,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P260E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P260E3A',
            ),
            187 => 
            array (
                'id' => 1188,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P265B3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P265B3A',
            ),
            188 => 
            array (
                'id' => 1189,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P265E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P265E3A',
            ),
            189 => 
            array (
                'id' => 1190,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P270B3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P270B3A',
            ),
            190 => 
            array (
                'id' => 1191,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P270E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P270E3A',
            ),
            191 => 
            array (
                'id' => 1192,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P275E3A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P275E3A',
            ),
            192 => 
            array (
                'id' => 1193,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P305B4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P305B4A',
            ),
            193 => 
            array (
                'id' => 1194,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P310B4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P310B4A',
            ),
            194 => 
            array (
                'id' => 1195,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P310E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P310E4A',
            ),
            195 => 
            array (
                'id' => 1196,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P315B4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P315B4A',
            ),
            196 => 
            array (
                'id' => 1197,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P315E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P315E4A',
            ),
            197 => 
            array (
                'id' => 1198,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P320B4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P320B4A',
            ),
            198 => 
            array (
                'id' => 1199,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P320E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P320E4A',
            ),
            199 => 
            array (
                'id' => 1200,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P325B4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P325B4A',
            ),
            200 => 
            array (
                'id' => 1201,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P325E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P325E4A',
            ),
            201 => 
            array (
                'id' => 1202,
                'asset_type_id' => 5,
                'name' => 'Neo Solar D6P330E4A',
                'manufacturer' => 'Neo Solar',
                'model' => 'D6P330E4A',
            ),
            202 => 
            array (
                'id' => 1203,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC240PE',
                'manufacturer' => 'REC Solar',
                'model' => 'REC240PE',
            ),
            203 => 
            array (
                'id' => 1204,
                'asset_type_id' => 5,
            'name' => 'REC Solar REC240PE(BLK)',
                'manufacturer' => 'REC Solar',
            'model' => 'REC240PE(BLK)',
            ),
            204 => 
            array (
                'id' => 1205,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC245PE',
                'manufacturer' => 'REC Solar',
                'model' => 'REC245PE',
            ),
            205 => 
            array (
                'id' => 1206,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC245PE BLK2',
                'manufacturer' => 'REC Solar',
                'model' => 'REC245PE BLK2',
            ),
            206 => 
            array (
                'id' => 1207,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC250PE',
                'manufacturer' => 'REC Solar',
                'model' => 'REC250PE',
            ),
            207 => 
            array (
                'id' => 1208,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC250PE BLK2',
                'manufacturer' => 'REC Solar',
                'model' => 'REC250PE BLK2',
            ),
            208 => 
            array (
                'id' => 1209,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC255PE',
                'manufacturer' => 'REC Solar',
                'model' => 'REC255PE',
            ),
            209 => 
            array (
                'id' => 1210,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC255PE BLK2',
                'manufacturer' => 'REC Solar',
                'model' => 'REC255PE BLK2',
            ),
            210 => 
            array (
                'id' => 1211,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC260PE',
                'manufacturer' => 'REC Solar',
                'model' => 'REC260PE',
            ),
            211 => 
            array (
                'id' => 1212,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC260PE BLK2',
                'manufacturer' => 'REC Solar',
                'model' => 'REC260PE BLK2',
            ),
            212 => 
            array (
                'id' => 1213,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC265PE',
                'manufacturer' => 'REC Solar',
                'model' => 'REC265PE',
            ),
            213 => 
            array (
                'id' => 1214,
                'asset_type_id' => 5,
            'name' => 'REC Solar REC265PE(BLK)',
                'manufacturer' => 'REC Solar',
            'model' => 'REC265PE(BLK)',
            ),
            214 => 
            array (
                'id' => 1215,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC265TP',
                'manufacturer' => 'REC Solar',
                'model' => 'REC265TP',
            ),
            215 => 
            array (
                'id' => 1216,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC270PE',
                'manufacturer' => 'REC Solar',
                'model' => 'REC270PE',
            ),
            216 => 
            array (
                'id' => 1217,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC270TP',
                'manufacturer' => 'REC Solar',
                'model' => 'REC270TP',
            ),
            217 => 
            array (
                'id' => 1218,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC275TP',
                'manufacturer' => 'REC Solar',
                'model' => 'REC275TP',
            ),
            218 => 
            array (
                'id' => 1219,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC275TP2',
                'manufacturer' => 'REC Solar',
                'model' => 'REC275TP2',
            ),
            219 => 
            array (
                'id' => 1220,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC280TP',
                'manufacturer' => 'REC Solar',
                'model' => 'REC280TP',
            ),
            220 => 
            array (
                'id' => 1221,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC280TP2',
                'manufacturer' => 'REC Solar',
                'model' => 'REC280TP2',
            ),
            221 => 
            array (
                'id' => 1222,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC285TP',
                'manufacturer' => 'REC Solar',
                'model' => 'REC285TP',
            ),
            222 => 
            array (
                'id' => 1223,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC285TP2',
                'manufacturer' => 'REC Solar',
                'model' => 'REC285TP2',
            ),
            223 => 
            array (
                'id' => 1224,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC290TP2',
                'manufacturer' => 'REC Solar',
                'model' => 'REC290TP2',
            ),
            224 => 
            array (
                'id' => 1225,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC295TP2',
                'manufacturer' => 'REC Solar',
                'model' => 'REC295TP2',
            ),
            225 => 
            array (
                'id' => 1226,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC300PE72',
                'manufacturer' => 'REC Solar',
                'model' => 'REC300PE72',
            ),
            226 => 
            array (
                'id' => 1227,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC305PE72',
                'manufacturer' => 'REC Solar',
                'model' => 'REC305PE72',
            ),
            227 => 
            array (
                'id' => 1228,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC310PE72',
                'manufacturer' => 'REC Solar',
                'model' => 'REC310PE72',
            ),
            228 => 
            array (
                'id' => 1229,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC315PE72',
                'manufacturer' => 'REC Solar',
                'model' => 'REC315PE72',
            ),
            229 => 
            array (
                'id' => 1230,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC320PE72',
                'manufacturer' => 'REC Solar',
                'model' => 'REC320PE72',
            ),
            230 => 
            array (
                'id' => 1231,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC325PE72',
                'manufacturer' => 'REC Solar',
                'model' => 'REC325PE72',
            ),
            231 => 
            array (
                'id' => 1232,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC330TP72',
                'manufacturer' => 'REC Solar',
                'model' => 'REC330TP72',
            ),
            232 => 
            array (
                'id' => 1233,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC335TP72',
                'manufacturer' => 'REC Solar',
                'model' => 'REC335TP72',
            ),
            233 => 
            array (
                'id' => 1234,
                'asset_type_id' => 5,
                'name' => 'REC Solar REC340TP72',
                'manufacturer' => 'REC Solar',
                'model' => 'REC340TP72',
            ),
            234 => 
            array (
                'id' => 1235,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC250M-24/Bb',
                'manufacturer' => 'ReneSola',
                'model' => 'JC250M-24/Bb',
            ),
            235 => 
            array (
                'id' => 1236,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC250M-24/Bbh',
                'manufacturer' => 'ReneSola',
                'model' => 'JC250M-24/Bbh',
            ),
            236 => 
            array (
                'id' => 1237,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC250M-24/Bgs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC250M-24/Bgs',
            ),
            237 => 
            array (
                'id' => 1238,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC255M-24/Bb',
                'manufacturer' => 'ReneSola',
                'model' => 'JC255M-24/Bb',
            ),
            238 => 
            array (
                'id' => 1239,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC255M-24/Bbh',
                'manufacturer' => 'ReneSola',
                'model' => 'JC255M-24/Bbh',
            ),
            239 => 
            array (
                'id' => 1240,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC255M-24/Bbs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC255M-24/Bbs',
            ),
            240 => 
            array (
                'id' => 1241,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC255M-24/Bgs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC255M-24/Bgs',
            ),
            241 => 
            array (
                'id' => 1242,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC260M-24/Bb',
                'manufacturer' => 'ReneSola',
                'model' => 'JC260M-24/Bb',
            ),
            242 => 
            array (
                'id' => 1243,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC260M-24/Bbh',
                'manufacturer' => 'ReneSola',
                'model' => 'JC260M-24/Bbh',
            ),
            243 => 
            array (
                'id' => 1244,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC260M-24/Bbs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC260M-24/Bbs',
            ),
            244 => 
            array (
                'id' => 1245,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC260M-24/Bgs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC260M-24/Bgs',
            ),
            245 => 
            array (
                'id' => 1246,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC265M-24/Bb',
                'manufacturer' => 'ReneSola',
                'model' => 'JC265M-24/Bb',
            ),
            246 => 
            array (
                'id' => 1247,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC265M-24/Bbs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC265M-24/Bbs',
            ),
            247 => 
            array (
                'id' => 1248,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC265M-24/Bgs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC265M-24/Bgs',
            ),
            248 => 
            array (
                'id' => 1249,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC270M-24/Ab',
                'manufacturer' => 'ReneSola',
                'model' => 'JC270M-24/Ab',
            ),
            249 => 
            array (
                'id' => 1250,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC270M-24/Bbs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC270M-24/Bbs',
            ),
            250 => 
            array (
                'id' => 1251,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC270S-24/Bb',
                'manufacturer' => 'ReneSola',
                'model' => 'JC270S-24/Bb',
            ),
            251 => 
            array (
                'id' => 1252,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC270S-24/Bbs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC270S-24/Bbs',
            ),
            252 => 
            array (
                'id' => 1253,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC275M-24/Bbs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC275M-24/Bbs',
            ),
            253 => 
            array (
                'id' => 1254,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC275S-24/Bb',
                'manufacturer' => 'ReneSola',
                'model' => 'JC275S-24/Bb',
            ),
            254 => 
            array (
                'id' => 1255,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC275S-24/Bbs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC275S-24/Bbs',
            ),
            255 => 
            array (
                'id' => 1256,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC280M-24/Bbs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC280M-24/Bbs',
            ),
            256 => 
            array (
                'id' => 1257,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC280S-24/Bbs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC280S-24/Bbs',
            ),
            257 => 
            array (
                'id' => 1258,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC285M-24/Bbs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC285M-24/Bbs',
            ),
            258 => 
            array (
                'id' => 1259,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC285S-24/Bbs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC285S-24/Bbs',
            ),
            259 => 
            array (
                'id' => 1260,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC300M-24/Ab',
                'manufacturer' => 'ReneSola',
                'model' => 'JC300M-24/Ab',
            ),
            260 => 
            array (
                'id' => 1261,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC300M-24/Abh',
                'manufacturer' => 'ReneSola',
                'model' => 'JC300M-24/Abh',
            ),
            261 => 
            array (
                'id' => 1262,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC300M-24/Ags',
                'manufacturer' => 'ReneSola',
                'model' => 'JC300M-24/Ags',
            ),
            262 => 
            array (
                'id' => 1263,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC305M-24/Ab',
                'manufacturer' => 'ReneSola',
                'model' => 'JC305M-24/Ab',
            ),
            263 => 
            array (
                'id' => 1264,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC305M-24/Abh',
                'manufacturer' => 'ReneSola',
                'model' => 'JC305M-24/Abh',
            ),
            264 => 
            array (
                'id' => 1265,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC305M-24/Abs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC305M-24/Abs',
            ),
            265 => 
            array (
                'id' => 1266,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC305M-24/Ags',
                'manufacturer' => 'ReneSola',
                'model' => 'JC305M-24/Ags',
            ),
            266 => 
            array (
                'id' => 1267,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC310M-24/Ab',
                'manufacturer' => 'ReneSola',
                'model' => 'JC310M-24/Ab',
            ),
            267 => 
            array (
                'id' => 1268,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC310M-24/Abh',
                'manufacturer' => 'ReneSola',
                'model' => 'JC310M-24/Abh',
            ),
            268 => 
            array (
                'id' => 1269,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC310M-24/Abs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC310M-24/Abs',
            ),
            269 => 
            array (
                'id' => 1270,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC310M-24/Ags',
                'manufacturer' => 'ReneSola',
                'model' => 'JC310M-24/Ags',
            ),
            270 => 
            array (
                'id' => 1271,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC315M-24/Ab',
                'manufacturer' => 'ReneSola',
                'model' => 'JC315M-24/Ab',
            ),
            271 => 
            array (
                'id' => 1272,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC315M-24/Abs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC315M-24/Abs',
            ),
            272 => 
            array (
                'id' => 1273,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC315M-24/Ags',
                'manufacturer' => 'ReneSola',
                'model' => 'JC315M-24/Ags',
            ),
            273 => 
            array (
                'id' => 1274,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC320M-24/Abs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC320M-24/Abs',
            ),
            274 => 
            array (
                'id' => 1275,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC325M-24/Abs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC325M-24/Abs',
            ),
            275 => 
            array (
                'id' => 1276,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC330M-24/Abs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC330M-24/Abs',
            ),
            276 => 
            array (
                'id' => 1277,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC330S-24/Abs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC330S-24/Abs',
            ),
            277 => 
            array (
                'id' => 1278,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC335M-24/Abs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC335M-24/Abs',
            ),
            278 => 
            array (
                'id' => 1279,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC335S-24/Abs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC335S-24/Abs',
            ),
            279 => 
            array (
                'id' => 1280,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC340S-24/Abs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC340S-24/Abs',
            ),
            280 => 
            array (
                'id' => 1281,
                'asset_type_id' => 5,
                'name' => 'ReneSola JC345S-24/Abs',
                'manufacturer' => 'ReneSola',
                'model' => 'JC345S-24/Abs',
            ),
            281 => 
            array (
                'id' => 1282,
                'asset_type_id' => 5,
                'name' => 'Sharp Solar ND-240QCJ',
                'manufacturer' => 'Sharp Solar',
                'model' => 'ND-240QCJ',
            ),
            282 => 
            array (
                'id' => 1283,
                'asset_type_id' => 5,
                'name' => 'Sharp Solar ND-250QCS',
                'manufacturer' => 'Sharp Solar',
                'model' => 'ND-250QCS',
            ),
            283 => 
            array (
                'id' => 1284,
                'asset_type_id' => 5,
                'name' => 'Sharp Solar ND-F2Q235 SunSnap',
                'manufacturer' => 'Sharp Solar',
                'model' => 'ND-F2Q235 SunSnap',
            ),
            284 => 
            array (
                'id' => 1285,
                'asset_type_id' => 5,
                'name' => 'Sharp Solar ND-F4Q300',
                'manufacturer' => 'Sharp Solar',
                'model' => 'ND-F4Q300',
            ),
            285 => 
            array (
                'id' => 1286,
                'asset_type_id' => 5,
                'name' => 'Sharp Solar ND-Q235F4',
                'manufacturer' => 'Sharp Solar',
                'model' => 'ND-Q235F4',
            ),
            286 => 
            array (
                'id' => 1287,
                'asset_type_id' => 5,
                'name' => 'Sharp Solar ND-Q245F7',
                'manufacturer' => 'Sharp Solar',
                'model' => 'ND-Q245F7',
            ),
            287 => 
            array (
                'id' => 1288,
                'asset_type_id' => 5,
                'name' => 'Sharp Solar ND-Q250F7',
                'manufacturer' => 'Sharp Solar',
                'model' => 'ND-Q250F7',
            ),
            288 => 
            array (
                'id' => 1289,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA 245 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA 245 P',
            ),
            289 => 
            array (
                'id' => 1290,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA 250 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA 250 P',
            ),
            290 => 
            array (
                'id' => 1291,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA 255 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA 255 P',
            ),
            291 => 
            array (
                'id' => 1292,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA 260 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA 260 P',
            ),
            292 => 
            array (
                'id' => 1293,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA 265 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA 265 P',
            ),
            293 => 
            array (
                'id' => 1294,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA250P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA250P',
            ),
            294 => 
            array (
                'id' => 1295,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA255P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA255P',
            ),
            295 => 
            array (
                'id' => 1296,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA260M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA260M',
            ),
            296 => 
            array (
                'id' => 1297,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA260P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA260P',
            ),
            297 => 
            array (
                'id' => 1298,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA265M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA265M',
            ),
            298 => 
            array (
                'id' => 1299,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA265P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA265P',
            ),
            299 => 
            array (
                'id' => 1300,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA270M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA270M',
            ),
            300 => 
            array (
                'id' => 1301,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA275M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA275M',
            ),
            301 => 
            array (
                'id' => 1302,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA280M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA280M',
            ),
            302 => 
            array (
                'id' => 1303,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA285M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA285M',
            ),
            303 => 
            array (
                'id' => 1304,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA285X',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA285X',
            ),
            304 => 
            array (
                'id' => 1305,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA290M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA290M',
            ),
            305 => 
            array (
                'id' => 1306,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA290X',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA290X',
            ),
            306 => 
            array (
                'id' => 1307,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA295M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA295M',
            ),
            307 => 
            array (
                'id' => 1308,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA295X',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA295X',
            ),
            308 => 
            array (
                'id' => 1309,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA300M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA300M',
            ),
            309 => 
            array (
                'id' => 1310,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLA300X',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLA300X',
            ),
            310 => 
            array (
                'id' => 1311,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG 295 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG 295 P',
            ),
            311 => 
            array (
                'id' => 1312,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG 300 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG 300 P',
            ),
            312 => 
            array (
                'id' => 1313,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG 305 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG 305 P',
            ),
            313 => 
            array (
                'id' => 1314,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG 310 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG 310 P',
            ),
            314 => 
            array (
                'id' => 1315,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG 315 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG 315 P',
            ),
            315 => 
            array (
                'id' => 1316,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG300P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG300P',
            ),
            316 => 
            array (
                'id' => 1317,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG305P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG305P',
            ),
            317 => 
            array (
                'id' => 1318,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG310M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG310M',
            ),
            318 => 
            array (
                'id' => 1319,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG310P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG310P',
            ),
            319 => 
            array (
                'id' => 1320,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG315M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG315M',
            ),
            320 => 
            array (
                'id' => 1321,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG315P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG315P',
            ),
            321 => 
            array (
                'id' => 1322,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG320M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG320M',
            ),
            322 => 
            array (
                'id' => 1323,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG325M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG325M',
            ),
            323 => 
            array (
                'id' => 1324,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG330M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG330M',
            ),
            324 => 
            array (
                'id' => 1325,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG335M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG335M',
            ),
            325 => 
            array (
                'id' => 1326,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG335X',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG335X',
            ),
            326 => 
            array (
                'id' => 1327,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG340M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG340M',
            ),
            327 => 
            array (
                'id' => 1328,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG340X',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG340X',
            ),
            328 => 
            array (
                'id' => 1329,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG345M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG345M',
            ),
            329 => 
            array (
                'id' => 1330,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG345X',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG345X',
            ),
            330 => 
            array (
                'id' => 1331,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG350M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG350M',
            ),
            331 => 
            array (
                'id' => 1332,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG350X',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG350X',
            ),
            332 => 
            array (
                'id' => 1333,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG355M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG355M',
            ),
            333 => 
            array (
                'id' => 1334,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SLG360M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SLG360M',
            ),
            334 => 
            array (
                'id' => 1335,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA 250 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA 250 P',
            ),
            335 => 
            array (
                'id' => 1336,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA 255 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA 255 P',
            ),
            336 => 
            array (
                'id' => 1337,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA 260 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA 260 P',
            ),
            337 => 
            array (
                'id' => 1338,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA 265 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA 265 P',
            ),
            338 => 
            array (
                'id' => 1339,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA250P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA250P',
            ),
            339 => 
            array (
                'id' => 1340,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA255P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA255P',
            ),
            340 => 
            array (
                'id' => 1341,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA260M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA260M',
            ),
            341 => 
            array (
                'id' => 1342,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA260P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA260P',
            ),
            342 => 
            array (
                'id' => 1343,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA265M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA265M',
            ),
            343 => 
            array (
                'id' => 1344,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA265P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA265P',
            ),
            344 => 
            array (
                'id' => 1345,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA270M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA270M',
            ),
            345 => 
            array (
                'id' => 1346,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA275M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA275M',
            ),
            346 => 
            array (
                'id' => 1347,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA280M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA280M',
            ),
            347 => 
            array (
                'id' => 1348,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA285M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA285M',
            ),
            348 => 
            array (
                'id' => 1349,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA290M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA290M',
            ),
            349 => 
            array (
                'id' => 1350,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA295M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA295M',
            ),
            350 => 
            array (
                'id' => 1351,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSA300M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSA300M',
            ),
            351 => 
            array (
                'id' => 1352,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG 295 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG 295 P',
            ),
            352 => 
            array (
                'id' => 1353,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG 300 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG 300 P',
            ),
            353 => 
            array (
                'id' => 1354,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG 305 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG 305 P',
            ),
            354 => 
            array (
                'id' => 1355,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG 310 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG 310 P',
            ),
            355 => 
            array (
                'id' => 1356,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG 315 P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG 315 P',
            ),
            356 => 
            array (
                'id' => 1357,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG300P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG300P',
            ),
            357 => 
            array (
                'id' => 1358,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG305P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG305P',
            ),
            358 => 
            array (
                'id' => 1359,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG310P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG310P',
            ),
            359 => 
            array (
                'id' => 1360,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG315P',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG315P',
            ),
            360 => 
            array (
                'id' => 1361,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG320M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG320M',
            ),
            361 => 
            array (
                'id' => 1362,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG325M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG325M',
            ),
            362 => 
            array (
                'id' => 1363,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG330M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG330M',
            ),
            363 => 
            array (
                'id' => 1364,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG335M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG335M',
            ),
            364 => 
            array (
                'id' => 1365,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG340M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG340M',
            ),
            365 => 
            array (
                'id' => 1366,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG345M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG345M',
            ),
            366 => 
            array (
                'id' => 1367,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG350M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG350M',
            ),
            367 => 
            array (
                'id' => 1368,
                'asset_type_id' => 5,
                'name' => 'Silfab Solar SSG355M',
                'manufacturer' => 'Silfab Solar',
                'model' => 'SSG355M',
            ),
            368 => 
            array (
                'id' => 1369,
                'asset_type_id' => 5,
                'name' => 'SunEdison F310BzC',
                'manufacturer' => 'SunEdison',
                'model' => 'F310BzC',
            ),
            369 => 
            array (
                'id' => 1370,
                'asset_type_id' => 5,
                'name' => 'SunEdison F310BzD',
                'manufacturer' => 'SunEdison',
                'model' => 'F310BzD',
            ),
            370 => 
            array (
                'id' => 1371,
                'asset_type_id' => 5,
                'name' => 'SunEdison F310EzC',
                'manufacturer' => 'SunEdison',
                'model' => 'F310EzC',
            ),
            371 => 
            array (
                'id' => 1372,
                'asset_type_id' => 5,
                'name' => 'SunEdison F310EzD',
                'manufacturer' => 'SunEdison',
                'model' => 'F310EzD',
            ),
            372 => 
            array (
                'id' => 1373,
                'asset_type_id' => 5,
                'name' => 'SunEdison F315BzC',
                'manufacturer' => 'SunEdison',
                'model' => 'F315BzC',
            ),
            373 => 
            array (
                'id' => 1374,
                'asset_type_id' => 5,
                'name' => 'SunEdison F315BzD',
                'manufacturer' => 'SunEdison',
                'model' => 'F315BzD',
            ),
            374 => 
            array (
                'id' => 1375,
                'asset_type_id' => 5,
                'name' => 'SunEdison F315EzC',
                'manufacturer' => 'SunEdison',
                'model' => 'F315EzC',
            ),
            375 => 
            array (
                'id' => 1376,
                'asset_type_id' => 5,
                'name' => 'SunEdison F315EzD',
                'manufacturer' => 'SunEdison',
                'model' => 'F315EzD',
            ),
            376 => 
            array (
                'id' => 1377,
                'asset_type_id' => 5,
                'name' => 'SunEdison F320BzC',
                'manufacturer' => 'SunEdison',
                'model' => 'F320BzC',
            ),
            377 => 
            array (
                'id' => 1378,
                'asset_type_id' => 5,
                'name' => 'SunEdison F320BzD',
                'manufacturer' => 'SunEdison',
                'model' => 'F320BzD',
            ),
            378 => 
            array (
                'id' => 1379,
                'asset_type_id' => 5,
                'name' => 'SunEdison F320EzC',
                'manufacturer' => 'SunEdison',
                'model' => 'F320EzC',
            ),
            379 => 
            array (
                'id' => 1380,
                'asset_type_id' => 5,
                'name' => 'SunEdison F320EzD',
                'manufacturer' => 'SunEdison',
                'model' => 'F320EzD',
            ),
            380 => 
            array (
                'id' => 1381,
                'asset_type_id' => 5,
                'name' => 'SunEdison F325BzC',
                'manufacturer' => 'SunEdison',
                'model' => 'F325BzC',
            ),
            381 => 
            array (
                'id' => 1382,
                'asset_type_id' => 5,
                'name' => 'SunEdison F325BzD',
                'manufacturer' => 'SunEdison',
                'model' => 'F325BzD',
            ),
            382 => 
            array (
                'id' => 1383,
                'asset_type_id' => 5,
                'name' => 'SunEdison F325EzC',
                'manufacturer' => 'SunEdison',
                'model' => 'F325EzC',
            ),
            383 => 
            array (
                'id' => 1384,
                'asset_type_id' => 5,
                'name' => 'SunEdison F325EzD',
                'manufacturer' => 'SunEdison',
                'model' => 'F325EzD',
            ),
            384 => 
            array (
                'id' => 1385,
                'asset_type_id' => 5,
                'name' => 'SunEdison F330BzC',
                'manufacturer' => 'SunEdison',
                'model' => 'F330BzC',
            ),
            385 => 
            array (
                'id' => 1386,
                'asset_type_id' => 5,
                'name' => 'SunEdison F330BzD',
                'manufacturer' => 'SunEdison',
                'model' => 'F330BzD',
            ),
            386 => 
            array (
                'id' => 1387,
                'asset_type_id' => 5,
                'name' => 'SunEdison F330EzC',
                'manufacturer' => 'SunEdison',
                'model' => 'F330EzC',
            ),
            387 => 
            array (
                'id' => 1388,
                'asset_type_id' => 5,
                'name' => 'SunEdison F330EzD',
                'manufacturer' => 'SunEdison',
                'model' => 'F330EzD',
            ),
            388 => 
            array (
                'id' => 1389,
                'asset_type_id' => 5,
                'name' => 'SunEdison F335BzC',
                'manufacturer' => 'SunEdison',
                'model' => 'F335BzC',
            ),
            389 => 
            array (
                'id' => 1390,
                'asset_type_id' => 5,
                'name' => 'SunEdison F335BzD',
                'manufacturer' => 'SunEdison',
                'model' => 'F335BzD',
            ),
            390 => 
            array (
                'id' => 1391,
                'asset_type_id' => 5,
                'name' => 'SunEdison F335EzC',
                'manufacturer' => 'SunEdison',
                'model' => 'F335EzC',
            ),
            391 => 
            array (
                'id' => 1392,
                'asset_type_id' => 5,
                'name' => 'SunEdison F335EzD',
                'manufacturer' => 'SunEdison',
                'model' => 'F335EzD',
            ),
            392 => 
            array (
                'id' => 1393,
                'asset_type_id' => 5,
                'name' => 'SunEdison R330BzC',
                'manufacturer' => 'SunEdison',
                'model' => 'R330BzC',
            ),
            393 => 
            array (
                'id' => 1394,
                'asset_type_id' => 5,
                'name' => 'SunEdison R330EzC',
                'manufacturer' => 'SunEdison',
                'model' => 'R330EzC',
            ),
            394 => 
            array (
                'id' => 1395,
                'asset_type_id' => 5,
                'name' => 'SunEdison R335BzC',
                'manufacturer' => 'SunEdison',
                'model' => 'R335BzC',
            ),
            395 => 
            array (
                'id' => 1396,
                'asset_type_id' => 5,
                'name' => 'SunEdison R335EzC',
                'manufacturer' => 'SunEdison',
                'model' => 'R335EzC',
            ),
            396 => 
            array (
                'id' => 1397,
                'asset_type_id' => 5,
                'name' => 'SunEdison R340BzC',
                'manufacturer' => 'SunEdison',
                'model' => 'R340BzC',
            ),
            397 => 
            array (
                'id' => 1398,
                'asset_type_id' => 5,
                'name' => 'SunEdison R340EzC',
                'manufacturer' => 'SunEdison',
                'model' => 'R340EzC',
            ),
            398 => 
            array (
                'id' => 1399,
                'asset_type_id' => 5,
                'name' => 'SunEdison R345BzC',
                'manufacturer' => 'SunEdison',
                'model' => 'R345BzC',
            ),
            399 => 
            array (
                'id' => 1400,
                'asset_type_id' => 5,
                'name' => 'SunEdison R345EzC',
                'manufacturer' => 'SunEdison',
                'model' => 'R345EzC',
            ),
            400 => 
            array (
                'id' => 1401,
                'asset_type_id' => 5,
                'name' => 'SunEdison R350BzC',
                'manufacturer' => 'SunEdison',
                'model' => 'R350BzC',
            ),
            401 => 
            array (
                'id' => 1402,
                'asset_type_id' => 5,
                'name' => 'SunEdison R350EzC',
                'manufacturer' => 'SunEdison',
                'model' => 'R350EzC',
            ),
            402 => 
            array (
                'id' => 1403,
                'asset_type_id' => 5,
                'name' => 'SunEdison R355BzC',
                'manufacturer' => 'SunEdison',
                'model' => 'R355BzC',
            ),
            403 => 
            array (
                'id' => 1404,
                'asset_type_id' => 5,
                'name' => 'SunEdison R355EzC',
                'manufacturer' => 'SunEdison',
                'model' => 'R355EzC',
            ),
            404 => 
            array (
                'id' => 1405,
                'asset_type_id' => 5,
                'name' => 'SunPower E19-320',
                'manufacturer' => 'SunPower',
                'model' => 'E19-320',
            ),
            405 => 
            array (
                'id' => 1406,
                'asset_type_id' => 5,
                'name' => 'SunPower E20-327',
                'manufacturer' => 'SunPower',
                'model' => 'E20-327',
            ),
            406 => 
            array (
                'id' => 1407,
                'asset_type_id' => 5,
                'name' => 'SunPower SPR-P17-330-COM',
                'manufacturer' => 'SunPower',
                'model' => 'SPR-P17-330-COM',
            ),
            407 => 
            array (
                'id' => 1408,
                'asset_type_id' => 5,
                'name' => 'SunPower SPR-P17-335-COM',
                'manufacturer' => 'SunPower',
                'model' => 'SPR-P17-335-COM',
            ),
            408 => 
            array (
                'id' => 1409,
                'asset_type_id' => 5,
                'name' => 'SunPower SPR-P17-335-COM 1500V',
                'manufacturer' => 'SunPower',
                'model' => 'SPR-P17-335-COM 1500V',
            ),
            409 => 
            array (
                'id' => 1410,
                'asset_type_id' => 5,
                'name' => 'SunPower SPR-P17-340-COM',
                'manufacturer' => 'SunPower',
                'model' => 'SPR-P17-340-COM',
            ),
            410 => 
            array (
                'id' => 1411,
                'asset_type_id' => 5,
                'name' => 'SunPower SPR-P17-340-COM 1500V',
                'manufacturer' => 'SunPower',
                'model' => 'SPR-P17-340-COM 1500V',
            ),
            411 => 
            array (
                'id' => 1412,
                'asset_type_id' => 5,
                'name' => 'SunPower SPR-P17-345-COM',
                'manufacturer' => 'SunPower',
                'model' => 'SPR-P17-345-COM',
            ),
            412 => 
            array (
                'id' => 1413,
                'asset_type_id' => 5,
                'name' => 'SunPower SPR-P17-345-COM 1500V',
                'manufacturer' => 'SunPower',
                'model' => 'SPR-P17-345-COM 1500V',
            ),
            413 => 
            array (
                'id' => 1414,
                'asset_type_id' => 5,
                'name' => 'SunPower SPR-P17-350-COM',
                'manufacturer' => 'SunPower',
                'model' => 'SPR-P17-350-COM',
            ),
            414 => 
            array (
                'id' => 1415,
                'asset_type_id' => 5,
                'name' => 'SunPower SPR-P17-350-COM 1500V',
                'manufacturer' => 'SunPower',
                'model' => 'SPR-P17-350-COM 1500V',
            ),
            415 => 
            array (
                'id' => 1416,
                'asset_type_id' => 5,
                'name' => 'SunPower SPR-P17-355-COM 1500V',
                'manufacturer' => 'SunPower',
                'model' => 'SPR-P17-355-COM 1500V',
            ),
            416 => 
            array (
                'id' => 1417,
                'asset_type_id' => 5,
                'name' => 'SunPower SPR-X21-345',
                'manufacturer' => 'SunPower',
                'model' => 'SPR-X21-345',
            ),
            417 => 
            array (
                'id' => 1418,
                'asset_type_id' => 5,
                'name' => 'SunPower SPR-X21-335-BLK',
                'manufacturer' => 'SunPower',
                'model' => 'SPR-X21-335-BLK',
            ),
            418 => 
            array (
                'id' => 1419,
                'asset_type_id' => 5,
                'name' => 'SunPower SPR-X21-345',
                'manufacturer' => 'SunPower',
                'model' => 'SPR-X21-345',
            ),
            419 => 
            array (
                'id' => 1420,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL240P-29b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL240P-29b',
            ),
            420 => 
            array (
                'id' => 1421,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL240P-29b Zep',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL240P-29b Zep',
            ),
            421 => 
            array (
                'id' => 1422,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL245P-29b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL245P-29b',
            ),
            422 => 
            array (
                'id' => 1423,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL245P-29b Zep',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL245P-29b Zep',
            ),
            423 => 
            array (
                'id' => 1424,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL250P-29b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL250P-29b',
            ),
            424 => 
            array (
                'id' => 1425,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL250P-29b Zep',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL250P-29b Zep',
            ),
            425 => 
            array (
                'id' => 1426,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL255P-29b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL255P-29b',
            ),
            426 => 
            array (
                'id' => 1427,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL255P-29b Zep',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL255P-29b Zep',
            ),
            427 => 
            array (
                'id' => 1428,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL260P-29b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL260P-29b',
            ),
            428 => 
            array (
                'id' => 1429,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL260P-29b Zep',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL260P-29b Zep',
            ),
            429 => 
            array (
                'id' => 1430,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL260P-29b-Amp',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL260P-29b-Amp',
            ),
            430 => 
            array (
                'id' => 1431,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL265P-29b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL265P-29b',
            ),
            431 => 
            array (
                'id' => 1432,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL270D-30b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL270D-30b',
            ),
            432 => 
            array (
                'id' => 1433,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL270P-29b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL270P-29b',
            ),
            433 => 
            array (
                'id' => 1434,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL275D-30b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL275D-30b',
            ),
            434 => 
            array (
                'id' => 1435,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL280D-30b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL280D-30b',
            ),
            435 => 
            array (
                'id' => 1436,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL285D-30b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL285D-30b',
            ),
            436 => 
            array (
                'id' => 1437,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL290D-30b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL290D-30b',
            ),
            437 => 
            array (
                'id' => 1438,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL295P-35b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL295P-35b',
            ),
            438 => 
            array (
                'id' => 1439,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL300P-35b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL300P-35b',
            ),
            439 => 
            array (
                'id' => 1440,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL300P-35b 1500V',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL300P-35b 1500V',
            ),
            440 => 
            array (
                'id' => 1441,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL305P-35b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL305P-35b',
            ),
            441 => 
            array (
                'id' => 1442,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL305P-35b 1500V',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL305P-35b 1500V',
            ),
            442 => 
            array (
                'id' => 1443,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL310P-35b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL310P-35b',
            ),
            443 => 
            array (
                'id' => 1444,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL310P-35b 1500V',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL310P-35b 1500V',
            ),
            444 => 
            array (
                'id' => 1445,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL315D-36b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL315D-36b',
            ),
            445 => 
            array (
                'id' => 1446,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL315P-35b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL315P-35b',
            ),
            446 => 
            array (
                'id' => 1447,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL315P-35b 1500V',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL315P-35b 1500V',
            ),
            447 => 
            array (
                'id' => 1448,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL320D-36b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL320D-36b',
            ),
            448 => 
            array (
                'id' => 1449,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL320P-35b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL320P-35b',
            ),
            449 => 
            array (
                'id' => 1450,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL320P-35b 1500V',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL320P-35b 1500V',
            ),
            450 => 
            array (
                'id' => 1451,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL325D-36b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL325D-36b',
            ),
            451 => 
            array (
                'id' => 1452,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL330D-36b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL330D-36b',
            ),
            452 => 
            array (
                'id' => 1453,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL335D-36b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL335D-36b',
            ),
            453 => 
            array (
                'id' => 1454,
                'asset_type_id' => 5,
                'name' => 'Yingli Solar YL340D-36b',
                'manufacturer' => 'Yingli Solar',
                'model' => 'YL340D-36b',
            ),
        ));
        
        
    }
}
