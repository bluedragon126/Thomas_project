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
    <td><?php echo 'Tack för din beställning av ett månadsabonnemang på Börstjänaren!' ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Dina inloggningsuppgifter är:' ?></td>
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
   <td><?php echo 'Observera att dina inloggningsuppgifter är personliga.' ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Du har valt att använda autogiro vid månadsbetalning av Börstjänaren.' ?></td>

  </tr>
  <tr>
    <td><?php echo 'Ladda hem PDF-dokumentet: Fullmakt för Autogiro, på https://'.$url.'/autogiro/fullmakt.pdf.' ?></td>
  </tr>
  <tr>
    <td><?php echo 'Skriv under och posta till nedanstående adress.' ?></td>
  </tr>
  <tr>
    <td><?php echo 'Vi behöver ha den underskrivna fullmakten oss tillhanda senast '.$user->betdate.' för att ditt abonnemang skall fortlöpa utan avbrott.' ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Abonnemangsuppgifter:' ?></td>
  </tr>
  <tr>
    <td><?php echo 'Kundnummer: '.$user->kundnr ?></td>
  </tr>
  <tr>
    <td><?php echo 'Abonnemangsperiod: '.substr($user->regdate,0,10).' - tills vidare' ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Plusgiro nr: 104 66 96-9' ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
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
    <td><?php echo 'Välkommen att börja tjäna på börsen!' ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo 'Med vänlig hälsning' ?></td>
  </tr>
  <tr>
    <td><?php echo 'Börstjänaren.se' ?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;</td>
  </tr>
   <?php if($user->sbt_activation_code > 0) { ?>
    <tr><td><?php echo 'Klicka på länken nedan för att aktivera ditt konto!'?></td></tr>
  <tr><td><a href="<?php echo 'https://'.$url.'/sbt_user/getActivated/chk_code/'.$user->sbt_activation_code; ?>">Activate Now..!</a></td></tr>
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
    <td><?php echo 'Morningbriefing Börstjänaren AB'?></td>
  </tr>
  <tr>
    <td><?php echo 'Att: Thomas Sandström'  ?></td>
  </tr>
  <tr>
    <td><?php echo 'Odensgatan 11 A, 753 14 Uppsala'?></td>
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