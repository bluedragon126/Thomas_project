<div class="paginationwrapperNew">
    <div class="forum_pag forum_listing1 blog_list_listing" id="">
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
                    <div noclick="1" class="floatRight blog_drop-down-menus blog_topic_listing_column_row">
                        <ul noclick="1">
                            <li noclick="1"><span noclick="1" id="sortby_title" class="cursor">Rubrik</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_author" class="cursor">Namn</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_category" class="cursor">Kategori</span></li>
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
<input type="hidden" id="bloglist_current_column_order" name="bloglist_current_column_order" value="<?php echo $current_column_order; ?>" />
<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
<input type="hidden" id="blog_cat_id" name="blog_cat_id"/>

<div id="blog_topic_list">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="forum_topic_list">
        <tr id="forum_topic_listing_column_row1" class="headerList blog_table_head">
            <th class="width326 pad_lft_5"><span class="float_left width326">Rubrik/Namn</span></th>
            <th class="width136"><span class="float_left width136">Kategori</span></th>
            <th class="width108"><span class="float_left width108">Inlägg/visningar</span></th>
            <th class="forum_table_date_w"><span class="float_left forum_table_date_w">Senaste</span></th>
        </tr>
        <?php
        $i = 1;
        foreach ($pager->getResults() as $blog):
            ?>
            <tr <?php
                if ($i == 1) {
                    echo "class='padding_top_table'";
                }
                ?> >                    
                <td class="orgfont width326 pad_lft_5">
                    <a class="cursor" href="<?php echo "https://" . $host_str ?>/sbt/sbtBlogDetails/blog_id/<?php echo $blog->id ?>"><span class="forum_table_title_w bloglist_blogtitle blog_table_title"><?php echo html_entity_decode($blog->ublog_title) ?></span></a>
                    </br>
                    <a class="bloglist_blogauthor blog_table_user width326" href="<?php echo "https://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $blog->author_id; ?>"><?php echo $profile->getFullUserName($blog->author_id) ?></a>
                </td>
                <td class="blog_cat blog_table_topic width136 "><a class="blog_cat" name="<?php echo $blog->ublog_category_id ?>"><?php echo $cat_arr[$blog->ublog_category_id]; ?></a></br><span class="forum_table_views">&nbsp;</span></td>
                <td class="width108" ><span class="blog_table_post"><?php echo $sbt_blog_comment->getBlogCommentsCount($blog->id); ?> Inlägg</span></br><span class="forum_table_views"><?php echo $blog->ublog_views ?> visningar</span> </td>
                <td class="forum_table_date_w"><span class="blog_prof_table_date"><?php echo substr($blog->created_at, 0, 10) ?></span></br><span class="blog_table_time"><?php echo substr($blog->created_at, 11, -3) ?></span></td>
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
    <div class="forum_pag forum_listing1 blog_list_listing" id="">
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
                    <div noclick="1" class="floatRight blog_drop-down-menus blog_topic_listing_column_row">
                        <ul noclick="1">
                            <li noclick="1"><span noclick="1" id="sortby_title" class="cursor">Rubrik</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_author" class="cursor">Namn</span></li>
                            <li noclick="1"><span noclick="1" id="sortby_category" class="cursor">Kategori</span></li>
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