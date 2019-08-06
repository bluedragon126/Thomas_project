
﻿<?php $parent_menu = sfContext::getInstance()->getUser()->getAttribute('parent_menu');?>
<?php $third_menu = sfContext::getInstance()->getUser()->getAttribute('third_menu');?>
<?php $arr = array('top_borst_menu','top_newsletter_menu','bt_skolan','om_oss','bt_skolan','utbildnings','bt_jobba','a_o','contact_us','adv_search','newsletter','webinarium','list');?>
<?php $arr_neg = array('top_bt_charts','top_forum_menu');?>
<?php if((in_array($parent_menu,$arr) || in_array($third_menu,$arr)) && $parent_menu != 'top_bt_charts' &&  $parent_menu != 'top_sbt_menu'):?>

<!--<div class="blank_1h widthall">&nbsp;</div>-->
<?php endif; ?>
<?php /*if($parent_menu == 'top_sbt_menu'):?>
<a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/borst/faq" class="simplelink">
<span class="float_left pbottom_5 new_pink ieadj">
	<span class="new_pink_text">
		"BT Insider är Börstjänarens nätverk, där börsintresserade möts online för att diskutera och lära sig mer om marknaden.
Välkommen att registrera dig och börja delta, via bloggar, artiklar, kommentarer och foruminlägg!"
	</span>
</span>
</a>
<?php endif; */?>
<?php /*if($parent_menu == 'top_bt_shop'):?>
<a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtHome" class="simplelink">
<span class="float_left pbottom_5 ieadj"><img width="269" height="70"  src="/images/ad4.png"></span>
</a>
<?php endif;*/ ?>
<?php /*if($parent_menu == 'top_bt_charts'):?>
<a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtHome" class="simplelink">
<span class="float_left pbottom_5 ieadj"><img width="269" height="70"  src="/images/ad1.png"></span>
</a>
<?php endif;*/ ?>
<?php /*if($parent_menu == 'top_forum_menu'):?>
<a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtHome" class="simplelink"><span class="float_left pbottom_5 ieadj"></span></a><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/sbt/sbtHome" class="simplelink"><span class="float_left pbottom_5 ieadj"><img width="269" height="70"  src="/images/ad5.png" /></span></a>
<?php endif;*/ ?>