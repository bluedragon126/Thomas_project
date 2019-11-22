<div class="float_left listing">
        <div class="float_left widthall" style="width:913px;">
<form id="update_subscription_form" name="update_subscription_form" method="POST" action="">
<b>Subscription Type :</b>
<select id="subscription_type" name="subscription_type"  >
    <option value="All">All</option>
    <?php foreach($subscription_types as $key=>$value): ?> 
            <option value="<?php echo $key; ?>" <?php if($selected_subscription_type==$key) echo "selected=selected"; ?>><?php echo $value; ?></option>          
    <?php endforeach; ?>    
</select>
<!--<b>Coupon Code :</b>
<select id="coupon_code" name="coupon_code"  >
    <?php /*foreach($couponCode as $key1=>$value1): ?> 
            <option value="<?php echo $key1; ?>" <?php if($selected_coupon_code==$key1) echo "selected=selected"; ?>><?php echo $value1; ?></option>          
    <?php endforeach;*/ ?>    
</select>-->
<div class="spacer"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="subscriber_list_table">
<?php if(count($pager)>0)
{ ?>
<thead>
  <tr id="subscriber_list_column_row">
	<th scope="col" width="5%">Nr</th>
	<th scope="col" width="15%"><a id="sortby_name" class="float_left cursor"><span class="float_left width_125">Subscription name<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
	<th scope="col" width="10%">Order nr</th>
	<th scope="col" width="10%"><a id="sortby_startdate" class="float_left cursor"><span class="float_left width_80">Start Date<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
	<th scope="col" width="10%"><a id="sortby_stopdate" class="float_left cursor"><span class="float_left width_80">Stop Date<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
	<th scope="col" width="10%"><a id="sortby_firstname" class="float_left cursor"><span class="float_left width_75">Förnamn<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
	<th scope="col" width="10%"><a id="sortby_lastname" class="float_left cursor"><span class="float_left width_80">Efternamn<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
	<th scope="col" width="10%"><a id="sortby_email" class="float_left cursor"><span class="float_left width_55">E-mail<img src="/images/bg.gif" alt="down" width = '20' /></span></a></th>
	<th scope="col" width="10%">Status</th>
        <!--<th scope="col" width="10%">Send Coupon Code</th>-->
  </tr>
</thead>
<?php } ?>

<?php $i=($page=='')? 1:(($page*50+1)-50); $j = 0;?>

<?php 

if(count($pager)>0)
{
    //print_r($pager->getResults());die;
    foreach ($pager->getResults() as $data):  ?>
<tr class="classnot">
    <?php 
    if($data->articleornot){
            $info_arr = $purchasedItem->getOnePurchasedItem($data->purchase_id);
            $title = $info_arr['title'];
    }else{
        $product_arr = $product->getProductName($data->product_id, $data->btchart_type_id);
        $title = $product_arr[0]['title'];
    }
    $pur = $purchase->getPurchaseOrder($data->purchase_id); ?>
	<?php  ?>
	<td><input name="purchase_ids[]" type="hidden" value="<?php echo $data->id; ?>" id="purchase_ids"><?php echo $i; ?></td>
	<td><input name="product_name[]" type="hidden" value="<?php echo $title; ?>" id="product_name"><?php echo $title; ?></td>
	<td><?php echo $data->purchase_id; ?></td>
	<td><input id="start_id<?php echo $data->id ?>" name="startdate[]" type="text" style="width:70px;" value="<?php echo $data->start_date; ?>"></td>
	<td><input id="end_id<?php echo $data->id ?>" name="enddate[]" type="text" style="width:70px;" value="<?php echo $data->end_date; ?>"></td>
	<td><input name="subscriber_name[]" type="hidden" value="<?php echo $pur->firstname.' '.$pur->lastname; ?>" id="subscriber_name"><?php echo $pur->firstname ?></td>
	<td><?php echo $pur->lastname ?></td>
	<td><input name="subscriber_email[]" type="hidden" value="<?php echo $pur->email; ?>" id="subscriber_email"></td>
	<td><input name="subscriber_userid[]" type="hidden" value="<?php echo $pur->user_id; ?>" id="subscriber_userid">
            <input name="article_id[]" type="hidden" value="<?php echo $data->product_id; ?>" id="article_id">
            &nbsp;&nbsp;<?php echo $purchase->getPaymentStatus($data->purchase_id) == 0 ? 'Obetald' : ($purchase->getPaymentStatus($data->purchase_id) == 1 ? 'Betald' : '') ?></td>
        <!--<td><input name="subscriber_check[]" type="checkbox" value="<?php //echo $j; ?>" id="subscriber_check"></td>-->
</tr>
<?php $i++; $j++; endforeach;
}
else {?>
<tr rowspan="9"><td class="errormsg">No record found</td></tr>
    <?php 
    
} 
?>
</table>
</form>
</div>
</div>
      <?php 
      if(count($pager)>0)
      { ?>
      <div class="float_left listing">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td colspan="10"><div class="paginationwrapper">
			  <div class="pagination" id="subscriber_list_listing">
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
			<td colspan="10"><input style="margin-right: 10px;" type="button" name="update_article_button" id="update_article_button" class="registerbuttontext submit" onclick="javascript:open_confirmation('Vill du uppdatera listan?', '', 'updatesubscriptionlist_confirm_box', 'subscription_list_msg')" value="Uppdatera lista"/>
                        
		  </tr>
		</table>
	  </div>
      <?php } ?>