<script language="javascript" type="text/javascript">
    $(window).load(function(){
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
    <div class="inner-page-contetn-left">
        <div class="breadcrumb">
            <ul>
                <li>
                    <a href="/">Börstjänaren</a> &gt;
                    Riskvarning
                </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
                <div class="whp_title">Riskvarning</div>
                <div class="whp_preamble_head">
                    Morningbriefing Börstjänaren AB frånsäger sig allt ansvar för direkt eller indirekt förlust eller skada av vad slag det vara må, som grundar sig på användandet av information från Börstjänarens webbplats eller nyhetsbrev.
                </div>
                <div class="float_left widthall">
                    <div class="whp_heading">
                        Överväg noga</div>
                    Risken för förlust vid börshandel kan vara betydande. Du bör därför noga överväga om en sådan handel är lämplig för dig med tanke på din situation och dina ekonomiska resurser.
                    <br><br>
                    <b>Börshandel har stora</b> potentiella risker, utöver eventuella belöningar. Du måste vara medveten om riskerna och villig att acceptera dem, för att investera enligt de strategier och modeller som beskrivs på denna webbplats.
                    <br><br>

                    <b>Riskera inte pengar</b> du inte har råd att förlora. Du kan förlora mer pengar än du avsett att sätta på spel. Investeringar utefter de handelsmodeller som redovisas på denna webbplats görs helt på egen risk. Du bör kontakta din mäklare eller finansiella rådgivare innan du placerar i de här angivna strategierna

                    <br><br>
                    <b>Informationen på Börstjänaren</b> tar inte hänsyn till någon specifik mottagares särskilda investeringsmål, ekonomiska situation eller behov. Information från Börstjänaren är inte att betrakta som en personlig rekommendation eller ett investeringsråd.
                    <br><br>

                    <b>Varje investeringsbeslut</b> fattas självständigt av användaren och på dennes eget ansvar.

                    <div class="float_left widthall">
                        <div class="whp_heading">
                            Risk</div>
                        Historisk avkastning är ingen garant för framtida avkastning. Investeringar i finansiella instrument är förknippade med risk och en investering kan både öka och minska i värde eller komma att bli värdelös.                                                      
                    </div>
                </div>
                <?php echo include_partial('global/bottom_footer_whitepage'); ?> 
            </div>
        </div> 
        <div class="inner_page_divider_3">&nbsp;</div>
        <div class="float_left mrg_left_testimonial margin_testimonial">
            <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
        </div>
    </div>
    <div class="rightbanner padding_0 margin_top_ann">
        <div class="home_ad_r float_left font_size_12 ">Annons</div>
        <?php include_partial('global/ad_message') ?>
        
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
        </div>
    </div>    
</div>
