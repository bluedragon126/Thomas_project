<?php


class ArticleTypeTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ArticleType');
    }
	
	/*
	*
	* This function returns all the article types.
	*
	*/
	
	public function getAllBorstArticleTypes() 
	{ 
		$all_type_cri = Doctrine_Query::create()
	   					  ->from('ArticleType bat')
						  ->orderBy('bat.type_id ASC');
						  		
		$borstType = $all_type_cri->execute();
		return $borstType;
	}

         /**
         * method getArticleTypeName
         * @param  articleTypeId
         * @return string
         */
        public function getArticleTypeName($articleTypeId){
            $category_record = Doctrine_Query::create()
                            ->from('ArticleType a')
                            ->where('a.type_id=?',$articleTypeId)
                            ->fetchOne();
            return $category_record['type_name'];
        }
}