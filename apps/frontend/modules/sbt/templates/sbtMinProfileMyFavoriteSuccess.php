<script type="text/javascript" language="javascript">

    function paginationPopupGo(obj) {
        var column_id = $('#column_id').val();
        var page = $(obj).prev().val();
        var current_column_order = $('#bloglist_current_column_order').val();
        var pagination_numbers = $('.all_my_subscription_pagination').html();

        $('.all_my_subscription_pagination').html('<span class="float_right">' + pagination_numbers + '</span>');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.ajax({
            url: '/sbt/fetchMoreMySubscription?column_id=' + column_id + '&page=' + page + '&bloglist_current_column_order=' + current_column_order, //?page='+page,
            success: function (data)
            {
                $('#my_subscription_list').html(data);
                $('.indicator').hide();
                $('#pop-box-over').hide();
            }
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
    function paginationPopupGoActive(obj, id) {
        var column_id = $('#column_id').val();
        var page = $(obj).prev().find('select').val();
        var current_column_order = $('#bloglist_current_column_order').val();
        var pagination_numbers = $('#' + id).html();
        $('#' + id).html(pagination_numbers + '');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.ajax({
            url: '/sbt/fetchMoreFavoriteRecords?id=' + id + '&column_id=' + column_id + '&page=' + page + '&bloglist_current_column_order=' + current_column_order, //?page='+page,
            success: function (data)
            {
                if(id == 'fav_analysis_listing') $("#analysis_fav_list").html(data); $('#analysis_fav_list').jqTransform();
                if(id == 'fav_article_listing') $("#article_fav_list").html(data); $('#article_fav_list').jqTransform();
                if(id == 'fav_forum_listing') $("#forum_fav_list").html(data); $('#forum_fav_list').jqTransform();
                if(id == 'fav_blog_listing') $("#blog_fav_list").html(data); $('#blog_fav_list').jqTransform();
                if(id == 'fav_chart_listing') $("#chart_fav_list").html(data);
                $('#myaccount_data_container form').jqTransform();
                $('.indicator').hide();
                $('#pop-box-over').hide();
                $('#myaccount_data_container form').jqTransform();
            }
        });
    }

    function paginationPopupActive(obj) {
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

    function paginationPopupSelectActive(obj) {
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
<div class="article_fav" id="article_fav_container">
    <div class="blog_user_profile_deshboard">Artiklar</div>
    <div class="favortite_save_changes"><span id="article_fav_reply" class="float_right"></span></div>
    <form name="article_notification_change_form" id="fav_article_form" method="post" action="">
        <div class="float_left widthall" id="article_fav_list">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" summary="fav_article_listing">
                <tr id="article_fav_list_column_row" class="blog_table_head">
                    <th id="sortby_srno"  class="cursor pad_lft_5" scope="col" width="35" align="left">Nr</th>
                    <th id="sortby_article"  class="cursor" scope="col" width="370" align="left">Artikelrubrik</th>
                    <th scope="col" width="150" align="left">E-postnotofication</th>
                    <th scope="col" width="50" align="left">Ta bort</th>
                </tr>
                <?php
                $i = 1;
                foreach ($article_pager->getResults() as $data):
                    ?>	
                    <tr class="classnot">
                        <td class="prof_table_no" width="35" align="center"><?php echo $i; ?></td>
                        <td class="prof_table_sub" width="370" align="left"><a class="main_link_color" href="<?php echo 'http://' . $host_str . '/borst/borstArticleDetails/article_id/' . $data->f_id; ?>"><span class="profile_favoratelist_title"><?php echo $data->f_name; ?></span></a></td>
                        <td width="150" align="left">
                            <span class="float_left radio-mrg" id="article_radio">
                                <input type="radio" class="radio" id="<?php echo $data->id; ?>" name="fav_rec[<?php echo $data->id; ?>]" value="1" <?php if ($data->f_notification == 1) echo "checked"; ?> /><span class="prof_email_y">Ja</span>
                            </span>
                            <span class="float_left margin_left_5" id="article_radio">
                                <input type="radio" class="radio"  id="<?php echo $data->id; ?>" name="fav_rec[<?php echo $data->id; ?>]" value="0" <?php if ($data->f_notification == 0) echo "checked"; ?> /><span class="pro_email_n">Nej</span>
                            </span>
                        </td>
                        <td width="50" align="center">
                            <span class="float_left mleft_15" id="r_<?php echo $data->id ?>">
                                <img class="remove_from_fav_list" src="/images/cross.png" width="10" height="10" alt="remove" onclick="removeItemFormFavoriteList('<?php echo $data->id ?>', 'fav_article_listing', 'r_<?php echo $data->id ?>')" />
                            </span>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>	
            </table>

            <div class="paginationwrapperNew widthall">
                <div class="forum_pag all_favorite_pagination widthall" id="fav_article_listing">
                    <?php if ($article_pager->haveToPaginate()): ?>
                        <?php if ($article_pager->getFirstPage() != $article_pager->getPage()) { ?>
                            <a id="<?php echo $article_pager->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $article_pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
                            <?php } ?>
                            <?php
                            $links = $article_pager->getLinks(11);
                            foreach ($links as $page):
                                ?>
                                <?php if ($page == $article_pager->getPage()): ?>
                                    <?php echo '<span class="selected">' . $page . '</span>' ?>
                                <?php else: ?>
                                    <a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
                                <?php endif; ?>
                                <?php if ($page != $article_pager->getCurrentMaxLink()): ?>

                                <?php endif ?>
                            <?php endforeach ?>
                            <?php if ($article_pager->getLastPage() != $article_pager->getPage()) { ?>
                                <a id="<?php echo $article_pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $article_pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span></a>
                            <?php } ?>
                            <span>Sid <?php echo $article_pager->getPage(); ?> av <?php echo $article_pager->getLastPage(); ?></span>
                            <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopupActive(this);"></span>
                            <div class="forum_popup_pagination_wrapper" noclick="1" >
                                <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelectActive(this);" >
                                    <option noclick="1" value="0" class="forum_select_option_color" >Gå till sida...</option>
                                    <?php for ($pg = 1; $pg <= $article_pager->getLastPage(); $pg++) { ?>
                                        <option noclick="1" class="color232222" <?php
                                        if ($article_pager->getPage() == $pg) {
                                            echo "selected='selected'";
                                        }
                                        ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                            <?php } ?>
                                </select>
                                <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGoActive(this, 'fav_article_listing');">GA</div>
                            </div>
                            <span class="forum_sorting_wrapper">
                                <div noclick="1" class="floatRight blog_drop-down-menus favourite_article_listing_column_row_all_active_subscription">
                                    <ul noclick="1">
                                        <li noclick="1"><span noclick="1" id="sortby_article" class="cursor" summary="fav_article_listing">Artikelrubrik</span></li>
                                    </ul>
                                </div>
                                <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                                <span class="floatRight">Sortera efter</span>
                            </span>
                        <?php endif ?>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="forum_fav" id="forum_fav_container">
    <div class="blog_user_profile_deshboard">Forum</div>
    <div class="favortite_save_changes"><span id="forum_fav_reply" class="float_right"></span></div>
    <form name="forum_notification_change_form" id="fav_forum_form" method="post" action="">
        <div class="float_left widthall" id="forum_fav_list">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" summary="fav_forum_listing">
                <tr id="forums_fav_list_column_row" class="blog_table_head">
                    <th id="sortby_srno"  class="cursor pad_lft_5" scope="col" width="35" align="left">Nr</th>
                    <th id="sortby_article"  class="cursor" scope="col" width="370" align="left">Amne</th>
                    <th scope="col" width="150" align="left">E-postnotofication</th>
                    <th scope="col" width="50" align="left">Ta bort</th>
                </tr>
                <?php
                $i = 1;
                foreach ($forum_pager->getResults() as $data):
                    ?>	
                    <tr class="classnot">
                        <td class="prof_table_no" align="center"><?php echo $i; ?></td>
                        <td class="prof_table_sub" width="370" align="left"><a class="" href="<?php echo "http://" . $host_str ?>/forum/commentOnForumTopic/forumid/<?php echo $data->f_id ?>"><span class="profile_favoratelist_title"><?php echo $data->f_name; ?></span></a></td>
                        <td width="150" align="left">
                            <span class="float_left radio-mrg" id="forum_radio">
                                <input type="radio" class="radio" id="<?php echo $data->id; ?>" name="fav_rec[<?php echo $data->id; ?>]" value="1" <?php if ($data->f_notification == 1) echo "checked"; ?> /><span class="prof_email_y">Ja</span>
                            </span>
                            <span class="float_left margin_left_5" id="forum_radio">
                                <input type="radio" class="radio" id="<?php echo $data->id; ?>" name="fav_rec[<?php echo $data->id; ?>]" value="0" <?php if ($data->f_notification == 0) echo "checked"; ?> /><span class="pro_email_n">Nej</span>
                            </span>
                        </td>
                        <td width="50" align="center">
                            <span class="float_left mleft_15" id="r_<?php echo $data->id ?>">
                                <img class="remove_from_fav_list" src="/images/cross.png" width="10" height="10" alt="remove" onclick="removeItemFormFavoriteList('<?php echo $data->id ?>', 'fav_forum_listing', 'r_<?php echo $data->id ?>')" />
                            </span>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>	
            </table>

            <div class="paginationwrapperNew widthall">
                <div class="forum_pag all_favorite_pagination widthall" id="fav_forum_listing">
                    <?php if ($forum_pager->haveToPaginate()): ?>
                        <?php if ($forum_pager->getFirstPage() != $forum_pager->getPage()) { ?>
                            <a id="<?php echo $forum_pager->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $forum_pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
                            <?php } ?>
                            <?php
                            $links = $forum_pager->getLinks(11);
                            foreach ($links as $page):
                                ?>
                                <?php if ($page == $forum_pager->getPage()): ?>
                                    <?php echo '<span class="selected">' . $page . '</span>' ?>
                                <?php else: ?>
                                    <a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
                                <?php endif; ?>
                                <?php if ($page != $forum_pager->getCurrentMaxLink()): ?>

                                <?php endif ?>
                            <?php endforeach ?>
                            <?php if ($forum_pager->getLastPage() != $forum_pager->getPage()) { ?>
                                <a id="<?php echo $forum_pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $forum_pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span></a>
                            <?php } ?>
                            <span>Sid <?php echo $forum_pager->getPage(); ?> av <?php echo $forum_pager->getLastPage(); ?></span>
                            <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopupActive(this);"></span>
                            <div class="forum_popup_pagination_wrapper" noclick="1" >
                                <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelectActive(this);" >
                                    <option noclick="1" value="0" class="forum_select_option_color" >Gå till sida...</option>
                                    <?php for ($pg = 1; $pg <= $forum_pager->getLastPage(); $pg++) { ?>
                                        <option noclick="1" class="color232222" <?php
                                        if ($forum_pager->getPage() == $pg) {
                                            echo "selected='selected'";
                                        }
                                        ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                            <?php } ?>
                                </select>
                                <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGoActive(this, 'fav_forum_listing');">GA</div>
                            </div>
                            <span class="forum_sorting_wrapper">
                                <div noclick="1" class="floatRight blog_drop-down-menus favourite_forum_listing_column_row_all_active_subscription">
                                    <ul noclick="1">
                                        <li noclick="1"><span noclick="1" id="sortby_article" class="cursor" summary="fav_forum_listing">Artikelrubrik</span></li>
                                    </ul>
                                </div>
                                <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                                <span class="floatRight">Sortera efter</span>
                            </span>
                        <?php endif ?>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="blog_fav" id="blog_fav_container">
    <div class="blog_user_profile_deshboard">Blogg</div>
    <div class="favortite_save_changes"><span id="blog_fav_reply" class="float_right" ></span></div>
    <form name="blog_notification_change_form" id="fav_blog_form" method="post" action="">
        <div class="float_left widthall" id="blog_fav_list">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="table_myFav" summary="fav_blog_listing">
                <tr id="blog_fav_list_column_row" class="blog_table_head">
                    <th id="sortby_srno"  class="cursor pad_lft_5" scope="col" width="35" align="left">Nr</th>
                    <th id="sortby_article"  class="cursor" scope="col" width="370" align="left">Amne</th>
                    <th scope="col" width="150" align="left">E-postnotofication</th>
                    <th scope="col" width="50" align="left">Ta bort</th>
                </tr>
                <?php
                $i = 1;
                foreach ($blog_pager->getResults() as $data):
                    ?>	
                    <tr class="classnot">
                        <td class="prof_table_no" width="35" align="center"><?php echo $i; ?></td>
                        <td class="prof_table_sub" width="370" align="left"><a class="" href="<?php echo 'http://' . $host_str . '/borst/sbtBlogDetails/blog_id/' . $data->f_id; ?>"><span class="profile_favoratelist_title width_340"><?php echo $data->f_name; ?></span></a></td>
                        <td width="150" align="left">
                            <span class="float_left radio-mrg" id="blog_radio">
                                <input type="radio" class="radio" id="<?php echo $data->id; ?>" name="fav_rec[<?php echo $data->id; ?>]" value="1" <?php if ($data->f_notification == 1) echo "checked"; ?> /><span class="prof_email_y">Ja</span>
                            </span>
                            <span class="float_left margin_left_5" id="blog_radio">
                                <input type="radio" class="radio" id="<?php echo $data->id; ?>" name="fav_rec[<?php echo $data->id; ?>]" value="0" <?php if ($data->f_notification == 0) echo "checked"; ?> /><span class="pro_email_n">Nej</span>
                            </span>
                        </td>
                        <td width="50" align="left">
                            <span class="float_left mleft_15" id="r_<?php echo $data->id ?>">
                                <img class="remove_from_fav_list" src="/images/cross.png" alt="remove" width="10" height="10" onclick="removeItemFormFavoriteList('<?php echo $data->id ?>', 'fav_blog_listing', 'r_<?php echo $data->id ?>')" />
                            </span>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>
            </table>
            <div class="paginationwrapperNew widthall">
                <div class="forum_pag all_favorite_pagination widthall" id="fav_blog_listing">
                    <?php if ($blog_pager->haveToPaginate()): ?>
                        <?php if ($blog_pager->getFirstPage() != $blog_pager->getPage()) { ?>
                            <a id="<?php echo $blog_pager->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $blog_pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
                            <?php } ?>
                            <?php
                            $links = $blog_pager->getLinks(11);
                            foreach ($links as $page):
                                ?>
                                <?php if ($page == $blog_pager->getPage()): ?>
                                    <?php echo '<span class="selected">' . $page . '</span>' ?>
                                <?php else: ?>
                                    <a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
                                <?php endif; ?>
                                <?php if ($page != $blog_pager->getCurrentMaxLink()): ?>

                                <?php endif ?>
                            <?php endforeach ?>
                            <?php if ($blog_pager->getLastPage() != $blog_pager->getPage()) { ?>
                                <a id="<?php echo $blog_pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $blog_pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span></a>
                            <?php } ?>
                            <span>Sid <?php echo $blog_pager->getPage(); ?> av <?php echo $blog_pager->getLastPage(); ?></span>
                            <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopupActive(this);"></span>
                            <div class="forum_popup_pagination_wrapper" noclick="1" >
                                <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelectActive(this);" >
                                    <option noclick="1" value="0" class="forum_select_option_color" >Gå till sida...</option>
                                    <?php for ($pg = 1; $pg <= $blog_pager->getLastPage(); $pg++) { ?>
                                        <option noclick="1" class="color232222" <?php
                                        if ($blog_pager->getPage() == $pg) {
                                            echo "selected='selected'";
                                        }
                                        ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                            <?php } ?>
                                </select>
                                <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGoActive(this, 'fav_blog_listing');">GA</div>
                            </div>
                            <span class="forum_sorting_wrapper">
                                <div noclick="1" class="floatRight blog_drop-down-menus favourite_forum_listing_column_row_all_active_subscription">
                                    <ul noclick="1">
                                        <li noclick="1"><span noclick="1" id="sortby_article" class="cursor" summary="fav_blog_listing">Artikelrubrik</span></li>
                                    </ul>
                                </div>
                                <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                                <span class="floatRight">Sortera efter</span>
                            </span>
                        <?php endif ?>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="chart_fav" id="chart_fav_container">
    <div class="blog_user_profile_deshboard">BT-Charts</div>
    <form name="chart_notification_change_form" id="fav_chart_form" method="post" action="">
        <div class="float_left widthall" id="chart_fav_list">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" summary="fav_chart_listing">
                <tr id="chart_fav_list_column_row" class="blog_table_head">
                    <th id="sortby_srno"  class="cursor pad_lft_5" scope="col" width="35" align="left">Nr</th>
                    <th id="sortby_article"  class="cursor" scope="col" width="520" align="left">Abonnemng</th>
                    <th scope="col" width="50" align="left">Ta bort</th>
                </tr>	

                <?php
                $i = 1;
                foreach ($chart_pager->getResults() as $data):
                    ?>	
                    <tr class="classnot">
                        <td class="prof_table_no" width="35" align="center"><?php echo $i; ?></td>
                        <td class="prof_table_sub" width="520" align="left"><a class="" href="<?php echo 'http://' . $host_str . '/borst_charts/borstShowChart/stock_id/' . $data->stock_id . '/stock_type/' . $data->stock_type . '/chart_type/' . $data->chart_type; ?>"><span class="profile_favoratelist_title width_350"><?php echo $data->description; ?></span></a></td>
                        <td width="50" align="left">
                            <span class="float_left mleft_15" id="r_<?php echo $data->id ?>">
                                <img class="remove_from_fav_list" src="/images/cross.png" alt="remove" width="10" height="10" onclick="removeItemFormFavoriteList('<?php echo $data->id ?>', 'fav_chart_listing', 'r_<?php echo $data->id ?>')" />
                            </span>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>
            </table>

            <div class="paginationwrapperNew widthall">
                <div class="forum_pag all_favorite_pagination widthall" id="fav_chart_listing">
                    <?php if ($chart_pager->haveToPaginate()): ?>
                        <?php if ($chart_pager->getFirstPage() != $chart_pager->getPage()) { ?>
                            <a id="<?php echo $chart_pager->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $chart_pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
                            <?php } ?>
                            <?php
                            $links = $chart_pager->getLinks(11);
                            foreach ($links as $page):
                                ?>
                                <?php if ($page == $chart_pager->getPage()): ?>
                                    <?php echo '<span class="selected">' . $page . '</span>' ?>
                                <?php else: ?>
                                    <a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
                                <?php endif; ?>
                                <?php if ($page != $chart_pager->getCurrentMaxLink()): ?>

                                <?php endif ?>
                            <?php endforeach ?>
                            <?php if ($chart_pager->getLastPage() != $chart_pager->getPage()) { ?>
                                <a id="<?php echo $chart_pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $chart_pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span></a>
                            <?php } ?>
                            <span>Sid <?php echo $chart_pager->getPage(); ?> av <?php echo $chart_pager->getLastPage(); ?></span>
                            <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopupActive(this);"></span>
                            <div class="forum_popup_pagination_wrapper" noclick="1" >
                                <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelectActive(this);" >
                                    <option noclick="1" value="0" class="forum_select_option_color" >Gå till sida...</option>
                                    <?php for ($pg = 1; $pg <= $chart_pager->getLastPage(); $pg++) { ?>
                                        <option noclick="1" class="color232222" <?php
                                        if ($chart_pager->getPage() == $pg) {
                                            echo "selected='selected'";
                                        }
                                        ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                            <?php } ?>
                                </select>
                                <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGoActive(this, 'fav_chart_listing');">GA</div>
                            </div>
                            <span class="forum_sorting_wrapper">
                                <div noclick="1" class="floatRight blog_drop-down-menus favourite_forum_listing_column_row_all_active_subscription">
                                    <ul noclick="1">
                                        <li noclick="1"><span noclick="1" id="sortby_article" class="cursor" summary="fav_chart_listing">Artikelrubrik</span></li>
                                    </ul>
                                </div>
                                <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                                <span class="floatRight">Sortera efter</span>
                            </span>
                        <?php endif ?>
                </div>
            </div>
        </div>
    </form>
</div>