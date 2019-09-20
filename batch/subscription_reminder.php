<?php
/* Cron Job */
/* Run every second */
echo '\n Batch Name: SUBSCRIPTION REMINDER SCRIPT ';
//echo '\n Date Run: '.date('d-M-Y H:i:s');
echo '\n\n Results: \n\n';
require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');
$configuration = ProjectConfiguration::getApplicationConfiguration('backend', 'prod', true);
 // Remove the following lines if you don't use the database layer
$databaseManager	= new sfDatabaseManager($configuration);
sfContext::createInstance($configuration);
    ignore_user_abort(true);
    set_time_limit(0);
    ini_set('memory_limit', '-1');
        
    $purchase = new Purchase();
    $product = new BtShopArticle();
    $subscription = new Subscription();
    $subscription_reminder = new SubscriptionReminder();
    $query_new = Doctrine_Query::create()->from('Subscription s')
                    ->leftJoin('s.Purchase p')
                    ->addWhere('p.checkout_status = 1')
                    ->addWhere('p.order_processed = 1')
                    ->orderBy('s.id DESC')->execute();

    $currentDate = date('Y-m-d');
    //$currentDate = '2018-03-14';//date('Y-m-d');
    if ($query_new) {
        foreach ($query_new as $data) {

            $end_date = $data->getDateTimeObject('end_date')->format('Y-m-d');
            $date1 = strtotime($currentDate);
            $date2 = strtotime($end_date);
            $seven_days_before_date = date('Y-m-d', strtotime('-7 days', strtotime($end_date)));
            $one_days_before_date = date('Y-m-d', strtotime('-1 days', strtotime($end_date)));
            $dateDiff = $date2 - $date1;
            $Days = floor($dateDiff / (60 * 60 * 24));

            if (($currentDate == $seven_days_before_date) || ($currentDate == $one_days_before_date)) {
                $product_id = $data->getProductId();
                $email = $data->Purchase->getEmail();
                $query_sub = Doctrine_Query::create()->from('Subscription s')
                        ->leftJoin('s.Purchase p')
                        ->where('s.product_id = ?', $product_id)
                        ->addWhere('p.email = ?', $email)
                        ->orderBy('s.id DESC')
                        ->limit(1)
                        ->execute();

                foreach ($query_sub as $data_sub) {

                    $end_date2 = $data_sub->getEndDate();
                    $date11 = strtotime($end_date);
                    $date22 = strtotime($end_date2);

                    if ($date22 > $date11) {
                        if ($data_sub->Purchase->getCheckoutStatus() == 0 && $data_sub->Purchase->getOrderProcessed() == 0) {
                            //echo "date is more payement Not done SEND EMAIL";
                            $pur = $purchase->getPurchaseOrder($data_sub->purchase_id);
                            $product_arr = $product->getProductName($data_sub->product_id, $data_sub->btchart_type_id);
                            $subName = $product_arr[0]['title'];
                            $url = 'https://https://www.thetradingaspirants.com/borst_shopshopProductDetail/product_id/' . $data_sub->product_id;
                            $subscription_reminder->sendSubEmail($pur->firstname, $pur->lastname, $subName, $data_sub->end_date, $pur->email, $url);
                        }
                        if ($data_sub->Purchase->getCheckoutStatus() == 1 && $data_sub->Purchase->getOrderProcessed() == 1) {
                            //echo "date is more payement done No EMAIL";
                        }
                    } else {
                        if ($date11 == $date22) {
                            //echo "SEND EMAIL EXPIRED";
                            $pur = $purchase->getPurchaseOrder($data_sub->purchase_id);
                            $product_arr = $product->getProductName($data_sub->product_id, $data_sub->btchart_type_id);
                            $subName = $product_arr[0]['title'];
                            $url = 'https://https://www.thetradingaspirants.com/borst_shopshopProductDetail/product_id/' . $data_sub->product_id;
                            $subscription_reminder->sendSubEmail($pur->firstname, $pur->lastname, $subName, $data_sub->end_date, $pur->email, $url);
                        }
                    }
                }
            }
        }
    }
?>