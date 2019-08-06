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
        
        var leftDiv = $('.inner-page-contetn-left').height();
        var rightDiv = $('.rightbanner').height();
        if(rightDiv > leftDiv){
            $('.rightbanner').css('border-left','1px solid #d3d3d3');
        }else{
            $('.inner-page-contetn-left').css('border-right','1px solid #d3d3d3');
        }
    });
</script>
    <div class="inner-page-contetn-left" style="border:none;">
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
                <input type="hidden" name="action" value="submit">
                <div class="float_left width_100_per"> 
                    <?php if ($image_details): ?>
                        <img width="<?php echo $image_details['width']; ?>" height="<?php echo $image_details['height']; ?>" align="<?php echo $image_details['align'] ?>" src="<?php echo $image_details['img']; ?>" style="clear:right; margin: 0 0 25px">	
                    <?php endif; ?>
                </div>

                <div class="whp_title"><?php echo 'Tipsa en vän om vårt dagsbrev!' . $rub ?></div>
                <div class="float_left width_100_per" >
                    <img src="http://www.borstjanaren.se/images/new_home/BT_just_nu_head.png" width="180" style="margin-top:7px"/> 
                    
                    <div class="whp_heading">Aktuell information från Börstjänaren</div>         
                    
                    
                    
                    
                   <strong> Hjälp oss att växa</strong> och bli ännu bättre, och hj&auml;lp dina v&auml;nner till  b&auml;ttre placeringar, genom att tipsa dem om <?php echo $sitename; ?> och vårt nyhetsbrev BÖRSTJÄNAREN JUST NU!
                   
                   <br><br>
                   
                    <strong>
                        Fyll i formuläret nedan,</strong> så går ett mejl iväg till din vän, med  hälsningen att du vill rekommendera BÖRSTJÄNAREN JUST NU! &ndash; B&ouml;rstj&auml;narens kostnadsfria dagsbrev. <br>
                    <br>
                   <i> Du kan även skriva en personlig hälsning nedan.</i>
                </div>
                
                <div class="blank_35h widthall">&nbsp;</div>
               
                <?php include_partial('global/front_form_header', array('greenmsg' => $greenmsg, 'host_str' => $host_str, 'errormsg' => $errormsg)) ?>
                <div class="float_left widthall">
                    <table width="100%" border="0" cellspacing="0" cellpadding="3">
                        <tr>
                            <td>
                            <div class="form_labels width_90 float_left"><?php echo __('Ditt namn') ?></div>
                            <div class="width_70per float_left margin_bottom_3m"><input type="text" value="<?php echo $sf_params->get('sender_name') ? $sf_params->get('sender_name') : '' ?>" name="sender_name" size="25" class="form_input width_277 contactus-inputs" /></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="form_labels width_90 float_left"><?php echo __('Din e-post') ?></div>
                            <div class="width_70per float_left margin_bottom_3m"><input type="text" value="<?php echo $sf_params->get('sender_mail') ? $sf_params->get('sender_mail') : '' ?>" name="sender_mail" size="25" class="form_input width_277 contactus-inputs" /></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="form_labels width_90 float_left"><?php echo __('Väns namn') ?></div>
                            <div class="width_70per float_left margin_bottom_3m"><input type="text" value="<?php echo $sf_params->get('send_subject') ? $sf_params->get('send_subject') : '' ?>" name="friends_name" size="25" class="form_input width_277 contactus-inputs" /></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="form_labels width_90 float_left"><?php echo __('Väns e-post') ?></div>
                            <div class="width_70per float_left margin_bottom_3m"><input type="text" value="<?php echo $sf_params->get('friend_mail') ? $sf_params->get('friend_mail') : '' ?>" name="friend_mail" size="25" class="form_input width_277 contactus-inputs" /></div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="blank_20h widthall">&nbsp;</div>
                <div class="form_labels width_90 float_left"><?php echo __('Hälsning:') ?></div>
                <div class="blank_2h widthall">&nbsp;</div>
                <div class="float_left widthall">
                    <textarea name="optional_message" rows="3" class="width_370 form_input_textarea contactus-inputs"><?php echo $optional_message; ?></textarea>
                </div>
                <div class="float_left mrg_top_20">
                    <input type="submit" class="send_contact submit" name="submit" value="">
                </div>
            </form>
                </div>
            </div>
            <div class="inner_page_divider_3">&nbsp;</div>
            <div class="float_left mrg_left_testimonial margin_testimonial">
                <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
            </div>
    </div>	
    <div class="rightbanner padding_0 font_0">
        <div class="home_ad_r float_left font_size_12">Annons</div>
        <?php include_partial('global/ad_message') ?>
        <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
    </div>