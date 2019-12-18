<script type="text/javascript" language="javascript">
$(window).load(function(){
	$("#bt_shop_"+$(".shop_detail_title").text().toLowerCase()+" a").addClass("active");
	var leftHeight = $(".btshopleftdiv").height();
	var rightHeight = $(".rightbanner").height();	
	var maxHeight = 0;
	
	if(rightHeight > leftHeight)
	{
		maxHeight = (rightHeight + 20);
	}
	else
	{
		maxHeight = (leftHeight - 20) + 20;
	}
	
	$(".rightbanner").css({"height":maxHeight+"px"});
	$(".btshopleftdivinner").css({"min-height": maxHeight + "px"});
        $('#payment_detail').jqTransform();
});
</script>
<div class="maincontentpage maincontentpageshop">
<div class="btshopleftdiv ptop_10 inner-page-contetn-left margin-bottom-10m" id="cartcontentDiv">
        <div class="breadcrumb_div">
		<div>
                    <!--<div class="photoimg "><img alt="photo" src="/images/new_home/btshop.gif"></div>-->
                        <div class="breadcrumb">
                                <ul>
                                        <li><?php
                                        include_component('isicsBreadcrumbs', 'show', array(
                                                'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstHome')
                                        ))
                                        ?> </li>
                                </ul>
                        </div>
		</div>
		<div class="floatLeftNew wh_bt-sh_1">
		<?php //include_partial('borst_shop/payment_steps_partial',array('step'=>1,'designType'=>1)) ?>
                    <?php if ($sf_user->getAttribute('loginRequired')==true || $loginRequiredForProduct==true){ ?>
                        <div class="shop_note textAlignLeft top_0px">Vänligen logga in för att köpa detta objekt!</div>
                    <?php } ?>
		</div>
	</div>
	<div class="clearAll">&nbsp;</div>
  <div class="btshopleftdivinner" id="btshopleftdivinner">
	<?php if(count($products_data) > 0):?>
        <div class="cart_payment_steps">
            <div class="bt-shop-step1-top-margin widthall float_left">&nbsp;</div>
            <?php include_partial('borst_shop/payment_steps_partial',array('step'=>1,'designType'=>2)) ?>
            <div class="bt-shop-step-bottom-margin widthall float_left">&nbsp;</div>
        </div>
        <div id="apply_coupon_code">
            <div class="float-left" id="productlistwr">
            <?php //if ($sf_user->getAttribute('loginRequired')==true || $loginRequiredForProduct==true): ?>
                    <!--<div class="red_text2Cart"><strong>Vänligen logga in för att köpa detta objekt!</strong></div>-->
            <?php //endif; ?>
		<div class="float_left"><input type="hidden" name="product_id" id="product_id" value="<?php echo $product_detail->id; ?>"/></div>
		<div class="shop_detail_title2">1. Granska och skicka</div>
        <div class="spacer5"></div>
		<div class="my_order_text"><!--Din beställning:--></div>
		 <!--<div class="spacer2"></div>-->
		
			<div class="scLiatWraper3">
				<?php $i=0; foreach($products_data as $data): //echo "<pre>$logged_user=="; print_r($data['p_id']);
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
                                            <span class="qtyWraper_span"><input type="text" readonly="true" value="<?php echo $product_qty_arr[$i]; ?> " class="qtyWraper_input"/></span><span>st</span>
					</div>
					<div class="priceWraper">
						á <?php echo number_format($price_arr[$i],2, ",", " "); ?>
					</div>
					<div class="totalWraper">
						<span><?php echo number_format($mul, 2, ",", " "); ?></span>
					</div>
					<div class="crossWraper">
						<span id="delete_<?php echo $i; ?>" class="remove_from_cart1 cursorPointer">X</span>
					</div>
                                        <input type="hidden" name="prod_amount" id="prod_amount" value="<?php echo $mul?>"/>
				</div>
				<?php $i++; endforeach; ?>
			</div>

		
		<?php $i=0; $total=0; foreach($products_data as $data):
                    if($data['p_sellable']==1 && $data['p_id'] > 0) :
                    ?>
		<?php $mul = $product_qty_arr[$i] * $price_arr[$i];?>
        <?php if($add_shipping_flag == 0 && $data['p_type'] < 5){ $add_shipping_flag = 1; } ?>

		<?php $total = $total + $mul; ?>
	    <?php $i++; endif; endforeach; ?>
	
        <?php $shipping = $add_shipping_flag == 1 ? $total_shipping_cost : 00.00; $final_total = $vat = 0;  ?>
        
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
                                        <div class="float_left width_100per"><span class="<?php echo $errorClass;?> blank_error"><?php if($errorMsg) {echo $errorMsg;}?></span></div>
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
                
                <!--<div class="blank_5h widthall">&nbsp;</div>
		<ul class="rows5">                        
			<li class="floatRightNew"> <a id="change_order" class="red_button cursor shop_change_order"><span>Ändra beställningen?</span></a></li>
		</ul>-->
		</div>
        </div>
      <?php /*if($cart_in_cart && !$logged_user): ?>
            <div style="color: red;"> Du måste vara inloggad för att köpa detta abonnemang! </div>
        <?php endif; */?>
        <div id="user_cart_details">            
        
		<form id="payment_detail" name="payment_detail" method="post" action="<?php echo url_for('borst_shop/shopPaymentType') ?>">
		
		<input type="hidden" name="user_id" id="user_id" value="<?php echo $userData->user_id; ?>" />
		<input type="hidden" name="total_price" id="total_price" value="<?php echo $total_wth_shipping; ?>" />
		<input type="hidden" name="shipping" id="shipping" value="<?php echo number_format($shipping,2, ",", " "); ?>" />
		<input type="hidden" name="vat" id="vat" value="<?php echo $vat; ?>" />
		<!--<div class="blank_5h widthall">&nbsp;</div>-->
		<div class="form_heading">E-postadress</div>
                <div class="reg_line">&nbsp;</div>
                <!--<div class="blank_5h width_399 shop_cart_data_div_border">&nbsp;</div>-->
		<div class="clearAll">&nbsp;</div>
		<!--<div class="blank_5h widthall">&nbsp;</div>-->
		<ul class="rows5 m_0 margin_left_96">
			<li class="user_email_li">
				<input type="text" size="25" class="inputBox277 form_input input_width" id="user_email" name="user_email" value="<?php echo $userData ? $userData->email : ($payment_user_info['user_email'] ? $payment_user_info['user_email'] : '');?>">
				<span id="pay_email_error" class="redcolor user_email_span error_shop_payment_email"></span>
			</li>
		</ul>
            <!--<div class="blank_4h widthall">&nbsp;</div>
		<a href="#" class="main_link_color margin_left_96">Ändra e-postadress</a>-->
		
		<div class="blank_30h widthall">&nbsp;</div>
		<div class="form_heading">Leveransadress</div>
                <div class="reg_line">&nbsp;</div>
                <!--<div class="blank_5h width_399 shop_cart_data_div_border">&nbsp;</div>-->
		<div class="clearAll">&nbsp;</div>
		<!--<div class="blank_5h widthall">&nbsp;</div>-->
		<ul class="rows5 m_0 cardDetails">
			<li>
				<span class="label form_labels width_96 float_left">Förnamn</span>
				<input type="text" size="25" class="inputBox277 form_input input_width" id="user_firstname" name="user_firstname" value="<?php echo $userData->firstname ? $userData->firstname : ($payment_user_info['user_firstname'] ? $payment_user_info['user_firstname'] : '');?>">
				<span id="pay_firstname_error" class="redcolor error_shop_payment"></span>
			</li>
			<li>
				<span class="label form_labels width_96 float_left">Efternamn</span>
				<input type="text" size="25" class="inputBox277 form_input input_width" id="user_lastname" name="user_lastname" value="<?php echo $userData->lastname ? $userData->lastname : ($payment_user_info['user_lastname'] ? $payment_user_info['user_lastname'] : '');?>">
				<span id="pay_lastname_error" class="redcolor error_shop_payment"></span>
			</li>
			<li>
				<span class="label form_labels width_96 float_left">Gatuadress</span>
				<input type="text" size="25" class="inputBox277 form_input input_width" id="user_street" name="user_street" value="<?php echo $userData->street ? $userData->street : ($payment_user_info['user_street'] ? $payment_user_info['user_street'] : '');?>">
				<span id="pay_street_error" class="redcolor error_shop_payment"></span>
			</li>
			<li>
				<span class="label form_labels width_96 float_left">Postnr / Ort</span>
				<input type="text" size="25" maxlength="6" class="inputBox277 small form_input" id="user_zipcode" name="user_zipcode" value="<?php echo $userData->zipcode ? $userData->zipcode : ($payment_user_info['user_zipcode'] ? $payment_user_info['user_zipcode'] : '');?>">
				<input type="text" size="25" class="inputBox277 form_input width_114" id="user_city" name="user_city" value="<?php echo $userData->city ? $userData->city : ($payment_user_info['user_city'] ? $payment_user_info['user_city'] : '');?>">
				<span id="pay_zipcode_error" class="redcolor error_shop_payment"></span>
			</li>    
			<li>
				<span class="label form_labels width_96 float_left">Telefon</span>
				<input type="text" size="25" class="inputBox277 form_input input_width" id="user_telephone" name="user_telephone" value="<?php echo $userData->phone ? $userData->phone : ($payment_user_info['user_telephone'] ? $payment_user_info['user_telephone'] : '');?>">
				<span id="pay_telephone_error" class="redcolor error_shop_payment"></span>
			</li>               
			<li>
				<span class="label form_labels width_96 float_left">Land</span>
                <?php $land = is_numeric($userData->land) ?  $contry_arr[$userData->land] : $userData->land ; if ($land=='OTHER'){$land = 'SE';} ?>

                <select class="input174 m_0 width_180" id="user_country" name="user_country">
                	<option <?php echo $land == 5 ? 'selected="selected"' : '' ?> value="0"></option>
					<?php foreach($all_country_data as $data):?>
                	
                    <option value="<?php echo $data->iso_code ?>" <?php echo $land == $data->iso_code ? 'selected="selected"' : ($payment_user_info['user_country'] ? ($data->iso_code == $payment_user_info['user_country'] ? 'selected="selected"' : '') : '') ?>><?php echo $data->country_name ?></option>
					<?php endforeach;?>
                </select>
				
                
				<span id="pay_country_error" class="redcolor error_shop_payment"></span>
			</li>
            <li>
            <div class="blank_6h widthall">&nbsp;</div>
				<span id="empty_cart_for_payment_error" class="redcolor error_shop_payment"></span>
			</li> 
		</ul>
		<!--<div class="blank_10h widthall">&nbsp;</div>-->
		<ul class="rows margin_left_96">
			<li> <a id="check_payment_detail" class="red_button cursor set_coupon"><span>KÖP</span></a> <span id="indicator" class="check_payment_detail_indicator"><img src="/images/indicator.gif" /></span></li>
		</ul>
           <div class="floatLeftNew wh_bt-sh_2">
		<?php //include_partial('borst_shop/payment_steps_partial',array('step'=>1,'designType'=>1)) ?>
                    <?php if ($sf_user->getAttribute('loginRequired')==true || $loginRequiredForProduct==true){ ?>
                        <div class="shop_note textAlignLeft top_0px">Vänligen logga in för att köpa detta objekt!</div>
                    <?php } ?>
		</div>
        <div class="blank_60h widthall">&nbsp;</div>     
		</form>
        </div>
	<?php else:?> 
    	<!--<div class="shop_detail_title">1. Granska och skicka</div>-->
        <div class="height_41"></div>
        <div class="shop_detail_cart">Varukorg</div>
        <div class="height_15"></div>
        <div class="my_order_text"><?php echo __('Din varukorg är tom.') ?></div>
        <span><img class="shop_cart_logo" src="/images/new_home/bt-shop_logo_fyrk.png" width="60"></span>
        <div class="blank_1h widthall">&nbsp;</div>
        <a class="shop_cart_fill_prod cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/borstShopHome' ?>"><?php echo __('Välkommen att fylla den med produkter!'); ?></a>
        <div class="spacer"></div>
        <span><img class="margin_top_2" src="/images/new_home/bt-shop_cart_empty.png" width="500"></span>
	<?php endif;?> 
                <div class="margin_top_89"></div>
		<div class="margin_bottom_50">
			<span><img src="/images/new_home/testimonial_L.png" width="500"></span>
		</div>
	</div>
