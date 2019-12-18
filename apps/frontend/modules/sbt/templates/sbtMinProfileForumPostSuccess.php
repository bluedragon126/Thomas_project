<!--[if IE 7]>
    <link rel="stylesheet" type="text/css" media="screen" href="/css/main_ie7.css" />
<![endif]-->
<div class="listing">
    <div class="float_left widthall">
        <div  class="listingheading">Forum</div>
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
                                    <option noclick="1" value="0" style="color:#b9c2cf" >Gå till sida...</option>
                                    <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                        <option noclick="1" class="color3c3a3a" <?php if ($pager->getPage() == $pg) {  echo "selected='selected'"; }?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                    <?php } ?>
                                </select>
                                <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupForumGo(this);">GA</div>
                            </div>
                            <div style="float: right;">
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
            <ul id="blog_list_profiler_column_row" class="headerList blog_table_head">
                <li class="first width_76 blog_table_head padding_right_17px"><a id="sortby_date" name="profile_useronly_forum_list_table" class="float_left cursor"><span class="float_left">Publicerat</span></a></li>
                <li class="bg width_337px blog_table_head padding_right_10px"><a id="sortby_title" name="profile_useronly_forum_list_table" class="float_left cursor"><span class="float_left">Rubrik</span></a></li>
                <li class="bg width_80 blog_table_head padding_right_13px"><a id="sortby_category"  name="profile_useronly_forum_list_table" class="float_left cursor"><span class="float_left">Kategori</span></a></li>
            </ul>
            <div id="blog_topic_list">
                <?php
                $i = 0;
                foreach ($pager->getResults() as $data):
                    ?>
                    <ul class="<?php echo $i % 2 == 0 ? 'classnot' : 'white'; ?> blog_line_table">
                        <li style="" class="padding_left_5px width_76 padding_right_17px">
                            <span class="blog_prof_table_date"><?php echo substr($data->andratdatum, 2, 9) ?></span>
                        </li>
                        <li class=" width_337px padding_right_10px">
                            <a class="blog_table_title cursor" href="<?php echo "https://" . $host_str ?>/forum/commentOnForumTopic/forumid/<?php echo $data->koppling ?>"><span class="width_100per"><?php echo $data->rubrik ?></span></a>
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


            <?php /* ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" id="profile_useronly_forum_list_table">
              <tr id="profile_useronly_forum_list_column_row" valign="top" height="35" style="color:#000000;">
              <th class="width_30">Art</th>
              <th class="width_83"><a id="sortby_date" name="profile_useronly_forum_list_table" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Publ.<img src="/images/bg.gif" alt="down" /></span></a></th>
              <th class="width_152"><a id="sortby_title" name="profile_useronly_forum_list_table" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Rubrik<img src="/images/bg.gif" alt="down" /></span></a></th>
              <th class="width_92"><a id="sortby_category" name="profile_useronly_forum_list_table" style="cursor:pointer; width:90px;" class="float_left"><span class="float_left">Kategori<img src="/images/bg.gif" alt="down" /></span></a></th>
              <th class="width_84"><a id="sortby_type" name="profile_useronly_forum_list_table" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Typ<img src="/images/bg.gif" alt="down" /></span></a></th>
              <th class="width_84"><a id="sortby_object" name="profile_useronly_forum_list_table" style="cursor:pointer; width:90px;" class="float_left"><span class="float_left">Objekt<img src="/images/bg.gif" alt="down" /></span></a></th>
              </tr>
              <?php foreach($pager->getResults() as $data): ?>
              <tr class="classnot">
              <td class="width_30"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>
              <td class="width_83"><?php echo substr($data->andratdatum,2,9) ?></td>
              <td class="main_link_color width_152"><a class="main_link_color cursor" href="<?php echo "https://".$host_str ?>/forum/commentOnForumTopic/forumid/<?php echo $data->koppling ?>"><span class="profile_forumlist_title"><?php echo $data->rubrik ?></span></a></td>
              <td class="lightgreenfont width_92"><span class="profile_forumlist_cat"><?php echo $data->getCategoryName($data->btforum_category_id); ?></span></td>
              <td class="lightbluefont width_84"><?php echo '-';//$data->getReplyCount($data->id); ?></td>
              <td class="darkbluefont width_84"><?php echo '-';//$data->visningar ?></td>
              </tr>
              <?php endforeach; ?>
              <tr>
              <td colspan="6">
              <?php /*<div class="paginationwrapper">
              <div class="pagination" id="useronlyforum_list_listing">
              <?php if ($pager): ?>
              <?php if ($pager->haveToPaginate()): ?>
              <a id="<?php echo $pager->getFirstPage(); ?>" style="cursor:pointer;"> <img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a> <a id="<?php echo $pager->getPreviousPage(); ?>" style="cursor:pointer;"> < </a>
              <?php $links = $pager->getLinks(11); foreach ($links as $page): ?>
              <?php if($page == $pager->getPage()): ?>
              <?php echo '<span class="selected">'.$page.'</span>' ?>
              <?php else: ?>
              <a id="<?php echo $page; ?>" style="cursor:pointer;"><?php echo $page; ?> </a>
              <?php endif; ?>
              <?php if ($page != $pager->getCurrentMaxLink()): ?>
              -
              <?php endif ?>
              <?php endforeach ?>
              <a id="<?php echo $pager->getNextPage(); ?>" style="cursor:pointer;"> > </a> <a id="<?php echo $pager->getLastPage(); ?>" style="cursor:pointer;"> <img src="/images/pag_arrow_right.jpg" alt="arrow" /> </a>
              <?php endif ?>
              <?php endif ?>
              </div>
              </div> *//* ?>
              </td>
              </tr>
              </table><?php */ ?>
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
                                    <option noclick="1" value="0" style="color:#b9c2cf" >Gå till sida...</option>
                                    <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                        <option noclick="1" class="color3c3a3a" <?php if ($pager->getPage() == $pg) {  echo "selected='selected'"; }?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                    <?php } ?>
                                </select>
                                <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupForumGo(this);">GA</div>
                            </div>
                            <div style="float: right;">
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
    </div>
</div>
