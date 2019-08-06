<script type="text/javascript" language="javascript">
$(document).ready(function()
{

	var forum_cat = '<?php echo $category; ?>'; 
	$.post("/forum/getForumSubCategoryMenu?cat_id="+forum_cat, function(data){
			$('#forumsubmenu_outer').html(data);
			
			if($('#forumsubmenu_outer').find("li").length > 0)
			{
			  $("#forumsubmenu_outer").show();
			  var sub_id = '<?php echo $sub_category; ?>';
			  $('#forumsubmenu_outer').find("a").each(function(index){
					var anchor_id = $(this).attr("id");
					var class_name = $(this).attr("class");
					if(anchor_id == 'subcat_'+sub_id) 
					{
						$('#'+anchor_id).removeClass(class_name).addClass('select');
						$('#forumsubmenu_outer li').css('display','block');
						$('#forumsubmenu_outer li a.select').parent().prev('li').css('display','none');
					}
					else $('#'+anchor_id).removeClass(class_name);
			  });

   			}
			else 
			{
				$("#forumsubmenu_outer").hide();
			}
	});	
});
</script>
<?php if(isset($designPattern) && $designPattern == 2) {?>
<ul id="" class="forumtab2 forum_tabs floatLeftNew">
  <li><a id="cat_1" style="cursor:pointer" class="<?php echo $category == 1 ? 'selectedtab' : ''; ?>"><?php echo __('Börstjänaren') ?></a></li>
  <li><a id="cat_2" style="cursor:pointer" class="<?php echo $category == 2 ? 'selectedtab' : ''; ?>"><?php echo __('Marknader') ?></a></li>
  <li><a id="cat_3" style="cursor:pointer" class="<?php echo $category == 3 ? 'selectedtab' : ''; ?>"><?php echo __('Plattformar') ?></a></li>
</ul>
<ul id="" class="forumtab2 forum_tabs floatLeftNew marginLeft21">
  <li><a id="cat_4" style="cursor:pointer" class="<?php echo $category == 4 ? 'selectedtab' : ''; ?>"><?php echo __('Handelsinstrument') ?></a></li>
  <li><a id="cat_5" style="cursor:pointer" class="<?php echo $category == 5 ? 'selectedtab' : ''; ?>"><?php echo __('Strategi') ?></a></li>
  <li><a id="cat_7" style="cursor:pointer" class="<?php echo $category == 7 ? 'selectedtab' : ''; ?>"><?php echo __('Marknadsbrus') ?></a></li>
</ul>
<ul id="" class="forumtab2 forum_tabs floatLeftNew marginLeft21">
  <li><a id="cat_6" style="cursor:pointer" class="<?php echo $category == 6 ? 'selectedtab' : ''; ?>"><?php echo __('Fria Marknaden') ?></a></li>
  <li><a id="cat_8" style="cursor:pointer" class="<?php echo $category == 8 ? 'selectedtab' : ''; ?>"><?php echo __('VIP Lounge') ?></a></li>
  <li><a id="cat_9" style="cursor:pointer" class="<?php echo $category == 0 ? 'selectedtab' : ''; ?>"><?php echo __('Senaste inlägg') ?></a></li>
</ul>
<div id="forumsubmenu_outer" class="forumsubmenuwrapper1 floatLeftNew" style="display:none;">
</div>
<?php }else{ ?>
<ul id="forum_tabs" class="forumtab">
  <li><a id="cat_1" style="cursor:pointer" class="<?php echo $category == 1 ? 'selectedtab' : ''; ?>"><?php echo __('Börstjänaren') ?></a></li>
  <li><a id="cat_2" style="cursor:pointer" class="<?php echo $category == 2 ? 'selectedtab' : ''; ?>"><?php echo __('Marknader') ?></a></li>
  <li><a id="cat_3" style="cursor:pointer" class="<?php echo $category == 3 ? 'selectedtab' : ''; ?>"><?php echo __('Plattformar') ?></a></li>
  <li><a id="cat_4" style="cursor:pointer" class="<?php echo $category == 4 ? 'selectedtab' : ''; ?>"><?php echo __('Handelsinstrument') ?></a></li>
  <li><a id="cat_5" style="cursor:pointer" class="<?php echo $category == 5 ? 'selectedtab' : ''; ?>"><?php echo __('Strategi') ?></a></li>
  <li><a id="cat_7" style="cursor:pointer" class="<?php echo $category == 7 ? 'selectedtab' : ''; ?>"><?php echo __('Marknadsbrus') ?></a></li>
  <li><a id="cat_6" style="cursor:pointer" class="<?php echo $category == 6 ? 'selectedtab' : ''; ?>"><?php echo __('Fria Marknaden') ?></a></li>
  <li><a id="cat_8" style="cursor:pointer" class="<?php echo $category == 8 ? 'selectedtab' : ''; ?>"><?php echo __('VIP Lounge') ?></a></li>
  <li><a id="cat_9" style="cursor:pointer" class="<?php echo $category == 0 ? 'selectedtab' : ''; ?>"><?php echo __('Senaste inlägg') ?></a></li>
</ul>

<div id="forumsubmenu_outer" class="forumsubmenuwrapper" style="display:none;">
<span class="leftforum">&nbsp;</span>
<ul class="forumsubmenu">
<!--<li><span></span></li>
<li><span></span><a href="#">Allmänt</a></li>
<li><span></span><a href="#">Ny på BT</a></li>
<li><span></span><a href="#" class="select">Tjänster</a></li>
<li><span></span><a href="#">Webinarium</a></li>
<li><span></span><a href="#">Utbildning</a></li>
<li><span></span><a href="#">Förslagslåda</a></li>
-->
</ul>
</div>
<?php } ?>