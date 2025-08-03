<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ZipCode;
use App\Models\UtilityProvider;
use App\Models\ZipCodeUtilityProvider;

class UtilityProviderZipMapping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'map:zipcode:utility';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mapping Zipcode with utility provider';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Log::info('Start mapping zipcode with utility provider');
        $files = ['utility1.csv', 'utility2.csv'];
        foreach ($files as $file) {
            \Log::info("Fetching CSV File $file");
            $this->fetchCSV(base_path("utility/$file"));
        }
    }
    
    public function fetchCSV($file)
    {
        if (!file_exists($file) || !is_readable($file)) {
            return false;
        }
        \Log::info("Opening File $file");

        $header = null;
        $data = array();
        if (($handle = fopen($file, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, ',')) !== false)
            {
                if (!$header) {
                    $header = $row;
                } else {
                    \Log::info("Get row of file $file - " . json_encode($row));
                    $this->mapZipUtility($row);
                }
            }
            fclose($handle);
        }
        return '';
    }
    /**
     * Save ZipCode and Utility Provider if not available in table then create mapping of them
     * 
     * @param array $data
     */
    public function mapZipUtility($data = [])
    {
        if (count($data) < 3) {
            return '';
        }
        
        $zipCode         = $data[0];
        $utilityProvider = $data[2];
        
        \Log::info("Find or create zipcode $zipCode");
        $zipCode = ZipCode::findOrCreateWithZip($zipCode);
        \Log::info("Fetched zipcode ". $zipCode->id);
        \Log::info("Find or create utility provider $utilityProvider");
        $utilityProvider = UtilityProvider::findOrCreateWithUtilityProvider($utilityProvider);
        \Log::info("Fetched utility provider " . $utilityProvider->id);
        if ($zipCode && $utilityProvider) {
            \Log::info("Creating mapping for zipcode and utility provider");
            $mapping = ZipCodeUtilityProvider::create([
                'zip_code_id' => $zipCode->id,
                'utility_provider_id' => $utilityProvider->id,
            ]);
            \Log::info("Created Mapping ". $mapping->id);
        }
        return '';
    }
}
