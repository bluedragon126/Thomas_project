<style type="text/css">
    @font-face {    
        font-family: "Franklin Gothic Book Regular";
        src: url("../fonts/FranklinGothic-Book.eot") format('embedded-opentype');
        src: url("../fonts/FranklinGothic-Book.ttf") format('truetype');
        src: url("../fonts/FranklinGothic-Book.woff") format('woff');
    }    
</style>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
    tinyMCE.init({
        selector: 'textarea',  // change this value according to your HTML
        height: 100,
        width: 500,
        plugins: [
        "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
    ],
    toolbar1: "bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent | link unlink image | emoticons", 
    browser_spellcheck: true,
    resize: "both",
    });
    $(document).ready(function () {
        $('.selectBox').jqTransform();
        $('.checkBox').jqTransform();
        $('.radioButton').jqTransform();
        $('#readMoreInfo').live('click', function () {
            $(this).toggleClass('contactUsreadLes').parent().next().toggle();
        });

        $('#show_fullname').click(function () {
            $('#show_signature').attr("checked", false);
            $('#show_name').attr("checked", false);
            $('#show_signature').prev().removeClass('jqTransformChecked');
            $('#show_name').prev().removeClass('jqTransformChecked');
            $('.user_signature_tr').hide();
            $('#user_signature').text('');
        });
        $('#show_signature').click(function () {
            $('#show_fullname').attr("checked", false);
            $('#show_name').attr("checked", false);
            $('#show_fullname').prev().removeClass('jqTransformChecked');
            $('#show_name').prev().removeClass('jqTransformChecked');
            $('.user_signature_tr').show();
        });
        $('#show_name').click(function () {
            $('#show_signature').attr("checked", false);
            $('#show_fullname').attr("checked", false);
            $('#show_signature').prev().removeClass('jqTransformChecked');
            $('#show_fullname').prev().removeClass('jqTransformChecked');
            $('.user_signature_tr').hide();
            $('#user_signature').text('');
        });
        if ($("#contact_chkbox").is(':checked')) {
            $("#redioGorup").show();
        }
        $('#contact_chkbox').click(function () {
            if (this.checked) {
                $('#show_signature').attr("checked", false);
                $('#show_fullname').attr("checked", false);
                $('#show_name').attr("checked", false);
                $('.user_signature_tr').hide();
                $('#user_signature').text('');
            }
        });
    });
