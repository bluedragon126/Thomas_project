<script type="text/JavaScript">

    $(window).load(function(){
    
        //$(".user_img_left").corner("7px");
    
    });
    $(document).ready(function(){
        var img_width = $('.user_img_left').css('width');
        var final_width = img_width.replace("px", "");
        if(final_width > 326){
            $('.blog_head_text_wrap').css({'position': 'absolute','margin-left': '25em', 'right': '0'});
        }
         
    });

</script>

<?php if ($blog_profile_details): ?>
    <?php
    if ($blog_profile_details->blog_header_image):
        //getting the image size here
        $imageUser = getimagesize("https://" . $host_str . "/uploads/userBlogProfileImage/" . $blog_profile_details->blog_header_image . "");
        ?>
        <h1 class="blog_head_title widthall" style="color:<?php echo $blog_profile_details->blog_header_name_color; ?>"><?php echo $blog_profile_details->blog_header_name; ?></h1>
       <style>
            .user_img_left{
                width: <?php echo $imageUser[0]; ?>px;
                height: <?php echo $imageUser[1]; ?>px;
                background-image: url('/uploads/userBlogProfileImage/<?php echo $blog_profile_details->blog_header_image; ?>');
            </style>

            <div class="blog_head_wrap" style="background-color:<?php echo $blog_profile_details->blog_page_background_color; ?>">
                    <div class="float_left pa">
                        <div class="user_img_left"></div>
                    </div>

                    <div class="blog_head_text_wrap">
                        <div class="blog_head_text" style="color:<?php echo $blog_profile_details->blog_header_info_color ?>"><?php if(strlen($blog_profile_details->blog_header_info)>160){ echo substr($blog_profile_details->blog_header_info,0,160).'...';}else{echo $blog_profile_details->blog_header_info;} ?></div>
                    </div>
                </div>


            <?php endif; ?>
            <?php if ($blog_profile_details->blog_profile_img_text): ?>
                <div class="blank_15h">&nbsp;</div>
                <div class="blog_head_caption float_left"><?php echo $blog_profile_details->blog_profile_img_text ?></div>
            <?php endif; ?>
            <div class="bhc_h">
                <?php if ($own_blog == 1): ?>
                    <div class="blog_head_edit_profile float_right"><a href="<?php echo 'https://' . $host_str . '/sbt/editBlogProfile/edit_user_id/' . $user_id; ?>">Editera blogprofil</a></div>
                <?php endif; ?>
            </div>
            <div class="blog_main_line height_1px">&nbsp;</div>
        <?php else: ?>
            <!--<div class=" blank_10h widthall">&nbsp;</div>-->
            <h1 class="minsid_heading widthall"><font  color="#d9dadb">Namnge </font> din blogg!</h1>
            <div class=" blank_15h widthall">&nbsp;</div>
            <div class="float_left pa"><img src="/images/new_home/blog_default.gif" alt="photo" /></div>
            <div class="blueinfo">Skriv en text här som profilerar din blogg.</div>
            <div class="float_left blank_15h widthall">&nbsp;</div>

        <?php endif; ?>


        <div class="blog_fav_wrap">
            <?php if ($from_blogdetail == 1): ?>
                <div class="float_left">
                    <?php if ($valid_user == 1): ?>
                        <?php if ($add_in_fav_list == 0):
                            ?>
                            <div id="f_blog" class="blog_add_fav_div1">
                                <a class="add_to_favorite" id="<?php echo 'blog_' . $one_blog->id . '_' . $user_id; ?>" name="<?php echo $one_blog->ublog_title; ?>"><img width="85" src="/images/new_home/blog_fav.png"></a>
                            </div>
                        <?php elseif ($valid_user == 1 && $add_in_fav_list == 1): ?>
                            <img width = "85" src = "/images/new_home/blog_fav_put.png">
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="blog_first_detail"><a href="<?php echo 'https://' . $host_str . '/sbt/showListOfUserBlog/uid/' . $one_blog->author_id ?>">Bloggens startstida</a></div>
            <?php endif; ?> 
            <div class="blog_first_detail_date"><?php if ($one_blog->updated_at == null) echo $one_blog->created_at; else echo $one_blog->updated_at ?></div>
        </div>




