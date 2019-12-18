<script type="text/javascript" language="javascript">
    $(window).load(function () {
        //Amit changes 15-2-2011
        var hArray = new Array();
        hArray[0] = $(".innerleftdiv").height();
        hArray[1] = $(".rightbanner").height();

        if (hArray[0] > hArray[1])
            var maxHeight = hArray[0];
        else
            var maxHeight = hArray[1];


        $(".innerleftdiv").css({"height": maxHeight + "px"});
        $(".rightbanner").css({"height": maxHeight + "px"});

        $('html, body').scrollTo($('#chart_data'));

    });

    function paginationPopup(obj) {
        var offset = $(obj).offset();
        $(obj).next().css("left", offset.left - 217);
        var obj1 = $(".forum_drop-down-menu_page");
        if ($(obj1).val() == 0) {
            $(obj1).removeClass("color3c3a3a");
            $(obj1).addClass("colorb9c2cf");
        } else {
            $(obj1).removeClass("colorb9c2cf");
            $(obj1).addClass("color3c3a3a");
        }
        $(obj).next().toggle();
    }

    function paginationPopupGo(obj) {
        var object_id = $('#object_id').val();
        var page = $(".forum_drop-down-menu_page").val();
        var pagination_numbers = $('.similar_article_listing_pager').html();

        $('.similar_article_listing_pager').html('<span class="">' + pagination_numbers + '</span>');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.post("/borst/getSimilarArticles?object_id=" + object_id + "&page=" + page, function (data) {
            $('.similar_article_listing').html(data);
            $('.indicator').hide();
            $('#pop-box-over').hide();
        });
    }

    function paginationPopupSelect(obj) {
        if ($(obj).val() == 0) {
            $(obj).removeClass("color3c3a3a");
            $(obj).addClass("colorb9c2cf");
        } else {
            $(obj).removeClass("colorb9c2cf");
            $(obj).addClass("color3c3a3a");
        }
    }
