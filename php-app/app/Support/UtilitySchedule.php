<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Support;

/**
 * Description of UtilitySchedule
 *
 */
class UtilitySchedule 
{    
    const COMMERCIAL = 'Commercial';
    
    protected $energyWeekendSchedule    = [];
    protected $energyRateStructure      = [];
    protected $energyWeekdaySchedule    = [];
    protected $demandWeekendSchedule    = [];
    protected $demandRateUnit           = 'kWh';
    protected $demandWeekdaySchedule    = [];
    protected $demandRateStructure      = [];
    protected $coincidentRateUnit       = 'kWh';
    protected $coincidentRateStructure  = [];
    protected $coincidentRateSchedule   = [];
    protected $flatDemandUnit           = 'kWh';
    protected $flatDemandMonths         = [];
    protected $flatDemandStructure      = [];
    protected $fixedMonthlyCharge       = 0;
    protected $minMonthlyCharge         = 0;
    protected $minAnnualCharge          = 0;
    protected $sector                   = self::COMMERCIAL;
    
    public function __construct($schedule) 
    {
        // set all the schedules values of utility
        $this->setEnergyWeekendSchedule($schedule);
        $this->setEnergyRateStructure($schedule);
        $this->setEnergyWeekdaySchedule($schedule);
        $this->setDemandRateUnit($schedule);
        $this->setDemandWeekendSchedule($schedule);
        $this->setDemandRateStructure($schedule);
        $this->setDemandWeekdaySchedule($schedule);
        $this->setCoincidentRateUnit($schedule);
        $this->setCoincidentRateSchedule($schedule);
        $this->setCoincidentRateStructure($schedule);
        $this->setFlatDemandUnit($schedule);
        $this->setFlatDemandMonth($schedule);
        $this->setFlatDemandStructure($schedule);
        $this->setSector($schedule);
    }
    
    /**
     * set energy weekend schedule fetched by utility schedule 
     * 
     * @param type $schedule
     */
    public function setEnergyWeekendSchedule($schedule)
    {
        if (!empty($schedule['energyweekendschedule'])) {
            $this->energyWeekendSchedule = $schedule['energyweekendschedule'];
        }
    }
    
    /**
     * get energy weekend schedule fetched by utility schedule 
     * 
     * @return type
     */
    public function getEnergyWeekendSchedule()
    {
        return $this->energyWeekendSchedule;
    }
    
    /**
     * set energy rate structure fetched by utility schedule 
     * 
     * @param type $schedule
     */
    public function setEnergyRateStructure($schedule)
    {
        if (!empty($schedule['energyratestructure'])) {
            $this->energyRateStructure = $schedule['energyratestructure'];
        }
    }
    
    /**
     * get energy rate structure fetched by utility schedule 
     * 
     * @return type
     */
    public function getEnergyRateStructure()
    {
        return $this->energyRateStructure;
    }
    
    /**
     * set energy weekday schedule fetched by utility schedule 
     * 
     * @param type $schedule
     */
    public function setEnergyWeekdaySchedule($schedule)
    {
        if (!empty($schedule['energyweekdayschedule'])) {
            $this->energyWeekdaySchedule = $schedule['energyweekdayschedule'];
        }
    }
    
    /**
     * get energy weekday schedule fetched by utility schedule 
     * 
     * @return type
     */
    public function getEnergyWeekdaySchedule()
    {
        return $this->energyWeekdaySchedule;
    }
    
    /**
     * set demand rate unit fetched by utility schedule 
     * 
     * @param type $schedule
     */
    public function setDemandRateUnit($schedule)
    {
        if (!empty($schedule['demandrateunit'])) {
            $this->demandRateUnit = $schedule['demandrateunit'];
        }
    }
    
    /**
     * get demand rate unit fetched by utility schedule 
     * 
     * @return type
     */
    public function getDemandRateUnit()
    {
        return $this->demandRateUnit;
    }
    
    /**
     * set demand weekend schedule fetched by utility schedule 
     * 
     * @param type $schedule
     */
    public function setDemandWeekendSchedule($schedule)
    {
        if (!empty($schedule['demandweekendschedule'])) {
            $this->demandWeekendSchedule = $schedule['demandweekendschedule'];
        }
    }
    
