<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Http\Controllers\Controller;
use Auth;
use App\Repositories\AuditRepository as Audit;
use App\Support\Dropdown;
use App\Support\PPAOptimizer;
use Flysystem;
use Flash;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\Replacement;
use App\Models\Portfolio;
use App\Support\WSAR;
use App\Models\Agreement;
use App\Models\SolarInstaller;
use Carbon\Carbon;
use URL;
use App\Models\GlobalInput;
use App\User;
use Mail;
use App\Models\Maillog;
use App\Models\AgreementFile;

class DocumentController extends Controller
{
    const ROOT = 'root';
    const ADDITIONAL = 'additional';
    const USER_UPLOADS = 'user_uploads';
    const SHOW = 'show';
    const TERM_SHEET = 'Term Sheet';
    const USER_UPLOADING = 'uploaded_files';
    
    /**
     * Update agreement status
     * 
     * @param Request $request
     * @param type $id
     * @return type
     */
    public function changeAgreementStatus(Request $request, $id) 
    {
        // check if user is not admin
        if (!Auth::user()->hasRole('admins')) {
            return response()->json(['status' => 'bg-danger', 'title' => 'Error Message', 'message' => 'You are not authorized to update the status']);
        }
        
        // check if site is not found
        $site = Site::find($id);
        if (!$site) {
            return response()->json(['status' => 'bg-danger','title' => 'Error Message', 'message' => 'Site doesn\'t exist']);
        }
        
        // check if value is not in array
        if (empty(Dropdown::$agreement_status[$request->value])) {
            return response()->json(['status' => 'bg-danger', 'title' => 'Error Message', 'message' => 'Invalid Status']);
        }
        
        // set agreement status in meta
        $site->setMeta([$this->getStatusKeyForDocument($request->status_for) => $request->value]);
        $site->save();
        Audit::log(Auth::id(), 'Site '. ucfirst(Agreement::AGREEMENTS), 'Change agreement status : '. $site->name,
            ['status' => Dropdown::$agreement_status[$request->value]]);
        
        return response()->json(['status' => 'bg-success', 'title' => 'Success Message', 'message' => 'Status saved successfully']);
    }
    
    /**
     * 
     * @param object $document
     * @param object $site
     */
    public function getAgreementList($document, $site) 
    {
        $user = \Auth::user();
        $document_list    = [];
        $hidden_agreement = $site->getMeta('hidden_agreements');
        
        foreach ($document as $file)
        {
            $files = $hidden_agreement ? $file->files()->whereNotIn('id', 
                            $hidden_agreement)->get() : $file->files()->get();
            
            $hidden_files = $hidden_agreement ? $file->files()->whereIn('id', $hidden_agreement)->get() : '';
            
            if (($user->hasRole('admins') && (!$files || ($files && !count($files->toArray()))) 
                    && (!$hidden_files || ($hidden_files && !count($hidden_files->toArray()))))
                    || (!$user->hasRole('admins') && (!$files || ($files && !count($files->toArray()))))) 
                continue;
            
            $document_list[$file->key]['name']          = $file->name;
            $document_list[$file->key]['id']            = $file->id;
            $document_list[$file->key]['hidden_files']  = [];
            
            $fileList = $this->getAgreementFileList($site, $files, $file->key, true);
            
            $document_list[$file->key]['files']  = $fileList['files'];
            $document_list[$file->key]['status'] = $fileList['status'];
            
            if (!$hidden_files || ($hidden_files && !count($hidden_files->toArray()))) 
                continue;
            
            $document_list[$file->key]['hidden_files'] = $this->getAgreementFileList($site, $hidden_files, $file->key);
        }
        
        return $document_list;
    }
    
    public function getAgreementFileList($site, $agreementFiles, $agreementKey, $returnStatus = false) 
    {
        $files = [];
        
        $agreement_status     = Dropdown::$agreement_status;
        $all_agreement_status = 0;
        
        foreach ($agreementFiles as $key => $agreementFile) {
            $metaKey        = $agreementKey . '_' . $agreementFile->id;
            $uploadedByUser = $site->getMeta($metaKey);
            
            $files[$key]['id']      = $agreementFile->id;
            $files[$key]['name']    = $agreementFile->name;
            $files[$key]['metaKey'] = $metaKey;
            
            if (count($uploadedByUser)) {
                $files[$key]['title'] = !empty($uploadedByUser['filename']) ? $uploadedByUser['filename'] : '';
                $files[$key]['path']  = !empty($uploadedByUser['filepath']) ? $uploadedByUser['filepath'] : '';
            } else {
                $files[$key]['title'] = $agreementFile->file_name;
                $files[$key]['path']  = '/'.Agreement::AGREEMENTS.'/'. $agreementFile->sqs_file_name;
            }

            $status = $site->getMeta($this->getStatusKeyForDocument($metaKey));
            ($returnStatus && ($status == Dropdown::AGREEEMENT_EXECUTED)) ? $all_agreement_status++ : '';
            
            $files[$key]['status'] = $status ? $status : Dropdown::AGREEEMENT_NOT_EXECUTED;
        }
        
        $status = '';
        if ($returnStatus) {
            $status = ($all_agreement_status == 0) ? $agreement_status[Dropdown::AGREEEMENT_NOT_EXECUTED] : 
                        (($all_agreement_status == count($agreementFiles->toArray())) ? 'All' : 
                        $all_agreement_status) . ' '. $agreement_status[Dropdown::AGREEEMENT_EXECUTED];
        }
        
        return $returnStatus ? ['files' => $files, 'status' => $status] : $files;
    }
    
