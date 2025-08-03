<?php 
namespace App\Support;

use App\Models\Role;
	
class Dropdown {
    
    const CREATE_PROJECT_STEP_1 = "Map";
    const CREATE_PROJECT_STEP_2 = "System Information";
    const CREATE_PROJECT_STEP_3 = "Incentives";
    const CREATE_PROJECT_STEP_4 = "Utility";
    
		const YES = 1;
		const NO = 0;
	  	public static $yes_no = [self::YES => 'Yes', self::NO => 'No'];
                
                const UTILITY_DONT_KNOW = '10';
                public static $utility_dont_know = [self::UTILITY_DONT_KNOW => 'I don\'t know'];
                const DOLLAR  = '$';
                const PERCENT = '%';
                
                const FIT_SIGNED_POWER_PURCHASE_AGREEMENT = 'Executed FIT Agreement';
                const FIT_SIGNED_SITE_LEASE = 'Signed Site Lease (if not included in FIT Agreement)';
                const NON_FIT_SIGNED_POWER_PURCHASE_AGREEMENT = 'Pre-Existing Power Purchase Agreement (PPA)';
                const NON_FIT_SIGNED_SITE_LEASE = 'Pre-Existing Signed Site Lease (if not included in PPA)';
                
                public static $ongoing_other_type = [self::DOLLAR => self::DOLLAR];
                
                public static $project_tabs = [
                    'project-tab1', 
                    'project-tab2', 
                    'project-tab3', 
                    'project-tab4', 
                    'project-tab5', 
                    'project-tab6', 
                    'project-tab7', 
                    'project-tab8', 
                    'project-tab9', 
                    'project-tab10', 
                    'project-tab11', 
                    'project-tab12', 
                    'project-tab13', 
                ];

		const FACILITY_COMMERCIAL = 10;
		const FACILITY_NONPROFIT= 20;
		const FACILITY_HOA = 30;
		const FACILITY_OTHER = 40;
		const FACILITY_GOVERMENT= 50;
                
                // monitoring system constant
		const MONITORING_SYSTEM_LOCUS= 10;
		const MONITORING_SYSTEM_ENPHASE= 20;
		const MONITORING_SYSTEM_OTHER= 30;
		const MONITORING_SYSTEM_NO= 40;
        
        const NONE = 'none';
        const NON_LISTED_TEXT = 'Not Listed';

          
                
                // tracking constant
                const TRACKING_FIXED = 1;
                const TRACKING_SINGLE_AXIS = 2;
                const TRACKING_DUAL_AXIS = 3;
                const TRACKING_NONE = 4;
                
                const AGREEEMENT_NOT_EXECUTED = 'not executed';
                const AGREEEMENT_UNDER_REVIEW = 'under review';
                const AGREEEMENT_EXECUTED     = 'executed';
                
         
         //agreement types
         const PPA = 1;
         const FIT = 3;
         const OPERATING_LEASE = 2;
                
                
                public static $agreement_status = [
                    self::AGREEEMENT_NOT_EXECUTED => 'Not Executed',
                    self::AGREEEMENT_UNDER_REVIEW => 'Under Review',
                    self::AGREEEMENT_EXECUTED     => 'Executed',
                ];
                
		public static $facility_types 				= [
			self::FACILITY_COMMERCIAL => 'Commercial',
			self::FACILITY_NONPROFIT  => 'Non-profit',
			self::FACILITY_GOVERMENT  => 'Government',
			self::FACILITY_HOA        => 'HOA',
			self::FACILITY_OTHER      => 'Other'
		];
		
		public static $agreement_types = [
			self::PPA => 'PPA',
			self::FIT => 'FIT',
			self::OPERATING_LEASE  => 'Operating Lease'
		];
		
		

		const UTILITY_SCE = 10;
		const UTILITY_PGE= 20;
		const UTILITY_LADWP = 30;
		const UTILITY_SDGE = 40;
		const UTILITY_LODI = 50;
		const UTILITY_OTHER = 60;
		public static $utility_providers			= [
			self::UTILITY_SCE => 'SCE',
			self::UTILITY_PGE => 'PGE',
			self::UTILITY_LADWP => 'LADWP',
			self::UTILITY_SDGE => 'SDG&E',
			self::UTILITY_LODI => 'Lodi',
			self::UTILITY_OTHER => 'Other'
		];
		
