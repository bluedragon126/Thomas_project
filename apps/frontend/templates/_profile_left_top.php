<script type="text/JavaScript">

    $(window).load(function(){
    
        $(".user_img").corner("7px");       
    
    });
  
    $(document).ready(function(){
        //$('#edit_prof_frnd_list').css('display', 'none');
        $('#edit_prof_slider').click(function(){
            $('#edit_prof_frnd_list').toggle(250);
        }).next().hide();
    });

</script>
<div class="minsid_lefttopdiv">
  <!--<h2 class="minleft_heading"><?php //echo ucfirst($user_details->user_title)    ?></h2>-->
    <div class="mrg_btm_18"><img src="/images/new_home/blog_logo_profile.png" width="190" /></div>
    <?php
    if ($user_photo_data):

        //getting the image size here
        $imageUser = getimagesize("http://" . $host_str . "/uploads/userThumbnail/" . str_replace('.', '_large.', $user_photo_data->profile_photo_name));
        ?>
        <style>
            .user_img{
                width: <?php echo $imageUser[0]; ?>px;
                height: <?php echo $imageUser[1]; ?>px;
                background-image: url('/uploads/userThumbnail/<?php echo str_replace('.', '_large.', $user_photo_data->profile_photo_name); ?>');
            </style>
            <div class="float_left widthall mbottom_10">
                <div class="user_img"></div>
            </div>
        <?php else: ?>
            <div class="float_left widthall mbottom_10"><!--changed the class name minleft_userphoto-->
                <?php if ($user_data->gender == 1): ?>
                    <img src="/images/new_home/blog_user_img.png" width="107" class="border_radius_7" alt="default_user" /><!-- added height and width and border radius style-->
                <?php else: ?>
                    <img src="/images/new_home/blog_user_img.png" width="107" class="border_radius_7" alt="default_user" /><!-- added height and width and border radius style-->
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="blog_welc_name"><?php echo $user_profile->getFullUserName($user_id); ?></div>
        <div class="blog_welc_pres"><?php $sbt_blog_profile = SbtBlogProfileTable::getInstance()->fetchBlogProfile($user_details->user_id);  if ($sbt_blog_profile) { echo $sbt_blog_profile->getMyOwnWriting(); } ?></div>
        <?php if ($edit_mode == 1): ?>	
            <div id="photo_text_div" class="float_left widthall change_photo_outer"><font color="#014c8f"><a id="changeProfileImage" class="main_link_color cursor">Change Photo</a> <?php if ($user_photo_data): ?>| <a id="removeProfileImage" class="main_link_color cursor" name="<?php echo $user_photo_data->user_id ?>">Remove Photo</a><?php endif; ?></font></div>
        <?php endif; ?>
        <div class="rating_wrapper">
            <?php if ($gold_cnt > 0): ?>
                <div class="float_left widthall"><img src="/images/medal_gold.png" alt="gold_star" height="18" width="18" /> <?php echo __('Author of the year : ') . $gold_cnt ?></div>
            <?php endif; ?>

            <?php if ($silver_cnt > 0): ?>
                <div class="float_left widthall"><img src="/images/medal_silver.png" alt="silver_star" height="18" width="18" /> <?php echo __('Author of the month : ') . $silver_cnt; ?></div>
            <?php endif; ?>

            <?php if ($bronze_cnt > 0): ?>
                <div class="float_left widthall"><img src="/images/medal_bronze.png" alt="bronze_star" height="18" width="18" /> <?php echo __('Most Popular Author : ') . $bronze_cnt ?></div>
            <?php endif; ?>
        </div>

        <div class="userinfo_min"> 
            <span class="blog_welc_info_q">Medlem sedan:&nbsp;</span><span class="blog_welc_info_a"><?php echo str_replace('-', '.', substr($user_data->regdate, 0, 10)) ?></span><br />
            <span class="blog_welc_info_q">Senaste aktivitet :</span><span class="blog_welc_info_a">&nbsp;<?php echo date("D j M, G:i", strtotime($user_data->inlogdate)); ?></span><br />
            <span class="blog_welc_info_q">Blogginlägg :</span><span class="blog_welc_info_a">&nbsp;<?php echo $data_arr['user_blog_count'] ?></span><br />
            <div class="float_left widthall ptop_10">
                <?php if ($isSuperAdmin == 1): ?>
                    <div class="float_left widthall">
                        <?php if ($user_guard_data->is_super_admin == 1): ?>
                            <?php echo '<span class="blog_welc_info_q">Group: </span> <span class="blog_welc_info_a">Admin</span>'; ?>
                        <?php else: ?>
                            <?php if ($user_guard_data->hasGroup('SbtArticlePublisher')): ?>
                                <?php echo '<span class="blog_welc_info_q">Group: </span> <span class="blog_welc_info_a">Publisher</span>'; ?>
                            <?php endif; ?>
                            <?php if (!$user_guard_data->hasGroup('SbtArticlePublisher')): ?>
                                <?php echo '<span class="blog_welc_info_q">Group: </span> <span class="blog_welc_info_a">Regular</span>'; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if (!$user_guard_data->is_super_admin && ($user_data->from_sbt != 0 && $user_data->sbt_active != 0 && !$user_guard_data->hasGroup('SbtArticlePublisher') && $articleCnt >= 5)): ?>
                    <?php if ($own_profile == 1): ?>
                        <?php $reply = $user_profile->isApplyedForPublisher($user_guard_data->id); ?>
                        <?php if ($reply == 1 || $reply == 3): ?>
                            <div id="request_publisher_status" class="float_left widthall">
                                <?php if ($reply == 1): ?><?php echo 'Publisher Request Status: <font color="#014c8f">In Process</font>'; ?><?php endif; ?>
                                <?php if (($reply == 3) && (!$user_guard_data->hasGroup('SbtArticlePublisher'))): ?><a class="cursor" name="<?php echo 'authorid_' . $user_guard_data->id; ?>"><font color="#014c8f">S</font><font color="#014c8f">kicka förfrågan om att bli murvel</font></a><?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
        <?php if ($edit_mode != 1): ?>
            <div class="userinfo_min" id="links_to_menu_tabs">
                <div class="float_left widthall"> <span class="posticon"><img src="/images/post_icon.jpg" alt="post" /></span><span class="float_left main_link_color"><a class="main_link_color cursor blog_welc_links" id="lft_getSbtMinProfileAllPost">Hitta alla poster</a></span></div>
                <div class="float_left widthall"> <span class="posticon"><img src="/images/post_icon.jpg" alt="post" /></span><span class="float_left main_link_color"><a class="main_link_color cursor blog_welc_links" id="lft_sbtMinProfileForumPost">Hitta alla startade trådar</a></span></div>
                <!--<div class="float_left widthall"> <span class="posticon"><img src="/images/article_icon.jpg" alt="post" /></span><span class="float_left main_link_color"><a class="main_link_color cursor blog_welc_links" id="lft_sbtMinProfileAllArticle">Se artiklar</a></span></div>-->
                <div class="float_left widthall"> <span class="posticon"><img src="/images/blog_entries.jpg" alt="post" /></span><span class="float_left main_link_color"><a class="main_link_color cursor blog_welc_links" id="lft_sbtMinProfileBlogPost">Se bloggposter</a> </span></div>
                <?php if (!$is_friend_request): ?>
                    <?php if ($show_top_links == 0): ?>
                        <div id="send_friend_req" class="float_left widthall"> <span class="posticon"><img src="/images/blog_entries.jpg" alt="post" /></span><span class="float_left main_link_color"><a id="friend_request" class="main_link_color blog_welc_links" href="#">Adda som vän </a> </span></div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="userinfo_min" id="my_friends_div">
                <div class="blank_10h widthall">&nbsp;</div>
                <!--<h3 class="minleft_heading2"><?php //echo count($friend_id)   ?> vänner</h3>-->
                <a href="#" class="main_link_color float_right"><?php echo count($friend_id) > 8 ? 'More' : '' ?></a>
                <div class="float_left widthall">
                    <?php for ($i = 0; $i < count($friend_id); $i++): ?>
                        <a class="cursor" href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $friend_id[$i] ?>">
                            <span class="photo_container">
                                <?php if ($user_photo_arr[$friend_id[$i]] != ''): ?>
                                    <img src="/uploads/userThumbnail/<?php echo str_replace('.', '_semilarge.', $user_photo_arr[$friend_id[$i]]); ?>" alt="user_photo" class="float_left"/>
                                <?php else: ?>
                                    <img src="/images/small_userphoto.jpg" alt="photo" class="float_left" />
                                <?php endif; ?>
                                <span class="main_link_color float_left"><?php echo $friend_name[$i] ?></span>
                            </span>
                        </a>
                        <div class="blank_10w">&nbsp;</div>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="float_left widthall">
                <div class="blank_10h widthall">&nbsp;</div>
                <div class="blogsliderwrapper">
                    <div id="edit_prof_slider">
                        <h2 class="blogright_heading blog_welc_info_q">besökare: <span class="blog_welc_info_a">Denna sida har haft <?php echo count($visitor_name_id_arr); ?> besök</span></h2>
                    </div>
                    <div id="edit_prof_frnd_list">
                        <?php
                        $j = 0;
                        foreach ($visitor_name_id_arr as $key => $value):
                            ?>
                            <?php if ($j == 0): ?>
                                <a href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $key ?>"><span  class="main_link_color l18_height"><?php echo $value; ?></span></a>
                            <?php else: ?>
                                <a href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $key ?>"><span  class="main_link_color l18_height"><?php echo ' , ' . $value; ?></span></a>
                            <?php endif; ?>
                            <?php
                            $j++;
                        endforeach;
                        ?><br />
                    </div>
                </div>
            </div>
<?php endif; ?>
        <div class="home_artline_blog">&nbsp;</div>
    </div>
    <div class="home_ad_r float_left" style="margin-left: 0px;">Annons</div>
