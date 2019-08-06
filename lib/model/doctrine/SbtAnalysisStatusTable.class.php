<?php


class SbtAnalysisStatusTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SbtAnalysisStatus');
    }
	
   /*
	*
	* This function returns all the article categories.
	*
	*/
	public function getAllSbtArticleStatus() 
	{ 
		$status_arr = array();
		$query = Doctrine_Query::create()->from('SbtAnalysisStatus sas')->where('sas.id!=4 AND sas.id!=3')->orderBy('sas.id ASC');
		$sbtStatus = $query->execute();
		
		foreach($sbtStatus as $status)		{	$status_arr[$status->id] = $status->status_name;	}
		
		return $status_arr;
	}
}