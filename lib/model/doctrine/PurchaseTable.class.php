<?php


class PurchaseTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Purchase');
    }
	
   /*
	*
	* This function returns all purchase records.
	*
	*/
	public function getAllPurchaseRecords($field,$order)
	{ 
		$field = $field ? $field : 2;
		$order = $order ? $order : 2;
		
		$arr = array('1'=>'id','2'=>'created_at','3'=>'payment_method','4'=>'checkout_status','5'=>'firstname','6'=>'payment_date','7'=>'order_processed');
		$order_arr = array('1'=>'ASC','2'=>'DESC');
		
		$query = Doctrine_Query::create();
		$query = $query->select('p.id,p.payment_method,p.checkout_status,p.created_at');
		$query = $query->from('Purchase p');
		$query = $query->where('p.email!="" AND p.firstname!=""');
		$query = $query->orderBy('p.'.$arr[$field].' '.$order_arr[$order]);
                
		return $query;
	}
        public function getAllPurchaseRecordsByOrders($field,$order,$status,$proccessed,$article_type,$ord_no,$first_name,$last_name){
		$field = $field ? $field : 2;
		$order = $order ? $order : 2;

		$arr = array('1'=>'id','2'=>'created_at','3'=>'payment_method','4'=>'checkout_status','5'=>'firstname','6'=>'payment_date','7'=>'order_processed');
		$order_arr = array('1'=>'ASC','2'=>'DESC');
                //$orderStr = $status ? 'p.checkout_status '.$order_arr[$status].', ':'';
               // $orderStr .= $status ? 'p.order_processed '.$order_arr[$proccessed].', ':'';
                $orderStr .='p.'.$arr[$field].' '.$order_arr[$order];
		$query = Doctrine_Query::create();
		$query = $query->select('p.id,p.payment_method,p.checkout_status,p.created_at,p.order_processed');
                if(!$article_type)
                {
                    $query = $query->from('Purchase p');
                    //$query = $query->where('p.email!="" AND p.firstname!=""');
                 }
                 else
                     {
                     //$query->from('Purchase p JOIN PurchasedItem pi ON pi.purchase_id=p.id JOIN BtShopArticle bsa on bsa.id=pi.product_id and bsa.btshop_type_id='.$article_type);
                    $query->from('Purchase p')
                            ->leftJoin('PurchasedItem pi ')
                            ->leftJoin('BtShopArticle bsa')
                            ->where('pi.purchase_id=p.id')
                            ->andWhere('bsa.id=pi.product_id')
                            ->andWhere('bsa.btshop_type_id='.$article_type);
                }

                if($status)
                    $query = $query->andWhere('p.checkout_status=?',$status-1);
                if($proccessed)
                    $query = $query->andWhere('p.order_processed=?',$proccessed-1);
               
                    if($first_name ){
                        $query = $query->andWhere('p.firstname LIKE "%'.$first_name.'%"');
                    }
                    if($last_name){
                        $query = $query->andWhere('p.lastname LIKE "%'.$last_name.'%"');
                    }
               
                if($ord_no)
                    $query = $query->andWhere('p.id=?',$ord_no);
                 $query->orderBy($orderStr);
            
		return $query;
	}
        /*
	*
	* delete purchase item
	*
	*/
        public function deletePurchaseById($id){
            //delete purchase item
            $result = Doctrine_Query::create()
                                    ->from('PurchasedItem p')
                                    ->where('p.purchase_id=?',$id)
                                    ->execute();
            foreach($result as $record)
                $record->delete();

            //delete subscription
            $result = Doctrine_Query::create()
                                    ->from('Subscription s')
                                    ->where('s.purchase_id=?',$id)
                                    ->execute();
            foreach($result as $record)
                $record->delete();

            $deleteId = Doctrine_Query::create()
                                        ->delete()
                                        ->from('Purchase p')
                                        ->where('p.id =?',$id)
                                        ->execute();
            

        }
        /**
         *
         */
        public function invoiceRecordsForUser($user_id){
            $q = Doctrine_Manager::getInstance()->getCurrentConnection();
            $pdo = $q->execute(" select distinct p.id p_id, bsa.btshop_article_title title,p.created_at p_date from purchase p, purchased_item pi, btshop_article bsa where p.id = pi.purchase_id and bsa.id = pi.product_id and p.order_processed = 0 and p.checkout_status = 0 and p.user_id =".$user_id." group by p.id order by p.id DESC");
            $pdo->setFetchMode(Doctrine_Core::FETCH_ASSOC);
            $result = $pdo->fetchAll();

            return $result;
           /* $query = Doctrine_Query::create()
           // ->from('Purchase');
                ->parseDqlQuery(" select p.id p_id, bsa.btshop_article_subtitle title,p.created_at p_date from Purchase p, PurchasedItem pi, BtShopArticle bsa where p.id = pi.purchase_id and bsa.id = pi.product_id and p.order_processed = 0 and p.user_id =".$user_id);
            return $query;*/
        }

        /**
         * @method getPendingSubscription
         * method will retrieve records for pending subscription user records
         * for subscription alert
         */
        public function getPendingSubscription(){
            //create doctrine query object
            $result =   Doctrine_Query::create()
                        ->select("p.user_id ,s.scheme_name as sname,s.end_date as sdate,b.btshop_article_title as btitle,b.id b_id")
                        ->from("Purchase p")
                        ->leftJoin("p.Subscription s")
                        ->leftJoin("s.BtShopArticle b")
                        ->where('DATEDIFF(DATE_FORMAT(s.end_date,"%Y-%m-%d"),DATE_FORMAT(CURDATE(),"%Y-%m-%d")) < 5')
                        ->andWhere('DATEDIFF(DATE_FORMAT(s.end_date,"%Y-%m-%d"),DATE_FORMAT(CURDATE(),"%Y-%m-%d"))>0')
                        ->execute();
            return $result;
        }
}