</script>
<span class="float_left indicator loader loader_posiotion"><img src="/images/ajax-loader_blog.gif" /></span>
<div class="innerleftdiv">
    <div class="leftinnercolor" id="leftinnercolor-chart">   
        <div id="chart_data">
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

            <?php if (($stock && $show_chart) || $freeChartsPeriod) : ?> 
                <input type="hidden" id="object_id" value="<?php echo $stock_object_id; ?>" />
                <?php
                $chart_filename = $_SERVER['DOCUMENT_ROOT'] . "/" . $uploaded_images_path . strtolower($stock->company_symbol) . "_" . $chart_type_details->chart_type_image;
                $ch_name = $uploaded_images_path . strtolower($stock->company_symbol) . "_" . $chart_type_details->chart_type_image;
                ?>
                <div class="update_status art_detail_date"> <?php echo date("Y-m-d", filemtime($chart_filename)) ?></div>

                <?php $random = time() * rand(11111, 9999999); ?>  
                <?php if (!$add_to_fav): ?>
                    <div class="add_to_favorite_chart"><a class="add_to_favorite_borst_chart cursor" id="<?php echo $stock_id . "_" . $stock->company_type_id . "_" . $chart_type_details->id; ?>" name="<?php echo $stock_id; ?>"><img width="85" class="<?php echo $isValidUser; ?>"src="/images/new_home/fav.png" alt="photo" /></a></div>
                <?php elseif ($validUser && $add_to_fav): ?>
                    <div class="add_to_favorite_chart"><a id="<?php echo $stock_id . "_" . $stock_type . "_" . $chart_type_details->id; ?>" name="<?php echo $stock_id; ?>"><img width="85" src="/images/new_home/fav_put.png" alt="photo" /></a></div>
    <?php endif; ?>
                <div class=" float_left print_ancr">
                    <a class="main_link_color float_left" href="#" onclick="setPrintCss()">
                        <img alt="Print" title="Print" src="/images/printer.png" width="22"/>
                    </a>
                    <!--<a class="main_link_color float_left padding_top_5 lineht_13" href="#" onclick="setPrintCss()">Print</a>-->
                </div>
                <br />
                <div class="charts_wrapper">
                    <div class="chart_heading"> <span class="stock_name charts_heading"><?php echo $stock->company_name; ?></span> <span class="chart_title charts_subheading"> <?php echo $chart_type_details->chart_type_text; ?> </span> </div>
                    <?php if (file_exists($chart_filename)): ?>
                        <div class="chart_image"> <img src="<?php echo $ch_name; ?>" alt="" class="stock_chart_img" /></div>                            
                    <?php else: ?>
                        <div class="no_result charts_button_text"> Grafen är ej tillgänglig för närvarande.</div>
    <?php endif; ?>
                    <div class="charts_graph_main">

                        <div class="charts_graph_sub_left">
                            <span class="sty_float_right"><a id="<?php echo $prev_stock->id; ?>" name="<?php echo $prev_stock->company_name ?>" class="prev_stock cursor"><span class="stock_prev_title charts_graph"><?php echo $prev_stock->company_name ?></span></a></span>
                            <span class="floatLeftNew margin_top_4m"><a id="<?php echo $prev_stock->id; ?>" name="<?php echo $prev_stock->company_name ?>" class="prev_stock cursor"><img src="/images/charts_arrow_back.png" alt="Previous" width="290"/> </a></span>
                        </div>
                        <div class="charts_graph_sub_right">
                            <span class="sty_float_left"><a id="<?php echo $next_stock->id; ?>" name="<?php echo $next_stock->company_name ?>" class="next_stock cursor"><span class="stock_next_title charts_graph"><?php echo $next_stock->company_name ?> </span></a></span>
                            <span class="sty_float_right margin_top_4m margin_right_23"><a id="<?php echo $next_stock->id; ?>" name="<?php echo $next_stock->company_name ?>" class="next_stock cursor"> <img src="/images/charts_arrow_forward.png" alt="Next" width="290"/> </a></span>
                        </div>

                    </div>
                    <div class="blank_8h widthall">&nbsp;</div>
                    <div class="chart_buttons" style="padding-top: 13px;margin-left: -6px;">
                        <a id="1" class="btn_chart cursor"><span class="charts_btn_1"><span class="charts_button_text_1">Dagsgraf</span></span></a> <a id="2" class="btn_chart cursor"><span class="charts_btn_2"><span class="charts_button_text_2">Veckograf</span></span></a><?php if ($validUser || $freeChartsPeriod): ?>   <a id="3" class="btn_chart cursor"><span class="charts_btn_3"><span class="charts_button_text_3">Långtidsgraf</span></span></a>
                            <?php else: ?>
                            <a id="3" ><span class="charts_btn_active"><span class="charts_button_text_3">Långtidsgraf</span></span>
                            <?php endif; ?>
                            <br />
                            <?php
                            $show_button1 = array();
                            foreach ($show_button as $btn) {
                                $show_button1[] = $btn;
                            }
                            ?>

                            <?php if ((in_array("BT Utbrott", $show_button1) && $validUser) || $admin || $freeChartsPeriod): ?>
                                <a id="4" class="btn_chart cursor"><span class="charts_btn_active"><span class="charts_button_text_4">BT Utbrott</span></span></a>
                            <?php else: ?>
                                <a id="4" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/29' ?>"><span class="charts_btn_4"><span class="charts_button_text_4">BT Utbrott</span></span></a>
                            <?php endif; ?>

                            <?php if ((in_array("BT Trend", $show_button1) && $validUser) || $admin || $freeChartsPeriod): ?>
                                <a id="5" class="btn_chart cursor"><span class="charts_btn_active"><span class="charts_button_text_5">BT Trend</span></span></a>
                            <?php else: ?>
                                <a id="5" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/30' ?>"><span class="charts_btn_5"><span class="charts_button_text_5">BT Trend</span></span></a>
                            <?php endif; ?>

                            <?php if ((in_array("BT Kanalen", $show_button1) && $validUser) || $admin || $freeChartsPeriod): ?>        
                                <a id="6" class="btn_chart cursor"><span class="charts_btn_active"><span class="charts_button_text_6">BT-kanalen</span></span></a>
                            <?php else: ?>
                                <a id="6" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/28' ?>"><span class="charts_btn_6"><span class="charts_button_text_6">BT-kanalen</span></span></a>
                            <?php endif; ?>

                            <?php if ((in_array("Henry Boy", $show_button1) && $validUser) || $admin || $freeChartsPeriod): ?>
                                <a id="7" class="btn_chart cursor"><span class="charts_btn_active"><span class="charts_button_text_7">BT Insider</span></span></a>
                            <?php else: ?>
                                <a id="7" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/31' ?>"><span class="charts_btn_7"><span class="charts_button_text_7">BT Insider</span></span></a>
                            <?php endif; ?>

                            <?php if ((in_array("Kandelaber", $show_button1) && $validUser) || $admin || $freeChartsPeriod): ?>
                                <a id="8" class="btn_chart cursor"><span class="charts_btn_active"><span class="charts_button_text_8">Kandelaber</span></span></a>
                            <?php else: ?>
                                <a id="8" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/23' ?>"><span class="charts_btn_8"><span class="charts_button_text_8">Kandelaber</span></span></a>
    <?php endif; ?>

                    </div>
                    <div class="blank_30h widthall">&nbsp;</div>
                    <?php //echo 'file_content: ' . $sf_data->getRaw('file_content'); ?>
                    <?php if ($sf_data->getRaw('file_content')): ?>
                        <div class="file_content"><?php echo iconv("windows-1252", "UTF-8", $sf_data->getRaw('file_content')); ?></div>
    <?php endif; ?>

                    <div class="similar_articles">
                        <div class="similar_article_listing">
                            <div class="float_left widthall mrg_top_20"><img src="/images/new_home/article_pict.png" width="50"/><span class="art_subheading"> Tidigare artiklar på Börstjänaren: </span></div>
                            <div class="blank_12h widthall">&nbsp;</div>
                            <div class="float_left widthall art_topic">
                                    <?php if ($pagerForSimilarArticles): ?>
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <?php
                                        foreach ($pagerForSimilarArticles->getResults() as $list) {
                                            echo '<tr><td class="related_article_date">' . substr($list->article_date, 0, 10) . '</td><td><a class="main_link_color" href="https://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/' . $list->article_id . '">&nbsp;' . $list->title . '<a/></td></tr>';
                                        }
                                        ?>
                                    </table>
                            <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div class="no_result"><?php echo __("Sorry No Information Available !"); ?></div>  
