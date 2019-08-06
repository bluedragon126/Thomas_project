<?php if(count($bulk_ads)>1){
    for($i=0;$i<count($bulk_ads);$i++):?>
	<?php if($i == 0):?>
		<div class="advertdiv"><?php echo html_entity_decode($bulk_ads[$i]); ?></div>
	<?php else:?>
		<div class="advertdiv"><?php echo html_entity_decode($bulk_ads[$i]); ?></div>
	<?php endif;?>
<?php endfor; 
}
?>