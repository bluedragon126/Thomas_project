<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<table style=" font-family: Arial, Helvetica, sans-serif; font-size:10pt;" border="0">
<tr><td><?php echo 'Hej '.$name.'!' ?></td></tr>
  <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
  <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
  <tr><td colspan="3"><?php echo 'Tack för din beställning på Börstjänaren!'?></td></tr>
  <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
  <tr><td colspan="3"><?php echo 'Ditt fakturanummer är:'.$purchase_rec->getId();?></td></tr>

  <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
  <tr><td colspan="3"><?php echo 'Du har beställt:'?></td></tr>
  <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
  <?php if($item_list):?>
  <?php $total=0; $str=''; $i=0; foreach($item_list as $data): ?>
  <?php if($i==0):?><?php $shipping = $data->shipping; $vat = $data->vat; ?><?php endif; ?>
  <?php 
  if($is_Article){
    $art_data = $product_article->getPerticularArticle($data->product_id);
  }else{
    $art_data = $product_article->getShopArticleSpecificDetails($data->product_id);    
  }
  ?>
  <?php $mul = $data->quantity * $data->price_per_unit;//original code
  //$mul = $data->quantity * $data->total_price;//code by sandeep ?>
  <?php if(!$is_Article){ if($art_data[0]['p_type'] == 6):?>
    	 <?php if($i==0):?>
             <?php $str = $str.$art_data[0]['p_title'];?>
         <?php else:?>
             <?php $str = $str.','.$art_data[0]['p_title'];?>
         <?php endif;?>   
  <?php endif;  ?>
  <tr><td colspan="3"><strong><?php echo $product_article->getShopArticleTypeName($art_data[0]['p_type'])?>:</strong><?php echo $art_data[0]['p_title'] ?></td></tr>  
  <?php } else {?>
  <tr><td colspan="3"><?php echo $art_data->title; ?></td></tr>  
  <?php } ?>
  <tr>
  	<td><strong>Antal: </strong><?php echo $data->quantity; ?> st á <?php echo $data->price_per_unit; ?>:</strong></td>
	<td>&nbsp;&nbsp;</td>
	<td align="right"><?php echo str_replace(',',' ',number_format($mul)).':-'; ?></td>
  </tr>
  <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
  <?php if(!$is_Article){ $purchase_product = Doctrine::getTable("BtShopArticle")->find($data->product_id);?>
   <?php if($purchase_product["is_downloadable"]):?>
      <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
     <tr><td colspan="3">hämta url: <?php echo "https://".sfConfig::get("app_host_name")."/borst_shop/btShopeProductUrl/link/".$purchase_rec->getId()."_".$data->product_id?> </td></tr>
  <?php endif; } ?>
    <?php $total = $total + $mul; ?>
    <?php $i++; endforeach; ?>

	<?php $final_total = 0;  ?>
    <?php $total_wth_shipping = $total + $shipping; ?>
    <?php //$final_total = $total_wth_shipping + $vat; ?>
  <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
  <tr>
  	<td><strong>Frakt:</strong></td>
	<td>&nbsp;&nbsp;</td>
	<td align="right"><?php echo str_replace(',',' ',number_format($shipping)).':-'; ?></td>
  </tr>
  <tr>
  	<td><strong>Totalt:</strong></td>
	<td>&nbsp;&nbsp;</td>
	<td align="right"><?php echo str_replace(',',' ',number_format($total_wth_shipping)).':-'; ?></td>
  </tr>
  <tr>
  	<td><strong>Varav moms:</strong></td>
	<td>&nbsp;&nbsp;</td>
	<td align="right"><?php echo str_replace(',',' ',number_format($vat)).':-'; ?></td>
  </tr>
  <tr>
  	<td><strong>Att betala SEK:</strong></td>
	<td>&nbsp;&nbsp;</td>
	<td align="right"><?php echo str_replace(',',' ',number_format($total_wth_shipping)).':-'; ?></td>
  </tr>
  <?php endif;?>
  <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
  <?php if($purchase_rec->checkout_status == 1):?>
  <tr>
    <td colspan="3">Elektroniska abonnemang träder i kraft med omedelbar verkan. </td></tr>
     <tr><td colspan="3">Beställda varor skickas snarast.</td></tr>
  <?php endif;?>
  
    <?php if($purchase_rec->checkout_status == 0):?>
  <tr><td colspan="3">Ordern expedieras när betalningen inkommit till Börstjänarens konto.</td></tr>
  <?php endif;?>

 
  <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
  <tr><td colspan="3">&nbsp;&nbsp;</td></tr>
  <tr><td><?php echo 'Med vänlig hälsning'?></td></tr>
  <tr><td><?php echo 'Börstjänaren.se'?></td></tr>
  <tr><td>&nbsp;&nbsp;</td></tr>
   <tr><td><?php echo '-------------------------------------------------------'?></td></tr>
  <tr><td><?php echo 'Morningbriefing/Börstjänaren'?></td></tr>
  <tr><td><?php echo 'Bankgiro: 5670-5288'?></td></tr>
  <tr><td><?php echo 'Plusgiro: 104 66 96-9'?></td></tr>
  <tr><td><?php echo 'E-post: info@borstjanaren.se'?></td></tr>
  <tr><td><?php echo 'Web: www.borstjanaren.se'?></td></tr>
</table>
</body>
</html>