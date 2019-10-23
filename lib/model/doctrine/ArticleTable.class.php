<?php


class ArticleTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Article');
    }
	
   /*
	*
	* This function returns Commodities article. 
	*
	*/
	
	public function getHomeCommodities($start,$end,$isSuperAdmin) 
	{
		$commodities_article_cri = Doctrine_Query::create()->from('Article ba');
		
		/*if($isSuperAdmin==1) 
			$commodities_article_cri = $commodities_article_cri->where('ba.type_id = ? AND ba.article_date <= ?', array(27, date('Y-m-d H:i:s')));
		else*/ 
			$commodities_article_cri = $commodities_article_cri->where('ba.type_id = ? AND ba.article_date <= ? AND ba.art_statid != ?', array(27, date('Y-m-d H:i:s'),2));
		
		$commodities_article_cri = $commodities_article_cri->orderBy('ba.article_date DESC');
		$commodities_article_cri = $commodities_article_cri->offset($start);
		$commodities_article_cri = $commodities_article_cri->limit($end);	
	
		$data = $commodities_article_cri->execute();
		
		return $data;
	}
	
   /*
	*
	* This function returns Aktier article. 
	*
	*/
	
	public function getHomeAktier($start,$end,$isSuperAdmin) 
	{
		$aktier_article_cri = Doctrine_Query::create()->from('Article ba');
		
		//if($isSuperAdmin==1)
			//$aktier_article_cri = $aktier_article_cri->where('ba.type_id = ? AND ba.article_date <= ?', array(1, date('Y-m-d H:i:s')));
		//else
			$aktier_article_cri = $aktier_article_cri->where('ba.type_id = ? AND ba.article_date <= ? AND ba.art_statid != ?', array(1, date('Y-m-d H:i:s'),2));
			
		$aktier_article_cri = $aktier_article_cri->orderBy('ba.article_date DESC');
		$aktier_article_cri = $aktier_article_cri->offset($start);
		$aktier_article_cri = $aktier_article_cri->limit($end);
		
		$data = $aktier_article_cri->execute();
		return $data;
	}

   /*
	*
	* This function returns all Commodities article query. 
	*
	*/
	
	public function getAllSharesQuery($id,$column_id,$order) 
	{ 
		$query = Doctrine_Query::create()->from('Article ba');
		$query = $query->where('ba.type_id = ? AND ba.article_date <= ? AND ba.art_statid != ?', array($id, date('Y-m-d H:i:s'),2));
		
		switch($column_id)
		{
			case 'date': $query = $query->orderBy('ba.article_date '.$order); break;
			case 'title': $query = $query->orderBy('ba.title '.$order); break;
			case 'category': $query = $query->innerJoin('ba.ArticleCategory acat'); $query = $query->orderBy('acat.category_name '.$order); break;
			case 'type': $query = $query->innerJoin('ba.ArticleType atype'); $query = $query->orderBy('atype.type_name '.$order); break;
			case 'object': $query = $query->innerJoin('ba.Objekt obj'); $query = $query->orderBy('obj.object_name '.$order); break;
			case 'default': $query = $query->orderBy('ba.article_date DESC'); break;
		}
		
		if(!$column_id)	$query = $query->orderBy('ba.article_date DESC');

		return $query;
	}

   /*
	*
	* This function returns all Commodities article query. 
	*
	*/
	
	public function getAllCommoditiesQuery($id,$column_id,$order) 
	{ 
		$query = Doctrine_Query::create()->from('Article ba');
		$query = $query->where('ba.type_id = ? AND ba.article_date <= ? AND ba.art_statid != ?', array($id, date('Y-m-d H:i:s'),2));
		
		switch($column_id)
		{
			case 'date': $query = $query->orderBy('ba.article_date '.$order); break;
			case 'title': $query = $query->orderBy('ba.title '.$order); break;
			case 'category': $query = $query->innerJoin('ba.ArticleCategory acat'); $query = $query->orderBy('acat.category_name '.$order); break;
			case 'type': $query = $query->innerJoin('ba.ArticleType atype'); $query = $query->orderBy('atype.type_name '.$order); break;
			case 'object': $query = $query->innerJoin('ba.Objekt obj'); $query = $query->orderBy('obj.object_name '.$order); break;
			case 'default': $query = $query->orderBy('ba.article_date DESC'); break;
		}
		
		if(!$column_id)	$query = $query->orderBy('ba.article_date DESC');

		return $query;
	}
	
	
   /*
	*
	* This function returns all Commodities article in a specified order query. 
	*
	*/
	
	public function getAllCommoditiesOrderByQuery($id,$isSuperAdmin,$column_id,$order) 
	{ 
		$query = Doctrine_Query::create()->from('Article ba');
		
		if($isSuperAdmin==1) $query = $query->where('ba.type_id = ? AND ba.article_date <= ?', array($id, date('Y-m-d H:i:s')));
		else $query = $query->where('ba.type_id = ? AND ba.article_date <= ? AND ba.art_statid != ?', array($id, date('Y-m-d H:i:s'),2));
		
		switch($column_id)
		{
			case 'date': $query = $query->orderBy('ba.article_date '.$order); break;
			case 'title': $query = $query->orderBy('ba.title '.$order); break;
			case 'category': $query = $query->orderBy('ba.category_id '.$order); break;
			case 'type': $query = $query->orderBy('ba.type_id '.$order); break;
			case 'object': $query = $query->orderBy('ba.object_id '.$order); break;
			case 'default': $query = $query->orderBy('ba.article_date DESC'); break;
		}
		return $query;
	}
	
	
   /*
	*
	* This function returns all Commodities article query by specified order. 
	*
	*/
	
	public function getAllCommoditiesByOrderQuery($id,$isSuperAdmin,$column_id,$order) 
	{ 
		$query = Doctrine_Query::create()->from('Article ba');
		
		if($isSuperAdmin==1) $query = $query->where('ba.type_id = ? AND ba.article_date <= ?', array($id, date('Y-m-d H:i:s')));
		else $query = $query->where('ba.type_id = ? AND ba.article_date <= ? AND ba.art_statid != ?', array($id, date('Y-m-d H:i:s'),2));
		$order = trim($order);
		switch($column_id)
		{
			case 'date': $query = $query->orderBy('ba.article_date '.$order); break;
			case 'title': $query = $query->orderBy('ba.title '.$order); break;
			case 'category': $query = $query->innerJoin('ba.ArticleCategory acat'); $query = $query->orderBy('acat.category_name '.$order); break;
			case 'type': $query = $query->innerJoin('ba.ArticleType atype'); $query = $query->orderBy('atype.type_name '.$order); break;
			case 'object': $query = $query->innerJoin('ba.Objekt obj'); $query = $query->orderBy('obj.object_name '.$order); break;
			case 'default': $query = $query->orderBy('ba.article_date DESC'); break;
		}
		return $query;
	}
	
   /*
	*
	* This function returns query for all Borst Article.
	*
	*/
	
	public function getAllBorstArticleQuery($column_id,$order) 
	{
           
		$query = Doctrine_Query::create()->from('Article ba');
		$query = $query->where('ba.article_date <= ? ', array(date('Y-m-d H:i:s')));
		
		switch($column_id)
		{
			case 'date': $query = $query->orderBy('ba.article_date '.$order); break;
			case 'title': $query = $query->orderBy('ba.title '.$order); break;
			case 'category': $query = $query->innerJoin('ba.ArticleCategory acat'); $query = $query->orderBy('acat.category_name '.$order); break;
			case 'type': $query = $query->innerJoin('ba.ArticleType atype'); $query = $query->orderBy('atype.type_name '.$order); break;
			case 'object': $query = $query->innerJoin('ba.Objekt obj'); $query = $query->orderBy('obj.object_name '.$order); break;
			case 'default': $query = $query->orderBy('ba.article_date DESC'); break;
		}
		
		if(!$column_id)	$query = $query->orderBy('ba.article_date DESC');
		   
		return $query;
	}
	
	public function getAllBorstArticlesByDate($column_id,$order) 
	{ 
		$query = Doctrine_Query::create()->from('Article ba');
		//$query = $query->where('ba.article_date <= ? AND ba.art_statid != ?', array(date('Y-m-d H:i:s'),2));
		
		switch($column_id)
		{
			case 'date': $query = $query->orderBy('ba.article_date '.$order); break;
			case 'title': $query = $query->orderBy('ba.title '.$order); break;
			case 'category': $query = $query->innerJoin('ba.ArticleCategory acat'); $query = $query->orderBy('acat.category_name '.$order); break;
			case 'type': $query = $query->innerJoin('ba.ArticleType atype'); $query = $query->orderBy('atype.type_name '.$order); break;
			case 'object': $query = $query->innerJoin('ba.Objekt obj'); $query = $query->orderBy('obj.object_name '.$order); break;
			case 'default': $query = $query->orderBy('ba.article_date DESC'); break;
		}
		
		if(!$column_id)	$query = $query->orderBy('ba.article_date DESC');
		   
		return $query;
	}
	
   /*
	*
	* This function returns query which contain all Borst Article by a specified order.
	*
	*/
	
	public function getAllBorstArticleByOrderQuery($isSuperAdmin,$column_id,$order) 
	{ 
		$query = Doctrine_Query::create()->from('Article ba');
		if($isSuperAdmin!=1)
			$query = $query->where('ba.article_date <= ? AND ba.art_statid != ?', array(date('Y-m-d H:i:s'),2));
			
		switch($column_id)
		{
			case 'date': $query = $query->orderBy('ba.article_date '.$order); break;
			case 'title': $query = $query->orderBy('ba.title '.$order); break;
			case 'category': $query = $query->innerJoin('ba.ArticleCategory acat'); $query = $query->orderBy('acat.category_name '.$order); break;
			case 'type': $query = $query->innerJoin('ba.ArticleType atype'); $query = $query->orderBy('atype.type_name '.$order); break;
			case 'object': $query = $query->innerJoin('ba.Objekt obj'); $query = $query->orderBy('obj.object_name '.$order); break;
			case 'default': $query = $query->orderBy('ba.article_date DESC'); break;
		}

		return $query;
	}
	
   /*
	*
	* This function returns Commodities article. 
	*
	*/
	
	public function getHomeCurrencies($start,$end) 
	{ 
		$currencies_article_cri = Doctrine_Query::create()
	   						     ->from('Article ba')
								 ->where('ba.type_id = ? AND ba.article_date <= ? AND ba.art_statid != ?', array(28, date('Y-m-d H:i:s'),2))
							     ->orderBy('ba.article_date DESC')
							     ->offset($start)
								 ->limit($end);
								 
		$data = $currencies_article_cri->execute();
		
		return $data;
	}
	
   /*
	*
	* This function returns BuySell article. 
	*
	*/
	
	public function getHomeBuySell($start,$end,$isSuperAdmin,$two_column_articles = NULL) 
	{ 
		$ignoreIds = array();
		//Ids to ignore in right column
		if($two_column_articles)
		{
			foreach($two_column_articles as $data)
			{
				if($data->category_id == 5)
				{
					$ignoreIds[] =  $data->article_id;
				}	
			}
		}	
		/*if($isSuperAdmin==1)
		{
			$buysell_article_cri = Doctrine_Query::create()
									 ->from('Article ba')
									 ->where('ba.category_id = ? AND ba.article_date <= ?', array(2, date('Y-m-d H:i:s')))
									 ->orderBy('ba.article_date DESC')
									 ->offset($start)
									 ->limit($end);		
		}
		else
		{ */
			$buysell_article_cri = Doctrine_Query::create()
									 ->from('Article ba')
									 ->where('ba.category_id IN (5,38) AND ba.article_date <= ? AND ba.art_statid != ?', array(date('Y-m-d H:i:s'),2))
									 ->orderBy('ba.article_date DESC')
									 ->offset($start)
									 ->limit($end);
			if($ignoreIds)
			{
				$buysell_article_cri->andWhereNotIn('ba.article_id', $ignoreIds);
			}						 
		//}
		$data = $buysell_article_cri->execute();
		
		return $data;
	}
   
   /*
	*
	* This function returns all Borst Article.
	*
	*/
	
	public function getAllBuySellArticleQuery($column_id,$order) 
	{ 
		$query = Doctrine_Query::create()->from('Article ba');
		$query = $query->where('ba.category_id = ? AND ba.article_date <= ? AND ba.art_statid != ?', array(2, date('Y-m-d H:i:s'),2));
		
		switch($column_id)
		{
			case 'date': $query = $query->orderBy('ba.article_date '.$order); break;
			case 'title': $query = $query->orderBy('ba.title '.$order); break;
			case 'category': $query = $query->innerJoin('ba.ArticleCategory acat'); $query = $query->orderBy('acat.category_name '.$order); break;
			case 'type': $query = $query->innerJoin('ba.ArticleType atype'); $query = $query->orderBy('atype.type_name '.$order); break;
			case 'object': $query = $query->innerJoin('ba.Objekt obj'); $query = $query->orderBy('obj.object_name '.$order); break;
			case 'default': $query = $query->orderBy('ba.article_date DESC'); break;
		}
		
		if(!$column_id)	$query = $query->orderBy('ba.article_date DESC');   
		
		return $query;
	}
	
   /*
	*
	* This function returns query which gives Buy-Sell Articles in a specific order.
	*
	*/
	
	public function getAllBuySellArticleByOrderQuery($isSuperAdmin,$column_id,$order) 
	{ 
		$query = Doctrine_Query::create()->from('Article ba');
		
		if($isSuperAdmin==1)
			$query = $query->where('ba.category_id = ? AND ba.article_date <= ?', array(2, date('Y-m-d H:i:s')));
		else
			$query = $query->where('ba.category_id = ? AND ba.article_date <= ? AND ba.art_statid != ?', array(2, date('Y-m-d H:i:s'),2));
		
		switch($column_id)
		{
			case 'date': $query = $query->orderBy('ba.article_date '.$order); break;
			case 'title': $query = $query->orderBy('ba.title '.$order); break;
			case 'category': $query = $query->innerJoin('ba.ArticleCategory acat'); $query = $query->orderBy('acat.category_name '.$order); break;
			case 'type': $query = $query->innerJoin('ba.ArticleType atype'); $query = $query->orderBy('atype.type_name '.$order); break;
			case 'object': $query = $query->innerJoin('ba.Objekt obj'); $query = $query->orderBy('obj.object_name '.$order); break;
			case 'default': $query = $query->orderBy('ba.article_date DESC'); break;
		}
		
		return $query;
	}
	
   /*
	*
	* This function returns borstSubscriber article. 
	*
	*/
	
	public function getHomeSubscriberArticle($start,$end,$isSuperAdmin) 
	{ 
		/*if($isSuperAdmin==1)
		{
			$subscribe_article_cri = Doctrine_Query::create()
									 ->from('Article ba')
									 ->where('ba.category_id = ? AND ba.article_date <= ?', array(13, date('Y-m-d H:i:s')))
									 ->orderBy('ba.article_date DESC')
									 ->offset($start)
									 ->limit($end);		
		}
		else
		{ */
			$subscribe_article_cri = Doctrine_Query::create()
									 ->from('Article ba')
									 ->where('ba.category_id = ? AND ba.article_date <= ? AND ba.art_statid != ?', array(13, date('Y-m-d H:i:s'),2))
									 ->orderBy('ba.article_date DESC')
									 ->offset($start)
									 ->limit($end);
		//}
		$data = $subscribe_article_cri->execute();
		
		return $data;
	}
	
   /*
	*
	* This function returns Statistics article. 
	*
	*/
	
	public function getHomeStatisticsArticle($start,$end,$isSuperAdmin) 
	{ 
		if($isSuperAdmin==1)
		{
			$statistics_article_cri = Doctrine_Query::create()
									 ->from('Article ba')
									 ->where('ba.category_id = ? AND ba.article_date <= ?', array(19, date('Y-m-d H:i:s')))
									 ->orderBy('ba.article_date DESC')
									 ->offset($start)
									 ->limit($end);		
		}
		else
		{ 
			$statistics_article_cri = Doctrine_Query::create()
									 ->from('Article ba')
									 ->where('ba.category_id = ? AND ba.article_date <= ? AND ba.art_statid != ?', array(19, date('Y-m-d H:i:s'),2))
									 ->orderBy('ba.article_date DESC')
									 ->offset($start)
									 ->limit($end);
		}
		$data = $statistics_article_cri->execute();
		
		return $data;
	}
	
   /*
	*
	* This function returns Krönika article. 
	*
	*/
	
	public function getHomeKronikaArticle($start,$end,$isSuperAdmin) 
	{ 
		if($isSuperAdmin==1)
		{
			$kronika_article_cri = Doctrine_Query::create()
									 ->from('Article ba')
									 ->where('ba.category_id = ? AND ba.article_date <= ?', array(5, date('Y-m-d H:i:s')))
									 ->orderBy('ba.article_date DESC')
									 ->offset($start)
									 ->limit($end);		
		}
		else
		{ 
			$kronika_article_cri = Doctrine_Query::create()
									 ->from('Article ba')
									 ->where('ba.category_id = ? AND ba.article_date <= ? AND ba.art_statid != ?', array(5, date('Y-m-d H:i:s'),2))
									 ->orderBy('ba.article_date DESC')
									 ->offset($start)
									 ->limit($end);
		}
		$data = $kronika_article_cri->execute();
		
		return $data;
	}

   /*
	*
	* This function returns query which gives borstSubscriber articles. 
	*
	*/
	public function getHomeSubscriberArticleQuery($column_id,$order) 
	{ 
		$query = Doctrine_Query::create()->from('Article ba');
		$query = $query->where('ba.category_id = ? AND ba.article_date <= ? AND ba.art_statid != ?', array(13, date('Y-m-d H:i:s'),2));
		
		switch($column_id)
		{
			case 'date': $query = $query->orderBy('ba.article_date '.$order); break;
			case 'title': $query = $query->orderBy('ba.title '.$order); break;
			case 'category': $query = $query->innerJoin('ba.ArticleCategory acat'); $query = $query->orderBy('acat.category_name '.$order); break;
			case 'type': $query = $query->innerJoin('ba.ArticleType atype'); $query = $query->orderBy('atype.type_name '.$order); break;
			case 'object': $query = $query->innerJoin('ba.Objekt obj'); $query = $query->orderBy('obj.object_name '.$order); break;
			case 'default': $query = $query->orderBy('ba.article_date DESC'); break;
		}
		
		if(!$column_id)	$query = $query->orderBy('ba.article_date DESC');
		
		return $query;
	}
	
   /*
	*
	* This function returns query which gives borstSubscriber articles in a specific order. 
	*
	*/
	public function getHomeSubscriberArticleByOrderQuery($isSuperAdmin,$column_id,$order) 
	{ 
		$query = Doctrine_Query::create()->from('Article ba');
		
		if($isSuperAdmin==1)
			$query = $query->where('ba.category_id = ? AND ba.article_date <= ?', array(13, date('Y-m-d H:i:s')));
		else
			$query = $query->where('ba.category_id = ? AND ba.article_date <= ? AND ba.art_statid != ?', array(13, date('Y-m-d H:i:s'),2));
		
		switch($column_id)
		{
			case 'date': $query = $query->orderBy('ba.article_date '.$order); break;
			case 'title': $query = $query->orderBy('ba.title '.$order); break;
			case 'category': $query = $query->innerJoin('ba.ArticleCategory acat'); $query = $query->orderBy('acat.category_name '.$order); break;
			case 'type': $query = $query->innerJoin('ba.ArticleType atype'); $query = $query->orderBy('atype.type_name '.$order); break;
			case 'object': $query = $query->innerJoin('ba.Objekt obj'); $query = $query->orderBy('obj.object_name '.$order); break;
			case 'default': $query = $query->orderBy('ba.article_date DESC'); break;
		}
		return $query;
	}
	
   /*
	*
	* This function returns borstSubscriber article. 
	*
	*/
	
	public function getHomeBorstHome($start,$end,$isSuperAdmin) 
	{ 
            //echo '$start: '. $start;
            //echo '$end: ' . $end;
		/*if($isSuperAdmin==1)
		{
			$subscribe_article_cri = Doctrine_Query::create()
									 ->from('Article ba')
									 ->orderBy('ba.article_date DESC')
									 ->offset($start)
									 ->limit($end);		
		}
		else
		{*/ 
			$subscribe_article_cri = Doctrine_Query::create()
									 ->from('Article ba')
									 ->where('ba.article_date <= ? AND ba.art_statid != ?', array(date('Y-m-d H:i:s'),2))
									 ->orderBy('ba.article_date DESC')
									 ->offset($start)
									 ->limit($end);
		//}
		$data = $subscribe_article_cri->execute();
		
		return $data;
	}

	public function getArticleListMenu($start,$end,$colname,$id,$isSuperAdmin) 
	{ 
		$query = Doctrine_Query::create()->from('Article ba');
		
		if($colname=='kat') $query = $query->where('ba.category_id = ? AND ba.article_date <= ? ', array($id, date('Y-m-d H:i:s')));
		if($colname=='type') $query = $query->where('ba.type_id = ? AND ba.article_date <= ?', array($id, date('Y-m-d H:i:s')));
		if($colname=='obj') $query = $query->where('ba.object_id = ? AND ba.article_date <= ?', array($id, date('Y-m-d H:i:s')));
		$query = $query->orderBy('ba.article_date DESC');
		$query = $query->offset($start);
		$query = $query->limit($end);
		$data = $query->execute();
		// echo ("<pre>");	
		// print_r() $id;
		// exit;
		return $data;
	}

	public function getHomeBorstBuySellLeft($start,$end,$isSuperAdmin) 
	{ 
	
			$subscribe_article_cri = Doctrine_Query::create()
									 ->from('Article ba')
									 ->where('ba.article_date <= ? AND ba.art_statid != ? AND ba.category_id =?', array(date('Y-m-d H:i:s'),2,2))
									 ->orderBy('ba.article_date DESC')
									 ->offset($start)
									 ->limit($end);
		
		$data = $subscribe_article_cri->execute();
		
		return $data;
	}

   /*
	*
	* This function returns query which will fetch article's of a specific user from Borstjanaren.
	*
	*/
	
	public function getArticleFromBorstQuery($user_id,$name) 
	{ 
		$query = Doctrine_Query::create()->from('Article a');
		//$query = $query->where('a.author = ? AND a.art_statid != ?', array($name,2));
		$query = $query->where('a.author_id = ? AND a.art_statid != ?', array($user_id,2));
		$query = $query->orderBy('a.article_date DESC');

		return $query;
	}
	
   /*
	*
	* This function returns articles with selected word.
	*
	*/
	
	public function getSearchedArticleQuery($word,$column_id,$order,$add_param) 
	{
	   
        if($add_param['category_id'])
        {
            $cat = explode('_',$add_param['category_id']);
            if($cat[0]=='bt') $add_param['category_id'] = $cat[1];
            if($cat[0]=='sbt') $add_param['category_id'] = $this->getBtCategoryIdFromSbtCategoryId($cat[1]);
        }
        if($add_param['type_id'])
        {
            $type = explode('_',$add_param['type_id']);
            if($type[0]=='bt') $add_param['type_id'] = $type[1];
            if($type[0]=='sbt') $add_param['type_id'] = $this->getBtTypeIdFromSbtTypeId($type[1]);
        }        
        if($add_param['object_id'])
        {
            $object = explode('_',$add_param['object_id']);
            if($object[0]=='bt') $add_param['object_id'] = $object[1];
            if($object[0]=='sbt') $add_param['object_id'] = $this->getBtObjectIdFromSbtObjectId($object[1]);
        }                
		if($word)
		{
            $author_id_arr = SfGuardUserProfile::getMatchingUserIdFromUserName($word);        
            if($author_id_arr){
                $query = Doctrine_Query::create()->from('Article a')->where('a.text LIKE "%'.$word.'%" OR a.title LIKE "%'.$word.'%" OR a.author_id IN('.$author_id_arr.')');
            }
            else
            $query = Doctrine_Query::create()->from('Article a')->where('a.text LIKE ?  OR a.title LIKE ?', array('%'.$word.'%','%'.$word.'%'));
			$query = $query->andWhere('a.art_statid != ?', 2);
            
            if($add_param['category_id']) { $query = $query->andWhere('a.category_id = ?', $add_param['category_id']); }
            if($add_param['type_id']) { $query = $query->andWhere('a.type_id = ?', $add_param['type_id']); }
            if($add_param['object_id']) { $query = $query->andWhere('a.object_id = ?', $add_param['object_id']); }
		
			switch($column_id)
			{
				case 'date': $query = $query->orderBy('a.article_date '.$order); break;
				case 'title': $query = $query->orderBy('a.title '.$order); break;
				//case 'category': $query = $query->orderBy('a.category_id '.$order); break;
                case 'category': 
                    $query = $query->innerJoin('a.ArticleCategory ac');
                    $query = $query->orderBy('ac.category_name '.$order); 
                    break;
				//case 'type': $query = $query->orderBy('a.type_id '.$order); break;
                case 'type':
                    $query = $query->innerJoin('a.ArticleType at');
                    $query = $query->orderBy('at.type_name '.$order);
                    break;
				//case 'object': $query = $query->orderBy('a.object_id '.$order); break;
                case 'object': 
                    $query = $query->innerJoin('a.Objekt obj');
                    $query = $query->orderBy('obj.object_name '.$order);
                    break;                
				case 'author': $query = $query->orderBy('a.author '.$order); break;
				default : $query = $query->orderBy('a.article_date DESC'); break;
			}
		}
		else $query = NULL;
        //echo $query->getSqlQuery();
	    return $query;
	}
	
   /*
	*
	* This function returns customised query for advanced search.
	*
	*/
	
	public function getAdvancedSearchedArticleQuery($arr,$column_id,$order,$add_param) 
	{ 
		/*$adv_selected_articles_cri = Doctrine_Query::create()
	   					      ->from('Article a')
							  ->where("a.text LIKE '%".$arr['phrase_in_page']."%'")
							  ->andWhere('a.author =?', $arr['author_name'])
							  ->andWhere('a.article_date BETWEEN ? AND ?', array($arr['start_date_text'], $arr['end_date_text']));*/
		
        if($add_param['category_id'])
        {
            $cat = explode('_',$add_param['category_id']);
            if($cat[0]=='bt') $add_param['category_id'] = $cat[1];
            if($cat[0]=='sbt') $add_param['category_id'] = $this->getBtCategoryIdFromSbtCategoryId($cat[1]);
        }
        if($add_param['type_id'])
        {
            $type = explode('_',$add_param['type_id']);
            if($type[0]=='bt') $add_param['type_id'] = $type[1];
            if($type[0]=='sbt') $add_param['type_id'] = $this->getBtTypeIdFromSbtTypeId($type[1]);
        }
        if($add_param['object_id'])
        {
            $object = explode('_',$add_param['object_id']);
            if($object[0]=='bt') $add_param['object_id'] = $object[1];
            if($object[0]=='sbt') $add_param['object_id'] = $this->getBtObjectIdFromSbtObjectId($object[1]);
        }                                        
        if($arr['adv_search_category'])
            $arr['adv_search_category'] = $this->getBtCategoryIdFromSbtCategoryId($arr['adv_search_category']);
        if($arr['adv_search_type'])            
            $arr['adv_search_type'] = $this->getBtTypeIdFromSbtTypeId($arr['adv_search_type']);                    
        if($arr['adv_search_object'])            
            $arr['adv_search_object'] = $this->getBtObjectIdFromSbtObjectId($arr['adv_search_object']);
                
        if($arr['author_name'])
            $author_id_arr = SfGuardUserProfile::getMatchingUserIdFromUserName($arr['author_name']);
            
        $param_present = 0;
        $no_param = 0;
		$query = Doctrine_Query::create()->from('Article a');
		$query = $query->where('a.art_statid != ?', 2); $param_present = 1;		
        
        if($arr['adv_search_category']) { $query = $query->andWhere('a.category_id =?', $arr['adv_search_category']); $param_present = 1; $no_param = 1;}
        if($arr['adv_search_type']) { $query = $query->andWhere('a.type_id =?', $arr['adv_search_type']); $param_present = 1; $no_param = 1;}
        if($arr['adv_search_object']) { $query = $query->andWhere('a.object_id =?', $arr['adv_search_object']); $param_present = 1; $no_param = 1;}
		
        if($arr['phrase_in_page']) { $query = $query->andWhere("(a.text LIKE '%".$arr['phrase_in_page']."%'"); $param_present = 1; $no_param = 1;}
        if($arr['phrase_in_page']) { $query = $query->orWhere("a.title LIKE '%".$arr['phrase_in_page']."%'"); $param_present = 1; $no_param = 1;}
        if($arr['phrase_in_page']) { $query = $query->orWhere("a.image_text LIKE '%".$arr['phrase_in_page']."%')"); $param_present = 1; $no_param = 1;}
        if($add_param['category_id']) { $query = $query->andWhere('a.category_id =?', $add_param['category_id']); $param_present = 1; $no_param = 1; }
        if($add_param['type_id']) { $query = $query->andWhere('a.type_id =?', $add_param['type_id']); $param_present = 1; $no_param = 1; }
        if($add_param['object_id']) { $query = $query->andWhere('a.object_id =?', $add_param['object_id']); $param_present = 1; $no_param = 1; }
        
        if($arr['author_name'] && $author_id_arr)    { $query = $query->andWhere("a.author_id IN (".$author_id_arr.")");  $param_present = 1; $no_param = 1;}
		if($arr['start_date_text']){ $query = $query->andWhere('a.article_date BETWEEN ? AND ?', array($arr['start_date_text'], $arr['end_date_text'])); $param_present = 1; $no_param = 1; }
        
		if($param_present == 1 && $no_param == 1)
		{
            switch($column_id)
			{
				case 'date': $query = $query->orderBy('a.article_date '.$order); break;
				case 'title': $query = $query->orderBy('a.title '.$order); break;
                case 'category':
                    $query = $query->innerJoin('a.ArticleCategory ac');
                    $query = $query->orderBy('ac.category_name '.$order); 
                    break;
                case 'type':
                    $query = $query->innerJoin('a.ArticleType at');
                    $query = $query->orderBy('at.type_name '.$order);
                    break;
                case 'object': 
                    $query = $query->innerJoin('a.Objekt obj');
                    $query = $query->orderBy('obj.object_name '.$order);
                    break;
				case 'author': $query = $query->orderBy('a.author '.$order); break;
				default: $query = $query->orderBy('a.article_date DESC'); break;
			}
		}
		else $query = '';
        return $query;
	}
    /*
        This function returns the category id for article
    */
    public function getArticleCatetogyId($cat_id)
    {
        $q = Doctrine_Query::create()->from('sbtArticleCategory s')
            ->where('s.id = ?', $cat_id)
            ->fetchOne();
        $cat = $q->sbt_category_name;
        $q = Doctrine_Query::create()->from('articleCategory a')
            ->where('a.category_name = ?', $cat)
            ->fetchOne();    
        return $q->category_id;
    }    
    /*
        This function returns the type id for article
    */

    public function getArticleTypeId($type_id)
    {
        $q = Doctrine_Query::create()->from('sbtArticleType s')
            ->where('s.id = ?', $type_id)
            ->fetchOne();
        $type = $q->type_name;
        
        $q = Doctrine_Query::create()->from('articleType a')
            ->where('a.type_name = ?', $type)
            ->fetchOne();    
        return $q->type_id;
    }
    /*
        This function returns the object id for article
    */
               
    public function getArticleObjectId($obj_id)
    {
        $q = Doctrine_Query::create()->from('sbtObject s')
            ->where('s.id = ?', $obj_id)
            ->fetchOne();
        $obj = $q->object_short_name;
        $q = Doctrine_Query::create()->from('objekt o')
            ->where('o.object_name = ?', $obj)
            ->fetchOne();    
        return $q->object_id;
    } 
   /*
	*
	* This function returns customised query for sorting articles.
	*
	*/
	
	public function getSortingArticleQuery($param,$column_id,$order) 
	{ 
		$notblank = 0;
		$art_id = $param['art_id'] ? $param['art_id'] : ($param['art_id_update'] ? $param['art_id_update'] : '');
		$art_title = $param['art_title'] ? $param['art_title'] : ($param['art_title_update'] ? $param['art_title_update'] : '');
		$search_katID = $param['search_katID'] ? $param['search_katID'] : ($param['search_katID_update'] ? $param['search_katID_update'] : '');
		$search_art_statID = $param['search_art_statID'] ? $param['search_art_statID'] : ($param['search_art_statID_update'] ? $param['search_art_statID_update'] : '');
		$sort_order = $param['sort_order'] ? $param['sort_order'] : ($param['sort_order_update'] ? $param['sort_order_update'] : '');
		
		$query = Doctrine_Query::create()->from('Article a');
		if($art_id) { $query = $query->andWhere("a.article_id =? ",$art_id); $notblank = 1; }
		if($art_title) { $query = $query->andWhere("a.title LIKE '%".$art_title."%'"); $notblank = 1; }
		if($search_katID) { $query = $query->andWhere("a.category_id =?",$search_katID); $notblank = 1; }
		if($search_art_statID) { $query = $query->andWhere("a.art_statID =?", $search_art_statID); $notblank = 1; }
		//if($sort_order) { $query = $query->orderBy('a.article_id '.$sort_order); $notblank = 1; }
		
		switch($column_id)
		{
			case 'art_status': $query = $query->innerJoin('a.ArticleStatus astatus'); $query = $query->orderBy('astatus.art_status '.$order); break;			
			case 'date': $query = $query->orderBy('a.article_date '.$order); break;
			case 'author': $query = $query->orderBy('a.author '.$order); break;
			case 'title': $query = $query->orderBy('a.title '.$order); break;
			case 'category': $query = $query->innerJoin('a.ArticleCategory acat'); $query = $query->orderBy('acat.category_name '.$order); break;
			case 'type': $query = $query->innerJoin('a.ArticleType atype'); $query = $query->orderBy('atype.type_name '.$order); break;
			case 'object': $query = $query->innerJoin('a.Objekt obj'); $query = $query->orderBy('obj.object_name '.$order); break;
			
			case 'art_view': $query = $query->leftJoin('a.ArticleCount acnt'); $query = $query->orderBy('acnt.click_cnt '.$order); break;
			case 'default': $query = $query->orderBy('a.article_date DESC');
		}
		if(!$column_id) $query = $query->orderBy('a.article_date DESC');
		return $query;
	}

   /*
	*
	* This function returns query for searched article.
	*
	*/
	public function getFindArticleQuery($param)
	{ 
		$notblank = 0;
		$art_id = $param['art_id'] ? $param['art_id'] : ($param['art_id_update'] ? $param['art_id_update'] : '');
		$art_title = $param['art_title'] ? $param['art_title'] : ($param['art_title_update'] ? $param['art_title_update'] : '');
		$search_katID = $param['search_katID'] ? $param['search_katID'] : ($param['search_katID_update'] ? $param['search_katID_update'] : '');
		$search_art_statID = $param['search_art_statID'] ? $param['search_art_statID'] : ($param['search_art_statID_update'] ? $param['search_art_statID_update'] : '');
		$sort_order = $param['sort_order'] ? $param['sort_order'] : ($param['sort_order_update'] ? $param['sort_order_update'] : '');
		
		$query = Doctrine_Query::create()->from('Article a');
		if($art_id) { $query = $query->andWhere("a.article_id =? ",$art_id); $notblank = 1; }
		if($art_title) { $query = $query->andWhere("a.title LIKE '%".$art_title."%'"); $notblank = 1; }
		if($search_katID) { $query = $query->andWhere("a.category_id =?",$search_katID); $notblank = 1; }
		if($search_art_statID) { $query = $query->andWhere("a.art_statID =?", $search_art_statID); $notblank = 1; }
		if($sort_order) { $query = $query->orderBy('a.article_id '.$sort_order); $notblank = 1; }
		
		if($notblank == 0) $query = $query->orderBy('a.article_date DESC');

		return $query;
	}

   /*
	*
	* This function returns query for article list submenu.
	*
	*/
	public function getQueryForSubMenu($submenu_menu,$isSuperAdmin,$column_id,$order)
	{ 
		if(!$column_id){ $column_id = 'date'; $order='DESC'; } 
		switch($submenu_menu)
		{
			case 'borst_menu_commodities': $query = $this->getAllCommoditiesByOrderQuery(27,$isSuperAdmin,$column_id,$order);break;
			case 'borst_menu_currencies': $query = $this->getAllCommoditiesByOrderQuery(28,$isSuperAdmin,$column_id,$order); break;
			case 'borst_menu_share': $query = $this->getAllBorstArticleByOrderQuery($isSuperAdmin,$column_id,$order); break;
			case 'borst_menu_buysell': $query = $this->getAllBuySellArticleByOrderQuery($isSuperAdmin,$column_id,$order); break;
			case 'borst_menu_subscriber': $query = $this->getHomeSubscriberArticleByOrderQuery($isSuperAdmin,$column_id,$order); break;
			case 'borst_menu_home': $query = $this->getAllBorstArticleByOrderQuery($isSuperAdmin,$column_id,$order); break;
			case 'borst_menu_forum': $query = $this->getAllBorstArticleByOrderQuery($isSuperAdmin,$column_id,$order); break;
			case 'borst_menu_chronicles': $query = $this->getAllBorstArticleByOrderQuery($isSuperAdmin,$column_id,$order); break;
			case 'borst_menu_ppm': $query = $this->getAllBorstArticleByOrderQuery($isSuperAdmin,$column_id,$order); break;
		}
		
		return $query;
	}
	
	
   /*
	*
	* This function returns query which will fetch article's of a specific user from Borstjanaren in specific order.
	*
	*/
	
	public function getArticleFromBorstByOrderQuery($user_id,$name,$column_id,$order) 
	{ 
		//$query = Doctrine_Query::create()->from('Article a')->where('a.author = ? AND a.art_statid != ?', array($name,2));
		$query = Doctrine_Query::create()->from('Article a')->where('a.author_id = ? AND a.art_statid != ?', array($user_id,2));

		switch($column_id)
		{
			case 'date': $query = $query->orderBy('a.article_date '.$order); break;
			case 'title': $query = $query->orderBy('a.title '.$order); break;
			case 'category': $query = $query->innerJoin('a.ArticleCategory acat'); $query = $query->orderBy('acat.category_name '.$order); break;
			case 'type': $query = $query->innerJoin('a.ArticleType atype'); $query = $query->orderBy('atype.type_name '.$order); break;
			case 'object': $query = $query->innerJoin('a.Objekt obj'); $query = $query->orderBy('obj.object_name '.$order); break;
			case 'default': $query = $query->orderBy('a.article_date DESC'); break;
		}
		
		if(!$column_id) $query = $query->orderBy('a.article_date DESC');
		return $query;
	}
	
   /*
	*
	* This function returns query which fetches all bt article on articleToplisterListing.
	*
	*/
	
	public function getAllTopArticleQuery($column_id,$order,$type) 
	{
		$query = Doctrine_Query::create()->from('Article a');
		
		if($type == 'comment')
		{ 
			$query = $query->select('a.article_id, a.author, a.article_date, a.title, count(bac.article_id) as comment_cnt'); 
			$query = $query->leftJoin('a.BorstArticleComment bac'); 
			$query = $query->groupBy('a.article_id');
		}
		else 
		{
			$query = $query->select('a.article_id, a.author, a.article_date, a.title, acnt.click_cnt as view_cnt'); 
			$query = $query->leftJoin('a.ArticleCount acnt'); 
		}

		switch($column_id)
		{
			case 'title': 	$query = $query->orderBy('a.title '.$order); break;
			case 'author': 	$query = $query->orderBy('a.author '.$order); break;
			case 'view':  	$query = $query->orderBy('acnt.click_cnt '.$order); break;
			case 'comment': $query = $query->orderBy('count(bac.article_id) '.$order); break;
			case 'date': 	$query = $query->orderBy('a.article_date '.$order); break;
			case 'default': $query = $query->orderBy('a.article_date DESC'); break;
		}
		
		if(!$column_id)
		{
			if($type == 'comment') $query = $query->orderBy('count(bac.article_id) DESC');
			else $query = $query->orderBy('acnt.click_cnt DESC'); 
		}
		//echo $query->getSqlQuery();		 
		return $query;
	}
    
    public function getBtCategoryIdFromSbtCategoryId($id)
    {
        $q =  Doctrine_Query::create()->select('sac.sbt_category_name')->from('SbtArticleCategory sac')->where('sac.id=?',$id)->fetchOne();
        $cat_name = $q->sbt_category_name;
        if($cat_name){
         $q =  Doctrine_Query::create()->select('ac.category_id')->from('ArticleCategory ac')->where('ac.category_name=?',$cat_name)->fetchOne();
         if($q->category_id)
            return $q->category_id;
         else
            return 121212121212121212; // no matching category_id  
        }
         
    }
    public function getBtTypeIdFromSbtTypeId($id)
    {
        $q =  Doctrine_Query::create()->select('sat.type_name')->from('SbtArticleType sat')->where('sat.id=?',$id)->fetchOne();
        $type_name = $q->type_name;
        if($type_name){
         $q =  Doctrine_Query::create()->select('at.type_id')->from('ArticleType at')->where('at.type_name=?',$type_name)->fetchOne();
         if($q->type_id)
            return $q->type_id;
         else
            return 121212121212121212; // no matching category_id  
        }
         
    }    
    public function getBtObjectIdFromSbtObjectId($id)
    {
        $q =  Doctrine_Query::create()->select('sbo.object_short_name')->from('SbtObject sbo')->where('sbo.id=?',$id)->fetchOne();
        $object_short_name = $q->object_short_name;
        if($object_short_name){
         $q =  Doctrine_Query::create()->select('obj.object_id')->from('Objekt obj')->where('obj.object_name=?',$object_short_name)->fetchOne();
         if($q->object_id)
            return $q->object_id;
         else
            return 121212121212121212; // no matching category_id  
        }
         
    }    
    
    
        public function getAllBtshopPlusArticles() 
	{ 
		$all_btshop_art = Doctrine_Query::create()
	   					->from('BtShopArticle as')
                                                ->where('as.btshop_type_id = ?', 9);
		
		$borstShop = $all_btshop_art->execute();
		return $borstShop;
	}
        
        
    public function getBtshopPlusArticles($isNew)
    {
        $queryBtShopArticleList	= Doctrine_Query::create()
                                    ->select('p.id, p.btshop_article_title')
                                    ->where('p.btshop_type_id = ?', 9)
                                    ->from('BtShopArticle p');
        
       if($isNew)
        $BtShopArticle_lists			= array('' => "");
       else
        $BtShopArticle_lists			= array();	
	   $arrayForBtShopArticle	= $queryBtShopArticleList->fetchArray();
	   foreach($arrayForBtShopArticle as $BtShopArticle_list) 
	       $BtShopArticle_lists[$BtShopArticle_list['id']]	= $BtShopArticle_list['btshop_article_title'];	                                
                                                       
        return $BtShopArticle_lists;
    }
}