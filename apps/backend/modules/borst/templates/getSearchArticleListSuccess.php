<div class="width_1200 float_left">
                <div class="shoph3 float_left">Article List</div>
                <?php include_partial('global/order_count_template',array('orderForm'=>$orderForm,'execute_fn_name'=>'searchArticleListForCount')) ?>
            </div>
<div class="listing">
<input type="hidden" id="search_article_column_order" name="search_article_column_order" value="<?php echo $current_column_order; ?>"/>
<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
<input type="hidden" id="search_article_column" name="search_article_column" value="<?php echo $cur_column; ?>"/>
<input type="hidden" id="page_number" name="page_number" value="<?php echo $page_number; ?>"/>
</div>
 <div class ="article_list_pager"><input type="button" name="update_article_button" id="update_article_button" class="registerbuttontext submit" onClick="javascript:updateArticleList()" value="Uppdatera lista"/>
    <!-- code change by spd 23-2-2016--> 
    <table width="90%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td colspan="10">
            <div class="paginationwrapper">
            <div class="pagination" id="allarticle_list_listing">
                <?php if ($pager->haveToPaginate()): ?>
                <a id="<?php echo $pager->getFirstPage(); ?>" style="cursor:pointer;"> <img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a> <a id="<?php echo $pager->getPreviousPage(); ?>" style="cursor:pointer;"> < </a>
                <?php $links = $pager->getLinks(30); foreach ($links as $page): ?>
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
            </div>
        </td>
        </tr>
    </table> <!-- code change by spd 23-2-2016--> 
 </div>
 <div id="update_message_div" class="article_list_pager" style="border:1px solid #00CC33;display:none; margin:5px 0px 0px 0px"><span><font color="#00CC33">&nbsp;&nbsp;Artikel lista uppdaterats</font></span></div>
<div class="float_left listing">
  <div class="article_list_container">
    <?php include_partial('borst/artical_list_partial', array('pager'=>$pager,'cat_arr'=>$cat_arr,'type_arr'=>$type_arr,'object_arr'=>$object_arr,'status_arr'=>$status_arr,'count_arr'=>$count_arr,'host_str'=>$host_str,'ext'=>$ext,'param_arr'=>$param_arr)) ?>
  </div>
</div>
<div class="article_list_pager listing">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td colspan="10"><div class="paginationwrapper">
  <div class="pagination" id="allarticle_list_listing">
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
<tr>
<!--<td colspan="10"><input type="button" name="update_article_button" id="update_article_button" class="registerbuttontext submit" onClick="javascript:open_confirmation('Ska listan med artiklar uppdateras?', '', 'updateArticleList_confirm_box', 'update_article_msg')" value="Uppdatera lista"/></td>-->
    <td colspan="10"><input type="button" name="update_article_button" id="update_article_button" class="registerbuttontext submit" onClick="javascript:updateArticleList()" value="Uppdatera lista"/></td>
</tr>
</table>
</div>