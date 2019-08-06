<?php


class ArticleStatusTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ArticleStatus');
    }
	
	/*
	*
	* This function returns all the article status.
	*
	*/
	
	public function getAllBorstArticleStatus() 
	{ 
		$all_status_cri = Doctrine_Query::create()
	   					->from('ArticleStatus as')
						->orderBy('as.art_status ASC');
		
		$borstStatus = $all_status_cri->execute();
		return $borstStatus;
	}
}