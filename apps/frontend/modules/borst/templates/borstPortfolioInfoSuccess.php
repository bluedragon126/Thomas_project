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
<div class="maincontentpage">
    <div class="inner-page-contetn-left" >
        <div class="breadcrumb">
            <ul>
                <li><?php
include_component('isicsBreadcrumbs', 'show', array(
    'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstPortfolioInfo')
))
?> </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
                <div class="whp_title"><?php echo __('Portföljabonnemang') ?></div>

                <div class="float_left widthall">
                    <div class="whp_heading">Portföljabonnemang på Börstjänaren</div>
                   
                    <div class="blank_5h widthall">&nbsp;</div>
                    <div class="float_left widthall margin_20"><b>Du får mejl varje gång våra portföljer uppdateras,</b> oftast dagligen, med en länk till vår abonnentsida. Där kommenterar vi positionerna i våra portföljer (BT-portföljen & Kanalportföljen), uppdaterar nivåerna för limiterade order, ser över nödutgångarna och anpassar målkurserna.</div>

                    <div class="float_left widthall margin_20"><b>På Börstjänaren publiceras konstnadsfritt</b> en mängd köp- och säljförslag baserade på våra analyser. Till våra portföljer väljer vi dock bara ut de affärsförslag som har de bästa förutsättningarna.</div>

                    <div class="float_left widthall margin_20"><b>Börstjänaren arbetar efter sunda regler</b> för kapitalförvaltning. Det innebär att vi inte strävar efter en aktiv handel till varje pris. Under vissa perioder avvaktar vi, då vi bedömer risken som högre än den förväntade vinsten. Vi agerar bara när vi anser oss ha en fördel i marknaden.</div>
                </div>

                <div class="float_left widthall">
                    <div class="float_left widthall whp_heading">Så här fungerar det:</div>
                    <div class="float_left widthall margin_10">
                        <span class="float_left"><b>1.</b> Abonnentsidan publicerar portföljkommentarer och lättfattliga grafer över samtliga aktuella aktier i respektive portfölj. Här kan du följa innehavens utveckling i detalj.</span> 
                    </div>
                    <div class="float_left widthall margin_10">
                        <span class="float_left"><b>2.</b> På abonnentsidan finns även länkar till portföljerna, presenterade i excelark, med all information som behövs för du själv skall kunna göra samma affärer samtidigt och sköta ditt aktiekonto på ett professionellt sätt.</span> 
                    </div>

                    <div class="float_left widthall margin_20"><img class="borstportImg" src="<?php echo 'https://' . $host_str . '/images/article_images/img/image1255.jpg' ?>"></div>
                    <div class="float_left widthall whp_heading">Excelarket:</div>

                    <div class="float_left widthall margin_10">
                        <span class="float_left"><b>1.</b> Under "limiterade order" ser du de aktiva order vi har i marknaden. </span> 
                    </div>

                    <div class="float_left widthall margin_10">
                        <span class="float_left"><b>2.</b> När entrénivån träffas intas således en position automatiskt, den limiterade ordern fylls och därmed behöver man inte bevaka marknaden. </span> 
                    </div>

                    <div class="float_left widthall margin_10">
                        <span class="float_left"><b>3.</b> Entrénivåerna utgår för det mesta från ett rörligt medelvärde och ändras därmed ofta. Den för dagen aktuella entrénivån presenteras i excelarket. </span> 
                    </div>

                    <div class="float_left widthall margin_10">
                        <span class="float_left"><b>4.</b> Direkt efter entré placeras tre exitorder: en nödutgång (stop loss) för hela innehavet, samt två möjliga vinsthemtagningar, för vardera halva positionen: målkurs 1 och den lite högre siktande målkurs 2. </span> 
                    </div>

                    <div class="float_left widthall margin_10">
                        <span class="float_left"><b>5.</b> Om mål 1 träffas säljs halva således innehavet och nödutgången flyttas till entrénivån, för att på så sätt minska risken. </span> 
                    </div>

                    <div class="float_left widthall margin_10">
                        <span class="float_left"><b>6.</b> Risken i varje position varierar och kan vara upp till 0,5 procent av det totala portföljvärdet. (Det innebär att om en stop loss träffas, får förlusten inte bli större än 0,5 procent av det totala kapitalet dvs 500 kr för ett konto på 100 000 kr.) </span> 
                    </div>

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
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
        </div>
    </div>
</div>
