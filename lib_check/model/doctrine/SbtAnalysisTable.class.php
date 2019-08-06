<?php


class SbtAnalysisTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SbtAnalysis');
    }

   /*
	*
	* This function returns query which will fetch article's of a specific user from SisterBt.
	*
	*/
	
	public function getArticleFromSisQuery($id,$show_all_records)
	{ 
		$analysis_status_str = '1,7';
		$query = Doctrine_Query::create()->from('SbtAnalysis sa')->where('sa.author_id = ?',$id);
		
		if($show_all_records == 0)
		{ 
			$query_str = '( sa.published IN ('.$analysis_status_str.') AND  sa.author_id = '.$id.' )';
			$query = $query->where($query_str);
		}
		
		$query = $query->orderBy('sa.created_at DESC');
		return $query;
	}

        public function getHomeSbtArticles(){
            $result = Doctrine_Query::create()
							   ->from('SbtAnalysis sa')
							   ->where('sa.created_at <= ? AND sa.published = ?', array(date('Y-m-d H:i:s'),1))
							   ->orderBy('sa.created_at DESC');
            return $result;
        }
   /*
	*
	* This function returns article on sisterbt homepage. 
	*
	*/
	
	public function getHomeSbtHome($start,$end) 
	{ 
		$subscribe_article_cri = Doctrine_Query::create()
							   ->from('SbtAnalysis sa')
							   ->where('sa.created_at <= ? AND sa.published = ?', array(date('Y-m-d H:i:s'),1))
							   ->orderBy('sa.created_at DESC')
							   ->offset($start)
							   ->limit($end);
		$data = $subscribe_article_cri->execute();
		return $data;
	}
	
   /*
	*
	* This function returns analysis with selected word.
	*
	*/
	
	public function getSearchedAnalysisQuery($word,$column_id,$order,$add_param)  
	{ 
		if($add_param['category_id'])
        {
            $cat = explode('_',$add_param['category_id']);
            if($cat[0]=='sbt') $add_param['category_id'] = $cat[1];
            if($cat[0]=='bt') $add_param['category_id'] = $this->getSbtCategoryIdFromBtCategoryId($cat[1]);
        }
        if($add_param['type_id'])
        {
            $type = explode('_',$add_param['type_id']);
            if($type[0]=='sbt') $add_param['type_id'] = $type[1];
            if($type[0]=='bt') $add_param['type_id'] = $this->getSbtTypeIdFromBtTypeId($type[1]);
        }
        if($add_param['object_id'])
        {
            $object = explode('_',$add_param['object_id']);
            if($object[0]=='sbt') $add_param['object_id'] = $object[1];
            if($object[0]=='bt') $add_param['object_id'] = $this->getSbtObjectIdFromBtObjectId($object[1]);
        }                        
                                
        if($word)
		{
            $author_id_arr = SfGuardUserProfile::getMatchingUserIdFromUserName($word);
            
			$analysis_status_str = '1,7';
			
			//$query = Doctrine_Query::create()->from('SbtAnalysis sa')->innerJoin('sa.sfGuardUser sUser')->innerJoin('sUser.SfGuardUserProfile profile')->where('sa.analysis_description LIKE ? OR sa.analysis_title LIKE ?', array('%'.$word.'%','%'.$word.'%'));
			
			$query = Doctrine_Query::create()->from('SbtAnalysis sa')->innerJoin('sa.sfGuardUser sUser')->innerJoin('sUser.SfGuardUserProfile profile');
			
			$query_str = '( sa.published IN ('.$analysis_status_str.') )';
			$query = $query->where($query_str);			
			$query = $query->andWhere('sa.analysis_description LIKE ? OR sa.analysis_title LIKE ? OR sa.image_text LIKE ?', array('%'.$word.'%','%'.$word.'%','%'.$word.'%'));
            //if($author_id_arr) {$query = $query->orWhere("sa.author_id IN (".$author_id_arr.")");}            
            if($add_param['category_id']) { $query = $query->andWhere('sa.analysis_category_id = ?', $add_param['category_id']); }
            if($add_param['type_id']) { $query = $query->andWhere('sa.analysis_type_id = ?', $add_param['type_id']); }
            if($add_param['object_id']) { $query = $query->andWhere('sa.analysis_object_id = ?', $add_param['object_id']); } 
			
            switch($column_id)
			{
				case 'date':  $query = $query->orderBy('sa.created_at '.$order); break;
				case 'title':  $query = $query->orderBy('sa.analysis_title '.$order); break;
				//case 'category':  $query = $query->orderBy('sa.analysis_category_id '.$order); break;
                case 'category':
                    $query = $query->leftJoin('sa.SbtArticleCategory sbc');
                    $query = $query->orderBy('sbc.sbt_category_name '.$order); 
                    break;
				//case 'type':  $query = $query->orderBy('sa.analysis_type_id '.$order); break;
                case 'type':                      
                    $query = $query->leftJoin('sa.SbtArticleType sat');
                    $query = $query->orderBy('sat.type_name '.$order);
                    break;
				//case 'object':  $query = $query->orderBy('sa.analysis_object_id '.$order); break;
                case 'object':
                    $query = $query->leftJoin('sa.SbtObject sbo');
                    $query = $query->orderBy('sbo.object_short_name '.$order);
                    break;                    
				//case 'author':  $query = $query->orderBy('concat(profile.firstname," ",profile.lastname) '.$order); break;
                case 'author':  
                    $query = $query->innerJoin('sa.sfGuardUser su');
                    $query = $query->innerJoin('su.SfGuardUserProfile sup');
                    $query = $query->orderBy('concat(sup.firstname," ",sup.lastname) '.$order); 
                    break;                
				default :  $query = $query->orderBy('sa.created_at DESC'); break;
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
	
	public function getAdvancedSearchedAnalysisQuery($arr,$column_id,$order,$add_param)   
	{ 
		/*$adv_selected_articles_cri = Doctrine_Query::create()
	   					      ->from('SbtAnalysis sa')
							  ->where("sa.analysis_description LIKE '%".$arr['phrase_in_page']."%'")
							  ->andWhere('sa.author_id =?', $arr['user_id'])
							  ->andWhere('sa.created_at BETWEEN ? AND ?', array($arr['start_date_text'], $arr['end_date_text']));*/
		
		if($add_param['category_id'])
        {
            $cat = explode('_',$add_param['category_id']);
            if($cat[0]=='sbt') $add_param['category_id'] = $cat[1];
            if($cat[0]=='bt') $add_param['category_id'] = $this->getSbtCategoryIdFromBtCategoryId($cat[1]);
        }
        if($add_param['type_id'])
        {
            $type = explode('_',$add_param['type_id']);
            if($type[0]=='sbt') $add_param['type_id'] = $type[1];
            if($type[0]=='bt') $add_param['type_id'] = $this->getSbtTypeIdFromBtTypeId($type[1]);
        }                                
        if($add_param['object_id'])
        {
            $object = explode('_',$add_param['object_id']);
            if($object[0]=='sbt') $add_param['object_id'] = $object[1];
            if($object[0]=='bt') $add_param['object_id'] = $this->getSbtObjectIdFromBtObjectId($object[1]);
        }                        
        if($arr['author_name'])
            $author_id_arr = SfGuardUserProfile::getMatchingUserIdFromUserName($arr['author_name']);
        
        $param_present = 0;
		$query = Doctrine_Query::create()->from('SbtAnalysis sa');
		
		$analysis_status_str = '1,7';
		$query_str = '( sa.published IN ('.$analysis_status_str.') )';
		$query = $query->where($query_str);

        if($arr['phrase_in_page']) { $query = $query->andWhere("(sa.analysis_description LIKE '%".$arr['phrase_in_page']."%' OR sa.analysis_title LIKE '%".$arr['phrase_in_page']."%' OR sa.analysis_title LIKE '%".$arr['phrase_in_page']."%')"); $param_present = 1; }		
		if($add_param['category_id']) { $query = $query->andWhere('sa.analysis_category_id = ?', $add_param['category_id']); $param_present = 1;}
        if($add_param['type_id']) { $query = $query->andWhere('sa.analysis_type_id = ?', $add_param['type_id']); $param_present = 1;}
        if($add_param['object_id']) { $query = $query->andWhere('sa.analysis_object_id = ?', $add_param['object_id']); $param_present = 1;}
        if($arr['author_name'] && $author_id_arr) { $query = $query->andWhere("sa.author_id IN (".$author_id_arr.")"); $param_present = 1;}
        if($arr['adv_search_category']) { $query = $query->andWhere('sa.analysis_category_id =?', $arr['adv_search_category']); $param_present = 1; }
        if($arr['adv_search_type']) { $query = $query->andWhere('sa.analysis_type_id =?', $arr['adv_search_type']); $param_present = 1; }
        if($arr['adv_search_market']) { $query = $query->andWhere('sa.analysis_market_id =?', $arr['adv_search_market']); $param_present = 1; }
		if($arr['adv_search_stock_lista']) { $query = $query->andWhere('sa.analysis_stocklist_id =?', $arr['adv_search_stock_lista']); $param_present = 1; }
		if($arr['adv_search_sector']) { $query = $query->andWhere('sa.analysis_sector_id =?', $arr['adv_search_sector']); $param_present = 1; }
		if($arr['adv_search_object']) { $query = $query->andWhere('sa.analysis_object_id =?', $arr['adv_search_object']); $param_present = 1; }
		if($arr['start_date_text']) { $query = $query->andWhere('sa.created_at BETWEEN ? AND ?', array($arr['start_date_text'], $arr['end_date_text'])); $param_present = 1; }		

		if($param_present == 1)
		{
			switch($column_id)
			{
				case 'date':  $query = $query->orderBy('sa.created_at '.$order); break;
				case 'title':  $query = $query->orderBy('sa.analysis_title '.$order); break;
                case 'category':  
                    $query = $query->leftJoin('sa.SbtArticleCategory sbc');
                    $query = $query->orderBy('sbc.sbt_category_name '.$order);
                    break;
                case 'type':  
                    $query = $query->leftJoin('sa.SbtArticleType sat');
                    $query = $query->orderBy('sat.type_name '.$order);
                    break;
				//case 'object':  $query = $query->orderBy('sa.analysis_object_id '.$order); break;
                case 'object':  
                    $query = $query->leftJoin('sa.SbtObject sbo');
                    $query = $query->orderBy('sbo.object_short_name '.$order);
                    break;
				//case 'author':  $query = $query->orderBy('sa.author '.$order); break;
                case 'author':  
                    $query = $query->innerJoin('sa.sfGuardUser su');
                    $query = $query->innerJoin('su.SfGuardUserProfile sup');
                    $query = $query->orderBy('concat(sup.firstname," ",sup.lastname) '.$order); 
                    break;
				default:  $query = $query->orderBy('sa.created_at DESC'); break;
			}
		}
		else $query = '';
		//echo $query->getSqlQuery();
		return $query;
	}
	
   /*
	*
	* This function returns query which will fetch article's of a specific user from SisterBt in a specific order.
	*
	*/
	
	public function getArticleFromSisByOrderQuery($id,$column_id,$order,$show_all_records)
	{ 
		$analysis_status_str = '1,7';
		$query = Doctrine_Query::create()->from('SbtAnalysis sa')->where('sa.author_id = ?', $id);
		
		if($show_all_records == 0)
		{ 
			$query_str = '( sa.published IN ('.$analysis_status_str.') AND  sa.author_id = '.$id.' )';
			$query = $query->where($query_str);
		}
		
		switch($column_id)
		{
			case 'date': $query = $query->orderBy('sa.created_at '.$order); break;
			case 'title': $query = $query->orderBy('sa.analysis_title '.$order); break;
			case 'category': $query = $query->innerJoin('sa.SbtArticleCategory sbtCat'); $query = $query->orderBy('sbtCat.sbt_category_name '.$order); break;
			case 'type': $query = $query->innerJoin('sa.SbtArticleType sbtType'); $query = $query->orderBy('sbtType.type_name '.$order); break;
			case 'object': $query = $query->leftJoin('sa.SbtObject sbtObj'); $query = $query->orderBy('sbtObj.object_name '.$order); break;
			case 'default': $query = $query->orderBy('sa.created_at DESC'); break;
		}
		
		if(!$column_id) $query = $query->orderBy('sa.created_at DESC');
		return $query;
	}
	
   /*
	*
	* This function returns all analysis.
	*
	*/
	
	public function getAllAnalysisQuery($column_id,$order)  
	{ 
		$query = Doctrine_Query::create()->from('SbtAnalysis sa');
			
		switch($column_id)
		{
			case 'title':  $query = $query->orderBy('sa.analysis_title '.$order); break;
			case 'vote': $query = $query->orderBy('sa.analysis_votes '.$order); break;
			case 'date': $query = $query->orderBy('sa.created_at '.$order); break;
			case 'default':  $query = $query->orderBy('sa.created_at DESC'); break;
		}
		//echo $query->getSqlQuery();
	    return $query;
	}
	
   /*
	*
	* This function returns query which fetches all analysis  on analysisToplisterListing.
	*
	*/
	public function getAllTopAnalysisQuery($column_id,$order,$type)  
	{ 
		$query = Doctrine_Query::create()->from('SbtAnalysis sa');
			
		switch($column_id)
		{
			case 'title':  $query = $query->orderBy('sa.analysis_title '.$order); break;
			case 'author':  $query = $query->innerJoin('sa.sfGuardUser sUser')->innerJoin('sUser.SfGuardUserProfile profile');
							$query = $query->orderBy('concat(profile.firstname," ",profile.lastname) '.$order); break;
			case 'view':  $query = $query->orderBy('sa.analysis_views '.$order); break;
			case 'vote':  $query = $query->orderBy('sa.analysis_votes '.$order); break;
			case 'date':  $query = $query->orderBy('sa.updated_at '.$order.', sa.created_at '.$order); break;
			case 'default':  $query = $query->orderBy('sa.created_at DESC'); break;
		}
		//echo $query->getSqlQuery();					 
		if(!$column_id)
		{
			if($type == 'vote') $query = $query->orderBy('sa.analysis_votes DESC');
			else $query = $query->orderBy('sa.analysis_views DESC');
		}
		  
	    return $query;
	}
    public function getSbtCategoryIdFromBtCategoryId($id)
    {
        $q =  Doctrine_Query::create()->select('ac.category_name')->from('ArticleCategory ac')->where('ac.category_id=?',$id)->fetchOne();
        $cat_name = $q->category_name;	
        if($cat_name){
         $q =  Doctrine_Query::create()->select('sac.id')->from('SbtArticleCategory sac')->where('sac.sbt_category_name=?',$cat_name)->fetchOne();
         if($q->id)
            return $q->id;
         else
            return 121212121212121212; // no matching category_id  
        }
         
    }
    public function getSbtTypeIdFromBtTypeId($id)
    {
        $q =  Doctrine_Query::create()->select('sat.type_name')->from('ArticleType sat')->where('sat.type_id=?',$id)->fetchOne();
        $type_name = $q->type_name;
        if($type_name){
         $q =  Doctrine_Query::create()->select('at.id')->from('SbtArticleType at')->where('at.type_name=?',$type_name)->fetchOne();
         if($q->id)
            return $q->id;
         else
            return 121212121212121212; // no matching category_id  
        }
         
    }            
    public function getSbtObjectIdFromBtObjectId($id)
    {
        $q =  Doctrine_Query::create()->select('obj.object_name')->from('Objekt obj')->where('obj.object_id=?',$id)->fetchOne();
        $object_name = $q->object_name;
        if($object_name){
         $q =  Doctrine_Query::create()->select('sbo.id')->from('SbtObject sbo')->where('sbo.object_name=?',$object_name)->fetchOne();
         if($q->id)
            return $q->id;
         else
            return 121212121212121212; // no matching category_id  
        }
         
    }        
	
   /*
	*
	* This function returns all analysis query.
	*
	*/
	
	public function getSortingSbtArticleQuery($param,$column_id,$order) 
	{ 
		$notblank = 0;
		$art_id = $param['art_id'] ? $param['art_id'] : ($param['art_id_update'] ? $param['art_id_update'] : '');
		$art_title = $param['art_title'] ? $param['art_title'] : ($param['art_title_update'] ? $param['art_title_update'] : '');
		$search_katID = $param['search_katID'] ? $param['search_katID'] : ($param['search_katID_update'] ? $param['search_katID_update'] : '');
		$search_art_statID = $param['search_art_statID'] ? $param['search_art_statID'] : ($param['search_art_statID_update'] ? $param['search_art_statID_update'] : '');
		$sort_order = $param['sort_order'] ? $param['sort_order'] : ($param['sort_order_update'] ? $param['sort_order_update'] : '');
		
		$query = Doctrine_Query::create()->from('SbtAnalysis sa');
		if($art_id) { $query = $query->andWhere("sa.id =? ",$art_id); $notblank = 1; }
		if($art_title) { $query = $query->andWhere("sa.analysis_title LIKE '%".$art_title."%'"); $notblank = 1; }
		if($search_katID) { $query = $query->andWhere("sa.analysis_category_id =?",$search_katID); $notblank = 1; }
		if($search_art_statID) { $query = $query->andWhere("sa.published =?", $search_art_statID); $notblank = 1; }
	
		switch($column_id)
		{
			case 'art_status': $query->innerJoin('sa.SbtAnalysisStatus sas'); $query = $query->orderBy('sas.status_name '.$order); break;
			case 'date': $query = $query->orderBy('sa.created_at '.$order); break;
			case 'title': $query = $query->orderBy('sa.analysis_title '.$order); break;
			case 'author':  $query = $query->innerJoin('sa.sfGuardUser sUser')->innerJoin('sUser.SfGuardUserProfile profile');
							$query = $query->orderBy('concat(profile.firstname," ",profile.lastname) '.$order); break;
			case 'category': $query = $query->innerJoin('sa.SbtArticleCategory sbtCat'); $query = $query->orderBy('sbtCat.sbt_category_name '.$order); break;
			case 'type': $query = $query->innerJoin('sa.SbtArticleType sbtType'); $query = $query->orderBy('sbtType.type_name '.$order); break;
			case 'object': $query = $query->innerJoin('sa.SbtObject sbtObj'); $query = $query->orderBy('sbtObj.object_name '.$order); break;
			case 'art_view': $query = $query->orderBy('sa.analysis_views '.$order); break;
			case 'default': $query = $query->orderBy('sa.created_at DESC'); break;
		}
		if(!$column_id) $query = $query->orderBy('sa.created_at DESC');

		return $query;
	}
}