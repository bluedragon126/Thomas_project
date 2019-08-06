
<table style=" font-family: Arial, Helvetica, sans-serif; font-size:10pt;" border="0">
  <tr><td><?php echo "Bäste ".$record->getFirstname()." ".$record->getLastname(); ?></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><?php echo 'Ditt abonnemang '.$sub_record['btitle'].' löper ut den '.$sub_record['sdate'].'.' ?></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>

  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><?php echo "Om du vill fortsätta ditt abonnemang, gå snarast in på <a href='".$host_name."/borst_shop/shopProductDetail/product_id/".$sub_record["b_id"]."' >BT-shop</a> och förläng det." ?></td></tr>
  
  <tr><td>&nbsp;&nbsp;</td></tr>
  <tr><td><?php echo "Med vänlig hälsning"?></td></tr>
  <tr><td><?php echo "Börstjänaren"?></td></tr>

  <tr><td>&nbsp;&nbsp;</td></tr>
    <tr><td>......................................................</td></tr>
    <tr><td><?php echo "Morningbriefing Börstjänaren AB"?></td></tr>
    <tr><td><?php echo "E-post:info@borstjanaren.se"?></td></tr>
    <tr><td><?php echo "Web: www.borstjanaren.se"?></td></tr>

</table>