<script language="javascript" type="text/javascript">
    $(window).load(function(){


        var checkRight = $(".rightbanner").height();
        var checkLeft = $(".innerleftdiv").height();
	
        if(checkLeft > checkRight)
        {
            $(".rightbanner").css({"height":checkLeft+"px"});
        }	
        else
        {
            $(".innerleftdiv").css({"height":checkRight+"px"});
        }
	var leftDiv = $('.inner-page-contetn-left').height();
        var rightDiv = $('.rightbanner').height();
        if(rightDiv > leftDiv){
            $('.rightbanner').css('border-left','1px solid #d3d3d3');
        }else{
            $('.inner-page-contetn-left').css('border-right','1px solid #d3d3d3');
        }
        var jQbrowser = navigator.userAgent.toLowerCase();
        jQuery.os = {
            mac: /mac/.test(jQbrowser),
            win: /win/.test(jQbrowser),
            linux: /linux/.test(jQbrowser)
        };
	
        //hack for Safari
        if($.browser.safari){
            $(".ieadj").css({"margin-top":"-2px"});
            $('.maincontentpage').css({"margin-top":"-15px"});
        }
	
        if(jQuery.os.mac) 
        {
            if(jQuery.browser.safari)
            {  
                $(".ieadj").css({"margin-top":"0px"});
            }
        }

    });
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>

    <div class="inner-page-contetn-left" >
            <div class="breadcrumb">
                <ul>
                    <li><?php
include_component('isicsBreadcrumbs', 'show', array(
    'root' => array('text' => $first_menu, 'uri' => $first_url)
))
?> </li>
                </ul>
            </div>
            <div class="inner_page_divider">&nbsp;</div>
            <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
            <form name="tipi" method="post" action="">
              <!--<input type="hidden" name="artikel_str" value="<?php //echo $artikel_str;   ?>">-->
                <input type="hidden" name="action" value="submit">
                <div  class="float_left width_100_per"> 
                    <?php if ($image_details): ?>
                        <img width="<?php echo $image_details['width']; ?>" height="<?php echo $image_details['height']; ?>" align="<?php echo $image_details['align'] ?>" src="<?php echo $image_details['img']; ?>" style="clear:right; margin: 0 0 25px">	
                    <?php endif; ?>
                </div>

                <h1 class="whp_title_b"><?php echo 'Tipsa en vän om: '?>
                <?php
                    if(!empty($rub))
                    {
                        echo $rub;
                    }else{
                        echo '<a href="http://'.$_SERVER['HTTP_HOST'].'">Börstjänaren</a>';
                    }
                ?>
                </h1>
                <?php include_partial('global/front_form_header', array('greenmsg' => $greenmsg, 'host_str' => $host_str, 'errormsg' => $errormsg)) ?>
                <div class="float_left whp_preamble width_100_per margin_bottom_10">
                    Fyll i formul&auml;ret nedan, s&aring; g&aring;r ett mejl iv&auml;g till din v&auml;n, med h&auml;lsningen att du vill rekommendera denna artikel p&aring; B&ouml;rstj&auml;naren. Du kan &auml;ven skriva en personlig h&auml;lsning i meddelanderutan.
                </div>
                <div class="blank_20h widthall">&nbsp;</div>
                <div class="float_left width_100_per margin_bottom_10">
                    <table border="0" cellspacing="0" cellpadding="3" width="100%">
                        <tr>
                            <td valign="top">
                                <div class="form_labels width_120 float_left"><b>Din väns e-post </b>*</div>
                                <div class="width_70per float_left margin_bottom_3m"><input type="text" value="<?php echo $sf_params->get('friend_mail') ? $sf_params->get('friend_mail') : '' ?>" name="friend_mail" size="20" class="form_input width_277 contactus-inputs"></div>
                                <?php echo $market->err($friend_mail_errors) ?>
                            </td>
                            
                        </tr>
                        <tr>
                            <td valign="top">
                                <div class="form_labels width_120 float_left">Ditt namn *</div>
                                <div class="width_70per float_left margin_bottom_3m"><input type="text" value="<?php echo $sf_params->get('sender_name') ? $sf_params->get('sender_name') : '' ?>" name="sender_name" size="20" class="form_input width_277 contactus-inputs"></div>
                                <?php //$market->err($sender_name_errors) ?>
                                </td>
                            
                        </tr>
                        <tr>
                            <td valign="top">
                                <div class="form_labels width_120 float_left">Din e-post</div>
                                <div class="width_70per float_left margin_bottom_3m"><input type="text" value="<?php echo $sf_params->get('sender_mail') ? $sf_params->get('sender_mail') : '' ?>" name="sender_mail" size="20" class="form_input width_277 contactus-inputs"></div>
                                <?php $market->err($sender_mail_errors) ?>
                            </td>
                            
                        </tr>
                        <tr>
                            <td valign="top">
                                <div class="form_labels width_120 float_left">Rubrik</div>
                                <div class="width_70per float_left margin_bottom_3m"><input type="text" value="<?php echo $sf_params->get('send_subject') ? $sf_params->get('send_subject') : '' ?>" name="send_subject" size="20" class="form_input width_277 contactus-inputs"></div>
                            </td>
                            
                        </tr>
                        <tr>
                       
                            <td valign="top">
                            
                            <div class="blank_10h widthall">&nbsp;</div>
                            
                            
                           <em> * m&aring;ste fyllas i! </em>
                            
                            <br>
                            
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="blank_20h widthall">&nbsp;</div>
                <div class="form_labels width_90 float_left"><?php echo __('Meddelande:') ?></div>
                <div class="blank_2h widthall">&nbsp;</div>
                <div class="float_left widthall">
                    <textarea name="optional_message" rows="5" class="width_407"><?php echo $optional_message; ?></textarea>
                </div>
                <div class="float_left mrg_top_20 widthall">
                    <!--<div class="g-recaptcha" data-sitekey="6Lc4mWMUAAAAAMeqAWz0gOzMo19ROnoKgtWq1TMp"></div>-->
                    <div class="widthall float_left"><div class="g-recaptcha" data-sitekey=<?php echo $public_key; ?>></div></div>
                    <div class="float_left redcolor"><div class="for_labels" id="contact_enq_recaptcha_error"><?php echo $errors["captachError"]; ?></div></div>
                </div>
                <div class="float_left mrg_top_20">
                    <input type="submit" class="send_contact submit" name="submit" value="">
                </div>
            </form>
            </div>
            </div>
        </div>		
    <div class="rightbanner padding_0 font_0 margin_top_ann">
        <div class="home_ad_r float_left font_size_12 ">Annons</div>
        <?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
        </div>
    </div>
