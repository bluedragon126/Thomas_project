<form name="update_sbt_artiklar" id="update_sbt_artiklar" method="post" action="">
  <input type="hidden" name="action_mode" id="action_mode" value="update_sbt_artiklar">
  <input type="hidden" name="delete_sbt_article_id" id="delete_sbt_article_id"/>
 
  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="update_sbt_article_list_table">
    <thead>
      <tr id="update_sbt_article_form_column_row">
        <th scope="col" width="3%">Nr</th>
        <th scope="col" width="12%"><span class="float_left" style="width:55px;">Aktion</span></th>
        <th scope="col" width="10%"><a id="sortby_art_status" class="float_left cursor width_80"><span class="float_left">Status<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="13%"><a id="sortby_date" class="float_left cursor width_80"><span class="float_left">Datum<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="14%"><a id="sortby_author" class="float_left cursor width_100"><span class="float_left">Författare<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="8%"><a id="sortby_title" class="float_left cursor width_80"><span class="float_left">Rubrik<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="8%"><a id="sortby_category" class="float_left cursor width_60"><span class="float_left">Kat<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="8%"><a id="sortby_type" class="float_left cursor width_60"><span class="float_left">Typ<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="12%"><a id="sortby_object" class="float_left cursor width_80"><span class="float_left">Objekt<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
        <th scope="col" width="12%"><a id="sortby_art_view" class="float_left cursor width_70"><span class="float_left">Visad<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
      </tr>
    </thead>
    <?php if($pager->getNbResults() > 0): ?>
	<?php $i=1; foreach ($pager->getResults() as $article): ?>
    <?php 
			 if ($article->published == 2) $class = "redcolor"; 
			 elseif($article->published == 3) $class = "lightbluefont"; 
			 else $class = "blackcolor";
			 ?>
    <tr id="<?php echo 'row_'.$article->id; ?>" class="classnot">
      <td class="<?php echo $class ?>"><input name="artikelID[]" type="hidden" value="<?php echo $article->id ?>"><?php echo $i++; ?></td>
      
      <td class="<?php echo $class ?>"> [ <a class="<?php echo $class ?>" title="Editera denna artikel" href="<?php echo 'http://'.$host_str.'/sbt/editAnalysis/article_id/'.$article->id; ?>">E</a> | <a id="delete_sbt_article" class="<?php echo $class ?>" title="Ta bort <?php echo $article->id ?>" href="javascript:open_confirmation('Vill du verkligen ta bort artikel med rubriken <?php echo $article->analysis_title ?> article id: <?php echo $article->id; ?>','<?php echo $article->id; ?>','delete_sbt_article_confirm_box','delete_sbt_article_msg')">X</a> ] <a class="<?php echo $class ?>" title="G till denna artikel!" href="<?php echo 'http://'.$host_str.'/sbt/sbtArticleDetails/article_id/'.$article->id; ?>">&gt;&gt;</a> </td>
      
      <td><input class="<?php echo $class ?>" name="art_statID[]" type="hidden" value="<?php echo $article->published ?>"/>
		<?php if($art_status):?>
        <select class="<?php echo $class ?>" name="sel_art_statID[]" id="">
          <?php foreach($art_status as $key=>$value): ?>
          <option value="<?php echo $key; ?>" <?php if($key==$article->published) echo 'selected="selected"'?>><?php echo $value ?></option>
          <?php endforeach; ?>
        </select>
        <?php endif; ?>
      </td>
      <td class="<?php echo $class ?>"><input class="small <?php echo $class ?>" name="a_datum[]" type="text" size="16" value="<?php echo $article->created_at ?>"></td>
      <td class="<?php echo $class ?>"><?php echo $article->author_id ? $profile->getFullUserName($article->author_id) : '&nbsp;'; ?></td>
      <td class="<?php echo $class ?>"><input class="small <?php echo $class ?>" name="rubrik[]" type="text" size="45" value="<?php echo $article->analysis_title ?>"></td>
      <td class="<?php echo $class ?>"><?php echo $cat_arr[$article->analysis_category_id]?></td>
      <td class="<?php echo $class ?>"><?php echo $type_arr[$article->analysis_type_id]?></td>
      <td class="<?php echo $class ?>"><?php echo $object_arr[$article->analysis_object_id] ?></td>
      <td class="<?php echo $class ?>"><?php echo $article->analysis_views ? $article->analysis_views : '0' ?></td>
    </tr>
    <?php endforeach; ?>
	<?php else: ?>	
		 <tr><td colspan="10" align="center">No Results</td></tr> 
	<?php endif; ?>	 
  </table>
</form>
