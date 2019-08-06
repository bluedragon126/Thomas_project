<div class="spacer"></div>
<?php if($rec):?>
<?php if($rec->checkout_status == 0): ?>
	<a id="save_invoice" class="save_mail_bill" name="<?php echo $rec->id ?>"><?php echo __('faktura på din beställning')?></a>
<?php endif;?>
<?php if($rec->checkout_status == 1): ?>
	<a id="save_receipt" class="save_mail_bill" name="<?php echo $rec->id ?>"><?php echo __('kvitto för din beställning')?></a>
<?php endif;?>
<!--<a id="print_receipt" class="save_mail_bill" name="<?php //echo $purchase_id ?>"><?php //echo __('Skriv ut kvitto')?></a> /--> 
<?php endif;?>