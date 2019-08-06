<?php


class ArticleCountTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ArticleCount');
    }
	
	/*
	*
	* This function returns all the article status.
	*
	*/
	
	public function getAllBorstArticleCount($art_ids) 
	{ 
	    if($art_ids) {
    		$all_count_cri = Doctrine_Query::create()
    	   					->from('ArticleCount ac')
                            ->whereIn('ac.art_id', $art_ids)
                            //->where('ac.art_id between 1 AND 75')
                            ->orderBy('ac.art_id ASC');
		    $borstArtCount = $all_count_cri->execute();
            return $borstArtCount;
        }
        return;
	}
}