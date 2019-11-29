<?php $parent_menu = sfContext::getInstance()->getUser()->getAttribute('parent_menu'); ?>
<?php //echo $parent_menu;?>
<?php $submenu = sfContext::getInstance()->getUser()->getAttribute('submenu_menu'); ?>
<?php //echo $submenu;?>
<?php $third_menu = sfContext::getInstance()->getUser()->getAttribute('third_menu'); ?>
<?php //echo $third_menu;?>
<?php 
switch ($parent_menu) {
    case 'top_borst_menu': $backgroud_class = $darkblue_parent;
        break;
    case '1': $backgroud_class = $darkblue_parent;
        break;
    case '2': $backgroud_class = $darkyellow_parent;
        break;
    case '3': $backgroud_class = $green_submenu;
        break;
    case '4': $backgroud_class = $darkorange_parent;
        break;
    case '5': $backgroud_class = $red_parent;
        break;
    case '6': $backgroud_class = $darkgreen_parent;
        break;
    case '7': $backgroud_class = $lightblue_parent;
        break;
    case '8': $backgroud_class = $lightgreen_parent;
        break;
    case '10': $backgroud_class = $lightgreen_parent;
        break;
    case 'top_bt_markets': $backgroud_class = $darkskyblue_parent;
        break;
    case 'top_newsletter_menu': $backgroud_class = $darkblue_parent;
        break;
}

$btshop_article = new BtShopArticle();
$abonnemang_data = $btshop_article->getPublishedShopArticleOfType(6);
$utbildningar_data = $btshop_article->getPublishedShopArticleOfType(4);
$metastock_data = $btshop_article->getPublishedShopArticleOfType(1);
$host_str = $_SERVER['HTTP_HOST'];
?>
<script>
    function gotoDiv(url){
        window.location = url;
        //window.location.reload();
    }
    $(document).ready(function(){
        $( ".popupmenu" ).mouseover(function() {
            $(this).find("a").css({"background":'#fff2d9 url("../images/new_home/arrow_yellow.png") no-repeat scroll center bottom',"background-color":"none"});
            $("."+$(this).attr('id')).show();
        });
    });
</script>
<!-- <style>.highlight:hover{background-color: white;}</style> -->
<?php
foreach ($utbildningar_data as $article):
    // echo ("111");
    // echo("</br>");
endforeach;
?>
<div class = "drop_down_bt_shop first_drop" id = "first_drop">
    <ul class = "shop_ul">
        
    <?php
    foreach ($abonnemang_data as $article):?>
    <a class="blackcolor cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>">
        <li class = "highlight shop_li"><?php echo $article->btshop_article_title;?></li></br>
    </a>
    <?php
    endforeach;
    ?>
    </ul>
</div>
<div class = "drop_down_bt_shop second_drop" id = "second_drop">
    <ul class = "shop_ul">
    <?php
    foreach ($utbildningar_data as $article):?>
    <a class="blackcolor cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>">
        <li class = "highlight shop_li"><?php echo $article->btshop_article_title;?></li></br>
    </a>
    <?php
    endforeach;
    ?>
    </ul>
</div>
<div class = "drop_down_bt_shop third_drop" id = "third_drop">
    <ul class = "shop_ul">
    <?php
    foreach ($metastock_data as $article):?>
    <a class="blackcolor cursor" href="<?php echo 'http://' . $host_str . '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>">
        <li class = "highlight shop_li"><?php echo $article->btshop_article_title;?></li></br>
    </a>
    <?php
    endforeach;
    ?>
    </ul>
