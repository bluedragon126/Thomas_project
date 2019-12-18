<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<table style=" font-family: Arial, Helvetica, sans-serif; font-size:10pt;" border="0">
<tr><td>&nbsp;&nbsp;</td></tr>
<tr><td><?php echo 'Hej '.$purchase_data->firstname.' '.$purchase_data->lastname.'!' ?></td></tr>
<tr><td>&nbsp;&nbsp;</td></tr>
<tr><td>&nbsp;&nbsp;</td></tr>
<tr><td><?php echo 'Vi har nu expedierat din beställning från '.substr($purchase_data->created_at,0,10) ?></td></tr>
<tr><td>&nbsp;&nbsp;</td></tr><br />
<tr><td><?php echo 'Elektroniska abonnemang träder i kraft med omedelbar verkan.' ?></td></tr><br />
<tr><td><?php echo 'Beställda varor skickas inom kort.' ?></td></tr>
<tr><td>&nbsp;&nbsp;</td></tr>
<tr><td><?php echo 'Med vänlig hälsning' ?></td></tr>
<tr><td><?php echo 'Börstjänaren' ?></td></tr>
<tr><td><?php echo '-------------------------------------------------------'?></td></tr>
<tr><td>&nbsp;&nbsp;</td></tr>
<tr><td><?php echo 'Morningbriefing Börstjänaren AB' ?></td></tr>
<tr><td>&nbsp;&nbsp;</td></tr>
<tr><td>Bankgiro: 5670-5288</td> </tr>
<tr><td>&nbsp;&nbsp;</td></tr>
<tr><td>Plusgiro: 104 66 96-9</td> </tr>
<tr><td>&nbsp;&nbsp;</td></tr>
<tr><td><?php echo 'E-post: info@borstjanaren.se' ?></td></tr>
<tr><td>&nbsp;&nbsp;</td></tr>
<tr><td><?php echo 'Web: www.borstjanaren.se' ?></td></tr>
</table>
</body>
</html>