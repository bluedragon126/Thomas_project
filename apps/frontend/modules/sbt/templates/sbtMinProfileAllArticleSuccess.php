<div class="listing">
  <div class="float_left widthall">
    <div  class="listingheading">Börstjänaren</div>
	<input type="hidden" id="article_analysis_list_current_column_order" name="article_analysis_list_current_column_order" value="<?php echo $current_column_order; ?>" />
    <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="profile_article_list_table">
 	  <tr id="profile_article_list_column_row" valign="top" height="35" style="color:#000000;">
		<th class="width_37">Art</th>
		<th class="width_83"><a id="sortby_date" name="profile_article_list_table" class="float_left width_80 cursor"><span class="float_left">Publ.<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_152"><a id="sortby_title" name="profile_article_list_table" class="float_left width_80 cursor"><span class="float_left">Rubrik<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_92"><a id="sortby_category" name="profile_article_list_table" class="float_left width_90 cursor"><span class="float_left">Kategori<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_84"><a id="sortby_type" name="profile_article_list_table" class="float_left width_80 cursor"><span class="float_left">Typ<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th class="width_84"><a id="sortby_object" name="profile_article_list_table" class="float_left width_90 cursor"><span class="float_left">Objekt<img src="/images/bg.gif" alt="down" /></span></a></th>
	  </tr>
      <?php foreach($article_pager->getResults() as $data): ?>
      <tr class="classnot">
        <td class="width_37"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>
        <td class="width_83"><?php echo substr($data->article_date,2,9) ?></td>
        <td class="main_link_color width_152"><a class="main_link_color" href="<?php echo 'http://'.$host_str.'/borst/borstArticleDetails/article_id/'.$data->article_id;?>"><span class="profile_articlelist_title"><?php echo $data->title ?></span></a></td>
        <td class="lightgreenfont width_92"><?php echo $cat_arr[$data->category_id]; ?></td>
        <td class="lightbluefont width_84"><?php echo $type_arr[$data->type_id]; ?></td>
        <td class="darkbluefont width_84"><?php echo $object_arr[$data->object_id]; ?></td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <td colspan="6">&nbsp;</td>
      </tr>
    </table>
    <div  class="listingheading">Syster BT</div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="profile_analysis_list_table">
      <tr id="profile_analysis_list_column_row" valign="top" height="35" style="color:#000000;">
		<th align="left" class="width_37">Art</th>
		<th align="left" class="width_83"><a id="ana_sortby_date" name="profile_analysis_list_table"  class="float_left width_80 cursor"><span class="float_left">Publ.<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th align="left" class="width_152"><a id="ana_sortby_title" name="profile_analysis_list_table"  class="float_left width_80 cursor"><span class="float_left">Rubrik<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th align="left" class="width_92"><a id="ana_sortby_category" name="profile_analysis_list_table"  class="float_left width_90 cursor"><span class="float_left">Kategori<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th align="left" class="width_84"><a id="ana_sortby_type" name="profile_analysis_list_table"  class="float_left width_80 cursor"><span class="float_left">Typ<img src="/images/bg.gif" alt="down" /></span></a></th>
		<th align="left" class="width_84"><a id="ana_sortby_object" name="profile_analysis_list_table"  class="float_left width_90 cursor"><span class="float_left">Objekt<img src="/images/bg.gif" alt="down" /></span></a></th>
	  </tr>
      <?php foreach($analysis_pager->getResults() as $data): ?>
      		<?php //if( ($data->published == 1 || $data->published == 7) || ($show_top_links == 1) || ($isSuperAdmin == 1) ):?>
			  <tr class="classnot">
				<td class="width_37"><img src="/images/rect_red.gif" alt="rect" width="29" height="16" /></td>
				<td class="width_83"><?php echo substr($data->created_at,2,9) ?></td>
				<td class="main_link_color width_152"><a class="main_link_color" href="<?php echo 'http://'.$host_str.'/sbt/sbtArticleDetails/article_id/'.$data->id;?>"><span class="profile_articlelist_title"><?php echo $data->analysis_title ?></span></a></td>
				<td class="lightgreenfont width_92"><?php echo $cat_arr[$data->analysis_category_id]; ?></td>
				<td class="lightbluefont width_84"><?php echo $type_arr[$data->analysis_type_id]; ?></td>
				<td class="darkbluefont width_84">
					<span class="float_left widthall">
						<?php if($allow_edit == 1):?>
                        		<span class="float_left width_80p"><?php echo $object_arr[$data->analysis_object_id]; ?></span>
								<span class="float_right width_20p">
                                	<a href="<?php echo 'http://'.$host_str.'/sbt/editAnalysis/article_id/'.$data->id;?>"><img src="/images/edit.png" alt="down" /></a>
                                </span>
						<?php else:?>
							<?php if($data->published!=1 && $data->published!=8 && $show_top_links == 1):?>
								<span class="float_left width_80p"><?php echo $object_arr[$data->analysis_object_id]; ?></span>
								<span class="float_right width_20p">
                                	<a href="<?php echo 'http://'.$host_str.'/sbt/editAnalysis/article_id/'.$data->id;?>"><img src="/images/edit.png" alt="down" /></a>
                                </span>
							<?php else:?>
								<span class="float_left width_99p"><?php echo $object_arr[$data->analysis_object_id]; ?></span>
							<?php endif; ?>
                        <?php endif; ?>
					</span>
				</td>
			  </tr>
      		<?php //endif; ?>
	  <?php endforeach; ?>
      <tr>
        <td colspan="6">
		<div class="paginationwrapper">
			<div class="pagination" id="profile_article_analysis_list_listing">
				<?php include_partial('pager_partial',array('pager'=>$pager)) ?>
			</div>
		</div>  
		</td>
      </tr>
    </table>
  </div>
</div>
