<?php if ($pager->haveToPaginate()): ?>
	  <a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"><img src="/images/left_arrow_trans.png" alt="arrow" /> </a> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> < </a>
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