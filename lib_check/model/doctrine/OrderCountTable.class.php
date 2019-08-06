<?php


class OrderCountTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('OrderCount');
    }

    public function findByAction($action){

        $result = Doctrine_Query::create()
                                ->from('OrderCount a')
                                ->where('a.action =?',$action)
                                ->fetchOne();
        return $result;
    }
}