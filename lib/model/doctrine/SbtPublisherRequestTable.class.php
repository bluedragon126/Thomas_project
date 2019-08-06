<?php


class SbtPublisherRequestTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SbtPublisherRequest');
    }
	
   /*
	*
	* To function returns query, which conatins result in a specific order.
	*
	*/
	public function getAllPublisherRequestQuery($column_id,$order)
	{ 
		$query = Doctrine_Query::create()->from('SbtPublisherRequest spr')->where('spr.request_status =?',0);
		
		switch($column_id)
		{
			case 'date': $query = $query->orderBy('spr.created_at '.$order); break;
			case 'author': $query = $query->innerJoin('spr.sfGuardUser sUser')->innerJoin('sUser.SfGuardUserProfile profile');
			               $query = $query->orderBy('concat(profile.firstname," ",profile.lastname) '.$order); break;
		}
        //echo $query->getSqlQuery();
		return $query;
	}
}