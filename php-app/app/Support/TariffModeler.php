<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Support;

/**
 * Description of TariffModeler
 */
class TariffModeler 
{
    const SATURDAY = 6; // Numeric representation of the day of the week for saturday 
    const SUNDAY   = 0; // Numeric representation of the day of the week for sunday
    const MINUTESINANHOUR = 60;
    
    protected $currentMonth    = ''; 
    protected $currentYear     = 0;
    protected $traiffStartDate = '';
    protected $utilitySchedule = '';
    protected $startTimestamp  = 0;
    protected $currentMonthStartDate = '';
    protected $currentMonthNumeric   = 0;
    protected $monthlyChargeStatus   = false;
    protected $intervalStartDate     = '';
    protected $intervalEndDate       = '';
    protected $intervalUnitConsumed  = 0;
    
    protected $error       = false;
    protected $message     = '';
    protected $hourlyBill  = [];
    protected $monthlyBill = [];
    protected $annualBill  = [];
    protected $startDate   = '';
    protected $endDate     = '';
    protected $unitConsumed= 0;
    protected $cost        = 0;
    
    /** 
     * unit consumed on monthly basis for energy, demand, coincident and flat demand. 
     * Its internal structure is based on schedule rate structure
     */
    protected $monthlyEnergyUnit = [];
    protected $monthlyDemandUnit = [];
    protected $monthlyCoincidentUnit = [];
    protected $monthlyFlatDemandUnit = [];

    public function __construct($utilitySchedule) 
    
    {
    	set_time_limit(0);
        $this->setUtilitySchedule(new UtilitySchedule($utilitySchedule));
    }
    
    /**
     * set utility schedule
     * 
     * @param \App\Support\UtilitySchedule $utilitySchedule
     */
    public function setUtilitySchedule(UtilitySchedule $utilitySchedule)
    {
        $this->utilitySchedule = $utilitySchedule;
    }
    
    /**
     * get utility schedule
     * 
     * @return \App\Support\UtilitySchedule
     */
    public function getUtilitySchedule()
    {
        return $this->utilitySchedule;
    }
    
    /**
     * Set month of curent interval (textual representation of month)
     * Check if current month not exist or current month start date not equal to set current month 
     */
    public function setCurrentMonth()
    {
        $this->currentMonth = date('F', $this->getStartTimestamp()); // A full textual representation of a month
    }
    
    /**
     * Sets error in case it occurs
     */
    public function setError()
    {
        $this->error = true;
    }
    
    /**
     * Get error status
     * 
     * return boolean
     */
    public function getError()
    {
        return $this->error;
    }
    
    /**
     * Sets monthly charge status 
     * If it is not added set it to false
     * 
     * @param boolean $status
     */
    public function setMonthlyChargeStatus($status)
    {
        $this->monthlyChargeStatus = $status;
    }
    
    /**
     * Get monthly charge status 
     * 
     * return boolean
     */
    public function getMonthlyChargeStatus()
    {
        return $this->monthlyChargeStatus;
    }
    
    /**
     * Sets the message corresponding to the status of error
     * 
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
    
    /**
     * Gets the final result message
     * 
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
    
    /**
     * get month of current interval
     * 
     * @return int
     */
    public function getCurrentMonth()
    {
        return $this->currentMonth;
    }
    
    /**
     * Set year of curent interval
     * Check if current year not exist or current year start date not equal to set current year
     */
    public function setCurrentYear()
    {
        $this->currentYear = date('Y', $this->getStartTimestamp()); // A full numeric representation of a year, 4 digits
    }
    
    /**
     * get year of current interval
     * 
     * @return int
     */
    public function getCurrentYear()
    {
        return $this->currentYear;
    }
    
    /**
     * Set start date of current interval month
     */
    public function setCurrentMonthStartDate()
    {
        $month = date('F', $this->getStartTimestamp());
        if (!$this->getCurrentMonth() || ($this->getCurrentMonth() && 
                ($this->getCurrentMonth() != $month))) {
            $this->currentMonthStartDate = $this->getStartDate();
        }
    }
    
    /**
     * get start date of current interval month
     * 
     * @return datetime
     */
    public function getCurrentMonthStartDate()
    {
        return $this->currentMonthStartDate;
    }
    
