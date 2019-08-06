 <div class="width_1200 float_left">
                <div class="shoph3 float_left">User List</div>
                <?php include_partial('global/order_count_template',array('orderForm'=>$orderForm,'execute_fn_name'=>'updateUserListUsers')) ?>
            </div>

<?php if($delete_user_flag == 1):?>
<div class="delete_user_confirmation_msg"><?php echo 'Användaren '.$del_username.' har tagits bort'; ?></div>
<?php endif; ?>
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
