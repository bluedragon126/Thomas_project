<style type="text/css">
.listing table td{ border:0px;}
.listing table#remind_table2 th{ background-color:#99CCFF;}
.listing table td{ font-weight:normal;}
#subscription_other_links a {color:#114993;}
</style>
<div class="maincontentpage">
  <div class="forumlistingleftdiv">
   <div class="forumlistingleftdivinner" style="width:915px;">
   
	<div id="subscription_other_links" class="float_left widthall" style="width:900px; margin-bottom:20px;">
		<a href="<?php echo 'https://'.$host_str.'/backend.php/borst/subscriptionList' ?>">Subscription List</a>&nbsp;&nbsp;
		<a style="font-weight:bold;" href="<?php echo 'https://'.$host_str.'/backend.php/borst/sendSubscription' ?>">Send Subscription</a>&nbsp;&nbsp;
		<?php /*<a href="<?php echo 'https://'.$host_str.'/backend.php/borst/commaSeperatedList' ?>">Lista komma-separerad</a>&nbsp;&nbsp; */?>
		<a href="<?php echo 'https://'.$host_str.'/backend.php/borst/filteredSubscriberList' ?>">Lista semicolon-separerad</a>&nbsp;&nbsp;
                <a href="<?php echo 'https://'.$host_str.'/backend.php/ReminderSubscription' ?>">Subscription Reminder List</a>&nbsp;&nbsp;
	</div>
   
	<div id="subscription_outer" class="forumlistingleftdivinner" style="width:915px; border:0px solid red; font-size:11px;">
      
	  <div class="shoph3 widthall">Send Subscription</div>

		<div id="subscribtion_send_report" class="float_left listing"></div>

		<div class="float_left listing">
		  <div class="float_left widthall" style="width:80%;">
			<div class="float_left widthall" style="border:1px solid #666666; width:56%;">
			<form id="send_subscription_form" name="send_subscription_form" method="POST" action="">
			  <table width="600" border="0" cellpadding="0" id="reminder_table">
				<tr>
				  <td valign="top">
				  <div id="send_subscription_outer" style=" border:0px solid red; float:left; position:relative; padding:10px;">
					  <table width="95%" border="0" cellpadding="0" cellspacing="0">
						<tr valign="top">
						  <td colspan="2">
						   <span class="float_left" id="komma_seperated_email_error" style="color:#FF0000;"></span><br>
						   <span class="float_left"><strong> Skicka till användare (separera med komma-tecken):</strong></span><br>
						   <input size="60" type="text" name="komma_seperated_users" id="komma_seperated_users"></td>
						</tr>
						
						<tr valign="top">
						  <td colspan="2">
						    <span class="float_left">&nbsp;</span><br>
							<span class="float_left"><strong> Subject:</strong></span><br>
							<input size="60" type="text" name="email_subject" value="New HengyBoy Subscription"></td>
						</tr>
						
						<tr valign="top">
						  <td colspan="2">
						   <span class="float_left">&nbsp;</span><br>
						   <span class="float_left"><strong> Filen i templates/email heter:</strong></span><br>
						   <input size="60" type="text" name="email_file_name" value="_henryBoy.php"></td>
						</tr>
						
						<tr valign="top">
						  <td colspan="2">
						    <span id="subscription_type_error" class="float_left" style="color:#FF0000;"></span><br>
							<span class="float_left"><strong> Product:</strong></span><br>
							<select id="shop_art_type" name="shop_art_type">
								<option value="0">Select Type</option>
								<option value="5">PPM</option>
								<option value="6">Abonnemang</option>
							</select></td>
						</tr>
						
						<tr id="subscription_list" valign="top">
						  <td colspan="2">&nbsp;</td>
						</tr>
						
						<tr valign="top">
							<td colspan="2"><input id="send_subscription_button" class="registerbuttontext submit" type="button" value="Skicka" name="send_subscription_button"/></td></tr>
						
					  </table>
					  
					</div>
				  </td>
				</tr>
			  </table>
			</form>
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