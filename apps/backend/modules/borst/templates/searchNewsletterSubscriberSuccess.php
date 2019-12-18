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
	  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/newsletterUser' ?>">Lista komma-separerad</a> &nbsp;&nbsp;
          <a  href="<?php echo 'https://'.$host_str.'/backend.php/borst/semicolonSeperater'?>">Lista semicolon-separerad</a> &nbsp;&nbsp;
	  <a href="<?php echo 'https://'.$host_str.'/backend.php/borst/createNewsletter' ?>">Add Newsletter</a> &nbsp;&nbsp;
	  <a style="font-weight:bold;" href="<?php echo 'https://'.$host_str.'/backend.php/borst/searchNewsletterSubscriber' ?>">Search Newsletter Subscriber</a>
	 </div>
    <div class="shoph3 widthall"><!--Newsletter Form--></div>
	<div class="float_left listing" style="width:900px;">
	
		<form name="search_newsletter_subscriber_form" id="search_newsletter_subscriber_form" method="post" action="">
		<div id="news_search_option">
			<?php foreach($all_type as $data):?>
			<div class="float_left widthall">
				<div class="float_left" style="width:23px; border:0px solid green;"><input type="checkbox" name="news[]" value="<?php echo $data->id; ?>" <?php if ($status_arr[$data->id] == 1) echo "checked"; ?> /></div>
				<div class="float_left" style="height:19px;">
					<span class="float_left" style="padding-top:4px;"><b><?php echo $data->newsletter_name; ?></b></span>		
				</div>
			</div>
			<?php endforeach; ?>
			<div class="float_left widthall" style="border:0px solid #996633; margin-top:10px; ">
				<input type="submit" value="SÖK" name="assign_to_publisher_button" class="registerbuttontext submit" />
			</div>
		</div>
		</form>
		
		<div id="news_search_result" class="float_left widthall" style="border:0px solid green; margin:20px 0px 20px 0px;">
			<table width="75%"cellspacing="0" cellpadding="10" border=0>
				<span class="shoph3">Mejllista för outlook</span>
				<tr>
				<td><?php 
				echo("<b>" . count($emails) . "</b>. ");
				$mail = "";
				
				for($i=0; $i < count($emails); $i++) 
				{ 
					$mail = $mail . ", " . $emails[$i];
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