<?php endif; ?>
                        <div class="clearAll"></div>
                        <div class="paginationwrapperNew paginationwrapperNew_margin">
                            <div class="forum_pag similar_article_listing_pager" id="">
                                <?php if ($pagerForSimilarArticles->haveToPaginate()): ?>
                                        <?php if ($pagerForSimilarArticles->getFirstPage() != $pagerForSimilarArticles->getPage()) { ?>
                                        <a id="<?php echo $pagerForSimilarArticles->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pagerForSimilarArticles->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
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
                                            <a id="<?php echo $pagerForSimilarArticles->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pagerForSimilarArticles->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span></a>
    <?php } ?>
                                        <span>Sid <?php echo $pagerForSimilarArticles->getPage(); ?> av <?php echo $pagerForSimilarArticles->getLastPage(); ?></span>
                                        <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                                        <div class="forum_popup_pagination_wrapper" noclick="1" >
                                            <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                                                <option noclick="1" value="0">Gå till sida...</option>
                                                <?php for ($pg = 1; $pg <= $pagerForSimilarArticles->getLastPage(); $pg++) { ?>
                                                    <option noclick="1" class="color3c3a3a" value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
    <?php } ?>
                                            </select>
                                            <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                                        </div>
<?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>   

            </div>

            <div id="stock_lists">
                <div class="bt-charts_line">&nbsp;</div>
                <span class="heading_violet_chart charts_market_heading">Läsarnas val</span>
                <div class="float_left widthall">
                    <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_varlden" class="charts_market_link">
                        <tr>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php if ($item_per_col_lasarnas + 1 <= $total_count_lasarnas): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_lasarnas * 2 + 1 <= $total_count_lasarnas): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_lasarnas * 3 + 1 <= $total_count_lasarnas): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
