<script type="text/javascript" language="javascript">
    $(window).load(function () {
        $("#bt_shop_" + $(".shop_detail_title").text().toLowerCase() + " a").addClass("active");
        var leftHeight = $(".btshopleftdiv").height();
        var rightHeight = $(".rightbanner").height();
        var maxHeight = 0;

        if (rightHeight > leftHeight)
        {
            maxHeight = rightHeight;
        } else
        {
            maxHeight = leftHeight;
        }

        $(".rightbanner").css({"height": maxHeight + "px"});
        $(".btshopleftdivinner").css({"min-height": maxHeight + "px"});
        $('#payment_detail').jqTransform();
    });
</script>
<div class="maincontentpage maincontentpageshop margin-top-15m">
    <div class="btshopleftdiv ptop_10 inner-page-contetn-left margin-bottom-10m" id="cartcontentDiv">
        <div class="breadcrumb_div">
            <div>
                <div class="photoimg "><img alt="photo" src="/images/new_home/btshop.gif"></div>
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
            <div class="floatLeftNew width_58">
                <?php if ($sf_user->getAttribute('loginRequired') == true || $loginRequiredForProduct == true) { ?>
                    <div class="shop_note textAlignRight top_0px">Vänligen logga in för att köpa detta objekt!</div>
                <?php } ?>
            </div>
        </div>
        <div class="clearAll">&nbsp;</div>
        <div class="btshopleftdivinner" id="btshopleftdivinner">

            <?php if (count($products_data) > 0): ?>
                <div class="cart_payment_steps">
                    <div class="bt-shop-step-top-margin widthall float_left">&nbsp;</div>
                    <?php include_partial('borst_shop/payment_steps_partial', array('step' => 1, 'designType' => 2)) ?>
                    <div class="bt-shop-step-bottom-margin widthall float_left">&nbsp;</div>
                </div>

                <div class="float-left" id="productlistwr">

                    <div class="float_left"><input type="hidden" name="product_id" id="product_id" value="<?php echo $product_detail->id; ?>"/></div>
                    <div class="shoph2">1. Granska och skicka</div>
                    <div class="spacer"></div>
                    <div class="my_order_text"><!--Din beställning:--></div>
                    <div class="spacer2"></div>		
                    <div class="scLiatWraper">
                        <div class="scLiatWraper1" >
                            <div class="imgWraper">
                                <?php if ($products_data->image): ?>
                                    <img src="/uploads/articleIngressImages/<?php echo str_replace('.', '_semimid.', $products_data->image); ?>" />
                                <?php else: ?>
                                    <img src="/images/shopphoto.jpg" alt="photo"  />
                                <?php endif; ?>
                            </div>
                            <div class="titleWraper" id="shop-article-payment-title">
                                <?php echo $products_data->title; ?>
                            </div>
                            <div class="priceWraper">
                                á <?php echo number_format($products_data->price); ?>
                            </div>
                            <div class="totalWraper">
                                <span><?php echo number_format($products_data->price); ?></span>
                            </div>					
                            <input type="hidden" name="prod_amount" id="prod_amount" value="<?php echo $products_data->price ?>"/>                                    
                        </div>
                    </div>

                    <?php $total_wth_shipping = number_format($products_data->price); ?>
                    <?php $vat = $total_wth_shipping * 6 / 106; ?>

                    <div class="float_left shop_cart_data_div">
                        <div class="float_left width_558"> <!--width_550-->
                            <div class="float_left">Frakt <?php echo!$payment_user_info['user_country'] ? "(inom Sverige) " : '' ?>:&nbsp;</div>
                            <div class="float_right frakt" id="shipping_charge">
                                <?php if ($logged_user): ?>
                                    <?php echo number_format($shipping, 2) ?>
                                <?php else: ?>
                                    <?php echo number_format($shipping, 2) ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="blank_6h widthall shop_cart_data_div_border">&nbsp;</div>
                        <div class="float_left width_558">
                            <div class="blank_5h widthall">&nbsp;</div>
                            <div class="float_left">Total:</div>
                            <div class="float_right total_amt" id="total_amt_art" title="<?php
                            if ($final_totals) {
                                echo $final_totals;
                            } else {
                                echo $total_wth_shipping;
                            }
                            ?>"><?php echo number_format($total_wth_shipping, 2) ?></div>
                        </div>
                        <div class="blank_6h widthall shop_cart_data_div_border">&nbsp;</div>

                        <div class="float_left width_558">
                            <div class="blank_5h widthall">&nbsp;</div>
                            <div class="float_left">Varav moms:</div>
                            <div class="float_right vat_amt"><?php
                                if ($final_vat) {
                                    echo $final_vat;
                                } else {
                                    echo number_format($vat, 2);
                                }
                                ?></div>
                        </div>

                        <div class="blank_6h widthall shop_cart_data_div_border">&nbsp;</div>
                        <div class="float_left shop_cart_topay_div">
                            <div class="blank_5h widthall">&nbsp;</div>
                            <div class="float_left red_text shop_cart_topay" >Att betala inkl moms:</div>
                            <div class="float_right red_text total_amt shop_cart_total" id="final_amount"><?php
                                if ($final_totals) {
                                    echo $final_totals;
                                } else {
                                    echo number_format($total_wth_shipping, 2);
                                }
                                ?></div>
                        </div>
                        <div class="blank_5h widthall shop_cart_data_div_border">&nbsp;</div>
                        <ul class="rows5" id="margin_top_10">
                            <li class="floatRightNew"> <a id="check_payment_detail_article" class="red_button cursor"><span>KÖP</span></a> </li>
                        </ul>	
                        <ul class="rows5">                        
                            <li class="floatRightNew"> <a id="change_order_article" class="red_button cursor shop_change_order"><span>Ändra beställningen?</span></a></li>
                        </ul>
                    </div>                    
                </div>
                <form id="payment_detail" name="payment_detail" method="post" action="<?php echo url_for('borst_shop/shopArticlePaymentType') ?>">
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $userData->user_id; ?>" />
                    <input type="hidden" name="total_price" id="total_price" value="<?php echo $total_wth_shipping; ?>" />
                    <input type="hidden" name="shipping" id="shipping" value="<?php echo number_format($shipping, 2); ?>" />
                    <input type="hidden" name="vat" id="vat" value="<?php echo $vat; ?>" />
                    <!--<div class="blank_22h widthall">&nbsp;</div>-->
                    <div class="form_heading">E-postadress</div>
                    <div class="blank_14h width_392 shop_cart_data_div_border">&nbsp;</div>
                    <div class="clearAll">&nbsp;</div>
                    <div class="blank_29h widthall">&nbsp;</div>
                    <ul class="rows5 m_0 margin_left_114">
                        <li class="user_email_li">
                            <input type="text" size="25" class="inputBox277 form_input width_277" id="user_email" name="user_email" value="<?php echo $userData ? $userData->email : ($payment_user_info['user_email'] ? $payment_user_info['user_email'] : ''); ?>">
                            <span id="pay_email_error" class="redcolor user_email_span error_shop_payment_email"></span>
                        </li>
                    </ul>
                    <div class="blank_8h widthall">&nbsp;</div>
                    <a href="#" class="main_link_color margin_left_114">Ändra e-postadress</a>

                    <div class="blank_28h widthall">&nbsp;</div>
                    <div class="form_heading">Leveransadress</div>
                    <div class="blank_14h width_392 shop_cart_data_div_border">&nbsp;</div>
                    <div class="clearAll">&nbsp;</div>
                    <div class="blank_29h widthall">&nbsp;</div>
                    <ul class="rows5 m_0 cardDetails">
                        <li>
                            <span class="label form_labels width_114 float_left">Förnamn</span>
                            <input type="text" size="25" class="inputBox277 form_input width_277" id="user_firstname" name="user_firstname" value="<?php echo $userData->firstname ? $userData->firstname : ($payment_user_info['user_firstname'] ? $payment_user_info['user_firstname'] : ''); ?>">
                            <span id="pay_firstname_error" class="redcolor error_shop_payment"></span>
                        </li>
                        <li>
                            <span class="label form_labels width_114 float_left">Efternamn</span>
                            <input type="text" size="25" class="inputBox277 form_input width_277" id="user_lastname" name="user_lastname" value="<?php echo $userData->lastname ? $userData->lastname : ($payment_user_info['user_lastname'] ? $payment_user_info['user_lastname'] : ''); ?>">
                            <span id="pay_lastname_error" class="redcolor error_shop_payment"></span>
                        </li>
                        <li>
                            <span class="label form_labels width_114 float_left">Gatuadress</span>
                            <input type="text" size="25" class="inputBox277 form_input width_277" id="user_street" name="user_street" value="<?php echo $userData->street ? $userData->street : ($payment_user_info['user_street'] ? $payment_user_info['user_street'] : ''); ?>">
                            <span id="pay_street_error" class="redcolor error_shop_payment"></span>
                        </li>
                        <li>
                            <span class="label form_labels width_114 float_left">Postnr / Ort</span>
                            <input type="text" size="25" maxlength="6" class="inputBox277 small form_input" id="user_zipcode" name="user_zipcode" value="<?php echo $userData->zipcode ? $userData->zipcode : ($payment_user_info['user_zipcode'] ? $payment_user_info['user_zipcode'] : ''); ?>">
                            <input type="text" size="25" class="inputBox277 width_214 form_input" id="user_city" name="user_city" value="<?php echo $userData->city ? $userData->city : ($payment_user_info['user_city'] ? $payment_user_info['user_city'] : ''); ?>">
                            <span id="pay_zipcode_error" class="redcolor error_shop_payment"></span>
                        </li>    
                        <li>
                            <span class="label form_labels width_114 float_left">Telefon</span>
                            <input type="text" size="25" class="inputBox277 form_input width_277" id="user_telephone" name="user_telephone" value="<?php echo $userData->phone ? $userData->phone : ($payment_user_info['user_telephone'] ? $payment_user_info['user_telephone'] : ''); ?>">
                            <span id="pay_telephone_error" class="redcolor error_shop_payment"></span>
                        </li>               
                        <li>
                            <span class="label form_labels width_114 float_left">Land</span>
                                <?php
                                $land = is_numeric($userData->land) ? $contry_arr[$userData->land] : $userData->land;
                                if ($land == 'OTHER') {
                                    $land = 'SE';
                                }
                                ?>

                            <select class="input174 m_0 width_180" id="user_country_article" name="user_country">
                                <option <?php echo $land == 5 ? 'selected="selected"' : '' ?> value="0"></option>
                                <?php foreach ($all_country_data as $data): ?>
                                    <option value="<?php echo $data->iso_code ?>" <?php echo $land == $data->iso_code ? 'selected="selected"' : ($payment_user_info['user_country'] ? ($data->iso_code == $payment_user_info['user_country'] ? 'selected="selected"' : '') : '') ?>><?php echo $data->country_name ?></option>
                                <?php endforeach; ?>
                            </select>


                            <span id="pay_country_error" class="redcolor"></span>
                        </li>
                        <li>
                            <div class="blank_6h widthall">&nbsp;</div>
                            <span id="empty_cart_for_payment_error" class="redcolor"></span>
                        </li> 
                    </ul>

                    <ul class="rows margin_left_114">
                        <li> <a id="check_payment_detail_article" class="red_button cursor set_coupon"><span>KÖP</span></a> <span id="indicator" class="check_payment_detail_indicator"><img src="/images/indicator.gif" /></span></li>
                    </ul>
                    <div class="blank_60h widthall">&nbsp;</div>     
                </form>
            
            <?php else: ?>
                <div class="shoph2">1. Granska och skicka</div>
                <div class="blank_60h widthall">&nbsp;</div>
                <div class="my_order_text"><?php echo __('Din varukorg är tom.') ?></div>
                <div class="blank_15h widthall">&nbsp;</div>
                <a class="main_link_color cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/borstShopHome' ?>"><?php echo __('Välkommen att fylla den med produkter!'); ?></a>
                <div class="spacer"></div>
            <?php endif; ?>
            <div class="margin_top_89"></div>
            <div class="margin_bottom_50">
                <span><img src="/images/new_home/testimonial_L.png" width="500"></span>
            </div>
        </div>
    </div>
    <div class="rightbanner" id="shop_rightbanner">
        <div class="shop_1_step_right_panel">&nbsp;</div>
    </div>
</div>
</div>