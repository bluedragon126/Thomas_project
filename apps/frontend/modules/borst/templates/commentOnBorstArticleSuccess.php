<script language="javascript" type="text/javascript">
    $(window).load(function () {

        var checkRight = $(".rightbanner").height();
        var checkLeft = $(".innerleftdiv").height();

        if (checkLeft > checkRight)
        {
            //$(".rightbanner").css({"height":checkLeft+"px"});
        } else
        {
            //	$(".innerleftdiv").css({"height":checkRight+"px"});
        }

    });
</script>
<script type="text/javascript" language="javascript">
    $(document).ready(function () {

        $('#borst_article_comment_subject').css('margin-bottom', 10);
        $('#borst_article_comment_subject').css('width', 490);

        $('#borst_comment_desc_div p').find("img").each(function (index) {
            var width = $(this).width();
            if (width > 630)
                $(this).css({"width": 630 + "px"});
        });

        $('#borst_comment_desc_div p').find("a").each(function (index) {
            $(this).css({"color": '#5F7A8B'});
        });
        $('#borst_comment_desc_div p').find("strong a").each(function (index) {
            $(this).css({"color": '#174E96'});
        });
        $('html, body').scrollTo($('#article_comment_text_error'));

    });
</script>
<div class="maincontentpage">
    <div class="innerleftdiv">
        <div class="leftinnercolor">

            <?php if ($article_data->article_id != ''): ?>

                <div class="breadcrumb">
                    <ul>
                        <li><?php
            include_component('isicsBreadcrumbs', 'show', array(
                'root' => array('text' => $first_menu, 'uri' => $first_url)
            ))
                ?> </li>
                    </ul>
                </div>
                <?php //if($article_data): ?>
                <div class="in_date"><?php echo substr($article_data->article_date, 0, 10); ?></div>
                <h1 class="inheading width_100_per"><?php echo $article_data->title; ?></h1>

                <div class="ingress bt_art_ingress_text">
                    <?php echo html_entity_decode($article_image_text); ?>
                </div>

                <div id="borst_comment_desc_div" class="float_left width_520">
                    <?php echo html_entity_decode($article_description_text); ?>
                    <div class="blank_5h widthall">&nbsp;</div>
                    <div class="float_left widthall mbottom_20">
                        <?php if ($article_data->author_id): ?>
                            <span class="float_left width_100_per>
                                  <a class="width_100_per cursor main_link_color" href="<?php echo 'http://' . $host_str . '/sbt/sbtMinProfile/id/' . $article_data->author_id ?>">
                                  <img src="/images/grafik/<?php echo $author->code ?>.gif"/>
                                </a>
                            </span>

                            <span class="float_left  main_link_color"><a class="cursor main_link_color" href="<?php echo 'http://' . $host_str . '/sbt/sbtMinProfile/id/' . $article_data->author_id ?>"><?php echo $author->name ? $author->name : ($profile->getFullUserName($article_data->author_id) ? $profile->getFullUserName($article_data->author_id) : ''); ?></a></span><br />
                        <?php endif; ?>
                    </div>
                </div>
                <div class="float_left width_100_per"><?php echo iconv("windows-1252", "UTF-8", $sf_data->getRaw('file_content')); ?></div>
                <?php if ($sf_user->hasFlash('notice')): ?>
                    <div class="greenmsg_article" id="greenmsg_article">
                        <?php
                        echo $sf_user->getFlash('notice');
                        ?>
                    </div>
                <?php endif; ?>

                <div class="float_left width_100_per margin_top_10"><b><?php echo 'Tidigare artiklar på Börstjänaren:'; ?></b></div>
                <div class="float_left width_100_per"><?php echo html_entity_decode($similar_article_list); ?></div>
            <?php else: ?>
                <div class="in_date">&nbsp;</div>
                <div class="photoimg">&nbsp;</div>
                <br />
                <br />
                <div class="shoph3 widthall width_100_per margin_top_25"><?php echo __('Article does not exist..') ?></div>
                <div class="float_left width_100_per margin_top_25"><span class="main_link_color"><?php echo __('To View the Article List, click') ?><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/articleList"><?php echo __(' here') ?></a></span></div>	
            <?php endif; ?>
        </div>

        <?php echo include_partial('global/borst_bottom_three_article', array('host_str' => $host_str, 'cat_arr' => $cat_arr, 'type_arr' => $type_arr, 'object_arr' => $object_arr, 'col1_13_heading_style_start' => $col1_13_heading_style_start, 'col1_13_heading_style_end' => $col1_13_heading_style_end, 'col1_45_div_style' => $col1_45_div_style, 'col1_67_heading_style' => $col1_67_heading_style, 'col1_814_heading_style' => $col1_814_heading_style, 'col1_1417_heading_style' => $col1_1417_heading_style, 'image_arr_13' => $image_arr_13, 'image_arr_67' => $image_arr_67, 'image_arr_814' => $image_arr_814, 'image_arr_1417' => $image_arr_1417, 'one_2_three' => $one_2_three, 'four_2_five' => $four_2_five, 'six_2_eight' => $six_2_eight, 'nine_2_ten' => $nine_2_ten, 'eleven_2_thirteen' => $eleven_2_thirteen, 'fourteen_2_fifteen' => $fourteen_2_fifteen, 'sixteen_2_nineteen' => $sixteen_2_nineteen, 'twenty_2_twentythree' => $twenty_2_twentythree, 'twentyfour_2_twentyseven' => $twentyfour_2_twentyseven, 'twentyeight_2_thirtyfive' => $twentyeight_2_thirtyfive, 'comment_cnt' => $comment_cnt, 'hide_right_border' => '1', 'month' => $month)); ?>

    </div>
    <div class="rightbanner padding_0 font_0">
        <div class="home_ad_r float_left font_size_12 top_space">Annons</div>
        <?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
        </div>
    </div>
    <div class="colorstrip">&nbsp;</div>
    <?php include_partial('global/six_cube_footer', array('host_str' => $host_str, 'bottom_commodities_links' => $bottom_commodities_links, 'bottom_currencies_links' => $bottom_currencies_links, 'bottom_buysell_links' => $bottom_buysell_links, 'bottom_statistics_links' => $bottom_statistics_links, 'bottom_aktier_links' => $bottom_aktier_links, 'bottom_kronika_links' => $bottom_kronika_links)) ?>
</div>

<!-- ui-dialog-delete-article -->
<div id="delete_article_comment_confirm_box" title="Delete Article Comment Confirmation">
    <table width="100%"  border="0" cellspacing="3" cellpadding="0">
        <tr>
            <td id="delete_article_comment_msg">Message:</td>
        </tr>
    </table>
</div>
<!--<script>edit_comment_article();</script>-->