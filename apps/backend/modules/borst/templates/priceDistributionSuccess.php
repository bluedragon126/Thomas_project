<span class="float_left" style="margin:0 5px 0 5px;">Qty:</span>
<input type="text" name="shop_qty[]" class="float_left" style="width:30px;" />

<span class="float_left" style="margin:0 5px 0 5px;">Unit:</span>
<select class="float_left" name="quantity_unit[]" id="quantity_unit[]">
	<?php foreach($qty_list as $data):?>
	<option value="<?php echo $data->id; ?>"><?php echo $data->btshop_price_unit; ?></option>
	<?php endforeach; ?>
</select>

<span class="float_left" style="margin:0 5px 0 5px;">Price:</span>
<input type="text" name="shop_product_price[]" class="float_left" style="width:50px;" />

<span class="float_left" style="margin:0 5px 0 5px;">Price Text:</span>
<input type="text" name="shop_product_text[]" class="float_left" size="25" />

<span class="tem" style="float:left; position:relative;">&nbsp;<img src="/images/minusicon.jpg" alt="arrow" /></span>