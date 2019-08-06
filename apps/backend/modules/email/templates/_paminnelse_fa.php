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
	<tr><td><?php echo 'Din abonnemangsperiod på Börstjänaren löper ut inom kort.' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Du är registrerad som Portföljabonnent med ursprungligt registreringsdatum '.$user->regdate ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Om du vill fortsätta att ta del av Börstjänarens fulla service, inklusive portföljinformation och tips via E-post, vänligen betala in abonnemangsavgiften 250 kr senast '.$user->stopdate ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Att betala: 250 kr inkl. moms.' ?></td></tr>
	<tr><td><?php echo 'Kundnummer: '.$user->kundnr ?></td></tr>
	<tr><td><?php echo 'Abonnemangsperiod: '.$user->stopdate .'-'. $new_stopdate ?></td></tr>
	<tr><td><?php echo 'Plusgiro: 104 66 96-9' ?></td></tr>
	<tr><td><?php echo 'Bankgiro: 5670-5288' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'OBS! Kom ihåg att ange ditt kundnummer vid inbetalningen!' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Om du inte vill fortsätta som Portföljabonnent, så behöver du inte göra någonting alls utan du kommer då automatiskt att avföras fr.o.m. '.$user->stopdate ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'I vilket fall vi tackar för den gångna tiden och önskar dig välkommen åter när som helst. ' ?></td></tr>
<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Med vänlig hälsning' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Börstjänaren' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo '-------------------------------------------------------' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Morningbriefing Börstjänaren AB' ?></td></tr>
	<tr><td><?php echo 'Momsreg.nr./VAT-nr: SE556724-473501' ?></td></tr>
	<tr><td><?php echo 'E-mail: info@borstjanaren.se' ?></td></tr>
	<tr><td><?php echo 'Webb: www.borstjanaren.se' ?></td></tr>
</table>