<table style=" font-family: Arial, Helvetica, sans-serif; font-size:10pt;" border="0">
	<tr><td><?php echo 'Hej '.$user->firstname.' '.$user->lastname.',' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Ditt lösenord har ändrats! Ditt nya login är: '?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Användarnamn: '.$user->username; ?></td></tr>
	<tr><td><?php echo 'Lösenord: '.$new_pass ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Det är rekommenderat att du går in på ' ?></td></tr>
	<tr><td><a href="http://<?php echo $host_str ?>/user/changePasswordForm"><?php echo 'http://'.$host_str.'/user/changePasswordForm' ?></a></td></tr>
	<tr><td><?php echo 'och ändrar ditt lösenord så snart som möjligt.' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Har du några frågor, kontakta oss på '. $reply_to ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Med vänlig hälsning,' ?></td></tr>
	<tr><td><?php echo 'Börstjänaren' ?></td></tr>
</table>