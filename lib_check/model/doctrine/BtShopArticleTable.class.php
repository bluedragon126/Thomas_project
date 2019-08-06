<?php


class BtShopArticleTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('BtShopArticle');
    }
	
   /*
	*
	* This function return query by specified order. 
	*
	*/
	public function getAllBtShopArticleQuery($column_id,$order,$selected_article_type)
	{ 
		$query = Doctrine_Query::create()->from('BtShopArticle bsa');
		//$query = $query->where('bsa.created_at <= ? AND bsa.published = ?', array(date('Y-m-d H:i:s'),1));
		$query = $query->where('bsa.created_at <= ? ', date('Y-m-d H:i:s'));
        if($selected_article_type!='All')
            $query = $query->andWhere('bsa.btshop_type_id = ?',$selected_article_type);
		
		$order = trim($order);
		switch($column_id)
		{
			case 'subject': $query = $query->orderBy('bsa.btshop_article_title '.$order); break;
			case 'status': $query = $query->orderBy('bsa.published '.$order); break;
			case 'type': $query = $query = $query->innerJoin('bsa.BtShopArticleType bsat'); $query = $query->orderBy('bsat.btshop_type_name '.$order); break;
			case 'date': $query = $query->orderBy('bsa.created_at '.$order); break;
			case 'default': $query = $query->orderBy('bsa.created_at '.$order); break;
		}
		if(!$column_id) $query = $query->orderBy('bsa.created_at DESC'); 
					
		return $query;
	}
    
   /*
	*
	* This function return query for normal search. 
	*
	*/
	public function getSearchedBtshopQuery($word,$column_id,$order,$add_param)
	{ 
        if(!$word)
            $word = 'no_result_found_condtion_no_match';

        $query = Doctrine_Query::create()->from('BtShopArticle bsa');
		$query = $query->where("bsa.btshop_article_title LIKE '%".$word."%' OR bsa.btshop_article_subtitle LIKE '%".$word."%' OR bsa.btshop_product_intro_text LIKE '%".$word."%' OR bsa.btshop_product_description LIKE '%".$word."%'");
        $query = $query->innerJoin("bsa.BtShopPriceDetails bspd");
        $query = $query->groupBy("bspd.btshop_article_id");
        
        if($add_param['shop_type']){ $query = $query->andWhere('bsa.btshop_type_id = ?',$add_param['shop_type']); }
		
		$order = trim($order);
		switch($column_id)
		{
            case 'btshop_article_title': $query = $query->orderBy('bsa.btshop_article_title '.$order); break;
			case 'btshop_type_id': $query = $query->orderBy('bsa.btshop_type_id '.$order); break;
			case 'btshop_product_price': $query = $query->orderBy('bspd.btshop_product_price '.$order); break;
            
		}
		if(!$column_id) $query = $query->orderBy('bsa.created_at DESC'); 
        		
		return $query;
	}    
	
        public function getArticleNameById($id)
        {
            $result=Doctrine_Query::create()
                ->select('a.btshop_article_title')
                ->from('BtShopArticle a')
                ->where('a.id =?',$id)
                ->fetchOne();
            return $result;
        }
        
        public function getEndSubcriptionUsers() 
	{              
                /*$query = Doctrine_Query::create()
                        ->select('p.id as purchase_id , p.user_id, p.email, p.firstname, p.lastname, s.end_date')                        
                        ->from('subscription as s')
                        ->leftJoin('s.purchase as p ON ce.purchase_id = p.id')
                        ->where('s.end_date < NOW() AND  s.end_date > NOW() - INTERVAL 7 DAY');*/         
                //$query = "select p.id as purchase_id , p.user_id, p.email, p.firstname, p.lastname, s.end_date FROM subscription as s left join purchase as p ON s.purchase_id = p.id WHERE (s.end_date < NOW() AND  s.end_date > (NOW() - INTERVAL 7 DAY) ) ORDER BY s.end_date  ASC";
                //$query = "SELECT p.id AS purchase_id, p.user_id, pi.product_id, p.email, p.firstname, p.lastname, s.end_date FROM subscription AS s LEFT JOIN purchase AS p ON s.purchase_id = p.id LEFT JOIN purchased_item AS pi ON s.purchase_id = pi.purchase_id WHERE s.end_date = date_add( CURDATE( ) , INTERVAL 7 DAY ) ORDER BY s.end_date ASC";
                $query = "SELECT rs.id,s.id as subscription_id, rs.subscription_type,rs.nof_days, rs.subject, rs.email_contain, pi.purchase_id, p.email, p.firstname, p.lastname, s.product_id, s.end_date FROM  reminder_subscription  as rs left join  subscription as s ON rs.subscription_type = s.product_id left join purchased_item as pi ON pi.product_id = s.product_id left join  purchase as p ON p.id= pi.purchase_id  WHERE p.checkout_status ='1' and s.end_date = date_add( CURDATE( ) , INTERVAL rs.nof_days DAY ) AND s.start_date != CURDATE()"; // GROUP BY s.id 
                $q = Doctrine_Manager::getInstance()->getCurrentConnection();
                $result = $q->execute($query);
                $results = $result->fetchAll();                
		return $results;
	}
}