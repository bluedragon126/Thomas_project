<?php
	//format the date using the timestamp generated
	$dates     = explode("-", $user->stopdate);
	$year      = $dates['0'];
	$month      = $dates['1'];
	$day     = $dates['2'];
	$new_stopdate = date("Y-m-d",mktime(0,0,0,$month+1,$day,$year));
?>
    <table style=" font-family: Arial, Helvetica, sans-serif; font-size:10pt;" border="0">
	<tr><td><?php echo 'Hej '.$user->getFirstname().' '.$user->getLastname().'!' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Ditt provabonnemang på Börstjänaren med ursprungligt registreringsdatum '.$reg.' har löpt ut.' ?></td></tr>
    <tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Vill du fortsätta ta del av vår fulla portföljservice med entré- och exitnivåer samt uppdatering via epost - så är du välkommen att mjukstarta som portföljabonnent och förlänga ditt abonnemang med 30 dagar, för specialpriset 99 kr!' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Vill du ej abonnera kan du bara strunta i detta erbjudande, så avförs du automtiskt.' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Att betala: 99 kr' ?></td></tr>
	<tr><td><?php echo 'Plusgiro: 104 66 96-9' ?></td></tr>
	<tr><td><?php echo 'Bankgiro: 5670-5288' ?></td></tr>
	<tr><td><?php echo 'Abonnemangsperiod: '.$user->stopdate .'-'. $new_stopdate ?></td></tr>
	<tr><td><?php echo 'Kundnummer: '.$user->kundnr ?></td></tr>
	<tr><td><?php echo 'Kom ihåg att ange ditt kundnummer vid inbetalningen!' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Välkommen att börja tjäna på börsen!' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Med vänlig hälsning' ?></td></tr>
	<tr><td><?php echo 'Börstjänaren' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'PS. Om du inte vill abonnera, så har du likväl, som registrerad användare, kostnadsfri tillång till mesta på vår webbplats. DS' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo '-------------------------------------------------------' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Morningbriefing Börstjänaren AB' ?></td></tr>
	<tr><td><?php echo 'E-mail: info@borstjanaren.se' ?></td></tr>
	<tr><td><?php echo 'Webb: www.borstjanaren.se' ?></td></tr>
</table>