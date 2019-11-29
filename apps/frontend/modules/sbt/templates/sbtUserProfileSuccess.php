<!--[if IE 7]>
    <link rel="stylesheet" type="text/css" media="screen" href="/css/main_ie7.css" />
<![endif]-->
<?php use_stylesheet('custom-theme/jquery-ui-1.8.2.custom_sbt.css'); ?>
<style>
    .paginationwrapperNew .jqTransformSelectWrapper{
        background: #dddcdb none repeat scroll 0 0 !important;
        border: 1px solid #dddcdb !important;
        border-radius: 5px !important;
        color: #000 !important;
        font-family: "Franklin Gothic Book Regular";
        font-size: 12px;
        height: 23px;
        letter-spacing: 0.1em;
        line-height: 0;
        margin: 13px 23px 10px;
        padding: 0;
        width: 107px !important;
    }
    .paginationwrapperNew .jqTransformSelectWrapper div span{
        cursor: pointer;
        float: none;
        font-size: 12px;
        height: auto !important;
        line-height: 15px;
        overflow: hidden;
        padding: 5px 0 0;
        position: absolute;
        white-space: nowrap;
        width: 107px !important
    }
    .paginationwrapperNew .jqTransformSelectWrapper ul {
        width: 107px !important;
        top: 23px !important;
        height: auto !important;
    }
</style>
<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        $('#my_visibility_form').jqTransform();
        var take_to_profile = $('#take_to_profile').val();
        if(take_to_profile == 1) $('#sbtMinProfileMyAccount').trigger('click');
        //$('#myaccount_data_container').jqTransform();
        
        $(".custome_button_twitter").live("click",function(){
            var twitimagetext = '<?php echo $article_image_text ? html_entity_decode($article_image_text) : "" ?>';
            var currentUrl = window.location.href;
            if((twitimagetext.length + currentUrl.length) > 140)
            {
                twitimagetext = twitimagetext.substring(0,139 - (currentUrl.length + 3));
                twitimagetext = twitimagetext + "...";
            }
            var url = "http://twitter.com/share?text="+twitimagetext+"&url="+currentUrl;
            window.open(url, "Share on twitter", "top=300,left=350,width=500,height=500");
        });
		
        /* code by sandeep */
        var twitimagetext = '<?php echo $article_image_text ? html_entity_decode($article_image_text) : "" ?>';        
        var titletext = $('title').text()+' | '+twitimagetext;
        $('title').text(titletext);
        /* code by sandeep end */

        var TrueHeight = $(".mainconetentinner").height();
        $(".minsid_rightdiv").css({"height":TrueHeight+"px"});
        $(".innerleftdiv_blog").css({"height":TrueHeight+"px"});
    });
	    
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
        //$('#useronlyforum_list_listing').html(pagination_numbers+'<span class="" style="padding-right:5px;"><img src="../images/indicator.gif" /></span>');
        $('#useronlyforum_list_listing').html(pagination_numbers+'');
        $('#pop-box-over').show();
        $('.indicator').css('display','block');
        $.post("/sbt/getSbtMinProfileOnlyForumPost?column_id="+column_id+'&id='+user_id+"&page="+page+'&parent_id='+parent_id+'&useronlyforum_list_current_column_order='+current_column_order, function(data){
            $('#profile_data_container').html(data);
            $('.indicator').hide();
            $('#pop-box-over').hide();
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
<style>
    .advertdiv, .advertdiv2{
        margin-left: 0px;
    }
    .mleft_16{
        margin-left: 0px;
    }
    .sponseror{
        margin-left: 0px;
    }
    .home_adline_r_div{
        margin-left: 0px;
    }
    #my_subscription_container,#my_subscription_container{
        width: 610px !important;
    }
</style>

<div class="maincontentpage" id="minsid">
<?php if ($user_id): ?>
        <div class="mainconetentinner">
            <div class="innerleftdiv_blog padding_0">
                <div class="blogleft_divpart">
                    <?php include_partial('global/profile_left_top', array('user_data' => $user_data, 'data_arr' => $data_arr, 'host_str' => $host_str, 'user_id' => $user_id, 'friendRequestForm' => $friendRequestForm, 'is_friend_request' => $is_friend_request, 'friend_id' => $friend_id, 'friend_name' => $friend_name, 'show_top_links' => $show_top_links, 'visitor_name_id_arr' => $visitor_name_id_arr, 'gold_cnt' => $gold_cnt, 'silver_cnt' => $silver_cnt, 'bronze_cnt' => $bronze_cnt, 'user_guard_data' => $user_guard_data, 'user_profile' => $user_profile, 'own_profile' => $own_profile, 'user_photo_data' => $user_photo_data, 'user_photo_arr' => $user_photo_arr, 'isSuperAdmin' => $isSuperAdmin, 'user_details' => $user_details, 'articleCnt' => $articleCnt)) ?>
                    <div class="minsid_lefttopdiv_banner">&nbsp;</div>
                    <div id="profile_ads">
                    <?php include_partial('global/profile_left_bottom', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'set_margin' => '1', 'ad_3' => $ad_3, 'ad_4' => $ad_4)) ?>
                    </div>
                </div>
            </div>
            <div class="minsid_rightdiv">
                <div class="curverect_topbg"></div>
                <div class="curverect_midbg">
                    <div class="midsi_inner_tab">
                    <?php include_partial('global/profile_menu', array('host_str' => $host_str, 'user_id' => $user_id, 'action' => $action, 'show_top_links' => $show_top_links)) ?>
                    </div>
                </div>
                <div class="curverect_bottombg"></div>
                <div class="curverect_topbg"></div>
                <div class="curverect_midbg">
                    <div class="midsi_inner">	
                        <input type="hidden" name="current_user" id="current_user" value="<?php echo $logged_user ?>"/>
                        <input type="hidden" name="take_to_profile" id="take_to_profile" value="<?php echo $take_to_profile ?>"/>
                            <div class="om_miginfo bor_bot_0" id="profile_data_container">                   
                            </div>
                        </div>
                    </div>
                    <div class="inner_page_divider_3">&nbsp;</div>
                    <div class="float_right margin_right_testimonial ">
                        <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
                    </div>
                    <div class="inner_page_divider_3">&nbsp;</div>
                </div>
                
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="forumlistingleftdiv" style="width:964px;">
        <div class="shoph3 widthall">För att se profilen, vänligen välj användare först.</div>
        <div class="float_left widthall">För att se användarlistan, klicka <a href="<?php echo "http://" . $host_str ?>/sbt/sbtUser">här</a></div>
        <div class="float_left widthall">&nbsp;</div>
    </div>
<?php endif; ?>
<!--</div>-->

