<!--CART starts --> 
<?php $type_arr = array(5, 6, 7); ?>
<?php $total = $total_wth_shipping = $total_wth_vat = $vat = 0;$product_qty_arr = 1; ?>
<?php if (count($products_data) > 0): ?>
    <div class="cart pbottom_10">
        <div class="shop_r_cart_title float_left">I varukorgen:</div>
        <!--<div class="float_right mrg_top_15"><img class="shop_r_cart_img_top" src="/images/new_home/bt-shop_logo_left_wt.png"/></div>-->
        <div class="float_right width_100_per"><span class="float_right shop_r_cart_count">Antal artiklar: <strong>1</strong><?php  $mul = number_format($products_data->price); ?></span></div>
        <?php $i = 0; ?>
        <div class="info"></div>
        <div class="info"> 
            <div class="float_left widthall">
                <div class="shop_r_cart_cat_bg <?php if($i == 0) { echo 'mrg_top_3';} else { echo 'mrg_top_bt-shop_r_cart';} ?>">
                    <span class="shop_r_cart_cat"><?php //echo $product_article->getShopArticleTypeName($data['p_type']) ?></span>
                </div>
                <br />
                <div class="shop_r_cart_prod_img"><img src="/uploads/articleIngressImages/<?php echo str_replace('.', '_semimid.', $products_data->image); ?>" width="60" height="60" /></div><div class="shop_r_cart_prod"> <?php echo $products_data->title;?></div>
                <br />
            </div>
        </div>
        <div class="blank_1h widthall">&nbsp;</div>
        <div class="info shop_r_cart_price_bg margin_top_5"> 
                <span class="left margin_top_8 pad_lft_6 shop_r_cart_text"><span>Antal:</span>
                    <?php $mul = 1 * $products_data->price; ?>                        
                    <?php if ($on_last_step != 1): ?>
                        <?php echo $product_qty_arr; ?>
                    <?php endif; ?>
                st<span class="float_right shop_r_cart_text"> á <?php echo $products_data->price; ?></span>
                </span>                
                <span class="right margin_top_8 shop_r_cart_text"><?php echo number_format($mul, 2 , ",", " ") ?></span>
        </div>
        <?php $total = $total + ($product_qty_arr * $products_data->price); ?>
        <?php  $i++;?>
        
        <?php $shipping = $add_shipping_flag == 1 ? $total_shipping_cost : 00.00; ?>
        <?php $total_wth_shipping = $total + $shipping; ?>
        <?php $vat = $total_wth_shipping * 6 / 106; ?>

        <div class="info"> 
            <div class="shop_r_cart_price_bg_white">
                <span class="left pad_lft_6 margin_top_8 shop_r_cart_text">Frakt (inom Sverige:)</span> 
                <span class="float_right frakt pad_rgt_5 margin_top_8 shop_r_cart_text"><?php echo number_format($shipping, 2, ",", " ") ?></span>
            </div>

            <div class="shop_r_cart_price_bg float_left">
                <span class="left margin_top_8 pad_lft_6 shop_r_cart_text">Total:</span> <span class="right margin_top_8 shop_r_cart_text"><?php echo number_format($total_wth_shipping, 2, ",", " ") ?></span> 
            </div>
            <div class="shop_r_cart_price_bg_white">
                <span class="left pad_lft_6 margin_top_8 shop_r_cart_text">Varav moms:</span> <span class="right margin_top_8 shop_r_cart_text"><?php echo number_format($vat, 2, ",", " "); ?></span> 
            </div>
            <div class="shop_r_cart_price_bg_gray">
                <span class="left pad_lft_6 margin_top_8 shop_r_cart_pay">Att betala:</span> <span class="right red_text margin_top_8 shop_r_cart_total"><?php echo number_format($total_wth_shipping, 2, ",", " ");?></span>
            </div>
            <div class="blank_5h widthall">&nbsp;</div>
        </div>
        <?php if ($on_last_step != 1): ?>
            <div class="info">
                <!--<div class="info"> <a href="#" class="red_button" style="width:130px;"><span>uppdatera varukorg</span></a> </div>-->
                <div class="info"> 
                    <div class="info"> <a class="empty_cart_article grey_button float_right"><span>TÖM VARUKORG</span></a> </div>
                    <div class="blank_4h widthall">&nbsp;</div>
                    <a href="<?php echo 'http://' . $host_str . '/borst_shop/shopArticlePayment' ?>" class="red_button_r"><span>BETALA</span></a> </div>
                <div class="blank_50h widthall">&nbsp;</div>
            <?php else: ?>
                <div class="info"> <div class="blank_18h widthall">&nbsp;</div>
                    <div class="info"> <a href="<?php echo 'http://' . $host_str . '/borst_shop/shopArticlePayment' ?>" class="red_button"><span>REDIGERA KORG</span></a> </div>
                    <div class="blank_150h widthall">&nbsp;</div>
            <?php endif; ?>
                </div>
            </div>
<?php endif; ?>
    <!--CART ends -->
<!--Detail List-->
<?php if (count($plus_article_product_detail) >= 1):?>
    <div class="float_left">
            <div class="shop_r_other_title"><!--Metastock-->Plus Articles</div>
            <div class="shop_r_other float_left">
                <ul>
                    <?php foreach ($plus_article_product_detail as $plus_article_data):
                        if($plus_article_data->article_id != $pid){ ?>
                        <li>
                            <div class="float_left mrg_btm_7"><a class="cursor shop_r_other_subtitle" href="<?php echo 'http://' . $host_str . '/borst_shop/shopArticleDetail/product_id/' . $plus_article_data->article_id; ?>"><?php echo $plus_article_data->title; ?></a></div>
                            <div class="shop_r_other_img_main">
                                <div class="shop_r_other_img_sub">
                                    <?php if ($plus_article_data->image): ?>
                                        <img src="/uploads/btshopThumbnail/<?php echo $plus_article_data->image; ?>" width="105" height="105"/>
                                    <?php else: ?>
                                        <img src="/images/shopphoto.jpg" alt="photo" />
                                    <?php endif; ?>
                                </div>
                                <div class="shop_r_other_price_main">
                                    <font class="shop_home_price"> <b><?php echo $plus_article_data->price ?></b></font>&nbsp;<span class="shop_home_kr">KR</span></div><div class="shop_heading_bg float_left"><a class="red_button cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopArticleDetail/product_id/' . $plus_article_data->article_id; ?>"><span class="shop_heading">KÖP</span></a>
                                </div>
                            </div>
                            <div class="shop_r_other_subsection float_left">
                                <?php echo substr(html_entity_decode($plus_article_data->image_text), 0, 100).' ...'; ?>
                            </div>
                            <!--<div class="float_left shop_r_other_bread">
                                <?php //echo html_entity_decode($plus_article_data->text); ?> <span class="disp_inline"><a class="cursor" href="<?php //echo 'http://' . $host_str . '/borst_shop/shopArticleDetail/product_id/' . $plus_article_data->article_id; ?>"><div class="shop_r_other_rm">Läs mer...&nbsp;</div></a></span>

                            </div>-->
                        </li>
                        <div class="shop_r_other_border">&nbsp;</div>
                        <?php } endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
