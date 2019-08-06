<?php


class SbtFriendRequestTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SbtFriendRequest');
    }
	
   /*
	*
	* To function returns all request for a perticular user.
	*
	*/
	
	public function getAllRequest($id) 
	{
		$all_request_cri = Doctrine_Query::create()
								 ->from('SbtFriendRequest fr')
								 ->where('fr.contactee_id = ? AND fr.status = ?', array($id,0))
								 ->orderBy('fr.created_at DESC');

		return $all_request_cri;
	}
	
   /*
	*
	* To function returns list of blocked user.
	*
	*/
	
	public function getAllBlockedUser($id) 
	{
		$all_request_cri = Doctrine_Query::create()
								 ->from('SbtFriendRequest fr')
								 ->where('fr.contactee_id = ? AND fr.status = ?', array($id,3))
								 ->orderBy('fr.created_at DESC');

		return $all_request_cri;
	}
	
   /*
	*
	* Returns query for all friends.
	*
	*/
	
	public function fetchAllFriendQuery($user_id) 
	{ 
		$friend_id = array();
		
		$friend_cri_1 = Doctrine_Query::create()
					  ->from('SbtFriendRequest sfr')
					  ->where('sfr.contactor_id = ? OR sfr.contactee_id = ?', array($user_id,$user_id))
					  ->andWhere('sfr.status = ?', 1);
		
		$all_friends = $friend_cri_1->execute();
		
		foreach($all_friends as $friend)
		{ 
			if($friend->contactor_id == $user_id)
				$friend_id[] = $friend->contactee_id;
				
			if($friend->contactee_id == $user_id)
				$friend_id[] = $friend->contactor_id;
		}
		
		if(count($friend_id)==0) $friend_id[0] = 0;
		
		$fecth_all_friend_cri = Doctrine_Query::create()
					 ->from('SfGuardUserProfile u')
					 ->whereIn('u.user_id', $friend_id);

		return $fecth_all_friend_cri;
	}

}