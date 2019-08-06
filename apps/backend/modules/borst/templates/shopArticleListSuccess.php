<div class="maincontentpage">
  <div class="forumlistingleftdiv">
  <div class="float_left widthall"></div>
  <div class="forumlistingleftdivinner" style="width:915px;">
	<div id="btshop_articlelist_outer" class="forumlistingleftdivinner" style="width:915px; border:0px solid red; font-size:11px;">
      <div class="shoph3 widthall">BT-Shop Article List</div>
	  
	  <div class="listing">
	  	<input type="hidden" id="shop_article_column_order" name="shop_article_column_order" value="<?php echo $current_column_order; ?>"/>
		<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
		<input type="hidden" id="shop_article_column" name="shop_article_column" value="<?php echo $cur_column; ?>"/>
		<input type="hidden" id="delete_shop_article_id" name="delete_shop_article_id"/>
        <input type="hidden" id="selected_article_type" name="selected_article_type" value="All"/>
	  </div>
      <div class="float_left listing" style="border:0px solid red;">
        <div id="update_msg" class="float_left widthall" style="width:913px; color:#00FF33;"></div>
		<!--<div class="float_left widthall" style="width:913px; overflow:hidden; overflow-x:scroll;">-->
		<div class="float_left widthall" style="width:915px; border:0px solid green;">
        <?php include_partial('borst/btshop_article_list_partial', array('pager'=>$pager,'host_str'=>$host_str,'article_types'=>$article_types)) ?>
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
    </div>
	<div class="float_left listing">
	 <input type="button" name="update_shop_art_button" id="update_shop_art_button" onClick="javascript:open_confirmation('Ska listan med artiklar uppdateras?', '', 'update_shop_art_list_confirm_box', 'update_shop_art_list_msg')" class="registerbuttontext submit" value="Uppdatera lista"/>
     <div class="shop_update_msg"></div>
	</div>
	
	
  </div>
</div>
</div>
<!-- ui-dialog-update-shop-article -->
<div id="update_shop_art_list_confirm_box" title="Update Shop Article List Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="update_shop_art_list_msg">Message:</td>
	</tr>
 </table>
</div>

<!-- ui-dialog-delete-shop-article -->
<div id="delete_shop_article_confirm_box" title="Delete Shop Article Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="delete_shop_article_msg">Message:</td>
	</tr>
 </table>
</div>