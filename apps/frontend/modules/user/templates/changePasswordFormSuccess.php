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

    });
</script>
<div class="maincontentpage">
    <div class="inner-page-contetn-left">
        <div class="breadcrumb">
            <ul>
                <li><?php
                    include_component('isicsBreadcrumbs', 'show', array(
                        'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'user/changePasswordForm')
                    ))
                    ?> </li>
            </ul>
        </div>
        <div class="btshopleftdiv">
            <div class="btshopleftdivinner">
                <div class="heading_red"><?php echo __('Ändra lösenord') ?></div>
                <?php if ($error_free == 1): ?>
                    <div class="shoph3 widthall"><?php echo __('Ditt lösenord har ändrats framgångsrikt.') ?></div>
                <?php else: ?>
                    <div class="blank_10h widthall">&nbsp;</div>
                    <form name="change_password_form" id="change_password_form" method="post" action="">
                        <div class="float_left widthall">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="change_password_page">
                                <tr>
                                    <td><font color="#FF0000"><?php echo html_entity_decode($is_error) ?></font></td>
                                </tr>
                            <tr>
                                <td>
                                    <div class="blank_10h widthall">&nbsp;</div>
                                    <div class="form_labels width_140 float_left">Gammalt lösenord</div>
                                    <div class="width_70per float_left margin_bottom_2"><input type="password" name="old_pass" id="old_pass" value="<?php echo $sf_params->get('old_pass') ?>" class="form_input width_277 contactus-inputs" size="25"/></div>	
                                </td>
                            </tr>
                            <tr>
                                <td>                                    
                                    <div class="form_labels width_140 float_left">Nytt lösenord</div>
                                    <div class="width_70per float_left margin_bottom_2"><input type="password" name="new_pass" id="new_pass" value="<?php echo $sf_params->get('new_pass') ?>" class="form_input width_277 contactus-inputs" size="25"/></div>	
                                </td>
                            </tr>
                            <tr>
                                <td>                                    
                                    <div class="form_labels width_140 float_left">Bekräfta nytt lösenord</div>
                                    <div class="width_70per float_left margin_bottom_2"><input type="password" name="repeat_new_pass" id="repeat_new_pass" value="<?php echo $sf_params->get('repeat_new_pass') ?>" class="form_input width_277 contactus-inputs" size="25"/></div>	
                                </td>
                            </tr>
                                <!--<tr>
                                    <td><input type="password" name="old_pass" id="old_pass" value="<?php echo $sf_params->get('old_pass') ?>"/>&nbsp;&nbsp;Gammalt lösenord</td>
                                </tr>
                                <tr>
                                    <td><input type="password" name="new_pass" id="new_pass" value="<?php echo $sf_params->get('new_pass') ?>"/>&nbsp;&nbsp;Nytt lösenord </td>
                                </tr>
                                <tr>
                                    <td><input type="password" name="repeat_new_pass" id="repeat_new_pass" value="<?php echo $sf_params->get('repeat_new_pass') ?>"/>&nbsp;&nbsp;Bekräfta nytt lösenord </td>
                                </tr>-->
                                <tr>                                    
                                    <td class="padding_top_10">
                                        <div class="form_labels width_140 float_left">&nbsp;</div>
                                        <input type="reset" class="registerbuttontext submit " value="Rensa" name="reset_btn" />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="padding_top_10">
                                        <div class="form_labels width_140 float_left">&nbsp;</div>
                                        <input type="submit" class="registerbuttontext submit " value="Ändra lösen" name="submit" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </div>
                    </form>
                <?php endif; ?>
                <?php echo include_partial('global/inner_bottom_footer'); ?>
            </div>
        </div>
    </div>
    <div class="rightbanner margin_top_none">
        <div class="home_ad_r float_left font_size_12 top_space">Annons</div>
        <div id="whitepage_ads">
        <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
        </div>
    </div>
</div>