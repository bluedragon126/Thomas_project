<div class="shoph3 widthall">Article List</div>
<div class="listing">
<input type="hidden" id="search_sbtarticle_column_order" name="search_sbtarticle_column_order" value="<?php echo $current_column_order; ?>"/>
<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
<input type="hidden" id="search_sbtarticle_column" name="search_sbtarticle_column" value="<?php echo $cur_column; ?>"/>
<input type="hidden" id="page_number" name="page_number" value="<?php echo $page_number; ?>"/>
</div>
<div class="float_left listing">
  <div class="article_list_container">
    <?php include_partial('sbt/sbt_artical_list_partial', array('pager'=>$pager,'cat_arr'=>$cat_arr,'type_arr'=>$type_arr,'object_arr'=>$object_arr,'status_arr'=>$status_arr,'host_str'=>$host_str,'ext'=>$ext,'param_arr'=>$param_arr,'profile'=>$profile,'art_status'=>$art_status)) ?>
  </div>
</div>
<div class="article_list_pager listing">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td colspan="10"><div class="paginationwrapper">
  <div class="pagination" id="allsbtarticle_list_listing">
	<?php include_partial('global/backpager_for_all', array('pager'=>$pager)) ?>
  </div>
</div></td>
</tr>
<!--<tr>
<td colspan="10"><input type="button" name="update_article_button" id="update_article_button" class="registerbuttontext submit" onClick="javascript:open_confirmation('Ska listan med artiklar uppdateras?', '', 'updateArticleList_confirm_box', 'update_article_msg')" value="Uppdatera lista"/></td>
</tr>-->
</table>
</div>