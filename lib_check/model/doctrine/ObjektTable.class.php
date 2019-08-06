<?php


class ObjektTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Objekt');
    }
	
	/*
	*
	* This function returns all the article objects.
	*
	*/
	
	public function getAllBorstArticleObjects() 
	{ 
		$all_object_cri = Doctrine_Query::create()
	   					  ->from('Objekt bo')
						  ->orderBy('bo.object_id ASC')
						  ->groupBy('bo.object_name');
						  		
		$borstObject = $all_object_cri->execute();
		return $borstObject;
	}
	
	/*
	*
	* This function returns all the article objects.
	*
	*/
	
	public function getAllBorstArticleObjectsQuery() 
	{ 
		$all_object_cri = Doctrine_Query::create()
	   					  ->from('Objekt bo')
						  ->orderBy('bo.object_id ASC')
						  ->groupBy('bo.object_name');
						  		
		return $all_object_cri;
	}
	
	/*
	*
	* This function returns query for searched object.
	*
	*/
	
	public function getFindObjectsQuery($param)
	{ 
		/*$query = Doctrine_Query::create()->from('Objekt bo');
		if($obj_name) $query = $query->andWhere("bo.object_name LIKE '%".$obj_name."%'");
		if($obj_land) $query = $query->andWhere("bo.object_country LIKE '%".$obj_land."%'");
		return $query;*/
		
		$query = Doctrine_Query::create()->from('Objekt bo');
		if($param['obj_name']) $query = $query->andWhere("bo.object_name LIKE '%".$param['obj_name']."%'");
		if($param['obj_land']) $query = $query->andWhere("bo.object_country LIKE '%".$param['obj_land']."%'");
		return $query;
	}
}