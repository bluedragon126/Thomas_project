<div class="maincontentpage">
  <div class="forumlistingleftdiv">
  <div id="confirm_message" class="delete_user_confirmation_msg" style="display: none;width: 1139px;"></div>
  <div class="forumlistingleftdivinner">
    <form id="search_sbtarticle_form" class="backend_search_section" name="search_sbtarticle_form" method="POST" action="<?php echo url_for('sbt/articleList') ?>">
  <table width="80%" border="0" cellspacing="0" cellpadding="0" id="back_sbtarticle_list">
	<tr>
		<td><input name="sbt_art_search" type="hidden" value="1"></td>
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
		<td class="float_right"><!--<input type="submit" onclick="setVal()" name="submit" value="Search">--><input type="button" onclick="search_for_sbt_article()" name="submit" value="Search"></td>		
	</tr>
  </table>
  </form>
	<div id="search_sbtarticlelist_outer" class="forumlistingleftdivinner" style="font-size:11px;">
      <div class="shoph3 widthall">Artiklar BT Insider</div>
	  <div class="listing">
	  	<input type="hidden" id="search_sbtarticle_column_order" name="search_sbtarticle_column_order" value="<?php echo $current_column_order; ?>"/>
		<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
		<input type="hidden" id="search_sbtarticle_column" name="search_sbtarticle_column" value="<?php echo $cur_column; ?>"/>
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
			<td colspan="10"><input type="button" name="update_sbt_article_button" id="update_sbt_article_button" class="registerbuttontext submit" value="Uppdatera lista"/></td>
		  </tr>-->
		</table>
	  </div>
    </div>
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="10"><input type="button" name="update_article_button" id="update_article_button" class="registerbuttontext submit" onClick="javascript:open_confirmation('Ska listan med artiklar uppdateras?', '', 'updateSbtArticleList_confirm_box', 'update_sbt_article_msg')" value="Uppdatera lista"/></td>
      </tr>
    </table>
    
    
  </div>
  </div>
</div>
<!-- ui-dialog-update-article -->
<div id="updateSbtArticleList_confirm_box" title="Update Sbt Article List Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="update_sbt_article_msg">Message:</td>
	</tr>
 </table>
</div>

<!-- ui-dialog-delete-article -->
<div id="delete_sbt_article_confirm_box" title="Delete Sbt Article Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="delete_sbt_article_msg">Message:</td>
	</tr>
 </table>
</div>