    /**
     * Function to fetch trhe documents page
     * 
     * @param type $id
     * @return type
     */
    public function dataRoom($id)
    {
        $page_title         = 'DOCUMENTS';
        $page_description   = '';
        $site               = Site::find($id);
        if (!$site) {
            Flash::error('Site doesn\'t exist');
            return back();
        }
        
        $project_users = $site->projectUser()->get();
        
        $site_meta          = $site->getMeta();
        $agreementQuery     = Agreement::leftJoin('agreement_site AS as', 'agreements.id', '=', 'as.agreement_id')
                                ->where(function ($query) use ($id) {
                                    $query->whereNull('as.site_id')->orWhere('as.site_id', $id);
                                })->where('name', '!=', self::TERM_SHEET);
        
        if (Auth::user()->hasRole('solar-installer')) {
            $agreementQuery->where('active_si', 1);
        }
        $file_list = $agreementQuery->orderBy('position')->orderBy('site_id', 'desc')->get();
                                    
        $document_list      = $this->getAgreementList($file_list, $site);

        $ppa_result = $site->getMeta('ppa');
        $statusValues = Dropdown::$agreement_status;
        return view('hf.dataroom', compact('page_title', 'page_description', 'ppa_result', 
                'document_list', 'id', 'site', 'site_meta', 'statusValues', 'project_users'));
    }
    

