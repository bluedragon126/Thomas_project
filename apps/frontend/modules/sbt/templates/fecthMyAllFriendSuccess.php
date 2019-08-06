<div class="blank_10h widthall">&nbsp;</div>
<h3 class="minleft_heading2"><?php echo count($friend_id)?> vänner</h3>
<a href="#" class="main_link_color float_right"><?php echo count($friend_id) > 8 ? 'More' : '' ?></a>
<div class="float_left widthall">
	<?php for($i=0 ; $i<count($friend_id) ; $i++):?>
		<a href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $friend_id[$i] ?>">
		<span class="photo_container">
			<?php if($user_photo_arr[$friend_id[$i]]!=''):?>
				<img src="/uploads/userThumbnail/<?php echo str_replace('.','_semilarge.',$user_photo_arr[$friend_id[$i]]); ?>" alt="user_photo" class="float_left"/>
			<?php else:?>
				<img src="/images/small_userphoto.jpg" alt="photo" class="float_left" />
			<?php endif;?>
			<span class="main_link_color float_left"><?php echo $friend_name[$i] ?></span>
		</span>
		</a>
		<div class="blank_10w">&nbsp;</div>
	<?php endfor;?>
</div>