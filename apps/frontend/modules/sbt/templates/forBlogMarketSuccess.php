<div id="market" class="first_row_outer_blue" style="border:0px solid red; margin-bottom:20px; width:495px;">
	<div class="analysis_labels">Market:</div>
	<div class="analysis_ingressbild_textfield" style="width:100px;"><?php echo $form['ublog_market_id']->renderError() ?><?php echo $form['ublog_market_id']->render() ?></div>
</div>
<div id="stock" class="first_row_outer_blue" style="border:0px solid red; margin-bottom:20px; width:495px;">
	<div class="analysis_labels">Lista:</div>
	<div class="analysis_ingressbild_textfield" style="width:100px;"><?php echo $form['ublog_stocklist_id']->renderError() ?><?php echo $form['ublog_stocklist_id']->render() ?></div>
</div>
<?php if($sector_cnt > 0):?>
<div id="sector" class="first_row_outer_blue" style="border:0px solid red; margin-bottom:20px; width:495px;">
	<div class="analysis_labels">Sektor:</div>
	<div class="analysis_ingressbild_textfield" style="width:100px;"><?php echo $form['ublog_sector_id']->renderError() ?><?php echo $form['ublog_sector_id']->render() ?></div>
</div>
<?php endif; ?>
<?php if($object_cnt > 0):?>
<div id="obj" class="first_row_outer_blue" style="border:0px solid red; margin-bottom:20px; width:495px;">
	<div class="analysis_labels">Objekt:</div>
	<div class="analysis_ingressbild_textfield" style="width:100px;"><?php echo $form['ublog_object_id']->renderError() ?><?php echo $form['ublog_object_id']->render() ?></div>
</div>
<?php endif; ?>