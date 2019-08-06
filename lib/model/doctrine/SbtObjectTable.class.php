<?php


class SbtObjectTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SbtObject');
    }
	
	/*
	*
	* This function returns all the article objects.
	*
	*/
	
	public function getAllSbtArticleObjects() 
	{ 
		$object_arr = array();
		$all_object_cri = Doctrine_Query::create()
	   					  ->from('SbtObject so')
						  ->orderBy('so.id ASC');
						  		
		$sbtObject = $all_object_cri->execute();
		
		foreach($sbtObject as $obj)	{	$object_arr[$obj->id] = $obj->object_short_name;	}
		
		return $object_arr;
	}
	/*
	*
	* This function returns stock list from objects.
	*
	*/
	public static function getAllSbtStock($typeid) 
	{ 
	
		$all_object_cri = Doctrine_Query::create()
	   					  ->from('SbtObject so')
						  ->addFrom('so.SbtStockList l')
						  ->where('so.type_id = '. $typeid .' AND so.stocklist_id != 0')
						  ->groupBy('so.stocklist_id')
						  ->orderBy('l.display_order ASC');

		$sbtObject = $all_object_cri->execute();
		
		$temp_stocklist_list = array();
		foreach ($sbtObject as $stocklist) {
		    $temp_stocklist_id_list[] = $stocklist->stocklist_id;
		}

		return $temp_stocklist_id_list;
	}
	/*
	*
	* This function returns sector list from objects.
	*
	*/
	public static function getAllSbtSector($typeid) 
	{ 
		$query = Doctrine_Query::create() ->from('SbtObject sbt')->where('sbt.type_id = ?', $typeid .' and sbt.sector_id > 0')->groupBy('sbt.sector_id');
		$data = $query->execute();

		$temp_sector_list = array();
		foreach ($data as $stocklist) {
		    $temp_sector_list[] = $stocklist->sector_id;
		}
		

		return $temp_sector_list;
	}
}