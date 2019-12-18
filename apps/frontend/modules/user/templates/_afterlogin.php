﻿<?php 
$payDone = explode("borst_shop/", $_SERVER['REQUEST_URI']);
$payDone = explode("?", $payDone[1]);

?> 
<div class="loginwrapper">
    <div class="width_per_59 floatLeft">
        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/sbt/sbtUserProfile/take_to_profile/1'; ?>"><?php echo 'INLOGGAD:' ?></a>
        <?php echo ucfirst($sf_user->getAttribute('firstname', '', 'userProperty')); ?>&nbsp;&nbsp;
        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/sbt/sbtUserProfile/take_to_profile/1'; ?>"><?php echo 'Mitt konto' ?></a>&nbsp;&nbsp;
        <a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/user/changePasswordForm"><?php echo 'Ändra lösenord' ?></a>&nbsp;&nbsp;
        <?php if ($sf_user->getAttribute('isSuperAdmin', '', 'userProperty') == 1) : ?>
            <a href="/backend.php/borst/borstHome"><?php echo 'Admin Hem' ?></a>&nbsp;&nbsp;
        <?php elseif ($sf_user->hasGroup('Publisher')) : ?>
            <a href="/backend.php/borst/createArticle"><?php echo 'Admin Hem' ?></a>&nbsp;&nbsp;
        <?php endif; ?>
        <a href="<?php echo url_for('user/signout') ?>"><?php echo 'Logga ut' ?></a>&nbsp;&nbsp;
    </div>
    <div class="floatLeft width_per_40">
        <form name="search_form" id="search_form" method="post" action="<?php echo url_for('borst/searchResult') ?>" onsubmit="return check_search_parameter()">
            <span class="floatLeft"><button class="glass"></button></span>
            <span class="floatLeft"><input type="text" name="normal_search" id="normal_search" class="normal_search_width border-none height_17" value="<?php echo $sf_params->get('normal_search') ?>"/></span>
            <span class="floatLeft"><input type="submit" class="submitbuttontext submit seek " value="" name="submit" id="submit"/></span>
        </form>
        <span class="floatLeft"><label><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstAdvanceSearch" class="advsearch">Avancerad sökning</a></label></span>
        <span class="floatLeft"><a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst_shop/shopCart'; ?>"><img src="/images/new_home/bt-shop_third_menu_cart.png" height="18" class="navBar_third_cart"/></a><span class="cart_count"><?php if($_COOKIE['cart_items_cookie_qty']!=''){ $cart_cnt = explode(',',$_COOKIE['cart_items_cookie_qty']); foreach($cart_cnt as $pqty){ $cookie_cnt += $pqty; } if($cookie_cnt) { if($payDone[0] == 'paymentDone' || $payDone[0] == 'paymentFail'  || $payDone[0] == 'shopPaymentDone' || $payDone[0] ==  'shopArticlePaymentDone'){ echo $cookie_cnt =''; }else{ echo $cookie_cnt;} /*echo $cookie_cnt;*/} } ?></span></span>
    </div>
</div>
