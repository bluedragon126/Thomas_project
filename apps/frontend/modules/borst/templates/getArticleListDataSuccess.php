<?php
echo('111'); exit;
?>
<table width="100%" border="0" cellspacing="0" cellpadding="3" id="article_list_table" class="getArticleData_table">
  <input type="hidden" id="parent_menu" name="parent_menu" value="<?php echo $sf_user->getAttribute('parent_menu'); ?>"/>
  <input type="hidden" id="submenu_menu" name="submenu_menu" value="<?php echo $sf_user->getAttribute('submenu_menu'); ?>"/>
  <input type="hidden" id="articlelist_current_column_order" name="articlelist_current_column_order" value="<?php echo $current_column_order; ?>" />
  <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
  <tr id="article_list_column_row" valign="top" height="35">
    <th align="left" width="8%">Art</th>
	<th align="left" width="17%"><a id="sortby_date" class="float_left cursor width_80"><span class="float_left">Publ.<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
	<th align="left" width="28%"><a id="sortby_title" class="float_left cursor width_80"><span class="float_left">Rubrik<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
	<th align="left" width="19%"><a id="sortby_category" class="float_left cursor width_90"><span class="float_left">Kategori<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
	<th align="left" width="13%"><a id="sortby_type"  class="float_left cursor width_80"><span class="float_left">Typ<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
	<th align="left" width="15%"><a id="sortby_object" class="float_left cursor width_90"><span class="float_left">Objekt<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
  </tr>
  <?php if($type == 'sbt'):?>
  <?php foreach ($pager->getResults() as $article): ?>
  <?php $flagga = "usa.gif"; ?>
  <tr class="classnot">
    <td><img src="/images/<?php echo $flagga?>" width="35" height="20">&nbsp;</td>
    <td><?php echo substr($article->created_at,0,10); ?></td>
    <td class="sbt_article_title"><a id="sbt_article_title_<?php echo $article->id; ?>" class="topic_title" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtArticleDetails/article_id/<?php echo $article->id; ?>"><b><?php echo $article->analysis_title; ?></b></a></td>
    <td><a class="sbt_article_a" href="<?php echo 'http://'.$host_str.'/borst/articleList/sbt_kat_id/'.$article->analysis_category_id; ?>"><?php echo $cat_arr[$article->analysis_category_id]; ?></a></td>
    <td><a class="sbt_article_a" href="<?php echo 'http://'.$host_str.'/borst/articleList/sbt_type_id/'.$article->analysis_type_id; ?>"><?php echo $type_arr[$article->analysis_type_id]; ?></a></td>
    <td><a class="sbt_article_a" href="<?php echo 'http://'.$host_str.'/borst/articleList/sbt_obj_id/'.$article->analysis_object_id; ?>"><?php echo $object_arr[$article->analysis_object_id]; ?></a></td>
  </tr>
  <?php endforeach; ?>
  <?php else: ?>
  <?php foreach ($pager->getResults() as $article): ?>
     <?php 
		if ($object_country_arr[$article->object_id] != "") $flagga = $object_country_arr[$article->object_id] . ".gif"; 
		else $flagga = "no_flag.gif"; 
		
		$style = "";
		if ($article->art_statid == 2) $style = "style=\"color: #F00\""; 
		else $style = "style=\"color: #4687C0\"";
	  ?>
  <tr class="classnot">
    <td><img src="/images/<?php echo $flagga?>" width="35" height="20">&nbsp;</td>
    <td><?php echo substr($article->article_date,0,10); ?></td>
    <td><a <?php echo $style ?> href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstArticleDetails/article_id/<?php echo $article->article_id; ?>"><b><?php echo $article->title ? $article->title : '&nbsp;'; ?></b></a></td>
    <td><a class="sbt_article_a" href="<?php echo 'http://'.$host_str.'/borst/articleList/kat_id/'.$article->category_id; ?>"><?php echo $cat_arr[$article->category_id]; ?></a></td>
    <td><a class="color_489AE7" href="<?php echo 'http://'.$host_str.'/borst/articleList/type_id/'.$article->category_id; ?>"><?php echo $type_arr[$article->type_id]; ?></a></td>
    <td><a class="color_1A4797" href="<?php echo 'http://'.$host_str.'/borst/articleList/obj_id/'.$article->category_id; ?>"><?php echo $object_arr[$article->object_id]; ?></a></td>
  </tr>
  <?php endforeach; ?>
  <?php endif; ?>
</table>
  <div class="paginationwrapper">
	  <div class="pagination" id="article_list_listing">
		<?php if ($pager->haveToPaginate()): ?>
		<a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"> <img src="/images/pag_arrow_left.jpg" alt="arrow" /> </a> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> < </a>
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
		<a id="<?php echo $pager->getNextPage(); ?>" class="cursor"> > </a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"> <img src="/images/pag_arrow_right.jpg" alt="arrow" /> </a>
		<?php endif ?>
	 </div>
  </div>
