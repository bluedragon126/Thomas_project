<?php


class SbtUserBlogProfileTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SbtUserBlogProfile');
    }   
    /*
	*
	* Returns user blog profile details from user_id.
	*
	*/
    
    public function fetchUserBlogProfile($id){
		$fetch_user_cri = Doctrine_Query::create()
							->from('SbtUserBlogProfile subp')
							->where('subp.user_id = ?', $id);
		$userdata = $fetch_user_cri->fetchOne();
		
		if($userdata)
			return $userdata;
		else
			return '';
    }
}