                public static $utility_providers_name = [
                    
                    self::UTILITY_SCE   => 'Southern California Edison Co',
                    self::UTILITY_PGE   => 'Pacific Gas & Electric Co',
                    self::UTILITY_LADWP => 'Los Angeles Department of Water & Power',
                    self::UTILITY_SDGE  => 'San Diego Gas & Electric Co',
                    self::UTILITY_LODI  => 'City of Lodi, California (Utility Company)'
                ];
		
		//NEM, Off Grid, VNEM, FIT, Other.
		const INTERCONNECTION_NEM = 1;
		const INTERCONNECTION_OFFGRID = 2;
		const INTERCONNECTION_VNEM = 3;
		const INTERCONNECTION_FIT = 4;
		const INTERCONNECTION_OTHER = 5;
		public static $interconnection_type	= [
			self::INTERCONNECTION_NEM => 'NEM',
			self::INTERCONNECTION_OFFGRID => 'Off Grid',
			self::INTERCONNECTION_VNEM => 'VNEM',
			self::INTERCONNECTION_FIT => 'FIT',
			self::INTERCONNECTION_OTHER => 'Other'
		];

		
		
		
		public static $system_location = [
			10 => 'Roof',
			20 => 'Ground',
			30 => 'Carport',
			40 => 'Shade Structure',
			50 => 'Other'
		];

		const ONGOING_NONE = 10;
		const ONGOING_LANDLEASE= 20;
		const ONGOING_PROPERTYTAX = 30;
		const ONGOING_OTHER = 40;
		public static $ongoing_system_cost = [
			self::ONGOING_NONE => 'None',
			self::ONGOING_LANDLEASE => 'Land Lease',
			self::ONGOING_PROPERTYTAX => 'Property Tax Rate (%)',
			self::ONGOING_OTHER => 'Other'
		];
		
		const INTEREST_OWN = 1;
		const INTEREST_RENT = 2;
		const INTEREST_OWN_LEASE = 3;
		public static $interest_in_property	= [self::INTEREST_OWN => 'Own', self::INTEREST_OWN_LEASE => 'Own, Lease', self::INTEREST_RENT => 'Rent'];	
			
		public static $years_in_business = [10 => '0-5', 20 => '5-10', 30 => '10+'];
		
		
		public static $public_debt_rating = [
			1 => 'S&P BBB or better',
			2 => 'Fitch BBB or better',
			3 => 'Moody\'s BAA or better',
			5 => 'Other' //don't change id, tied to hide/show in view
		];
		
		public static $mortgage_amount = [
			10 => 'I don\'t know', 
			20 => '$4.5-$5m', 
			30 => '$4-$4.5m', 
			40 => '$3.5-$4m', 
			50 => '$3-$3.5m', 
			60 => '$2.5-$3m', 
			70 => '$2-$2.5m', 
			80 => '$1.5-$2m',
			90 => '$500k-$1m', 
			100 => '$100k-$500k',
			110 => '<$100k',
			120 => '$0',
			130 => '>$5m'
		];
		
		public static $interconnection_study_status = [
			1 => 'Interconnection studies completed or waived by local utility',
			2 => 'Interconnection agreements are waived or available and fees are known',
			3 => 'Interconnection requirements and costs are unknown'
		];
		
		
		
		
		
		public static $roof_material = [
			'Tar & Gravel' => [
				10 => 'Heat Sealed',
				20 => 'Multi-course tar paper',
				30 => 'Liquid Coating'				
			],
			'Shingle' =>
			[
				40 => 'Wood Shake',
				50 => 'Asphalt Composite',
				60 => "Concrete"
			],
			'Single Membrane' =>
			[
				70 => 'Naked',
				80 => 'Silverized'
			],
			'Metal' => 
			[
				90 => 'Standing seam, Stainless or copper',
				100 => 'Galvanized'
			],
			'Red Tile' =>
			[
				110 => 'Single tile',
				120 => 'Double tile',
				130 => 'Multi-course tile'
					
			],
			'Not in List?' =>
			[
				140 => 'Other'	
			]
		];
		
		public static $roof_condition = [
			10 => 'Remaining roof life is equal to or exceeds 20 years',
			30 => 'Roof will need to be repaired before system installation',
			40 => 'Roof will need to be replaced before system installation',
			20 => 'Remaining roof life not known',			
		];
		
		
		
