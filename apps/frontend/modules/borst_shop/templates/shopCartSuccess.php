<script type="text/javascript" language="javascript">
    $(window).load(function () {
        $("#bt_shop_" + $(".shop_detail_title").text().toLowerCase() + " a").addClass("active");
        var leftHeight = $("#btshopleftdivinner").height();
        var rightHeight = $("#shop_rightbanner").height();	
        var maxHeight = 0;
	
        if(rightHeight > leftHeight)
        {
            maxHeight = rightHeight;
        }
        else
        {
            maxHeight = leftHeight;
        }
	
        $("#shop_rightbanner").css({"height":maxHeight+"px"});
        $("#btshopleftdivinner").css({"min-height":maxHeight+"px"});
    });
</script>
<div class="maincontentpage maincontentpageshop">
    <div class="btshopleftdiv ptop_10 inner-page-contetn-left" id="cartcontentDiv">
        <div id="breadcrumMaindiv">
            <div class="floatLeftNew width_74_per">
                <!--<div class="photoimg margin-right"><img alt="photo" src="/images/new_home/btshop.gif"></div>-->
                <div class="breadcrumb">
                    <ul>
                        <li><?php include_component('isicsBreadcrumbs', 'show', array('root' => array('text' => 'Börstjänaren', 'uri' => 'borst/borstHome')))?> </li>
                    </ul>
                </div>
            </div>
            <div class="floatRightNew"></div>
        </div>
        <div class="clearAll">&nbsp;</div>
        <div class="btshopleftdivinner" id="btshopleftdivinner">
            <?php if ($saved_cart_items_pid!=''): ?>
                <div class="float-left" id="productlistwr">
                    <div class="float_left"></div>
                    <div class="height_10"></div>
                    <div class="shop_detail_title">Varukorg</div>
                    <div class="height_41"></div>                                 
                    <div class="scLiatWraper">
                        <?php
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
                                    <span class="margin_rgt_6"><input type="text" readonly="true" value="<?php echo $saved_cart_items_qty[$i]; ?> " class="qtyWraper_input"/></span><span>st</span>
                                </div>
                                <div class="priceWraper">
                                    á <?php echo number_format($saved_cart_items_price[$i], 2, ",", " "); ?>
                                </div>
                                <div class="totalWraper">
                                    <span><?php echo number_format($mul, 2, ",", " "); ?></span>
                                </div>
                                <div class="crossWraper">
                                    <span dId="<?php echo $obj->id; ?>" id="delete_<?php echo $i; ?>" class="remove_from_cart2 cursorPointer">X</span>
                                </div>
                            </div>
                        <?php $i++;
                        endforeach; ?>
                            <div class="blank_10h widthall">&nbsp;</div>
                            <ul class="rows5">                        
                                    <li class="floatRightNew"><a href="<?php echo 'http://' . $host_str . '/borst_shop/shopPayment'?>" class="red_button cursor"><span>GÅ TILL KASSAN</span></a></li>
                            </ul>
                    </div>
                </div>
            <?php else: ?> 
            	<div class="height_25"></div>
                <div class="shop_detail_title">Varukorg</div>                
                <div class="height_15"></div>              
                <div class="my_order_text"><?php echo __('Din varukorg är tom.') ?></div>
                <a class="shop_cart_fill_prod cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/borstShopHome' ?>"><span><img class="shop_cart_logo" src="/images/new_home/bt-shop_sq.png" width="70"></span>
             
                <?php echo __('Välkommen att fylla den med produkter!'); ?></a>
                <div class="spacer"></div>
                <span><img class="margin_top_10" src="/images/new_home/bt-shop_cart_empty.png" width="500"></span>
            <?php endif; ?> 
        </div>        
        <div class="floatLeft mrg_lft_60 margin_testimonial">
                <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
        </div>
    </div>
    <div class="rightbanner margin_top_15" id="shop_rightbanner">
<?php include_partial('borst_shop/get_shop_cart_data_partial', array('final_vat' => $final_vat, 'final_totals' => $final_totals, 'final_dicount' => $final_dicount, 'host_str' => $host_str, 'products_data' => $products_data, 'price_arr' => $price_arr, 'product_qty_arr' => $product_qty_arr, 'price_detail_id_arr' => $price_detail_id_arr, 'product_article' => $product_article, 'add_shipping_flag' => $add_shipping_flag, 'total_shipping_cost' => $total_shipping_cost, 'logged_user' => $logged_user, 'payment_user_info' => $payment_user_info, 'product_detail' => $product_detail, 'metastock_data' => $metastock_data, 'falcon_computer_data' => $falcon_computer_data, 'bocker_data' => $bocker_data, 'utbildningar_data' => $utbildningar_data, 'marknadsbrev_data' => $marknadsbrev_data, 'abonnemang_data' => $abonnemang_data, 'btcart_data' => $btcart_data, 'xmas_offer_data' => $xmas_offer_data, 'productID' => $productID)); ?>
    </div>
</div>