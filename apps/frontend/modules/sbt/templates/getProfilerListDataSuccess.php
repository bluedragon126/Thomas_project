<div class="paginationwrapperNew">
    <div class="forum_pag forum_listing1" id="blog_list_listing_profiler">
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
                            <option noclick="1" class="color3c3a3a" <?php
                            if ($pager->getPage() == $pg) {
                                echo "selected='selected'";
                            }
                            ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                <?php } ?>
                    </select>
                    <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                </div>
                <span class="forum_sorting_wrapper">
                    <div noclick="1" class="floatRight blog_drop-down-menus blog_profiler_listing_column_row height_260px">
                        <ul noclick="1">
                            <li noclick="1"><span noclick="1" id="sortby_author" class="cursor">Användare</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_title" class="cursor">Titel</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_regdate" class="cursor">Reg datum</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_message" class="cursor">Inlägg</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_vote" class="cursor">Röster</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_totallogin" class="cursor">Inlogg</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_lastlogin" class="cursor">Senaste</span></li>
                        </ul>
                    </div>
                    <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                    <span class="floatRight">Sortera efter</span>
                </span>
            <?php endif ?>
    </div>
</div>
<input type="hidden" id="userlist_current_column_order" name="userlist_current_column_order" value="<?php echo $current_column_order; ?>" />
<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
<input type="hidden" id="blog_cat_id" name="blog_cat_id"/>

<table width="100%" border="0" cellspacing="0" cellpadding="0" id="forum_topic_list">
    <tr id="forum_topic_listing_column_row1" class="headerList blog_table_head">
        <th class="width_55 pad_lft_5"><span class="float_left width_55">Avatar</span></th>
        <th class="width_150"><span class="float_left width_150">Användare</span></th>
        <th class="width_100"><span class="float_left width_100">Titel</span></th>
        <th class="width_100"><span class="float_left width_100">Reg datum</span></th>                    
        <th class="width_55"><span class="float_left width_55">Inlägg</span></th>
        <th class="width_55"><span class="float_left width_55">Röster</span></th>
        <th class="width_55"><span class="float_left width_55">Inlogg</span></th>
        <th class="width_76"><span class="float_left width_76">Senaste</span></th>
    </tr>
    <?php
    $i = 1;
    foreach ($pager->getResults() as $user):
        ?>
        <tr <?php
        if ($i == 1) {
            echo "class='padding_top_table'";
        }
        ?> >                    
            <td class="orgfont width_55 pad_lft_5">
                <a class="bluegrayfont" href="<?php echo 'https://' . $host_str . '/sbt/sbtMinProfile/id/' . $user->user_id; ?>">
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
                <a class="bolg_table_name" href="<?php echo 'https://' . $host_str . '/sbt/sbtMinProfile/id/' . $user->user_id; ?>">
                    <?php
                    echo $user->firstname;
                    if (trim($user->lastname) != '') {
                        echo ' </br> ';
                    }
                    echo $user->lastname;
                    ?>
                </a>
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
</table>
</div>
<div class="blank_14h widthall">&nbsp;</div>
<div class="clearAll"></div>
<div class="paginationwrapperNew">
    <div class="forum_pag forum_listing1" id="blog_list_listing_profiler">
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
                        <option noclick="1" value="0"  >Gå till sida...</option>
                        <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                            <option noclick="1" class="color3c3a3a" <?php
                            if ($pager->getPage() == $pg) {
                                echo "selected='selected'";
                            }
                            ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                <?php } ?>
                    </select>
                    <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                </div>
                <span class="forum_sorting_wrapper">
                    <div noclick="1" class="floatRight blog_drop-down-menus blog_profiler_listing_column_row height_260px">
                        <ul noclick="1">
                            <li noclick="1"><span noclick="1" id="sortby_author" class="cursor">Användare</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_title" class="cursor">Titel</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_regdate" class="cursor">Reg datum</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_message" class="cursor">Inlägg</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_vote" class="cursor">Röster</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_totallogin" class="cursor">Inlogg</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_lastlogin" class="cursor">Senaste</span></li>
                        </ul>
                    </div>
                    <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                    <span class="floatRight">Sortera efter</span>
                </span>
            <?php endif ?>
    </div>
</div>