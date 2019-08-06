<style type="text/css">
    .medal_of_analysis{color:#333399;border:1px solid #333399;margin-top:10px;font-size:12px;padding:10px 0px 10px 0px;width:100%;}
    #desc_div p{ float:left; position:relative;}
</style>
<script type="text/javascript" language="javascript">
    $(document).ready(function(){

        //setHeightOnAllPage('homemiddiv','rightbanner');

        $('#sbt_desc_div p').find("img").each(function(index){
            //$(this).parent().addClass('float_left');
            var width = $(this).width();
            if(width > 630)		
                $(this).css({"width":630+"px"});
		
            var align = $(this).attr("align");
            if(align == 'left') $(this).css({"margin":"10px 10px 10px 0"});	
            if(align == 'right') $(this).css({"margin":"10px 0 10px 10px"});
            if(align == '') $(this).css({"margin":"10px 10px 10px 0"});		
	
            $('#sbt_desc_div').find("a").each(function(index){
                $(this).addClass('main_link_color');
            });

        });
	
    });
</script>
<!--[if IE 7]>
<style type="text/css">
.ieadj{ margin-top:-17px;}
</style>
<![endif]-->
<input type="hidden" id="userLogin" value="<?php echo $sf_user->isAuthenticated(); ?>" />
<div class="innerleftdiv"><!--maincontentpagesbt-->
    <div class="leftinnercolor"><!--innerleftdiv-->
        <div class="">
            <?php if ($analysis_data->id != ''): ?>
                <?php if (($analysis_data->published == 1 || $analysis_data->published == 7) || ($analysis_data->author_id == $user_id) || ($isSuperAdmin == 1)): ?>
                    <div class="photoimg"><img src="/images/inphoto.jpg" alt="photo" /></div>
                    <div class="breadcrumb">
                        <ul>
                            <li><?php
            include_component('isicsBreadcrumbs', 'show', array(
                'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstHome')
            ))
            ?> </li>
                        </ul>
                    </div>
                    <div class="in_date art_detail_date"><?php echo substr($analysis_data->created_at, 0, 10); ?></div>

        <?php //if($valid_user == 1): ?>
        <?php if ($add_in_fav_list == 0): ?>
                        <div id="f_analysis" class="float_left margin-right-3">
                            <a class="add_to_favorite" id="<?php echo 'analysis_' . $analysis_data->id . '_' . $user_id; ?>" name="<?php echo $analysis_data->analysis_title; ?>"><img width="85" src="/images/new_home/fav.png" alt="photo" /></a>
                        </div>
                    <?php elseif ($valid_user == 1 && $add_in_fav_list == 1): ?>
                        <div class="float_left margin_right_50 blackcolor"><img width="85" src="/images/new_home/fav_put.png" alt="Favourite" /></div>
                    <?php endif; ?>
        <?php //endif;  ?>
        <?php //if($rec_present == 0 && ($from_sbt == 1 || $isSuperAdmin == 1)): ?>

                <!--<a class="cursor" onclick="show_vote_meter('<?php //echo $valid_user;  ?>')">
                        <img alt="vote" src="/images/vote_symb.gif" /><font color="#547184">&nbsp;&nbsp;<a class="cursor" onclick="show_vote_meter('<?php echo $valid_user; ?>')"><font color="#547184"><?php echo __('Rösta') ?></font></a></font>
                </a>-->

        <?php //endif;  ?>



                    <?php /* ?><?php if($valid_user == 1):?>
                      <?php if($add_in_fav_list == 0):?>
                      <div id="f_analysis" class="float_left width_50p">
                      <a class="add_to_favorite" id="<?php echo 'analysis_'.$analysis_data->id.'_'.$user_id;?>" name="<?php echo $analysis_data->analysis_title; ?>">GÖR TILL FAVORIT</a>
                      </div>
                      <?php else:?>
                      <div class="float_left added_to_favorite blackcolor"><?php echo __('LAGD I FAVORITER')?></div>
                      <?php endif; ?>
                      <?php endif; ?><?php */ ?>

                        <?php if ($gold_cnt > 0 || $silver_cnt > 0 || $bronze_cnt > 0): ?>
                        <div class="float_left medal_of_analysis">
                            <?php if ($gold_cnt > 0): ?>
                                <div class="float_left height_25"><img src="/images/medal_gold.png" alt="gold_star" height="25" width="25" /></div>
                                <div class="float_left height_25"><?php echo __('Awarded as Analysis of the year') ?></div>
                            <?php endif; ?>

                            <?php if ($silver_cnt > 0): ?>
                                <div class="float_left height_25"><img src="/images/medal_silver.png" alt="silver_star" height="25" width="25" /></div>
                                <div class="float_left height_25"><?php echo __('Awarded as Analysis of the month') ?></div>
                            <?php endif; ?>

                            <?php if ($bronze_cnt > 0): ?>
                                <div class="float_left height_25"><img src="/images/medal_bronze.png" alt="bronze_star" height="25" width="25" /></div> 
                                <div class="float_left height_25"><?php echo __('Awarded as Most Popular Analysis') ?></div>
                        <?php endif; ?>
                        </div>
        <?php endif; ?>
                    <div class="float_l_width_100 mrg_left_70">
                        <h1 class="art_title"><?php echo $analysis_data->analysis_title; ?></h1>
                        <div class="float_left widthall mbottom_10">
                            <div class="ingress bt_art_ingress_text"><?php echo $analysis_data->image_text; ?></div>
                            <div id="sbt_desc_div" class="float_left width_520"><?php echo html_entity_decode($analysis_data->analysis_description); ?></div>

                            <div class="float_left widthall mbottom_10">
                                <span class="float_left sbt_violet_font"><b><?php /* echo __('Författare') */ ?></b></span>
                                <span class=""><a class="cursor main_link_color" href="<?php echo'https://' . $host_str . '/sbt/sbtMinProfile/id/' . $analysis_data->author_id ?>"><?php echo $profile->getFullUserName($analysis_data->author_id); ?></a></span><br />
                                <?php if ($combine_data_str): ?>
                                    <span class="float_left sbt_violet_font"><b><?php echo __('Författarsamarbete') ?>:</b></span>
                                    <span class="float_left mleft_5"><?php echo html_entity_decode($combine_data_str); ?></span>
        <?php endif; ?>
                            </div>

                        </div>

                        <div class="contactdell widthall padding_0">
                            <div class="float_left widthall"><font color="#c50063"><b>Börstjänaren</b></font></div>
                            <div class="float_left widthall"><!--<a href="mailto:info@borstjanaren.se" class="main_link_color">--><font color="#547184">info@borstjanaren.se </font><!--</a>--></div>
                            <div class="blank_10h widthall">&nbsp;</div>
                            <div class="float_left widthall" id="total_comment">
                                    <?php if ($rec_present == 0 && ($from_sbt == 1 || $isSuperAdmin == 1)): ?>
                                    <div class="float_left widthall">
            <?php //include_partial('global/share_link_bottom')  ?>
                                        <!-- AddThis Button BEGIN -->
                                        <div class="addthis_default_style ">
                                            <a href="https://www.addthis.com/bookmark.php?v=250&amp;username=borstjanaren" class="addthis_button t_deco_none">
                                                <font color="#547184"><?php echo __('Dela') ?> </font>&nbsp;<img alt="strip" src="/images/smallcolorstrip.jpg" />
                                            </a>
                                        </div>
                                    </div>

                                    <div class="float_left width_270">
                                        <a class="float_left" href="<?php echo 'https://' . $host_str . '/sbt/commentOnArticle/article_id/' . $analysis_data->id ?>"><span class="float_left sbt_vote_text ptop_3"><?php echo __('Kommentera') ?></span></a>
                                        <a class="float_left" href="<?php echo 'https://' . $host_str . '/sbt/commentOnArticle/article_id/' . $analysis_data->id ?>">
                                            <span class="float_left sbt_comment_bubble_icon ptop_3">
                                                <img class="float_left" src="/images/chaticon_violet.png" alt="chaticon" />
                                            </span>
                                        </a>
                                        <a class="float_left" href="<?php echo 'https://' . $host_str . '/sbt/commentOnArticle/article_id/' . $analysis_data->id ?>">
                                            <span class="float_left mleft_3 sbt_violet_font ptop_3"><?php echo $cmt_cnt ? $cmt_cnt : 0; ?></span>
                                        </a>
                                            <?php if ($rec_present == 0): ?>
                                            <span class="float_left sbt_rating_star ptop_3">
                                                <?php for ($i = 1; $i <= $no_of_stars; $i++): ?>
                                                    <img class="float_left" alt="star" src="/images/ratingstar_org.png" />
                <?php endfor; ?>
                                            </span>
                                            <a class="float_left main_link_color cursor" onclick="show_vote_meter('<?php echo $valid_user; ?>')">
                                                <span class="float_left sbt_vote_text mleft_3"><img class="float_left" alt="vote" src="/images/vote_symb.gif" /></span>
                                                <span class="float_left sbt_vote_text mleft_3 ptop_3"><?php echo __('Röster') ?> : <font color="#c50063"><?php echo $total_vote_cnt; ?></font></span>
                                            </a>
                <?php if ($userId == $analysis_data->author_id && ($sf_user->hasGroup('SbtArticlePublisher') || ($analysis_data->published != 1 && $analysis_data->published != 8)) || $isSuperAdmin == 1): ?>
                                                <span class="float_right width_20p">
                                                    <a href="<?php echo 'https://' . $host_str . '/sbt/editAnalysis/article_id/' . $analysis_data->id; ?>"><img src="/images/edit.png" alt="down" /></a>
                                                </span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    </div>
                                    <?php else: ?>
                                    <div class="float_left widthall">
            <?php //include_partial('global/share_link_bottom')  ?>
                                        <!-- AddThis Button BEGIN -->
                                    <?php echo include_partial('global/social_network_link') ?>
                                    <div class="float_left widthall"><img src="/images/new_home/article_pict.png" class="article_pict_mrg" width="50"/><span class="art_subheading"><?php echo __('Andra artiklar av samma författare:'); ?></span></div>
                                    <div class="float_left widthall art_topic"><?php echo html_entity_decode($similar_article_list); ?></div>
                                    </div>
                                    <div class="float_left mrg_top_15">
                                        <span class="float_left sbt_vote_text"><?php echo __('Kommentera') ?></span>
                                        <a class="float_left main_link_color" href="<?php echo 'https://' . $host_str . '/sbt/commentOnArticle/article_id/' . $analysis_data->id ?>">
                                            <span class="float_left sbt_comment_bubble_icon">
                                                <img class="float_left" src="/images/chaticon_violet.png" alt="chaticon" />
                                            </span>
                                        </a>
                                        <a class="float_left main_link_color" href="<?php echo 'https://' . $host_str . '/sbt/commentOnArticle/article_id/' . $analysis_data->id ?>">
                                            <span class="float_left mleft_3 sbt_violet_font"><?php echo $cmt_cnt ? $cmt_cnt : 0; ?></span>
                                        </a>
                                        <span class="float_left sbt_rating_star">
                                            <?php for ($i = 1; $i <= $no_of_stars; $i++): ?>
                                                <img alt="star" src="/images/ratingstar_org.png" />
            <?php endfor; ?>
                                        </span>
                                        <span class="float_left sbt_vote_text mleft_3"><?php echo __('Röster') ?> : <font color="#c50063"><?php echo $total_vote_cnt; ?></font></span>
                                    </div>
        <?php endif; ?>
                            </div>
                        </div>

                        <div id="article_vote_option" class="float_left widthall ptop_10 hide_div">
                            <form name="vote_article_form" id="vote_article_form" method="post" action="">
                                <input type="hidden" name="article_id" id="article_id" value="<?php echo $analysis_data->id; ?>"/>
                                <table id="hh" cellpadding="0" cellspacing="0" border="0" class="vote_panel">
                                    <tr class="height_41">
                                        <td class="pleft_8 font_16"><font color="#e8a800"><b><?php echo __('Rösta') ?></b></font></td>
                                    </tr>
                                    <tr class="height_12">
                                        <td width="90" class="pleft_8">
                                            <?php for ($i = 0; $i <= 4; $i++): ?>
                                                <img alt="star" src="/images/ratingstar_org.png" />
        <?php endfor; ?>
                                        </td>
                                        <td><input type="radio" class="radio" name="vote_type" id="vote_type" value="5" /></td>
                                        <td><font color="#000000"><?php echo __('Toppen') ?></font></td>
                                    </tr>
                                    <tr class="height_20">
                                        <td width="90" class="pleft_8">
                                            <?php for ($i = 0; $i < 4; $i++): ?>
                                                <img alt="star" src="/images/ratingstar_org.png" />
                                            <?php endfor; ?>
                                            <?php for ($i = 0; $i < 1; $i++): ?>
                                                <img alt="star" src="/images/ratingstar_gray.png" />
        <?php endfor; ?>
                                        </td>
                                        <td><input type="radio" class="radio" name="vote_type" id="vote_type" value="4" /></td>
                                        <td><font color="#000000"><?php echo __('Bra') ?></font></td>
                                    </tr>
                                    <tr class="height_20">
                                        <td width="90" class="pleft_8">
                                            <?php for ($i = 0; $i < 3; $i++): ?>
                                                <img alt="star" src="/images/ratingstar_org.png" />
                                            <?php endfor; ?>
                                            <?php for ($i = 0; $i < 2; $i++): ?>
                                                <img alt="star" src="/images/ratingstar_gray.png" />
        <?php endfor; ?>
                                        </td>
                                        <td><input type="radio" class="radio" name="vote_type" id="vote_type" value="3" /></td>
                                        <td><font color="#000000"><?php echo __('Okej') ?></font></td>
                                    </tr>
                                    <tr class="height_20">
                                        <td width="90" class="pleft_8">
                                            <?php for ($i = 0; $i < 2; $i++): ?>
                                                <img alt="star" src="/images/ratingstar_org.png" />
                                            <?php endfor; ?>
                                            <?php for ($i = 0; $i < 3; $i++): ?>
                                                <img alt="star" src="/images/ratingstar_gray.png" />
        <?php endfor; ?>
                                        </td>
                                        <td><input type="radio" class="radio" name="vote_type" id="vote_type" value="2" /></td>
                                        <td><font color="#000000"><?php echo __('Nja...') ?></font></td>
                                    </tr>
                                    <tr class="height_20">
                                        <td width="90" class="pleft_8">
                                            <?php for ($i = 0; $i < 1; $i++): ?>
                                                <img alt="star" src="/images/ratingstar_org.png" />
                                            <?php endfor; ?>
                                            <?php for ($i = 0; $i < 4; $i++): ?>
                                                <img alt="star" src="/images/ratingstar_gray.png" />
        <?php endfor; ?>
                                        </td>
                                        <td><input type="radio" class="radio" name="vote_type" id="vote_type" value="1" /></td>
                                        <td><font color="#000000"><?php echo __('Dålig') ?></font></td>
                                    </tr>
                                    <tr class="height_20">
                                        <td width="90" class="pleft_8">
                                            <?php for ($i = 0; $i <= 4; $i++): ?>
                                                <img alt="star" src="/images/ratingstar_gray.png" />
        <?php endfor; ?>
                                        </td>
                                        <td><input type="radio" class="radio" name="vote_type" id="vote_type" value="0" /></td>
                                        <td><font color="#000000"><?php echo __('Urusel') ?></font></td>
                                    </tr>
                                    <tr>
                                        <td class="pleft_8">
                                            <div class="submit_votebutton float_left"><input type="button" name="post_data" id="post_data" class="submit_votebuttontext submit" value="<?php echo __('Rösta  nu') ?>" onclick="submit_vote()"/></div></td>
                                    </tr>
                                </table>
                            </form>
                            <div class="float_left mleft_10 sbt_article_vote_error" id="vote_error"></div>
                        </div>
    <?php else: ?>
                        <div class="in_date">&nbsp;</div>
                        <div class="photoimg">&nbsp;</div>
                        <br />
                        <br />
                        <div class="shoph3 mtop_30 widthall"><?php echo __('This Article is not Published Yet ..!') ?></div>
                        <div class="float_left widthall mbottom_10">
                            <div class="float_left widthall mtop_25 mbottom_12">&nbsp;</div>
                        </div>
                        <div class="float_left widthall">
                            <span class="float_left"><?php echo __('To View the Article List, click') ?><a class="main_link_color" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/articleList"><?php echo __(' here') ?></a></span>
                        </div>
    <?php endif; ?>
