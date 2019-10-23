<?php 
    if ($saved_cart_items_pid!=''){
?><div class="float_left"></div>
<div class="height_56"></div>
<div class="shop_detail_title">Varukorg</div>
<div class="height_41"></div>
<div class="scLiatWraper">
    <?php 
    //if ($saved_cart_items_pid!=''){
    $i = 0;
    foreach ($saved_cart_items_pid as $data):
        $mul = $saved_cart_items_qty[$i] * $saved_cart_items_price[$i];
        $obj = Doctrine_Core::getTable('BtShopArticle')->findOneById($data);
        ?>
        <div class="scLiatWraper1">
            <div class="imgWraper">
                <?php if ($obj->getBtshopProductImage()): ?>
                    <img src="/uploads/btshopThumbnail/<?php echo $obj->getBtshopProductImage(); ?>" />
                <?php else: ?>
                    <img src="/images/shopphoto.jpg" alt="photo"  />
                <?php endif; ?>
            </div>
            <div class="titleWraper"><?php echo $obj->getBtshopArticleTitle(); ?></div>
            <div class="qtyWraper">
                <span class="margin_rgt_6"><input type="text" readonly="true" value="<?php echo $saved_cart_items_qty[$i]; ?> " class="qtyWraper_input" /></span><span>st</span>
            </div>
            <div class="priceWraper">
                á <?php echo number_format($saved_cart_items_price[$i], 2 , ",", " "); ?>
            </div>
            <div class="totalWraper">
                <span><?php echo number_format($mul, 2 , ",", " "); ?></span>
            </div>
            <div class="crossWraper">
                <span dId="<?php echo $obj->id; ?>" id="delete_<?php echo $i; ?>" class="remove_from_cart2 cursorPointer">X</span>
            </div>
        </div>
    <?php $i++;
    endforeach; ?>
    <div class="blank_1h widthall">&nbsp;</div>
        <ul class="rows5">                        
                <li class="floatRightNew"><a href="<?php echo 'http://' . $host_str . '/borst_shop/shopPayment'?>" class="red_button cursor"><span>GÅ TILL KASSAN</span></a></li>
        </ul>
    <?php } else {?>
                <div class="height_56"></div>
                <div class="shop_detail_title">Varukorg</div>
                
                <div class="height_41"></div>
              
                <div class="my_order_text"><?php echo __('Din varukorg är tom.') ?></div>
                <span><img class="shop_cart_logo" src="/images/new_home/bt-shop_logo_cart.png" width="70"></span>
                <div class="blank_1h widthall">&nbsp;</div>
                <a class="shop_cart_fill_prod cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/borstShopHome' ?>"><?php echo __('Välkommen att fylla den med produkter!'); ?></a>
                <div class="spacer"></div>
                <span><img class="margin_top_2" src="/images/new_home/bt-shop_cart_empty.png" width="500"></span>
    <?php }?>
</div>