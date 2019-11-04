<?php $i=0; foreach($price_range_data as $data):?>
<div class="float_left" style="border:0px solid green; margin-top:<?php echo $i > 0 ? '10px;' : '0px;' ?>">
	<span class="float_left" style="margin:0 5px 0 5px;">Antal:</span>
	<input type="text" name="shop_qty[]" class="float_left" style="width:30px;" value="<?php echo $data->btshop_product_quantity; ?>" />
	
	<span class="float_left" style="margin:0 5px 0 5px;">Enhet:</span>
  <select class="float_left" name="quantity_unit[]" id="quantity_unit[]">
		<?php foreach($qty_list as $list):?>
			<?php if($data->btshop_price_unit_id == $list->id): ?>
				<option selected="selected" value="<?php echo $list->id; ?>"><?php echo $list->btshop_price_unit; ?></option>
			<?php else: ?>
				<option value="<?php echo $list->id; ?>"><?php echo $list->btshop_price_unit; ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
	</select>

	<span class="float_left" style="margin:0 5px 0 5px;">Pris:</span>
	<input type="text" name="shop_product_price[]" class="float_left" style="width:50px;" value="<?php echo $data->btshop_product_price; ?>" />
	
	<span class="float_left" style="margin:0 5px 0 5px;">Pristext:</span>
	<input type="text" name="shop_product_text[]" class="float_left" size="25" value="<?php echo $data->btshop_product_text; ?>"/>

	<span class="tem" style="float:left; position:relative;">&nbsp;<img src="/images/minusicon.png" alt="arrow" /></span>
</div>
<?php $i++; endforeach;?>