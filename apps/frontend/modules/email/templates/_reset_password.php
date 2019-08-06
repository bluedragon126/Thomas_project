<table style=" font-family: Arial, Helvetica, sans-serif; font-size:10pt;" border="0">
	<tr><td><?php echo 'Hej '.$user->firstname.' '.$user->lastname.',' ?></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td><?php echo 'Ditt lösenord har ändrats! Din nya inloggning är:' ?></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td><?php echo 'Användarnamn: '. $username ?></td></tr>
	<tr><td><?php echo 'Lösenord: '. $changed_password ?></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td><?php echo 'Det rekommenderas att du klickar på följande länk' ?></td></tr>
	<tr><td><?php echo $lank ?></td></tr>
	<tr><td><?php echo 'och ändra ditt lösenord på tidigast.'?></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td><?php echo 'Om du har en fråga, kontakta oss på '.$support ?></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td><?php echo 'Med vänlig hälsning,'?></td></tr>
	<tr><td><?php echo 'Börstjänaren.se' ?></td></tr>
</table>