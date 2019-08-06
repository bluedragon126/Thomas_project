<!--[if IE 7]>
<style>
#forum_topic_list th, #forum_topic_list tr, #forum_topic_list td{ float:left; position:relative;}

.forum_title{ float: left; height: auto; position: relative; text-align: left; width: 645px; word-wrap: break-word; border:0px solid red;}
.forum_desc{ float: left; height: auto; position: relative; text-align: left; width: 455px; word-wrap: break-word; border:0px solid red;}

</style>		
<![endif]-->

    <div class="float_left listing">
        <div id="enquiry_content" class="float_left widthall">
            <div class="float_left widthall">
                <input type="hidden" name="forum_parent_tab" id="forum_parent_tab" value="<?php echo $forum_parent_tab; ?>" />
                <input type="hidden" name="forum_sub_cat_id" id="forum_sub_cat_id" value="<?php echo $forum_sub_cat_id; ?>" />
                <input type="hidden" id="sbt_forum_column_order" name="sbt_forum_column_order" value="<?php echo $current_column_order; ?>"/>
                <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
                <input type="hidden" id="sbt_forum_column" name="sbt_forum_column" value="<?php echo $cur_column; ?>"/>
                <input type="hidden" id="delete_forum_topic_id" name="delete_forum_topic_id" />
            </div>                  
            <div class="paginationwrapperNew">
                <div class="forum_pag enquiry_listing" id="">
                    <?php if ($pager->haveToPaginate()): ?>
                        <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                            <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
                            <?php } ?>
                            <?php $links = $pager->getLinks(9);
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
                                        <option noclick="1" class="color232222" <?php if ($pager->getPage() == $pg) {  echo "selected='selected'"; }?>  value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                            <?php } ?>
                                </select>
                                <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                            </div>
                            <span class="forum_sorting_wrapper">
                                <div noclick="1" class="floatRight forum_drop-down-menus enquiry_topic_listing_column_row">
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
            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="forum_topic_list">
                <tr id="forum_topic_listing_column_row1" class="askBT_table_head">
                            <th class="askBT_table_title_w pad_lft_5"><span class="float_left">Rubrik/Namn</span><!--<a id="sortby_subject2" class="float_left cursor"><img src="/images/bg.gif" alt="down" /></a>--></th>
                            <th class="askBT_table_topic_w"><span class="float_left">Ämne<!--<img src="/images/bg.gif" alt="down" />--></span></th>
                            <th class="forum_table_post_w"><span class="float_left">Inlägg/visad<!--<img src="/images/bg.gif" alt="down" />--></span></th>
                            <th class="forum_table_date_w"><span class="float_left">Senaste<!--<img src="/images/bg.gif" alt="down" />--></span></th>
                        </tr>
                <?php $i = 1;
                foreach ($pager->getResults() as $forum): //echo "<pre>"; print_r($forum->toarray());?>
                        <tr <?php if ($i == 1) {        echo "class='padding_top_table'";    } ?> >
                            <td class="orgfont askBT_table_title_w pad_lft_5">
                                <a class="cursor" href="<?php echo "http://" . $host_str . "/borst/enquiryDetails/enq_id/" . $forum->id ?>"><span class="width322 askBT_table_title"><?php echo $forum->enq_subject; ?></span></a>
                                </br>
                                <a class="askBT_table_user askBT_table_title_w" href=""><?php if($forum->faster_ans_flag == 2){ echo $forum->firstname;} else if($forum->faster_ans_flag == 3){ echo $forum->user_signature;} else { echo $forum->firstname.' '.$forum->lastname;} ?></a>
                            </td>                      
                            <td class="forum_table_topic askBT_table_topic_w"><span class="askBT_table_topic"><?php echo $forum->enq_type; ?></span></br><span class="askBT_table_views">&nbsp;</span></td>                                
                            <td class="forum_table_post_w" ><span class="askBT_table_post"><?php echo $forum->getReplyCount($forum->id) . " Inlägg"; ?></span></br><span class="askBT_table_views"><?php echo $forum->visningar . " Visad"; ?> </span> </td>
                            <td class="forum_table_date_w"><span class="askBT_table_date"><?php if($forum['maxreplydate'] == null) { echo substr($forum->enq_date, 0, 10); } else { echo substr($forum['maxreplydate'], 0, 10); } ?><?php //echo substr($forum->enq_date, 0, 10); ?></span></br><span class="askBT_table_time"><?php if($forum['maxreplydate'] == null) { echo substr($forum->enq_date, 11, -3); } else { echo substr($forum['maxreplydate'], 11, -3); } ?><?php //echo substr($forum->enq_date, 11, -3); ?></span></td>                                
                        </tr>
                    <?php $i++;
                endforeach; ?>
            </table>
            <div class="blank_14h">&nbsp;</div>
            <div class="clearAll"></div>
            <div class="paginationwrapperNew">
                <div class="forum_pag enquiry_listing" id="">
                    <?php if ($pager->haveToPaginate()): ?>
                        <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                                              <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><!--<img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a>--><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
                            <?php } ?>
                            <?php $links = $pager->getLinks(9);
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
                            <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span><!--<img src="/images/pag_arrow_right.jpg" alt="arrow" />--> </a>
                            <?php } ?>
                            <span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
                            <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                            <div class="forum_popup_pagination_wrapper" noclick="1" >
                                <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                                    <option noclick="1" value="0" >Gå till sida...</option>
                                    <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                        <option noclick="1" class="color232222" <?php if ($pager->getPage() == $pg) {  echo "selected='selected'"; }?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                            <?php } ?>
                                </select>
                                <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                            </div>
                            <span class="forum_sorting_wrapper">
                                <div noclick="1" class="floatRight forum_drop-down-menus enquiry_topic_listing_column_row">
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
        </div>
    </div>