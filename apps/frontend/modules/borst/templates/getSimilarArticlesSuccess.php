<div class="inner_page_content_main">
	<div class="float_left widthall"><?php echo iconv("windows-1252", "UTF-8", $sf_data->getRaw('file_content')); ?></div>
	<div class="float_left widthall"><img src="/images/new_home/article_pict.png" class="article_pict_mrg" width="50"/><span class="art_subheading"><?php echo 'Tidigare artiklar på Börstjänaren:'; ?></span></div>
        <div class="blank_7h widthall">&nbsp;</div>
	<div class="float_left widthall art_topic">
		<table cellpadding="0" cellspacing="0" border="0">
			<?php foreach ($pagerForSimilarArticles->getResults() as $list){
						echo '<tr><td class="related_article_date">'.substr($list->article_date,0,10).'</td><td><a class="main_link_color" href="https://'.$_SERVER['HTTP_HOST'].'/borst/borstArticleDetails/article_id/'.$list->article_id.'">'.$list->title.'<a/></td></tr>';
					}
			?>
		</table>
	</div>
</div>
<div class="clearAll"></div>				
<div class="paginationwrapperNew">
  <div class="forum_pag similar_article_listing_pager" id="">
	<?php if ($pagerForSimilarArticles->haveToPaginate()): ?>
	<?php if($pagerForSimilarArticles->getFirstPage() != $pagerForSimilarArticles->getPage()) { ?>
		<a id="<?php echo $pagerForSimilarArticles->getFirstPage(); ?>" class="cursor"><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pagerForSimilarArticles->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
	<?php } ?>
	<?php $links = $pagerForSimilarArticles->getLinks(11); foreach ($links as $page): ?>
	<?php if($page == $pagerForSimilarArticles->getPage()): ?>
	<?php echo '<span class="selected">'.$page.'</span>' ?>
	<?php else: ?>
	<a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
	<?php endif; ?>
	<?php if ($page != $pagerForSimilarArticles->getCurrentMaxLink()): ?>
	
	<?php endif ?>
	<?php endforeach ?>
	<?php if($pagerForSimilarArticles->getLastPage() != $pagerForSimilarArticles->getPage()) { ?>
		<a id="<?php echo $pagerForSimilarArticles->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pagerForSimilarArticles->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span> </a>
	<?php } ?>
	<span>Sid <?php echo $pagerForSimilarArticles->getPage(); ?> av <?php echo $pagerForSimilarArticles->getLastPage(); ?></span>
	<span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
	<div class="forum_popup_pagination_wrapper" noclick="1" >
		<ul class="pagination_ul">
		<?php for ($pg = 1; $pg <= $pagerForSimilarArticles->getLastPage(); $pg++) { ?>
			<li onclick="javascript:paginationUlGo(this);"><?php echo $pg; ?></li>
		<?php } ?>
		</ul>
	</div>
	<?php endif ?>
  </div>
</div>