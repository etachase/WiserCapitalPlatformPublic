<?php

namespace App\Support;

use App\Models\Asset;

class HFHelper 
{
    const FIRST_TAB          = 'project-tab1';
    const ASSET_MODULE   = 'module';
    const ASSET_INVERTER = 'inverter';
    
    public function createView($data = array())
    {
        return [
            'page_title' => 'Preliminary Facility Information',
            'page_description' => '',
            'yes_no'=> Dropdown::$yes_no,
            'system_location' => Dropdown::$system_location,
            'ongoing_system_cost' => Dropdown::$ongoing_system_cost,
            'interest_in_property' => Dropdown::$interest_in_property,
            'facility_types' =>  Dropdown::$facility_types,
            'interconnection_type' => Dropdown::$interconnection_type,
            'renewable_incentive' => Dropdown::$renewable_incentive,
            'status_project_permit' => Dropdown:: $status_project_permit,
            'ongoing_other_type'  => Dropdown::$ongoing_other_type,
            'name' => $data['name']
        ];
    }
    
    public function editView($data = array())
    {
        $site     = $data['site'];
        $metas    = $site->getMeta();
        $s3helper = new S3Helper;
        return [
            'page_title' => 'Facility Information',
            'page_description' => '',
            'yes_no'=> Dropdown::$yes_no,
            'site'=> $site,
            'metas' => $metas,
            'active_tab' => !empty($data['active_tab']) ? $data['active_tab'] : self::FIRST_TAB,
            'project_tabs' => Dropdown::$project_tabs,
//            'uploaded_files' => $s3helper->getAllUploadedFiles($metas),
            'system_location' => Dropdown::$system_location,
            'ongoing_system_cost' => Dropdown::$ongoing_system_cost,
            'ongoing_other_type'  => Dropdown::$ongoing_other_type,
            'years_in_business' => Dropdown::$years_in_business,
            'public_debt_rating' => Dropdown::$public_debt_rating,
            'interconnection_study_status' => Dropdown::$interconnection_study_status,
            'support_solar_array' => Dropdown::$support_solar_array,
            'status_project_permit' => Dropdown:: $status_project_permit,
            'interest_in_property' => Dropdown::$interest_in_property,
            'roof_material' => Dropdown::$roof_material,
            'facility_types' =>  Dropdown::$facility_types,
            'agreement_types' =>  Dropdown::$agreement_types,
            'interconnection_type' => Dropdown::$interconnection_type,
            'standardized_documents' => Dropdown::$standardized_documents,
            'mortgage_amount' => Dropdown::$mortgage_amount,
            'roof_material' => Dropdown::$roof_material,
            'roof_condition' => Dropdown::$roof_condition,
            'roof_year' => Dropdown::$roof_year,
            'soil_type' => Dropdown::$soil_type,
            'project_stage' => Dropdown::$project_stage,
            'permanent_fall_protection' => Dropdown::$permanent_fall_protection,
            'trackers' => Dropdown::$trackers,
            'terrain' => Dropdown::$terrain,
            'wsar_status' => Dropdown::$wsar_status,
            'type_of_construction' => Dropdown::$type_of_construction,
            'type_of_business' => Dropdown::$type_of_business,
            'modules' => Asset::getListByAssetTypeId(5), //@todo this shouldn't be id
            'inverters' => Asset::getListByAssetTypeId(2),
            'racking' => Asset::getListByAssetTypeId(4), //@todo this shouldn't be id
            'tracking' => Dropdown::$tracking,
            'monitoring_system' => Dropdown::$monitoring_system,
            'solar_installer' => $data['solar_installer'],
            'WSAR' => $data['WSAR'],
            'renewable_incentive' => Dropdown::$renewable_incentive,
            'ongoing_sys_error' => $data['error'],
            'error_messages'    => Dropdown::$edit_preliminary_information_error_messages,
            'height_of_fence'	=> Dropdown::$height_of_fence,
            'volatility_of_industry' => Dropdown::$volatility_of_industry,
            'SDNA' => Dropdown::$SDNA
        ];
    }
}
