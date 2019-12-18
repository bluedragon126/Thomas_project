<?php if($one_blog):?>
<div class="blog1advrt">

<?php if($valid_user == 1):?>
	<?php if($add_in_fav_list == 0):?>
		<div id="f_blog" class="blog_add_fav_div">
			<a class="add_to_favorite" id="<?php echo 'blog_'.$one_blog->id.'_'.$user_id;?>" name="<?php echo $one_blog->ublog_title; ?>">Add to Favorite</a>
		</div>
	<?php else:?>
		<div class="blog_add_fav_div" style="color:#333333;"><?php echo __('LAGD I FAVORITER')?></div>
	<?php endif; ?>
<?php endif; ?>

<div class="blog_home_page"><a class="cursor" href="<?php echo 'https://'.$host_str.'/sbt/showListOfUserBlog/uid/'.$one_blog->author_id ?>" name="<?php echo $one_blog->author_id; ?>"><?php echo __('Bloggens Startsida')?></a></div>

<div class="blog_date viocolor">
	<?php if($user_id == $one_blog->author_id || $isSuperAdmin==1): ?><span style="vertical-align: bottom;"><a href="<?php echo 'https://'.$host_str.'/sbt/sbtEditBlog/blog_id/'.$one_blog->id;?>" class="cursor"><img src="/images/edit.png" alt="down" /></a></span>&nbsp;&nbsp;<?php endif;?>
	<?php if($one_blog->updated_at==null) echo "<span>Created At : ".$one_blog->created_at."</span>"; else echo "<span>Updated At : ".$one_blog->updated_at."</span>" ?>
</div>
<div class="float_left widthall spacer">
	<input type="hidden" name="current_user" id="current_user" value="<?php echo $logged_user ?>"/>
	<input type="hidden" name="blog_id" id="blog_id" value="<?php echo $blog_id ?>"/>
</div>
<h2><?php echo $mymarket_title->correctDetailTitle($one_blog->ublog_title)  ?></h2>
<div class="bloginfo">
	<?php echo SbtUserBlog::filterMyString(html_entity_decode($one_blog->ublog_description)); ?>
</div>
<div id="vote_div" class="float_left widthall">
 <?php if($rec_present == 0):?>
	<span class="float_left" style="border:0px solid blue;">
		<a class="float_left" style="cursor:pointer;" onclick="show_vote_meter_on_blog('<?php echo $valid_user; ?>')">
			<img src="/images/vote_symb.gif" alt="icon"  class="float_left padtop_5"  />
			<b class="float_left main_link_color f_top">&nbsp;&nbsp;Rösta</b>
		</a>
	</span>
	<span class="float_left" style="border:0px solid green; margin-top:6px; margin-left:5px;">
	<?php for($i=1;$i<=$no_of_stars;$i++):?>
		<img class="float_left" alt="star" src="/images/ratingstar_org.png" />
	<?php endfor; ?>
	</span>
	<span class="float_left" style="color:#547184;  margin-top:7px; margin-left:5px; border:0px solid red;">Röster: <?php echo $total_vote_cnt ?></span>
	
 <?php else: ?>
	<span class="float_left">
	<?php for($i=1;$i<=$no_of_stars;$i++):?>
		<img class="float_left" alt="star" src="/images/ratingstar_org.png" />
	<?php endfor; ?>
	</span>
	<span class="float_left" style="color:#547184; margin-left:5px;">Röster: <?php echo $total_vote_cnt ?></span>
 <?php endif; ?>
</div>