<?php else: ?>
                    <div class="in_date">&nbsp;</div>
                    <div class="photoimg">&nbsp;</div>
                    <br />
                    <br />
                    <div class="shoph3 widthall mtop_30"><?php echo __('Artikeln finns inte.') ?></div>
                    <div class="float_left widthall mbottom_10">
                        <div class="float_left widthall  mtop_25 mbottom_12">&nbsp;</div>
                    </div>
                    <div class="float_left widthall">
                        <span class="main_link_color"><?php echo __('För att se en lista över artiklar, klicka') ?><a class="main_link_color" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/articleList"><?php echo __(' här') ?></a></span>
                    </div>
<?php endif; ?>
            </div>

                        
                <div class="article_details_ad_wrap">
                    <div class="bottom_shop_border">&nbsp;</div>
                    <div class="footer_inner_div">
                        <div class="float_left">
                            <div class="color_plate_first">
                                <div class="color_plate_img_first_article"><img src="/images/new_home/bottom_bt-shop_logo.png" width="97" height="89" /></div>
                                <div class="bottom_shop_txt_main">
                                    <div class="bottom_shop_cart">Välkommen 
<br /> till BT-shop <br />– affären för<br /> bättre affärer!</div>
                                </div>
                            </div>
                            <?php $adCount = 1; ?>
                            <?php foreach ($adData as $article): ?>
                                <?php $modAdCount = $adCount % 2; ?>
                                <a class="blackcolor cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>">
                                    <div class="color_plate">
                                        <?php if ($article->btshop_product_image): ?>
                                            <div class="color_plate_img"><img src="/uploads/btshopThumbnail/<?php echo $article->btshop_product_image; ?>" width="102" height="94" class="color_plate_img_radius"/></div>
                                        <?php else: ?>
                                            <div class="color_plate_img"><img src="/images/new_home/bottom_shop_img1.png" width="102" height="94" class="color_plate_img_radius"/></div>
                                        <?php endif; ?>
                                        <div class="bottom_shop_txt_main">
                                            <div class="<?php
                            if ($modAdCount == 1) {
                                echo 'bottom_shop_rub2';
                            } else {
                                echo 'bottom_shop_rub1';
                            }
                                        ?>"><?php echo $article->btshop_article_title; ?></div>
                                                 <?php if ($article->btshop_article_subtitle): ?>
                                                <span class="<?php
                                     if ($modAdCount == 1) {
                                         echo 'bottom_shop_ingress2';
                                     } else {
                                         echo 'bottom_shop_ingress1';
                                     }
                                                     ?>"><?php echo substr($article->btshop_article_subtitle, 0, 58); ?></span>
                                                <span class="<?php
                                      if ($modAdCount == 1) {
                                          echo 'bottom_shop_price2';
                                      } else {
                                          echo 'bottom_shop_price1';
                                      }
                                                     ?>"><?php echo str_replace(',', ' ', number_format($article->getLeastPriceOfProduct($article->id))) ?>&nbsp;KR</span>
                                                <!--<span class="bottom_shop_readmore">Läs mer...</span>-->
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </a>
                                <?php
                                $adCount++;
                            endforeach;
                            ?>
                        </div>
                    </div>
                    <div class="bottom_shop_border2">&nbsp;</div>
                </div>
                        
                        
        </div>
    </div>
