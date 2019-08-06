<?php


class AuthorsTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Authors');
    }

    public function getAuthorByUserIds(){
        $result=Doctrine_Query::create()
	->from('Authors a')
	->execute();
        return $result;
    }
    public function getAuthorByUserId($user_id){
        $result=Doctrine_Query::create()
	->from('Authors a')
        ->where('a.user_id =?',$user_id)
	->fetchOne();
        return $result;
    }
    public function getAuthorArray(){
        $result = $this->getAuthorByUserIds();
        $record = array();
        foreach($result as $values)
            $record[$values['user_id']] = $values['name'];
        return $record;
    }
}