 <?php if ($sf_user->getAttribute('loginRequired')==true || $loginRequiredForProduct==true): ?>
            <div class="red_text2Cart"><strong>Vänligen logga in för att köpa detta objekt!</strong></div>
         <?php endif; ?>
<?php if(count($products_data) >0): ?>
    <div class="float_left_gs"><input type="hidden" name="product_id" id="product_id" value="<?php echo $product_detail->id; ?>"/></div>
    <div class="shoph2">1. Granska och skicka</div>
    <div class="spacer"></div>
    <div class="my_order_text"><!--Din beställning:--></div>
    <div class="spacer2"></div>
	
	<div class="scLiatWraper">
				<?php $i=0; foreach($products_data as $data): 
					$mul = $product_qty_arr[$i] * $price_arr[$i];
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
                                            <span class="qtyWraper_span"><input type="text" readonly="true" value="<?php echo $product_qty_arr[$i]; ?> " class="qtyWraper_input"/></span><span>st</span>
					</div>
					<div class="priceWraper">
						á <?php echo number_format($price_arr[$i],2); ?>
					</div>
					<div class="totalWraper">
						<span><?php echo number_format($mul, 2); ?></span>
					</div>
					<div class="crossWraper">
						<span id="delete_<?php echo $i; ?>" class="remove_from_cart1 cursorPointer">X</span>
					</div>
                                    
                                    <?php ?>
				</div>
				<?php $i++; endforeach; ?>
			</div>
			
<?php $i = 0;
    $total = 0;
    foreach ($products_data as $data):
        if($data['p_sellable']==1 && $data['p_id'] > 0) :
        ?>
<?php $mul = $product_qty_arr[$i] * $price_arr[$i]; ?>
<?php if ($add_shipping_flag == 0 && $data['p_type'] < 5) {
            $add_shipping_flag = 1;
        } /*old code Start?>
<div class="float_left" style="border-top:1px solid #adb8c7; padding:6px 0 6px 0; width:555px;">
    <div class="float_left" style=" width:550px;border:0px solid red;">
        <strong><?php echo $product_article->getShopArticleTypeName($data['p_type']) ?>:</strong>
<?php echo $data['p_title'] ?>
    </div>
    <div class="float_left" style=" width:550px;border:0px solid blue;">
        <div class="float_left" style="border:0px solid blue;">
            <strong>Antal: </strong><?php echo $product_qty_arr[$i]; ?> st á <?php echo $price_arr[$i]; ?>
        </div>
        <div class="float_right" style="border:0px solid pink;">
                <?php echo number_format($mul, 2) ?>
                </div>
            </div>
 </div>

<?php old code end*/ $total = $total + $mul; ?>
<?php $i++; endif;
    endforeach; ?>

<?php $shipping = $add_shipping_flag == 1 ? $total_shipping_cost : 00.00;
    $final_total = $vat = 0; ?>

