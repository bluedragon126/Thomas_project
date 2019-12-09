<script type="text/javascript" language="javascript">
    function paginationPopupGo(obj) {
        var page = $(".forum_drop-down-menu_page").val();
        var koppling_id = $('#koppling_id').val();
        $('#pop-box-over').show();
        $('.indicator').css('display', 'block');

        $.get("/forum/saveCommentOnForum?page=" + page + "&koppling_id=" + koppling_id, function (data) {
            $("#forum_comment_list_div").html(data);
            var pagination_numbers = $('.forum_comment_list_listing:last').html();
            $('#forum_comment_list_listing, .forum_comment_list_listing').html(pagination_numbers);
            $('.indicator').hide();
            $('#pop-box-over').hide();
        });
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

    function sortingPopUp(obj) {
        $(obj).prev().toggle();
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

    function paginationPopupBottom(obj) {
        var offset = $(obj).position();
        $(obj).next().css("left", offset.left - 68);
        $(obj).next().css("top", offset.top - 105);
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

    $(window).load(function () {
        $('.forum_desc p').find("img").each(function (index) {
            $(this).parent().addClass('float_left');
            var width = $(this).width();
            if (width > 455)
                $(this).css({"width": 455 + "px"});

            var align = $(this).attr("align");
            if (align == 'left')
                $(this).css({"margin": "10px 10px 10px 0"});
            if (align == 'right')
                $(this).css({"margin": "10px 0 10px 10px"});
            if (align == '')
                $(this).css({"margin": "10px 10px 10px 0"});
        });
        
        $('.forum_comment_wrapper .forum_post_bread').find('img').each(function(){
           if($(this).width() > 445){
               $(this).css({'width':'445px', 'height':'auto'});
           }
        });
    });
    tinyMCE.init({
        selector: 'textarea',  // change this value according to your HTML
        height: 258,
        width: 425,
        plugins: [
        "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
    ],
    toolbar1: "bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent | link unlink image | emoticons", 
    browser_spellcheck: true,  
    resize: "both",
    });

</script>
<style>.up_div{margin-top: -10px;}</style>
<input type="hidden" id="userLogin" value="<?php echo $sf_user->isAuthenticated(); ?>" />
<?php if ($pager->haveToPaginate()) { ?>
    <input id="lastpage" type="hidden" value="<?php echo $pager->getLastPage(); ?>" />
<?php } else { ?>
    <input id="lastpage" type="hidden" value="0" />
<?php } ?>
<span class="float_left indicator loader loader_posiotion"><img src="/images/ajax-loader_blog.gif" /></span>
<div class="maincontentpage" id="forum_data_container">
    <div class="forumlistingleftdiv height_width_auto">
        <div class="forum_comment_wrap width_651">
        <div class="forumlistingleftdivinner">
            <div class="forum-menu-wrapper">
                <a href="/forum/forumHome"><div class="forum-menu-logo"></div></a>
                <a class="new_fprum_topic_texts cursor" href="/forum/forumHome"><div class="forum-menu-active-logo"></div></a>
                <div class="clearAll"></div>
                <div class="forumnavigationNew">
                    <?php include_partial('global/forum_tab', array('module' => 'sbt', 'action' => 'sbtForum', 'category' => $topic_data->btforum_category_id, 'sub_category' => $topic_data->btforum_subcategory_id, "designPattern" => "2")); ?>
                </div>
            </div>            
            <div class="float_left listing">
                <div id="forum_content" class="float_left widthall">
                    <div id="greenmsg_article" class="display-none">
                        <?php
                        echo 'Forum Post Deleted Successfully';
                        ?>
                    </div>

                    <div id="forum_topic_div" class="float_left widthall">
                        <div class="paginationwrapperNew">
                            <div class="forum_pag forum_comment_list_listing" id="">
                                <?php if ($pager->haveToPaginate()): ?>
                                    <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                                        <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"></a><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
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
                                                <a id="<?php echo $pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span><!--<img src="/images/pag_arrow_right.jpg" alt="arrow" />--> </a>
                                    <?php } ?>
                                    <span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
                                    <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                                    <div noclick="1" class="forum_popup_pagination_wrapper">
                                        <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                                            <option noclick="1" value="0">Gå till sida...</option>
                                            <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                                <option noclick="1" class="color3c3a3a" value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                            <?php } ?>
                                        </select>
                                        <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="forum_line_navpag float_left width99per"></div>

                        <?php if ($topic_data): ?>
                            <div class="float_left widthall">
                                <?php
                                if ($sf_user->hasFlash('SuccessMsg')) {
                                    echo $sf_user->getFlash('SuccessMsg');
                                }
                                ?>      
                            </div>
                            <?php
                            $forumTitle = strlen($topic_data->rubrik) > 47 ? mb_substr($topic_data->rubrik, 0, 47) . '...' : $topic_data->rubrik;
                            ?>
                            <div class="forum_post_brcr">
                                <ul>
                                    <li>Forum > <?php echo $categoryName . ' > ' . $subCategoryName . ' > ' . $forumTitle; ?></li>
                                </ul>
                            </div>

                            <div class="float_right">
                                <div class="forum_post_count float_left mrg_rgt_10"><?php echo $reply_count; ?> POSTER I DETTA ÄMNE</div>
                                <?php //if ($valid_user == 1): ?>
                                <?php if ($add_in_fav_list == 0): ?>
                                    <div class="forum_post_fan float_left" id="<?php echo 'forum_' . $topic_data->id . '_' . $user_id; ?>" name="<?php echo $topic_data->rubrik; ?>">GÖR TILL FAVORIT</div>
                                <?php else: ?>
                                    <div class="forum_post_unfan float_left cursorDefault"><?php echo __('LAGD I FAVORITER') ?> <span class="forum_post_arrow"></span></div>
                                <?php endif; ?>
                                <?php //endif;  ?>
                            </div>

                            <div class="comment_content_wrapper float_left widthall">
                                <div class="float_left widthall mrg_top_14">
                                    <div class="width_120 float_left comment_content_img_wrapper margin_top_8">
                                        <div>
                                            <div class="forum_post_start">Startades av:</div>
                                            <div class="forum_post_start_name"><?php echo $topic_data->skapare; ?></div>
                                            <!--<div class="forum_post_start_date"><?php //echo $topic_data->datum;  ?></div>-->
                                        </div>
                                    </div>
                                    <div class="float_left width_445 widthall min_height_36px">
                                        <div class="forum_post_head"><?php echo $topic_data->rubrik; ?></div>
                                    </div>

                                </div>
                                <div class="forum_comment_wrapper commentblock_orgwrapper float_left mrg_top_24 padding_0">
                                    <div class="forum_comment_top_wraper float_left forum_comment_top_even">
                                        <div class="forum_comment_top_left float_left"><?php echo date('Y-m-d', strtotime($topic_data->datum)); ?></div>
                                        <div class="forum_comment_top_left"></div>
                                        <div class="forum_comment_top_right float_right"><a href="<?php echo "http://" . $host_str ?>/borst/contactUs/postid/<?php echo $topic_data->id ?>" class="cursor">Rapportera</a></div>
                                        <div class="forum_comment_top_right float_right pad_rgt_13 cursor" onclick="javascript:getFormForreplay(<?php echo $topic_data->id ?>, '<?php echo $new_profile->getFullUserName($topic_data->author_id) ?>');">Citera</div>
                                    </div>
                                    <div class="blank_24h float_left widthall">&nbsp;</div>

                                    <div class="comment_content_wrapper float_left widthall">
                                        <div class="width_120 float_left comment_content_img_wrapper">
                                            <?php if ($user_arr[$topic_data->skapare] != ''): ?>
                                                <a class="" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $topic_data->author_id ?>"><img src="/uploads/userThumbnail/<?php echo str_replace('.', '_large.', $user_arr[$topic_data->skapare]); ?>" alt="user_photo"/></a>
                                            <?php else: ?>
                                                <a class="" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $topic_data->author_id ?>"><img src="/images/new_home/blog_user_img.png" alt="photo" width="110"/></a>
                                            <?php endif; ?>
                                            <div class="forum_comment_user_name widthall float_left">
                                                <?php if ($topic_data->author_id != 0) : ?><a class="" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $topic_data->author_id ?>"><?php echo ucwords($new_profile->getFullUserName($topic_data->author_id)); ?></a><?php
                                        else: echo $topic_data->skapare;
                                        endif;
                                                ?>
                                            </div>
                                            <?php $topic_data_arr = $new_profile->fetchRegdateAndTotalLoginById($topic_data->author_id); ?>
                                            <div class="forum_comment_detail float_left">
                                                <div class="widthall float_left"></div>
                                                <div class="widthall float_left">Aktiv: <?php echo $topic_data_arr ? date("M Y", strtotime($topic_data_arr[0]['regdate'])) : ''; ?></div>
                                                <div class="widthall float_left"><?php echo $topic_data_arr ? $topic_data_arr[0]['inlog'] : ''; ?> inlägg</div>
                                                <div class="widthall float_left"><?php if ($sf_user->getAttribute('user_id', '', 'userProperty') == $topic_data->author_id): ?><span class="upcase">Online</span><?php endif; ?></div>
                                                <div class="widthall float_left"><?php if (($sf_user->getAttribute('firstname', '', 'userProperty') . ' ' . $sf_user->getAttribute('lastname', '', 'userProperty') == $topic_data->skapare) || ($sf_user->getAttribute('isSuperAdmin', '', 'userProperty') == 1) && ($sf_user->isAuthenticated())): ?><a class="edit_forum_anchor" name="topic" id="editpost<?php echo $topic_data->id; ?>">Redigera</a><?php endif; ?></div>
                                            </div>
                                        </div>
                                        <div class="float_left width_445 widthall">
                                            <div class="widthall forum_post_bread">
                                                <!--<div class="forum_post_dot">&nbsp;</div>-->
                                                <div>
                                                <?php
                                                $str = $topic_data->textarea;
                                                $str = str_replace("[quote]", "<div class='bb-quote'>", $str);
                                                $str = str_replace("[/quote]", "</div>", $str);
                                                $str = str_replace("[quotename]", "<div class='forum_post_quote_ref widthall'>", $str);
                                                $str = str_replace("[/quotename]", "</div>", $str);
                                                $str = str_replace("[quotedesc]", "<div class='forum_post_quote widthall'>", $str);
                                                $str = str_replace("[/quotedesc]", "</div>", $str);
                                                echo html_entity_decode($str);
                                                ?>
                                                </div>
                                            </div>
                                            <?php
                                            $signiture = $new_profile->getUserData($topic_data->author_id)->signature;
                                            if (!is_null($signiture)) {
                                                $linkClickable = new mymarket();
                                                ?>
                                                <div class="float_left width445 height_16">&nbsp;</div>
                                                <div class="float_left width445 forum_post_line height_1">&nbsp;</div>
                                                <div class="float_left width445 height_10">&nbsp;</div>
                                                <div class="forum_post_tag float_left width445">
                                                    <?php echo $linkClickable->make_links_clickable(html_entity_decode($signiture), '_blank'); ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="blank_40h float_left">&nbsp;</div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div id="dummy2">                        
                        <div id="borst_forum_reply1" class="float_left widthall height_auto">
                            <div id="forum_comment_list_div" class="float_left widthall"><!-- This div for ajax call to replace record -->
                                <!-- Forum reply start-->
                                <?php
                                $i1 = 0;
                                $j1 = 1;
                                foreach ($pager->getResults() as $data):
                                    ?>
                                    <div class="forum_comment_wrapper">
                                        <div class="forum_comment_top_wraper float_left <?php
                                if ($j1 % 2 == 0) {
                                    echo "forum_comment_top_even";
                                } else {
                                    echo "forum_comment_top_odd";
                                }
                                    ?>">
                                            <div class="forum_comment_top_left float_left"><?php echo date('Y-m-d', strtotime($data->datum)); ?></div>
                                            <div class="forum_comment_top_left"></div>
                                            <div class="forum_comment_top_right float_right"><a href="<?php echo "http://" . $host_str ?>/borst/contactUs/postid/<?php echo $data->id ?>" class="cursor">Rapportera</a></div>
                                            <div class="forum_comment_top_right float_right pad_rgt_13 cursor" onclick="javascript:getFormForreplay(<?php echo $data->id ?>, '<?php echo $new_profile->getFullUserName($data->author_id) ?>');">Citera</div>
                                        </div>
                                        <div class="blank_24h float_left widthall">&nbsp;</div>
                                        <div class="comment_content_wrapper float_left widthall">
                                            <div class="width_120 float_left comment_content_img_wrapper">
                                                <?php if ($user_arr[$data->skapare] != ''): ?>
                                                    <a class="" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->author_id ?>"><img src="/uploads/userThumbnail/<?php echo str_replace('.', '_large.', $user_arr[$data->skapare]); ?>" alt="user_photo"/></a>
                                                <?php else: ?>
                                                    <a class="" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->author_id ?>"><img src="/images/new_home/blog_user_img.png" alt="photo" width="110"/></a>
                                                <?php endif; ?>
                                                <div class="forum_comment_user_name widthall float_left">
                                                    <?php if ($data->author_id != 0) : ?><a class="" href="<?php echo "http://" . $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->author_id ?>"><?php echo ucwords($new_profile->getFullUserName($data->author_id)); ?></a><?php
                                            else: echo $data->skapare;
                                            endif;
                                                    ?>
                                                </div>
                                                <?php $data_arr = $new_profile->fetchRegdateAndTotalLoginById($data->author_id); ?>
                                                <div class="forum_comment_detail float_left">
                                                    <div class="widthall float_left"></div>
                                                    <div class="widthall float_left">Aktiv: <?php echo $data_arr ? date("M Y", strtotime($data_arr[0]['regdate'])) : ''; ?></div>
                                                    <div class="widthall float_left"><?php echo $data_arr ? $data_arr[0]['inlog'] : ''; ?> inlägg</div>
                                                    <div class="widthall float_left"><?php if ($sf_user->getAttribute('user_id', '', 'userProperty') == $data->author_id): ?><span class="upcase">Online</span><?php endif; ?></div>
                                                    <div class="widthall float_left"><?php if (($sf_user->getAttribute('firstname', '', 'userProperty') . ' ' . $sf_user->getAttribute('lastname', '', 'userProperty') == $data->skapare) || ($sf_user->getAttribute('isSuperAdmin', '', 'userProperty') == 1) && ($sf_user->isAuthenticated())): ?><a class="edit_forum_anchor" name="forum_comment" id="editpost<?php echo $data->id; ?>">Redigera</a><?php endif; ?></div>
                                                    <?php if ($sf_user->isAuthenticated() && $sf_user->isSuperAdmin() == 1): ?>
                                                        <div class="widthall float_left cursor"><a id="<?php echo $data->id; ?>" onclick="javascript:open_confirmation_delete_article_comment_forum('Vill du verkligen ta bort detta inlägg', this.id, 'delete_article_comment_confirm_box_forum', 'delete_article_comment_msg_forum')">Radera</a></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="float_left width_445 widthall">
                                                <div class="widthall forum_post_bread">
                                                    <?php
                                                    $str = $data->textarea;
                                                    $str = str_replace("[quote]", "<div class='bb-quote'>", $str);
                                                    $str = str_replace("[/quote]", "</div>", $str);
                                                    $str = str_replace("[quotename]", "<div class='forum_post_quote_ref widthall'>", $str);
                                                    $str = str_replace("[/quotename]", "</div>", $str);
                                                    $str = str_replace("[quotedesc]", "<div class='forum_post_quote widthall'>", $str);
                                                    $str = str_replace("[/quotedesc]", "</div>", $str);
                                                    echo html_entity_decode($str);
                                                    ?>
                                                </div>
                                                <?php
                                                $signiture = $new_profile->getUserData($data->author_id)->signature;
                                                if (!is_null($signiture)) {
                                                    $linkClickable = new mymarket();
                                                    ?>
                                                    <div class="float_left width445 height_16">&nbsp;</div>
                                                    <div class="float_left width445 forum_post_line height_1">&nbsp;</div>
                                                    <div class="float_left width445 height_10">&nbsp;</div>
                                                    <div class="forum_post_tag float_left width445">
                                                        <?php echo $linkClickable->make_links_clickable(html_entity_decode($signiture), '_blank'); ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="blank_40h float_left">&nbsp;</div>
                                    </div>

                                    <?php
                                    $j1++;
                                endforeach
                                ?>
                                <!-- Forum reply end-->

                                <div class="paginationwrapperNew float_left">
                                    <div class="forum_pag forum_comment_list_listing" id="">
                                        <?php if ($pager->haveToPaginate()): ?>
                                            <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                                                <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"></a><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
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
                                            <span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopupBottom(this);"></span>
                                            <div noclick="1" class="forum_popup_pagination_wrapper">
                                                <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                                                    <option noclick="1" value="0">Gå till sida...</option>
                                                    <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                                        <option noclick="1" class="color3c3a3a" value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                                    <?php } ?>
                                                </select>
                                                <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>

                            </div>

                            <div id="post_comment_on_forum_topic_div" class="float_left widthall display-none-comment">
                                <div class="float_left widthall mtop_10">
                                    <?php include_partial('global/share_link_bottom') ?>
                                </div>
                                <div class="float_left widthall mtop_2 redcolor" id="forum_post_text_error">&nbsp;</div>
                                <input id="koppling_id" type="hidden" name="koppling_id" value="<?php echo $parentid; ?>"/>
                                <input id="lastpage" type="hidden" name="lastpage" value="<?php echo $pager ? $pager->getLastPage() : 1; ?>"/>
                                <?php if ($sf_user->isAuthenticated()): ?>
                                    <?php //if( ($rec[0]['from_sbt'] == 1 && $rec[0]['sbt_active'] == 1) || ($isSuperAdmin == 1) ):    ?>

                                    <!-- image upload start -->
                                    <div class="float_left upload_forum_cmnt_img_text"><a class="cursor main_link_color" name="comment_image" onclick="upload('forum_comment');">Ladda upp bild</a></div>
                                    <div id="forum_comment_img_upload_msg"></div>
                                    <div class="spacer"></div>
                                    <!-- image upload end -->				

                                    <div class="float_left widthall forum_input_title"><?php echo __('Svara på inlägg:') ?>
                                    </div>
                                    <div class="blank_6h widthall">&nbsp;</div>
                                    <div id="borst_forum_reply" class="float_left widthall height_450 zindex">
                                        <form name="reply_to_forum_post" id="reply_to_forum_post" method="post" action="">
                                            <input id="postid" type="hidden" name="postid"/>
                                            <input id="is_forum_topic" type="hidden" name="is_forum_topic"/>
                                            <input id="parentid" type="hidden" name="parentid" value="<?php echo $parentid; ?>"/>
                                            <input id="delete_comment_by_id_forum" type="hidden" name="delete_comment_by_id_forum" value=""/>

                                            <?php echo $forumForm->renderHiddenFields() ?>
                                            <?php echo $forumForm['textarea']->renderError(); ?>
                                            <?php echo $forumForm['textarea']->render(array('class' => 'forum_input_bread', 'style' => 'border:0px;width: 425px; height: 238px;overflow:hidden;background:url("/images/tinyMCE_back.png") repeat scroll 0 0 transparent')); ?>
                                            <div id="post_forum_comment_div" class="float_left mtop_21 width_500">
                                                <input type="button" name="post_on_forum_topic" id="post_on_forum_topic" class="comment_forum_save submit margin_rgt_10" value=""/>	
                                                <input type="button" name="preview_data" id="preview_data" class="forum_show submit preview_forum_topic_btn" value="" onclick="show_forum_preview()"/>
                                            </div>
                                        </form>

                                    </div>
                                <?php else: ?>
                                    <div class="float_left widthall mtop_10 forum_login_reminder">
                                        <a href="<?php echo "http://" . $host_str ?>/user/loginWindow"><img height="50" class="login_sugg" src="/images/new_home/login_sugg.png"/>
                                            <br><?php echo __('Logga in för att svara på detta foruminlägg!') ?></a>
                                        <div class="blank_50h widthall">&nbsp;</div>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="floatLeft test_mrg_forum_topic">
            <span><img src="/images/new_home/testimonial_L.png" width="500"></span>
        </div>
</div>
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
    <?php include_partial('forum/forum_new_topic_preview', array('host_str' => $host_str, 'preview_information' => $preview_information, 'new_profile' => $new_profile)) ?>
</div>
<?php if ($pager->getPage() == $pager->getLastPage() || $pager->getLastPage() == 0) { ?>
    <script language="javascript" type="text/javascript">

        $('#post_comment_on_forum_topic_div').show()
    </script>
<?php } else {
    ?>
    <script language="javascript" type="text/javascript">
        $('#post_comment_on_forum_topic_div').hide()
    </script>
<?php } ?>

<?php if ($pager->getPage() == 1) { ?>
    <script language="javascript" type="text/javascript">
        //alert($('#flag').val());
        $('#forum_content #forum_topic_div .commentblock_orgwrapper').show()
    </script>
<?php } else {
    ?>
    <script language="javascript" type="text/javascript">
        $('#forum_content #forum_topic_div .commentblock_orgwrapper').hide();
    </script>
<?php } ?>
<!-- ui-dialog-delete-article -->
<div id="delete_article_comment_confirm_box_forum" title="Delete Forum Post Confirmation">
    <table width="100%"  border="0" cellspacing="3" cellpadding="0">
        <tr>
            <td id="delete_article_comment_msg_forum">Message:</td>
        </tr>
    </table>
</div>
<!--<script>edit_comment_article();</script>-->
<div id="pop-box-over" class="display-none"></div>