<script type="text/javascript" language="javascript">
    //Amit changes 31-1-2011
    $(window).load(function () {

        $(window).click(function (e) {
            if ($(e.target).attr("noclick") == "1") {
            } else {
                $(".forum_popup_pagination_wrapper").hide();
                $(".forum_drop-down-menus").hide();
            }
        });
        var url = window.location.href;
        if (url.indexOf("cat") > 0) {
            var urlSplited = url.split("/");
            urlSplited = urlSplited.reverse();
            $("#forum_menu").find("[data=" + urlSplited[0] + "]").addClass("selected");
            
            var currentSelected = $(".submenuwrapper").find("a.selected");
            var fontColor = $('.submenuwrapper').find("a.selected").css("color");
            var bgColor = $(".submenuwrapper").find("a.selected").css("background-color");

            $('.submenuwrapper ul li a').each(function () {
                $(this).hover(function () {
                    $(currentSelected).css("background-color", bgColor);
                    $(currentSelected).css("color", fontColor);
                    $(currentSelected).removeClass("selected");
                }, function () {
                    $(currentSelected).addClass("selected");
                });
            });
        }
    });

    function uploadMessage(msg_div_id, message, filename, flag)
    {
        document.getElementById(msg_div_id).innerHTML = message;

        var text = tinyMCE.activeEditor.getContent();
        if (flag == 'forum_topic')
            var dest_path = window.location.hostname + '/uploads/forumDetailImage/' + filename;
        if (flag == 'forum_comment')
            var dest_path = window.location.hostname + '/uploads/forumCommentImage/' + filename;

        var str = "<img src='http://" + dest_path + "' alt='img' />";
        tinyMCE.activeEditor.setContent(text + str);
    }

    function paginationPopupGo(obj) {
        var column_id = $('#column_id').val();
        var current_column_order = $('#sbt_forum_column_order').val();
        var cat_id = $('#forum_parent_tab').val();
        var sub_cat_id = $('#forum_sub_cat_id').val();
        $(".forum_popup_pagination_wrapper").hide();
        var page = $(obj).prev().val();

        $('#forum_topic_list').find("tr.classnot").each(function (index) {
            $(this).addClass('withOpacity');
        });

        var pagination_numbers = $('#forum_listing , .forum_listing').html();

        $('#forum_listing,.forum_listing').html('<span class="">' + pagination_numbers + '</span>');
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');
        $.post("/forum/getForumContentByOrder?column_id=" + column_id + "&page=" + page + "&sbt_forum_column_order=" + current_column_order + "&forum_parent_tab=" + cat_id + '&forum_sub_cat_id=' + sub_cat_id, function (data) {
            $('#forum_content').html(data);

            $('.indicator').hide();
            $('#pop-box-over').hide();
            var order = $('#sbt_forum_column_order').val();
            setForumTopicListOrderImage('sortby_' + column_id, order);
        });
    }

    function paginationPopup(obj) {
        var offset = $(obj).position();
        $(obj).next().css("left", offset.left - 68);
        var obj1 = $(".forum_drop-down-menu_page");
        if ($(obj1).val() == 0) {
            $(obj1).removeClass("color3c3a3a");
            $(obj1).addClass("colorb9c2cf");
        } else {
            $(obj1).removeClass("colorb9c2cf");
            $(obj1).addClass("color3c3a3a");
        }
        $(obj).next().toggle();
    }

    function sortingPopUp(obj) {
        $(obj).prev().toggle();
    }

    function paginationPopupSelect(obj) {
        if ($(obj).val() == 0) {
            $(obj).removeClass("color3c3a3a");
            $(obj).addClass("colorb9c2cf");
        } else {
            $(obj).removeClass("colorb9c2cf");
            $(obj).addClass("color3c3a3a");
        }
    }
    tinyMCE.init({
        selector: 'textarea',  // change this value according to your HTML
        width : 425
    });

