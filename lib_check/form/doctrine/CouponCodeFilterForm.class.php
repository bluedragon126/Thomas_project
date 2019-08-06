<?php
 class CouponCodeFilterForm extends sfFormSymfony
 {
    public function configure()
    {
        $couponcode_lists	= array();
        $couponstatus_lists	= array();
        $this->setWidgets(array(
          'submit_values'	=> new sfWidgetFormInputHidden(),
          'couponcode'		=> new sfWidgetFormSelect(array('choices' => $couponcode_lists)),
          'couponstatus'	=> new sfWidgetFormSelect(array('choices' => $couponstatus_lists))
        ));
        $this->getWidget('couponcode')->setLabel('Coupon Code:');
        $this->getWidget('couponstatus')->setLabel('&nbsp;&nbsp;Coupon Status:');
    }
 }
 

?>