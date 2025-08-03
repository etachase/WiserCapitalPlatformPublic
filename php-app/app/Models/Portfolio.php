<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public function sites()
    {
        return $this->belongsToMany('App\Models\Site')->withPivot('site_id', 'portfolio_id')->withTimestamps();
    }
    
    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('site_id', 'user_id')->withTimestamps();
    }
    
    public function agreementType()
    {
	    
	   /*
	   $system_location = $this->getMeta('system_location');
	   
	   $output = '';
	   foreach($system_location as $sl)
	   {
		   $output = $output .  Dropdown::$system_location[$sl] . "/";
	   }
	   return rtrim($output,'/');
	   */
    }
    
    
    public function avgPaidPrice()
    {
	    if(count($this->sites) == 0)
		return 0;
		
		$avgPaidPrice = 0;
        
        foreach ($this->sites as $site) 
        {
	        if(is_numeric($site->getPrice()))
	        {
		        $avgPaidPrice+=$site->getPrice();
	        }
        	
        }
            
        return number_format($avgPaidPrice / count($this->sites));
	    
    }
    
     public function avgEsc()
    {
	   if(count($this->sites) == 0)
		return 0;
		
		$avgEsc = 0;
        
        foreach ($this->sites as $site) 
        {
	        if(is_numeric($site->getEsc()))
	        {
		        $avgEsc+=$site->getEsc();
	        }
        	
        }
            
        return number_format($avgEsc / count($this->sites));
	    
    }
    
    
    public function getAvgAllInCost()
    {
	   if(count($this->sites) == 0)
		return 0;
		
		$avgEPCCost = 0;
        
        foreach ($this->sites as $site) 
        {
	        if(is_numeric($site->getAllInCost()))
	        {
		        $avgEPCCost+=$site->getAllInCost();
	        }
        	
        }
            
        return number_format($avgEPCCost / count($this->sites), 2);
	    
    }
    
 
    
     public function totalProduction()
    {
	    
        $totalProduction = 0;
            foreach ($this->sites as $s) {
                $totalProduction+=$s->getProduction();
            }
            
        return $totalProduction;
    }
    
    
    
    public function totalSystemSize()
    {
	    
        $totalSystemSize = 0;
            foreach ($this->sites as $s) {
                $totalSystemSize+= $s->getmeta('system_size');
            }
            
        return $totalSystemSize;
    }
    
    public function totalTerm()
    {
	    
        $maxTerm = 0;
	    foreach ($this->sites as $s) {
	    	
	        $maxTerm = 0;
	         
	        if($s->getTerm() >= $maxTerm)
	        {
	        	$maxTerm = $s->getTerm();
	        }
	    }
            
        return $maxTerm;
    }
    
    
    
    public function totalGrossRevenue()
    {
	    
       $total = 0;
        foreach ($this->sites as $s) {
            $total+= $s->getGrossRevenue();
        }
            
        return $total;
    }
    
    
    public function totalInvestment()
    {
	    
       $total = 0;
        foreach ($this->sites as $s) {
            $total+= $s->getTotalInvestment();
        }
            
        return $total;
    }
    
    public function totalITC()
    {
	    
       $total = 0;
        foreach ($this->sites as $s) {
            $total+= $s->getTotalITC();
        }
            
        return $total;
    }
    
    
    public function totalADPD()
    {
	    
       $total = 0;
        foreach ($this->sites as $s) {
            $total+= $s->getTotalADPD();
        }
            
        return $total;
    }
    
    
    
    public function avgWSARScore()
    {
		 
		if(count($this->sites) == 0)
		return 0;
		
		$avgWSARScore = 0;
        
        foreach ($this->sites as $site) {
        	$avgWSARScore+=$site->getWSARPoints();
        }
            
        return number_format($avgWSARScore / count($this->sites));
    }
    
    public function avgIRR()
    {
		 
		if(count($this->sites) == 0)
		return 0;
		
		$avgIRR = 0;
        
        foreach ($this->sites as $site) 
        {
	        if(is_numeric($site->getMeta('irr')))
	        {
		        $avgIRR+=$site->getMeta('irr');
	        }
        	
        }
            
        return number_format($avgIRR / count($this->sites));
    }
    
    
    
}