    /**
     * get demand weekend schedule fetched by utility schedule 
     * 
     * @return type
     */
    public function getDemandWeekendSchedule()
    {
        return $this->demandWeekendSchedule;
    }
    
    /**
     * set demand rate structure fetched by utility schedule 
     * 
     * @param type $schedule
     */
    public function setDemandRateStructure($schedule)
    {
        if (!empty($schedule['demandratestructure'])) {
            $this->demandRateStructure = $schedule['demandratestructure'];
        }
    }
    
    /**
     * get demand rate structure fetched by utility schedule 
     * 
     * @return type
     */
    public function getDemandRateStructure()
    {
        return $this->demandRateStructure;
    }
    
    /**
     * set demand weekday schedule fetched by utility schedule 
     * 
     * @param type $schedule
     */
    public function setDemandWeekdaySchedule($schedule)
    {
        if (!empty($schedule['demandweekdayschedule'])) {
            $this->demandWeekdaySchedule = $schedule['demandweekdayschedule'];
        }
    }
    
    /**
     * get demand weekday schedule fetched by utility schedule 
     * 
     * @return type
     */
    public function getDemandWeekdaySchedule()
    {
        return $this->demandWeekdaySchedule;
    }
    
    /**
     * set coincident rate unit fetched by utility schedule      
     *  
     * @param type $schedule
     */
    public function setCoincidentRateUnit($schedule)
    {
        if (!empty($schedule['coincidentrateunit'])) {
            $this->coincidentRateUnit = $schedule['coincidentrateunit'];
        }
    }
    
    /**
     * get coincident rate unit fetched by utility schedule   
     * 
     * @return type
     */
    public function getCoincidentRateUnit()
    {
        return $this->coincidentRateUnit;
    }
    
    /**
     * set coincident rate structure fetched by utility schedule   
     * 
     * @param type $schedule
     */
    public function setCoincidentRateStructure($schedule)
    {
        if (!empty($schedule['coincidentratestructure'])) {
            $this->coincidentRateStructure = $schedule['coincidentratestructure'];
        }
    }
    
    /**
     * get coincident rate structure fetched by utility schedule   
     * 
     * @return type
     */
    public function getCoincidentRateStructure()
    {
        return $this->coincidentRateStructure;
    }
    
    /**
     * set coincident rate schedule fetched by utility schedule   
     * 
     * @param type $schedule
     */
    public function setCoincidentRateSchedule($schedule)
    {
        if (!empty($schedule['coincidentschedule'])) {
            $this->coincidentRateSchedule = $schedule['coincidentschedule'];
        }
    }
    
    /**
     * get coincident rate schedule fetched by utility schedule 
     * 
     * @return type
     */
    public function getCoincidentRateSchedule()
    {
        return $this->coincidentRateSchedule;
    }
    
    /**
     * set flatdemand rate unit fetched by utility schedule   
     * 
     * @param type $schedule
     */
    public function setFlatDemandUnit($schedule)
    {
        if (!empty($schedule['flatdemandunit'])) {
            $this->flatDemandUnit = $schedule['flatdemandunit'];
        }
    }
    
    /**
     * get flatdemand rate unit fetched by utility schedule   
     * 
     * @return type
     */
    public function getFlatDemandUnit()
    {
        return $this->flatDemandUnit;
    }
    
    /**
     * set flatdemand months fetched by utility schedule   
     * 
     * @param type $schedule
     */
    public function setFlatDemandMonth($schedule)
    {
        if (!empty($schedule['flatdemandmonths'])) {
            $this->flatDemandMonths = $schedule['flatdemandmonths'];
        }
    }
    
    /**
     * get flatdemand months fetched by utility schedule   
     * 
     * @return type
     */
    public function getFlatDemandMonth()
    {
        return $this->flatDemandMonths;
    }
    
    /**
     * set flatdemand rate structure fetched by utility schedule   
     * 
     * @param type $schedule
     */
    public function setFlatDemandStructure($schedule)
    {
        if (!empty($schedule['flatdemandstructure'])) {
            $this->flatDemandStructure = $schedule['flatdemandstructure'];
        }
    }
    