<?php endif; ?>
                        </tr>
                        <tr>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_lasarnas as $stock): if ($i < $item_per_col_lasarnas):
                                            ?>
                                            <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>

                                    <?php if ($item_per_col_lasarnas + 1 <= $total_count_lasarnas): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_lasarnas as $stock): if ($i < $item_per_col_lasarnas * 2 && $i >= $item_per_col_lasarnas):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>

                                    <?php if ($item_per_col_lasarnas * 2 + 1 <= $total_count_lasarnas): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_lasarnas as $stock): if ($i < $item_per_col_lasarnas * 3 && $i >= $item_per_col_lasarnas * 2):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>            

                                    <?php if (($item_per_col_lasarnas * 3 + 1) <= $total_count_lasarnas): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_lasarnas as $stock): if ($i <= $item_per_col_lasarnas * 4 && $i >= $item_per_col_lasarnas * 3):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
<?php endif; ?>                        

                        </tr>
                    </table>
                </div>

                <div class="bt-charts_line">&nbsp;</div>
                <span class="heading_violet_chart charts_market_heading">Världsindex m.m.</span>
                <div class="float_left widthall">
                    <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_varlden" class="charts_market_link">
                        <tr>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php if ($item_per_col_varlden + 1 <= $total_count_varlden): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_varlden * 2 + 1 <= $total_count_varlden): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_varlden * 3 + 1 <= $total_count_varlden): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
<?php endif; ?>
                        </tr>
                        <tr>
                            <td valign="top"><ul>
                                    <li><span class="heading_violet_sector charts_market_subheading">Sektorer</span></li>    
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_varlden as $stock): if ($i < $item_per_col_varlden):
                                            ?>
                                            <?php if ($stock->sector == 'Sektor'): ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                            <?php endif; ?>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>

<?php if ($item_per_col_varlden + 1 <= $total_count_varlden): ?>
                                <td valign="top"><ul>
                                        <li><span class="heading_violet_sector charts_market_subheading">Sektorer</span></li>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_varlden as $stock): if ($i < $item_per_col_varlden * 2 && $i >= $item_per_col_varlden):
                                                ?>
                                                <?php if ($stock->sector == 'Sektor'): ?>
                                                    <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php endif; ?>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>

<?php if ($item_per_col_varlden * 2 + 1 <= $total_count_varlden): ?>
                                <td valign="top"><ul>
                                        <li><span class="heading_violet_sector charts_market_subheading">Sektorer</span></li>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_varlden as $stock): if ($i < $item_per_col_varlden * 3 && $i >= $item_per_col_varlden * 2):
                                                ?>
                                                <?php if ($stock->sector == 'Sektor'): ?>
                                                    <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php endif; ?>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>            

<?php if (($item_per_col_varlden * 3 + 1) <= $total_count_varlden): ?>
                                <td valign="top"><ul>
                                        <li><span class="heading_violet_sector charts_market_subheading">Sektorer</span></li>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_varlden as $stock): if ($i <= $item_per_col_varlden * 4 && $i >= $item_per_col_varlden * 3):
                                                ?>
                                                <?php if ($stock->sector == 'Sektor'): ?>
                                                    <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php endif; ?>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                        <li>&nbsp;</li>   
                                        <li><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/> </li>
                                        <li id="last-li-chart"><span class="heading_violet_sector charts_market_subheading">Finans</span></li>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_varlden as $stock): if ($i <= $item_per_col_varlden * 4 && $i >= $item_per_col_varlden * 3):
                                                ?>
                                                <?php if ($stock->sector == 'Finans'): ?>
                                                    <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php endif; ?>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>           

                                    </ul>

                                </td>
<?php endif; ?>                        

                        </tr>
                    </table>
                </div>

                <div class="bt-charts_line">&nbsp;</div>
                <span class="heading_violet_chart charts_market_heading">Råvaror</span>
                <div class="float_left widthall">
                    <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap" class="charts_market_link">
                        <tr>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php if ($item_per_col_Ravaror + 1 <= $total_count_Ravaror): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_Ravaror * 2 + 1 <= $total_count_Ravaror): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_Ravaror * 3 + 1 <= $total_count_Ravaror): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
