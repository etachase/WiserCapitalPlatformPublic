<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asset;
use App\Models\Manufacturer;

class ManufacturerMapping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'manufacturer-mapping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mapping manufacturer from asset to manufacturer table';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (Asset::all() as $asset) {
            if (!$asset->manufacturer) {
                continue;
            }
            $manufacturer = Manufacturer::where('asset_type_id', $asset->asset_type_id)
                                ->where('name', $asset->manufacturer)->first();
            if (!$manufacturer) {
                $manufacturer = Manufacturer::create([
                    'asset_type_id'      => $asset->asset_type_id,
                    'name'               => $asset->manufacturer,
                    'yearly_sales_trend' => json_encode([
                        'yr_1_sales_trend' => '',
                        'yr_2_sales_trend' => '',
                        'yr_3_sales_trend' => '',
                    ]),
                ]);
            }
            $asset->manufacturer_id = $manufacturer->id;
            $asset->manufacturer    = '';
            $asset->save();
        }
        dd('Manufacturer updated successfully');
    }
}
