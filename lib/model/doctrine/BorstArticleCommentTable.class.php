<?php


class BorstArticleCommentTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('BorstArticleComment');
    }
	
   /*
	*
	* This function return all the comments on specific article. 
	*
	*/
	
	public function getCommentsOnArticleQuery($article_id) 
	{
		$comments_on_article_cri = Doctrine_Query::create()
									 ->from('BorstArticleComment bac')
									 ->where('bac.article_id = ? ', $article_id)
									 ->orderBy('bac.created_at ASC');
		
		return $comments_on_article_cri;
	}

        /**
         *method getCommentCountFromId
         * @param <type> $comment_id
         * @return string
         */
        public function getCommentCountFromId($comment_id){
            $result = Doctrine_Query::create()
                                    ->select('count(a.id) as commnet_id')
                                    ->from('BorstArticleComment a')
                                    ->where('a.article_id =?',$comment_id)
                                    ->fetchOne();
            return $result?$result['commnet_id']:'0';
        }
}