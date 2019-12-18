<script language="javascript" type="text/javascript">
    $(window).load(function () {


        var checkRight = $(".rightbanner").height();
        var checkLeft = $(".btshopleftdiv").height();

        if (checkLeft > checkRight)
        {
            $(".rightbanner").css({"height": checkLeft + "px"});
        } else
        {
            $(".btshopleftdiv").css({"height": checkRight + "px"});
        }

    });
</script>
<div class="maincontentpage" id="faq_main_div">
    <div class="inner-page-contetn-left">
        <div class="breadcrumb">
            <ul>
                <li><?php
include_component('isicsBreadcrumbs', 'show', array(
    'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstHjalpFAQ')
))
?> </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">


                <img src="/images/new_home/quest.png" alt="https://www.borstjanaren.se/images/new_home/quest.png" width="500;"><br /><br />
                <div class="whp_title">Hjälpsidor - FAQ</div> 

                <div class="whp_preamble_head">Välkommen till Börstjänarens hjälpsidor. Här får du t. ex. instruktioner om hur man registrerar sig, och svar på de vanligaste frågorna folk brukar ställa om vår webbplats. Om du inte finner vad du söker, tveka inte att
                    <a href="<?php echo 'https://' . $host_str . '/borst/contactUs' ?>"><?php echo __('kontakta oss!') ?></a></div>

<div class="float_left widthall">

                <div class="whp_heading"><?php echo __('Hjälp med registrering ') ?></div>



                V&auml;lkommen att skapa ett konto p&aring; B&ouml;rstj&auml;naren. Medlemskap p&aring; B&ouml;rstj&auml;naren &auml;r kostnadsfritt och  ger dig möjlighet att delta i forumdiskussioner, kommentara artiklar och även få tillgång till ett större antal artiklar. <br /><br />
                <b>När du registrerar</b> dig får du sju dagars gratisprov p&aring; v&aring;rt portf&ouml;ljabonnemang, som inte beh&ouml;ver s&auml;gas upp utan l&ouml;per ut av sig sj&auml;lv om du inte v&auml;ljer att f&ouml;rl&auml;nga det.<br />


                <!--<div class="whp-border">&nbsp;</div>!-->
                
                <div class="whp_heading"><?php echo __('Dagsbrev och veckobrev hjälp ') ?></div>



                Börstjänaren har två olika kostnadsfria marknadbrev: <br /><b>Dagsbrevet</b> – rekommenderas för den inbitne Börstjänaren. <br /><b>Veckobrevet</b> – ett måste för alla börsintresserade. <br /><br />
                Registrering respektive avregistrering för dessa sker på två olika registreringssidor:  <br />
                <a class="main_link_color" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstDayletter">Här kan du läsa mer om dagsbrevet</a> och adminsistrera din gratisprenumeration! <br />
                <a class="main_link_color" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstNewsletter">Här kan du läsa mer om veckobrevet</a> och adminsistrera din gratisprenumeration!<br />
                


                <!--<div class="whp-border">&nbsp;</div>!-->




                <div class="whp_heading"><?php echo __('BT-shop hjälp') ?></div>
                <b>BT-shop</b> är Börstjänarens e-handelsbutik. Där kan du köpa våra olika     abonnemang och utbildningar, såväl som böcker och   dataprogram   mm. Du betalar med kort eller mot faktura. <br/>

                <!--<div class="whp-border">&nbsp;</div>!-->



                <div class="whp_heading"><?php echo __('BT Charts hjälp') ?></div>
                <b>BT Charts</b> är Börstjänarens unika service där du kostnadsfritt får dagliga grafer på finansvärldens  mest intressanta marknader. <br />
                <br />
                <b>Dessutom kan du</b> köpa tilläggstjänster med färdiga strategier, utförligt kommenterade, som låter dig på egen hand skanna marknaderna efter köpvärda aktier, valutor och råvaror.<br/>
                <br />

                <b>Som oregistrerad användare</b> har du kostnadsfri tillgång till BT Chartsidans dagsgraf på var och en av de cirka 300 marknader vi följer. <br />
                <br />
                <b>Som registrerad kan du</b> även ta del av veckograferna, och som BT Insider får du också tillgång till långtidsgrafen. De övriga fem graferna är strategiska betaltjänster med expertkommentarer.
            </div>
            <?php echo include_partial('global/inner_bottom_footer'); ?>
        </div>
    </div></div>

    <div class="rightbanner padding_0 font_0 margin_top_ann">
        <div class="home_ad_r float_left font_size_12 ">Annons</div>
        <?php include_partial('global/ad_message') ?>
       
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
        </div>
