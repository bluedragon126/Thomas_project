<div class="maincontentpage">
<div class="forumlistingleftdiv">
  <div class="forumlistingleftdivinner" style="width:900px;">
   <div class="shoph3 widthall">Check Publisher Request</div>
	<div class="float_left listing">
	  
	  <div id="assign_medals_menu_div" class="float_left widthall">
		<?php include_partial('global/publisher_menu',array('host_str'=>$host_str,'tab'=>'publisher_all_user')) ?>
	  </div>
	  
	  <div class="float_left widthall width_480 ptop_10">
	  	  <span id="successMsg" class="float_left redcolor hide_div" ></span>
	  </div>
	  <div id="sbt_publisher_request_content_div"  class="float_left widthall width_480 ptop_10">
		  <div class="float_left widthall">
		  <input type="hidden" id="publisher_request_userlist_column_order" name="publisher_request_userlist_column_order" value="<?php echo $current_column_order; ?>"/>
		  <input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
		  <input type="hidden" id="publisher_request_userlist_column" name="publisher_request_userlist_column" value="<?php echo $cur_column; ?>"/>
		  </div>
		  
		  <form name="assign_to_publisher_form" id="assign_to_publisher_form" method="post" action="">
		  <div id="request_send_button" class="float_right" style="margin-bottom:5px;">
                      <input type="button" value="Save Changes" name="assign_to_publisher_button" id="assign_to_publisher_button" class="registerbuttontext submit float_right" style="float:right;" />
                      
		  </div>
		  <table width="50%" border="0" cellspacing="0" cellpadding="0" id="sbt_publisher_request_list_table">
			<thead>
				<tr id="sbt_publisher_request_list_column_row">
				<th scope="col" width="3%">Nr</th>
				<th scope="col" width="17%"><a id="sortby_author" style="cursor:pointer;" class="float_left"><span class="float_left" style="width:85px;">Användare<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
				<th scope="col" width="10%"><a id="sortby_regdate" style="cursor:pointer;" class="float_left"><span class="float_left" style="width:70px;">Regdate<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
				<th scope="col" width="20%">Assign Group</th>
				</tr>
			</thead>
			<?php if($pager->getNbResults()):?>
			<?php $i=1; foreach ($pager->getResults() as $user): ?>
			<tr id="medal_user_record_row" class="classnot">
				<td><?php echo $i++; ?></td>
				<td><?php echo $user->firstname.' '.$user->lastname ?></td>
				<td><?php echo substr($user->regdate,0,10); ?></td>
				<td><input type="radio" name="user[<?php echo $user->user_id; ?>]" value="r" <?php if(!$user->isPublisher()) echo 'checked';?>>Regular
				    <input type="radio" name="user[<?php echo $user->user_id; ?>]" value="p" <?php if($user->isPublisher()) echo 'checked';?>>Publisher</td>
			</tr>
			<?php endforeach; ?>
			<?php else: ?>
			<?php echo 'No Result'; ?>
			<?php endif; ?>
		  </table>
		  </form>
		  
		  <div class="paginationwrapper" style="padding-top:10px;">
			<div class="pagination" id="sbt_publisher_request_list_listing" style="padding-right:5px;">
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