<?php echo include_partial('global/bottom_three_article', array('host_str' => $host_str, 'cat_arr' => $cat_arr, 'type_arr' => $type_arr, 'object_arr' => $object_arr, 'col1_13_heading_style_start' => $col1_13_heading_style_start, 'col1_13_heading_style_end' => $col1_13_heading_style_end, 'col1_45_div_style' => $col1_45_div_style, 'col1_67_heading_style' => $col1_67_heading_style, 'col1_814_heading_style' => $col1_814_heading_style, 'col1_1417_heading_style' => $col1_1417_heading_style, 'image_arr_13' => $image_arr_13, 'image_arr_67' => $image_arr_67, 'image_arr_814' => $image_arr_814, 'image_arr_1417' => $image_arr_1417, 'one_2_three' => $one_2_three, 'four_2_five' => $four_2_five, 'six_2_eight' => $six_2_eight, 'nine_2_ten' => $nine_2_ten, 'eleven_2_thirteen' => $eleven_2_thirteen, 'fourteen_2_fifteen' => $fourteen_2_fifteen, 'sixteen_2_nineteen' => $sixteen_2_nineteen, 'twenty_2_twentythree' => $twenty_2_twentythree, 'twentyfour_2_twentyseven' => $twentyfour_2_twentyseven, 'comment_cnt' => $comment_cnt, 'mymarket' => $mymarket, 'hide_right_border' => '1', 'month' => $month, 'left_records' => $left_records, 'mcol_body_text' => $mcol_body_text, 'secondLimit' => $secondLimit, 'article_limit' => $article_limit, 'fcol_hor_title' => $fcol_hor_title, 'fcol_ver_title' => $fcol_ver_title, 'fcol_big_title' => $fcol_big_title, 'fcol_body_text_6_7' => $fcol_body_text_6_7, 'fcol_body_text_2_3' => $fcol_body_text_2_3, 'fcol_body_text_1_4_5' => $fcol_body_text_1_4_5)); ?>	
    <!--<div class="colorstrip">&nbsp;</div>-->
