<?php if($pager):?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr id="analysis_fav_list_column_row">
		<th scope="col" width="5%" align="left">No.</th>
		<th scope="col" width="35%" align="left">Subscription Name</th>
		<th scope="col" width="15%" align="left">Start Date</th>
		<th scope="col" width="15%" align="left">End Date</th>
		<th scope="col" width="30%" align="left">Åtgärd</th>
	</tr>
<?php $i = 1; foreach($pager->getResults() as $data): ?>	
<?php $product_arr = $product->getProductName($data->product_id, $data->btchart_type_id); ?>
	<tr class="classnot">
		<td align="left"><?php echo $i; ?></td>
		<td align="left"><a class="main_link_color cursor" href="<?php echo 'https://'.$host_str.'/borst_shop/shopProductDetail/product_id/'.$data->product_id;?>"><?php echo $product_arr[0]['title']; ?></a></td>
		<td align="left"><?php echo $data->start_date; ?></td>	
		<td align="left"><?php echo $data->end_date; ?></td>	
		<td align="left"><?php if(date("Y-m-d") >= $data->end_date):?><a href="<?php echo 'https://'.$host_str.'/borst_shop/shopProductDetail/product_id/'.$data->product_id;?>" class="main_link_color cursor">Förnya abonnemang</a><?php else: ?>&nbsp;<?php endif; ?></td>	
	</tr>
<?php $i++;  endforeach;?>
	<tr><td colspan="5"><input type="hidden" name="acc_id" id="acc_id" value="<?php echo $acc_id ?>" /> </td></tr>	
</table>
<?php endif;?>
<div class="paginationwrapper">
  <div class="all_my_subscription_pagination">
	<?php if($pager):?>
            <?php include_partial('global/backpager_for_all',array('pager'=>$pager))?>
	<?php endif;?>
  </div>
</div>
