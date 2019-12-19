<div class="maincontentpage">
  <div class="forumlistingleftdiv">
 <?php /*?> <div class="float_left widthall"><b><a class="blackcolor" href="<?php echo 'https://'.$host_str.'/backend.php/borst/createUser/mode/create_new_user'?>">Lägg till användare</a></b></td></div><?php */?>
  
  <div class="float_left width_915"><a href="<?php echo 'https://'.$host_str.'/backend.php/borst/sbtInactiveUserList' ?>" class="cursor blackcolor">Inactive UserList</a></div>
  
  <div class="float_left" id="search_user_error" style="width:915px; color:#FF0000">&nbsp;</div>
  
  <div class="forumlistingleftdivinner" style="width:916px;">
  <form id="search_user_form" name="search_user_form" method="POST" action="<?php //echo url_for('borst/userList') ?>">
  <table width="95%" border="0" cellspacing="0" cellpadding="0" id="back_article_list">
	<tr>
		<td><input type="hidden" name="search_user" value="search_user"></td>
		<td><input name="tempname" id="tempname" type="text" size="20" value="<?php echo $sf_params->get('tempname') ? $sf_params->get('tempname') : $val_tempname ; ?>"></td>
		<td>Inlogg frn-till:&nbsp;<input type="text" name="inlog1" id="inlog1" value="<?php echo $inlog1 ? $inlog1 : '' ?>" size="3">&nbsp;<input type="text" name="inlog2" id="inlog2" value="<?php echo $inlog2 ? $inlog2 : '' ?>" size="3"></td>
		<td><?php if($abon_arr):?>
        <select class="<?php echo $class ?>" name="s_abon" id="s_abon">
          <?php foreach($abon_arr as $key=>$value): ?>
          <option value="<?php echo $key; ?>" <?php if($key==$search_katID) echo 'selected="selected"'?>><?php echo $value ?></option>
          <?php endforeach; ?>
        </select>
        <?php endif; ?></td>
		<td><?php if($user_status_arr):?>
        <select class="<?php echo $class ?>" name="user_status_arr" id="user_status_arr">
          <?php foreach($user_status_arr as $key=>$value): ?>
          <option value="<?php echo $key; ?>" <?php if($key==$search_art_statID) echo 'selected="selected"'?>><?php echo $value ?></option>
          <?php endforeach; ?>
        </select>
        <?php endif; ?></td>
		<td>
        <select class="<?php echo $class ?>" name="sort_order" id="sort_order">
         <option value="ASC" <?php if (strcmp($sort_order, "ASC") == 0) echo "selected"; ?>>ASC</option>
		 <option value="DESC" <?php if (strcmp($sort_order, "DESC") == 0) echo "selected"; ?>>DESC</option>
        </select>
        </td>
		<td><input name="no_of_pages" type="text" size="3" value="<?php echo $sf_params->get('no_of_pages') ? $sf_params->get('no_of_pages') : $no_of_pages; ?>"></td>
		<td class="float_right"><input id="search_user" type="button" onclick="search_for_user()" name="search_btn" value="Sök"></td>		
		<td class=""><input type="reset" name="submit" value="rensa"></td>
		<td class="">antal rader: <?php echo $pager->getNbResults();?></td>
	</tr>
  </table>
  </form>
     
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:5px;border: 1px solid #CCC; margin:5px 0 10px 0;">
	<tr>
		<td>ANVNDARE TOT <b><?php echo $pager->getNbResults();?></b>&nbsp;&nbsp;&nbsp;
			PROV:<b><?php echo $count_arr['prov_cnt']; ?></b>&nbsp;&nbsp;&nbsp;
			FAKTURA:<b><?php echo $count_arr['invoice_cnt']; ?></b>&nbsp;&nbsp;&nbsp;
			AUTOGIRO:<b><?php echo $count_arr['autogiro_cnt']; ?></b>&nbsp;&nbsp;&nbsp;
			AKTIVA:<b><?php echo $count_arr['aktiva_cnt']; ?></b>&nbsp;&nbsp;&nbsp;
			0 inlogg:<b><?php echo $count_arr['zero_inlogg_cnt']; ?></b>&nbsp;&nbsp;&nbsp;
			1 inlogg:<b><?php echo $count_arr['inlogg_cnt']; ?></b>&nbsp;&nbsp;&nbsp;
			2-5 inlogg:<b><?php echo $count_arr['two_to_five_inlogg_cnt']; ?></b>&nbsp;&nbsp;&nbsp;
			6-10 inlogg:<b><?php echo $count_arr['six_to_ten_inlogg_cnt']; ?></b>&nbsp;&nbsp;&nbsp;
			11- inlogg:<b><?php echo $count_arr['eleven_above_inlogg_cnt']; ?></b>&nbsp;&nbsp;&nbsp;
		</td>
	</tr>
  </table>
   <div id="pass_reset_confirmation_msg" class="pass_reset_confirmation_msg">Password has been reset successfully..!</div>
	<div id="search_userlist_outer" class="forumlistingleftdivinner" style="width:1240px; font-size:11px;">
      <div class="width_1200 float_left">
                <div class="shoph3 float_left">User List</div>
                <?php include_partial('global/order_count_template',array('orderForm'=>$orderForm,'execute_fn_name'=>'updateUserListUsers')) ?>
            </div>
      <div class="listing">
	  	<input type="hidden" id="search_user_column_order" name="search_user_column_order" value="<?php echo $current_column_order; ?>"/>
		<input type="hidden" id="column_id" name="column_id" value="<?php echo $column_id; ?>"/>
		<input type="hidden" id="search_user_column" name="search_user_column" value="<?php echo $cur_column; ?>"/>
	  </div>
	  <div class="float_left listing">
        <div class="user_list_container">
        <?php include_partial('borst/user_list_partial', array('pager'=>$pager,'abon_arr'=>$abon_arr,'user_status_arr'=>$user_status_arr,'host_str'=>$host_str,'ext'=>$ext,'transaction_data'=>$transaction_data,'rec_per_page'=>$rec_per_page)) ?>
        </div>
      </div>
	  <div class="user_list_pager">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td colspan="10"><div class="paginationwrapper">
			  <div class="pagination" id="alluser_list_listing">
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
			</div></td>
		</tr>
		<tr>
		  <td colspan="10"><input type="button" name="update_article_button" id="update_article_button" class="registerbuttontext submit" onClick="javascript:open_confirmation('Ska listan med anvndare uppdateras?','','update_userlist_box','update_userlist_msg')" value="Uppdatera lista"/></td>
		</tr>
	  </table>
	  </div>
    </div>
  </div>
</div>
</div>
<!-- ui-dialog-update-user -->
<div id="update_userlist_box" title="Update User List Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="update_userlist_msg">Message:</td>
	</tr>
 </table>
</div>

<!-- ui-dialog-delete-article -->
<div id="delete_user_confirm_box" title="Delete User Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="delete_user_msg">Message:</td>
	</tr>
 </table>
</div>

<!-- ui-dialog-reset user password -->
<div id="reset_user_password_confirm_box" title="Reset User Password Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="reset_password_msg">Message:</td>
	</tr>
 </table>
</div>
<script language="javascript" type="text/javascript">
$(document).ready(function() {
       $('.outercontainer').live('keypress', function(e) { 	
			var code = (e.keyCode ? e.keyCode : e.which);
			if(code == '13')
			{ 
				$("#search_user").click(); 
			}
		});
}); // end of function
</script>