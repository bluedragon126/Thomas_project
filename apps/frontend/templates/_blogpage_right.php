
<style>
    .advertdiv, .advertdiv2{
        margin-left: 0px;
    }
    .mleft_16{
        margin-left: 0px;
    }
</style>
<div class="float_left"><img src="/images/new_home/blog_logo.png" width="190"/></div>
<div class="blank_7h widthall">&nbsp;</div>
<!-- accordion DIV starts here -->
<div class="blogright float_left widthall" id="accordion">
  <div class="blogright_inner">
    <div class="minleft_userphoto" style="height:115px;">
	<?php if($user_photo_data): 
    
          //getting the image size here
      $imageUser = getimagesize("http://".$host_str."/uploads/userThumbnail/".str_replace('.','_large.',$user_photo_data->profile_photo_name));
      ?>
      <style>
      .user_img{
        width: <?php echo $imageUser[0]; ?>px;
        height: <?php echo $imageUser[1]; ?>px;
        border-radius: 7px;
        background-image: url('/uploads/userThumbnail/<?php echo str_replace('.','_large.',$user_photo_data->profile_photo_name); ?>');
      }
      </style>
        
        <div class="user_img">
        </div>

		<!--<img src="/uploads/userThumbnail/<?php //echo str_replace('.','_large.',$user_photo_data->profile_photo_name); ?>" alt="user_photo" class="userimg" />-->
	<?php else: ?>
		<?php if($user_details->gender == 1):?>
			<img src="/images/new_home/blog_user_img.png" width="107" class="border_radius_7" alt="default_user" />
		<?php else: ?>
			<img src="/images/new_home/blog_user_img.png" width="107" class="border_radius_7" alt="default_user" />
		<?php endif; ?>
	<?php endif; ?>
	</div>
      <div class="blog_welc_name"><?php echo $profile->getFullUserName($user_details->user_id) ?></div>
      <div class="blog_welc_my"><?php echo __('Välkommen till min blogg!') ?></div>
      <div class="blog_welc_pres"><?php $sbt_blog_profile_comment = SbtUserBlogProfileTable::getInstance()->fetchUserBlogProfile($user_details->user_id);  if ($sbt_blog_profile_comment) { echo $sbt_blog_profile_comment->getBlogProfileComment(); } ?></div>
      
    <!--<div class="rating_wrapper"><img src="/images/ratingstar_org.png" alt="star" /><img src="/images/ratingstar_org.png" alt="star" /><img src="/images/ratingstar_org.png" alt="star" /><img src="/images/ratingstar_org.png" alt="star" /><img src="/images/ratingstar_org.png" alt="star" /></div>-->
    <?php if($gold_cnt > 0):?>
	  	<div class="float_left" style="width:100%;"><img src="/images/medal_gold.png" alt="gold_star" height="18" width="18" /> <?php echo __('Author of the year : ').$gold_cnt ?></div>
	  <?php endif;?>
	  
	  <?php if($silver_cnt > 0):?>
		<div class="float_left" style="width:100%;"><img src="/images/medal_silver.png" alt="silver_star" height="18" width="18" /> <?php echo __('Author of the month : ').$silver_cnt; ?></div>
	  <?php endif;?>
	  
	  <?php if($bronze_cnt > 0):?>
		  <div class="float_left" style="width:100%;"><img src="/images/medal_bronze.png" alt="bronze_star" height="18" width="18" /> <?php echo __('Most Popular Author : ').$bronze_cnt ?></div>
	  <?php endif;?>
        <div class="userinfo_min"> <!--<img src="/images/thumbsmall_pphoto.gif" alt="photo" />--><font  class="main_link_color"><a class="main_link_color" href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $user_details->user_id ?>"><img src="/images/new_home/blog_goto.png" alt="Blog goto" width="85"/></a></font><br /><br/>
      <!--<img src="/images/redarrow.gif" alt="photo" /><font  class="main_link_color"> Markera som läst </font><br />-->
    <span class="blog_welc_info_q">Medlem sedan:</span><span class="blog_welc_info_a"> <?php echo substr($user_details->regdate,0,10) ?></span><br />
      <?php /*?>Plats:<font color="#014c8f"> <?php echo ucfirst($user_details->street) ?> , <?php echo ucfirst($user_details->city) ?></font><br /><?php */?>
      <span class="blog_welc_info_q">Poster:</span><span class="blog_welc_info_a"> <?php echo $data_arr['user_forum_count'] ?></span><br />
      <span class="blog_welc_info_q">Blogginlägg:</span><span class="blog_welc_info_a"> <?php echo $data_arr['user_blog_count'] ?></span><br/>
      
  <div class="blogsliderwrapper">
    <div class="blogslider" id="blogslider3">
      <span class="blog_welc_info_q">Arkiv</span>
      <a href="#" class="blogarrowicon"><img src="/images/addplusicon.png" alt="arrow" class="one" name="1" width="14" /></a> </div>
    <div class="blogright_inner">
      <div class="float_left widthall"><div id="datepicker"></div></div>
      <div class="float_left widthall blog_list_of_month" id="blog_of_month"></div>
    </div>
  </div>
      
      <div class="blank_7h widthall">&nbsp;</div>
	  <?php /*?><a id="user_all_blog_post" class="cursor" style="color:#014c8f;" name="<?php echo $user_details->user_id ?>">Show all blog post:</a><?php */?> </div><br/>
	  <div class="float_left widthall"><input type="hidden" name="blog_user_id" id="blog_user_id" value="<?php echo $user_details->user_id ?>"/></div>
	  <div class="float_left widthall" style="border:0px solid red; padding-top:10px;">
		<div class="float_left widthall" style="border:0px solid green;">
			<?php if($user_guard_data->is_super_admin == 1): ?>
				<?php echo '<span class="blog_welc_info_q">Group:</span> <span class="blog_welc_info_a">Admin</span>'; ?>
			<?php else: ?>
				<?php if($user_guard_data->hasGroup('SbtArticlePublisher')): ?>
					<?php echo '<span class="blog_welc_info_q">Group:</span> <span class="blog_welc_info_a">Publisher</span>'; ?>
				<?php else: ?>
					<?php echo '<span class="blog_welc_info_q">Group:</span> <span class="blog_welc_info_a">Regular</span>'; ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php $articleCnt = SbtAnalysis::getCntPublishedArticles($sf_user->getGuardUser() ? $sf_user->getGuardUser()->getId() : '');
			  $user_data = $sf_user->getGuardUser() ? $sf_user->getGuardUser()->getSfGuardUserProfile() : '';
		?>
		<?php if(!$user_guard_data->is_super_admin && ($user_data->from_sbt != 0 && $user_data->sbt_active != 0 && !$user_guard_data->hasGroup('SbtArticlePublisher') && $articleCnt >= 5)):?>
		<?php if($own_profile==1): ?>
		<?php $reply = $profile->isApplyedForPublisher($user_guard_data->id);?>
		<?php if($reply == 1 || $reply == 3):?>
			<div id="request_publisher_status" class="float_left widthall" style="border:0px solid green;">
				<?php if($reply == 1):?><?php echo 'Publisher Request Status: <font color="#014c8f">In Process</font>'; ?><?php endif; ?>
				<?php if(($reply == 3) && (!$user_guard_data->hasGroup('SbtArticlePublisher'))):?><a class="cursor" name="<?php echo 'authorid_'.$user_guard_data->id;?>"><font color="#014c8f">Send Request To become a publisher</font></a><?php endif; ?>
			</div>
		<?php endif; ?>
		<?php endif; ?>
		<?php endif; ?>
	</div>
  </div>

   <!--<div class="blogsliderwrapper">
    <div class="blogslider" id="blogslider1">
      <h2 class="blogright_heading">Nyliga kommentarer</h2>
      <a href="#" class="float_right blogarrowicon"><img src="/images/blog_uparrow.gif" alt="arrow" class="one" name="1" /></a> </div>
    <div class="blogright_inner" id="recent_blog_comment">
      <?php //if($pager): ?>
	  <?php //if($pager->getNbResults() > 0): ?>
	  <?php //$i=0; foreach($pager->getResults() as $data):?>
			<?php //if($i > 4): ?><?php //break; ?><?php //endif; ?>
			<div class="float_left widthall">
			<div class="float_left">
			<?php //if($user_photo_arr[$data->comment_by]!=''):?>
					<img src="/uploads/userThumbnail/<?php //echo str_replace('.','_small.',$user_photo_arr[$data->comment_by]); ?>" alt="user_photo"/>
			<?php //else:?>
					<img src="/images/bloguserphoto.gif" alt="photo" />
			<?php //endif;?>
			</div>
			<div  class="blogppersonalinfo main_link_color"><span class="blog_rightpanel_comment"><?php //echo $data->blog_comment ?></span><br />
			  <b class=" borst_subtitle_4"><?php //echo $profile->getFullUserName($data->comment_by) ?></b></div>
			<div class="grayline">&nbsp;</div>
			<div class="blank_10h widthall">&nbsp;</div>
		  </div>
	  <?php //$i++; endforeach;?>
      <?php //endif; ?><?php //endif; ?>
    </div>
  </div>-->
   <?php if($isSuperAdmin == 1):?>
  <div class="blogsliderwrapper">
      
    <div class="blogslider" id="blogslider2">
        <h2 class="blogright_heading blog_welc_info_q">besökare: <span class="blog_welc_info_a">Denna sida har haft <?php echo count($visitor_name_id_arr); ?> besök</span></h2>
      <!--<a href="#" class="float_right blogarrowicon"><img src="/images/blog_uparrow.gif" alt="arrow" class="one" name="1" /></a> -->
	  </div>
      
    <div class="blogright_inner"> 
		<span class="main_link_color">
		  <?php $j=0; foreach($visitor_name_id_arr as $key=>$value):?>
			<?php //if($j > 1) break; ?>
			<?php if($j==0):?>
					<a href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $key; ?>"><span  class="main_link_color l18_height"><?php echo $value; ?></span></a>
			<?php else: ?>
					<a href="http://<?php echo $host_str ?>/sbt/sbtMinProfile/id/<?php echo $key; ?>"><span  class="main_link_color l18_height"><?php echo ' , '.$value; ?></span></a>
			<?php endif; ?>
		  <?php $j++; endforeach;?><br />   
    	</span>
	</div>
  </div>
   <?php endif; ?>
  <div class="home_artline_blog" style="margin-bottom: 6px;">&nbsp;</div>

</div>
<!-- accordion DIV ends here -->  
<div class="home_ad_r float_left" style="margin-left: 0px;">Annons</div>
<div class="minsid_lefttopdiv_banner">&nbsp;</div>
<div class="blog_advert_wrapper" id="profile_ads">
<?php include_partial('global/right_ads_column',array('ad_1'=>$ad_1,'ad_2'=>$ad_2,'ad_3'=>$ad_3,'ad_4'=>$ad_4,'set_margin'=>$set_margin)) ?>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#accordion .blogslider').click(function() {
		$(this).next().toggle(250);
        active = $("#accordion").accordion( "option", "active" );
        current = $(this).attr('id');
                
        var visible = $('#'+current+' .one').attr('name');
        if(visible=='1'){
            $('#'+current+' .one').attr('src','/images/minusucon.png')
            $('#'+current+' .one').attr('name','0');    
        }
        else{
            $('#'+current+' .one').attr('src','/images/addplusicon.png')
            $('#'+current+' .one').attr('name','1');   
        }
		return false;
	}).next().hide();   
  });
</script>