</div>
<div class="rightbanner" id="shop_rightbanner">
<?php include_partial('borst_shop/get_cart_data_partial', array('final_vat' => $final_vat, 'final_totals' => $final_totals, 'final_dicount' => $final_dicount, 'host_str' => $host_str, 'products_data' => $products_data, 'price_arr' => $price_arr, 'product_qty_arr' => $product_qty_arr, 'price_detail_id_arr' => $price_detail_id_arr, 'product_article' => $product_article, 'add_shipping_flag' => $add_shipping_flag, 'total_shipping_cost' => $total_shipping_cost, 'logged_user' => $logged_user, 'payment_user_info' => $payment_user_info, 'product_detail' => $product_detail, 'metastock_data' => $metastock_data, 'falcon_computer_data' => $falcon_computer_data, 'bocker_data' => $bocker_data, 'utbildningar_data' => $utbildningar_data, 'marknadsbrev_data' => $marknadsbrev_data, 'abonnemang_data' => $abonnemang_data, 'btcart_data' => $btcart_data, 'xmas_offer_data' => $xmas_offer_data, 'productID' => $productID)) ?>
</div>
</div>
</div>
<script>
    $(document).ready(function(){
        $('.discount_coupon_text').unbind('click');
        $('.discount_coupon_text').live("click",function(){
            $(".discount_coupon_div").toggle();
            if($('.apply_code_image').hasClass('shop_arrow_down')){
                $('.apply_code_image').removeClass('shop_arrow_down');
                $('.apply_code_image').addClass('shop_arrow_up');
            }else if($('.apply_code_image').hasClass('shop_arrow_up')){
                $('.apply_code_image').removeClass('shop_arrow_up');
                $('.apply_code_image').addClass('shop_arrow_down');
            }
        });

        $('.apply_code').unbind('click');
        $('.apply_code').live("click",function(){
            var couponcode = $(this).prev().val();
            var final_amount_num = $('#final_amount_num').val();

            if(couponcode){
                $.ajax({
                    url:'/borst_shop/getCouponData?ccd='+couponcode+'&tamt='+final_amount_num,
                    success:function(data)
                    {
                        $("#apply_coupon_code").html(data);
                    }
                });
            }else{
                $('.blank_error').css('color','#f15a22');
                $('.blank_error').html('Vänligen fyll i din kupongkod');
            }       
        });        
    });
</script>