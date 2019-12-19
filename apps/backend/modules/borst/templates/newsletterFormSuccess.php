<style type="text/css">
.listing table td{ border:0px;}
.listing table td{ font-weight:normal;}
#newsletter_other_links a {color:#114993;}
</style>
<div class="maincontentpage">
<div class="forumlistingleftdiv">
  <div class="forumlistingleftdivinner">
  <div id="newsletter_other_links" class="float_left widthall" style="width:950px; margin-bottom:20px;">
  <a style="font-weight:bold;" href="<?php echo 'http://'.$host_str.'/backend.php/borst/newsletterForm' ?>">Skicka newsletter</a>&nbsp;&nbsp;
  <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/sentMailList' ?>">Skickade newsletter</a>&nbsp;&nbsp;
  <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/addRemoveEmail' ?>">L&auml;gg till/ta bort Mejl</a>&nbsp;&nbsp;
  <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/newsletterUser' ?>">Lista komma-separerad</a> &nbsp;&nbsp;
  <a  href="<?php echo 'http://'.$host_str.'/backend.php/borst/semicolonSeperater'?>">Lista semicolon-separerad</a> &nbsp;&nbsp;
  <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/createNewsletter' ?>">Add Newsletter</a> &nbsp;&nbsp;
  <a href="<?php echo 'http://'.$host_str.'/backend.php/borst/searchNewsletterSubscriber' ?>">Search Newsletter Subscriber</a>
  </div>
     <div style="border: 1px solid; float: left; width: 167px; margin-right: 30px; display: none" id="hidespool">
        <span style="float: right; color:red; margin-right:50px;  padding:5px 0 5px 0; font-size:13px; font-weight: bold; margin-right:50px; " id="poolStatus"></span>
    </div>
   <div class="shoph3 widthall">Newsletter Form  </div>
   <span style="color:#006600; padding:5px 0 5px 0;" id="sent_mails"></span>
	<div class="float_left listing">
	  <div class="float_left widthall">

<!--		<div id="reply_msg" class="float_left widthall" style="color:#006600; padding:5px 0 5px 0;"><?php echo html_entity_decode($greenmsg); ?></div>-->
                <div id="reply_msg" class="float_left widthall" style="color:#006600; padding:5px 0 5px 0;"><?php echo $sf_user->getFlash('greenmsg'); ?></div>
		<div class="float_left" style="border:1px solid #666666; padding:10px;">
		  <table style="border-top: 0" class="classic" id="newsletter_form">
			<form id="send_mail" name="send_mail" method="post" action="/backend.php/borst/newsletterForm">
			  <input type="hidden" name="mode" value="newsletter_send">
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
					<option value="2" <?php if($sf_params->get('userstat') == 2) echo "selected" ?>>Pmind</option>
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
					<span id="news_mail_to_error" class="float_left" style="color:#FF0000; padding-left:10px;"></span>
				</td>
			  </tr>
			  <tr valign="top">
				<td> <textarea id="mail_to" name="mail_to" style="width: 500px;" rows="3"><?php echo $sf_params->get('mail_to') ? $sf_params->get('mail_to') : '' ?></textarea></td>
			  </tr>
			  <tr valign="top">
				<td>
					<span class="float_left" style="color:#1E90FF;">Fr&aring;n</span>
					<span id="news_mail_from_error" class="float_left" style="color:#FF0000; padding-left:5px;"></span>
				</td>
			  </tr>
			  <tr valign="top">
				<td><input id="mail_from" name="mail_from" type="text" value="<?php echo $sf_params->get('mail_from') ? $sf_params->get('mail_from') : 'ej_svarsadress@borstjanaren.se' ?>" size="50"></td>
			  </tr>
			  <tr valign="top">
				<td>
					<span class="float_left" style="color:#1E90FF;">Rubrik</span>
					<span id="news_mail_subject_error" class="float_left" style="color:#FF0000; padding-left:5px;"></span>
				</td>
			  </tr>
			  <tr valign="top">
				<td><input id="subject" name="subject" type="text" size="50" value="<?php echo $sf_params->get('subject') ? $sf_params->get('subject') : '' ?>" >
                                         
				</td>
			  </tr>
                           <tr>
                              <td><span class="float_left" style="color:#1E90FF;">Newsletter</span></td>
                           </tr>
                          <tr>
                              <td>
                                  
                                  <select name ="newsletter_select" id="newsletter_id">
                                        <option value="">Select Newsletter</option>
                                        <?php foreach ($newsletter as $obj): ?>
                                            <option value="<?php echo $obj["id"] ?>"><?php echo $obj["name"] ?></option>
                                        <?php endforeach; ?>
                                  </select>
                                  <span id="newsletter_link"></span>
                                  <span class="cursor" style="color:#1E90FF;" onclick="$('#mail_body').val('');$('#newsletter_id').val('');$('#newsletter_link').html('');">Clear</span></td>
                              </td>
                          </tr>
			  <tr valign="top">
				<td>
					<span class="float_left" style="color:#1E90FF;">Text</span>
					<span id="news_mail_body_error" class="float_left" style="color:#FF0000; padding-left:5px;"></span>
				</td>
			  </tr>
			  <tr valign="top">
				<td><textarea name="mail_body" id="mail_body" style="width: 500px;" rows="12"><?php echo $sf_params->get('mail_body') ? $sf_params->get('mail_body') : '' ?></textarea></td>
			  </tr>
			</form>
			<tr valign="top">
			  <td align="right"><form name="confirm_send_mail" method="post">
				  <p>
					<input type="button" name="Submit" value="Skicka" onclick="javascript:checkNewsletterForm()">
				  </p>
				</form></td>
			</tr>
		  </table>
          </div>
	  </div>
	</div>
	</div>
</div>
</div>
<!-- ui-dialog-send-newsletter -->
<div id="send_newsletter_confirm_box" title="Send Newsletter Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="send_newsletter_msg">Message:</td>
	</tr>
 </table>
</div>

<script type="text/javascript">
        function updatePoolStatus(){
            $.ajax({url: "/poolstats.php",processData: false,global: false,success: function(e){
                    $('#hidespool').show();
                    $("#poolStatus").html("Spool Status " + e);
                }
            }); 
    }
    setInterval("updatePoolStatus()" , 5000); 
    
    function updateStatus(){
            $.ajax({url: "/stat.php",processData: false,global: false,success: function(e){
                    $("#sent_mails").html("Ett mejl har skickats till " + e);
                }
            }); 
    }
    bindNewsletterLink();
    //url: "/backend.php/borst/getMailProgress",
    
                    
               
    
    $("#send_mail").live('submit',function(event) {
        event.preventDefault();
        
        updateStatus();
        var intervalId =  setInterval("updateStatus()" , 1000); 
                 
        var $form = $(this),
        url = $form.attr( 'action' );
        
        if(typeof $network !== 'undefined') {
            $('#fd_patientbundle_tasktype_taskNetwork').val($network.getSelectedIds());
        }
                 
                 
        var posting = $.post( url, $form.serialize(),function(){clearInterval(intervalId); updateStatus();});
                 
    return false;
});
               


    
// $("#newsletter_id").trigger("change");
</script>