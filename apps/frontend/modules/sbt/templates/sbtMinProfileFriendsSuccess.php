<div class="msgheading"><font color="#c50063"><?php echo count($friend_id) ?></font> Friends</div>
<?php foreach($pager->getResults() as $data): ?>
<div class="messagewrapper">
  <div class="float_left"><a href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->user_id ?>">
  <?php if($user_photo_arr[$data->user_id]!=''):?>
	<img src="/uploads/userThumbnail/<?php echo str_replace('.','_semilarge.',$user_photo_arr[$data->user_id]); ?>" alt="user_photo"/>
  <?php else:?>
	<img src="/images/small_userphoto.jpg" alt="photo" />
  <?php endif;?> 
  </a></div>
  <div class="info">
    <div class="float_left widthall"><b class="main_link_color"><a class="main_link_color" href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->user_id ?>"><?php echo $profile->getFullUserName($data->user_id) ?></a></b> <b class="lightbluefont"><?php echo substr($data->regdate,0,10) ?></b>
      <?php if($data->user_id != $logged_user):?>
<!--      <b class="lightbluefont" style="margin-left:3px;"><a id="comment_on_any_user" name="<?php echo $logged_user.','.$data->user_id.',send_msg_dialog' ?>" style="color:#c50063; cursor:pointer;"><?php echo __('Skicka meddelande')?></a></b>-->
       <b class="lightbluefont" style="margin-left:3px;"><a id="<?php echo $data->user_id;?>" name="<?php echo $logged_user.','.$data->user_id.',send_msg_dialog' ?>" style="color:#c50063; cursor:pointer;"><?php echo __('Skicka meddelande')?></a></b>
      <?php endif; ?>
    </div>
    <?php //echo html_entity_decode($data->message_detail)?>
  </div>
</div>
<?php endforeach; ?>
<!--</div>--> <!-- i will do this-->
<div class="paginationwrapper">
<div class="float_right lightbluefont">
  <?php if ($pager->haveToPaginate()): ?>
  Showing Friends <?php echo $pager->getFirstIndice() ?> - <?php echo $pager->getLastIndice() ?> av <?php echo $pager->getNbResults()?>
  <?php endif ?>
</div>
<div class="pagination">
  <?php if ($pager->haveToPaginate()): ?>
  <?php echo link_to('<img src="/images/pag_arrow_left.jpg" alt="arrow" />', 'sbt/sbtMinProfileFriends?page='.$pager->getFirstPage().'&id='.$user_id) ?> <?php echo link_to('&lt;', 'sbt/sbtMinProfileFriends?page='.$pager->getPreviousPage().'&id='.$user_id) ?>
  <?php $links = $pager->getLinks(10); foreach ($links as $page): ?>
  <?php echo ($page == $pager->getPage()) ? '<span class="selected">'.$page.'</span>' : link_to($page, 'sbt/sbtMinProfileFriends?page='.$page.'&id='.$user_id) ?>
  <?php if ($page != $pager->getCurrentMaxLink()): ?>
  -
  <?php endif ?>
  <?php endforeach; ?>
  <?php echo link_to('&gt;', 'sbt/sbtMinProfileFriends?page='.$pager->getNextPage().'&id='.$user_id) ?> <?php echo link_to('<img src="/images/pag_arrow_right.jpg" alt="arrow" />', 'sbt/sbtMinProfileFriends?page='.$pager->getLastPage().'&id='.$user_id) ?>
  <?php endif ?>
</div>
</div>
<!-- i will do this-->