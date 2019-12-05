<script language="javascript" type="text/javascript">
    $(window).load(function(){


        var checkRight = $(".rightbanner").height();
        var checkLeft = $(".btshopleftdiv").height();
	
        if(checkLeft > checkRight)
        {
            $(".rightbanner").css({"height":checkLeft+"px"});
        }	
        else
        {
            $(".btshopleftdiv").css({"height":checkRight+"px"});
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
<div class="maincontentpage">
    <div class="inner-page-contetn-left" >
        <div class="breadcrumb">
            <ul>
                <li><?php
include_component('isicsBreadcrumbs', 'show', array(
    'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'user/loginWindow')
))
?> </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">

                <div class="whp_title">Logga in</div>
                <div class="blank_10h widthall">&nbsp;</div>
                <form name="loginform" id="loginform" method="post" action="<?php echo url_for('user/signin') ?>">
                    <?php echo $form['_csrf_token']->render() ?>
                    <div class="float_left widthall">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td colspan="6" class="whp_subheading"><span class="color_FF0000"><?php
                    if ($login_error) {
                        ?>
                                            <span class="widthall float_left"><img src="/images/utrop.png" width="25" height="25" alt="Frågetecken" /></span><br />
                                            <div class="blank_8h widthall">&nbsp;</div>

                                            <?php
                                            echo str_replace("*", "", $login_error);
                                        }
                                        ?></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="blank_20h widthall">&nbsp;</div>
                                    <div class="form_labels width_110 float_left">Användarnamn</div>
                                    <div class="width_70per float_left margin_bottom_2"><?php echo $form['username']->render(array('id' => 'username', 'class' => 'form_input width_277 contactus-inputs', 'size' => '25')) ?></div>	
                                    <div class="float_left redcolor pad_lft_2"><div class="for_labels mrg_left_89" id="contact_firstname_error"><?php //echo $errors["username"]; ?></div></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form_labels width_110 float_left">Lösenord</div>
                                    <div class="width_70per float_left margin_bottom_2"><?php echo $form['password']->render(array('id' => 'password', 'class' => 'form_input width_277 contactus-inputs', 'size' => '25')) ?></div>
                                    <div class="float_left redcolor pad_lft_2"><div class="for_labels mrg_left_89" id="contact_lastname_error"><?php //echo $errors["password"]; ?></div></div>
                                </td>
                            </tr>
                            <!--<tr>
                                <td colspan="6" class=""><?php //echo $form['username']->render(array('id' => 'username', 'class' => 'form_input width_174')) ?></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="">
                                    <div class="form_labels">Användarnamn</div>
                                    <div class="blank_5h widthall">&nbsp;</div></td>

                            </tr>
                            <tr>
                                <td colspan="6" class=""><?php //echo $form['password']->render(array('id' => 'password', 'class' => 'form_input width_174')) ?></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="">
                                    <div class="form_labels">Lösenord</div>
                                    <div class="blank_5h widthall">&nbsp;</div></td>
                            </tr>-->
                            <tr>
                                <td colspan="6" class="main_link_color padding_top_1" height="30 px" vertical-align="bottom"><a style="margin-left:110px" class="main_link_color" href="<?php echo 'http://' . $host_str . '/user/forgetPassword' ?>"><?php echo __('Glömt lösenord?') ?></a></td>
                            </tr>
                        </table>
                        <div class="blank_20h widthall">&nbsp;</div>
                        <div class="registerbtn" style="margin-left:110px;">
                            <input type="submit" class="loginBtn submit cursor" value="" name="submit" />
                        </div>
                    </div>
                </form>
                <?php echo include_partial('global/bottom_footer_whitepage'); ?>
            <div class="inner_page_divider_3">&nbsp;</div>
    <div class="float_left mrg_left_testimonial margin_testimonial">
        <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
    </div>
        </div>
    </div></div></div>
    <div class="rightbanner margin_top_ann">
        <div class="home_ad_r float_left font_size_12 ">Annons</div>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
        </div>
    </div>

