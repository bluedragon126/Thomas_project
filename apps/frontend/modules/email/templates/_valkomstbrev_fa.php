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
    <td><?php echo '' ?></td>
  </tr>
  <tr>
    <td><?php echo 'Tack fr din bestllning av ett mnadsabonnemang p Brstjnaren!' ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Dina inloggningsuppgifter r:' ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Anvndarnamn: '.$user->username ?></td>
  </tr>
  <tr>
    <td><?php echo 'Lsenord: '.$password ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Observera att dina inloggningsuppgifter r personliga.' ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Uppgifter fr betalning:' ?></td>
  </tr>
  <tr>
    <td><?php echo 'Vi behver ha din betalning p vrt konto senast '.$user->betdate.' fr att ditt abonnemang skall fortlpa utan avbrott.' ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Att betala: 200 kr (inkl. moms)' ?></td>
  </tr>
  <tr>
    <td><?php echo 'Kundnummer: '.$user->kundnr ?></td>
  </tr>
  <tr>
    <td><?php echo 'Abonnemangsperiod: '.$user->betdate.' - '.$user->stopdate ?></td>
  </tr>
  <tr>
    <td><?php echo 'Plusgiro nr: 104 66 96-9' ?></td>
  </tr>
  <tr>
    <td><?php echo 'Bankgiro nr: 5670-5288' ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Kom ihg att ange ditt kundnummer vid inbetalningen!' ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Vlkommen att brja tjna p brsen!' ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Med vnliga hlsning' ?></td>
  </tr>
  <tr>
    <td><?php echo 'Brstjnaren.se' ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <?php if($user->sbt_activation_code > 0) { ?>
    <tr><td><?php echo 'Klicka på länken nedan för att aktivera ditt konto!'?></td></tr>
  <tr><td><a href="<?php echo 'http://'.$url.'/sbt_user/getActivated/chk_code/'.$user->sbt_activation_code; ?>">Activate Now..!</a></td></tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <?php } ?>
  <tr>
    <td><?php echo '-------------------------------------------------------'?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Morningbriefing/Brstjnaren'?></td>
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