</script>
<input type="hidden" id="contactUs" />
<form name="contactus" id="contactus" method="post" action="">
    <?php echo $contactEnqForm->renderHiddenFields() ?>
    <div class="maincontentpage">
        <div class="inner-page-contetn-left">
            <div class="breadcrumb">
                <ul>
                    <li><?php
    include_component('isicsBreadcrumbs', 'show', array(
        'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/contactUs')
    ))
    ?> </li>
                </ul>
            </div>
            <div class="inner_page_divider">&nbsp;</div>
            <div class="float_l_width_100 mrg_left_70">
                <div class="inner_page_content_main">

                  <div class="whp_title">Kontakta oss   <img class="bt_contact_askBT" src="/images/new_home/askBT_contact.png"></div>
                    
                    
                    <div class="float_left widthall">
                        <div class="whp_preamble">På denna sida kan du kontakta Börstjänaren. Fyll i formuläret och skicka, så besvarar vi din förfrågan så snart vi kan.</div>
                        <div class="float_left widthall whp_heading">
                            Vanliga frågor</div>
                        <br/>
                        <div class="blank_5h widthall">&nbsp;</div>
                        Kanske har din fråga redan besvarats? Vill du t. ex. veta hur man registrerar resp. avregistrerar sig från våra e-postutskick? <a class="main_link_color" href="<?php echo 'http://' . $host_str . '/borst/faq'; ?>">Se vår lista med vanliga frågor!</a>
                    </div>
                    <div class="blank_24h widthall">&nbsp;</div>
                    <div class="float_left widthall">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <div class="blank_5h widthall">&nbsp;</div>
                                    <div class="form_labels width_90 float_left"><?php echo __('* Förnamn') ?></div>
                                    <div class="width_70per float_left margin_bottom_3m"><?php echo $contactEnqForm['firstname']->render(array('id' => 'firstname', 'class' => 'form_input width_277 contactus-inputs', 'size' => '25')) ?></div>	
                                    <div class="float_left redcolor pad_lft_2"><div class="for_labels mrg_left_89" id="contact_firstname_error"><?php echo $errors["firstname"]; ?></div></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form_labels width_90 float_left"><?php echo __('* Efternamn') ?></div>
                                    <div class="width_70per float_left margin_bottom_3m"><?php echo $contactEnqForm['lastname']->render(array('id' => 'lastname', 'class' => 'form_input width_277 contactus-inputs', 'size' => '25')) ?></div>
                                    <div class="float_left redcolor pad_lft_2"><div class="for_labels mrg_left_89" id="contact_lastname_error"><?php echo $errors["lastname"]; ?></div></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form_labels width_90 float_left"><?php echo __('* E-post') ?></div>
                                    <div class="width_70per float_left margin_bottom_3m"><?php echo $contactEnqForm['email']->render(array('id' => 'email', 'class' => 'form_input width_277 contactus-inputs', 'size' => '25')) ?></div>
                                    <div class="float_left redcolor pad_lft_10"><div class="for_labels mrg_left_82" id="contact_email_error"><?php echo $errors["email"]; ?></div></div>
                                </td>
                            </tr>
                            <tr>
                                <td>                                    
                                    <div class="form_labels width_90 float_left"><?php echo __('* Kategori') ?></div>
                                    <div class="float_left selectBox margin_bottom_3m zindex-contact"><?php echo $contactEnqForm['enq_type']->render(array('id' => 'enq_type', 'style' => 'width:285px;padding-left:1px;', 'class' => 'border-radius-5px form_input width_277 contactus-inputs')) ?></div>
                                    <div class="float_left redcolor pad_lft_10 width_100_per"><div class="for_labels mrg_left_82" id="contact_enq_type_error"><?php echo $errors["enq_type"]; ?></div></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form_labels width_90 float_left"><?php echo __('* Rubrik') ?></div>
                                    <div class="width_70per float_left margin_bottom_3m"><?php echo $contactEnqForm['enq_subject']->render(array('id' => 'enq_subject', 'class' => 'form_input width_277 contactus-inputs', 'size' => '25')) ?></div>
                                    <div class="float_left redcolor pad_lft_10"><div class="for_labels mrg_left_82" id="contact_enq_subject_error"><?php echo $errors["enq_subject"]; ?></div></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="blank_24h widthall">&nbsp;</div>
                                    <div class="float_left redcolor"><div class="for_labels" id="contact_enq_question_error"><?php echo $errors["user_question"]; ?></div></div>
                                    <div class="float_left zindex"><?php echo $contactEnqForm['user_question']->render(array('style' => 'border:0px;width: 500px; height: 258px;overflow:hidden;background:url("/images/tinyMCE_back.png") repeat scroll 0 0 transparent')) ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="blank_24h widthall">&nbsp;</div>
                                    <div class="float_left redcolor"><div class="for_labels" id="contact_enq_question_error"></div></div>
                                    <div class="float_left checkBox" ><input type="checkbox" class="contact_chkbox" name="contact_chkbox" id="contact_chkbox" <?php //if($check_box_check){          ?>checked="true"<?php //}         ?>/><span class="form_labels contactus_radio_label">Använd ”Fråga BT!” och få snabbare svar!</span><span class="chk_error"><?php echo $errormsg; ?></span></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form_labels width_90 float_left"><span id="readMoreInfo" class="contactUsreadmore form_labels padding_top_0">&nbsp;</span><span class="mrg_lft_7"><?php echo __('Läs mer!') ?></span></div>
                                    <div class="float_left form_labels contactus_subscription_text">    
                                    
                                   
                                    <span style="color:#0bb342">
                                    
                                    
                                    Om du kryssar i ”Fråga BT!” så publiceras din fråga och vårt svar i avdelningen ”Fråga BT!”
                                        som kan nås via en knapp i huvudmenyn och läsas av alla användare på Börstjänaren.
                                      <br /> <br /> Många av de frågor vi får in kan vara av intresse för andra användare på Börstjänaren.
                                        Genom att kryssa i ”Fråga BT!” bidrar du till vår sajt och får dessutom snabbare svar.<br />
