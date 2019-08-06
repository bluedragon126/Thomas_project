<?php


class BtforumTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Btforum');
    }
	
	/*
	*
	* This function returns all the article objects.
	*
	*/
	
	public function getAllNewForumPostQuery() 
	{ 
		$all_forum_post_cri = Doctrine_Query::create()
						  ->from('Btforum btf')
						  ->where('btf.amne = ?', 'ja')
						  ->orderBy('btf.andratdatum DESC');
						  		
		return $all_forum_post_cri;
	}
	
	/*
	*
	* This function returns all the forum topics which are related to specific id.
	*
	*/
	
	public function getSelctedForumTopics($id) 
	{ 
		$selected_category_cri = Doctrine_Query::create()
						  	   ->from('Btforum btf')
						       ->where('btf.btforum_category_id = ?', $id)
						       ->orderBy('btf.datum DESC');
						  		
		return $selected_category_cri;
	}

	/*
	*
	* This function returns all forum post of a specific user.
	*
	*/
	
	public function getAllUserForumPostQuery($user_id,$name) 
	{ 
		$all_forum_post_cri = Doctrine_Query::create()->from('Btforum btf');
		//$all_forum_post_cri = $all_forum_post_cri->where('btf.skapare = ? AND btf.amne= ?', array($name,'ja'));
		$all_forum_post_cri = $all_forum_post_cri->where('btf.author_id = ? AND btf.amne= ?', array($user_id,'ja'));
		$all_forum_post_cri = $all_forum_post_cri->orderBy('btf.andratdatum DESC');
			  		
		return $all_forum_post_cri;
	}
	
   /*
	*
	* This function returns query of forum post with selected word.
	*
	*/
	
	public function getSearchedForumQuery($word,$column_id,$order,$add_param) 
	{ 
		if($add_param['category_id'])
        {
            $cat = explode("_",$add_param['category_id']);
            if($cat[0]=='forum')
                $add_param['category_id'] = $cat[1];
            else
                $add_param['category_id'] = 121212121212121212; // no match                       
        }
        if($word)
		{             
            $author_id_arr = SfGuardUserProfile::getMatchingUserIdFromUserName($word);
            
            if($author_id_arr)
            $query = Doctrine_Query::create()->from('Btforum btf')->where('btf.textarea LIKE ? OR btf.rubrik LIKE ? OR btf.author_id IN ( ? )', array('%'.$word.'%','%'.$word.'%',$author_id_arr));
            else
            $query = Doctrine_Query::create()->from('Btforum btf')->where('btf.textarea LIKE ? OR btf.rubrik LIKE ?', array('%'.$word.'%','%'.$word.'%'));
            
            if($add_param['category_id'])
                $query = $query->andWhere('btf.btforum_category_id = ?', $add_param['category_id']);
            								  
			switch($column_id)
			{
				case 'date':  $query = $query->orderBy('btf.andratdatum '.$order); break;
				case 'title':  $query = $query->orderBy('btf.rubrik '.$order); break;
                case 'category':
                    $query = $query->leftJoin('btf.BtforumCategory bfc');
                    $query = $query->orderBy('bfc.btforum_category_name '.$order); 
                    break;
				case 'author':  $query = $query->orderBy('trim(btf.skapare) '.$order); break;
				default :  $query = $query->orderBy('btf.andratdatum DESC'); break;
			}
		}
		else $query = NULL;
	    
		return $query;
	}
	
   /*
	*
	* This function returns customised query for advanced search.
	*
	*/
	
	public function getAdvancedSearchedForumQuery($arr,$column_id,$order,$add_param)  
	{ 
		/*$selected_forum_post_cri = Doctrine_Query::create()
   					      		 ->from('Btforum btf')
					             ->where('btf.textarea LIKE ? btf.skapare ? AND btf.datum BETWEEN ? AND ? ', array('%'.$arr['phrase_in_page'].'%',$arr['author_name'], $arr['start_date_text'], $arr['end_date_text']));*/
		if($add_param['category_id'])
        {
            $cat = explode("_",$add_param['category_id']);
            if($cat[0]=='forum')
                $add_param['category_id'] = $cat[1];
            else
                $add_param['category_id'] = 121212121212121212; // no match                       
        }
		
        if($arr['author_name'])
            $author_id_arr = SfGuardUserProfile::getMatchingUserIdFromUserName($arr['author_name']);	    
        
        $param_present = 0;
		$query = Doctrine_Query::create()->from('Btforum btf');
		
        if(!$arr['phrase_in_page'] && !$arr['start_date_text']){
         $arr['phrase_in_page']='no_result_found_condtion_no_match';  // it will not match any record with btf.textarea column
         $cond = 0;   
        }
        else
            $cond = 1;
                     
        
        if($arr['adv_search_category']) { $query = $query->andWhere('btf.btforum_category_id =?', $arr['adv_search_category']); $param_present = 1; }
		if($arr['phrase_in_page']) { $query = $query->andwhere("(btf.textarea LIKE '%".$arr['phrase_in_page']."%' OR btf.rubrik LIKE '%".$arr['phrase_in_page']."%')"); $param_present = 1; }
		if($add_param['category_id']) { $query = $query->andWhere('btf.btforum_category_id = ?', $add_param['category_id']); }
        if($arr['author_name'] && $cond) { $query = $query->andWhere("btf.author_id IN (".$author_id_arr.")"); $param_present = 1; }
        if($arr['author_name'] && !$cond) { $query = $query->orWhere("btf.author_id IN (".$author_id_arr.")"); $param_present = 1; }
		if($arr['start_date_text']) { $query = $query->andWhere('btf.datum BETWEEN ? AND ?', array($arr['start_date_text'], $arr['end_date_text'])); $param_present = 1; }
        
		if($param_present == 1)
		{
			switch($column_id)
			{
				case 'date':  $query = $query->orderBy('btf.andratdatum '.$order); break;
				case 'title':  $query = $query->orderBy('btf.rubrik '.$order); break;
                case 'category':
                    $query = $query->leftJoin('btf.BtforumCategory bfc');
                    $query = $query->orderBy('bfc.btforum_category_name '.$order); 
                    break;				
                case 'author':  $query = $query->orderBy('trim(btf.skapare) '.$order); break;
				default :  $query = $query->orderBy('btf.andratdatum DESC'); break;
			}
		}
		else $query = '';
							  
		return $query;
	}
	
	/*
	*
	* This function returns all the forum topics which are related to specific id, in a specific order.
	*
	*/
	
	public function getOrderedSelctedForumTopics($id,$sub_cat_id,$column,$order) 
	{ 
		if($id == 9) $query = Doctrine_Query::create()->from('Btforum btf')->where('btf.amne = ?', 'ja');
		else if($sub_cat_id) $query = Doctrine_Query::create()->from('Btforum btf')->where('btf.btforum_category_id = ? AND btf.btforum_subcategory_id = ? AND btf.amne = ?', array($id,$sub_cat_id,'ja'));
		else $query = Doctrine_Query::create()->from('Btforum btf')->where('btf.btforum_category_id = ? AND btf.amne = ?', array($id,'ja'));
		
		if($column == 'subject') $query = $query->orderBy('btf.rubrik '.$order);
		if($column == 'category') { $query = $query->leftJoin('btf.BtforumSubcategory bfs'); $query = $query->orderBy('bfs.btforum_subcategory_name '.$order); }
		if($column == 'author') $query = $query->orderBy('btf.skapare '.$order);
		if($column == 'reply') $query = $query->orderBy('btf.ant_inlagg '.$order);
		if($column == 'view') $query = $query->orderBy('btf.visningar '.$order);
		if($column == 'date') $query = $query->orderBy('btf.andratdatum '.$order);
        if(!$column) $query = $query->orderBy('btf.andratdatum desc');
//echo $query->getSqlQuery();
		return $query;
	}
	
	/*
	*
	* This function returns query which contain all forum post of a specific user in specifieed order.
	*
	*/
	public function getAllUserForumPostByOrderQuery($user_id,$name,$column,$order)  
	{ 
		//$query = Doctrine_Query::create()->from('Btforum btf')->where('btf.skapare = ? AND btf.amne= ?', array($name,'ja'));
		$query = Doctrine_Query::create()->from('Btforum btf')->where('btf.author_id = ? AND btf.amne= ?', array($user_id,'ja'));
		
		switch($column)
		{
			case 'date':  $query = $query->orderBy('btf.andratdatum '.$order); break;
			case 'title':  $query = $query->orderBy('btf.rubrik '.$order); break;
			case 'category':  $query = $query->orderBy('btf.btforum_category_id '.$order); break;
			//case 'type':  $query = $query->orderBy('btf.ublog_type_id '.$order); break;
			//case 'object':   $query = $query->orderBy('btf.ublog_object_id '.$order); break;
			case 'author':  $query = $query->orderBy('btf.skapare '.$order); break;
			case 'default':  $query = $query->orderBy('btf.andratdatum DESC'); break;
		}
		return $query;
	}
    /*
        This function returns the category id for forum
    */
    public function getForumCatetogyId($cat_id)
    {
        $q = Doctrine_Query::create()->from('sbtArticleCategory s')
            ->where('s.id = ?', $cat_id)
            ->fetchOne();
        $cat = $q->sbt_category_name;
        $q = Doctrine_Query::create()->from('btforumCategory b')
            ->where('b.btforum_category_name = ?', $cat)
            ->fetchOne();    
        return $q->id;
    }    
}