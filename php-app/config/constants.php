<?php

/* 
 * Use this files to create contants for various purposes like fields keys in a controller
 * Some system level variable etc
 */

return [
    'hf' => [ // file fields for the HFController
        'file_fields' => [ // names of the fields with required validations
            'file_3_years_financials' => 'max:64000',
            'file_2_years_tax_return' => 'max:64000',
            'file_subordination_non_disturbance_agreement' => 'max:64000|mimes: gif,jpg,png,jpeg,doc,docx,xls,xlsx,pdf,zip',
            'file_title_insurance' => 'max:64000|mimes: gif,jpg,png,jpeg,doc,docx,xls,xlsx,pdf,zip',
            'file_roof_penetration_warranty' => 'max:64000|mimes: gif,jpg,png,jpeg,doc,docx,xls,xlsx,pdf,zip',
            'file_12_months_utility_bill' => 'max:64000',
            'file_roof_warranty' => 'max:64000',
            'file_fit_agreement' => 'max:64000',
            'file_signed_site_lease'   => 'max:64000',
            'file_support_solar_array' => 'max:64000',
            'file_system_production_modelling' => 'max:64000',
            'file_certified_roofing_study_remaining_life_year' => 'max:64000',
            'file_green_button' => 'file_green_button',
        ],
        'file_fields_mapping' => [
            'file_12_months_utility_bill' => [
                'file_name'   => 'uploaded_files_utility_bill_27'
            ],
            'file_fit_agreement' => [
                'file_name'   => 'uploaded_files_fit_agreement_32'
            ],
            'file_signed_site_lease' => [
                'file_name'   => 'uploaded_files_signed_site_lease_33'
            ],
            'file_support_solar_array' => [
                'file_name'   => 'uploaded_files_structural_drawings_or_plans_28'
            ],
            'file_roof_warranty' => [
                'file_name'   => 'uploaded_files_roof_warranty_29'
            ],
            'file_3_years_financials' => [
                'file_name'   => 'offtaker_creditworthiness_financials_financials_30'
            ],
            'file_system_production_modelling' => [
                'file_name'   => 'system_performance_engineering_designs_5'
            ],
            'file_2_years_tax_return' => [
                'file_name'   => 'offtaker_creditworthiness_financials_tax_return_31'
            ],
            'file_subordination_non_disturbance_agreement' => [
                'file_name'   => 'legal_policy_permitting_18'
            ],
            'file_title_insurance' => [
                'file_name'   => 'offtaker_creditworthiness_insurance_2'
            ]
        ],
        'agreements' => [
            'file_name_mapping' => [ // Pretty names for file templates used in Data room action
                'loi' => 'Letter of Intent',
                'ota' => 'Off-Take Agreement ',
                'scl' => 'Site Control Lease',
                'epc' => 'EPC Agreement',
                'inc' => 'Incentives',
                'oth' => 'Other',
            ], 
            'file_title_mapping' => [ // Pretty names for file templates used in Data room action
                'loi' => [
                    'is_file' => 0,
                    'name'    => 'Sample LOI',
                ],
                'ota' => [
                    'is_file' => 0,
                    'name'    => 'Sample PPA_CA'
                ],
                'scl' => [
                    'is_file' => 'General_SiteLease_Template51415_JAS',
                    'name'    => 'Sample Site Lease'
                ],
                'epc' => [
                    'is_file' => 0,
                    'name'    => 'Sample Solar Construction Contract'
                ],
                'inc' => [
                    'is_file' => 0,
                    'name'    => ''
                ],
                'oth' => [
                    'is_file' => 0,
                    'name'    => ''
                ],
            ], 
        ],
        
        // data rooms item name
        'data-room' => [
            'old_file_fields_mapping' => [
                'root_user_uploads'                         => 'uploaded_files_utility_bill_27',
                'exhibit_a_single_line_drawings'            => 'system_performance_engineering_designs_5',
                'exhibit_a_engineering_drawings'            => 'system_performance_engineering_designs_5',
                'exhibit_a_system_production_modeling'      => 'system_performance_engineering_designs_5',
                'exhibit_a_electrical_permit'               => 'legal_policy_permitting_18',
                'exhibit_a_building_permit'                 => 'legal_policy_permitting_18',
                'exhibit_a_interconnection_approval'        => 'legal_policy_interconnect_17',
                'exhibit_a_interconnection_application'     => 'legal_policy_interconnect_17',
                'exhibit_a_structural_engineer_approval'    => 'system_performance_engineering_designs_5',
                'exhibit_a_additional'                      => 'system_performance_additional_9',
                'exhibit_b_panel_warranty'                  => 'system_performance_panel_details_7' ,
                'exhibit_b_panel_financials'                => 'system_performance_panel_details_7' ,
                'exhibit_b_inverter_warranty'               => 'system_performance_inverter_details_6',
                'exhibit_b_inverter__financials'            => 'system_performance_inverter_details_6',
                'exhibit_b_racking_information'             => 'system_performance_racking_tracking_details_8',
                'exhibit_b_additional'                      => 'system_performance_additional_9',
                'exhibit_c_financials'                      => 'offtaker_creditworthiness_financials_financials_30',
                'exhibit_c_tax_returns'                     => 'offtaker_creditworthiness_financials_tax_return_31',
                'exhibit_c_additional'                      => 'offtaker_creditworthiness_additional_3',
                'exhibit_d_host_facility_insurance'         => 'offtaker_creditworthiness_insurance_2',
                'exhibit_d_host_facility_title'             => 'legal_policy_title_20',
                'exhibit_c_snda'                            => 'legal_policy_permitting_18',
                'exhibit_d_additional'                      => 'legal_policy_additional_21',
                'exhibit_e_operations_&_maintenance_contract' => 'servicing_admin_operations_maintenance_22',
                'exhibit_e_additional'                      => 'servicing_admin_additional_23',
                'exhibit_f_spe_formation_document'          => 'legal_policy_spe_19',
                'exhibit_f_additional'                      => 'closing_additional_26',
                'exhibit_g_index'                           => 'closing_index_25',
                'exhibit_g_closing_documents'               => 'closing_closing_documents_24',
                'exhibit_f_ucc'                             => 'closing_additional_26',
                'system_integrator_system_integrator_financials'    => 'epc_creditworthiness_financials_11',
                'system_integrator_system_integrator_insurance'     => 'epc_creditworthiness_insurance_12',
                'system_integrator_system_integrator_certificate_of_good_standing'  => 'epc_creditworthiness_cert_good_standing_10',
                'system_integrator_system_integrator_project_references'            => 'epc_creditworthiness_project_references_13',
                'system_integrator_additional'              => 'epc_creditworthiness_additional_14',
            ],
            // Pretty names for project documents used in Data room action
            'root' => [ 
                'uploaded_files' => [
                    'is_dir' => 1,
                    'name'   => 'User Uploads', 
                ],
                'offtaker_creditworthiness' => [
                    'is_dir' => 1,
                    'name'   => 'Offtaker Creditworthiness', 
                ],
                'system_performance' => [
                    'is_dir' => 1,
                    'name'   => 'System Performance'
                ], 
                'epc_creditworthiness' => [
                    'is_dir' => 1,
                    'name'   => 'EPC Creditworthiness'
                ], 
                'legal_policy' =>  [
                    'is_dir' => 1,
                    'name'   => 'Legal & Policy'
                ],
                'servicing_admin' => [
                    'is_dir' => 1,
                    'name'   => 'Servicing & Admin'
                ], 
                'closing' =>  [
                    'is_dir' => 1,
                    'name'   => 'Closing'
                ],
            ],
            
            'uploaded_files' => [
                'uploaded_files_roof_warranty_29' => [
                    'is_dir' => 0,
                    'name' => 'Roof Warranty'
                ],
                'uploaded_files_structural_drawings_or_plans_28' => [
                    'is_dir' => 0,
                    'name' => 'Structural Drawings or Plans'
                ],
                'uploaded_files_utility_bill_27' => [
                    'is_dir' => 0,
                    'name' => 'Utility Bills'
                ],
            ],

            // Pretty names for offtaker creditworthiness used in Data room action
            'offtaker_creditworthiness' => [ 
                'offtaker_creditworthiness_financials' => [
                    'is_dir' => 1,
                    'name' => 'Financials'
                ],
                'offtaker_creditworthiness_insurance_2' => [
                    'is_dir' => 0,
                    'name' => 'Insurance'
                ],
                'offtaker_creditworthiness_additional_3' => [
                    'is_dir' => 0,
                    'name' => 'Additional'
                ],
            ],
            // Pretty names for offtaker creditworthiness used in Data room action
            'offtaker_creditworthiness_financials' => [ 
                'offtaker_creditworthiness_financials_financials_30' => [
                    'is_dir' => 0,
                    'name' => 'Financials'
                ],
                'offtaker_creditworthiness_financials_tax_return_31' => [
                    'is_dir' => 0,
                    'name' => 'Tax Return'
                ],
            ],
            // Pretty names for system performance used in Data room action 
            'system_performance' => [ 
                'system_performance_construction_timeline_4' => [
                    'is_dir' => 0,
                    'name' => 'Construction Timeline'
                ],
                'system_performance_engineering_designs_5' => [
                    'is_dir' => 0,
                    'name' => 'Engineering & Designs'
                ],
                'system_performance_inverter_details_6' => [
                    'is_dir' => 0,
                    'name' => 'Inverter Details'
                ],
                'system_performance_panel_details_7' => [
                    'is_dir' => 0,
                    'name' => 'Panel Details'
                ],
                'system_performance_racking_tracking_details_8' => [
                    'is_dir' => 0,
                    'name' => 'Racking/Tracking Details'
                ],
                'system_performance_additional_9' => [
                    'is_dir' => 0,
                    'name' => 'Additional'
                ]
            ], 
            // Pretty names for epc creditworthiness used in Data room action
            'epc_creditworthiness' => [ 
                'epc_creditworthiness_cert_good_standing_10' => [
                    'is_dir' => 0,
                    'name' => 'Certificate of Good Standing'
                ],
                'epc_creditworthiness_financials_11' => [
                    'is_dir' => 0,
                    'name' => 'Financials'
                ],
                'epc_creditworthiness_insurance_12' => [
                    'is_dir' => 0,
                    'name' => 'Insurance'
                ],
                'epc_creditworthiness_project_references_13' => [
                    'is_dir' => 0,
                    'name' => 'Project References'
                ],
                'epc_creditworthiness_additional_14' => [
                    'is_dir' => 0,
                    'name' => 'Additional'
                ]
            ], 
            // Pretty names for legal policy used in Data room action
            'legal_policy' => [ 
                'legal_policy_feasibility_studies_15' => [
                    'is_dir' => 0,
                    'name' => 'Feasibility Studies'
                ],
                'legal_policy_incentives_16' => [
                    'is_dir' => 0,
                    'name' => 'Incentives'
                ],
                'legal_policy_interconnect_17' => [
                    'is_dir' => 0,
                    'name' => 'Interconnect'
                ],
                'legal_policy_permitting_18' => [
                    'is_dir' => 0,
                    'name' => 'Permitting'
                ],
                'legal_policy_spe_19' => [
                    'is_dir' => 0,
                    'name' => 'SPE'
                ],
                'legal_policy_title_20' => [
                    'is_dir' => 0,
                    'name' => 'Title'
                ],
                'legal_policy_additional_21' => [
                    'is_dir' => 0,
                    'name' => 'Additional'
                ]
            ],
            // Pretty names for servicing admin used in Data room action 
            'servicing_admin' => [
                'servicing_admin_operations_maintenance_22' => [
                    'is_dir' => 0,
                    'name' => 'O&M'
                ],
                'servicing_admin_additional_23' => [
                    'is_dir' => 0,
                    'name' => 'Additional'
                ]
            ],  
            // Pretty names for closing used in Data room action
            'closing' => [ 
                'closing_closing_documents_24' => [
                    'is_dir' => 0,
                    'name' => 'Closing Document'
                ],
                'closing_index_25' => [
                    'is_dir' => 0,
                    'name' => 'Index'
                ],
                'closing_additional_26' => [
                    'is_dir' => 0,
                    'name' => 'Additional'
                ]
            ],              
            'parent_file_fields_mapping' => [
                'offtaker_creditworthiness_insurance_2'         => 'offtaker_creditworthiness',
                'offtaker_creditworthiness_additional_3'        => 'offtaker_creditworthiness',
                'system_performance_construction_timeline_4'    => 'system_performance',
                'system_performance_engineering_designs_5'      => 'system_performance',
                'system_performance_inverter_details_6'         => 'system_performance',
                'system_performance_panel_details_7'            => 'system_performance',
                'system_performance_racking_tracking_details_8' => 'system_performance',
                'system_performance_additional_9'               => 'system_performance',
                'epc_creditworthiness_cert_good_standing_10'    => 'epc_creditworthiness',
                'epc_creditworthiness_financials_11'            => 'epc_creditworthiness',
                'epc_creditworthiness_insurance_12'             => 'epc_creditworthiness',
                'epc_creditworthiness_project_references_13'    => 'epc_creditworthiness',
                'epc_creditworthiness_additional_14'            => 'epc_creditworthiness',
                'legal_policy_feasibility_studies_15'           => 'legal_policy',
                'legal_policy_incentives_16'                    => 'legal_policy',
                'legal_policy_interconnect_17'                  => 'legal_policy',
                'legal_policy_permitting_18'                    => 'legal_policy',
                'legal_policy_spe_19'                           => 'legal_policy',
                'legal_policy_title_20'                         => 'legal_policy',
                'legal_policy_additional_21'                    => 'legal_policy',
                'servicing_admin_operations_maintenance_22'     => 'servicing_admin',
                'servicing_admin_additional_23'                 => 'servicing_admin',
                'closing_closing_documents_24'                  => 'closing_closing',
                'closing_index_25'                              => 'closing_closing',
                'closing_additional_26'                         => 'closing_closing',
                'uploaded_files_utility_bill_27'                => 'uploaded_files',
                'uploaded_files_structural_drawings_or_plans_28'=> 'uploaded_files',
                'uploaded_files_roof_warranty_29'               => 'uploaded_files',
                'offtaker_creditworthiness_financials_financials_30' => 'offtaker_creditworthiness&offtaker_creditworthiness_financials',
                'offtaker_creditworthiness_financials_tax_return_31' => 'offtaker_creditworthiness&offtaker_creditworthiness_financials',
            ],
        ],
        /*
         * ##### This if for replacing Site specific variables #######
         * Use this for dataroom file replacement, specify the variable name
         * followed by the property name in Site model or a method Name in Site model
         * method Names are prefixed with 'getReplacement'
         */
        'document_replacements' => [
            'host-name'              => 'name',
            'host-state'             => 'hostState',
            'host-address'           => 'hostAddress',
            'system-size-DC'         => 'systemSizeDC',
            'PPA-term-year'          => 'PPATermYear',
            'Escalation-Percent'     => 'escalationPercent',
            'PPA-price'              => 'PPAPrice',
            'Production-first-year'  => 'productionFirstYear',
            'host-parcel-number'     => 'hostParcelNumber',
            'host-legal-description' => 'hostLegalDescription',
            'Date'                   => 'date',
            'Utility-name'           => 'utilityName',
            'Tariff-after-solar'     => 'PPAPrice',
            'investor-name'			 => 'investor'
        ],
        'preliminary' => [
            'name' => 'required',
            'facility_type' => 'required',
            'facility_type_other' => 'required_if:facility_type,40',
            'utility_provider' => 'required',
            'current_electric_pricing' => 'required',
            'energy_yield' => 'required',
            'system_size' => 'required',
            'system_location' => 'required|array',
            'renewable_incentive_program' => 'required',
            'interconnection_type' => 'required',
            'epc_cost' => 'required',
            'ongoing_system_cost' => 'required|array',
            'interest_in_property' => 'required',
            'tenants' => 'required',
            'signed_site_lease' => 'required',
            'incentive_dc' => 'required_if:renewable_incentive_program,2'
        ],
        'system_details' => [
            'energy_yield' => 'required|numeric',
            'system_size' => 'required|numeric',
        ],
        'electricity_price_assumptions' => [
            'current_electric_pricing' => 'required|numeric',
        ],
        'ppa' => [
            'esc' => 'required',
        ],
    ], 
    'profile' => [
        'solar_file_fields' => [
            'file_certificate_of_good_standing' => 'max:64000'
        ],
        'solar_multi_file_fields' => [
            'file_past_two_years_financials'=> 'max:64000',
        ]
    ]
];