    /**
     * Set monthly unit used in the energy rate structure - 
     * this structure is based on energy rate structure of utility schedule
     * 
     * @param array $monthlyEnergyUnit
     */
    public function setMonthlyEnergyUnit($monthlyEnergyUnit)
    {
        $this->monthlyEnergyUnit = $monthlyEnergyUnit;
    }
    
    /**
     * get monthly unit used in the energy rate structure
     * 
     * @return array
     */
    public function getMonthlyEnergyUnit()
    {
        return $this->monthlyEnergyUnit;
    }
    
    /**
     * Set monthly unit used in the demand rate structure - 
     * this structure is based on demand rate structure of utility schedule
     * 
     * @param array $monthlyDemandUnit
     */
    public function setMonthlyDemandUnit($monthlyDemandUnit)
    {
        $this->monthlyDemandUnit = $monthlyDemandUnit;
    }
    
    /**
     * get monthly unit used in the demand rate structure
     * 
     * @return array
     */
    public function getMonthlyDemandUnit()
    {
        return $this->monthlyDemandUnit;
    }
    
    /**
     * Set monthly unit used in the coincident rate structure - 
     * this structure is based on coincident rate structure of utility schedule
     * 
     * @param array $monthlyCoincidentUnit
     */
    public function setMonthlyCoincidentUnit($monthlyCoincidentUnit)
    {
        $this->monthlyCoincidentUnit = $monthlyCoincidentUnit;
    }
    
    /**
     * get monthly unit used in the coincident rate structure
     * 
     * @return array
     */
    public function getMonthlyCoincidentUnit()
    {
        return $this->monthlyCoincidentUnit;
    }
    
    /**
     * Set monthly unit used in the flat demand rate structure - 
     * this structure is based on flat demand rate structure of utility schedule
     * 
     * @param array $monthlyFlatDemandUnit
     */
    public function setMonthlyFlatDemandUnit($monthlyFlatDemandUnit)
    {
        $this->monthlyFlatDemandUnit = $monthlyFlatDemandUnit;
    }
    
    /**
     * get monthly unit used in the flat demand rate structure
     * 
     * @return array
     */
    public function getMonthlyFlatDemandUnit()
    {
        return $this->monthlyFlatDemandUnit;
    }
    
    /**
     * Set bill (cost, usage and time) for each interval
     * 
     */
    public function setHourlyBill()
    {
        $hourlyBill = $this->getHourlyBill();
        array_push($hourlyBill, [
            'start_date'    => $this->getStartDate(),
            'end_date'      => $this->getEndDate(),
            'unit_consumed' => $this->getUnitConsumed(),
            'cost'          => $this->getCost()
        ]);
        $this->hourlyBill = $hourlyBill;
    }
    
    /**
     * Get bill of each interval
     * 
     * @return array
     */
    public function getHourlyBill()
    {
        return $this->hourlyBill;
    }
    
    /**
     * Set bill (cost, usage and time) for each interval
     * 
     * @param array $monthlyBill
     */
    public function setMonthlyBill($monthlyBill)
    {
        $this->monthlyBill = $monthlyBill;
    }
    
    /**
     * Get bill of each interval
     * 
     * @return array
     */
    public function getMonthlyBill()
    {
        return $this->monthlyBill;
    }
    
    /**
     * Set annual bill (cost and usage) for each year
     * 
     * @param array $annualBill
     */
    public function setAnnualBill($annualBill)
    {
        $this->annualBill = $annualBill;
    }
    
    /**
     * Get bill of each year
     * 
     * @return array
     */
    public function getAnnualBill()
    {
        return $this->annualBill;
    }
    
    /**
     * Set current interval start date of current interval
     * 
     * @param datetime $startDate
     */
    public function setCurrentIntervalStartDate($startDate)
    {
        $this->intervalStartDate = $startDate;
    }
    
    /**
     * Get current interval start date of current interval
     * 
     * @return datetime
     */
    public function getCurrentIntervalStartDate()
    {
        return $this->intervalStartDate;
    }
    
    /**
     * Set current interval end date of current interval
     * 
     * @param datetime $endDate
     */
    public function setCurrentIntervalEndDate($endDate)
    {
        $this->intervalEndDate = $endDate;
    }
    
    /**
     * Get current interval end date of current interval
     * 
     * @return datetime
     */
    public function getCurrentIntervalEndDate()
    {
        return $this->intervalEndDate;
    }
    
