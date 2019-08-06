<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php //include_http_metas() ?>
    <?php //include_metas() ?>
    <?php //include_title() ?>
	<meta name="description" content="<?php echo $metatags_desc ? $metatags_desc : "Syster Bt Meta Description";?>" />
	<meta name="keywords" content="<?php echo $metatags_keywords ? $metatags_keywords : "Syster Bt Meta Keywords";?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo ($metatags_title ? $metatags_title : "BT Insider Title");?></title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
   <?php if (!strpos($_SERVER['HTTP_USER_AGENT'],"MSIE 9")):?>

    
    <?php use_javascript("/js/jquery.bgiframe.min.js");?>
    <?php endif;?>
  </head>
  <body>
  <div class="outercontainer">
  <div class="maincontainer">
      <img src="/images/loader.gif" class="loader hide_div" title="loading"/>
      <div class="loader_view float_left hide_div">
          
          <input type="hidden" value="0" id="loader_val"/>
      </div>
    <div class="bgwrapper">
      <div class="mainheader">
        <div class="topheaderbg"></div>
        <div class="leftpartheader">
          <div class="logowrapper">
            <div class="headerpercentage">
            </div>
          </div>
          <div class="float_right"></div>
        </div>
		<?php include_partial('global/backend_top_menu') ?>
		<?php include_partial('global/backend_third_menu') ?>
      </div>
  	<?php echo $sf_content ?>
  <div class="footerwrapper">
	<div class="float_left">&copy; Copyright Morningbriefing Börstjänaren AB <?php echo date('Y');?></div>
	<a href="#" ><img src="/images/bluebottomarow.gif" alt="bluearrow" align="right" class="f_top" /></a> </div>
	 </div>
	</div>
  </div>
  </body>
</html>
<script type="text/javascript">
$(document).ready(function()
{
	$.ajaxSetup({
	  cache: false
	});
});
</script>