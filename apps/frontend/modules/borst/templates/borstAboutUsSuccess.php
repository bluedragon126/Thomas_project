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
                    Om oss
                </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
            
                <div class="whp_title">Välkommen till Börstjänaren!</div>
                
                <div class="whp_preamble_head"><i>Börstjänaren</i> är en kostnadsfri sajt för personer med intresse för investeringar i aktie-, råvaru-, valuta- och kryptomarknaderna. Här finner du dagliga tips och analyser samt aktuella grafer över det mesta av intresse.
                </div>
                <div class="float_left widthall">
                
                    <div class="whp_heading">Börstips online sedan 2006</div>

                    <i>Börstjänaren</i> drivs av entusiaster med intresse för utbildning, fria marknader, teknisk trading och investeringar. Sajten <i>Börstjänaren</i> har funnits sedan 2006.
                  <br>
                    <br>
                
                
                  
                    <strong>Vi erbjuder utbildningar</strong> i aktiehandel och kapitalförvaltning, både nybörjarkurser och mer avancerade program.
                    
                      <br>
                    <br>
                    
                    <strong>På onsdagkvällar kl 20.00</strong> håller vi kostnadsfria webinarier, <i>Trejdingklubben online,</i> där vi går igenom marknaden, svarar på  deltagarnas frågor och ger börstips och investeringsförslag.

                    
                    
              
                    
                </div>
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
            <?php //include_partial('global/ad_message') ?>
            <div id="whitepage_ads">
                <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
            </div>
        </div>        
    </div>
</form>