    /**
     * Set current interval unit consumed of current interval
     * 
     * @param float $unitConsumed
     */
    public function setCurrentIntervalUnitConsumed($unitConsumed)
    {
        $this->intervalUnitConsumed = $unitConsumed;
    }
    
    /**
     * Get current interval unit consumed of current interval
     * 
     * @return float
     */
    public function getCurrentIntervalUnitConsumed()
    {
        return $this->intervalUnitConsumed;
    }
    
    /**
     * Set start date of current interval
     * 
     * @param datetime $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }
    
    /**
     * Get start date of current interval
     * 
     * @return datetime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }
    
    /**
     * Set end date of current interval
     * 
     * @param datetime $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }
    
    /**
     * Get end date of current interval
     * 
     * @return datetime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
    
    /**
     * Set unit consumed of current interval
     * 
     * @param float $unitConsumed
     */
    public function setUnitConsumed($unitConsumed)
    {
        $this->unitConsumed = $unitConsumed;
    }
    
    /**
     * Get unit consumed of current interval
     * 
     * @return float
     */
    public function getUnitConsumed()
    {
        return $this->unitConsumed;
    }
    
    /**
     * Set cost of current interval
     * 
     * @param float $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }
    
    /**
     * Get cost of current interval
     * 
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }
    
    /**
     * Set start date of green button
     */
    public function setTariffStartDate()
    {
        if (!$this->tariffStartDate) {
            $this->tariffStartDate = $this->getStartDate();
        }
    }
    
    /**
     * Get start date of green button data
     * 
     * @return datetime
     */
    public function getTariffStartDate()
    {
        return $this->tariffStartDate;
    }
    
    
    /**
     * weekend array
     * 
     * @return array
     */
    public function getWeekendArray()
    {
        return [self::SATURDAY, self::SUNDAY];
    }
    
    /**
     * Set start date timestamp of current interval
     */
    public function setStartTimestamp()
    {
        $this->startTimestamp = strtotime($this->getStartDate());
    }
    
    /**
     * Get start timestamp of current interval
     * 
     * @return int
     */
    public function getStartTimestamp()
    {
        return $this->startTimestamp;
    }
    
    /**
     * Set indexed month of curent interval e.g - 0 - 11 where 0 - January and 11 - December
     * Check if current month not exist or current month start date not equal to set current month 
     */
    public function setCurrentMonthNumeric()
    {
        $this->currentMonthNumeric = $month = date('n', $this->getStartTimestamp()) - 1; // A full textual representation of a month
    }
    
    /**
     * Get numeric repersentation of month of current interval e.g - 0 - 11
     * 
     * @return int
     */
    public function getCurrentMonthNumeric()
    {
        return $this->currentMonthNumeric;
    }
    
    /**
     * Check the current month is equal to the current interval month
     * 
     * @return boolean
     */
    public function checkCurrentMonth() 
    {
        return ($this->getCurrentMonthNumeric() == (date('n', $this->getStartTimestamp()) - 1));
    }
    
    /**
     * Checks the timestamp if it is weekend
     * "w" in date is the Numeric representation of the day of the week
     * 
     * @return boolean
     */
    public function isWeekend()
    {
        return in_array(date("w", $this->getStartTimestamp()), $this->getWeekendArray());
    }
    
    /**
     * Set current month cost
     * 
     * @param float $cost
     */
    public function setCurrentMonthCost($cost) 
    {
        $monthlyBill = $this->getMonthlyBill();
        $monthlyBill[$this->getCurrentYear()][$this->getCurrentMonth()]['cost'] = $cost;
        $this->setMonthlyBill($monthlyBill);
    }
    
    /**
     * Get current month cost
     * 
     * @return float
     */
    public function getCurrentMonthCost() 
    {
        $monthlyBill = $this->getMonthlyBill();
        return !empty($monthlyBill[$this->getCurrentYear()][$this->getCurrentMonth()]['cost'])
                    ? $monthlyBill[$this->getCurrentYear()][$this->getCurrentMonth()]['cost'] : 0;
    }
    
    /**
     * Set current month unit consumed
     * 
     * @param float $unitConsumed
     */
    public function setCurrentMonthUnit($unitConsumed) 
    {
        $monthlyBill = $this->getMonthlyBill();
        $monthlyBill[$this->getCurrentYear()][$this->getCurrentMonth()]['unit_consumed'] = $unitConsumed;
        $this->setMonthlyBill($monthlyBill);
    }
    