<?php endif; ?>
                        </tr>
                        <tr>
                            <td valign="top"><ul>
                                    <li><span class="heading_violet_sector charts_market_subheading">Metaller</span></li>
                                    <?php foreach ($stock_list_Ravaror as $stock): ?>
                                        <?php if ($stock->sector == 'Metaller'): ?>
                                            <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                        <?php endif; ?>
<?php endforeach; ?>
                                    <li>&nbsp;</li>
                                    <li><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></li>                 
                                    <li id="last-li-chart"> <span class="heading_violet_sector charts_market_subheading">Energi</span> </li>
                                    <?php foreach ($stock_list_Ravaror as $stock): ?>
                                        <?php if ($stock->sector == 'Energi'): ?>
                                            <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                        <?php endif; ?>
<?php endforeach; ?>                
                                </ul>
                            </td>

<?php if ($item_per_col_Ravaror + 1 <= $total_count_Ravaror): ?>
                                <td valign="top"><ul>
                                        <li><span class="heading_violet_sector charts_market_subheading">Spannmål</span></li>                
                                        <?php foreach ($stock_list_Ravaror as $stock): ?>
                                            <?php if ($stock->sector == 'Spannmål'): ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                            <?php endif; ?>
    <?php endforeach; ?>

                                    </ul>
                                </td>
                            <?php endif; ?>

<?php if ($item_per_col_Ravaror * 2 + 1 <= $total_count_Ravaror): ?>
                                <td valign="top"><ul>
                                        <li><span class="heading_violet_sector charts_market_subheading">Mat/Fiber/Mjuka</span></li>
                                        <?php foreach ($stock_list_Ravaror as $stock): ?>
                                            <?php if ($stock->sector == 'Mat/Fiber/Mjuka'): ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                            <?php endif; ?>
    <?php endforeach; ?>
                                    </ul>
                                </td>
                            <?php endif; ?>            

<?php if (($item_per_col_Ravaror * 3 + 1) <= $total_count_Ravaror): ?>
                                <td valign="top"><ul>
                                        <li><span class="heading_violet_sector charts_market_subheading">Kött</span></li>
                                        <?php foreach ($stock_list_Ravaror as $stock): ?>
                                            <?php if ($stock->sector == 'Kött'): ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                            <?php endif; ?>
    <?php endforeach; ?>
                                    </ul>
                                </td>
<?php endif; ?>                        

                        </tr>
                    </table>
                </div>  

                <div class="bt-charts_line">&nbsp;</div>
                <span class="heading_violet_chart charts_market_heading">Valutor</span>
                <div class="float_left widthall">
                    <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap" class="charts_market_link">
                        <tr>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php if ($item_per_col_Valutor + 1 <= $total_count_Valutor): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_Valutor * 2 + 1 <= $total_count_Valutor): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_Valutor * 3 + 1 <= $total_count_Valutor): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
<?php endif; ?>
                        </tr>
                        <tr>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_Valutor as $stock): if ($i < $item_per_col_Valutor):
                                            ?>
                                            <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>

                                    <?php if ($item_per_col_Valutor + 1 <= $total_count_Valutor): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_Valutor as $stock): if ($i < $item_per_col_Valutor * 2 && $i >= $item_per_col_Valutor):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>

                                    <?php if ($item_per_col_Valutor * 2 + 1 <= $total_count_Valutor): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_Valutor as $stock): if ($i < $item_per_col_Valutor * 3 && $i >= $item_per_col_Valutor * 2):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>            

                                    <?php if (($item_per_col_Valutor * 3 + 1) <= $total_count_Valutor): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_Valutor as $stock): if ($i <= $item_per_col_Valutor * 4 && $i >= $item_per_col_Valutor * 3):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
<?php endif; ?>                        

                        </tr>
                    </table>
                </div>  

                <div class="bt-charts_line">&nbsp;</div>
                <span class="heading_violet_chart charts_market_heading">Stockholm Large Cap</span>
                <div class="float_left widthall">
                    <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap" class="charts_market_link">
                        <tr>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php if ($item_per_col_LargeCap + 1 <= $total_count_LargeCap): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_LargeCap * 2 + 1 <= $total_count_LargeCap): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_LargeCap * 3 + 1 <= $total_count_LargeCap): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
