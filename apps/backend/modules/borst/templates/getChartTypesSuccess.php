&nbsp; Chart Type : 
<select id="chart_type_id" name="chart_type_id">
<?php foreach($chart_types as $key=>$value): ?>
<option value="<?php echo $key ?>"><?php echo $value; ?></option>
<?php endforeach; ?>
</select>