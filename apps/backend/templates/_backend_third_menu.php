<?php if($sf_user->getAttribute('isSuperAdmin','','userProperty')==1):?>
<?php $third_menu = sfContext::getInstance()->getUser()->getAttribute('third_menu');?>
<div class="menuwrapper" id="back_third_menu">
  <ul>
	<li><span></span><a id="" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'] ?>">BT Hem</a></li>
	<li><span></span><a id="" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/sbt/sbtHome' ?>">BT Insider Hem</a></li>
    <li><span></span><a id="btshop_article" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/backend.php/borst/createShopArticle'; ?>" <?php echo $third_menu=='btshop_article' ? 'class="select"' : ''; ?>>BT-Shop</a></li>
	<li><span></span><a id="btshop_article_list" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/backend.php/borst/shopArticleList'; ?>" <?php echo $third_menu=='btshop_article_list' ? 'class="select"' : ''; ?>>BT-Shop Article List</a></li>
	<li><span></span><a id="subscription" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/backend.php/borst/subscriptionList'; ?>" <?php echo $third_menu=='subscription' ? 'class="select"' : ''; ?>>Subscriptions</a></li>
	<li><span></span><a id="btchart" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/backend.php/borst/btchart'; ?>" <?php echo $third_menu=='btchart' ? 'class="select"' : ''; ?>>BT-Charts</a></li>

	<li><span></span><a id="guard_user" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/backend.php/sf_guard_user' ?>" <?php echo $third_menu=='guard_user' ? 'class="select"' : ''; ?>>SfUser</a></li>
	<li><span></span><a id="guard_group" href="http://<?php echo $_SERVER['HTTP_HOST'].'/backend.php/sf_guard_group' ?>" <?php echo $third_menu=='guard_group' ? 'class="select"' : ''; ?>>SfGroup</a></li>
	<li><span></span><a id="guard_permission" href="http://<?php echo $_SERVER['HTTP_HOST'].'/backend.php/sf_guard_permission' ?>" <?php echo $third_menu=='guard_permission' ? 'class="select"' : ''; ?>>SfPermission</a></li>
    <li><span></span><a id="adlist" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/backend.php/borst/adList'; ?>" <?php echo $third_menu=='adlist' ? 'class="select"' : ''; ?>>Ad List</a></li>
    <!--<li><span></span><a id="archiveadlist" href="<?php //echo 'http://'.$_SERVER['HTTP_HOST'].'/backend.php/borst/archiveAdList'; ?>" <?php //echo $third_menu=='archiveadlist' ? 'class="select"' : ''; ?>>Archive Ad List</a></li>-->
	<li><span></span><a id="" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/ccount/index.php'; ?>" <?php echo $third_menu=='webinarium' ? 'class="select"' : ''; ?>>Count mgt</a></li>
        <li><span></span><a id="" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/backend.php/contactus'; ?>" <?php echo $sf_context->getModuleName() =='contactus' ? 'class="select"' : ''; ?>>Kontakta oss</a></li>
        <li><span></span><a id="" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/backend.php/borst/newsletterList'; ?>" <?php echo ($sf_context->getModuleName() =='borst' && $sf_context->getActionName() == 'newsletterList') ? 'class="select"' : ''; ?>>Newsletter</a></li>
        <li><span></span><a id="" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/backend.php/borst/couponList'; ?>" <?php echo ($sf_context->getModuleName() =='borst' && $sf_context->getActionName() == 'couponList') ? 'class="select"' : ''; ?>>Coupon</a></li>
  </ul>
</div>
<?php //code change by sandeep
else: ?>
<div class="menuwrapper" id="back_third_menu">
  <ul>
	<li><span></span><a id="" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'] ?>">BT Hem</a><span></span></li>
  </ul>
</div>
<?php  //code change by sandeep end
endif;?>

