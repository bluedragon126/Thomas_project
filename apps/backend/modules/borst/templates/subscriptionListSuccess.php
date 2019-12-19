<style type="text/css">
#subscription_other_links a {color:#114993;}
</style>
<script>
//$(document).ready(function(){
 
 //});
</script>
<div class="maincontentpage">
  <div class="forumlistingleftdiv">
   <div class="forumlistingleftdivinner" style="width:915px;">
   
	<div id="subscription_other_links" class="widthall" style="width:900px; margin-bottom:20px;">
		<a style="font-weight:bold;" href="<?php echo 'http://'.$host_str.'/backend.php/borst/subscriptionList' ?>">Subscription List</a>&nbsp;&nbsp;
		<a href="<?php echo 'http://'.$host_str.'/backend.php/borst/sendSubscription' ?>">Send Subscription</a>&nbsp;&nbsp;
                <?php /*<a href="<?php echo 'http://'.$host_str.'/backend.php/borst/commaSeperatedList' ?>">Lista komma-separerad</a>&nbsp;&nbsp; */ ?>
		<a href="<?php echo 'http://'.$host_str.'/backend.php/borst/filteredSubscriberList' ?>">Lista semicolon-separerad</a>&nbsp;&nbsp;
                <a href="<?php echo 'http://'.$host_str.'/backend.php/reminderSubscription' ?>">Subscription Reminder List</a>&nbsp;&nbsp;
                
	</div>
    <div class="subscriptionlistingleftdivinner">
     
    <form id="search_subscriptionlist_form" class="backend_search_section_1" name="search_purchaseorder_form" method="">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        
                        <td><b>Order No:</b></td>
                        <td><input type="text" name="order_number_txt" class="width_60" id="ono"></td>
                        <td><b>First Name:</b></td>
                        <td><input type="text" name="first_name_txt" class="width_80 required" id="fname"></td>
                        <td><b>Last Name:</b></td>
                        <td><input type="text" name="last_name_txt" class="width_80 required" id="lname"></td>
                        <td class="float_right"><input type="button"  name="submit" value="Search" id="search_subcription"></td>
                       
                    </tr>
                </table>
            </form>
      </div>      
      <div id="search_msg" style="color: red;"></div>
	<div id="subscription_outer" class="forumlistingleftdivinner" style="width:915px; border:0px solid red; font-size:11px;">
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
        <?php include_partial('borst/subscription_list_partial', array('purchasedItem' => $purchasedItem,'pager'=>$pager,'purchase'=>$purchase,'product'=>$product,'subscription_types'=>$subscription_types, 'couponCode' => $couponCode)) ?>
        </div>
      </div>
	  
	  
    </div>
  </div>
  </div>
</div>
<!-- ui-dialog-update-article -->
<div id="updatesubscriptionlist_confirm_box" title="Subscriptione List Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="subscription_list_msg">Message:</td>
	</tr>
 </table>
</div>

<div id="sendemail_updatesubscriptionlist_confirm_box" title="Email Send To Subscription List Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="send_subscription_list_msg">Message:</td>
	</tr>
 </table>
</div>