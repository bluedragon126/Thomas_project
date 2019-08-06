<style>.forum_popup_pagination_wrapper{top:0;}</style>
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
    <div class="inner-page-contetn-left" id="article_lista" style="border:none;">
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
                    <li><a id="search_in_btchart" class="cursor search_nav <?php if ($search_tab == 'btchart') echo 'selectedtab' ?>">BT-Chart</a></li>
                    <li><a id="search_in_forum" class="cursor search_nav <?php if ($search_tab == 'forum') echo 'selectedtab' ?>">Forum</a></li>
                    <li><a id="search_in_askBT" class="cursor search_nav search_nav_top_right <?php if ($search_tab == 'askBT') echo 'selectedtab' ?>">&nbsp;</a></li>
                    <li><a id="search_in_blog" class="cursor search_nav search_nav_bottom_left <?php if ($search_tab == 'blog') echo 'selectedtab' ?>">Bloggar</a></li>
                    <li><a id="search_in_userlist" class="cursor search_nav <?php if ($search_tab == 'userlist') echo 'selectedtab' ?>">Användare</a></li>
                    <li><a id="search_in_sbt" class="cursor search_nav <?php if ($search_tab == 'sbt') echo 'selectedtab' ?>">Dina artiklar</a></li>
                    <li><a id="search_in_askBT" class="cursor search_nav <?php if ($search_tab == 'askBT') echo 'selectedtab' ?>">Fråga BT</a></li>                                
                    <li><a id="search_in_all" class="cursor search_nav search_nav_bottom_right <?php if ($search_tab == 'all') echo 'selectedtab' ?>">Alla</a></li>
                    <li id="loader_li"></li>
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
                                                <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                                                    <option noclick="1" value="0" >Gå till sida...</option>
                                                    <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                                        <option noclick="1" class="color232222" value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                                    <?php } ?>
                                                </select>
                                                <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                                            </div>
                                        <?php endif ?>
                                </div>
                            </div>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="article_list_table">
                                <!--<tr id="column_header">
                                    <th class="width_30">Art</th>
                                    <th class="width_66"><a id="bt-sortby_date" name="borst_result" class="float_left width_72 cursor"><span class="float_left">Publ.<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_160"><a id="bt-sortby_title" name="borst_result" class="float_left width_80 cursor"><span class="float_left">Rubrik<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_90"><a id="bt-sortby_category" name="borst_result" class="float_left  width_90 cursor"><span class="float_left">Kategori<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_76"><a id="bt-sortby_type" name="borst_result" class="float_left width_80 cursor"><span class="float_left">Typ<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_81"><a id="bt-sortby_object" name="borst_result" class="float_left width_80 cursor"><span class="float_left">Objekt<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_122"><a id="bt-sortby_author" name="borst_result" class="float_left width_100 cursor"><span class="float_left">Författare<img src="/images/bg.gif" alt="down" /></span></a></th>
                                </tr>-->
                                <?php $flagga = "usa.gif"; ?>
                                <tr id="column_header" valign="top" height="35" class="blackcolor">
                                    <th align="left" width="43" class="list_heading">Art</th>
                                    <th align="left" width="71"><a id="bt-sortby_date" name="borst_result" class="float_left cursor "><span class="float_left list_heading">Publ.<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th width="16">&nbsp;</th>
                                    <th align="left" width="253"><a id="bt-sortby_title" class="float_left cursor "><span class="float_left list_heading">Rubrik<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th width="23">&nbsp;</th>
                                    <th align="left" width="66"><a id="bt-sortby_category" name="borst_result"  class="float_left cursor "><span class="float_left list_heading_kategori">Kategori<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th width="11">&nbsp;</th>
                                    <th align="left" width="80"><a id="bt-sortby_type" name="borst_result" class="float_left cursor "><span class="float_left list_heading_typ">Typ<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th width="11">&nbsp;</th>
                                    <th align="left" width="60"><a id="bt-sortby_object" name="borst_result" class="float_left cursor "><span class="float_left list_heading_objekt">Objekt<img src="/images/bg.gif" alt="down" /></span></a></th>
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
                                            <td width="43" class="<?php echo $article->art_statid == 2 ? 'redcolor' : '' ?>" ><img src="/images/<?php echo $flagga ?>" width="30" height="17" class="article_list_img">&nbsp;</td>
                                            <td width="71" class="<?php echo $article->art_statid == 2 ? 'redcolor' : '' ?> list_date"><?php echo substr($article->article_date, 0, 10); ?></td>
                                            <td width="16">&nbsp;</td>
                                            <td width="253" class="<?php echo $article->art_statid == 2 ? 'redcolor' : '' ?>"><a class=" <?php echo $article->art_statid == 2 ? 'redcolor' : 'list_topic' ?>" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $article->article_id; ?>"><span class="article_list_text"><?php echo $article->title ? $article->title : '&nbsp;'; ?></span></a></td>
                                            <td width="23">&nbsp;</td>
                                            <td width="66" class=" <?php echo $article->art_statid == 2 ? 'redcolor' : 'noclass' ?>"><a name="<?php echo "bt_" . $article->category_id; ?>" class="article_cat <?php echo $article->art_statid == 2 ? 'redcolor' : 'cursor list_heading_kategori' ?>"><span class="article_list_text"><?php echo $bt_cat_arr[$article->category_id] ? $bt_cat_arr[$article->category_id] : '&nbsp;'; ?></span></a></td>
                                            <td width="11">&nbsp;</td>
                                            <td width="80" class=" <?php echo $article->art_statid == 2 ? 'redcolor' : 'noclass' ?>"><a name="<?php echo "bt_" . $article->type_id; ?>" class="article_type <?php echo $article->art_statid == 2 ? 'redcolor' : 'cursor list_heading_typ' ?>" ><span class="article_list_text"><?php echo $bt_type_arr[$article->type_id] ? $bt_type_arr[$article->type_id] : '&nbsp;'; ?></span></a></td>
                                            <td width="11">&nbsp;</td>
                                            <td width="60" class=" <?php echo $article->art_statid == 2 ? 'redcolor' : 'noclass' ?>"><a name="<?php echo "bt_" . $article->object_id; ?>" class="article_object <?php echo $article->art_statid == 2 ? 'redcolor' : 'cursor list_heading_objekt' ?>"><span class="article_list_text"><?php echo $bt_object_arr[$article->object_id] ? $bt_object_arr[$article->object_id] : '&nbsp;'; ?></span></a></td>
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

                    <div class="float_left widthall" id="blog_result">
                        <?php if (($search_tab == 'all' || $search_tab == 'blog') && $blog_pager): ?>
                            <div  class="listingheading result_title_fs margin_top_38">Bloggar</div>
                            <!--<table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tr id="column_header">
                                    <th class="width_30"><span class="float_left">Art</span></th>
                                    <th class="width_66"><a id="blog-sortby_date" name="blog_result" class="float_left width_72 cursor"><span class="float_left">Publ.<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_160"><a id="blog-sortby_title" name="blog_result" class="float_left width_80 cursor"><span class="float_left">Rubrik<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_90"><a id="blog-sortby_category" name="blog_result" class="float_left width_90 cursor"><span class="float_left">Kategori<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_80"><a id="blog-sortby_type" name="blog_result" class="float_left width_80 cursor"><span class="float_left">Typ<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_81"><a id="blog-sortby_object" name="blog_result" class="float_left width_80 cursor"><span class="float_left">Objekt<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_122"><a id="blog-sortby_author" name="blog_result" class="float_left width_100 cursor"><span >Författare<img src="/images/bg.gif" alt="down" /></a></th>
                                </tr>
                            <?php if ($blog_pager): ?>
                                <?php foreach ($blog_pager->getResults() as $data): ?>
                                        <tr class="classnot">
                                            <td class="width_30"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>
                                            <td class="datefont width_66"><?php echo substr($data->created_at, 2, 9) ?></td>
                                            <td class="main_link_color width_160" ><a class="main_link_color float_left float_left cursor" href="http://<?php echo $host_str ?>/sbt/sbtBlogDetails/blog_id/<?php echo $data->id ?>"><span class="search_result_title"><?php echo $data->ublog_title ?></span></a></td>
                                            <td class="lightgreenfont width_90"><span class="search_result_cat"><a class="article_cat cursor width_90 float_left" name="<?php echo "sbt_" . $data->ublog_category_id; ?>"><?php echo $cat_arr[$data->ublog_category_id] ? $cat_arr[$data->ublog_category_id] : '&nbsp;'; ?></a></span></td>
                                            <td class="lightbluefont width_80"><a class="article_type cursor float_left" name="<?php echo "sbt_" . $data->ublog_type_id; ?>"><?php echo $type_arr[$data->ublog_type_id] ? $type_arr[$data->ublog_type_id] : '&nbsp;'; ?></a></td>
                                            <td class="darkbluefont width_81"><a class="article_object cursor float_left" name="<?php echo "sbt_" . $data->ublog_object_id; ?>"><?php echo $object_arr[$data->ublog_object_id] ? $object_arr[$data->ublog_object_id] : '&nbsp;'; ?></a></td>
                                            <td class="pinkfont width_122"><a class="pinkfont float_left" href="<?php echo "http://" . $host_str . "/sbt/sbtMinProfile/id/" . $data->author_id ?>" ><?php echo $profile->getFullUserName($data->author_id) ? $profile->getFullUserName($data->author_id) : '&nbsp;'; ?></a></td>
                                        </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if ($blog_pager->getNbResults() < 1): ?> <tr><td colspan="7" align="center"> <p class="no_result_found">Din sökning gav ingen träff</p></td></tr>
                            <?php elseif ($search_tab == 'all' || !$pager->haveToPaginate()): ?>
                                    <tr><td colspan="7" class="last_row">&nbsp;</td></tr>
                            <?php endif; ?>
                            </table>-->

                            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="forum_topic_list">
                                <tr id="column_header" class="headerList blog_table_head">
                                    <th class="width326 pad_lft_5"><a id="blog-sortby_title" name="blog_result" class="float_left width326 cursor"><span class="float_left width326">Rubrik/Namn</span></a></th>
                                    <th class="width136"><a id="blog-sortby_category" name="blog_result" class="float_left width136 cursor"><span class="float_left width136">Kategori</span></a></th>
                                    <th class="width108"><span class="float_left width108">Inlägg/visad</span></th>
                                    <th class="forum_table_date_w"><a id="blog-sortby_date" name="blog_result" class="float_left forum_table_date_wcursor"><span class="float_left forum_table_date_w">Senaste</span></a></th>
                                </tr>
                                <?php
                                $i = 1;
                                foreach ($blog_pager->getResults() as $blog):
                                    ?>
                                    <tr <?php
                        if ($i == 1) {
                            echo "class='padding_top_table'";
                        }
                                    ?> >                    
                                        <td class="orgfont width326 pad_lft_5">
                                            <a class="cursor" href="<?php echo "http://" . $host_str ?>/sbt/sbtBlogDetails/blog_id/<?php echo $blog->id ?>"><span class="forum_table_title_w bloglist_blogtitle blog_table_title"><?php echo html_entity_decode($blog->ublog_title) ?></span></a>
                                            </br>
                                            <a class="bloglist_blogauthor blog_table_user width326" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $blog->author_id; ?>"><?php echo $profile->getFullUserName($blog->author_id) ?></a>
                                        </td>
                                        <td class="blog_cat blog_table_topic width136 "><a class="article_cat" name="<?php echo "sbt_" . $data->ublog_category_id; ?>"><?php echo $cat_arr[$blog->ublog_category_id]; ?></a></br><span class="forum_table_views">&nbsp;</span></td>
                                        <td class="width108" ><span class="blog_table_post"><?php echo $sbt_blog_comment->getBlogCommentsCount($blog->id); ?> Inlägg</span></br><span class="forum_table_views"><?php echo $blog->ublog_views ?> visningar</span> </td>
                                        <td class="forum_table_date_w"><span class="blog_prof_table_date"><?php echo substr($blog->created_at, 0, 10) ?></span></br><span class="blog_table_time"><?php echo substr($blog->created_at, 11, -3) ?></span></td>
                                    </tr>
                                    <?php
                                    $i++;
                                endforeach;
                                ?>
                                <?php if ($blog_pager->getNbResults() < 1): ?> <tr><td colspan="7" align="center"><p class="no_result_found">Din sökning gav ingen träff</p></td></tr>
                                <?php elseif ($search_tab == 'all' || !$pager->haveToPaginate()): ?>
                                    <!--<tr><td colspan="10" class="last_row">&nbsp;</td></tr>-->
                                <?php endif; ?>
                            </table>
                        <?php endif; ?>
                    </div>

                    <div class="float_left widthall" id="btshop_result">
                        <?php if (($search_tab == 'all' || $search_tab == 'btshop') && $btshop_pager): ?>
                            <div  class="listingheading result_title_fs margin_top_38">BT-Shop</div>
                            <!--<table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tr id="column_header">
                                    <th class="width_30">Art</th>
                                    <th scope="col" width="38%"><a id="sortby_btshop_article_title" name="btshop_result" class="float_left width_110 cursor"><span class="float_left">Artikel<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th scope="col" width="36%"><a id="sortby_btshop_type_id" name="btshop_result" class="float_left width_110 cursor"><span class="float_left">Typ<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th scope="col" width="22%"><a id="sortby_btshop_product_price" name="btshop_result" class="float_left width_100 cursor"><span class="float_left">Pris<img src="/images/bg.gif" alt="down" /></span></a></th>
                                </tr>
                            <?php if ($btshop_pager): ?>
                                <?php foreach ($btshop_pager->getResults() as $data): ?>
                                        <tr class="classnot">
                                            <td class="width_30"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>
                                            <td class="main_link_color width_240"><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_shop/shopProductDetail/product_id/<?php echo $data->id; ?>"><?php echo $data->btshop_article_title; ?></a></td>
                                            <td class="lightgreenfont width_220"><a class="shop_type cursor" name="<?php echo $data->btshop_type_id ?>"><?php echo $data->BtShopArticleType->btshop_type_name; ?></a></td>
                                            <td class="main_link_color width_122"><a class="main_link_color"><?php echo "från " . BtShopPriceDetails::getMinPriceOfArticle($data->id, $order); ?></a></td>                

                                        </tr>
                                <?php endforeach; ?>
                                <?php if ($btshop_pager->getNbResults() < 1): ?> <tr><td colspan="7" align="center"><p class="no_result_found">Din sökning gav ingen träff</p></td></tr> <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($search_tab == 'all' || !$pager->haveToPaginate()): ?>
                                    <tr><td colspan="7">&nbsp;</td></tr>
                            <?php endif; ?>
                            </table>-->

                            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="forum_topic_list">
                                <tr id="column_header" class="headerList btshop_table_head">
                                    <th class="width326 pad_lft_5"><span class="float_left width326">Rubrik/Namn</span></th>
                                    
                                    <th class="width136"><a id="sortby_btshop_article_title" name="btshop_result" class="float_left width136 cursor"><span class="float_left width136">Artikel</span></a></th>
                                    <th class="width108"><a id="sortby_btshop_type_id" name="btshop_result" class="float_left width108 cursor"><span class="float_left width108">Typ</span></a></th>
                                    <th class="forum_table_date_w"><a id="sortby_btshop_product_price" name="btshop_result" class="float_left forum_table_date_wcursor"><span class="float_left forum_table_date_w">Pris</span></a></th>
                                </tr>
                                <?php if ($btshop_pager): ?>
                                    <?php
                                    $i = 1;
                                    foreach ($btshop_pager->getResults() as $data):
                                        ?>
                                        <tr <?php
                        if ($i == 1) {
                            echo "class='padding_top_table'";
                        }
                                        ?> >                    
                                            <td class="orgfont width326 pad_lft_5"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>
                                            <td class="width136"><a class="blog_table_topic" href="http://<?php echo $host_str ?>/borst_shop/shopProductDetail/product_id/<?php echo $data->id; ?>"><?php echo $data->btshop_article_title; ?></a></td>
                                            <td class="width108"><a class="btshop_table_post shop_type cursor" name="<?php echo $data->btshop_type_id ?>"><?php echo $data->BtShopArticleType->btshop_type_name; ?></a></td>
                                            <td class="forum_table_date_w"><a class="blog_prof_table_date main_link_color"><?php echo "från " . BtShopPriceDetails::getMinPriceOfArticle($data->id, $order); ?></a></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    endforeach;
                                    ?>
                                    <?php if ($btshop_pager->getNbResults() < 1): ?> <tr><td colspan="7" align="center"><p class="no_result_found">Din sökning gav ingen träff</p></td></tr> <?php endif; ?>
                                <?php endif; ?>
                                <?php if ($search_tab == 'all' || !$pager->haveToPaginate()): ?>
                                    <!--<tr><td colspan="7">&nbsp;</td></tr>-->
                                <?php endif; ?>
                            </table>
                        <?php endif; ?>
                    </div>

                    <div class="float_left widthall" id="forum_result">
                        <?php if (($search_tab == 'all' || $search_tab == 'forum') && $forum_pager): ?>
                            <div  class="listingheading result_title_fs margin_top_38">Forum</div>
                            <!--<table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tr id="column_header">
                                    <th class="width_30">Art</th>
                                    <th class="width_66"><a id="forum-sortby_date" name="forum_result" class="float_left width_72 cursor"><span class="float_left">Publ.<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_160"><a id="forum-sortby_title" name="forum_result" class="float_left width_80 cursor"><span class="float_left">Rubrik<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_90"><a id="forum-sortby_category" name="forum_result" class="float_left width_90 cursor"><span class="float_left">Kategori<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_76"><a id="forum-sortby_type" name="forum_result" class="float_left width_80 cursor"><span class="float_left">Typ<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_81"><a id="forum-sortby_object" name="forum_result" class="float_left width_80 cursor"><span class="float_left">Objekt<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_122"><a id="forum-sortby_author" name="forum_result" class="float_left width_100 cursor"><span class="float_left">Författare<img src="/images/bg.gif" alt="down" /></span></a></th>
                                </tr>
                            <?php if ($forum_pager): ?>
                                <?php foreach ($forum_pager->getResults() as $data): ?>
                                        <tr class="classnot">
                                            <td class="width_30"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>
                                            <td class="datefont width_66"><?php echo substr($data->andratdatum, 2, 9) ?></td>
                                            <td class="main_link_color width_160"><a class="main_link_color float_left cursor" href="http://<?php echo $host_str ?>/forum/commentOnForumTopic/forumid/<?php echo $data->koppling ?>"><span class="search_result_title"><?php echo $data->rubrik ? $data->rubrik : '&nbsp;'; ?></span></a></td>
                                            <td class="lightgreenfont width_90"><span class="search_result_cat"><a class="article_cat cursor" name="<?php echo "forum_" . $data->btforum_category_id; ?>"><?php echo $forum_cat_arr[$data->btforum_category_id] ? $forum_cat_arr[$data->btforum_category_id] : '&nbsp;'; ?></a></span></td>
                                            <td class="lightbluefont width_80 talign_center">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo '-' ?></td>
                                            <td class="darkbluefont width_81">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo '-' ?></td>
                                            <td class="pinkfont width_122"><a class="pinkfont" href="<?php echo "http://" . $host_str . "/sbt/sbtMinProfile/id/" . $data->author_id ?>" ><?php echo $data->skapare ?></a></td>
                                        </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if ($forum_pager->getNbResults() < 1): ?> <tr><td colspan="7" align="center"> <p class="no_result_found">Din sökning gav ingen träff</p></td></tr>
                            <?php elseif ($search_tab == 'all' || !$pager->haveToPaginate()): ?>
                                    <tr><td colspan="7" class="last_row">&nbsp;</td></tr>
                            <?php endif; ?>
                            </table>-->

                            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="forum_topic_list">
                                <tr id="forum_topic_listing_column_row1" class="forum_table_head">
                                    <th class="forum_table_title_w pad_lft_5"><a id="forum-sortby_title" name="forum_result" class="float_left forum_table_title_w cursor"><span class="float_left forum_table_title_w">Rubrik/Namn</span></a></th>
                                    <th class="width_9">&nbsp;</th>
                                    <th class="forum_table_topic_w"><a id="forum-sortby_category" name="forum_result" class="float_left forum_table_topic_w cursor"><span class="float_left forum_table_topic_w">Ämne</span></a></th>
                                    <th class="width_9">&nbsp;</th>
                                    <th class="width_9">&nbsp;</th>
                                    <th class="width_9">&nbsp;</th>
                                    <th class="forum_table_post_w"><span class="float_left forum_table_post_w">Inlägg/visad</span></th>
                                    <th class="width_9">&nbsp;</th>
                                    <th class="forum_table_date_w"><a id="forum-sortby_date" name="forum_result" class="float_left forum_table_date_wcursor"><span class="float_left forum_table_date_w">Senaste</span></a></th>
                                </tr>
                                <?php if ($forum_pager): ?>
                                    <?php
                                    $i = 1;
                                    foreach ($forum_pager->getResults() as $forum):
                                        ?>
                                        <tr <?php
                        if ($i == 1) {
                            echo "class='padding_top_table'";
                        }
                                        ?> >
                                            <td class="orgfont forum_table_title_w pad_lft_5">
                                                <a class="cursor" href="<?php echo "http://" . $host_str . "/forum/commentOnForumTopic/forumid/" . $forum->id ?>"><span class="forum_table_title_w forum_table_title"><?php echo $forum->rubrik ?></span></a>
                                                </br>
                                                <a class="forum_table_user forum_table_title_w" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $forum->author_id //$profile->getUserFromFullName($forum->skapare)                  ?>"><?php echo $profile->getFullUserName($forum->author_id); ?></a>
                                            </td>
                                            <td class="width_9">&nbsp;</td>
                                            <td class="forum_table_topic_w forum_table_topic"><span class="search_result_cat"><a class="article_cat cursor" name="<?php echo "forum_" . $forum->btforum_category_id; ?>"><?php echo $forum_cat_arr[$forum->btforum_category_id] ? $forum_cat_arr[$forum->btforum_category_id] : '&nbsp;'; ?></a></span></td>                                                                            
                                            <td class="width_9">&nbsp;</td>
                                            <th class="width_9">&nbsp;</th>
                                            <th class="width_9">&nbsp;</th>
                                            <td class="forum_table_post_w" ><span class="forum_table_post"><?php echo $forum->getReplyCount($forum->id) . " Inlägg"; ?></span></br><span class="forum_table_views"><?php echo $forum->visningar . " Visad"; ?> </span> </td>
                                            <td class="width_9">&nbsp;</td>
                                            <td class="forum_table_date_w"><span class="forum_table_date"><?php echo substr($forum->andratdatum, 0, 10); ?></span></br><span class="forum_table_time"><?php echo substr($forum->andratdatum, 11, -3); ?></span></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    endforeach;
                                    ?>
                                <?php endif; ?>
                                <?php if ($forum_pager->getNbResults() < 1): ?> <tr><td colspan="7" align="center"> <p class="no_result_found">Din sökning gav ingen träff</p></td></tr>
                                <?php elseif ($search_tab == 'all' || !$pager->haveToPaginate()): ?>
                                    <!--<tr><td colspan="7" class="last_row">&nbsp;</td></tr>-->
                                <?php endif; ?>  
                            </table>
                        <?php endif; ?>
                    </div>



                    <div class="float_left widthall" id="userlist_result">
                        <?php if (($search_tab == 'all' || $search_tab == 'userlist') && $userlist_pager): ?>
                            <div  class="listingheading result_title_fs margin_top_38">Användare</div>
                            <!--<table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tr id="column_header">
                                    <th scope="col" width="7%">Avatar</th>
                                    <th scope="col" width="20%"><a id="sortby_author_userlist" name="userlist_result" class="float_left width_107 cursor"><span class="float_left">&nbsp;&nbsp;Användare<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th scope="col" width="10%"><a id="sortby_title_userlist" name="userlist_result" class="float_left width_65 cursor"><span class="float_left">Titel<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_81"><a id="sortby_regdate" name="userlist_result" class="float_left width_87 cursor"><span class="float_left">Regdate<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th scope="col" width="10%"><a id="sortby_message" name="userlist_result" class="float_left width_75 cursor"><span class="float_left">Inlägg<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th scope="col" width="10%"><a id="sortby_vote" name="userlist_result" class="float_left width_80 cursor"><span class="float_left">Röster<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th scope="col" width="10%"><a id="sortby_totallogin" name="userlist_result" class="float_left width_75 cursor"><span class="float_left">Inlogg<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th scope="col" width="20%"><a id="sortby_lastlogin" name="userlist_result" class="float_left width_98 cursor"><span class="float_left">Senaste<img src="/images/bg.gif" alt="down" /></span></a></th>
                                </tr>
                            <?php if ($userlist_pager): ?>
                                <?php foreach ($userlist_pager->getResults() as $user): ?>
                                            <tr class="classnot">
                                                <td class="pright_10"><a class="bluegrayfont" href="<?php echo 'http://' . $host_str . '/sbt/sbtMinProfile/id/' . $user->user_id; ?>">
                                    <?php if ($user_arr[$user->user_id] != ''): ?>
                                                        <img src="/uploads/userThumbnail/<?php echo str_replace('.', '_mid.', $user_arr[$user->user_id]); ?>" alt="user_photo"/>
                                    <?php else: ?>
                                        <?php if ($user->gender == 1): ?>
                                                            <img src="/images/user_photo.jpg" alt="adv"/>
                                        <?php else: ?>
                                                            <img src="/images/avatar_photo.jpg" alt="adv"/>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                                </a></td>
                                                <td class="bluegrayfont pright_10 pleft_6">&nbsp;&nbsp;<a class="bluegrayfont" href="<?php echo 'http://' . $host_str . '/sbt/sbtMinProfile/id/' . $user->user_id; ?>"><?php echo $profile->getFullUserName($user->user_id) ?></a></td>
                                                <td class="skincolor pright_10"><?php echo $user->how_is_user($user->user_id) ?></td>
                                                <td><?php echo substr($user->regdate, 0, 10); ?></td>
                                                <td class="bluegrayfont pright_10" align="center"><?php echo $user->getTotalMessagesReceived($user->user_id) ?></td>
                                                <td class="lightgreenfont pright_10" align="center">&nbsp;<?php echo $user->getTotalVotesReceived($user->user_id); ?></td>
                                                <td class="lightbluefont pright_10" align="center"><?php echo $user->inlog ?></td>
                                                <td class="darkbluefont"><?php echo $user->inlogdate == '0000-00-00 00:00:00' ? '-' : substr($user->inlogdate, 0, 16); ?></td>
                                            </tr>
                                <?php endforeach; ?>

                                <?php if ($userlist_pager->getNbResults() < 1): ?> <tr><td colspan="8" align="center"><p class="no_result_found">Din sökning gav ingen träff</p></td></tr> <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($search_tab == 'all' || !$pager->haveToPaginate()): ?>
                                        <tr><td colspan="8">&nbsp; </td></tr>
                            <?php endif; ?>
                            </table>-->

                            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="forum_topic_list">
                                <tr id="column_header" class="headerList blog_table_head">
                                    <th class="width_55 pad_lft_5"><span class="float_left width_55">Avatar</span></th>
                                    <th class="width_150"><a id="sortby_author_userlist" name="userlist_result" class="float_left width_150 cursor"><span class="float_left width_150">Användare</span></a></th>
                                    <th class="width_100"><a id="sortby_title_userlist" name="userlist_result" class="float_left width_100 cursor"><span class="float_left width_100">Titel</span></a></th>
                                    <th class="width_100"><a id="sortby_regdate" name="userlist_result" class="float_left width_100 cursor"><span class="float_left width_100">Regdate</span></a></th>                    
                                    <th class="width_55"><a id="sortby_message" name="userlist_result" class="float_left width_55 cursor"><span class="float_left width_55">Inlägg</span></a></th>
                                    <th class="width_55"><a id="sortby_vote" name="userlist_result" class="float_left width_55 cursor"><span class="float_left width_55">Röster</span></a></th>
                                    <th class="width_55"><a id="sortby_totallogin" name="userlist_result" class="float_left width_55 cursor"><span class="float_left width_55">Inlogg</span></a></th>
                                    <th class="width_76"><a id="sortby_lastlogin" name="userlist_result" class="float_left width_76 cursor"><span class="float_left width_76">Senaste</span></a></th>
                                </tr>
                                <?php if ($userlist_pager): ?>
                                    <?php
                                    $i = 1;
                                    foreach ($userlist_pager->getResults() as $user):
                                        ?>
                                        <tr <?php
                        if ($i == 1) {
                            echo "class='padding_top_table'";
                        }
                                        ?> >                    
                                            <td class="orgfont width_55 pad_lft_5">
                                                <a class="bluegrayfont" href="<?php echo 'http://' . $host_str . '/sbt/sbtMinProfile/id/' . $user->user_id; ?>">
                                                    <?php if ($user_arr[$user->user_id] != ''): ?>
                                                        <img width="36" height = "36" src="/uploads/userThumbnail/<?php echo str_replace('.', '_mid.', $user_arr[$user->user_id]); ?>" alt="user_photo"/>
                                                    <?php else: ?>
                                                        <?php if ($user->gender == 1): ?>
                                                            <img src="/images/user_photo.jpg" alt="adv"/>
                                                        <?php else: ?>
                                                            <img src="/images/avatar_photo.jpg" alt="adv"/>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </a>
                                            </td>
                                            <td class="width_150 ">                                            
                                                <a class="bolg_table_name" href="<?php echo 'http://' . $host_str . '/sbt/sbtMinProfile/id/' . $user->user_id; ?>"><?php echo $profile->getFullUserName($user->user_id) ?></a>
                                            </td>
                                            <td class="width_100 blog_table_topic"><span class=""><?php echo $user->how_is_user($user->user_id) ?></span></td>
                                            <td class="width_100"><span class="blog_prof_table_date"><?php echo substr($user->regdate, 0, 10); ?></span></td>
                                            <td class="width_55 talign_right"><span class="blog_table_post_r padding_right_23"><?php echo $user->getTotalMessagesReceived($user->user_id) ?></span></td>
                                            <td class="width_55 talign_right"><span class="blog_table_votes padding_right_23"><?php echo $user->getTotalVotesReceived($user->user_id) ? $user->getTotalVotesReceived($user->user_id) : 0; ?></span></td>
                                            <td class="width_55 talign_right"><span class="blog_table_inlog padding_right_23"><?php echo $user->inlog ?></span></td>
                                            <td class="width_76">
                                                <span class="blog_prof_table_date"><?php echo substr($user->inlogdate, 0, 10) ?></span>
                                                <span class="blog_table_time"><?php echo substr($user->inlogdate, 10, 6) ?></span>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    endforeach;
                                    ?>
                                    <?php if ($userlist_pager->getNbResults() < 1): ?> <tr><td colspan="8" align="center"><p class="no_result_found">Din sökning gav ingen träff</p></td></tr> <?php endif; ?>
                                <?php endif; ?>
                                <?php if ($search_tab == 'all' || !$pager->haveToPaginate()): ?>
                                    <!--<tr><td colspan="8">&nbsp; </td></tr>-->
                                <?php endif; ?>
                            </table>
                        <?php endif; ?>
                    </div>

                    <div class="float_left widthall" id="btchart_result">
                        <?php if (($search_tab == 'all' || $search_tab == 'btchart') && $btchart_pager): ?>
                            <div  class="listingheading result_title_fs margin_top_38">BT-Chart</div>
                            <!--<table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                <tr id="column_header">
                                    <th class="width_30">Art</th>
                                    <th scope="col" width="38%"><a id="sortby_company_name" name="btchart_result" class="float_left width_110 cursor"><span class="float_left">Stock Name<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th scope="col" width="36%"><a id="sortby_company_symbol" name="btchart_result" class="float_left width_110 cursor"><span class="float_left">Short Name<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th scope="col" width="22%"><a id="sortby_company_type" name="btchart_result" class="float_left width_100 cursor"><span class="float_left">Stock List<img src="/images/bg.gif" alt="down" /></span></a></th>
                                </tr>
                            <?php if ($btchart_pager): ?>
                                <?php foreach ($btchart_pager->getResults() as $data): ?>
                                            <tr class="classnot">
                                                <td class="width_30"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>
                                                <td class="main_link_color width_240"><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $data->company_name); ?>/stock_id/<?php echo $data->id; ?>"><?php echo ($data->company_name); ?></a></td>
                                                <td class="lightgreenfont width_220"><a class="lightgreenfont" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $data->company_name); ?>/stock_id/<?php echo $data->id; ?>"><?php echo ($data->company_symbol); ?></a></td>
                                                <td class="main_link_color width_122"><a class="main_link_color" href="http://<?php echo $host_str ?>/borst_charts/borstCharts<?php echo $stock_type_arr[$data->company_type_id] ?>" ><?php echo ($data->BtchartCompanyCategory->company_type); ?></a></td>
                                            </tr>
                                <?php endforeach; ?>
                                <?php if ($btchart_pager->getNbResults() < 1): ?> <tr><td colspan="7" align="center"><p class="no_result_found">Din sökning gav ingen träff</p></td></tr> <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($search_tab == 'all' || !$pager->haveToPaginate()): ?>
                                    <tr><td colspan="7">&nbsp;</td></tr>
                            <?php endif; ?>
                            </table>-->

                            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="forum_topic_list">
                                <tr id="column_header" class="headerList btshop_table_head">
                                    <th class="width326 pad_lft_5"><span class="float_left width326">Rubrik/Namn</span></th>
                                    <th class="width136"><a id="sortby_company_name" name="btchart_result" class="float_left cursor"><span class="float_left width136">Stock Name</span></a></th>
                                    <th class="width108"><a id="sortby_company_symbol" name="btchart_result" class="float_left cursor"><span class="float_left width108">Short Name</span></a></th>
                                    <th class="forum_table_date_w"><a id="sortby_company_type" name="btchart_result" class="float_left cursor"><span class="float_left forum_table_date_w">Stock List</span></a></th>
                                </tr>
                                <?php if ($btchart_pager): ?>
                                    <?php
                                    $i = 1;
                                    foreach ($btchart_pager->getResults() as $data):
                                        ?>
                                        <tr <?php
                        if ($i == 1) {
                            echo "class='padding_top_table'";
                        }
                                        ?> >                    
                                            <td class="orgfont width326 pad_lft_5"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>
                                            <td class="width136"><a  class="blog_table_topic" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $data->company_name); ?>/stock_id/<?php echo $data->id; ?>"><?php echo ($data->company_name); ?></a></td>
                                            <td class="width108"><a class="btshop_table_post" href="http://<?php echo $host_str ?>/borst_charts/borstShowChart/stock_name/<?php echo str_replace("/", "_", $data->company_name); ?>/stock_id/<?php echo $data->id; ?>"><?php echo ($data->company_symbol); ?></a></td>
                                            <td class="forum_table_date_w"><a class="blog_prof_table_date" href="http://<?php echo $host_str ?>/borst_charts/borstCharts<?php echo $stock_type_arr[$data->company_type_id] ?>" ><?php echo ($data->BtchartCompanyCategory->company_type); ?></a></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    endforeach;
                                    ?>
                                    <?php if ($btchart_pager->getNbResults() < 1): ?> <tr><td colspan="7" align="center"><p class="no_result_found">Din sökning gav ingen träff</p></td></tr> <?php endif; ?>                                
                                <?php endif; ?>
                                <?php if ($search_tab == 'all' || !$pager->haveToPaginate()): ?>
                                    <!--<tr><td colspan="7">&nbsp;</td></tr>-->
                                <?php endif; ?>
                            </table>        
                        <?php endif; ?>
                    </div>


                    <?php ?><div class="float_left widthall" id="sbt_result">
                    <?php if (($search_tab == 'all' || $search_tab == 'sbt') && $analysis_pager): ?>
                            <div  class="listingheading result_title_fs margin_top_38">BT Insider</div>
                            <!--<table width="100%" border="0" cellspacing="0" cellpadding="0" id="sbt_result_table">
                                <tr id="column_header">
                                    <th class="width_30">Art</th>
                                    <th class="width_66"><a id="sbt-sortby_date" name="sbt_result" class="float_left width_72 cursor"><span class="float_left">Publ.<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_160"><a id="sbt-sortby_title" name="sbt_result" class="float_left width_80 cursor"><span class="float_left">Rubrik<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_90"><a id="sbt-sortby_category" name="sbt_result" class="float_left width_90 cursor"><span class="float_left">Kategori<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_80"><a id="sbt-sortby_type" name="sbt_result" class="float_left width_80 cursor"><span class="float_left">Typ<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_81"><a id="sbt-sortby_object" name="sbt_result" class="float_left width_80 cursor"><span class="float_left">Objekt<img src="/images/bg.gif" alt="down" /></span></a></th>
                                    <th class="width_122"><a id="sbt-sortby_author" name="sbt_result" class="float_left width_100 cursor"><span class="float_left">Författare<img src="/images/bg.gif" alt="down" /></span></a></th>
                                </tr>
                            <?php if ($analysis_pager): ?>
                                <?php foreach ($analysis_pager->getResults() as $data): ?>
                                                <tr class="classnot" id="sbt_result_classnot">
                                                    <td class="width_30"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>
                                                    <td class="datefont width_66"><?php echo substr($data->created_at, 2, 9) ?></td>
                                                    <td class="main_link_color width_160"><a class="main_link_color float_left cursor" href="http://<?php echo $host_str ?>/sbt/sbtArticleDetails/article_id/<?php echo $data->id ?>"><span class="search_result_title"><?php echo $data->analysis_title ?></span></a></td>
                                                    <td class="lightgreenfont width_90"><span class="search_result_cat"><a class="article_cat cursor" name="<?php echo "sbt_" . $data->analysis_category_id; ?>"><?php echo $cat_arr[$data->analysis_category_id] ? $cat_arr[$data->analysis_category_id] : '&nbsp;'; ?></a></span></td>
                                                    <td class="lightbluefont width_80"><a class="article_type cursor" name="<?php echo "sbt_" . $data->analysis_type_id; ?>"><?php echo $type_arr[$data->analysis_type_id] ? $type_arr[$data->analysis_type_id] : '&nbsp;'; ?></a></td>
                                                    <td class="darkbluefont width_81"><a class="article_object cursor" name="<?php echo "sbt_" . $data->analysis_object_id; ?>"><?php echo $object_arr[$data->analysis_object_id] ? $object_arr[$data->analysis_object_id] : '&nbsp;'; ?></a></td>
                                                    <td class="pinkfont width_122"><a class="pinkfont" href="<?php echo "http://" . $host_str . "/sbt/sbtMinProfile/id/" . $data->author_id ?>" ><?php echo $profile->getFullUserName($data->author_id) ? $profile->getFullUserName($data->author_id) : '&nbsp;'; ?></a></td>
                                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if ($analysis_pager->getNbResults() < 1): ?> <tr><td colspan="7" align="center"> <p class="no_result_found">Din sökning gav ingen träff</p></td></tr>
                            <?php elseif ($search_tab == 'all' || !$pager->haveToPaginate()): ?>
                                        <tr><td colspan="7" class="last_row">&nbsp;</td></tr>
                            <?php endif; ?>
                            </table>-->

                            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="forum_topic_list">
                                <tr id="column_header" class="headerList sbt_result_table_head">
                                    <th class="width_40 pad_lft_5"><span class="float_left width_40">Art</span></th>
                                    <th class="width_65"><a id="sbt-sortby_date" name="sbt_result" class="float_left width_65 cursor"><span class="float_left">Publ.</span></a></th>
                                    <th class="width_140"><a id="sbt-sortby_title" name="sbt_result" class="float_left width_140 cursor"><span class="float_left">Rubrik</span></a></th>
                                    <th class="width_100"><a id="sbt-sortby_category" name="sbt_result" class="float_left width_100 cursor"><span class="float_left">Kategori</span></a></th>                    
                                    <th class="width_100"><a id="sbt-sortby_type" name="sbt_result" class="float_left width_100 cursor"><span class="float_left">Typ</span></a></th>
                                    <th class="width_100"><a id="sbt-sortby_object" name="sbt_result" class="float_left width_100 cursor"><span class="float_left">Objekt</span></a></th>
                                    <th class="width_100"><a id="sbt-sortby_author" name="sbt_result" class="float_left width_100 cursor"><span class="float_left">Författare</span></a></th>
                                </tr>
                                <?php if ($analysis_pager): ?>
                                    <?php
                                    $i = 1;
                                    foreach ($analysis_pager->getResults() as $data):
                                        ?>
                                        <tr <?php
                        if ($i == 1) {
                            echo "class='padding_top_table'";
                        }
                                        ?> >                    
                                            <td class="orgfont width_40 pad_lft_5"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>
                                            <td class="width_65 blog_prof_table_date"><?php echo substr($data->created_at, 2, 9) ?></td>
                                            <td class="width_140"><a class="blog_table_post_r float_left cursor" href="http://<?php echo $host_str ?>/sbt/sbtArticleDetails/article_id/<?php echo $data->id ?>"><span class="search_result_title"><?php echo $data->analysis_title ?></span></a></td>
                                            <td class="width_100 "><span class="blog_table_topic search_result_cat"><a class="article_cat cursor" name="<?php echo "sbt_" . $data->analysis_category_id; ?>"><?php echo $cat_arr[$data->analysis_category_id] ? $cat_arr[$data->analysis_category_id] : '&nbsp;'; ?></a></span></td>
                                            <td class="width_100 "><span class="blog_table_topic"><a class="article_type cursor" name="<?php echo "sbt_" . $data->analysis_type_id; ?>"><?php echo $type_arr[$data->analysis_type_id] ? $type_arr[$data->analysis_type_id] : '&nbsp;'; ?></a></span></td>
                                            <td class="width_100 "><span class="blog_table_topic"><a class="article_object cursor" name="<?php echo "sbt_" . $data->analysis_object_id; ?>"><?php echo $object_arr[$data->analysis_object_id] ? $object_arr[$data->analysis_object_id] : '&nbsp;'; ?></a></span></td>
                                            <td class="width_100 "><a class="blog_table_post_r" href="<?php echo "http://" . $host_str . "/sbt/sbtMinProfile/id/" . $data->author_id ?>" ><?php echo $profile->getFullUserName($data->author_id) ? $profile->getFullUserName($data->author_id) : '&nbsp;'; ?></a></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    endforeach;
                                    ?>
                                    <?php if ($analysis_pager->getNbResults() < 1): ?> <tr><td colspan="8" align="center"><p class="no_result_found">Din sökning gav ingen träff</p></td></tr> <?php endif; ?>
                                <?php endif; ?>
                                <?php if ($search_tab == 'all' || !$pager->haveToPaginate()): ?>
                                    <!--<tr><td colspan="8">&nbsp; </td></tr>-->
                                <?php endif; ?>
                            </table>
                        <?php endif; ?>
                    </div><?php ?>

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

                    <div class="paginationwrapperNew margin_top_38" style="float:left;">
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
                                        <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                                            <option noclick="1" value="0" >Gå till sida...</option>
                                            <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                                <option noclick="1" class="color232222" value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                            <?php } ?>
                                        </select>
                                        <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
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
    <div class="rightbanner padding_0 font_0">
        <div class="home_ad_r float_left font_size_12">Annons</div>
        <?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
        </div>
    </div>
</div>
