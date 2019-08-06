<?php


class SbtArticleCategoryTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SbtArticleCategory');
    }
	
	/*
	*
	* This function returns all the article categories.
	*
	*/
	
	public function getAllSbtArticleCategories() 
	{ 
		$cat_arr = array();
		$all_category_cri = Doctrine_Query::create()->from('SbtArticleCategory sac')->orderBy('sac.id ASC');
		$sbtCategory = $all_category_cri->execute();
		
		foreach($sbtCategory as $cat)		{	$cat_arr[$cat->id] = $cat->sbt_category_name;		}
		
		return $cat_arr;
	}

        /**
         * method getSbtArticleCategoryName
         * @param  articleTypeId
         * @return string
         */
        public function getSbtArticleCategoryName($articleCategoryId){
            $category_record = Doctrine_Query::create()
                            ->from('SbtArticleCategory a')
                            ->where('a.id=?',$articleCategoryId)
                            ->fetchOne();
            return $category_record['sbt_category_name'];
        }
}