<table style=" font-family: Arial, Helvetica, sans-serif; font-size:10pt;" border="0">
	<tr><td><?php echo 'Bäste abonnent!'?></td></tr>
	<tr><td><?php echo 'Börstjänaren är uppdaterad med följande artiklar:'?></td></tr><br>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<?php $i=1;?>
	<?php foreach($update_article_data as $data): ?>
		<tr><td><h1><?php echo $i.'. '. $data->title ?></h1></td></tr>
		<?php
		$imagetext = $data->image_text;
		$imagetext = preg_replace("#\[img\](.+?)\[/img\]#is", "<img src=\"\\1\" alt=\"[image]\" style=\"margin: 0px 0px 0px 0px\" /><br>", $imagetext);
		$imagetext = preg_replace("#\[img\|left\](.+?)\[/img\]#is", "<img src=\"\\1\" alt=\"[image]\" style=\"float: left; margin: 3px 10px 8px 0px\" /><br>", $imagetext);
		$imagetext = preg_replace("#\[img\|right\](.+?)\[/img\]#is", "<img src=\"\\1\" alt=\"[image]\" style=\"float: right; margin: 6px 0px 4px 8px\" /><br>", $imagetext);
		?>

		<tr><td>
		<?php if ($data->image != ""): ?>
		<img src="<?php echo 'http://'.$host_str.'/uploads/articleIngressImages/'.str_replace('.','_mid.',$data->image); ?>" style="padding-right:10px;" />
		<?php endif; ?>
		<?php echo '<br>'.$imagetext; ?>
		<br><a href="<?php echo 'http://'.$host_str.'/borst/borstArticleDetails/article_id/'.$data->article_id; ?>">Läs artikeln!</a>
		</td></tr> 
		
	<?php $i++; endforeach;	?>
	
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td style="margin-top: 10px"><?php echo 'Med vänlig hälsning Börstjänaren' ?></td></tr>
	</tr></table>

</table>
