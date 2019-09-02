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

    });

</script>
<div class="maincontentpage">
    <div class="inner-page-contetn-left">
        <div class="breadcrumb">
            <ul>
                <li><?php
include_component('isicsBreadcrumbs', 'show', array(
    'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstJobba')
))
?> </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
                <div class="whp_title">Jobba p&aring; B&ouml;rstj&auml;naren</div>
                <!-- <div class="shoph3 widthall">Rubrik här då</div>-->
                <div class="whp_preamble">Börstjänaren är en webbplats av trejdare för trejdare. Vi söker personer som delar vårt intresse och vill vara med och utveckla vår sajt. </div>
                <br />

                <div class="blank_30h widthall">&nbsp;</div>
                <div class="float_left widthall margin_bottom_20"> <b>Att jobba på Börstjänaren</b> innebär att ta eget ansvar i en trejdingfrämjande och stödjande miljö.</div>

                <div class="float_left widthall margin_bottom_20"> <b>Är du intresserad</b> av att bidra till Börstjänaren? Tveka inte att höra av dig! Vi är öppna för det mesta i vår strävan att bygga Sveriges bästa sajt för aktiv börshandel.</div><br />

                <div class="float_left widthall"> <b>Vi vill för närvarande ha hjälp med:</b>   börskommentarer, översättning, textförfattande, redigering m.m.</div>

                <?php echo include_partial('global/bottom_footer_whitepage'); ?> 
            </div>

        </div>
    </div>

    <div class="rightbanner padding_0 font_0 margin_top_ann">
        <div class="home_ad_r float_left font_size_12 ">Annons</div>
        <?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
        </div>
    </div>
    <div class="inner_page_divider_3">&nbsp;</div>
    <div class="float_left mrg_left_testimonial margin_testimonial">
        <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
    </div>

</div>