<div class="shoph3 widthall">Shop Transaction List</div>
<div class="float_left listing">
<div class="float_left width_1020">
  <?php include_partial('borst/transactionlist_partial', array('pager'=>$pager,'host_str'=>$host_str,'purchasedItem'=>$purchasedItem,'product_article'=>$product_article,'rec_per_page'=>$rec_per_page)) ?>
</div>
</div>
<div class="user_list_pager">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td colspan="11"><div class="paginationwrapper width_1020">
		<div class="pagination" id="purchaseorder_list_listing">
		  <?php include_partial('global/backpager_for_all', array('pager'=>$pager)) ?>
		</div>
	  </div></td>
  </tr>
  <tr>
	<td colspan="11"><input type="button" name="update_article_button" id="update_article_button" class="registerbuttontext submit" onClick="javascript:open_confirmation('Ska listan med uppdateras?', '', 'updatePurchaseList_confirm_box', 'update_purchase_record_msg')" value="Uppdatera lista"/>
	<span class="float_left redcolor ptop_4 pleft_5" id="purchase_update_msg"></span></td>
  </tr>
</table>
</div>

