<?php $parent_menu = sfContext::getInstance()->getUser()->getAttribute('parent_menu');?>
<?php $submenu = sfContext::getInstance()->getUser()->getAttribute('submenu_menu');?>
<?php $show_div = 'style="visibility:visible; display:block;"'; ?>
<?php $hide_div = 'style="visibility:hidden; display:none;"'; ?>
<?php $red_parent = 'class="redmintcolor"' ?>
<?php $red_submenu = 'class="redmintcolor_submenu"';?>
<?php $darkblue_parent = 'class="bluecolor"' ?>
<?php $darkblue_submenu = 'class="bluecolor_submenu"';?>
<?php $darkyellow_parent = 'class="yellowcolor"' ?>
<?php $darkyellow_submenu = 'class="yellowcolor_submenu"';?>
<?php $darkpink_parent = 'class="darkpinkcolor"' ?>
<?php $darkpink_submenu = 'class="darkpinkcolor_submenu"';?>
<?php $darkskyblue_parent = 'class="lightbluecolor"' ?>
<?php $darkskyblue_submenu = 'class="lightbluecolor_submenu"';?>
<?php
$backgroud_class = '';
switch($parent_menu)
{
	case 'top_borst_menu': $backgroud_class = $darkblue_parent; break;
	case 'top_sbt_menu': $backgroud_class = $red_parent; break;
	case 'top_bt_shop': $backgroud_class = $darkyellow_parent; break;
	case 'top_bt_charts': $backgroud_class = $darkpink_parent; break;
	case 'top_bt_markets': $backgroud_class = $darkskyblue_parent; break;
}
?>
<div class="float_right widthall" style="border:0px solid red; margin-bottom:6px; text-align:right;">
	<?php echo ucfirst($sf_user->getAttribute('firstname','','userProperty')); ?>
	<?php echo ' '; ?>
	<?php echo ucfirst($sf_user->getAttribute('lastname','','userProperty')); ?>
	<?php echo ' | '; ?>
	<a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/user/signout">Logout</a>&nbsp;
</div>
<?php if($sf_user->getAttribute('isSuperAdmin','','userProperty')==1):?>
<div class="mainmenuwrapper" style="margin:0px;">
  <ul class="leftmenu" style="border:1px solid #637281">
	<li id="top_borst_menu"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/borstHome" <?php echo $parent_menu=='top_borst_menu' ? 'class="selected bluecolor"' : ''; ?> style="color: #000;">BÖRSTJÄNAREN  </a></li>
	<li id="top_sbt_menu"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/sbt/sbtHome" <?php echo $parent_menu=='top_sbt_menu' ? 'class="selected redmintcolor"' : ''; ?> style="color: #000;">BT Insider</a></li>
  </ul>
