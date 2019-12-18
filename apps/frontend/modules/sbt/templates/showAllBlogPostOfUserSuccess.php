<script type="text/javascript" language="javascript">

    function paginationPopupPostGo(obj){
        var page = $(obj).prev().val();
        var user_id = $('#blog_user_id').val();
        $('#blog_detail_div').find("div.blog_classnot").each(function(index){
            $(this).addClass('withOpacity');
        });
		
        var pagination_numbers = $('#user_all_blog_post_list_listing').html();
        $('#user_all_blog_post_list_listing').html(pagination_numbers+'<span class="" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
		
        $.ajax({
            url:'/sbt/showAllBlogPostOfUser?user_id='+user_id+'&page='+page,
            success:function(data)
            {
                $("#blog_detail_div").html(data);
            }
        });
    }
    
    function paginationPopupGo(obj){
        //var blog_id_str = $('#blog_id').val();
        var blog_id = $('#blog_id').val();		
        var page = $(obj).prev().val();
        var user_id = $('#blog_user_id').val();
        var pagination_numbers = $('.user_all_blog_comment_pagination').html();
        $('.user_all_blog_comment_pagination').html('<span class="float_left">'+pagination_numbers+'</span>  <span class="float_right" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        
        $.ajax({
            url:'/sbt/fetchAndPostCommentOnBlog?user_id='+user_id+'&page='+page+'&blog_id='+blog_id,
            success:function(data)
            {
                $("#blog_comment_div"+blog_id).html(data);
            }
        });
    }
    
    function paginationPopup(obj){
        var offset = $(obj).position();
        $(obj).next().css("left",offset.left-68);
        var obj1 = $(".forum_drop-down-menu_page");
        if($(obj1).val()==0){
            $(obj1).removeClass("color3c3a3a");
            $(obj1).addClass("colorb9c2cf");
        }else{
            $(obj1).removeClass("colorb9c2cf");
            $(obj1).addClass("color3c3a3a");
        }
        $(obj).next().toggle();
    }
    
    function paginationPopupSelect(obj){
        if($(obj).val()==0){
            $(obj).removeClass("color3c3a3a");
            $(obj).addClass("colorb9c2cf");
        }else{
            $(obj).removeClass("colorb9c2cf");
            $(obj).addClass("color3c3a3a");
        }
    }
</script>
<style>
    .user_all_blog_comment_pagination{float:left; text-align: left;}
</style>
<div class="float_left widthall"><input type="hidden" name="blog_user_id" id="blog_user_id" value="<?php echo $user_id ?>"/></div>

<?php if ($all_blog_post_pager->getNbResults() > 0): ?>
    <?php foreach ($all_blog_post_pager->getResults() as $one_blog): ?>
        <div class="blog_classnot">
            <?php //if($one_blog):?>
            <div class="blog1advrt" id="blogsection_<?php echo $one_blog->id; ?>">
                <div class="float_right viocolor">
                    <?php
                    if ($one_blog->updated_at == null)
                        echo "<span class='blog_main_date'>" . $one_blog->created_at . "</span>"; else
                        echo "<span class='blog_main_date'>" . $one_blog->updated_at . "</span>"
                        ?>
                </div>

                <div class="float_left widthall">
                    <input type="hidden" name="current_user" id="current_user" value="<?php echo $logged_user ?>"/>
                    <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $one_blog->id ?>"/>
                </div>
                <!--<h2>-->
                <span class="blogdetail_title blog_first_header_list">
                    <a class="simplelink cursor" href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/sbt/sbtBlogDetails/blog_id/' . $one_blog->id ?>">
                        <?php echo $one_blog->ublog_title; ?></a>
                </span>
                <!--</h2>-->
                <?php
                $regex = "/<\/?\w+((\s+(\w|\w[\w-]*\w)(\s*=\s*(?:\".*?\"|'.*?'|[^'\">\s]+))?)+\s*|\s*)\/?>/i";
                $str_without_tags = trim(preg_replace($regex, "", html_entity_decode($one_blog->ublog_description)));
                $blogdetails = SbtUserBlog::filterMyString(html_entity_decode($one_blog->ublog_description));
                $word_arr = str_word_count($str_without_tags, 1); // all words from string with no tags
                if (count($word_arr) > 70) { // if words are more than 50, needs to cut the blog
                    $strpos1 = strpos($blogdetails, $word_arr[69]);
                    $str = substr($blogdetails, 0, strpos($blogdetails, $word_arr[69]));
                    $str_no_tag = preg_replace($regex, "", $str); // matching string with no tags
                    if (str_word_count($str_no_tag) < 40) {
                        $strpos1 = strpos($blogdetails, $word_arr[48]);
                        $str = substr($blogdetails, 0, strpos($blogdetails, $word_arr[48]));
                        $str_no_tag = preg_replace($regex, "", $str);
                    }
                    if (str_word_count($str_no_tag) < 40) {
                        $strpos1 = strpos($blogdetails, $word_arr[47]);
                        $str = substr($blogdetails, 0, strpos($blogdetails, $word_arr[47]));
                        $str_no_tag = preg_replace($regex, "", $str);
                    }
                    $shortDesc = substr($blogdetails, 0, $strpos1) . "</b>";
                } else {
                    $shortDesc = $blogdetails;
                }
                $shortDesc = sbtUserBlog::closeTags($shortDesc);
                ?>

                <?php $pager = $sbtBlogComment->fetchPerticularBlogCommentsPager($one_blog->id); ?>

                <div class="bloginfo mrg_btm_7" style="display: none;" id="descFull_<?php echo $one_blog->id ?>">
                    <span class="blogdetail_desc blog_body"><?php echo SbtUserBlog::filterMyString(html_entity_decode($one_blog->ublog_description)); ?></span><br />
                </div>
                <div class="bloginfo mrg_btm_7" id="descLimited_<?php echo $one_blog->id ?>"><span class="blogdetail_desc blog_body"><?php echo $shortDesc ?></span><br /></div>


                <div id="comment_count_div<?php echo $one_blog->id; ?>" class="float_left main_link_color" style="height:15px;">
                    <span class="blog_read_more">
                        <span class="float_left"><a name="<?php echo $one_blog->id; ?>" class="cursor">Kommentarer</a></span>

                        <span class="float_left" style="color:#9fb6c7; padding-left:4px;">
                            <a name="<?php echo $one_blog->id; ?>" class="cursor"><?php echo $pager->getNbResults(); ?></a>
                            <a name="<?php echo $one_blog->id; ?>" class="cursor"><img style="margin: 0px 10px 0px 2px" src="/images/blog_chaticon.png" alt="show_comment" width="20"/></a>
                        </span>

                        <span><a name="<?php echo $one_blog->id; ?>" class="cursor float_left">Läs mer</a></span>
                    </span>

                    <?php if ($userId == $one_blog->author_id || $isSuperAdmin == 1): ?>
                        <span class="float_left">
                            <span class="float_left width_14 ptop_4">
                                <a class="profile_bloglist_row" name="<?php echo 'row_' . $one_blog->id; ?>"><img src="/images/cross.png" alt="cross" width="15" height="15"/></a>
                            </span>
                            <span class="float_left width_18" style="margin-left: 10px;">
                                <a href="<?php echo 'https://' . $host_str . '/sbt/sbtEditBlog/blog_id/' . $one_blog->id; ?>" class="cursor"><img src="/images/edit_blog.png" alt="down" width="15"/></a>
                            </span>
                        </span>&nbsp;&nbsp;
                    <?php endif; ?>
                </div>
                <div class="blog_main_line">&nbsp;</div>
                <div class="blank_10h widthall">&nbsp;</div>
            </div>

            <div id="blog_vote_div_id<?php echo $one_blog->id; ?>" class="float_left widthall" style="visibility:hidden; display:none;">
                <div id="user_all_blog_vote_div<?php echo $one_blog->id; ?>" class="float_left widthall">
                    <?php $rec_present = $vote_details->findVoteDetails($one_blog->id, $logged_user); ?>
                    <?php $no_of_stars = $vote_details->getStarForBlog($one_blog->id); ?>

                    <?php if ($rec_present == 0): ?>
                        <span class="float_left" style="border:0px solid blue;">
                            <a class="float_left" style="cursor:pointer;" onClick="show_vote_meter_on_all_blog_page('<?php echo $valid_user; ?>','<?php echo $one_blog->id; ?>')">
                                <img src="/images/vote_symb.png" alt="icon"  class="float_left margin_top_8"  width="30"/> <span class="float_left mrg_top_10 mrg_lft_8 blog_vote">Rösta</span>
                            </a>
                        </span>
                        <span class="blog_comment_slash">/</span>
                        <span class="float_left" style="border:0px solid green; margin-top:6px; margin-left:5px;">
                            <?php for ($i = 1; $i <= $no_of_stars; $i++): ?>
                                <img class="float_left" style="margin: 4px 0px 0px 5px;" alt="star" src="/images/ratingstar_org.png" />
                            <?php endfor; ?>
                        </span>
                        <span class="float_left blog_poll mrg_top_10 mrg_lft_8">Röster: <?php echo $one_blog->ublog_votes; ?></span>
                        <span class="blog_comment_slash">/</span>
                    <?php else: ?>
                        <span class="float_left">
                            <?php for ($i = 1; $i <= $no_of_stars; $i++): ?>
                                <img class="float_left" style="margin: 4px 0px 0px 5px;" alt="star" src="/images/ratingstar_org.png" />
                            <?php endfor; ?>
                        </span>
                        <span class="float_left" style="color:#547184; margin-left:5px; margin-top: 7px;">Röster: <?php echo $one_blog->ublog_votes; ?></span>
                    <?php endif; ?>
                    <span class="float_left cursor hide_blog_div mrg_top_10"><a class="cursor" name="<?php echo $one_blog->id; ?>">Minimera</a></span>
                    <span class="blog_comment_slash">/</span>
                    <span class="float_left width_14 ptop_4 pad_lft_10 mrg_top_5">
                        <a class="profile_bloglist_row" name="<?php echo 'row_' . $one_blog->id; ?>"><img src="/images/cross.png" alt="cross" width="15" height="15"/></a>
                    </span>
                    <span class="float_left width_18 mrg_top_5" style="margin-left: 10px;">
                        <a href="<?php echo 'https://' . $host_str . '/sbt/sbtEditBlog/blog_id/' . $one_blog->id; ?>" class="cursor"><img src="/images/edit_blog.png" alt="down" width="15"/></a>
                    </span>
                </div>
                <div id="blog_vote_option_id<?php echo $one_blog->id; ?>" class="float_left widthall" style="padding-top:10px; visibility:hidden; display:none;">
                    <?php include_partial('vote_blog_panel', array('blog_id' => $one_blog->id)) ?>
                    <div class="float_left" style="margin-left:10px; color:#FF0000;" id="blog_vote_error<?php echo $one_blog->id; ?>"></div>
                </div>
            </div>


<div class="commentwrapper" id="blog_comment_section<?php echo $one_blog->id; ?>" style="visibility:hidden; display:none;">

                <div class="float_left widthall" id="blog_comment_div<?php echo $one_blog->id; ?>">
                    <div class="commentheading blog_comment_count mrg_top_20"><font size="+2"><?php echo $pager->getNbResults(); ?></font> kommentarer, läs nedan eller <a id="comment_on" rel="nofollow" style="cursor:pointer" href="#comment_on_blog">lägg till en egen</a></div>
                    <?php foreach ($pager->getResults() as $data): ?>
                        <div class="comment_messagewrapper">
                            <div class="float_left comment_user_img"><a href="https://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->comment_by ?>">
                                    <?php if ($user_photo_arr[$data->comment_by] != ''): ?>
                                        <img src="/uploads/userThumbnail/<?php echo str_replace('.', '_small.', $user_photo_arr[$data->comment_by]); ?>" alt="user_photo" width="72" height="72"/>
                                    <?php else: ?>
                                        <img alt="photo" src="/images/new_home/blog_user_img.png" width="72" height="72">
                                    <?php endif; ?>
                                </a></div>
                            <div class="info">
                                <div class="float_left widthall"><b class="borst_subtitle_4 blog_username"><a class="borst_subtitle_4" href="https://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->comment_by ?>"><?php echo $profile->getFullUserName($data->comment_by) ?></a></b> <span class="float_right blog_main_date"><?php echo substr($data->created_at, 0, 10); ?></span></div>
                                <span class="blog_comments"><?php echo $data->blog_comment ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!--<div class="paginationwrapper">
                        <div class="user_all_blog_comment_pagination" id="blog_comment_list<?php echo $one_blog->id; ?>" style="padding-right:25px;">
                            <?php //include_partial('pager_partial', array('pager' => $pager)) ?>                                        
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
                                <?php endif ?>
                                <span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
                                <span noclick="1" class="blog_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                                <div class="blog_popup_pagination_wrapper" noclick="1" >
                                    <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                                        <option noclick="1" value="0" style="color:#b9c2cf" >Gå till sida...</option>
                                        <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                            <option noclick="1" class="color3c3a3a" value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                        <?php } ?>
                                    </select>
                                    <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                                </div>

                        </div>
                    </div>-->
                </div>  
                <div id="blog_text_error<?php echo $one_blog->id; ?>" class="float_left" style="padding:15px 0 0 30px; color:#FF0000; width:70%;"></div>
                <div id="comment_on_blog<?php echo $one_blog->id; ?>" class="Commentformwrapper blog_comment_main">
                    <div class="blog_input_title">Kommentera:</div>
                    <form name="blog_comment_form" id="blog_comment_form<?php echo $one_blog->id; ?>" method="post" action="">
                        <input type="hidden" name="blog_user_id" id="blog_user_id" value="<?php echo $user_id ?>"/>
                        <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $one_blog->id; ?>"/>
                        <?php echo $blogCommentForm->renderHiddenFields() ?>
                        <div id="comment_blog_validation<?php echo $one_blog->id; ?>" class="float_left widthall" style="color:#FF0000; margin-top:7px; display:none; visibility:hidden;">Required</div>
                        <div class="float_left widthall"> <?php echo $blogCommentForm['blog_comment']->render(array('class' => 'commenttextarea blogCommentTextArea', 'id' => 'sbt_blog_comment_blog_comment' . $one_blog->id)) ?> </div>
                        <div class="float_left widthall">
                            <input name="blog_followup<?php echo $one_blog->id; ?>" id="blog_followup<?php echo $one_blog->id; ?>" type="checkbox" value="" onClick="all_user_blog_is_blog_followup('<?php echo $one_blog->id; ?>')" />
                            Notify me of followup comments via e-mail </div>
                        <div class="blank_10h widthall">&nbsp;</div>
                        <div class="float_left widthall" id="post_blog_comment_div<?php echo $one_blog->id; ?>">
                            <div class="registerbtn">
                                <div class="registerbutton float_left">
                                    <input type="button" name="<?php echo $one_blog->id; ?>" id="post_blog_comment<?php echo $one_blog->id; ?>" value="" class="send_blog" onClick="user_all_blog_comment_validation_check('<?php echo $one_blog->id; ?>')">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="blank_10h widthall">&nbsp;</div>
                <div class="blog_main_line">&nbsp;</div>
                <div class="blank_10h widthall">&nbsp;</div>  
            </div>
            <?php //endif;   ?>




        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="no_result"><?php echo __('No Results') ?></div>
<?php endif; ?>

<?php /* <div class="paginationwrapper">
  <div class="pagination" id="user_all_blog_post_list_listing" style="padding-right:25px; padding-bottom:20px;">
  <?php if ($all_blog_post_pager->haveToPaginate()): ?>
  <a id="<?php echo $all_blog_post_pager->getFirstPage(); ?>" style="cursor:pointer;"><img src="/images/left_arrow_trans.png" alt="arrow" /> </a> <a id="<?php echo $all_blog_post_pager->getPreviousPage(); ?>" style="cursor:pointer;"> < </a>
  <?php $links = $all_blog_post_pager->getLinks(11);
  foreach ($links as $page):
  ?>
  <?php if ($page == $all_blog_post_pager->getPage()): ?>
  <?php echo '<span class="selected">' . $page . '</span>' ?>
  <?php else: ?>
  <a id="<?php echo $page; ?>" style="cursor:pointer;"><?php echo $page; ?> </a>
  <?php endif; ?>
  <?php if ($page != $all_blog_post_pager->getCurrentMaxLink()): ?>
  -
  <?php endif ?>
  <?php endforeach ?>
  <a id="<?php echo $all_blog_post_pager->getNextPage(); ?>" style="cursor:pointer;"> > </a> <a id="<?php echo $all_blog_post_pager->getLastPage(); ?>" style="cursor:pointer;"> <img src="/images/right_arrow_trans.png" alt="arrow" /> </a>
  <?php endif ?>
  </div>
  </div> */ ?>


<div class="paginationwrapper">
    <div class="pagination_blog" id="user_all_blog_post_list_listing" style="padding-right:25px;">
        <?php //include_partial('pager_partial', array('pager' => $all_blog_post_pager)) ?>                                        
        <?php if ($all_blog_post_pager->haveToPaginate()): ?>
            <a id="<?php echo $all_blog_post_pager->getFirstPage(); ?>" class="cursor"><span class="blog_pagination_first_img"></span><span class="blog_pagination_prev" >Första</span> <a id="<?php echo $all_blog_post_pager->getPreviousPage(); ?>" class="cursor"> <span class="blog_pagination_prev_img"></span><span class="blog_pagination_prev margin_rgt_7">Föreg</span></a>
                <?php
                $links = $all_blog_post_pager->getLinks(11);
                foreach ($links as $page):
                    ?>
                    <?php if ($page == $all_blog_post_pager->getPage()): ?>
                        <?php echo '<span class="selected">' . $page . '</span>' ?>
                    <?php else: ?>
                        <a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
                    <?php endif; ?>
                    <?php if ($page != $all_blog_post_pager->getCurrentMaxLink()): ?>
                        -
                    <?php endif ?>
                <?php endforeach ?>
                <a id="<?php echo $all_blog_post_pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 blog_pagination_next">Nästa</span><span class="blog_pagination_next_img"></span></a> <a id="<?php echo $all_blog_post_pager->getLastPage(); ?>" class="cursor"><span class="blog_pagination_next" >Sista</span><span class="blog_pagination_last_img"></span></a>

                <span>Sid <?php echo $all_blog_post_pager->getPage(); ?> av <?php echo $all_blog_post_pager->getLastPage(); ?></span>
                <span noclick="1" class="blog_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
                <div class="blog_popup_pagination_wrapper" noclick="1" >
                    <select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
                        <option noclick="1" value="0" style="color:#b9c2cf" >Gå till sida...</option>
                        <?php for ($pg = 1; $pg <= $all_blog_post_pager->getLastPage(); $pg++) { ?>
                            <option noclick="1" class="color3c3a3a" <?php if ($all_blog_post_pager->getPage() == $pg) {
                        echo "selected='selected'";
                    } ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
    <?php } ?>
                    </select>
                    <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupPostGo(this);">GA</div>
                </div>
<?php endif ?>
    </div>
</div>

<script type="text/javascript">
    setEmbedObject();
</script>