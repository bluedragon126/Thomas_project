<?php


class ArticleCategoryTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ArticleCategory');
    }
	
	/*
	*
	* This function returns all the article categories.
	*
	*/
	
	public function getAllBorstArticleCategories() 
	{ 
		$all_category_cri = Doctrine_Query::create()
	   					  ->from('ArticleCategory ac')
						  ->orderBy('ac.category_id ASC');
		
		$borstCategory = $all_category_cri->execute();
		return $borstCategory;
	}

        /**
         * method getArticleCategoryName
         * @param  articleTypeId
         * @return string
         */
        public function getArticleCategoryName($articleCategoryId){
            $category_record = Doctrine_Query::create()
                            ->from('ArticleCategory a')
                            ->where('a.category_id=?',$articleCategoryId)
                            ->fetchOne();
            return $category_record['category_name'];
        }
}