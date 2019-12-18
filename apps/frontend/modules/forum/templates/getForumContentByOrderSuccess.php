<!--[if IE 7]>
<style>
#forum_topic_list th, #forum_topic_list tr, #forum_topic_list td{ float:left; position:relative;}

.forum_title{ float: left; height: auto; position: relative; text-align: left; width: 645px; word-wrap: break-word; border:0px solid red;}
.forum_desc{ float: left; height: auto; position: relative; text-align: left; width: 455px; word-wrap: break-word; border:0px solid red;}

</style>		
<![endif]-->

<div class="float_left widthall" id="forum_content">
    <input type="hidden" name="forum_parent_tab" id="forum_parent_tab" value="<?php echo $forum_parent_tab; ?>" />
    <input type="hidden" name="forum_sub_cat_id" id="forum_sub_cat_id" value="<?php echo $forum_sub_cat_id; ?>" />
    <input type="hidden" id="sbt_forum_column_order" name="sbt_forum_column_order" value="<?php echo $current_column_order; ?>"/>
    <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
    <input type="hidden" id="sbt_forum_column" name="sbt_forum_column" value="<?php echo $cur_column; ?>"/>
    <input type="hidden" id="delete_forum_topic_id" name="delete_forum_topic_id" />
</div>
<div class="paginationwrapperNew">
    <div class="forum_pag forum_listing" id="">
        <?php if ($pager->haveToPaginate()): ?>
            <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_8">Föreg</span></a>
                <?php } ?>
                <?php
                $links = $pager->getLinks(9);
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
                <div noclick="1" class="forum_popup_pagination_wrapper" >
                    <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                        <option noclick="1" value="0">Gå till sida...</option>
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
                    <div noclick="1" class="floatRight forum_drop-down-menus forum_topic_listing_column_row">
                        <ul noclick="1">
                            <li noclick="1"><span noclick="1" id="sortby_subject" class="cursor">Rubrik</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_author" class="cursor">Namn</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_category" class="cursor">Ämne</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_reply" class="cursor">Inlägg</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_view" class="cursor">Visad</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_date" class="cursor">Senaste</span></li>
                        </ul>
                    </div>
                    <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                    <span class="floatRight">Sortera efter</span>
                </span>
<?php endif ?>
    </div>
