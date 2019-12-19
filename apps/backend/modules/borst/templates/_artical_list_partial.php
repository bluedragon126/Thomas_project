<form name="update_artiklar" id="update_artiklar" method="post" action="">
  <input type="hidden" name="action_mode" id="action_mode" value="update_artiklar">
  <input type="hidden" name="delete_article_id" id="delete_article_id"/>
  <?php /*?><input type="hidden" name="art_id_update" id="art_id_update" value="<?php echo $param_arr['art_id']; ?>"/>
  <input type="hidden" name="art_title_update" id="art_title_update" value="<?php echo $param_arr['art_title']; ?>"/>
  <input type="hidden" name="search_katID_update" id="search_katID_update" value="<?php echo $param_arr['search_katID']; ?>"/>
  <input type="hidden" name="search_art_statID_update" id="search_art_statID_update" value="<?php echo $param_arr['search_art_statID']; ?>"/>
  <input type="hidden" name="sort_order_update" id="sort_order_update" value="<?php echo $param_arr['sort_order']; ?>"/>
  <input type="hidden" name="no_of_pages_update" id="no_of_pages_update" value="<?php echo $param_arr['no_of_pages']; ?>"/>
  <input type="hidden" name="delete_article_id" id="delete_article_id"/><?php */?>
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="update_article_list_table">
    <thead>
      <tr id="update_article_form_column_row">
        <th scope="col" width="3%">Nr</th>
        <th scope="col" width="12%"><span class="float_left" style="width:55px;">Aktion</span></th>
        <th scope="col" width="10%"><a id="sortby_art_status" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Status<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="13%"><a id="sortby_date" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Datum<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="14%"><a id="sortby_author" class="float_left" style="cursor:pointer; width:100px;"><span class="float_left">Författare<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="8%"><a id="sortby_title" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Rubrik<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="8%"><a id="sortby_category" style="cursor:pointer; width:60px;" class="float_left"><span class="float_left">Kat<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="8%"><a id="sortby_type" style="cursor:pointer; width:60px;" class="float_left"><span class="float_left">Typ<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="12%"><a id="sortby_object" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Objekt<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="12%"><a id="sortby_art_view" style="cursor:pointer; width:70px;" class="float_left"><span class="float_left">Visad<img src="/images/bg.gif" alt="down" /></span></a></th>
      </tr>
    </thead>
    <?php if($pager->getNbResults() > 0): ?>
	<?php $i=1; foreach ($pager->getResults() as $article): ?>
    <?php 
			 if ($article->art_statid == 2) $class = "redcolor"; 
			 elseif($article->art_statid == 3) $class = "lightbluefont"; 
			 else $class = "blackcolor";
			 ?>
    <tr class="classnot">
      <td class="<?php echo $class ?>"><input name="artikelID[]" type="hidden" value="<?php echo $article->article_id ?>">
        <?php echo $i++; ?></td>
      <td class="<?php echo $class ?>"> [ <a class="<?php echo $class ?>" title="Editera denna artikel" href="<?php echo 'http://'.$host_str.'/backend.php/borst/createArticle/action_mode/edit_article/article_id/'.$article->article_id?>">E</a> | <a id="delete_article" class="<?php echo $class ?>" title="Ta bort <?php echo $article->article_id ?>" href="javascript:open_confirmation('Vill du verkligen ta bort artikel med rubriken <?php echo $article->title ?>','<?php echo $article->article_id; ?>','delete_article_confirm_box','delete_article_msg')">X</a> ] <a class="<?php echo $class ?>" title="G till denna artikel!" href="<?php echo 'http://'.$host_str.'/borst/borstArticleDetails/article_id/'.$article->article_id ?>">&gt;&gt;</a> </td>
      <td><input class="<?php echo $class ?>" name="art_statID[]" type="hidden" value="<?php echo $article->art_statid ?>"/>
        <?php if($status_arr):?>
        <select class="<?php echo $class ?>" name="sel_art_statID[]" id="">
          <?php foreach($status_arr as $key=>$value): ?>
          <option value="<?php echo $key; ?>" <?php if($key==$article->art_statid) echo 'selected="selected"'?>><?php echo $value ?></option>
          <?php endforeach; ?>
        </select>
        <?php endif; ?>
      </td>
      <td class="<?php echo $class ?>"><input class="small <?php echo $class ?>" name="a_datum[]" type="text" size="16" value="<?php echo $article->article_date ?>"></td>
      <td class="<?php echo $class ?>"><?php echo $article->author ? $article->author : '&nbsp;'; ?></td>
      <td class="<?php echo $class ?>"><input class="small <?php echo $class ?>" name="rubrik[]" type="text" size="45" value="<?php echo $article->title ?>"></td>
      <td class="<?php echo $class ?>"><?php echo $cat_arr[$article->category_id]?></td>
      <td class="<?php echo $class ?>"><?php echo $type_arr[$article->type_id]?></td>
      <td class="<?php echo $class ?>"><?php echo $object_arr[$article->object_id] ?></td>
      <td class="<?php echo $class ?>"><?php echo $count_arr[$article->article_id] ? $count_arr[$article->article_id] : '0' ?></td>
    </tr>
    <?php endforeach; ?>
	<?php else: ?>	
		 <tr><td colspan="10" align="center">No Results</td></tr> 
	<?php endif; ?>	 
  </table>
</form>
