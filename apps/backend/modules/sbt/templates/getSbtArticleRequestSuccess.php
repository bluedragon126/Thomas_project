  <?php if($pager->getNbResults() > 0):?>
  <div class="float_left widthall">
  <input type="hidden" id="tab_id" name="tab_id" value="<?php echo $tab_id; ?>" />
  <input type="hidden" id="sbt_analysis_column_order" name="sbt_analysis_column_order" value="<?php echo $current_column_order; ?>"/>
  <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
  <input type="hidden" id="sbt_analysis_column" name="sbt_analysis_column" value="<?php echo $cur_column; ?>"/>
  </div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="update_analysis_list_table">
    <thead>
	  <tr id="update_analysis_form_column_row">
		<th scope="col" width="5%">Nr</th>
		<th scope="col" width="50%"><a id="sortby_title" style="cursor:pointer;" class="float_left"><span class="float_left" style="width:90px;">Article Title<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
		<th scope="col" width="15%"><a id="sortby_vote" style="cursor:pointer;" class="float_left"><span class="float_left" style="width:105px;">Vote Received<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
		<th scope="col" width="15%"><a id="sortby_author" style="cursor:pointer;" class="float_left"><span class="float_left" style="width:80px;">Författare<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
		<th scope="col" width="15%"><a id="sortby_date" class="float_left" style="cursor:pointer;"><span class="float_left" style="width:100px;">Created Date<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
	  </tr>
	</thead>
    <?php $status_arr = array('0'=>'UnPublished','1'=>'Published','2'=>'Rejected')?>
    <?php $i=1; foreach ($pager->getResults() as $analysis): ?>
    <tr class="classnot">
      <td><?php echo $i++; ?></td>
      <td><a class="blackcolor" href="<?php echo 'https://'.$host_str.'/backend.php/sbt/sbtArticleDetails/article_id/'.$analysis->id ?>"><?php echo $analysis->analysis_title; ?></a></td>
      <td><?php echo $analysis->analysis_votes; ?></td>
      <td><?php echo $profile->getFullUserName($analysis->author_id); ?></td>
      <td><?php echo $analysis->created_at; ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <div class="paginationwrapper" style="padding-top:10px;">
	<div class="pagination" id="update_analysis_list_listing" style="padding-right:5px;">
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
 </div> 
 <?php else:?>
 <div class="float_left widthall" style="margin-bottom:20px; text-align:center;"><b>No Records</b></div>
 <?php endif ?>