</div>
<?php echo include_partial('global/right_banner_article', array('host_str' => $host_str, 'cat_arr' => $cat_arr, 'type_arr' => $type_arr, 'object_arr' => $object_arr, 'col1_13_heading_style_start' => $col1_13_heading_style_start, 'col1_13_heading_style_end' => $col1_13_heading_style_end, 'col1_45_div_style' => $col1_45_div_style, 'col1_67_heading_style' => $col1_67_heading_style, 'col1_814_heading_style' => $col1_814_heading_style, 'col1_1417_heading_style' => $col1_1417_heading_style, 'last_column_style' => $last_column_style, 'image_arr_13' => $image_arr_13, 'image_arr_67' => $image_arr_67, 'image_arr_814' => $image_arr_814, 'image_arr_1417' => $image_arr_1417, 'last_column_img' => $last_column_img, 'twentyeight_2_thirtyfive' => $twentyeight_2_thirtyfive, 'comment_cnt' => $comment_cnt, 'mymarket' => $mymarket, 'ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'month' => $month)); ?>
<?php include_partial('global/six_cube_footer', array('host_str' => $host_str, 'bottom_commodities_links' => $bottom_commodities_links, 'bottom_currencies_links' => $bottom_currencies_links, 'bottom_buysell_links' => $bottom_buysell_links, 'bottom_statistics_links' => $bottom_statistics_links, 'bottom_aktier_links' => $bottom_aktier_links, 'bottom_kronika_links' => $bottom_kronika_links, 'month' => $month)) ?>
	

