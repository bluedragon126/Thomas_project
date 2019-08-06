<?php


class SbtArticleTypeTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SbtArticleType');
    }
	
	/*
	*
	* This function returns all the article types.
	*
	*/
	
	public function getAllSbtArticleTypes() 
	{ 
		$type_arr = array();
		$all_type_cri = Doctrine_Query::create()
	   					  ->from('SbtArticleType sat')
						  ->orderBy('sat.id ASC');
						  		
		$sbtType = $all_type_cri->execute();
		
		foreach($sbtType as $type)		{	$type_arr[$type->id] = $type->type_name;	}
		
		return $type_arr;
	}

        /**
         * method getSbtArticleTypeName
         * @param  articleTypeId
         * @return string
         */
        public function getSbtArticleTypeName($articleTypeId){
            $category_record = Doctrine_Query::create()
                            ->from('SbtArticleType a')
                            ->where('a.id=?',$articleTypeId)
                            ->fetchOne();
            return $category_record['type_name'];
        }
}