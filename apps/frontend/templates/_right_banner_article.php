<!--﻿<div class="rightbanner autoheight padding_0 font_0">-->
﻿<!--<div class="content_main_div_right">-->
<div class="rightbanner autoheight padding_0 font_0 margin_top_10" style="height: 1138px; min-height: 674px;">
  <?php include_partial('global/ad_message') ?>
  <?php include_partial('global/right_top_ads',array('ad'=>$ad_1)) ?>
  <?php include_partial('global/right_top_ads',array('ad'=>$ad_2)) ?>
  
  <!-- 28 to 35 start -->
  <?php $m=0; for($l = 0; $l < count($twentyeight_2_thirtyfive); $l++):?>
  <?php $date = explode('-',substr($twentyeight_2_thirtyfive[$l]['created_at'],0,10));?>
	<div class="home_right_column">
		<?php if($m==0):?>
		<?php include_partial('global/sponsorer_ad') ?>
		<?php //include_partial('global/bulk_ads',array('bulk_ads'=>$ad_3)) ?>
		<div class="adline"></div>
		<?php endif; ?>
		<div class="dattimeinfo"> 
			<a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/sbt/sbtArticleDetails/article_id/'.$twentyeight_2_thirtyfive[$l]['id']; ?>" class="cursor">
				<span class="date"><?php echo $date[2].' '.$month[$date[1]] ?></span> 
				<span class="update"><?php echo $cat_arr[$twentyeight_2_thirtyfive[$l]['analysis_category_id']] ? $cat_arr[$twentyeight_2_thirtyfive[$l]['analysis_category_id']] : '' ?></span> 
				<span class="sbt_violet_home_type"><?php echo $type_arr[$twentyeight_2_thirtyfive[$l]['analysis_type_id']] ? $type_arr[$twentyeight_2_thirtyfive[$l]['analysis_type_id']] : '' ?></span> 
			</a>
			<a href="<?php echo 'http://'.$host_str.'/sbt/commentOnArticle/article_id/'.$twentyeight_2_thirtyfive[$l]['id']; ?>" class="cursor">
				<span class="sbt_violet_chaticon"><?php echo $comment_cnt->getTotalCommentCount($twentyeight_2_thirtyfive[$l]['id']) ?></span>
			</a>
			<!--<span class="colorband">-->
				<a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/sbt/sbtArticleDetails/article_id/'.$twentyeight_2_thirtyfive[$l]['id']; ?>" class="violetlink cursor"> <!--<img src="/images/smallcolorstrip.jpg" alt="strip" />--></a>
			</span> 
		</div>
		<a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/sbt/sbtArticleDetails/article_id/'.$twentyeight_2_thirtyfive[$l]['id']; ?>" class="blackcolor cursor">
		<div  class="advrtdheading">
		  <h3 class="<?php echo $last_column_style[$m] ?>"><?php echo $twentyeight_2_thirtyfive[$l]['analysis_title'] ?></h3>
		</div>
		</a>
		<div class="advertinfo font_12"> 
			<a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/sbt/sbtArticleDetails/article_id/'.$twentyeight_2_thirtyfive[$l]['id']; ?>" class="blackcolor cursor">
			<img src="/images/arrowsister.gif" alt="arrow" />
			<?php echo $twentyeight_2_thirtyfive[$l]['image_text']?>
			</a>
			<a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtArticleDetails/article_id/<?php echo $twentyeight_2_thirtyfive[$l]['id']; ?>" class="violetlink"> Läs mer ></a>
		</div>
		<div class="advertdiv photo">
		<a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/sbt/sbtArticleDetails/article_id/'.$twentyeight_2_thirtyfive[$l]['id']; ?>" class="violetlink cursor">
			<?php /*?><img src="/images/<?php echo $image_arr_1417[$m] ?>" alt="photo1" /><?php */?>
			<img src="/uploads/thumbnail/<?php echo str_replace('.','_small.',$twentyeight_2_thirtyfive[$l]['image']); ?>" />
		</a>
		</div>
	</div>
  <?php $m++; endfor; ?>
  <!-- 28 to 35 start -->
  
  <?php include_partial('global/bulk_ads',array('bulk_ads'=>$ad_3)) ?>
  <div class="blank_10h">&nbsp;</div>
  <?php include_partial('global/right_top_ads',array('ad'=>$ad_4)) ?>
</div>
