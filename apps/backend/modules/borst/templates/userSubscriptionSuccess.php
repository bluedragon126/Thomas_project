<div class="violetcolor msgheading widthall thin_grey_line">Mina abonnemang</div>

<div class="my_subscription_list_outer" id="my_subscription_container">
	
	<div class="float_left widthall" id="my_subscription_list">
		<?php if($pager):?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr id="analysis_fav_list_column_row">
				<th scope="col" width="5%" align="left">No.</th>
				<th scope="col" width="35%" align="left">Subscription Name</th>
				<th scope="col" width="15%" align="left">Start Date</th>
				<th scope="col" width="15%" align="left">End Date</th>
                <th scope="col" width="9%" align="left">Status</th>
				<th scope="col" width="30%" align="left">Åtgärd</th>
			</tr>
		<?php $i = 1; foreach($pager->getResults() as $data):  //print_r($data);?>	
		<?php $product_arr = $product->getProductName($data->product_id, $data->btchart_type_id); ?>
			<tr class="classnot">
				<td align="left"><?php echo $i; ?></td>
				<td align="left"><a class="main_link_color cursor" href="<?php echo 'http://'.$host_str.'/borst_shop/shopProductDetail/product_id/'.$data->product_id;?>"><?php echo $product_arr[0]['title']; ?></a></td>
				<td align="left"><?php echo $data->start_date; ?></td>	
				<td align="left"><?php echo $data->end_date; ?></td>
                <td align="left"><?php echo $purchase->getPaymentStatus($data->purchase_id) == '0' ? 'Obetald' : ($purchase->getPaymentStatus($data->purchase_id) == '1' ? 'betald':''); ?>	
				<td align="left"><?php if(date("Y-m-d") >= $data->end_date):?><a href="<?php echo 'http://'.$host_str.'/borst_shop/shopProductDetail/product_id/'.$data->product_id;?>" class="main_link_color cursor">Förnya abonnemang</a><?php else: ?>&nbsp;<?php endif; ?></td>	
			</tr>
		<?php $i++;  endforeach;?>	
		    <tr><td colspan="6"><input type="hidden" name="acc_id" id="acc_id" value="<?php echo $acc_id ?>" /> </td></tr>
		</table>
		<?php else:?>
		<div class="float_left widthall">No Results</div>
		<?php endif;?>
		<div class="paginationwrapper">
		  <div class="all_my_subscription_pagination">
			<?php if($pager):?>
			<?php include_partial('global/backpager_for_all',array('pager'=>$pager))?>
			<?php endif;?>
		  </div>
		</div>
		
	</div>
	
</div>