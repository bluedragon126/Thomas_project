<?php

/**
 * ContactEnquiryPost
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ContactEnquiryPost extends BaseContactEnquiryPost
{
   /*
	*
	* This function fetches record.
	*
	*/
	public function fetchEnquiryReplyQuery($id)
	{ 
		$query = Doctrine_Query::create()
	   		   ->from('ContactEnquiryPost cep')
			   ->where('cep.enq_id = ?', $id)
			   ->orderBy('cep.reply_date ASC');

//		$data = $query->execute();
		return $query;
	}
	
   /*
	*
	* This function fetches record.
	*
	*/
	public function fetchPerticularPost($id)
	{ 
		$query = Doctrine_Query::create()
	   		   ->from('ContactEnquiryPost cep')
			   ->where('cep.id = ?', $id);

		$data = $query->fetchOne();
		return $data;
	}
	
   /*
	*
	* This function deletes a record.
	*
	*/
	public function deleteEnquiryReplyPost($id)
	{ 
		$query = Doctrine_Query::create()
	   		   ->from('ContactEnquiryPost cep')
			   ->where('cep.id = ?', $id);
        $data = $query->execute();
		
		if($data) $data->delete();
	}
	
   /*
	*
	* This function return a perticular enquiry post.
	*
	*/
	public function getSelectedEnquiryPost($id)
	{ 
		$query = Doctrine_Query::create()
	   		   ->from('ContactEnquiryPost cep')
			   ->where('cep.id = ?', $id);
			   
		$data = $query->fetchOne();

		$desc = $data ? $data->reply_text :  '';
		return $desc;
	}
	
   /*
	*
	* This function saves a new reply to an enquiry.
	*
	*/
	public function savePostData($data)
	{
		$this->title = $data['title'];
		$this->reply_text = $data['reply_text'];
		$this->enq_id = $data['enq_id'];
		$this->author_name = $data['author_name'];
		$this->post_id = $data['post_id'];
		$this->reply_date = date("Y-m-d H:i:s");
                $isSuperAdmin = sfContext::getInstance()->getUser()->getAttribute('isSuperAdmin', '', 'userProperty');
                    if($isSuperAdmin){
                       $this->admin_or_user = 1;
                    }else{
                        $this->admin_or_user = 0;
                    }
                
		$this->save();
	}
	
   /*
	*
	* This function saves the reply post.
	*
	*/
	public function saveReplyData($arr,$reply_data)
	{ 
		if($arr['postid']!="")
		{
			$id = trim(str_replace('editpost','',$arr['postid'])); 
			$selected_data = $this->fetchPerticularPost($id);
			if($selected_data)
			{
				$selected_data->reply_text = $reply_data['reply_text'];
				$selected_data->save();
			}
		}
		else
		{
			$query = Doctrine_Query::create()->from('ContactEnquiryPost cep');
			$query = $query->where('cep.enq_id = ?', $reply_data['enq_id']);
			$query = $query->orderBy('cep.reply_date DESC');
			$data = $query->fetchOne();
			
			if($data)  $id = $data->id;
			else $id = 0;
			
			$arr['title'] = '';
			$arr['reply_text'] = $reply_data['reply_text'];
			$arr['enq_id'] = $reply_data['enq_id'];
			$arr['author_name'] = $reply_data['author_name'];                        
			$arr['post_id'] = $id;
			
			$new_entry = new ContactEnquiryPost();
			$new_entry->savePostData($arr);
				
			$contact_enquiry = new ContactEnquiry();
			$existing_rec = $contact_enquiry->fetchEnquiryRec($reply_data['enq_id']);
				
			if($existing_rec)
			{
				if(!$arr['reply_from_user'])
				{
					//$comm_id = mt_rand(11111111,99999999);
                                        $comm_id = uniqid(md5(microtime()),false);
					$existing_rec->comm_id = $comm_id;
					$existing_rec->is_answered = 1;
					$existing_rec->save();
						
					sfContext::getInstance()->getUser()->setAttribute('udata', $existing_rec, 'userProperty');
					sfContext::getInstance()->getUser()->setAttribute('comm_id', $comm_id, 'userProperty');
				}
				else
				{
					$existing_rec->is_answered = 0;
					$existing_rec->save();
				}
			}	
			
		}
	}
	
   /*
	*
	* This function fecthes a perticular enquiry.
	*
	*/
	public function fetchEnquiryReplyPost($enq_id)
	{ 
		$query = Doctrine_Query::create()
	   		   ->from('ContactEnquiryPost cep')
			   ->where('cep.enq_id = ?', $enq_id);
			   
        $data = $query->execute();
		return $data;
	}
	
}