<!--[if IE 7]>
<style>
#sortby_view .float_right{ float:left; position:relative;}
#sortby_comment .float_right{ float:left; position:relative;}
.pleft_15{padding-left:35px;}
</style>
<![endif]-->

<!--[if IE 8]>
<style>
.width_107{ width:115px;}
</style>
<![endif]-->

      
       <div class="paginationwrapper dummy1">
  <div class="pagination" id="articletoplist_listing">
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

      <input type="hidden" id="articletoplist_current_column_order" name="articletoplist_current_column_order" value="<?php echo $current_column_order; ?>" />
      <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
      <input type="hidden" id="article_view_type" name="article_view_type" value="<?php echo $type ?>"/>
      
       <ul id="articletoplist_column_row">
          <li class="first width_220"><a id="sortby_title" class="float_left cursor"><span class="float_left"><?php echo __('Rubrik')?></span></a></li>
          <li class="bg width_178"><a id="sortby_author" class="float_left cursor"><span class="float_left" ><?php echo __('Författare')?></span></a></li>
          <li class="bg width_170"><a id="sortby_date" class="float_left cursor"><span class="float_left"><?php echo __('Datum')?></span></a></li>

          <?php if($type == 'comment'):?>
          <li class="last float_right width_45"><a id="sortby_comment" class="float_right cursor"><span class="float_right"><?php echo __('Komm')?></span></a></li>
          <?php else:?>
          <li class="last float_right width_45"><a id="sortby_view" class="float_right cursor"><span class="float_right"><?php echo __('Läst')?></span></a></li>
          <?php endif;?>
        </ul>
        
        <div id="articletoplist_topic_list">
        <?php $i = 0; foreach ($pager->getResults() as $article): ?>
        <ul class="<?php echo $i%2 == 0 ? 'classnot' : 'white'; ?>">
          <li class="dark_blue width_210 pright_10"><a href="<?php echo "https://".$host_str."/borst/borstArticleDetails/article_id/".$article->article_id ?>"><?php echo $article->title ?></a></li>
          <li class="pink width_168">
          <?php if($profile->getUserFromFullName($article->author)):?>
          	<a href="<?php echo "https://".$host_str."/sbt/sbtMinProfile/id/".$profile->getUserFromFullName($article->author); ?>"><?php echo $article->author ?></a>
          <?php else: ?>
          	<?php echo $article->author ?>
          <?php endif; ?>
          </li>
          <li class="faint_blue width_175"><?php echo $article->article_date ?></li>
          <li class="light_blue float_right width_45"><span class="float_right"><?php echo $type == 'comment' ? $article->comment_cnt : $article->view_cnt ?></span></li>
        </ul>
        <?php $i++; endforeach; ?>
      </div>
<div class="paginationwrapper">
  <div class="pagination dummy2" id="articletoplist_listing">
 
    <?php if ($pager->haveToPaginate()): ?>
         
		<a id="<?php echo $pager->getFirstPage(); ?>" class="cursor">
        
         <img src="/images/left_arrow_trans.png" alt="arrow" /> </a> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> < </a>
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
