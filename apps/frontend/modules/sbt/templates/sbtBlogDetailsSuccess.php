<style type="text/css">
    .listing table {width:30%;}
    .fav_put_ht_wdth{width:90px;}
    .sponseror{
        margin-left: 0px;
    }
    .home_adline_r_div{
        margin-left: 0px;
    }
</style>
<script>
    $(window).load(function(){
        
        $(window).click(function(e) {
            if($(e.target).attr("noclick") == "1"){
            }else{
                $(".blog_popup_pagination_wrapper").hide();
                $(".blog_drop-down-menus").hide();
            }
        });
    });
    function paginationPopupGo(obj){  
        var page = $(obj).prev().val();
        var blog_id = $('#blog_id').val();
        var comment_by = $('#current_user').val();		
        var pagination_html = $('#blog_comment_list_listing').html();
        //$('#blog_comment_list_listing').html(pagination_html+'<span class="" style="padding-right:5px;"><img src="/images/indicator.gif" /></span>');
        $('#blog_comment_list_listing').html(pagination_html+'');
        $('#pop-box-over').show();
        $('.indicator').css('display','block');	
        $.ajax({
            url:'/sbt/postCommentOnBlog?blog_id='+blog_id+'&comment_by='+comment_by+'&page='+page,
            success:function(data)
            {
                $("#show_blog_comment_div").html(data);
                $('.indicator').hide();
                $('#pop-box-over').hide();
            }
        });
    }

    function paginationPopup(obj){
        var offset = $(obj).position();
        $(obj).next().css("left",offset.left-68);
        var obj1 = $(".forum_drop-down-menu_page");
        if($(obj1).val()==0){
            $(obj1).removeClass("color232222");
            $(obj1).addClass("colorb9c2cf");
        }else{
            $(obj1).removeClass("colorb9c2cf");
            $(obj1).addClass("color232222");
        }
        $(obj).next().toggle();
    }

    function paginationPopupSelect(obj){
        if($(obj).val()==0){
            $(obj).removeClass("color232222");
            $(obj).addClass("colorb9c2cf");
        }else{
            $(obj).removeClass("colorb9c2cf");
            $(obj).addClass("color232222");
        }
    }
    $(document).ready(function(){
       $('#comment_on').click(function(){
          $('.blog_comment_login_error').css('display','block');
       });
    });
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<input type="hidden" id="userLogin" value="<?php echo $sf_user->isAuthenticated(); ?>" />
<span class="float_left indicator loader loader_posiotion" style="text-align:center; width:100%;left:14%;"><img src="/images/ajax-loader_blog.gif" /></span>
<div class="maincontentpage" id="minsid">
    <?php if ($blog_profile_details && $blog_profile_details->blog_page_background_color != ''): ?>
        <div class="mainconetentinner" style=" background-color:<?php //echo $blog_profile_details->blog_page_background_color;  ?>">
        <?php else: ?>
            <div class="mainconetentinner">
            <?php endif; ?>
            <div class="blogright2_divpart">
                <div class="width_584px float_left">

                    <div class="float_left widthall">
                        <?php include_partial('blog_header_profile', array('blog_profile_details' => $blog_profile_details, 'own_blog' => $own_blog, 'user_id' => $logged_user, 'host_str' => $host_str, 'one_blog' => $one_blog, 'valid_user' => $valid_user, 'add_in_fav_list' => $add_in_fav_list, 'from_blogdetail' => '1')) ?>
                    </div>
                    <div class="curverect_topbg"></div>
                    <div class="curverect_midbg">
                        <div id="blog_detail_div" class="bloginner_rect float_left listing">
                            <?php if ($one_blog): ?>
                                <div class="blog1advrt width_100per">

                                    <?php /* if($valid_user == 1):?>
                                      <?php if($add_in_fav_list == 0):?>
                                      <div id="f_blog" class="blog_add_fav_div">
                                      <a class="add_to_favorite" id="<?php echo 'blog_'.$one_blog->id.'_'.$user_id;?>" name="<?php echo $one_blog->ublog_title; ?>">GÖR TILL FAVORIT</a>
                                      </div>
                                      <?php else:?>
                                      <div class="blog_add_fav_div"><span class="float_left added_to_favorite"><?php echo __('LAGD I FAVORITER')?></span></div>
                                      <?php endif; ?>
                                      <?php endif; */ ?>

    <!--<div class="blog_home_page"><a class="cursor main_link_color" href="<?php echo 'http://' . $host_str . '/sbt/showListOfUserBlog/uid/' . $one_blog->author_id ?>" name="<?php echo $one_blog->author_id; ?>"><?php echo __('Bloggens Startsida') ?></a></div>-->

                                    <div class="blog_date viocolor">
                                        <?php  /*if($userId==$one_blog->author_id || $isSuperAdmin==1): ?><span style="vertical-align: bottom;"><a href="<?php echo 'http://'.$host_str.'/sbt/sbtEditBlog/blog_id/'.$one_blog->id;?>" class="cursor"><img src="/images/edit.png" alt="down" /></a></span>&nbsp;&nbsp;<?php endif;?>
                                          <?php if($one_blog->updated_at==null) echo "<span>Created At : ".$one_blog->created_at."</span>"; else echo "<span>Updated At : ".$one_blog->updated_at."</span>" */ ?>
                                    </div>
                                    <div class="float_left widthall">
                                        <input type="hidden" name="current_user" id="current_user" value="<?php echo $logged_user ?>"/>
                                        <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $blog_id ?>"/>
                                    </div>
                                    <div class="blog_first_header float_left"><?php echo $one_blog->ublog_title; ?></div>
                                    <div class="bloginfo">
                                        <!--<span class="blogdetail_desc"><?php //echo SbtUserBlog::filterMyString(html_entity_decode($one_blog->ublog_description));  ?></span>-->
                                        <div class="blog_body"><?php echo SbtUserBlog::filterMyString(html_entity_decode($one_blog->ublog_description)); ?></div>
                                    </div>
                                    <div class="blank_10h widthall">&nbsp;</div>

                                    <div class="blank_22h widthall">&nbsp;</div>
                                    <div id="vote_div" class="float_left widthall">
                                        <?php if ($rec_present == 0): ?>
                                            <span class="float_left" style="border:0px solid blue;">
                                                <a class="float_left" style="cursor:pointer;" onclick="show_vote_meter_on_blog('<?php echo $valid_user; ?>')">
                                                        <img src="/images/vote_symb.png" alt="icon"  width="30" class="float_left mrg_top_5"  />
                                                    <span class="float_left mrg_lft_8 mrg_top_8 blog_vote">Rösta</span>
                                                </a>
                                            </span>
                                            <span class="float_left" style="border:0px solid green; margin-top:9px; margin-left:5px;">
                                                <?php for ($i = 1; $i <= $no_of_stars; $i++): ?>
                                                    <img class="float_left" alt="star" src="/images/ratingstar_org.png" />
                                                <?php endfor; ?>
                                            </span>
                                            <span class="float_left blog_comment_slash">/</span>
                                            <span class="float_left blog_poll mrg_top_8 mrg_lft_8">Röster: <?php echo $total_vote_cnt ?></span>

                                        <?php else: ?>
                                            <span class="float_left">
                                                <?php for ($i = 1; $i <= $no_of_stars; $i++): ?>
                                                    <img class="float_left" alt="star" src="/images/ratingstar_org.png" />
                                                <?php endfor; ?>
                                            </span>
                                            <span class="float_left blog_poll margin_top_10" style="color:#547184;">Röster: <?php echo $total_vote_cnt ?></span>
                                        <?php endif; ?>
                                        <?php if ($userId == $one_blog->author_id || $isSuperAdmin == 1): ?>
                                            <span class="float_left blog_comment_slash">/</span>
                                            <div class="blog_detail_edit">
                                                <span class="float_left width_14 f_top"><a name="row_<?php echo $one_blog->id; ?>" class="profile_bloglist_row remove_blog"><img width="15" height="15" alt="cross" src="/images/cross.png"></a></span>
                                                <span style="vertical-align: bottom;margin-left: 10px;"><a href="<?php echo 'http://' . $host_str . '/sbt/sbtEditBlog/blog_id/' . $one_blog->id; ?>" class="cursor"><img src="/images/edit_blog.png" alt="down" width="15"/></a></span>&nbsp;&nbsp;
                                            </div>
                                            <?php endif; ?>
                                    </div>
                                    <div class="blog_main_line height_2px">&nbsp;</div>

                                    <div id="blog_vote_option" class="float_left widthall" style="padding-top:10px; visibility:hidden; display:none;">
                                        <form name="vote_blog_form" id="vote_blog_form" method="post" action="">
                                            <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $one_blog->id; ?>"/>
                                            <div class="vote_panel">
                                                <div class="float_left vote_panel_outer">

                                                    <div class="float_left vote_panel_header_row"><?php echo __('Rösta') ?></div>

                                                    <div class="float_left vote_panel_option_row">
                                                        <div class="float_left" style="width:85px; padding:2px 1px 1px 5px;">
                                                            <?php for ($i = 0; $i <= 4; $i++): ?>
                                                                <img alt="star" src="/images/ratingstar_org.png" />
                                                            <?php endfor; ?>
                                                        </div>
                                                        <div class="float_left" style="border:0px solid blue;padding:2px 1px 1px 2px;">
                                                            <input type="radio" class="radio" name="vote_type" id="vote_type" value="2" /></div>
                                                        <div class="float_left" style="padding:2px 1px 1px 2px;font-weight:bold; color:#000000;">
                                                            <?php echo __('Toppen') ?>
                                                        </div>
                                                    </div>

                                                    <div class="float_left vote_panel_option_row">
                                                        <div class="float_left" style="width:85px; padding:2px 1px 1px 5px;">
                                                            <?php for ($i = 0; $i < 4; $i++): ?>
                                                                <img alt="star" src="/images/ratingstar_org.png" />
                                                            <?php endfor; ?>
                                                            <?php for ($i = 0; $i < 1; $i++): ?>
                                                                <img alt="star" src="/images/ratingstar_gray.png" />
                                                            <?php endfor; ?>
                                                        </div>
                                                        <div class="float_left" style="border:0px solid blue;padding:2px 1px 1px 2px;">
                                                            <input type="radio" class="radio" name="vote_type" id="vote_type" value="2" /></div>
                                                        <div class="float_left" style="padding:2px 1px 1px 2px;font-weight:bold; color:#000000;">
                                                            <?php echo __('Bra') ?>
                                                        </div>
                                                    </div>

                                                    <div class="float_left vote_panel_option_row">
                                                        <div class="float_left" style="width:85px; padding:2px 1px 1px 5px;">
                                                            <?php for ($i = 0; $i < 3; $i++): ?>
                                                                <img alt="star" src="/images/ratingstar_org.png" />
                                                            <?php endfor; ?>
                                                            <?php for ($i = 0; $i < 2; $i++): ?>
                                                                <img alt="star" src="/images/ratingstar_gray.png" />
                                                            <?php endfor; ?>
                                                        </div>
                                                        <div class="float_left" style="border:0px solid blue;padding:2px 1px 1px 2px;">
                                                            <input type="radio" class="radio" name="vote_type" id="vote_type" value="2" /></div>
                                                        <div class="float_left" style="padding:2px 1px 1px 2px;font-weight:bold; color:#000000;">
                                                            <?php echo __('Okej') ?>
                                                        </div>
                                                    </div>

                                                    <div class="float_left vote_panel_option_row">
                                                        <div class="float_left" style="width:85px; padding:2px 1px 1px 5px;">
                                                            <?php for ($i = 0; $i < 2; $i++): ?>
                                                                <img alt="star" src="/images/ratingstar_org.png" />
                                                            <?php endfor; ?>
                                                            <?php for ($i = 0; $i < 3; $i++): ?>
                                                                <img alt="star" src="/images/ratingstar_gray.png" />
                                                            <?php endfor; ?>
                                                        </div>
                                                        <div class="float_left" style="border:0px solid blue;padding:2px 1px 1px 2px;">
                                                            <input type="radio" class="radio" name="vote_type" id="vote_type" value="2" /></div>
                                                        <div class="float_left" style="padding:2px 1px 1px 2px; font-weight:bold;color:#000000;">
                                                            <?php echo __('Nja...') ?>
                                                        </div>
                                                    </div>

                                                    <div class="float_left vote_panel_option_row">
                                                        <div class="float_left" style="width:85px; padding:2px 1px 1px 5px;">
                                                            <?php for ($i = 0; $i < 1; $i++): ?>
                                                                <img alt="star" src="/images/ratingstar_org.png" />
                                                            <?php endfor; ?>
                                                            <?php for ($i = 0; $i < 4; $i++): ?>
                                                                <img alt="star" src="/images/ratingstar_gray.png" />
                                                            <?php endfor; ?>
                                                        </div>
                                                        <div class="float_left" style="border:0px solid blue;padding:2px 1px 1px 2px;">
                                                            <input type="radio" class="radio" name="vote_type" id="vote_type" value="2" /></div>
                                                        <div class="float_left" style="padding:2px 1px 1px 2px;font-weight:bold; color:#000000;">
                                                            <?php echo __('Dålig') ?>
                                                        </div>
                                                    </div>

                                                    <div class="float_left vote_panel_option_row" style="border-bottom:1px solid #CED2D0;">
                                                        <div class="float_left" style="width:85px; padding:2px 1px 1px 5px;">
                                                            <?php for ($i = 0; $i < 5; $i++): ?>
                                                                <img alt="star" src="/images/ratingstar_gray.png" />
                                                            <?php endfor; ?>
                                                        </div>
                                                        <div class="float_left" style="border:0px solid blue;padding:2px 1px 1px 2px;">
                                                            <input type="radio" class="radio" name="vote_type" id="vote_type" value="2" /></div>
                                                        <div class="float_left" style="padding:2px 1px 1px 2px; font-weight:bold; color:#000000;">
                                                            <?php echo __('Urusel') ?>
                                                        </div>
                                                    </div>

                                                    <div class="float_left" style="padding-top:5px; padding-left:5px;">
                                                        <div class="submit_votebutton"><input type="button" name="post_data" id="post_data" class="submit_votebuttontext submit" value="<?php echo __('Rösta  nu') ?>" onclick="submit_vote_for_blog()"/></div>
                                                    </div>


                                                </div>
                                            </div>


                                        </form>
                                        <div class="float_left" style="margin-left:10px; color:#FF0000;" id="vote_error"></div>
                                    </div>

                                    <div class="blank_33h widthall float_left">&nbsp;</div>
                                    <!--<div class="grayline">&nbsp;</div>
                                    <div class="blank_10h widthall">&nbsp;</div>-->
                                </div>

                                <div class="commentwrapper">

                                    <div class="float_left widthall" id="show_blog_comment_div">
                                    <!--<div class="commentheading"><font size="+2" color="#c50063"><?php //echo $pager->getNbResults();  ?></font> kommentarer, läs nedan eller <span class="main_link_color"><a id="comment_on" class="main_link_color" rel="nofollow" style="cursor:pointer" href="#comment_on_blog">lägg till en egen</a></span></div>-->
                                        <div class="blog_comment_count"><?php echo $pager->getNbResults(); ?> kommentarer, läs nedan eller <a id="comment_on" rel="nofollow" style="cursor:pointer" href="#comment_on_blog">lägg till en egen</a></div>
                                        <?php if(empty($logged_user)): ; ?>
                                            <div class="blog_comment_login_error">Vänligen logga in för att kommentera detta blogginlägg!</div>
                                        <?php endif;?>
                                        <?php foreach ($pager->getResults() as $data): ?>
                                            <div class="comment_messagewrapper width_100per">
                                                <div class="float_left comment_user_img"><a href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->comment_by ?>">
                                                        <?php if ($user_photo_arr[$data->comment_by] != ''): ?>
                                                            <img width="72" height="72" src="/uploads/userThumbnail/<?php echo str_replace('.', '_large.', $user_photo_arr[$data->comment_by]); ?>" alt="user_photo"/>
                                                        <?php else: ?>
                                                            <img alt="photo" src="/images/new_home/blog_user_img.png" width="72" height="72">
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <div class="float_left widthall">
                                                        <div class="blog_username float_left"><a class="borst_subtitle_4" href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->comment_by ?>"><?php echo $profile->getFullUserName($data->comment_by) ?></a></div>
                                                        <div class="blog_main_date fontItalic float_right"><?php echo $data->created_at ?></div>
                                  <!--<b class="borst_subtitle_4"><a class="borst_subtitle_4" href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->comment_by ?>"><?php echo $profile->getFullUserName($data->comment_by) ?></a></b> 
                                  <b class="lightbluefont"><?php echo $data->created_at ?></b>-->
                                                    </div>
                                                    <span class="blog_comments width_100per"><?php echo $data->blog_comment ?></span>
                                                </div>
                                            </div>
                                            <div class="blank_20h widthall">&nbsp;</div>
                                        <?php endforeach; ?>
                                        <!-- <div class="reply_messagewrapper">
                                       <div class="float_left"><img alt="photo" src="/images/bloguserphoto.gif"></div>
                                       <div class="info">
                                         <div class="float_left widthall"><b class="vio_blue">Walter Haraldsson</b></div>
                                         Well, I would rather just live in Bulgaria, a place I nested for 13 months, not really into that American
                                         thing anymore. But, nice house, happy living.</div>
                                 </div>-->
                                        <?php if (count($pager->getResults()) > 0) { ?>
                                            <div class="blog_main_line height_2px">&nbsp;</div>
                                        <?php } /* ?>
                                          <div class="paginationwrapper">
                                          <div class="pagination" id="blog_comment_list_listing" style="padding-right:2px;">
                                          <?php if ($pager->haveToPaginate()): ?>
                                          <a id="<?php echo $pager->getFirstPage(); ?>" style="cursor:pointer;"><img src="/images/left_arrow_trans.png" alt="arrow" />  </a> <a id="<?php echo $pager->getPreviousPage(); ?>" style="cursor:pointer;"> < </a>
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
                                          <a id="<?php echo $pager->getNextPage(); ?>" style="cursor:pointer;"> > </a> <a id="<?php echo $pager->getLastPage(); ?>" style="cursor:pointer;"> <img src="/images/right_arrow_trans.png" alt="arrow" /> </a>
                                          <?php endif ?>
                                          </div>
                                          </div><?php */ ?>

                                        <div class="blank_14h widthall">&nbsp;</div>
                                        <div class="clearAll"></div>
                                        <div class="paginationwrapperNew">
                                            <div class="forum_pag forum_listing1" id="blog_comment_list_listing">
                                                <?php if ($pager->haveToPaginate()): ?>
                                                    <?php if ($pager->getFirstPage() != $pager->getPage()) { ?>
                                                        <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
                                                        <?php } ?>
                                                        <?php $links = $pager->getLinks(11);
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
                                                                <option noclick="1" value="0" style="color:#b9c2cf" >Gå till sida...</option>
                                                                <?php for ($pg = 1; $pg <= $pager->getLastPage(); $pg++) { ?>
                                                                    <option noclick="1" class="color232222" <?php if ($pager->getPage() == $pg) {
                                                                        echo "selected='selected'";
                                                                    } ?> value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
                                                        <?php } ?>
                                                            </select>
                                                            <div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
                                                        </div>
    <?php endif ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="blog_text_error" class="float_left" style="padding:15px 0 0 30px; color:#FF0000; width:70%;margin-left: 65px;"></div>
                                            <?php if ($logged_user) { ?>
                                        <div id="comment_on_blog" class="Commentformwrapper blog_comment_main">
                                            <div class="blog_input_title">Kommentera</div>
                                            <form name="post_blog_comment_form" id="post_blog_comment_form" method="post" action="" onsubmit="return comment_blog_validation_check()">
                                                    <?php echo $blogCommentForm->renderHiddenFields() ?>	
                                                <div id="comment_blog_validation" class="float_left widthall" style="color:#FF0000; margin-top:7px; display:none; visibility:hidden;"><?php echo $errors["blog_comment"]; ?></div>
                                                <div class="float_left width_100per commenttextarea" style="margin:0px;">
        <?php echo $blogCommentForm['blog_comment']->render(array('class' => 'blog_input_bread blogCommentTextArea')) ?>
                                                </div>
                                                <div class="float_left widthall">
                                                    <input name="blog_followup" id="blog_followup" type="checkbox" value="" <?php echo $is_notified == 1 ? 'checked' : ''; ?> onclick="is_blog_followup()" />
                                                    Underrätta mig om uppföljande kommentarer via e-post.  </div>
                                                <div class="blank_21h widthall">&nbsp;</div>
                                                <div class="float_left widthall">
                                                    <div class="g-recaptcha" data-sitekey=<?php echo $public_key; ?>></div>
                                                </div>
                                                <div id="captcha_blog_validation" class="float_left widthall" style="color:#FF0000; margin-top:7px; "><?php echo $errors["captachError"]; ?></div>
                                                <div class="blank_21h widthall">&nbsp;</div>
                                                <div class="float_left widthall" id="post_blog_comment_div">
                                                    <div class="registerbtn">
                                                        <div class="registerbutton float_left">
                                                            <input type="button" name="post_blog_comment" id="post_blog_comment" value="" class="send_blog submit">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
    <?php } ?>
                                </div> 
