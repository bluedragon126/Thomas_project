<table style=" font-family: Arial, Helvetica, sans-serif; font-size:10pt;" border="0">
	<tr><td><?php echo 'Hej '.$user->firstname.' '.$user->lastname.',' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Gratulerar! Du har tilldelats medaljen "'.$medal_name.'" '; ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<?php if($record_data->award_note_by_admin):?>
	<tr><td><?php echo 'Juryns ordförande lämnar följande motivering/kommentar:' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo html_entity_decode($record_data->award_note_by_admin); ?></td></tr>
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