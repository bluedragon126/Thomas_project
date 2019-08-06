<?php


class SbtBlogCommentTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SbtBlogComment');
    }

   /*
	*
	* Returns a query which will fetch all comments on a perticular topic.
	*
	*/
	
	public function fetchBlogCommentsQuery($id) 
	{ 
		$fetch_comment_cri = Doctrine_Query::create()
							->from('SbtBlogComment sbc')
							->where('sbc.blog_id = ?', $id)
							->orderBy('sbc.created_at ASC');

		return $fetch_comment_cri;
	}
	
   /*
	*
	* Returns a query which will fetch all 5 recent comments on a perticular blog.
	*
	*/
	
	public function fetchFiveRecentBlogComments($id) 
	{ 
		$query = Doctrine_Query::create()
							->from('SbtBlogComment sbc')
							->where('sbc.blog_id = ?', $id)
							->orderBy('sbc.created_at DESC')
							->offset(0)
						    ->limit(4);	

		$data = $query->execute();
		return $data;
	}
}