<div class="float_left listing">
        <div class="float_left widthall" style="width:913px;">
<form id="update_subscription_form" name="update_subscription_form" method="POST" action="">
    <input type="hidden" name="is_archives" id="is_archives"/>
<!--<b>Subscription Type :</b>
<select id="subscription_type" name="subscription_type"  >
    <option value="All">All</option>
    <?php /*foreach($subscription_types as $key=>$value): ?> 
            <option value="<?php echo $key; ?>" <?php if($selected_subscription_type==$key) echo "selected=selected"; ?>><?php echo $value; ?></option>          
    <?php endforeach; */?>    
</select>-->
<div class="spacer"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="subscriber_list_table">
<?php if(count($pager)>0)
{ ?>
<thead>
  <tr id="coupon_list_column_row">
	<th scope="col" width="5%"><input name="coupon_ids_check_uncheck" type="checkbox" value="" id="coupon_ids_check_uncheck">Nr</th>
	<th scope="col" width="15%"><a id="sortby_code" class="float_left cursor"><span class="float_left width_125">Coupon Code<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="15%"><a id="sortby_status" class="float_left cursor"><span class="float_left width_125">Status<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="15%"><a id="sortby_date" class="float_left cursor"><span class="float_left width_125">Date<img src="/images/bg.gif" alt="down" /></span></a></th>
        <th scope="col" width="15%">Action</th>
  </tr>
</thead>
<?php } ?>

<?php $i=($page=='')? 1:(($page*50+1)-50);?>

<?php 

if(count($pager)>0)
{
    //print_r($pager->getResults());die;
    foreach ($pager->getResults() as $data):?>
<tr class="classnot">
    
	<td><input name="coupon_ids[]" class="checkbox_coupon" type="checkbox" value="<?php echo $data->id; ?>"><?php echo $i; ?></td>
	<td><?php echo $data->coupon_code; ?></td>
        <td><?php echo ($data->status) ? "Inactive" : "Active"; ?></td>
        <td><?php echo $data->created_at; ?></td>
        <td><a class="edit_icon" href="/backend.php/borst/addUpdateCoupon/id/<?php echo $data->id; ?>">Edit</a> &nbsp;&nbsp; 
            <a class="delete_icon" href="javascript:open_confirmation('Do you want to delete this code <?php echo $data->code ?>','<?php echo $data->id; ?>','delete_code_confirm_box','unarchive_sbt_ad_msg')">Delete</a></td>
</tr>

<?php $i++; endforeach;
}
else {?>
<tr rowspan="9"><td class="errormsg">No record found</td></tr>
    <?php 
    
} 
?>
<tr>
    <td colspan="10"><input style="margin-right: 10px;" type="button" name="update_coupon_button" id="update_coupon_button" class="registerbuttontext submit" onclick="javascript:open_confirmation('Vill du uppdatera listan?', '', 'updateCouponCodeData_list_confirm_box', 'subscription_list_msgs')" value="Uppdatera lista"/>
                        
</tr>
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
			  <div class="pagination" id="coupon_list_listing">
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
		</table>
	  </div>
      <?php } ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="10"><a class="new_icon" href="/backend.php/borst/addUpdateCoupon">New</a></td>
            </tr>
        </table>