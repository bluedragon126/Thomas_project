<table style=" font-family: Arial, Helvetica, sans-serif; font-size:10pt;" border="0">
	<tr><td><?php echo 'Hej '.$user->firstname.' '.$user->lastname.',' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Börstjänarens redaktör har studerat din artikel "'.$analysis_data->analysis_title.'"'; ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Gratulerar! Din artikel är redo för publicering, vilken kommer att ske '.$analysis_data->created_at; ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<?php if($last_suggestion->analysis_suggestion):?>
	<tr><td><?php echo 'Redaktörens lämnar följande förslag/kommentarer:' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo html_entity_decode($last_suggestion->analysis_suggestion); ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<?php endif; ?>
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