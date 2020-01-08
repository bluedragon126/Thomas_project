<style type="text/css">
.listing table td{ border:0px;}
.listing table#remind_table2 th{ background-color:#99CCFF;}
.listing table td{ font-weight:normal;}
#subscription_other_links a {color:#114993;}
</style>
<div class="maincontentpage">
  <div class="forumlistingleftdiv" style="min-height: 335px;">
   <div class="forumlistingleftdivinner" style="width:915px;">
   
	<div id="subscription_other_links" class="float_left widthall" style="width:900px; margin-bottom:20px;">
		<a href="<?php echo 'https://'.$host_str.'/backend.php/borst/subscriptionList' ?>">Subscription List</a>&nbsp;&nbsp;
		<a href="<?php echo 'https://'.$host_str.'/backend.php/borst/sendSubscription' ?>">Send Subscription</a>&nbsp;&nbsp;
                <?php /*<a href="<?php echo 'https://'.$host_str.'/backend.php/borst/commaSeperatedList' ?>">Lista komma-separerad</a>&nbsp;&nbsp; */ ?>
		<a style="font-weight:bold;" href="<?php echo 'https://'.$host_str.'/backend.php/borst/filteredSubscriberList' ?>">Lista semicolon-separerad</a>&nbsp;&nbsp;
                <a href="<?php echo 'https://'.$host_str.'/backend.php/ReminderSubscription' ?>">Subscription Reminder List</a>&nbsp;&nbsp;
	</div>
   
	<div id="subscription_outer" class="forumlistingleftdivinner" style="width:915px; border:0px solid red; font-size:11px;">
      
	  <!--<div class="shoph3 widthall">Send Subscription</div>-->

		<div id="subscribtion_send_report" class="float_left listing"></div>

		<div class="float_left listing">
		  <div class="float_left widthall" style="width:40%;">
			
			<div class="backend_search_section float_left">
				<form id="filter_subscriber_list_form" name="search_users" method="post" action="" class="float_left">
				<table style="width:auto;" border="0" cellspacing="0" cellpadding="0" class="float_left">
				<tr>
					<td><input name="mode" type="hidden" value="mejlk"></td>
                                <td>
                                    <input type="radio" name="seperatedby" id="seperatedby" value="0" checked="true" />komma-separerad <br/>
                                    <input type="radio" name="seperatedby" id="seperatedby" value="1" />semicolon-separerad&nbsp; <br/>
                                </td>
                                <td>
                                    <select id="filter_shop_art_type" name="filter_shop_art_type">
					<!--<option value="0">Select Type</option>
					<option value="5">PPM</option>-->
					<option value="6">Abonnemang</option>
				</select>
				</td>
				<!--<td id="filtered_subscription_list">&nbsp;</td>-->
                                <?php if(count($data) > 0):?>
                                <td>
                                    <select id="filter_subscription_id" name="filter_subscription_id">
                                            <?php foreach($data as $list): ?>
												<?php if($list->btshop_type_id == 6){?>
                                            		<option value="<?php echo $list->id; ?>"><?php echo $list->btshop_article_title; ?></option>
												<?php }?>
											<?php endforeach; ?>
                                    </select>
                                </td>
                                <?php endif; ?>
				<td>
				<?php if ($sf_params->get('ej')) $checked = "checked"; else $checked = "";?>
				Ej
				<input type="checkbox" name="ej" value="checkbox" <?php echo $checked ?>>
				</td>
                <td><input name="sub_start_date_text" id="sub_start_date_text" type="text"  class="input50 width_70 float_left"/></td>
                <td>till&nbsp;</td>
              	<td><input name="sub_end_date_text" id="sub_end_date_text" type="text"  class="input50 width_70 float_left"/></td>
              
				<td><input type="button" id="filter_subscription_button" name="filter_subscription_button" value="Sök"><div id="filter_subscription_type_error" style="color: #FFFF00; float: right; padding-left:10px;">&nbsp;</div></td>
				</tr>
				</table>
				</form>
			</div>
			<div id="all_filtered_subscribers" class="comma_seperated_list_subscription">
			<table width="75%"cellspacing="0" cellpadding="10" border=0>
				<span class="shoph3">Mejllista för outlook</span>
				<tr>
					<td><?php 
						echo("<b>" . count($emails) . "</b>. ");
						$mail = "";
						
						for($i=0; $i < count($emails); $i++) 
						{ 
							$mail = $mail . ", " . $emails[$i]['email'];
						}
						
						//strip of the leading coma
						$mail = substr($mail, 1);
						echo($mail);
						?>
					</td>
				</tr>
			</table>
			</div>
			
		  </div>
		</div>
	  
    </div>
  </div>
  </div>
</div>

<!-- ui-dialog-update-article -->
<div id="sendsubscription_confirm_box" title="Send Subscription Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="sendsubscription_msg">Message:</td>
	</tr>
 </table>
</div>