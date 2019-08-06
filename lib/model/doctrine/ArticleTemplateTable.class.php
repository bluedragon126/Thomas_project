<?php


class ArticleTemplateTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ArticleTemplate');
    }
	
   /*
	*
	* This function returns all the templates.
	*
	*/
	
	public function getAllTemplates() 
	{ 
		$query = Doctrine_Query::create()->from('ArticleTemplate at');
		$all_templates = $query->execute();
		
		return $all_templates;
	}

        public function  findByTemplateId($id){
            $result= Doctrine_Query::create()->from('ArticleTemplate a')
                                            ->where('a.template_id =?',$id)
                                            ->fetchOne();
            return $result;
        }
}