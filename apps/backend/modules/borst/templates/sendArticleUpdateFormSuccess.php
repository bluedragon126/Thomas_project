<script>
function skicka_mail(mess)
{
	if (confirm(mess))     {
			document.send_mail.submit();
	}
}
</script>
<style type="text/css">
.listing table td{ border:0px;}
.listing table td{ font-weight:normal;}
</style>
<div class="maincontentpage">
<div class="forumlistingleftdiv"
  <div class="forumlistingleftdivinner">
   <div class="shoph3 widthall">Skicka uppdatering dagens artiklar</div>
	<div class="float_left listing">
	  <div class="send_article_update_form">
        
		<div id="reply_msg" class="float_left widthall" style="color:#006600; padding:5px 0 5px 0;"><?php echo html_entity_decode($greenmsg); ?></div>
		<div class="float_left" style="border:1px solid #666666; padding:10px;">
		<table style="border-top: 0" class="classic" id="send_article_update">
			<form id="send_article_update_form" name="send_article_update_form" method="post" action="">
			  <input type="hidden" name="mode" value="send_article_update">
			  <tr style="border-top: 0" valign="top">
				<td style="border-top: 0"><span class="float_left" style="color:#1E90FF;">Antal artiklar</span></td>
			  </tr>
			  <tr style="border-top: 0" valign="top">
				<td style="border-top: 0"><input type="text" style="width: 30px" name="qty" value="<?php echo $sf_params->get('qty') ? $sf_params->get('qty') : 5  ?>">
				  st f&ouml;r datum
				  <?php $today = date("Y-m-d"); ?>
				  <input type="text" style="width: 70px" name="today" value="<?php echo $sf_params->get('today') ? $sf_params->get('today') : $today; ?>"></td>
			  </tr>
			  <tr style="border-top: 0" valign="top">
				<td style="border-top: 0"><span class="float_left" style="color:#1E90FF;">Till</span></td>
			  </tr>
			  <tr valign="top">
				<td><label>
				  <input type="radio" name="kundgrupp" checked value="4" <?php if ($sf_params->get('kundgrupp') == 4) echo "checked"; ?>>
				  Inga</label>
				  <label> &nbsp;&nbsp;&nbsp; </label>
				  <label>
				  <input type="radio" name="kundgrupp" value="2" <?php if ($sf_params->get('kundgrupp') == 2) echo "checked"; ?>>
				  Konto&nbsp;&nbsp;<b><?php echo $registered_user_cnt; ?></b></label>
				  <label> &nbsp;&nbsp;&nbsp;
				  <input type="radio" name="kundgrupp" value="3" <?php if ($sf_params->get('kundgrupp') == 3) echo "checked"; ?>>
				  Publik&nbsp;&nbsp;<b><?php echo $unregistered_user_cnt; ?></b></label>
				  </p>
				</td>
			  </tr>
			  <tr valign="top">
				<td>Abonnent<br>
				  <select name="abon" style="width: 80px">
					<option value="0" <?php if($sf_params->get('abon') == 0) echo "selected" ?>>ALLA</option>
					<option value="1" <?php if($sf_params->get('abon') == 1) echo "selected" ?>>Prov</option>
					<option value="2" <?php if($sf_params->get('abon') == 2) echo "selected" ?>>Faktura</option>
					<option value="3" <?php if($sf_params->get('abon') == 3) echo "selected" ?>>Autogiro</option>
					<option value="6" <?php if($sf_params->get('abon') == 6) echo "selected" ?>>pro 
					bono</option>
				  </select>
				  &nbsp;&nbsp;
				  <input type="checkbox" name="not_abon" <?php echo $sf_params->get('not_abon') == 'on' ? "checked='checked'" : '' ?>>
				  ej </td>
			  </tr>
			  <tr valign="top">
				<td>Anv&auml;ndarstatus<br>
				  <select name="userstat" style="width: 80px">
					<option value="0" <?php if($sf_params->get('userstat') == 0) echo "selected" ?>>ALLA</option>
					<option value="1" <?php if($sf_params->get('userstat') == 1) echo "selected" ?>>Ny</option>
					<option value="2" <?php if($sf_params->get('userstat') == 2) echo "selected" ?>>Påmind</option>
					<option value="3" <?php if($sf_params->get('userstat') == 3) echo "selected" ?>>Betald</option>
					<option value="4" <?php if($sf_params->get('userstat') == 4) echo "selected" ?>>Obetald</option>
					<option value="5" <?php if($sf_params->get('userstat') == 5) echo "selected" ?>>Avtackad</option>
				  </select>
				  &nbsp;&nbsp;
				  <input type="checkbox" name="not_userstat" <?php echo $sf_params->get('not_userstat') == 'on' ? "checked='checked'" : '' ?>>
				  ej </td>
			  </tr>
			  <tr valign="top">
				<td>
					<span class="float_left" style="color:#1E90FF;">L&auml;gg till adresser manuellt, &aring;tskilj med komma (,)</span>
					<span id="articleupdate_mail_to_error" class="float_left" style="color:#FF0000; padding-left:10px;"></span>	
				</td>
			  </tr>
			  <tr valign="top">
				<td>
				  <textarea id="articleupdate_mail_to" name="mail_to" cols="50" rows="5"><?php echo $sf_params->get('mail_to') ? $sf_params->get('mail_to') : '' ?></textarea>
				</td>
			  </tr>
			  <tr valign="top">
				<td>
					<span class="float_left" style="color:#1E90FF;">Fr&aring;n</span>
					<span id="articleupdate_mail_from_error" class="float_left" style="color:#FF0000; padding-left:10px;"></span>	
				</td>
			  </tr>
			  <tr valign="top">
				<td><input id="articleupdate_mail_from" name="mail_from" type="text" value="<?php echo $sf_params->get('mail_from') ? $sf_params->get('mail_from') :'BTnytt@borstjanaren.se' ?>" size="50"></td>
			  </tr>
			  <tr valign="top">
				<td align="right">&nbsp;</td>
			  </tr>
			  <tr valign="top">
				<td>
					<span class="float_left" style="color:#1E90FF;">Rubrik</span>
					<span id="articleupdate_subject_error" class="float_left" style="color:#FF0000; padding-left:10px;"></span>	
				</td>
			  </tr>
			  <tr valign="top">
				<td align="left">
				  <input id="articleupdate_subject" name="subject" type="text" size="50" value="<?php echo $sf_params->get('subject') ? $sf_params->get('subject') : 'Dagens artiklar' ?>" ></td>
			  </tr>
			</form>
			<tr valign="top">
			  <td align="left">
			    <!--<form name="confirm_send_mail" method="post" action="javascript:skicka_mail('Ska brevet skickas broder?')">-->
				  <p>
					<input type="button" name="Submit" value="Skicka" onclick="checkSendArticleUpdateForm()">
				  </p>
				<!--</form>--></td>
			</tr>
		  </table>
		</div>
	  
	  </div>
	</div>
	</div>
</div>

</div>

<!-- ui-dialog-send-article_update -->
<div id="send_article_update_confirm_box" title="Send Article Update Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="send_article_update_msg">Message:</td>
	</tr>
 </table>
</div>