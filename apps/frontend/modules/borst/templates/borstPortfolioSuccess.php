<script type="text/javascript" language="javascript">
    $(window).load(function(){

        //Amit changes 31-1-2011
        var hArray = new Array();
        hArray[0] = $(".btshopleftdiv").height();
        hArray[1] = $(".rightbanner").height(); 
 
        if(hArray[0] > hArray[1])
            var maxHeight = hArray[0];
        else
            var maxHeight = hArray[1];

 
        $(".btshopleftdiv").css({"height":maxHeight+"px"});
        $(".rightbanner").css({"height":maxHeight+"px"});

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
    <div class="inner-page-contetn-left" style="border:none;">
        <div class="breadcrumb">
            <ul>
                <li><?php
include_component('isicsBreadcrumbs', 'show', array(
    'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstPortfolio')
))
?> </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
                <div class="whp_title"><?php echo __('Börstjänarens portföljer') ?></div>
                <!-- <div class="shoph3 widthall">Rubrik här då</div>-->
                <div class="whp_preamble">Som betalande medlem på Börstjänaren har du tillgång till våra portföljer. Börstjänarens portföljer reflekterar vår egen kapitalförvaltning och strategiutveckling. </div>
                <br />

                <div class="blank_30h widthall">&nbsp;</div>
                <div class="float_left widthall">
                    <div class="float_left widthall margin_10"><b>BT-portföljen:</b> vår egen väldokumenterade riskjusterade handel på USA-börsen.</div>

                    <div class="float_left widthall margin_10"><b>Kanalportföljen:</b> Riskjusterad modellportfölj med svenska aktier.</div><br />

                </div>
                <div class="float_left widthall"><b>Se</b> exempel på <a class="main_link_color cursor" href="<?php echo 'http://' . $host_str . '/borst/borstArticleDetails/article_id/4553' ?>">daglig portföljuppdatering! </a></div>
                <div class="float_left widthall"><b>Läs</b> mer om <a class="main_link_color cursor" href="<?php echo 'http://' . $host_str . '/borst/borstPortfolioInfo' ?>">Börstjänarens portföljabonnemang! </a></div>
                <div class="float_left widthall"><b>Prova</b> portföljabonnemang <a class="main_link_color cursor" href="<?php echo 'http://' . $host_str . '/sbt_user/sbtNewRegistration' ?>">gratis! </a></div>
                <div class="float_left widthall"><b>Uppgradera</b> till <a class="main_link_color cursor" href="<?php echo 'http://' . $host_str . '/borst/changeSetting' ?>">portföljabonnemang! </a></div>

            </div>
            <?php echo include_partial('global/bottom_footer_whitepage'); ?>
        </div>
        <div class="inner_page_divider_3">&nbsp;</div>
        <div class="float_left mrg_left_testimonial margin_testimonial">
            <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
        </div>
    </div>
    <div class="rightbanner padding_0 font_0 margin_top_ann">
        <div class="home_ad_r float_left font_size_12 ">Annons</div>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
        </div>
    </div>      
</div>

