<?php

/**
 * SbtMarket
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class SbtMarket extends BaseSbtMarket
{

   /*
	*
	* This function return selected market record
	*
	*/
	public function getSelctedMarket($id_arr)
	{
		$arr = array();
		
		if(count($id_arr) > 0)
		{
			$q = Doctrine_Query::create()
			   ->from('SbtMarket sm')
			   ->whereIn('sm.id', $id_arr);
	
			$data = $q->execute();
	
			foreach($data as $rec)
			{
				$arr[$rec->id] = $rec->sbt_market_name;
			}
		}
		return $arr;
	}
}