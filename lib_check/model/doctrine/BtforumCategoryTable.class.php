<?php


class BtforumCategoryTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('BtforumCategory');
    }
	
	/*
	*
	* This function returns all the forum categories.
	*
	*/
	
	public static function getAllForumCategories() 
	{ 
		$forum_cat_arr = array();
		$all_forum_categories_cri = Doctrine_Query::create()
	   					      ->from('BtforumCategory bc')
						      ->orderBy('bc.id ASC');

		$all_forum_categories_data = $all_forum_categories_cri->execute();
		
		foreach($all_forum_categories_data as $forum_cat)	{	$forum_cat_arr[$forum_cat->id] = $forum_cat->btforum_category_name;	}
		
		return $forum_cat_arr;
	}
}