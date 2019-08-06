<div class="msgheading"><font color="#c50063"><?php echo $request_cnt ?></font> Request</div>
<?php foreach($pager->getResults() as $data): ?>
<div class="messagewrapper">
  <div class="float_left">
  <?php if($user_photo_arr[$data->contactor_id]!=''):?>
	<img src="/uploads/userThumbnail/<?php echo str_replace('.','_semilarge.',$user_photo_arr[$data->contactor_id]); ?>" alt="user_photo"/>
  <?php else:?>
	<img src="/images/small_userphoto.jpg" alt="photo" />
  <?php endif;?> 
  </div>
  <div class="info">
    <div class="float_left widthall pbottom_10"><b class="main_link_color"><?php echo $profile->getFullUserName($data->contactor_id) ?></b> <b class="lightbluefont"><?php echo substr($data->created_at,0,10) ?></b></div>
    <div class="float_left widthall"><div class="profile_friendrequest_message"><?php echo html_entity_decode($data->message)?></div></div>
    <div id="reply_div_id<?php echo $data->id ?>" class="float_left widthall ptop_10"> 
    	<a class="cursor" onclick="reply_to_request('1','<?php echo $data->id ?>')">
      		<div class="float_left friend_request"><b>Accept</b></div>
      	</a> 
        <a class="cursor" onclick="reply_to_request('2','<?php echo $data->id ?>')">
      		<div class="float_left friend_request mleft_10"><b>Deny</b></div>
      	</a> 
        <a class="cursor" onclick="reply_to_request('3','<?php echo $data->id ?>')">
      		<div class="float_left friend_request mleft_10"><b>Block</b></div>
      	</a> 
     </div>
  </div>
</div>
<?php endforeach; ?>