		public static $monitoring_system = [
			self::MONITORING_SYSTEM_LOCUS   => 'Locus',
			self::MONITORING_SYSTEM_ENPHASE => 'Enphase Enlighten',
			self::MONITORING_SYSTEM_OTHER   => 'Other',
			self::MONITORING_SYSTEM_NO      => 'None',			
		];
		public static $support_solar_array = [
			1 => 'Yes, both',
			2 => 'I have structural drawings only',
			3 => 'I have plans only',
			4 => 'None',
		];
		
		
		public static $roof_year = [
			10 => '5 years',
			20 => '55 - 60 years',
			30 => '50 - 55 years',
			40 => '45 - 50 years',
			50 => '40 - 45 years',
			60 => '35 - 40 years',
			70 => '30 - 35 years',
			80 => '25 - 30 years',
			90 => '20 - 25 years',
			100 => '15 - 20 years',
			110 => '10 - 15 years',
			120 => '5 - 10 years',
			130 => '> 60 years'			
		];
		
		public static $soil_type = [
			1 => "Sandy/Clay",
			2 => "Rocky",
			3 => 'Bedrock',
			4 => 'Unknown'
		];
		
		
		public static $status_project_permit = [
			1 => "Permits in hand with no risk of delay or denial",
			2 => "Permits in process but not yet approved",
			3 => 'Permit risks and costs are minimal and known',
			4 => 'Permitting issues are unknown or uncertain'
		];
		
		
		public static $project_stage = [
			10 => "Engineering",
			20 => "Pre-Construction/Shovel Ready",
			30 => 'Under Construction',
			40 => "Operational"				
		];
		
		public static $permanent_fall_protection = [
			10 => "No",
			20 => "Parapets",
			30 => 'Railing with tie-offs',
			40 => "Other"
		];
		
		public static $volatility_of_industry = [
			10 => "High Risk",
			20 => "Medium Risk",
			30 => 'Low Risk'
		];
		
		public static $standardized_documents = [
			1 => 'Yes', 
			2 => 'No, using outside docs, they have been internally approved', 
			3 => 'No'
		];
		
		
		public static $trackers = [
			10 => 'No',
			20 => 'Yes - Gear driven',
			30 => "Yes - hydraulic driven",
			40 => "Other" // don't delete or change ID , used in front-end validation
		];
		
		public static $terrain = [
			10 => "Grassy",
			20 => "Tall weeds",
			30 => "Agriculture",
			40 => "Desert",
			50 => "Dirt",
			60 => 'Concrete',
			70 => 'Other' // don't delete or change ID , used in front-end validation
		];
		
		public static $type_of_construction = [
			'Frame' => [
				10 => 'Frame'				
			],
			'Joisted Masonry' =>
			[
				20 => ' Masonry/concrete sides with frame roof'
			],
			'Non-combustible' =>
			[
				30 => 'Metal walls and roofing'			
			],
			'Masonry Non-combustible' => 
			[
				40 => 'Masonry/Concrete walls with metal roof supports. Metal or membrane roof',
			],
			'Modified Fire-Restitive' =>
			[
				50 => 'Materials have a fire rating of at least 1 hour'
			],
			'Fire Restistive' =>
			[
				60 => 'Materials have a fire rating greater than 3 hours'	
			]
		];
		
		public static $type_of_business = [
			1 => "Real Estate",
			2 => "Manufacturing",
			3 => "Distribution",
			4 => "Agriculture",
			5 => "Retail",
			6 => "Service",
			7 => "Construction",
			8 => "Nonprofit",
			9 => "Public Entities"		
		];
		
		
		public static $wsar_status = [
			1 => 'Green Check', 
			2 => 'Red X', 
			3 => 'Red I'
		];
        
     
        
        public static $tracking = [
			self::TRACKING_FIXED => 'Fixed', 
			self::TRACKING_SINGLE_AXIS => 'Single-Axis', 
			self::TRACKING_DUAL_AXIS => 'Dual-Axis',
			self::TRACKING_NONE => 'None'
		];
		
		public static $SDNA = [
			10 => 'Uploaded & Approved',
			20 => 'Requirement for SNDA has been reviewed and waived by WC credit team',
			30 => 'No, requirement not waived'
		];
		
		


		
		public static $height_of_fence = [
			1 => '1 feet',
			2 => '2 feet',
			3 => '3 feet',
			4 => '4 feet',
			5 => '5 feet',
			6 => '6 feet',
			7 => '7 feet',
			8 => '8 feet',
			9 => '9 feet',
			10 => '10 feet',
			11 => '11 feet',
			12 => '12 feet',
			13 => '13 feet',
			14 => '14 feet',
			15 => '15 feet',
			16 => '16 feet',
			17 => '17 feet',
			18 => '18 feet',
			19 => '19 feet',
			20 => '20 feet'
		];
		