<?php endif; ?>
                        </tr>
                        <tr>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_LargeCap as $stock): if ($i < $item_per_col_LargeCap):
                                            ?>
                                            <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>

                                    <?php if ($item_per_col_LargeCap + 1 <= $total_count_LargeCap): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_LargeCap as $stock): if ($i < $item_per_col_LargeCap * 2 && $i >= $item_per_col_LargeCap):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>

                                    <?php if ($item_per_col_LargeCap * 2 + 1 <= $total_count_LargeCap): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_LargeCap as $stock): if ($i < $item_per_col_LargeCap * 3 && $i >= $item_per_col_LargeCap * 2):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>            

                                    <?php if (($item_per_col_LargeCap * 3 + 1) <= $total_count_LargeCap): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_LargeCap as $stock): if ($i <= $item_per_col_LargeCap * 4 && $i >= $item_per_col_LargeCap * 3):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
<?php endif; ?>                        

                        </tr>
                    </table>
                </div>  

                <div class="bt-charts_line">&nbsp;</div>
                <span class="heading_violet_chart charts_market_heading">Stockholm Mid Cap</span>
                <div class="float_left widthall">
                    <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap" class="charts_market_link">
                        <tr>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php if ($item_per_col_MidCap + 1 <= $total_count_MidCap): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_MidCap * 2 + 1 <= $total_count_MidCap): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_MidCap * 3 + 1 <= $total_count_MidCap): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
<?php endif; ?>
                        </tr>
                        <tr>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_MidCap as $stock): if ($i < $item_per_col_MidCap):
                                            ?>
                                            <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>

                                    <?php if ($item_per_col_MidCap + 1 <= $total_count_MidCap): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_MidCap as $stock): if ($i < $item_per_col_MidCap * 2 && $i >= $item_per_col_MidCap):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>

                                    <?php if ($item_per_col_MidCap * 2 + 1 <= $total_count_MidCap): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_MidCap as $stock): if ($i < $item_per_col_MidCap * 3 && $i >= $item_per_col_MidCap * 2):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>            

                                    <?php if (($item_per_col_MidCap * 3 + 1) <= $total_count_MidCap): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_MidCap as $stock): if ($i <= $item_per_col_MidCap * 4 && $i >= $item_per_col_MidCap * 3):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
<?php endif; ?>                        

                        </tr>
                    </table>
                </div>  

                <div class="bt-charts_line">&nbsp;</div>
                <span class="heading_violet_chart charts_market_heading">Stockholm Small Cap</span>
                <div class="float_left widthall">
                    <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap" class="charts_market_link">
                        <tr>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php if ($item_per_col_SmallCap + 1 <= $total_count_SmallCap): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_SmallCap * 2 + 1 <= $total_count_SmallCap): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_SmallCap * 3 + 1 <= $total_count_SmallCap): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
<?php endif; ?>
                        </tr>
                        <tr>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_SmallCap as $stock): if ($i < $item_per_col_SmallCap):
                                            ?>
                                            <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>

                                    <?php if ($item_per_col_SmallCap + 1 <= $total_count_SmallCap): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_SmallCap as $stock): if ($i < $item_per_col_SmallCap * 2 && $i >= $item_per_col_SmallCap):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>

                                    <?php if ($item_per_col_SmallCap * 2 + 1 <= $total_count_SmallCap): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_SmallCap as $stock): if ($i < $item_per_col_SmallCap * 3 && $i >= $item_per_col_SmallCap * 2):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>            

                                    <?php if (($item_per_col_SmallCap * 3 + 1) <= $total_count_SmallCap): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_SmallCap as $stock): if ($i <= $item_per_col_SmallCap * 4 && $i >= $item_per_col_SmallCap * 3):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
