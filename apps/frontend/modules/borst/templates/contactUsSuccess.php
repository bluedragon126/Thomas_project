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
                    Kontakta oss
                </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
                <div class="whp_title">Kontakta oss</div>
                <div class="whp_preamble">
                    Säkraste och bästa sättet att kontakta Börstjänaren är via e-post. Vi läser mejlen varje dag och  kan ofta svara med vändande post.</div>
                <div class="float_left widthall"> 
                <div class="whp_heading"> E-postadresser</div>
                    <div class="whp_heading_au">Kundtjänst</div>
                    kundtjanst#borstjanaren.se<br /><br />
                      <div class="whp_heading_au">Henrik Hallenborg</div>henrik.hallenborg#borstjanaren.se 
                    <br><br />
                    <div class="whp_heading_au">Thomas sandström</div>
                     thomas.sandstrom#borstjanaren.se 
                    <br>
                  <?php echo include_partial('global/bottom_footer_whitepage'); ?>            </p>
                </div>
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
