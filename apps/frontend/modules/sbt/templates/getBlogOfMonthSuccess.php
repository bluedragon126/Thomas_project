<?php for($i=0;$i<count($data);$i++):?>
	<?php if($i==0):?>
		<span id="display_month_year" class="yellowline widthall">&nbsp;</span>
	<?php endif; ?>
	<span class="float_left widthall"><a class="main_link_color cursor" name="<?php echo $data[$i]['id'] ?>"><?php echo $mymarket_title->correctTitle($data[$i]['ublog_title']) ?></a></span>
<?php endfor;?>