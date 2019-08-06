<?php


class SbtMessagesTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SbtMessages');
    }
	
	/*
	*
	* Returns no. of messages to a user.
	*
	*/
	
	public function message_count($id) 
	{ 
		$query = Doctrine_Query::create()
							->from('SbtMessages sm')
							->where('sm.message_to = ?', $id);

    	$rec = $query->execute();
		return count($rec);
	}
	
	/*
	*
	* Returns all messages to a user.
	*
	*/
	
	public function all_messages_query($id) 
	{ 
		$query = Doctrine_Query::create()
							->from('SbtMessages sm')
							->where('sm.message_to = ?', $id)
							->orderBy('sm.created_at ASC');
		return $query;
	}
	
	/*
	*
	* Returns last message to a perticular user.
	*
	*/
	
	public function getLastPostedMessage($id) 
	{ 
		$query = Doctrine_Query::create()
							->from('SbtMessages sm')
							->where('sm.message_to = ?', $id)
							->orderBy('sm.created_at DESC');

		$data = $query->fetchOne();
		return $data;
	}
}