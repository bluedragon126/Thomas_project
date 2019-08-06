<?php


class BtShopPriceDetailsTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('BtShopPriceDetails');
    }
}