<div id="blog_vote_option" class="float_left widthall" style="padding-top:10px; visibility:hidden; display:none;">
	<form name="vote_blog_form" id="vote_blog_form" method="post" action="">
	<input type="hidden" name="blog_id" id="blog_id" value="<?php echo $one_blog->id; ?>"/>
	<div class="vote_panel">
		<div class="float_left vote_panel_outer">
			
			<div class="float_left vote_panel_header_row"><?php echo __('Rösta')?></div>
			
			<div class="float_left vote_panel_option_row">
				<div class="float_left" style="width:85px; padding:2px 1px 1px 5px;">
				<?php for($i=0;$i<=4;$i++):?>
					<img alt="star" src="/images/ratingstar_org.png" />
				<?php endfor; ?>
				</div>
				<div class="float_left" style="border:0px solid blue;padding:2px 1px 1px 2px;">
					<input type="radio" class="radio" name="vote_type" id="vote_type" value="2" /></div>
				<div class="float_left" style="padding:2px 1px 1px 2px;font-weight:bold; color:#000000;">
					<?php echo __('Toppen')?>
				</div>
			</div>
			
			<div class="float_left vote_panel_option_row">
				<div class="float_left" style="width:85px; padding:2px 1px 1px 5px;">
				<?php for($i=0;$i<4;$i++):?>
					<img alt="star" src="/images/ratingstar_org.png" />
				<?php endfor; ?>
				<?php for($i=0;$i<1;$i++):?>
					<img alt="star" src="/images/ratingstar_gray.png" />
				<?php endfor; ?>
				</div>
				<div class="float_left" style="border:0px solid blue;padding:2px 1px 1px 2px;">
					<input type="radio" class="radio" name="vote_type" id="vote_type" value="2" /></div>
				<div class="float_left" style="padding:2px 1px 1px 2px;font-weight:bold; color:#000000;">
					<?php echo __('Bra')?>
				</div>
			</div>
			
			<div class="float_left vote_panel_option_row">
				<div class="float_left" style="width:85px; padding:2px 1px 1px 5px;">
				<?php for($i=0;$i<3;$i++):?>
					<img alt="star" src="/images/ratingstar_org.png" />
				<?php endfor; ?>
				<?php for($i=0;$i<2;$i++):?>
					<img alt="star" src="/images/ratingstar_gray.png" />
				<?php endfor; ?>
				</div>
				<div class="float_left" style="border:0px solid blue;padding:2px 1px 1px 2px;">
					<input type="radio" class="radio" name="vote_type" id="vote_type" value="2" /></div>
				<div class="float_left" style="padding:2px 1px 1px 2px;font-weight:bold; color:#000000;">
					<?php echo __('Okej')?>
				</div>
			</div>
			
			<div class="float_left vote_panel_option_row">
				<div class="float_left" style="width:85px; padding:2px 1px 1px 5px;">
				<?php for($i=0;$i<2;$i++):?>
					<img alt="star" src="/images/ratingstar_org.png" />
				<?php endfor; ?>
				<?php for($i=0;$i<3;$i++):?>
					<img alt="star" src="/images/ratingstar_gray.png" />
				<?php endfor; ?>
				</div>
				<div class="float_left" style="border:0px solid blue;padding:2px 1px 1px 2px;">
					<input type="radio" class="radio" name="vote_type" id="vote_type" value="2" /></div>
				<div class="float_left" style="padding:2px 1px 1px 2px; font-weight:bold;color:#000000;">
					<?php echo __('Nja...')?>
				</div>
			</div>
			
			<div class="float_left vote_panel_option_row">
				<div class="float_left" style="width:85px; padding:2px 1px 1px 5px;">
				<?php for($i=0;$i<1;$i++):?>
					<img alt="star" src="/images/ratingstar_org.png" />
				<?php endfor; ?>
				<?php for($i=0;$i<4;$i++):?>
					<img alt="star" src="/images/ratingstar_gray.png" />
				<?php endfor; ?>
				</div>
				<div class="float_left" style="border:0px solid blue;padding:2px 1px 1px 2px;">
					<input type="radio" class="radio" name="vote_type" id="vote_type" value="2" /></div>
				<div class="float_left" style="padding:2px 1px 1px 2px;font-weight:bold; color:#000000;">
					<?php echo __('Dålig')?>
				</div>
			</div>
			
			<div class="float_left vote_panel_option_row" style="border-bottom:1px solid #CED2D0;">
				<div class="float_left" style="width:85px; padding:2px 1px 1px 5px;">
				<?php for($i=0;$i<5;$i++):?>
					<img alt="star" src="/images/ratingstar_gray.png" />
				<?php endfor; ?>
				</div>
				<div class="float_left" style="border:0px solid blue;padding:2px 1px 1px 2px;">
					<input type="radio" class="radio" name="vote_type" id="vote_type" value="2" /></div>
				<div class="float_left" style="padding:2px 1px 1px 2px; font-weight:bold; color:#000000;">
					<?php echo __('Urusel')?>
				</div>
			</div>
			
			<div class="float_left" style="padding-top:5px; padding-left:5px;">
				<div class="submit_votebutton"><input type="button" name="post_data" id="post_data" class="submit_votebuttontext submit" value="<?php echo __('Rösta  nu') ?>" onclick="submit_vote_for_blog()"/></div>
			</div>
			
			
		</div>
	</div>
	
	
	</form>
	<div class="float_left" style="margin-left:10px; color:#FF0000;" id="vote_error"></div>