		public static $user_roles = [
            Role::TYPE_INVESTOR => 'Investor', 
//            Role::TYPE_HOST_FACILITIES => 'Host Facility', 
            Role::TYPE_SOLAR_INTEGRATOR => 'Solar Installer'
        ];
        
        
        //do search replace on
        //RENEWABLE_DC
        //RENEWABLE_AC
        //RENEWABLE_SREC

        const INCENTIVE_NO      = 1;
        const INCENTIVE_KWDC    = 2;
        const INCENTIVE_KWHAC   = 3;
        const INCENTIVE_KWHDC   = 4; //new
        const INCENTIVE_KWAC    = 5; //new
        const INCENTIVE_NJ_SREC = 6; //new
        const INCENTIVE_PA_SREC = 7; //new
        const INCENTIVE_MD_SREC = 8; //new
        const INCENTIVE_MA_SREC = 9; //new
		
        
        public static $renewable_incentive = [
            self::INCENTIVE_NO => 'No', 
            self::INCENTIVE_KWDC => 'Yes $/kW DC',
            self::INCENTIVE_KWAC => 'Yes $/kW AC',
            self::INCENTIVE_KWHAC => 'Yes $/kWh AC',
            self::INCENTIVE_KWHDC => 'Yes $/kWh DC',
            self::INCENTIVE_NJ_SREC => 'Yes NJ SREC',
            self::INCENTIVE_PA_SREC => 'Yes PA SREC',
            self::INCENTIVE_MD_SREC => 'Yes MD SREC',
            self::INCENTIVE_MA_SREC => 'Yes MA SREC',
        ];
        
        // SREC Mapping
        public static $srec_mapping = [
            self::INCENTIVE_NJ_SREC => 'NJ-SREC-year-',
            self::INCENTIVE_PA_SREC => 'PA-SREC-year-',
            self::INCENTIVE_MD_SREC => 'MD-SREC-year-',
            self::INCENTIVE_MA_SREC => 'MA-SREC-year-',
        ];
        
        const PRELIMINARY_PPA_QUOTE = 10;
        const PRELIMINARY_PROPOSAL_REVIEW = 20;
        const LOI_EXECUTED = 30;
        const INITIAL_UNDERWRITING = 40;
        const SITE_LEASE_EXECUTED = 50;
        const FINAL_UNDERWRITING = 60;
        const UNDER_CONSTRUCTION = 70;
        const OPERATIONAL = 80;


		
        public static $site_status = [
                self::PRELIMINARY_PPA_QUOTE => 'Preliminary PPA Quote',
                self::PRELIMINARY_PROPOSAL_REVIEW => 'Preliminary Proposal Review',
                self::LOI_EXECUTED => 'LOI Executed',
                self::INITIAL_UNDERWRITING => 'Initial Underwriting',
                self::SITE_LEASE_EXECUTED => 'PPA and Site Lease Executed',
                self::FINAL_UNDERWRITING => 'Final Underwriting',
                self::UNDER_CONSTRUCTION => 'Under Construction',
                self::OPERATIONAL => 'Operational'			
        ];
		
        public static $ppa_optimization_loading_phases = [
            'loading_messages' => [
                'Waiting for Phase 1 to complete',
                'Waiting for Phase 2 to complete',
                'Waiting for Final Optimization to complete',
            ],
            'completed_messages' => [
                'Phase 1 Calculations Complete',
                'Phase 2 Calculations Complete',
                'Final Optimization Complete',
            ],
            'percentage' => ['50%', '75%', '100%']
        ];
        
        public static $edit_preliminary_information_error_messages = [
            'interconnection_type'  => '“FIT” Interconnection Type',
            'signed_site_lease'     => '“YES” Signed Site Lease',
            'signed_power_purchase_agreement'  => '“YES” Signed Power Purchase Agreement',
            'ongoing_system_cost'   => 'Property Cost other than “NONE”',
            'contact_us'   => 'Contact us at projects@wisercapital.com or 805-899-3400',
        ];
}

?>
