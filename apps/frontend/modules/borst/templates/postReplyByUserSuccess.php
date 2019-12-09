<?php if ($pager): ?> 
    <div class="paginationwrapperNew">
        <div class="forum_pag" id="enquiry_post_list_listing">
            <?php if ($pager->haveToPaginate()): ?>
                <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                                                      <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><!--<img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a>--><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
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
                                            <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span><!--<img src="/images/pag_arrow_right.jpg" alt="arrow" />--> </a>
        <?php } ?>
                    <span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
                    <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopupEnq(this);"></span>
                    <div class="forum_popup_pagination_wrapper" noclick="1" >
                        <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelectEnq(this);" >
                            <option noclick="1" value="0" class="forum_select_option_color"  >Gå till sida...</option>
                            <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                <option noclick="1" class="color3c3a3a" <?php if ($pager->getPage() == $pg) {
                                    echo "selected='selected'";
                                } ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                    <?php } ?>
                        </select>
                        <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGoEnq(this);">GA</div>
                    </div>
    <?php endif ?>
        </div>
    </div>
            <?php endif; ?>
<div class="breadcrumb">
    <ul>
        <li><?php
            include_component('isicsBreadcrumbs', 'show', array(
                'root' => array('text' => 'Börstjänaren', 'uri' => 'borst/borstHome')
            ))
            ?> </li>
    </ul>
    <div class="askBT_user askBT_post_start">Fråga ställd av <span class="askBT_post_start_name"><?php if ($enquiry_details_data->faster_ans_flag == 2) {
                echo $enquiry_details_data->firstname;
            } else if ($enquiry_details_data->faster_ans_flag == 3) {
                echo $enquiry_details_data->user_signature;
            } else {
                echo $enquiry_details_data->firstname . ' ' . $enquiry_details_data->lastname;
            } ?></span></div>
