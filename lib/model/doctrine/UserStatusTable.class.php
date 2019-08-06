<?php


class UserStatusTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('UserStatus');
    }
	
	/*
	*
	* This function returns all the User Status.
	*
	*/
	
	public function getAllUserStatus() 
	{ 
		$all_user_status_cri = Doctrine_Query::create()
	   				  		 ->from('UserStatus us')
					         ->orderBy('us.userstatid ASC');
		
		$user_status_data = $all_user_status_cri->execute();
		return $user_status_data;
	}
}