........................................................................................................................................
<br />


                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr id="redioGorup" style="<?php
                        if ($errormsg || $errormsg_signature || $check_box_check) {
                            echo 'display:block';
                        } else {
                            echo 'display:none';
                        }
    ?>">
                                <td>                                    
                                    <div class="float_left redcolor"><div class="for_labels" id="contact_enq_question_error"><?php //echo $errors["user_question"];          ?></div></div>
                                    <div class="blank_4h widthall">&nbsp;</div>
                                    <div class="float_left radioButton widthall" >
                                        <input type="radio" name="show_fullname" id="show_fullname" value="1" <?php if ($radio_fullname) { ?>checked="true"<?php } ?>/><span class="form_labels contactus_radio_label">Det är OK att visa mitt namn</span>
                                    </div>
                                    <div class="float_left radioButton widthall" >
                                        <input type="radio" name="show_name" id="show_name"  value="2" <?php if (!$radio_name) { ?>checked="true"<?php } ?>/><span class="form_labels contactus_radio_label">Visa endast förnamn</span>
                                    </div>
                                    <div class="float_left radioButton widthall" >
                                        <input type="radio" name="show_signature" id="show_signature"  value="3" <?php if (!$radio_fullname && $radio_name) { ?>checked="true"<?php } ?>/><span class="form_labels contactus_radio_label">Istället för namn, visa följande signatur:</span>
                                        <?php echo $contactEnqForm['user_signature']->render(array('id' => 'user_signature', 'class' => 'blog_prof_entry blog_invisible_input', 'size' => '25', 'placeholder' => 'Skriv din signatur här')) ?>
                                    </div>
                                    <div class="float_left redcolor"><div class="for_labels"><?php echo $errormsg_signature; ?></div></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="blank_25h widthall">&nbsp;</div>
                                    <div class="widthall float_left"><div class="g-recaptcha" data-sitekey=<?php echo $public_key; ?>></div><?php //echo $contactEnqForm['recaptcha_response_field']->render(array('id' => 'recaptcha_response_field', 'class' => 'border-radius-5px form_input width_277 contactus-inputs', 'size' => '25'))           ?></div>
                                    <div class="float_left redcolor"><div class="for_labels" id="contact_enq_recaptcha_error"><?php echo $errors["captachError"]; ?></div></div>
                            </tr>
                            <tr>
                                <td class="blank_10h"><b>&nbsp;</b></td>
                            </tr>
                        </table>
                        <div class="blank_6h widthall">&nbsp;</div>
                        <div class="registerbtn">
                            <div class="float_left">
                                <input type="submit" class="send_contact submit " value="" name="skicka" onclick="" /><!--validateContactForm()-->
                            </div>
                        </div>
                    </div>
                    <?php echo include_partial('global/bottom_footer_whitepage'); ?>
                </div>
            </div>
        <div class="inner_page_divider_3">&nbsp;</div>
        <div class="float_left mrg_left_testimonial margin_testimonial">
            <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
        </div>
        </div>
        <div class="rightbanner padding_0 font_0 margin_top_ann">
            <div class="home_ad_r float_left font_size_12 ">Annons</div>
            <?php //include_partial('global/ad_message') ?>
            <div id="whitepage_ads">
                <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
            </div>
        </div>        
    </div>
</form>