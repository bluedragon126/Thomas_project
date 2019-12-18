<div class="user_login_main">
    <form name="loginform" class="floatLeftNew" id="loginform" method="post" action="<?php echo url_for('user/signin') ?>">
        <span class="floatLeftNew bt_head_login"><label>Logga in: </label></span>
        <?php echo $form['_csrf_token']->render() ?>
        <span class="floatLeft"><?php echo $form['username']->render(array('id' => 'username', 'class' => 'exercise border-none', 'tabindex' => '1')) ?></span>
        <span class="floatLeftNew bt_head_login"><label>Lösen: </label></span><span class="floatLeft"><?php echo $form['password']->render(array('id' => 'password', 'class' => 'exercise border-none', 'tabindex' => '2')) ?></span>
        <span class="floatLeft"><input type="submit" name="submit" value="" class="loginBtn cursor" /></span>
    </form>
    <span class="floatLeft bt_head_login"><label><a class="cursor" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/user/forgetPassword">Glömt lösenord?</a></label></span>
    <span class="floatLeft"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt_user/sbtNewRegistration"><button class="freeAccount cursor"></button></a></span>
    <span class="floatLeft"><button class="glass"></button></span>
    <form name="search_form" class="floatLeftNew" id="search_form" method="post" action="<?php echo url_for('borst/searchResult') ?>" onsubmit="return check_search_parameter()">
        <span class="floatLeft"><input type="text" name="normal_search" id="normal_search" class="normal_search_width border-none height_17" value="<?php echo $sf_params->get('normal_search') ?>"/></span>
        <span class="floatLeft"><input type="submit" class="submitbuttontext submit seek" value="" name="submit" id="submit"/></span>
    </form>
    <span class="floatLeft"><label><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/borstAdvanceSearch" class="advsearch bt_head_login">Avancerad sökning</a></label></span>
    <span class="floatLeft"><a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/borst_shop/shopCart'; ?>"><img src="/images/new_home/bt-shop_third_menu_cart.png" height="18" class="navBar_third_cart"/></a><span class="cart_count"><?php if($_COOKIE['cart_items_cookie_qty']!=''){ $cart_cnt = explode(',',$_COOKIE['cart_items_cookie_qty']); foreach($cart_cnt as $pqty){ $cookie_cnt += $pqty; } if($cookie_cnt) { if($payDone[1] == 'paymentDone' || $payDone[1] == 'paymentFail'  || $payDone[1] == 'shopPaymentDone' || $payDone[1] ==  'shopArticlePaymentDone'){ echo $cookie_cnt =''; }else{ echo $cookie_cnt;} /*echo $cookie_cnt;*/} } ?></span></span>
</div>


