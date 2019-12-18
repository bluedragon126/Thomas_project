<!--CART starts --> 
<?php $type_arr = array(5, 6, 7); ?>
<?php $total = $total_wth_shipping = $total_wth_vat = $vat = 0; ?>
<?php if (count($products_data) > 0): ?>
    <div class="cart pbottom_10">
        <div class="shop_r_cart_title float_left">Varukorg</div>
        <!--<div class="float_right mrg_top_15"><img class="shop_r_cart_img_top" src="/images/new_home/bt-shop_logo_left_wt.png"/></div>-->
        <div class="float_right width_100_per"><span class="float_right shop_r_cart_count">Antal artiklar: <strong><?php if($product_qty_arr){ foreach($product_qty_arr as $pqty){ $prodCnt += $pqty; } echo $prodCnt;}?></strong></span></div>
            <?php 
        $i = 0;
        foreach ($products_data as $data):
            if ($data['p_sellable'] == 1) :
                ?>
                <div class="info"> <!--<span class="float_right shop_r_cart_count">Antal artiklar: <strong>-->
                        <?php $mul = $product_qty_arr[$i] * $price_arr[$i]; ?>
                        <?php
                        if ($add_shipping_flag == 0 && $data['p_type'] < 5) {
                            $add_shipping_flag = 1;
                        }
                        ?>

                        <?php if ($on_last_step != 1): ?>
                            <?php //echo $product_qty_arr[$i]; ?>
                        <?php else: ?>
                            <?php //echo $product_qty_arr[$i]; ?>
                        <?php endif; ?><!--</strong>
                    </span>-->
                </div>
                <div class="info"> 
                    <div class="float_left widthall">
                        <div class="shop_r_cart_cat_bg <?php if($i == 0) { echo 'mrg_top_cart_r';} else { echo 'mrg_top_bt-shop_r_cart';} ?>">
                            <span class="shop_r_cart_cat"><?php echo $product_article->getShopArticleTypeName($data['p_type']) ?></span>
                        </div>
                        <br />
                        <div class="shop_r_cart_prod_img"><img src="/uploads/btshopThumbnail/<?php echo $data['btshop_product_image']; ?>" width="60" height="60" /></div><div class="shop_r_cart_prod"> <?php echo $data['p_title'] ?></div>
                        <br />
                    </div>
                </div>
                 <div class="blank_1h widthall">&nbsp;</div>
                <div class="info shop_r_cart_price_bg margin_top_5"> 
                    <span class="left margin_top_8 pad_lft_6 shop_r_cart_text">
                        <span>Antal:</span>
                        <?php $mul = $product_qty_arr[$i] * $price_arr[$i]; ?>
                        <?php
                        if ($add_shipping_flag == 0 && $data['p_type'] < 5) {
                            $add_shipping_flag = 1;
                        }
                        ?>

                        <?php if ($on_last_step != 1): ?>
                            <?php if (in_array($data['p_type'], $type_arr)): ?>
                                <span class="pad_lft_5 shop_r_cart_quant shop_r_cart_text shop_cart_input">
                                    <input id="qty_<?php echo $i; ?>" class="no_of_product" type="text"  value="<?php echo $product_qty_arr[$i]; ?>" disabled="disabled" />
                                </span>
                                <?php else: ?>
                                <span class="pad_lft_5 shop_r_cart_quant shop_r_cart_text shop_cart_input">
                                    <input id="qty_<?php echo $i; ?>" class="no_of_product" type="text" onblur="pricePerQty(this)"  value="<?php echo $product_qty_arr[$i]; ?>" />
                                </span>
                                <?php endif; ?>
                            <?php else: ?>
                                <span class="pad_lft_5 shop_r_cart_quant shop_r_cart_text">
                                    <?php echo $product_qty_arr[$i]; ?>
                                </span>
                            <?php endif; ?>
                            st<span class="float_right shop_r_cart_text"> á <?php echo $price_arr[$i]; ?></span>
                    </span> 
                    <span class="right margin_top_8 shop_r_cart_text"><?php echo number_format($mul, 2, ',', ' ') ?>
                        <?php if ($on_last_step != 1): ?>
                            <a id="delete_<?php echo $i; ?>" class="remove_from_cart cursor"><span class="redColor">X</span></a>
                        <?php endif; ?>
                    </span>
                </div>



                <?php $total = $total + ($product_qty_arr[$i] * $price_arr[$i]); ?>
                <?php
                $i++;
            endif;
        endforeach;
        ?>

        <?php $shipping = $add_shipping_flag == 1 ? $total_shipping_cost : 00.00; ?>
        <?php $total_wth_shipping = $total + $shipping; ?>
        <?php $vat = $total_wth_shipping * 6 / 106; ?>
        <?php //$total_wth_vat = $total_wth_shipping + $vat;  
            if(count($products_data)>=1 && $final_totals!=''){
                  $total_final = ($total_wth_shipping - $final_dicount);
                  $vat = $total_final * 6 / 106;
            }else{
                    $total_final = $total_wth_shipping;
            }  ?>

        <div class="info"> 
            <div class="shop_r_cart_price_bg_white">
                <span class="left pad_lft_6 margin_top_8 shop_r_cart_text">Frakt (inom Sverige):</span> 
                <span class="float_right frakt pad_rgt_5 margin_top_8 shop_r_cart_text"><?php echo number_format($shipping, 2, ',', ' ') ?></span>
            </div>

            <div class="shop_r_cart_price_bg float_left">
                <span class="left margin_top_8 pad_lft_6 shop_r_cart_text">Total:</span> <span class="right margin_top_8 shop_r_cart_text"><?php echo number_format($total_wth_shipping, 2, ',', ' ') ?></span> 
            </div>
            <?php if($final_dicount){?>
            <div class="shop_r_cart_price_bg_white" id="final_disc_div">
                <span class="left pad_lft_6 margin_top_8 shop_r_cart_text">Rabatt:</span> <span class="right red_text margin_top_8 shop_r_cart_text"><?php
                if ($final_dicount) {
                    echo number_format($final_dicount, 2, ',', ' ');
                }
        ?></span> 
            </div>
            <?php }?>
            <div class="shop_r_cart_price_bg_white">
                <span class="left pad_lft_6 margin_top_8 shop_r_cart_text">Varav moms:</span> <span class="right margin_top_8 shop_r_cart_text"><?php
                    echo number_format($vat, 2, ',', ' ');
        ?></span> 
            </div>

            
            <div class="shop_r_cart_price_bg_gray">
                <span class="left pad_lft_6 margin_top_8 shop_r_cart_pay">Att betala:</span> <span class="right red_text margin_top_8 shop_r_cart_total"><?php
                echo number_format($total_final, 2, ',', ' ');
        ?></span> 
            </div>
            <div class="blank_2h widthall">&nbsp;</div>
        </div>
        <?php if ($on_last_step != 1): ?>
            
                <!--<div class="info"> <a href="#" class="red_button" style="width:130px;"><span>uppdatera varukorg</span></a> </div>-->
                <div class="info"> 
                    <div class="info"> <a class="empty_cart wh_button float_right"><span>Töm varukorg</span></a> </div>
                    <div class="blank_10h widthall">&nbsp;</div>
                    <a id="check_payment_detail" class="red_button_r"><span>BETALA</span></a> </div>
                <div class="blank_30h widthall">&nbsp;</div>
            <?php else: ?>
                <div class="info"> <div class="blank_12h widthall">&nbsp;</div>
                    <div class="info"> <a href="<?php echo 'https://' . $host_str . '/borst_shop/shopPayment' ?>" class="red_button"><span>REDIGERA KORG</span></a> </div>
                    <div class="blank_90h widthall">&nbsp;</div>
                </div>
                <?php endif; ?>
            
        <?php endif; ?>
        <!--CART ends -->
        
        <!--List-->
        <?php   $prod_ids = array();
        if (count($products_data) > 0):
            foreach ($products_data as $data):
                $prod_ids[] = $data['p_id'];
            endforeach;?>
        <div class="float_left">
     <div> <img  width="100" src="/images/new_home/bt-shop_logo_text.png" class="btshop_logo_text"/></div>
    <div class="blank_5h widthall">&nbsp;</div>

            <?php if (count($metastock_data) > 0): ?>
                <div class="shop_r_side_cat">Metastock</div>
                <div class="shop_r_side_cat_ul">
                    <ul>
                        <?php foreach ($metastock_data as $productMetastock): ?>
                            <li id="<?php echo $productMetastock->id; ?>" class="shop_r_side_prod <?php if(in_array($productMetastock->id, $prod_ids)){echo ' shop_r_side_active';}?>"><a class="cursor<?php if(in_array($productMetastock->id, $prod_ids)){echo ' shop_r_side_active';}?>" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productMetastock->id; ?>"><?php echo $productMetastock->btshop_article_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (count($falcon_computer_data) > 0): ?>
                <div class="shop_r_side_cat">Falcon Computer</div>
                <div class="shop_r_side_cat_ul">
                    <ul>
                        <?php foreach ($falcon_computer_data as $productFalconcomputer): ?>
                            <li class="shop_r_side_prod <?php if(in_array($productFalconcomputer->id, $prod_ids)){echo ' shop_r_side_active';}?>"><a class="cursor<?php if(in_array($productFalconcomputer->id, $prod_ids)){echo ' shop_r_side_active';}?>" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productFalconcomputer->id; ?>"><?php echo $productFalconcomputer->btshop_article_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (count($bocker_data) > 0): ?>
                <div class="shop_r_side_cat">Böcker</div>
                <div class="shop_r_side_cat_ul">
                    <ul>
                        <?php foreach ($bocker_data as $productBocker): ?>
                            <li class="shop_r_side_prod <?php if(in_array($productBocker->id, $prod_ids)){echo ' shop_r_side_active';}?>"><a class="cursor<?php if(in_array($productBocker->id, $prod_ids)){echo ' shop_r_side_active';}?>" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productBocker->id; ?>"><?php echo $productBocker->btshop_article_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (count($utbildningar_data) > 0): ?>
                <div class="shop_r_side_cat">Utbildningar</div>
                <div class="shop_r_side_cat_ul">
                    <ul>
                        <?php foreach ($utbildningar_data as $productUtbildningar): ?>
                            <li class="shop_r_side_prod <?php if(in_array($productUtbildningar->id, $prod_ids)){echo ' shop_r_side_active';}?>"><a class="cursor<?php if(in_array($productUtbildningar->id, $prod_ids)){echo ' shop_r_side_active';}?>" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productUtbildningar->id; ?>"><?php echo $productUtbildningar->btshop_article_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (count($marknadsbrev_data) > 0): ?>
                <div class="shop_r_side_cat">Marknadsbrev</div>
                <div class="shop_r_side_cat_ul">
                    <ul>
                        <?php foreach ($marknadsbrev_data as $productMarknadsbrev): ?>
                            <li class="shop_r_side_prod <?php if(in_array($productMarknadsbrev->id, $prod_ids)){echo ' shop_r_side_active';}?>"><a class="cursor<?php if(in_array($productMarknadsbrev->id, $prod_ids)){echo ' shop_r_side_active';}?>" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productMarknadsbrev->id; ?>"><?php echo $productMarknadsbrev->btshop_article_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (count($abonnemang_data) > 0): ?>
                <div class="shop_r_side_cat">Abonnemang</div>
                <div class="shop_r_side_cat_ul">
                    <ul>
                        <?php foreach ($abonnemang_data as $productAbonnemang): ?>
                            <li class="shop_r_side_prod <?php if(in_array($productAbonnemang->id, $prod_ids)){echo ' shop_r_side_active';}?>"><a class="cursor<?php if(in_array($productAbonnemang->id, $prod_ids)){echo ' shop_r_side_active';}?>" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productAbonnemang->id; ?>"><?php echo $productAbonnemang->btshop_article_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (count($btcart_data) > 0): ?>
                <div class="shop_r_side_cat">BT-Chart</div>
                <div class="shop_r_side_cat_ul">
                    <ul>
                        <?php foreach ($btcart_data as $productBtcart): ?>
                            <li class="shop_r_side_prod <?php if(in_array($productBtcart->id, $prod_ids)){echo ' shop_r_side_active';}?>"><a class="cursor<?php if(in_array($productBtcart->id, $prod_ids)){echo ' shop_r_side_active';}?>" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productBtcart->id; ?>"><?php echo $productBtcart->btshop_article_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (count($xmas_offer_data) > 0): ?>
                <div class="shop_r_side_cat">Xmas Offer</div>
                <div class="shop_r_side_cat_ul">
                    <ul>
                        <?php foreach ($xmas_offer_data as $productXmasoffer): ?>
                            <li class="shop_r_side_prod <?php if(in_array($productXmasoffer->id, $prod_ids)){echo ' shop_r_side_active';}?>"><a class="cursor<?php if(in_array($productXmasoffer->id, $prod_ids)){echo ' shop_r_side_active';}?>" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productXmasoffer->id; ?>"><?php echo $productXmasoffer->btshop_article_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <!--List end-->

        <!--Detail List-->
        <?php if (count($products_data) < 1):?>
            <div class="float_left">

                <?php if (count($metastock_data) > 0 && $product_detail->btshop_type_id == 1): ?>
                
                    <div class="shop_r_other_title"><!--Metastock-->Produkter i samma kategori:</div>
                    <div class="shop_r_other float_left">
                        <ul>
                            <?php foreach ($metastock_data as $productMetastock): 
                                if($productMetastock->id != $productID){?>
                                <li>
                                    <div class="float_left mrg_btm_7"><a class="cursor shop_r_other_subtitle" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productMetastock->id; ?>"><?php echo $productMetastock->btshop_article_title; ?></a></div>
                                    <div class="shop_r_other_img_main">
                                        <div class="shop_r_other_img_sub">
                                            <?php if ($productMetastock->btshop_product_image): ?>
                                                <img src="/uploads/btshopThumbnail/<?php echo $productMetastock->btshop_product_image; ?>" width="105" height="105"/>
                                            <?php else: ?>
                                                <img src="/images/shopphoto.jpg" alt="photo" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="shop_r_other_price_main">
                                            <font class="shop_home_price"> <b><?php echo str_replace(',', ' ', number_format($productMetastock->getLeastPriceOfProduct($productMetastock->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span></div><div class="shop_heading_bg float_left"><a class="red_button cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productMetastock->id; ?>"><span>KÖP</span></a>
                                        </div>
                                    </div>
                                    <div class="shop_r_other_subsection float_left">
                                        <?php echo $productMetastock->btshop_article_subtitle; ?>
                                    </div>
                                    <div class="float_left shop_r_other_bread">
                                        <?php echo $productMetastock->btshop_product_intro_text; ?> <span class="disp_inline"><a class="cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productMetastock->id; ?>">
                                        <div class="shop_r_other_rm">LÄS MER</div></a></span>
                                        
                                    </div>
                                </li>                               
                                <div class="shop_r_other_border">&nbsp;</div>
                                <?php } endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <?php if (count($falcon_computer_data) > 0 && $product_detail->btshop_type_id == 2): ?>
                    <div class="shop_r_other_title"><!--Falcon Computer-->Produkter i samma kategori:</div>
                    <div class="shop_r_other float_left">
                        <ul>
                            <?php foreach ($falcon_computer_data as $productFalconcomputer): 
                                if($productFalconcomputer->id != $productID){?>
                                <li>
                                    <div class="float_left mrg_btm_7"><a class="cursor shop_r_other_subtitle" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productFalconcomputer->id; ?>"><?php echo $productFalconcomputer->btshop_article_title; ?></a></div>
                                    <div class="shop_r_other_img_main">
                                        <div class="shop_r_other_img_sub">
                                            <?php if ($productFalconcomputer->btshop_product_image): ?>
                                                <img src="/uploads/btshopThumbnail/<?php echo $productFalconcomputer->btshop_product_image; ?>" width="105" height="105"/>
                                            <?php else: ?>
                                                <img src="/images/shopphoto.jpg" alt="photo" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="shop_r_other_price_main">
                                            <font class="shop_home_price"> <b><?php echo str_replace(',', ' ', number_format($productFalconcomputer->getLeastPriceOfProduct($productFalconcomputer->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span></div><div class="shop_heading_bg float_left"><a class="cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productFalconcomputer->id; ?>"><span class="red_button cursor">KÖP</span></a>
                                        </div>
                                    </div>
                                    <div class="shop_r_other_subsection float_left">
                                        <?php echo $productFalconcomputer->btshop_article_subtitle; ?>
                                    </div>
                                    <div class="float_left shop_r_other_bread">
                                        <?php echo $productFalconcomputer->btshop_product_intro_text; ?> <span class="disp_inline"><a class="cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productFalconcomputer->id; ?>">
                                        <div class="shop_r_other_rm">LÄS MER</div></a></span>
                                        
                                    </div>
                                </li>
                                <div class="shop_r_other_border">&nbsp;</div>
                                <?php } endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <?php if (count($bocker_data) > 0 && $product_detail->btshop_type_id == 3): ?>
                    <div class="shop_r_other_title"><!--Bocker-->Produkter i samma kategori:</div>
                    <div class="shop_r_other float_left">
                        <ul>
                            <?php foreach ($bocker_data as $productBocker):
                                if($productBocker->id!= $productID){?>
                                <li>
                                    <div class="float_left mrg_btm_7"><a class="cursor shop_r_other_subtitle" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productBocker->id; ?>"><?php echo $productBocker->btshop_article_title; ?></a></div>
                                    <div class="shop_r_other_img_main">
                                        <div class="shop_r_other_img_sub">
                                            <?php if ($productBocker->btshop_product_image): ?>
                                                <img src="/uploads/btshopThumbnail/<?php echo $productBocker->btshop_product_image; ?>" width="105" height="105"/>
                                            <?php else: ?>
                                                <img src="/images/shopphoto.jpg" alt="photo" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="shop_r_other_price_main">
                                            <font class="shop_home_price"> <b><?php echo str_replace(',', ' ', number_format($productBocker->getLeastPriceOfProduct($productBocker->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span></div><div class="shop_heading_bg float_left"><a class="red_button cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productBocker->id; ?>"><span>KÖP</span></a>
                                        </div>
                                    </div>
                                    <div class="shop_r_other_subsection float_left">
                                        <?php echo $productBocker->btshop_article_subtitle; ?>
                                    </div>
                                    <div class="float_left shop_r_other_bread">
                                        <?php echo $productBocker->btshop_product_intro_text; ?> <span class="disp_inline"><a class="cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productBocker->id; ?>">
                                        <div class="shop_r_other_rm">LÄS MER</div></a></span>
                                        
                                    </div>
                                </li>
                                <div class="shop_r_other_border">&nbsp;</div>
                                <?php } endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <?php if (count($utbildningar_data) > 0 && $product_detail->btshop_type_id == 4): ?>
                    <div class="shop_r_other_title"><!--Utbildningar-->Produkter i samma kategori:</div>
                    <div class="shop_r_other float_left">
                        <ul>
                            <?php foreach ($utbildningar_data as $productUtbildningar): 
                                if($productUtbildningar->id != $productID){?>
                                <li>
                                    <div class="float_left mrg_btm_7"><a class="cursor shop_r_other_subtitle" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productUtbildningar->id; ?>"><?php echo $productUtbildningar->btshop_article_title; ?></a></div>
                                    <div class="shop_r_other_img_main">
                                        <div class="shop_r_other_img_sub">
                                            <?php if ($productUtbildningar->btshop_product_image): ?>
                                                <img src="/uploads/btshopThumbnail/<?php echo $productUtbildningar->btshop_product_image; ?>" width="105" height="105"/>
                                            <?php else: ?>
                                                <img src="/images/shopphoto.jpg" alt="photo" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="shop_r_other_price_main">
                                            <font class="shop_home_price"> <b><?php echo str_replace(',', ' ', number_format($productUtbildningar->getLeastPriceOfProduct($productUtbildningar->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span></div><div class="shop_heading_bg float_left"><a class="red_button cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productUtbildningar->id; ?>"><span>KÖP</span></a>
                                        </div>
                                    </div>
                                    <div class="shop_r_other_subsection float_left">
                                        <?php echo $productUtbildningar->btshop_article_subtitle; ?>
                                    </div>
                                    <div class="float_left shop_r_other_bread">
                                        <?php echo $productUtbildningar->btshop_product_intro_text; ?> <span class="disp_inline"><a class="cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productUtbildningar->id; ?>">
                                        <div class="shop_r_other_rm">LÄS MER</div></a></span>
                                        
                                    </div>
                                </li>
                                <div class="shop_r_other_border">&nbsp;</div>
                                <?php } endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <?php if (count($marknadsbrev_data) > 0 && $product_detail->btshop_type_id == 5): ?>
                    <div class="shop_r_other_title"><!--Marknadsbrev-->Produkter i samma kategori:</div>
                    <div class="shop_r_other float_left">
                        <ul>
                            <?php foreach ($marknadsbrev_data as $productMarknadsbrev): 
                                if($productMarknadsbrev->id != $productID){?>
                                <li>
                                    <div class="float_left mrg_btm_7"><a class="cursor shop_r_other_subtitle" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productMarknadsbrev->id; ?>"><?php echo $productMarknadsbrev->btshop_article_title; ?></a></div>
                                    <div class="shop_r_other_img_main">
                                        <div class="shop_r_other_img_sub">
                                            <?php if ($productMarknadsbrev->btshop_product_image): ?>
                                                <img src="/uploads/btshopThumbnail/<?php echo $productMarknadsbrev->btshop_product_image; ?>" width="105" height="105"/>
                                            <?php else: ?>
                                                <img src="/images/shopphoto.jpg" alt="photo" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="shop_r_other_price_main">
                                            <font class="shop_home_price"> <b><?php echo str_replace(',', ' ', number_format($productMarknadsbrev->getLeastPriceOfProduct($productMarknadsbrev->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span></div><div class="shop_heading_bg float_left"><a class="red_button cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productMarknadsbrev->id; ?>"><span>KÖP</span></a>
                                        </div>
                                    </div>
                                    <div class="shop_r_other_subsection float_left">
                                        <?php echo $productMarknadsbrev->btshop_article_subtitle; ?>
                                    </div>
                                    <div class="float_left shop_r_other_bread">
                                        <?php echo $productMarknadsbrev->btshop_product_intro_text; ?> <span class="disp_inline"><a class="cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productMarknadsbrev->id; ?>">
                                        <div class="shop_r_other_rm">LÄS MER</div></a></span>
                                        
                                    </div>
                                </li>
                                <div class="shop_r_other_border">&nbsp;</div>
                                <?php } endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if (count($abonnemang_data) > 0 && $product_detail->btshop_type_id == 6): ?>
                    <div class="shop_r_other_title"><!--Abonnemang-->Produkter i samma kategori:</div>
                    <div class="shop_r_other float_left">
                   
                        <ul>
                            <?php foreach ($abonnemang_data as $productAbonnemang): 
                                if($productAbonnemang->id != $productID) {?>
                                <li>
                                    <div class="float_left mrg_btm_7"><a class="cursor shop_r_other_subtitle" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productAbonnemang->id; ?>"><?php echo $productAbonnemang->btshop_article_title; ?></a></div>
                                    <div class="shop_r_other_img_main">
                                        <div class="shop_r_other_img_sub">
                                            <?php if ($productAbonnemang->btshop_product_image): ?>
                                                <img src="/uploads/btshopThumbnail/<?php echo $productAbonnemang->btshop_product_image; ?>" width="105" height="105"/>
                                            <?php else: ?>
                                                <img src="/images/shopphoto.jpg" alt="photo" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="shop_r_other_price_main">
                                            <font class="shop_home_price"> <b><?php echo str_replace(',', ' ', number_format($productAbonnemang->getLeastPriceOfProduct($productAbonnemang->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span></div><div class="shop_heading_bg float_left"><a class="red_button cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productAbonnemang->id; ?>"><span>KÖP</span></a>
                                        </div>
                                    </div>
                                    <div class="shop_r_other_subsection float_left">
                                        <?php echo $productAbonnemang->btshop_article_subtitle; ?>
                                    </div>
                                    <div class="float_left shop_r_other_bread">
                                        <?php echo $productAbonnemang->btshop_product_intro_text; ?> <span class="disp_inline"><a class="cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productAbonnemang->id; ?>">
                                        <div class="shop_r_other_rm">LÄS MER</div></a></span>
                                       
                                    </div>
                                </li>
                                <div class="shop_r_other_border">&nbsp;</div>
                                <?php } endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if (count($btcart_data) > 0 && $product_detail->btshop_type_id == 7): ?>
                    <div class="shop_r_other_title"><!--Btchart-->Produkter i samma kategori:</div>
                    <div class="shop_r_other float_left">
                        <ul>
                            <?php foreach ($btcart_data as $productBtcart): 
                                if($productBtcart->id != $productID){?>
                                <li>
                                    <div class="float_left mrg_btm_7"><a class="cursor shop_r_other_subtitle" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productBtcart->id; ?>"><?php echo $productBtcart->btshop_article_title; ?></a></div>
                                    <div class="shop_r_other_img_main">
                                        <div class="shop_r_other_img_sub">
                                            <?php if ($productBtcart->btshop_product_image): ?>
                                                <img src="/uploads/btshopThumbnail/<?php echo $productBtcart->btshop_product_image; ?>" width="105" height="105"/>
                                            <?php else: ?>
                                                <img src="/images/shopphoto.jpg" alt="photo" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="shop_r_other_price_main">
                                            <font class="shop_home_price"> <b><?php echo str_replace(',', ' ', number_format($productBtcart->getLeastPriceOfProduct($productBtcart->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span></div><div class="shop_heading_bg float_left"><a class="red_button cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productBtcart->id; ?>"><span>KÖP</span></a>
                                        </div>
                                    </div>
                                    <div class="shop_r_other_subsection float_left">
                                        <?php echo $productBtcart->btshop_article_subtitle; ?>
                                    </div>
                                    <div class="float_left shop_r_other_bread">
                                        <?php echo $productBtcart->btshop_product_intro_text; ?> <span class="disp_inline"><a class="cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productBtcart->id; ?>">
                                        <div class="shop_r_other_rm">Läs mer...</div></a></span>
                                        
                                    </div>
                                </li>
                                <div class="shop_r_other_border">&nbsp;</div>
                                <?php } endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <?php if (count($xmas_offer_data) > 0): ?>
                    <div class="shop_r_other_title"><!--Xmas Offer-->Produkter i samma kategori:</div>
                    <div class="shop_r_other float_left">
                        <ul>
                            <?php foreach ($xmas_offer_data as $productXmasoffer):
                                if($productXmasoffer->id != $productID) {?>
                                <li>
                                    <div class="float_left mrg_btm_7"><a class="cursor shop_r_other_subtitle" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productXmasoffer->id; ?>"><?php echo $productXmasoffer->btshop_article_title; ?></a></div>
                                    <div class="shop_r_other_img_main">
                                        <div class="shop_r_other_img_sub">
                                            <?php if ($productXmasoffer->btshop_product_image): ?>
                                                <img src="/uploads/btshopThumbnail/<?php echo $productXmasoffer->btshop_product_image; ?>" width="105" height="105"/>
                                            <?php else: ?>
                                                <img src="/images/shopphoto.jpg" alt="photo" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="shop_r_other_price_main">
                                            <font class="shop_home_price"> <b><?php echo str_replace(',', ' ', number_format($productXmasoffer->getLeastPriceOfProduct($productXmasoffer->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span></div><div class="shop_heading_bg float_left"><a class="red_button cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productXmasoffer->id; ?>"><span>KÖP</span></a>
                                        </div>
                                    </div>
                                    <div class="shop_r_other_subsection float_left">
                                        <?php echo $productXmasoffer->btshop_article_subtitle; ?>
                                    </div>
                                    <div class="float_left shop_r_other_bread">
                                        <?php echo $productXmasoffer->btshop_product_intro_text; ?> <span class="disp_inline"><a class="cursor" href="<?php echo 'https://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productXmasoffer->id; ?>">
                                        <div class="shop_r_other_rm">LÄS MER</div></a></span>
                                        
                                    </div>
                                </li>
                                <div class="shop_r_other_border">&nbsp;</div>
                                <?php } endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
<!--Detail List end-->