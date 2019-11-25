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
                    <a href="/">Tradingkonto</a> &gt;
                    Hem
                </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
<div class="whp_title">Våra Trading Partners</div>
                <div class="whp_preamble">
                    Vi tror på långsiktiga relationer som ger stabilitet och trygghet. Därför kan vi varmt rekommendera våra två partners sedan mer än tio år, AvaTrade och GFF Brokers för dig som vill öppna ett tradingkonto.</div>
                <strong>Ava och GFF är de de mäklare vi själva använder</strong>. De har funnits på vår sajt i vått och torrt sedan tidernas begynnelse.
                <div class="float_left widthall"></div>
                  <div class="whp_heading">AvaTrade</div>
                  <p><strong> Dublinbaserade AvaTrade</strong> är en världsledande CFD-mäklare, som vi samarbetat med oavbrutet sedan 2010. Om du vill ha en pålitlig europeisk mäklare med hög integritet och personlig service är AvaTrade, med vår egen personliga mäklare Mark Mates, vår rekommendation. AvaTrade är global partner till Manchester City Football Club. Läs mer <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/avaTrade">här!</a><br>
                  <div class="whp_heading">Global Futures &amp; Forex (GFF Brokers)</div>
                    <p>Amerikanska  GFF är vår samarbetspartner sedan 2008 och vår rekommenderade aktör när det gäller terminshandel. GFF är  Introducing Broker till vår amerikanska Commodity Trading Advisor-verksamhet. Vare sig du vill handla terminer själv eller följa något av våra CTA-program är Global det självklara valet med pålitlig service och den vassa handelsplattformen Global Zen Trader. Läs mer <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/gffBrokers">här!</a><br>
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
    <div class="home_ad_r float_left font_size_12 top_space">Annons</div>
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