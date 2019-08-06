<!--[if IE 7]>
<style>
#sortby_activity .float_right{ float:left; position:relative;}
</style>
<![endif]-->
    <div class="float_left listing" id="usertoplist_list_page" style="width:100%;">
      
      <div class="paginationwrapper dummy1">
          <div class="pagination" id="usertoplist_listing">
            <?php if ($pager->haveToPaginate()): ?>
        	<a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"> <img src="/images/left_arrow_trans.png" alt="arrow" /> </a> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> < </a>
        	<?php $links = $pager->getLinks(11); foreach ($links as $page): ?>
        	<?php if($page == $pager->getPage()): ?>
        	<?php echo '<span class="selected">'.$page.'</span>' ?>
        	<?php else: ?>
        	<a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
        	<?php endif; ?>
        	<?php if ($page != $pager->getCurrentMaxLink()): ?>
        	-
        	<?php endif ?>
        	<?php endforeach ?>
        	<a id="<?php echo $pager->getNextPage(); ?>" class="cursor"> > </a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"> <img src="/images/right_arrow_trans.png" alt="arrow" /> </a>
        	<?php endif ?>
          </div>
        </div>

      <input type="hidden" id="usertoplist_current_column_order" name="usertoplist_current_column_order" value="<?php echo $current_column_order; ?>" />
      <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
      <input type="hidden" id="user_view_type" name="user_view_type" value="<?php echo $type ?>"/>
      
          <ul id="usertoplist_column_row">
          <li  class="first width_90"><?php echo __('Ikon')?></li>
          <li  class="bg width_345"><a id="sortby_author" class="float_left cursor"><span class="float_left"><?php echo __('Användare')?></span></a></li>
          <li  class="bg width_64 float_right"><a id="sortby_vote" class="cursor float_right"><span class="float_right"><?php echo __('Röster')?></span></a></li>
          <li  class="last width_115 float_right"><a id="sortby_activity" class="float_right cursor"><span class="float_right"><?php echo __('Aktiviteter')?></span></a></li>
        </ul>
        
        <div id="usertoplist_topic_list">
        <?php $i = 0; foreach ($pager->getResults() as $user): ?>
        <ul class="<?php echo $i%2 == 0 ? 'classnot' : 'white'; ?>">
          <li class="dark_blue width_90">
          <?php if($user_photo_arr[$user->user_id]!=''):?>
            <a href="<?php echo "http://".$host_str ?>/sbt/sbtMinProfile/id/<?php echo $user->user_id; ?>"><img src="/uploads/userThumbnail/<?php echo str_replace('.','_small.',$user_photo_arr[$user->user_id]); ?>" alt="user_photo"/></a>
          <?php else:?>
            <a href="<?php echo "http://".$host_str ?>/sbt/sbtMinProfile/id/<?php echo $user->user_id; ?>"><img src="/images/userphoto.jpg" alt="photo" width="26" height="26" /></a>
          <?php endif;?> 
          </li>
          <li class="pink width_350"><a class="lineht_24" href="<?php echo "http://".$host_str ?>/sbt/sbtMinProfile/id/<?php echo $user->user_id; ?>"><?php echo  $profile->getFullUserName($user->user_id) ?></a></li>
          <li class="light_blue width_64 talign_left" ><span class="float_right lineht_24"><?php echo $user->cnt; ?></span></li>
          <li class="width_115 float_right"><span class="float_right lineht_24"><?php echo $user->getTotalActivitiesOfUser($user->user_id,$user->firstname.' '.$user->lastname); ?></span></li>
          
        </ul>
        <?php $i++; endforeach; ?>
      </div>
     
<div class="paginationwrapper">
  <div class="pagination dummy2" id="usertoplist_listing">
    <?php if ($pager->haveToPaginate()): ?>
	<a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"> <img src="/images/left_arrow_trans.png" alt="arrow" /> </a> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> < </a>
	<?php $links = $pager->getLinks(11); foreach ($links as $page): ?>
	<?php if($page == $pager->getPage()): ?>
	<?php echo '<span class="selected">'.$page.'</span>' ?>
	<?php else: ?>
	<a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
	<?php endif; ?>
	<?php if ($page != $pager->getCurrentMaxLink()): ?>
	-
	<?php endif ?>
	<?php endforeach ?>
	<a id="<?php echo $pager->getNextPage(); ?>" class="cursor"> > </a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"> <img src="/images/right_arrow_trans.png" alt="arrow" /> </a>
	<?php endif ?>
  </div>
</div>
