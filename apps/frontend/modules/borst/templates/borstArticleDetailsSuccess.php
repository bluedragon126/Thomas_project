
<script type="text/javascript" language="javascript">
    $(window).load(function(){
        
        $('#borst_desc_div').find("img").each(function(index){
            if($(this).width() > 600){
                $(this).css('max-width','600px');
            }
            //alert($(this).width());
            if($(this).width() < 500){
                $(this).css('margin-left', '0px');
                $(this).css('margin-top', '7px');
            }else if($(this).width() > 500){
                $(this).css('margin-left', '-50px');
                $(this).css('margin-top', '7px');
            }
        });
	
        $('#borst_desc_div').find("a").each(function(index){
            $(this).addClass('main_link_color');
        });
	
        var jQbrowser = navigator.userAgent.toLowerCase();
        jQuery.os = {
            mac: /mac/.test(jQbrowser),
            win: /win/.test(jQbrowser),
            linux: /linux/.test(jQbrowser)
        };
        if(jQuery.os.mac) 
        {
            $(".addthis_button span").css({"line-height":"16px"});
        }
    });


    $(document).ready(function() {
        $(".custome_button_twitter").live("click",function(){
            var twitimagetext = '<?php echo $article_image_text ? html_entity_decode($article_image_text) : "" ?>';
            var currentUrl = window.location.href;
            if((twitimagetext.length + currentUrl.length) > 140)
            {
                twitimagetext = twitimagetext.substring(0,139 - (currentUrl.length + 3));
                twitimagetext = twitimagetext + "...";
            }
            var url = "http://twitter.com/share?text="+twitimagetext+"&url="+currentUrl;
            window.open(url, "Share on twitter", "top=300,left=350,width=500,height=500");
        });
		
        /* code by sandeep */
        var twitimagetext = '<?php echo $article_image_text ? html_entity_decode($article_image_text) : "" ?>';        
        var titletext = $('title').text()+' | '+twitimagetext;
        $('title').text(titletext);
        /* code by sandeep end */
        
        $(".breadcrumb ul li").dotdotdot({
            //	configuration goes here
            ellipsis	: '... '
        });
    });

    function paginationPopup(obj){
        var offset = $(obj).position();
        $(obj).next().css("left",offset.left-68);
        var obj1 = $(".forum_drop-down-menu_page");
        if($(obj1).val()==0){
            $(obj1).removeClass("color232222");
            $(obj1).addClass("colorb9c2cf");
        }else{
            $(obj1).removeClass("colorb9c2cf");
            $(obj1).addClass("color232222");
        }
        $(obj).next().toggle();
    }
	
    function paginationPopupGo(obj){
        var object_id = $('#object_id').val();
        var page = $(".forum_drop-down-menu_page").val();
        var pagination_numbers = $('.similar_article_listing_pager').html();
        $('.similar_article_listing_pager').html('<span class="">'+pagination_numbers+'</span>');
        $('#pop-box-over').show();
        $('.indicator').css('display','block');
        $.post("/borst/getSimilarArticles?object_id="+object_id+"&page="+page, function(data){
            $('.similar_article_listing').html(data);
            $('.indicator').hide();
            $('#pop-box-over').hide();
        });
    }
	
    function paginationPopupSelect(obj){
        if($(obj).val()==0){
            $(obj).removeClass("color232222");
            $(obj).addClass("colorb9c2cf");
        }else{
            $(obj).removeClass("colorb9c2cf");
            $(obj).addClass("color232222");
        }
    }
	
	
