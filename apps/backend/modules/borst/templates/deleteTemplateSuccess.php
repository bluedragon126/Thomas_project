<?php //use_helper('Pagination') ?>
<div class="maincontentpage">
<div class="forumlistingleftdiv" style="width:950px;">
  <div class="float_left widthall"></div>
  <div class="forumlistingleftdivinner">
  <div class="shoph3 widthall"><?php echo $article_message ?> </div>
	<div class="float_left listing" style="width:50%;">
	  <div class="float_left widthall" id="object_list">
	  <?php //include_partial('borst/object_list_partial', array('pager'=>$pager,'obj_name'=>$obj_name,'obj_land'=>$obj_land,'ext'=>$ext,'host_str'=>$host_str)) ?>
	  </div>
	</div>
	</div>

</div>

</div>
<!-- ui-dialog-update-object -->
<div id="updateObjectList_confirm_box" title="Update Object List Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="update_object_msg">Message:</td>
	</tr>
 </table>
</div>

<!-- ui-dialog-delete-object -->
<div id="delete_confirm_box" title="Delete Object Confirmation">
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<input type="hidden" name="delete_obj_id" id="delete_obj_id"/>
	<tr>
		<td id="delete_object_msg">Message:</td>
	</tr>
 </table>
</div>