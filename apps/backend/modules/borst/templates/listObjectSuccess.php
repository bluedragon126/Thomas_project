<?php //use_helper('Pagination') ?>
<div class="maincontentpage">
<div class="forumlistingleftdiv">
  <div class="float_left widthall"><b><a class="blackcolor" href="<?php echo 'https://'.$host_str.'/backend.php/borst/editObject/mode/create_new_object'?>">Lägg till objekt</a></b></td></div>
  <div class="forumlistingleftdivinner">
  <form id="search_object_form" name="search_object_form" method="POST" action="<?php //echo url_for('borst/listObject') ?>">
  <table width="60%" border="0" cellspacing="0" cellpadding="0" id="back_object_list">
	<tr>
		<td><b>Objekt:</b>&nbsp;<input tabindex="1" name="obj_name" type="text" size="16" value="<?php echo $sf_params->get('obj_name') ? $sf_params->get('obj_name') : $obj_name ; ?>"></td>
		<td><b>Land:</b>&nbsp;<input tabindex="2" name="obj_land" type="text" size="10" value="<?php echo $sf_params->get('obj_land') ? $sf_params->get('obj_land') : $obj_land; ?>"></td>
		<td><input type="submit" tabindex="3" name="submit" value="Search"></td>		
	</tr>
  </table>
  </form>
  <div class="shoph3 widthall">List Object</div>
	<div class="float_left listing" style="width:50%;">
	  <div class="float_left widthall" id="object_list">
	  <?php include_partial('borst/object_list_partial', array('pager'=>$pager,'obj_name'=>$obj_name,'obj_land'=>$obj_land,'ext'=>$ext,'host_str'=>$host_str,'rec_per_page'=>$rec_per_page)) ?>
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