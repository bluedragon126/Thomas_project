<table style=" font-family: Arial, Helvetica, sans-serif; font-size:10pt;" border="0">
  <tr>
    <td><?php echo 'Hej '.$user->firstname.' '.$user->lastname.'!' ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Tack för din registrering på Börstjänaren!'?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Dina inloggningsuppgifter är:'?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Användarnamn: '.$user->username ?></td>
  </tr>
  <tr>
    <td><?php echo 'Lösenord: '.$password ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Observera att dina inloggningsuppgifter är personliga.'?></td>
  </tr>
  <tr>
    <td><?php echo 'Välkommen att logga in och lycka till med dina affärer!'?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Med vänlig hälsning'?></td>
  </tr>
  <tr>
    <td><?php echo 'Börstjänaren.se'?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
 <?php /*if($user->sbt_activation_code > 0) { ?>
    <tr><td><?php echo 'Klicka på länken nedan för att aktivera ditt konto!'?></td></tr>
  <tr><td><a href="<?php echo 'http://'.$url.'/sbt_user/getActivated/chk_code/'.$user->sbt_activation_code; ?>">Activate Now..!</a></td></tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <?php }*/ ?>
  
  <tr>
    <td><?php echo '-------------------------------------------------------'?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Morningbriefing/Börstjänaren'?></td>
  </tr>
  <tr>
    <td><?php echo 'Tel: +46 018-55 00 70'  ?></td>
  </tr>
  <tr>
    <td><?php echo 'E-mail: info@borstjanaren.se'?></td>
  </tr>
  <tr>
    <td><?php echo 'Web: www.borstjanaren.se'?></td>
  </tr>
</table>
