<?php


class ContactEnquiryTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ContactEnquiry');
    }
	
   /*
	*
	* This function returns all Commodities article query by specified order. 
	*
	*/
	public function getAllEnquiriesByOrderQuery($column_id,$order,$ans_type) 
	{ 
		$query = Doctrine_Query::create()
                        //->select('ce.*, cep.reply_date')
                        ->select('cep.*, ce.*, IFNULL(max(cep.reply_date),ce.enq_date) as maxreplydate')
                        //->from('ContactEnquiry ce, ContactEnquiryPost cep WHERE ce.id = cep.enq_id AND cep.id = (select max(z.id) from ContactEnquiryPost z where z.enq_id = ce.id)');
                        ->from('ContactEnquiry ce')
                        ->leftJoin('ce.ContactEnquiryPost cep ON ce.id = cep.enq_id');
                
		$order = trim($order);
		switch($column_id)
		{
			case 'subject': $query = $query->andWhere('ce.is_answered = '.$ans_type)->orderBy('ce.enq_subject '.$order); break;
			case 'enq_type': $query = $query->andWhere('ce.is_answered = '.$ans_type)->orderBy('ce.enq_type '.$order); break;
			case 'firstname': $query = $query->andWhere('ce.is_answered = '.$ans_type)->orderBy('ce.firstname '.$order); break;
			case 'lastname': $query = $query->andWhere('ce.is_answered = '.$ans_type)->orderBy('ce.lastname '.$order); break;
			case 'email': $query = $query->andWhere('ce.is_answered = '.$ans_type)->orderBy('ce.email '.$order); break;
			case 'date': $query = $query->andWhere('ce.is_answered = '.$ans_type)->orderBy('ce.enq_date '.$order); break;
			case 'default': $query = $query->andWhere('ce.is_answered = '.$ans_type)->orderBy('ce.enq_date '.$order); break;
		}
		//if(!$column_id) $query = $query->where('ce.is_answered = 0')->orderBy('ce.enq_date DESC'); 
                if(!$column_id) $query = $query->andWhere('ce.is_answered = 0')->groupBy('ce.id')->orderBy('maxreplydate DESC, ce.enq_date desc');
		return $query;
	}
        
        /*
	*
	* This function returns all the contact enquiry.
	*
	*/
	
	public function getAllNewContactEnquiryPostQuery() 
	{ 
		$all_contact_post = Doctrine_Query::create()
						  ->from('ContactEnquiry ce')
						  ->orderBy('ce.enq_date DESC');
						  		
		return $all_contact_post;
	}
        
        /*
	*
	* This function returns all the contact enquiry which are related to specific id.
	*
	*/
	
	public function getSelctedContactEnquiryTopics($id) 
	{ 
		$selected_category = Doctrine_Query::create()
                                                        ->from('ContactEnquiry ce')
						       ->where('ce.enq_type = ?', $id)
						       ->orderBy('ce.enq_date DESC');
						  		
		return $selected_category;
	}
}