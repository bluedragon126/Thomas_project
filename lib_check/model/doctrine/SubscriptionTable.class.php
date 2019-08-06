<?php

class SubscriptionTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('Subscription');
    }

    public static function getValidChartSubscriptionsByUser($user_id) {
        $conn = sfContext::getInstance()->getDatabaseManager()->getDatabase('doctrine')->getDoctrineConnection();

        $sql = "SELECT chart_type_name FROM subscription s inner join purchase p on s.purchase_id = p.id inner join btchart_type t on s.btchart_type_id = t.id  where p.checkout_status =1 and  p.user_id = $user_id and `end_date` >=now() and `product_type_id` = 7 group by btchart_type_id";
        
        $result = $conn->fetchAll($sql);

        $arr = array();
        foreach($result as $data){
            $arr[] = $data['chart_type_name'];
        }
        return $arr;
    }

}