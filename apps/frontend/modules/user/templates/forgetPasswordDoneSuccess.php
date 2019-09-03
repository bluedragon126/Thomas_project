<script language="javascript" type="text/javascript">
    $(window).load(function(){
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
    'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'user/forgetPasswordDone')
))
?> </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
                <div class="whp_title"><?php echo __("Glömt lösenord") ?></div>
                <div class="float_left widthall">
                    <table width="100%" border="0" cellspacing="0" cellpadding="3" id="forget_password_page">
                        <tr>
                            <td><?php echo __('Ett nytt lösenord har skickats till din e-post!') ?></td>
                        </tr>
                    </table>
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
        <?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
        </div>
    </div>
</div>