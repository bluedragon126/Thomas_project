<?php
	//format the date using the timestamp generated
	$dates     = explode("-", $user->stopdate);
	$year      = $dates['0'];
	$month      = $dates['1'];
	$day     = $dates['2'];
	$new_stopdate = date("Y-m-d",mktime(0,0,0,$month+1,$day,$year));
?>
<table style=" font-family: Arial, Helvetica, sans-serif; font-size:10pt;" border="0">
	<tr><td><?php echo 'Hej '.$user->firstname.' '.$user->lastname.'!' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Ditt autogiroabonnemang på Börstjänaren närmar sig brytdatum för betalning.'?></td></tr>
	<tr><td><?php echo 'Abonnemangsavgiften 250 kr inkl. moms. kommer att belastas ditt konto '.$user->stopdate ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Kundnummer: '.$user->kundnr ?></td></tr>
	<tr><td><?php echo 'Abonnemangsperiod: '.$user->stopdate .'-'. $new_stopdate ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Med vänlig hälsning' ?></td></tr>
	<tr><td><?php echo 'Börstjänaren' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo '-------------------------------------------------------' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php 'Morningbriefing Börstjänaren AB' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Tel: +46 018-55 00 70'  ?></td></tr>
	<tr><td><?php echo 'E-mail: info@borstjanaren.se' ?></td></tr>
	<tr><td><?php echo 'Web: www.borstjanaren.se' ?></td></tr>
</table>