
<script language="javascript" type="text/javascript">
    $(window).load(function () {


        var checkRight = $(".rightbanner").height();
        var checkLeft = $(".listingleftdiv").height();

        if (checkLeft > checkRight)
        {
            $(".rightbanner").css({"height": checkLeft + "px"});
        } else
        {
            $(".listingleftdiv").css({"height": checkRight + "px"});
        }
        var leftDiv = $('.inner-page-contetn-left').height();
        var rightDiv = $('.rightbanner').height();
        if(rightDiv > leftDiv){
            $('.rightbanner').css('border-left','1px solid #d3d3d3');
        }else{
            $('.inner-page-contetn-left').css('border-right','1px solid #d3d3d3');
        }
    });
    function paginationUlGo(obj){
        var column_id = $('#column_id').val();
        var parent_id = $('#parent_id').val();
        var search_tab = $('#search_tab').val();
        var category_id = $('#category_id').val();
        var type_id = $('#type_id').val();
        var object_id = $('#object_id').val();
        var shop_type = $('#shop_type_id').val();
        var normal_search_para = $('#normal_search_para').val();
        var page = $(obj).html();
        var current_column_order = $('#search_current_column_order').val();
        var result_per_page = $('#result_per_page').val();
        setOpacity();

        var pagination_numbers = $('#search_listing').html();
        $('#search_listing').html('' + pagination_numbers + '');

        $.post("/borst/getSearchData?column_id=" + column_id + "&page=" + page + "&search_tab_id=" + search_tab + "&normal_search_para=" + normal_search_para + "&search_current_column_order=" + current_column_order + "&result_per_page=" + result_per_page + '&category_id=' + category_id + '&type_id=' + type_id + '&object_id=' + object_id + '&shop_type=' + shop_type + '&parent_id=' + parent_id, function (data) {
            $('#search_content').html(data);
            setSearchOrderImageAdvSearch('sortby_' + column_id, current_column_order, parent_id);
        });
}
    function paginationPopupGo(obj) {

        var column_id = $('#column_id').val();
        var parent_id = $('#parent_id').val();
        var search_tab = $('#search_tab').val();
        var category_id = $('#category_id').val();
        var type_id = $('#type_id').val();
        var object_id = $('#object_id').val();
        var shop_type = $('#shop_type_id').val();
        var normal_search_para = $('#normal_search_para').val();
        var page = $(obj).prev().val();
        var current_column_order = $('#search_current_column_order').val();
        var result_per_page = $('#result_per_page').val();
        setOpacity();

        var pagination_numbers = $('#search_listing').html();
        $('#search_listing').html('' + pagination_numbers + '');

        $.post("/borst/getSearchData?column_id=" + column_id + "&page=" + page + "&search_tab_id=" + search_tab + "&normal_search_para=" + normal_search_para + "&search_current_column_order=" + current_column_order + "&result_per_page=" + result_per_page + '&category_id=' + category_id + '&type_id=' + type_id + '&object_id=' + object_id + '&shop_type=' + shop_type + '&parent_id=' + parent_id, function (data) {
            $('#search_content').html(data);
            setSearchOrderImageAdvSearch('sortby_' + column_id, current_column_order, parent_id);
        });

    }

    function paginationPopup(obj) {
        var offset = $(obj).position();
        $(obj).next().css("left", offset.left - 68);
        var obj1 = $(".forum_drop-down-menu_page");
        if ($(obj1).val() == 0) {
            $(obj1).removeClass("color232222");
            $(obj1).addClass("colorb9c2cf");
        } else {
            $(obj1).removeClass("colorb9c2cf");
            $(obj1).addClass("color232222");
        }
        $(obj).next().toggle();
    }

    function paginationPopupSelect(obj) {
        if ($(obj).val() == 0) {
            $(obj).removeClass("color232222");
            $(obj).addClass("colorb9c2cf");
        } else {
            $(obj).removeClass("colorb9c2cf");
            $(obj).addClass("color232222");
        }
    }

    function sortingPopUp(obj) {
        $(obj).prev().toggle();
    }
</script>
<div class="maincontentpage">
    <div class="inner-page-contetn-left" id="article_lista" >
        <div class="listingleftdivinner" id="search_content">
            <div class="breadcrumb width_90p">
                <ul>
                    <li><?php
