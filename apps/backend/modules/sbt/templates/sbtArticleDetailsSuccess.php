<div class="maincontentpage">
<div class="forumlistingleftdiv">
  <div class="forumlistingleftdivinner" style="width:900px;background-color:#F8ECEE; padding:10px;">
   <div class="shoph3 widthall"></div>
	<div class="float_left listing">
	  <?php if($analysis_data):?>
	  <div id="sbt_article_details" class="float_left widthall">
	  	<div class="in_date"><?php echo substr($analysis_data->created_at,0,10); ?></div>
		<div class="photoimg"><img src="/images/inphoto.jpg" alt="photo" /></div>
		<br />
	    <br />
		<h1 class="inheading" style="width:100%; color:#c50063;"><?php echo $analysis_data->analysis_title; ?></h1>
		<div class="float_left listing" style="margin-bottom:10px;">
		<div class="float_left listing" style="margin-top:25px; margin-bottom:12px;"><?php echo $analysis_data->image_text; ?></div>
		<?php if($analysis_data->image!='' && !strstr($analysis_data->image,'images')):?>
			<div class="float_left listing" style="margin-bottom:10px;">
			<img style="clear:right;" src="/uploads/thumbnail/<?php echo str_replace('.','_large.',$analysis_data->image); ?>" />
			</div>
		<?php endif; ?>
		<div class="float_left listing" style="margin-bottom:10px;">
			<?php echo html_entity_decode($analysis_data->analysis_description); ?>
		</div>
		
		<form name="suggestion_on_analysis_form" id="suggestion_on_analysis_form" method="post" action="">
		<input type="hidden" name="publish_date" id="publish_date" />
		<?php echo $form->renderHiddenFields()?>
		
		<div class="float_left widthall mbottom_10">
			<span class="float_left sbt_violet_font"><b><?php echo __('Author')?>:</b></span>
			<span class="float_left mleft_5"><a class="cursor main_link_color" href="<?php echo 'http://'.$host_str.'/sbt/sbtMinProfile/id/'.$analysis_data->author_id ?>"><?php echo $profile->getFullUserName($analysis_data->author_id);?></a></span><br />
			<?php if($combine_data_str):?>
			<span class="float_left sbt_violet_font"><b><?php echo __('Combined Authors')?>:</b></span>
			<span class="float_left mleft_5"><?php echo html_entity_decode($combine_data_str);?></span>
			<?php endif; ?>
		</div>
		
		<div id="suggestion_msg" class="float_left listing" style="padding:10px 10px 10px 0px;"><strong>Suggestion:</strong></div>
		<div class="float_left listing" style="margin-bottom:10px;"><?php echo $form['analysis_suggestion']->render() ?></div>
		<div id="date_suggestion_msg" class="float_left listing" style="padding:10px 10px 10px 0px;"><strong>Publish Date:</strong></div>
		<div id="publish_date" class="float_left listing" style="margin-bottom:10px;">
			<?php include_partial('global/analysis_date_selector')?>	
		</div>
		<div class="float_left listing" style="margin-bottom:10px;">
		<input type="button" name="approve"  id="approve" value="Approve" onclick="approveAnalysis()" class="registerbuttontext submit" style="margin-right:10px;" />
		<input type="button" name="reject"  id="reject" value="Reject" onclick="rejectAnalysis()" class="registerbuttontext submit" style="margin-right:10px;"  />
		</div>
		</form>
		
	  </div>
	  </div>
	  <?php endif;?>
	</div>
  </div>
</div>
</div>