    /**
     * get flatdemand rate structure fetched by utility schedule 
     * 
     * @return type
     */
    public function getFlatDemandStructure()
    {
        return $this->flatDemandStructure;
    }
    
    /**
     * set min monthly charge fetched by utility schedule 
     * 
     * @param type $schedule
     */
    public function setMinMonthlyCharge($schedule)
    {
        if (!empty($schedule['minmonthlycharge'])) {
            $this->minMonthlyCharge = $schedule['minmonthlycharge'];
        }
    }
    
    /**
     * get min monthly charge fetched by utility schedule 
     * 
     * @return type
     */
    public function getMinMonthlyCharge()
    {
        return $this->minMonthlyCharge;
    }
    
    /**
     * set fixed monthly charge fetched by utility schedule 
     * 
     * @param type $schedule
     */
    public function setFixedMonthlyCharge($schedule)
    {
        if (!empty($schedule['fixedmonthlycharge'])) {
            $this->fixedMonthlyCharge = $schedule['fixedmonthlycharge'];
        }
    }
    
    /**
     * get fixed monthly charged fetched by utility schedule 
     * 
     * @return type
     */
    public function getFixedMonthlyCharge()
    {
        return $this->fixedMonthlyCharge;
    }
    
    /**
     * set min annual charge fetched by utility schedule 
     * 
     * @param type $schedule
     */
    public function setMinAnnualCharge($schedule)
    {
        if (!empty($schedule['minannualcharge'])) {
            $this->minAnnualCharge = $schedule['minannualcharge'];
        }
    }
    
    /**
     * get min annual charge fetched by utility schedule 
     * 
     * @return type
     */
    public function getMinAnnualCharge()
    {
        return $this->minAnnualCharge;
    }
    
    /**
     * set sector of utility schedule 
     * 
     * @param object $schedule
     */
    public function setSector($schedule)
    {
        if (!empty($schedule['sector'])) {
            $this->sector = $schedule['sector'];
        }
    }
    
    /**
     * check if sector is commerical
     * 
     * @return boolean
     */
    public function isCommercial()
    {
        return ($this->sector == self::COMMERCIAL) ? true : false;
    }
    
    
    /**
     * get other additional charge or discount fetched by utility schedule on the basis of string 
     * 
     * @param array $schedule
     * @return array
     */
    public function getOtherAdditionalChargeOrDiscount($schedule)
    {
        $otherAdditionalCharges = [];
        (!empty($schedule['energycomments']) && preg_match('/[$%]+[0-9]+/', $schedule['energycomments'])) 
            ? array_push($otherAdditionalCharges, $schedule['energycomments']) : '';
        (!empty($schedule['demandcomments']) && preg_match('/[$%]+[0-9]+/', $schedule['demandcomments'])) 
            ? array_push($otherAdditionalCharges, $schedule['demandcomments']) : '';
        (!empty($schedule['basicinformationcomments']) && preg_match('/[$%]+[0-9]+/', $schedule['basicinformationcomments'])) 
            ? array_push($otherAdditionalCharges, $schedule['basicinformationcomments']) : '';
        (!empty($schedule['description']) && preg_match('/[$%]+[0-9]+/', $schedule['description'])) 
            ? array_push($otherAdditionalCharges, $schedule['description']) : '';
        
        if (!empty($schedule['demandattrs'])) {
            foreach ($schedule['demandattrs'] as $demandAttrs) {
                foreach ($demandAttrs as $key => $demandComment) {
                    (preg_match('/[$%]+[0-9]+/', $demandComment)) 
                    ? array_push($otherAdditionalCharges, [$key => $demandComment]) : '';
                }
            }
        }
        if (!empty($schedule['energyattrs'])) {
            foreach ($schedule['energyattrs'] as $energyAttrs) {
                foreach ($energyAttrs as $key => $energyComment) {
                    (preg_match('/[$%]+[0-9]+/', $energyComment)) 
                    ? array_push($otherAdditionalCharges, [$key => $energyComment]) : '';
                }
            }
        }
        return $otherAdditionalCharges;
    }
}
