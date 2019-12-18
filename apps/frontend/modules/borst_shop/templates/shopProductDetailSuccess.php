<script type="text/javascript" language="javascript">
    $(document).ready(function () {
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

        //$(".rightbanner").css({"height": maxHeight + "px"});
        $(".btshopleftdiv").css({"min-height": maxHeight + "px"});
        $('.btshopleftdiv').jqTransform();
    });
</script>
<?php if ($valid_user): ?>
    <div class="maincontentpage maincontentpageshop">
        <div class="inner-page-contetn-left margin-bottom-10m">
            <!--<div class="photoimg"><img alt="photo" src="/images/new_home/btshop.gif"></div>-->
            <div class="breadcrumb">
                <ul>
                    <li><?php
include_component('isicsBreadcrumbs', 'show', array(
    'root' => array('text' => 'BÖRSTJÄNAREN', 'uri' => 'borst/borstHome'),
))
?> </li>
                </ul>
            </div>
            <div class="btshopleftdiv ptop_10" >
                <div class="btshopleftdivinner">

                    <?php if ($product_detail): ?>
                        <div class="float_left"><input type="hidden" name="product_id" id="product_id" value="<?php echo $product_detail->id; ?>"/></div>
                        <div><div class="shop_detail_title"><?php echo $product_detail->getShopArticleTypeName($product_detail->btshop_type_id); ?></div> <div class="heading_shop-small shop_detail_subtitle"><?php echo ' ' . $product_detail->btshop_article_title ?></div></div>



                        <div class="ingress shop_detail_preamble"><div><?php echo html_entity_decode($product_detail->btshop_product_intro_text); ?>&nbsp;<span class="disp_inline"><a class="main_link_color cursor shop_detail_rm" id="bt_shop_readmore">Läs mer</a>&nbsp;<img  width="14" class="icontop3" id="bt_shop_plus" alt="addplus" src="/images/new_home/addplusicon_shop.png"></span></div>
                        <!--<span class="main_link_color"> <b>Läs mer.</b> <img id="reg_help_plus" class="icontop3" alt="addplus" src="/images/addplusicon.png"></span>-->
                        </div>

                        <div class="spacer"></div>


                        <div id="BT_Shop_more_section" class="blog_rights">
                            <div class="float_left width_500 talign_left ptop_4">
                                <?php if ($product_detail->btshop_product_image): ?>
                                    <img src="/uploads/btshopThumbnail/<?php echo $product_detail->btshop_product_image; ?>" class="shop_detail_thumbnail" />
                                <?php else: ?>
                                    <img src="/images/shopphoto.jpg" alt="photo" />
                                <?php endif;?>
                            </div>

                            <div class="shop_detail_subtitle2"><?php echo $product_detail->btshop_article_subtitle; ?></div>
                            <?php echo html_entity_decode($product_detail->btshop_product_description); ?>

                            <?php if ($cart_in_cart && !$logged_user): ?>
                                <div class="redcolor"> Du måste vara inloggad för att köpa detta abonnemang! </div>
                            <?php endif;?>
                            <div class="blank_15h widthall">&nbsp;</div>
                        </div>

                        <?php if ($product_detail->is_sellable): ?>


                            <div class="blank_20h widthall">&nbsp;</div>

                            <div class="shop_detail_order float_l_width_42">Beställning</div>
                           <img class="BTshop_product_logo" src="/images/new_home/bt-shop_logo_cart.png" alt="basket3" border="0" class="floatLeft" />

                            <div class="shop_detail_line">&nbsp;</div>
                            <?php if ($product_detail->btshop_type_id > 4): ?>
                                <div class="shop_detail_choose pbottom_7 floatLeft">Abonnemang</div>
                            <?php endif;?>
                            <ul class="rows">
                                <?php $i = 0;
foreach ($price_data as $data):
?>
                                                                        <li><div class="shop_detail_price_main"><div class="floatLeft shop_detail_price"><input id="<?php echo $data->id; ?>" type="radio" class="radio" value="<?php echo $data->btshop_product_price; ?>" <?php if ($i == 0) {
    echo 'checked="checked"';
}
?> name="product_price"><?php echo $data->btshop_product_quantity . ' ' . $unit_arr[$data->btshop_price_unit_id] . ' ' . str_replace(',', ' ', number_format($data->btshop_product_price)) ?></div><div class="floatLeft shop_detail_kr">KR</div></div><div class="floatLeft shop_detail_pricetext"><?php echo $data->btshop_product_text; ?></div></li>
                                                                        <?php $i++;
endforeach;
?>
                            </ul>
                            <div class="blank_12h widthall">&nbsp;</div>

                            <div class="info" id="buy_or_add">

                                <a id="to_payment" class="red_button cursor"><span>KÖP</span></a>

                                <div class="blank_6h widthall">&nbsp;</div>
                                <?php 
                                if($product_in_cart == 0){
                                ?>
                                <a id="add" class="red_button cursor"><span>LÄGG I VARUKORG</span></a>
                                <?php }?>
                            </div>
                            <div class="spacer"></div>
                            <div class="spacer"></div>

                        <?php endif;?>
                        <?php if ($isAdmin): ?>
                            <div class="float_left width_550 edit_this height_16"><a class="float_left width_550 main_link_color height_16" href=<?php echo "https://" . $_SERVER['HTTP_HOST'] . "/backend.php/borst/createShopArticle/edit_shop_article_id/" . $pid; ?>>Editera denna artikel</a></div>
                        <?php endif?>

                        <div class="spacer"></div>
                        <div class="spacer"></div>
                        <div class="spacer"></div>
                        <div class="spacer"></div>
                        <div class="spacer"></div>
    <?php endif;?>
                </div>

            </div>
            <div class="<?php if (count($products_data)) {?>mrg_top_49<?php } else {?>mrg_top_76<?php }?> float_left mrg_left_testimonial margin_testimonial">
                <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
            </div>
        </div>
        <div class="rightbanner" id="shop_rightbanner" >
    <?php include_partial('borst_shop/get_cart_data_partial', array('final_vat' => $final_vat, 'final_totals' => $final_totals, 'final_dicount' => $final_dicount, 'host_str' => $host_str, 'products_data' => $products_data, 'price_arr' => $price_arr, 'product_qty_arr' => $product_qty_arr, 'price_detail_id_arr' => $price_detail_id_arr, 'product_article' => $product_article, 'add_shipping_flag' => $add_shipping_flag, 'total_shipping_cost' => $total_shipping_cost, 'logged_user' => $logged_user, 'payment_user_info' => $payment_user_info, 'product_detail' => $product_detail, 'metastock_data' => $metastock_data, 'falcon_computer_data' => $falcon_computer_data, 'bocker_data' => $bocker_data, 'utbildningar_data' => $utbildningar_data, 'marknadsbrev_data' => $marknadsbrev_data, 'abonnemang_data' => $abonnemang_data, 'btcart_data' => $btcart_data, 'xmas_offer_data' => $xmas_offer_data, 'productID' => $productID))?>
        </div>
    </div>
<?php else: ?>
    <div class="in_date">&nbsp;</div>
    <div class="photoimg">&nbsp;</div>
    <br />
    <br />
    <div class="shoph3 widthall mtop_30"><?php echo __('Artikeln finns inte.') ?></div>
    <div class="float_left widthall mbottom_10">
        <div class="float_left widthall mtop_25 mbottom_12">&nbsp;</div>
    </div>
<?php endif;?>