<?php endif; ?>                        

                        </tr>
                        <tr>

                        </tr>
                    </table>
                </div> 

                <div class="bt-charts_line">&nbsp;</div>   
                <span class="heading_violet_chart charts_market_heading">S&amp;P 100</span>
                <div class="float_left widthall">
                    <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap" class="charts_market_link">
                        <tr>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php if ($item_per_col_SP100 + 1 <= $total_count_SP100): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_SP100 * 2 + 1 <= $total_count_SP100): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_SP100 * 3 + 1 <= $total_count_SP100): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
<?php endif; ?>
                        </tr>
                        <tr>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_SP100 as $stock): if ($i < $item_per_col_SP100):
                                            ?>
                                            <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>

                                    <?php if ($item_per_col_SP100 + 1 <= $total_count_SP100): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_SP100 as $stock): if ($i < $item_per_col_SP100 * 2 && $i >= $item_per_col_SP100):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>

                                    <?php if ($item_per_col_SP100 * 2 + 1 <= $total_count_SP100): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_SP100 as $stock): if ($i < $item_per_col_SP100 * 3 && $i >= $item_per_col_SP100 * 2):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>            

                                    <?php if (($item_per_col_SP100 * 3 + 1) <= $total_count_SP100): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_SP100 as $stock): if ($i <= $item_per_col_SP100 * 4 && $i >= $item_per_col_SP100 * 3):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
<?php endif; ?>                        

                        </tr>
                        <tr>

                        </tr>
                    </table>
                </div>    

                <div class="bt-charts_line">&nbsp;</div>
                <span class="heading_violet_chart charts_market_heading">NASDAQ 100</span>
                <div class="float_left widthall">
                    <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap" class="charts_market_link">
                        <tr>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php if ($item_per_col_NQ100 + 1 <= $total_count_NQ100): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_NQ100 * 2 + 1 <= $total_count_NQ100): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_NQ100 * 3 + 1 <= $total_count_NQ100): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
<?php endif; ?>
                        </tr>
                        <tr>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_NQ100 as $stock): if ($i < $item_per_col_NQ100):
                                            ?>
                                            <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>

                                    <?php if ($item_per_col_NQ100 + 1 <= $total_count_NQ100): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_NQ100 as $stock): if ($i < $item_per_col_NQ100 * 2 && $i >= $item_per_col_NQ100):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>

                                    <?php if ($item_per_col_NQ100 * 2 + 1 <= $total_count_NQ100): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_NQ100 as $stock): if ($i < $item_per_col_NQ100 * 3 && $i >= $item_per_col_NQ100 * 2):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>            

                                    <?php if (($item_per_col_NQ100 * 3 + 1) <= $total_count_NQ100): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_NQ100 as $stock): if ($i <= $item_per_col_NQ100 * 4 && $i >= $item_per_col_NQ100 * 3):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
<?php endif; ?>                        

                        </tr>
                        <tr>

                        </tr>
                    </table>
                </div>   

                <div class="bt-charts_line">&nbsp;</div>
                <span class="heading_violet_chart charts_market_heading">ETF</span>
                <div class="float_left widthall">
                    <table width="75%" border="0" cellspacing="0" cellpadding="3" id="btchart_largecap" class="charts_market_link">
                        <tr>
                            <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php if ($item_per_col_ETF + 1 <= $total_count_ETF): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_ETF * 2 + 1 <= $total_count_ETF): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
                            <?php endif; ?>
                            <?php if ($item_per_col_ETF * 3 + 1 <= $total_count_ETF): ?>
                                <td><img src="/images/charts_fig_list_mark.png" alt="photo" width="40"/></td>