    /**
     * Return JSON for JStree representation of Files uploaded for current facility
     * @param Request $request
     * @return type
     */
    public function dataRoomFiles(Request $request)
    {
        $site  = Site::find($request->id);
        $nodes = [['dir' => 1,'name' => self::ROOT]];
        $tree  = [];
        
        $user = Auth::user();
        $siteVisitTimestamps = $user->getMeta('last_site_visit_timestamp');
        $siteVisitTimestamp  = !empty($siteVisitTimestamps[$request->id]) ? $siteVisitTimestamps[$request->id] : '';
        
        while (count($nodes)) {
            $dirStr = array_shift($nodes);
            $dir = $dirStr['name'];
            if (!$dirStr['dir']) {
                $files   = $site->getMeta($dir);
                $files ? ksort($files) : '';
                $files ? ($tree = array_merge($tree, $this->returnJstreeMetaDataStructure($files, $dir, $siteVisitTimestamp))) : '';
            } else {
                $files  = config('constants.hf.data-room.'. $dir );
                $result = $this->returnJstreeStructureForFileSystem($site, $files, $dir);
                $nodes  = array_merge($nodes, $result['nodes']);
                $tree   = array_merge($tree, $result['tree']);
            }
        }
        $siteVisitTimestamps[$request->id] = time();
        $user->setMeta(['last_site_visit_timestamp' => $siteVisitTimestamps]);
        $user->save();
        return response()->json($tree);
    }
    
    
    /**
     * Download the document with tag replacements
     * 
     * @param type $id
     * @param type $key
     * @param type $type
     * @return type
     * @throws ProcessFailedException
     */
    public function download($id, $key , $type = 'docx', $portfolio_document = false) 
    {
       	if($portfolio_document == TRUE) {
            $portfolio = Portfolio::find($id);
        } else {
            $site = Site::find($id);
            $agreementData = $site->getMeta($key);
        }
        if (isset($agreementData) && is_array($agreementData) && count($agreementData)) {
            $fileName  = $agreementData['filepath'];
            $file_name = str_replace(".docx", "", $agreementData['filename']);
        } else  {
            $agreementKey    = explode('_', $key);
            $agreementFileId = array_pop($agreementKey);
            $agreement     = Agreement::where('key', implode('_', $agreementKey))->first();
            $agreementFile = $agreement ? AgreementFile::where('agreement_id', 
                                    $agreement->id)->find($agreementFileId) : '';
            if (!$agreementFile){
                abort(404);
            }
            
            $fileName  = Agreement::AGREEMENTS.  '/'. $agreementFile->sqs_file_name;
            $file_name = $agreementFile->file_name;
        }
        
        if (Flysystem::has($fileName)) {
            $tmpBaseName = '/tmp/' . uniqid();
            $tempFileName =  $tmpBaseName . '.docx';

            $dataFile = Flysystem::read($fileName);
            $file = fopen($tempFileName,"w");
            fwrite($file, $dataFile);
            fclose($file);
            
            $user = Auth::user();
            
            
            
			$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($tempFileName);
			$templateProcessor->setValue('investor-company-name', $user->getCompanyName());
			$templateProcessor->setValue('investor-name', $user->first_name . ' ' . $user->last_name);
			$templateProcessor->setValue('todays-date', date('F jS Y'));
			$templateProcessor->setValue('month', date('M'));
			$templateProcessor->setValue('year', date('Y'));
			$templateProcessor->setValue('day', date('j'));
			$templateProcessor->setValue('investor-entity-type', 'entity type');
		
		
			if( isset($site) )
			{
				$templateProcessor->setValue('system-location', $site->getSystemLocation());
				$templateProcessor->setValue('first-year-production', $site->getFirstYearProduction());
				$templateProcessor->setValue('panel-manufacturer', $site->getPanelManufacturer());
				$templateProcessor->setValue('panel-model', $site->getPanelModel());
				$templateProcessor->setValue('panel-quantity', $site->getPanelQuantity());
				$templateProcessor->setValue('inverter-manufacturer', $site->getInverterManufacturer());
				$templateProcessor->setValue('inverter-model', $site->getInverterModel());
				$templateProcessor->setValue('inverter-quantity', $site->getInverterQuantity());
				$solar_installer_id = $site->getMeta('solar_installer_id');
				$templateProcessor->setValue('EPC-total-price', $site->getTotalEPCCost());						
				$templateProcessor->setValue('EPC-kW-price', $site->getEPCCost());
				$templateProcessor->setValue('host-name', $site->getMeta('host_facility_primary_contact_name'));	
				$templateProcessor->setValue('host-company-name', $site->getMeta('host_facility_company_name'));	
				$templateProcessor->setValue('host-entity', $site->getMeta('host_facility_entity_type'));
				$templateProcessor->setValue('host-address', $site->getMeta('host_facility_primary_contact_address'));
				$templateProcessor->setValue('host-phone', $site->getMeta('host_facility_primary_contact_phone'));
				$templateProcessor->setValue('host-fax', $site->getMeta('host_facility_primary_contact_fax'));
				$templateProcessor->setValue('host-email', $site->getMeta('host_facility_primary_contact_email'));
				$templateProcessor->setValue('host-parcel-number', $site->getMeta('parcel_number'));
				$templateProcessor->setValue('host-legal-description', $site->getMeta('legal_description'));
				$templateProcessor->setValue('PPA-term-years', $site->getTerm());
	
				$templateProcessor->setValue('SPE-name', $site->getMeta('spe_name'));
				$templateProcessor->setValue('SPE-state', $site->getMeta('spe_state'));
	
				$derate = GlobalInput::where('name', 'derate')->get();
				$templateProcessor->setValue('system-size-AC', number_format($site->getSystemSize() * ($derate[0]->low + $derate[0]->high / 2)),2);
				$templateProcessor->setValue('system-size-DC', $site->getSystemSize());
				$templateProcessor->setValue('contract-price', $site->getPrice());
				$templateProcessor->setValue('contract-escalation', $site->getEsc() . '%' );
				$templateProcessor->setValue('contract-term-years', $site->getTerm());
				$templateProcessor->setValue('utility-name', $site->getUtility(true));
				$templateProcessor->setValue('racking-manufacturer', $site->getRackingManufacturer());
				$templateProcessor->setValue('tracking-manufacturer', $site->getMeta('tracking_manufacturer_input'));
				$templateProcessor->setValue('monitoring-manufacturer', $site->getMonitoringManufacturer());
				$templateProcessor->setValue('tariff-after-solar', $site->getMeta('tariff_after_solar'));
				$templateProcessor->setValue('meter-number', $site->getMeta('meter_number'));
				
				$templateProcessor->setValue('SREC-name', $site->getMeta('srec_name'));			
				
				$templateProcessor->setValue('interest-in-property', $site->interestInProperty());
					
					
				//user later in code
				$WSAR = new WSAR($site->id);
					
			}

			if(isset($solar_installer_id) && is_numeric($solar_installer_id))
			{
				$SI = SolarInstaller::find($solar_installer_id);
				$templateProcessor->setValue('EPC', $SI->name);
				$templateProcessor->setValue('EPC-entity', $SI->entity_type);
				$templateProcessor->setValue('EPC-address', $SI->address . ' ' . $SI->address2);
				$templateProcessor->setValue('EPC-contractor-license', $SI->type_of_license);
				
				if(is_array($SI->getMeta('meta_file_certificate_of_good_standing')))
				{
					$templateProcessor->setValue('EPC-has-GS', 'Yes');
				}
				else
				{
					$templateProcessor->setValue('EPC-has-GS', 'No');
				}
			}			
			
			
			
			
			if(isset($WSAR))
			{
				$templateProcessor->setValue('available-total-WSAR-score', $WSAR->maxScore());
				$templateProcessor->setValue('WSAR-score', $WSAR->totalScore());
				$templateProcessor->setValue('BFS-score', $WSAR->businessFinancialStrength());
				$templateProcessor->setValue('HLT-score', $WSAR->historyLongTermViability());
				$templateProcessor->setValue('OEG-score', $WSAR->offtakerEconomicGains());
				$templateProcessor->setValue('OC-score', $WSAR->offtakerCreditworthiness());
				$templateProcessor->setValue('PMFS-score', $WSAR->panelManufacturerFinancialStrength());
				$templateProcessor->setValue('PMW-score', $WSAR->panelWarranty());
				$templateProcessor->setValue('PM-score', $WSAR->panelManufacturerFinancialStrength() + $WSAR->panelWarranty());
				$templateProcessor->setValue('IFS-score', $WSAR->inverterManufacturerFinancialStrength());
				$templateProcessor->setValue('IW-score', $WSAR->inverterWarranty());
				$templateProcessor->setValue('IM-score', $WSAR->inverterManufacturerFinancialStrength() + $WSAR->inverterWarranty());
				$templateProcessor->setValue('RS', $WSAR->rackingTrackingManufacturerWarranty() + $WSAR->rackingTrackingManufacturerFinancialStrength());
				$templateProcessor->setValue('TS', $WSAR->rackingTrackingManufacturerWarranty() + $WSAR->rackingTrackingManufacturerFinancialStrength());
				$templateProcessor->setValue('MS', $WSAR->MonitoringServices());
				$templateProcessor->setValue('RTMS',$WSAR->MonitoringServices() + $WSAR->rackingTrackingManufacturerWarranty() + $WSAR->rackingTrackingManufacturerFinancialStrength() );
				$templateProcessor->setValue('MS', $WSAR->MonitoringServices());
				$templateProcessor->setValue('EPC-FW', $WSAR->EPCfinancialsWorkExperience());
				$templateProcessor->setValue('EPC-CGS', ($WSAR->certificateGoodStanding() ? $WSAR->certificateGoodStanding() : 0));
				$templateProcessor->setValue('EPC-Other', $WSAR->workersCompensationGeneralLiabilityBonding());
				$templateProcessor->setValue('EPC-WCGLB', $WSAR->workersCompensationGeneralLiabilityBonding());
				$templateProcessor->setValue('EPC-TS', $WSAR->EPCCreditworthiness());			
				$templateProcessor->setValue('LP-PP', $WSAR->projectPermitting());			
				$templateProcessor->setValue('LP-UI', $WSAR->interconnectionStudyStatus());	
				$templateProcessor->setValue('LP-IP', $WSAR->interestInProperty());			
				$templateProcessor->setValue('LP-FCLI', $WSAR->projectOfftakerFireCasualtyInsurance());		
				$templateProcessor->setValue('LP-SNDA', ($WSAR->SNDAReviwedWaived() ? $WSAR->SNDAReviwedWaived() : 0));
				$templateProcessor->setValue('LP-TLRPI', $WSAR->titleInsuranceLienRightsRoofPenetrationInsurance());	
				$templateProcessor->setValue('LP-PPRR', $WSAR->publicPolicyRateRisks());
				$templateProcessor->setValue('LP-CRSSC', $WSAR->certifiedRoofingStudySoilConditions());
				$templateProcessor->setValue('LP-SE', $WSAR->structuralDrawingsorPlans());
				$templateProcessor->setValue('LP-SD', $WSAR->standardizedDocuments());
				$templateProcessor->setValue('LP-TS', $WSAR->legalPolicy());	
				$templateProcessor->setValue('SA-SQA', $WSAR->sequesteredAccount());	
				$templateProcessor->setValue('SA-BII', ($WSAR->businessInteruptionInsurance() ? $WSAR->businessInteruptionInsurance() : 0));
				$templateProcessor->setValue('SA-TS', $WSAR->servicingAdministration());
				$templateProcessor->setValue('TO-DSCR', ($WSAR->DSCR() ? $WSAR->DSCR() : 0));	
				$templateProcessor->setValue('TO-DV', ($WSAR->debtToProjectValue() ? $WSAR->debtToProjectValue() : 0));	
				$templateProcessor->setValue('TO-A', $WSAR->debtAmmortization());
				$templateProcessor->setValue('TO-IRRisk', $WSAR->interestRateRisk());	
				$templateProcessor->setValue('TO-TS', $WSAR->transactionalOverview());
				$templateProcessor->setValue('SA-OM', $WSAR->OM());
				$templateProcessor->setValue('SA-SR', $WSAR->servicingRisk());
				
			}
			
			
			
			
			
			if($portfolio_document == TRUE)
			{
				
				$templateProcessor->setValue('total-kw-size',$portfolio->totalSystemSize());
				//$templateProcessor->setValue('total-production',$portfolio->getMeta('energy_yield'));
				$templateProcessor->setValue('total-term',$portfolio->totalTerm());
				$templateProcessor->setValue('number-of-projects',count($portfolio->sites));
				$templateProcessor->setValue('project-name', $portfolio->name);
				$templateProcessor->setValue('total-production',number_format($portfolio->totalProduction(),0));
				$templateProcessor->setValue('gross-revenue',number_format($portfolio->totalGrossRevenue(),0));
				$templateProcessor->setValue('total-investment',number_format($portfolio->totalInvestment(),0));
				$templateProcessor->setValue('total-ITC',number_format($portfolio->totalITC(),0));
				$templateProcessor->setValue('total-ADPD',number_format($portfolio->totalADPD(),0));
				
			}
			else
			{
				$templateProcessor->setValue('total-kw-size',$site->getSystemSize());
				$templateProcessor->setValue('total-production',number_format($site->getProduction(),0));
				$templateProcessor->setValue('total-term',$site->getTerm());
				$templateProcessor->setValue('number-of-projects',1);

				$templateProcessor->setValue('gross-income-over-life',number_format($site->getGrossIncomeOverLife(),2));
				$templateProcessor->setValue('host-facility-name', $site->name);
				$templateProcessor->setValue('full-address', $site->address . ", " . $site->city .  ", " . $site->state . " " . $site->zip_code);
				$templateProcessor->setValue('address', $site->address);
				$templateProcessor->setValue('city', $site->city);
				$templateProcessor->setValue('state', $site->state);
				$templateProcessor->setValue('zip-code', $site->zip_code);
				$templateProcessor->setValue('project-name', $site->name);
			
				$templateProcessor->setValue('gross-revenue','$'.number_format($site->getGrossRevenue(),2));
				$templateProcessor->setValue('total-investment','$'.number_format($site->getTotalInvestment(),2));
				$templateProcessor->setValue('total-ITC','$'.number_format($site->getTotalITC(),2));
				$templateProcessor->setValue('total-ADPD','$'.number_format($site->getTotalADPD(),2));
				
			}
			
			
			
			/*
				for documents with lists...
			*/
			
			$zip = new \ZipArchive;
			$fileToModify = 'word/document.xml';

			
			if($zip->open($tempFileName) === true)
			{
				$oldContents = $zip->getFromName($fileToModify);
				
				// list all projects in portfolio
				if (strpos($oldContents, 'site-list') !== false) 
				{
					if($portfolio_document == TRUE)
					{
						$templateProcessor->cloneRow('site-list', count($portfolio->sites));
						
						foreach($portfolio->sites as $key => $site)
						{
							$key++;
							$templateProcessor->setValue('site-list#'.$key, $key);
							$templateProcessor->setValue('site-name#'.$key, $site->name);
							$templateProcessor->setValue('site-city#'.$key, $site->city);
							$templateProcessor->setValue('site-state#'.$key, $site->state);
							$templateProcessor->setValue('site-system-size#'.$key, $site->getSystemSize());
							$templateProcessor->setValue('site-production#'.$key, number_format($site->getProduction(),0));
						}
					}
					else
					{
						$templateProcessor->cloneRow('site-list', 1);
						$templateProcessor->setValue('site-list#1', 1);
						$templateProcessor->setValue('site-name#1', $site->name);
						$templateProcessor->setValue('site-city#1', $site->city);
						$templateProcessor->setValue('site-state#1', $site->state);
						$templateProcessor->setValue('site-system-size#1', $site->getSystemSize());
						$templateProcessor->setValue('site-production#1', number_format($site->getProduction(), 0));
						
					}
				}
				
			
			
			//table for Sun Hours
				if (strpos($oldContents, 'table-sun-hours') !== false) 
				{
					$sunHours = $site->getSunHours();
					
			
					
					if(is_array($sunHours))
					{
						$templateProcessor->cloneRow('table-sun-hours', count($sunHours)-1);
						
						foreach($sunHours as $key => $sh)
						{
							$row = $key + 1;
							
							$templateProcessor->setValue('table-sun-hours#'.$row, $sh[0]);
							$templateProcessor->setValue('table-sun-hours-day#'.$row, number_format($sh[1],2));
							$templateProcessor->setValue('table-kwh-ac-output-month#'.$row, number_format($sh[2],2));
						}
					}
				}
				
				
				
				//buyout table
				if (strpos($oldContents, 'table-buyout-year') !== false) 
				{
					$data = $site->getAnnualUtilitySavings();
					
					if(is_array($data))
					{
						$templateProcessor->cloneRow('table-buyout-year', count($data)-1);
						
					
						foreach($data as $key => $bo)
						{
							$row = $key + 1;
						
							$templateProcessor->setValue('table-buyout-year#'.$row, $row);
							
							if($key >= 7)
							{
								$templateProcessor->setValue('table-buyout-amount#'.$row, $bo[8]);
							}
							else
							{
								$templateProcessor->setValue('table-buyout-amount#'.$row, 'N/A');
							}
							
						
						}
					}
				}
				
				
				
				
				//table for PPA price over the lease term
				if (strpos($oldContents, 'table-ppa-year') !== false) 
				{
					
					$data = $site->getAnnualUtilitySavings();
					
					if(is_array($data))
					{
						$templateProcessor->cloneRow('table-ppa-year', count($data)-1);
						
						foreach($data as $key => $bo)
						{
							$row = $key + 1;
						
							$templateProcessor->setValue('table-ppa-year#'.$row, $row);
							$templateProcessor->setValue('table-ppa-kwh#'.$row, $bo[4]);
							$templateProcessor->setValue('table-annual-ppa-cost#'.$row, $bo[5]);
						
						
						}
					}
					
					 
				}
				
				
					
			}
				
				
			
			
			
			$templateProcessor->saveAs($tempFileName);
			
            Audit::log(Auth::id(), Site::DATA_ROOM, 'Downloading a file : '. $file_name, ['filepath' => $fileName]);
            // give out the file for download
            if ($type == "pdf") 
            {
				$process = new Process('soffice --headless --invisible --norestore' . ' --convert-to pdf  -env:UserInstallation=file:///tmp/test --outdir /tmp ' . $tempFileName);
				$process->run();

                // executes after the command finishes
                if (!$process->isSuccessful()) 
                {
                    throw new ProcessFailedException($process);
                }

                return response()->make(file_get_contents($tmpBaseName . '.pdf'), 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="'.$file_name.'"'
                ]);
            }
            return response()->download($tempFileName, $file_name. ".docx");
        }
        abort(404);
    }
    
    public function createDocUrl($path)
    {
        $pathArray = explode('.', $path);
        if (!$path || (count($pathArray) < 2)) {
            return '';
        }
        $extension = $pathArray[count($pathArray) - 1];
        if (in_array($extension, ['doc', 'docx'])) {
            return 'https://view.officeapps.live.com/op/embed.aspx?src='. $path;
        }
        return $path;
    }
    
    public function facilityFilePreview(Request $request)
    {
        $folderPath       ='jstree/previewableFile/';
        $folderPublicPath = public_path($folderPath);
        if (!file_exists($folderPublicPath) || (file_exists($folderPublicPath) 
                && !is_dir($folderPublicPath))) {
            mkdir("$folderPublicPath");
            chmod("$folderPublicPath", 0775);
        }
        $fileArray  = explode('.', $request->fileName);
        $filePath   =  $folderPath. md5(uniqid(rand(), true)) . '.' . end($fileArray);
        $file_path  = url($filePath);
        $bucket     = config('flysystem.connections.awss3.bucket');
        $s3_client  = Flysystem::getAdapter()->getClient();
        
        $cmd = $s3_client->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key' => $request->file_path
        ]);

        $presigned_request = $s3_client->createPresignedRequest($cmd, '+20 minutes');

        // Get the actual presigned-url
        $presigned_url = (string) $presigned_request->getUri();
        try {
            $content = file_get_contents($presigned_url);
            file_put_contents(public_path($filePath), $content);
        } catch (\Exception $e) {
            $file_path = '';
        }
        
        return response()->json($this->createDocUrl($file_path));
    }
    
    
    public function facilityFileDownload(Request $request)
    {
        $dr_dir = $request->dir;

        $site = Site::find($request->site_id);

        $files = $site->getMeta($dr_dir);
        $fileName = $request->fileName;
        $s3Path = isset($files[$fileName]) ? $files[$fileName] : '';
        $bucket   = config('flysystem.connections.awss3.bucket');
        $s3_client = Flysystem::getAdapter()->getClient();
        
        if ($s3Path && is_array($s3Path)) {
            $filePath = $s3Path['filePath'];
        } else {
            if (substr($request->file_path, 0, 1) == '/') {
                $filePath = substr($request->file_path, 1);
            } else {
                $filePath = $request->file_path;
            }
        }
        
        
        $cmd = $s3_client->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key' => $filePath,
            'ResponseContentDisposition' => 'attachment; filename="'. $fileName . '"'
        ]);

        $presigned_request = $s3_client->createPresignedRequest($cmd, '+20 minutes');

        // Get the actual presigned-url
        $presigned_url = (string) $presigned_request->getUri();
        
        try {
            file_get_contents($presigned_url);
        } catch (\Exception $e) {
            if ($s3Path) {
            // check and remove folder and file on amazon server
                Flysystem::has($s3Path) ? Flysystem::delete($s3Path) : '';

                unset($files[$fileName]);

                // set amazon path on site meta
                count($files) ? $site->setMeta([$dr_dir => $files]) : $site->unsetMeta($dr_dir);
                $site->save();
            }
            return response()->json(array('error' => true, 'message' => trans('hf/general.messages.s3-file-not-found')));
        }
        return response()->json(['path' => $presigned_url]);
    }
    
    /**
     * Get all the replacements for variables, global as well as site specific
     * Site specfic variables can be configured in the constants file
     * @param Site $site
     * @return array
     */
    public function getReplacements($site) 
    {
        $siteReplacments = $site->getReplacements();
        $globalReplacments = Replacement::getReplacementsList();
        return array_merge($siteReplacments, $globalReplacments);
    }
    
    private function getStatusKeyForDocument($documentName) 
    {
        return $documentName . '_status';
    }

    /**
     * Return array structure for sub tree as required by JStree plugin
     * 
     * @param array $files
     * @return array
     */
    private function returnJstreeMetaDataStructure($files, $dir, $userTimestamp) 
    {
        $tree = [];
        $index = 0;
        foreach ($files as $key => $file) {
            $data       = $file['filePath'];
            $timestamp  = !empty($file['timeStamp']) ? $file['timeStamp'] : '';
            $tree[$index] = [
                'id'        => $data,
                'text'      => view('hf.jstree_data_structure', compact('key', 'data', 
                                    'dir', 'timestamp', 'userTimestamp'))->render(),
                "parent"    => $dir,
                "icon"      => "pull-left jstree-file"
            ];
            $index++;
        }
        return $tree;
    }

    /**
     * Return array structure for folder and fixed files as required by JStree plugin
     * 
     * @param array $files
     * @return array
     */
    private function returnJstreeStructureForFileSystem($site, $files, $dir) 
    {
        $tree = [];
        $nodes = [];
        $index = 0;
        $uploaded_files = array_merge([self::USER_UPLOADING], array_keys(config('constants.hf.data-room.uploaded_files')));
        foreach ($files as $key => $dataValues) {
			//exclude sections from the data-room to certain user types
            
            if (!in_array($key, $uploaded_files) && \Auth::user()->hasRole('solar-installer')) {
                continue;
            }

            $data   = $dataValues['name'];
            $is_dir = $dataValues['is_dir'];
            $result = (!$dataValues['is_dir']) ? $site->getMeta([$key]) : '';
            array_push($nodes, [
                'dir'  => $dataValues['is_dir'],
                'name' => $key,
            ]);
            $tree[$index] = [
                'id'       => $key,
                'text'     => view('hf.jstree_file_structure', compact('is_dir','dir','key', 'data', 'result'))->render(),
                "parent"   => ($dir == self::ROOT) ? '#' : $dir,
                "icon"     => 'pull-left '. (($dir == self::ROOT) ? 'jstree-custom-root-theme-icon' : 
                                'jstree-custom-default-theme-icon')
            ];
            $index++;
        }
        return ['nodes' => $nodes, 'tree' => $tree];
    }

    /**
     * Upload files in document dataroom section and agreement section
     * 
     * @param Request $request
     * @param type $id
     * @return type
     */
    public function uploadFiles(Request $request,$id)
    {
        // error when user is not admin
        if (!Auth::user()->hasRole('admins')) {
            return response()->json(['success' => false, 'message' => trans('hf/general.messages.unauthorized')]);
        }
        
        if (!($request->hasFile('upload_file') || $request->file('upload_file')->isValid())) {
            return response()->json(['success' => false, 'message' => trans('hf/general.messages.invalid-file')]);
        }
        
        $dir  = $request->get('data-room-id');
        $dr_dir = $request->get('data-room-dir');
        
        $site       = Site::find($id);
        $fileName   = $request->file('upload_file')->getClientOriginalName();
        $treeStructure = '';
        // error when site not found
        if (!$site) {
            return response()->json(['success' => false, 'message' => 'Site doesn\'t exist']);
        }
        
        $fileArray = explode('.', $fileName);
        
        if ($dr_dir == Agreement::AGREEMENTS) {
            $s3DirPath  = $id ."/". $dr_dir. '/'. $dir. "/";
            $s3FilePath = $s3DirPath . md5(uniqid(rand(), true)) . '.' . end($fileArray);
            // check and remove folder and file on amazon server
            Flysystem::has($s3FilePath) ? Flysystem::delete($s3FilePath) : '';
            $site->unsetMeta($dir);

            // put uploaded file on amazon server
            Flysystem::put($s3FilePath, fopen($request->file('upload_file')->getRealPath(), "r"), [
                'Metadata' => [
                    'name' => $fileName,
                    'key'  => $dir
                ],
            ]);

            // set amazon path on site meta
            $site->setMeta([$dir => [
                'filename' => $fileName,
                'filepath' => $s3FilePath
            ]]);
        } else {
            $s3FilePath = $id ."/data-room/" . md5(uniqid(rand(), true)) . '.' . end($fileArray);
            // check and remove folder and file on amazon server
            $files  = $site->getMeta($dir) ? $site->getMeta($dir) : [];
            $file = !empty($files[$fileName]) ? $files[$fileName]['filePath'] : '';
            $file && Flysystem::has($file) ? Flysystem::delete($file) : '';

            // put uploaded file on amazon server
            Flysystem::put($s3FilePath, fopen($request->file('upload_file')->getRealPath(), "r"), [
                'Metadata' => [
                    'name' => $fileName,
                    'key'  => $dir
                ],
            ]);
            
            // set amazon path on site meta
            $timestamp = $userTimestamp = time();
            $user = Auth::user();
            $siteVisitTimestamps = $user->getMeta('last_site_visit_timestamp');
            $siteVisitTimestamps[$request->id] = $timestamp;
            $user->setMeta(['last_site_visit_timestamp' => $siteVisitTimestamps]);
            $user->save();
            $site->setMeta([$dir => array_merge($files, [
                $fileName => [
                    'filePath'  => $s3FilePath,
                    'timeStamp' => time()
                ]
            ])]);
            
            $treeStructure = !empty($files[$fileName]) ? '' : [
                'id'        => $s3FilePath,
                'text'      => view('hf.jstree_data_structure', ['key' => $fileName, 
                                    'data' => $s3FilePath, 'dir' => $dir,
                                    'timestamp' => $timestamp,
                                    'userTimestamp' => $userTimestamp])->render(),
                'children'  => false,
                "icon"      => "pull-left jstree-file"
            ];
        }
        $site->save();
        $dirName = explode('_', $dr_dir);      
        unset($dirName[count($dirName) - 1]);
        Audit::log(Auth::id(), Site::DATA_ROOM, 'Uploaded file in Data Room : ' . 
                ucwords(implode(' ', $dirName)), ['filename' => $fileName, 'filepath' => $s3FilePath]);
        
        return response()->json([
            'message' => trans('Document Uploaded successully!'), 
            'success' => true, 
            'treeStructure' => $treeStructure
        ]);
    }
    
    public function fullDownload($id)
    {
        ini_set('memory_limit','384M');
        $rand = substr(md5(microtime()),rand(0,26),5);
        $zipFileName = $id . "-All-Files-" . $rand . ".zip";
        $fileToPath  = "/tmp/$zipFileName";
        
        $site     = Site::find($id);
        $metas    = $site->getMeta();
        $s3Helper = app('s3helper');
        $zip      = new \ZipArchive;

        $uploadedFiles = $s3Helper->getAllDataRoomUploadedFiles($metas);
        if (!count($uploadedFiles)) {
            Flash::error(trans('Data Room does not contain any files for download'));
            return back();
        }
        if ($zip->open($fileToPath, \ZipArchive::CREATE) === TRUE) { 
            foreach($uploadedFiles as $fileName => $filePath){
                # download file
                try {
                    $download_file = file_get_contents($filePath);
                    #add it to the zip
                    $zip->addFromString($fileName,$download_file);
                } catch (\Exception $e) {
                    
                }
            }
            $zip->close();
        }
        $headers = array('Content-Type' => 'application/octet-stream');
        if(file_exists($fileToPath)) {
            return response()->download($fileToPath,$zipFileName,$headers);
        }
        Flash::error(trans('Error while downloading the files!'));
        return back();
    }

    /**
     * Delete file in document dataroom section
     * 
     * @param Request $request
     * @param type $id
     * @return type
     */
    public function deleteFile(Request $request,$id)
    {
        // error when user is not admin
        if (!Auth::user()->hasRole('admins')) {
            return response()->json(['success' => false, 'message' => trans('hf/general.messages.unauthorized')]);
        }
        
        $dr_dir = $request->get('dir');
        
        $site = Site::find($id);
        
        // error when site not found
        if (!$site) {
            return response()->json(['success' => false, 'message' => trans('hf/general.messages.site-doesnt-exist')]);
        }
        $files   = $site->getMeta($dr_dir);
        $fileName = $request->get('fileName');
        $s3Path = isset($files[$fileName]) ? $files[$fileName]['filePath'] : '';
        
        if (!$s3Path) {
            return response()->json(['success' => false, 'message' => trans('hf/general.messages.s3-file-not-found')]);
        }
        // check and remove folder and file on amazon server
        Flysystem::has($s3Path) ? Flysystem::delete($s3Path) : '';
        
        unset($files[$fileName]);
        
        // set amazon path on site meta
        count($files) ? $site->setMeta([$dr_dir => $files]) : $site->unsetMeta($dr_dir);
        $site->save();
        
        $dirName = explode('_', $dr_dir);      
        unset($dirName[count($dirName) - 1]);
        
        Audit::log(Auth::id(), Site::DATA_ROOM, 'Delete file in Data Room : ' . 
                ucwords(implode(' ', $dirName)), ['filename' => $fileName]);
        
        return response()->json(['message' => trans('File deleted successully!'), 'success' => true]);
    }
    
    /**
     * Get the files list under the folder
     * 
     * @param Request $request
     * @param int $id
     */
    public function getFolderFiles(Request $request, $id) 
    {
        $site = Site::find($id);
        $key = $request->get('key');
        if ($request->get('dir')) {
            $files    = $site->getMeta($key);
            $fileList = $files ? array_keys($files) : [];
            sort($fileList);
            return response()->json($fileList);
        }
        
        $files = config('constants.hf.data-room.'. $key);
        $nodes = $this->getNodes($files, $key);
        $fileList  = [];
        while (count($nodes)) {
            $dir = array_shift($nodes);
            if (!$dir['dir']) {
                $files    = $site->getMeta($dir['name']);
                $fileList = $files ? array_merge($fileList, explode(",", (($dir['parentName'] ? $dir['parentName']. 
                                ' / ' : ''). $dir['fullName']. ' / '. implode(",". ($dir['parentName'] ? $dir['parentName']. 
                                ' / ' : ''). $dir['fullName']. ' / ', array_keys($files))))) : $fileList;
                continue;
            }
            $files = config('constants.hf.data-room.'. $dir['name']);
            $nodes = array_merge($nodes, $this->getNodes($files, $dir['parent'], (($dir['name'] == $key) ? '' : $dir['name'])));
        }
        sort($fileList);
        return response()->json($fileList);
    }
    
    /**
     * Get the list of nodes in DB format
     * 
     * @param array $nodeList
     * @param string $dir
     */
    public function getNodes($nodeList, $parentKey, $parent = '') 
    {
        $nodes = [];
        foreach($nodeList as $key => $node) {
            $parentName = $parent ? config('constants.hf.data-room.' . 
                                $parentKey . '.' . $parent . '.name') :'';
            array_push($nodes, [
                'parentName'=> $parentName,
                'parent'    => $parentKey,
                'name'      => $key,
                'fullName'  => $node['name'],
                'dir'       => $node['is_dir']
            ]);
        }
        return $nodes;
    }
    
    public function showHideAgreement(Request $request, $id, $agreement_id, $type)
    {
        $user = Auth::user();
        if (!$user || ($user && !$user->hasRole('admins'))) {
            Flash::error(trans('general.error.non-authorized'));
            return redirect()->back();
        }
        
        $site = Site::find($id);
        $hiddenAgreements = $site->getMeta('hidden_agreements');
        if ($type == self::SHOW) {
            unset($hiddenAgreements[$agreement_id]);
        } else {
            $hiddenAgreements[$agreement_id] = $agreement_id;
        }
        $site->setMeta(['hidden_agreements' => $hiddenAgreements]);
        $site->save();
        Flash::success(trans('admin/agreements/general.status.' . $type. '-agreement'));
        return redirect()->back();
    }
    
    public function sendMessageInvestor(Request $request, $id)
    {
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required'
        ]);
        
        $userIds = $request->get('users');
        
        if (!count($userIds)) {
            Flash::error(trans('hf/general.messages.select-investor'));
            return redirect()->back();
        }
        
        $users = User::whereIn('id', $userIds)->get();
        $user_email = \Auth::user()->email;
        foreach($users as $user) {
            Mail::raw($request->get('message'), function ($m) use ($user, $request, $user_email) {
                $m->from($user_email);
                $m->to($user->email, ucwords($user->first_name . ' ' . 
                        $user->last_name))->subject($request->get('subject'));

            });
        }

        Maillog::create([
            'user_id' => \Auth::id(),
            'route'   => \Request::route()->getName(),
            'email'   => $user_email,
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);
        Flash::success(trans('hf/general.success-message.investor'));
        return redirect()->back();
    }
}
