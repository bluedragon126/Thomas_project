<script type="text/javascript" language="javascript">

    function paginationPopupGo(obj) {
        var column_id = $('#column_id').val();
        var page = $(obj).prev().val();
        // var page = $(obj).html();
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

    function paginationUlGo(obj) {
        var column_id = $('#column_id').val();
        var page = $(obj).html();
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
                    <th id="sortby_srno"  class="cursor pad_lft_5 alien_center" scope="col" width="35" align="center">Nr</th>
                    <th id="sortby_article"  class="cursor" scope="col" width="370" align="left">Artikelrubrik</th>
                    <th scope="col" width="150" align="left">E-postbekräftelse</th>
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
                                        <ul class="pagination_ul">
                                        <?php for ($pg = 1; $pg <= $article_pager->getLastPage(); $pg++) { ?>
                                            <li onclick="javascript:paginationUlGo(this);"><?php echo $pg; ?></li>
                                        <?php } ?>
                                        </ul>            
                                    </div>
                            
                            <span class="forum_sorting_wrapper">
                                <div noclick="1" class="floatRight blog_drop-down-menus blog_topic_listing_column_row_all_subscription">
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
