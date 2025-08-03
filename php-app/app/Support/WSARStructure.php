<?php 
namespace App\Support;
	
class WSARStructure 
{
    /**
     * ####### This is the array of WSAR Score of any site ########
     * In this array the keys stand for the method which will be defined in the app\support\WSAR.php
     * Also the keys in the "items" index stand for a method(defined in the app\support\WSAR.php) 
     * used to get value for the corresponding key.
     * "name" key stands for the Title of the item
     * "score" defines the total score out of which the item is score e.g 5/10
     * 
     * @var type 
     */
    public static $wsar_score_structure = [
        'offtakerCreditworthiness' => [
            'name'  => 'Offtaker Creditworthiness',
            'score' => 400,
            'items' => [
                'businessFinancialStrength' => [
                    'name'  => 'Business Financial Strength',
                    'score' => 200
                ],
                'historyLongtermViability' => [
                    'name'  => 'History & Long Term Viability',
                    'score' => 175
                ],
                'offtakerEconomicGains' => [
                    'name'  => 'Offtaker Economic Gains',
                    'score' => 25
                ]
            ]
        ],
        'systemPerformance' => [
            'name'  => 'System Performance',
            'score' => 200,
            'items' => [
                'panelWarranty' => [
                    'name'  => 'Panel Manufacturer Warranty',
                    'score' => 60
                ],
                'panelManufacturerFinancialStrength' => [
                    'name'  => 'Panel Manufacturer Financial Strength',
                    'score' => 50
                ],
                'inverterWarranty' => [
                    'name'  => 'Inverter Warranty',
                    'score' => 25
                ],
                'inverterManufacturerFinancialStrength' => [
                    'name'  => 'Inverter Manufacturer Financial Strength',
                    'score' => 20
                ],
                'rackingTrackingManufacturerWarranty' => [
                    'name'  => 'Racking and Tracking Warranty',
                    'score' => 10
                ],
                'rackingTrackingManufacturerFinancialStrength' => [
	                'name' => 'Racking and Tracking Financial Strength',
	                'score' => 10
                ],
                'monitoringServices' => [
                    'name'  => 'Monitoring Services',
                    'score' => 25
                ]
            ]
        ],
        'EPCCreditworthiness' => [
	            'name'  => 'EPC Creditworthiness',
            'score' => 50,
            'items' => [
                'EPCfinancialsWorkExperience' => [
                    'name'  => 'EPC Financials & Work Experience',
                    'score' => 35
                ],
                'certificateGoodStanding' => [
                    'name'  => 'Certificate of Good Standing',
                    'score' => 5
                ],
                'workersCompensationGeneralLiabilityBonding' => [
                    'name'  => 'Workers Compensation, General Liability, Bonding',
                    'score' => 10
                ],
            ]
        ],
        'legalPolicy' => [
            'name'  => 'Legal and Policy',
            'score' => 200,
            'items' => [
	            'standardizedDocuments' => [
		          'name' => 'Standardized Documents',
		          'score' => 25  
	            ],
	            'projectPermitting' => [
                    'name'  => 'Project Permitting',
                    'score' => 15
                ],
                'interconnectionStudyStatus' => [
                    'name'  => 'Utility Interconnection Process',
                    'score' => 15
                ],
                'interestInProperty' => [
                    'name'  => 'Interest in Property',
                    'score' => 20
                ],
                'projectOfftakerFireCasualtyInsurance' => [
                    'name'  => 'Project & Offtaker Fire & Casualty Insurance',
                    'score' => 10
                ],                
                'SNDAReviwedWaived' => [
                    'name'  => 'SDNA',
                    'score' => 50
                ],
                'titleInsuranceLienRightsRoofPenetrationInsurance' => [
                    'name'  => 'Title, Lien or Roof Penetration Insurance',
                    'score' => 20
                ],
                'publicPolicyRateRisks' => [
                    'name'  => 'Public Policy & Rate Risks',
                    'score' => 20
                ],
                'certifiedRoofingStudySoilConditions' => [
	              'name' => 'Certified Roofing Study OR Soil Conditions',
	              'score' =>   10
                ],
                'structuralDrawingsorPlans' => [
                    'name'  => 'Structural Engineering',
                    'score' => 15
                ]
                
            ]
        ],
        'servicingAdministration' => [
            'name'  => 'Servicing and Administration',
            'score' => 50,
            'items' => [
                'OM' => [
                    'name'  => 'O&M',
                    'score' => 15
                ],
                'servicingRisk' => [
                    'name'  => 'Servicing Risk',
                    'score' => 15
                ],
                'sequesteredAccount' => [
                    'name'  => 'Sequestered Account',
                    'score' => 10
                ],
                'businessInteruptionInsurance' => [
                    'name'  => 'Business Interruption Insurance',
                    'score' => 10
                ],
            ]
        ],
        'transactionalOverview' => [
            'name'  => 'Transactional Overview',
            'score' => 100,
            'items' => [
                'DSCR' => [
                    'name'  => 'DSCR',
                    'score' => 30
                ],
                 'debtToProjectValue' => [
                    'name'  => 'Debt To Project Value',
                    'score' => 40
                ],
                 'debtAmmortization' => [
                    'name'  => 'Debt Ammortization',
                    'score' => 10
                ],
                 'interestRateRisk' => [
                    'name'  => 'Interest Rate Risk',
                    'score' => 20
                ]
            ]
        ],
    ];
}

?>