<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<table style=" font-family: Arial, Helvetica, sans-serif; font-size:10pt;" border="0">
  <tr><td><?php echo 'Hej '.$user->firstname.' '.$user->lastname.'!' ?></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><?php echo 'Välkommen till Börstjänaren!'?></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><?php echo 'Klicka på länken nedan för att aktivera ditt konto!'?></td></tr>
  <tr><td><a href="<?php echo 'http://'.$url.'/sbt_user/getActivated/chk_code/'.$user->sbt_activation_code.'/flag/'.$send_activation_mail_newsletter_flag; ?>">Aktivera nu!</a></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><?php echo "Använd följande användarnamn och lösenord för att logga in!" ?></td></tr>
  <tr><td><?php echo 'Användarnamn: '.$user->username ?></td></tr>
  <tr><td><?php echo 'Lösenord: '.$password ?></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><?php echo 'Med vänlig hälsning'?></td></tr>
  <tr><td><?php echo 'Börstjänaren.se'?></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><?php echo '-------------------------------------------------------'?></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><?php echo 'Morningbriefing/Börstjänaren'?></td></tr>
    <tr><td><?php echo 'E-mail: info@borstjanaren.se'?></td></tr>
  <tr><td><?php echo 'Web: www.borstjanaren.se'?></td></tr>
</table>
</body>
</html>