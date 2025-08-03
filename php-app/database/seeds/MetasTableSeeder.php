<?php

use Illuminate\Database\Seeder;

class MetasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('metas')->delete();
        
        \DB::table('metas')->insert(array (
            0 => array (
                'id' => 1,
                'type' => 'wsar_score',
                'key' => 'Project Development',
                'value' => 'Every project has development risk associated with jurisdiction, physical location, complexity, and non-stakeholder acceptance. A careful assessment of potential issues facing commercial PV projects, such as the age of a roof, shade concerns, interconnection challenges, permitting hurdles, and community aesthetics, is incorporated into the WSAR score.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            1 => array (
                'id' => 2,
                'type' => 'wsar_score',
                'key' => 'Standardized Documents',
                'value' => 'Full credit given when Wiser Capital standard PPA, Site Lease and Option Agreement are used in a transaction.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            2 => array (
                'id' => 3,
                'type' => 'wsar_score',
                'key' => 'Project Permitting',
                'value' => 'Full credit given when permits are in hand with no risk of delay or denial. Partial credit is given if permits in process but not yet approved or permits risks and costs are minimal and known. No credit given if permitting issues are unknown or uncertain.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            3 => array (
                'id' => 4,
                'type' => 'wsar_score',
                'key' => 'Utility Interconnection Process',
                'value' => 'Full credit is given when interconnection studies completed or waived by local utility or interconnection agreements are available without any additional study or fees. No credit is given when interconnection requirements and costs are unknown.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            4 => array (
                'id' => 5,
                'type' => 'wsar_score',
                'key' => 'Installer Work Experience, Financial Standing & Insurance',
                'value' => 'A Solar Integrator or Engineering, Procurement and Construction Company must meet all work experience, financial standing and insurance requirements including but not limited to: uploaded financial documents, significant solar project experience of similar size and scope as the project being proposed, certificate of good standing, appropriate insurance including workers compensation and at least $1 million in general liability, proven financial strength or ability to deliver a payment and performance bond if required.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            5 => array (
                'id' => 6,
                'type' => 'wsar_score',
                'key' => 'Certified Roofing Study',
                'value' => 'Full credit if the life of the roof is greater than the PPA term. No credit if it is less.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            6 => array (
                'id' => 7,
                'type' => 'wsar_score',
                'key' => 'Structural Engineering',
                'value' => 'Full credit for having completed the structural engineering. Credit waived if structural engineering is not required.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            7 => array (
                'id' => 8,
                'type' => 'wsar_score',
                'key' => 'Soil Conditions & Potential Risks',
                'value' => "Full credit when a hydrology report and and Environmental Report are not required or acceptable reports have been provided. Partial credit if one of the studies are required. If 'unknown', no points will be awarded.",
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            8 => array (
                'id' => 9,
                'type' => 'wsar_score',
                'key' => 'Interest in Property',
                'value' => 'Full credit given when the property is owner occupied or the lease term is longer than the PPA term.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            9 => array (
                'id' => 10,
                'type' => 'wsar_score',
                'key' => 'System Performance',
                'value' => 'At the heart of a project is the hardware that sits in the unrelenting sun to generate clean electricity. The WSAR score accesses the technical specification and manufacturer longevity of the hardware used in commercial projects.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            10 => array (
                'id' => 11,
                'type' => 'wsar_score',
                'key' => 'Panel Manufacturer Warranty',
                'value' => 'Full credit given for panels with linear warranties guaranteeing 85% of nameplate capacity for 30 years with sufficient US based financial status to stand behind the warranty.  Partial credit for shorter guarantees, staged warranties, or lower nameplate guarantees. Panels with warranties guaranteeing less than 80% of faceplate at year 20 or with inadequate financial backing will not be accepted.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            11 => array (
                'id' => 12,
                'type' => 'wsar_score',
                'key' => 'Project Specific Performance Insurance - Optional',
                'value' => 'Panel wafer manufacturer and module materials must both have a proven process greater than 5 years.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            12 => array (
                'id' => 13,
                'type' => 'wsar_score',
                'key' => 'Panel Manufacturer Performance History and Process',
                'value' => 'Acceptable historic performance of modules has been approved.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            13 => array (
                'id' => 14,
                'type' => 'wsar_score',
                'key' => 'Inverter Manufacturer Financial Strength',
                'value' => 'Full credit for manufacturers with sufficient U.S. based financial strength to stand behind warranty or provides pooled performance insurance.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            14 => array (
                'id' => 15,
                'type' => 'wsar_score',
                'key' => 'Inverter Warranty',
                'value' => 'Full credit for extended warranty. Partial credit for industry standard warranty of 10-15 years.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            15 => array (
                'id' => 16,
                'type' => 'wsar_score',
                'key' => 'Rack System & Monitoring Services',
                'value' => 'Full credit for Racking systems and Monitoring Services that have Satisfactory Performance History.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            16 => array (
                'id' => 17,
                'type' => 'wsar_score',
                'key' => 'Host Facility Creditworthiness',
                'value' => 'A careful analysis of a facility’s creditworthiness is given significant weight in determining the WSAR score. Financial statement, D&B, and BBB records are evaluated to determine the capacity and likelihood that a host facility can and will honor its commitments for the full term of the agreement.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            17 => array (
                'id' => 18,
                'type' => 'wsar_score',
                'key' => 'Business Financial Strength',
                'value' => 'Full points are given automatically to host facilities that meet the minimum public credit rating criteria. Alternatively, host shall provide audited financial reports for a minimum of two years. Wiser then undertakes a bank-like underwriting assessment gaged by liquidity, consistency of revenues, debt-to-equity ratio, current assets/current liabilities ratio, fixed-charge coverage ratio, historic performance of accounts receivable and historic profit margins.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            18 => array (
                'id' => 19,
                'type' => 'wsar_score',
                'key' => 'History & Long Term Viability',
                'value' => 'In this subsection WSAR reviews the nature of the Host’s business activity, the concentration or dependency on a limited number of clients, the long term prospects for the Host’s specific industry focus, the Host’s revenue, expenses and market share in comparison to industry norms. Additionally, this subsection will review the Host’s capacity to make a long term commitment to the occupancy of the premises and the likelihood of consistent long term power consumption patterns.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            19 => array (
                'id' => 20,
                'type' => 'wsar_score',
                'key' => 'Host Facility Savings',
                'value' => 'Points are awarded if there is strong evidence that the Host will, commencing with the first year, consistently experience a lower cost of energy as a result of the solar installation and that these cost savings are likely to increase overtime to provide a strong deterrent to a Host’s potential for payment default.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            20 => array (
                'id' => 21,
                'type' => 'wsar_score',
                'key' => 'Legal and Policy',
                'value' => 'As instruments in the heavily regulated financial and energy space, PPAs can face legal and policy challenges that change depending on the state, county, local, utility, and community regulations and standards that govern them. The WSAR score rates all potential legal and policy exposures facing a given project.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            21 => array (
                'id' => 22,
                'type' => 'wsar_score',
                'key' => 'Project Fire & Casualty Risk',
                'value' => 'Full credit given when all the Wiser Capital insurance requirements for property and casualty, and environmental risk have been met.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            22 => array (
                'id' => 23,
                'type' => 'wsar_score',
                'key' => 'Host Fire & Casualty Insurance',
                'value' => 'Full credit given if Host maintains fire and casualty insurance with replacement cost & zoning code endorsements.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            23 => array (
                'id' => 24,
                'type' => 'wsar_score',
                'key' => 'Subordination and Non Disturbance Agreement',
                'value' => 'A subordination and non disturbance agreement (SNDA) addresses the priority of the rights of tenants and lenders. It deals with how and when the rights of tenants will be subordinate to the rights of lenders or, sometimes at lender’s option, senior to the rights of lenders. The non-disturbance portion assures tenants that their rights to their premises will be preserved (“nondisturbed”) on specified conditions within their control, even if the landlord defaults on its loan and the lender forecloses.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            24 => array (
                'id' => 25,
                'type' => 'wsar_score',
                'key' => 'Title Insurance, Lien Rights, Roof Penetration Insurance',
                'value' => 'Full credit given if title insurance or other approved documentation is in place providing certainty regarding the priority rights of the solar equipment owners and a 10 year or better warranty has been provided for leakage issues related to roof penetrations. Partial credit may be given for one of these items.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            25 => array (
                'id' => 26,
                'type' => 'wsar_score',
                'key' => 'Public Policy & Rate Risks',
                'value' => 'Full credit given when there are no potential policy or rate changes from state or local regulators or utility that could change or threaten PPA cash flow economics.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            26 => array (
                'id' => 27,
                'type' => 'wsar_score',
                'key' => 'Servicing and Administration',
                'value' => 'PV systems and the PPAs that drive them are long-term assets. Therefore, the systems require reliable and efficient servicing and proficient, ongoing administration of PPA accounting, billing, and receipts. These components, which investors often overlook, are reflected in the WSAR score.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            27 => array (
                'id' => 28,
                'type' => 'wsar_score',
                'key' => 'O&M',
                'value' => 'Full credit for experienced solar contractor or service provider with experience performing maintence and servicing solar systems.  Wiser Capital manages this contract',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            28 => array (
                'id' => 29,
                'type' => 'wsar_score',
                'key' => 'Servicing Risk',
                'value' => 'Full credit for experienced servicer, cash manager, accounting report and contract management company. Wiser Capital manages these contracts.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            29 => array (
                'id' => 30,
                'type' => 'wsar_score',
                'key' => 'Sequestered Account',
                'value' => 'Full credit when sequestered account is established for payment processing and administration of payments to investors.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            30=> array (
                'id' => 31,
                'type' => 'wsar_score',
                'key' => 'Business Interruption Insurance',
                'value' => 'Full credit when business interruption insurance has been secured on behalf of the project investors.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            31 => array (
                'id' => 32,
                'type' => 'wsar_score',
                'key' => 'First Loss Surety',
                'value' => 'To provide confidence in this emerging asset class, which has limited historical performance data, less risk-averse participants hold “first loss” positions to help ensure other participants achieve their anticipated returns. for additional exposure, they may gain higher returns or benefits. the wsar score incorporates percentage of a total project’s “first loss” funding.',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
            32 => array (
                'id' => 33,
                'type' => 'wsar_score',
                'key' => '5% First Loss Surety',
                'value' => 'Helper',
                'created_at' => '2016-10-10 11:42:02',
                'updated_at' => '2016-10-10 11:42:02',
            ),
        ));
        
        
    }
}

