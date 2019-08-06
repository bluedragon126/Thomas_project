<?php $request  = sfContext::getInstance()->getRequest();?>
<?php if($request->getCookie('google_ads')=="true" && $ad && $right_ads_count<2): ?>

    <?php $right_ads_value =  explode(".",sfConfig::get('app_google_right_ads_id'));?>
    <?php $right_ads_count = sfConfig::get('app_google_top_count')?>
   
    <?php $ad = html_entity_decode(SbtAdsTable::getInstance()->getAdString($right_ads_value[$right_ads_count]));?>
    <?php $right_ads_count +=1;?>

    <?php  sfConfig::set('app_google_top_count',$right_ads_count)?>
<?php endif;?>
<?php
	if($column_position==center){
?>
	<div class="adDivCenter" style="<?php echo $top_space; ?>"><?php echo html_entity_decode($ad); ?></div>
<?php }else{ ?>
	<div class="advertdiv" style="<?php echo $top_space; ?>"><?php echo html_entity_decode($ad); ?></div>
<?php } ?>