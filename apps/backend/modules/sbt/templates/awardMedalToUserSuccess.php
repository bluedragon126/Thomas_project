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
		<?php include_partial('global/medals_menu',array('host_str'=>$host_str,'tab'=>'medal_user')) ?>
	  </div>
	  
	  <div id="sbt_medal_content_div"  class="float_left" style="width:900px; border:1px solid #999999;margin-bottom:20px;padding-bottom:10px;">
		  <?php if($award_message):?>
		  	<div class="float_left" style="width:890px; border:0px solid red; font-size:15px;padding:20px 0px 10px 10px; color:#FFCC00;"><?php echo $award_message ?></div>
		  <?php endif; ?>
		  <div class="shoph3 float_left" style="width:890px; border:0px solid red;padding:20px 0px 30px 10px;"><?php echo __('Award medal to '.$username)?></div>
		  <div class="float_left" style="width:445px; border:0px solid red;">
		  	<div class="float_left medal_img_div"><a class="cursor" onclick="javascript:awardMedalToAuthor('medal_note_for_author_box','1')"><img src="/images/medal_gold.png" alt="arrow" /></a></div>
			<div class="float_left medal_img_div"><a class="cursor" onclick="javascript:awardMedalToAuthor('medal_note_for_author_box','2')"><img src="/images/medal_silver.png" alt="arrow" /></a></div>
			<div class="float_left medal_img_div"><a class="cursor" onclick="javascript:awardMedalToAuthor('medal_note_for_author_box','3')"><img src="/images/medal_bronze.png" alt="arrow" /></a></div>
			
			<div class="float_left medal_type_div"><a class="cursor" onclick="javascript:awardMedalToAuthor('medal_note_for_author_box','1')">Author of the Year</a></div>
			<div class="float_left medal_type_div"><a class="cursor" onclick="javascript:awardMedalToAuthor('medal_note_for_author_box','2')">Author of the Month</a></div>
			<div class="float_left medal_type_div"><a class="cursor" onclick="javascript:awardMedalToAuthor('medal_note_for_author_box','3')">Most Popular Author</a></div>
		  </div>
		  
		 <div class="float_left" style="width:445px; border-left:1px solid #999999;">
		 	<div id="medal_img" class="float_left user_photo"><img src="/images/userphoto.jpg" alt="arrow" /></div>
			<div class="float_left" style="border:0px solid #993399;width:313px;">
				<div class="float_left medals_achived_img"><img src="/images/votes_received.png" alt="arrow" /></div>
				<div class="float_left medals_achived_img"><img src="/images/medals_achived.png" alt="arrow" /></div>
				<div class="float_left medals_achived_txt"><?php echo $vote ?> Votes</div>
				<div class="float_left medals_achived_txt"><?php echo $medal_cnt ?> Medals Achived</div>
			</div>
			<div class="float_left" style="border:0px solid #993399;width:430px; padding:0px 0px 10px 13px;"><?php echo $username; ?></div>
		 </div>
		 
		 <div class="float_left" style="width:900px; border-top:1px solid #999999;margin-right:2px;">
			<div class="float_left" style="width:434px; border:0px solid red; margin-left:5px;">
			<div class="float_left" style="width:445px; padding:5px 0px 5px 10px; font-weight:bold;"><?php echo __('Recent Article written By '.$username)?></div>
			<table width="50%" border="0" cellspacing="0" cellpadding="0" id="medal_analysis_list_table" style="border:1px solid #999999;">
				<thead>
					<tr>
					<th scope="col" width="5%" style="text-align:center;">Nr</th>
					<th scope="col" width="25%">Article Name</th>
					<th scope="col" width="25%">Date</th>
					</tr>
				</thead>
				<?php if(count($analysis_data) > 0):?>
				<?php $i=1; foreach ($analysis_data as $article): ?>
				<tr id="medal_analysis_record_row" class="classnot">
					<td style="text-align:center;font-weight:normal;"><?php echo $i++; ?></td>
					<td style="font-weight:normal;"><a href="<?php echo 'https://'.$host_str.'/backend.php/sbt/awardMedalToArticle/analysis_id/'.$article->id; ?>" class="cursor"><?php echo $article->analysis_title ?></a></td>
					<td style="font-weight:normal;"><?php echo $article->created_at ?></td>
				</tr>
				<?php endforeach; ?>
				<?php else: ?>
				<tr id="medal_blog_record_row" class="classnot">
					<td style="text-align:center;font-weight:normal;" colspan="3"><?php echo 'No Result'; ?></td>
				</tr>
				<?php endif; ?>
			  </table>
			</div>
			<div class="float_left" style="border:1px solid white; width:10px;"></div>
			<div class="float_left" style="width:443px; border:0px solid pink;">
			<div class="float_left" style="width:445px; padding:5px 0px 5px 10px; font-weight:bold;"><?php echo __('Recent Blog written By '.$username)?></div>
				<table width="50%" border="0" cellspacing="0" cellpadding="0" id="medal_analysis_list_table" style="border:1px solid #999999;">
				<thead>
					<tr>
					<th scope="col" width="5%" style="text-align:center;">Nr</th>
					<th scope="col" width="25%">Blog Title</th>
					<th scope="col" width="25%">Date</th>
					</tr>
				</thead>
				<?php if(count($blog_data) > 0):?>
				<?php $i=1; foreach ($blog_data as $blog): ?>
				<tr id="medal_blog_record_row" class="classnot">
					<td style="text-align:center;font-weight:normal;"><?php echo $i++; ?></td>
					<td style="font-weight:normal;"><?php echo $blog->ublog_title ?></td>
					<td style="font-weight:normal;"><?php echo $blog->created_at ?></td>
				</tr>
				<?php endforeach; ?>
				<?php else: ?>
				<tr id="medal_blog_record_row" class="classnot">
					<td style="text-align:center;font-weight:normal;" colspan="3"><?php echo 'No Result'; ?></td>
				</tr>
				<?php endif; ?>
			  </table>
			</div>
		 </div>
		  
	 </div>
	  
	</div>
	</div>
</div>
</div>
<!-- ui-dialog-award medal to analysiss -->
<div id="medal_note_for_author_box" title="Comment on Author while awarding it a Medal">
 <form id="award_medal_to_author" name="award_medal_to_author" method="POST">
 <?php echo $form->renderHiddenFields()?>
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="award_note">Message:</td>
	</tr>
	<tr>
		<td><?php echo $form['award_note_by_admin']->render(array('cols'=>60, 'rows'=>4)); ?></td>
	</tr>
 </table>
</form>
</div>