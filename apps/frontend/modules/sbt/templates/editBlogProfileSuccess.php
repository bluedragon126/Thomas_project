<?php use_stylesheet('custom-theme/jquery-ui-1.8.2.custom_sbt.css'); ?>
<script type="text/javascript">
    /**
     *
     *  AJAX IFRAME METHOD (AIM)
     *  http://www.webtoolkit.info/
     *
     **/
 
    AIM = {
 
        frame : function(c) {
 
            var n = 'f' + Math.floor(Math.random() * 99999);
            var d = document.createElement('DIV');
            d.innerHTML = '<iframe style="display:none" src="about:blank" id="'+n+'" name="'+n+'" onload="AIM.loaded(\''+n+'\')"></iframe>';
            document.body.appendChild(d);
 
            var i = document.getElementById(n);
            if (c && typeof(c.onComplete) == 'function') {
                i.onComplete = c.onComplete;
            }
 
            return n;
        },
 
        form : function(f, name) {
            f.setAttribute('target', name);
        },
 
        submit : function(f, c) {
            AIM.form(f, AIM.frame(c));
            if (c && typeof(c.onStart) == 'function') {
                return c.onStart();
            } else {
                return true;
            }
        },
 
        loaded : function(id) {
            var i = document.getElementById(id);
            if (i.contentDocument) {
                var d = i.contentDocument;
            } else if (i.contentWindow) {
                var d = i.contentWindow.document;
            } else {
                var d = window.frames[id].document;
            }
            if (d.location.href == "about:blank") {
                return;
            }
 
            if (typeof(i.onComplete) == 'function') {
                i.onComplete(d.body.innerHTML);
            }
        }
 
    }
