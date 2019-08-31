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
    'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstSkolan')
))
?> </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
                <div class="kronikorinfo"></div>
                <div class="kronikorinfo">
                    <a class="cursor blackcolor" href="<?php echo 'http://' . $host_str . '/borst/articleList/kat_id/9' ?>">
                    
                
                    
                        <div class="whp_heading"><?php echo __('Bosse Börstjänare ') ?></div>
                        <b>Bosse Börstjänare</b>
                        besvarar läsarbrev och ser till att hjälpa dem som <br/>
                        på olika sätt hamnat i trångmål eller bryderier på börsen. Utmärkt som <br/>
                        introduktion för mindre erfarna aktiespekulanter.
                    </a>
                    <!--<div class="whp-border">&nbsp;</div>!-->
                </div>
                <div class="kronikorinfo">
                    <a class="cursor blackcolor" href="<?php echo 'http://' . $host_str . '/borst/articleList/type_id/12' ?>">
                        <div class="whp_heading"><?php echo __('Börspsykologi ') ?></div>
                        <b>Det största hindret</b>
                        mot en lyckosam tradingkarriär är du själv. I våra<br/>
                        krönikor om tradingpsykologi får du inblick i vilka psykologiska utmaningar<br/>
                        som möter en trader och vad som kan göras för att övervinna dem
                    </a>
               <!--<div class="whp-border">&nbsp;</div>!-->
                </div>
                <div class="kronikorinfo">
                    <a class="cursor blackcolor" href="<?php echo 'http://' . $host_str . '/borst/articleList/type_id/11' ?>">
                        <div class="whp_heading"><?php echo __('Riskhantering ') ?></div>
                        <b>Dessa krönikor är</b>
                        den allra mest lönsamma läsningen du någonsin<br/>
                        kommer att finna på Börstjänaren! Riskhantering och money management<br/>
                        är den oundgängliga nyckeln till vinnande aktiehandel. Läs och lär hur<br/>
                        man skall tänka och agera för att överleva för att trada även i morgon!
                    </a>
                    <!--<div class="whp-border">&nbsp;</div>!-->
                </div>
                <div class="kronikorinfo">
                    <a class="cursor blackcolor" href="<?php echo 'http://' . $host_str . '/borst/articleList/type_id/13' ?>">
                        <div class="whp_heading"><?php echo __('Börsstrategi & börstaktik') ?></div>
                        <b>Varje framgångsrik trader</b>
                        har sin egen strategi, sitt eget sätt att <br/>
                        attackera marknaden. Här kan du bl. a. läsa om de olika strategier <br/>
                        vi tillämpar i våra analyser och vår trading.
                    </a>
                    <!--<div class="whp-border">&nbsp;</div>!-->
                </div>
                <div class="kronikorinfo">
                    <a class="cursor blackcolor" href="<?php echo 'http://' . $host_str . '/borst/articleList/type_id/21' ?>">
                        <div class="whp_heading"><?php echo __('Klassisk teknisk analys') ?></div>
                        <b>Den sk tekniska aktieanalysen</b>
                        bygger på studium av grafer och <br/>
                        grunderna identifiering av trender. I denna digra artikelserie går vi igen <br/> 
                        i den klassiska tekniska analysen, dvs det som farfar gjorde utan <br/>
                        datorernas hjälp.
                    </a>
                    <!--<div class="whp-border">&nbsp;</div>!-->
                </div>
                <div class="kronikorinfo">
                    <a class="cursor blackcolor" href="<?php echo 'http://' . $host_str . '/borst/articleList/type_id/16' ?>">
                        <div class="whp_heading"><?php echo __('Derivat') ?></div>
                        <b>Utbudet av derivatinstrument</b>
                        har exploderat på senare år. Optioner,<br/>
                        terminer och warranter har fått sällskap av CFD:er, ETF:er, Open End<br/>
                        Certifikat mm. Här reder vi ut begreppen och förklarar fördelar<br/>
                        och risker med produkterna.<br/><br/><br/>
                    </a>
                    <!--<div class="whp-border">&nbsp;</div>-->
                </div>
                <?php echo include_partial('global/bottom_footer_whitepage'); ?>
            </div>
        </div>
        <div class="inner_page_divider_3">&nbsp;</div>
        <div class="float_left mrg_left_testimonial margin_testimonial"><img src="/images/new_home/testimonial_L.png" width="500"/></div>
    </div>
    <div class="rightbanner padding_0 font_0">
        <div class="home_ad_r float_left font_size_12 top_space">ANNONS</div>
        <?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
        </div>
    </div>    
</div>






