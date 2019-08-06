<?php $i=0; foreach($comment_list as $data):?>
<div class="float_left widthall">
  <div class="float_left">
    <?php if($user_photo_arr[$data->comment_by]!=''):?>
    <img src="/uploads/userThumbnail/<?php echo str_replace('.','_small.',$user_photo_arr[$data->comment_by]); ?>" alt="user_photo"/>
    <?php else:?>
    <img src="/images/new_home/blog_user_img.png" alt="photo" />
    <?php endif;?>
  </div>
  <div  class="blogppersonalinfo main_link_color"><span class="blog_rightpanel_comment"><?php echo $data->blog_comment ?></span><br />
    <b class=" borst_subtitle_4"><?php echo $profile->getFullUserName($data->comment_by) ?></b></div>
  <div class="grayline">&nbsp;</div>
  <div class="blank_10h widthall">&nbsp;</div>
</div>
<?php $i++; endforeach;?>

