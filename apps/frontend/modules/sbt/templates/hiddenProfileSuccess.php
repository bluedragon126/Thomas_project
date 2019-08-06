<input type="hidden" name="current_user" id="current_user" value="<?php echo $user_id ?>"/>
<div class="maincontentpage" id="minsid">
        <div class="mainconetentinner">
          <div class="minsid_rightdiv ptop_10 mleft_160">
            <div class="curverect_topbg"></div>	
	     <div class="curverect_midbg">
              <div class="midsi_inner">	
		<div class="om_miginfo bor_bot_0 talign_center">
                    <b><?php echo __('Denna användare har valt att inte visa sin profil.') ?></b>
                    <?php if(!$isFriend)
                    { ?>
                    <div id="send_friend_req" class="widthall talign_center">
                        <span class="main_link_color"><a id="friend_request" class="main_link_color blog_welc_links" href="#">Adda som vän </a> </span>
                    </div>
                    <?php } ?>
					<div id="send_friend_req_msg" class="widthall talign_center violetlink"></div>
                </div>
              </div>
            </div>
            <div class="curverect_bottombg"></div>
          </div>
        </div>
</div>

<!-- Used on MinProfile page left side section, for sending a friend request. -->
<div id="friend_request_box" title="Add <?php echo $user_data->firstname.' '.$user_data->lastname ?> as a friend?" class="hide_div">
<form name="friend_request_form" id="friend_request_form" method="post" action="<?php //echo url_for('sbt/sbtMinProfile') ?>" >
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
 	<tr><td><?php echo $friendRequestForm->renderHiddenFields()?></td></tr>
	<tr>
		<td>
		<?php if($user_photo_data): ?>
		<div class="float_left widthall margin_bottom_10">
			<img src="/uploads/userThumbnail/<?php echo str_replace('.','_large.',$user_photo_data->profile_photo_name); ?>" alt="user_photo" />
		</div>
		<?php else: ?>
		<div class="minleft_userphoto" style="border:0px solid red;">
			<img src="/images/userphoto.jpg" alt="default_user" />
		</div>
		<?php endif; ?>
		</td>
		<td>
			<table width="100%"  border="0" cellspacing="3" cellpadding="0">
				<tr>&nbsp;<?php echo $user_data->firstname.' '.$user_data->lastname ?></tr>
				<tr>
					<td>Message: <span id="friend_message_error" style="color:#FF0000; display:none;"><?php echo __('Message box is empty')?></span></td>
				</tr>
				<tr><td><?php echo $friendRequestForm['message']->render(array('cols'=>60, 'rows'=>4))?></td></tr>
			</table>
		</td>
	</tr>
 </table>
</form>
</div>

