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
                    Hem
                </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
<div class="whp_title">Våra två storsäljare</div>
                <div class="whp_preamble">
                    Aktiv handlare eller långsiktig investerare? Börstjänarens två storsäljare ger dig allt du behöver för en aktiv trading på både kort och lång sikt!</div>
                <strong>Med Börstjänarens abonnemang</strong> lär du dig att trada professionellt så att du en dag kan handla helt på egen hand.
                <div class="float_left widthall"></div>
                  <div class="whp_heading">Tradingportföljen</div>
                  <p><strong> Tradingportföljen </strong>skannar av aktiemarknaden och   redovisar lättfattligt chansrika affärsförslag både för köp och blankning, så att du själv kan förvalta ditt kapital och tjäna pengar både i uppgång och nedgång<strong>. </strong> Läs mer och abonnera <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/portfolio">här!</a>
                 
                  
                  <div class="whp_heading">Henry Boy Trading</div>
                    <p>Henry Boy Trading-abonnemanget ger dig garanterad action med rappa affärsförslag  varje vecka!   Utbrottshandel – köp eller sälj blankt med en beprövad strategi för kort- eller långsiktiga affärer med stor potential. Läs mer <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/henryBoy">här!</a>
                    
                    <div class="whp_heading">Automatisk handel</div>
                  <p><strong> Båda dessa tjänster </strong>kan också anslutas till automatisk handel, så att du inte behöver lägga order själv utan köp och sälj utförs automatiskt på din depå enligt vald strategi. Du behöver då inte heller abonnera på affärsförslagen. Läs mer <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/automatic">här!</a>
                    
                <?php echo include_partial('global/bottom_footer_whitepage'); ?>
            </div>
        </div>
        <div class="inner_page_divider_3">&nbsp;</div>
        <div class="float_left mrg_left_testimonial margin_testimonial">
            <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
        </div>
    </div>
<div class="rightbanner autoheight padding_0">
      <div class="home_heading_r">
    <div class="home_ad_r float_left font_size_12 ">Annons</div>
    <?php //include_partial('global/ad_message') ?>
        <?php include_partial('global/right_top_ads', array('ad' => $ad_1)) ?>
        <?php include_partial('global/right_top_ads', array('ad' => $ad_2)) ?>        
        <?php include_partial('global/sponsorer_ad') ?>
        
        <!--<div class="home_ad_r_spons float_left">Annons</div> -->
        <?php include_partial('global/bulk_ads', array('bulk_ads' => $ad_3)) ?>
        <!--<div class="blank_10h">&nbsp;</div>-->
        <?php include_partial('global/right_top_ads', array('ad' => $ad_4)) ?>
        <?php if(count($twentyeight_2_thirtyfive)>0) {?><div class="home_adline_r_div">&nbsp;</div><?php }?>
    </div>
  </div>      
    </div>
</form>