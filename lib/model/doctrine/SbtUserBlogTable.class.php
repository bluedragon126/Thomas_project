<?php


class SbtUserBlogTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SbtUserBlog');
    }

   /*
	*
	* This function returns all blog post of a specific user.
	*
	*/
	
	public function getAllUserBlogPostQuery($id) 
	{ 
		$all_blog_post_cri = Doctrine_Query::create()
						  ->from('SbtUserBlog sub')
						  ->where('sub.author_id = ?', $id)
						  ->orderBy('sub.created_at DESC');
			  		
		return $all_blog_post_cri;
	}
	
   /*
	*
	* This function returns latest 5 blog post for sbt blog page.
	*
	*/
	
	public function getSbtBlogPost($start,$end) 
	{
		$commodities_article_cri = Doctrine_Query::create()
								 ->from('SbtUserBlog sub')
								 ->orderBy('sub.created_at DESC')
								 ->offset($start)
								 ->limit($end);		
		
		$data = $commodities_article_cri->execute();
		
		return $data;
	}
	
   /*
	*
	* This function returns query which fetches all posted blog from sisterbt.
	*
	*/
	
	public function getAllSbtBlogPostQuery() 
	{
            $currentDate = date('Y-m-d');	
            $thirty_days_before_date = date('Y-m-d', strtotime('-30 days', strtotime($currentDate)));				
            $from = $thirty_days_before_date;
            $to   = $currentDate;
            
		$all_blog_post_cri = Doctrine_Query::create()
								 ->from('SbtUserBlog sub')
                                                                 //->where('DATE_FORMAT(sub.created_at, "%Y-%m-%d") >= ?', $from)
                                                                 ->where('DATE_FORMAT(sub.created_at, "%Y-%m-%d") <= ?', $to)
								 ->orderBy('sub.created_at DESC');
		return $all_blog_post_cri;
	}
	
   /*
	*
	* This function returns query with selected word.
	*
	*/
	
	public function getSearchedBlogQuery($word,$column_id,$order,$add_param) 
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
            
            //$query = Doctrine_Query::create()->from('SbtUserBlog sub')->where('sub.ublog_description LIKE ? OR sub.ublog_title LIKE ?', array('%'.$word.'%','%'.$word.'%'));
            if($author_id_arr) {$query = Doctrine_Query::create()->from('SbtUserBlog sub')->innerJoin('sub.sfGuardUser sUser')->innerJoin('sUser.SfGuardUserProfile profile')->where('sub.ublog_description LIKE ? OR sub.ublog_title LIKE ? OR sub.author_id IN ( ? )', array('%'.$word.'%','%'.$word.'%',$author_id_arr));}
            else
            $query = Doctrine_Query::create()->from('SbtUserBlog sub')->innerJoin('sub.sfGuardUser sUser')->innerJoin('sUser.SfGuardUserProfile profile')->where('sub.ublog_description LIKE ? OR sub.ublog_title LIKE ?', array('%'.$word.'%','%'.$word.'%'));
 
            if($add_param['category_id'])
            $query = $query->andWhere("sub.ublog_category_id = ?", $add_param['category_id']);
            if($add_param['type_id'])
            $query = $query->andWhere("sub.ublog_type_id = ?", $add_param['type_id']);            
            if($add_param['object_id'])
            $query = $query->andWhere("sub.ublog_object_id = ?", $add_param['object_id']);                        
								  
			switch($column_id)
			{
				case 'date':  $query = $query->orderBy('sub.created_at '.$order); break;
				case 'title':  $query = $query->orderBy('sub.ublog_title '.$order); break;
                case 'category':  
                    $query = $query->leftJoin('sub.SbtArticleCategory sac');
                    $query = $query->orderBy('sac.sbt_category_name '.$order);
                    break;
                case 'type':  
                    $query = $query->leftJoin('sub.SbtArticleType sat');
                    $query = $query->orderBy('sat.type_name '.$order);
                    break;
                case 'object':  
                    $query = $query->leftJoin('sub.SbtObject so');
                    $query = $query->orderBy('so.object_short_name '.$order);
                    break;                
				case 'author':  $query = $query->orderBy('concat(profile.firstname," ",profile.lastname) '.$order); break;
				default :  $query = $query->orderBy('sub.created_at DESC'); break;
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
	
	public function getAdvancedSearchedBlogQuery($arr,$column_id,$order,$add_param) 
	{ 
		/*$selected_blog_post_cri = Doctrine_Query::create()
	   					      	->from('SbtUserBlog sub')
						      	->where('sub.ublog_description LIKE ? AND sub.author_id ? AND sub.created_at BETWEEN ? AND ? ', array('%'.$arr['phrase_in_page'].'%',$arr['user_id'],$arr['start_date_text'], $arr['end_date_text']));*/
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
		$query = Doctrine_Query::create()->from('SbtUserBlog sub');
		
		if($arr['phrase_in_page']) { $query = $query->where("(sub.ublog_description LIKE '%".$arr['phrase_in_page']."%' OR sub.ublog_description LIKE '%".$arr['phrase_in_page']."%' OR sub.ublog_title LIKE '%".$arr['phrase_in_page']."%')"); $param_present = 1; }
        if($add_param['category_id']) { $query = $query->andWhere("sub.ublog_category_id = ?", $add_param['category_id']); $param_present = 1;};
        if($add_param['type_id']) { $query = $query->andWhere("sub.ublog_type_id = ?", $add_param['type_id']); $param_present = 1;};
        if($add_param['object_id']) { $query = $query->andWhere("sub.ublog_object_id = ?", $add_param['object_id']); $param_present = 1;};
                
		if($arr['adv_search_category']) { $query = $query->andWhere('sub.ublog_category_id =?', $arr['adv_search_category']); $param_present = 1; }
        if($arr['adv_search_type']) { $query = $query->andWhere('sub.ublog_type_id =?', $arr['adv_search_type']); $param_present = 1; }		
        if($arr['adv_search_market']) { $query = $query->andWhere('sub.ublog_market_id =?', $arr['adv_search_market']); $param_present = 1; }
		if($arr['adv_search_stock_lista']) { $query = $query->andWhere('sub.ublog_stocklist_id =?', $arr['adv_search_stock_lista']); $param_present = 1; }
		if($arr['adv_search_sector']) { $query = $query->andWhere('sub.ublog_sector_id =?', $arr['adv_search_sector']); $param_present = 1; }
		if($arr['adv_search_object']) { $query = $query->andWhere('sub.ublog_object_id =?', $arr['adv_search_object']); $param_present = 1; }
		if($arr['author_name'] && $author_id_arr) { $query = $query->andWhere("sub.author_id IN (".$author_id_arr.")"); $param_present = 1; }
		if($arr['start_date_text']) { $query = $query->andWhere('sub.created_at BETWEEN ? AND ?', array($arr['start_date_text'], $arr['end_date_text'])); $param_present = 1; }
		
		if($param_present == 1)
		{
			switch($column_id)
			{
				case 'date':  $query = $query->orderBy('sub.created_at '.$order); break;
				case 'title':  $query = $query->orderBy('sub.ublog_title '.$order); break;
				case 'category':  
                    $query = $query->leftJoin('sub.SbtArticleCategory sac');
                    $query = $query->orderBy('sac.sbt_category_name '.$order);
                    break;                
                case 'type':  
                    $query = $query->leftJoin('sub.SbtArticleType sat');
                    $query = $query->orderBy('sat.type_name '.$order);
                    break;
                case 'object':  
                    $query = $query->leftJoin('sub.SbtObject so');
                    $query = $query->orderBy('so.object_short_name '.$order);
                    break;
                case 'author':
                    $query = $query->leftJoin('sub.sfGuardUser sUser')->innerJoin('sUser.SfGuardUserProfile profile');
                    $query = $query->orderBy('concat(profile.firstname," ",profile.lastname) '.$order);
                    break;
				default :  $query = $query->orderBy('sub.created_at DESC'); break;
			}
		}
		else $query = ''; 
		
		return $query;
	}
	
   /*
	*
	* This function returns query which fetches all posted blog from sisterbt.
	*
	*/
	
	public function getAllSbtBlogPostByOrderQuery($column_id,$order,$blog_cat_id) 
	{
		if($blog_cat_id) $query = Doctrine_Query::create()->from('SbtUserBlog sub')->where('sub.ublog_category_id =?',$blog_cat_id);
		else $query = Doctrine_Query::create()->from('SbtUserBlog sub');

		switch($column_id)
		{
			case 'title':  $query = $query->orderBy('sub.ublog_title '.$order); break;
			case 'category': //$query = $query->orderBy('sub.ublog_category_id '.$order); break;
							 $query = $query->innerJoin('sub.SbtArticleCategory acat'); 
							 $query = $query->orderBy('acat.sbt_category_name '.$order); break;
			
			case 'author':  $query = $query->innerJoin('sub.sfGuardUser sUser')->innerJoin('sUser.SfGuardUserProfile profile'); 
			                $query = $query->orderBy('concat(profile.firstname," ",profile.lastname) '.$order); break;
			
			case 'reply':  $query = $query->leftJoin('sub.SbtBlogComment subcom'); 
			               $query = $query->groupBy('sub.id'); 
						   $query = $query->orderBy('count(subcom.blog_id) '.$order);
						   break;
			
			case 'view':  $query = $query->orderBy('sub.ublog_views '.$order); break;
			case 'date':  $query = $query->orderBy('sub.created_at '.$order); break;
			case 'default':  $query = $query->orderBy('sub.created_at DESC'); break;
		}
		//echo $query->getSqlQuery();					 
		if(!$column_id) $query = $query->orderBy('sub.created_at DESC');
		return $query;
	}
	
   /*
	*
	* This function returns all blog post of a specific user.
	*
	*/
	
	public function getAllMyBlogPostByOrderQuery($id,$column_id,$order)
	{ 
		$query = Doctrine_Query::create()->from('SbtUserBlog sub')->where('sub.author_id = ?', $id);
						 
		switch($column_id)
		{
			case 'date':  $query = $query->orderBy('sub.created_at '.$order); break;
			case 'title':  $query = $query->orderBy('sub.ublog_title '.$order); break;
			
			case 'category':  $query = $query->innerJoin('sub.SbtArticleCategory sbtCat');
			                  $query = $query->orderBy('sbtCat.sbt_category_name '.$order); break;
			
			case 'type':  $query = $query->orderBy('sub.ublog_type_id '.$order); break;
			
			case 'object':  $query = $query->leftJoin('sub.SbtObject sbtObj');
			                $query = $query->orderBy('sbtObj.object_short_name '.$order); break;
			
			case 'default':  $query = $query->orderBy('sub.created_at DESC'); break;
		}
			  		
		return $query;
	}
	
   /*
	*
	* This function returns query which fetches all posted blog from sisterbt on blogToplisterListing.
	*
	*/
	
	public function getAllTopBlogQuery($column_id,$order,$type) 
	{
		$query = Doctrine_Query::create()->from('SbtUserBlog sub');

		switch($column_id)
		{
			case 'title':  $query = $query->orderBy('sub.ublog_title '.$order); break;
			
			case 'author':  $query = $query->innerJoin('sub.sfGuardUser sUser')->innerJoin('sUser.SfGuardUserProfile profile'); 
			                $query = $query->orderBy('concat(profile.firstname," ",profile.lastname) '.$order); break;
			
			case 'view':  $query = $query->orderBy('sub.ublog_views '.$order); break;
			case 'vote':  $query = $query->orderBy('sub.ublog_votes '.$order); break;
			case 'date':  $query = $query->orderBy('sub.updated_at '.$order.', sub.created_at '.$order); break;
			case 'default':  $query = $query->orderBy('sub.created_at DESC'); break;
		}
		//echo $query->getSqlQuery();					 
		if(!$column_id)
		{
			if($type == 'vote') $query = $query->orderBy('sub.ublog_votes DESC');
			else $query = $query->orderBy('sub.ublog_views DESC');
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

    public function shortBlogDescription($blog){
        $search = array('<p', '</p>');
        $replace = array('<span', '</span>');

        $regex = "/<\/?\w+((\s+(\w|\w[\w-]*\w)(\s*=\s*(?:\".*?\"|'.*?'|[^'\">\s]+))?)+\s*|\s*)\/?>/i";
        $str_without_tags = trim(preg_replace($regex, "", html_entity_decode($blog->ublog_description)));
        $blogdetails = SbtUserBlog::filterMyStringBlack(html_entity_decode($blog->ublog_description));
        $word_arr = str_word_count($str_without_tags, 1); // all words from string with no tags
        if (count($word_arr) > 5) { // if words are more than 50, needs to cut the blog
            $strpos1 = strpos($blogdetails, $word_arr[19]);
            $str = substr($blogdetails, 0, strpos($blogdetails, $word_arr[19]));
            $str_no_tag = preg_replace($regex, "", $str); // matching string with no tags
            if (str_word_count($str_no_tag) < 12) {
                $strpos1 = strpos($blogdetails, $word_arr[18]);
                $str = substr($blogdetails, 0, strpos($blogdetails, $word_arr[18]));
                $str_no_tag = preg_replace($regex, "", $str);
            }
            if (str_word_count($str_no_tag) < 12) {
                $strpos1 = strpos($blogdetails, $word_arr[17]);
                $str = substr($blogdetails, 0, strpos($blogdetails, $word_arr[17]));
                $str_no_tag = preg_replace($regex, "", $str);
            }
            $shortDesc = substr($blogdetails, 0, $strpos1) . "</b>";
            $shortDesc = str_replace($search, $replace, $shortDesc);
        } else {
            $shortDesc = $blogdetails;
            $shortDesc = str_replace($search, $replace, $shortDesc);
        }
        $shortDesc = preg_replace("/<img[^>]+\>/i", "", $shortDesc);

       $shortDesc = sbtUserBlog::closeTags($shortDesc);
      
       $shortDesc = str_replace("</p>","",str_replace("<p>","",$shortDesc));
       
        return $shortDesc;
    }
}