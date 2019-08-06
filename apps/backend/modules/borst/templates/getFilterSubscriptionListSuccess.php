<?php if(count($data) > 0):?>
<td>
<select id="filter_subscription_id" name="filter_subscription_id">
	<?php foreach($data as $list): ?>
	<option value="<?php echo $list->id; ?>"><?php echo $list->btshop_article_title; ?></option>
	<?php endforeach; ?>
</select></td>
<?php endif; ?>