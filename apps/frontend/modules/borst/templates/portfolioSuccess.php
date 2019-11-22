<script language="javascript" type="text/javascript">
    $(window).load(function () {
        var leftDiv = $('.inner-page-contetn-left').height();
        var rightDiv = $('.rightbanner').height();
        if (rightDiv > leftDiv) {
            $('.rightbanner').css('border-left', '1px solid #d3d3d3');
        } else {
            $('.inner-page-contetn-left').css('border-right', '1px solid #d3d3d3');
        }
    });
</script>
<div class="maincontentpage">
    <div class="inner-page-contetn-left" >
        <div class="breadcrumb">
            <ul>
                <li>
                    <a href="/">Tjänster</a> &gt;
                    BT-portföljen
                </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
<div class="whp_title">Tradingportföljen</div>
                <div class="whp_preamble">
                    Börstjänarens portfölj har har sedan starten 2007 hållit en jämn, hög nivå med en träffsäkerhet på 70% i användarvänliga rekylaffärer. </div> 
                Tradingportföljen kan du sköta själv via ett abonnemang eller knyta ditt konto till automatisk handel.
                <div class="float_left widthall"></div>
                  <div class="whp_heading">Tradingportföljen abonnemang</div>
                  <p><strong>Med Tradingportföljen</strong><em> </em> kan du lära sig riktig trading med sunda principer för att hantera risken. Ett abonnemang ger dig insikt i en verklig portfölj och hur den förvaltas med tekniska kvantitativa modeller som grund. Läs mer och abonnera <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/shopProductDetail/product_id/245">här!</a>
                 
                  
                  <div class="whp_heading">BT Multi Automatic</div>
                    <p>Om du inte vill lägga order själv, kan du teckna dig för automatisk orderläggning. Det fungerar så att du öppnar ett konto med vår sponsor AvaTrade och knyter det till handelsprogrammet BT Multi Automatic som lägger order på ditt konto. Läs mer <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/shopProductDetail/product_id/245">här!</a><br>
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

            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
        </div>
    </div>    
</div>