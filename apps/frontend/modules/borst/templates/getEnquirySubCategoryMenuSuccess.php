<ul class="forumsubmenuNew floatLeftNew marginLeftcol4">
<?php $cnt = count($subCategory); ?>
<?php $i = 1; foreach($subCategory as $key=>$val):?>

<?php if($subcat_id == $key):?>
	<li><span></span><li><a id="subcat_<?php echo $key; ?>" class="cursor select"><?php echo $val; ?></a></li></li>
    <?php if($cnt == $i):?><li><span></span></li><?php endif; ?>
<?php else:?>
	<li><span></span><li><a id="subcat_<?php echo $key; ?>" class="cursor"><?php echo $val; ?></a></li></li>
    <?php if($cnt == $i):?><li><span></span></li><?php endif; ?>
<?php endif;?>

<?php $i++; 
if($i++ %3 == 0){
	echo "</ul><ul class='forumsubmenuNew floatLeftNew marginLeft21'>";
}
endforeach;?>
</ul>