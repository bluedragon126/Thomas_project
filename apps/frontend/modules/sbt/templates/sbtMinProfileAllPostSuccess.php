<!--[if IE 7]>
<link rel="stylesheet" type="text/css" media="screen" href="/css/main_ie7.css" />
<![endif]-->
<div class="listing">
  <div class="float_left widthall">
    <div  class="listingheading">Börstjänaren</div>
	<input type="hidden" id="useralldata_list_current_column_order" name="useralldata_list_current_column_order" value="<?php echo $current_column_order; ?>" />
     <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
	 <input type="hidden" id="parent_id" name="parent_id" value="<?php echo $parent_id; ?>"/>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="profile_useralldata_borst_list_table">
      <tr id="profile_useralldata_borst_list_column_row" valign="top" height="35" style="color:#000000;">
		<th class="width_30">Art</th>
		<th class="width_83"><a id="sortby_date" name="profile_useralldata_borst_list_table" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Publ.<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_152"><a id="sortby_title" name="profile_useralldata_borst_list_table" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Rubrik<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_92"><a id="sortby_category" name="profile_useralldata_borst_list_table" style="cursor:pointer; width:90px;" class="float_left"><span class="float_left">Kategori<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_84"><a id="sortby_type" name="profile_useralldata_borst_list_table" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Typ<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_84"><a id="sortby_object" name="profile_useralldata_borst_list_table" style="cursor:pointer; width:90px;" class="float_left"><span class="float_left">Objekt<img src="/images/bg.gif" alt="down" /></span></a></th>
	  </tr>
      <?php foreach($article_pager->getResults() as $data): ?>
      <tr class="classnot">
        <td class="width_30"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>
        <td class="width_83"><?php echo substr($data->article_date,2,9) ?></td>
        <td class="main_link_color width_152"><a class="main_link_color" href="<?php echo 'http://'.$host_str.'/borst/borstArticleDetails/article_id/'.$data->article_id;?>"><span class="profile_allpostlist_title"><?php echo $data->title ?></span></a></td>
        <td class="lightgreenfont width_92"><?php echo $cat_arr[$data->category_id] ? $cat_arr[$data->category_id] : '-'; ?></td>
        <td class="lightbluefont width_84"><?php echo $type_arr[$data->type_id] ? $type_arr[$data->type_id] : '-'; ?></td>
        <td class="darkbluefont width_84"><?php echo $object_arr[$data->object_id] ? $object_arr[$data->object_id] : '-'; ?></td>
      </tr>
      <?php endforeach; ?>
      <!--<tr>
        <td colspan="6">&nbsp;</td>
      </tr>-->
    </table>
    <div  class="listingheading">Syster BT</div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="profile_useralldata_sbt_list_table">
      <tr id="profile_useralldata_sbt_list_column_row" valign="top" height="35" style="color:#000000;">
		<th class="width_30">Art</th>
		<th class="width_83"><a id="sortby_date" name="profile_useralldata_sbt_list_table" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Publ.<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_152"><a id="sortby_title" name="profile_useralldata_sbt_list_table" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Rubrik<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_92"><a id="sortby_category" name="profile_useralldata_sbt_list_table" style="cursor:pointer; width:90px;" class="float_left"><span class="float_left">Kategori<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_84"><a id="sortby_type" name="profile_useralldata_sbt_list_table" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Typ<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_84"><a id="sortby_object" name="profile_useralldata_sbt_list_table" style="cursor:pointer; width:90px;" class="float_left"><span class="float_left">Objekt<img src="/images/bg.gif" alt="down" /></span></a></th>
	  </tr>
      <?php foreach($analysis_pager->getResults() as $data): ?>
      <tr class="classnot">
        <td class="width_30"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>
        <td class="width_83"><?php echo substr($data->created_at,2,9) ?></td>
        <td class="main_link_color width_152"><a class="main_link_color" href="<?php echo 'http://'.$host_str.'/sbt/sbtArticleDetails/article_id/'.$data->id;?>"><span class="profile_allpostlist_title"><?php echo $data->analysis_title ?></span></a></td>
        <td class="lightgreenfont width_92"><?php echo $cat_arr[$data->analysis_category_id] ? $cat_arr[$data->analysis_category_id] : '-'; ?></td>
        <td class="lightbluefont width_84"><?php echo $type_arr[$data->analysis_type_id] ? $type_arr[$data->analysis_type_id] : '-'; ?></td>
        <td class="darkbluefont width_84"><?php echo $object_arr[$data->analysis_object_id] ? $object_arr[$data->analysis_object_id] : '-'; ?></td>
      </tr>
      <?php endforeach; ?>
      <!--<tr>
        <td colspan="6">&nbsp;</td>
      </tr>-->
    </table>
    <div  class="listingheading">Bloggar</div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="profile_useralldata_blog_list_table">
      <tr id="profile_useralldata_blog_list_column_row" valign="top" height="35" style="color:#000000;">
		<th class="width_30">Art</th>
		<th class="width_83"><a id="sortby_date" name="profile_useralldata_blog_list_table" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Publ.<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_152"><a id="sortby_title" name="profile_useralldata_blog_list_table" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Rubrik<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_92"><a id="sortby_category" name="profile_useralldata_blog_list_table" style="cursor:pointer; width:90px;" class="float_left"><span class="float_left">Kategori<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_84"><a id="sortby_type" name="profile_useralldata_blog_list_table" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Typ<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_84"><a id="sortby_object" name="profile_useralldata_blog_list_table" style="cursor:pointer; width:90px;" class="float_left"><span class="float_left">Objekt<img src="/images/bg.gif" alt="down" /></span></a></th>
	  </tr>
      <?php foreach($blog_pager->getResults() as $data): ?>
      <tr class="classnot">
        <td class="width_30"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>
        <td class="width_83"><?php echo substr($data->created_at,2,9) ?></td>
        <td class="main_link_color width_152"><a class="main_link_color" href="<?php echo 'http://'.$host_str.'/sbt/sbtBlogDetails/blog_id/'.$data->id;?>"><span class="profile_allpostlist_title"><?php echo $data->ublog_title ?></span></a></td>
        <td class="lightgreenfont width_92"><?php echo $cat_arr[$data->ublog_category_id] ? $cat_arr[$data->ublog_category_id] : '-'; ?></td>
        <td class="lightbluefont width_84"><?php echo $type_arr[$data->ublog_type_id] ? $type_arr[$data->ublog_type_id] : '-'; ?></td>
        <td class="darkbluefont width_84"><?php echo $object_arr[$data->ublog_object_id] ? $object_arr[$data->ublog_object_id] : '-'; ?></td>
      </tr>
      <?php endforeach; ?>
     <!-- <tr>
        <td colspan="6">&nbsp;</td>
      </tr>-->
    </table>
    <div  class="listingheading">Forum</div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="profile_useralldata_forum_list_table">
      <tr id="profile_useralldata_forum_list_column_row" valign="top" height="35" style="color:#000000;">
		<th class="width_30">Art</th>
		<th class="width_83"><a id="sortby_date" name="profile_useralldata_forum_list_table" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Publ.<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_152"><a id="sortby_title" name="profile_useralldata_forum_list_table" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Rubrik<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_92"><a id="sortby_category" name="profile_useralldata_forum_list_table" style="cursor:pointer; width:90px;" class="float_left"><span class="float_left">Kategori<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_84"><a id="sortby_type" name="profile_useralldata_forum_list_table" style="cursor:pointer; width:80px;" class="float_left"><span class="float_left">Typ<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_84"><a id="sortby_object" name="profile_useralldata_forum_list_table" style="cursor:pointer; width:90px;" class="float_left"><span class="float_left">Objekt<img src="/images/bg.gif" alt="down" /></span></a></th>
	  </tr>
      <?php foreach($forum_pager->getResults() as $data): ?>
      <tr class="classnot">
        <td class="width_30"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>
        <td class="width_83"><?php echo substr($data->andratdatum,2,9) ?></td>
        <td class="main_link_color width_152"><a class="main_link_color" href="<?php echo "http://".$host_str ?>/forum/commentOnForumTopic/forumid/<?php echo $data->koppling ?>"><span class="profile_allpostlist_title"><?php echo $data->rubrik ?></span></a></td>
        <td class="lightgreenfont width_92"><span class="profile_forumlist_cat"><?php echo $data->getCategoryName($data->btforum_category_id); ?></span></td>
        <td class="lightbluefont width_84"><?php echo '-';//$data->getReplyCount($data->id); ?></td>
        <td class="darkbluefont width_84"><?php echo '-';//$data->visningar ?></td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <td colspan="6">
		<div class="paginationwrapper width_538">
			<div class="pagination" id="profile_useralldata_list_listing">
				<?php if ($pager): ?>
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
				<?php endif ?>
			</div>
		</div>  
		</td>
      </tr>
    </table>
  </div>
</div>
