<div class="shoph3 widthall">Subscription List</div>
<div id="subscription_update_msg" class="float_left widthall" style="color:#00CC66;"></div>
<div class="listing">
<input type="hidden" id="subscription_list_column_order" name="subscription_list_column_order" value="<?php echo $current_column_order; ?>"/>
<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
<input type="hidden" id="subscription_list_column" name="subscription_list_column" value="<?php echo $cur_column; ?>"/>
<input type="hidden" id="selected_subscription_type" name="selected_subscription_type" value="<?php echo $selected_subscription_type; ?>"/>
</div>
<div class="float_left listing">
<div class="float_left widthall" style="width:913px;">
<?php include_partial('borst/subscription_list_partial', array('purchasedItem' => $purchasedItem, 'pager'=>$pager,'purchase'=>$purchase,'product'=>$product,'subscription_types'=>$subscription_types,'selected_subscription_type'=>$selected_subscription_type,'page'=>$page,'couponCode'=>$couponCode,'selected_coupon_code'=>$selected_coupon_code)) ?>
</div>
</div>