</div>
<!--<div class="blank2h floatLeftNew">&nbsp;</div>-->
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="forum_topic_list">
    <tr id="forum_topic_listing_column_row" class="forum_table_head">
        <th class="forum_table_title_w pad_lft_5"><span class="float_left forum_table_title_w">Rubrik/Namn</span></th>
        <th class="width_9">&nbsp;</th>
        <th class="width15">&nbsp;</th>
        <th class="width_9">&nbsp;</th>
        <th class="forum_table_topic_w"><span class="float_left forum_table_topic_w">Ämne</span></th>
        <th class="width_9">&nbsp;</th>
        <th class="forum_table_post_w"><span class="float_left forum_table_post_w">Inlägg/visad</span></th>
        <th class="width_9">&nbsp;</th>
        <th class="forum_table_date_w"><span class="float_left forum_table_date_w">Senaste</span></th>
        <?php if (($sf_user->getAttribute('isSuperAdmin', '', 'userProperty') == 1) && ($sf_user->isAuthenticated())): ?>
            <th class="height_5"></th>
    <?php endif; ?>
    </tr>
    <?php
    $i = 1;
    foreach ($pager->getResults() as $forum):
        ?>
        <tr <?php
        if ($i == 1) {
            echo "class='padding_top_table'";
        }
        ?> >
            <td class="orgfont forum_table_title_w pad_lft_5">
                <a class="orgfont cursor" href="<?php echo "https://" . $host_str . "/forum/commentOnForumTopic/forumid/" . $forum->id ?>"><span class="forum_table_title_w forum_table_title"><?php echo $forum->rubrik ?></span></a>
                </br>
                <a class="forum_table_user forum_table_title_w" href="<?php echo "https://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $forum->author_id ?>"><?php echo $new_profile->getFullUserName($forum->author_id); ?></a>
            </td>
            <td class="width_9">&nbsp;</td>
            <td class="width15">
            <?php if (($sf_user->getAttribute('isSuperAdmin', '', 'userProperty') == 1) && ($sf_user->isAuthenticated())): ?>
                    <a href="#" id="<?php echo $forum->id; ?>" class="edit_forum_topic"  ><span class="forum_table_edit" >E</span></a>
                    <a id="delete_forum_topic" title="Ta bort <?php echo $forum->rubrik; ?>" href="javascript:open_confirmation('Vill du verkligen ta bort ämne i ett forum med titeln <?php echo $forum->rubrik ?>','<?php echo $forum->koppling; ?>','delete_forum_topic_confirm_box','delete_forum_topic_msg')"><span class="forum_table_delete">X</span></a></td>
            <?php endif; ?>
            <td class="width_9">&nbsp;</td>
            <?php if ($forum->$methodName() == '-'): ?>
                <td class="forum_table_topic forum_table_topic_w"><span class="forum_list_subcat"><?php echo $forum->$methodName(); ?></span></td>
            <?php else: ?>
                <td class="forum_topic_category_row forum_table_topic_w forum_table_topic"><a id="cat_<?php echo $forum->btforum_category_id; ?>" name="subcat_<?php echo $methodName == 'getSubCategoryName' ? $forum->btforum_subcategory_id : ''; ?>" class="cursor"><span class="forum_list_subcat"><?php echo $forum->$methodName(); ?></span></a></td>
    <?php endif; ?>
            <td class="width_9">&nbsp;</td>
            <td class="forum_table_post_w" ><span class="forum_table_post"><?php echo $forum->getReplyCount($forum->id) . " Inlägg"; ?></span></br><span class="forum_table_views"><?php echo $forum->visningar . " Visad"; ?> </span> </td>
            <td class="width_9">&nbsp;</td>
            <td class="forum_table_date_w"><span class="forum_table_date"><?php echo substr($forum->andratdatum, 0, 10); ?></span></br><span class="forum_table_time"><?php echo substr($forum->andratdatum, 11, -3); ?></span></td>
        </tr>
        <?php
        $i++;
    endforeach;
    ?>
</table>
<div class="blank_14h">&nbsp;</div>
<div class="clearAll"></div>
<div class="paginationwrapperNew">
    <div class="forum_pag forum_listing" id="">
            <?php if ($pager->haveToPaginate()): ?>
                <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
                <?php } ?>
                <?php
                $links = $pager->getLinks(9);
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
                <div noclick="1" class="forum_popup_pagination_wrapper" >
                    <select noclick="1" size="1" class="forum_drop-down-menu_page colorb9c2cf" value="" onchange="javascript:paginationPopupSelect(this);" >
                        <option noclick="1" value="0">Gå till sida...</option>
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
                    <div noclick="1" class="floatRight forum_drop-down-menus forum_topic_listing_column_row">
                        <ul noclick="1">
                            <li noclick="1"><span noclick="1" id="sortby_subject" class="cursor">Rubrik</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_author" class="cursor">Namn</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_category" class="cursor">Ämne</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_reply" class="cursor">Inlägg</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_view" class="cursor">Visad</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_date" class="cursor">Senaste</span></li>
                        </ul>
                    </div>
                    <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                    <span class="floatRight">Sortera efter</span>
                </span>
<?php endif ?>
    </div>
</div>
<div id="delete_forum_topic_confirm_box" title="Delete Forum Topic Confirmation">
    <table width="100%"  border="0" cellspacing="3" cellpadding="0">
        <tr>
            <td id="delete_forum_topic_msg">Message:</td>
        </tr>
    </table>
</div>
<div id="pop-box-over" class="display-none"></div>