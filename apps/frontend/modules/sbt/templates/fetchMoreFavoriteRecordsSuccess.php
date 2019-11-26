<?php if ($id == 'fav_analysis_listing'): ?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr id="analysis_fav_list_column_row">
            <th scope="col" width="10%" align="left">No.</th>
            <th scope="col" width="60%" align="left">Analysis Name</th>
            <th scope="col" width="20%" align="left">Email notification</th>
            <th scope="col" width="10%" align="left">Remove</th>
        </tr>
        <?php
        $i = 1;
        foreach ($analysis_pager->getResults() as $data):
            ?>	
            <tr class="classnot">
                <td align="left"><?php echo $i; ?></td>
                <td align="left"><a class="main_link_color" href="<?php echo 'http://' . $host_str . '/sbt/sbtArticleDetails/article_id/' . $data->f_id; ?>"><?php echo $data->f_name; ?></a></td>
                <td align="left">
                    <span class="float_left">
                        <input type="radio" class="radio" name="fav_rec[<?php echo $data->id; ?>]" value="1" <?php if ($data->f_notification == 1) echo "checked"; ?> />Yes
                    </span>
                    <span class="float_left margin_left_5">
                        <input type="radio" class="radio" name="fav_rec[<?php echo $data->id; ?>]" value="0" <?php if ($data->f_notification == 0) echo "checked"; ?> />No
                    </span>
                </td>
                <td align="left">
                    <span class="float_left mleft_15 height_17" id="r_<?php echo $data->id ?>">
                        <img class="remove_from_fav_list" src="/images/cross.png" alt="remove" onclick="removeItemFormFavoriteList('<?php echo $data->id ?>', 'fav_analysis_listing', 'r_<?php echo $data->id ?>')" />
                    </span>
                </td>
            </tr>
            <?php
            $i++;
        endforeach;
        ?>	
    </table>
    <div class="paginationwrapper">
        <div class="all_favorite_pagination" id="fav_analysis_listing">
            <?php include_partial('pager_partial', array('pager' => $analysis_pager)) ?>
        </div>
    </div>

<?php endif; ?>

<?php if ($id == 'fav_article_listing'): ?>

    <input type="hidden" id="bloglist_current_column_order" name="bloglist_current_column_order" value="<?php echo $current_column_order; ?>" />
    <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>

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
<?php endif; ?>

<?php if ($id == 'fav_forum_listing'): ?>

    <input type="hidden" id="bloglist_current_column_order" name="bloglist_current_column_order" value="<?php echo $current_column_order; ?>" />
    <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" summary="fav_forum_listing">
        <tr id="forums_fav_list_column_row" class="blog_table_head">
            <th id="sortby_srno"  class="cursor pad_lft_5 alien_center" scope="col" width="35" align="center">Nr</th>
            <th id="sortby_article"  class="cursor" scope="col" width="370" align="left">Ämne</th>
            <th scope="col" width="150" align="left">E-postbekräftelse</th>
            <th scope="col" width="50" align="left">Ta bort</th>
        </tr>
        <?php
        $i = 1;
        foreach ($forum_pager->getResults() as $data):
            ?>	
            <tr class="classnot">
                <td class="prof_table_no" width="35" align="center"><?php echo $i; ?></td>
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
                            <option noclick="1" value="0" class="forum_select_option_color">Gå till sida...</option>
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
<?php endif; ?>

<?php if ($id == 'fav_blog_listing'): ?>

    <input type="hidden" id="bloglist_current_column_order" name="bloglist_current_column_order" value="<?php echo $current_column_order; ?>" />
    <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="table_myFav" summary="fav_blog_listing">

        <tr id="blog_fav_list_column_row" class="blog_table_head">
            <th id="sortby_srno"  class="cursor pad_lft_5 alien_center" scope="col" width="35" align="center">Nr</th>
            <th id="sortby_article"  class="cursor" scope="col" width="370" align="left">Ämne</th>
            <th scope="col" width="150" align="left">E-postbekräftelse</th>
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
                            <option noclick="1" value="0" class="forum_select_option_color">Gå till sida...</option>
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

<?php endif; ?>

<?php if ($id == 'fav_chart_listing'): ?>

    <input type="hidden" id="bloglist_current_column_order" name="bloglist_current_column_order" value="<?php echo $current_column_order; ?>" />
    <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" summary="fav_chart_listing">
        <tr id="chart_fav_list_column_row" class="blog_table_head">
            <th id="sortby_srno"  class="cursor pad_lft_5 alien_center" scope="col" width="35" align="center">Nr</th>
            <th id="sortby_article"  class="cursor" scope="col" width="520" align="left">Abonnemang</th>
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
                            <option noclick="1" value="0" class="forum_select_option_color">Gå till sida...</option>
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


<?php endif; ?>
