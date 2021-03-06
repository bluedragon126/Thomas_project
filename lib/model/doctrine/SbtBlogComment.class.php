<?php

/**
 * SbtBlogComment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sisterbt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class SbtBlogComment extends BaseSbtBlogComment
{
   /*
	*
	* Returns count of no. of comments on a perticular topic.
	*
	*/
	
	public function getBlogCommentsCount($id) 
	{ 
		$fetch_comment_cri = Doctrine_Query::create()
							->from('SbtBlogComment sbc')
							->where('sbc.blog_id = ?', $id);

		$comment_data = $fetch_comment_cri->execute();
		
		if($comment_data)
			return count($comment_data);
		else
			return 0;
	}
	
   /*
	*
	* Returns a query which will fetch all comments on a perticular topic.
	*
	*/
	public function fetchPerticularBlogCommentsPager($id)  
	{ 
		$mymarket = new mymarket();
		
		$query = Doctrine_Query::create()
							->from('SbtBlogComment sbc')
							->where('sbc.blog_id = ?', $id)
							->orderBy('sbc.created_at ASC');

		$pager = $mymarket->getPagerForAll('SbtBlogComment','10',$query,1);
		return $pager;
	}
	
   /*
	*
	* This function deletes all the comments on a perticular blog.
	*
	*/
	public function deleteBlogComments($blog_id) 
	{ 
		$query = Doctrine_Query::create()
			   ->from('SbtBlogComment sbc')
			   ->where('sbc.blog_id = ?',$blog_id);
			   
		$data = $query->execute(); 
		
		foreach($data as $rec)
		{
			$rec->delete();
		}
	}

}