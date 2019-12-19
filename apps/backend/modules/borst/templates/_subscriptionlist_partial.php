<form name="update_purchase_form" id="update_purchase_form" method="post" action="">
<input type="hidden" name="action_mode" id="action_mode" value="purchase_update">
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="update_purchaseorder_list_table">
    <thead>
      <tr id="update_user_form_column_row">
        <th scope="col" width="5%"><b>Nr</b></th>
        <th scope="col" width="5%"><b>Ordernummer</b>&nbsp;</th>
		<th scope="col" width="10%"><b>Order Date</b></th>
		<th scope="col" width="10%"><b>Namn</b></th>
		<th scope="col" width="9%"><b>Produkt(er) </b></th>
		<th scope="col" width="7%"><b>Betaldatum</b></th>
		<th scope="col" width="10%"><b>Payment Method</b></th>
		<th scope="col" width="9%"><b>Status</b></th>
		<th scope="col" width="5%"><b>Belopp</b></th>
		<th scope="col" width="5%"><b>Skickas</b></th>
		<th scope="col" width="10%"><b>Is Processed</b></th>
                <th scope="col" width="6%" ><b>Skriv ut</b></th>
                <th scope="col" width="4%"><b>Aktion</b></th>
      </tr>
    </thead>
	<?php
	$page_num = $pager->getPage() - 1;
	$page_num = $page_num * $rec_per_page;
	$page_num = $page_num + 1;
        $delete_page = count($pager->getResults())==1? $pager->getPage()-1:$pager->getPage();

	?>
	<?php $i = $pager->getPage() == 1 ? 1 : $page_num;  ?>
    <?php foreach ($pager->getResults() as $trans): ?>
    <?php $info_arr = $purchasedItem->getOnePurchasedItem($trans->id);?>
	<tr class="classnot">
		<td><input name="purchase_ids[]" type="hidden" value="<?php echo $trans->id ?>"><?php echo $i; ?></td>
		<td><a class="blackcolor" href="<?php echo 'http://'.$host_str.'/backend.php/borst/viewPurchaseDetail/id/'.$trans->id ?>"><?php echo $trans->id; ?></a></td>
		<td><?php echo substr($trans->created_at, 0, 10); ?></td>
    	<td><?php echo $trans->firstname.' '.$trans->lastname; ?></td>
		<td><?php echo $info_arr['title'] ?></td>
		<td><input class="small" name="payment_date[]" type="text" size="8" value="<?php echo substr($trans->payment_date, 0, 10) ?>"></td>
		<td><?php echo $trans->payment_method; ?></td>
		<td><select name="payment_status[]">
          <option value="0" <?php if($trans->checkout_status == 0) echo 'selected="selected"' ?>><?php echo 'Incomplete' ?></option>
		  <option value="1" <?php if($trans->checkout_status == 1) echo 'selected="selected"' ?>><?php echo 'Done' ?></option>
        </select></td>
		<td><?php echo $trans->total_price; ?></td>
		<td><?php echo $info_arr['shipping'] > 0 ? 'ja' : 'Nej'; ?></td>
		<td><select name="order_process_status[]">
          <option value="0" <?php if($trans->order_processed == 0) echo 'selected="selected"' ?>><?php echo 'Not Processed' ?></option>
		  <option value="1" <?php if($trans->order_processed == 1) echo 'selected="selected"' ?>><?php echo 'Processed' ?></option>
        </select></td>
        <td >
            <?php if($trans->checkout_status == 0): ?>
				<a id="save_invoice" class="save_mail_bill" name="<?php echo $trans->id ?>"><?php echo __('faktura')?></a>
			<?php endif;?>
			<?php if($trans->checkout_status == 1): ?>
				<a id="save_receipt" class="save_mail_bill" name="<?php echo $trans->id ?>"><?php echo __('kvitto')?></a>
			<?php endif;?>
        </td>
        <td>
            <a class ="delete_record redcolor cursor " name ="<?php echo $trans->id ?>" onclick="open_confirmation('Vill du verkligen radera inköpsorder <?php echo $trans->id?>?', '<?php echo $delete_page.','.$trans->id ?>', 'deletePurchaseOrder_confirm_box', 'deletePurchaseOrder_message');">[X]</a>
        </td>
    </tr>
    <?php $i++; endforeach; ?>
</table>
</form>