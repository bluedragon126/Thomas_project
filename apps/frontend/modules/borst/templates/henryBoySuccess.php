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
    <div class="inner-page-contetn-left">
        <div class="breadcrumb">
            <ul>
                <li>
                    <a href="/">Tjänster</a> &gt;
                    Henry Boy
                </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
			<div class="whp_title">Henry Boy Trading</div>
                <div class="whp_preamble">
                    Sedan 2010 har Börstjänaren skickat ut <i>Henry Boy</i> tradesignaler varje vecka  via e-post till abonnenter med enastående resultat.</div> 
                <div class="whp_preamble2_it">Henry Boy</strong> kan du sköta själv via ett abonnemang med aktiva affärsförslag, eller knyta ditt konto till automatisk handel.</div>
                <div class="float_left widthall"></div>
                  <div class="whp_heading">Henry Boy abonnemang</div>
                  <i>Henry Boy Trading</i> är en teknisk sättupp med fasta regler för hur man skall agera vid varje given situation. <i>Henry Boy Trading</i> levereras via  mejl ca en gång per vecka. <br />
<br />
<strong>Sedan starten 2010</strong> har signalerna avkastat osannolika 5307%. Läs mer om <i>Henry Boy Trading</i> och abonnera <a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/shopProductDetail/product_id/244">här!</a>
                 
                  
                  <div class="whp_heading">Henry Boy Automatic</div>
                    Om man inte vill lägga order själv, går det bra att teckna sig för <i>Henry Boy Automatic.</i> Det fungerar så att du öppnar konto med vår sponsor <i>AvaTrade</i> och knyter detta konto till vårt <i>Henry Boy-program</i> för automatisk orderläggning. <a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/contactUs">Kontakta oss</a> för mer information!<br>
                <?php echo include_partial('global/bottom_footer_whitepage'); ?>
           
        
        <div class="inner_page_divider_3">&nbsp;</div>
        
            <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
        <div class="float_left mrg_left_testimonial margin_testimonial"></div>
     </div></div> </div>
   
    <div class="rightbanner padding_0 font_0 margin_top_ann">
        <div class="home_ad_r float_left font_size_12 ">Annons</div>
        <?php include_partial('global/ad_message') ?>
        
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
        </div>
    </div>    
</div>