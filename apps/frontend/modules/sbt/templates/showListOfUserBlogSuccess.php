<?php use_stylesheet('custom-theme/jquery-ui-1.8.2.custom_sbt.css'); ?>
<style type="text/css">
    .listing table {width:30%;}
    .sponseror{
        margin-left: 0px;
    }
    .home_adline_r_div{
        margin-left: 0px;
    }
</style>

<script language="javascript" type="text/javascript">
    $(document).ready(function(){

        $('#blog_detail_div').html('<span class="float_left" style="text-align:center; width:100%; height:20px;"><img src="/images/indicator.gif" /></span>');
        $.ajax({
            url:'/sbt/showAllBlogPostOfUser?user_id='+<?php echo $user_id; ?>,
            success:function(data)
            {
                $("#blog_detail_div").html(data);
            }
        });

    });
</script>

<div class="maincontentpage" id="minsid">

    <div class="mainconetentinner" <?php //if($blog_profile_details && $blog_profile_details->blog_page_background_color!=''): ?> <!--style=" background-color:--><?php //echo $blog_profile_details->blog_page_background_color;  ?>" <?php //endif; ?>>

         <div class="blogleft2_divpart">
                 <?php include_partial('global/blogpage_right', array('user_details' => $user_details, 'data_arr' => $data_arr, 'visitor_name_id_arr' => $visitor_name_id_arr, 'pager' => $pager, 'profile' => $profile, 'host_str' => $host_str, 'gold_cnt' => $gold_cnt, 'silver_cnt' => $silver_cnt, 'bronze_cnt' => $bronze_cnt, 'user_guard_data' => $user_guard_data, 'own_profile' => $own_profile, 'user_photo_data' => $user_photo_data, 'user_photo_arr' => $user_photo_arr, 'ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
        </div>

        <div class="blogright2_divpart">
            <div class="float_left widthall">
                <?php include_partial('blog_header_profile', array('blog_profile_details' => $blog_profile_details, 'own_blog' => $own_blog, 'user_id' => $logged_user, 'host_str' => $host_str, 'one_blog' => $one_blog, 'valid_user' => $valid_user, 'add_in_fav_list' => $add_in_fav_list)) ?>
            </div>
            <div class="curverect_topbg"></div>
            <div class="curverect_midbg">
                <div id="blog_detail_div" class="bloginner_rect float_left listing">

                </div>
            </div>
            <!-- <div class="curverect_bottombg"></div>-->
        </div>
    </div>
    <div class="inner_page_divider_3">&nbsp;</div>
    <div class="float_right margin_right_testimonial margin_testimonial">
        <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
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