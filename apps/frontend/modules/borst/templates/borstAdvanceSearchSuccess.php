<!--[if IE 8]>
<style>
.input220{ width:223px;}
</style>
<![endif]-->
<!--[if IE 7]>
<style>
#adv_search_form .checkbox{
margin-top:-4px;
margin-bottom:-1px;
}
</style>
<![endif]-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">
    $(document).ready(function(){
        console.log("this is jqtrtans test");
        // $('form.user_reg').jqTransform();
        $('form').jqTransform();
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
<div class="inner-page-contetn-left" id="borst_advanced_search" >
    <div class="breadcrumb">
        <ul>
            <li><?php
include_component('isicsBreadcrumbs', 'show', array(
    'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstAdvanceSearch')
))
?> </li>
        </ul>
    </div>
    <div class="inner_page_divider">&nbsp;</div>
    <div class="float_l_width_100 mrg_left_70">
        <div class="inner_page_content_main">
            <div class="whp_title">Avancerad sökning</div>
            <form  class="adv_search_form" name="adv_search_form" id="adv_search_form" method="post" action="<?php echo url_for('borst/searchResult') ?>" onsubmit="return check_adv_search_parameter();">
                <input type="hidden" name="from_adv_search" value="1"/>
                <div class="float_left widthall">
                    <table width="100%" border="0" cellspacing="0" cellpadding="1">
                        <tr><td id="adv_search_error" colspan="6">&nbsp;</td></tr>
                        <tr>
                            <td width="42%" colspan="5" class=""><input name="phrase_in_page" id="adv_phrase_in_page" type="text"  class="form_input width_277 adv_search_inputs mrg_btm_2"/></td>
                            <td width="58%" class=""><div class="form_labels_advsearch">Artiklar som innehåller denna fras</div></td>
                        </tr>
                        <tr class="padtop_10">
                            <td colspan="5" class=""><input name="author_name" type="text" id="adv_author_name"  class="form_input width_277 adv_search_inputs mrg_btm_2"/></td>
                            <td  class=""><div class="form_labels_advsearch">Användare/författare</div></td>
                        </tr>
                        <tr>
                            <td ><input name="start_date_text" id="start_date_text" type="text"  class="form_input adv_search_inputs adv_cal_input"/></td>
                            <td ></td>
                            <td class="till">till</td>
                            <td ><input name="end_date_text" id="end_date_text" type="text"  class="form_input adv_search_inputs adv_cal_input"/></td>
                            <td ></td>
                            <td ><div class="form_labels_advsearch">Artiklar skrivna under perioden</div></td>
                        </tr>
                        <tr>
                            <td  colspan="6"><div class="blank_34h widthall">&nbsp;</div></td>
                        </tr>
                        <tr>
                            <td colspan="6"><span class="whp_subheading2"><img id="adv_ser_section" src="/images/addplusicon.png" class="float_left" alt="icon"  width="14"/> Vill du söka på fler kriterier? </span></td>
                        </tr>
                        <tr>
                            <td colspan="6"><div class="blank_7h widthall">&nbsp;</div></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <div id="adv_search_cat_type_combo"> </div>
                                <div id="adv_search_combo_set">                
                                </div></td>
                        </tr>
                        <tr>
                            <td colspan="6"><div class="blank_4h widthall">&nbsp;</div></td>
                        </tr>

                        <tr>
                            <td colspan="6" height="48px" valign="top"><div class="whp_subheading3">Begränsa sökningen till: </div></td>
                        </tr>

                        <tr>
                            <td colspan="6" height="22px">
                                <input name="search_from_borst" type="checkbox"  checked="checked" class="checkbox" id="search_from_borst" value="1" />
                                                          <!-- <input checked= "checked" class="checkbox" type="checkbox" id="nyhetsbrev" name="nyhetsbrev" value="ON" <?php echo $checked_brev; ?>> -->
                                &nbsp;Sök på Börstjänaren</td>
                        </tr>
                        <tr>
                            <!--<td colspan="6" height="22px"><input name="search_from_blog" type="checkbox" class="checkbox" value="1" id="search_from_blog" />
                                &nbsp;Sök på bloggar</td>-->

                        </tr>
                        <tr>
                            <!--<td colspan="6" height="22px"><input name="search_from_forum" type="checkbox" class="checkbox" value="1" id="search_from_forum" />
                                &nbsp;Sök på Forumet</td>-->
                        </tr>
                        <tr>
                            <!--<td colspan="6" height="22px"><input name="search_from_btchart" type="checkbox" class="checkbox" value="1" id="search_from_btchart" />
                                &nbsp;Sök på BT Charts</td>-->
                        </tr>           
                        <tr>
                            <td colspan="6" height="12px"><input name="search_from_btshop" type="checkbox" class="checkbox" value="1" id="search_from_btshop" />
                                &nbsp;Sök på BT Shop</td>
                        </tr>                         
                        <tr>
                            <!--<td colspan="6" height="22px"><input name="search_from_userlist" type="checkbox" class="checkbox" value="1" id="search_from_userlist" />
                                &nbsp;Sök på användare</td>-->
                        </tr>                                     
                    </table>
                    <div class="blank_18h widthall">&nbsp;</div>
                    <div class="registerbtn">
                        <div class="float_left">
                            <input type="submit" class="submit sok cursor" value="" name="submit" />
                        </div>
                        <span class="blank_5w">&nbsp;</span>
                        <div class="float_left">
                            <input type="reset" class="advsearch_reset submit cursor" value="" name="reset" />
                        </div>
                    </div>
                </div>
            </form>

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
    <?php include_partial('global/ad_message') ?>
    <div id="whitepage_ads">
        <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
    </div>
</div>


