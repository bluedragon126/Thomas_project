<?php

/**
 * SbtAds
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class SbtAds extends BaseSbtAds
{
   /*
	*
	* This function return a perticular ad.
	*
	*/
	
	public function getPerticularSbtAd($id) 
	{
		$query = Doctrine_Query::create()->from('SbtAds sa');
		$query = $query->where('sa.id = ?',$id);
		$data = $query->fetchOne();
		return $data;
	}

	
}