</div>
<div class="submenuwrapper">
  <ul id="borst_menu" <?php echo $parent_menu=='top_borst_menu' ? $show_div : $hide_div; ?><?php echo $backgroud_class; ?>>
	<li id="borst_menu_home"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/borstHome" <?php echo $submenu=='borst_menu_home' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Hem</a></li>
	<li id="borst_menu_create_article"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/createArticle" <?php echo $submenu=='borst_menu_create_article' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Artikel Ny</a></li>
	<li id="borst_menu_article_list"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/articleList" <?php echo $submenu=='borst_menu_article_list' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Artikel lista</a></li>
	<li id="borst_menu_article_properties"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/articleProperties" <?php echo $submenu=='borst_menu_article_properties' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Egenskaper</a></li>
	<li id="borst_menu_list_object"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/listObject" <?php echo $submenu=='borst_menu_list_object' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Objekt</a></li>
	<li id="borst_menu_user_list"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/userList" <?php echo $submenu=='borst_menu_user_list' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Användare</a></li>
	<li id="borst_menu_remind_user"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/remindUser" <?php echo $submenu=='borst_menu_remind_user' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Påminnelse</a></li>
	<li id="borst_menu_newsletter_form"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/newsletterForm" <?php echo $submenu=='borst_menu_newsletter_form' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Nyhetsbrev</a></li>
	<li id="borst_menu_send_article_update_form"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/sendArticleUpdateForm" <?php echo $submenu=='borst_menu_send_article_update_form' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Skicka update</a></li>
	<li id="borst_menu_contact_enquiry"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/contactEnquiry" <?php echo $submenu=='borst_menu_contact_enquiry' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Enquiries</a></li>
	<li id="borst_menu_transaction_list"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/shopTransactionList" <?php echo $submenu=='borst_menu_transaction_list' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Transaction List</a></li>
  </ul>
  <ul id="sbt_menu" <?php echo $parent_menu=='top_sbt_menu' ? $show_div : $hide_div; ?><?php echo $backgroud_class; ?>>
	<li id="sbt_menu_home"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/sbt/sbtHome" <?php echo $submenu=='sbt_menu_home' ? $red_submenu : $red_parent; ?>>hem</a></li>
	<li id="sbt_menu_article_request_list"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/sbt/sbtArticleRequest" <?php echo $submenu=='sbt_menu_article_request_list' ? $red_submenu : $red_parent; ?>>Article Request</a></li>
	<li id="sbt_menu_assign_medals"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/sbt/sbtAssignMedals" <?php echo $submenu=='sbt_menu_assign_medals' ? $red_submenu : $red_parent; ?>>Assign Medals</a></li>
	<li id="sbt_menu_publisher_request"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/sbt/sbtPublisherRequest" <?php echo $submenu=='sbt_menu_publisher_request' ? $red_submenu : $red_parent; ?>>Publisher Request</a></li>
    <li id="sbt_menu_article_list"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/sbt/articleList" <?php echo $submenu=='sbt_menu_article_list' ? $red_submenu : $red_parent; ?>>Article List</a></li>
  </ul>
</div>
<?php else: ?>
<div class="mainmenuwrapper" style="margin:0px;">
  <ul class="leftmenu" style="border:1px solid #637281">
	<li id="top_borst_menu"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/borstHome" <?php echo $parent_menu=='top_borst_menu' ? 'class="selected bluecolor"' : ''; ?>>BÖRSTJÄNAREN  </a></li>
  </ul>
</div>
<div class="submenuwrapper">
  <ul id="borst_menu" <?php echo $parent_menu=='top_borst_menu' ? $show_div : $hide_div; ?><?php echo $backgroud_class; ?>>
	<?php if($sf_user->hasCredential('addArticle')) : ?>
      <li id="borst_menu_create_article"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/createArticle" <?php echo $submenu=='borst_menu_create_article' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Artikel Ny</a></li>
	<?php endif; ?>
    <?php if($sf_user->hasCredential('listArticle')) : ?>
      <li id="borst_menu_article_list"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/articleList" <?php echo $submenu=='borst_menu_article_list' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Artikel lista</a></li>
	<?php endif; ?>
    <?php if($sf_user->hasCredential('articleProperties')) : ?>
      <li id="borst_menu_article_properties"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/articleProperties" <?php echo $submenu=='borst_menu_article_properties' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Egenskaper</a></li>
	<?php endif; ?>
    <?php if($sf_user->hasCredential('listObject')) : ?>
      <li id="borst_menu_list_object"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/listObject" <?php echo $submenu=='borst_menu_list_object' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Objekt</a></li>
	<?php endif; ?>
    <?php /*if($sf_user->hasCredential('sendArticleUpdateForm')) : ?>
      <li id="borst_menu_send_article_update_form"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/sendArticleUpdateForm" <?php echo $submenu=='borst_menu_send_article_update_form' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Skicka update</a></li>
	<?php endif;*/ ?>
      <?php if($sf_user->hasCredential('contactEnquiry')) : ?>
      <li id="borst_menu_contact_enquiry"><a href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/backend.php/borst/contactEnquiry" <?php echo $submenu=='borst_menu_contact_enquiry' ? $darkblue_submenu : $darkblue_parent; ?> style="color:#fff;">Enquiries</a></li>
       <?php endif; ?>
  </ul>
</div>
<?php endif;?>