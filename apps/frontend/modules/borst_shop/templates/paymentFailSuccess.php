<script type="text/javascript" language="javascript">
    $(window).load(function(){
        var leftHeight = $(".btshopleftdiv").height();
        var rightHeight = $(".rightbanner").height();
        var maxHeight = 0;
        if (rightHeight > leftHeight)
        {
            maxHeight = rightHeight;
        } else
        {
            maxHeight = leftHeight;
        }

        $(".rightbanner").css({"height": maxHeight + "px"});
        $(".btshopleftdiv").css({"min-height": maxHeight + "px"});
        
        var leftDiv = $('.inner-page-contetn-left').height();
        var rightDiv = $('.rightbanner').height();
        if(rightDiv > leftDiv){
            $('.rightbanner').css('border-left','1px solid #d3d3d3');
        }else{
            $('.inner-page-contetn-left').css('border-right','1px solid #d3d3d3');
        }
    });
</script>
<div class="maincontentpage margin-top-15m">
    <div class="inner-page-contetn-left margin-bottom-10m" style="border:none;">
        <div class="breadcrumb_div">
            <div>
                <div class="photoimg "><img alt="photo" src="/images/new_home/btshop.gif"></div>
                <div class="breadcrumb">
                    <ul>
                        <li><?php include_component('isicsBreadcrumbs', 'show', array('root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstHome'))); ?> </li>
                    </ul>
                </div>
            </div>
            <div class="floatRightNew"></div>
        </div>
        <div class="btshopleftdiv ptop_10">
            <div class="btshopleftdivinner">
                <div class="spacer"></div>
                <div class="shoph3 widthall"><?php echo __('Transaktionen misslyckades') ?></div>
                <div class="float_left widthall"><?php echo __('Kortbetalningen gick dessvärre inte igenom.') ?></div>
                <div class="float_left widthall"><?php echo __('Om du vill kan du') ?><b><a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst_shop/shopCart'; ?>"><?php echo __(' gå till varukorgen') ?></a></b><?php echo __(' och göra ett nytt försök, eller byta betalsätt.') ?></div>
                <div class="float_left widthall">
                    <span class="errormsg float_left"></span>
                </div> 
            </div>
        </div>
        <div class="mrg_top_49 floatLeft mrg_lft_60 margin_bottom_60">
            <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
        </div>
    </div>
    <div class="rightbanner padding_0 font_0 margin_top_ann" id="shop_rightbanner">
        <div class="home_ad_r float_left font_size_12 ">Annons</div>
        <?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
        </div>
    </div>
</div>