    /**
     * Set current month days
     */
    public function setCurrentMonthDays() 
    {
        $date = date('d', $this->getStartTimestamp());
        $monthlyBill = $this->getMonthlyBill();
        $monthlyBill[$this->getCurrentYear()][$this->getCurrentMonth()]['days'] = 
                !empty($monthlyBill[$this->getCurrentYear()][$this->getCurrentMonth()]['days']) ? 
                (($monthlyBill[$this->getCurrentYear()][$this->getCurrentMonth()]['days'] < $date) ? $date 
                : $monthlyBill[$this->getCurrentYear()][$this->getCurrentMonth()]['days']) : $date;
        $this->setMonthlyBill($monthlyBill);
    }
    
    /**
     * Get current month unit consumed
     * 
     * @return float
     */
    public function getCurrentMonthUnit() 
    {
        $monthlyBill = $this->getMonthlyBill();
        return !empty($monthlyBill[$this->getCurrentYear()][$this->getCurrentMonth()]['unit_consumed'])
                    ? $monthlyBill[$this->getCurrentYear()][$this->getCurrentMonth()]['unit_consumed'] : 0;
    }
    
    /**
     * Set current year cost
     * 
     * @param float $cost
     */
    public function setCurrentAnnualCost($cost) 
    {
        $annualBill = $this->getAnnualBill();
        $annualBill[$this->getCurrentYear()]['cost'] = $cost;
        $this->setAnnualBill($annualBill);
    }
    
    /**
     * Get current year cost
     * 
     * @return float
     */
    public function getCurrentAnnualCost() 
    {
        $annualBill = $this->getAnnualBill();
        return !empty($annualBill[$this->getCurrentYear()]['cost'])
                    ? $annualBill[$this->getCurrentYear()]['cost'] : 0;
    }
    
    /**
     * Set current year unit consumed
     * 
     * @param float $unitConsumed
     */
    public function setCurrentAnnualUnit($unitConsumed) 
    {
        $annualBill = $this->getAnnualBill();
        $annualBill[$this->getCurrentYear()]['unit_consumed'] = $unitConsumed;
        $this->setAnnualBill($annualBill);
    }
    
    /**
     * Get current year unit
     * 
     * @return float
     */
    public function getCurrentAnnualUnit() 
    {
        $annualBill = $this->getAnnualBill();
        return !empty($annualBill[$this->getCurrentYear()]['unit_consumed'])
                    ? $annualBill[$this->getCurrentYear()]['unit_consumed'] : 0;
    }
    
    /**
     * Check the min monthly cost
     * if cost is less than the min monthly cost then set monthly cost = min monthly cost
     * 
     * @return boolean
     */
    public function checkMinMonthlyCost()
    {
        $minMonthlyCharge = $this->utilitySchedule->getMinMonthlyCharge();
        
        if (!$this->getCurrentMonthNumeric() || $this->checkCurrentMonth() 
                || !$minMonthlyCharge || ($minMonthlyCharge && 
                ($this->getCurrentMonthCost() >= $minMonthlyCharge))) {
            return false;
        }
        $this->setCurrentMonthCost($minMonthlyCharge);
        return true;
    }
    