</script>
<script type="text/javascript">
    function startCallback() {
        return true;
    }
 
    function completeCallback(response) {
        var str_arr = response.split(',');
        document.getElementById('blog_profile_image_upload_error').innerHTML = str_arr[0];
        if(str_arr.length == 2) document.getElementById('blog_profile_img_new').value = str_arr[1];
        //window.location.reload();
        checkBlogProfileImageMessage();
    }
    
    function sortingPopUp(obj){
        $(obj).prev().toggle();
    }
    function paginationPopupForumGo(obj){  
        var column_id = $('#column_id').val();	
        var parent_id = $('#parent_id').val();	
        var user_id = $('#current_user').val();
        var page = $(obj).prev().val();
        var current_column_order = $('#useronlyforum_list_current_column_order').val();	
		
        $('#profile_useralldata_forum_list_table').find("tr.classnot").each(function(index){
            $(this).addClass('withOpacity');
        });
		
        var pagination_numbers = $('#useronlyforum_list_listing').html();
        $('#useronlyforum_list_listing').html(pagination_numbers+'<span class="" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');
	
        $.post("/sbt/getSbtMinProfileOnlyForumPost?column_id="+column_id+'&id='+user_id+"&page="+page+'&parent_id='+parent_id+'&useronlyforum_list_current_column_order='+current_column_order, function(data){
            $('#profile_data_container').html(data);

            setSearchOrderImageForAll('sortby_'+column_id,current_column_order,parent_id);
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
</script>
<span class="float_left indicator loader loader_posiotion"><img src="/images/ajax-loader_blog.gif" /></span>
<div class="maincontentpage" id="minsid">
    <?php if ($own_profile == 1): ?>
        <?php if ($user_id): ?>
            <div class="mainconetentinner">               
                <div class="blogleft_divpart innerleftdiv_blog">
                    <?php include_partial('global/profile_left_top', array('user_data' => $user_data, 'data_arr' => $data_arr, 'host_str' => $host_str, 'user_id' => $user_id, 'friendRequestForm' => $friendRequestForm, 'is_friend_request' => $is_friend_request, 'friend_id' => $friend_id, 'friend_name' => $friend_name, 'show_top_links' => $show_top_links, 'visitor_name_id_arr' => $visitor_name_id_arr, 'gold_cnt' => $gold_cnt, 'silver_cnt' => $silver_cnt, 'bronze_cnt' => $bronze_cnt, 'user_guard_data' => $user_guard_data, 'user_profile' => $user_profile, 'own_profile' => $own_profile, 'edit_mode' => $edit_mode, 'user_photo_data' => $user_photo_data, 'on_edit_blog' => $on_edit_blog, 'user_details' => $user_details)) ?>
                    <div class="minsid_lefttopdiv_banner">&nbsp;</div>
                    <div id="profile_ads">
                        <?php include_partial('global/profile_left_bottom', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
                    </div>
                </div>
                <div class="minsid_rightdiv">
                    <div class="curverect_topbg"></div>
                    <div class="curverect_midbg">
                        <div class="midsi_inner">

                            <?php include_partial('global/profile_menu', array('host_str' => $host_str, 'action' => $action)) ?>
                            <input type="hidden" name="current_user" id="current_user" value="<?php echo $logged_user ?>"/>
                            <div id="profile_data_container">
                                <?php include_partial('blog_dashboard_menu', array('host_str' => $host_str, 'user_id' => $user_id, 'logged_user' => $logged_user)); ?>

                                <div class="om_miginfo">
                                    <form name="user_reg" action="" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="blog_info_div" id="blog_info_div" value="<?php echo $blog_info_div ?>" />
                                        <input type="hidden" name="blog_headername_color" id="blog_headername_color" value="<?php echo $color_arr['name'] ?>" />
                                        <input type="hidden" name="blog_headerinfo_color" id="blog_headerinfo_color" value="<?php echo $color_arr['info'] ?>" />
                                        <input type="hidden" name="blog_pagebackground_color" id="blog_pagebackground_color" value="<?php echo $color_arr['background'] ?>" />
                                        <input type="hidden" name="blog_header_image" id="blog_header_image" value="<?php echo $color_arr['image'] ?>" />
                                        <?php echo $blogProfileForm->renderHiddenFields() ?>
                                        <div>
                                            <div>
                                                <div class="blog_user_profile_deshboard padding_top_4 widthall">Editera bloggprofil</div>
                                                <div class="blog_line_nav"><img src="/images/new_home/blog_line_nav.png"/>
                                                    <div class="widthall">
                                                        <div class="form_labels pad_btm_10 width_145">Bloggens namn: </div>
                                                        <div class="mrg_top_3"><?php echo $blogProfileForm['blog_header_name']->render(array('class' => ' blog_prof_entry blog_invisible_input width461', 'placeholder' => 'Skriv namnet på din blogg här')) ?></div>
                                                    </div>
                                                    <div class="widthall">
                                                        <div class="form_labels width_145">F&auml;rg bloggnamn: </div>
                                                        <div><div id="colorSelector"><div style="background-color: <?php echo $color_arr['name'] ?>"></div></div></div>
                                                    </div>
                                                    <div class="widthall mrg_top_6">
                                                        <div class="width_145 form_labels pad_btm_10"><?php echo __('Blogghuvudtext') ?>:</div>
                                                        <div class="mrg_top_6"><?php echo $blogProfileForm['blog_header_info']->render(array('class' => ' blog_prof_entry blog_invisible_input blogheadtext_height width461 textarea_resize', 'placeholder' => 'Det du skriver här visas i blogghuvudet')) ?></div>
                                                    </div>
                                                    <div class="widthall">
                                                        <div class="width_145 form_labels">F&auml;rg blogghuvudtext: </div>
                                                        <div id="colorSelectorHeaderInfo"><div style="background-color: <?php echo $color_arr['info'] ?>"></div></div>
                                                    </div>
                                                    <div class="widthall mrg_top_6">
                                                        <div class="width_145 form_labels pad_btm_10"><?php echo __('Blogghuvudbildtext') ?>:</div>
                                                        <div class="mrg_top_6"><?php echo $blogProfileForm['blog_profile_img_text']->render(array('class' => ' blog_prof_entry blog_invisible_input width461', 'placeholder' => 'Det du skriver här hamnar under den stora bilden i blogghuvudet.')) ?></div>
                                                    </div>
                                                    <div class="widthall">
                                                        <div class="width_145 form_labels pad_btm_10"><?php echo __('Bloggprofilkommentar') ?>:</div>
                                                        <div class="mrg_top_3"><?php echo $blogProfileForm['blog_profile_comment']->render(array('class' => ' blog_prof_entry blog_invisible_input width461', 'placeholder' => 'Det du skriver här placeras under din avatar i vänsterspalten.')) ?></div>
                                                    </div>
                                                    <div class="widthall">
                                                        <div class="width_145 form_labels"><?php echo __('Blogghuvudbild') ?>:</div>
                                                        <div class="mrg_top_7"><a id="user_blog_profile_image" class="blog_prof_entry cursor"><?php echo __('Ladda upp profilbild') ?></a> <?php echo __('(Bildstorlek: min 80*80, max 585*320)') ?></div>
                                                    </div>
                                                    <div class="widthall">
                                                        <div>&nbsp;</div>
                                                        <div id="blog_profile_crop_reply" class="float_left blog_profile_crop_reply"></div>
                                                    </div>
                                                    <div class="widthall">
                                                        <div class="width_145 form_labels"><?php echo __('Bakgrundsf&auml;rg') ?>:</div>
                                                        <div id="blogPageBackgroundColor"><div style="background-color: <?php echo $color_arr['background'] ?>"></div></div>
                                                    </div>
                                                    <div class="padtop_5">&nbsp;</div>
                                                    <div class="widthall">
                                                        <div class="padtop_5 width_145">&nbsp;</div>
                                                        <div class="mrg_top_10"><input type="submit" class="edit_blog_save submit " value="" name="submit" /></div>
                                                    </div>

                                                </div>
                                            </div>
                                    </form>
                                    <!--<div class="blank_30h widthall">&nbsp;</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="curverect_bottombg"></div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="forumlistingleftdiv" id="forumlistingleftdiv">
            <div class="shoph3 widthall">Please select the user first to view the Profile..</div>
            <div class="float_left widthall">To View the User List, click <a href="<?php echo "http://" . $host_str ?>/sbt/sbtUser">here</a></div>
            <div class="float_left widthall">&nbsp;</div>
        </div>
    <?php endif; ?>
<?php else: ?>
    <div class="forumlistingleftdiv" id="forumlistingleftdiv">
        <div class="shoph3 widthall">Access not allowed</div>
        <div class="float_left widthall">&nbsp;</div>
    </div>
<?php endif; ?>


<!-- Used on MinProfile page left side section, for sending a friend request. -->
<div id="change_userblogprofile_image_box" title="Add Blog profile image" class="hide_div">
    <form id="change_userblogprofile_image_form" name="change_userblogprofile_image_form" enctype="multipart/form-data" method="post" action="/sbt/uploadUserBlogProfileImage/" onsubmit="return AIM.submit(this, {'onStart' : startCallback, 'onComplete' : completeCallback});">
        <table border="0" cellspacing="3" cellpadding="0">
            <tr>
                <td>
                    <table border="0" cellspacing="3" cellpadding="0">
                        <tr>
                            <td><div class="float_left width_20"></div></td>
                            <td id="blog_profile_image_upload_error">&nbsp;</td>
                            <td><input type="hidden" id="blog_profile_img_new" name="blog_profile_img_new" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table border="0" cellspacing="3" cellpadding="0">
                        <tr>
                            <td id="browse_blog_user_img_box_div"><div class="float_left width_20"></div></td>
                            <td align="right"><input type="file" name="upload_user_blog_image" /></td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
</div>

<div class="inner_page_divider_3">&nbsp;</div>
<div class="float_right margin_testimonial margin_right_testimonial">
    <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
</div>

<div id="upload_bloguserprofile_image_box" title="Upload Blog profile image" class="hide_div">

    <!-- This is the form that our event handler fills -->
    <form id="blog_profile_image_upload_form" action="" method="post" onSubmit="return checkCoords();">
        <input type="hidden" id="x" name="x" />
        <input type="hidden" id="y" name="y" />
        <input type="hidden" id="w" name="w" />
        <input type="hidden" id="h" name="h" />
    </form>

    <div id="blog_image_container">
        <img src="" id="blogImageCropbox" />
    </div>

</div>

<div id="show_blog_profile_image_reply_box" title="Upload Blog profile image" class="hide_div">
    <div id="show_blog_profile_image_reply_message">&nbsp;</div>
</div>
<div id="pop-box-over" class="display-none"></div>