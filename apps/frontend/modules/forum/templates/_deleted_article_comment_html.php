<?php if($update_only_forum_topic < 1):?>

      <?php
		$page_num = $pager->getPage() - 1;
		$page_num = $page_num * $rec_per_page;
		$page_num = $page_num + 1;
	  ?>
	  <?php $j = $pager->getPage() == 1 ? 1 : $page_num;  ?>
	<?php $i1=0; $j1=1; foreach ($pager->getResults() as $data): ?>
					<div class="forum_comment_wrapper">
						<div class="forum_comment_top_wraper float_left <?php if($j1%2 ==0){echo "forum_comment_top_even"; }else{echo "forum_comment_top_odd";} ?>">
							<div class="forum_comment_top_left float_left"><?php echo $data->datum; ?></div>
							<div class="forum_comment_top_left"></div>
							<div class="forum_comment_top_right float_right"><a href="<?php echo "http://".$host_str ?>/borst/contactUs/postid/<?php echo $data->id ?>" class="cursor">Rapportera</a></div>
							<div class="forum_comment_top_right float_right pad_rgt_13 cursor" onclick="javascript:getFormForreplay(<?php echo $data->id ?>,'<?php echo $new_profile->getFullUserName($data->author_id) ?>');">Citera</div>
						</div>
						<div class="blank_24h float_left widthall">&nbsp;</div>
						<div class="comment_content_wrapper float_left widthall">
							<div class="width_120 float_left comment_content_img_wrapper">
								<?php if($user_arr[$data->skapare]!=''):?>
										<a class="" href="<?php echo "http://".$host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->author_id ?>"><img src="/uploads/userThumbnail/<?php echo str_replace('.','_large.',$user_arr[$data->skapare]); ?>" alt="user_photo"/></a>
								<?php else:?>
										<a class="" href="<?php echo "http://".$host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->author_id ?>"><img src="/images/forum_userphoto.png" alt="photo" width="110"/></a>
								<?php endif;?>
								<div class="forum_comment_user_name widthall float_left">
									<?php if ($data->author_id!=0) : ?><a class="" href="<?php echo "http://".$host_str ?>/sbt/sbtMinProfile/id/<?php echo $data->author_id ?>"><?php echo ucwords($new_profile->getFullUserName($data->author_id)); ?></a><?php else: echo $data->skapare ; endif; ?>
								</div>
								<?php $data_arr = $new_profile->fetchRegdateAndTotalLoginById($data->author_id);  ?>
								<div class="forum_comment_detail float_left">
									<div class="widthall float_left"></div>
									<div class="widthall float_left">Aktiv: <?php echo $data_arr ? date("M Y", strtotime($data_arr[0]['regdate'])) : '';  ?></div>
									<div class="widthall float_left"><?php echo $data_arr ? $data_arr[0]['inlog'] : ''; ?> inlägg</div>
									<div class="widthall float_left"><?php if($sf_user->getAttribute('user_id','','userProperty') == $data->author_id):?><span class="upcase">Online</span><?php endif;?></div>
									<div class="widthall float_left"><?php if(($sf_user->getAttribute('firstname','','userProperty').' '.$sf_user->getAttribute('lastname','','userProperty') == $data->skapare) || ($sf_user->getAttribute('isSuperAdmin','','userProperty')==1) && ($sf_user->isAuthenticated())): ?><a class="edit_forum_anchor" name="forum_comment" id="editpost<?php echo $data->id; ?>">Redigera</a><?php endif; ?></div>
									<?php if($sf_user->isAuthenticated() && $sf_user->isSuperAdmin()==1): ?>
									<div class="widthall float_left cursor"><a id="<?php echo $data->id;?>" onclick="javascript:open_confirmation_delete_article_comment_forum('Vill du verkligen ta bort detta inlägg',this.id,'delete_article_comment_confirm_box_forum','delete_article_comment_msg_forum')">Radera</a></div>
									<?php endif;?>
								</div>
							</div>
							<div class="float_left width_445 widthall">
								<div class="widthall forum_post_bread">
								<?php
									$str = $data->textarea;
									$str = str_replace("[quote]","<div class='bb-quote'>",$str);
									$str = str_replace("[/quote]","</div>",$str);
									$str = str_replace("[quotename]","<div class='forum_post_quote_ref widthall'>",$str);
									$str = str_replace("[/quotename]","</div>",$str);
									$str = str_replace("[quotedesc]","<div class='forum_post_quote widthall'>",$str);
									$str = str_replace("[/quotedesc]","</div>",$str);
									echo html_entity_decode($str); 
								?>
								</div>
								<?php $signiture = $new_profile->getUserData($data->author_id)->signature; if(!is_null($signiture)){ $linkClickable = new mymarket(); ?>
									<div class="float_left width_445 height_16">&nbsp;</div>
									<div class="float_left width_445 forum_post_line height_1">&nbsp;</div>
									<div class="float_left width_445 height_10">&nbsp;</div>
									<div class="forum_post_tag float_left width_445">
										<?php echo $linkClickable->make_links_clickable(html_entity_decode($signiture),'_blank'); ?>
									</div>
								<?php } ?>
							</div>
						</div>
						<div class="blank_40h float_left">&nbsp;</div>
					</div>
	<?php $j1++; endforeach ?>
			
	<div class="paginationwrapperNew">
		  <div class="forum_pag forum_comment_list_listing" id="">
			<?php if ($pager->haveToPaginate()): ?>
			<?php if($pager->getFirstPage() != $pager->getPage()) { ?>
				<a id="<?php echo $pager->getFirstPage(); ?>" class="cursor"></a><span class="forum_pagination_first_img"></span><span class="forum_pagination_prev" >Första</span> <a id="<?php echo $pager->getPreviousPage(); ?>" class="cursor"> <span class="forum_pagination_prev_img"></span><span class="forum_pagination_prev margin_rgt_7">Föreg</span></a>
			<?php } ?>
			<?php $links = $pager->getLinks(11); foreach ($links as $page): ?>
			<?php if($page == $pager->getPage()): ?>
			<?php echo '<span class="selected">'.$page.'</span>' ?>
			<?php else: ?>
			<a id="<?php echo $page; ?>" class="cursor"><?php echo $page; ?> </a>
			<?php endif; ?>
			<?php if ($page != $pager->getCurrentMaxLink()): ?>
			
			<?php endif ?>
			<?php endforeach ?>
			<?php if($pager->getLastPage() != $pager->getPage()) { ?>
				<a id="<?php echo $pager->getNextPage(); ?>" class="cursor"><span class="margin_lft_3 forum_pagination_next">Nästa</span><span class="forum_pagination_next_img"></span></a> <a id="<?php echo $pager->getLastPage(); ?>" class="cursor"><span class="forum_pagination_next" >Sista</span><span class="forum_pagination_last_img" ></span></a>
			<?php } ?>
			<span>Sid <?php echo $pager->getPage(); ?> av <?php echo $pager->getLastPage(); ?></span>
			<span noclick="1" class="forum_pagination_down_img cursor" onclick="javascript:paginationPopup(this);"></span>
			<div noclick="1" class="forum_popup_pagination_wrapper" >
				<select noclick="1" size="1" class="forum_drop-down-menu_page" value="" onchange="javascript:paginationPopupSelect(this);" >
					<option noclick="1" value="0" class="forum_select_option_color">Gå till sida...</option>
					<?php for($pg = 1;$pg <= $pager->getLastPage();$pg++ ) { ?>
						<option noclick="1" class="color232222" value="<?php echo $pg; ?>" ><?php echo $pg; ?> </option>
					<?php } ?>
				</select>
				<div noclick="1" class="forum_drop-down-menu_go" onclick="javascript:paginationPopupGo(this);">GÅ</div>
			</div>
			<?php endif ?>
		  </div>
	</div>
    
<?php else: ?>
	<?php echo html_entity_decode($forum_topic_data->textarea); ?>
<?php endif; ?>

<?php if($pager->getPage() != $pager->getLastPage() || $pager->getLastPage()==0 )  {?>
<script language="javascript" type="text/javascript">
  $('#post_comment_on_forum_topic_div').hide();
</script>
<?php } 
else { ?>
<script language="javascript" type="text/javascript">
  $('#post_comment_on_forum_topic_div').show();
</script>
<?php } 
if($pager->getPage() == 1 ) { ?>
<script language="javascript" type="text/javascript">
    $('#forum_content #forum_topic_div .commentblock_orgwrapper').show();
</script>
<?php } 
else { ?>
<script language="javascript" type="text/javascript">
    $('#forum_content #forum_topic_div .commentblock_orgwrapper').hide();
</script>
<?php } ?>