<?php $total_wth_shipping = $total + $shipping; ?>
<?php $vat = $total_wth_shipping * 6 / 106; ?>
<?php //$final_total = $total_wth_shipping + $vat;  
if(count($products_data)>=1 && $final_totals!=''){
                          $total_final = ($total_wth_shipping - $final_dicount);
                          $vat = $total_final * 6 / 106;
}else{
        $total_final = $total_wth_shipping;
}?>

    <div class="float_left shop_cart_data_div">
			<div class="float_left width_558"> <!--width_550-->
				<div class="float_left">Frakt <?php echo !$payment_user_info['user_country'] ? "(inom Sverige) " : '' ?>:&nbsp;</div>
				<div class="float_right frakt" id="shipping_charge">
				<?php if($logged_user):?>
					<?php echo number_format($shipping, 2) ?>
                                    <?php else:?>
                                            <?php echo number_format($shipping, 2) ?>
                                    <?php endif;?>
                </div>
			</div>
			<div class="blank_6h widthall shop_cart_data_div_border">&nbsp;</div>
			<div class="float_left width_558">
			<div class="blank_5h widthall">&nbsp;</div>
				<div class="float_left">Total:</div>
                                <div class="float_right total_amt" id="total_amt_art"><?php echo number_format($total_wth_shipping, 2) ?></div>
			</div>
                        <?php if($final_dicount){?>
                        <div class="blank_6h widthall shop_cart_data_div_border">&nbsp;</div>
			<div class="float_left width_558">
			<div class="blank_5h widthall">&nbsp;</div>
                                <div class="float_left shop_cart_topay">Kampanjrabatt <?php if($final_discount_percentage) {echo $final_discount_percentage;}?>%</div>
                                <div class="float_right final_discount shop_cart_total"><?php if ($final_dicount) { echo '- '.number_format($final_dicount, 2);} ?></div>
			</div>
                         <div class="blank_6h widthall shop_cart_data_div_border">&nbsp;</div>
			<div class="float_left width_558">
			<div class="blank_5h widthall">&nbsp;</div>
				<div class="float_left">Summa inklusive kampanjrabatt:</div>
                                <div class="float_right"><?php echo number_format($total_final, 2); ?></div>
			</div>
                        <?php } ?>
                        <div class="blank_5h widthall shop_cart_data_div_border">&nbsp;</div>
			<div class="float_left width_558">
				<div class="blank_5h widthall">&nbsp;</div>
				<div class="float_left">Varav moms:</div>
				<div class="float_right vat_amt"><?php echo number_format($vat, 2); ?></div>
			</div>                  
                              <div class="blank_5h widthall shop_cart_data_div_border">&nbsp;</div>
                              <div class="float_left shop_cart_topay_div">
                                  <div class="blank_5h widthall">&nbsp;</div>
                                  <div class="float_left red_text shop_cart_topay">Att betala inkl moms:</div>
                                  <div class="float_right red_text total_amt shop_cart_total" id="final_amount">
                                      <?php echo number_format($total_final, 2); ?>
                                      <input type="hidden" name="final_amount_num" id="final_amount_num" value="<?php echo $total_final;?>"/>
                                  </div>
                              </div>
                              <div class="blank_5h widthall shop_cart_data_div_border">&nbsp;</div>
                              <?php if($coupon_code_count){?>
                              <div class="float_left shop_cart_topay_div">
                                    <div class="discount_coupon_text">
                                      <div class="blank_5h widthall">&nbsp;</div>
                                      <div class="float_left shop_cart_code" >Har du en kampanjkod?</div>
                                      <div class="float_right"><span class="apply_code_image shop_arrow_down"></span></div>
                                    </div>
                                    <div class="discount_coupon_div blog_rights">
                                        <div class="blank_5h widthall">&nbsp;</div>
                                        <div class="float_left height_35 shop_cart_common" ><span class="shop_cart_quest"></span>Vanliga frågor om erbjudandekoder</div>
                                        <div class="float_right">
                                            <input type="text" name="disc" placeholder="Fyll i koden här" value="" class="shop_code coupon_code_val"><span class="apply_code">Aktivera</span>
                                        </div>
                                        <!--<div class="float_left"><span class="<?php //echo $errorClass;?> blank_error"><?php //if($errorMsg) {echo $errorMsg;}?></span></div>-->
                                        <div class="blank_5h widthall shop_cart_data_div_border">&nbsp;</div>
                                    </div>
                              </div><?php }?>
                                <div class="blank_7h widthall">&nbsp;</div>
                                <ul class="rows5">
                                        <li class="floatRightNew"> <a id="check_payment_detail" class="red_button cursor"><span>KÖP</span></a> </li>
                                </ul>	
                                <ul class="rows5">                        
                                        <li class="floatRightNew"> <a id="change_order" class="red_button cursor shop_change_order"><span>Ändra beställningen?</span></a></li>
                                </ul>
                          </div>

</div>
<!--<div class="blank_4h widthall">&nbsp;</div> -->
<?php if ($cart_in_cart && !$logged_user): ?>
                <div class="redColor"> Du måste vara inloggad för att köpa detta abonnemang! </div>
<?php endif; ?>

                <input type="hidden" name="user_id" id="user_id" value="<?php echo $userData->user_id; ?>" />
                <input type="hidden" name="total_price" id="total_price" value="<?php echo $total_wth_shipping; ?>" />
                <input type="hidden" name="shipping" id="shipping" value="<?php echo number_format($shipping, 2); ?>" />
                <input type="hidden" name="vat" id="vat" value="<?php echo $vat; ?>" />
                <!--<div class="spacer"></div>-->

<?php else: ?>      
                <div class="height_56"></div>
                <input type="hidden" name="cart_is_empty" value="cart_is_empty" id="cart_is_empty"/>
                <div class="shop_detail_title">Varukorg</div>                
                <div class="height_41"></div>              
                <div class="my_order_text"><?php echo __('Din varukorg är tom.') ?></div>
                <span><img class="shop_cart_logo" src="/images/new_home/bt-shop_logo_fyrk.png" width="70"></span>
                <div class="blank_1h widthall">&nbsp;</div>
                <a class="shop_cart_fill_prod cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/borstShopHome' ?>"><?php echo __('Välkommen att fylla den med produkter!'); ?></a>
                <div class="spacer"></div>
                <span><img class="margin_top_2" src="/images/new_home/bt-shop_cart_empty.png" width="500"></span>
<?php endif; ?>

