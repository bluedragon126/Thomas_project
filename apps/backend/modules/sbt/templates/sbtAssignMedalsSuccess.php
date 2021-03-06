<style type="text/css">
.medal_img_div{width:145px; border:0px solid red; text-align:center;}
.medal_type_div{width:145px; border:0px solid red; text-align:center; font-weight:bold;}
.medals_achived_img{width:150px; border:0px solid red; text-align:center;}
.medals_achived_txt{width:150px; border:0px solid red;text-align:center;font-weight:bold;}
.user_photo{border:0px solid green; padding:0 10px 10px 10px;}
</style>
<div class="maincontentpage">
<div class="forumlistingleftdiv">
  <div class="forumlistingleftdivinner" style="width:900px;">
   <div class="shoph3 widthall">Sbt Assign Medals</div>
	<div class="float_left listing">
	  
	  <div id="assign_medals_menu_div" class="float_left widthall">
		<?php include_partial('global/medals_menu',array('host_str'=>$host_str,'tab'=>'medal_article')) ?>
	  </div>
	  
	  <div id="sbt_medal_content_div"  class="float_left widthall" style="padding-top:20px; margin-bottom:20px;">
		  <div class="float_left widthall">
		  <input type="hidden" id="medal_analysis_column_order" name="medal_analysis_column_order" value="<?php echo $current_column_order; ?>"/>
		  <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
		  <input type="hidden" id="medal_analysis_column" name="medal_analysis_column" value="<?php echo $cur_column; ?>"/>
		  </div>
		  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="medal_analysis_list_table">
			<thead>
				<tr id="medal_analysis_list_column_row">
				<th scope="col" width="5%">Nr</th>
				<th scope="col" width="55%"><a id="sortby_title" style="cursor:pointer;" class="float_left"><span class="float_left" style="width:80px;">Rubrik<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
				<th scope="col" width="20%"><a id="sortby_vote" style="cursor:pointer;" class="float_left"><span class="float_left" style="width:105px;">Vote Received<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
				<th scope="col" width="20%"><a id="sortby_date" style="cursor:pointer;" class="float_left"><span class="float_left" style="width:60px;">Datum<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
				</tr>
			</thead>
			<?php if($pager->getNbResults()):?>
			<?php $i=1; foreach ($pager->getResults() as $article): ?>
			<tr id="medal_analysis_record_row" class="classnot">
				<td><?php echo $i++; ?></td>
				<td><a href="<?php echo 'https://'.$host_str.'/backend.php/sbt/awardMedalToArticle/analysis_id/'.$article->id; ?>" class="cursor"><?php echo $article->analysis_title ?></a></td>
				<td><?php echo $article->analysis_votes; ?></td>
				<td><?php echo $article->created_at ?></td>
			</tr>
			<?php endforeach; ?>
			<?php else: ?>
			<?php echo 'No Result'; ?>
			<?php endif; ?>
		  </table>
		  <div class="paginationwrapper" style="padding-top:10px;">
			<div class="pagination" id="medal_analysis_list_listing" style="padding-right:5px;">
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
	  </div>
	  
	</div>
	</div>
</div>
</div>