    /**
     * Adding monthly charges in the current monthly cost
     * 
     * @return boolean
     */
    public function addMonthlyCharges($forceExecution = false)
    {
        if (!$forceExecution && (!($this->getCurrentMonthNumeric() && 
                $this->getCurrentMonth()) || $this->checkCurrentMonth())) {
            
            $this->setMonthlyChargeStatus(false);
            return false;
        }
        $this->setMonthlyChargeStatus(true);
        $monthlyBill = $this->getMonthlyBill();
        $days = $monthlyBill[$this->getCurrentYear()][$this->getCurrentMonth()]['days'];
        $endDateOfMonth = date('t', strtotime(date($this->getCurrentMonth(). ' '. $this->getCurrentYear())));
        
        foreach ($this->getMonthlyDemandUnit() as $key => $demand) {
            
            if (empty($demand['unit_consumed'])) {
                continue;
            }
            
            $flatDemandMonths    = $this->utilitySchedule->getFlatDemandMonth();
            $flatDemandStructure = $this->utilitySchedule->getFlatDemandStructure();
            $flatDemandUnit      = $this->utilitySchedule->getFlatDemandUnit();
            // flat demand charges
            if(count($flatDemandStructure)) {
                $energyRateStructureIndex = $flatDemandMonths[$this->getCurrentMonthNumeric()];
                
                if (!empty($flatDemandStructure[$energyRateStructureIndex]) && ($energyRateStructureIndex == $key)) {
                    $rateStructure = $this->processAdjustment($this->findApplicableRate(
                                    $flatDemandStructure[$energyRateStructureIndex], $this->getUnitConsumed()));
                    $demand['rate'] +=  $this->unitConversion($flatDemandUnit, $rateStructure['rate']);
                }
            }
            $demand['rate'] = ($demand['rate'] * $days) / $endDateOfMonth;
            
            $monthlyCost = $this->getCurrentMonthCost() + round($demand['unit_consumed'] * $demand['rate'], 2);
            $this->setCurrentMonthCost(round($monthlyCost, 2));
        }
        
        $monthlyCost = $this->getCurrentMonthCost() + round(($this->utilitySchedule->getFixedMonthlyCharge() * $days) / $endDateOfMonth, 2);
        $this->setCurrentMonthCost(round($monthlyCost, 2));
        return true;
    }
    
    /**
     * Resets all (energy, demand, coincident and flat demand) monthly unit 
     * 
     * @return boolean
     */
    public function resetMonthlyUnitConsumed()
    {
        if ($this->checkCurrentMonth()) {
            return false;
        }
        $this->setMonthlyEnergyUnit([]);
        $this->setMonthlyDemandUnit([]);
        $this->setMonthlyCoincidentUnit([]);
        $this->setMonthlyFlatDemandUnit([]);
        return true;
    }
    
    /**
     * Checks the min annual cost
     * if cost is less than the min annual cost then set annual cost = min annual cost
     * 
     * @return boolean
     */
    public function checkMinAnnualCost()
    {
        $minAnnualCharge = $this->utilitySchedule->getMinAnnualCharge();
        $year = $this->getCurrentYear();
        
        if (!$year || ($year && ($year == date('Y', $this->getStartTimestamp()))) 
                || !$minAnnualCharge || ($minAnnualCharge && 
                ($this->getCurrentAnnualCost() >= $minAnnualCharge))) {
            return false;
        }
        $this->setCurrentAnnualCost($this->utilitySchedule->getMinAnnualCharge());
        return true;
    }
    
    /**
     * Calculates the annual bill and then set it to the annual bill
     */
    public function calculateAnnualBill() 
    {
        $monthlyBill = $this->getMonthlyBill();
        if (empty($monthlyBill[$this->getCurrentYear()])) {
            return;
        }
        foreach ($monthlyBill[$this->getCurrentYear()] as $bill) {
            $cost = $this->getCurrentAnnualCost() + (!empty($bill['cost']) ? $bill['cost'] : 0);
            $this->setCurrentAnnualCost(round($cost, 2));
            $this->setCurrentAnnualUnit($this->getCurrentAnnualUnit() + 
                (!empty($bill['unit_consumed']) ? $bill['unit_consumed'] : 0));
        }
    }
    
    /**
     * Get the total calculated cost
     * 
     * @return float
     */
    public function getTotalBillCost()
    {
        $cost = 0;
        foreach ($this->getAnnualBill() as $bill) {
            $cost += !empty($bill['cost']) ? $bill['cost'] : 0;
        }
        return $cost;
    }
    