include_component('isicsBreadcrumbs', 'show', array(
    'root' => array('text' => 'Börstjänaren', 'uri' => 'borst/borstHome')
))
?> </li>
                </ul>
            </div>

            <div class="blank_30h wisthall space"></div>
            <div class="float_left listing">
                <h2 class="search_title_h2">Sökresultat för <span class="search_title"><?php echo '"' . $ext . '..."'; ?></span></h2>
                <ul class="listingtab" id="search_tabs">
                    <li><a id="search_in_borst" class="cursor search_nav search_nav_top_left <?php if ($search_tab == 'borst') echo 'selectedtab' ?>">Börstjänaren</a></li>
                    <li><a id="search_in_btshop" class="cursor search_nav <?php if ($search_tab == 'btshop') echo 'selectedtab' ?>">BT-Shop</a></li>                                
                    <li><a id="search_in_all" class="cursor search_nav search_nav_bottom_right <?php if ($search_tab == 'all') echo 'selectedtab' ?>">Alla</a></li>
                </ul>
                <input type="hidden" id="normal_search_para" name="normal_search_para" value="<?php echo $normal_search_para; ?>"/>
                <input type="hidden" id="search_tab" name="search_tab" value="<?php echo $search_tab; ?>"/>
                <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
                <input type="hidden" id="search_current_column_order" name="search_current_column_order" value="<?php echo $current_column_order; ?>" />
                <input type="hidden" id="result_per_page" name="result_per_page" value="<?php echo $rec_per_page ?>" />
                <input type="hidden" id="category_id" name="category_id" value="<?php echo $category_id; ?>" />
                <input type="hidden" id="type_id" name="type_id" value="<?php echo $type_id; ?>" />
                <input type="hidden" id="object_id" name="object_id" value="<?php echo $object_id; ?>" />
                <input type="hidden" id="shop_type_id" name="shop_type_id" value="<?php echo $shop_type; ?>" />
            </div>
            <?php if (($pager) && ($pager->getNbResults() > 0)): ?>
                <div class="float_left listing">
                    <?php //if ($search_tab != 'all'): ?>
                    <!--<div class="listingheading rec_per_page">
                        <span class="font_size_18 float_left mrg_top_5"><?php echo __('Antal träffar') ?> : </span>
                        <div class="float_left">
                        <select class="ad_search_select" id="search_no_of_rec" name="search_no_of_rec">
                            <option value="25" <?php if ($sf_params->get('no_of_rec') == 25) echo "selected"; ?>>25</option>
                            <option value="50" <?php if ($sf_params->get('no_of_rec') == 50) echo "selected"; ?>>50</option>
                            <option value="100" <?php if ($sf_params->get('no_of_rec') == 100) echo "selected"; ?>>100</option>
                        </select>
                        </div>
                    </div>-->
                    <?php //endif; ?>
                    <div class="float_left widthall" id="borst_result">
                        <?php if (($search_tab == 'all' || $search_tab == 'borst') && $article_pager): ?>
                            <div  class="listingheading result_title_fs" >Börstjänaren</div>
                            <div class="paginationwrapperNew">
                                <div class="forum_pag" id="search_listing">
                                    <?php if ($pager->haveToPaginate()): ?>
                                        <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                                            <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
                                            <?php } ?>
                                            <?php
                                            $links = $pager->getLinks(11);
                                            foreach ($links as $page):
                                                ?>
                                                <?php if ($page == $pager->getPage()): ?>
                                                    <?php echo '<span class="selected">' . $page . '</span>' ?>
                                                <?php else: ?>
                                                    <a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
                                                <?php endif; ?>
                                                <?php if ($page != $pager->getCurrentMaxLink()): ?>

                                                <?php endif ?>
                                            <?php endforeach ?>
                                            <?php if ($pager->getLastPage() != $pager->getPage()) { ?>
                                                <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span></a>
                                            <?php } ?>
                                            <span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
                                            <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                                            <div class="forum_popup_pagination_wrapper" noclick="1" >
                                                <ul class="pagination_ul">
                                                    <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                                        <li onclick="javascript:paginationUlGo(this);"><?php echo $pg; ?></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        <?php endif ?>
                                </div>
                            </div>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="article_list_table">
                                <!--<tr id="column_header">
                                    <th class="width_30">Art</th>
                                    <th class="width_66"><a id="bt-sortby_date" name="borst_result" class="float_left width_72 cursor"><span class="float_left">Publ.<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
                                    <th class="width_160"><a id="bt-sortby_title" name="borst_result" class="float_left width_80 cursor"><span class="float_left">Rubrik<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
                                    <th class="width_90"><a id="bt-sortby_category" name="borst_result" class="float_left  width_90 cursor"><span class="float_left">Kategori<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
                                    <th class="width_76"><a id="bt-sortby_type" name="borst_result" class="float_left width_80 cursor"><span class="float_left">Typ<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
                                    <th class="width_81"><a id="bt-sortby_object" name="borst_result" class="float_left width_80 cursor"><span class="float_left">Objekt<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
                                    <th class="width_122"><a id="bt-sortby_author" name="borst_result" class="float_left width_100 cursor"><span class="float_left">Författare<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
                                </tr>-->
                                <?php $flagga = "usa.gif"; ?>
                                <tr id="column_header" valign="top" height="35" class="blackcolor">
                                    <!-- <th align="left" width="43" class="list_heading">Art</th> -->
                                    <th align="left" width="71"><a id="bt-sortby_date" name="borst_result" class="float_left cursor "><span class="float_left list_heading">Publ.<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
                                    <th width="16">&nbsp;</th>
                                    <th align="left" width="253"><a id="bt-sortby_title" class="float_left cursor "><span class="float_left list_heading">Rubrik<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
                                    <th width="23">&nbsp;</th>
                                    <th align="left" width="66"><a id="bt-sortby_category" name="borst_result"  class="float_left cursor "><span class="float_left list_heading_kategori">Kategori<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
                                    <th width="11">&nbsp;</th>
                                    <th align="left" width="80"><a id="bt-sortby_type" name="borst_result" class="float_left cursor "><span class="float_left list_heading_typ">Typ<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
                                    <th width="11">&nbsp;</th>
                                    <th align="left" width="60"><a id="bt-sortby_object" name="borst_result" class="float_left cursor "><span class="float_left list_heading_objekt">Objekt<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
                                </tr>
                                <?php if ($article_pager): ?>
                                    <?php foreach ($article_pager->getResults() as $article): ?>
                                        <!--<tr class="classnot">
                                            <td class="width_30"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>
                                            <td class="datefont width_66"><?php echo substr($data->article_date, 2, 9) ?></td>
                                            <td class="main_link_color width_160"><a class="main_link_color float_left cursor" href="http://<?php echo $host_str ?>/borst/borstArticleDetails/article_id/<?php echo $data->article_id ?>"><span class="search_result_title"><?php echo $data->title ? $data->title : '&nbsp;'; ?></span></a></td>
                                            <td class="lightgreenfont width_90"><span class="search_result_cat"><a class="article_cat cursor" name="<?php echo "bt_" . $data->category_id; ?>"><?php echo $bt_cat_arr[$data->category_id] ? $bt_cat_arr[$data->category_id] : '&nbsp;'; ?></a></span></td>
                                            <td class="lightbluefont width_80"><a class="article_type cursor" name="<?php echo "bt_" . $data->type_id; ?>"><?php echo $bt_type_arr[$data->type_id] ? $bt_type_arr[$data->type_id] : '&nbsp;'; ?></a></td>
                                            <td class="darkbluefont width_81"><a class="article_object cursor" name="<?php echo "bt_" . $data->object_id; ?>"><?php echo $bt_object_arr[$data->object_id] ? $bt_object_arr[$data->object_id] : '&nbsp;'; ?></a></td>
                                            <td class="pinkfont width_122"><a class="pinkfont" href="<?php echo "http://" . $host_str . "/sbt/sbtMinProfile/id/" . $data->author_id ?>" ><?php echo $data->author ? $data->author : '&nbsp;'; ?></a></td>
                                        </tr>-->
                                        <?php
                                        if ($object_country_arr[$article->object_id] != "")
                                            $flagga = $object_country_arr[$article->object_id] . ".gif";
                                        else
                                            $flagga = "no_flag.gif";
                                        ?>
                                        <tr class="classnot">
                                            <!-- <td width="43" class="<?php echo $article->art_statid == 2 ? 'redcolor' : '' ?>" ><img src="/images/<?php echo $flagga ?>" width="30" height="17" class="article_list_img">&nbsp;</td> -->
                                            <td width="71" class="<?php echo $article->art_statid == 2 ? 'redcolor' : '' ?> list_date"><?php echo substr($article->article_date, 0, 10); ?></td>
                                            <td width="16">&nbsp;</td>
                                            <td width="253" class="<?php echo $article->art_statid == 2 ? 'redcolor' : '' ?>"><a class=" <?php echo $article->art_statid == 2 ? 'redcolor' : 'list_topic' ?>" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $article->article_id; ?>"><span class="article_list_text"><?php echo $article->title ? $article->title : '&nbsp;'; ?></span></a></td>
                                            <td width="23">&nbsp;</td>
                                            <td width="66" class=" <?php echo $article->art_statid == 2 ? 'redcolor' : 'noclass' ?>"><a name="<?php echo "bt_" . $article->category_id; ?>" class="article_cat <?php echo $article->art_statid == 2 ? 'redcolor' : 'cursor list_heading_kategori' ?>"><span class="article_list_kategori"><?php echo $bt_cat_arr[$article->category_id] ? $bt_cat_arr[$article->category_id] : '&nbsp;'; ?></span></a></td>
                                            <td width="11">&nbsp;</td>
                                            <td width="80" class=" <?php echo $article->art_statid == 2 ? 'redcolor' : 'noclass' ?>"><a name="<?php echo "bt_" . $article->type_id; ?>" class="article_type <?php echo $article->art_statid == 2 ? 'redcolor' : 'cursor list_heading_typ' ?>" ><span class="article_list_typ"><?php echo $bt_type_arr[$article->type_id] ? $bt_type_arr[$article->type_id] : '&nbsp;'; ?></span></a></td>
                                            <td width="11">&nbsp;</td>
                                            <td width="60" class=" <?php echo $article->art_statid == 2 ? 'redcolor' : 'noclass' ?>"><a name="<?php echo "bt_" . $article->object_id; ?>" class="article_object <?php echo $article->art_statid == 2 ? 'redcolor' : 'cursor list_heading_objekt' ?>"><span class="article_list_objekt"><?php echo $bt_object_arr[$article->object_id] ? $bt_object_arr[$article->object_id] : '&nbsp;'; ?></span></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <?php if ($article_pager->getNbResults() < 1): ?> <tr><td colspan="7" align="center"> <p class="no_result_found">Din sökning gav ingen träff</p></td></tr>
                                <?php elseif ($search_tab == 'all' || !$pager->haveToPaginate()): ?>
                                                                                                                                <!--<tr><td colspan="7" class="last_row">&nbsp;</td></tr>-->
                                <?php endif; ?>
                            </table>
                        <?php endif; ?>
                    </div>

                    

                    <!--<div class="paginationwrapper">
                        <div class="pagination" id="search_listing">
                    <?php if ($pager->haveToPaginate()): ?>
                                <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"> <img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> < </a>
                        <?php
                        $links = $pager->getLinks(11);
                        foreach ($links as $page):
                            ?>
                            <?php if ($page == $pager->getPage()): ?>
                                <?php echo '<span class="selected">' . $page . '</span>' ?>
                            <?php else: ?>
                                            <a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
                            <?php endif; ?>
                            <?php if ($page != $pager->getCurrentMaxLink()): ?>
                                                                                                                                                                                        -
                            <?php endif ?>
                        <?php endforeach ?>
                                <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"> > </a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"> <img src="/images/pag_arrow_right.jpg" alt="arrow" /> </a>
                    <?php endif ?>
                        </div>
                    </div>-->

                    <div class="paginationwrapperNew margin_top_pag" style="float:left;">
                        <div class="forum_pag" id="search_listing">
                            <?php if ($pager->haveToPaginate()): ?>
                                <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                                    <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
                                    <?php } ?>
                                    <?php
                                    $links = $pager->getLinks(11);
                                    foreach ($links as $page):
                                        ?>
                                        <?php if ($page == $pager->getPage()): ?>
                                            <?php echo '<span class="selected">' . $page . '</span>' ?>
                                        <?php else: ?>
                                            <a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
                                        <?php endif; ?>
                                        <?php if ($page != $pager->getCurrentMaxLink()): ?>

                                        <?php endif ?>
                                    <?php endforeach ?>
                                    <?php if ($pager->getLastPage() != $pager->getPage()) { ?>
                                        <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span></a>
                                    <?php } ?>
                                    <span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
                                    <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                                    <div class="forum_popup_pagination_wrapper" noclick="1" >
                                        <ul class="pagination_ul">
                                            <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                                <li onclick="javascript:paginationUlGo(this);"><?php echo $pg; ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <h2 class="listingheading margin_left_50">Din sökning gav ingen träff..!</h2>
            <?php endif; ?>
        </div>
        <?php echo include_partial('global/inner_bottom_footer'); ?>
    </div>
    <div class="rightbanner padding_0 font_0 margin_top_ann">
        <div class="home_ad_r float_left font_size_12 ">Annons</div>
        <?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
        </div>
    </div>
</div>
