<script type="text/javascript">

/*window.onbeforeunload = function () {
 updateArticleListForUnload();
    
}*/

</script>
<div class="maincontentpage">
  <div class="forumlistingleftdiv">
  <div class="float_left widthall"><b><a class="blackcolor" href="<?php echo 'http://'.$host_str.'/backend.php/borst/createArticle/mode/create_new_article'?>">Lägg till artikel</a></b></div>
  <div class="forumlistingleftdivinner">
    <form id="search_article_form" class="backend_search_section" name="search_article_form" method="POST" action="<?php echo url_for('borst/articleList') ?>">
  <table width="80%" border="0" cellspacing="0" cellpadding="0" id="back_article_list">
	<tr>
		<td><input name="art_search" type="hidden" value="1"></td>
		<td><b>Article Id:</b>&nbsp;<input name="art_id" type="text" size="3" value="<?php echo $sf_params->get('art_id') ? $sf_params->get('art_id') : $art_id ; ?>"></td>
		<td><b>Article Title:</b>&nbsp;<input name="art_title" type="text" size="20" value="<?php echo $sf_params->get('art_title') ? $sf_params->get('art_title') : $art_title; ?>"></td>
		<td><?php if($cat_arr):?>
        <select class="<?php echo $class ?>" name="search_katID" id="search_katID">
          <?php foreach($cat_arr as $key=>$value): ?>
          <option value="<?php echo $key; ?>" <?php if($key==$search_katID) echo 'selected="selected"'?>><?php echo $value ?></option>
          <?php endforeach; ?>
        </select>
        <?php endif; ?></td>
		<td><?php if($status_arr):?>
        <select class="<?php echo $class ?>" name="search_art_statID" id="search_art_statID">
          <?php foreach($status_arr as $key=>$value): ?>
          <option value="<?php echo $key; ?>" <?php if($key==$search_art_statID) echo 'selected="selected"'?>><?php echo $value ?></option>
          <?php endforeach; ?>
        </select>
        <?php endif; ?></td>
		<td>
        <select class="<?php echo $class ?>" name="sort_order" id="sort_order">
         <option value="ASC" <?php if (strcmp($sort_order, "ASC") == 0) echo "selected"; ?>>ASC</option>
		 <option value="DESC" <?php if (strcmp($sort_order, "DESC") == 0) echo "selected"; ?>>DESC</option>
        </select>
        </td>
		<td><input name="no_of_pages" type="text" size="3" value="<?php echo $sf_params->get('no_of_pages') ? $sf_params->get('no_of_pages') : $no_of_pages; ?>"></td>
		<td class="float_right"><!--<input type="submit" onclick="setVal()" name="submit" value="Search">--><input type="submit" onclick="search_for_article()" name="submit" value="Search"></td>		
	</tr>
  </table>
  </form>
	<div id="search_articlelist_outer" class="forumlistingleftdivinner" style="font-size:11px;">
            <div class="width_1200 float_left">
                <div class="shoph3 float_left">Article List</div>
                <?php include_partial('global/order_count_template',array('orderForm'=>$orderForm,'execute_fn_name'=>'searchArticleListForCount')) ?>
            </div>
      
	  <div class="listing">
	  	<input type="hidden" id="search_article_column_order" name="search_article_column_order" value="<?php echo $current_column_order; ?>"/>
		<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
		<input type="hidden" id="search_article_column" name="search_article_column" value="<?php echo $cur_column; ?>"/>
	  </div>
         		<!--<td colspan="10"><input type="button" name="update_article_button" id="update_article_button" class="registerbuttontext submit" onClick="javascript:open_confirmation('Ska listan med artiklar uppdateras?', '', 'updateArticleList_confirm_box', 'update_article_msg')" value="Uppdatera lista"/></td>!-->
         <div class="article_list_pager"><input type="button" name="update_article_button" id="update_article_button" class="registerbuttontext submit" onClick="javascript:updateArticleList()" value="Uppdatera lista"/>
         <!-- code change by spd 23-2-2016-->   
             <table width="90%" border="0" cellspacing="0" cellpadding="0">           
		  <tr>
			<td colspan="10"><div class="paginationwrapper">
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
			</div></td>
		  </tr>
		</table>
             <!-- code change by spd 23-2-2016 end -->   
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
			</div></td>
		  </tr>
		  <tr>
			<!--<td colspan="10"><input type="button" name="update_article_button" id="update_article_button" class="registerbuttontext submit" onClick="javascript:open_confirmation('Ska listan med artiklar uppdateras?', '', 'updateArticleList_confirm_box', 'update_article_msg')" value="Uppdatera lista"/></td>!-->
                        <td colspan="10"><input type="button" name="update_article_button" id="update_article_button" class="registerbuttontext submit" onClick="javascript:updateArticleList()" value="Uppdatera lista"/></td>
		  </tr>
		</table>
	  </div>
	  
    </div>
  </div>
  </div>
</div>
<!-- ui-dialog-update-article -->
<div id="updateArticleList_confirm_box" title="Update Article List Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="update_article_msg">Message:</td>
	</tr>
 </table>
</div>

<!-- ui-dialog-delete-article -->
<div id="delete_article_confirm_box" title="Delete Article Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="delete_article_msg">Message:</td>
	</tr>
 </table>
