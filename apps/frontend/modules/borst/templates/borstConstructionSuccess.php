<div class="maincontentpage">
    <div class="inner-page-contetn-left">
        <div class="breadcrumb">
            <ul>
                <li>
                    <a href="/">Börstjänaren</a> &gt;
                    Under konstruktion
                </li>
            </ul>
        </div>
        <div class="inner_page_divider">&nbsp;</div>
        <div class="float_l_width_100 mrg_left_70">
            <div class="inner_page_content_main">
                <div class="whp_title">Välkommen till nya Börstjänaren!</div>
                <div class="whp_preamble">Vår sajt är fortfarande under utveckling men vi går live ändå därför att det är bästa sättet att slutföra arbetet. 
                </div>
                <div class="float_left widthall">
                    <div class="whp_heading">Finslipning och inkörning pågår</div>

                    Vi arbetar fortfarande med finslipning av design och funktionalitet. Vi ber om fördragsamhet med eventuella fel och brister men hoppas att Börstjänaren redan nu skall erbjuda en bättre upplevelse än tidigare.<br>
                    <br>
                    <div class="whp_heading">Hör gärna av dig</div>

                    Om du stöter på någonting som ser konstigt ut eller inte verkar fungera som det ska, så är du jättevälkommen att höra av dig till oss. T.ex. via vår nya funktion <a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/enquiry" <?php echo $parent_menu == '10' ? 'class="selected redmintcolor"' : ''; ?>>Fråga BT!</a><br>
                    <br><b>Välkommen till en bättre Börstjänare!</b>

                 
                    <br>
                    <br>



                </div>
            </div>
            <?php echo include_partial('global/inner_bottom_footer'); ?>
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