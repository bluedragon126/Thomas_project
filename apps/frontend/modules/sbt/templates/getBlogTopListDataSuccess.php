<div class="paginationwrapper dummy1">
  <div class="pagination" id="blogtoplist_listing">
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
<div class="float_left listing" id="blogtoplist_list_page" >
   
      <input type="hidden" id="blogtoplist_current_column_order" name="blogtoplist_current_column_order" value="<?php echo $current_column_order; ?>" />
      <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
      <input type="hidden" id="blog_view_type" name="blog_view_type" value="<?php echo $type ?>"/>
     
     <ul id="blogtoplist_column_row" class="headerList">
          <li class="first width_300"><a id="sortby_title" class="float_left cursor"><span class="float_left"><?php echo __('Rubrik')?></span></a></li>
          <li class="bg width_125"><a id="sortby_author"  class="float_left cursor"><span class="float_left"><?php echo __('Författare')?></span></a></li>
          <li class="bg width_150"><a id="sortby_date" name="borst_result" class="float_left cursor"><span class="float_left"><?php echo __('Uppdaterad')?></span></a></li>
           <?php if($type == 'vote'):?>
          <li class="last width_38"><a id="sortby_vote" class="float_right cursor"><span class="float_right"><?php echo __('Röster')?></span></a></li>
          <?php else:?>
          <li class="last width_38"><a id="sortby_view" class="float_right cursor"><span class="float_right"><?php echo __('Visad')?></span></a></li>
          <?php endif;?>
        </ul>
       <div id="blogtoplist_topic_list">
		<?php $i = 0; foreach ($pager->getResults() as $blog): ?>
         <ul class="<?php echo $i%2 == 0 ? 'classnot' : 'white'; ?>">
          <li class="dark_blue "><a class="cursor" href="<?php echo "https://".$host_str ?>/sbt/sbtBlogDetails/blog_id/<?php echo $blog->id ?>"><span class="blogtoplist_blogtitle"><?php echo html_entity_decode($blog->ublog_title) ?></span></a></li>
          <li class="pink width_125"><a class="cursor" href="<?php echo "https://".$host_str ?>/sbt/sbtMinProfile/id/<?php echo $blog->author_id; ?>"><span class="blogtoplist_blogauthor"><?php echo $profile->getFullUserName($blog->author_id) ?></span></a></li>
          <li class="faint_blue width_150"><?php echo $blog->updated_at ? $blog->updated_at : $blog->created_at; ?></li>
          <li class="light_blue  float_right <?php echo $type == 'vote' ? 'width_38' : 'width_38'?>" ><span class="float_right"><?php echo $type == 'vote' ? $blog->ublog_votes : $blog->ublog_views ?></span></li>
        </ul>
        <?php $i++; endforeach; ?>
     </div>
<div class="paginationwrapper">
  <div class="pagination dummy2" id="blogtoplist_listing">
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
