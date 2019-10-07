<script type="text/javascript" language="javascript">
    $(window).load(function () {
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
        $(".btshopleftdiv").css({"min-height": maxHeight + "px"});
        var leftDiv = $('.inner-page-contetn-left').height();
        var rightDiv = $('.rightbanner').height();
        if(rightDiv > leftDiv){
            $('.rightbanner').css('border-left','1px solid #d3d3d3');
        }else{
            $('.inner-page-contetn-left').css('border-right','1px solid #d3d3d3');
        }
    });
</script>
<div class="maincontentpage  margin-top-15m">
    <div class="inner-page-contetn-left margin-bottom-10m" >
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
            <div class="floatRightNew"></div>
        </div>

        <div class="btshopleftdiv ptop_10">
            <div class="btshopleftdivinner">
                <?php //include_partial('borst_shop/payment_steps_partial', array('step' => 3, 'designType' => 2)) ?>
                <div class="cart_payment_steps">
                    <div class="bt-shop-step-top-margin widthall float_left">&nbsp;</div>
                    <?php include_partial('borst_shop/payment_steps_partial', array('step' => 3, 'designType' => 2)) ?>
                    <div class="bt-shop-step-bottom-margin widthall float_left">&nbsp;</div>
                </div>
                <div class="shop_detail_title">3. Tack för din beställning!</div>
                <div class="spacer"></div>

                <div class="float_left widthall">
                    <?php if ($purchase_id): ?>
                        <span class="success_msg float_left"><?php echo __('Transaktionen har genomförts framgångsrikt') ?></span><br />
                        <div class="float_left widthall"><?php echo __('En bekräftelse på ditt köp har skickats till') ?>: <?php echo $purchase_rec->email; ?></div>
                    <?php endif; ?>
                </div>

                <div class="spacer"></div>
                <div class="my_order_text">Din beställning:</div>
                <div class="spacer"></div>

                <?php if ($item_list): ?>
                    <?php
                    $total = 0;
                    $str = '';
                    $i = 0;
                    foreach ($item_list as $data):
                        ?>
                        <?php if ($i == 0): ?><?php
                            $shipping = $data->shipping;
                            $vat = $data->vat;
                            ?><?php endif; ?>
                        <?php
                        if ($is_Article) {
                            $art_data = $product_article->getPerticularArticle($data->product_id);
                        } else {
                            $art_data = $product_article->getShopArticleSpecificDetails($data->product_id);
                        }
                        ?>
                        <?php $mul = $data->quantity * $data->total_price; ?>
                        <?php
                        if (!$is_Article) {
                            if ($art_data[0]['p_type'] == 6):
                                ?>
                                <?php if ($i == 0): ?>
                                    <?php $str = $str . $art_data[0]['p_title']; ?>
                                <?php else: ?>
                                    <?php $str = $str . ',' . $art_data[0]['p_title']; ?>
                                <?php endif; ?>   
                            <?php endif; ?>
                        <?php } ?>

                        <div class="my_order_rec_row">
                            <div class="my_order_sub_row">
                                <strong><?php
                if (!$is_Article) {
                    echo $product_article->getShopArticleTypeName($art_data[0]['p_type']);
                }
                        ?>:</strong>
                                <?php
                                if (!$is_Article) {
                                    echo $art_data[0]['p_title'];
                                } else {
                                    echo $art_data->title;
                                }
                                ?>
                            </div>
                            <div class="my_order_sub_row">
                                <div class="float_left">
                                    <strong>Antal: </strong><?php echo $data->quantity; ?> st á <?php echo $data->price_per_unit; ?>
                                </div>
                                <div class="float_right">
                                    <?php echo number_format($mul, 2, ",", " ") ?>
                                </div>
                            </div>
                        </div>
                        <?php $total = $total + $mul; ?>
                        <?php
                        $i++;
                    endforeach;
                    ?>

                    <?php $final_total = 0; ?>
                    <?php $total_wth_shipping = $total + $shipping; ?>
                    <?php //$final_total = $total_wth_shipping + $vat;    ?>

                    <div class="my_order_rec_row">
                        <div class="my_order_sub_row">
                            <div class="float_left"><strong>Frakt:</strong></div>
                            <div class="float_right frakt"><?php echo number_format($shipping, 2, ",", " ") ?></div>
                        </div>
                        <div class="my_order_sub_row">
                            <div class="float_left"><strong>Total:</strong></div>
                            <div class="float_right"><?php echo number_format($total_wth_shipping, 2, ",", " ") ?></div>
                        </div>
                        <div class="my_order_sub_row">
                            <div class="float_left">Varav moms:</div>
                            <div class="float_right"><?php echo number_format($vat, 2, ",", " ") ?></div>
                        </div>
                        <div class="my_order_sub_row">
                            <div class="float_left red_text"><strong>Att betala SEK:</strong></div>
                            <div class="float_right red_text"><?php echo number_format($total_wth_shipping, 2, ",", " ") ?></div>
                        </div>
                    </div>

                    <?php if (strlen($str) > 1): ?>
                        <div class="float_left widthall"><?php echo __('Ditt köp av ' . $str . ' är godkänt') ?>.</div>
                        <div class="float_left widthall"><?php echo __('Nästa utgåva av ' . $str . ' kommer inom kort att skickats till') ?>: <?php echo $purchase_rec->email; ?></div>
                    <?php endif; ?>

                    <div class="my_order_rec_row">
                        <div class="spacer"></div>
                        <?php if ($purchase_id): ?>
                            <?php /* ?><a id="e_bill" class="save_mail_bill" name="<?php echo $purchase_id ?>">E-faktura</a> / <a id="save_bill" class="save_mail_bill" name="<?php echo $purchase_id ?>">faktura på din beställning</a><?php */ ?>
                                        <!--<a id="print_receipt" class="save_mail_bill" name="<?php //echo $purchase_id     ?>"><?php //echo __('Skriv ut kvitto')    ?></a> /--> 
                            <?php if ($is_Article) { ?>
                                <a id="save_receipt_article" class="save_mail_bill"name="<?php echo $purchase_id ?>"><?php echo __('Kvitto på din beställning') ?></a>
                            <?php } else { ?>
                                <a id="save_receipt" class="save_mail_bill" name="<?php echo $purchase_id ?>"><?php echo __('Kvitto på din beställning') ?></a>
                            <?php } ?>
                        <?php endif; ?>
                    </div>
                    <div id="pdf_send_report"></div>
                <?php endif; ?>


            </div>       
        </div>
        <div class="mrg_top_49 floatLeft mrg_lft_60 margin_testimonial">
            <span><img src="/images/new_home/testimonial_L.png" width="500"/></span>
        </div>
    </div>
    <div class="rightbanner padding_0 font_0 margin_top_ann" id="shop_rightbanner">
        <div class="home_ad_r float_left font_size_12 ">Annons</div>
        <?php include_partial('global/ad_message') ?>
        <div id="whitepage_ads">
            <?php include_partial('global/right_ads_column', array('ad_1' => $ad_1, 'ad_2' => $ad_2, 'ad_3' => $ad_3, 'ad_4' => $ad_4, 'set_margin' => '1')) ?>
        </div>
    </div>
</div>
<div id="p_container" class="display-none">
    <?php
    if ($is_Article) {
        include_partial('global/receipt_article', array('host_str' => $host_str, 'item_list' => $item_list, 'product_article' => $product_article, 'purchase_rec' => $purchase_rec, 'profile' => $profile, 'subscription' => $subscription));
    } else {
        include_partial('global/receipt', array('host_str' => $host_str, 'item_list' => $item_list, 'product_article' => $product_article, 'purchase_rec' => $purchase_rec, 'profile' => $profile, 'subscription' => $subscription));
    }
    ?>
</div>
