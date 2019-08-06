<!--CART starts --> 
        <!--List-->
        <?php  $prod_ids = array();
            $cookie_pid = $_COOKIE['cart_items_cookie_pid'];
            $saved_cart_items_pid = explode(',',$cookie_pid);
            if (count($saved_cart_items_pid) > 0):
                foreach ($saved_cart_items_pid as $data):
                    $prod_ids[] = $data;
                endforeach;
            endif; ?>
       <div class="float_left">
     <div> <img  width="165" src="/images/new_home/bt-shop_logo_text2.png" style="margin-top:-8px"/></div>
    <div class="blank_25h widthall">&nbsp;</div>

            <?php if (count($metastock_data) > 0): ?>
                <div class="shop_r_side_cat">Metastock</div>
                <div class="shop_r_side_cat_ul">
                    <ul>
                        <?php foreach ($metastock_data as $productMetastock): ?>
                            <li id="<?php echo $productMetastock->id; ?>" class="shop_r_side_prod <?php if(in_array($productMetastock->id, $prod_ids)){echo ' shop_r_side_active';}?>"><a class="cursor<?php if(in_array($productMetastock->id, $prod_ids)){echo ' shop_r_side_active';}?>" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productMetastock->id; ?>"><?php echo $productMetastock->btshop_article_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (count($falcon_computer_data) > 0): ?>
                <div class="shop_r_side_cat">Falcon Computer</div>
                <div class="shop_r_side_cat_ul">
                    <ul>
                        <?php foreach ($falcon_computer_data as $productFalconcomputer): ?>
                            <li id="<?php echo $productFalconcomputer->id; ?>" class="shop_r_side_prod <?php if(in_array($productFalconcomputer->id, $prod_ids)){echo ' shop_r_side_active';}?>"><a class="cursor<?php if(in_array($productFalconcomputer->id, $prod_ids)){echo ' shop_r_side_active';}?>" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productFalconcomputer->id; ?>"><?php echo $productFalconcomputer->btshop_article_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (count($bocker_data) > 0): ?>
                <div class="shop_r_side_cat">Böcker</div>
                <div class="shop_r_side_cat_ul">
                    <ul>
                        <?php foreach ($bocker_data as $productBocker): ?>
                            <li id="<?php echo $productBocker->id; ?>" class="shop_r_side_prod <?php if(in_array($productBocker->id, $prod_ids)){echo ' shop_r_side_active';}?>"><a class="cursor<?php if(in_array($productBocker->id, $prod_ids)){echo ' shop_r_side_active';}?>" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productBocker->id; ?>"><?php echo $productBocker->btshop_article_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (count($utbildningar_data) > 0): ?>
                <div class="shop_r_side_cat">Utbildningar</div>
                <div class="shop_r_side_cat_ul">
                    <ul>
                        <?php foreach ($utbildningar_data as $productUtbildningar): ?>
                            <li id="<?php echo $productUtbildningar->id; ?>" class="shop_r_side_prod <?php if(in_array($productUtbildningar->id, $prod_ids)){echo ' shop_r_side_active';}?>"><a class="cursor<?php if(in_array($productUtbildningar->id, $prod_ids)){echo ' shop_r_side_active';}?>" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productUtbildningar->id; ?>"><?php echo $productUtbildningar->btshop_article_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (count($marknadsbrev_data) > 0): ?>
                <div class="shop_r_side_cat">Marknadsbrev</div>
                <div class="shop_r_side_cat_ul">
                    <ul>
                        <?php foreach ($marknadsbrev_data as $productMarknadsbrev): ?>
                            <li id="<?php echo $productMarknadsbrev->id; ?>" class="shop_r_side_prod <?php if(in_array($productMarknadsbrev->id, $prod_ids)){echo ' shop_r_side_active';}?>"><a class="cursor<?php if(in_array($productMarknadsbrev->id, $prod_ids)){echo ' shop_r_side_active';}?>" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productMarknadsbrev->id; ?>"><?php echo $productMarknadsbrev->btshop_article_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (count($abonnemang_data) > 0): ?>
                <div class="shop_r_side_cat">Abonnemang</div>
                <div class="shop_r_side_cat_ul">
                    <ul>
                        <?php foreach ($abonnemang_data as $productAbonnemang): ?>
                            <li id="<?php echo $productAbonnemang->id; ?>" class="shop_r_side_prod <?php if(in_array($productAbonnemang->id, $prod_ids)){echo ' shop_r_side_active';}?>"><a class="cursor<?php if(in_array($productAbonnemang->id, $prod_ids)){echo ' shop_r_side_active';}?>" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productAbonnemang->id; ?>"><?php echo $productAbonnemang->btshop_article_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (count($btcart_data) > 0): ?>
                <div class="shop_r_side_cat">BT-Chart</div>
                <div class="shop_r_side_cat_ul">
                    <ul>
                        <?php foreach ($btcart_data as $productBtcart): ?>
                            <li id="<?php echo $productBtcart->id; ?>" class="shop_r_side_prod <?php if(in_array($productBtcart->id, $prod_ids)){echo ' shop_r_side_active';}?>"><a class="cursor<?php if(in_array($productBtcart->id, $prod_ids)){echo ' shop_r_side_active';}?>" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productBtcart->id; ?>"><?php echo $productBtcart->btshop_article_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (count($xmas_offer_data) > 0): ?>
                <div class="shop_r_side_cat">Xmas Offereeee</div>
                <div class="shop_r_side_cat_ul">
                    <ul>
                        <?php foreach ($xmas_offer_data as $productXmasoffer): ?>
                            <li id="<?php echo $productXmasoffer->id; ?>" class="shop_r_side_prod <?php if(in_array($productXmasoffer->id, $prod_ids)){echo ' shop_r_side_active';}?>"><a class="cursor<?php if(in_array($productXmasoffer->id, $prod_ids)){echo ' shop_r_side_active';}?>" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $productXmasoffer->id; ?>"><?php echo $productXmasoffer->btshop_article_title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <!--List end-->
