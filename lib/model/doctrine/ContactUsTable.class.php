<?php


class ContactUsTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ContactUs');
    }

    public function findByCode($code){
        $result = Doctrine_Query::create()
                                ->from('ContactUs c')
                                ->where('c.code =?',$code)
                                ->fetchOne();
        return $result;
    }
}