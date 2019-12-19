<script language="JavaScript" type="text/JavaScript">
function submitForm(the_form) {
	
	the_form.s_abon.value = 0; // Clear the form
	the_form.s_stat.value = 0; // Clear the form
	the_form.submit(); // Submit the data
}
</script>

<style type="text/css">
.listing table td{ border:0px;}
.listing table td{ font-weight:normal;}
#newsletter_other_links a {color:#114993;}
</style>
<div class="maincontentpage">
<div class="forumlistingleftdiv">
  <div class="forumlistingleftdivinner">
  <div id="newsletter_other_links" class="float_left widthall" style="width:950px; margin-bottom:20px;">
  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/newsletterForm' ?>">Skicka newsletter</a> &nbsp;&nbsp;
  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/sentMailList' ?>">Skickade newsletter</a> &nbsp;&nbsp;
  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/addRemoveEmail' ?>">L&auml;gg till/ta bort Mejl</a> &nbsp;&nbsp;
  <a  href="<?php echo 'https://'.$host_str.'/backend.php/borst/newsletterUser' ?>">Lista komma-separerad</a> &nbsp;&nbsp;
  <a style="font-weight:bold;" href="<?php echo 'https://'.$host_str.'/backend.php/borst/semicolonSeperater'?>">Lista semicolon-separerad</a> &nbsp;&nbsp;
  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/createNewsletter' ?>">Add Newsletter</a> &nbsp;&nbsp;
  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/searchNewsletterSubscriber' ?>">Search Newsletter Subscriber</a>
  </div>
   <div class="shoph3 widthall"><!--Newsletter Form--></div>
	<div class="float_left listing">
	  <div class="float_left widthall">
		<div class="backend_search_section float_left">
		<form name="search_users" method="post" action="" class="float_left">
			<table width="80%" border="0" cellspacing="0" cellpadding="0" class="float_left">
			<tr>
			<td><input name="mode" type="hidden" value="mejlk"></td>
			<td>
			<?php if($allAbon):?>
			<select name="s_abon" class="float_left" style="width: 75px" >
			  <?php foreach($allAbon as $key=>$value): ?>
			  <option value="<?php echo $key; ?>" <?php if($sf_params->get('s_abon')==$key) echo 'selected="selected"'?>><?php echo $value; ?></option>
			  <?php endforeach; ?>
			</select>
			<?php endif; ?>
			</td>
			<td>
			<?php if($allUserStatus):?>
			<select name="s_stat" class="selectmenu" style="width: 75px" >
			  <?php foreach($allUserStatus as $key=>$value): ?>
			  <option value="<?php echo $key; ?>" <?php if($sf_params->get('s_stat')==$key) echo 'selected="selected"'?>><?php echo $value ?></option>
			  <?php endforeach; ?>
			</select>
			<?php endif; ?>		
	        </td>
			<td>
			<?php if ($sf_params->get('ej')) $checked = "checked"; else $checked = "";?>
			Ej
			<input type="checkbox" name="ej" value="checkbox" <?php echo $checked ?>>
			</td>
			<td><input type="submit" name="Submit" value="Sök"></td>
			<td><input type="reset" class="submit" name="reset" value="rensa" onClick="submitForm(this.form)"></td>
			<td>antal rader:<?php echo count($emails)?></td>
			</tr>
			</table>
		</form>
		</div>

               
		<table width="75%"cellspacing="0" cellpadding="10" border=0 id="all_newsletter_account">
		<span class="shoph3">Mejllista för outlook</span>
		<tr>
		<td><?php

		echo("<b>" . count($emails) . "</b>. ");
		$mail = "";
		
		for($i=0; $i < count($emails); $i++) 
		{
			$mail = $mail . "; " . $emails[$i];
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