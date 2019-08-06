<?php


class SfGuardUserProfileTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SfGuardUserProfile');
    }
	
   /*
	*
	* To function returns all SisterBT user query.
	*
	*/
	
	public function getAllSisterBtUserQuery()
	{ 
		$id_arr = array();
		
		$fetch_id_cri = Doctrine_Query::create()
								->from('SbtBlogProfile sbp')
								->orderBy('sbp.id ASC');
		
		$id_data = $fetch_id_cri->execute();
		foreach($id_data as $data)
		{
			$id_arr[] = $data->user_id;
		}
							
		$all_user_cri = Doctrine_Query::create()
								->from('SfGuardUserProfile sup')
								->whereIn('sup.user_id', $id_arr);  
		return $all_user_cri;
	}
	
   /*
	*
	* To function returns all users query.
	*
	*/
	
	public function getAllUserQuery()
	{ 
		$all_user_cri = Doctrine_Query::create()
								->from('SfGuardUserProfile sup')
								->orderBy('sup.regdate DESC');
		return $all_user_cri;
	}
	
   /*
	*
	* To function returns query for which contains all users by specified order.
	*
	*/
	
	public function getAllUserByOrderQuery($column_id,$order)
	{ 
		$query = Doctrine_Query::create()->from('SfGuardUserProfile sup');
		
		switch($column_id)
		{
			case 'title':  	$order = $order == 'ASC' ? 'DESC' : 'ASC';
			               	$query = $query->innerJoin('sup.sfGuardUser sfUser'); 
			               	$query = $query->orderBy('sfUser.is_super_admin '.$order); break;
			case 'regdate': $query = $query->orderBy('sup.regdate '.$order); break;
			case 'author':  $query = $query->orderBy('concat(sup.firstname," ",sup.lastname) '.$order); break;
			                
			
			case 'vote': 	$query = $query->innerJoin('sup.sfGuardUser sfUser'); 
						  	$query = $query->leftJoin('sfUser.SbtVoteDetails sbtVote'); 
						  	$query = $query->groupBy('sfUser.id');
						  	$query = $query->orderBy('count(sbtVote.author_id) '.$order);
						  	break;
					   

			case 'message': $query = $query->leftJoin('sup.SbtMessages supMess'); 
			                $query = $query->groupBy('sup.user_id'); 
						    $query = $query->orderBy('count(supMess.message_to) '.$order);
						    break;
				
			case 'totallogin':  $query = $query->orderBy('sup.inlog '.$order); break;
			case 'lastlogin':  $query = $query->orderBy('sup.inlogdate '.$order); break;
			case 'default':  $query = $query->orderBy('sup.regdate DESC'); break;
		}
		if(!$column_id) $query = $query->orderBy('sup.regdate DESC');
//echo $query->getSqlQuery();
		return $query;
	}
	
   /*
	*
	* To function returns array.
	*
	*/
	public function isPublisher()
	{ 
		$arr = array();
		$query = Doctrine_Query::create()->from('SfGuardUser u');
		$data = $query->execute();
		foreach($data as $tt)
		{
			if($tt->hasGroup('SbtArticlePublisher')) $arr[$tt->id] = 1;
            else  $arr[$tt->id] = 0; 
		}
		return $arr;
	}
    
    public function getSearchedUserlistQuery($word,$column_id,$order,$add_param)    
    {
		if(!$word)
            $word = 'no_result_found_condtion_no_match';
        $query = Doctrine_Query::create()->from('SfGuardUserProfile sup');
        $query = $query->andWhere("sup.firstname LIKE '%".$word."%' OR sup.lastname LIKE '%".$word."%'");
		
		switch($column_id)
		{
			case 'title_userlist':  	$order = $order == 'ASC' ? 'DESC' : 'ASC';
			               	$query = $query->innerJoin('sup.sfGuardUser sfUser'); 
			               	$query = $query->orderBy('sfUser.is_super_admin '.$order); break;
			case 'regdate': $query = $query->orderBy('sup.regdate '.$order); break;
			case 'author_userlist':  $query = $query->orderBy('concat(sup.firstname," ",sup.lastname) '.$order); break;
			                
			
			case 'vote': 	$query = $query->innerJoin('sup.sfGuardUser sfUser'); 
						  	$query = $query->leftJoin('sfUser.SbtVoteDetails sbtVote'); 
						  	$query = $query->groupBy('sfUser.id');
						  	$query = $query->orderBy('count(sbtVote.author_id) '.$order);
						  	break;
					   

			case 'message': $query = $query->leftJoin('sup.SbtMessages supMess'); 
			                $query = $query->groupBy('sup.user_id'); 
						    $query = $query->orderBy('count(supMess.message_to) '.$order);
						    break;
				
			case 'totallogin':  $query = $query->orderBy('sup.inlog '.$order); break;
			case 'lastlogin':  $query = $query->orderBy('sup.inlogdate '.$order); break;
			case 'default':  $query = $query->orderBy('sup.regdate DESC'); break;
		}
		if(!$column_id) $query = $query->orderBy('sup.regdate DESC');

		return $query;        
    }
    
    public function getAdvancedSearchedUserlistQuery($word,$username,$column_id,$order,$add_param,$nocriteria)
    {
        if(!$username){
            $username = 'no_result_found_condtion_no_match';
            if($nocriteria)
                $only_userlist_with_no_criteria = 1;		  
		}
        else
            $only_userlist_with_no_criteria = 0;

        $query = Doctrine_Query::create()->from('SfGuardUserProfile sup');
                       
        $arr = explode(" ",$username);        
        
        if(!$only_userlist_with_no_criteria)
        {
            if(count($arr)>1)
                $query = $query->where("sup.firstname LIKE '%".$arr[0]."%' OR sup.lastname LIKE '%".$arr[1]."%'");
            else
                $query = $query->where("sup.firstname LIKE '%".$username."%' OR sup.lastname LIKE '%".$username."%'");            
        }

 		
		switch($column_id)
		{
			case 'title_userlist':  	$order = $order == 'ASC' ? 'DESC' : 'ASC';
			               	$query = $query->innerJoin('sup.sfGuardUser sfUser'); 
			               	$query = $query->orderBy('sfUser.is_super_admin '.$order); break;
			case 'regdate': $query = $query->orderBy('sup.regdate '.$order); break;
			case 'author_userlist':  $query = $query->orderBy('concat(sup.firstname," ",sup.lastname) '.$order); break;
			                
			
			case 'vote': 	$query = $query->innerJoin('sup.sfGuardUser sfUser'); 
						  	$query = $query->leftJoin('sfUser.SbtVoteDetails sbtVote'); 
						  	$query = $query->groupBy('sfUser.id');
						  	$query = $query->orderBy('count(sbtVote.author_id) '.$order);
						  	break;
					   

			case 'message': $query = $query->leftJoin('sup.SbtMessages supMess'); 
			                $query = $query->groupBy('sup.user_id'); 
						    $query = $query->orderBy('count(supMess.message_to) '.$order);
						    break;
				
			case 'totallogin':  $query = $query->orderBy('sup.inlog '.$order); break;
			case 'lastlogin':  $query = $query->orderBy('sup.inlogdate '.$order); break;
			case 'default':  $query = $query->orderBy('sup.regdate DESC'); break;
		}
		if(!$column_id) $query = $query->orderBy('sup.regdate DESC');
        //echo $query->getSqlQuery();
		return $query;        
    }
	
	
   /*
	*
	* To function returns all sbt inactive users query.
	*
	*/
	
	public function getAllSbtInactiveUserQuery()
	{ 
		$query = Doctrine_Query::create()
								->from('SfGuardUserProfile sup')
								->where('sup.from_sbt = ? AND sup.sbt_active = ? AND sup.sbt_activation_code > ?',array(1,0,0))
								->orderBy('sup.regdate DESC');
		return $query;
	}    
    
    public function getProfileuserFromSfGaurdUser($id){
        $result = Doctrine_Query::create()
                               ->from('SfGuardUserProfile sp')
                               ->where('sp.user_id =?',$id)
                               ->fetchOne();
        return $result;
    }
}