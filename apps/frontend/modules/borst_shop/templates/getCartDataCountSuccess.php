<?php if (count($products_data) > 0): ?>
<span><?php if($product_qty_arr){ foreach($product_qty_arr as $pqty){ $prodCnt += $pqty; } echo $prodCnt;}?></span>
<?php endif; ?>