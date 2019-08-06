<div class="shoph3 widthall"><span class="font-bold font-size-13">&nbsp;Coupon List</span> &nbsp;&nbsp;|| &nbsp;&nbsp; <a class="blackcolor" href="/backend.php/borst/sendCouponCode">Send Coupon Code</a>&nbsp;&nbsp;|| &nbsp;&nbsp; <a class="blackcolor" href="/backend.php/borst/sendCouponList">Send Coupon Code List</a>&nbsp;&nbsp;|| &nbsp;&nbsp; <a class="blackcolor" href="/backend.php/borst/usedCouponList">Used Coupon Code List</a></div>
<div id="subscription_update_msg" class="float_left widthall" style="color:#00CC66;"></div>
<div class="listing">
<input type="hidden" id="subscription_list_column_order" name="subscription_list_column_order" value="<?php echo $current_column_order; ?>"/>
<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
<input type="hidden" id="subscription_list_column" name="subscription_list_column" value="<?php echo $cur_column; ?>"/>
<input type="hidden" id="selected_subscription_type" name="selected_subscription_type" value="<?php echo $selected_subscription_type; ?>"/>
</div>
<div class="float_left listing">
<div class="float_left widthall" style="width:913px;">
<?php include_partial('borst/coupon_list_partial', array('pager'=>$pager,'purchase'=>$purchase,'product'=>$product,'subscription_types'=>$subscription_types,'selected_subscription_type'=>$selected_subscription_type,'page'=>$page)) ?>
</div>
</div>
