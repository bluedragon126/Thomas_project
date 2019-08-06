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


                <img src="/images/new_home/quest.png" alt="http://www.borstjanaren.se/images/new_home/quest.png" width="500;"><br /><br />
                <div class="whp_title">Hjälpsidor - FAQ</div> 

                <div class="whp_preamble">Välkommen till Börstjänarens hjälpsidor. Här får du t. ex. instruktioner om hur man registrerar sig, och svar på de vanligaste frågorna folk brukar ställa om vår webbplats. Om du inte finner vad du söker, tveka inte att
                    <a href="<?php echo 'http://' . $host_str . '/borst/contactUs' ?>"><?php echo __('kontakta oss!') ?></a></div>

<div class="float_left widthall">

                <div class="whp_heading"><?php echo __('Hjälp med registrering ') ?></div>



                V&auml;lkommen att skapa ett konto p&aring; B&ouml;rstj&auml;naren. Medlemskap p&aring; B&ouml;rstj&auml;naren &auml;r kostnadsfritt och  ger dig möjlighet att delta i forumdiskussioner, kommentara artiklar och även få tillgång till ett större antal artiklar. <br /><br />
                När du registrerar dig får du sju dagars gratisprov p&aring; v&aring;rt portf&ouml;ljabonnemang, som inte beh&ouml;ver s&auml;gas upp utan l&ouml;per ut av sig sj&auml;lv om du inte v&auml;ljer att f&ouml;rl&auml;nga det.<br />


                <!--<div class="whp-border">&nbsp;</div>!-->
                
                <div class="whp_heading"><?php echo __('Dagsbrev och veckobrev hjälp ') ?></div>



                Börstjänaren har två olika kostnadsfria marknadbrev: <br />Dagsbrevet – rekommenderas för den inbitne Börstjänaren. <br />Veckobrevet – ett måste för alla börsintresserade. <br /><br />Registrering respektive avregistrering för dessa sker på två olika registreringssidor.  <br />
                <a class="main_link_color" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstDayletter">Här kan du läsa mer om DAGSBREVET</a> och adminsistrera din gratisprenumeration! <br />
                <a class="main_link_color" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstNewsletter">Här kan du läsa mer om VECKOBREVET</a> och adminsistrera din gratisprenumeration!<br />


                <!--<div class="whp-border">&nbsp;</div>!-->



                <div class="whp_heading"><?php echo __('BT Insider hjälp ') ?></div>

                V&auml;lkommen ocks&aring; att registrera dig till BT Insider, B&ouml;rstj&auml;narens n&auml;tverk f&ouml;r dig som vill blogga och skriva egna artiklar eller kommentarer! <br />
                <br />
                Medlemskap i  BT Insider &auml;r kostnadsfritt men kr&auml;ver en n&aring;got utf&ouml;rligare registrering, d&auml;r du &auml;ven beh&ouml;ver aktivera ditt konto via epost. <br />
                <br />
                F&ouml;r att registrera dig för BT Insider, klicka p&aring; texten &quot;Vill du kunna blogga och publicera artiklar?&quot; i 
                <a class="main_link_color" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt_user/sbtNewRegistration">registeringsformul&auml;ret.</a><br />
                <br />
                Om du redan &auml;r registrerad B&ouml;rstj&auml;nare kan du ut&ouml;ka ditt medlemskap till  BT Insider genom att g&aring; till <a class="main_link_color" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtUserProfile/take_to_profile/1"> Mitt konto</a> och v&auml;lja &quot;Editera profil&quot;.<br/>

                <!--<div class="whp-border">&nbsp;</div>!-->



                <div class="whp_heading"><?php echo __('Blogg hjälp ') ?></div>

                För att kunna blogga och delta i Börstjänarens trejdernätverk behöver du vara registrerad på BT Insider.<br />
                <br />
                Du sätter upp en blogg genom att </a>gå till  <a class="main_link_color" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>//sbt/editBlogProfile/">Editera bloggprofil</a> under Mina sidor. Där väljer du huvudbild samt text och färger till din blogg. <br />
                <br />
                Sedan är det bara att börja blogga genom att klicka på länken <a class="main_link_color" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>//sbt/sbtAddAnalysisBlog">Skapa artikel/blogg </a>i den rosa  BT-menyn.<br />

                <!--<div class="whp-border">&nbsp;</div>!-->



                <div class="whp_heading"><?php echo __('Skapa artikel hjälp ') ?></div>

                Som registrerad BT Insider  kan du skriva egna artiklar som är sökbara på sajten och visas i din profil. Du kan också skicka in din artikel för publicering  på BT Insiders förstasida. Och om detta blir en vana kan du promoveras till &quot;Murvel&quot; med rätt att publicera artiklar direkt.<br />
                <br />
                Artiklar för publicering behöver se ut på ett lite speciellt sätt: du måste bland annat välja, artikelkategorier, ingress och ingressbild som skall visas på förstasidan.
                <br />

                <!--<div class="whp-border">&nbsp;</div>!-->




                <div class="whp_heading"><?php echo __('Forum hjälp ') ?></div>

                BT Forum är formgivet för att kunna fylla ut kostymen som Sveriges bästa online mötesplats för aktie- och börsintresserade. Vårt mål är att strukturera ämnes- och intresseområdet, så att inlägg och trådar skall förbli sök- och finnbara samt förhoppningsvis intressanta och läsvärda under lång tid. <br />
                <br />
                De flesta användarna av BT Forum deltar och delar med sig under eget namn.Vänligen försök hålla en god ton och respektera den personliga integriteten.<br />
                <br />
                För att göra ett nytt inlägg i BT Forum: logga in, välj &quot;Skapa nytt ämne&quot; i forumet, samt kategori,  underkategori och rubrik, tyck till &ndash; och  posta!<br />


                <!--<div class="whp-border">&nbsp;</div>!-->



                <div class="whp_heading"><?php echo __('BT-shop hjälp') ?></div>
                BT-shop är Börstjänarens e-handelsbutik. Där kan du köpa våra olika     abonnemang och utbildningar, såväl som böcker och   dataprogram   mm. Du betalar med kort eller mot faktura. <br/>

                <!--<div class="whp-border">&nbsp;</div>!-->



                <div class="whp_heading"><?php echo __('BT Charts hjälp') ?></div>
                BT Charts är Börstjänrens unika service där du kostnadsfritt får dagliga grafer på finansvärldens  mest intressanta marknader. <br />
                <br />
                Dessutom kan du köpa tilläggstjänster med färdiga strategier, utförligt kommenterade, som låter dig på egen hand skanna marknaderna efter köpvärda aktier, valutor och råvaror.<br/>
                <br />

                Som oregistrerad användare har du kostnadsfri tillgång till BT Chartsidans dagsgraf på var och en av de cirka 300 marknader vi följer. <br />
                <br />
                Som registrerad kan du även ta del av veckograferna, och som BT Insider får du också tillgång till långtidsgrafen. De övriga fem graferna är strategiska betaltjänster med expertkommentarer.
            </div>
            <?php echo include_partial('global/inner_bottom_footer'); ?>
        </div>
    </div></div>

    <div class="rightbanner padding_0 font_0">
        <div class="home_ad_r float_left font_size_12">Annons</div>
        <?php include_partial('global/ad_message') ?>
       
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
        </div>
