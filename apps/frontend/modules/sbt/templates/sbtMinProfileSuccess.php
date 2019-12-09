<?php use_stylesheet('custom-theme/jquery-ui-1.8.2.custom_sbt.css');?>
<script type="text/javascript" language="javascript">
    $(document).ready(function(){
		$('#sbtMinProfileMyAccount').trigger('click');
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
    .blogleft_divpart{border-right: 1px solid #d3d6e1;
    float: left;
    height: auto;
    position: relative;
    width: 311px;
    }
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
</style>
<div class="maincontentpage" id="minsid">
	<?php if($user_id): ?>
        <div class="mainconetentinner">
          <?php /*?><div class="minsid_topwrapper">
          <div class="minprofile_heading">
            <h1 class="minsid_heading widthall"><font  color="#d9dadb"><?php echo $user_profile->getFullUserName($user_data->user_id) ?></font></h1>
          </div>
          <div class="editprofile_links">
            <?php if($show_top_links == 1):?>
				<div class="profilelink"> <!--<a href="#">Mina sidor | </a> -->
                <?php //if($user_data->from_sbt == 1 && $user_data->sbt_active == 1):?>
                	<?php /*?><a href="http://<?php echo $host_str?>/sbt/editBlogProfile/edit_user_id/<?php echo $user_id ?>">Editera Blog profil | </a><?php */?>
                <?php //endif; 
                /*?>
                <a href="http://<?php echo $host_str?>/sbt/editProfile/edit_user_id/<?php echo $user_id ?>">Editera profil</a> </div>
			<?php endif; ?>
          </div>
          </div><?php */?>
          <div class="blogleft_divpart">
			<?php include_partial('global/profile_left_top',array('user_data'=>$user_data,'data_arr'=>$data_arr,'host_str'=>$host_str,'user_id'=>$user_id,'friendRequestForm'=>$friendRequestForm,'is_friend_request'=>$is_friend_request,'friend_id'=>$friend_id,'friend_name'=>$friend_name,'show_top_links'=>$show_top_links,'visitor_name_id_arr'=>$visitor_name_id_arr,'gold_cnt'=>$gold_cnt,'silver_cnt'=>$silver_cnt,'bronze_cnt'=>$bronze_cnt,'user_guard_data'=>$user_guard_data,'user_profile'=>$user_profile,'own_profile'=>$own_profile,'edit_mode'=>$edit_mode,'user_photo_data'=>$user_photo_data,'user_photo_arr'=>$user_photo_arr,'isSuperAdmin'=>$isSuperAdmin,'user_details'=>$user_details)) ?>
            <div class="minsid_lefttopdiv_banner">&nbsp;</div>
            <?php include_partial('global/profile_left_bottom',array('ad_1'=>$ad_1,'ad_2'=>$ad_2,'set_margin'=>'1','ad_3'=>$ad_3,'ad_4'=>$ad_4)) ?>
          </div>
          <div class="minsid_rightdiv">
            <div class="curverect_topbg"></div>
            <div class="curverect_midbg">
              <div class="midsi_inner_tab">
                <?php include_partial('global/profile_menu',array('host_str'=>$host_str,'user_id'=>$user_id,'action'=>$action,'show_top_links'=>$show_top_links)) ?>
              </div>
            </div>
            <div class="curverect_bottombg"></div>
            <div class="curverect_topbg"></div>	
            <div class="curverect_midbg">
              <div class="midsi_inner">	
                <input type="hidden" name="current_user" id="current_user" value="<?php echo $user_id ?>"/>
				<input type="hidden" name="is_logged_in_user" id="is_logged_in_user" value="<?php echo $is_logged_in_user ?>"/>
				<?php if($update_msg):?>
                    <div class="float_left widthall" style="border:1px solid #00CC33; margin-bottom:10px; padding:5px;"><font color="#00CC33"><?php echo $update_msg; ?></font></div>
				<?php endif; ?>
				<div class="om_miginfo" id="profile_data_container">
					<div class="om_miginfo bor_bot_0" id="profile_data_container">                   
					</div>
                </div>
              </div>
            </div>
            <div class="curverect_bottombg"></div>
            
            
            <div class="inner_page_divider_3" style="height:199px;">&nbsp;</div>
            <div class="float_right margin_right_testimonial_II margin_testimonial"><img src="/images/new_home/testimonial_L.png" width="500"/></div>
          </div>
        </div>
      </div>
	<?php else: ?>
	<div class="forumlistingleftdiv" style="width:964px;">
		<div class="shoph3 widthall">För att se profilen, vänligen välj användare först.</div>
		<div class="float_left widthall">För att se användarlistan, klicka <a href="<?php echo "http://".$host_str ?>/sbt/sbtUser">här</a></div>
		<div class="float_left widthall">&nbsp;</div>
	</div>
	<?php endif; ?>
</div>

<!-- Used on message tab for user posting a message. -->
<div id="profile_msg_postmessage_dialog" title="Post a Message" class="hide_div">
<form name="profile_msg_postmessage_form" id="profile_msg_postmessage_form" method="post" action="<?php //echo url_for('sbt/sbtMinProfileMessage') ?>" >
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
 	<tr><td><?php echo $messageForm->renderHiddenFields()?>	</td></tr>
	<tr>
		<td>Meddelande: <span id="message_error" style="color:#FF0000; display:none;"><?php echo __('Meddelanderutan är tom!')?></span></td>
	</tr>
	<tr>
		<td><?php echo $messageForm['message_detail']->render(array('cols'=>70, 'rows'=>5))?></td>
	</tr>
 </table>
</form>
</div>

<!-- Used on MinProfile page left side section, for sending a friend request. -->
<div id="friend_request_box" title="Add <?php echo $user_profile->getFullUserName($user_data->user_id) ?> as a friend?" class="hide_div">
<form name="friend_request_form" id="friend_request_form" method="post" action="<?php //echo url_for('sbt/sbtMinProfile') ?>" >
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
 	<tr><td><?php echo $friendRequestForm->renderHiddenFields()?></td></tr>	
	<tr>
		<td>
		<?php if($user_photo_data): ?>
		<div class="float_left widthall" style="margin-bottom:10px;">
			<img src="/uploads/userThumbnail/<?php echo str_replace('.','_large.',$user_photo_data->profile_photo_name); ?>" alt="user_photo" />
		</div>
		<?php else: ?>
		<div class="minleft_userphoto" style="border:0px solid red;">
			<img src="/images/new_home/blog_user_img.png" width="107" class="border_radius_7" alt="default_user" />
		</div>
		<?php endif; ?>
		</td>
		<td>
			<table width="100%"  border="0" cellspacing="3" cellpadding="0">
				<tr>&nbsp;<?php echo $user_profile->getFullUserName($user_data->user_id) ?></tr>
				<tr>
					<td>Meddelande: <span id="friend_message_error" style="color:#FF0000; display:none;"><?php echo __('Meddelanderutan är tom!')?></span></td>
				</tr>
				<tr><td><?php echo $friendRequestForm['message']->render(array('cols'=>60, 'rows'=>4))?></td></tr>
			</table>
		</td>
	</tr>
 </table>
</form>
</div>
<!-- Used when logged In user wants to send message to his own friends. -->
<!--<div id="send_msg_dialog1" title="Post a Message" class="hide_div">
<form name="post_message_to_user" id="post_message_to_user" method="post" action="" >
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
 	<tr><td><?php echo $messageForm->renderHiddenFields()?>	</td></tr>
	<input type="hidden" value="<?php echo $user_id; ?>" id="uid" name="uid"/>

	<tr>
		<td>Meddelande: <span id="message_error1" style="color:#FF0000; display:none;"><?php echo __('Meddelanderutan är tom!')?></span></td>
	</tr>
	<tr>
		<td><?php //echo $messageForm['message_detail']->render(array('cols'=>70, 'rows'=>5))?></td>
            <td><textarea cols="70" rows="5" id="sbt_messages_message_detail1" name="sbt_messages[message_detail]"></textarea></td>
	</tr>
 </table>
</form>
</div>-->