</script>
<style>.up_div{margin-top: -10px;}</style>
<span class="float_left indicator loader loader_posiotion"><img src="/images/ajax-loader.gif" /></span>
<div class="maincontentpage" id="forum_data_container">
    <div class="forumlistingleftdiv">
        <div class="forumlistingleftdivinner">
            <div class="forum-menu-wrapper">
                <a href="/forum/forumHome"><div class="forum-menu-logo"></div></a>
                <a class="new_fprum_topic_text cursor"><div class="forum-menu-active-logo"></div></a>
                <div class="clearAll"></div>
                <div class="forumnavigationNew">
                    <?php include_partial('global/forum_tab', array("designPattern" => "2")); ?>
                </div>
            </div>
            <div class="float_left listing">

                <div id="forum_content" class="float_left widthall">
                    <div class="float_left widthall">
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
                                    <div class="forum_popup_pagination_wrapper" noclick="1" >
                                        <ul class="pagination_ul">
                                            <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                                <li onclick="javascript:paginationUlGo(this);"><?php echo $pg; ?></li>
                                            <?php } ?>
                                        </ul>
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
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="forum_topic_list">
                        <tr id="forum_topic_listing_column_row1" class="forum_table_head">
                            <th class="forum_table_title_w pad_lft_5"><span class="float_left">Rubrik/Namn</span></th>
                            <th class="width_9">&nbsp;</th>
                            <th class="width15">&nbsp;</th>
                            <th class="width_9">&nbsp;</th>
                            <th class="forum_table_topic_w"><span class="float_left">Ämne</span></th>
                            <th class="width_9">&nbsp;</th>
                            <th class="forum_table_post_w"><span class="float_left">Inlägg/visad</span></th>
                            <th class="width_9">&nbsp;</th>
                            <th class="forum_table_date_w"><span class="float_left">Senaste</span></th>
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
                                    <a class="cursor" href="<?php echo "http://" . $host_str . "/forum/commentOnForumTopic/forumid/" . $forum->id ?>">
                                    <span class="forum_table_title"><?php echo $forum->rubrik ?></span></a>
                                    </br>
                                    <a class="forum_table_user forum_table_title_w" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $forum->author_id //$profile->getUserFromFullName($forum->skapare)      ?>"><?php echo $profile->getFullUserName($forum->author_id); ?></a>
                                </td>
                                <td class="width_9">&nbsp;</td>
                                <td class="width15">
                                    <?php if (($sf_user->getAttribute('isSuperAdmin', '', 'userProperty') == 1) && ($sf_user->isAuthenticated())): ?>
                                        <a href="#" id="<?php echo $forum->id; ?>" class="edit_forum_topic"  ><span class="forum_table_edit" >E</span></a>
                                        <a id="delete_forum_topic" title="Ta bort <?php echo $forum->rubrik; ?>" href="javascript:open_confirmation('Vill du verkligen ta bort ämne i ett forum med titeln <?php echo $forum->rubrik ?>','<?php echo $forum->koppling; ?>','delete_forum_topic_confirm_box','delete_forum_topic_msg')"><span class="forum_table_delete">X</span></a>
                                    </td>
                                <?php endif; ?>
                                <td class="width_9">&nbsp;</td>
                                <?php if ($forum->$methodName() == '-'): ?>
                                    <td class="forum_table_topic forum_table_topic_w "><span class="forum_list_subcat"><?php echo $forum->$methodName(); ?></span></td>
                                <?php else: ?>
                                    <td class="forum_topic_category_row forum_table_topic_w forum_table_topic"><a id="cat_<?php echo $forum->btforum_category_id; ?>" name="subcat_<?php echo $methodName == 'getSubCategoryName' ? $forum->btforum_subcategory_id : ''; ?>" class="cursor"><span class="forum_list_subcat"><?php echo $forum->$methodName(); ?></span></a></td>
                                <?php endif; ?>
                                <td class="width_9">&nbsp;</td>
                                <td class="forum_table_post_w" ><span class="forum_table_post"><?php echo $forum->getReplyCount($forum->id) . " inlägg"; ?></span></br><span class="forum_table_views"><?php echo $forum->visningar . " visningar"; ?> </span> </td>
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
                                        <ul class="pagination_ul">
                                            <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                                <li onclick="javascript:paginationUlGo(this);"><?php echo $pg; ?></li>
                                            <?php } ?>
                                        </ul>
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

                </div>
            </div>
        </div>
        <?php echo include_partial('global/inner_bottom_footer', array('designPattern' => '2', 'topBlankClass' => 'floatLeftNew blank_113h width_100per')); ?>
    </div>
    <div class="rightbanner padding_0 font_0 margin_top_ann">
        <div class="home_ad_r float_left font_size_12 ">Annons</div>
        <?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
        </div>
    </div>
</div>

<!-- ui-dialog-update-object -->
<div id="show_forum_preview_box" title="Preview of Post" class="hide_div">
    <?php include_partial('forum/forum_new_topic_preview', array('host_str' => $host_str, 'preview_information' => $preview_information, 'new_profile' => $profile)) ?>
</div>

<!-- ui-dialog-delete-article -->
<div id="delete_forum_topic_confirm_box" title="Delete Forum Topic Confirmation">
    <table width="100%"  border="0" cellspacing="3" cellpadding="0">
        <tr>
            <td id="delete_forum_topic_msg">Message:</td>
        </tr>
    </table>
</div>
<div id="pop-box-over" class="display-none"></div>