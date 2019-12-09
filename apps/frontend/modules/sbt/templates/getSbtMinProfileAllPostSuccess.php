<!--[if IE 7]>
<link rel="stylesheet" type="text/css" media="screen" href="/css/main_ie7.css" />
<![endif]-->
<div class="listing width_610" id="blog_list_profiler_page">
    <div class="float_left widthall width_610">   
        <input type="hidden" id="useralldata_list_current_column_order" name="useralldata_list_current_column_order" value="<?php echo $current_column_order; ?>" />
        <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
        <input type="hidden" id="parent_id" name="parent_id" value="<?php echo $parent_id; ?>"/>
        <div class="blank36h width_100per">&nbsp;</div>
        <div  class="blog_pro_header_all">Blogginlägg</div>
        <div class="blank4h width_100per">&nbsp;</div>
        <ul id="blog_list_profiler_column_row" class="headerList blog_table_head width_610">
            <li class="first width_82"><a id="" class="float_left cursor"><span class="float_left margin_top_2">Publicerat</span></a></li>
            <li class="width_9">&nbsp;</li>
            <li class="bg width_433"><a id="sortby_author"  class="float_left cursor"><span class="float_left margin_top_2">Rubrik</span></a></li>
            <li class="width_9">&nbsp;</li>
            <li class="bg width_72"><a id="sortby_title"  class="float_left cursor"><span class="float_left margin_top_2">Kategori</span></a></li>
        </ul>
        <div id="blog_topic_list">
            <?php
            $i = 0;
            foreach ($blog_pager->getResults() as $data):
                ?>
                <ul class="<?php echo $i % 2 == 0 ? 'classnot' : 'white'; ?> blog_line_table">
                    <li class="padding_left_5px width_82">
                        <span class="blog_prof_table_date"><?php echo substr($data->created_at, 0, 10); ?></span>
                    </li>
                    <li class="width_9">&nbsp;</li>
                    <li class=" width_433">
                        <a class="blog_table_title cursor" href="<?php echo 'http://' . $host_str . '/sbt/sbtBlogDetails/blog_id/' . $data->id; ?>"><span class="width_100per"><?php echo $data->ublog_title ?></span></a>
                    </li>
                    <li class="width_9">&nbsp;</li>
                    <li  class="width_72" >
                        <span class="blog_table_topic"><?php echo $cat_arr[$data->ublog_category_id] ? $cat_arr[$data->ublog_category_id] : '-'; ?></span>
                    </li>
                </ul>
                <?php
                $i++;
            endforeach;
            if (count($blog_pager->getResults()) == 0) {
                echo "Ingen blogg ännu.";
            }
            ?>
        </div>
        <div class="blank2h floatLeftNew">&nbsp;</div>
        <div class="paginationwrapperNew width_100per">
            <div class="forum_pag width_100per profile_useralldata_list_listing" id="profile_useralldata_list_listing" data="blog">
                <?php if ($blog_pager->haveToPaginate()): ?>
                    <?php if ($blog_pager->getFirstPage() != $blog_pager->getPage()) { ?>
                                                          <a id="<?php echo $blog_pager->getFirstPage(); ?>" class="cursor"><!--<img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a>--><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $blog_pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
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
                                        <a id="<?php echo $blog_pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $blog_pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span><!--<img src="/images/pag_arrow_right.jpg" alt="arrow" />--> </a>
                        <?php } ?>
                        <span>Sid <?php echo $blog_pager->getPage(); ?> av <?php echo $blog_pager->getLastPage(); ?></span>
                        <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                        <div noclick="1" class="forum_popup_pagination_wrapper" >
                            <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                                <option noclick="1" value="0" class="colorb9c2cf">Gå till sida...</option>
                                <?php for ($pg = 1; $pg <= $blog_pager->getLastPage(); $pg++) { ?>
                                    <option noclick="1" class="color3c3a3a" <?php
                                    if ($blog_pager->getPage() == $pg) {
                                        echo "selected='selected'";
                                    }
                                    ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                        <?php } ?>
                            </select>
                            <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupAllPostsGo(this);">GA</div>
                        </div>
                    <?php endif ?>
                    <?php if (count($blog_pager->getResults()) > 0) { ?>
                        <span class="forum_sorting_wrapper">
                            <div noclick="1" class="floatRight forum_drop-down-menus useronlyforum_list_listing_all height_130px">
                                <ul noclick="1">
                                    <li class="padding_0imp" noclick="1"><span noclick="1" name="profile_useronly_forum_list_table" id="sortby_date" class="cursor">Publicerat</span></li>
                                    <li class="padding_0imp" noclick="1"><span noclick="1" name="profile_useronly_forum_list_table" id="sortby_title" class="cursor">Rubrik</span></li>
                                    <li class="padding_0imp" noclick="1"><span noclick="1" name="profile_useronly_forum_list_table" id="sortby_category" class="cursor">Kategori</span></li>
                                </ul>
                            </div>
                            <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor forun_sorting_arrow_forum" onclick="javascript:sortingPopUp(this);"></span>
                            <span class="floatRight">Sortera efter</span>
                        </span>
                    <?php } ?>
            </div>
        </div>

        <div class="blank57h width_100per">&nbsp;</div>
        <div  class="blog_pro_header_all">Forumposter</div>
        <div class="blank4h width_100per">&nbsp;</div>
        <ul id="blog_list_profiler_column_row" class="headerList blog_table_head width_610">
            <li class="first width_82"><a id="" class="float_left cursor"><span class="float_left margin_top_2">Publicerat</span></a></li>
            <li class="width_9">&nbsp;</li>
            <li class="bg width_433"><a id="sortby_author"  class="float_left cursor"><span class="float_left margin_top_2">Rubrik</span></a></li>
            <li class="width_9">&nbsp;</li>
            <li class="bg width_72"><a id="sortby_title"  class="float_left cursor"><span class="float_left margin_top_2">Kategori</span></a></li>
        </ul>
        <div id="blog_topic_list">
            <?php
            $i = 0;
            foreach ($forum_pager->getResults() as $data):
                ?>
                <ul class="<?php echo $i % 2 == 0 ? 'classnot' : 'white'; ?> blog_line_table width_610">
                    <li class="padding_left_5px width_82">
                        <span class="blog_prof_table_date"><?php echo substr($data->andratdatum, 0, 10) ?></span>
                    </li>
                    <li class="width_9">&nbsp;</li>
                    <li class=" width_433">
                        <a class="blog_table_title cursor" href="<?php echo "http://" . $host_str ?>/forum/commentOnForumTopic/forumid/<?php echo $data->koppling ?>"><span class="width_100per"><?php echo $data->rubrik ?></span></a>
                    </li>
                    <li class="width_9">&nbsp;</li>
                    <li  class="width_72" >
                        <span class="blog_table_topic"><?php echo $data->getCategoryName($data->btforum_category_id); ?></span>
                    </li>
                </ul>
                <?php
                $i++;
            endforeach;
            if (count($forum_pager->getResults()) == 0) {
                echo "Ingen forumposter ännu.";
            }
            ?>

        </div>
        <div class="blank2h floatLeftNew">&nbsp;</div>
        <div class="paginationwrapperNew width_100per">
            <div class="forum_pag width_100per profile_useralldata_list_listing" id="profile_useralldata_list_listing" data="">
                <?php if ($forum_pager->haveToPaginate()): ?>
                    <?php if ($forum_pager->getFirstPage() != $forum_pager->getPage()) { ?>
                                                          <a id="<?php echo $forum_pager->getFirstPage(); ?>" class="cursor"><!--<img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a>--><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $forum_pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
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
                                        <a id="<?php echo $forum_pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $forum_pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span><!--<img src="/images/pag_arrow_right.jpg" alt="arrow" />--> </a>
                        <?php } ?>
                        <span>Sid <?php echo $forum_pager->getPage(); ?> av <?php echo $forum_pager->getLastPage(); ?></span>
                        <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                        <div noclick="1" class="forum_popup_pagination_wrapper" >
                            <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                                <option noclick="1" value="0" class="colorb9c2cf" >Gå till sida...</option>
                                <?php for ($pg = 1; $pg <= $forum_pager->getLastPage(); $pg++) { ?>
                                    <option noclick="1" class="color3c3a3a" <?php
                                    if ($forum_pager->getPage() == $pg) {
                                        echo "selected='selected'";
                                    }
                                    ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                        <?php } ?>
                            </select>
                            <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupAllPostsGo(this);">GA</div>
                        </div>
                    <?php endif ?>
                    <?php if (count($forum_pager->getResults()) > 0) { ?>
                        <span class="forum_sorting_wrapper">
                            <div noclick="1" class="floatRight forum_drop-down-menus useronlyforum_list_listing_all height_130px padding_0imp">
                                <ul noclick="1">
                                    <li class="padding_0imp" noclick="1"><span noclick="1" name="profile_useronly_forum_list_table" id="sortby_date" class="cursor">Publicerat</span></li>
                                    <li class="padding_0imp" noclick="1"><span noclick="1" name="profile_useronly_forum_list_table" id="sortby_title" class="cursor">Rubrik</span></li>
                                    <li class="padding_0imp" noclick="1"><span noclick="1" name="profile_useronly_forum_list_table" id="sortby_category" class="cursor">Kategori</span></li>
                                </ul>
                            </div>
                            <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor forun_sorting_arrow_forum" onclick="javascript:sortingPopUp(this);"></span>
                            <span class="floatRight">Sortera efter</span>
                        </span>
                    <?php } ?>
            </div>
        </div>

        <div class="blank57h width_100per">&nbsp;</div>
        <div  class="blog_pro_header_all">Artiklar</div>
        <div class="blank4h width_100per">&nbsp;</div>
        <ul id="blog_list_profiler_column_row" class="headerList blog_table_head width_610">
            <li class="first width_82"><a id="" class="float_left cursor"><span class="float_left margin_top_2">Publicerat</span></a></li>
            <li class="width_9">&nbsp;</li>
            <li class="bg width_433"><a id="sortby_author"  class="float_left cursor"><span class="float_left margin_top_2">Rubrik</span></a></li>
            <li class="width_9">&nbsp;</li>
            <li class="bg width_72"><a id="sortby_title"  class="float_left cursor"><span class="float_left margin_top_2">Kategori</span></a></li>
        </ul>
        <div id="blog_topic_list">
            <?php
            $i = 0;
            foreach ($article_pager->getResults() as $data):
                ?>
                <ul class="<?php echo $i % 2 == 0 ? 'classnot' : 'white'; ?> blog_line_table">
                    <li class="padding_left_5px width_82">
                        <span class="blog_prof_table_date"><?php echo substr($data->article_date, 0, 10) ?></span>
                    </li>
                    <li class="width_9">&nbsp;</li>
                    <li class=" width_433">
                        <a class="blog_table_title cursor" href="<?php echo 'http://' . $host_str . '/borst/borstArticleDetails/article_id/' . $data->article_id; ?>"><span class="width_100per"><?php echo $data->title ?></span></a>
                    </li>
                    <li class="width_9">&nbsp;</li>
                    <li  class="width_72" >
                        <span class="blog_table_topic"><?php echo $cat_arr[$data->category_id] ? $cat_arr[$data->category_id] : '-'; ?></span>
                    </li>
                </ul>
                <?php
                $i++;
            endforeach;
            if (count($article_pager->getResults()) == 0) {
                echo "Ingen artiklar ännu.";
            }
            ?>
        </div>
        <div class="blank2h floatLeftNew">&nbsp;</div>
        <div class="paginationwrapperNew width_100per">
            <div class="forum_pag width_100per profile_useralldata_list_listing" id="profile_useralldata_list_listing" data="article">
                <?php if ($article_pager->haveToPaginate()): ?>
                    <?php if ($article_pager->getFirstPage() != $article_pager->getPage()) { ?>
                                                          <a id="<?php echo $article_pager->getFirstPage(); ?>" class="cursor"><!--<img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a>--><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $article_pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
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
                                        <a id="<?php echo $article_pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $article_pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span><!--<img src="/images/pag_arrow_right.jpg" alt="arrow" />--> </a>
                        <?php } ?>
                        <span>Sid <?php echo $article_pager->getPage(); ?> av <?php echo $article_pager->getLastPage(); ?></span>
                        <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                        <div noclick="1" class="forum_popup_pagination_wrapper" >
                            <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                                <option noclick="1" value="0" class="colorb9c2cf" >Gå till sida...</option>
                                <?php for ($pg = 1; $pg <= $article_pager->getLastPage(); $pg++) { ?>
                                    <option noclick="1" class="color3c3a3a" <?php
                                    if ($article_pager->getPage() == $pg) {
                                        echo "selected='selected'";
                                    }
                                    ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                        <?php } ?>
                            </select>
                            <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupAllPostsGo(this);">GA</div>
                        </div>
                    <?php endif ?>
                    <?php if (count($article_pager->getResults()) > 0) { ?>
                        <span class="forum_sorting_wrapper">
                            <div noclick="1" class="floatRight forum_drop-down-menus useronlyforum_list_listing_all height_130px padding_0imp">
                                <ul noclick="1">
                                    <li class="padding_0imp" noclick="1"><span noclick="1" name="profile_useronly_forum_list_table" id="sortby_date" class="cursor">Publicerat</span></li>
                                    <li class="padding_0imp" noclick="1"><span noclick="1" name="profile_useronly_forum_list_table" id="sortby_title" class="cursor">Rubrik</span></li>
                                    <li class="padding_0imp" noclick="1"><span noclick="1" name="profile_useronly_forum_list_table" id="sortby_category" class="cursor">Kategori</span></li>
                                </ul>
                            </div>
                            <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor forun_sorting_arrow_forum" onclick="javascript:sortingPopUp(this);"></span>
                            <span class="floatRight">Sortera efter</span>
                        </span>
                    <?php } ?>
            </div>
        </div>

    </div>
</div>