</div>

<div class="blank_10h widthall">&nbsp;</div>
<div class="grayline">&nbsp;</div>
<div class="blank_10h widthall">&nbsp;</div>
</div>

<div class="commentwrapper">

<div class="float_left widthall" id="show_blog_comment_div">
<div class="commentheading"><font size="+2" color="#c50063"><?php echo $pager->getNbResults(); ?></font> kommentarer, läs nedan eller <span class="main_link_color"><a id="comment_on" class="main_link_color" rel="nofollow" style="cursor:pointer" href="#comment_on_blog">lägg till en egen</a></span></div>
  <?php foreach($pager->getResults() as $data):?>
	  <div class="comment_messagewrapper">
		<div class="float_left" style="width:30px;"><a href="https://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->comment_by ?>">
		<?php if($user_photo_arr[$data->comment_by]!=''):?>
			<img src="/uploads/userThumbnail/<?php echo str_replace('.','_small.',$user_photo_arr[$data->comment_by]); ?>" alt="user_photo"/>
		<?php else:?>
		  <img alt="photo" src="/images/new_home/blog_user_img.png">
		<?php endif;?>
		</a></div>
		<div class="info">
		  <div class="float_left widthall"><b class="borst_subtitle_4"><a class="borst_subtitle_4" href="https://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->comment_by ?>"><?php echo $profile->getFullUserName($data->comment_by) ?></a></b> <b class="lightbluefont"><?php echo $data->created_at ?></b></div>
		  <?php echo $data->blog_comment ?></div>
	  </div>
  <?php endforeach;?>
 <!-- <div class="reply_messagewrapper">
<div class="float_left"><img alt="photo" src="/images/new_home/blog_user_img.png"></div>
<div class="info">
  <div class="float_left widthall"><b class="vio_blue">Walter Haraldsson</b></div>
  Well, I would rather just live in Bulgaria, a place I nested for 13 months, not really into that American
  thing anymore. But, nice house, happy living.</div>
</div>-->
<div class="paginationwrapper">
	<div class="pagination" id="blog_comment_list_listing" style="padding-right:2px;">
	<?php if ($pager->haveToPaginate()): ?>
		<a id="<?php echo $pager->getFirstPage(); ?>" style="cursor:pointer;"><img src="/images/left_arrow_trans.png" alt="arrow" />  </a> <a id="<?php echo $pager->getPreviousPage(); ?>" style="cursor:pointer;"> < </a>
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
		<a id="<?php echo $pager->getNextPage(); ?>" style="cursor:pointer;"> > </a> <a id="<?php echo $pager->getLastPage(); ?>" style="cursor:pointer;"> <img src="/images/right_arrow_trans.png" alt="arrow" /> </a>
	<?php endif ?>
	</div>
</div>
</div>

<div id="blog_text_error" class="float_left" style="padding:15px 0 0 30px; color:#FF0000; width:70%;"></div>
<div id="comment_on_blog" class="Commentformwrapper">
<div class="heading">Kommentera</div>
<form name="post_blog_comment_form" id="post_blog_comment_form" method="post" action="" onsubmit="return comment_blog_validation_check()">
	<?php echo $blogCommentForm->renderHiddenFields()?>	
	<div id="comment_blog_validation" class="float_left widthall" style="color:#FF0000; margin-top:7px; display:none; visibility:hidden;">Required</div>
	<div class="float_left widthall">
		<?php echo $blogCommentForm['blog_comment']->render(array('class'=>'commenttextarea'))?>
	</div>
	<div class="float_left widthall">
		<input name="blog_followup" id="blog_followup" type="checkbox" value="" <?php echo $is_notified == 1 ? 'checked' : '';  ?> onclick="is_blog_followup()" />
		Notify me of followup comments via e-mail </div>
	<div class="blank_10h widthall">&nbsp;</div>
	<div class="float_left widthall" id="post_blog_comment_div">
		<div class="registerbtn">
			<div class="registerbutton float_left">
			<input type="button" name="post_blog_comment" id="post_blog_comment" value="SKICKA" class="registerbuttontext submit">
			</div>
		</div>
	</div>
</form>
</div>
</div> 
<?php endif; ?>

