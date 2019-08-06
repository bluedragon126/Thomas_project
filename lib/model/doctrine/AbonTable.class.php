<?php


class AbonTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Abon');
    }
	
	/*
	*
	* This function returns all the abon elements.
	*
	*/
	
	public function getAllAbon() 
	{ 
		$all_abon_cri = Doctrine_Query::create()
	   				  ->from('Abon a')
					  ->orderBy('a.abonid ASC');
		
		$abonData = $all_abon_cri->execute();
		return $abonData;
	}
}