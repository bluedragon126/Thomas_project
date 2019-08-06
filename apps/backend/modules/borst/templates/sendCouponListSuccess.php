<style type="text/css">
#subscription_other_links a {color:#114993;}
#subscriber_list_table a.edit_icon{background: rgba(0, 0, 0, 0) url("/images/edit.png") no-repeat scroll 0 0; padding-left: 20px; font-size: 14px;}
#subscriber_list_table a.delete_icon{background: rgba(0, 0, 0, 0) url("/images/delete.png") no-repeat scroll 0 0; padding-left: 20px; font-size: 14px;}
.listing a.new_icon{background: rgba(0, 0, 0, 0) url("/images/new.png") no-repeat scroll 0 0; padding-left: 20px; font-size: 14px;}
.sort_dsc{background: rgba(0, 0, 0, 0) url("/images/desc.gif") no-repeat scroll 0 0; height: 10px; padding-left: 20px; cursor:pointer;}
.sort_asc{background: rgba(0, 0, 0, 0) url("/images/asc.gif") no-repeat scroll 0 0; height: 10px; padding-left: 20px; cursor:pointer;}
.sort{background: rgba(0, 0, 0, 0) url("/images/bg.gif") no-repeat scroll 0 0; height: 10px; padding-left: 20px; cursor:pointer;}
.listing table th{cursor:pointer;}
</style>
<div class="maincontentpage">
  <div class="forumlistingleftdiv">
   <div class="forumlistingleftdivinner" style="width:915px;">
   
	<div id="subscription_other_links" class="widthall" style="width:900px; margin-bottom:20px;">
		
	</div>
    <div class="subscriptionlistingleftdivinner">
    
      </div>      
      <div id="search_msg" style="color: red;"></div>
	<div id="subscription_outer" class="forumlistingleftdivinner" style="width:915px; border:0px solid red; font-size:11px;">
            <div class="shoph3 widthall"><a class="blackcolor" href="/backend.php/borst/addUpdateCoupon">&nbsp;+&nbsp;Create Coupon </a>&nbsp;&nbsp;|| &nbsp;&nbsp;<a class="blackcolor" href="/backend.php/borst/couponList">Coupon List</a>&nbsp;&nbsp;|| &nbsp;&nbsp; <a class="blackcolor" href="/backend.php/borst/sendCouponCode">Match Coupon Code</a>&nbsp;&nbsp;|| &nbsp;&nbsp;<span class="font-bold font-size-13"><a class="blackcolor" href="/backend.php/borst/sendCouponList">Matched Coupons</a></span>&nbsp;&nbsp;|| &nbsp;&nbsp; <a class="blackcolor" href="/backend.php/borst/usedCouponList">Used Coupons</a></div>
      
	  <div id="subscription_update_msg" class="float_left widthall" style="color:#00CC66;"></div>
	  <div class="listing">
	  	<input type="hidden" id="subscription_list_column_order" name="subscription_list_column_order" value="<?php echo $current_column_order; ?>"/>
		<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
		<input type="hidden" id="subscription_list_column" name="subscription_list_column" value="<?php echo $cur_column; ?>"/>
        <input type="hidden" id="selected_subscription_type" name="selected_subscription_type" value="<?php echo $selected_subscription_type; ?>"/>
        <input type="hidden" name="is_archive" id="is_archive" value="true"/>
	  </div>
      <div class="float_left listing">
        <div class="float_left widthall" style="width:913px;" id="renderPart">
            <?php include_partial('borst/send_coupon_list_partial', array('filterform'   => $filterform,  'moduleurl' => $moduleurl, 'ResFinal' => $ResFinal, 'queryString' => $queryString, 'sortOrder' => $sortOrder, 'sortBy' => $sortBy, 'sort_message' => $sort_message, 'NumPage' => $NumPage, 'Rtotal' => $Rtotal, 'PageLimit' => $PageLimit, 'Cpage' => $Cpage)) ?>
        </div>
      </div>
	  
	  
    </div>
  </div>
  </div>
</div>
<input type="hidden" name="coupon_list_url" id="coupon_list_url" value="sendCouponList"/>
<!-- ui-dialog-update-article -->
<div id="updateCoupondetail_list_confirm_box" title="Coupon List Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="subscription_list_msg">Message:</td>
	</tr>
 </table>
</div>

<div id="delete_send_code_confirm_box" title="Delete Code Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="unarchive_sbt_ad_msg">Message:</td>
	</tr>
 </table>
</div>