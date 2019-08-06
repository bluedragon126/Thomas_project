<?php


class AdsTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Ads');
    }

    public function getAdsQuery(){
        $query = Doctrine_Query::create()
                                ->from('Ads a')
                                ->where('a.is_enabled =?','Y')
                                ->orderBy('a.id DESC');
        return $query;
    }
}