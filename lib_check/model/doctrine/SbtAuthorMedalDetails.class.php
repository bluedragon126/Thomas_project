<?php

/**
 * SbtAuthorMedalDetails
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class SbtAuthorMedalDetails extends BaseSbtAuthorMedalDetails
{
   /*
	*
	* This function returns no. of awards received by a user.
	*
	*/
	
	public function getUserAwardCount($user_id) 
	{ 
		$query = Doctrine_Query::create()
	   		   ->from('SbtAuthorMedalDetails samd')
			   ->where('samd.author_id  = ?', $user_id);

		$data = $query->execute();
		return count($data);
	}
	
   /*
	*
	* This function returns no. of awards received by a user of a perticular type.
	*
	*/
	
	public function getUserAwardTypeCount($user_id,$type_id) 
	{ 
		$query = Doctrine_Query::create()
	   		   ->from('SbtAuthorMedalDetails samd')
			   ->where('samd.author_id  = ? AND samd.author_medal_type_id  = ?', array($user_id,$type_id));

		$data = $query->execute();
		return count($data);
	}
}