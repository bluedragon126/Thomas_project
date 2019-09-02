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
        var leftDiv = $('.inner-page-contetn-left').height();
        var rightDiv = $('.rightbanner').height();
        if(rightDiv > leftDiv){
            $('.rightbanner').css('border-left','1px solid #d3d3d3');
        }else{
            $('.inner-page-contetn-left').css('border-right','1px solid #d3d3d3');
        }
    });

</script>
<!-- Google Code for lead Conversion Page -->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 1013944780;
    var google_conversion_language = "en";
    var google_conversion_format = "3";
    var google_conversion_color = "ffffff";
    var google_conversion_label = "WUbRCMy_mgMQzKO-4wM";
    var google_conversion_value = 1.00;
    var google_conversion_currency = "USD";
    var google_remarketing_only = false;
    /* ]]> */
</script>
<script type="text/javascript"
        src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt=""
         src="//www.googleadservices.com/pagead/conversion/1013944780/?value=1.00&amp;currency_code=USD&amp;label=WUbRCMy_mgMQzKO-4wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<div class="maincontentpage">
    <div class="inner-page-contetn-left" style="border:none;">
        <div class="breadcrumb">
            <ul>
                <li><?php
include_component('isicsBreadcrumbs', 'show', array(
    'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstRisk')
))
?> </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
                <div class="whp_title">Tack för din kursanmälan!</div>
                <!-- <div class="shoph3 widthall">Rubrik här då</div>-->

                <div class="whp_preamble">Ett bekräftelsemejl med vidare instruktioner för deltagande i  kursen har skickats till din angivna e-postadress. </div>

                <div class="blank_10h widthall">&nbsp;</div>
                Om du vill kan du dock redan nu <a href="https://attendee.gotowebinar.com/register/4266190144750066690" target="_blank">registrera dig till lektionerna!</a>

                <br />
                Och / eller <a href="http://www.avatrade.com/join-ava/demo-account?tradingplatform=2&dealtype=1&mtsrv=mt2&tag=8947&tag2=~profile_AvaPPC_2015" title="AvaTrade Demo" target="_blank">öppna ett demokonto hos AvaTrade!</a>     
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
        <?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
        </div>
    </div>    
</div>


