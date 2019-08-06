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
<?php $parent_menu = sfContext::getInstance()->getUser()->getAttribute('parent_menu_common');
if ($parent_menu == '5' || $parent_menu == '9') { ?>
    <span class="float_left indicator loader loader_posiotion" style="text-align:center; width:100%;left:14%;"><img src="/images/ajax-loader_blog.gif" /></span>
<?php } elseif ($parent_menu == '4') { ?>
    <span class="float_left indicator loader loader_posiotion" style="text-align:center; width:100%;left:14%;"><img src="/images/ajax-loader.gif" /></span>
<?php } else { ?>
    <span class="float_left indicator loader loader_posiotion" style="text-align:center; width:100%;left:14%;"><img src="/images/ajax-loader_blk.gif" /></span>
    <?php } ?>
<div class="maincontentpage" id="minsid">
<?php if ($user_id): ?>
        <div class="mainconetentinner">
            <div class="innerleftdiv_blog padding_0">
                <!--<div class="minsid_topwrapper">-->
                <!--<div class="minprofile_heading">
                    <h1 class="minsid_heading widthall"><font  color="#d9dadb"><?php //echo $user_profile->getFullUserName($user_id);         ?></font></h1>
                </div>-->
                <!--<div class="editprofile_links">-->
                <?php //if ($show_top_links == 1):  ?>
                <!--<div class="profilelink">--> <!--<a href="#">Mina sidor | </a> -->
                <?php //if($user_data->from_sbt == 1 && $user_data->sbt_active == 1):?>
                <?php /* ?><a href="http://<?php echo $host_str?>/sbt/editBlogProfile/edit_user_id/<?php echo $user_id ?>">Editera Blog profil | </a><?php */ ?>
                <?php //endif; ?>
                    <!--<a href="http://<?php echo $host_str ?>/sbt/editProfile/edit_user_id/<?php echo $user_id ?>">Editera profil</a> </div>-->
    <?php //endif;  ?>
                <!--</div>-->
                <!--</div>-->
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
                        <input type="hidden" name="is_logged_in_user" id="is_logged_in_user" value="<?php echo $is_logged_in_user ?>"/>
                        <input type="hidden" name="take_to_profile" id="take_to_profile" value="<?php echo $take_to_profile ?>"/>
                        <div class="om_miginfo bor_bot_0" id="profile_data_container">
                            <div class="blog_user_profile widthall">Användarprofil</div>
                            <div class="blog_user_profile_padd"><img src="/images/new_home/blog_line_nav.png" width="600"/></div>
                            <div class="blog_prof_detail">
                                <div class="basfakta_detail widthall">
                                    <div class="prof_subheader widthall mrg_btm_7 mrg_top_32">Basfakta</div>
                                    <span class="prof_a">Ålder:</span>
                                    <span class="prof_q"><?php echo $data_arr['user_age'] ?></span><br/>

                                    <?php $my_occ = explode(':', $user_details->my_occupation); ?>
                                    <?php
                                    if ($my_occ[0] == 'other')
                                        $occ = $my_occ[1];
                                    else
                                        $occ = $occupation_arr[$my_occ[0]];
                                    ?>

                                    <span class="prof_a">Sysselsättning:</span>
                                    <span class="prof_q"><?php echo $occ ?></span><br/>

                                    <span class="prof_a">När jag inte är på börsen... </span>
                                    <span class="prof_q"><?php echo $user_details->not_on_stock ?></span>
                                </div>

                                <div class="trejdingprofil_detail widthall">
                                    <div class="prof_subheader widthall mrg_btm_7 mrg_top_32">Trejdingprofil</div>
                                    <span class="prof_a">Typ av spekulant:</span>
                                    <span class="prof_q"><?php echo ucfirst($type_investor_arr[$user_details->type_of_speculator]) ?></span><br/>

                                    <span class="prof_a">Vilken mäklare använder du?</span>
                                    <span class="prof_q"><?php echo ucfirst($user_details->broker_used) ?></span><br/>

                                    <span class="prof_a">Vad handlar du?</span>
                                    <span class="prof_q"><?php echo $my_trade; ?></span><br/>

                                    <span class="prof_a">Storlek på portfölj:</span>
                                    <span class="prof_q"><?php echo $is_millionaire[$user_details->is_millionaire] ?></span><br/>

                                    <span class="prof_a">Mina fem bästa rekar:</span>
                                    <span class="prof_q"><?php echo str_replace(',', ' , ', $user_details->my_five_best_recommendations) ?></span><br/>

                                    <span class="prof_a">Min blankningslista:</span>
                                    <span class="prof_q"><?php echo str_replace(',', ' , ', $user_details->my_shortlist) ?></span><br/>

                                    <span class="prof_a">Min bästa affär:</span>
                                    <span class="prof_q"><?php echo $user_details->my_best_trade ?></span><br/>

                                    <span class="prof_a">Min sämsta affär:</span>
                                    <span class="prof_q"><?php echo $user_details->my_worst_trade ?></span><br/>
                                </div>

                                <div class="med_egna_ord_detail widthall">
                                    <div class="prof_subheader widthall mrg_btm_7 mrg_top_32">Med egna ord</div>
                                    <span class="prof_q"><?php echo html_entity_decode($user_details->my_own_writing) ?></span><br/>
                                </div>

                                <div class="denna_sida_detail widthall">
                                    <div class="prof_subheader widthall mrg_btm_7 mrg_top_32">Denna sida:</div>
                                    <span class="prof_q"><a href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $user_id ?>" class="viocolor"><?php echo 'http://' . $host_str . '/sbt/sbtMinProfile/id/' . $user_id ?></a></span><br/>
                                </div>

                                <div class="statistik_detail widthall">
                                    <div class="prof_subheader widthall mrg_btm_7 mrg_top_32">Statistik</div>
                                    <div class="blog_prof_stat widthall">Poster totalt:</div>
                                    <span class="prof_a">Antal poster:</span>
                                    <span class="prof_q">
                                        <?php
                                        $votes = $user_profile->getTotalActivitiesOfUser($user_data->user_id, $user_data->firstname . ' ' . $user_data->lastname);
                                        echo $votes;
                                        ?>
                                    </span><br/>
                                    <span class="prof_a">Antal poster per dag:</span>
                                    <span class="prof_q">                    <?php
                                        $days = (strtotime(date("Y-m-d")) - strtotime(substr($user_data->regdate))) / (60 * 60 * 24);
                                        $ratio = $votes / $days;
                                        echo number_format($ratio, 4);
                                        ?>
                                    </span><br/>
                                    <div class="blog_prof_stat widthall mrg_top_25">Besöksmeddelanden</div>

                                    <span class="prof_a">Antal besöksmeddelanden:</span>
                                    <span class="prof_q"><?php echo $message_cnt ?></span><br/>

                                    <span class="prof_a">Senaste meddelande:</span>
                                    <span class="prof_q"><?php
                                        if ($last_message->created_at)
                                            echo date("D j M Y", strtotime($last_message->created_at));
                                        else
                                            echo '-';
                                        ?>
                                    </span><br/>
    <?php if ($is_logged_in_user != 1): ?>

                                        <span class="prof_a">Antal besöksmeddelanden:</span>
                                        <span class="prof_q"><a id="post_message" class="viocolor" href="#">Skicka meddelande till <?php echo $user_profile->getFullUserName($user_id); ?></a></span><br/>
    <?php endif; ?>
                                </div>

                                <div class="statistik_detail widthall">
                                    <div class="blog_prof_stat widthall mrg_top_25">Blogg</div>
                                    <span class="prof_q"><a class="main_link_color cursor" href="<?php echo 'http://' . $host_str . '/sbt/showListOfUserBlog/uid/' . $user_data->user_id ?>"><?php echo 'Visa alla blogbesök till ' . $user_profile->getFullUserName($user_id); ?></a></span><br/>
                                </div>

                                <div class="blogg_detail widthall">
                                    <div class="blog_prof_stat widthall mrg_top_25">Generell information</div>
                                    <span class="prof_a">Senaste aktivitet:</span>
                                    <span class="prof_q">
                                        <?php if ($user_data->inlogdate == '0000-00-00 00:00:00'): ?>
                                            <?php echo '-' ?>
                                        <?php else: ?>
                                            <?php echo substr($user_data->inlogdate, 0, 10) ?>, <?php echo substr($user_data->inlogdate, 11, 5) ?>
    <?php endif; ?>
                                    </span><br/>
                                    <span class="prof_a">Medlem sedan:</span>
                                    <span class="prof_q"><?php echo substr($user_data->regdate, 0, 10) ?></span><br/>
                                </div>

                                <div class="curverect_bottombg"></div>
                                <div class="inner_page_divider_2">&nbsp;</div>
                                <div class='floatLeft custome_button_twitter cursor margin_rgt_share'><img src="/images/new_home/twittra.png" height="20"/></div>
                                <?php $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>
                                <div class='floatLeft margin_rgt_share' data-href="http://www.hallenborgsandstrom.se" data-layout="button_count" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>&amp;src=sdkpreparse"><img src="/images/new_home/gilla.png" height="20"/></a></div>
                                <!--<div class='floatLeft'><a class="addthis_button_google_plusone_share" href="http://www.addthis.com/bookmark.php?v=250&amp;username=borstjanaren"><img src="/images/new_home/gilla.png" /></a></div>-->
                                <!--code by sandeep  End -->

                                <div class='floatLeft margin_rgt_share'><a href="http://www.addthis.com/bookmark.php?v=250&amp;username=borstjanaren" class="addthis_button"><img src="/images/new_home/dela.png" height="20"/></a></div>
                                <script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
                                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=borstjanaren"></script>
                                <!-- AddThis Button END -->
                                <div class='floatLeft margin_rgt_share'><a class="main_link_color" href="<?php echo 'http://' . $host_str . '/borst/tipAFriendForm/article_id/' . $article_data->article_id; ?>"><img src="/images/new_home/tipsa.png" height="20"/></a></div>

                            </div>
                        </div>
                    </div>
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
<div class="inner_page_divider_3">&nbsp;</div>
<div class="float_right margin_right_testimonial margin_testimonial">
    <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
</div>

<!-- Used when logged In user wants to send message to his own friends. -->
<div id="send_msg_dialog" title="Post a Message" class="hide_div">
    <form name="post_message_to_user" id="post_message_to_user" method="post" action="" >
        <table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr><td><?php echo $messageForm->renderHiddenFields() ?>	</td></tr>
            <input type="hidden" value="<?php echo $user_id; ?>" id="uid" name="uid"/>

            <tr>
                <td>Meddelande: <span id="message_error" style="color:#FF0000; display:none;"><?php echo __('Meddelanderutan är tom!') ?></span></td>
            </tr>
            <tr>
                <td><?php echo $messageForm['message_detail']->render(array('cols' => 70, 'rows' => 5)) ?></td>
            </tr>
        </table>
    </form>
</div>

<!-- dialog-delete-blog -->
<div id="deleteblog_confirm_box" title="Delete Blog Topic Confirmation" class="hide_div">
    <table width="100%"  border="0" cellspacing="3" cellpadding="0">
        <tr>
            <td id="delete_blog_msg">Meddelande: <?php echo __('Är du säker på att du vill ta bort bloggposten?') ?></td>
        </tr>
    </table>
</div>
<div id="pop-box-over" class="display-none" style=""></div>