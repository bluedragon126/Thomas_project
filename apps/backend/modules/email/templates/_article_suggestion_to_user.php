<table style=" font-family: Arial, Helvetica, sans-serif; font-size:10pt;" border="0">
	<tr><td><?php echo 'Hej '.$user->firstname.' '.$user->lastname.',' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Börstjänarens redaktör har granskat din artikel "'.$analysis_data->analysis_title.'"'; ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Din artikel är ännu inte redo för publicering enligt Börstjänarens bedömningsgrunder. Vänligen ta del av de föreslagna förändringarna/förbättringarna i kommentaren nedan.'; ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><strong><?php echo 'Redaktörens förslag/kommentar:' ?></strong></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo html_entity_decode($last_suggestion->analysis_suggestion); ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Du kan läsa och editera artikeln via följande länk:'?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><a href="https://<?php echo $host_str ?>/sbt/editAnalysis/article_id/<?php echo $analysis_data->id; ?>"><?php echo 'https://'.$host_str.'/sbt/editAnalysis/article_id/'.$analysis_data->id; ?></a></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Med vänlig hälsning,' ?></td></tr>
	<tr><td><?php echo 'Börstjänaren' ?></td></tr>
        <tr><td><?php echo '-------------------------------------------------------'?></td></tr>
<tr><td>&nbsp;&nbsp;</td></tr>
<tr><td><?php echo 'Morningbriefing Börstjänaren AB' ?></td></tr>
<tr><td>&nbsp;&nbsp;</td></tr>
<tr><td><?php echo 'E-post: info@borstjanaren.se' ?></td></tr>
<tr><td>&nbsp;&nbsp;</td></tr>
<tr><td><?php echo 'Webb: www.borstjanaren.se' ?></td></tr>
</table>