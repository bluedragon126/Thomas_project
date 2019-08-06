<div class="shoph3 widthall">BT-Shop Article List</div>

<div class="listing">
<input type="hidden" id="shop_article_column_order" name="shop_article_column_order" value="<?php echo $current_column_order; ?>"/>
<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
<input type="hidden" id="shop_article_column" name="shop_article_column" value="<?php echo $cur_column; ?>"/>
<input type="hidden" id="delete_shop_article_id" name="delete_shop_article_id"/>
<input type="hidden" id="selected_article_type" name="selected_article_type" value="<?php echo $selected_article_type ?>"/>
</div>
<div class="float_left listing" style="border:0px solid red;">
<div id="update_msg" class="float_left widthall" style="width:913px; color:#00FF33;"></div>
<!--<div class="float_left widthall" style="width:913px; overflow:hidden; overflow-x:scroll;">-->
<div class="float_left widthall" style="width:915px; border:0px solid green;">
<?php include_partial('borst/btshop_article_list_partial', array('pager'=>$pager,'host_str'=>$host_str,'article_types'=>$article_types,'selected_article_type'=>$selected_article_type, 'page'=>$page)) ?>
</div>
</div>
<div class="float_left listing" style="border:0px solid pink; width:915px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td><div class="paginationwrapper">
	  <div class="pagination" id="borst_shop_article_list_listing">
		<?php if ($pager->haveToPaginate()): ?>
		<a id="<?php echo $pager->getFirstPage(); ?>" style="cursor:pointer;"> <img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a> <a id="<?php echo $pager->getPreviousPage(); ?>" style="cursor:pointer;"> < </a>
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
	</div></td>
  </tr>
</table>
</div>
