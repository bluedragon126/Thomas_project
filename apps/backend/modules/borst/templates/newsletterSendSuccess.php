<style type="text/css">
    .listing table td{ border:0px;}
    .listing table td{ font-weight:normal;}
    #newsletter_other_links a {color:#114993;}
</style>
<div class="maincontentpage">
    <div class="forumlistingleftdiv">
        <div class="forumlistingleftdivinner">
            <div id="newsletter_other_links" class="float_left widthall" style="width:900px; margin-bottom:20px;">
                <a style="font-weight:bold;" href="<?php echo 'http://' . $host_str . '/backend.php/borst/newsletterForm' ?>">Skicka newsletter</a>&nbsp;&nbsp;
                <a href="<?php echo 'http://' . $host_str . '/backend.php/borst/sentMailList' ?>">Skickade newsletter</a>&nbsp;&nbsp;
                <a href="<?php echo 'http://' . $host_str . '/backend.php/borst/addRemoveEmail' ?>">L&auml;gg till/ta bort Mejl</a>&nbsp;&nbsp;
                <a href="<?php echo 'http://' . $host_str . '/backend.php/borst/newsletterUser' ?>">Lista komma-separerad</a> &nbsp;&nbsp;
                <a href="<?php echo 'http://' . $host_str . '/backend.php/borst/createNewsletter' ?>">Add Newsletter</a> &nbsp;&nbsp;
                <a href="<?php echo 'http://' . $host_str . '/backend.php/borst/searchNewsletterSubscriber' ?>">Search Newsletter Subscriber</a>
            </div>
            <div class="shoph3 widthall">Newsletter Form</div>
            <div class="float_left listing">
                <div class="float_left widthall">

                    <div id="reply_msg" class="float_left widthall" style="color:#006600; padding:5px 0 5px 0;"><?php echo html_entity_decode($greenmsg?$greenmsg:''); ?></div>
                    <div class="float_left" style="border:1px solid #666666; padding:10px;">
                        <table style="border-top: 0" class="classic" id="newsletter_form">
                            <form id="send_mail" name="send_mail" method="post" action="">
                                <input type="hidden" name="mode" value="newsletter_send">
                                <tr>
                                    <td>
                                        <div class="float_left widthall">
                                            <div class="backend_search_section float_left">
                                                
                                                    <table width="80%" border="0" cellspacing="0" cellpadding="0" class="float_left">
                                                        <tr>
                                                            <td><input name="mode" type="hidden" value="mejlk"></td>
                                                            <td>
                                                                <?php if ($allAbon): ?>
                                                                    <select name="s_abon" class="float_left" style="width: 75px" >
                                                                    <?php foreach ($allAbon as $key => $value): ?>
                                                                        <option value="<?php echo $key; ?>" <?php if ($sf_params->get('s_abon') == $key)
                                                                            echo 'selected="selected"' ?>><?php echo $value; ?></option>
<?php endforeach; ?>
                                                                        </select>
<?php endif; ?>
                                                                        </td>
                                                                        <td>
<?php if ($allUserStatus): ?>
                                                                                <select name="s_stat" class="selectmenu" style="width: 75px" >
<?php foreach ($allUserStatus as $key => $value): ?>
                                                                                    <option value="<?php echo $key; ?>" <?php if ($sf_params->get('s_stat') == $key)
                                                                                        echo 'selected="selected"' ?>><?php echo $value ?></option>
                                                                <?php endforeach; ?>
                                                                                        </select>
<?php endif; ?>
                                                                                    </td>
                                                                                    <td>
<?php if ($sf_params->get('ej'))
                                                                                            $checked = "checked"; else
                                                                                            $checked = ""; ?>
                        			Ej
                                                                                        <input type="checkbox" name="ej" value="checkbox" <?php echo $checked ?>>
                                                                                    </td>
                                                                                    <td><input type="button" name="Submit" value="Sök" id="newsletter_email_submit" onClick="getUsersEmailIdForNewsLetter()"></td>
                                                                                    <td><input type="button" class="submit" name="reset" value="rensa" id="newsletter_email_reset"></td>
                                                                                    <td>antal rader:<?php echo count($emails) ?></td>
                                                                                </tr>
                                                                            </table>
                                                                      
                                                                    </div>
                                        </div>
                                            <div style="width:600px" >
                                                <span id="email_list_div"></span>

                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr style="border-top: 0" valign="top">
                                                                    <td style="border-top: 0"><span class="float_left" style="color:#1E90FF;">Till</span></td>
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
                                                                <tr valign="top">
                                                                    <td>
                                                                        <span class="float_left" style="color:#1E90FF;">Text</span>
                                                                        <span id="news_mail_body_error" class="float_left" style="color:#FF0000; padding-left:5px;"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr valign="top">
                                                                    <td>
                                                                        <select name ="mail_body" id="newsletter_id">
<?php foreach ($newsletter as $obj): ?>
                                                                                            <option value="<?php echo $obj["id"] ?>"><?php echo $obj["name"] ?></option>
<?php endforeach; ?>
                                        </select>
                                        <span id="newsletter_link"></span>

                                </tr>
                            
                            <tr valign="top">
                                <td align="right">
                                        <p>
                                            <input type="submit" name="Submit" value="Skicka" >
                                        </p>
                                    </td>
                            </tr>
                                        </form>
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
    bindNewsletterLink();
    $("#newsletter_id").trigger("change");
</script>