<div class="float_left widthall"><input type="hidden" name="blog_user_id" id="blog_user_id" value="<?php echo $user_id ?>"/></div>

<?php if ($all_blog_post_pager->getNbResults() > 0): ?>
    <?php foreach ($all_blog_post_pager->getResults() as $one_blog): ?>
        <div class="blog_classnot">
            <?php //if($one_blog):?>
            <div class="blog1advrt" id="blogsection_<?php echo $one_blog->id; ?>">

                <div class="float_left widthall">
                    <input type="hidden" name="current_user" id="current_user" value="<?php echo $logged_user ?>"/>
                    <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $one_blog->id ?>"/>
                </div>
                <div class="float_right">
                    <?php
                    if ($one_blog->updated_at == null)
                        echo "<span class='blog_main_date'>" . $one_blog->created_at . "</span>"; else
                        echo "<span class='blog_main_date'>" . $one_blog->updated_at . "</span>"
                        ?>
                </div>
                <span class="blogdetail_title blog_first_header_list"><?php echo $mymarket_title->correctDetailTitle($one_blog->ublog_title) ?></span>
                <?php
                $regex = "/<\/?\w+((\s+(\w|\w[\w-]*\w)(\s*=\s*(?:\".*?\"|'.*?'|[^'\">\s]+))?)+\s*|\s*)\/?>/i";
                $str_without_tags = trim(preg_replace($regex, "", html_entity_decode($one_blog->ublog_description)));
                $blogdetails = SbtUserBlog::filterMyString(html_entity_decode($one_blog->ublog_description));
                $word_arr = str_word_count($str_without_tags, 1); // all words from string with no tags
                if (count($word_arr) > 50) { // if words are more than 50, needs to cut the blog
                    $strpos1 = strpos($blogdetails, $word_arr[49]);
                    $str = substr($blogdetails, 0, strpos($blogdetails, $word_arr[49]));
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
                //$shortDesc = sbtUserBlog::closeTags($shortDesc);
                ?>

                <?php $pager = $sbtBlogComment->fetchPerticularBlogCommentsPager($one_blog->id); ?>

                <div class="bloginfo display-none"  id="descFull_<?php echo $one_blog->id ?>"><?php echo SbtUserBlog::filterMyString(html_entity_decode($one_blog->ublog_description)); ?><br /></div>
                <div class="bloginfo" id="descLimited_<?php echo $one_blog->id ?>"><?php echo $shortDesc ?><br /></div>


                <div id="comment_count_div<?php echo $one_blog->id; ?>" class="float_left main_link_color height_15">
                    <span class="blog_read_more">
                        <span class="float_left"><a name="<?php echo $one_blog->id; ?>" class="cursor">Kommentarer</a></span>

                        <span class="float_left padding_left_4 color_9fb6c7">
                            <a name="<?php echo $one_blog->id; ?>" class="cursor"><b><?php echo $pager->getNbResults(); ?></b></a>
                            <a name="<?php echo $one_blog->id; ?>" class="cursor"><img class="blog_chaticon_m" src="/images/blog_chaticon.png" alt="show_comment" width="20"/></a>
                        </span>

                        <span><a name="<?php echo $one_blog->id; ?>" class="cursor float_left">Läs mer</a></span>
                    </span>

                    <?php if ($userId == $one_blog->author_id || $isSuperAdmin == 1): ?>
                        <span class="float_left">
                            <span class="float_left width_14 ptop_4">
                                <a class="profile_bloglist_row" name="<?php echo 'row_' . $one_blog->id; ?>"><img src="/images/cross.png" alt="cross" width="15" height="15"/></a>
                            </span>
                            <span class="float_left width_18 margin_left_10">
                                <a href="<?php echo 'https://' . $host_str . '/sbt/sbtEditBlog/blog_id/' . $one_blog->id; ?>" class="cursor"><img src="/images/edit_blog.png" alt="down" width="15"/></a>
                            </span>
                        </span>&nbsp;&nbsp;
                    <?php endif; ?>
                </div>
                <div class="blog_main_line">&nbsp;</div>
                <div class="blank_10h widthall">&nbsp;</div>
            </div>

            <div id="blog_vote_div_id<?php echo $one_blog->id; ?>" class="float_left widthall hide_div">
                <div id="user_all_blog_vote_div<?php echo $one_blog->id; ?>" class="float_left widthall">
                    <?php $rec_present = $vote_details->findVoteDetails($one_blog->id, $logged_user); ?>
                    <?php $no_of_stars = $vote_details->getStarForBlog($one_blog->id); ?>

                    <?php if ($rec_present == 0): ?>
                        <span class="float_left border_blue">
                            <a class="float_left cursor" onClick="show_vote_meter_on_all_blog_page('<?php echo $valid_user; ?>','<?php echo $one_blog->id; ?>')">
                                <img src="/images/vote_symb.png" alt="icon"  class="float_left mrg_top_5"  width="30"/> <b class="float_left mrg_top_10 mrg_lft_8 blog_vote">Rösta</b>
                            </a>
                        </span>
                        <span class="blog_comment_slash">/</span>
                        <span class="float_left border_green margin_top_6 margin_left_5">
                            <?php for ($i = 1; $i <= $no_of_stars; $i++): ?>
                                <img class="float_left" alt="star" src="/images/ratingstar_org.png" />
                            <?php endfor; ?>
                        </span>
                        <span class="float_left blog_poll mrg_top_10 mrg_lft_8">Röster: <?php echo $one_blog->ublog_votes; ?></span>
                        <span class="blog_comment_slash">/</span>
                    <?php else: ?>
                        <span class="float_left">
                            <?php for ($i = 1; $i <= $no_of_stars; $i++): ?>
                                <img class="float_left" alt="star" src="/images/ratingstar_org.png" />
                            <?php endfor; ?>
                        </span>
                        <span class="float_left">Röster: <?php echo $one_blog->ublog_votes; ?></span>
                    <?php endif; ?>
                    <span class="float_left cursor hide_blog_div"><b><a class="cursor" name="<?php echo $one_blog->id; ?>">Minimera</a></b></span>
                    <span class="blog_comment_slash">/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="float_left width_14 ptop_4 pad_lft_10 mrg_top_5">
                        <a class="profile_bloglist_row" name="<?php echo 'row_' . $one_blog->id; ?>"><img src="/images/cross.png" alt="cross" width="15" height="15"/></a>
                    </span>
                    <span class="float_left width_18 mrg_top_5 margin_left_10">
                        <a href="<?php echo 'https://' . $host_str . '/sbt/sbtEditBlog/blog_id/' . $one_blog->id; ?>" class="cursor"><img src="/images/edit_blog.png" alt="down" width="15"/></a>
                    </span>
                </div>
                <div id="blog_vote_option_id<?php echo $one_blog->id; ?>" class="float_left widthall hide_div padding_top_10">
                    <?php include_partial('vote_blog_panel', array('blog_id' => $one_blog->id)) ?>
                    <div class="float_left margin_left_10 color_FF0000" id="blog_vote_error<?php echo $one_blog->id; ?>"></div>
                </div>
            </div>

            <div class="commentwrapper hide_div" id="blog_comment_section<?php echo $one_blog->id; ?>">
                <div class="float_left widthall" id="blog_comment_div<?php echo $one_blog->id; ?>">
                    <div class="commentheading blog_comment_heading mrg_top_20"><font size="+2"><?php echo $pager->getNbResults(); ?></font> kommentarer, läs nedan eller <span class="main_link_color"><a id="comment_on" class="main_link_color" rel="nofollow" class="cursor" href="#comment_on_blog">lägg till en egen</a></span></div>
                    <?php foreach ($pager->getResults() as $data): ?>
                        <div class="comment_messagewrapper">
                            <div class="float_left width_30"><a href="https://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->comment_by ?>">
                                    <?php if ($user_photo_arr[$data->comment_by] != ''): ?>
                                        <img src="/uploads/userThumbnail/<?php echo str_replace('.', '_small.', $user_photo_arr[$data->comment_by]); ?>" alt="user_photo"/>
                                    <?php else: ?>
                                        <img alt="photo" src="/images/new_home/blog_user_img.png">
                                    <?php endif; ?>
                                </a></div>
                            <div class="info">
                                <div class="float_left widthall"><b class="borst_subtitle_4"><a class="borst_subtitle_4" href="https://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->comment_by ?>"><?php echo $profile->getFullUserName($data->comment_by) ?></a></b> <b class="lightbluefont"><?php echo substr($data->created_at, 0, 10) ?></b></div>
                                <?php echo $data->blog_comment ?></div>
                        </div>
                    <?php endforeach; ?>

                    <div class="paginationwrapper">
                        <div class="user_all_blog_comment_pagination paddiing_left_25" id="blog_comment_list<?php echo $one_blog->id; ?>">
                            <?php include_partial('pager_partial', array('pager' => $pager)) ?>
                        </div>
                    </div>
                </div>
                <div id="blog_text_error<?php echo $one_blog->id; ?>" class="float_left"></div>
                <div id="comment_on_blog<?php echo $one_blog->id; ?>" class="Commentformwrapper">
                    <div class="blog_input_title">Kommentera</div>
                    <form name="blog_comment_form" id="blog_comment_form<?php echo $one_blog->id; ?>" method="post" action="">
                        <input type="hidden" name="blog_user_id" id="blog_user_id" value="<?php echo $user_id ?>"/>
                        <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $one_blog->id; ?>"/>
                        <?php echo $blogCommentForm->renderHiddenFields() ?>
                        <div id="comment_blog_validation<?php echo $one_blog->id; ?>" class="float_left widthall color_FF0000 margin_top_7 hide_div">Required</div>
                        <div class="float_left widthall"> <?php echo $blogCommentForm['blog_comment']->render(array('class' => 'commenttextarea')) ?> </div>
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
            <?php //endif; ?>

        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="no_result"><?php echo __('No Results') ?></div>
<?php endif; ?>

<div class="paginationwrapper">
    <div class="pagination padding_right_25 padding_bottom_20" id="user_all_blog_post_list_listing">
        <?php if ($all_blog_post_pager->haveToPaginate()): ?>
            <a id="<?php echo $all_blog_post_pager->getFirstPage(); ?>" class="cursor"><img src="/images/left_arrow_trans.png" alt="arrow" /> </a> <a id="<?php echo $all_blog_post_pager->getPreviousPage(); ?>" class="cursor"> < </a>
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
            <a id="<?php echo $all_blog_post_pager->getNextPage(); ?>" class="cursor"> > </a> <a id="<?php echo $all_blog_post_pager->getLastPage(); ?>" class="cursor"> <img src="/images/right_arrow_trans.png" alt="arrow" /> </a>
            <?php endif ?>
    </div>
</div>