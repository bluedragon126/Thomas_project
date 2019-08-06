<?php if(count($data) > 0):?>
<td colspan="2">
<span class="float_left">&nbsp;</span><br>
<span class="float_left"><strong> Subscription Name:</strong></span><br>
<select id="subscription_id" name="subscription_id">
	<?php foreach($data as $list): ?>
	<option value="<?php echo $list->id; ?>"><?php echo $list->btshop_article_title; ?></option>
	<?php endforeach; ?>
</select></td>
<?php endif; ?>