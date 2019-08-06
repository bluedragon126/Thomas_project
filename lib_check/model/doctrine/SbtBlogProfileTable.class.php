<?php


class SbtBlogProfileTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SbtBlogProfile');
    }
	
   /*
	*
	* Returns user blog details from user_id.
	*
	*/
	
	public function fetchBlogProfile($id) 
	{ 
		$fetch_user_cri = Doctrine_Query::create()
							->from('SbtBlogProfile sbp')
							->where('sbp.user_id = ?', $id);
		$userdata = $fetch_user_cri->fetchOne();
		
		if($userdata)
			return $userdata;
		else
			return '';
	}
}