<?php endif; ?>
                        </div>
                    </div>
                    <!-- <div class="curverect_bottombg"></div>-->
                </div>
            </div>
                <div class="blogleft2_divpart" id="profile_ads">
<?php include_partial('global/blogpage_right', array('user_details' => $user_details, 'data_arr' => $data_arr, 'visitor_name_id_arr' => $visitor_name_id_arr, 'pager' => $pager, 'profile' => $profile, 'host_str' => $host_str, 'gold_cnt' => $gold_cnt, 'silver_cnt' => $silver_cnt, 'bronze_cnt' => $bronze_cnt, 'user_guard_data' => $user_guard_data, 'own_profile' => $own_profile, 'user_photo_data' => $user_photo_data, 'user_photo_arr' => $user_photo_arr, 'ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1', 'isSuperAdmin'=> $isSuperAdmin)) ?>
            </div>
        </div>
    </div>
</div>

    <!-- dialog-delete-blog -->
    <div id="deleteblog_confirm_box" title="Ta bort bloggpost &ndash; bekr&auml;ftelse" class="hide_div">
        <table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr>
                <td id="delete_blog_msg"><?php echo utf8_encode('�r du s�ker p� att du vill ta bort bloggposten?') ?></td>
            </tr>
        </table>
    </div>
    <div id="pop-box-over" class="display-none" style=""></div>