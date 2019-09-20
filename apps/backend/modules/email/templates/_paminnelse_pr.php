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
	<tr><td><?php echo 'Under några veckor har du kunnat ta del av BT-portföljen och samtliga handelstips utan kostnad.' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Vill du fortsätta ta del av vår träffsäkra portföljservice (70% sedan 2007) med entré- och exitnivåer samt uppdatering via e-post - så är du välkommen att abonnera i vår webbshop.' ?> </td></tr>
    <tr><td><?php echo '(Normalpriset för ett portföljabonnemang är 349 kr/månad.)' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Klicka ' ?> <a href="http://https://www.thetradingaspirants.com/borst_shopshopProductDetail/product_id/21;"><?php echo 'här' ?></a><?php echo ' för att slippa onödigt avbrott i ditt abonnemang.' ?></td></tr>
<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Om länken inte fungerar kan du även klistra in följande i adressfönstret i din webbläsare: ' ?><a href="http://https://www.thetradingaspirants.com/borst_shopshopProductDetail/product_id/21"><?php echo 'http://https://www.thetradingaspirants.com/borst_shopshopProductDetail/product_id/21' ?></a></td></tr>
    
    
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Välkommen att börja tjäna på börsen!' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Med vänlig hälsning' ?></td></tr>
	<tr><td><?php echo 'Börstjänaren' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo '-------------------------------------------------------' ?></td></tr>
	<tr><td>&nbsp;&nbsp;</td></tr>
	<tr><td><?php echo 'Morningbriefing Börstjänaren AB' ?></td></tr>
	<tr><td><?php echo 'E-mail: info@borstjanaren.se' ?></td></tr>
	<tr><td><?php echo 'Webb: www.borstjanaren.se' ?></td></tr>
</table>