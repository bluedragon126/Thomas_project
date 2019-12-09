<div class="blank36h width_100per">&nbsp;</div>
<div  class="blog_pro_header_all float_left">Forumposter</div>
<input type="hidden" id="useronlyforum_list_current_column_order" name="useronlyforum_list_current_column_order" value="<?php echo $current_column_order; ?>" />
<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
<input type="hidden" id="parent_id" name="parent_id" value="<?php echo $parent_id; ?>"/>
<div id="blog_list_profiler_page" class="float_left listing width_100per" >
    
    <div class="paginationwrapperNew width_100per">
        <div class="forum_pag width_100per" id="useronlyforum_list_listing">
            <?php
            ?>
            <?php if ($pager->haveToPaginate()): ?>
                <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><span class="blog_pagination_first_img"></span><span class="blog_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="blog_pagination_prev_img"></span><span class="blog_pagination_prev margin_rgt_7">Föreg</span></a>
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
                    <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 blog_pagination_next">Nästa</span><span class="blog_pagination_next_img"></span></a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"><span class="blog_pagination_next" >Sista</span><span class="blog_pagination_last_img"></span></a>

                    <span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
                    <span noclick="1" class="blog_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                    <div class="blog_popup_pagination_wrapper" noclick="1" >
                        <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                            <option noclick="1" value="0" class="colorb9c2cf" >Gå till sida...</option>
                            <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                <option noclick="1" class="color3c3a3a" <?php if ($pager->getPage() == $pg) {  echo "selected='selected'"; }?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                            <?php } ?>
                        </select>
                        <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupForumGo(this);">GA</div>
                    </div>
                    <div class="floatRight">
                        <div noclick="1" class="floatRight forum_drop-down-menus forum_list_column_row height_130px">
                            <ul noclick="1">
                                <li noclick="1"><span noclick="1" name="profile_useronly_forum_list_table" id="sortby_date" class="cursor">Publicerat</span></li>
                                <li noclick="1"><span noclick="1" name="profile_useronly_forum_list_table" id="sortby_title" class="cursor">Rubrik</span></li>
                                <li noclick="1"><span noclick="1" name="profile_useronly_forum_list_table" id="sortby_category" class="cursor">Kategori</span></li>
                            </ul>
                        </div>
                        <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                        <span class="floatRight">Sortera efter</span>
                    </div>    
                <?php endif ?>
        </div>
    </div>

    <div class="blank2h floatLeftNew">&nbsp;</div>
    <ul id="blog_list_profiler_column_row" class="headerList blog_table_head width_100_per">
        <li class="first width_76 padding_right_17px"><a id="sortby_date" name="profile_useronly_forum_list_table" class="float_left cursor"><span class="float_left margin_top_2">Publicerat</span></a></li>
        <li class="bg width_337px padding_right_10px"><a id="sortby_title" name="profile_useronly_forum_list_table" class="float_left cursor"><span class="float_left margin_top_2">Rubrik</span></a></li>
        <li class="bg width_80 padding_right_13px"><a id="sortby_category"  name="profile_useronly_forum_list_table" class="float_left cursor"><span class="float_left margin_top_2">Kategori</span></a></li>
    </ul>

    <div id="blog_topic_list">
        <?php
        $i = 0;
        foreach ($pager->getResults() as $data):
            ?>
            <ul class="<?php echo $i % 2 == 0 ? 'classnot' : 'white'; ?> blog_line_table width_100_per">
                <li class="padding_left_5px width_76 padding_right_17px">
                    <span class="blog_prof_table_date"><?php echo substr($data->andratdatum, 2, 9) ?></span>
                </li>
                <li class=" width_337px padding_right_10px">
                    <a class="blog_table_title cursor" href="<?php echo "http://" . $host_str ?>/forum/commentOnForumTopic/forumid/<?php echo $data->koppling ?>"><span class="width_100per"><?php echo $data->rubrik ?></span></a>
                </li>
                <li  class="width_80 padding_right_13px" >
                    <span class="blog_table_topic"><?php echo $data->getCategoryName($data->btforum_category_id); ?></span>
                </li>
            </ul>
            <?php
            $i++;
        endforeach;
        if (count($pager->getResults()) == 0) {
            echo "Ingen forumposter ännu.";
        }
        ?>
    </div>
    <div class="blank2h floatLeftNew">&nbsp;</div>
    
    <div class="paginationwrapperNew width_100per">
        <div class="forum_pag width_100per" id="useronlyforum_list_listing">
            <?php ?>
                <?php if ($pager->haveToPaginate()): ?>
                <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><span class="blog_pagination_first_img"></span><span class="blog_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="blog_pagination_prev_img"></span><span class="blog_pagination_prev margin_rgt_7">Föreg</span></a>
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
                    <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 blog_pagination_next">Nästa</span><span class="blog_pagination_next_img"></span></a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"><span class="blog_pagination_next" >Sista</span><span class="blog_pagination_last_img"></span></a>

                    <span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
                    <span noclick="1" class="blog_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                    <div class="blog_popup_pagination_wrapper" noclick="1" >
                        <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                            <option noclick="1" value="0" class="colorb9c2cf" >Gå till sida...</option>
                            <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                <option noclick="1" class="color3c3a3a" <?php if ($pager->getPage() == $pg) {  echo "selected='selected'"; }?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                <?php } ?>
                        </select>
                        <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupForumGo(this);">GA</div>
                    </div>
                    <div class="floatRight">
                        <div noclick="1" class="floatRight forum_drop-down-menus forum_list_column_row height_130px">
                            <ul noclick="1">
                                <li noclick="1"><span noclick="1" name="profile_useronly_forum_list_table" id="sortby_date" class="cursor">Publicerat</span></li>
                                <li noclick="1"><span noclick="1" name="profile_useronly_forum_list_table" id="sortby_title" class="cursor">Rubrik</span></li>
                                <li noclick="1"><span noclick="1" name="profile_useronly_forum_list_table" id="sortby_category" class="cursor">Kategori</span></li>
                            </ul>
                        </div>
                        <span noclick="1" class="floatRight forum_pagination_down_img forun_sorting_arrow cursor" onclick="javascript:sortingPopUp(this);"></span>
                        <span class="floatRight">Sortera efter</span>
                    </div>    
                <?php endif ?>
        </div>
    </div>
</div>