    public function calculateDemandCost()
    {
        
        $demandRateUnit         = $this->utilitySchedule->getDemandRateUnit();
        $demandWeekendSchedule  = $this->utilitySchedule->getDemandWeekendSchedule();
        $demandRateStructure    = $this->utilitySchedule->getDemandRateStructure();
        $demandWeekdaySchedule  = $this->utilitySchedule->getDemandWeekdaySchedule();
        
        
        $date_differnce = date_diff(date_create($this->getCurrentIntervalStartDate()), 
                            date_create($this->getCurrentIntervalEndDate()))->format('%i');
        $demandUnit     = $this->getCurrentIntervalUnitConsumed() * (round(self::MINUTESINANHOUR / $date_differnce));
        $timestamp      = strtotime($this->getCurrentIntervalStartDate());
        
        // on demand charges
        if(count($demandRateStructure)) {
            $schedule = $this->isWeekend() ? $demandWeekendSchedule : $demandWeekdaySchedule;
            $energyRateStructureIndex = $schedule[date('n', $timestamp) - 1][date('G', $timestamp)];
            
            $monthlyUnit = $this->getMonthlyDemandUnit();
            $structure   = !empty($monthlyUnit[$energyRateStructureIndex]) ? 
                                    $monthlyUnit[$energyRateStructureIndex] : [];
            
            if (!empty($demandRateStructure[$energyRateStructureIndex]) && 
                    (empty($structure['unit_consumed']) || (!empty($structure['unit_consumed'])
                    && ($structure['unit_consumed'] < $demandUnit)))) {
                $rateStructure = $this->processAdjustment($this->findApplicableRate(
                                    $demandRateStructure[$energyRateStructureIndex], 
                                    $this->getCurrentIntervalUnitConsumed()));
                $rateStructure['rate'] = $this->unitConversion($demandRateUnit, $rateStructure['rate']);
                $rateStructure['unit_consumed'] = $demandUnit;

                $monthlyUnit[$energyRateStructureIndex] = $rateStructure;
                $this->setMonthlyDemandUnit($monthlyUnit);
            }
        }
    }
    
    /**
     * calculate demand cost and usage and check for interval
     */
    public function checkInterval()
    {
        $this->calculateDemandCost();
        
        //start date is used in missing time frame check below.
        (!$this->getStartDate()) ?
            $this->setStartDate($this->getCurrentIntervalStartDate()) : '';
        $start = strtotime($this->getCurrentIntervalStartDate());
        // handling missing time frames e.g 3:15 comes directly after 2:45 
        if (date('H', strtotime($this->getStartDate())) != date('H', $start)) {
            $this->calculateAllCosts();
            $this->setStartDate(date('Y-m-d H:i:s', $start));
            $this->setUnitConsumed(0);
        }
        $this->setEndDate($this->getCurrentIntervalEndDate());
        $this->setUnitConsumed($this->getUnitConsumed() 
                    + $this->getCurrentIntervalUnitConsumed());
        if ($this->getEndDate() != date('Y-m-d H' , 
                strtotime('+1 hour', strtotime($this->getStartDate()))). ":00:00") {
            return;
        }
        $this->calculateAllCosts();
        $this->setStartDate('');
        $this->setUnitConsumed(0);
    }
    
    
    /**
     * Calculates all costs and usage in current time frame
     */
    public function calculateAllCosts()
    { 
        $this->setStartTimestamp();
        $this->checkMinMonthlyCost();
        $this->addMonthlyCharges();
        
        if ($this->getCurrentYear() && ($this->getCurrentYear() != date('Y', $this->getStartTimestamp()))) {
            $this->calculateAnnualBill();
        }
        
        $this->checkMinAnnualCost();
        $this->resetMonthlyUnitConsumed();
        $this->setCurrentMonth(); 
        $this->setCurrentMonthNumeric(); 
        $this->setCurrentYear();
        
        $energyWeekendSchedule  = $this->utilitySchedule->getEnergyWeekendSchedule();
        $energyRateStructure    = $this->utilitySchedule->getEnergyRateStructure();
        $energyWeekdaySchedule  = $this->utilitySchedule->getEnergyWeekdaySchedule();
        $coincidentRateUnit     = $this->utilitySchedule->getCoincidentRateUnit();
        $coincidentRateStructure= $this->utilitySchedule->getCoincidentRateStructure();
        $coincidentRateSchedule = $this->utilitySchedule->getCoincidentRateSchedule();
        
        $hour       = date('G', $this->getStartTimestamp()); // numeric representation of hour
        $month      = $this->getCurrentMonthNumeric();
        $cost       = 0;
        // energy charges
        if(count($energyRateStructure)) {
            $schedule = $this->isWeekend() ? $energyWeekendSchedule : $energyWeekdaySchedule;
            $energyRateStructureIndex = $schedule[$month][$hour];
            
            if (!empty($energyRateStructure[$energyRateStructureIndex])) {
                $monthlyUnit = $this->getMonthlyEnergyUnit();
                $unitsConsumed = !empty($monthlyUnit[$energyRateStructureIndex]) ? 
                                    $monthlyUnit[$energyRateStructureIndex] : 0;
                $rateStructure  = $this->processAdjustment($this->findApplicableRate(
                                    $energyRateStructure[$energyRateStructureIndex], $unitsConsumed));

                $cost += !empty($rateStructure['unit']) ? $this->unitConversion($rateStructure['unit'], 
                                $rateStructure['rate']) : $rateStructure['rate'];
                $monthlyUnit[$energyRateStructureIndex] = $unitsConsumed + $this->getUnitConsumed();
                $this->setMonthlyEnergyUnit($monthlyUnit);
            }
        }
        
        // coincident charges 
        if(count($coincidentRateStructure)) {
            $energyRateStructureIndex = $coincidentRateSchedule[$month][$hour];
            
            if (!empty($coincidentRateStructure[$energyRateStructureIndex])) {
                $monthlyUnit   = $this->getMonthlyCoincidentUnit();
                $unitsConsumed = !empty($monthlyUnit[$energyRateStructureIndex]) ? 
                                    $monthlyUnit[$energyRateStructureIndex] : 0;
                $rateStructure = $this->processAdjustment($this->findApplicableRate(
                                    $coincidentRateStructure[$energyRateStructureIndex], $unitsConsumed));

                $rateStructure['rate'] = $this->unitConversion($coincidentRateUnit, $rateStructure['rate']);
                $monthlyUnit[$energyRateStructureIndex] = $unitsConsumed + $this->getUnitConsumed();
                $this->setMonthlyCoincidentUnit($monthlyUnit);
            }
        }
        
        $this->setCost(round(($this->getUnitConsumed() * $cost), 2));
        $monthlyCost = $this->getCurrentMonthCost() + $this->getCost();
        $this->setCurrentMonthCost(round($monthlyCost, 2));
        $this->setCurrentMonthUnit($this->getCurrentMonthUnit() + $this->getUnitConsumed());
        $this->setCurrentMonthDays();
        $this->setHourlyBill();
    }
    
