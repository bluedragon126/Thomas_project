<?php //echo date("Y-m-d H:i:s");?>
<?php $date_arr = explode('-',date("Y-m-d"));?>
<?php $hrs_min_arr = explode(':',date("H:i:s"));?>

<div class="float_left listing">
	<div class="float_left" style="margin-right:10px;">
		Month<br/>
		<select id="sbt_created_at_month" name="sbt_created_at_month">
		<option value=""/>
		<?php for($i=1;$i<=12;$i++): ?>
		<option <?php if($i == $date_arr[1]) echo 'selected="selected"'; ?>  value="<?php echo $i; ?>"><?php echo $i; ?></option>
		<?php endfor; ?>
		</select>
	</div>
	
	<div class="float_left" style="margin-right:10px;">
		Day<br/>
		<select id="sbt_created_at_day" name="sbt_created_at_day">
		<option value=""/>
		<?php for($j=1;$j<=31;$j++): ?>
		<option <?php if($j == $date_arr[2]) echo 'selected="selected"'; ?>  value="<?php echo $j; ?>"><?php echo $j; ?></option>
		<?php endfor; ?>
		</select>
	</div>
	
	
	<div class="float_left" style="margin-right:10px;">
		Year<br/>
		<select id="sbt_created_at_year" name="sbt_created_at_year">
		<option value=""/>
		<?php for($k=2005;$k<2015;$k++): ?>
		<option <?php if($k == $date_arr[0]) echo 'selected="selected"'; ?>  value="<?php echo $k; ?>"><?php echo $k; ?></option>
		<?php endfor; ?>
		</select> 
	</div>
	
	<div class="float_left" style="margin-right:10px;">
		Hours<br/>
		<select id="sbt_created_at_hour" name="sbt_created_at_hour">
		<option value=""/>
		<?php for($l=0;$l<=23;$l++): ?>
		<option <?php if($l == $hrs_min_arr[0]) echo 'selected="selected"'; ?>  value="<?php echo $l; ?>"><?php echo $l; ?></option>
		<?php endfor; ?>
		</select>
	</div>
	
	
	<div class="float_left" style="margin-right:10px;">
		Minute<br/>
		<select id="sbt_created_at_minute" name="sbt_created_at_minute">
		<option value=""/>
		<?php for($m=0;$m<=59;$m++): ?>
		<option <?php if($m == $hrs_min_arr[1]) echo 'selected="selected"'; ?>  value="<?php echo $m; ?>"><?php echo $m; ?></option>
		<?php endfor; ?>
		</select>
	</div>
	
	
	<div class="float_left" style="margin-right:10px;">
		Second<br/>
		<select id="sbt_created_at_sec" name="sbt_created_at_sec">
		<option value=""/>
		<?php for($n=0;$n<=59;$n++): ?>
		<option <?php if($n == $hrs_min_arr[2]) echo 'selected="selected"'; ?>  value="<?php echo $n; ?>"><?php echo $n; ?></option>
		<?php endfor; ?>
		</select>
	</div>
</div>