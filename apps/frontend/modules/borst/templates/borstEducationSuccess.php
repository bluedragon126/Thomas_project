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

    });
</script>
<div class="maincontentpage">
    <div class="inner-page-contetn-left">
        <div class="breadcrumb">
            <ul>
                <li><?php
include_component('isicsBreadcrumbs', 'show', array(
    'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstEducation')
))
?> </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
                <div class="whp_title">Börstjänarens sponsrade
                    utbildningar</div>
                <!-- <div class="shoph3 widthall">Rubrik här då</div>-->
                <div class="blank_5h widthall">&nbsp;</div>
                <div class="whp_preamble">Börstjänaren erbjuder sponsrade, lärarledda online-utbildningar i teknisk trejding, där du som deltagare
                    har möjlighet att gå kursen kostnadsfritt eller få  kursavgiften tillbaka, genom att bli kund hos någon
                    av våra samarbetspartners.</div>
                <div class="blank_40h widthall">&nbsp;</div>
                <!-- <div class="eduborder">&nbsp;</div>-->
                <div class="whp_heading">Aktuella kurser</div>
              <div class="blank_10h widthall">&nbsp;</div>
              
                <div class="float_left coursescorses widthall">
                    <table  border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <th width="170" scope="col">Kurs</th>
                            <th width="105" scope="col">När</th>
                            <th width="100" scope="col">Kostnad</th>
                            <th scope="col">Samarbetsparner</th>
                        </tr>
                        <tr>
                            <td><a href="http://www.borstjanaren.se/borst_shop/shopProductDetail/product_id/124">Fredagstrejding</a></td>
                            <td>27/2-17/4</td>
                            <td><a href="http://www.borstjanaren.se/borst_shop/borstShopHome">Se BT-SHOP</a></td>
                            <td>VIP-partners</td>
                        </tr>
                        <tr>
                            <td><a href="http://www.borstjanaren.se/borst_shop/shopProductDetail/product_id/108">Intensivkurs i Daytrading</a></td>
                            <td>17/3-14/4</td>
                            <td><a href="http://www.borstjanaren.se/borst_shop/borstShopHome">Se BT-SHOP</a></td>
                            <td>CMC Markets</td>
                        </tr>
                        <tr>
                            <td><a href="http://www.borstjanaren.se/borst_shop/shopProductDetail/product_id/120">Lär dig handla med CFD</a></td>
                            <td>27/1-24/2</td>
                            <td><a href="http://www.borstjanaren.se/borst_shop/borstShopHome">Se BT-SHOP</a></td>
                            <td>CMC Markets</td>
                        </tr>
                        <tr>
                            <td><a href="http://www.borstjanaren.se/borst_shop/shopProductDetail/product_id/99" class="main_link_color">BT-Wizard</a></td>
                            <td>Tillgänglig via <br />inspelning</td>
                            <td><a href="http://www.borstjanaren.se/borst/contactUs">Kontakta oss</a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                    </table>
                </div>
               
                <div class="float_left widthall">



                </div> 
                <div class="float_left widthall"></div>
                 <!--<div class="blank_25h widthall">&nbsp;</div>-->
                <!--<div class="eduborder">&nbsp;</div> -->
             
                    <div class="whp_heading">Kommande kurser</div>
               
                Inga kurser inplanerade för närvarande.
<br><br><br>
            </div>
            <?php echo include_partial('global/bottom_footer_whitepage'); ?> 
        </div>
    </div>
</div>
    <div class="rightbanner padding_0 font_0">
        <div class="home_ad_r float_left font_size_12">Annons</div>
        <?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
        </div>
    </div>
    <div class="inner_page_divider_3">&nbsp;</div>
    <div class="float_left mrg_left_testimonial margin_testimonial">
        <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
    </div>
</div>


