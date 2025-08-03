<?php 

namespace App\Helpers;

class Helper
{
    public static function yearOneProduction($energy_yield, $system_size)
    {
        if($energy_yield > 0 && $system_size > 0)
        {
           return number_format($energy_yield * $system_size);
        }
        return false;

    } 
    
    
    public static function systemSizeDC($area)
    {
		return number_format(($area* 1.4) / 100, 2);
	}
	
	public static function production($system_size, $energyYield, $number_format = false){
		if(!$number_format)
		{
			return ($system_size * $energyYield);
		}
		else
		{
			return number_format($system_size * $energyYield);
		}
		
		
	}
	
	public static function strLength($str,$len){ 
    	$lenght = strlen($str); 
    	if($lenght > $len){ 
        	return substr($str,0,$len).'...'; 
    	}else{ 
        	return $str; 
    	} 
	} 
	
	public static function acronym($longname)
	{
		
		$longname = preg_replace('/[\[{\(].*[\]}\)]/U' , '', $longname);
		
		
	    $letters=array();
	    $words=explode(' ', $longname);
	    foreach($words as $word)
	    {
	        $word = (substr($word, 0, 1));
	        array_push($letters, $word);
	    }
	    $shortname = strtoupper(implode($letters));
	    return $shortname;
	}



}