<div class="blog_comment_heading"><?php echo $pager->getNbResults(); ?> kommentarer, läs nedan eller <span class="main_link_color"><a id="comment_on" class="main_link_color cursor" rel="nofollow" href="#comment_on_blog">lägg till en egen</a></span></div>
<?php foreach ($pager->getResults() as $data): ?>
    <div class="comment_messagewrapper width_100per">
        <div class="float_left width_96"><a href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->comment_by ?>">
                <?php if ($user_photo_arr[$data->comment_by] != ''): ?>
                    <img width="72" height="72" src="/uploads/userThumbnail/<?php echo str_replace('.', '_large.', $user_photo_arr[$data->comment_by]); ?>" alt="user_photo"/>
                <?php else: ?>
                    <img alt="photo" src="/images/userimg.png" width="72" height="72">
                <?php endif; ?>
            </a></div>
        <div class="info width_490px paddingLeft0px" >
            <div class="float_left widthall">
                <div class="blog_username float_left"><a class="borst_subtitle_4" href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->comment_by ?>"><?php echo $profile->getFullUserName($data->comment_by) ?></a></div>
                <div class="blog_main_date fontItalic float_right"><?php echo $data->created_at ?></div>
            </div>
            <span class="blog_comments width_100per"><?php echo $data->blog_comment ?></span>
        </div>
    </div>
    <div class="blank_20h widthall">&nbsp;</div>
<?php endforeach; ?>

<?php if (count($pager->getResults()) > 0) { ?>
    <div class="blog_main_line height_1px">&nbsp;</div>
<?php } ?>

<div class="blank_14h widthall">&nbsp;</div>
<div class="clearAll"></div>
<div class="paginationwrapperNew">
    <div class="forum_pag forum_listing1" id="blog_comment_list_listing">
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
                        <option noclick="1" value="0" class="colorb9c2cf" >Gå till sida...</option>
                        <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                            <option noclick="1" class="color232222" <?php
                            if ($pager->getPage() == $pg) {
                                echo "selected='selected'";
                            }
                            ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                <?php } ?>
                    </select>
                    <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                </div>
            <?php endif ?>
    </div>
</div>