    /**
     * Converts the unit of rate (energy, demand, coincident & flatDemand)
     * 
     * @param string $unit
     * @param float $rate
     * @return float
     */
    public function unitConversion($unit, $rate)
    {
        switch ($unit) {
            case 'hp' :
                $rate =  $rate * 0.746;
                break;
            case 'kW daily' :
                $rate =  $rate / 24;
                break;
            case 'kWh/kW daily' :
                $rate =  $rate / 24;
                break;
            case 'hp daily' :
                $rate =  ($rate * 0.746) / 24;
                break;
            default :
                break;
        }
        return $rate;
    }
    
    /**
     * Finds the actual rate applied among many rates
     * 
     * @param array $rateStructures
     * @param float $usedUnit
     * @return array
     */
    public function findApplicableRate($rateStructures, $usedUnit)
    {
        if ($this->utilitySchedule->isCommercial()) {
            return $rateStructures[0];
        }
        $result = [];
        // assumption - Rate structure are in assending order
        foreach ($rateStructures as $rateStructure) {
            if (empty($rateStructure['max'])) {
                $result = $rateStructure;
                break;
            }
            
            if ($rateStructure['max'] <= $usedUnit) {
                $result = $rateStructure;
                break;
            }
        }
        
        return $result;
    }
    
    /**
     * Process the adjustment value given in rate
     * 
     * @param array $rateStructure
     * @return array
     */
    public function processAdjustment($rateStructure)
    {
        $rateStructure['rate'] = !empty($rateStructure['rate']) ? $rateStructure['rate'] : 0;
        if (empty($rateStructure['adj'])) {
            return $rateStructure;
        }
        $rateStructure['rate'] -= $rateStructure['adj'];
        return $rateStructure;
    }
    
    /**
     * Check if time duration exist or not
     * 
     * @param datetime $end
     */
    public function checkTimeDuration()
    {
        if (!$this->getCurrentIntervalStartDate() || !$this->getCurrentIntervalEndDate()) {
            $this->setError();
            $this->setMessage(trans('hf/greenbutton.error.cannot-model', ['message' 
                => trans('hf/greenbutton.messages.timeduration-doesnot-exist')]));
            return false;
        }
        return true;
    }
}