</div>
<div>
<?php if ($enquiry_details_data) { ?>
        <table id="eqdetail" bgcolor="" width="600" border="0" cellspacing="0" cellpadding="2" class="tablebox">
            <tr>
                <td height="35" align="left" class="rubrik">
    <?php if ($enquiry_details_data): ?>
        <?php echo $enquiry_details_data->enq_subject; ?>
    <?php endif; ?>
                </td>
            </tr>
        </table>
        <div id="action_msg" class="float_left"></div>
    <?php if ($enquiry_details_data): ?>
            <table id="eqdetail" bgcolor="" width="600" border="0" cellspacing="0" cellpadding="2" class="tablebox">
                <tr class="askBT_user_question_row">
                    <td width="150" class="name_date_row_td">
                        <span class="float_left">
                            <input type="hidden" name="delete_post_id" id="delete_post_id" />
                            <input type="hidden" name="enq_id" id="enq_id" value="<?php echo $enquiry_details_data->id; ?>" />
                        </span>
                        <span class="float_left  askBT_user_left"><?php echo substr($enquiry_details_data->enq_date, 0, 10); ?></span>
                    </td>
                    <td><span class="float_left askBT_user_left"><?php $cmt_count = $enquiry_details_data->getReplyCount($enquiry_details_data->id);
        echo ($cmt_count > 1) ? $enquiry_details_data->getReplyCount($enquiry_details_data->id) . ' Inlägg' : ''; ?></span><span class="float_right  askBT_user_right">&nbsp;Fråga BT!<?php //echo html_entity_decode($enquiry_details_data->user_question); ?></span> </td>
                </tr>
            </table>
            <table id="eqdetail" bgcolor="" width="600" border="0" cellspacing="0" cellpadding="2" class="tablebox">
                <tr class="askBT_user_answer">
                    <td align="left" width="150" class="askBT_user_question">
                        <img src="/images/new_home/askBT_ava.png" alt="arrow" height="70" width="70"/>
                        <span class="float_left askBT_comment_user_name"><?php if ($enquiry_details_data->faster_ans_flag == 2) {
                    echo $enquiry_details_data->firstname;
                } else if ($enquiry_details_data->faster_ans_flag == 3) {
                    echo $enquiry_details_data->user_signature;
                } else {
                    echo $enquiry_details_data->firstname . ' ' . $enquiry_details_data->lastname;
                } ?></span>
                    </td>
                    <td class="askBT_user_question"><?php $user_question = $enquiry_details_data->user_question;
            echo str_replace('</p>', '</span><br /><br />', str_replace('<p>', '<span>', html_entity_decode($user_question)));
            ?></td>
                </tr>
            </table>
    <?php endif; ?>
    <?php if ($pager): ?>
            <div class="enquiry_post_list_data">
                <table id="enquiry_post_list" border="0" width="600" cellspacing="0" cellpadding="2">
                                <?php
                                foreach ($pager->getResults() as $reply):
                                    if (!$reply->admin_or_user) {
                                        $flag = 1;
                                    } else {
                                        $flag = 0;
                                    }
                                    ?>
                        <tr class="<?php if ($flag) { ?>askBT_user_question_row<?php } else { ?>askBT_user_question_reply_row<?php } ?>">
                            <td width="150" class="name_date_row_td">
                                <span class="<?php if ($flag) { ?>askBT_user_left<?php } else { ?>askBT_admin_left<?php } ?>"><?php echo substr($reply->reply_date, 0, 10); ?></span> 
                            </td>
                            <td><span class="float_right  <?php if ($flag) { ?>askBT_user_right<?php } else { ?>askBT_admin_right<?php } ?>">&nbsp;<?php if ($flag) { ?>Fråga BT!<?php } else { ?>Börstjänaren svarar<?php } ?></span></td>
                        </tr>
                        <tr class="askBT_user_question_reply_row_image">
                            <td width="150" align="left" class="askBT_user_question">
                                <span>
            <?php
            if ($user_photo_data) {
                if ($reply->admin_or_user) {
                    $author_image = '/uploads/userThumbnail/' . str_replace('.', '_large.', $user_photo_data->profile_photo_name);
                } else {
                    if ($reply->author_name == 'Thomas Sandström') {
                        $author_image = '/images/new_home/askBT_TS.png';
                    } else if ($reply->author_name == 'Göran Högberg') {
                        $author_image = '/images/new_home/askBT_ava.png';
                    } else if ($reply->author_name == 'Henrik Hallenborg') {
                        $author_image = '/images/new_home/askBT_HH.png';
                    } else {
                        $author_image = '/images/new_home/askBT_ava.png';
                    }
                }
            } else {
                if ($reply->author_name == 'Thomas Sandström') {
                    $author_image = '/images/new_home/askBT_TS.png';
                } else if ($reply->author_name == 'Göran Högberg') {
                    $author_image = '/images/new_home/askBT_ava.png';
                } else if ($reply->author_name == 'Henrik Hallenborg') {
                    $author_image = '/images/new_home/askBT_HH.png';
                } else {
                    $author_image = '/images/new_home/askBT_ava.png';
                }
            }
            ?>
                                    <img src="<?php echo $author_image; ?>" alt="arrow" height="70" width="70"/>
                                    <span class="float_left askBT_comment_user_name"><?php echo $reply->author_name; ?></span>
                                </span> 
                            </td>
                            <td class="askBT_user_question">
                                <?php
                                $textarea = $reply->reply_text;
                                echo str_replace('</p>', '</span><br /><br />', str_replace('<p>', '<span>', html_entity_decode($textarea)));
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="askBT_blank_row">&nbsp;</td>
                        </tr>
                                    <?php endforeach; ?>
                </table>
                <div class="paginationwrapperNew">
                    <div class="forum_pag" id="enquiry_post_list_listing">
        <?php if ($pager->haveToPaginate()): ?>
                                <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                                                      <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><!--<img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a>--><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
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
                                        <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span><!--<img src="/images/pag_arrow_right.jpg" alt="arrow" />--> </a>
            <?php } ?>
                                <span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
                                <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopupEnq(this);"></span>
                                <div class="forum_popup_pagination_wrapper" noclick="1" >
                                    <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelectEnq(this);" >
                                        <option noclick="1" value="0" class="forum_select_option_color" >Gå till sida...</option>
            <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                            <option noclick="1" class="color3c3a3a" <?php if ($pager->getPage() == $pg) {
                    echo "selected='selected'";
                } ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
            <?php } ?>
                                    </select>
                                    <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGoEnq(this);">GA</div>
                                </div>
        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><?php
        include_component('isicsBreadcrumbs', 'show', array(
            'root' => array('text' => 'Börstjänaren', 'uri' => 'borst/borstHome')
        ))
        ?>
                    </li>
                </ul>
            </div>
    <?php endif; ?>        
<?php } ?> 
</div>