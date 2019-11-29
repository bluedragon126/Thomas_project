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
                    Automatic
                </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
			<div class="whp_title">Automatisk handel</div>
                <div class="whp_preamble">Via AvaTrade kan du ansluta din depå till automatisk handel enligt en utvald strategi. Du behöver då inte lägga order själv. Entré och exit sker automatiskt när modellen ger signal. </div>
                <strong>När du ansluter ditt konto</strong> till automatisk handel behöver du inte ha något abonnemang på affärsförslagen. 
                <div class="float_left widthall"></div>
                  <div class="whp_heading">Henry Boy Automatic</div>
                  <p>Henry Boy Automatic är en automatisk applikation av vår vinstrika handelsmodell Henry Boy. Det fungerar så att du öppnar konto med vår sponsor AvaTrade och knyter detta konto till vårt Henry Boy program för automatisk orderläggning. <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/contactUs">Kontakta oss </a>för mer information!
                  <div class="whp_heading">BT-Multi Automatic</div>
                    <p>Om du vill förvalta dina pengar via en aktiv aktiehandel man inte vill, kan eller hinner lägga order själv, kan du ansluta ditt konto till BT Multi Automatic. Öppna då ett konto med vår sponsor AvaTrade och knyt  det till vårt  program BT Multi för automatisk orderläggning med aktiv handel i aktiemarknaden. <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/contactUs">Kontakta oss </a>för mer information!<br>
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