</div>
<div class="nav-bar-wrap">
    <div class="nav-bar-wrap-left">
        <ul class="nav-bar">
            <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstHome"><span class="text-uppercase borst <?php echo $parent_menu == 'top_borst_menu' ? 'nav-active' : '' ?>">BÖRSTJÄNAREN</span></a>
                <ul class="nav-bar-sub" id="first">
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstHome"><span  class="<?php echo $submenu == 'borst_menu_home' ? 'sub-active' : '' ?>">Hem</span></a></li>
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstShare"><span class="<?php echo $submenu == 'borst_menu_share' ? 'sub-active' : '' ?>">Aktier</span></a></li>
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstCommodities"><span class="<?php echo $submenu == 'borst_menu_commodities' ? 'sub-active' : '' ?>">Råvaror</span></a></li>
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstCurrencies"><span class="<?php echo $submenu == 'borst_menu_currencies' ? 'sub-active' : '' ?>">Valutor</span></a></li>
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstSubscriber"><span class="<?php echo $submenu == 'borst_menu_subscriber' ? 'sub-active' : '' ?>">Portfölj</span></a></li>
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/articleListMenu/obj_id/1795"><span class="<?php echo $submenu == 'borst_menu_subscriberlist' ? 'sub-active' : '' ?>">VM-Update</span></a></li>
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/articleListMenu/kat_id/12"><span class="<?php echo $submenu == 'borst_menu_subscriberlist' ? 'sub-active' : '' ?>">Högbergs hörna</span></a></li>                    
                </ul>
            </li>
            <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome"><span class="text-uppercase bt-shop <?php echo $parent_menu == 'top_bt_shop' ? 'nav-active' : '' ?>">BT-Shop</span></a>
                <ul class="nav-bar-sub" id="second">
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome"><span>Hem</span></a></li>                    
                    <li><a href="javascript:void(0);" onclick='gotoDiv("http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome#utbildningar_title");' id="btshop_utbildningar"><span>Utbildningar</span></a></li>
                    <li id="bt_shop_abonnemang" class="popupmenu"><a id="btshop_abonnemang" href="javascript:void(0);" onclick='gotoDiv("http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome#abonnemang_title");'><span>Abonnemang</span></a>
                    </li>
                    <li><a href="javascript:void(0);" onclick='gotoDiv("http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopHome#metastock_title");' id="btshop_metastock"><span>Metastock</span></a></li>
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/borstShopConditions"><span>Villkor</span></a></li>
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst_shop/shopCart"><span>Varukorg</span></a></li>
                </ul>
            </li>
            <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/services"><span class="text-uppercase tjanster <?php echo $parent_menu == 'services' ? 'nav-active' : '' ?>">Tjänster</span></a>
                <ul class="nav-bar-sub" id="third">
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/services"><span style="margin-left:242px">Hem</span></a></li>
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/henryBoy"><span>Henry Boy</span></a></li>
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/portfolio"><span>Tradingportföljen</span></a></li>
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/automatic"><span>Automatic</span></a></li>
                </ul>
            </li> 
            <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/tradingAccount"><span class="text-uppercase tradingkonto <?php echo $parent_menu == 'tradingaccount' ? 'nav-active' : '' ?>">Tradingkonto</span></a>
                <ul class="nav-bar-sub" id="fourth">
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/tradingAccount"><span style="margin-left:342px">Hem</span></a></li>
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/gffBrokers"><span>GFF Brokers</span></a></li>
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/avaTrade"><span>AvaTrade</span></a></li>
                </ul>
            </li>
        </ul>
        <!--<ul class="supmenuPopupContent bt_shop_abonnemang" data="bt_shop_abonnemang" style="left:22px;">
            <?php foreach ($abonnemang_data as $article): ?>
                <li><a href="<?php echo '/borst_shop/shopProductDetail/product_id/' . $article->id; ?>"> <?php echo $article->btshop_article_title; ?></a></li>
            <?php endforeach ?>
        </ul>-->
    </div>
    <div class="nav-bar-wrap-right top_menu_right">
       
       <span class="<?php echo $third_menu == 'om_oss' ? 'nav-active' : '' ?>"><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstAboutUs'; ?>">Om oss</a></span>
       <!--<span class="<?php echo $third_menu == 'faq' ? 'nav-active' : '' ?>"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/faq">Hjälp</a></span>-->
       <span class="<?php echo $third_menu == 'dayletter' ? 'nav-active' : '' ?>"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstDayletter">Dagsbrev</a></span>
       <span class="<?php echo $third_menu == 'newsletter' ? 'nav-active' : '' ?>"><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstNewsletter">Veckobrev</a></span>
       <span class="<?php echo $third_menu == 'sbtUserProfile' ? 'nav-active' : '' ?>"><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/sbt/sbtUserProfile/take_to_profile'; ?>">Mitt konto</a></span>
       
    </div>
    
