<?php

/**
 * Purchase
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Purchase extends BasePurchase
{
   /*
	*
	* This function a record.
	*
	*/
	public function getPurchaseOrder($id)
	{
		$query = Doctrine_Query::create()->from('Purchase p')->where('p.id = ?', $id);
		$data = $query->fetchOne(); 
		return $data;
	}
	
   /*
	*
	* This function a record.
	*
	*/
	public function getPurchaseOrderOfUser($user_id)
	{
		$arr = array();
		$query = Doctrine_Query::create()->select('p.id as purchase_id')->from('Purchase p')->where('p.user_id = ?', $user_id);
		$data = $query->fetchArray(); 
		
		for($i = 0; $i < count($data); $i++)
		{
			$arr[$i] = $data[$i]['purchase_id'];
		}
		
		return $arr;
	}

   /*
	*
	* This function makes payment entries.
	*
	*/
	public function addPaymentEntry($arr)
	{
		$purchase = new Purchase();
		$purchase->user_id = $arr['user_id'] == '' ?  0 : $arr['user_id'];
		$purchase->email = $arr['user_email'];
		$purchase->firstname = $arr['user_firstname'];
		$purchase->lastname = $arr['user_lastname'];
		$purchase->street = $arr['user_street'];
		$purchase->zipcode = $arr['user_zipcode'];
		$purchase->city = $arr['user_city'];
		$purchase->telephone = $arr['user_telephone'];
		$purchase->country = $arr['user_country'];
		$purchase->total_price = $arr['total_price'];
		$purchase->payment_method = '';
		$purchase->transaction_id = 0;
		$purchase->response_code = '';
		$purchase->checkout_status = 0;
		$purchase->order_processed = 0;
		$purchase->created_at = date('Y-m-d H:i:s');
		$purchase->save(); 
		return $purchase->id;
	}
	
   /*
	*
	* Update purchase record.
	*
	*/
	public function updatePurchaseRecord($arr)
	{
		if($arr['id']){
			$query = Doctrine_Query::create()->update('Purchase p');
			
			if($arr['transaction_id']) $query = $query->set('p.transaction_id', '?', $arr['transaction_id']);
			if($arr['response_code']) $query = $query->set('p.response_code', '?', $arr['response_code']);
			if($arr['checkout_status']) $query = $query->set('p.checkout_status', '?', $arr['checkout_status']);
			if($arr['payment_date']) $query = $query->set('p.payment_date', '?', $arr['payment_date']);
			if($arr['order_processed']) $query = $query->set('p.order_processed', '?', $arr['order_processed']);
			if($arr['created_at']) $query = $query->set('p.created_at', '?', $arr['created_at']);
                        
			$query = $query->where('p.id = ?', $arr['id']);
			$query->execute();
		}
	}
	
   /*
	*
	* This function a getSubscriberslist.
	*
	*/
	/*public function getSubscriberListByOrderQuery($column_id,$order)
	{ 
		$query = Doctrine_Query::create()->from('Purchase p');
		
		switch($column_id)
		{
			case 'title':  $query = $query->orderBy('sup.from_sbt '.$order); break;
			case 'regdate':  $query = $query->orderBy('sup.regdate '.$order); break;
			case 'author':  $query = $query->orderBy('concat(sup.firstname," ",sup.lastname) '.$order); break;
			                
			
			case 'vote':  $query = $query->innerJoin('sup.sfGuardUser sfUser'); 
			               $query = $query->leftJoin('sfUser.SbtAnalysis sbtAnalysis'); 
						   $query = $query->leftJoin('sbtAnalysis.SbtVoteDetails sbtVote');
						   $query = $query->groupBy('sfUser.id');
						   $query = $query->orderBy('count(sbtVote.article_id) '.$order);
						   break;

			case 'message':  $query = $query->leftJoin('sup.SbtMessages supMess'); 
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
	}*/
    public function getSuccessFullPurchaseOrderOfUser($user_id)
	{
		$arr = array();
		$query = Doctrine_Query::create()->select('p.id as purchase_id')->from('Purchase p')->where('p.user_id = ?', $user_id)->andWhere('p.checkout_status = 1');
		$data = $query->fetchArray(); 
		
		for($i = 0; $i < count($data); $i++)
		{
			$arr[$i] = $data[$i]['purchase_id'];
		}
		
		return $arr;
	}

       



	/*
	*
	* This function saves purchase information.
	*
	*/
	public function setSelectedPurchaseOrder($payment_date,$payment_status,$order_processed)
	{ 
		$this->payment_date = $payment_date;
		$this->checkout_status = $payment_status;
		$this->order_processed = $order_processed;
		$this->save();
	}
	
   /*
	*
	* Set payment status
	*
	*/
	public function getPaymentStatus($id)
	{
		$query = Doctrine_Query::create()->select('p.checkout_status')->from('Purchase p')->where('p.id = ?', $id);
		$data = $query->fetchOne(); 
		return $data->checkout_status;
	}

        
}