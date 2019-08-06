<div class="msgheading"><font color="#c50063"><?php echo $message_cnt ?></font> <?php echo __('Kommentarer')?>
  <?php if($show_top_links!=1):?>
  <a id="profile_msg_postmessage" class="viocolor" href="#"><font color="#c50063" size="2" style="margin-left:30px;"><?php echo __('Ny kommentar')?></font></a>
  <?php endif; ?>
</div>
<?php foreach($pager->getResults() as $data): ?>
<div class="messagewrapper">
  <div class="float_left"><a href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->message_from ?>">
  <?php if($user_photo_arr[$data->message_from]!=''):?>
	<img src="/uploads/userThumbnail/<?php echo str_replace('.','_semilarge.',$user_photo_arr[$data->message_from]); ?>" alt="user_photo"/>
  <?php else:?>
	<img src="/images/small_userphoto.jpg" alt="photo" />
  <?php endif;?> 
  </a></div>
  <div class="info">
    <div class="float_left widthall"><b class="main_link_color"><a class="main_link_color" href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->message_from ?>"><?php echo $profile->getFullUserName($data->message_from) ?></a></b> <b class="lightbluefont"><?php echo $data->created_at ?></b></div>
    <span class="profile_messagepostlist_title"><?php echo html_entity_decode($data->message_detail)?></span></div>
</div>
<?php endforeach; ?>
</div>
<div class="paginationwrapper">
<div class="float_left lightbluefont">
  <?php if ($pager->haveToPaginate()): ?>
  Meddelanden <?php echo $pager->getFirstIndice() ?> - <?php echo $pager->getLastIndice() ?> av <?php echo $pager->getNbResults()?>
  <?php endif ?>
</div>
    
<!--<div class="pagination dummy1">
  <?php if ($pager->haveToPaginate()): ?>
  <?php echo link_to('<img src="/images/pag_arrow_left.jpg" alt="arrow" />', 'sbt/sbtMinProfileMessage?page='.$pager->getFirstPage().'&id='.$user_id) ?> <?php echo link_to('&lt;', 'sbt/sbtMinProfileMessage?page='.$pager->getPreviousPage().'&id='.$user_id) ?>
  <?php $links = $pager->getLinks(11); foreach ($links as $page): ?>
  <?php echo ($page == $pager->getPage()) ? '<span class="selected">'.$page.'</span>' : link_to($page, 'sbt/sbtMinProfileMessage?page='.$page.'&id='.$user_id) ?>
  <?php if ($page != $pager->getCurrentMaxLink()): ?>
  -
  <?php endif ?>
  <?php endforeach ?>
  <?php echo link_to('&gt;', 'sbt/sbtMinProfileMessage?page='.$pager->getNextPage().'&id='.$user_id) ?> <?php echo link_to('<img src="/images/pag_arrow_right.jpg" alt="arrow" />', 'sbt/sbtMinProfileMessage?page='.$pager->getLastPage().'&id='.$user_id) ?>
  <?php endif ?>
</div>-->

<input type="hidden" name="current_user" id="current_user" value="<?php echo $user_id ?>"/>
    
<div class="pagination" id="comment_list" >
    <?php if ($pager->haveToPaginate()): ?>
    <a id="<?php echo $pager->getFirstPage(); ?>" style="cursor:pointer;"><img src="/images/pag_arrow_left.jpg" alt="arrow" />  </a> <a id="<?php echo $pager->getPreviousPage(); ?>" style="cursor:pointer;"> < </a>
    <?php $links = $pager->getLinks(11); foreach ($links as $page): ?>
    <?php if($page == $pager->getPage()): ?>
    <?php echo '<span class="selected">'.$page.'</span>' ?>
    <?php else: ?>
    <a id="<?php echo $page; ?>" style="cursor:pointer;"><?php echo $page; ?> </a>
    <?php endif; ?>
    <?php if ($page != $pager->getCurrentMaxLink()): ?>
    -
    <?php endif ?>
    <?php endforeach ?>
    <a id="<?php echo $pager->getNextPage(); ?>" style="cursor:pointer;"> > </a> <a id="<?php echo $pager->getLastPage(); ?>" style="cursor:pointer;"> <img src="/images/pag_arrow_right.jpg" alt="arrow" /> </a>
    <?php endif ?>
</div>
		