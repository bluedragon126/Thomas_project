<script type="text/javascript" language="javascript">
$(document).ready(function()
{

	var forum_cat = '<?php echo $category; ?>'; 
	$.post("/borst/getEnquirySubCategoryMenu?cat_id="+forum_cat, function(data){
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
<ul id="first_ul_askBT" class="forumtab2 enquiry_tabs floatLeftNew">
  <li><a id="cat_1" style="cursor:pointer" class="<?php echo $category == 1 ? 'selectedtab' : ''; ?>"><?php echo __('Portfölj') ?></a></li>
  <li><a id="cat_2" style="cursor:pointer" class="<?php echo $category == 2 ? 'selectedtab' : ''; ?>"><?php echo __('Henry Boy') ?></a></li>
  <li><a id="cat_3" style="cursor:pointer" class="<?php echo $category == 3 ? 'selectedtab' : ''; ?>"><?php echo __('Utbildningar') ?></a></li>
</ul>
<ul id="" class="forumtab2 enquiry_tabs floatLeftNew ">
  <li><a id="cat_4" style="cursor:pointer" class="<?php echo $category == 4 ? 'selectedtab' : ''; ?>"><?php echo __('Webinarium') ?></a></li>
  <li><a id="cat_5" style="cursor:pointer" class="<?php echo $category == 5 ? 'selectedtab' : ''; ?>"><?php echo __('VIP-klubben') ?></a></li>
  <li><a id="cat_7" style="cursor:pointer" class="<?php echo $category == 7 ? 'selectedtab' : ''; ?>"><?php echo __('Metastock') ?></a></li>
</ul>
<ul id="" class="forumtab2 enquiry_tabs floatLeftNew ">
  <li><a id="cat_6" style="cursor:pointer" class="<?php echo $category == 6 ? 'selectedtab' : ''; ?>"><?php echo __('Nybörjare') ?></a></li>
  <li><a id="cat_8" style="cursor:pointer" class="<?php echo $category == 8 ? 'selectedtab' : ''; ?>"><?php echo __('Förslagslåda') ?></a></li>
  <li><a id="cat_9" style="cursor:pointer" class="<?php echo $category == 9 ? 'selectedtab' : ''; ?>"><?php echo __('Kundtjänst') ?></a></li>
</ul>
<ul id="last_ul_askBT" class="forumtab2 enquiry_tabs floatLeftNew ">
  <li><a id="cat_10" style="cursor:pointer" class="<?php echo $category == 10 ? 'selectedtab' : ''; ?>"><?php echo __('Övrigt') ?></a></li>
  <li>&nbsp;</li>
  <li><a id="cat_11" style="cursor:pointer" class="<?php echo $category == 0 ? 'selectedtab' : ''; ?>"><?php echo __('Senaste') ?></a></li>
</ul>
<div id="forumsubmenu_outer" class="forumsubmenuwrapper1 floatLeftNew" style="display:none;">
</div>
<?php }else{ ?>
<ul id="enquiry_tabs" class="forumtab">
  <li><a id="cat_1" style="cursor:pointer" class="<?php echo $category == 1 ? 'selectedtab' : ''; ?>"><?php echo __('Portfölj') ?></a></li>
  <li><a id="cat_2" style="cursor:pointer" class="<?php echo $category == 2 ? 'selectedtab' : ''; ?>"><?php echo __('Henry Boy') ?></a></li>
  <li><a id="cat_3" style="cursor:pointer" class="<?php echo $category == 3 ? 'selectedtab' : ''; ?>"><?php echo __('Utbildningar') ?></a></li>
  <li><a id="cat_4" style="cursor:pointer" class="<?php echo $category == 4 ? 'selectedtab' : ''; ?>"><?php echo __('Webinarium') ?></a></li>
  <li><a id="cat_5" style="cursor:pointer" class="<?php echo $category == 5 ? 'selectedtab' : ''; ?>"><?php echo __('VIP-klubben') ?></a></li>
  <li><a id="cat_7" style="cursor:pointer" class="<?php echo $category == 7 ? 'selectedtab' : ''; ?>"><?php echo __('Metastock') ?></a></li>
  <li><a id="cat_6" style="cursor:pointer" class="<?php echo $category == 6 ? 'selectedtab' : ''; ?>"><?php echo __('Nybörjare') ?></a></li>
  <li><a id="cat_8" style="cursor:pointer" class="<?php echo $category == 8 ? 'selectedtab' : ''; ?>"><?php echo __('Förslagslåda') ?></a></li>
  <li><a id="cat_9" style="cursor:pointer" class="<?php echo $category == 9 ? 'selectedtab' : ''; ?>"><?php echo __('Kundtjänst') ?></a></li>  
  <li><a id="cat_10" style="cursor:pointer" class="<?php echo $category == 10 ? 'selectedtab' : ''; ?>"><?php echo __('Övrigt') ?></a></li>
  <li><a id="cat_11" style="cursor:pointer" class="<?php echo $category == 0 ? 'selectedtab' : ''; ?>"><?php echo __('Senaste') ?></a></li>
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