</script>
<!--[if IE 7]>
<style type="text/css">
.ieadj{ margin-top:-17px;}
</style>
<![endif]-->
<span class="float_left indicator loader loader_posiotion"><img src="/images/ajax-loader_blk.gif" /></span>
<input type="hidden" id="userLogin" value="<?php echo $sf_user->isAuthenticated(); ?>" />
<?php if ($valid_user == 1) { ?>
    <input type="hidden" id="object_id" value="<?php echo $article_data->object_id; ?>" />
    <div class="innerleftdiv article_leftinner_marginTop_6px" id="borst_article_detail">
        <div>
            <div class="breadcrum_menus">
            <?php if ($article_data->article_id != ''): ?>
                <!--<div class="photoimg"><img src="/images/inphoto.jpg" alt="photo" /></div>-->
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
                <div class="in_date art_detail_date"><?php echo substr($article_data->article_date, 0, 10); ?></div>

                <?php if ($add_in_fav_list == 0): ?>
                    <div id="f_article" class="float_leftart_detail_fav art_detail_fav">
                        <a class="add_to_favorite" id="<?php echo 'article_' . $article_data->article_id . '_' . $user_id; ?>" name="<?php echo $article_data->title; ?>"><img width="85" src="/images/new_home/fav.png" alt="photo" /></a>
                    </div>
                <?php else: ?>
                    <div class="float_left blackcolor"><img width="85" src="/images/new_home/fav_put.png" alt="Favourite" /><?php //echo __('LAGD I FAVORITER')         ?></div>
                <?php endif; ?>

                <div class=" float_left print_ancr"> <a class="main_link_color float_left" href="#" onclick="setPrintCss()"><img alt="Print" title="Print" src="/images/printer.png" width="22" /></a></div>
                
            </div>
                <br />
                <br />
                <div class="float_l_width_100 mrg_left_70">
                    <div class="inner_page_content_main">
                        <div class="art_title"><?php echo $article_data->title; ?></div>

                            <div class="whp_preamble">
                                <?php echo html_entity_decode($article_image_text); ?>
                            </div>

                        <div id="borst_desc_div" class="float_left">
                            <?php
                            if ($article_access) {
                                if ($flag) {
                                    echo include_partial('article_access_text');
                                    echo '<a href="/borst_shop/shopArticleDetail/product_id/' . $article_access_id . '">Klicka h&auml;r f&ouml;r att låsa upp denna artikel i BT Shop! =></a></br></br>';
                                } elseif ($message) {
                                    echo '<div class="shoph3 widthall mtop_30">' . $message . '</div>';
                                } else {
                                    echo (html_entity_decode($article_description_text));
                                }
                            }
                            ?>
                        </div>
                        <div class="blank_5h widthall">&nbsp;</div>
                        <div class="float_left widthall mbottom_article">
                            <?php if ($article_data->author_id): ?>
                                <span class="float_left width_100_per">
                                    <a  class="cursor main_link_color" href="<?php echo 'http://' . $host_str . '/sbt/sbtMinProfile/id/' . $article_data->author_id ?>">
                                        <img src="/images/grafik/<?php echo $author->code ?>.png"  width="38"/>
                                    </a>
                                </span>

                                <span class="float_left  main_link_color"><a class="cursor main_link_color" href="<?php echo 'http://' . $host_str . '/sbt/sbtMinProfile/id/' . $article_data->author_id ?>"><?php echo $author->name ? $author->name : ($profile->getFullUserName($article_data->author_id) ? $profile->getFullUserName($article_data->author_id) : ''); ?></a></span>
                                
                                <div class="float_left mtop_5 width_640"> 
                        <?php
                        //code change by sandeep only condition added for publisher
                        if ($sf_user->isAuthenticated() && $sf_user->getAttribute('isSuperAdmin', '', 'userProperty') == '1' || $sf_user->hasGroup('Publisher')) : //
                            ?><br />
                            <a class="main_link_color edit_this" href="<?php echo 'http://' . $host_str . '/backend.php/borst/createArticle/action_mode/edit_article/article_id/' . $article_data->article_id ?>">Editera denna artikel</a>
                        <?php endif; ?>
                    </div>
                                <br />
                            <?php endif; ?>
                        </div>
                    </div>    
                    <div class="social_icons">                    
                        <?php echo include_partial('global/social_network_link', array('article_data' => $article_data)) ?>
                    </div>
                    <div class="similar_article_listing">
                        <div class="inner_page_content_main">
                            <div class="float_left widthall"><?php echo iconv("windows-1252", "UTF-8", $sf_data->getRaw('file_content')); ?></div>
                            <div class="float_left widthall"><img src="/images/new_home/article_pict.png" class="article_pict_mrg" width="50"/><span class="art_subheading"><?php echo 'Tidigare artiklar på Börstjänaren:'; ?></span></div>
                            <div class="blank_12h widthall">&nbsp;</div>
                            <div class="float_left widthall art_topic">
                                <?php //var_dump($pagerForSimilarArticles->getResults()); ?>
                                <?php //echo html_entity_decode($similar_article_list);   ?>
                                
                                <table cellpadding="0" cellspacing="0" border="0">
                                    <?php
                                    foreach ($pagerForSimilarArticles->getResults() as $list) {
                                        echo '<tr><td class="related_article_date">' . substr($list->article_date, 0, 10) . '</td><td><a class="related_article_title" href="http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $list->article_id . '">' . $list->title . '<a/></td></tr>';                                        
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <div class="clearAll"></div>
                        <div class="paginationwrapperNew">
                            <div class="forum_pag similar_article_listing_pager" id="">
                                <?php if ($pagerForSimilarArticles->haveToPaginate()): ?>
                                    <?php if ($pagerForSimilarArticles->getFirstPage() != $pagerForSimilarArticles->getPage()) { ?>
                                                                                                                  <a id="<?php echo $pagerForSimilarArticles->getFirstPage(); ?>" class="cursor"><!--<img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a>--><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pagerForSimilarArticles->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
                                        <?php } ?>
                                        <?php
                                        $links = $pagerForSimilarArticles->getLinks(11);
                                        foreach ($links as $page):
                                            ?>
                                            <?php if ($page == $pagerForSimilarArticles->getPage()): ?>
                                                <?php echo '<span class="selected">' . $page . '</span>' ?>
                                            <?php else: ?>
                                                <a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
                                            <?php endif; ?>
                                            <?php if ($page != $pagerForSimilarArticles->getCurrentMaxLink()): ?>

                                            <?php endif ?>
                                        <?php endforeach ?>
                                        <?php if ($pagerForSimilarArticles->getLastPage() != $pagerForSimilarArticles->getPage()) { ?>
                                                                                                                                                        <a id="<?php echo $pagerForSimilarArticles->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pagerForSimilarArticles->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span><!--<img src="/images/pag_arrow_right.jpg" alt="arrow" />--> </a>
                                        <?php } ?>
                                        <span>Sid <?php echo $pagerForSimilarArticles->getPage(); ?> av <?php echo $pagerForSimilarArticles->getLastPage(); ?></span>
                                        <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                                        <div class="forum_popup_pagination_wrapper" noclick="1" >
                                            <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                                                <option noclick="1" value="0">Gå till sida...</option>
                                                <?php for ($pg = 1; $pg <= $pagerForSimilarArticles->getLastPage(); $pg++) { ?>
                                                    <option noclick="1" class="color232222" value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                                <?php } ?>
                                            </select>
                                            <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                                        </div>
                                    <?php endif ?>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="article_details_ad_wrap">
                    <div class="bottom_shop_border">&nbsp;</div>
                    <div class="footer_inner_div">
                        <div class="float_left">
                        
                        <div class="bt-shop_border"><img src="/images/new_home/bt-shop_border.png" width="640"/></div>
                        
                        
                        
                            <div class="color_plate_first">
                                <div class="color_plate_img_first_article"><img src="/images/new_home/bottom_bt-shop_logo.png" width="97"/></div>
                                <div class="bottom_shop_txt_main">
                                    <div class="bottom_shop_cart">Välkommen 
            <br /> till BT-shop <br />– affären för<br /> bättre affärer!</div>
                                </div>
                            </div>
                            <?php $adCount = 1; ?>
                            <?php foreach ($adData as $article): ?>
                                <?php $modAdCount = $adCount % 2; ?>
                                <a class="blackcolor cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>">
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
                
                    <div class="bt-shop_border2"><img src="/images/new_home/bt-shop_border.png" width="640"/></div>
                </div>



            <?php else: ?>
                <div class="in_date">&nbsp;</div>
                <div class="photoimg">&nbsp;</div>
                <br />
                <br />
                <div class="shoph3 widthall mtop_30"><?php echo __('Du behöver vara inloggad abonnent för att läsa denna artikel.') ?></div>
                <div class="float_left widthall mbottom_10">
                    <div class="float_left widthall mtop_25 mbottom_12">&nbsp;</div>
                </div>
                <div class="float_left widthall"><span class="main_link_color"><?php echo __('För att se en lista över artiklar, klicka') ?><a class="main_link_color" href="<?php echo 'http://' . $host_str . '/borst/articleList' ?>"><?php echo __(' here') ?></a></span></div>	
            <?php endif; ?>
        </div>


        <?php echo include_partial('global/borst_bottom_three_article', array('host_str' => $host_str, 'cat_arr' => $cat_arr, 'type_arr' => $type_arr, 'object_arr' => $object_arr, 'col1_13_heading_style_start' => $col1_13_heading_style_start, 'col1_13_heading_style_end' => $col1_13_heading_style_end, 'col1_45_div_style' => $col1_45_div_style, 'col1_67_heading_style' => $col1_67_heading_style, 'col1_814_heading_style' => $col1_814_heading_style, 'col1_1417_heading_style' => $col1_1417_heading_style, 'image_arr_13' => $image_arr_13, 'image_arr_67' => $image_arr_67, 'image_arr_814' => $image_arr_814, 'image_arr_1417' => $image_arr_1417, 'one_2_three' => $one_2_three, 'four_2_five' => $four_2_five, 'six_2_eight' => $six_2_eight, 'nine_2_ten' => $nine_2_ten, 'eleven_2_thirteen' => $eleven_2_thirteen, 'fourteen_2_fifteen' => $fourteen_2_fifteen, 'sixteen_2_nineteen' => $sixteen_2_nineteen, 'twenty_2_twentythree' => $twenty_2_twentythree, 'twentyfour_2_twentyseven' => $twentyfour_2_twentyseven, 'twentyeight_2_thirtyfive' => $twentyeight_2_thirtyfive, 'comment_cnt' => $comment_cnt, 'hide_right_border' => '1', 'month' => $month, 'left_records' => $left_records, 'mcol_body_text' => $mcol_body_text, 'secondLimit' => $secondLimit, 'article_limit' => $article_limit, 'fcol_hor_title' => $fcol_hor_title, 'fcol_ver_title' => $fcol_ver_title, 'fcol_big_title' => $fcol_big_title, 'fcol_body_text_6_7' => $fcol_body_text_6_7, 'fcol_body_text_2_3' => $fcol_body_text_2_3, 'fcol_body_text_1_4_5' => $fcol_body_text_1_4_5)); ?>

    </div>
    <div class="float_left article_leftinner_marginTop_6px">
        <?php echo include_partial('global/borst_right_banner_article', array('host_str' => $host_str, 'cat_arr' => $cat_arr, 'type_arr' => $type_arr, 'object_arr' => $object_arr, 'col1_13_heading_style_start' => $col1_13_heading_style_start, 'col1_13_heading_style_end' => $col1_13_heading_style_end, 'col1_45_div_style' => $col1_45_div_style, 'col1_67_heading_style' => $col1_67_heading_style, 'col1_814_heading_style' => $col1_814_heading_style, 'col1_1417_heading_style' => $col1_1417_heading_style, 'last_column_style' => $last_column_style, 'image_arr_13' => $image_arr_13, 'image_arr_67' => $image_arr_67, 'image_arr_814' => $image_arr_814, 'image_arr_1417' => $image_arr_1417, 'last_column_img' => $last_column_img, 'twentyeight_2_thirtyfive' => $twentyeight_2_thirtyfive, 'comment_cnt' => $comment_cnt, 'ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'month' => $month, 'rcol_body_text' => $rcol_body_text)); ?>
    </div>
    
        <div class="morearticledetails"></div>
        <div class="load_article_details" id="load_article_details_1" pageno="2"><img src="/images/new_home/load_articles.png" title="Load more article" width="978" /></div>
        <div class="loading_home" style="display: none;">&nbsp;</div>

    <?php include_partial('global/six_cube_footer', array('host_str' => $host_str, 'bottom_commodities_links' => $bottom_commodities_links, 'bottom_currencies_links' => $bottom_currencies_links, 'bottom_buysell_links' => $bottom_buysell_links, 'bottom_statistics_links' => $bottom_statistics_links, 'bottom_aktier_links' => $bottom_aktier_links, 'bottom_kronika_links' => $bottom_kronika_links, 'month' => $month)) ?>

<?php } else { ?>
    <div class="in_date">&nbsp;</div>
    <div class="photoimg">&nbsp;</div>
    <br />
    <br />
    <div class="shoph3 widthall mtop_30"><?php echo __('Du behöver vara inloggad abonnent för att läsa denna artikel.') ?></div>
    <div class="float_left widthall mbottom_10">
        <div class="float_left widthall mtop_25 mbottom_12">&nbsp;</div>
    </div>
<?php } ?>
<div id="pop-box-over" class="display-none"></div>