<?php endif; ?>
                        </tr>
                        <tr>
                            <td valign="top"><ul>
                                    <?php
                                    $i = 0;
                                    foreach ($stock_list_ETF as $stock): if ($i < $item_per_col_ETF):
                                            ?>
                                            <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                            <?php
                                        endif;
                                        $i++;
                                    endforeach;
                                    ?>
                                </ul>
                            </td>

                                    <?php if ($item_per_col_ETF + 1 <= $total_count_ETF): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_ETF as $stock): if ($i < $item_per_col_ETF * 2 && $i >= $item_per_col_ETF):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>

                                    <?php if ($item_per_col_ETF * 2 + 1 <= $total_count_ETF): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_ETF as $stock): if ($i < $item_per_col_ETF * 3 && $i >= $item_per_col_ETF * 2):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
                            <?php endif; ?>            

                                    <?php if (($item_per_col_ETF * 3 + 1) <= $total_count_ETF): ?>
                                <td valign="top"><ul>
                                        <?php
                                        $i = 0;
                                        foreach ($stock_list_ETF as $stock): if ($i <= $item_per_col_ETF * 4 && $i >= $item_per_col_ETF * 3):
                                                ?>
                                                <li class='width_140'><a class="main_link_color" href="https://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $stock->company_name); ?>/stock_id/<?php echo $stock->id ?>/chart_type/<?php echo $c_type; ?>"><?php echo $stock->company_name ?></a></li>
                                                <?php
                                            endif;
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                </td>
<?php endif; ?>                        

                        </tr>
                        <tr>

                        </tr>
                    </table>
                </div>

            </div>
<div class="btchart_last_left">&nbsp;</div>
        </div>
    </div>
</div>
<?php echo include_partial('global/borst_right_banner_article', array('host_str' => $host_str, 'ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4)); ?>

<div class="bottom_shop_border">&nbsp;</div>
<div class="footer">
    <div class="footer_inner_div">
        <div class="float_left">
            <div class="color_plate_first">
                <div class="color_plate_img_first"><img src="/images/new_home/bottom_bt-shop_logo.png" width="102" height="94" /></div>
                <div class="bottom_shop_txt_main">
                    <div class="bottom_shop_cart">Välkommen till BT-shop <br />
                        – affären för bättre affärer!</div>
                </div>
            </div>
            <?php $adCount = 1; ?>
            <?php foreach ($metastock_data as $article): ?>
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
        <div class="footer_divider_div">&nbsp;</div>
        <div class="footer_main">
<?php include_partial('global/six_cube_footer', array('host_str' => $host_str, 'bottom_commodities_links' => $bottom_commodities_links, 'bottom_currencies_links' => $bottom_currencies_links, 'bottom_buysell_links' => $bottom_buysell_links, 'bottom_statistics_links' => $bottom_statistics_links, 'bottom_aktier_links' => $bottom_aktier_links, 'bottom_kronika_links' => $bottom_kronika_links)) ?>
        </div>
    </div>
</div>
<div id="pop-box-over" class="display-none"></div>
<script type="text/javascript">
    $(document).ready(function () {



        $(".btn_chart").bind('click', '', function () {
            stock_id = <?php echo $stock_2->id; ?>;
            company_name = '<?php echo BtchartCompanyDetails::removeCharacters($stock_2->company_name); ?>';
            window.location = 'https://' + window.location.hostname + '/borst_charts/borstShowChart/stock_name/' + company_name + '/chart_type/' + this.id + '/stock_id/' + stock_id;
        });
        $(".prev_stock").bind('click', '', function () {
            chart_type = '<?php echo $chart_type; ?>';
            company_name = $(this).attr('name').replace("/", "_").replace(" ", "_");
            window.location = 'https://' + window.location.hostname + '/borst_charts/borstShowChart/stock_name/' + company_name + '/chart_type/' + chart_type + '/stock_id/' + this.id;
        });
        $(".next_stock").bind('click', '', function () {
            chart_type = '<?php echo $chart_type; ?>';
            company_name = $(this).attr('name').replace("/", "_").replace(" ", "_");
            ;
            window.location = 'https://' + window.location.hostname + '/borst_charts/borstShowChart/stock_name/' + company_name + '/chart_type/' + chart_type + '/stock_id/' + this.id;
        });
        $(".add_to_favorite_borst_chart").bind('click', '', function () {
            if ($(this).find('img').attr('class') == 'NotlogUser') {
                window.location.href = '/user/loginWindow';
            } else {
                url = '/borst_charts/addToMyFavorite/id/' + this.id;
                $.post(url, '', function (data) {
                    $(".add_to_favorite_borst_chart").unbind('click');
                    $(".add_to_favorite_chart").html('<img class="fav_put_ht_wdth" src="/images/new_home/fav_put.png" alt="photo" />');
                });
            }
        });
    });
</script>