<div class="float-left" id="productlistwr">
    <?php if ($sf_user->getAttribute('loginRequired') == true || $loginRequiredForProduct == true): ?>
        <div class="red_text2Cart">Vänligen logga in för att köpa detta objekt!</div>
    <?php endif; ?>
    <?php echo $product_detail->btshop_type_id; ?>
    <div class="float_left"><input type="hidden" name="product_id" id="product_id" value="<?php echo $product_detail->id; ?>"/></div>
    <div class="shop_detail_title2">1. Granska och skicka</div>
    <div class="spacer5"></div>
    <div class="my_order_text"><!--Din beställning:--></div>
    <div class="spacer2"></div>

    <div class="scLiatWraper">
        <?php
        $i = 0;
        foreach ($products_data as $data): //echo "<pre>$logged_user=="; print_r($data['p_id']);
            $mul = $product_qty_arr[$i] * $price_arr[$i];
            $prod_Id = $data['p_id'];
            $user_Id = $logged_user;
            $user_email = $logged_user_email;
            ?>
            <div class="scLiatWraper1">
                <div class="imgWraper">
                    <?php if ($data['btshop_product_image']): ?>
                        <img src="/uploads/btshopThumbnail/<?php echo $data['btshop_product_image']; ?>" />
                    <?php else: ?>
                        <img src="/images/shopphoto.jpg" alt="photo"  />
                    <?php endif; ?>
                </div>
                <div class="titleWraper">
                    <?php echo $data['p_title']; ?>
                </div>
                <div class="qtyWraper">
                    <span class="qtyWraper_span"><input type="text" readonly="true" value="<?php echo $product_qty_arr[$i]; ?> " class="qtyWraper_input" /></span><span>st</span>
                </div>
                <div class="priceWraper">
                    á <?php echo number_format($price_arr[$i], 2, ",", " "); ?>
                </div>
                <div class="totalWraper">
                    <span><?php echo number_format($mul, 2, ",", " "); ?></span>
                </div>
                <div class="crossWraper">
                    <span id="delete_<?php echo $i; ?>" class="remove_from_cart1 cursorPointer">X</span>
                </div>
                <input type="hidden" name="prod_amount" id="prod_amount" value="<?php echo $mul ?>"/>
            </div>
            <?php $i++;
        endforeach;
        ?>
    </div>


    <?php
    $i = 0;
    $total = 0;
    foreach ($products_data as $data):
        if ($data['p_sellable'] == 1 && $data['p_id'] > 0) :
            ?>
            <?php $mul = $product_qty_arr[$i] * $price_arr[$i]; ?>
            <?php
            if ($add_shipping_flag == 0 && $data['p_type'] < 5) {
                $add_shipping_flag = 1;
            }
            ?>

            <?php $total = $total + $mul; ?>
            <?php
            $i++;
        endif;
    endforeach;
    ?>

    <?php $shipping = $add_shipping_flag == 1 ? $total_shipping_cost : 00.00;
    $final_total = $vat = 0;
    ?>

    <?php $total_wth_shipping = $total + $shipping; ?>
    <?php $vat = $total_wth_shipping * 6 / 106; ?>
    <?php
    //$final_total = $total_wth_shipping + $vat; 
    if (count($products_data) >= 1 && $final_totals != '') {
        $total_final = ($total_wth_shipping - $final_dicount);
        $vat = $total_final * 6 / 106;
    } else {
        $total_final = $total_wth_shipping;
    }
    ?>

    <div class="float_left shop_cart_data_div">
			<div class="float_left width_558"> <!--width_550-->
				<div class="float_left">Frakt <?php echo !$payment_user_info['user_country'] ? "(inom Sverige) " : '' ?>:&nbsp;</div>
				<div class="float_right frakt" id="shipping_charge">
				<?php if($logged_user):?>
					<?php echo number_format($shipping, 2, ",", " ") ?>
                                    <?php else:?>
                                            <?php echo number_format($shipping, 2, ",", " ") ?>
                                    <?php endif;?>
                </div>
			</div>
			<div class="blank_6h widthall shop_cart_data_div_border">&nbsp;</div>
			<div class="float_left width_558">
			<div class="blank_5h widthall">&nbsp;</div>
				<div class="float_left">Total:</div>
                                <div class="float_right total_amt" id="total_amt_art"><?php echo number_format($total_wth_shipping, 2, ",", " ") ?></div>
			</div>
                        <?php if($final_dicount){?>
                        <div class="blank_6h widthall shop_cart_data_div_border">&nbsp;</div>
			<div class="float_left width_558">
			<div class="blank_5h widthall">&nbsp;</div>
				<div class="float_left shop_cart_topay">Kampanjrabatt <?php if($final_discount_percentage) {echo $final_discount_percentage;}?>%</div>
                                <div class="float_right final_discount shop_cart_total"><?php if ($final_dicount) { echo '- '.number_format($final_dicount, 2, ",", " ");} ?></div>
			</div>
                         <div class="blank_6h widthall shop_cart_data_div_border">&nbsp;</div>
			<div class="float_left width_558">
			<div class="blank_5h widthall">&nbsp;</div>
				<div class="float_left">Summa inklusive kampanjrabatt:</div>
                                <div class="float_right"><?php echo number_format($total_final, 2, ",", " "); ?></div>
			</div>
                         <?php } ?>
                        <div class="blank_5h widthall shop_cart_data_div_border">&nbsp;</div>
			<div class="float_left width_558">
				<div class="blank_5h widthall">&nbsp;</div>
				<div class="float_left">Varav moms:</div>
				<div class="float_right vat_amt"><?php echo number_format($vat, 2, ",", " "); ?></div>
			</div>                  
                              <div class="blank_5h widthall shop_cart_data_div_border">&nbsp;</div>
                              <div class="float_left shop_cart_topay_div">
                                  <div class="blank_5h widthall">&nbsp;</div>
                                  <div class="float_left red_text shop_cart_topay">Att betala inkl moms:</div>
                                  <div class="float_right red_text total_amt shop_cart_total" id="final_amount">
                                      <?php echo number_format($total_final, 2, ",", " "); ?>
                                      <input type="hidden" name="final_amount_num" id="final_amount_num" value="<?php echo $total_final;?>"/>
                                  </div>
                              </div>
                              <div class="blank_5h widthall shop_cart_data_div_border">&nbsp;</div>
                              <div class="float_left shop_cart_topay_div">
                                    <div class="discount_coupon_text">
                                      <div class="blank_5h widthall">&nbsp;</div>
                                      <div class="float_left shop_cart_code" >Har du en kampanjkod?</div>
                                      <div class="float_right"><span class="apply_code_image shop_arrow_down"></span></div>
                                    </div>
                                    <div class="discount_coupon_div" style="<?php if($errorMsg){echo "display:block";}else{echo"display:none";}?>">
                                        <div class="blank_5h widthall">&nbsp;</div>
                                        <div class="float_left height_35 shop_cart_common" ><span class="shop_cart_quest"></span>Vanliga frågor om erbjudandekoder</div>
                                        <div class="float_right">
                                            <input type="text" name="disc" placeholder="Fyll i koden här" value="" class="shop_code coupon_code_val"><span class="apply_code">Aktivera</span>
                                        </div>
                                        <div class="float_left width_100per"><span class="<?php echo $errorClass;?> blank_error"><?php if($errorMsg) {echo $errorMsg;}?></span></div>
                                        <div class="blank_5h widthall shop_cart_data_div_border">&nbsp;</div>
                                    </div>
                              </div>
                            <div class="blank_7h widthall">&nbsp;</div>
                            <ul class="rows5">
                                    <li class="floatRightNew"> <a id="check_payment_detail" class="red_button cursor"><span>KÖP</span></a> </li>
                            </ul>	
                            <ul class="rows5">                        
                                    <li class="floatRightNew"> <a id="change_order" class="red_button cursor shop_change_order"><span>Ändra beställningen?</span></a></li>
                            </ul>
    </div>
</div>