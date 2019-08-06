<?php


class BtforumSubcategoryTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('BtforumSubcategory');
    }
}