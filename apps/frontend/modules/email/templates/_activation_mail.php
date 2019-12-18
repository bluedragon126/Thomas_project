<table style=" font-family: Arial, Helvetica, sans-serif; font-size:10pt;" border="0">
  <tr><td><?php echo 'Hej '.$user->firstname.' '.$user->lastname.'!' ?></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><?php echo 'Välkommen till Börstjänaren!'?></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><?php echo 'Klicka på länken nedan för att aktivera ditt konto!'?></td></tr>
  <tr><td><a href="<?php echo 'https://'.$url.'/sbt_user/getActivated/chk_code/'.$user->sbt_activation_code; ?>">Aktivera nu!</a></td></tr>
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
