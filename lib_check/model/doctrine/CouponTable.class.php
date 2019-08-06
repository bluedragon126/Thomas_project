<?php


class CouponTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Coupon');
    }
    
    public function getUniqueCodeDesc($values) {

        $codeQuery = Doctrine_Query::create()
                ->select('a.*')
                ->from('Coupon a')
                ->andWhere('a.code_desc = ?', $values['code_desc']);

        return $codeQuery->fetchArray();
    }
}