</div>
<div class="subnav-bar-wrap">

    <div class="subnav-bar-wrap-right">
    <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstWebinar'; ?>"><span class="subnav-bar <?php echo $third_menu == 'borst_menu_chronicles' ? 'sub-active' : '' ?>">Webinarium</span></a>    
        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/articleList'; ?>"><span class="subnav-bar <?php echo $third_menu == 'list' ? 'sub-active' : '' ?>">Lista</span></a>
       <!-- <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/2127'; ?>"> <span class="subnav-bar <?php echo $third_menu == 'webinarium' ? 'sub-active' : '' ?>">Webinarium</span></a>-->
        <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstChronicles"><span class="subnav-bar <?php echo $third_menu == 'bt_skolan' ? 'sub-active' : '' ?>">Arkiv</span></a>
         <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstRisk"><span class="subnav-bar <?php echo $third_menu == 'riskvarning' ? 'sub-active' : '' ?>"> Riskvarning </span></a><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/contactUs'; ?>"><span class="subnav-bar <?php echo $third_menu == 'contact_us' ? 'sub-active' : '' ?>">Kontakta oss</span></a>
        <!--<span class="subnav-bar <?php echo $submenu == 'forum_menu_home' ? 'sub-active' : '' ?>">a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/forum/forumHome">Forum</a></span>-->
        
    </div>
</div>

<?php 
if($parent_menu == 'top_borst_menu'){
    echo '<script type="text/javascript">',
    "$('#first').css('display', 'block');",
    "$('.bt-shop, .tjanster, .tradingkonto, #second, #third, #fourth').hover(function(){",
        "$('#first').css('display', 'none');",
    "},",
    "function(){",
        "$('#first').css('display', 'block');",
    "});",
    '</script>';
}
elseif($parent_menu == 'top_bt_shop'){
    echo '<script type="text/javascript">',
    "$('#second').css('display', 'block');",
    "$('.borst, .tjanster, .tradingkonto, #first, #third, #fourth').hover(function(){",
        "$('#second').css('display', 'none');",
    "},",
    "function(){",
        "$('#second').css('display', 'block');",
    "});",
    '</script>';
}
elseif($parent_menu == 'services'){
    echo '<script type="text/javascript">',
    "$('#third').css('display', 'block');",
    "$('.borst, .bt-shop, .tradingkonto, #first, #second, #fourth').hover(function(){",
        "$('#third').css('display', 'none');",
    "},",
    "function(){",
        "$('#third').css('display', 'block');",
    "});",
    '</script>';
}
elseif($parent_menu == 'tradingaccount'){
    echo '<script type="text/javascript">',
    "$('#fourth').css('display', 'block');",
    "$('.borst, .bt-shop, .tjanster, #first, #second, #third').hover(function(){",
        "$('#fourth').css('display', 'none');",
    "},",
    "function(){",
        "$('#fourth').css('display', 'block');",
    "});",
    '</script>';
}
?>

<script>
    $(document).ready(function(){
        
        $('#btshop_abonnemang, #first_drop').hover(function(){
            $('#first_drop').css('display', 'block');
        },
        function(){
            $('#first_drop').css('display', 'none');
        });
        $('#btshop_utbildningar, #second_drop').hover(function(){
            $('#second_drop').css('display', 'block');
        },
        function(){
            $('#second_drop').css('display', 'none');
        });
        $('#btshop_metastock, #third_drop').hover(function(){
            $('#third_drop').css('display', 'block');
        },
        function(){
            $('#third_drop').css('display', 'none');
        });
        
    });
    function gotoDiv(url){
        window.location = url;
        //window.location.reload();
    }
    
</script>
