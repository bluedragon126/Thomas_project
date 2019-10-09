<script language="javascript" type="text/javascript">
    $(window).load(function(){
        var url = window.location.href;
        $("#bt_shop_home a").addClass("yellowcolor");
        if(url.indexOf("#") > 0){
            $("#bt_shop_home a").removeClass("active");
            var surl1 = url.split("#");
            surl1 = surl1.reverse();
            if(surl1[0].indexOf("_") > 0 ){
                surl1 = surl1[0].split("_");
                $("#bt_shop_"+surl1[0]+ " a").addClass("active");
            }
        }else{
            $("#bt_shop_home a").addClass("active");
        }
    
        var checkRight = $(".rightbanner").height();
        var checkLeft = $(".inner-page-contetn-left").height();
  
        if(checkLeft > checkRight)
        {
            $(".rightbanner").css({"height":checkLeft+"px"});
        } 
        else
        {
            $(".inner-page-contetn-left").css({"height":checkRight+"px"});
        }

    });

</script>

<div class="maincontentpage">
    <div class="inner-page-contetn-left margin-bottom-10m">
        <!--<div class="photoimg"><img alt="photo" src="/images/new_home/btshop.gif"></div>-->
        <div class="breadcrumb">
            <ul>
                <li>
                    <?php
                    include_component('isicsBreadcrumbs', 'show', array(
                        'root' => array('text' => 'Börstjänaren', 'uri' => 'borst/borstHome')
                    ))
                    ?> 
                </li>
            </ul>
        </div>
        <div class="">

            <div class="shop_home_heading">Välkommen till BT-shop! <img alt="BT-SHOP" src="/images/new_home/bt-shop_logo_left.png" /></div>
            <div class="blank_20h widthall"></div>
           
            <div class="shopblock">
                <div id="abonnemang_title" class="shop_home_cat_bg">
                    <span class="shop_home_cat">Abonnemang</span>
                    <div class="title_link">    
                    <a href="javascript:void(0);" onclick='gotoDiv("http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome#utbildningar_title");'>
                        <div style = "display:flex">
                            <h2></h2>                            
                            <p class="link_text"> &nbsp; Utbildningar</p>
                        </div>
                    </a>                    
                    <a href="javascript:void(0);" onclick='gotoDiv("http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome#metastock_title");'>
                        <div style = "display:flex">
                            <h2></h2>                            
                            <p class="link_text"> &nbsp; Metastock</p>
                        </div>
                    </a>    
                    </div>
                    <!--<a href="http://https://www.thetradingaspirants.com/borst_shopborstShopHome#btcart_title"><img alt="upp1" src="/images/upp1.png" /></a>-->
                </div>

                <?php
                $stock_counter = count($abonnemang_data);
                $top_mar_12px = "";
                $div_count = floor($stock_counter / 2);
                if ($stock_counter % 2 == 1) {
                    $div_count++;
                    $flag = 1;
                } else {
                    $div_count = $stock_counter / 2;
                    $div_count2 = $div_count * 2;
                }
                ?>
                <!--<div class="leftpartsmallshop">-->
                <?php
                $countStock = 0;
                foreach ($abonnemang_data as $article):
                    if ($countStock % 2 == 0) {
                        if ($stock_counter % 2 != 0 && $stock_counter == $countStock + 1) {
                            echo "<div class='leftpartsmallshop lf_hg authHeightImp'>";
                        } else {
                            echo "<div class='leftpartsmallshop lf_hg authHeightImp'>";
                        }
                    } else {
                        if ($stock_counter % 2 != 0 && $stock_counter == $countStock + 1) {
                            echo "<div class='leftpartsmallshop lf_hg authHeightImp'>";
                        } else {
                            echo "<div class='leftpartsmallshop lf_hg authHeightImp'>";
                        }
                    }
                    ?>
                    <?php $rec_cnt = count($abonnemang_data); ?>
                    <div class="float_left shop_space">
                        <div class="shop_line_prod shopsmallblock no_border <?php
                            // if ($stock_counter % 2 != 0 && $stock_counter == $countStock + 1) {
                                echo "wide_div";
                            // } ?>">
                            <a class="blackcolor cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><div class="shoph3 widthall shop_home_title"><?php echo $article->btshop_article_title; //if(strlen($article->btshop_article_title) > 28 ){echo substr($article->btshop_article_title,0,28)."...";}else{echo $article->btshop_article_title;}  ?></div></a>
                            <div>                                
                                <div class="float_left">
                                    <a class="blackcolor float_left cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>">
                                        <div class="shopphoto float_left<?php
                                                if ($stock_counter % 2 != 0 && $stock_counter == $countStock + 1) {
                                                    echo "bt_shop_image_align";
                                                }
                                            ?> ">
                                            <?php if ($article->btshop_product_image): ?>
                                                <img src="/uploads/btshopThumbnail/<?php echo $article->btshop_product_image; ?>" />
                                            <?php else: ?>
                                                <img src="/images/shopphoto.jpg" alt="photo" />
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                </div>
                                <div class="float_right width_100">
                                <div class="float_left shophome_margin_left shophome_margin_top">
                                        <font class="shop_home_price"> <b><?php echo str_replace(',', ' ', number_format($article->getLeastPriceOfProduct($article->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span>
                                        <div class="shop_buy_button_bg"><a class="cursor red_button" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="shop_heading">KÖP</span></a></div>
                                        <div class="width_100_per margin_top_18 add_to_cart cursorPointer float_left "><a href="<?php echo 'http://' . $host_str . '/borst_shop/shopCart' ?>"><img alt="BT-SHOP" src="/images/new_home/bt-shop_cart.png" width="36px"></a><span class="width_100_per float_left add_to_cart_margin" id="add_to_cart_<?php echo 'product_id_' . $article->id . '_product_price_' . $article->getLeastPriceOfProduct($article->id) . '_price_id_' . $article->getLeastPriceOfProductId($article->id); ?>">Lägg i varukorg</span></div>                                        
                                    </div>
                                </div>
                            </div>

                            <?php if ($stock_counter % 2 != 0 && $stock_counter == $countStock + 1) { ?>
                                <div class="infoWrapper">
                                    <!--<div class="shoph3 widthall shop_home_title"><?php //echo $article->btshop_article_title;  ?></div>-->
                                    <div class="shopsmallblockifo"> <font color="#000000" size="3"> <span class="shop_home_subtitle"><?php echo $article->btshop_article_subtitle; ?></span></font>
                                        <div class="shopsmallblock_separator_1"> </div>
                                        <?php if (strlen($article->btshop_product_intro_text) > 125) {
                                            echo substr($article->btshop_product_intro_text, 0, 125) . "...";
                                        } else {
                                            echo substr($article->btshop_product_intro_text, 0, 125);
                                        } ?> 
                                        <span class="BTshop_lessmar"><a class="cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="">Läs mer</span></a></span>
                                        <div class="shopsmallblock_separator_2"> </div>
                                    </div>
                                    <?php echo 'http://' . $host_str . '/borst_shop/shopCart' ?>"><img alt="BT-SHOP" src="/images/new_home/bt-shop_cart.png" width="36px"></a><span id="add_to_cart_<?php echo 'product_id_' . $article->id . '_product_price_' . $article->getLeastPriceOfProduct($article->id) . '_price_id_' . $article->getLeastPriceOfProductId($article->id); ?>">Lägg i varukorg</span></div>-->

                                </div>
                                <!--<div class="float_left kr_wrapper">
                                    <font class="shop_home_price"> <b><?php echo str_replace(',', ' ', number_format($article->getLeastPriceOfProduct($article->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span>
                                    <div class="shop_buy_button_bg"><a class="cursor red_button" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="shop_heading">KÖP</span></a></div>
                                </div>-->
                                 <?php } else { ?>
                                    <div class="infoWrapper">
                                <!--<div class="float_left kr_wrapper">
                                    <font class="shop_home_price"> <b><?php echo str_replace(',', ' ', number_format($article->getLeastPriceOfProduct($article->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span>
                                    <div class="shop_buy_button_bg"><a class="cursor red_button" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="shop_heading">KÖP</span></a></div>
                                </div>-->
                                <!--<div class="shoph3 widthall shop_home_title"><?php echo $article->btshop_article_title; //if(strlen($article->btshop_article_title) > 28 ){echo substr($article->btshop_article_title,0,28)."...";}else{echo $article->btshop_article_title;}  ?></div>-->
                                <div class="shopsmallblockifo"> <font color="#000000" size="3"> <div class="shop_home_subtitle"><?php if (strlen($article->btshop_article_subtitle) >= 80) {
                                echo substr($article->btshop_article_subtitle, 0, 80);
                            } else {
                                echo $article->btshop_article_subtitle;
                            } ?></div></font>
                                    <div class="shopsmallblock_separator_1"> </div>
                            <?php if (strlen($article->btshop_article_subtitle) > 80) {
                                if (strlen($article->btshop_product_intro_text) > 80) {
                                    echo substr($article->btshop_product_intro_text, 0, 250) . "...";
                                } else {
                                    echo substr($article->btshop_product_intro_text, 0, 250);
                                }
                            } else {
                                if (strlen($article->btshop_product_intro_text) > 250) {
                                    echo substr($article->btshop_product_intro_text, 0, 250) . "...";
                                } else {
                                    echo substr($article->btshop_product_intro_text, 0, 250);
                                }
                            } ?> 
                    <span class="BTshop_lessmar"><a class="cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="">Läs mer</span></a></span>
                                    <div class="shopsmallblock_separator_2"> </div>

                                                        <!--<span class="shop_home_price_main"><b>Läs mer...</b></span>-->
                                </div>
                                <!--<div class="add_to_cart cursorPointer float_left "><a href="<?php echo 'http://' . $host_str . '/borst_shop/shopCart' ?>"><img alt="BT-SHOP" src="/images/new_home/bt-shop_cart.png" width="36px"></a><span id="add_to_cart_<?php echo 'product_id_' . $article->id . '_product_price_' . $article->getLeastPriceOfProduct($article->id) . '_price_id_' . $article->getLeastPriceOfProductId($article->id); ?>">Lägg i varukorg</span></div>-->
                                </div>
                <?php } ?>
                            <!--<div class="float_left" style="width:250px; margin-top:1px">
                                <span class="float_left" style="color:#ddb300;"><a class="cursor" style="color:#f7c900;" href="<?php //echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id;         ?>"><img src="/images/buy.png" style="vertical-align:text-bottom" alt="buy" border="0" /></span>
                            </div>
                            <div class="float_left" style="width:250px; margin-top:1px">
                            </div>-->
                        </div>
                    </div>  

                <?php
                $countStock++;
                echo "</div>";
            endforeach;
            $flag = 0;
            ?>
                <!--</div>-->
                <!--<div class="shopborder"></div>-->
            </div>
            <div class="to_page_top margin_top_12"><a class="cursor">&nbsp;<img alt="upp2" src="/images/new_home/up_2.png" class="back_to_top_btn"/></a>&nbsp;</div>
            <?php /* ?>
              <div class="shopblock">
              <div id="marknadsbrev_title" class="heading_yellow2 shop_home_cat_bg"><span class="shop_home_cat">Marknadsbrev</span> <!--<a href="http://https://www.thetradingaspirants.com/borst_shopborstShopHome#btcart_title"><img alt="upp1" src="/images/upp1.png" /></a>--></div>

              <?php
              $stock_counter = count($marknadsbrev_data);
              $div_count = floor($stock_counter / 2);
              if ($stock_counter % 2 == 1) {
              $div_count++;
              $flag = 1;
              } else {
              $div_count = $stock_counter / 2;
              $div_count2 = $div_count * 2;
              }
              ?>
              <!--<div class="leftpartsmallshop">-->
              <?php
              $countStock = 0;
              foreach ($marknadsbrev_data as $article):
              if($countStock % 2 == 0){
              echo "<div class='leftpartsmallshop lf_hg'>";
              }else{
              echo "<div class='rightpartsmallshop rf_hg'>";
              }
              /*if ($div_count == $countStock) {
              ?>
              </div><div class="rightpartsmallshop"><?php
              } */
            ?>
            <?php /* $rec_cnt = count($marknadsbrev_data); ?>
              <div class="float_left">
              <div class="shop_line_prod shopsmallblock no_border <?php
              if($stock_counter % 2 !=0 && $stock_counter == $countStock + 1) {
              echo "wide_div";
              }
              /*if ($flag == 1) {
              if ($div_count == ($countStock + 1)) {
              echo "no_border wide_div";
              }
              } else {
              if ($div_count == ($countStock + 1) || $div_count2 == ($countStock + 1)) {
              echo "no_border";
              }
              } */ /*
              ?>">
              <a class="blackcolor cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>">
              <div class="shopphoto">
              <?php if ($article->btshop_product_image): ?>
              <img src="/uploads/btshopThumbnail/<?php echo $article->btshop_product_image; ?>" />
              <?php else: ?>
              <img src="/images/shopphoto.jpg" alt="photo" />
              <?php endif; ?>
              </div>
              <div class="shoph3 widthall shop_home_title"><?php echo $article->btshop_article_title; ?></div>
              <div class="shopsmallblockifo"> <font color="#000000"; size="3"> <span class="shop_home_subtitle"><?php echo $article->btshop_article_subtitle; ?></span></font>
              <div class="blank_5h widthall">&nbsp;</div>
              <?php echo $article->btshop_product_intro_text; ?> <span class="float_left" style="color:#ddb300; padding-left:10px;"><a class="cursor" style="color:#f7c900;" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><br /><div class="blank_10h widthall">&nbsp;</div>


              <div class="shop_home_price_main">Läs mer&nbsp;&nbsp;<font class="shop_home_price"> <b><?php echo str_replace(',', ' ', number_format($article->getLeastPriceOfProduct($article->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span></div><div class="shop_buy_button_bg float_left"><a class="cursor" style="color:#f7c900;" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="shop_heading">KÖP</span></a></div>
              </div>
              <!--<div class="float_left" style="width:250px; margin-top:1px">
              <span class="float_left" style="color:#ddb300;"><a class="cursor" style="color:#f7c900;" href="<?php //echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id;     ?>"><img src="/images/buy.png" style="vertical-align:text-bottom" alt="buy" border="0" /></span>
              </div>-->
              <div class="float_left" style="width:250px; margin-top:1px">
              </div>
              </div>
              </div>
              <?php
              $countStock++;
              echo "</div>";
              endforeach;
              $flag = 0;
              ?>
              <!--</div>-->
              </div>

              <div class="to_page_top"><a class="cursor"><!--UPP&nbsp;--><img alt="upp2" src="/images/new_home/up_2.png" class="back_to_top_btn"/></a>&nbsp;</div>
             * <?php */ ?>

            <div class="shopblock">
                <div id="utbildningar_title" class="shop_home_cat_bg">
                    <span class="shop_home_cat">Utbildningar</span>
                    <div class="title_link">  
                        <a href="javascript:void(0);" onclick='gotoDiv("http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome#abonnemang_title");'>
                            <div style = "display:flex">
                                <h2></h2>                            
                                <p class="link_text"> &nbsp; Abonnemang</p>
                            </div>
                        </a>                    
                        <a href="javascript:void(0);" onclick='gotoDiv("http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome#metastock_title");'>
                            <div style = "display:flex">
                                <h2></h2>                            
                                <p class="link_text"> &nbsp; Metastock</p>
                            </div>
                        </a> 
                    </div>
                 <!--<a href="http://https://www.thetradingaspirants.com/borst_shopborstShopHome#btcart_title"><img alt="upp1" src="/images/upp1.png" /></a>--></div>
                <?php
                $stock_counter = count($utbildningar_data);
                $top_mar_12px = "";
                $div_count = floor($stock_counter / 2);
                if ($stock_counter % 2 == 1) {
                    $div_count++;
                    $flag = 1;
                } else {
                    $div_count = $stock_counter / 2;
                    $div_count2 = $div_count * 2;
                }
                ?>
                <!--<div class="leftpartsmallshop lf_hg">-->
                <?php
                $countStock = 0;
                $test = 0;
                foreach ($utbildningar_data as $article):
                    $test = $test + 1;
                    echo "<div class='leftpartsmallshop lf_hg authHeightImp'>";
                    ?>

                    <div class="float_left shop_space">
                        <div class="shop_line_prod shopsmallblock no_border <?php
                    // if ($stock_counter % 2 != 0 && $stock_counter == $countStock + 1) {
                        echo "wide_div";
                    // }
                    /* if ($flag == 1) {
                      if ($div_count == ($countStock + 1)) {
                      echo "no_border wide_div";
                      }
                      } else {
                      if ($div_count == ($countStock + 1) || $div_count2 == ($countStock + 1)) {
                      echo "no_border";
                      }
                      } */
                    ?>">

                           <a class="blackcolor cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"> <div class="shoph3 widthall shop_home_title"><?php echo $article->btshop_article_title; //if(strlen($article->btshop_article_title) > 28 ){echo substr($article->btshop_article_title,0,28)."...";}else{echo $article->btshop_article_title;}  ?></div></a>
                            <div>                                
                                <div class="float_left ">
                                    <a class="blackcolor float_left cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>">
                                        <div class="shopphoto float_left<?php
                                if ($stock_counter % 2 != 0 && $stock_counter == $countStock + 1) {
                                    echo "bt_shop_image_align";
                                }
                                ?> ">
                                    <?php if ($article->btshop_product_image): ?>
                                                <img src="/uploads/btshopThumbnail/<?php echo $article->btshop_product_image; ?>" />
                                    <?php else: ?>
                                                <img src="/images/shopphoto.jpg" alt="photo" />
                                    <?php endif; ?>
                                        </div>
                                    </a>
                                </div>
                                <div class="float_right width_100">
                                    <div class="float_left shophome_margin_left shophome_margin_top">
                                        <font class="shop_home_price"> <b><?php echo str_replace(',', ' ', number_format($article->getLeastPriceOfProduct($article->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span>
                                        <div class="shop_buy_button_bg"><a class="cursor red_button" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="shop_heading">KÖP</span></a></div>
                                        <div class="width_100_per margin_top_18 add_to_cart cursorPointer float_left "><a href="<?php echo 'http://' . $host_str . '/borst_shop/shopCart' ?>"><img alt="BT-SHOP" src="/images/new_home/bt-shop_cart.png" width="36px"></a><span class="width_100_per float_left add_to_cart_margin" id="add_to_cart_<?php echo 'product_id_' . $article->id . '_product_price_' . $article->getLeastPriceOfProduct($article->id) . '_price_id_' . $article->getLeastPriceOfProductId($article->id); ?>">Lägg i varukorg</span></div>                                        
                                    </div>
                                </div>
                            </div>

    <?php if ($stock_counter % 2 != 0 && $stock_counter == $countStock + 1) { ?>
                                <div class="infoWrapper">
                                    <!--<div class="shoph3 widthall shop_home_title"><?php //echo $article->btshop_article_title;  ?></div>-->
                                    <div class="shopsmallblockifo"> <font color="#000000" size="3"> <span class="shop_home_subtitle"><?php echo $article->btshop_article_subtitle; ?></span></font>
                                        <div class="shopsmallblock_separator_1"> </div>
                            <?php if (strlen($article->btshop_product_intro_text) > 125) {
                                echo substr($article->btshop_product_intro_text, 0, 125) . "...";
                            } else {
                                echo substr($article->btshop_product_intro_text, 0, 125);
                            } ?> <span class="BTshop_lessmar"><a class="cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="">Läs mer</span></a></span>
                                        <div class="shopsmallblock_separator_2"> </div>

                                                                                                                                <!--<span class="shop_home_price_main"><b>Läs mer...</b></span>-->
                                    </div>
                                    <!--<div class="add_to_cart cursorPointer float_left"><a href="<?php //echo 'http://' . $host_str . '/borst_shop/shopCart' ?>"><img alt="BT-SHOP" src="/images/new_home/bt-shop_cart.png" width="36px"></a><span id="add_to_cart_<?php //echo 'product_id_'.$article->id.'_product_price_'.$article->getLeastPriceOfProduct($article->id).'_price_id_'.$article->getLeastPriceOfProductId($article->id);  ?>">Lägg i varukorg</span></div>-->

                                </div>
                                <!--<div class="float_left kr_wrapper">
                                    <font class="shop_home_price"> <b><?php //echo str_replace(',', ' ', number_format($article->getLeastPriceOfProduct($article->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span>
                                    <div class="shop_buy_button_bg"><a class="cursor red_button" href="<?php //echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="shop_heading">KÖP</span></a></div>
                                </div>-->
                    <?php } else { ?>
                        <div class="infoWrapper">
                                <!--<div class="float_left kr_wrapper">
                                    <font class="shop_home_price"> <b><?php //echo str_replace(',', ' ', number_format($article->getLeastPriceOfProduct($article->id)))  ?></b></font>&nbsp;<span class="shop_home_kr">KR</span>
                                    <div class="shop_buy_button_bg"><a class="cursor red_button" href="<?php //echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id;  ?>"><span class="shop_heading">KÖP</span></a></div>
                                </div>
                                <div class="shoph3 widthall shop_home_title"><?php //echo $article->btshop_article_title; //if(strlen($article->btshop_article_title) > 28 ){echo substr($article->btshop_article_title,0,28)."...";}else{echo $article->btshop_article_title;}  ?></div>-->
                                <div class="shopsmallblockifo"> <font color="#000000" size="3"> <div class="shop_home_subtitle"><?php if (strlen($article->btshop_article_subtitle) >= 80) {
                    echo substr($article->btshop_article_subtitle, 0, 80);
                } else {
                    echo $article->btshop_article_subtitle;
                } ?></div></font>
                                    <div class="shopsmallblock_separator_1"> </div>
                        <?php if (strlen($article->btshop_article_subtitle) > 80) {
                            if (strlen($article->btshop_product_intro_text) > 80) {
                                echo substr($article->btshop_product_intro_text, 0, 250) . "...";
                            } else {
                                echo substr($article->btshop_product_intro_text, 0, 250);
                            }
                        } else {
                            if (strlen($article->btshop_product_intro_text) > 250) {
                                echo substr($article->btshop_product_intro_text, 0, 250) . "...";
                            } else {
                                echo substr($article->btshop_product_intro_text, 0, 250);
                            }
                        } ?> <span class="BTshop_lessmar"><a class="cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="">Läs mer</span></a></span>
                                    <div class="shopsmallblock_separator_2"> </div>

                                                                                                                            <!--<span class="shop_home_price_main"><b>Läs mer...</b></span>-->
                                </div>
                                <!--<div class="add_to_cart cursorPointer float_left "><a href="<?php //echo 'http://' . $host_str . '/borst_shop/shopCart'?>"><img alt="BT-SHOP" src="/images/new_home/bt-shop_cart.png" width="36px"></a><span id="add_to_cart_<?php //echo 'product_id_'.$article->id.'_product_price_'.$article->getLeastPriceOfProduct($article->id).'_price_id_'.$article->getLeastPriceOfProductId($article->id); ?>">Lägg i varukorg</span></div>-->
                                </div>
                    <?php } ?>
                            <!--<div class="float_left" style="width:250px; margin-top:1px">
                                <span class="float_left" style="color:#ddb300;"><a class="cursor" style="color:#f7c900;" href="<?php //echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id;         ?>"><img src="/images/buy.png" style="vertical-align:text-bottom" alt="buy" border="0" /></span>
                            </div>
                            <div class="float_left" style="width:250px; margin-top:1px">
                            </div>-->
                        </div>
                    </div>  
                    <?php
                    $countStock++;
                    echo "</div>";
                endforeach;
                $flag = 0;
                ?>
                <!--</div>-->
            </div>            
           
            
            <!--<div class="shopblock">
                <div id="live-utbildningar_title" class="shop_home_cat_bg"><span class="shop_home_cat">Live-utbildningar</span> <!--<a href="http://https://www.thetradingaspirants.com/borst_shopborstShopHome#btcart_title"><img alt="upp1" src="/images/upp1.png" /></a></div>-->
                <?php
                $stock_counter = count($liveutbildningar_data);
                $top_mar_12px = "";
                $div_count = floor($stock_counter / 2);
                if ($stock_counter % 2 == 1) {
                    $div_count++;
                    $flag = 1;
                } else {
                    $div_count = $stock_counter / 2;
                    $div_count2 = $div_count * 2;
                }
                ?>
                <!--<div class="leftpartsmallshop lf_hg">-->
                <?php
                $countStock = 0;
                foreach ($liveutbildningar_data as $article):
                    echo "<div class='leftpartsmallshop lf_hg authHeightImp'>";
                    ?>

                    <div class="float_left shop_space">
                        <div class="shop_line_prod shopsmallblock no_border wide_div"> 

                            <a class="blackcolor cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><div class="shoph3 widthall shop_home_title"><?php echo $article->btshop_article_title; //if(strlen($article->btshop_article_title) > 28 ){echo substr($article->btshop_article_title,0,28)."...";}else{echo $article->btshop_article_title;}  ?></div></a>
                            <div>                                
                                <div class="float_left">
                                    <a class="blackcolor float_left cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>">
                                        <div class="shopphoto float_left<?php
                    if ($stock_counter % 2 != 0 && $stock_counter == $countStock + 1) {
                        echo "bt_shop_image_align";
                    }
                    ?> ">
                                    <?php if ($article->btshop_product_image): ?>
                                                <img src="/uploads/btshopThumbnail/<?php echo $article->btshop_product_image; ?>" />
    <?php else: ?>
                                                <img src="/images/shopphoto.jpg" alt="photo" />
    <?php endif; ?>
                                        </div>
                                    </a>
                                </div>
                                <div class="float_right width_100">
                                    <div class="float_left shophome_margin_left shophome_margin_top">
                                        <font class="shop_home_price"> <b><?php echo str_replace(',', ' ', number_format($article->getLeastPriceOfProduct($article->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span>
                                        <div class="shop_buy_button_bg"><a class="cursor red_button" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="shop_heading">KÖP</span></a></div>
                                        <div class="width_100_per margin_top_18 add_to_cart cursorPointer float_left "><a href="<?php echo 'http://' . $host_str . '/borst_shop/shopCart' ?>"><img alt="BT-SHOP" src="/images/new_home/bt-shop_cart.png" width="36px"></a><span class="width_100_per float_left add_to_cart_margin" id="add_to_cart_<?php echo 'product_id_' . $article->id . '_product_price_' . $article->getLeastPriceOfProduct($article->id) . '_price_id_' . $article->getLeastPriceOfProductId($article->id); ?>">Lägg i varukorg</span></div>                                        
                                    </div>
                                </div>
                            </div>

    <?php if ($stock_counter % 2 != 0 && $stock_counter == $countStock + 1) { ?>
                                <div class="infoWrapper">
                                    <!--<div class="shoph3 widthall shop_home_title"><?php //echo $article->btshop_article_title;  ?></div>-->
                                    <div class="shopsmallblockifo"> <font color="#000000" size="3"> <span class="shop_home_subtitle"><?php echo $article->btshop_article_subtitle; ?></span></font>
                                        <div class="shopsmallblock_separator_1"> </div>
        <?php if (strlen($article->btshop_product_intro_text) > 125) {
            echo substr($article->btshop_product_intro_text, 0, 125) . "...";
        } else {
            echo substr($article->btshop_product_intro_text, 0, 125);
        } ?> <span class="BTshop_lessmar"><a class="cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="">Läs mer</span></a></span>
                                        <div class="shopsmallblock_separator_2"> </div>

                                                                                                                                <!--<span class="shop_home_price_main"><b>Läs mer...</b></span>-->
                                    </div>
                                    <!--<div class="add_to_cart cursorPointer float_left"><a href="<?php //echo 'http://' . $host_str . '/borst_shop/shopCart' ?>"><img alt="BT-SHOP" src="/images/new_home/bt-shop_cart.png" width="36px"></a><span id="add_to_cart_<?php //echo 'product_id_'.$article->id.'_product_price_'.$article->getLeastPriceOfProduct($article->id).'_price_id_'.$article->getLeastPriceOfProductId($article->id);  ?>">Lägg i varukorg</span></div>-->

                                </div>
                                <!--<div class="float_left kr_wrapper">
                                    <font class="shop_home_price"> <b><?php //echo str_replace(',', ' ', number_format($article->getLeastPriceOfProduct($article->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span>
                                    <div class="shop_buy_button_bg"><a class="cursor red_button" href="<?php //echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="shop_heading">KÖP</span></a></div>
                                </div>-->
                    <?php } else { ?>
                        <div class="infoWrapper">
                                <!--<div class="float_left kr_wrapper">
                                    <font class="shop_home_price"> <b><?php //echo str_replace(',', ' ', number_format($article->getLeastPriceOfProduct($article->id)))  ?></b></font>&nbsp;<span class="shop_home_kr">KR</span>
                                    <div class="shop_buy_button_bg"><a class="cursor red_button" href="<?php //echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id;  ?>"><span class="shop_heading">KÖP</span></a></div>
                                </div>
                                <div class="shoph3 widthall shop_home_title"><?php //echo $article->btshop_article_title; //if(strlen($article->btshop_article_title) > 28 ){echo substr($article->btshop_article_title,0,28)."...";}else{echo $article->btshop_article_title;}  ?></div>-->
                                <div class="shopsmallblockifo"> <font color="#000000" size="3"> <div class="shop_home_subtitle"><?php if (strlen($article->btshop_article_subtitle) >= 80) {
                    echo substr($article->btshop_article_subtitle, 0, 80);
                } else {
                    echo $article->btshop_article_subtitle;
                } ?></div></font>
                                    <div class="shopsmallblock_separator_1"> </div>
                        <?php if (strlen($article->btshop_article_subtitle) > 80) {
                            if (strlen($article->btshop_product_intro_text) > 80) {
                                echo substr($article->btshop_product_intro_text, 0, 250) . "...";
                            } else {
                                echo substr($article->btshop_product_intro_text, 0, 250);
                            }
                        } else {
                            if (strlen($article->btshop_product_intro_text) > 250) {
                                echo substr($article->btshop_product_intro_text, 0, 250) . "...";
                            } else {
                                echo substr($article->btshop_product_intro_text, 0, 250);
                            }
                        } ?> <span class="BTshop_lessmar"><a class="cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="">Läs mer</span></a></span>
                                    <div class="shopsmallblock_separator_2"> </div>

                                                                                                                            <!--<span class="shop_home_price_main"><b>Läs mer...</b></span>-->
                                </div>
                                <!--<div class="add_to_cart cursorPointer float_left "><a href="<?php //echo 'http://' . $host_str . '/borst_shop/shopCart'?>"><img alt="BT-SHOP" src="/images/new_home/bt-shop_cart.png" width="36px"></a><span id="add_to_cart_<?php //echo 'product_id_'.$article->id.'_product_price_'.$article->getLeastPriceOfProduct($article->id).'_price_id_'.$article->getLeastPriceOfProductId($article->id); ?>">Lägg i varukorg</span></div>-->
                                </div>
                    <?php } ?>
                            <!--<div class="float_left" style="width:250px; margin-top:1px">
                                <span class="float_left" style="color:#ddb300;"><a class="cursor" style="color:#f7c900;" href="<?php //echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id;         ?>"><img src="/images/buy.png" style="vertical-align:text-bottom" alt="buy" border="0" /></span>
                            </div>
                            <div class="float_left" style="width:250px; margin-top:1px">
                            </div>-->
                        </div>
                    </div>  
                    <?php
                    $countStock++;
                    echo "</div>";
                endforeach;
                $flag = 0;
                ?>
                <!--</div>-->
            </div>            
            <div class="to_page_top margin_top_12"><a class="cursor"><!--UPP&nbsp;--><img alt="upp2" src="/images/new_home/up_2.png" class="back_to_top_btn"/></a>&nbsp;</div>
            
            <div class="shopblock">
                <div id="metastock_title" class="heading_yellow2 shop_home_cat_bg"><span class="shop_home_cat">Metastock</span> 
                <div class="title_link">  
                    <a href="javascript:void(0);" onclick='gotoDiv("http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome#abonnemang_title");'>
                        <div style = "display:flex">
                            <h2></h2>                            
                            <p class="link_text"> &nbsp; Abonnemang</p>
                        </div>
                    </a>                    
                    <a href="javascript:void(0);" onclick='gotoDiv("http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome#utbildningar_title");'>
                        <div style = "display:flex">
                            <h2></h2>                            
                            <p class="link_text"> &nbsp; Utbildningar</p>
                        </div>
                    </a> 
                </div>
                <!--<a href="http://https://www.thetradingaspirants.com/borst_shopborstShopHome#bocker_title"><img alt="upp1" src="/images/upp1.png" />
                    </a>-->
                </div>   
                    <?php
                    $stock_counter = count($metastock_data); //die;
                    $top_mar_12px = "";
                    $div_count = floor($stock_counter / 2);
                    if ($stock_counter % 2 == 1) {
                        $div_count++;
                        $flag = 1;
                    } else {
                        $div_count = $stock_counter / 2;
                        $div_count2 = $div_count * 2;
                    }
                    ?>

                <!--<div class="leftpartsmallshop">-->
            <?php
            $countStock = 0;
            foreach ($metastock_data as $article):
                echo "<div class='leftpartsmallshop lf_hg authHeightImp'>";
                ?>
                    <div class="float_left shop_space">
                        <div class="shop_line_prod shopsmallblock no_border <?php
                        // if ($stock_counter % 2 != 0 && $stock_counter == $countStock + 1) {
                            echo "wide_div";
                        // }
                        /* if ($flag == 1) {
                          if ($div_count == ($countStock + 1)) {
                          echo "no_border wide_div";
                          }
                          } else {
                          if ($div_count == ($countStock + 1) || $div_count2 == ($countStock + 1)) {
                          echo "no_border";
                          }
                          } */
                        ?>">

                          <a class="blackcolor cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>">  <div class="shoph3 widthall shop_home_title"><?php echo $article->btshop_article_title; //if(strlen($article->btshop_article_title) > 28 ){echo substr($article->btshop_article_title,0,28)."...";}else{echo $article->btshop_article_title;} ?></div></a>
                            <div>                                
                                <div class="float_left">
                                    <a class="blackcolor float_left cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>">
                                        <div class="shopphoto float_left<?php
                        if ($stock_counter % 2 != 0 && $stock_counter == $countStock + 1) {
                            echo "bt_shop_image_align";
                        }
                        ?> ">
                                    <?php if ($article->btshop_product_image): ?>
                                                <img src="/uploads/btshopThumbnail/<?php echo $article->btshop_product_image; ?>" />
                                    <?php else: ?>
                                                <img src="/images/shopphoto.jpg" alt="photo" />
                                    <?php endif; ?>
                                        </div>
                                    </a>
                                </div>
                                <div class="float_right width_100">
                                    <div class="float_left shophome_margin_left shophome_margin_top">
                                        <font class="shop_home_price"> <b><?php echo str_replace(',', ' ', number_format($article->getLeastPriceOfProduct($article->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span>
                                        <div class="shop_buy_button_bg"><a class="cursor red_button" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="shop_heading">KÖP</span></a></div>
                                        <div class="width_100_per margin_top_18 add_to_cart cursorPointer float_left "><a href="<?php echo 'http://' . $host_str . '/borst_shop/shopCart' ?>"><img alt="BT-SHOP" src="/images/new_home/bt-shop_cart.png" width="36px"></a><span class="width_100_per float_left add_to_cart_margin" id="add_to_cart_<?php echo 'product_id_' . $article->id . '_product_price_' . $article->getLeastPriceOfProduct($article->id) . '_price_id_' . $article->getLeastPriceOfProductId($article->id); ?>">Lägg i varukorg</span></div>                                        
                                    </div>
                                </div>
                            </div>

                    <?php if ($stock_counter % 2 != 0 && $stock_counter == $countStock + 1) { ?>
                                <div class="infoWrapper">
                                    <!--<div class="shoph3 widthall shop_home_title"><?php //echo $article->btshop_article_title;  ?></div>-->
                                    <div class="shopsmallblockifo"> <font color="#000000" size="3"> <span class="shop_home_subtitle"><?php echo $article->btshop_article_subtitle; ?></span></font>
                                        <div class="shopsmallblock_separator_1"> </div>
        <?php if (strlen($article->btshop_product_intro_text) > 125) {
            echo substr($article->btshop_product_intro_text, 0, 125) . "...";
        } else {
            echo substr($article->btshop_product_intro_text, 0, 125);
        } ?> <span class="BTshop_lessmar"><a class="cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="">Läs mer</span></a></span>
                                        <div class="shopsmallblock_separator_2"> </div>

                                                                                                                                                                <!--<span class="shop_home_price_main"><b>Läs mer...</b></span>-->
                                    </div>
                                    <!--<div class="add_to_cart cursorPointer float_left"><a href="<?php //echo 'http://' . $host_str . '/borst_shop/shopCart'?>"><img alt="BT-SHOP" src="/images/new_home/bt-shop_cart.png" width="36px"></a><span id="add_to_cart_<?php //echo 'product_id_'.$article->id.'_product_price_'.$article->getLeastPriceOfProduct($article->id).'_price_id_'.$article->getLeastPriceOfProductId($article->id); ?>">Lägg i varukorg</span></div>-->

                                </div>
            <?php } else { ?>
                <div class="infoWrapper">
                                <!--<div class="float_left kr_wrapper">
                                    <font class="shop_home_price"> <b><?php echo str_replace(',', ' ', number_format($article->getLeastPriceOfProduct($article->id))) ?></b></font>&nbsp;<span class="shop_home_kr">KR</span>
                                    <div class="shop_buy_button_bg"><a class="cursor red_button" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="shop_heading">KÖP</span></a></div>
                                </div>-->
                                <!--<div class="shoph3 widthall shop_home_title"><?php //echo $article->btshop_article_title;//if(strlen($article->btshop_article_title) > 28 ){echo substr($article->btshop_article_title,0,28)."...";}else{echo $article->btshop_article_title;} ?></div>-->
                                <div class="shopsmallblockifo"> <font color="#000000" size="3"> <div class="shop_home_subtitle"><?php if (strlen($article->btshop_article_subtitle) >= 80) {
            echo substr($article->btshop_article_subtitle, 0, 80);
        } else {
            echo $article->btshop_article_subtitle;
        } ?></div></font>
                                    <div class="shopsmallblock_separator_1"> </div>
                <?php if (strlen($article->btshop_article_subtitle) > 80) {
                    if (strlen($article->btshop_product_intro_text) > 80) {
                        echo substr($article->btshop_product_intro_text, 0, 250) . "...";
                    } else {
                        echo substr($article->btshop_product_intro_text, 0, 250);
                    }
                } else {
                    if (strlen($article->btshop_product_intro_text) > 250) {
                        echo substr($article->btshop_product_intro_text, 0, 250) . "...";
                    } else {
                        echo substr($article->btshop_product_intro_text, 0, 250);
                    }
                } ?> <span class="BTshop_lessmar"><a class="cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"><span class="">Läs mer</span></a></span>
                                    <div class="shopsmallblock_separator_2"> </div>

                                                                                                                                                            <!--<span class="shop_home_price_main"><b>Läs mer...</b></span>-->
                                </div>
                                </div>
            <?php } ?>

                        </div>
                    </div>  
            <?php
            $countStock++;
            echo "</div>";
        endforeach;
        $flag = 0;
        ?>
                <!--</div>-->
            </div>
            <div class="to_page_top margin_top_12"><a class="cursor"><!--UPP&nbsp;--><img alt="upp2" src="/images/new_home/up_2.png" class="back_to_top_btn"/></a>&nbsp;</div>
            <div class="shopblock marginBottom0" >
                    <div id="" class="marginBottom0 heading_yellow2 shop_home_cat_bg"><span class="shop_home_cat">&nbsp;</span> <!--<a href="http://https://www.thetradingaspirants.com/borst_shopborstShopHome#bocker_title"><img alt="upp1" src="/images/upp1.png" />
                            </a>--></div> 
            </div>   
            <?php echo include_partial('global/inner_bottom_footer'); ?> 
        </div>
    <input type="hidden" name="product_id" id="product_id" value="<?php //echo $product_detail->id;  ?>"/>
    
    <!-- <div class = "maincontentpageshop"> -->
        <div class="rightbanner autoheight padding_0">
            <div class="shop_1_step_right_panel">&nbsp;</div>
            <div class="up_sub_div"><a href="#"><img src="/images/new_home/up_1.png" /></a></div>
            
        </div>
    <!-- </div> -->
    
   
</div>


<script>
    function gotoDiv(url){
        window.location = url;
        //window.location.reload();
    }
</script>