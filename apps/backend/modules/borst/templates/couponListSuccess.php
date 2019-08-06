<style type="text/css">
#subscription_other_links a {color:#114993;}
#subscriber_list_table a.edit_icon{background: rgba(0, 0, 0, 0) url("/images/edit.png") no-repeat scroll 0 0; padding-left: 20px; font-size: 14px;}
#subscriber_list_table a.delete_icon{background: rgba(0, 0, 0, 0) url("/images/delete.png") no-repeat scroll 0 0; padding-left: 20px; font-size: 14px;}
.listing a.new_icon{background: rgba(0, 0, 0, 0) url("/images/new.png") no-repeat scroll 0 0; padding-left: 20px; font-size: 14px;}
</style>
<script>
//$(document).ready(function(){
 
 //});
</script>
<div class="maincontentpage">
  <div class="forumlistingleftdiv">
   <div class="forumlistingleftdivinner" style="width:915px;">
   
	<div id="subscription_other_links" class="widthall" style="width:900px; margin-bottom:20px;">
		
	</div>
    <div class="subscriptionlistingleftdivinner">
    
      </div>      
      <div id="search_msg" style="color: red;"></div>
	<div id="subscription_outer" class="forumlistingleftdivinner" style="width:915px; border:0px solid red; font-size:11px;">
            <div class="shoph3 widthall"><a class="blackcolor" href="/backend.php/borst/addUpdateCoupon">&nbsp;+&nbsp;Create Coupon </a>&nbsp;&nbsp;|| &nbsp;&nbsp; <span class="font-bold font-size-13"><a class="blackcolor" href="/backend.php/borst/couponList">Coupon List</a></span>&nbsp;&nbsp;|| &nbsp;&nbsp; <a class="blackcolor" href="/backend.php/borst/sendCouponCode">Match Coupon Code</a>&nbsp;&nbsp;|| &nbsp;&nbsp; <a class="blackcolor" href="/backend.php/borst/sendCouponList">Matched Coupons</a>&nbsp;&nbsp;|| &nbsp;&nbsp; <a class="blackcolor" href="/backend.php/borst/usedCouponList">Used Coupons</a></div>
      
	  <div id="subscription_update_msg" class="float_left widthall" style="color:#00CC66;"></div>
	  <div class="listing">
	  	<input type="hidden" id="subscription_list_column_order" name="subscription_list_column_order" value="<?php echo $current_column_order; ?>"/>
		<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
		<input type="hidden" id="subscription_list_column" name="subscription_list_column" value="<?php echo $cur_column; ?>"/>
        <input type="hidden" id="selected_subscription_type" name="selected_subscription_type" value="<?php echo $selected_subscription_type; ?>"/>
	  </div>
      <div class="float_left listing">
        <div class="float_left widthall" style="width:913px;">
        <?php include_partial('borst/coupon_list_partial', array('pager'=>$pager,'purchase'=>$purchase,'product'=>$product,'subscription_types'=>$subscription_types)) ?>
        </div>
      </div>
	  
	  
    </div>
  </div>
  </div>
</div>
<!-- ui-dialog-update-article -->
<div id="updateCouponCodeData_list_confirm_box" title="Coupon List Confirmation">
 <table width="85%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="subscription_list_msgs">Message:</td>
	</tr>
 </table>
</div>
<div id="updatesubscriptionlist_confirm_box" title="Subscriptione List Confirmation">
 <table width="85%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="subscription_list_msg">Message:</td>
	</tr>
 </table>
</div>
<div id="delete_code_confirm_box" title="Delete Code Confirmation">
 <table width="85%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="unarchive_sbt_ad_msg">Message:</td>
	</tr>
 </table>
</div>
<div style="float:right; width:300px; margin:20px 10px 0 0">
  <strong>Coupon Code management:</strong><br />
1. Create a coupon and make Status = active. <br>
2. Match coupon with product. Optional: add<br />
email address for single user coupon.<br />
3. View matched coupons in matched<br />
coupons list. Status = Pending.<br />
4. When user has used a coupon it becomes<br />
&quot;used&quot; (Status = In process).<br />
Admin can change coupon status back to<br />
pending if purchase goes wrong.<br />
5. When purchase is completed the Status<br />
changes to &quot;Completed&quot;.
</div>
