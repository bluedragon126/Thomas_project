<?php

/**
 * SbtAnalysisMedalDetails
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class SbtAnalysisMedalDetails extends BaseSbtAnalysisMedalDetails
{
   /*
	*
	* This function returns no. of awards received by a article of a perticular type.
	*
	*/
	
	public function getAnalysisAwardTypeCount($analysis_id,$type_id) 
	{ 
		$query = Doctrine_Query::create()
	   		   ->from('SbtAnalysisMedalDetails samd')
			   ->where('samd.analysis_id  = ? AND samd.analysis_medal_type_id = ?', array($analysis_id,$type_id));

		$data = $query->execute();
		return count($data);
	}
}