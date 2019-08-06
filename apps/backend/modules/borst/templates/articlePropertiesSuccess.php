<div class="maincontentpage">
<div class="forumlistingleftdiv">
  <div class="forumlistingleftdivinner">
   <div class="shoph3 widthall">Kategori</div>
	<div class="float_left listing" style="width:60%;">
	  <div class="float_left widthall" style="border:1px solid #666666; width:60%; padding:5px 0 5px 5px;">
		<?php include_partial('borst/artical_category_list_partial', array('cat_arr'=>$cat_arr,'host_str'=>$host_str)) ?>
	  </div>
	  <div class="float_left widthall">&nbsp;</div>
	  <div class="shoph3 widthall">Typ</div>
	  <div class="float_left widthall" style="border:1px solid #666666; width:60%; padding:5px 0 5px 5px;">
		<?php include_partial('borst/artical_type_list_partial', array('type_arr'=>$type_arr,'host_str'=>$host_str)) ?>
	  </div>
	</div>
	</div>
</div>

</div>
<!-- ui-dialog-edit-category -->
<div id="edit_category_box" title="Edit Category Confirmation">
<form name="update_category_name" id="update_category_name" method="post" action="">
  <input type="hidden" name="edit_cat_id" id="edit_cat_id"/>
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="edit_category_msg">Message:</td>
	</tr>
	<tr>
		<td><input type="text" name="category_name" id="category_name" value=""/></td>
	</tr>
 </table>
</form>
</div>

<!-- ui-dialog-delete-category -->
<div id="delete_category_box" title="Delete Category Confirmation">
<form name="delete_article_category" id="delete_article_category" method="post" action="">
 <input type="hidden" name="delete_cat_id" id="delete_cat_id"/>
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="delete_category_msg">Message:</td>
	</tr>
 </table>
 </form>
</div>

<!-- ui-dialog-edit-type -->
<div id="edit_type_box" title="Edit Type Confirmation">
<form name="update_type_name" id="update_type_name" method="post" action="">
  <input type="hidden" name="edit_type_id" id="edit_type_id"/>
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="edit_type_msg">Message:</td>
	</tr>
	<tr>
		<td><input type="text" name="type_name" id="type_name" value=""/></td>
	</tr>
 </table>
</form>
</div>

<!-- ui-dialog-delete-type -->
<div id="delete_type_box" title="Delete Type Confirmation">
<form name="delete_article_type" id="delete_article_type" method="post" action="">
 <input type="hidden" name="delete_type_id" id="delete_type_id"/>
 <table width="100%"  border="0" cellspacing="3" cellpadding="0">
	<tr>
		<td id="delete_type_msg">Message:</td>
	</tr>
 </table>
 </form>
</div>