<?php $third_menu = sfContext::getInstance()->getUser()->getAttribute('third_menu'); ?>
<?php $main_parent_menu = sfContext::getInstance()->getUser()->getAttribute('parent_menu'); 
$payDone = explode("borst_shop/", $_SERVER['REQUEST_URI']);
?> 
<div class="navBar_third">
    <ul class="bt_nav_3">
        <li><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/articleList'; ?>" <?php echo $third_menu == 'list' ? 'class="select"' : ''; ?> id="third_navbar_fe"><span>Lista</span></a></li>
        <li><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/2127'; ?>" <?php echo $third_menu == 'webinarium' ? 'class="select"' : ''; ?>><span>Webinarium</span></a></li>
        <li><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstAboutUs'; ?>" <?php echo $third_menu == 'om_oss' ? 'class="select"' : ''; ?>><span>Om oss</span></a></li>
        <li><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/contactUs'; ?>" <?php echo $third_menu == 'contact_us' ? 'class="select"' : ''; ?>><span>Kontakta oss</span></a></li>
        <li><a href="https://twitter.com/borstjanaren" target="_blank"><span>Twitter</span></a></li>
        <li><a href="https://www.youtube.com/channel/UCfSGLtCAxSHqGhMZsQumqaQ?nohtml5=False" target="_blank"><span>You Tube</span></a></li>
        <li><a href="https://www.facebook.com/pages/B%C3%B6rstj%C3%A4naren/193838224060099" target="_blank"><span>Facebook</span></a></li>        
        <li><?php if ($sf_user->isAuthenticated()): ?><a <?php echo $third_menu == 'sbtUserProfile' ? 'class="select"' : ''; ?> href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtUserProfile/take_to_profile/1"><span>Mitt konto</span></a><?php else: ?><a <?php echo $third_menu == 'skapa_konto' ? 'class="select"' : ''; ?> href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt_user/sbtNewRegistration"><span>Skapa konto</span></a><?php endif; ?></li>
        <li><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstArticleDetails/article_id/342'; ?>" <?php echo $third_menu == 'a_o' ? 'class="select"' : ''; ?>><span>A-Ö</span></a></li>
        <li><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstRisk'; ?>" <?php echo $third_menu == 'riskvarning' ? 'class="select"' : ''; ?>><span>Riskvarning</span></a></li>
        <li><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/rss/rss.php'; ?>" <?php //echo $third_menu == 'a_o' ? 'class="select"' : ''; ?>><span>RSS</span></a></li>
        <li><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/siteMap'; ?>" <?php echo $third_menu == 'sitemap' ? 'class="select"' : ''; ?>><span>Sajtkarta</span></a></li>
        <li><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/borst/borstAdvanceSearch'; ?>" <?php echo $third_menu == 'adv_search' ? 'class="select"' : ''; ?>><span>Sök</span></a></li>
    </ul>
</div>